@php
    /** @var \Modules\ContinuingEducation\Entities\CeBundle $bundle */
    $hours = rtrim(rtrim(number_format((float) $bundle->total_hours, 1, '.', ''), '0'), '.');
@endphp
<div class="ce-path-card {{ $bundle->path_featured_class }}">
    @if ($bundle->is_best_seller)
        <div class="ce-path-badge">Most Common</div>
    @endif
    <p class="ce-path-hours">{{ $hours }} <small>Hours</small></p>
    <h3>{{ $bundle->name }}</h3>
    @if ($bundle->subtitle)
        <p class="ce-path-subtitle">{{ $bundle->subtitle }}</p>
    @endif
    <div class="ce-path-divider"></div>
    <ul class="ce-path-features">
        @foreach ($bundle->components as $component)
            <li>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ $component }}
            </li>
        @endforeach
    </ul>
    <p class="ce-path-price">{{ $bundle->formatted_price }}</p>
    <a href="{{ $bundle->buy_url }}" class="ce-btn-path {{ $bundle->path_button_class }}">{!! $bundle->buy_button_label !!}</a>
    @if ($bundle->savings_text)
        <p class="ce-path-note">{{ $bundle->savings_text }}</p>
    @endif
</div>
