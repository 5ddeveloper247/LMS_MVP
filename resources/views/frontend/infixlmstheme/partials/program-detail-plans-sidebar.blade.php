@php
    $sidebarPlans = collect();
    if (!empty($currentPlan)) {
        $sidebarPlans->push(['plan' => $currentPlan, 'kind' => 'active']);
    }
    if (!empty($upcomingPlans)) {
        foreach ($upcomingPlans as $plan) {
            if ($currentPlan && $plan->id === $currentPlan->id) {
                continue;
            }
            $kind = \Carbon\Carbon::parse($plan->edate)->isPast() ? 'closed' : 'upcoming';
            if ($kind === 'upcoming' && \Carbon\Carbon::parse($plan->sdate)->lte(now()) && \Carbon\Carbon::parse($plan->cdate)->gt(now())) {
                $kind = 'active';
            }
            $sidebarPlans->push(['plan' => $plan, 'kind' => $kind]);
        }
    }
    if ($sidebarPlans->isEmpty() && $program_detail->programPlans->count()) {
        foreach ($program_detail->programPlans->sortBy('sdate') as $plan) {
            $kind = \Carbon\Carbon::parse($plan->edate)->isPast() ? 'closed' : 'upcoming';
            $sidebarPlans->push(['plan' => $plan, 'kind' => $kind]);
        }
    }
@endphp

@if($sidebarPlans->count())
    <p class="pd-section-label" style="margin-bottom:14px;">Available Plans</p>
    @foreach($sidebarPlans as $item)
        @php
            $plan = $item['plan'];
            $kind = $item['kind'];
            $weeks = max(1, round((strtotime($plan->edate) - strtotime($plan->sdate)) / 604800, 1));
            $planEnrolled = \Modules\CourseSetting\Entities\CourseEnrolled::where('program_id', $program_detail->id)
                ->where('plan_id', $plan->id)->where('status', 1)->count();
            $spotsLeft = max(0, (int) $plan->no_of_students - $planEnrolled);
        @endphp
        <div class="pd-plans-card @if($kind === 'active') pd-current @endif">
            @if($kind === 'active')
                <span class="pd-plan-status active">Enrolling Now</span>
            @elseif($kind === 'closed')
                <span class="pd-plan-status closed">Completed</span>
            @else
                <span class="pd-plan-status upcoming">Coming Soon</span>
            @endif
            <h4>Plan {{ $plan->plan_order ?? $loop->iteration }}</h4>
            <p class="pd-plan-dates">
                {{ \Carbon\Carbon::parse($plan->sdate)->format('M j, Y') }}
                –
                {{ \Carbon\Carbon::parse($plan->edate)->format('M j, Y') }}
            </p>
            <p class="pd-plan-price">${{ $plan->amount }}</p>
            <p class="pd-plan-spots">
                @if($plan->no_of_students)
                    <strong>{{ $spotsLeft }} spots remaining</strong> · {{ $weeks }} weeks
                @else
                    {{ $weeks }} weeks
                @endif
            </p>
            @include(theme('partials.program-detail-enroll-buttons'), [
                'plan' => $plan,
                'planEnrolled' => $planEnrolled,
            ])
        </div>
    @endforeach
@endif
