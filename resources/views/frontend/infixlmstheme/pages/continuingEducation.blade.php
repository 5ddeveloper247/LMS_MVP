@extends(theme('layouts.master'))

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | Continuing Education
@endsection

@section('mainContent')
    @include(theme('components.continuing-education-page-section'))
    @include(theme('partials._custom_footer'))
@endsection
