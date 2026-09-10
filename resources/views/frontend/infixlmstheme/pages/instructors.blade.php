@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Our Instructors & Tutors') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-instructors {
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

    .mxp-instructors h1,
    .mxp-instructors h2,
    .mxp-instructors h3,
    .mxp-instructors h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .mxp-instructors a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-instructors .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-instructors .breadcrumb-inner {
        max-width: 1240px;
        margin: 0 auto;
    }

    .mxp-instructors .breadcrumb a {
        color: var(--teal-mid);
    }

    .mxp-instructors .breadcrumb a:hover {
        color: var(--terracotta);
    }

    .mxp-instructors .breadcrumb-sep {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-instructors .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 90px 32px 100px;
        position: relative;
        overflow: hidden;
    }

    .mxp-instructors .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-instructors .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .mxp-instructors .hero-eyebrow {
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

    .mxp-instructors .hero h1 {
        font-size: clamp(38px, 5vw, 58px);
        color: var(--white);
        margin-bottom: 22px;
        letter-spacing: -1px;
    }

    .mxp-instructors .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-instructors .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 660px;
        margin: 0 auto;
    }

    .mxp-instructors .hero-ctas {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 36px;
        flex-wrap: wrap;
    }

    .mxp-instructors .btn-primary {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-instructors .btn-primary:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .mxp-instructors .btn-outline {
        display: inline-block;
        border: 2px solid rgba(255, 255, 255, 0.5);
        color: var(--white) !important;
        padding: 12px 28px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-instructors .btn-outline:hover {
        border-color: var(--white);
        background: rgba(255, 255, 255, 0.1);
    }

    .mxp-instructors .section-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-instructors .section-title {
        font-size: clamp(30px, 4vw, 44px);
        color: var(--teal-darkest);
        margin-bottom: 14px;
        line-height: 1.15;
    }

    .mxp-instructors .section-title em {
        font-style: italic;
        font-weight: 400;
        color: var(--teal-deep);
    }

    .mxp-instructors .section-subtitle {
        font-size: 17px;
        color: var(--charcoal-soft);
        max-width: 640px;
        line-height: 1.7;
    }

    .mxp-instructors .section-header {
        text-align: center;
        margin-bottom: 56px;
    }

    .mxp-instructors .section-header .section-subtitle {
        margin: 0 auto;
    }

    .mxp-instructors .stats-bar {
        background: var(--white);
        border-bottom: 1px solid var(--gray-line);
        padding: 40px 32px;
    }

    .mxp-instructors .stats-inner {
        max-width: 960px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
        text-align: center;
    }

    .mxp-instructors .stat-num {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 36px;
        color: var(--teal-deep);
        line-height: 1;
        margin-bottom: 6px;
    }

    .mxp-instructors .stat-label {
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--charcoal-soft);
        font-weight: 500;
    }

    .mxp-instructors .filter-section {
        background: var(--cream);
        padding: 48px 32px 24px;
    }

    .mxp-instructors .filter-inner {
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-instructors .filter-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--charcoal-soft);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 16px;
        text-align: center;
    }

    .mxp-instructors .filter-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .mxp-instructors .filter-tag {
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 500;
        border: 1.5px solid var(--gray-line);
        background: var(--white);
        color: var(--charcoal-soft);
        cursor: pointer;
        transition: all 0.2s;
        user-select: none;
    }

    .mxp-instructors .filter-tag:hover {
        border-color: var(--teal-mid);
        color: var(--teal-mid);
        background: rgba(26, 138, 111, 0.05);
    }

    .mxp-instructors .filter-tag.active {
        background: var(--teal-mid);
        color: var(--white);
        border-color: var(--teal-mid);
    }

    .mxp-instructors .instructors-section {
        background: var(--cream);
        padding: 40px 32px 100px;
    }

    .mxp-instructors .instructors-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-instructors .instructor-card {
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
        transition: all 0.25s;
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
    }

    .mxp-instructors .instructor-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    .mxp-instructors .instructor-card.hidden {
        display: none;
    }

    .mxp-instructors .instructor-photo {
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
        padding: 0;
        position: relative;
        overflow: hidden;
    }

    .mxp-instructors .instructor-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-instructors .instructor-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: var(--terracotta);
        color: var(--white);
        font-family: var(--sans);
        font-style: normal;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        padding: 4px 12px;
        border-radius: 4px;
        z-index: 1;
    }

    .mxp-instructors .instructor-body {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .mxp-instructors .instructor-name {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 20px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-instructors .instructor-title {
        font-size: 12px;
        color: var(--terracotta);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 14px;
    }

    .mxp-instructors .instructor-desc {
        font-size: 13.5px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 16px;
        flex: 1;
    }

    .mxp-instructors .instructor-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 18px;
    }

    .mxp-instructors .instructor-tag {
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 30px;
        background: var(--cream);
        color: var(--teal-deep);
        font-weight: 500;
    }

    .mxp-instructors .instructor-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid var(--gray-line);
        flex-wrap: wrap;
    }

    .mxp-instructors .instructor-book {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 9px 20px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-instructors .instructor-book:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .mxp-instructors .instructor-profile-link {
        color: var(--teal-mid);
        font-size: 13px;
        font-weight: 600;
    }

    .mxp-instructors .instructor-profile-link:hover {
        color: var(--terracotta);
    }

    .mxp-instructors .no-results {
        display: none;
        text-align: center;
        padding: 60px 24px;
        grid-column: 1 / -1;
    }

    .mxp-instructors .no-results.visible {
        display: block;
    }

    .mxp-instructors .no-results p {
        font-size: 17px;
        color: var(--charcoal-soft);
        margin-bottom: 16px;
    }

    .mxp-instructors .no-results .reset-link {
        color: var(--teal-mid);
        font-weight: 600;
        cursor: pointer;
        text-decoration: underline;
    }

    .mxp-instructors .why-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-instructors .why-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .mxp-instructors .why-card {
        padding: 36px 36px 36px 42px;
        background: var(--cream);
        border-radius: 12px;
        border: 1px solid var(--gray-line);
        border-left: 4px solid var(--teal-mid);
    }

    .mxp-instructors .why-card h3 {
        font-size: 19px;
        color: var(--teal-deep);
        margin-bottom: 10px;
    }

    .mxp-instructors .why-card p {
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-instructors .subjects-section {
        background: var(--cream);
        padding: 100px 32px;
    }

    .mxp-instructors .subjects-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-instructors .subject-chip {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 10px;
        padding: 18px 20px;
        text-align: center;
        transition: all 0.2s;
    }

    .mxp-instructors .subject-chip:hover {
        border-color: var(--teal-mid);
        box-shadow: var(--shadow-sm);
        transform: translateY(-2px);
    }

    .mxp-instructors .subject-chip h4 {
        font-size: 14px;
        color: var(--teal-deep);
        margin-bottom: 4px;
        font-weight: 600;
    }

    .mxp-instructors .subject-chip p {
        font-size: 11.5px;
        color: var(--charcoal-soft);
    }

    .mxp-instructors .subject-chip.remedial {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        border-color: var(--teal-deep);
    }

    .mxp-instructors .subject-chip.remedial h4 {
        color: var(--white);
    }

    .mxp-instructors .subject-chip.remedial p {
        color: var(--cream-warm);
    }

    .mxp-instructors .join-section {
        background: var(--white);
        padding: 80px 32px;
    }

    .mxp-instructors .join-card {
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-radius: 14px;
        padding: 48px;
        text-align: center;
        border: 1px solid var(--gray-line);
    }

    .mxp-instructors .join-card h2 {
        font-size: 30px;
        color: var(--teal-darkest);
        margin-bottom: 12px;
    }

    .mxp-instructors .join-card > p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 28px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
    }

    .mxp-instructors .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white);
    }

    .mxp-instructors .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px;
    }

    .mxp-instructors .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-instructors .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    .mxp-instructors .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 14px 32px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-instructors .btn-on-teal:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    @media (max-width: 1024px) {
        .mxp-instructors .subjects-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 900px) {
        .mxp-instructors .hero {
            padding: 70px 24px 80px;
        }

        .mxp-instructors .instructors-grid {
            grid-template-columns: 1fr 1fr;
        }

        .mxp-instructors .stats-inner {
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .mxp-instructors .why-grid {
            grid-template-columns: 1fr;
        }

        .mxp-instructors .subjects-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .mxp-instructors .instructors-grid {
            grid-template-columns: 1fr;
            max-width: 420px;
            margin: 0 auto;
        }
    }

    @media (max-width: 480px) {
        .mxp-instructors .hero h1 {
            font-size: 32px;
        }

        .mxp-instructors .hero-ctas {
            flex-direction: column;
            align-items: center;
        }

        .mxp-instructors .stat-num {
            font-size: 28px;
        }

        .mxp-instructors .filter-tag {
            padding: 6px 14px;
            font-size: 12px;
        }
    }
</style>

@section('mainContent')
    @php
        $specialtySlugMap = [
            'med-surg / adult health' => 'medsurg',
            'med-surg' => 'medsurg',
            'medsurg' => 'medsurg',
            'pediatrics' => 'ob-peds',
            'ob / maternity' => 'ob-peds',
            'ob/maternity' => 'ob-peds',
            'mental health / psych' => 'mental-health',
            'mental health' => 'mental-health',
            'pharmacology' => 'pharmacology',
            'community health' => 'community',
            'fundamentals of nursing' => 'fundamentals',
            'fundamentals' => 'fundamentals',
            'leadership / management' => 'nclex',
            'nclex prep' => 'nclex',
            'nclex' => 'nclex',
            'remediation' => 'remediation',
            'fl bon remediation' => 'remediation',
        ];

        $toSpecialtySlugs = function ($raw) use ($specialtySlugMap) {
            $list = [];
            if (is_string($raw) && $raw !== '') {
                $decoded = json_decode($raw, true);
                $list = is_array($decoded) ? $decoded : preg_split('/[,|]/', $raw);
            } elseif (is_array($raw)) {
                $list = $raw;
            }
            $slugs = [];
            foreach ($list as $item) {
                $key = strtolower(trim((string) $item));
                if ($key === '') {
                    continue;
                }
                $slugs[] = $specialtySlugMap[$key] ?? \Illuminate\Support\Str::slug($key);
            }
            return array_values(array_unique($slugs));
        };
    @endphp

    <div class="mxp-instructors">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('Home') }}</a>
                <span class="breadcrumb-sep">›</span>
                <a href="{{ route('ourTeam') }}">{{ __('Our Team') }}</a>
                <span class="breadcrumb-sep">›</span>
                {{ __('Instructors') }}
            </div>
        </div>

        <header class="hero">
            <div class="hero-inner">
                <span class="hero-eyebrow">{{ __('Our Instructors') }}</span>
                <h1>Real nurses. Real educators. <em>Real results.</em></h1>
                <p class="hero-sub">Every instructor at Merkaii Xcellence Prep is a credentialed nurse or nurse educator with clinical experience. No anonymous freelancers. No textbook-only academics. Just nurses who teach because they've been where you are.</p>
                <div class="hero-ctas">
                    <a href="#instructor-grid" class="btn-primary">{{ __('Browse Instructors') }}</a>
                    <a href="{{ route('tutoring') }}#pricing" class="btn-outline">{{ __('See Tutoring Pricing') }}</a>
                </div>
            </div>
        </header>

        <section class="stats-bar">
            <div class="stats-inner">
                <div class="stat-item">
                    <p class="stat-num">{{ number_format((int) ($stats['active_instructors'] ?? 0)) }}+</p>
                    <p class="stat-label">{{ __('Active Instructors') }}</p>
                </div>
                <div class="stat-item">
                    <p class="stat-num">{{ number_format((int) ($stats['subjects_covered'] ?? 0)) }}+</p>
                    <p class="stat-label">{{ __('Subjects Covered') }}</p>
                </div>
                <div class="stat-item">
                    <p class="stat-num">{{ number_format((int) ($stats['students_served'] ?? 0)) }}+</p>
                    <p class="stat-label">{{ __('Students Served') }}</p>
                </div>
                <div class="stat-item">
                    <p class="stat-num">{{ $stats['pass_rate'] ?? '95%' }}</p>
                    <p class="stat-label">{{ __('Pass Rate') }}</p>
                </div>
            </div>
        </section>

        <section class="filter-section">
            <div class="filter-inner">
                <p class="filter-label">{{ __('Filter by Specialty') }}</p>
                <div class="filter-tags" id="filterTags">
                    <span class="filter-tag active" data-filter="all">{{ __('All Instructors') }}</span>
                    <span class="filter-tag" data-filter="nclex">{{ __('NCLEX Prep') }}</span>
                    <span class="filter-tag" data-filter="remediation">{{ __('Remediation') }}</span>
                    <span class="filter-tag" data-filter="pharmacology">{{ __('Pharmacology') }}</span>
                    <span class="filter-tag" data-filter="medsurg">{{ __('Med-Surg') }}</span>
                    <span class="filter-tag" data-filter="mental-health">{{ __('Mental Health') }}</span>
                    <span class="filter-tag" data-filter="ob-peds">{{ __('OB / Pediatrics') }}</span>
                    <span class="filter-tag" data-filter="fundamentals">{{ __('Fundamentals') }}</span>
                    <span class="filter-tag" data-filter="community">{{ __('Community Health') }}</span>
                </div>
            </div>
        </section>

        <section class="instructors-section" id="instructor-grid">
            <div class="instructors-grid" id="instructorGrid">
                {{-- Lead instructor (design) --}}
                <div class="instructor-card" data-specialties="nclex remediation">
                    <div class="instructor-photo">
                        <span class="instructor-badge">{{ __('Lead Instructor') }}</span>
                        @php
                            $paulaImage = null;
                            try {
                                if (\Illuminate\Support\Facades\Schema::hasTable('home_contents')) {
                                    $paulaImage = \Modules\FrontendManage\Entities\HomeContent::where('key', 'home_tile1_image')->value('value');
                                }
                            } catch (\Throwable $e) {
                                $paulaImage = null;
                            }
                        @endphp
                        @if (!empty($paulaImage))
                            <img src="{{ asset('/' . ltrim($paulaImage, '/')) }}" alt="Paula Martin">
                        @else
                            Instructor photo<br>coming soon
                        @endif
                    </div>
                    <div class="instructor-body">
                        <p class="instructor-name">Paula Martin</p>
                        <p class="instructor-title">{{ __('Lead Instructor & Founder') }}</p>
                        <p class="instructor-desc">Creator of the NCLEX PASS Method™. Specializes in NCLEX prep, clinical judgment, test-taking strategy, and FL BON remediation curriculum. 13+ years in nursing education.</p>
                        <div class="instructor-tags">
                            <span class="instructor-tag">NCLEX Prep</span>
                            <span class="instructor-tag">Remediation</span>
                            <span class="instructor-tag">Clinical Judgment</span>
                            <span class="instructor-tag">Test Strategy</span>
                        </div>
                        <div class="instructor-actions">
                            <a href="{{ route('contact') }}" class="instructor-book">{{ __('Book a Session') }}</a>
                            <a href="{{ route('ourTeam') }}" class="instructor-profile-link">{{ __('Full Profile') }} →</a>
                        </div>
                    </div>
                </div>

                @forelse (($instructors ?? collect()) as $instructor)
                    @php
                        $info = ($personalByUserId ?? collect())->get($instructor->id);
                        $rawSpecs = optional($info)->specialties;
                        $specLabels = [];
                        if (is_string($rawSpecs) && $rawSpecs !== '') {
                            $decoded = json_decode($rawSpecs, true);
                            $specLabels = is_array($decoded) ? $decoded : array_filter(array_map('trim', explode(',', $rawSpecs)));
                        }
                        $specSlugs = $toSpecialtySlugs($rawSpecs);
                        $profileUrl = route('tutorDetails', [$instructor->id, \Illuminate\Support\Str::slug($instructor->name ?: 'tutor', '-')]);
                        $desc = trim(strip_tags((string) ($instructor->about ?? '')));
                        if ($desc === '') {
                            $desc = trim((string) ($instructor->headline ?? ''));
                        }
                        if ($desc === '') {
                            $desc = __('Credentialed nurse educator with real clinical experience.');
                        }
                        if (\Illuminate\Support\Str::length($desc) > 180) {
                            $desc = \Illuminate\Support\Str::limit($desc, 180);
                        }
                        $title = trim((string) ($instructor->job_title ?? ''));
                        if ($title === '') {
                            $title = trim((string) ($instructor->headline ?? ''));
                        }
                        if ($title === '') {
                            $title = __('Nurse Educator');
                        }
                    @endphp
                    <div class="instructor-card" data-specialties="{{ implode(' ', $specSlugs) }}">
                        <div class="instructor-photo">
                            <img src="{{ getInstructorImage($instructor->image) }}" alt="{{ $instructor->name }}">
                        </div>
                        <div class="instructor-body">
                            <p class="instructor-name">{{ $instructor->name }}</p>
                            <p class="instructor-title">{{ $title }}</p>
                            <p class="instructor-desc">{{ $desc }}</p>
                            @if (!empty($specLabels))
                                <div class="instructor-tags">
                                    @foreach (array_slice($specLabels, 0, 4) as $label)
                                        <span class="instructor-tag">{{ $label }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="instructor-actions">
                                <a href="{{ route('contact') }}" class="instructor-book">{{ __('Book a Session') }}</a>
                                <a href="{{ $profileUrl }}" class="instructor-profile-link">{{ __('Full Profile') }} →</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

                <div class="no-results" id="noResults">
                    <p>{{ __('No instructors match that specialty right now.') }}</p>
                    <span class="reset-link" id="resetFilter">{{ __('Show all instructors') }} →</span>
                </div>
            </div>
        </section>

        <section class="why-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('What Sets Us Apart') }}</p>
                <h2 class="section-title">Why our instructors are <em>different.</em></h2>
                <p class="section-subtitle">At Merkaii Xcellence Prep, instructors and tutors are the same people. The educator who designs your curriculum is the same person who sits with you in your 1-on-1 session.</p>
            </div>
            <div class="why-grid">
                <div class="why-card">
                    <h3>{{ __('Credentialed Nurses First') }}</h3>
                    <p>Every instructor holds an active nursing license and brings real clinical experience to the classroom — not just textbook theory.</p>
                </div>
                <div class="why-card">
                    <h3>{{ __('NCLEX PASS Method™ Trained') }}</h3>
                    <p>All instructors are trained in our proprietary methodology: Content + Process + Confidence. They teach the system, not just the material.</p>
                </div>
                <div class="why-card">
                    <h3>{{ __('Small Caseloads by Design') }}</h3>
                    <p>We limit each instructor's active students so they have time to review your work, prepare for your sessions, and actually know your weak areas.</p>
                </div>
                <div class="why-card">
                    <h3>{{ __('Students Who Failed, Nurses Who Passed') }}</h3>
                    <p>Many of our instructors understand the repeat-tester experience personally. They don't just teach the content — they understand the mindset.</p>
                </div>
            </div>
        </section>

        <section class="subjects-section">
            <div class="section-header">
                <p class="section-eyebrow">{{ __('Subject Areas') }}</p>
                <h2 class="section-title">Tutoring across all nursing subjects.</h2>
                <p class="section-subtitle">Our instructors cover every subject on the NCLEX test plan and FL BON remediation curriculum. Request a session in any area below.</p>
            </div>
            <div class="subjects-grid">
                <div class="subject-chip remedial"><h4>FL BON Remedial Subjects</h4><p>Board-mandated coursework</p></div>
                <div class="subject-chip"><h4>Fundamentals of Nursing</h4><p>Core concepts &amp; skills</p></div>
                <div class="subject-chip"><h4>Med-Surg Nursing</h4><p>Adult health conditions</p></div>
                <div class="subject-chip"><h4>Pharmacology</h4><p>Drug classes &amp; safety</p></div>
                <div class="subject-chip"><h4>Mental Health Nursing</h4><p>Psych &amp; behavioral health</p></div>
                <div class="subject-chip"><h4>Maternal-Newborn (OB)</h4><p>Pregnancy, labor, postpartum</p></div>
                <div class="subject-chip"><h4>Pediatric Nursing</h4><p>Infant through adolescent</p></div>
                <div class="subject-chip"><h4>Community Health</h4><p>Population-based care</p></div>
                <div class="subject-chip"><h4>Physical Assessment</h4><p>Head-to-toe &amp; systems</p></div>
                <div class="subject-chip"><h4>Gerontological Nursing</h4><p>Aging &amp; geriatric care</p></div>
                <div class="subject-chip"><h4>Nursing Management</h4><p>Leadership &amp; delegation</p></div>
                <div class="subject-chip"><h4>NCLEX Test Strategy</h4><p>Clinical judgment &amp; NGN</p></div>
            </div>
        </section>

        <section class="join-section">
            <div class="join-card">
                <p class="section-eyebrow">{{ __('Join Our Team') }}</p>
                <h2>Interested in teaching with Merkaii?</h2>
                <p>We're always looking for experienced nurse educators who share our mission. If you're a credentialed nurse with a passion for teaching and a belief that struggling students deserve better support, we'd love to hear from you.</p>
                <a href="{{ route('becomeATutor') }}#apply" class="btn-primary">{{ __('Apply to Become an Instructor') }} →</a>
            </div>
        </section>

        <section class="final-cta">
            <h2>Ready to work with <em>a real instructor?</em></h2>
            <p>Book your first session and walk away with the clarity your textbook never gave you.</p>
            <a href="{{ route('contact') }}" class="btn-on-teal">{{ __('Book a Session') }} →</a>
        </section>
    </div>

    @include(theme('partials._custom_footer'))

    <script>
        (function() {
            var filterTags = document.querySelectorAll('.mxp-instructors .filter-tag');
            var cards = document.querySelectorAll('.mxp-instructors .instructor-card');
            var noResults = document.getElementById('noResults');
            var resetFilter = document.getElementById('resetFilter');

            function applyFilter(filter) {
                var visible = 0;
                cards.forEach(function(card) {
                    var specialties = (card.getAttribute('data-specialties') || '').split(/\s+/);
                    var show = filter === 'all' || specialties.indexOf(filter) !== -1;
                    card.classList.toggle('hidden', !show);
                    if (show) visible++;
                });
                if (noResults) {
                    noResults.classList.toggle('visible', visible === 0);
                }
            }

            filterTags.forEach(function(tag) {
                tag.addEventListener('click', function() {
                    filterTags.forEach(function(t) { t.classList.remove('active'); });
                    tag.classList.add('active');
                    applyFilter(tag.getAttribute('data-filter'));
                });
            });

            if (resetFilter) {
                resetFilter.addEventListener('click', function() {
                    filterTags.forEach(function(t) { t.classList.remove('active'); });
                    var all = document.querySelector('.mxp-instructors .filter-tag[data-filter="all"]');
                    if (all) all.classList.add('active');
                    applyFilter('all');
                });
            }
        })();
    </script>
@endsection
