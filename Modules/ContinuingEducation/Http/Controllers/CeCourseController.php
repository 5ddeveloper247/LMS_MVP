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
}
