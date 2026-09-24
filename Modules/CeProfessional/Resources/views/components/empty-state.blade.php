<div class="ce-empty-state">
    <div class="ce-empty-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
    </div>
    <h3>{{ $title ?? 'Nothing here yet' }}</h3>
    <p>{{ $message ?? '' }}</p>
    @if (! empty($buttonLabel) && ! empty($buttonUrl))
        <a href="{{ $buttonUrl }}" class="ce-btn ce-btn-primary">{{ $buttonLabel }}</a>
    @endif
</div>
