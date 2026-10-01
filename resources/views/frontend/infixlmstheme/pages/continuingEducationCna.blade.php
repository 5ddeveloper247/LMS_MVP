@extends(theme('layouts.master'))

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | CNA License Renewal
@endsection

@section('mainContent')
    {{-- Temporary: reuse RN/LPN layout until a dedicated CNA design is provided. Courses are filtered to CNA. --}}
    @include(theme('components.ce.continuing-education-rn-lpn-page-section'))
    @include(theme('partials._custom_footer'))
@endsection
