@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $package->name }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-session-pkg {
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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        min-height: 60vh;
    }

    .mxp-session-pkg h1,
    .mxp-session-pkg h2 {
        font-family: var(--serif);
        font-weight: 700;
        color: var(--teal-darkest);
        line-height: 1.2;
    }

    .mxp-session-pkg a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-session-pkg a:hover {
        color: var(--terracotta);
    }

    .mxp-session-pkg .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-session-pkg .breadcrumb-inner {
        max-width: 900px;
        margin: 0 auto;
    }

    .mxp-session-pkg .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-session-pkg .pkg-page {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 24px 80px;
    }

    .mxp-session-pkg .pkg-card {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 16px;
        padding: 36px 40px;
        box-shadow: var(--shadow-md);
    }

    .mxp-session-pkg .pkg-eyebrow {
        font-size: 12px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--terracotta);
        margin: 0 0 8px;
    }

    .mxp-session-pkg .pkg-card h1 {
        font-size: 32px;
        margin: 0 0 12px;
    }

    .mxp-session-pkg .pkg-desc {
        color: var(--charcoal-soft);
        font-size: 15px;
        margin: 0 0 24px;
        max-width: 560px;
    }

    .mxp-session-pkg .pkg-price-row {
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        gap: 12px 20px;
        margin-bottom: 8px;
    }

    .mxp-session-pkg .pkg-price {
        font-family: var(--serif);
        font-size: 40px;
        font-weight: 700;
        color: var(--teal-mid);
        line-height: 1;
    }

    .mxp-session-pkg .pkg-sessions {
        font-size: 15px;
        color: var(--charcoal-soft);
        font-weight: 500;
    }

    .mxp-session-pkg .pkg-note {
        font-size: 14px;
        color: var(--terracotta);
        font-weight: 500;
        margin: 0 0 28px;
    }

    .mxp-session-pkg .pkg-features {
        list-style: none;
        padding: 0;
        margin: 0 0 32px;
    }

    .mxp-session-pkg .pkg-features li {
        position: relative;
        padding: 8px 0 8px 28px;
        font-size: 14px;
        color: var(--charcoal);
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-session-pkg .pkg-features li:last-child {
        border-bottom: none;
    }

    .mxp-session-pkg .pkg-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--teal-mid);
        font-weight: 700;
    }

    .mxp-session-pkg .pkg-info {
        background: var(--cream);
        border-radius: 12px;
        padding: 18px 20px;
        margin-bottom: 28px;
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-session-pkg .pkg-info strong {
        color: var(--teal-darkest);
    }

    .mxp-session-pkg .pkg-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .mxp-session-pkg .pkg-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        font-family: var(--sans);
        border: none;
        cursor: pointer;
        opacity: 1;
        text-decoration: none;
    }

    .mxp-session-pkg .pkg-btn-primary {
        background: var(--terracotta);
        color: var(--white) !important;
    }

    .mxp-session-pkg .pkg-btn-primary:hover {
        background: var(--terracotta-deep);
        color: var(--white) !important;
    }

    .mxp-session-pkg .pkg-btn-secondary {
        background: var(--white);
        color: var(--teal-deep) !important;
        border: 2px solid var(--teal-mid);
    }

    .mxp-session-pkg .pkg-btn-secondary:hover {
        border-color: var(--terracotta);
        color: var(--terracotta) !important;
    }

    .mxp-session-pkg .pkg-next-hint {
        margin-top: 14px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-session-pkg .pkg-back {
        display: inline-block;
        margin-top: 24px;
        font-size: 14px;
        font-weight: 600;
    }

    @media (max-width: 640px) {
        .mxp-session-pkg .pkg-card {
            padding: 28px 20px;
        }

        .mxp-session-pkg .pkg-card h1 {
            font-size: 26px;
        }

        .mxp-session-pkg .pkg-price {
            font-size: 32px;
        }

        .mxp-session-pkg .pkg-actions {
            flex-direction: column;
        }

        .mxp-session-pkg .pkg-btn {
            width: 100%;
        }
    }
</style>

@section('mainContent')
<div class="mxp-session-pkg">
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <a href="{{ url('/') }}">{{ __('Home') }}</a>
            <span>/</span>
            <a href="{{ route('tutoring') }}">{{ __('Tutoring') }}</a>
            <span>/</span>
            {{ $package->name }}
        </div>
    </div>

    <div class="pkg-page">
        <div class="pkg-card">
            @if ($package->heading)
                <p class="pkg-eyebrow">{{ $package->heading }}</p>
            @endif

            <h1>{{ $package->name }}</h1>

            @if ($package->description)
                <p class="pkg-desc">{{ $package->description }}</p>
            @endif

            <div class="pkg-price-row">
                <span class="pkg-price">${{ number_format((float) $package->price, 0) }}</span>
                <span class="pkg-sessions">
                    @if ((int) $package->sessions_count === 1)
                        / {{ __('1 session') }}
                    @else
                        / {{ $package->sessions_count }} {{ __('sessions') }}
                    @endif
                </span>
            </div>

            @if ($package->price_note)
                <p class="pkg-note">{{ $package->price_note }}</p>
            @else
                <div style="margin-bottom: 24px;"></div>
            @endif

            @php
                $featureLines = collect(['line_1', 'line_2', 'line_3', 'line_4', 'line_5'])
                    ->map(function ($key) use ($package) {
                        return $package->{$key};
                    })
                    ->filter();
            @endphp

            @if ($featureLines->isNotEmpty())
                <ul class="pkg-features">
                    @foreach ($featureLines as $line)
                        <li>{{ $line }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="pkg-info">
                <strong>{{ __('How this works') }}</strong><br>
                {{ __('You pay the full package price.') }}
                {{ __('You can book tutors and slots for some or all sessions now, or buy the package first and hire tutors later from My Tutors.') }}
                {{ __('Unused sessions stay available until you use them.') }}
            </div>

            <div class="pkg-actions">
                <a href="{{ route('sessionPackage.bookTutors', $package->id) }}"
                    class="pkg-btn pkg-btn-primary"
                    style="cursor:pointer;opacity:1;text-decoration:none;">
                    {{ __('Book tutors now') }} →
                </a>
                <a href="{{ route('sessionPackage.checkout', $package->id) }}"
                    class="pkg-btn pkg-btn-secondary"
                    style="cursor:pointer;opacity:1;text-decoration:none;">
                    {{ __('Buy package now') }}
                </a>
            </div>
            <p class="pkg-next-hint">
                {{ __('Book some sessions now, or buy the package and hire tutors later. Payment is always the full package price.') }}
            </p>

            <a class="pkg-back" href="{{ route('tutoring') }}#pricing">← {{ __('Back to pricing') }}</a>
        </div>
    </div>
</div>
@endsection
