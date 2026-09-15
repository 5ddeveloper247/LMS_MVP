@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Package details') }}
@endsection
@section('css')
    <style>
        .mxp-pkg-detail .summary {
            border: 1px solid #e8dfd0;
            border-radius: 12px;
            padding: 22px 24px;
            background: #fff;
            margin-bottom: 24px;
        }
        .mxp-pkg-detail .summary h3 {
            margin: 0 0 10px;
            color: #0A4D3C;
            font-size: 22px;
        }
        .mxp-pkg-detail .summary .meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 6px;
        }
        .mxp-pkg-detail .summary .remaining {
            font-weight: 600;
            color: #1A8A6F;
            margin-top: 10px;
        }
        .mxp-pkg-detail .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
        }
        .mxp-pkg-detail .empty {
            padding: 24px;
            text-align: center;
            color: #777;
            background: #fff;
            border: 1px dashed #ddd;
            border-radius: 12px;
        }
    </style>
@endsection

@section('mainContent')
    <div class="mxp-pkg-detail">
        <div class="main_content_iner main_content_padding">
            <div class="dashboard_lg_card">
                <div class="container-fluid no-gutters">
                    <div class="my_courses_wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="section__title3 margin-50">
                                    <h3>{{ __('Package details') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="summary">
                            <h3>{{ $purchase->package_name ?: __('Session Package') }}</h3>
                            <div class="meta">
                                {{ __('Purchased') }}:
                                {{ $purchase->created_at ? $purchase->created_at->format('d M Y') : '—' }}
                            </div>
                            <div class="meta">
                                {{ __('Price paid') }}: ${{ number_format((float) $purchase->price, 0) }}
                            </div>
                            <div class="remaining">
                                {{ __('Sessions used') }}:
                                {{ (int) $purchase->sessions_used }} / {{ (int) $purchase->sessions_allowed }}
                                · {{ __('Remaining') }}: {{ $purchase->remainingSessions() }}
                            </div>
                            <div class="actions">
                                @if ($purchase->remainingSessions() > 0)
                                    <a href="{{ route('sessionPackage.hireFromPurchase', $purchase->id) }}"
                                        class="theme_btn small_btn4">{{ __('Hire tutor') }}</a>
                                @else
                                    <span class="theme_btn small_btn4 bg-secondary" style="cursor:not-allowed;opacity:.7;">
                                        {{ __('No sessions remaining') }}
                                    </span>
                                @endif
                                <a href="{{ route('myTutors', ['tab' => 'packages']) }}"
                                    class="theme_btn small_btn4 bg-info">← {{ __('Back to My Packages') }}</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <h4 style="color:#0A4D3C;">{{ __('Hired tutors & sessions') }}</h4>
                            </div>
                        </div>

                        @if ($hirings->count() > 0)
                            <div class="row">
                                @foreach ($hirings as $tutor)
                                    <div class="col-xl-6 col-sm-6 col-12 mb-3">
                                        <div class="couse_wizged border">
                                            <div class="thumb">
                                                <div class="thumb_inner lazy"
                                                    data-src="{{ getCourseImage(optional($tutor->instructor)->image) }}">
                                                </div>
                                            </div>
                                            <div class="course_content py-3 px-2">
                                                <h4 class="noBrake">
                                                    {{ optional($tutor->instructor)->name ?? __('Tutor') }}
                                                </h4>
                                                <div class="course_less_students mt-3">
                                                    <ul>
                                                        <li>
                                                            <div class="d-inline w-50">Date:</div>
                                                            <div class="d-inline w-50 float-right text-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_date)->format('d M Y') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline w-50">Start:</div>
                                                            <div class="d-inline w-50 float-right text-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_start_time)->format('H:i a') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline w-50">End:</div>
                                                            <div class="d-inline w-50 float-right text-right">
                                                                {{ \Carbon\Carbon::parse($tutor->assign_end_time)->format('H:i a') }}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-inline w-50">Course:</div>
                                                            <div class="d-inline w-50 float-right text-right text-nowrap"
                                                                style="overflow:hidden;text-overflow:ellipsis">
                                                                {{ optional($tutor->course)->title ?? '—' }}
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if (!empty($tutor->meeting_join_url))
                                                    <a href="{{ $tutor->meeting_join_url }}"
                                                        class="theme_btn small_btn4 mt-2">{{ __('Join') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty">
                                {{ __('No tutors hired on this package yet.') }}
                                @if ($purchase->remainingSessions() > 0)
                                    <div class="mt-3">
                                        <a href="{{ route('sessionPackage.hireFromPurchase', $purchase->id) }}"
                                            class="theme_btn small_btn4">{{ __('Hire your first tutor') }}</a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
