<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\ContinuingEducation\Services\CeCatalogService;

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
}
