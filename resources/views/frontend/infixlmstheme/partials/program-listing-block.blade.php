@php
    $plan = $program->effectiveProgramPlan[0] ?? null;
    $weeks = $plan
        ? round((strtotime($plan->edate) - strtotime($plan->sdate)) / 604800, 1)
        : null;
    $sectionId = \Illuminate\Support\Str::slug($program->programtitle ?: 'program-' . $program->id);
@endphp
<section id="{{ $sectionId }}" @if(!empty($alternateBackground)) style="background: var(--cream-warm); padding-top: 80px;" @endif>
    <div class="container">
        <div class="program" @if(!empty($alternateBackground)) style="background: var(--white);" @endif>
            <div class="program-bg-mark">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
            <div class="program-header">
                <div>
                    @if($program->programs_page_eyebrow)
                        <div class="program-eyebrow">{{ $program->programs_page_eyebrow }}</div>
                    @endif
                    <h2>{{ $program->programtitle }}</h2>
                    @if($program->subtitle)
                        <p class="program-tagline">{{ $program->subtitle }}</p>
                    @endif
                </div>
                @if($plan)
                    <div class="program-pricing">
                        <div class="pricing-label">Investment</div>
                        <div class="pricing-amount">Starting at ${{ $plan->amount }}</div>
                        @if($weeks)
                            <div class="pricing-duration">{{ $weeks }} Weeks</div>
                        @endif
                    </div>
                @endif
            </div>

            @if($program->what_its_for || $program->what_makes_different)
                <div class="program-grid">
                    @if($program->what_its_for)
                        <div class="program-block">
                            <h4>Who It&apos;s For</h4>
                            <div class="program-block-rich ck-content">{!! $program->what_its_for !!}</div>
                        </div>
                    @endif
                    @if($program->what_makes_different)
                        <div class="program-block">
                            <h4>What Makes It Different</h4>
                            <div class="program-block-rich ck-content">{!! $program->what_makes_different !!}</div>
                        </div>
                    @endif
                </div>
            @endif

            @if($program->what_you_will_learn || $program->signature_features)
                <div class="program-grid">
                    @if($program->what_you_will_learn)
                        <div class="program-block">
                            <h4>What You&apos;ll Learn</h4>
                            <div class="program-block-rich frameworks ck-content">{!! $program->what_you_will_learn !!}</div>
                        </div>
                    @endif
                    @if($program->signature_features)
                        <div class="program-block">
                            <h4>Signature Features</h4>
                            <div class="program-block-rich ck-content">{!! $program->signature_features !!}</div>
                        </div>
                    @endif
                </div>
            @endif

            @if($weeks)
                <div class="program-meta">
                    <div class="program-meta-item">
                        <span class="program-meta-label">Duration</span>
                        <span class="program-meta-value">{{ $weeks }} Weeks</span>
                    </div>
                </div>
            @endif

            <div class="program-cta-row" style="margin-top:30px;">
                <a href="{{ route('programs.detail', $program->id) }}" class="btn-primary">Apply for the Next Cohort →</a>
                <a href="{{ route('contact-us') }}" class="btn-secondary">Schedule a Free Consult</a>
            </div>
        </div>
    </div>
</section>
