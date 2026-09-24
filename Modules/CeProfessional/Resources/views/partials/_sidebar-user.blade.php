@php
    $initials = collect(explode(' ', $user->name ?? ''))
        ->filter()
        ->take(2)
        ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
        ->implode('');
@endphp

<div class="ce-sidebar-user">
    <div class="ce-sidebar-avatar">{{ $initials ?: 'CE' }}</div>
    <h4>{{ $user->name }}</h4>
    @if (!empty($license_label))
        <span class="ce-license-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            {{ $license_label }}
        </span>
    @endif
</div>
