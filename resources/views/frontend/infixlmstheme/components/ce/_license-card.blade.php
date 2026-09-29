@php
    /** @var \Modules\ContinuingEducation\Entities\CeLicenseType $license */
@endphp
<div class="ce-license-card {{ $license->card_class }}" id="{{ $license->resolved_anchor_id }}">
    <div class="ce-license-icon">
        @if ($license->card_style === 'terra')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        @else
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        @endif
    </div>
    <h3>{{ $license->name }}</h3>
    @if ($license->subtitle)
        <p class="ce-license-subtitle">{{ $license->subtitle }}</p>
    @endif
    @if ($license->description)
        <p>{{ $license->description }}</p>
    @endif
    <ul class="ce-license-req">
        <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ $license->component_1 }}
        </li>
        <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ $license->component_2 }}
        </li>
        <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ $license->component_3 }}
        </li>
    </ul>
    @if (($bundles ?? collect())->isNotEmpty())
        <div class="ce-license-bundles">
            <h4>Available Bundles</h4>
            @foreach ($bundles as $bundle)
                <div class="ce-bundle-row">
                    <div>
                        <p class="ce-bundle-name">{{ $bundle->name }}</p>
                        <p class="ce-bundle-detail">{{ $bundle->license_preview_detail }}</p>
                    </div>
                    <span class="ce-bundle-price">{{ $bundle->formatted_price }}</span>
                </div>
            @endforeach
        </div>
    @endif
    @if ($license->button_label)
        <a href="{{ $license->resolved_button_url }}" class="ce-btn-portal {{ $license->button_class }}">
            {{ $license->button_label }} &rarr;
        </a>
    @endif
</div>
