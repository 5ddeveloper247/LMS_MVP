@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Tutoring') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-tutoring {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --terracotta: #C65D3A;
        --terracotta-deep: #A84B2D;
        --cream: #F5EDE0;
        --cream-warm: #EFE3D0;
        --charcoal: #2B2B2B;
        --charcoal-soft: #4A4A4A;
        --white: #FFFFFF;
        --gray-line: #E8DFD0;
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Montserrat', system-ui, sans-serif;
        --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    .mxp-tutoring h1,
    .mxp-tutoring h2,
    .mxp-tutoring h3,
    .mxp-tutoring h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .mxp-tutoring a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-tutoring .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-tutoring .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    .mxp-tutoring .breadcrumb a {
        color: var(--teal-mid);
    }

    .mxp-tutoring .breadcrumb a:hover {
        color: var(--terracotta);
    }

    .mxp-tutoring .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-tutoring .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 90px 32px 100px;
        position: relative;
        overflow: hidden;
    }

    .mxp-tutoring .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-tutoring .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .mxp-tutoring .hero-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 24px;
        padding: 6px 16px;
        border: 1px solid var(--terracotta);
        border-radius: 30px;
    }

    .mxp-tutoring .hero h1 {
        font-size: clamp(38px, 5vw, 58px);
        color: var(--white);
        margin-bottom: 22px;
        letter-spacing: -1px;
    }

    .mxp-tutoring .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-tutoring .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 660px;
        margin: 0 auto 36px;
    }

    .mxp-tutoring .hero-ctas {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .mxp-tutoring .btn-primary {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-tutoring .btn-primary:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .mxp-tutoring .btn-outline {
        display: inline-block;
        background: transparent;
        color: var(--white) !important;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        border: 2px solid rgba(255, 255, 255, 0.4);
        transition: all 0.2s;
    }

    .mxp-tutoring .btn-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--white);
    }

    .mxp-tutoring .notice-bar {
        max-width: 900px;
        margin: -28px auto 0;
        position: relative;
        z-index: 2;
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 12px;
        padding: 18px 22px;
        display: flex;
        gap: 14px;
        align-items: flex-start;
        box-shadow: var(--shadow-md);
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.65;
    }

    .mxp-tutoring .notice-icon {
        width: 22px;
        height: 22px;
        flex-shrink: 0;
        color: var(--terracotta);
        margin-top: 2px;
    }

    .mxp-tutoring .section-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-tutoring .section-title {
        font-size: clamp(30px, 4vw, 44px);
        color: var(--teal-darkest);
        margin-bottom: 14px;
        line-height: 1.15;
    }

    .mxp-tutoring .section-title em {
        font-style: italic;
        font-weight: 400;
        color: var(--teal-deep);
    }

    .mxp-tutoring .section-subtitle {
        font-size: 17px;
        color: var(--charcoal-soft);
        max-width: 640px;
        line-height: 1.7;
    }

    .mxp-tutoring .section-header {
        text-align: center;
        margin-bottom: 56px;
    }

    .mxp-tutoring .section-header .section-subtitle {
        margin: 0 auto;
    }

    .mxp-tutoring .how-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-tutoring .how-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-tutoring .how-step {
        text-align: center;
        position: relative;
    }

    .mxp-tutoring .how-numeral {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 72px;
        color: var(--terracotta);
        line-height: 1;
        margin-bottom: 16px;
        opacity: 0.2;
    }

    .mxp-tutoring .how-step h3 {
        font-size: 22px;
        color: var(--teal-deep);
        margin-bottom: 12px;
    }

    .mxp-tutoring .how-step p {
        font-size: 14.5px;
        line-height: 1.75;
        color: var(--charcoal-soft);
        max-width: 300px;
        margin: 0 auto;
    }

    .mxp-tutoring .instructors-section {
        background: var(--cream);
        padding: 100px 32px;
        scroll-margin-top: 90px;
    }

    .mxp-tutoring .instructors-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-tutoring .instructor-card {
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
        transition: all 0.25s;
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
    }

    .mxp-tutoring .instructor-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    .mxp-tutoring .instructor-photo {
        aspect-ratio: 4/3;
        background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-family: var(--serif);
        font-style: italic;
        font-size: 16px;
        text-align: center;
        padding: 0;
        overflow: hidden;
    }

    .mxp-tutoring .instructor-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-tutoring .instructor-body {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .mxp-tutoring .instructor-name {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 20px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-tutoring .instructor-title {
        font-size: 13px;
        color: var(--terracotta);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 14px;
    }

    .mxp-tutoring .instructor-specialties {
        font-size: 13.5px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 18px;
        flex: 1;
    }

    .mxp-tutoring .instructor-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 18px;
    }

    .mxp-tutoring .instructor-tag {
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 30px;
        background: var(--cream);
        color: var(--teal-deep);
        font-weight: 500;
    }

    .mxp-tutoring .instructor-book {
        display: block;
        text-align: center;
        background: var(--teal-darkest);
        color: var(--white) !important;
        padding: 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        transition: background 0.2s;
        margin-top: auto;
    }

    .mxp-tutoring .instructor-book:hover {
        background: var(--teal-deep);
    }

    .mxp-tutoring .subjects-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-tutoring .subjects-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-tutoring .subject-card {
        background: var(--cream);
        padding: 22px 20px;
        border-radius: 10px;
        border-left: 4px solid var(--teal-mid);
        transition: all 0.2s;
    }

    .mxp-tutoring .subject-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
        border-left-color: var(--terracotta);
    }

    .mxp-tutoring .subject-card h4 {
        font-size: 15px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-tutoring .subject-card p {
        font-size: 12.5px;
        color: var(--charcoal-soft);
    }

    .mxp-tutoring .subject-card.remedial {
        border-left-color: var(--terracotta);
    }

    .mxp-tutoring .pricing-section {
        background: var(--cream);
        padding: 100px 32px;
        scroll-margin-top: 90px;
    }

    .mxp-tutoring .pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-tutoring .pricing-card {
        background: var(--white);
        border-radius: 14px;
        padding: 40px 32px;
        border: 1px solid var(--gray-line);
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .mxp-tutoring .pricing-card.featured {
        border-color: var(--terracotta);
        box-shadow: var(--shadow-md);
        transform: scale(1.03);
    }

    .mxp-tutoring .pricing-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--terracotta);
        color: var(--white);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 20px;
    }

    .mxp-tutoring .pricing-tier {
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .mxp-tutoring .pricing-name {
        font-family: var(--serif);
        font-size: 24px;
        font-weight: 700;
        color: var(--teal-darkest);
        margin-bottom: 8px;
    }

    .mxp-tutoring .pricing-desc {
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.65;
        margin-bottom: 24px;
        min-height: 65px;
    }

    .mxp-tutoring .pricing-amount {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 48px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-tutoring .pricing-amount span {
        font-size: 18px;
        color: var(--charcoal-soft);
        font-weight: 400;
    }

    .mxp-tutoring .pricing-note {
        font-size: 13px;
        color: var(--charcoal-soft);
        margin-bottom: 28px;
    }

    .mxp-tutoring .pricing-features {
        list-style: none;
        margin: 0 0 32px;
        padding: 0;
        flex: 1;
    }

    .mxp-tutoring .pricing-features li {
        padding: 8px 0 8px 26px;
        position: relative;
        font-size: 14px;
        color: var(--charcoal);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .mxp-tutoring .pricing-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--teal-mid);
        font-weight: 700;
    }

    .mxp-tutoring .pricing-cta {
        display: block;
        text-align: center;
        padding: 14px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-tutoring .pricing-cta.primary {
        background: var(--terracotta);
        color: var(--white) !important;
    }

    .mxp-tutoring .pricing-cta.primary:hover {
        background: var(--terracotta-deep);
    }

    .mxp-tutoring .pricing-cta.secondary {
        background: transparent;
        color: var(--teal-darkest) !important;
        border: 2px solid var(--teal-darkest);
    }

    .mxp-tutoring .pricing-cta.secondary:hover {
        background: var(--teal-darkest);
        color: var(--white) !important;
    }

    .mxp-tutoring .testimonials-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-tutoring .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-tutoring .testimonial-card {
        background: var(--cream);
        border-radius: 14px;
        padding: 32px;
        border: 1px solid var(--gray-line);
    }

    .mxp-tutoring .testimonial-quote {
        font-family: var(--serif);
        font-style: italic;
        font-size: 16px;
        line-height: 1.7;
        color: var(--charcoal);
        margin-bottom: 20px;
    }

    .mxp-tutoring .testimonial-attribution {
        font-size: 13px;
        color: var(--charcoal-soft);
        line-height: 1.6;
    }

    .mxp-tutoring .testimonial-name {
        color: var(--teal-darkest);
        font-weight: 600;
    }

    .mxp-tutoring .faq-section {
        background: var(--cream);
        padding: 100px 32px;
    }

    .mxp-tutoring .faq-list {
        max-width: 800px;
        margin: 0 auto;
    }

    .mxp-tutoring .faq-item {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 10px;
        margin-bottom: 12px;
        padding: 0 20px;
    }

    .mxp-tutoring .faq-item summary {
        cursor: pointer;
        padding: 18px 0;
        font-weight: 600;
        color: var(--teal-darkest);
        list-style: none;
    }

    .mxp-tutoring .faq-item summary::-webkit-details-marker {
        display: none;
    }

    .mxp-tutoring .faq-item-body {
        padding: 0 0 18px;
        font-size: 14.5px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-tutoring .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white);
    }

    .mxp-tutoring .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px;
    }

    .mxp-tutoring .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-tutoring .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    @media (max-width: 900px) {
        .mxp-tutoring .hero {
            padding: 70px 24px 80px;
        }

        .mxp-tutoring .how-grid,
        .mxp-tutoring .instructors-grid,
        .mxp-tutoring .pricing-grid,
        .mxp-tutoring .testimonials-grid {
            grid-template-columns: 1fr;
            max-width: 420px;
        }

        .mxp-tutoring .pricing-card.featured {
            transform: none;
        }

        .mxp-tutoring .subjects-grid {
            grid-template-columns: 1fr 1fr;
        }

        .mxp-tutoring .notice-bar {
            margin: 24px 16px 0;
        }
    }

    @media (max-width: 600px) {
        .mxp-tutoring .subjects-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-tutoring">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                <span>›</span>
                {{ __('Tutoring') }}
            </div>
        </div>

        <header class="hero">
            <div class="hero-inner">
                <span class="hero-eyebrow">{{ __('1-on-1 Tutoring') }}</span>
                <h1>Work with a <em>real instructor</em> who gets it.</h1>
                <p class="hero-sub">Book one-on-one sessions with the same nurses and educators who teach our programs — not anonymous freelancers. Targeted support for the exact subject or skill you're struggling with.</p>
                <div class="hero-ctas">
                    <a href="#instructors" class="btn-primary">{{ __('Browse Instructors') }}</a>
                    <a href="#pricing" class="btn-outline">{{ __('See Pricing') }}</a>
                </div>
            </div>
        </header>

        <div class="notice-bar">
            <svg class="notice-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <div>
                <strong>{{ __('Important:') }}</strong>
                Tutoring sessions are subject-specific, on-demand support. If you're looking for a structured coaching program with a curriculum, study plan, and accountability, explore our
                <a href="{{ route('programs') }}" style="color: var(--teal-mid); font-weight: 600;">{{ __('Programs') }}</a> instead.
            </div>
        </div>

        <section class="how-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('How It Works') }}</p>
                <h2 class="section-title">Three steps to your session.</h2>
                <p class="section-subtitle">No subscriptions. No commitments. Just book the help you need, when you need it.</p>
            </div>
            <div class="how-grid">
                <div class="how-step">
                    <div class="how-numeral">01</div>
                    <h3>{{ __('Choose Your Instructor') }}</h3>
                    <p>Browse our team by specialty — NCLEX prep, pharmacology, med-surg, mental health, pediatrics, or any of our 24+ subjects. Every instructor is a practicing nurse or nurse educator.</p>
                </div>
                <div class="how-step">
                    <div class="how-numeral">02</div>
                    <h3>{{ __('Book Your Session') }}</h3>
                    <p>Pick a time that works for you. Sessions are available weekday evenings and Saturday mornings. Tell us what you want to focus on so your instructor can prepare.</p>
                </div>
                <div class="how-step">
                    <div class="how-numeral">03</div>
                    <h3>{{ __('Learn & Apply') }}</h3>
                    <p>Meet live via video. Your instructor works through your specific questions, walks through practice problems, and builds the thinking patterns you need to succeed on your own.</p>
                </div>
            </div>
        </section>

        <section class="instructors-section" id="instructors">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Our Instructors') }}</p>
                <h2 class="section-title">Nurses who teach <em>because they care.</em></h2>
                <p class="section-subtitle">Every instructor at Merkaii Xcellence Prep is a credentialed nurse or nurse educator with real clinical experience — not just textbook knowledge.</p>
            </div>

            <div class="instructors-grid">
                @forelse (($tutors ?? collect()) as $tutor)
                    @php
                        $info = ($personalByUserId ?? collect())->get($tutor->id);
                        $rawSpecs = optional($info)->specialties;
                        $specLabels = [];
                        if (is_string($rawSpecs) && $rawSpecs !== '') {
                            $decoded = json_decode($rawSpecs, true);
                            $specLabels = is_array($decoded) ? $decoded : array_filter(array_map('trim', explode(',', $rawSpecs)));
                        }
                        $desc = trim(strip_tags((string) ($tutor->about ?? '')));
                        if ($desc === '') {
                            $desc = trim((string) ($tutor->headline ?? ''));
                        }
                        if ($desc === '') {
                            $desc = __('Credentialed nurse educator with real clinical experience.');
                        }
                        if (\Illuminate\Support\Str::length($desc) > 180) {
                            $desc = \Illuminate\Support\Str::limit($desc, 180);
                        }
                        $title = trim((string) ($tutor->job_title ?? ''));
                        if ($title === '') {
                            $title = trim((string) ($tutor->headline ?? ''));
                        }
                        if ($title === '') {
                            $title = __('Nurse Educator');
                        }
                    @endphp
                    <div class="instructor-card">
                        <div class="instructor-photo">
                            <img src="{{ getInstructorImage($tutor->image) }}" alt="{{ $tutor->name }}">
                        </div>
                        <div class="instructor-body">
                            <p class="instructor-name">{{ $tutor->name }}</p>
                            <p class="instructor-title">{{ $title }}</p>
                            <p class="instructor-specialties">{{ $desc }}</p>
                            @if (!empty($specLabels))
                                <div class="instructor-tags">
                                    @foreach (array_slice($specLabels, 0, 3) as $label)
                                        <span class="instructor-tag">{{ $label }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <a href="{{ route('contact') }}" class="instructor-book">{{ __('Book a Session') }} →</a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column:1/-1;text-align:center;padding:24px;color:var(--charcoal-soft);">
                        {{ __('Featured instructors coming soon.') }}
                    </div>
                @endforelse
            </div>

            <p style="text-align:center;margin-top:40px;font-size:14px;color:var(--charcoal-soft);">
                {{ __('Want to see more of our team?') }}
                <a href="{{ route('instructors') }}" style="color:var(--teal-mid);font-weight:600;">{{ __('All Instructors') }} →</a>
            </p>
        </section>

        <section class="subjects-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Subject Areas') }}</p>
                <h2 class="section-title">Tutoring across all nursing subjects.</h2>
                <p class="section-subtitle">Request a session in any of the subjects below. If you're unsure which area you need help with, we'll help you figure it out.</p>
            </div>
            <div class="subjects-grid">
                <div class="subject-card remedial"><h4>FL BON Remedial Subjects</h4><p>Board-mandated coursework</p></div>
                <div class="subject-card"><h4>Fundamentals of Nursing</h4><p>Core concepts &amp; skills</p></div>
                <div class="subject-card"><h4>Med-Surg Nursing</h4><p>Adult health conditions</p></div>
                <div class="subject-card"><h4>Pharmacology</h4><p>Drug classes &amp; safety</p></div>
                <div class="subject-card"><h4>Mental Health Nursing</h4><p>Psych &amp; behavioral health</p></div>
                <div class="subject-card"><h4>Maternal-Newborn (OB)</h4><p>Pregnancy, labor, postpartum</p></div>
                <div class="subject-card"><h4>Pediatric Nursing</h4><p>Infant through adolescent</p></div>
                <div class="subject-card"><h4>Community Health</h4><p>Population-based care</p></div>
                <div class="subject-card"><h4>Physical Assessment</h4><p>Head-to-toe &amp; systems</p></div>
                <div class="subject-card"><h4>Gerontological Nursing</h4><p>Aging &amp; geriatric care</p></div>
                <div class="subject-card"><h4>Nursing Management</h4><p>Leadership &amp; delegation</p></div>
                <div class="subject-card"><h4>NCLEX Test Strategy</h4><p>Clinical judgment &amp; NGN</p></div>
            </div>
        </section>

        <section class="pricing-section" id="pricing">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Session Pricing') }}</p>
                <h2 class="section-title">Invest in clarity, <em>not confusion.</em></h2>
                <p class="section-subtitle">Transparent pricing. No subscription required. Buy single sessions or save with a package.</p>
            </div>
            <div class="pricing-grid">
                @forelse ($sessionPackages as $package)
                    <div class="pricing-card {{ $package->popular ? 'featured' : '' }}">
                        @if ($package->popular)
                            <span class="pricing-badge">{{ __('Most Popular') }}</span>
                        @endif
                        <p class="pricing-tier">{{ $package->heading }}</p>
                        <h3 class="pricing-name">{{ $package->name }}</h3>
                        @if ($package->description)
                            <p class="pricing-desc">{{ $package->description }}</p>
                        @endif
                        <p class="pricing-amount">
                            ${{ number_format((float) $package->price, 0) }}
                            <span>
                                @if ((int) $package->sessions_count === 1)
                                    / {{ __('session') }}
                                @else
                                    / {{ $package->sessions_count }} {{ __('sessions') }}
                                @endif
                            </span>
                        </p>
                        @if ($package->price_note)
                            <p class="pricing-note">{{ $package->price_note }}</p>
                        @endif
                        <ul class="pricing-features">
                            @foreach (['line_1', 'line_2', 'line_3', 'line_4', 'line_5'] as $line)
                                @if (!empty($package->{$line}))
                                    <li>{{ $package->{$line} }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="{{ route('contact') }}"
                            class="pricing-cta {{ $package->popular ? 'primary' : 'secondary' }}">
                            {{ __('Book a Session') }} →
                        </a>
                    </div>
                @empty
                    <p style="text-align:center;grid-column:1/-1;color:var(--charcoal-soft);">
                        {{ __('Session pricing packages coming soon.') }}
                    </p>
                @endforelse
            </div>
            <p style="text-align:center;margin-top:40px;font-size:14px;color:var(--charcoal-soft);max-width:600px;margin-left:auto;margin-right:auto;line-height:1.7;">
                <strong>{{ __('Not sure if you need tutoring or a full program?') }}</strong>
                <a href="{{ route('contact') }}" style="color:var(--teal-mid);font-weight:600;">{{ __('Schedule a free consultation') }}</a>
                and we'll help you decide.
            </p>
        </section>

        <section class="testimonials-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Student Stories') }}</p>
                <h2 class="section-title">They came in stuck. <em>They left prepared.</em></h2>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-quote">"I'd been reading the same chapter for two weeks and nothing was clicking. One session with my instructor and I finally understood the cardiac cycle. She broke it down in a way my textbook never did."</p>
                    <p class="testimonial-attribution"><span class="testimonial-name">[Name], Nursing Student</span><br>Tutoring — Fundamentals of Nursing<br>Spring 2025</p>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-quote">"I was failing pharmacology and about to give up. The tutoring sessions gave me a framework for memorizing drug classes that actually worked. I passed with a B."</p>
                    <p class="testimonial-attribution"><span class="testimonial-name">[Name], Nursing Student</span><br>Tutoring — Pharmacology<br>Fall 2024</p>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-quote">"The Merkaii team didn't just help me with the content — they helped me with the way I was thinking about questions. That shift made all the difference on my final exam."</p>
                    <p class="testimonial-attribution"><span class="testimonial-name">[Name], Nursing Student</span><br>Tutoring — NCLEX Test Strategy<br>Spring 2025</p>
                </div>
            </div>
        </section>

        <section class="faq-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Questions & Answers') }}</p>
                <h2 class="section-title">{{ __('Tutoring FAQ') }}</h2>
            </div>
            <div class="faq-list">
                <details class="faq-item">
                    <summary>How are tutoring sessions different from your programs?</summary>
                    <div class="faq-item-body">Our programs are structured multi-week experiences with a curriculum, study plan, community, and coaching. Tutoring is on-demand, subject-specific support — targeted help for a specific concept, chapter, or exam.</div>
                </details>
                <details class="faq-item">
                    <summary>Can I request a specific instructor?</summary>
                    <div class="faq-item-body">Yes. When you book, you can select your preferred instructor based on their specialties. If they're not available at your preferred time, we'll suggest an alternative.</div>
                </details>
                <details class="faq-item">
                    <summary>What if I need help with a subject not listed above?</summary>
                    <div class="faq-item-body">Reach out to us. If it's within the nursing curriculum, we likely have an instructor who can help. <a href="{{ route('contact') }}">Contact us</a> with your specific need.</div>
                </details>
                <details class="faq-item">
                    <summary>Are sessions online or in-person?</summary>
                    <div class="faq-item-body">All tutoring sessions are live video by default. If you're local to Lakeland, FL, in-person sessions can be arranged — mention your preference when booking.</div>
                </details>
                <details class="faq-item">
                    <summary>Can I apply tutoring sessions toward a program?</summary>
                    <div class="faq-item-body">Yes. If you enroll in a coaching program within 30 days of a tutoring session, we'll credit the session cost toward your program enrollment.</div>
                </details>
                <details class="faq-item">
                    <summary>Do you offer group tutoring or study groups?</summary>
                    <div class="faq-item-body">Not currently through tutoring, but our coaching programs include group cohort sessions. Explore <a href="{{ route('programs') }}">Programs</a> if you want a group experience.</div>
                </details>
            </div>
        </section>

        <section class="final-cta">
            <h2>Stop struggling alone. <em>Get the help you need.</em></h2>
            <p>Book a session with a Merkaii instructor and walk away with the clarity you've been missing.</p>
            <a href="{{ route('contact') }}" class="btn-primary">{{ __('Book Your First Session') }} →</a>
        </section>
    </div>

    @include(theme('partials._custom_footer'))
@endsection
