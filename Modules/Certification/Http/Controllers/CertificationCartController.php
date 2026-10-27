<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Certification\Entities\CertificationOfferingOption;
use Modules\Certification\Services\CertificationCatalogService;
use Modules\Payment\Entities\Cart;

class CertificationCartController extends Controller
{
    public function __construct(
        protected CertificationCatalogService $catalog
    ) {}

    public function checkout(Request $request)
    {
        if (! Auth::check()) {
            Toastr::error('You must login', trans('common.Error'));
            session(['redirectTo' => url()->previous()]);

            return redirect()->route('login');
        }

        $validated = $request->validate([
            'certification_slug' => 'required|string|max:191',
            'option_id' => 'required|integer',
            'session_id' => 'nullable|integer',
            'session_key' => 'nullable|string|max:191',
            'session_label' => 'nullable|string|max:255',
            'session_sub' => 'nullable|string|max:255',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:191',
            'phone' => 'required|string|max:50',
            'role' => 'required|string|max:191',
            'license' => 'nullable|string|max:191',
            'employer' => 'nullable|string|max:191',
            'card_exp' => 'nullable|date',
            'online_cert' => 'nullable|string|max:191',
            'skills_course' => 'nullable|string|max:191',
            'notes' => 'nullable|string|max:2000',
            'opt_in' => 'nullable|boolean',
            'agree_pay' => 'accepted',
            'agree_terms' => 'accepted',
        ]);

        $offering = $this->catalog->resolvePublishedSlug($validated['certification_slug']);
        if (! $offering) {
            Toastr::error('Certification not found.', trans('common.Failed'));

            return redirect()->route('certifications.index');
        }

        $option = CertificationOfferingOption::query()
            ->where('certification_offering_id', $offering->id)
            ->where('id', $validated['option_id'])
            ->first();

        if (! $option) {
            Toastr::error('Please choose a valid pricing option.', trans('common.Failed'));

            return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering));
        }

        $sessionRequired = ! $this->catalog->optionSkipsSession($option);
        $sessionKey = $validated['session_key'] ?? null;
        $sessionId = isset($validated['session_id']) ? (int) $validated['session_id'] : 0;
        $bookableSession = null;

        if ($sessionRequired) {
            if ($sessionKey === 'contact') {
                // allowed without session_id
            } elseif ($sessionId > 0) {
                $bookableSession = $this->catalog->resolveBookableSession($offering, $option, $sessionId);
                if (! $bookableSession) {
                    Toastr::error('That session is no longer available. Please pick another date.', trans('common.Failed'));

                    return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering))->withInput();
                }
            } elseif (empty($sessionKey) || $sessionKey === 'self-study') {
                Toastr::error('Please pick a session or ask us for more dates.', trans('common.Failed'));

                return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering))->withInput();
            }
        }

        if ($this->catalog->optionRequiresRenewalDate($option) && empty($validated['card_exp'])) {
            Toastr::error('Please enter your current card expiration date.', trans('common.Failed'));

            return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering))->withInput();
        }

        $categorySlug = $offering->category->slug ?? '';
        if ($categorySlug === 'skills-check' && empty($validated['online_cert'])) {
            Toastr::error('Please enter your online completion certificate details.', trans('common.Failed'));

            return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering))->withInput();
        }

        if ($categorySlug === 'iv-therapy' && empty($validated['license'])) {
            Toastr::error('License number is required for IV Therapy.', trans('common.Failed'));

            return redirect()->route('certifications.enroll', $this->catalog->routeSlug($offering))->withInput();
        }

        $user = Auth::user();
        $enrollmentData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'license' => $validated['license'] ?? null,
            'employer' => $validated['employer'] ?? null,
            'card_exp' => $validated['card_exp'] ?? null,
            'online_cert' => $validated['online_cert'] ?? null,
            'skills_course' => $validated['skills_course'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'opt_in' => (bool) ($validated['opt_in'] ?? false),
            'certification_offering_session_id' => $bookableSession?->id,
            'session_key' => $validated['session_key'] ?? null,
            'session_label' => $bookableSession?->title ?? ($validated['session_label'] ?? null),
            'session_sub' => $bookableSession?->subtitle ?? ($validated['session_sub'] ?? null),
            'session_location' => $bookableSession?->location,
        ];

        $exists = Cart::query()
            ->where('user_id', $user->id)
            ->where('certification_offering_id', $offering->id)
            ->exists();

        if ($exists) {
            Toastr::error('This certification is already in your cart.', trans('common.Failed'));

            return redirect()->route('myCart');
        }

        $oldCart = Cart::query()->where('user_id', $user->id)->first();

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->tracking = $oldCart ? $oldCart->tracking : getTrx();
        $cart->price = (float) $option->price;
        $cart->certification_offering_id = $offering->id;
        $cart->certification_offering_option_id = $option->id;
        $cart->certification_enrollment_data = json_encode($enrollmentData);
        $cart->save();

        Toastr::success('Added to cart. Complete checkout to confirm your enrollment.', trans('common.Success'));

        return redirect()->route('CheckOut')->with('back', route('certifications.enroll', $this->catalog->routeSlug($offering)));
    }
}
