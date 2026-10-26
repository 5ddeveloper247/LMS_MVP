@php
    $slug = $slug ?? 'acls';
    $switcherItems = $switcherItems ?? collect();
    $coursesJson = $coursesJson ?? [];
@endphp
<style>
    .breadcrumb_area { display: none !important; }
</style>
<div class="mxp-certification-detail">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/certifications/certification-detail-scoped.css') }}?v=3">

    @include(theme('components.certification-detail-main'), [
        'slug' => $slug,
        'switcherItems' => $switcherItems,
    ])
</div>

<script>
    window.CERT_DETAIL_SLUG = @json($slug);
    window.CERTIFICATION_COURSES = @json($coursesJson);
    window.CERTIFICATIONS_SHOW_BASE = @json(url('/certifications'));
    window.CERTIFICATIONS_ENROLL_BASE = @json(url('/certifications/enroll'));
    window.CERTIFICATIONS_INDEX_URL = @json(route('certifications.index'));
</script>
@include(theme('components.certification-detail-script'))
