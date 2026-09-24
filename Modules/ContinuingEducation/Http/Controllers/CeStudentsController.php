<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class CeStudentsController extends Controller
{
    public function index()
    {
        try {
            $students = [];
            $pageTitle = 'CE Students';
            $dataUrl = route('continuing-education.students.data');
            $showAgreementForm = false;
            $hideEnrollmentTabs = true;

            return view('studentsetting::student_list', compact(
                'students',
                'pageTitle',
                'dataUrl',
                'showAgreementForm',
                'hideEnrollmentTabs'
            ));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $ceRoleId = (int) config('ceprofessional.role_id', 10);
            $student = User::with('userCountry')->findOrFail($id);

            if ((int) $student->role_id !== $ceRoleId) {
                abort(404);
            }

            $profile = app(CeProfessionalRepositoryInterface::class)->findByUserId((int) $id);
            $licenseTypes = config('ceprofessional.license_types', []);

            return view('continuingeducation::students.show', compact(
                'student',
                'profile',
                'licenseTypes'
            ));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('continuing-education.students.index');
        }
    }

    public function getAllStudentData(Request $request)
    {
        $user = Auth::user();
        $ceRoleId = (int) config('ceprofessional.role_id', 10);

        $query = User::query();

        if (isModuleActive('LmsSaas')) {
            $query->where('lms_id', app('institute')->id);
        } else {
            $query->where('lms_id', 1);
        }

        if (isModuleActive('UserType')) {
            $query->whereHas('userRoles', function ($q) use ($ceRoleId) {
                $q->where('role_id', $ceRoleId);
            });
        } else {
            $query->where('role_id', $ceRoleId);
        }

        if (isModuleActive('Organization') && $user->isOrganization()) {
            $query->where('organization_id', $user->id);
        }

        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('image', function ($query) {
                return view('backend.partials._td_image', compact('query'));
            })->editColumn('name', function ($query) {
                return $query->name;
            })->editColumn('email', function ($query) {
                return $query->email;
            })
            ->editColumn('phone', function ($query) {
                return $query->phone;
            })
            ->editColumn('gender', function ($query) {
                return ucfirst($query->gender);
            })
            ->editColumn('dob', function ($query) {
                return showDate($query->dob);
            })
            ->addColumn('start_working_date', function ($query) {
                if (isModuleActive('Org')) {
                    return showDate($query->start_working_date);
                }

                return '';
            })
            ->editColumn('country', function ($query) {
                return $query->userCountry->name;
            })
            ->editColumn('enrolled', function ($query) {
                return $query->enrolled ?? '';
            })
            ->editColumn('reg_src', function ($query) {
                return $query->register_source ?? '';
            })
            ->editColumn('enrolled_date', function ($query) {
                return $query->enrolled_date ?? '';
            })
            ->editColumn('preregister_date', function ($query) {
                return $query->preregister_date ?? '';
            })
            ->addColumn('status', function ($query) {
                $route = 'student.change_status';

                return view('backend.partials._td_status', compact('query', 'route'));
            })->addColumn('course_count', function ($query) {
                return view('studentsetting::partials._td_course_count', compact('query'));
            })->addColumn('program_count', function ($query) {
                return view('studentsetting::partials._td_program_count', compact('query'));
            })->addColumn('action', function ($query) {
                return view('continuingeducation::partials._td_action', compact('query'));
            })->rawColumns(['status', 'image', 'course_count', 'program_count', 'action'])
            ->make(true);
    }
}
