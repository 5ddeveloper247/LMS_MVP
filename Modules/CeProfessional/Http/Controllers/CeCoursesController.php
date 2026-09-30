<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\CeProfessional\Services\CeDashboardService;

class CeCoursesController extends Controller
{
    public function __construct(
        protected CeDashboardService $ceDashboardService
    ) {
    }

    public function index()
    {
        $data = $this->ceDashboardService->getCoursesPageData(Auth::user());

        return view('ceprofessional::courses.index', $data);
    }
}
