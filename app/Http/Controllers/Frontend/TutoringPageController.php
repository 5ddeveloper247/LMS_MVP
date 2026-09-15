<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\InstructorController;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\AuthorizeNetPayment\Http\Controllers\DoAuthorizeNetPaymentController;
use Modules\CourseSetting\Entities\Course;
use Modules\SystemSetting\Entities\TutorHiring;
use Modules\SystemSetting\Entities\TutorSessionPackage;
use Modules\SystemSetting\Entities\TutorSessionPackagePurchase;
use Modules\SystemSetting\Entities\TutorSlote;

/**
 * Tutoring landing + session-package buy flow (auth required for package steps).
 */
class TutoringPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        $tutors = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->whereNotNull('total_hours')
            ->where('total_hours', '>', 0);

        if (Schema::hasColumn('users', 'is_featured')) {
            $tutors->where('is_featured', 1);
        }

        $tutors = $tutors
            ->orderBy('total_rating', 'desc')
            ->limit(3)
            ->get();

        $personalByUserId = collect();
        if ($tutors->isNotEmpty()) {
            $personalByUserId = DB::table('instructors_personal_info')
                ->whereIn('user_id', $tutors->pluck('id'))
                ->get()
                ->keyBy('user_id');
        }

        $sessionPackages = collect();
        if (Schema::hasTable('tutor_session_packages')) {
            $sessionPackages = TutorSessionPackage::query()
                ->where('status', 1)
                ->where('is_featured', 1)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->limit(3)
                ->get();
        }

        return view(theme('pages.tutoring'), compact('tutors', 'personalByUserId', 'sessionPackages'));
    }

    /**
     * Step 1: package summary.
     */
    public function showPackage($id)
    {
        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);

        return view(theme('pages.tutorSessionPackage'), compact('package', 'cart'));
    }

    /**
     * Step 2a: pick tutors / manage selected sessions for this package.
     */
    public function bookTutors($id)
    {
        $this->guardStudentBuyer();

        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);
        $tutors = $this->eligibleTutors();

        return view(theme('pages.tutorSessionPackageBook'), compact('package', 'cart', 'tutors'));
    }

    /**
     * Step 2b: pick course + date + one slot for a tutor.
     */
    public function bookTutorSlot($id, $tutorId)
    {
        $this->guardStudentBuyer();

        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);

        if (count($cart['sessions']) >= (int) $package->sessions_count) {
            Toastr::error('You have already selected all sessions allowed in this package.', 'Error');

            return redirect()->route('sessionPackage.bookTutors', $package->id);
        }

        $tutor = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->findOrFail($tutorId);

        $courses = Course::where('user_id', $tutor->id)->where('status', 1)->where('type', 1)->get();

        return view(theme('pages.tutorSessionPackageSlot'), compact('package', 'cart', 'tutor', 'courses'));
    }

    /**
     * Add one tutor+slot session to the package cart.
     */
    public function addSession(Request $request, $id)
    {
        $this->guardStudentBuyer();

        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);

        if (count($cart['sessions']) >= (int) $package->sessions_count) {
            Toastr::error('You have already selected all sessions allowed in this package.', 'Error');

            return redirect()->route('sessionPackage.bookTutors', $package->id);
        }

        $request->validate([
            'tutor_id' => 'required|integer',
            'course_id' => 'required|integer',
            'date' => 'required|date',
            'time_slot' => 'required|integer',
        ]);

        $tutor = User::query()->where('role_id', 2)->findOrFail($request->tutor_id);
        $course = Course::where('id', $request->course_id)
            ->where('user_id', $tutor->id)
            ->where('status', 1)
            ->firstOrFail();

        $slot = TutorSlote::where('id', $request->time_slot)
            ->where('instructor_id', $tutor->id)
            ->firstOrFail();

        $date = Carbon::parse($request->date)->format('Y-m-d');

        foreach ($cart['sessions'] as $session) {
            if ((int) $session['slot_id'] === (int) $slot->id && $session['date'] === $date) {
                Toastr::error('This slot is already added to your package selection.', 'Error');

                return redirect()->route('sessionPackage.bookTutorSlot', [$package->id, $tutor->id]);
            }
        }

        $cart['sessions'][] = [
            'tutor_id' => (int) $tutor->id,
            'tutor_name' => $tutor->name,
            'course_id' => (int) $course->id,
            'course_title' => $course->title,
            'date' => $date,
            'slot_id' => (int) $slot->id,
            'start_time' => $slot->start_time,
            'end_time' => $slot->end_time,
        ];

        $this->putCart($package->id, $cart);

        Toastr::success('Session added to your package.', 'Success');

        return redirect()->route('sessionPackage.bookTutors', $package->id);
    }

    /**
     * Remove a selected session by cart index.
     */
    public function removeSession($id, $index)
    {
        $this->guardStudentBuyer();

        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);
        $index = (int) $index;

        if (!isset($cart['sessions'][$index])) {
            Toastr::error('Session not found in your selection.', 'Error');

            return redirect()->route('sessionPackage.bookTutors', $package->id);
        }

        array_splice($cart['sessions'], $index, 1);
        $this->putCart($package->id, $cart);

        Toastr::success('Session removed.', 'Success');

        return redirect()->route('sessionPackage.bookTutors', $package->id);
    }

    /**
     * Step 3a: review + card form — always charges full package price.
     */
    public function checkout($id)
    {
        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);

        return view(theme('pages.tutorSessionPackageCheckout'), compact('package', 'cart'));
    }

    /**
     * Step 3b: Authorize.Net charge + save purchase (+ optional pre-booked hirings).
     */
    public function paySubmit(Request $request, $id)
    {
        $package = $this->findActivePackage($id);
        $cart = $this->getCart($package->id);

        if (!Schema::hasTable('tutor_session_package_purchases')) {
            Toastr::error('Package purchase is not available yet. Please contact support.', 'Error');

            return redirect()->route('sessionPackage.checkout', $package->id);
        }

        $amountCents = (int) round(((float) $package->price) * 100);
        if ($amountCents <= 0) {
            Toastr::error('Invalid package price.', 'Error');

            return redirect()->route('sessionPackage.checkout', $package->id);
        }

        $cardnumber = str_replace(' ', '', (string) $request->cardNumber);
        $data = [
            'cardHolder' => $request->cardHolder,
            'cardNumber' => $cardnumber,
            'expiryDate' => $request->expiryDate,
            'cvv' => $request->cvv,
            'amount' => $amountCents,
        ];

        $validator = Validator::make($data, [
            'cardHolder' => 'required',
            'cardNumber' => 'required|numeric',
            'expiryDate' => 'required',
            'cvv' => 'required|numeric',
            'amount' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            Toastr::error('Please check your card details and try again.', 'Error');

            return redirect()->route('sessionPackage.checkout', $package->id);
        }

        if (!$request->boolean('accept')) {
            Toastr::error('Please accept the terms and conditions.', 'Error');

            return redirect()->route('sessionPackage.checkout', $package->id);
        }

        // Force server-side amount (never trust client).
        $request->merge([
            'user_id' => Auth::id(),
            'amount' => $amountCents,
            'payment_type' => 'tutor_session_package',
            'cardNumber' => $cardnumber,
        ]);

        try {
            $authorize = new DoAuthorizeNetPaymentController();
            $response = $authorize->makePayment($request, 'tutor_session_package', true, null, true);

            if (!$response) {
                Toastr::error('Payment was not successful. Please try again.', 'Error');

                return redirect()->route('sessionPackage.checkout', $package->id);
            }

            $response = json_decode(json_encode($response));
            if (!isset($response->id) || empty($response->paid ?? true)) {
                // Failed Authorize responses may omit paid/id
                if (!isset($response->id)) {
                    Toastr::error('Payment was not successful. Please try again.', 'Error');

                    return redirect()->route('sessionPackage.checkout', $package->id);
                }
            }

            $purchase = $this->confirmPackagePurchase($package, $cart, $response, $amountCents);
            $this->clearCart($package->id);

            Toastr::success('Package purchased successfully.', 'Success');

            return redirect()->route('myTutors', ['tab' => 'packages']);
        } catch (\Throwable $e) {
            \Log::error('Session package payment error: ' . $e->getMessage(), [
                'package_id' => $package->id,
                'user_id' => Auth::id(),
            ]);
            Toastr::error('Something went wrong. Please try again later.', 'Error');

            return redirect()->route('sessionPackage.checkout', $package->id);
        }
    }

    /**
     * Hire remaining sessions against an already-paid package purchase.
     */
    public function hireFromPurchase($purchaseId)
    {
        $this->guardStudentBuyer();

        $purchase = $this->findOwnedPurchase($purchaseId);
        if ($purchase->remainingSessions() <= 0) {
            Toastr::error('No remaining sessions in this package.', 'Error');

            return redirect()->route('myPackage.details', $purchase->id);
        }

        $tutors = $this->eligibleTutors();

        return view(theme('pages.tutorSessionPackageHire'), compact('purchase', 'tutors'));
    }

    public function hireTutorSlot($purchaseId, $tutorId)
    {
        $this->guardStudentBuyer();

        $purchase = $this->findOwnedPurchase($purchaseId);
        if ($purchase->remainingSessions() <= 0) {
            Toastr::error('No remaining sessions in this package.', 'Error');

            return redirect()->route('myPackage.details', $purchase->id);
        }

        $tutor = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->findOrFail($tutorId);

        $courses = Course::where('user_id', $tutor->id)->where('status', 1)->where('type', 1)->get();

        return view(theme('pages.tutorSessionPackageHireSlot'), compact('purchase', 'tutor', 'courses'));
    }

    public function hireAddSession(Request $request, $purchaseId)
    {
        $this->guardStudentBuyer();

        $purchase = $this->findOwnedPurchase($purchaseId);
        if ($purchase->remainingSessions() <= 0) {
            Toastr::error('No remaining sessions in this package.', 'Error');

            return redirect()->route('myPackage.details', $purchase->id);
        }

        $request->validate([
            'tutor_id' => 'required|integer',
            'course_id' => 'required|integer',
            'date' => 'required|date',
            'time_slot' => 'required|integer',
        ]);

        $tutor = User::query()->where('role_id', 2)->findOrFail($request->tutor_id);
        $course = Course::where('id', $request->course_id)
            ->where('user_id', $tutor->id)
            ->where('status', 1)
            ->firstOrFail();

        $slot = TutorSlote::where('id', $request->time_slot)
            ->where('instructor_id', $tutor->id)
            ->firstOrFail();

        $date = Carbon::parse($request->date)->format('Y-m-d');

        $session = [
            'tutor_id' => (int) $tutor->id,
            'tutor_name' => $tutor->name,
            'course_id' => (int) $course->id,
            'course_title' => $course->title,
            'date' => $date,
            'slot_id' => (int) $slot->id,
            'start_time' => $slot->start_time,
            'end_time' => $slot->end_time,
        ];

        $fakeResponse = (object) ['id' => $purchase->tracking_id ?: ('pkg-' . $purchase->id)];
        $amountCents = (int) round(((float) $purchase->price) * 100);

        $this->createHiringFromPackageSession($purchase, $session, $fakeResponse, $amountCents);

        $purchase->sessions_used = (int) $purchase->sessions_used + 1;
        $purchase->save();

        Toastr::success('Tutor session booked from your package.', 'Success');

        return redirect()->route('myPackage.details', $purchase->id);
    }

    private function findOwnedPurchase($purchaseId): TutorSessionPackagePurchase
    {
        if (!Schema::hasTable('tutor_session_package_purchases')) {
            abort(404);
        }

        return TutorSessionPackagePurchase::where('user_id', Auth::id())
            ->where('status', 1)
            ->findOrFail($purchaseId);
    }

    private function confirmPackagePurchase(TutorSessionPackage $package, array $cart, $response, int $amountCents): TutorSessionPackagePurchase
    {
        $sessions = $cart['sessions'] ?? [];
        $used = count($sessions);

        $purchase = TutorSessionPackagePurchase::create([
            'user_id' => Auth::id(),
            'package_id' => $package->id,
            'package_name' => $package->name,
            'sessions_allowed' => (int) $package->sessions_count,
            'sessions_used' => $used,
            'price' => $amountCents / 100,
            'tracking_id' => $response->id ?? null,
            'payment_method' => 'authorizeNet',
            'status' => 1,
            'selected_sessions' => $sessions,
        ]);

        foreach ($sessions as $session) {
            $this->createHiringFromPackageSession($purchase, $session, $response, $amountCents);
        }

        return $purchase;
    }

    private function createHiringFromPackageSession(TutorSessionPackagePurchase $purchase, array $session, $response, int $amountCents): void
    {
        $slot = TutorSlote::find($session['slot_id'] ?? 0);
        if (!$slot) {
            return;
        }

        $meetingId = null;
        $joinUrl = null;
        $startUrl = null;

        try {
            $meetingDateTime = ($session['date'] ?? '') . ($slot->start_time ?? '');
            /** @var InstructorController $instructorController */
            $instructorController = app(InstructorController::class);
            $meeting = $instructorController->teamMeeting($meetingDateTime);
            if ($meeting && isset($meeting->id)) {
                $meetingId = $meeting->id;
                $joinUrl = $meeting->joinUrl ?? null;
                $startUrl = $meeting->joinWebUrl ?? null;
            }
        } catch (\Throwable $e) {
            \Log::warning('Package session Teams meeting skipped: ' . $e->getMessage());
        }

        $hiring = new TutorHiring();
        $hiring->instructor_id = (int) ($session['tutor_id'] ?? 0);
        $hiring->user_id = (int) Auth::id();
        $hiring->course_id = (int) ($session['course_id'] ?? 0);
        $hiring->tutor_slote_id = (int) $slot->id;
        $hiring->assign_date = $session['date'] ?? null;
        $hiring->assign_start_time = Carbon::parse($slot->start_time)->format('H:i:s');
        $hiring->assign_end_time = Carbon::parse($slot->end_time)->format('H:i:s');
        $hiring->meeting_id = $meetingId;
        $hiring->meeting_join_url = $joinUrl;
        $hiring->meeting_start_url = $startUrl;
        $hiring->tracking_id = $response->id ?? null;
        $hiring->price = $amountCents / 100;

        if (Schema::hasColumn('tutor_hirings', 'package_purchase_id')) {
            $hiring->package_purchase_id = $purchase->id;
        }

        $hiring->save();
    }

    private function clearCart(int $packageId): void
    {
        Session::forget($this->cartKey($packageId));
    }

    private function findActivePackage($id): TutorSessionPackage
    {
        if (!Schema::hasTable('tutor_session_packages')) {
            abort(404);
        }

        return TutorSessionPackage::query()
            ->where('status', 1)
            ->findOrFail($id);
    }

    private function cartKey(int $packageId): string
    {
        return 'session_package_cart_' . $packageId . '_user_' . Auth::id();
    }

    private function getCart(int $packageId): array
    {
        $cart = Session::get($this->cartKey($packageId), [
            'package_id' => $packageId,
            'sessions' => [],
        ]);

        if (!isset($cart['sessions']) || !is_array($cart['sessions'])) {
            $cart['sessions'] = [];
        }

        $cart['package_id'] = $packageId;

        return $cart;
    }

    private function putCart(int $packageId, array $cart): void
    {
        Session::put($this->cartKey($packageId), $cart);
    }

    private function eligibleTutors()
    {
        $query = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->whereNotNull('total_hours')
            ->where('total_hours', '>', 0)
            ->orderBy('name');

        return $query->get();
    }

    private function guardStudentBuyer(): void
    {
        if (function_exists('isTutor') && isTutor()) {
            abort(401);
        }
        if (function_exists('isInstructor') && isInstructor()) {
            abort(401);
        }
        if (function_exists('isAdmin') && isAdmin()) {
            abort(401);
        }
    }
}
