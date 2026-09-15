<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendGeneralEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Modules\StudentSetting\Entities\TutorReveiws;
use Modules\SystemSetting\Entities\TutorHiring;
use Modules\SystemSetting\Entities\TutorSessionPackagePurchase;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function myTutors(Request $request)
    {
        try {
            $tutors = TutorHiring::where('user_id', Auth::id())
                ->orderBy('assign_date', 'DESC')
                ->with('instructor', 'course', 'tutorReviewRating')
                ->paginate(9, ['*'], 'tutors_page');

            $packages = collect();
            if (Schema::hasTable('tutor_session_package_purchases')) {
                $packages = TutorSessionPackagePurchase::where('user_id', Auth::id())
                    ->where('status', 1)
                    ->orderByDesc('id')
                    ->paginate(9, ['*'], 'packages_page');
            }

            $activeTab = $request->get('tab') === 'packages' ? 'packages' : 'tutors';

            return view(theme('pages.myTutors'), compact('tutors', 'packages', 'activeTab'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function myPackageDetails($id)
    {
        try {
            if (!Schema::hasTable('tutor_session_package_purchases')) {
                abort(404);
            }

            $purchase = TutorSessionPackagePurchase::where('user_id', Auth::id())
                ->where('status', 1)
                ->findOrFail($id);

            $hirings = collect();
            if (Schema::hasColumn('tutor_hirings', 'package_purchase_id')) {
                $hirings = TutorHiring::where('user_id', Auth::id())
                    ->where('package_purchase_id', $purchase->id)
                    ->with('instructor', 'course', 'tutorReviewRating')
                    ->orderByDesc('assign_date')
                    ->get();
            }

            return view(theme('pages.myPackageDetails'), compact('purchase', 'hirings'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function cancelRequest(Request $request, $id)
    {
        $record = TutorHiring::find($id);

        $record->cancel_request = '1';
        $record->save();
        return redirect()->back();
    }

    public function tutorReview(Request $request)
    {
        $request->validate([
            'reviews' => 'required|min:5',
            'rating' => 'required|integer',
        ]);

        $tutor_review = new TutorReveiws();
        $tutor_review->user_id = Auth::id();
        $tutor_review->status = 1;
        $tutor_review->comment = $request->reviews;
        $tutor_review->star = $request->rating;
        $tutor_review->instructor_id = $request->instructor_id;
        $tutor_review->hiring_id = $request->hiring_id;
        $tutor_review->lms_id = null;
        $tutor_review->save();
        if ($tutor_review) {

            SendGeneralEmail::dispatch(User::find($request->instructor_id), 'Tutor_Review', [
                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                'username' => Auth::user()->name,
                'review' => $tutor_review->comment,
                'star' => $tutor_review->star,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Thank You For Review!'
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'Something Went Wrong!'
            ]);
        }
    }
}
