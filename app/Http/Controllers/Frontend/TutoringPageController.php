<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Isolated controller for the public Tutoring landing page.
 */
class TutoringPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        $tutors = User::query()
            ->where('role_id', 2)
            ->where('status', '1')
            ->whereNotNull('total_hours')
            ->where('total_hours', '>', 0);

        if (Schema::hasColumn('users', 'is_featured')) {
            $tutors->where('is_featured', 1);
        }

        $tutors = $tutors
            ->orderBy('total_rating', 'desc')
            ->limit(3)
            ->get();

        $personalByUserId = collect();
        if ($tutors->isNotEmpty()) {
            $personalByUserId = DB::table('instructors_personal_info')
                ->whereIn('user_id', $tutors->pluck('id'))
                ->get()
                ->keyBy('user_id');
        }

        return view(theme('pages.tutoring'), compact('tutors', 'personalByUserId'));
    }
}
