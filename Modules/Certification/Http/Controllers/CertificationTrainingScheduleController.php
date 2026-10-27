<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Schema;
use Modules\Certification\Entities\CertificationOffering;

class CertificationTrainingScheduleController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('certification_offerings')) {
            Toastr::error('Certification tables are missing. Run migration or live SQL.', 'Error');

            return view('certification::training-schedules.index', ['offerings' => collect()]);
        }

        $query = CertificationOffering::query()
            ->orderBy('sort_order')
            ->orderBy('id');

        $with = ['options:id,certification_offering_id,title'];
        if (Schema::hasTable('certification_categories')) {
            $with[] = 'category:id,name';
        }
        $query->with($with);

        if (Schema::hasTable('certification_offering_sessions')) {
            $query->withCount([
                'sessions as active_schedules_count' => function ($q) {
                    $q->where('status', 1);
                },
                'sessions as upcoming_schedules_count' => function ($q) {
                    $q->where('status', 1)->where('starts_at', '>=', now()->startOfDay());
                },
            ]);
        }

        $offerings = $query->get();

        return view('certification::training-schedules.index', compact('offerings'));
    }
}
