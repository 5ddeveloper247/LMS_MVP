@auth
    @php
        $linkLabel = $label ?? __('frontendmanage.My Profile');
        $linkClass = $class ?? '';
    @endphp
    <a href="{{ ceAuthProfileUrl() }}" @if ($linkClass) class="{{ $linkClass }}" @endif>{{ $linkLabel }}</a>
@endauth
