<div class="ce-stat-card">
    <div class="ce-stat-label">{{ $label }}</div>
    <div class="ce-stat-value {{ $valueClass ?? '' }}">{!! $value !!}</div>
    @if (! empty($note))
        <div class="ce-stat-note">{{ $note }}</div>
    @endif
</div>
