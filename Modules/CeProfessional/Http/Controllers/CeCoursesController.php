<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\CeProfessional\Services\CeDashboardService;

class CeCoursesController extends Controller
{
    public function __construct(
        protected CeDashboardService $ceDashboardService
    ) {
    }

    public function index(Request $request)
    {
        $data = $this->ceDashboardService->getCoursesPageData(Auth::user());
        $data['activeView'] = $request->query('view') === 'bundles' ? 'bundles' : 'courses';

        return view('ceprofessional::courses.index', $data);
    }
}
