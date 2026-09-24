<div class="ce-section-header">
    <h2>{{ $title }}</h2>
    @if (! empty($link) && ! empty($linkLabel))
        <a href="{{ $link }}" class="ce-section-link">{{ $linkLabel }}</a>
    @endif
</div>
