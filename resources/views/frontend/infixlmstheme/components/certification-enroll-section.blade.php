@php
    $slug = $slug ?? 'acls';
    $switcherItems = $switcherItems ?? collect();
    $certsJson = $certsJson ?? [];
    $schedulesJson = $schedulesJson ?? [];
    $checkoutUrl = $checkoutUrl ?? route('certifications.enroll.checkout');
@endphp
<style>
    .breadcrumb_area { display: none !important; }
</style>
<div class="mxp-certification-enroll">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/certifications/certification-enroll-scoped.css') }}?v=1">

    @include(theme('components.certification-enroll-main'), [
        'switcherItems' => $switcherItems,
        'checkoutUrl' => $checkoutUrl,
    ])
</div>

<script>
    window.CERT_ENROLL_SLUG = @json($slug);
    window.CERTIFICATION_CERTS = @json($certsJson);
    window.CERTIFICATION_SCHEDULES = @json($schedulesJson);
    window.CERTIFICATION_CHECKOUT_URL = @json($checkoutUrl);
    window.CERTIFICATIONS_SHOW_BASE = @json(url('/certifications'));
    window.CERTIFICATIONS_ENROLL_BASE = @json(url('/certifications/enroll'));
    window.CERTIFICATIONS_INDEX_URL = @json(route('certifications.index'));
</script>
@include(theme('components.certification-enroll-script'))
