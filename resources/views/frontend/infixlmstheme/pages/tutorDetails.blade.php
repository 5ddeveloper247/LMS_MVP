@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $tutor->name }}
@endsection

@php
    $info = $personalInfo ?? null;
    $rawSpecs = optional($info)->specialties;
    $specLabels = [];
    if (is_string($rawSpecs) && $rawSpecs !== '') {
        $decoded = json_decode($rawSpecs, true);
        $specLabels = is_array($decoded) ? $decoded : array_filter(array_map('trim', explode(',', $rawSpecs)));
    }

    $eyebrow = trim((string) ($tutor->job_title ?? ''));
    if ($eyebrow === '') {
        $eyebrow = trim((string) ($tutor->headline ?? ''));
    }
    if ($eyebrow === '') {
        $eyebrow = trim((string) ($tutor->designation ?? ''));
    }
    if ($eyebrow === '') {
        $eyebrow = __('instructor.Instructor');
    }

    $credentialParts = array_filter([
        trim((string) optional($info)->nursing_credential),
        trim((string) ($tutor->designation ?? '')),
        trim((string) ($tutor->headline ?? '')),
    ]);
    $credentials = !empty($credentialParts)
        ? implode(' · ', array_unique($credentialParts))
        : 'Nurse Educator';

    $yearsExperience = trim((string) optional($info)->years_experience);
    $sessionPrice = $tutor->tutor_price ?? null;
    if ($sessionPrice === null || $sessionPrice === '') {
        $sessionPrice = $tutor->hour_rate ?? null;
    }
    $photoUrl = getInstructorImage($tutor->image);
    $hasPhoto = !empty($tutor->image);
    $reviews = ($tutor->tutorReviews ?? collect())->take(3);
    $bookingUrl = route('tutorBooking', $tutor->id);
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-tutor-profile {
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

    .mxp-tutor-profile h1,
    .mxp-tutor-profile h2,
    .mxp-tutor-profile h3,
    .mxp-tutor-profile h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .mxp-tutor-profile a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-tutor-profile .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-profile .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    .mxp-tutor-profile .breadcrumb a {
        color: var(--teal-mid);
    }

    .mxp-tutor-profile .breadcrumb a:hover {
        color: var(--terracotta);
    }

    .mxp-tutor-profile .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-tutor-profile .profile-header {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 60px 32px 0;
        position: relative;
        overflow: hidden;
    }

    .mxp-tutor-profile .profile-header::before {
        content: '';
        position: absolute;
        top: -80px;
        right: -80px;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-tutor-profile .profile-header-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 48px;
        align-items: end;
        position: relative;
        z-index: 1;
    }

    .mxp-tutor-profile .profile-photo-wrap {
        aspect-ratio: 3/4;
        border-radius: 12px 12px 0 0;
        overflow: hidden;
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
        border: 3px solid var(--terracotta);
        border-bottom: none;
        transform: translateY(40px);
    }

    .mxp-tutor-profile .profile-photo-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-tutor-profile .profile-photo-placeholder {
        padding: 32px;
    }

    .mxp-tutor-profile .profile-header-info {
        padding-bottom: 48px;
        color: var(--white);
    }

    .mxp-tutor-profile .profile-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 12px;
    }

    .mxp-tutor-profile .profile-header-info h1 {
        font-size: clamp(32px, 4vw, 48px);
        color: var(--white);
        margin-bottom: 6px;
        letter-spacing: -0.5px;
    }

    .mxp-tutor-profile .profile-credentials {
        font-family: var(--serif);
        font-style: italic;
        font-size: 18px;
        color: var(--cream);
        margin-bottom: 18px;
        opacity: 0.85;
    }

    .mxp-tutor-profile .profile-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 24px;
    }

    .mxp-tutor-profile .profile-tag {
        font-size: 11px;
        padding: 5px 14px;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.12);
        color: var(--cream);
        font-weight: 500;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .mxp-tutor-profile .profile-stats {
        display: flex;
        gap: 32px;
        flex-wrap: wrap;
    }

    .mxp-tutor-profile .profile-stat-num {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 28px;
        color: var(--white);
        line-height: 1;
    }

    .mxp-tutor-profile .profile-stat-label {
        font-size: 11px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--cream);
        opacity: 0.7;
        margin-top: 4px;
    }

    .mxp-tutor-profile .profile-main {
        background: var(--white);
        padding: 60px 32px 100px;
    }

    .mxp-tutor-profile .profile-grid {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 60px;
        align-items: start;
    }

    .mxp-tutor-profile .profile-section {
        margin-bottom: 48px;
    }

    .mxp-tutor-profile .profile-section:last-child {
        margin-bottom: 0;
    }

    .mxp-tutor-profile .profile-section-title {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-tutor-profile .profile-bio {
        font-size: 15.5px;
        line-height: 1.8;
        color: var(--charcoal);
    }

    .mxp-tutor-profile .profile-bio p {
        margin-bottom: 16px;
    }

    .mxp-tutor-profile .profile-bio p:last-child {
        margin-bottom: 0;
    }

    .mxp-tutor-profile .profile-quote {
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-left: 4px solid var(--terracotta);
        border-radius: 0 10px 10px 0;
        padding: 28px 32px;
        margin: 32px 0;
    }

    .mxp-tutor-profile .profile-quote p {
        font-family: var(--serif);
        font-style: italic;
        font-size: 18px;
        line-height: 1.6;
        color: var(--teal-deep);
        margin: 0;
    }

    .mxp-tutor-profile .subjects-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .mxp-tutor-profile .subject-item {
        background: var(--cream);
        padding: 14px 18px;
        border-radius: 8px;
        border-left: 3px solid var(--teal-mid);
        font-size: 14px;
        color: var(--charcoal);
        font-weight: 500;
    }

    .mxp-tutor-profile .subject-item.primary {
        border-left-color: var(--terracotta);
        font-weight: 600;
    }

    .mxp-tutor-profile .approach-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
    }

    .mxp-tutor-profile .approach-card {
        background: var(--cream);
        border-radius: 10px;
        padding: 24px 20px;
        text-align: center;
    }

    .mxp-tutor-profile .approach-icon {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 36px;
        color: var(--terracotta);
        opacity: 0.3;
        margin-bottom: 8px;
    }

    .mxp-tutor-profile .approach-card h4 {
        font-size: 16px;
        color: var(--teal-deep);
        margin-bottom: 8px;
    }

    .mxp-tutor-profile .approach-card p {
        font-size: 13px;
        color: var(--charcoal-soft);
        line-height: 1.6;
        margin: 0;
    }

    .mxp-tutor-profile .reviews-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .mxp-tutor-profile .review-card {
        background: var(--cream);
        border-radius: 10px;
        padding: 28px;
        border-left: 4px solid var(--terracotta);
    }

    .mxp-tutor-profile .review-stars {
        color: var(--terracotta);
        font-size: 14px;
        margin-bottom: 10px;
        letter-spacing: 2px;
    }

    .mxp-tutor-profile .review-text {
        font-family: var(--serif);
        font-style: italic;
        font-size: 15.5px;
        line-height: 1.65;
        color: var(--charcoal);
        margin-bottom: 14px;
    }

    .mxp-tutor-profile .review-attr {
        font-size: 13px;
        color: var(--charcoal-soft);
        margin: 0;
    }

    .mxp-tutor-profile .review-name {
        font-weight: 600;
        color: var(--teal-deep);
    }

    .mxp-tutor-profile .booking-sidebar {
        position: sticky;
        top: 80px;
    }

    .mxp-tutor-profile .booking-card {
        background: var(--white);
        border: 2px solid var(--terracotta);
        border-radius: 14px;
        padding: 32px 28px;
        box-shadow: var(--shadow-lg);
    }

    .mxp-tutor-profile .booking-card-title {
        font-family: var(--serif);
        font-size: 22px;
        font-weight: 700;
        color: var(--teal-darkest);
        margin-bottom: 6px;
    }

    .mxp-tutor-profile .booking-card-subtitle {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin-bottom: 24px;
    }

    .mxp-tutor-profile .booking-price-row {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-tutor-profile .booking-price {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 36px;
        color: var(--teal-darkest);
    }

    .mxp-tutor-profile .booking-price-note {
        font-size: 14px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-profile .booking-features {
        list-style: none;
        margin: 0 0 24px;
        padding: 0;
    }

    .mxp-tutor-profile .booking-features li {
        padding: 8px 0 8px 24px;
        position: relative;
        font-size: 14px;
        color: var(--charcoal);
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
    }

    .mxp-tutor-profile .booking-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--teal-mid);
        font-weight: 700;
    }

    .mxp-tutor-profile .booking-features li:last-child {
        border-bottom: none;
    }

    .mxp-tutor-profile .booking-cta {
        display: block;
        width: 100%;
        text-align: center;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.2s;
        margin-bottom: 12px;
    }

    .mxp-tutor-profile .booking-cta:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white) !important;
    }

    .mxp-tutor-profile .booking-secondary {
        display: block;
        width: 100%;
        text-align: center;
        background: transparent;
        color: var(--teal-darkest) !important;
        padding: 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: 2px solid var(--teal-darkest);
        transition: all 0.2s;
    }

    .mxp-tutor-profile .booking-secondary:hover {
        background: var(--teal-darkest);
        color: var(--white) !important;
    }

    .mxp-tutor-profile .booking-availability {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-line);
    }

    .mxp-tutor-profile .booking-avail-title {
        font-size: 12px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 12px;
    }

    .mxp-tutor-profile .avail-slot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        font-size: 13.5px;
        color: var(--charcoal);
    }

    .mxp-tutor-profile .avail-slot:last-child {
        border-bottom: none;
    }

    .mxp-tutor-profile .avail-status {
        font-size: 12px;
        font-weight: 600;
    }

    .mxp-tutor-profile .avail-status.open {
        color: var(--teal-mid);
    }

    .mxp-tutor-profile .avail-status.limited {
        color: var(--terracotta);
    }

    .mxp-tutor-profile .avail-empty {
        font-size: 13px;
        color: var(--charcoal-soft);
        margin: 0;
    }

    .mxp-tutor-profile .related-section {
        background: var(--cream);
        padding: 80px 32px;
    }

    .mxp-tutor-profile .section-header {
        text-align: center;
        margin-bottom: 48px;
    }

    .mxp-tutor-profile .section-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-tutor-profile .section-title {
        font-size: clamp(28px, 3.5vw, 38px);
        color: var(--teal-darkest);
        margin-bottom: 14px;
    }

    .mxp-tutor-profile .related-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .mxp-tutor-profile .related-card {
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
        transition: all 0.25s;
        display: flex;
        flex-direction: column;
    }

    .mxp-tutor-profile .related-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    .mxp-tutor-profile .related-photo {
        width: 100%;
        height: 180px;
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-family: var(--serif);
        font-style: italic;
        font-size: 13px;
        text-align: center;
        padding: 0;
        overflow: hidden;
    }

    .mxp-tutor-profile .related-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-tutor-profile .related-body {
        padding: 24px;
        flex: 1;
    }

    .mxp-tutor-profile .related-name {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 18px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-tutor-profile .related-title {
        font-size: 12px;
        color: var(--terracotta);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .mxp-tutor-profile .related-desc {
        font-size: 13px;
        color: var(--charcoal-soft);
        line-height: 1.6;
        margin-bottom: 14px;
    }

    .mxp-tutor-profile .related-link {
        color: var(--teal-mid);
        font-size: 13px;
        font-weight: 600;
    }

    .mxp-tutor-profile .related-link:hover {
        color: var(--terracotta);
    }

    .mxp-tutor-profile .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white);
    }

    .mxp-tutor-profile .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px;
    }

    .mxp-tutor-profile .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-tutor-profile .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    .mxp-tutor-profile .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-tutor-profile .btn-on-teal:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white) !important;
    }

    @media (max-width: 1024px) {
        .mxp-tutor-profile .profile-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .mxp-tutor-profile .booking-sidebar {
            position: static;
            max-width: 480px;
        }

        .mxp-tutor-profile .related-grid {
            grid-template-columns: repeat(2, 1fr);
            max-width: 800px;
        }
    }

    @media (max-width: 900px) {
        .mxp-tutor-profile .profile-header-inner {
            grid-template-columns: 1fr;
            gap: 24px;
            text-align: center;
        }

        .mxp-tutor-profile .profile-photo-wrap {
            max-width: 260px;
            margin: 0 auto;
            transform: translateY(30px);
        }

        .mxp-tutor-profile .profile-tags {
            justify-content: center;
        }

        .mxp-tutor-profile .profile-stats {
            justify-content: center;
        }

        .mxp-tutor-profile .subjects-grid {
            grid-template-columns: 1fr;
        }

        .mxp-tutor-profile .approach-grid {
            grid-template-columns: 1fr;
        }

        .mxp-tutor-profile .related-grid {
            grid-template-columns: 1fr;
            max-width: 480px;
        }

        .mxp-tutor-profile .related-card {
            flex-direction: column;
        }

        .mxp-tutor-profile .related-photo {
            width: 100%;
            height: 160px;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-tutor-profile">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('Home') }}</a><span>›</span>
                <a href="{{ route('tutoring') }}">{{ __('Tutoring') }}</a><span>›</span>
                {{ $tutor->name }}
            </div>
        </div>

        <header class="profile-header">
            <div class="profile-header-inner">
                <div class="profile-photo-wrap">
                    @if ($hasPhoto)
                        <img src="{{ $photoUrl }}" alt="{{ $tutor->name }}">
                    @else
                        <span class="profile-photo-placeholder">{{ __('Instructor photo') }}<br>{{ __('coming soon') }}</span>
                    @endif
                </div>
                <div class="profile-header-info">
                    <p class="profile-eyebrow">{{ $eyebrow }}</p>
                    <h1>{{ $tutor->name }}</h1>
                    <p class="profile-credentials">{{ $credentials }}</p>
                    <div class="profile-tags">
                        @forelse ($specLabels as $label)
                            @if (is_string($label) && $label !== '')
                                <span class="profile-tag">{{ $label }}</span>
                            @endif
                        @empty
                            {{-- Static fallback until specialties are set --}}
                            <span class="profile-tag">NCLEX Prep</span>
                            <span class="profile-tag">Clinical Judgment</span>
                            <span class="profile-tag">FL BON Remediation</span>
                            <span class="profile-tag">Test Strategy</span>
                            <span class="profile-tag">Pharmacology</span>
                        @endforelse
                    </div>
                    <div class="profile-stats">
                        <div>
                            <p class="profile-stat-num">
                                {{ $yearsExperience !== '' ? $yearsExperience : '13+' }}
                            </p>
                            <p class="profile-stat-label">{{ __('Years Teaching') }}</p>
                        </div>
                        <div>
                            <p class="profile-stat-num">1,500+</p>
                            <p class="profile-stat-label">{{ __('Students Served') }}</p>
                        </div>
                        <div>
                            <p class="profile-stat-num">95%</p>
                            <p class="profile-stat-label">{{ __('Pass Rate') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="profile-main">
            <div class="profile-grid">
                <div class="profile-content">
                    <div class="profile-section">
                        <p class="profile-section-title">{{ __('common.About') }}</p>
                        <div class="profile-bio">
                            @if (!empty($tutor->about))
                                {!! $tutor->about !!}
                            @else
                                <p>{{ __('This instructor profile bio will appear here once it is added.') }}</p>
                            @endif
                        </div>

                        {{-- Static quote for now --}}
                        <div class="profile-quote">
                            <p>"A struggling student is not a failing student. They're just someone who hasn't found the right system yet."</p>
                        </div>
                    </div>

                    <div class="profile-section">
                        <p class="profile-section-title">{{ __('Subjects & Specialties') }}</p>
                        <div class="subjects-grid">
                            @if (!empty($specLabels))
                                @foreach ($specLabels as $index => $label)
                                    @if (is_string($label) && $label !== '')
                                        <div class="subject-item {{ $index < 3 ? 'primary' : '' }}">{{ $label }}</div>
                                    @endif
                                @endforeach
                            @else
                                {{-- Static fallback --}}
                                <div class="subject-item primary">NCLEX Test Strategy</div>
                                <div class="subject-item primary">Clinical Judgment &amp; NGN</div>
                                <div class="subject-item primary">FL BON Remediation</div>
                                <div class="subject-item">Pharmacology</div>
                                <div class="subject-item">Med-Surg Nursing</div>
                                <div class="subject-item">Fundamentals of Nursing</div>
                                <div class="subject-item">Mental Health Nursing</div>
                                <div class="subject-item">Physical Assessment</div>
                            @endif
                        </div>
                    </div>

                    {{-- Static teaching approach --}}
                    <div class="profile-section">
                        <p class="profile-section-title">{{ __('Teaching Approach') }}</p>
                        <div class="approach-grid">
                            <div class="approach-card">
                                <div class="approach-icon">I</div>
                                <h4>Content Mastery</h4>
                                <p>Build understanding of the material — not just memorization. Systems-based learning organized by how the NCLEX tests it.</p>
                            </div>
                            <div class="approach-card">
                                <div class="approach-icon">II</div>
                                <h4>Process Training</h4>
                                <p>Learn how to read, decode, and answer NCLEX-style questions. The thinking pattern matters more than the content itself.</p>
                            </div>
                            <div class="approach-card">
                                <div class="approach-icon">III</div>
                                <h4>Confidence Building</h4>
                                <p>Rebuild test-day confidence through structured practice, mindset coaching, and honest progress tracking.</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <p class="profile-section-title">{{ __('Student Reviews') }}</p>
                        <div class="reviews-list">
                            @forelse ($reviews as $review)
                                <div class="review-card">
                                    <p class="review-stars">
                                        @php $stars = (int) ($review->star ?? 0); @endphp
                                        {{ str_repeat('★', max($stars, 0)) }}{{ str_repeat('☆', max(5 - $stars, 0)) }}
                                    </p>
                                    <p class="review-text">"{{ $review->comment }}"</p>
                                    <p class="review-attr">
                                        <span class="review-name">{{ __('student.Student') }}</span>
                                    </p>
                                </div>
                            @empty
                                {{-- Static fallback until reviews exist --}}
                                <div class="review-card">
                                    <p class="review-stars">★★★★★</p>
                                    <p class="review-text">"I failed three times. I had given up. This program was the first one that didn't treat me like a number — she rebuilt my confidence and my study system. I passed on attempt four with 75 questions."</p>
                                    <p class="review-attr"><span class="review-name">K.L., RN</span> · NCLEX Repeat Test-Taker Coaching · Passed September 2024</p>
                                </div>
                                <div class="review-card">
                                    <p class="review-stars">★★★★★</p>
                                    <p class="review-text">"The NCLEX PASS Method™ was the difference. I'd done two other prep programs before MXP and neither one worked because I didn't have a process — I just had more content. The Merkaii system finally taught me how to think on test day."</p>
                                    <p class="review-attr"><span class="review-name">[Name], RN</span> · Full NCLEX Coaching · Passed [Month Year]</p>
                                </div>
                                <div class="review-card">
                                    <p class="review-stars">★★★★★</p>
                                    <p class="review-text">"I was facing FL BON remediation and I didn't know where to start. Merkaii walked me through every step — the documentation, the curriculum, the support. I passed and I'm practicing again."</p>
                                    <p class="review-attr"><span class="review-name">[Name], RN</span> · FL BON Remediation Program · Completed [Month Year]</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="booking-sidebar">
                    <div class="booking-card">
                        <h3 class="booking-card-title">{{ __('Book a Session') }}</h3>
                        <p class="booking-card-subtitle">{{ __('1-on-1 tutoring with') }} {{ $tutor->name }}</p>

                        <div class="booking-price-row">
                            <span class="booking-price">
                                @if (!empty($sessionPrice))
                                    ${{ number_format((float) $sessionPrice, 0) }}
                                @else
                                    $75
                                @endif
                            </span>
                            <span class="booking-price-note">/ {{ __('60 min session') }}</span>
                        </div>

                        {{-- Static feature bullets --}}
                        <ul class="booking-features">
                            <li>Live video · 60 minutes</li>
                            <li>Any subject from the list below</li>
                            <li>Session recording provided</li>
                            <li>Follow-up study notes emailed</li>
                            <li>Can credit toward program enrollment</li>
                        </ul>

                        <a href="{{ $bookingUrl }}" class="booking-cta">{{ __('Book This Instructor') }} →</a>
                        <a href="{{ route('tutoring') }}#pricing" class="booking-secondary">{{ __('See All Pricing Options') }}</a>

                        <div class="booking-availability">
                            <p class="booking-avail-title">{{ __('Availability This Week') }}</p>
                            @forelse (($weekAvailability ?? []) as $day)
                                <div class="avail-slot">
                                    <span>{{ $day['label'] }}</span>
                                    <span class="avail-status {{ $day['statusClass'] }}">{{ $day['status'] }}</span>
                                </div>
                            @empty
                                <p class="avail-empty">{{ __('No availability this week.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Featured related instructors (max 3) --}}
        <section class="related-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('More Instructors') }}</p>
                <h2 class="section-title">Meet the rest of the team.</h2>
            </div>

            <div class="related-grid">
                @forelse (($relatedInstructors ?? collect()) as $related)
                    @php
                        $rTitle = trim((string) ($related->job_title ?? ''));
                        if ($rTitle === '') {
                            $rTitle = trim((string) ($related->headline ?? ''));
                        }
                        if ($rTitle === '') {
                            $rTitle = trim((string) ($related->designation ?? ''));
                        }
                        if ($rTitle === '') {
                            $rTitle = 'Nurse Educator';
                        }
                        $rDesc = trim(strip_tags((string) ($related->about ?? '')));
                        if ($rDesc === '') {
                            $rDesc = trim((string) ($related->headline ?? ''));
                        }
                        if ($rDesc === '') {
                            $rDesc = 'Credentialed nurse educator with real clinical experience.';
                        }
                        if (\Illuminate\Support\Str::length($rDesc) > 140) {
                            $rDesc = \Illuminate\Support\Str::limit($rDesc, 140);
                        }
                        $rProfileUrl = route('tutorDetails', [$related->id, \Illuminate\Support\Str::slug($related->name ?: 'tutor', '-')]);
                        $rHasPhoto = !empty($related->image);
                    @endphp
                    <div class="related-card">
                        <div class="related-photo">
                            @if ($rHasPhoto)
                                <img src="{{ getInstructorImage($related->image) }}" alt="{{ $related->name }}">
                            @else
                                Photo<br>coming soon
                            @endif
                        </div>
                        <div class="related-body">
                            <p class="related-name">{{ $related->name }}</p>
                            <p class="related-title">{{ $rTitle }}</p>
                            <p class="related-desc">{{ $rDesc }}</p>
                            <a href="{{ $rProfileUrl }}" class="related-link">{{ __('View Profile') }} →</a>
                        </div>
                    </div>
                @empty
                    <p style="grid-column:1/-1;text-align:center;color:var(--charcoal-soft);">
                        {{ __('More featured instructors coming soon.') }}
                    </p>
                @endforelse
            </div>

            <p style="text-align: center; margin-top: 32px;">
                <a href="{{ route('instructors') }}"
                    style="color: var(--teal-mid); text-decoration: none; font-weight: 600; font-size: 15px;">←
                    {{ __('Back to All Instructors') }}</a>
            </p>
        </section>

        <section class="final-cta">
            <h2>Ready to work with <em>a real instructor?</em></h2>
            <p>Book your first session and walk away with the clarity your textbook never gave you.</p>
            <a href="{{ $bookingUrl }}" class="btn-on-teal">{{ __('Book a Session') }} →</a>
        </section>

        @include(theme('partials._custom_footer'))
    </div>
@endsection
