@php
    $show = $show ?? false;
    $items = $items ?? collect();
    $enrollment_count = (int) ($enrollment_count ?? 0);
    $is_ce_professional = (bool) ($is_ce_professional ?? false);
@endphp
@if ($show)

<style>
    .mxp-dash-cert {
        --mxp-teal: #0F6E56;
        --mxp-teal-light: #1A8A6F;
        --mxp-border: #e8ecef;
    }
    .mxp-dash-cert .dashboard_card {
        border: 1px solid var(--mxp-border);
        border-radius: 12px;
        padding: 24px;
        height: 100%;
    }
    .mxp-dash-cert .cert-dash-head {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
    }
    .mxp-dash-cert .cert-dash-head h4 {
        margin: 0 0 6px;
        font-weight: 600;
    }
    .mxp-dash-cert .cert-dash-head p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        max-width: 640px;
    }
    .mxp-dash-cert .cert-audience {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        padding: 4px 10px;
        border-radius: 999px;
        background: #ecfdf5;
        color: var(--mxp-teal);
        margin-bottom: 8px;
    }
    .mxp-dash-cert .cert-stat-pill {
        background: linear-gradient(135deg, var(--mxp-teal-light), var(--mxp-teal));
        color: #fff;
        border-radius: 10px;
        padding: 12px 20px;
        text-align: center;
        min-width: 120px;
    }
    .mxp-dash-cert .cert-stat-pill span {
        display: block;
        font-size: 12px;
        opacity: 0.9;
    }
    .mxp-dash-cert .cert-stat-pill strong {
        font-size: 28px;
        line-height: 1.2;
    }
    .mxp-dash-cert .cert-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid var(--mxp-border);
    }
    .mxp-dash-cert .cert-row:last-child {
        border-bottom: 0;
    }
    .mxp-dash-cert .cert-row-title {
        font-weight: 600;
        margin: 0 0 4px;
    }
    .mxp-dash-cert .cert-row-meta {
        margin: 0;
        font-size: 13px;
        color: #64748b;
    }
    .mxp-dash-cert .cert-badge {
        font-size: 11px;
        font-weight: 600;
        color: var(--mxp-teal);
        margin-right: 8px;
    }
    .mxp-dash-cert .cert-empty {
        text-align: center;
        padding: 28px 16px;
        color: #64748b;
    }
    .mxp-dash-cert .theme_btn,
    .mxp-dash-cert .cert-btn-outline {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
    }
    .mxp-dash-cert .theme_btn {
        background: var(--mxp-teal);
        color: #fff !important;
        border: 2px solid var(--mxp-teal);
    }
    .mxp-dash-cert .cert-btn-outline {
        border: 2px solid var(--mxp-teal);
        color: var(--mxp-teal) !important;
        background: #fff;
    }
</style>

<div class="row mt-30 mxp-dash-cert">
    <div class="col-12">
        <div class="dashboard_card">
            <div class="cert-dash-head">
                <div>
                    <span class="cert-audience">
                        {{ $is_ce_professional ? __('CE Professional') : __('Student') }}
                    </span>
                    <h4>{{ $title ?? __('Life support certifications') }}</h4>
                    <p>{{ $intro ?? '' }}</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <div class="cert-stat-pill">
                        <span>{{ __('Enrolled') }}</span>
                        <strong>{{ $enrollment_count }}</strong>
                    </div>
                    <a href="{{ $browse_url ?? route('certifications.index') }}" class="theme_btn">
                        {{ $browse_label ?? __('Browse certifications') }}
                    </a>
                </div>
            </div>

            @if ($enrollment_count > 0 && $items->isNotEmpty())
                <div class="cert-list">
                    @foreach ($items as $item)
                        <div class="cert-row">
                            <div>
                                <p class="cert-row-title">
                                    @if (!empty($item['badge']))
                                        <span class="cert-badge">{{ $item['badge'] }}</span>
                                    @endif
                                    {{ $item['title'] }}
                                </p>
                                <p class="cert-row-meta">
                                    {{ $item['option'] ?? '' }}
                                    @if (!empty($item['class_date']) && $item['class_date'] !== '—')
                                        · {{ __('Class date') }}: {{ $item['class_date'] }}
                                    @endif
                                    · {{ __('Enrolled') }} {{ $item['enrolled_at'] ?? '' }}
                                    · {{ $item['amount'] ?? '' }}
                                </p>
                            </div>
                            <a href="{{ $item['enroll_url'] ?? route('certifications.index') }}" class="cert-btn-outline">
                                {{ __('View') }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="cert-empty">
                    <p class="mb-20">{{ $empty_message ?? '' }}</p>
                    <a href="{{ $browse_url ?? route('certifications.index') }}" class="theme_btn">
                        {{ $browse_label ?? __('Browse certifications') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endif
