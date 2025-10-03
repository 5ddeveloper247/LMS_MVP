<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Modules\Payment\Entities\Checkout;
use Modules\SystemSetting\Entities\PackagePurchasing;
use Carbon\Carbon;

class MyInvoicePageSection extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $enroll = Checkout::where('id', $this->id);
        if (Auth::user()->role_id != 1) {
            $enroll =  $enroll->where('user_id', Auth::user()->id);
        }
        $enroll = $enroll->with('courses', 'billing', 'user', 'user.userCountry', 'courses.course', 'courses.program', 'tutorHirings', 'tutorHirings.instructor', 'studentIstallment.program', 'studentIstallment.plan','orders.product')->first();
        if (!$enroll) {
            abort(404);
        }
        $createdAt = Carbon::parse($enroll->created_at);
        $purchasing = ($enroll->type == 'package') ? PackagePurchasing::where('user_id',$enroll->user_id)->whereBetween('created_at',[$createdAt->subMinute(), $createdAt->addMinute()])->first() : null;
        return view(theme('components.my-invoice-page-section'), compact('enroll', 'purchasing'));
    }
}
