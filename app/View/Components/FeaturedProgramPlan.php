<?php

namespace App\View\Components;

use Brian2694\Toastr\Facades\Toastr;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Component;
use Carbon\Carbon;
use Modules\FrontendManage\Entities\Slider;
use Modules\Payment\Entities\PaymentPlans;

class FeaturedProgramPlan extends Component
{

    public function render()
    {

        $home_content = app('getHomeContent');
        $featured_programplan = getRawHomeContents($home_content,'featured_programplan','en') ?? 0;
        $featured_programplan_bg = getRawHomeContents($home_content,'featured_programplan_bg','en');
            $programplan = PaymentPlans::where('id',$featured_programplan)
            ->where('type','program')->where('edate','>=',Carbon::today())
            ->first();
        return view(theme('components.featured-program-plan'), compact('programplan','featured_programplan_bg'));
    }
}
