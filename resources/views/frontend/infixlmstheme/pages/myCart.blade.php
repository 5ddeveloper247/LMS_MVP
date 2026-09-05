@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('coupons.My Cart') }}
@endsection

@include(theme('partials.shop-cart-styles'))

@section('mainContent')
    <x-my-cart-with-login-page-section />
@endsection

@section('js')
    @include(theme('partials._custom_footer'))
@endsection
