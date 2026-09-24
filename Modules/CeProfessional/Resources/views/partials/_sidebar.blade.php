<aside class="ce-sidebar" id="ceSidebar">
    <div class="ce-sidebar-brand">
        <a href="{{ route('cePortal') }}">Merkaii <em>Xcellence</em> Prep</a>
    </div>

    <nav class="ce-sidebar-nav" aria-label="CE Professional navigation">
        <ul>
            @foreach (config('ceprofessional.sidebar_menu', []) as $item)
                @php
                    $isActive = ! empty($item['active']) && collect($item['active'])->contains(fn ($name) => request()->routeIs($name));
                    $isDisabled = ! empty($item['coming_soon']);
                    $href = '#';

                    if (! $isDisabled && ! empty($item['route'])) {
                        $href = route($item['route']);
                    } elseif (! $isDisabled && ! empty($item['url'])) {
                        $href = url($item['url']);
                    }
                @endphp
                <li>
                    <a href="{{ $href }}"
                       class="ce-nav-link {{ $isActive ? 'active' : '' }} {{ $isDisabled ? 'disabled' : '' }}"
                       @if($isDisabled) aria-disabled="true" tabindex="-1" @endif>
                        @include('ceprofessional::partials._sidebar-icon', ['icon' => $item['icon'] ?? 'dashboard'])
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="ce-sidebar-footer">
        <a href="{{ route('logout') }}" class="ce-nav-link logout">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            <span>Log Out</span>
        </a>
    </div>
</aside>
