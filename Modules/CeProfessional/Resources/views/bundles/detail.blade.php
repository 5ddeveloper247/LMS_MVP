@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ $bundle->name ?? $purchase->item_name ?? 'Bundle' }}
@endsection

@push('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    .ce-portal-content .mxp-ce-bundle { border-radius: 12px; overflow: hidden; margin: 0 -8px; }
</style>
@endpush

@section('mainContent')
    @include(theme('components.ce.ce-bundle-details-section'))
@endsection
