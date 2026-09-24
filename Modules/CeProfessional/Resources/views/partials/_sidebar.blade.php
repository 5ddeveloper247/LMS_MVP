@php
    $ceUser = auth()->user();
    $ceProfile = app(\Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface::class)
        ->findByUserId((int) $ceUser->id);
@endphp

<nav class="sidebar">
    <div class="logo d-flex justify-content-between custom_student_sidebar_head">
        <a href="{{ route('cePortal') }}">
            <img src="{{ getCourseImage(Settings('logo3') ? Settings('logo3') : Settings('logo')) }}" alt="">
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>

    <div class="sidebar_iner">
        <div class="sidebar-user text-center">
            <div class="sidebar-profile custom_student_img_border mx-auto">
                <img src="{{ getProfileImage($ceUser->image) }}" alt="">
            </div>
            <h4>{{ $ceUser->name }}</h4>
            @if ($ceProfile)
                <p class="mb-0 mt-1" style="font-size: 12px; opacity: 0.85;">
                    {{ strtoupper($ceProfile->license_type) }} · FL License
                </p>
            @endif
        </div>

        <ul class="list-unstyled pt-0">
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
                       class="d-flex align-items-center {{ $isActive ? 'active' : '' }} {{ $isDisabled ? 'pe-none opacity-50' : '' }}"
                       @if($isDisabled) aria-disabled="true" tabindex="-1" @endif>
                        <div class="menu_icon">
                            @include('ceprofessional::partials._sidebar-icon', ['icon' => $item['icon'] ?? 'dashboard'])
                        </div>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
