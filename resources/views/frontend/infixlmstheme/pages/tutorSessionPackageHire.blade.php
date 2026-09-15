@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Hire tutor') }}
@endsection
@section('css')
    <style>
        .mxp-hire .progress-wrap {
            background: #fff;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 20px;
        }
        .mxp-hire .tutor-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
            background: #fff;
        }
        .mxp-hire .tutor-row:last-child { border-bottom: none; }
        .mxp-hire .tutor-meta {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .mxp-hire .tutor-meta img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection

@section('mainContent')
@php
    $remaining = $purchase->remainingSessions();
@endphp
<div class="mxp-hire">
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="section__title3 margin-50">
                    <h3>{{ __('Hire tutor') }} — {{ $purchase->package_name }}</h3>
                </div>

                <div class="progress-wrap">
                    <strong>{{ __('Remaining sessions') }}: {{ $remaining }}</strong>
                    <div class="mt-1" style="font-size:13px;color:#666;">
                        {{ __('Select a tutor, then pick one date and slot. No extra payment — this uses your package.') }}
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('myPackage.details', $purchase->id) }}" class="theme_btn small_btn4 bg-info">
                            ← {{ __('Back to package') }}
                        </a>
                    </div>
                </div>

                @forelse ($tutors as $tutor)
                    <div class="tutor-row px-3">
                        <div class="tutor-meta">
                            <img src="{{ asset($tutor->image) }}" alt="{{ $tutor->name }}">
                            <div>
                                <strong>{{ $tutor->name }}</strong>
                                <div style="font-size:12px;color:#777;">
                                    {{ __('Rating') }}: {{ $tutor->total_tutor_rating ?? $tutor->total_rating ?? 0 }}
                                </div>
                            </div>
                        </div>
                        <a class="theme_btn small_btn4"
                            href="{{ route('sessionPackage.hireTutorSlot', [$purchase->id, $tutor->id]) }}">
                            {{ __('Select') }} →
                        </a>
                    </div>
                @empty
                    <p class="text-center">{{ __('No tutors available right now.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
