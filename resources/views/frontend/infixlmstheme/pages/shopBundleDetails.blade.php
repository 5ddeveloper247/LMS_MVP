@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ @$bundle->name }}
@endsection

@include(theme('partials.shop-bundle-detail-styles'))

@section('mainContent')
    <x-shop-bundle-detail-section :request="$request" :bundle="$bundle" :relatedProducts="$relatedProducts" />
@endsection

@section('js')
@endsection
