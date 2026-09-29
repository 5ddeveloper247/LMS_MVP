@php
    /** @var \Modules\ContinuingEducation\Entities\CeBundle $bundle */
@endphp
<div class="ce-bundle-card {{ $bundle->card_css_class }}">
    @if ($bundle->is_best_seller)
        <div class="ce-bundle-badge">Best Value</div>
    @endif
    <h3>{{ $bundle->name }}</h3>
    @if ($bundle->subtitle)
        <p class="ce-bundle-subtitle">{{ $bundle->subtitle }}</p>
    @endif
    <div class="ce-bundle-price-row">
        <span class="ce-bundle-price">{{ $bundle->formatted_price }}</span>
        @if ($bundle->formatted_compare_price)
            <span class="ce-bundle-price-compare">{{ $bundle->formatted_compare_price }}</span>
        @endif
    </div>
    <p class="ce-bundle-price-note">{!! $bundle->price_note !!}</p>
    <div class="ce-bundle-divider"></div>
    <ul class="ce-bundle-features">
        @foreach ($bundle->components as $component)
            <li>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ $component }}
            </li>
        @endforeach
    </ul>
    <a href="{{ $bundle->buy_url }}" class="ce-btn-bundle {{ $bundle->button_css_class }}">{!! $bundle->buy_button_label !!}</a>
    @if ($bundle->savings_text)
        <p class="ce-bundle-savings">{{ $bundle->savings_text }}</p>
    @endif
</div>
