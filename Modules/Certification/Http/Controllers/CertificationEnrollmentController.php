<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Modules\Certification\Entities\CertificationEnrollment;
use Modules\Certification\Entities\CertificationOffering;
use Yajra\DataTables\Facades\DataTables;

class CertificationEnrollmentController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('certification_enrollments')) {
            Toastr::error('Enrollment table is missing. Run migration or live SQL.', 'Error');

            return view('certification::enrollments.index', ['offerings' => collect()]);
        }

        $query = CertificationOffering::query()
            ->orderBy('sort_order')
            ->orderBy('id');

        if (Schema::hasTable('certification_categories')) {
            $query->with('category:id,name');
        }

        $offerings = $query
            ->withCount('enrollments')
            ->get();

        return view('certification::enrollments.index', compact('offerings'));
    }

    public function offering(int $offeringId)
    {
        if (! Schema::hasTable('certification_enrollments')) {
            Toastr::error('Enrollment table is missing. Run migration or live SQL.', 'Error');

            return redirect()->route('certificationEnrollments.index');
        }

        $offering = CertificationOffering::query()->findOrFail($offeringId);

        return view('certification::enrollments.offering', compact('offering'));
    }

    public function offeringData(Request $request, int $offeringId)
    {
        $query = CertificationEnrollment::query()
            ->where('certification_offering_id', $offeringId)
            ->with('user:id,name,email,image')
            ->orderByDesc('id');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image', function (CertificationEnrollment $enrollment) {
                $user = $enrollment->user;
                $image = $user ? getStudentImage($user->image) : asset('public/uploads/default/user.png');

                return '<div class="profile_info"><img src="'.$image.'" alt=""></div>';
            })
            ->addColumn('student_name', fn (CertificationEnrollment $enrollment) => e($enrollment->registrantName()))
            ->addColumn('email', fn (CertificationEnrollment $enrollment) => e($enrollment->registrantEmail()))
            ->addColumn('option', fn (CertificationEnrollment $enrollment) => e($enrollment->option_title))
            ->addColumn('class_date', fn (CertificationEnrollment $enrollment) => e($enrollment->classDateLabel()))
            ->addColumn('payment', function (CertificationEnrollment $enrollment) {
                return e(ucfirst((string) $enrollment->payment_status))
                    .' · '.getPriceFormat($enrollment->total_paid);
            })
            ->addColumn('enrolled_at', fn (CertificationEnrollment $enrollment) => showDate($enrollment->created_at))
            ->addColumn('action', function (CertificationEnrollment $enrollment) {
                return '<a href="'.route('certificationEnrollments.show', $enrollment->id).'" class="primary-btn tr-bg">'
                    .__('common.View').'</a>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function show(int $id)
    {
        if (! Schema::hasTable('certification_enrollments')) {
            Toastr::error('Enrollment table is missing. Run migration or live SQL.', 'Error');

            return redirect()->route('certificationEnrollments.index');
        }

        $enrollment = CertificationEnrollment::query()
            ->with(['user', 'offering.category', 'option'])
            ->findOrFail($id);

        $data = is_array($enrollment->enrollment_data) ? $enrollment->enrollment_data : [];

        return view('certification::enrollments.show', compact('enrollment', 'data'));
    }
}
