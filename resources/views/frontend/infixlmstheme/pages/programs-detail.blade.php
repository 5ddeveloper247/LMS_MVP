@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $program_detail->programtitle }}
@endsection

@include(theme('partials.program-detail-styles'))

@section('mainContent')
@php
    $primaryPlan = $currentPlan ?? ($program_detail->effectiveProgramPlan[0] ?? null);
    $programCourseIds = json_decode($program_detail->allcourses ?? '[]', true);
    $programCourseCount = is_array($programCourseIds) ? count($programCourseIds) : 0;
    $count_enrolled = 0;
    if ($primaryPlan) {
        $count_enrolled = \Modules\CourseSetting\Entities\CourseEnrolled::where('program_id', $program_detail->id)
            ->where('plan_id', $primaryPlan->id)
            ->where('status', 1)
            ->count();
    }
    $heroWeeks = null;
    if ($primaryPlan) {
        $heroWeeks = round((strtotime($primaryPlan->edate) - strtotime($primaryPlan->sdate)) / 604800, 1);
    }
    $heroEyebrow = trim($program_detail->programs_page_eyebrow ?? '');
    $showHeroEyebrow = $heroEyebrow !== '' && strcasecmp($heroEyebrow, $program_detail->programtitle) !== 0;
    $showHeroSubtitle = trim($program_detail->subtitle ?? '') !== ''
        && strcasecmp(trim($program_detail->subtitle), $program_detail->programtitle) !== 0;
    $thumbUrl = getCourseImage($program_detail->icon ?: $program_detail->image);
    $hasThumb = !empty($program_detail->icon) || !empty($program_detail->image);
@endphp

