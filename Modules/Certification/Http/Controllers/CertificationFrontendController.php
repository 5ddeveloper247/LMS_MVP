<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Certification\Services\CertificationCatalogService;
use Modules\Certification\Services\CertificationStudentDashboardService;

class CertificationFrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index(CertificationCatalogService $catalog)
    {
        return view(theme('pages.certifications'), $catalog->hubCatalog());
    }

    public function show(string $slug, CertificationCatalogService $catalog)
    {
        $offering = $catalog->resolvePublishedSlug($slug);
        if (! $offering) {
            abort(404);
        }

        $canonical = $catalog->routeSlug($offering);
        if (strtolower($slug) !== strtolower($canonical)) {
            return redirect()->route('certifications.show', ['slug' => $canonical], 301);
        }

        return view(theme('pages.certificationDetail'), $catalog->detailPage($offering));
    }

    public function enroll(string $slug, CertificationCatalogService $catalog)
    {
        $offering = $catalog->resolvePublishedSlug($slug);
        if (! $offering) {
            abort(404);
        }

        $canonical = $catalog->routeSlug($offering);
        if (strtolower($slug) !== strtolower($canonical)) {
            return redirect()->route('certifications.enroll', ['slug' => $canonical], 301);
        }

        return view(theme('pages.certificationEnroll'), $catalog->enrollPage($offering));
    }

    public function studentPortal(CertificationStudentDashboardService $dashboard)
    {
        if (! $dashboard->isAvailable()) {
            return redirect()->route('studentDashboard');
        }

        $certificationDashboard = $dashboard->forUser(Auth::user());

        return view(theme('pages.myLifeSupportCertifications'), compact('certificationDashboard'));
    }
}
