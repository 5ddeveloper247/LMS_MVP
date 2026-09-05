@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Order Confirmed') }}
@endsection
@section('css')
    @include(theme('partials.shop-order-confirmation-styles'))
@endsection
@section('mainContent')
    @include(theme('components.order-confirmation-section'), [
        'confirmation' => $confirmation,
        'checkout' => $checkout,
    ])
@endsection
@section('js')
    @include(theme('partials._custom_footer'))
@endsection
