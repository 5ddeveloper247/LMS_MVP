<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use InvalidArgumentException;
use Modules\ContinuingEducation\Http\Requests\StoreCeBundleRequest;
use Modules\ContinuingEducation\Http\Requests\UpdateCeBundleRequest;
use Modules\ContinuingEducation\Services\CeBundleService;

class CeBundleController extends Controller
{
    public function __construct(
        protected CeBundleService $bundleService
    ) {}

    public function index()
    {
        try {
            $bundles = $this->bundleService->listForAdmin();
            $licenseTypes = config('continuingeducation.bundle_license_types', []);
            $cardStyles = config('continuingeducation.bundle_card_styles', []);

            return view('continuingeducation::bundles.index', compact(
                'bundles',
                'licenseTypes',
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
        $licenseTypes = config('continuingeducation.bundle_license_types', []);
        $cardStyles = config('continuingeducation.bundle_card_styles', []);
        $selectedLicenseType = old('license_type', request('license_type'));
        $mandatoryCourses = $selectedLicenseType
            ? $this->bundleService->mandatoryCoursesForForm($selectedLicenseType)
            : collect();
        $selectedCourseIds = array_map('intval', old('mandatory_course_ids', []));

        return view('continuingeducation::bundles.create', compact(
            'licenseTypes',
            'cardStyles',
            'mandatoryCourses',
            'selectedLicenseType',
            'selectedCourseIds'
        ));
    }

    public function mandatoryCourses()
    {
        $licenseType = request('license_type');

        if (! in_array($licenseType, ['rn_lpn', 'aprn'], true)) {
            return response()->json([
                'courses' => [],
                'message' => 'Select a valid license type.',
            ], 422);
        }

        return response()->json([
            'courses' => $this->bundleService->mandatoryCoursesPayloadForLicenseType($licenseType),
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
        $licenseTypes = config('continuingeducation.bundle_license_types', []);
        $cardStyles = config('continuingeducation.bundle_card_styles', []);
        $selectedLicenseType = old('license_type', request('license_type', $bundle->license_type));
        $mandatoryCourses = $this->bundleService->mandatoryCoursesForForm($selectedLicenseType);
        $selectedCourseIds = old(
            'mandatory_course_ids',
            $bundle->courses->pluck('id')->map(fn ($id) => (int) $id)->all()
        );

        return view('continuingeducation::bundles.edit', compact(
            'bundle',
            'licenseTypes',
            'cardStyles',
            'mandatoryCourses',
            'selectedLicenseType',
            'selectedCourseIds'
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
