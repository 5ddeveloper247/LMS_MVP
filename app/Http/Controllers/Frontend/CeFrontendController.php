<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\ContinuingEducation\Services\CeCatalogService;
use Modules\ContinuingEducation\Services\CeEnrollmentService;
use Modules\CourseSetting\Entities\Course;

class CeFrontendController extends Controller
{
    public function __construct(
        protected CeCatalogService $catalogService
    ) {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        $catalog = $this->catalogService->listPublishedCatalog();

        return view(theme('pages.continuingEducation'), [
            'mandatoryCourses' => $catalog['mandatory'],
            'electiveCourses' => $catalog['elective'],
            'catalogCourseCount' => $catalog['total'],
            'licenseTypes' => $this->catalogService->listPublishedLicenses(),
            'bundlesByLicense' => $this->catalogService->listPublishedBundlePreviewsByLicense(),
            'ceCatalog' => $this->catalogService,
        ]);
    }

    public function rnLpn()
    {
        return view(theme('pages.continuingEducationRnLpn'), array_merge(
            $this->catalogService->licenseDetailPageData('rn_lpn'),
            [
                'bundles' => $this->catalogService->listPublishedBundles('rn_lpn'),
            ]
        ));
    }

    public function aprn()
    {
        return view(theme('pages.continuingEducationAprn'), array_merge(
            $this->catalogService->licenseDetailPageData('aprn'),
            [
                'bundles' => $this->catalogService->listPublishedBundles('aprn'),
            ]
        ));
    }

    public function cna()
    {
        return view(theme('pages.continuingEducationCna'), array_merge(
            $this->catalogService->licenseDetailPageData('cna'),
            [
                'bundles' => $this->catalogService->listPublishedBundles('cna'),
            ]
        ));
    }

    public function showBundle(string $slug)
    {
        $bundle = $this->catalogService->findPublishedBundleBySlug($slug);
        $data = $this->catalogService->bundleDetailPageData($bundle);

        $user = Auth::user();
        if ($user && function_exists('userIsCeProfessional') && userIsCeProfessional($user)) {
            $purchase = $this->catalogService->findOwnedBundlePurchase($user, $bundle);
            if ($purchase) {
                $data = $this->catalogService->ownedBundleDetailPageData($bundle, $purchase);
            }
        }

        return view(theme('pages.ceBundleDetails'), $data);
    }

    public function showCourse(string $slug, Request $request)
    {
        $ceCourse = $this->catalogService->findPublishedBySlug($slug);

        if (! $ceCourse->course_id) {
            abort(404);
        }

        $course = Course::with(
            'enrollUsers',
            'user',
            'user.courses',
            'user.courses.enrollUsers',
            'user.courses.lessons',
            'chapters.lessons',
            'enrolls',
            'lessons',
            'reviews',
            'chapters',
            'activeReviews',
            'children',
            'category'
        )->findOrFail($ceCourse->course_id);

        $ceCourse->increment('view_count');

        $lmsCourseType = (int) config('continuingeducation.lms_course_type', 11);
        $request->merge(['courseType' => $lmsCourseType]);

        $isEnrolled = 0;
        $enrollmentRecord = null;

        if (Auth::check()) {
            $enrollmentService = app(CeEnrollmentService::class);
            $isEnrolled = $enrollmentService->userHasEnrollment(Auth::user(), $ceCourse) ? 1 : 0;
            $enrollmentRecord = $enrollmentService->lmsEnrollmentFor(Auth::user(), $ceCourse);
        }

        return view(theme('pages.ceCourseDetails'), compact(
            'request',
            'course',
            'ceCourse',
            'isEnrolled',
            'enrollmentRecord'
        ));
    }
}

