@extends(theme('layouts.master'))

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ $pageTitle ?? 'Enroll' }}
@endsection

@section('mainContent')
    @include(theme('components.certification-enroll-section'), [
        'slug' => $slug ?? 'acls',
        'switcherItems' => $switcherItems ?? collect(),
        'certsJson' => $certsJson ?? [],
        'schedulesJson' => $schedulesJson ?? [],
        'checkoutUrl' => $checkoutUrl ?? '',
    ])
    @include(theme('partials._custom_footer'))
@endsection
