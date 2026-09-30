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
            $attemptPath = $this->bundleCartPath($id, $buyNow);

            if ($redirect = $this->guardCeBuyer($attemptPath)) {
                return $redirect;
            }

            $user = Auth::user();
            $bundle = CeBundle::query()
                ->published()
                ->forLms()
                ->with('courses')
                ->find($id);

            if (! $bundle) {
                Toastr::error('Bundle not found.', trans('common.Failed'));

                return redirect()->route('continuingEducation');
            }

            $detailRoute = $this->bundleLandingUrl($bundle);

            if ((float) $bundle->price <= 0) {
                Toastr::error('This bundle is not available for purchase.', trans('common.Failed'));

                return redirect()->to($detailRoute);
            }

            if ($bundle->courses->isEmpty()) {
                Toastr::error('This bundle has no courses.', trans('common.Failed'));

                return redirect()->to($detailRoute);
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
                'price' => (float) $bundle->price,
            ]);

            Toastr::success('Bundle added to your cart.', trans('common.Success'));

            return redirect()->route('myCart')->with('back', $detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent(), true);
            Toastr::error(trans('frontend.Something went wrong, Please check error log'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    protected function courseCartPath(int $id, bool $buyNow): string
    {
        return $buyNow
            ? '/ce/cart/course/' . $id . '/buy'
            : '/ce/cart/course/' . $id;
    }

    protected function bundleCartPath(int $id, bool $buyNow): string
    {
        return $buyNow
            ? '/ce/cart/bundle/' . $id . '/buy'
            : '/ce/cart/bundle/' . $id;
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

        $cart->save();

        return $cart;
    }

    protected function coursePrice(CeCourse $course): float
    {
        return $course->salePrice();
    }

    protected function bundleLandingUrl(CeBundle $bundle): string
    {
        return $bundle->license_type === 'aprn'
            ? route('continuingEducationAprn')
            : route('continuingEducationRnLpn');
    }
}