<div class="program-detail-page">
    <nav class="pd-breadcrumb" aria-label="Breadcrumb">
        <div class="pd-breadcrumb-inner">
            <a href="{{ url('/') }}">Home</a>
            <span>&rsaquo;</span>
            <a href="{{ route('programs') }}">Programs</a>
            <span>&rsaquo;</span>
            <span>{{ $program_detail->programtitle }}</span>
        </div>
    </nav>

    <header class="pd-hero">
        <div class="pd-hero-inner">
            @if($showHeroEyebrow)
                <span class="pd-hero-eyebrow">{{ $heroEyebrow }}</span>
            @endif
            <h1>{{ $program_detail->programtitle }}</h1>
            @if($showHeroSubtitle)
                <p class="pd-hero-subtitle">{{ $program_detail->subtitle }}</p>
            @endif
            <div class="pd-hero-meta">
                @if($primaryPlan)
                    <div class="pd-hero-meta-item">
                        <i class="fas fa-dollar-sign"></i>
                        From ${{ $primaryPlan->amount }}
                    </div>
                @endif
                @if($heroWeeks)
                    <div class="pd-hero-meta-item">
                        <i class="far fa-clock"></i>
                        {{ $heroWeeks }} Weeks
                    </div>
                @endif
                @if($programCourseCount)
                    <div class="pd-hero-meta-item">
                        <i class="fas fa-book-open"></i>
                        {{ $programCourseCount }} {{ $programCourseCount === 1 ? 'Course' : 'Courses' }}
                    </div>
                @endif
            </div>
            <div class="pd-hero-ctas">
                @if($primaryPlan && (!$isEnrolled || isAdmin()))
                    <a href="#pricing" class="pd-btn-hero">View Plans &amp; Pricing</a>
                @endif
                <a href="{{ route('contact-us') }}" class="pd-btn-hero-outline">Schedule a Consult</a>
            </div>
        </div>
    </header>

    <div class="pd-image-costing-row">
        <div class="pd-image-costing-inner">
            <div class="pd-program-thumb">
                @if($hasThumb)
                    <img src="{{ $thumbUrl }}" alt="{{ $program_detail->programtitle }}">
                @else
                    <div class="pd-thumb-placeholder">Program image</div>
                @endif
            </div>

            <div class="pd-costing-card" id="pricing">
                <p class="pd-costing-label">Starting At</p>
                @if($primaryPlan)
                    <p class="pd-costing-price">${{ $primaryPlan->amount }}</p>
                    <p class="pd-costing-type">
                        @if($heroWeeks)
                            {{ $heroWeeks }} weeks
                        @endif
                        @if($primaryPlan->no_of_students)
                            · {{ max(0, $primaryPlan->no_of_students - $count_enrolled) }} spots left
                        @endif
                    </p>
                    @php
                        $primaryInstallments = count($primaryPlan->initialProgramPalnDetail ?? $primaryPlan->programPalnDetail ?? []);
                        $primaryFull = $primaryPlan->no_of_students > 0 && $count_enrolled >= $primaryPlan->no_of_students;
                        $primaryClosed = \Carbon\Carbon::parse($primaryPlan->edate)->isPast();
                    @endphp
                    @if($primaryClosed)
                        <span class="pd-btn-enroll pd-disabled">Closed</span>
                    @elseif($primaryFull)
                        <span class="pd-btn-enroll pd-disabled">Full</span>
                    @elseif(Auth::check() && ($isEnrolled ?? false) && !isAdmin())
                        <span class="pd-btn-enroll pd-disabled">Enrolled</span>
                    @else
                        <a href="javascript:void(0)" class="pd-btn-enroll addToCartBuyNow"
                           data-installment="{{ $primaryInstallments }}"
                           data-url="{{ route('buyNow', ['id' => $program_detail->id, 'plan_id' => $primaryPlan->id]) }}">
                            Enroll Now →
                        </a>
                        <a href="javascript:void(0)" class="pd-btn-consult addToCartBuyNow"
                           data-installment="{{ $primaryInstallments }}"
                           data-url="{{ route('addToCart', ['id' => $program_detail->id, 'plan_id' => $primaryPlan->id]) }}">
                            Add to Cart
                        </a>
                    @endif
                    <a href="{{ route('contact-us') }}" class="pd-btn-consult mt-1">Schedule a Consult</a>
                @else
                    <p class="pd-costing-type">Plans coming soon — contact us to enroll.</p>
                    <a href="{{ route('contact-us') }}" class="pd-btn-consult">Schedule a Consult</a>
                @endif
                @if(!empty($program_detail->payment_plan))
                    <div class="pd-costing-includes ck-content mt-2">{!! $program_detail->payment_plan !!}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="pd-main-content">
        <div class="pd-content-grid">
            <div class="content-primary">
                @if($program_detail->discription)
                    <div class="pd-section-block">
                        <p class="pd-section-label">About This Program</p>
                        <h2>Program Description</h2>
                        <div class="ck-content">{!! $program_detail->discription !!}</div>
                    </div>
                @endif

                @if($program_detail->outcome)
                    <div class="pd-section-block">
                        <p class="pd-section-label">What You&apos;ll Achieve</p>
                        <h2>Program Outcomes</h2>
                        <div class="ck-content">{!! $program_detail->outcome !!}</div>
                    </div>
                @endif

                @if($program_detail->requirement)
                    <div class="pd-section-block">
                        <p class="pd-section-label">Before You Start</p>
                        <h2>Requirements</h2>
                        <div class="ck-content">{!! $program_detail->requirement !!}</div>
                    </div>
                @endif
            </div>

            <aside class="pd-content-sidebar">
                @include(theme('partials.program-detail-plans-sidebar'))
            </aside>
        </div>
    </div>

    @include(theme('partials.program-detail-courses'))
    @include(theme('partials.program-detail-reviews'))
    @include(theme('partials.program-detail-faqs'))
    @include(theme('partials.program-detail-recommendations'))

    <section class="pd-final-cta">
        <div class="pd-container">
            <h2>Ready to take the next step?</h2>
            <p>Every nurse started right where you are. Explore plans or talk with our team.</p>
            @if($primaryPlan)
                <a href="#pricing" class="pd-btn-hero">View Plans &amp; Pricing →</a>
            @else
                <a href="{{ route('contact-us') }}" class="pd-btn-hero">Contact Us →</a>
            @endif
            <p class="pd-final-motto">&ldquo;A Struggling Student is not a Failing Student.&rdquo;</p>
        </div>
    </section>
</div>

@include(theme('partials.program-detail-enrollment-script'))
@endsection
