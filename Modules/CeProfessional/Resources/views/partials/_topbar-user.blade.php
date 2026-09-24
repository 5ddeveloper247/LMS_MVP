@php
    $authUser = auth()->user();
    $initials = collect(explode(' ', $authUser->name ?? ''))
        ->filter()
        ->take(2)
        ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
        ->implode('');
    $firstName = explode(' ', trim($authUser->name ?? ''))[0] ?: 'there';
    $licenseShort = $license_short ?? null;
@endphp

<div class="ce-topbar-user">
    <div class="ce-topbar-avatar">{{ $initials ?: 'CE' }}</div>
    <div class="ce-topbar-user-text">
        <span class="ce-topbar-greeting">Hi, {{ $firstName }}!</span>
        @if ($licenseShort)
            <span class="ce-topbar-license">{{ $licenseShort }} · FL LICENSE</span>
        @endif
    </div>
</div>
