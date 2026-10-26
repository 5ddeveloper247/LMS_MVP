@extends(theme('layouts.master'))

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | Certifications
@endsection

@section('mainContent')
    @include(theme('components.certifications-hub-section'))
    @include(theme('partials._custom_footer'))
@endsection
