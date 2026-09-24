{{-- CE portal shell mirrors theme dashboard_master; sidebar stays CE-specific in this module. --}}
@include(theme('partials._header'))
<link href="https://fonts.cdnfonts.com/css/cavolini" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/modules/ceprofessional/css/ce-variables.css') }}">
<link rel="stylesheet" href="{{ asset('public/modules/ceprofessional/css/ce-dashboard.css') }}">
@stack('css')
<div class="dashboard_main_wrapper">
    @include('ceprofessional::partials._sidebar')

    <section class="main_content dashboard_part">
        @include('ceprofessional::partials._dashboard_menu')

        <div class="main_content_iner main_content_padding">
            <div class="ce-portal-content">
                @yield('mainContent')
            </div>
        </div>
    </section>
</div>
@include('preloader')
<input type="hidden" name="app_debug" class="app_debug" value="{{ env('APP_DEBUG') }}">
@include(theme('partials._footer'))
<script src="{{ asset('public/modules/ceprofessional/js/ce-dashboard.js') }}"></script>
@stack('js')
@stack('scripts')
