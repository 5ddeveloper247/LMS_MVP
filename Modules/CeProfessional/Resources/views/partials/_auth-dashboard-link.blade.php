@auth
    @php
        $linkLabel = $label ?? __('dashboard.Dashboard');
        $linkClass = $class ?? '';
    @endphp
    <a href="{{ ceAuthDashboardUrl() }}" @if ($linkClass) class="{{ $linkClass }}" @endif>{{ $linkLabel }}</a>
@endauth
