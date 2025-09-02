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

class FloridaFeaturedProgramPlan extends Component
{

    public function render()
    {

        $home_content = app('getHomeContent');
        $florida_programplan = getRawHomeContents($home_content,'florida_programplan','en') ?? 0;
        $florida_programplan_bg = getRawHomeContents($home_content,'florida_programplan_bg','en');
            $programplan = PaymentPlans::where('id',$florida_programplan)
            ->where('type','program')->where('edate','>=',Carbon::today())
            ->first();
        return view(theme('components.florida-featured-program-plan'), compact('programplan','florida_programplan_bg'));
    }
}
