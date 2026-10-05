<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\ContinuingEducation\Entities\CeBundle;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeCourseEnrollment;
use Modules\ContinuingEducation\Services\CeCatalogService;
use Modules\Payment\Entities\Cart;

class CeCartController extends Controller
{
    public function __construct(
        protected CeCatalogService $catalogService
    ) {}

    public function addCourse(Request $request, $id)
    {
        return $this->addCourseToCart($request, (int) $id, false);
    }

    public function buyNowCourse(Request $request, $id)
    {
        return $this->addCourseToCart($request, (int) $id, true);
    }

    public function addBundle(Request $request, $id)
    {
        return $this->addBundleToCart($request, (int) $id, false);
    }

    public function buyNowBundle(Request $request, $id)
    {
        return $this->addBundleToCart($request, (int) $id, true);
    }

    protected function addCourseToCart(Request $request, int $id, bool $buyNow)
    {
        try {
            $attemptPath = $this->courseCartPath($id, $buyNow);

            if ($redirect = $this->guardCeBuyer($attemptPath)) {
                return $redirect;
            }

            $user = Auth::user();
            $course = CeCourse::query()
                ->published()
                ->forLms()
                ->find($id);

            if (! $course) {
                Toastr::error('Course not found.', trans('common.Failed'));

                return redirect()->route('continuingEducation');
            }

            $detailRoute = $this->catalogService->catalogUrl($course);

            if ($this->coursePrice($course) <= 0) {
                Toastr::error('This course is not available for purchase.', trans('common.Failed'));

                return redirect()->to($detailRoute);
            }

            if (CeCourseEnrollment::query()
                ->where('user_id', $user->id)
                ->where('ce_course_id', $course->id)
                ->exists()) {
                Toastr::error('You are already enrolled in this course.', trans('common.Failed'));

                return redirect()->to($detailRoute);
            }

            $exists = Cart::query()
                ->where('user_id', $user->id)
                ->where('ce_course_id', $course->id)
                ->exists();

            if ($exists) {
                Toastr::error('Course already added in your cart.', trans('common.Failed'));

                return redirect()->route('myCart');
            }

            $this->storeCartLine($user->id, [
                'ce_course_id' => $course->id,
                'price' => $this->coursePrice($course),
            ]);

            Toastr::success('Course added to your cart.', trans('common.Success'));

            return redirect()->route('myCart')->with('back', $detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent(), true);
            Toastr::error(trans('frontend.Something went wrong, Please check error log'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    protected function addBundleToCart(Request $request, int $id, bool $buyNow)
    {
        try {
            $bundle = CeBundle::query()
                ->published()
                ->forLms()
                ->with(['mandatoryCourses', 'electiveCourses'])
                ->find($id);

            if (! $bundle) {
                Toastr::error('Bundle not found.', trans('common.Failed'));

                return redirect()->route('continuingEducation');
            }

            $detailRoute = $this->catalogService->bundleDetailUrl($bundle);

            // GET without elective payload → send shopper to detail page to choose courses.
            if ($request->isMethod('get') && ! $request->has('elective_course_ids')) {
                return redirect()->to($detailRoute);
            }

            $attemptPath = $this->bundleCartAttemptPath($request, $id, $buyNow);

            if ($redirect = $this->guardCeBuyer($attemptPath)) {
                return $redirect;
            }

            $user = Auth::user();

            if ($this->catalogService->findOwnedBundlePurchase($user, $bundle)) {
                Toastr::error(
                    'You have already purchased this bundle. Manage it from My Bundles in your CE portal.',
                    trans('common.Failed')
                );

                return redirect()->route('cePortal.courses', ['view' => 'bundles']);
            }

            if ($this->bundlePrice($bundle) <= 0) {
                Toastr::error('This bundle is not available for purchase.', trans('common.Failed'));

                return redirect()->to($detailRoute);
            }

            if ($bundle->mandatoryCourses->isEmpty()) {
                Toastr::error('This bundle has no mandatory courses.', trans('common.Failed'));

                return redirect()->to($detailRoute);
            }

            $electiveIds = $this->normalizeElectiveIds($request);
            $electiveError = $this->validateBundleElectiveSelection($bundle, $electiveIds);

            if ($electiveError) {
                Toastr::error($electiveError, trans('common.Failed'));

                return redirect()->to($detailRoute)->withInput();
            }

            $exists = Cart::query()
                ->where('user_id', $user->id)
                ->where('ce_bundle_id', $bundle->id)
                ->exists();

            if ($exists) {
                Toastr::error('Bundle already added in your cart.', trans('common.Failed'));

                return redirect()->route('myCart');
            }

            $this->storeCartLine($user->id, [
                'ce_bundle_id' => $bundle->id,
                'price' => $this->bundlePrice($bundle),
                'ce_elective_course_ids' => $electiveIds,
            ]);

            Toastr::success('Bundle added to your cart.', trans('common.Success'));

            return redirect()->route('myCart')->with('back', $detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent(), true);
            Toastr::error(trans('frontend.Something went wrong, Please check error log'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    protected function normalizeElectiveIds(Request $request): array
    {
        $ids = $request->input('elective_course_ids', []);

        if (! is_array($ids)) {
            $ids = [$ids];
        }

        return array_values(array_unique(array_filter(array_map('intval', $ids))));
    }

    protected function validateBundleElectiveSelection(CeBundle $bundle, array $electiveIds): ?string
    {
        $optionalIds = $this->catalogService->optionalElectivesForBundle($bundle)
            ->pluck('id')
            ->map(function ($id) {
                return (int) $id;
            })
            ->all();

        foreach ($electiveIds as $id) {
            if (! in_array((int) $id, $optionalIds, true)) {
                return 'One or more selected elective courses are not available for this bundle.';
            }
        }

        return null;
    }

    protected function courseCartPath(int $id, bool $buyNow): string
    {
        return $buyNow
            ? '/ce/cart/course/' . $id . '/buy'
            : '/ce/cart/course/' . $id;
    }

    /**
     * Resume URL after login/register (must match /ce/cart/ so CE auth honors redirectTo).
     */
    protected function bundleCartAttemptPath(Request $request, int $id, bool $buyNow): string
    {
        $path = $buyNow
            ? '/ce/cart/bundle/' . $id . '/buy'
            : '/ce/cart/bundle/' . $id;

        $electiveIds = $this->normalizeElectiveIds($request);

        if ($electiveIds === []) {
            return $path;
        }

        return $path . '?' . http_build_query(['elective_course_ids' => $electiveIds]);
    }

    protected function guardCeBuyer(string $attemptPath): ?RedirectResponse
    {
        if (! Auth::check()) {
            Toastr::error('You must login', trans('common.Error'));

            return redirect()->to(ceCartLoginUrl($attemptPath));
        }

        $user = Auth::user()->fresh() ?? Auth::user();

        if (! userIsCeProfessional($user)) {
            Toastr::error('Only CE professionals can buy this course.', trans('common.Failed'));

            return redirect()->back();
        }

        return null;
    }

    protected function storeCartLine(int $userId, array $attributes): Cart
    {
        $oldCart = Cart::query()->where('user_id', $userId)->first();

        $cart = new Cart();
        $cart->user_id = $userId;
        $cart->tracking = $oldCart ? $oldCart->tracking : getTrx();
        $cart->price = (float) ($attributes['price'] ?? 0);

        if (! empty($attributes['ce_course_id'])) {
            $cart->ce_course_id = (int) $attributes['ce_course_id'];
        }

        if (! empty($attributes['ce_bundle_id'])) {
            $cart->ce_bundle_id = (int) $attributes['ce_bundle_id'];
        }

        if (array_key_exists('ce_elective_course_ids', $attributes)) {
            $ids = $attributes['ce_elective_course_ids'];
            $cart->ce_elective_course_ids = is_array($ids)
                ? json_encode(array_values(array_map('intval', $ids)))
                : $ids;
        }

        $cart->save();

        return $cart;
    }

    protected function coursePrice(CeCourse $course): float
    {
        return $course->salePrice();
    }

    protected function bundlePrice(CeBundle $bundle): float
    {
        return $bundle->salePrice();
    }
}
