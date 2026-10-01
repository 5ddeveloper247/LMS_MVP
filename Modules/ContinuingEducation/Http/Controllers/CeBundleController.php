<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use InvalidArgumentException;
use Modules\ContinuingEducation\Http\Requests\StoreCeBundleRequest;
use Modules\ContinuingEducation\Http\Requests\UpdateCeBundleRequest;
use Modules\ContinuingEducation\Services\CeBundleService;
use Modules\ContinuingEducation\Services\CeLicenseService;

class CeBundleController extends Controller
{
    public function __construct(
        protected CeBundleService $bundleService,
        protected CeLicenseService $licenseService
    ) {}

    public function index()
    {
        try {
            $bundles = $this->bundleService->listForAdmin();
            $cardStyles = config('continuingeducation.bundle_card_styles', []);

            return view('continuingeducation::bundles.index', compact(
                'bundles',
                'cardStyles'
            ));
        } catch (\Exception $e) {
            report($e);
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('dashboard');
        }
    }

    public function create()
    {
        $licenses = $this->licenseService->listActiveForForms();
        $cardStyles = config('continuingeducation.bundle_card_styles', []);
        $selectedLicenseId = old('ce_license_type_id', request('ce_license_type_id'));
        $selectedLicenseId = $selectedLicenseId !== null && $selectedLicenseId !== ''
            ? (int) $selectedLicenseId
            : null;
        $mandatoryCourses = $selectedLicenseId
            ? $this->bundleService->mandatoryCoursesForLicenseId($selectedLicenseId)
            : collect();
        $electiveCourses = $selectedLicenseId
            ? $this->bundleService->electiveCoursesForLicenseId($selectedLicenseId)
            : collect();
        $selectedCourseIds = array_map('intval', old('mandatory_course_ids', []));
        $selectedElectiveCourseIds = array_map('intval', old('elective_course_ids', []));

        return view('continuingeducation::bundles.create', compact(
            'licenses',
            'cardStyles',
            'mandatoryCourses',
            'electiveCourses',
            'selectedLicenseId',
            'selectedCourseIds',
            'selectedElectiveCourseIds'
        ));
    }

    public function mandatoryCourses()
    {
        $licenseId = (int) request('ce_license_type_id');

        if ($licenseId <= 0) {
            return response()->json([
                'courses' => [],
                'mandatory' => [],
                'elective' => [],
                'message' => 'Select a valid license.',
            ], 422);
        }

        try {
            $this->licenseService->findActiveForLms($licenseId);
        } catch (\Exception $e) {
            return response()->json([
                'courses' => [],
                'mandatory' => [],
                'elective' => [],
                'message' => 'Select a valid active license.',
            ], 422);
        }

        $payload = $this->bundleService->coursesPayloadForLicenseId($licenseId);

        return response()->json([
            'courses' => $payload['mandatory'],
            'mandatory' => $payload['mandatory'],
            'elective' => $payload['elective'],
        ]);
    }

    public function store(StoreCeBundleRequest $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $this->bundleService->create($request->toPayload());
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.bundles.index');
        } catch (InvalidArgumentException $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));

            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $bundle = $this->bundleService->findForLms((int) $id);
        $licenses = $this->licenseService->listActiveForForms();
        $cardStyles = config('continuingeducation.bundle_card_styles', []);
        $selectedLicenseId = old(
            'ce_license_type_id',
            request('ce_license_type_id', $bundle->ce_license_type_id)
        );
        $selectedLicenseId = $selectedLicenseId !== null && $selectedLicenseId !== ''
            ? (int) $selectedLicenseId
            : null;
        $mandatoryCourses = $selectedLicenseId
            ? $this->bundleService->mandatoryCoursesForLicenseId($selectedLicenseId)
            : collect();
        $electiveCourses = $selectedLicenseId
            ? $this->bundleService->electiveCoursesForLicenseId($selectedLicenseId)
            : collect();
        $selectedCourseIds = old(
            'mandatory_course_ids',
            $bundle->mandatoryCourses->pluck('id')->map(fn ($id) => (int) $id)->all()
        );
        $selectedElectiveCourseIds = old(
            'elective_course_ids',
            $bundle->electiveCourses->pluck('id')->map(fn ($id) => (int) $id)->all()
        );

        return view('continuingeducation::bundles.edit', compact(
            'bundle',
            'licenses',
            'cardStyles',
            'mandatoryCourses',
            'electiveCourses',
            'selectedLicenseId',
            'selectedCourseIds',
            'selectedElectiveCourseIds'
        ));
    }

    public function update(UpdateCeBundleRequest $request, $id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $bundle = $this->bundleService->findForLms((int) $id);
            $this->bundleService->update($bundle, $request->toPayload());
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.bundles.index');
        } catch (InvalidArgumentException $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));

            return redirect()->back()->withInput();
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
            $bundle = $this->bundleService->findForLms((int) $id);
            $this->bundleService->delete($bundle);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.bundles.index');
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
            $bundle = $this->bundleService->findForLms((int) $id);
            $this->bundleService->toggleStatus($bundle);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.bundles.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }
}
