@extends(theme('layouts.master'))

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ $pageTitle ?? 'Certification Details' }}
@endsection

@section('mainContent')
    @include(theme('components.certification-detail-section'), [
        'slug' => $slug ?? 'acls',
        'switcherItems' => $switcherItems ?? collect(),
        'coursesJson' => $coursesJson ?? [],
    ])
    @include(theme('partials._custom_footer'))
@endsection
