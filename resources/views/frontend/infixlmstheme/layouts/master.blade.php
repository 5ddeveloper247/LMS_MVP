@include(theme('partials._header'))
@include(theme('partials._menu'))

<style>
    .breadcrumb_area {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100% !important;
        text-align: center;
    }

    .breadcrumb_area:before {
        display: none
    }

    .breadcrumb_area:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: #2ca6a49d !important;
    }

    .breadcam_wrap {
        padding: 0 !important;
        position: relative;
        z-index: 99
    }

    .breadcam_wrap h1,
    .breadcam_wrap p {
        text-shadow: 1px 0px 5px #737373;
    }
</style>

<input type="hidden" name="base_url" class="base_url" value="{{ url('/') }}">
<input type="hidden" name="csrf_token" class="csrf_token" value="{{ csrf_token() }}">
@if (auth()->check())
    <input type="hidden" name="balance" class="user_balance" value="{{ auth()->user()->balance }}">
@endif
<input type="hidden" name="currency_symbol" class="currency_symbol" value="{{ Settings('currency_symbol') }}">
<input type="hidden" name="app_debug" class="app_debug" value="{{ env('APP_DEBUG') }}">
<link href="https://fonts.cdnfonts.com/css/cavolini" rel="stylesheet">
@include('preloader')
@yield('mainContent')

@include(theme('partials._footer'))
