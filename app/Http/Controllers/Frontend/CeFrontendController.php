<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ContinuingEducation\Services\CeCatalogService;
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
            'ceCatalog' => $this->catalogService,
        ]);
    }

    public function rnLpn()
    {
        return view(theme('pages.continuingEducationRnLpn'));
    }

    public function aprn()
    {
        return view(theme('pages.continuingEducationAprn'));
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

        $isEnrolled = 0;
        $enrollmentRecord = null;

        return view(theme('pages.ceCourseDetails'), compact(
            'request',
            'course',
            'ceCourse',
            'isEnrolled',
            'enrollmentRecord'
        ));
    }
}
