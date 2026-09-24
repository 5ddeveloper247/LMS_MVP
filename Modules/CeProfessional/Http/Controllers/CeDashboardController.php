<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\CeProfessional\Services\CeDashboardService;

class CeDashboardController extends Controller
{
    protected $ceDashboardService;

    public function __construct(CeDashboardService $ceDashboardService)
    {
        $this->ceDashboardService = $ceDashboardService;
    }

    public function index()
    {
        $data = $this->ceDashboardService->getDashboardData(Auth::user());

        return view('ceprofessional::dashboard.index', $data);
    }
}
