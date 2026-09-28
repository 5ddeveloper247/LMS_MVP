<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Modules\ContinuingEducation\Http\Requests\StoreCeCourseRequest;
use Modules\ContinuingEducation\Http\Requests\UpdateCeCourseRequest;
use Modules\ContinuingEducation\Services\CeCourseFormDataService;
use Modules\ContinuingEducation\Services\CeCourseService;
use Yajra\DataTables\Facades\DataTables;

class CeCourseController extends Controller
{
    public function __construct(
        protected CeCourseService $courseService,
        protected CeCourseFormDataService $formDataService
    ) {}

    public function index(Request $request)
    {
        try {
            $activeTab = in_array($request->query('tab'), ['mandatory', 'elective'], true)
                ? $request->query('tab')
                : 'mandatory';

            $mandatoryCourses = $this->courseService->listForAdmin('mandatory');
            $electiveCourses = $this->courseService->listForAdmin('elective');
            $courseTypes = config('continuingeducation.course_types', []);

            return view('continuingeducation::courses.index', compact(
                'mandatoryCourses',
                'electiveCourses',
                'activeTab',
                'courseTypes'
            ));
        } catch (\Exception $e) {
            report($e);
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('dashboard');
        }
    }

    public function create()
    {
        return view('continuingeducation::courses.create', $this->formDataService->get());
    }

    public function store(StoreCeCourseRequest $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $this->courseService->create(
                $request->toPayload(),
                $request->file('image')
            );

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.courses.index', [
                'tab' => $request->input('course_type', 'mandatory'),
            ]);
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $course = $this->courseService->findForLms((int) $id);

        return view('continuingeducation::courses.edit', array_merge(
            $this->formDataService->get(),
            compact('course')
        ));
    }

    public function update(UpdateCeCourseRequest $request, $id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $course = $this->courseService->findForLms((int) $id);
            $this->courseService->update(
                $course,
                $request->toPayload(),
                $request->file('image')
            );

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.courses.index', [
                'tab' => $request->input('course_type', $course->course_type),
            ]);
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $course = $this->courseService->findForLms((int) $id);
            $tab = request('tab', $course->course_type);
            $this->courseService->delete($course);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.courses.index', compact('tab'));
        } catch (InvalidArgumentException $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));

            return redirect()->route('continuing-education.courses.index', [
                'tab' => request('tab', 'mandatory'),
            ]);
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function status($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $course = $this->courseService->findForLms((int) $id);
            $tab = request('tab', $course->course_type);
            $this->courseService->toggleStatus($course);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.courses.index', compact('tab'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function enrolledStudents($id)
    {
        try {
            $course = $this->courseService->findForLms((int) $id);

            return view('continuingeducation::courses.enrolled_students', compact('course'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('continuing-education.courses.index');
        }
    }

    public function enrolledStudentsData(Request $request, $id)
    {
        $course = $this->courseService->findForLms((int) $id);
        $linkedCourse = $course->linkedCourse;
        $query = $course->enrollments()->with(['user.userCountry']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image', function ($enrollment) {
                $user = $enrollment->user;

                return '<div class="profile_info"><img src="' . getStudentImage($user->image) . '" alt="' . e($user->name) . ' image"></div>';
            })
            ->addColumn('student_name', function ($enrollment) {
                $user = $enrollment->user;

                if (permissionCheck('continuing-education.students.index')) {
                    return '<a class="dropdown-item" target="_blank" href="' . route('continuing-education.students.show', $user->id) . '" data-id="' . $user->id . '" type="button">' . e($user->name) . '</a>';
                }

                return e($user->name);
            })
            ->editColumn('email', fn ($enrollment) => $enrollment->user->email ?? '')
            ->addColumn('enrollment_status', function ($enrollment) {
                return ucwords(str_replace('_', ' ', (string) $enrollment->status));
            })
            ->addColumn('progressbar', function ($enrollment) use ($linkedCourse) {
                $percent = (int) $enrollment->progress;

                if ($linkedCourse && $enrollment->user) {
                    $percent = max(
                        $percent,
                        (int) round($linkedCourse->userTotalPercentage($enrollment->user->id, $linkedCourse->id))
                    );
                }

                return '<div class="progress_percent flex-fill text-right">
                    <div class="progress theme_progressBar">
                        <div class="progress-bar" role="progressbar"
                            style="width:' . $percent . '%"
                            aria-valuenow="' . $percent . '"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="font_14 f_w_400">' . $percent . '% Complete</p>
                </div>';
            })
            ->addColumn('enrolled_at', fn ($enrollment) => showDate($enrollment->created_at))
            ->addColumn('action', function ($enrollment) {
                if (!permissionCheck('continuing-education.students.index')) {
                    return '';
                }

                return '<a href="' . route('continuing-education.students.show', $enrollment->user_id) . '" class="primary-btn tr-bg" target="_blank">' . __('common.View') . '</a>';
            })
            ->rawColumns(['image', 'student_name', 'progressbar', 'action'])
            ->make(true);
    }
}
