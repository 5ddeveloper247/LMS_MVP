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
            $attemptRoute = $buyNow
                ? route('ce.cart.buyNowCourse', ['id' => $id])
                : route('ce.cart.addCourse', ['id' => $id]);

            if ($redirect = $this->guardCeBuyer($attemptRoute)) {
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

                return $buyNow
                    ? redirect()->route('CheckOut')
                    : redirect()->to($detailRoute);
            }

            $this->storeCartLine($user->id, [
                'ce_course_id' => $course->id,
                'price' => $this->coursePrice($course),
            ]);

            Toastr::success('Course added to your cart.', trans('common.Success'));

            return $buyNow
                ? redirect()->route('CheckOut')->with('back', $detailRoute)
                : redirect()->to($detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    protected function addBundleToCart(Request $request, int $id, bool $buyNow)
    {
        try {
            $attemptRoute = $buyNow
                ? route('ce.cart.buyNowBundle', ['id' => $id])
                : route('ce.cart.addBundle', ['id' => $id]);

            if ($redirect = $this->guardCeBuyer($attemptRoute)) {
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

                return $buyNow
                    ? redirect()->route('CheckOut')
                    : redirect()->to($detailRoute);
            }

            $this->storeCartLine($user->id, [
                'ce_bundle_id' => $bundle->id,
                'price' => (float) $bundle->price,
            ]);

            Toastr::success('Bundle added to your cart.', trans('common.Success'));

            return $buyNow
                ? redirect()->route('CheckOut')->with('back', $detailRoute)
                : redirect()->to($detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    protected function guardCeBuyer(string $attemptRoute): ?RedirectResponse
    {
        if (! Auth::check()) {
            Toastr::error('You must login', trans('common.Error'));
            session(['redirectTo' => $attemptRoute]);

            return redirect()->route('login');
        }

        if (! isModuleActive('CeProfessional')) {
            Toastr::error('Only CE professionals can buy this course.', trans('common.Failed'));

            return redirect()->back();
        }

        if ((int) Auth::user()->role_id !== (int) config('ceprofessional.role_id', 10)) {
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
        return (float) ($course->discount_price ?? $course->price ?? 0);
    }

    protected function bundleLandingUrl(CeBundle $bundle): string
    {
        return $bundle->license_type === 'aprn'
            ? route('continuingEducationAprn')
            : route('continuingEducationRnLpn');
    }
}
