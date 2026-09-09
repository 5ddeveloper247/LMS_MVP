@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Our Team & Instructors') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-team {
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
        --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    .mxp-team h1,
    .mxp-team h2,
    .mxp-team h3,
    .mxp-team h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .mxp-team .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-team .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    .mxp-team .breadcrumb a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-team .breadcrumb a:hover {
        color: var(--terracotta);
    }

    .mxp-team .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-team .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 90px 32px 100px;
        position: relative;
        overflow: hidden;
    }

    .mxp-team .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-team .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .mxp-team .hero-eyebrow {
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

    .mxp-team .hero h1 {
        font-size: clamp(38px, 5vw, 58px);
        color: var(--white);
        margin-bottom: 22px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .mxp-team .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-team .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 660px;
        margin: 0 auto;
    }

    .mxp-team .section-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-team .section-title {
        font-size: clamp(30px, 4vw, 44px);
        color: var(--teal-darkest);
        margin-bottom: 14px;
        line-height: 1.15;
    }

    .mxp-team .section-subtitle {
        font-size: 17px;
        color: var(--charcoal-soft);
        max-width: 640px;
        line-height: 1.7;
    }

    .mxp-team .section-header {
        text-align: center;
        margin-bottom: 56px;
    }

    .mxp-team .section-header .section-subtitle {
        margin: 0 auto;
    }

    .mxp-team .philosophy-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-team .philosophy-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        max-width: 1080px;
        margin: 0 auto;
        align-items: center;
    }

    .mxp-team .philosophy-content p {
        font-size: 15.5px;
        line-height: 1.8;
        color: var(--charcoal);
        margin-bottom: 16px;
    }

    .mxp-team .philosophy-quote {
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-left: 4px solid var(--terracotta);
        border-radius: 0 10px 10px 0;
        padding: 28px 32px;
    }

    .mxp-team .philosophy-quote p {
        font-family: var(--serif);
        font-style: italic;
        font-size: 18px;
        line-height: 1.6;
        color: var(--teal-deep);
        margin: 0;
    }

    .mxp-team .founder-section {
        background: var(--cream);
        padding: 100px 32px;
    }

    .mxp-team .founder-card {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 48px;
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-line);
    }

    .mxp-team .founder-photo {
        background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        text-align: center;
        padding: 0;
        overflow: hidden;
        min-height: 100%;
    }

    .mxp-team .founder-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-team .philosophy-visual {
        background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
        border-radius: 12px;
        aspect-ratio: 4/3;
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

    .mxp-team .philosophy-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 12px;
    }

    .mxp-team .founder-info {
        padding: 40px 40px 40px 0;
    }

    .mxp-team .founder-eyebrow {
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .mxp-team .founder-name {
        font-size: 30px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-team .founder-credentials {
        font-family: var(--serif);
        font-style: italic;
        font-size: 16px;
        color: var(--terracotta);
        margin-bottom: 18px;
    }

    .mxp-team .founder-bio {
        font-size: 14.5px;
        line-height: 1.75;
        color: var(--charcoal);
    }

    .mxp-team .founder-bio p {
        margin-bottom: 14px;
    }

    .mxp-team .founder-stats {
        display: flex;
        gap: 28px;
        margin-top: 22px;
        padding-top: 22px;
        border-top: 1px solid var(--gray-line);
    }

    .mxp-team .founder-stat-num {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 24px;
        color: var(--teal-deep);
        line-height: 1;
    }

    .mxp-team .founder-stat-label {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--charcoal-soft);
        margin-top: 4px;
    }

    .mxp-team .founder-link {
        display: inline-block;
        margin-top: 18px;
        color: var(--teal-mid);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .mxp-team .founder-link:hover {
        color: var(--terracotta);
    }

    .mxp-team .instructors-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-team .instructors-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-team .instructor-card {
        background: var(--cream);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
        transition: all 0.25s;
    }

    .mxp-team .instructor-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    .mxp-team .instructor-photo {
        aspect-ratio: 4/3;
        background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        text-align: center;
        padding: 24px;
    }

    .mxp-team .instructor-body {
        padding: 24px;
        background: var(--white);
    }

    .mxp-team .instructor-name {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 20px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-team .instructor-title {
        font-size: 12px;
        color: var(--terracotta);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 14px;
    }

    .mxp-team .instructor-desc {
        font-size: 13.5px;
        color: var(--charcoal-soft);
        line-height: 1.65;
        margin-bottom: 16px;
    }

    .mxp-team .instructor-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 16px;
    }

    .mxp-team .instructor-tag {
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 30px;
        background: var(--cream);
        color: var(--teal-deep);
        font-weight: 500;
    }

    .mxp-team .instructor-link {
        color: var(--teal-mid);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .mxp-team .instructor-link:hover {
        color: var(--terracotta);
    }

    .mxp-team .values-section {
        background: var(--cream);
        padding: 80px 32px;
    }

    .mxp-team .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .mxp-team .value-card {
        background: var(--white);
        border-radius: 12px;
        padding: 32px 28px;
        text-align: center;
        border-top: 4px solid var(--teal-mid);
    }

    .mxp-team .value-icon {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 48px;
        color: var(--terracotta);
        opacity: 0.3;
        margin-bottom: 12px;
    }

    .mxp-team .value-card h3 {
        font-size: 18px;
        color: var(--teal-deep);
        margin-bottom: 10px;
    }

    .mxp-team .value-card p {
        font-size: 13.5px;
        color: var(--charcoal-soft);
        line-height: 1.65;
    }

    .mxp-team .join-section {
        background: var(--white);
        padding: 80px 32px;
    }

    .mxp-team .join-card {
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-radius: 14px;
        padding: 48px;
        text-align: center;
        border: 1px solid var(--gray-line);
    }

    .mxp-team .join-card h2 {
        font-size: 30px;
        color: var(--teal-darkest);
        margin-bottom: 12px;
    }

    .mxp-team .join-card p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 28px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
    }

    .mxp-team .btn-primary {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-team .btn-primary:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white);
    }

    .mxp-team .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white);
    }

    .mxp-team .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px;
    }

    .mxp-team .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-team .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    .mxp-team .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-team .btn-on-teal:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white);
    }

    @media (max-width: 900px) {
        .mxp-team .hero {
            padding: 70px 24px 80px;
        }

        .mxp-team .philosophy-grid {
            grid-template-columns: 1fr;
        }

        .mxp-team .founder-card {
            grid-template-columns: 1fr;
        }

        .mxp-team .founder-photo {
            min-height: 260px;
        }

        .mxp-team .founder-info {
            padding: 32px;
        }

        .mxp-team .instructors-grid {
            grid-template-columns: 1fr;
            max-width: 420px;
            margin: 0 auto;
        }

        .mxp-team .values-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-team">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                <span>›</span>
                <a href="{{ route('about') }}">{{ __('About') }}</a>
                <span>›</span>
                {{ __('Our Team') }}
            </div>
        </div>

        <header class="hero">
            <div class="hero-inner">
                <span class="hero-eyebrow">{{ __('Our Team') }}</span>
                <h1>Founder-led. Team-supported. <em>Student-driven.</em></h1>
                <p class="hero-sub">Behind every cohort is a team of credentialed nurse educators and learning specialists who deliver live sessions, run Decision Labs, and provide the 1-on-1 support our students depend on.</p>
            </div>
        </header>

        <section class="philosophy-section">
            <div class="philosophy-grid">
                <div class="philosophy-content">
                    <p class="section-eyebrow">{{ __('Our Philosophy') }}</p>
                    <h2 class="section-title">The program isn't one person.</h2>
                    <p>Merkaii Xcellence Prep is led by its founder — a nurse and educator whose own NCLEX failure became the methodology's first proof of concept. Her name is on the Florida Board of Nursing's official approved providers page because regulated remediation requires a real, named, accountable administrator.</p>
                    <p>But the program is far larger than any one person. Behind every student's success is a coaching team, a curriculum built on 13 years of teaching, and a growing community of past students who continue to mentor and encourage the next nurse finding their way back.</p>
                    <div class="philosophy-quote">
                        <p>"A struggling student is not a failing student. They're just someone who hasn't found the right system yet."</p>
                    </div>
                </div>
                <div class="philosophy-visual">
                    @if (!empty($paulaImage))
                        <img src="{{ asset('/' . ltrim($paulaImage, '/')) }}" alt="{{ __('Our Team') }}" style="width:100%;height:100%;object-fit:cover;border-radius:12px;">
                    @else
                        Team photo<br>coming soon
                    @endif
                </div>
            </div>
        </section>

        <section class="founder-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Founder & Lead Instructor') }}</p>
                <h2 class="section-title">Meet Paula Martin.</h2>
            </div>
            <div class="founder-card">
                <div class="founder-photo">
                    @if (!empty($paulaImage))
                        <img src="{{ asset('/' . ltrim($paulaImage, '/')) }}" alt="Paula Martin" style="width:100%;height:100%;object-fit:cover;min-height:100%;">
                    @else
                        Founder photo<br>coming soon
                    @endif
                </div>
                <div class="founder-info">
                    <p class="founder-eyebrow">{{ __('Founder & President') }}</p>
                    <h3 class="founder-name">Paula Martin, LPN</h3>
                    <p class="founder-credentials">Nurse · Health Educator · Creator of the NCLEX PASS Method™</p>
                    <div class="founder-bio">
                        <p>Paula started tutoring nursing students from her home basement in New York in 2015. In 2019, she moved to Lakeland, Florida with a vision to open a school. By 2022, she had received approval from the Florida Board of Nursing as Merakii College of Health — a state-approved remedial course provider.</p>
                        <p>She created the NCLEX PASS Method™ after failing the NCLEX herself — and discovering that the problem wasn't lack of knowledge, but lack of a system. Today, she leads a team of nurse educators who have collectively helped more than 1,500 students find their path back to nursing.</p>
                    </div>
                    <div class="founder-stats">
                        <div>
                            <p class="founder-stat-num">13+</p>
                            <p class="founder-stat-label">{{ __('Years Teaching') }}</p>
                        </div>
                        <div>
                            <p class="founder-stat-num">1,500+</p>
                            <p class="founder-stat-label">{{ __('Students Served') }}</p>
                        </div>
                        <div>
                            <p class="founder-stat-num">95%</p>
                            <p class="founder-stat-label">{{ __('Pass Rate') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('instructors') }}" class="founder-link">{{ __('View Full Profile & Book a Session') }} →</a>
                </div>
            </div>
        </section>

        <section class="instructors-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Instructor Team') }}</p>
                <h2 class="section-title">Nurses who teach <em>because they care.</em></h2>
                <p class="section-subtitle">Every instructor is a credentialed nurse or nurse educator with real clinical experience — not anonymous freelancers or textbook-only academics.</p>
            </div>
            <div class="instructors-grid">
                @forelse (($tutors ?? collect()) as $tutor)
                    @php
                        $profileUrl = route('tutorDetails', [$tutor->id, \Illuminate\Support\Str::slug($tutor->name ?: 'tutor', '-')]);
                        $desc = trim(strip_tags((string) ($tutor->about ?? '')));
                        if ($desc === '') {
                            $desc = trim((string) ($tutor->headline ?? ''));
                        }
                        if ($desc === '') {
                            $desc = __('Credentialed nurse educator with real clinical experience.');
                        }
                        if (\Illuminate\Support\Str::length($desc) > 160) {
                            $desc = \Illuminate\Support\Str::limit($desc, 160);
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
                        <div class="instructor-photo" style="padding:0;overflow:hidden;">
                            <img src="{{ getInstructorImage($tutor->image) }}" alt="{{ $tutor->name }}" style="width:100%;height:100%;object-fit:cover;display:block;">
                        </div>
                        <div class="instructor-body">
                            <p class="instructor-name">{{ $tutor->name }}</p>
                            <p class="instructor-title">{{ $title }}</p>
                            <p class="instructor-desc">{{ $desc }}</p>
                            <a href="{{ $profileUrl }}" class="instructor-link">{{ __('View Profile') }} →</a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column:1/-1;text-align:center;padding:24px;color:var(--charcoal-soft);">
                        {{ __('More instructors joining for the next cohort.') }}
                    </div>
                @endforelse
            </div>
            <p style="text-align:center;margin-top:32px;font-size:14px;color:var(--charcoal-soft);">
                More instructors joining for the next cohort.
                <a href="{{ route('instructors') }}" style="color:var(--teal-mid);font-weight:600;">{{ __('Browse all instructors') }} →</a>
            </p>
        </section>

        <section class="values-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('What We Believe') }}</p>
                <h2 class="section-title">Our teaching values.</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">K</div>
                    <h3>{{ __('Knowledge') }}</h3>
                    <p>Evidence-based, test-plan-aligned content that reflects what's actually on the exam today — not outdated material from five years ago.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">U</div>
                    <h3>{{ __('Understanding') }}</h3>
                    <p>We meet students where they are. Every learning plan is diagnostic-driven, built around your specific weak areas and learning style.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">W</div>
                    <h3>{{ __('Wisdom') }}</h3>
                    <p>Knowing the content isn't enough. We teach the judgment and decision-making that separates a student who knows the answer from one who chooses it under pressure.</p>
                </div>
            </div>
        </section>

        <section class="join-section">
            <div class="join-card">
                <p class="section-eyebrow">{{ __('Join Us') }}</p>
                <h2>Interested in teaching with Merkaii?</h2>
                <p>We're always looking for experienced nurse educators who share our mission. If you're a credentialed nurse with a passion for teaching and a belief that struggling students deserve better support, we'd love to hear from you.</p>
                <a href="{{ route('teachWithUs') }}" class="btn-primary">{{ __('Apply to Become an Instructor') }} →</a>
            </div>
        </section>

        <section class="final-cta">
            <h2>Ready to work with <em>a real team?</em></h2>
            <p>Book a free consultation and let us match you with the right instructor and program for where you are right now.</p>
            <a href="{{ route('contact') }}" class="btn-on-teal">{{ __('Schedule a Free Consultation') }} →</a>
        </section>
    </div>

    @include(theme('partials._custom_footer'))
@endsection
