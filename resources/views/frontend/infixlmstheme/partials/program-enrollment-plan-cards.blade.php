@php
    $planCards = collect();
    if (!empty($currentPlan)) {
        $planCards->push(['plan' => $currentPlan, 'label' => 'Current plan']);
    }
    if (!empty($upcomingPlans) && $upcomingPlans->count()) {
        foreach ($upcomingPlans as $index => $plan) {
            if ($planCards->contains(fn ($item) => $item['plan']->id === $plan->id)) {
                continue;
            }
            $planCards->push(['plan' => $plan, 'label' => 'Upcoming plan']);
        }
    }
@endphp

@if($planCards->count() > 0)
    <div class="mb-4">
        <h5 class="custom_small_heading font-weight-bold custom_heading_1 mb-3">Current &amp; upcoming plans</h5>
        <div class="row">
            @foreach($planCards as $card)
                @php
                    $plan = $card['plan'];
                    $planEnrolled = $plan->programPlanViseEnrollCount ?? 0;
                    $planCapacity = $plan->no_of_students ?? 0;
                    $planFull = $planCapacity > 0 && $planEnrolled >= $planCapacity;
                    $planClosed = \Carbon\Carbon::parse($plan->edate)->isPast();
                    $installmentCount = isset($plan->programPalnDetail) ? count($plan->programPalnDetail) : 0;
                @endphp
                <div class="col-md-6 mb-3">
                    <div class="custom_section_color rounded_section p-3 h-100">
                        <p class="program-span mb-1 text-uppercase" style="letter-spacing:1px;font-size:11px;color:#ff7600;">{{ $card['label'] }}</p>
                        <h6 class="font-weight-bold mb-2">Plan {{ $plan->plan_order ?? $loop->iteration }}</h6>
                        <p class="program-span mb-1"><i class="fa fa-calendar-days"></i>
                            {{ \Carbon\Carbon::parse($plan->sdate)->format('d M Y') }}
                            –
                            {{ \Carbon\Carbon::parse($plan->edate)->format('d M Y') }}
                        </p>
                        <p class="program-span mb-1"><i class="fa fa-chalkboard"></i> Class start:
                            {{ \Carbon\Carbon::parse($plan->cdate)->format('d M Y') }}
                        </p>
                        <p class="color font-weight-bold mb-2">${{ $plan->amount }}</p>
                        <p class="program-span mb-3">{{ $planEnrolled }}/{{ $planCapacity }} enrolled</p>
                        @if($planClosed)
                            <span class="small_btn theme_btn disabled d-inline-block opacity-75">Closed</span>
                        @elseif($planFull)
                            <span class="small_btn theme_btn disabled d-inline-block opacity-75">Full</span>
                        @elseif(Auth::check() && ($isEnrolled || isAdmin()))
                            <span class="small_btn theme_btn disabled d-inline-block">Enrolled</span>
                        @else
                            <a href="javascript:void(0)"
                               class="small_btn theme_btn text-nowrap addToCartBuyNow mr-1 mb-1"
                               data-installment="{{ $installmentCount }}"
                               data-url="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $plan->id]) }}">
                                Enroll now
                            </a>
                            <a href="javascript:void(0)"
                               class="small_btn theme_btn text-nowrap addToCartBuyNow mb-1"
                               data-installment="{{ $installmentCount }}"
                               data-url="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $plan->id]) }}">
                                Add to cart
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
