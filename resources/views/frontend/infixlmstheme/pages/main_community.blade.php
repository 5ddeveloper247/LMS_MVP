@extends(theme('layouts.master'))

@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | Main Community
@endsection

@section('mainContent')

@include(theme('components.main-community-page-section'))
@include(theme('partials._custom_footer'))
@endsection