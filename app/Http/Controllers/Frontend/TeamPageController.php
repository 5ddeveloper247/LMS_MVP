<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Schema;

/**
 * Isolated controller for the public Our Team page.
 * Keep team-page logic here so other frontend controllers stay untouched.
 */
class TeamPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        // Same "marked as tutor" rule used by the instructors listing page
        $tutors = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->whereNotNull('total_hours')
            ->orderBy('total_rating', 'desc')
            ->get();

        $paulaImage = null;
        try {
            if (Schema::hasTable('home_contents')) {
                $paulaImage = \Modules\FrontendManage\Entities\HomeContent::where('key', 'home_tile1_image')
                    ->value('value');
            }
        } catch (\Throwable $e) {
            $paulaImage = null;
        }

        return view(theme('pages.team'), compact('tutors', 'paulaImage'));
    }
}
