@auth
    @php
        $linkLabel = $label ?? __('frontend.Account Settings');
        $linkClass = $class ?? '';
    @endphp
    <a href="{{ ceAuthAccountUrl() }}" @if ($linkClass) class="{{ $linkClass }}" @endif>{{ $linkLabel }}</a>
@endauth
