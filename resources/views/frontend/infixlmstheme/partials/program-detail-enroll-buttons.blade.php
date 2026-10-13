@php
    $installmentCount = 0;
    if (!empty($plan->initialProgramPalnDetail)) {
        $installmentCount = count($plan->initialProgramPalnDetail);
    } elseif (!empty($plan->programPalnDetail)) {
        $installmentCount = count($plan->programPalnDetail);
    }
    $planEnrolled = $planEnrolled ?? \Modules\CourseSetting\Entities\CourseEnrolled::where('program_id', $program_detail->id)
        ->where('plan_id', $plan->id)->where('status', 1)->count();
    $planCapacity = (int) ($plan->no_of_students ?? 0);
    $planFull = $planCapacity > 0 && $planEnrolled >= $planCapacity;
    $planClosed = \Carbon\Carbon::parse($plan->edate)->isPast();
    $btnClass = $buttonClass ?? 'pd-btn-plan enroll addToCartBuyNow';
    $cartClass = $cartButtonClass ?? 'pd-btn-plan waitlist addToCartBuyNow';
@endphp

@if($planClosed)
    <span class="pd-btn-plan pd-disabled">Closed</span>
@elseif($planFull)
    <span class="pd-btn-plan pd-disabled">Full</span>
@elseif(Auth::check() && ($isEnrolled ?? false) && !isAdmin())
    <span class="pd-btn-plan pd-disabled">Enrolled</span>
@else
    <a href="javascript:void(0)"
       class="{{ $btnClass }}"
       data-installment="{{ $installmentCount }}"
       data-url="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $plan->id]) }}">
        Enroll Now →
    </a>
    <a href="javascript:void(0)"
       class="{{ $cartClass }}"
       style="margin-top: 6px;"
       data-installment="{{ $installmentCount }}"
       data-url="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $plan->id]) }}">
        Add to Cart
    </a>
@endif
