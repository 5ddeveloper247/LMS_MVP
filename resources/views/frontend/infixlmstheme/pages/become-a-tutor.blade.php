@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Become a Tutor') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    /* Scoped to this page only — does not affect site header/menu or other pages */
    .mxp-become-tutor {
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
        font-family: var(--sans) !important;
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .mxp-become-tutor *,
    .mxp-become-tutor *::before,
    .mxp-become-tutor *::after {
        box-sizing: border-box;
    }

    .mxp-become-tutor h1,
    .mxp-become-tutor h2,
    .mxp-become-tutor h3,
    .mxp-become-tutor h4 {
        font-family: var(--serif) !important;
        font-weight: 700 !important;
        line-height: 1.2;
        color: var(--teal-darkest);
        margin: 0;
        text-transform: none;
        letter-spacing: normal;
    }

    .mxp-become-tutor .breadcrumb {
        background: var(--cream);
        border-bottom: 1px solid var(--gray-line);
        padding: 14px 0;
    }

    .mxp-become-tutor .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-become-tutor .breadcrumb a {
        color: var(--teal-mid);
        text-decoration: none;
        font-weight: 500;
    }

    .mxp-become-tutor .breadcrumb a:hover {
        color: var(--teal-darkest);
    }

    .mxp-become-tutor .breadcrumb span {
        margin: 0 8px;
        color: var(--gray-line);
    }

    .mxp-become-tutor .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 80px 32px 90px;
        position: relative;
        overflow: hidden;
    }

    .mxp-become-tutor .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-become-tutor .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .mxp-become-tutor .hero-eyebrow {
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

    .mxp-become-tutor .hero h1 {
        font-size: clamp(36px, 5vw, 54px);
        color: var(--white);
        margin-bottom: 20px;
        font-weight: 700;
    }

    .mxp-become-tutor .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-become-tutor .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 640px;
        margin: 0 auto;
    }

    .mxp-become-tutor .container {
        max-width: 1200px !important;
        width: 100% !important;
        margin: 0 auto !important;
        padding: 0 32px !important;
    }

    .mxp-become-tutor .why-section {
        background: var(--white);
        padding: 80px 0;
    }

    .mxp-become-tutor .why-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 50px;
    }

    .mxp-become-tutor .why-header .eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 14px;
    }

    .mxp-become-tutor .why-header h2 {
        font-size: clamp(28px, 4vw, 40px);
        margin-bottom: 14px;
    }

    .mxp-become-tutor .why-header p {
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-become-tutor .why-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .mxp-become-tutor .why-card {
        background: var(--cream);
        border-radius: 14px;
        padding: 32px 28px;
        border: 1px solid var(--gray-line);
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .mxp-become-tutor .why-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    .mxp-become-tutor .why-card-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: var(--teal-darkest);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
    }

    .mxp-become-tutor .why-card-icon svg {
        width: 22px;
        height: 22px;
    }

    .mxp-become-tutor .why-card h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .mxp-become-tutor .why-card p {
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-become-tutor .apply-section {
        padding: 80px 0 90px;
        background: var(--cream);
        scroll-margin-top: 100px;
    }

    .mxp-become-tutor .apply-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.3fr) minmax(280px, 1fr);
        gap: 40px;
        align-items: start;
        width: 100%;
    }

    .mxp-become-tutor .form-card {
        background: var(--white);
        border-radius: 16px;
        padding: 44px 40px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-line);
        min-width: 0;
        width: 100%;
    }

    .mxp-become-tutor .form-card-eyebrow {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 700;
        color: var(--terracotta);
        margin-bottom: 12px;
    }

    .mxp-become-tutor .form-card h2 {
        font-size: 28px;
        margin-bottom: 8px;
    }

    .mxp-become-tutor .form-card-desc {
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .mxp-become-tutor .form-group {
        margin-bottom: 18px;
    }

    .mxp-become-tutor .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 18px;
    }

    .mxp-become-tutor .form-row .form-group {
        margin-bottom: 0;
    }

    .mxp-become-tutor .form-label {
        display: block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        font-family: var(--sans) !important;
        color: var(--teal-darkest) !important;
        margin-bottom: 6px !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        line-height: 1.3 !important;
    }

    .mxp-become-tutor .form-label .required {
        color: var(--terracotta);
    }

    .mxp-become-tutor .form-input,
    .mxp-become-tutor .form-select,
    .mxp-become-tutor .form-textarea {
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        min-height: 46px;
        padding: 12px 14px !important;
        border: 1.5px solid var(--gray-line) !important;
        border-radius: 8px !important;
        font-family: var(--sans) !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        color: var(--charcoal) !important;
        background: var(--white) !important;
        box-shadow: none !important;
        outline: none !important;
        transition: border-color 0.2s, box-shadow 0.2s;
        margin: 0 !important;
        line-height: 1.4 !important;
    }

    .mxp-become-tutor .form-input:focus,
    .mxp-become-tutor .form-select:focus,
    .mxp-become-tutor .form-textarea:focus {
        outline: none !important;
        border-color: var(--teal-mid) !important;
        box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.12) !important;
    }

    .mxp-become-tutor .form-textarea {
        resize: vertical;
        min-height: 100px !important;
    }

    .mxp-become-tutor .form-select {
        appearance: none !important;
        -webkit-appearance: none !important;
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%230A4D3C' d='M6 8L0 0h12z'/%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: right 14px center !important;
        padding-right: 36px !important;
        cursor: pointer;
    }

    .mxp-become-tutor input[type="file"].form-input {
        min-height: auto;
        padding: 10px !important;
    }

    .mxp-become-tutor .form-divider {
        border: none;
        border-top: 1px dashed var(--gray-line);
        margin: 28px 0;
    }

    .mxp-become-tutor .form-section-label {
        font-family: var(--serif);
        font-size: 18px;
        font-weight: 700;
        color: var(--teal-darkest);
        margin-bottom: 16px;
    }

    .mxp-become-tutor .form-checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .mxp-become-tutor .form-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        cursor: pointer;
        font-size: 14px;
        color: var(--charcoal);
    }

    .mxp-become-tutor .form-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--teal-mid);
        margin-top: 2px;
        flex-shrink: 0;
    }

    .mxp-become-tutor .form-submit {
        background: var(--terracotta) !important;
        color: var(--white) !important;
        padding: 16px 32px !important;
        border: 2px solid var(--terracotta) !important;
        border-radius: 8px !important;
        font-family: var(--sans) !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        cursor: pointer;
        transition: all 0.2s;
        width: 100% !important;
        margin-top: 12px !important;
        text-transform: none !important;
        letter-spacing: normal !important;
        line-height: 1.4 !important;
        box-shadow: none !important;
        height: auto !important;
    }

    .mxp-become-tutor .form-submit:hover {
        background: var(--terracotta-deep) !important;
        border-color: var(--terracotta-deep) !important;
        transform: translateY(-1px);
        color: var(--white) !important;
    }

    .mxp-become-tutor .form-microcopy {
        font-size: 12px;
        color: var(--charcoal-soft);
        margin-top: 14px;
        text-align: center;
        line-height: 1.6;
    }

    .mxp-become-tutor .form-file-hint {
        font-size: 12px;
        color: var(--charcoal-soft);
        margin-top: 4px;
    }

    .mxp-become-tutor .form-success {
        display: none;
        text-align: center;
        padding: 40px 0;
    }

    .mxp-become-tutor .form-success-icon {
        font-size: 48px;
        margin-bottom: 16px;
        color: var(--teal-mid);
    }

    .mxp-become-tutor .form-success h3 {
        margin-bottom: 12px;
    }

    .mxp-become-tutor .form-success p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        max-width: 400px;
        margin: 0 auto;
    }

    .mxp-become-tutor .sidebar {
        display: flex;
        flex-direction: column;
        gap: 24px;
        min-width: 0;
        width: 100%;
        position: sticky;
        top: 24px;
    }

    .mxp-become-tutor .sidebar-card {
        background: var(--cream-warm);
        border-radius: 16px;
        padding: 32px 28px;
        border: 1px solid var(--gray-line);
    }

    .mxp-become-tutor .sidebar-card h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        font-family: var(--sans);
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .mxp-become-tutor .sidebar-card h3 {
        font-size: 22px;
        margin-bottom: 14px;
    }

    .mxp-become-tutor .sidebar-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mxp-become-tutor .sidebar-list li {
        padding: 10px 0 10px 26px;
        position: relative;
        font-size: 14px;
        color: var(--charcoal);
        line-height: 1.6;
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-become-tutor .sidebar-list li:last-child {
        border-bottom: none;
    }

    .mxp-become-tutor .sidebar-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 10px;
        color: var(--teal-mid);
        font-weight: 700;
    }

    .mxp-become-tutor .sidebar-dark {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        border-radius: 16px;
        padding: 32px 28px;
        position: relative;
        overflow: hidden;
    }

    .mxp-become-tutor .sidebar-dark::before {
        content: '';
        position: absolute;
        top: -60px;
        right: -60px;
        width: 180px;
        height: 180px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-become-tutor .sidebar-dark h4 {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        font-family: var(--sans);
        color: var(--terracotta);
        margin-bottom: 12px;
        position: relative;
        z-index: 1;
    }

    .mxp-become-tutor .sidebar-dark h3 {
        font-size: 22px;
        color: var(--white);
        margin-bottom: 12px;
        position: relative;
        z-index: 1;
    }

    .mxp-become-tutor .req-list {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .mxp-become-tutor .req-list li {
        padding: 8px 0 8px 26px;
        position: relative;
        font-size: 14px;
        color: var(--cream);
        line-height: 1.5;
    }

    .mxp-become-tutor .req-list li::before {
        content: '→';
        position: absolute;
        left: 0;
        top: 8px;
        color: var(--terracotta);
        font-weight: 700;
    }

    .mxp-become-tutor .quote-callout {
        background: var(--white);
        border-left: 4px solid var(--terracotta);
        border-radius: 0 12px 12px 0;
        padding: 24px 28px;
    }

    .mxp-become-tutor .quote-callout p {
        font-family: var(--serif);
        font-style: italic;
        font-size: 16px;
        color: var(--teal-darkest);
        line-height: 1.6;
        margin-bottom: 8px;
    }

    .mxp-become-tutor .quote-callout cite {
        font-size: 13px;
        color: var(--charcoal-soft);
        font-style: normal;
    }

    @media (max-width: 900px) {
        .mxp-become-tutor .apply-grid {
            grid-template-columns: 1fr;
        }

        .mxp-become-tutor .why-grid {
            grid-template-columns: 1fr;
            max-width: 440px;
        }
    }

    @media (max-width: 768px) {
        .mxp-become-tutor .hero {
            padding: 56px 20px 64px;
        }

        .mxp-become-tutor .form-row {
            grid-template-columns: 1fr;
        }

        .mxp-become-tutor .form-card {
            padding: 28px 22px;
        }

        .mxp-become-tutor .container {
            padding: 0 20px !important;
        }

        .mxp-become-tutor .sidebar {
            position: static;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-become-tutor">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                <span>›</span>
                {{ __('Become a Tutor') }}
            </div>
        </div>

        <header class="hero">
            <div class="hero-inner">
                <span class="hero-eyebrow">{{ __('Join Our Team') }}</span>
                <h1>Teach the students everyone else <em>gave up on.</em></h1>
                <p class="hero-sub">We're looking for nurses who remember what it felt like to struggle — and who want to help the next generation push through. If that's you, we'd love to talk.</p>
            </div>
        </header>

        <section class="why-section">
            <div class="container">
                <div class="why-header">
                    <span class="eyebrow">{{ __('Why MXP') }}</span>
                    <h2>This isn't just tutoring.</h2>
                    <p>Our tutors don't just explain content — they mentor, coach, and believe in students who've been told they can't. Here's what makes teaching with us different.</p>
                </div>
                <div class="why-grid">
                    <div class="why-card">
                        <div class="why-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                        </div>
                        <h3>Purpose-Driven Work</h3>
                        <p>Every session you lead helps a nursing student who refused to quit get one step closer to their license and their dream career.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2"/>
                            </svg>
                        </div>
                        <h3>Flexible Schedule</h3>
                        <p>Set your own hours. Teach from anywhere. Evening and weekend sessions available — most of our students have full-time obligations too.</p>
                    </div>
                    <div class="why-card">
                        <div class="why-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                            </svg>
                        </div>
                        <h3>Structured Methodology</h3>
                        <p>You'll teach using the NCLEX PASS Method™ — a proven framework. We train you on it, so you're never guessing what to cover.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="apply-section" id="apply">
            <div class="container">
                <div class="apply-grid">
                    <div class="form-card">
                        <div class="form-card-eyebrow">{{ __('Tutor Application') }}</div>
                        <h2>Apply to teach with us.</h2>
                        <p class="form-card-desc">Complete the form below and we'll reach out within 3 business days to discuss next steps.</p>

                        @if (session('become_tutor_success'))
                            <div id="form-success" class="form-success" style="display:block;">
                                <div class="form-success-icon">✓</div>
                                <h3>{{ __('Application received!') }}</h3>
                                <p>Thank you for your interest in teaching with Merkaii Xcellence Prep. We'll review your application and be in touch within 3 business days. You will be able to login after admin sets up your password.</p>
                            </div>
                        @else
                            @if ($errors->any())
                                <div class="form-group" style="margin-bottom:18px;">
                                    @foreach ($errors->all() as $error)
                                        <p style="color:var(--terracotta);font-size:13px;margin:0 0 6px;">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <form id="become-tutor-form" action="{{ route('becomeATutor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">{{ __('First Name') }} <span class="required">*</span></label>
                                        <input type="text" id="first_name" name="first_name" class="form-input" placeholder="Your first name" value="{{ old('first_name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">{{ __('Last Name') }} <span class="required">*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Your last name" value="{{ old('last_name') }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="email">{{ __('Email') }} <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone">{{ __('Phone') }} <span class="required">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="(555) 123-4567" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="location">{{ __('Location') }} <span class="required">*</span></label>
                                    <input type="text" id="location" name="location" class="form-input" placeholder="City, State" value="{{ old('location') }}" required>
                                </div>

                                <hr class="form-divider">
                                <div class="form-section-label">{{ __('Nursing Background') }}</div>

                                <div class="form-group">
                                    <label class="form-label" for="nursing_credential">{{ __('Highest Nursing Credential') }} <span class="required">*</span></label>
                                    <select id="nursing_credential" name="nursing_credential" class="form-select" required>
                                        <option value="" disabled {{ old('nursing_credential') ? '' : 'selected' }}>Select…</option>
                                        @foreach (['BSN', 'MSN', 'DNP / PhD', 'ADN / ASN', 'Other'] as $opt)
                                            <option value="{{ $opt }}" {{ old('nursing_credential') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="years_experience">{{ __('Years of Nursing Experience') }} <span class="required">*</span></label>
                                    <select id="years_experience" name="years_experience" class="form-select" required>
                                        <option value="" disabled {{ old('years_experience') ? '' : 'selected' }}>Select…</option>
                                        @foreach (['1–3 years', '4–7 years', '8–15 years', '15+ years'] as $opt)
                                            <option value="{{ $opt }}" {{ old('years_experience') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __('Clinical Specialty Areas') }}</label>
                                    <div class="form-checkbox-group">
                                        @php $oldSpecs = old('specialties', []); @endphp
                                        @foreach ([
                                            'Med-Surg / Adult Health',
                                            'Pediatrics',
                                            'OB / Maternity',
                                            'Mental Health / Psych',
                                            'Pharmacology',
                                            'Community Health',
                                            'Fundamentals of Nursing',
                                            'Leadership / Management',
                                        ] as $spec)
                                            <label class="form-checkbox">
                                                <input type="checkbox" name="specialties[]" value="{{ $spec }}" {{ in_array($spec, $oldSpecs, true) ? 'checked' : '' }}>
                                                {{ $spec }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="form-divider">
                                <div class="form-section-label">{{ __('Teaching Experience') }}</div>

                                <div class="form-group">
                                    <label class="form-label" for="taught_before">{{ __('Have you tutored or taught nursing students before?') }} <span class="required">*</span></label>
                                    <select id="taught_before" name="taught_before" class="form-select" required>
                                        <option value="" disabled {{ old('taught_before') ? '' : 'selected' }}>Select…</option>
                                        @foreach ([
                                            'Yes — professionally (paid)',
                                            'Yes — informally (study groups, mentoring)',
                                            'No — but I want to start',
                                        ] as $opt)
                                            <option value="{{ $opt }}" {{ old('taught_before') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="why_teach">{{ __('Why do you want to teach with MXP?') }}</label>
                                    <textarea id="why_teach" name="why_teach" class="form-textarea" placeholder="Tell us what draws you to this work — especially with students who've struggled or failed.">{{ old('why_teach') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __('Availability') }}</label>
                                    <div class="form-checkbox-group">
                                        @php $oldAvail = old('availability', []); @endphp
                                        @foreach (['Weekday mornings', 'Weekday evenings', 'Saturdays', 'Flexible / open'] as $slot)
                                            <label class="form-checkbox">
                                                <input type="checkbox" name="availability[]" value="{{ $slot }}" {{ in_array($slot, $oldAvail, true) ? 'checked' : '' }}>
                                                {{ $slot }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="upload_resume">{{ __('Resume / CV Upload') }}</label>
                                    <input type="file" id="upload_resume" name="upload_resume" class="form-input" accept=".pdf,.doc,.docx" style="padding: 10px;">
                                    <p class="form-file-hint">PDF or Word document preferred. Allowed: .pdf, .doc, .docx · Max size: 10 MB</p>
                                </div>

                                <button type="submit" class="form-submit">{{ __('Submit Application') }} →</button>
                                <p class="form-microcopy">We review every application personally. If your background is a strong fit, we'll reach out within 3 business days to schedule a conversation.</p>
                            </form>
                        @endif
                    </div>

                    <aside class="sidebar">
                        <div class="sidebar-dark">
                            <h4>{{ __('Requirements') }}</h4>
                            <h3>Who we're looking for</h3>
                            <ul class="req-list">
                                <li>Active nursing license (any state)</li>
                                <li>Minimum 2 years clinical experience</li>
                                <li>Strong knowledge of NCLEX content areas</li>
                                <li>Patience with students who've failed before</li>
                                <li>Reliable internet + quiet workspace</li>
                                <li>Willingness to learn the NCLEX PASS Method™</li>
                            </ul>
                        </div>

                        <div class="sidebar-card">
                            <h4>{{ __('What You Get') }}</h4>
                            <h3>Tutor Benefits</h3>
                            <ul class="sidebar-list">
                                <li>Competitive per-session compensation</li>
                                <li>Flexible hours — you set your schedule</li>
                                <li>Training on the NCLEX PASS Method™</li>
                                <li>Access to all MXP course materials</li>
                                <li>Professional development opportunities</li>
                                <li>A community of nurse-educators who care</li>
                            </ul>
                        </div>

                        <div class="quote-callout">
                            <p>"Teaching here reminded me why I became a nurse in the first place. Watching a student who failed three times finally pass — there's nothing like it."</p>
                            <cite>— MXP Tutor</cite>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </div>

    {{-- Force site footer seal size on this page (footer CSS loads via _custom_footer @section('css')) --}}
    <style>
        footer.footer-main .footer-seal-wrap {
            width: 56px !important;
            height: 56px !important;
            max-width: 56px !important;
            max-height: 56px !important;
            flex-shrink: 0 !important;
            overflow: hidden !important;
        }
        footer.footer-main .footer-seal-wrap svg {
            width: 56px !important;
            height: 56px !important;
            max-width: 56px !important;
            max-height: 56px !important;
            display: block !important;
        }
    </style>
    @include(theme('partials._custom_footer'))
@endsection

@section('js')
@endsection
