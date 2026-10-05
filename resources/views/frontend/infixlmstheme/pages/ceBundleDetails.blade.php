@extends(theme('layouts.master'))

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ $bundle->name ?? 'CE Bundle' }}
@endsection

@section('mainContent')
    @include(theme('components.ce.ce-bundle-details-section'))
    @include(theme('partials._custom_footer'))
@endsection
