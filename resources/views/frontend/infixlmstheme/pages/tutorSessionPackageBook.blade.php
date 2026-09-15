@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Book tutors') }} — {{ $package->name }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-pkg-book {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --terracotta: #C65D3A;
        --cream: #F5EDE0;
        --cream-warm: #EFE3D0;
        --charcoal: #2B2B2B;
        --charcoal-soft: #4A4A4A;
        --white: #FFFFFF;
        --gray-line: #E8DFD0;
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Montserrat', system-ui, sans-serif;
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        min-height: 60vh;
    }

    .mxp-pkg-book h1, .mxp-pkg-book h2, .mxp-pkg-book h3 {
        font-family: var(--serif);
        color: var(--teal-darkest);
        font-weight: 700;
    }

    .mxp-pkg-book a { color: var(--teal-mid); text-decoration: none; }
    .mxp-pkg-book a:hover { color: var(--terracotta); }

    .mxp-pkg-book .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }
    .mxp-pkg-book .breadcrumb-inner { max-width: 1100px; margin: 0 auto; }
    .mxp-pkg-book .breadcrumb span { margin: 0 8px; opacity: 0.5; }

    .mxp-pkg-book .page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 36px 24px 80px;
    }

    .mxp-pkg-book .progress-bar-wrap {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 12px;
        padding: 18px 22px;
        margin-bottom: 28px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 12px;
        align-items: center;
    }

    .mxp-pkg-book .progress-count {
        font-size: 15px;
        font-weight: 600;
        color: var(--teal-darkest);
    }

    .mxp-pkg-book .layout {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 24px;
    }

    @media (max-width: 900px) {
        .mxp-pkg-book .layout { grid-template-columns: 1fr; }
    }

    .mxp-pkg-book .card {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 14px;
        padding: 24px;
    }

    .mxp-pkg-book .card h2 {
        font-size: 22px;
        margin: 0 0 8px;
    }

    .mxp-pkg-book .card-sub {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0 0 20px;
    }

    .mxp-pkg-book .tutor-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid var(--gray-line);
    }
    .mxp-pkg-book .tutor-row:last-child { border-bottom: none; }

    .mxp-pkg-book .tutor-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .mxp-pkg-book .tutor-meta img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        background: var(--cream);
    }

    .mxp-pkg-book .tutor-meta strong {
        display: block;
        font-size: 15px;
        color: var(--teal-darkest);
    }

    .mxp-pkg-book .tutor-meta span {
        font-size: 12px;
        color: var(--charcoal-soft);
    }

    .mxp-pkg-book .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        font-family: var(--sans);
        border: none;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
    }

    .mxp-pkg-book .btn-primary {
        background: var(--terracotta);
        color: var(--white) !important;
    }
    .mxp-pkg-book .btn-primary:hover { background: #A84B2D; color: var(--white) !important; }

    .mxp-pkg-book .btn-secondary {
        background: var(--white);
        color: var(--teal-deep) !important;
        border: 2px solid var(--teal-mid);
    }

    .mxp-pkg-book .btn-muted {
        background: var(--cream);
        color: var(--charcoal-soft) !important;
        cursor: not-allowed;
        opacity: 0.7;
    }

    .mxp-pkg-book .btn-ghost {
        background: transparent;
        color: var(--terracotta) !important;
        border: 1px solid var(--gray-line);
        padding: 6px 10px;
        font-size: 12px;
    }

    .mxp-pkg-book .session-item {
        padding: 14px 0;
        border-bottom: 1px solid var(--gray-line);
    }
    .mxp-pkg-book .session-item:last-child { border-bottom: none; }

    .mxp-pkg-book .session-item strong {
        display: block;
        font-size: 14px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .mxp-pkg-book .session-item p {
        margin: 0 0 8px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-pkg-book .actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .mxp-pkg-book .empty {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0;
    }

    .mxp-pkg-book .cap-note {
        margin-top: 12px;
        font-size: 13px;
        color: var(--terracotta);
        font-weight: 600;
    }
</style>

@section('mainContent')
@php
    $selected = count($cart['sessions'] ?? []);
    $allowed = (int) $package->sessions_count;
    $remaining = max(0, $allowed - $selected);
    $full = $selected >= $allowed;
@endphp
<div class="mxp-pkg-book">
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <a href="{{ route('tutoring') }}">{{ __('Tutoring') }}</a>
            <span>/</span>
            <a href="{{ route('sessionPackage.show', $package->id) }}">{{ $package->name }}</a>
            <span>/</span>
            {{ __('Book tutors') }}
        </div>
    </div>

    <div class="page">
        <div class="progress-bar-wrap">
            <div>
                <div class="progress-count">
                    {{ __('Sessions selected') }}: {{ $selected }} / {{ $allowed }}
                </div>
                <div style="font-size:13px;color:var(--charcoal-soft);margin-top:4px;">
                    {{ __('You can select 0 to') }} {{ $allowed }}.
                    {{ __('Payment is always the full package price') }}
                    (${{ number_format((float) $package->price, 0) }}).
                </div>
            </div>
            <a href="{{ route('sessionPackage.checkout', $package->id) }}" class="btn btn-secondary">
                {{ __('Continue to checkout') }} →
            </a>
        </div>

        <div class="layout">
            <div class="card">
                <h2>{{ __('Select a tutor') }}</h2>
                <p class="card-sub">
                    {{ __('Choose a tutor, then pick one date and slot. Come back here to add another session.') }}
                </p>

                @if ($full)
                    <p class="cap-note">{{ __('Package sessions are full. Remove a session to add a different one, or continue to checkout.') }}</p>
                @endif

                @forelse ($tutors as $tutor)
                    <div class="tutor-row">
                        <div class="tutor-meta">
                            <img src="{{ asset($tutor->image) }}" alt="{{ $tutor->name }}">
                            <div>
                                <strong>{{ $tutor->name }}</strong>
                                <span>
                                    @if ($tutor->tutor_price)
                                        ${{ $tutor->tutor_price }}/hr ·
                                    @endif
                                    {{ __('Rating') }}: {{ $tutor->total_tutor_rating ?? $tutor->total_rating ?? 0 }}
                                </span>
                            </div>
                        </div>
                        @if ($full)
                            <span class="btn btn-muted">{{ __('Limit reached') }}</span>
                        @else
                            <a class="btn btn-primary"
                                href="{{ route('sessionPackage.bookTutorSlot', [$package->id, $tutor->id]) }}">
                                {{ __('Select') }} →
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="empty">{{ __('No tutors available right now.') }}</p>
                @endforelse
            </div>

            <div class="card">
                <h2>{{ __('Your selections') }}</h2>
                <p class="card-sub">{{ $remaining }} {{ __('session(s) left to book later from My Tutors after purchase.') }}</p>

                @forelse ($cart['sessions'] as $index => $session)
                    <div class="session-item">
                        <strong>{{ $session['tutor_name'] }}</strong>
                        <p>
                            {{ $session['course_title'] }}<br>
                            {{ $session['date'] }} · {{ $session['start_time'] }} — {{ $session['end_time'] }}
                        </p>
                        <form action="{{ route('sessionPackage.removeSession', [$package->id, $index]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-ghost">{{ __('Remove') }}</button>
                        </form>
                    </div>
                @empty
                    <p class="empty">{{ __('No sessions selected yet. You can still buy the package and hire tutors later.') }}</p>
                @endforelse

                <div class="actions">
                    <a href="{{ route('sessionPackage.checkout', $package->id) }}" class="btn btn-primary">
                        {{ __('Go to checkout') }}
                    </a>
                    <a href="{{ route('sessionPackage.show', $package->id) }}" class="btn btn-secondary">
                        ← {{ __('Back to package') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
