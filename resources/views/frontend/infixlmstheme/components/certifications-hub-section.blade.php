<style>
    /* Use mock page chrome only — hide default theme breadcrumb band on this page */
    .breadcrumb_area { display: none !important; }
</style>
<div class="mxp-certifications">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/certifications/certifications-scoped.css') }}?v=2">

    @include(theme('components.certifications-hub-main'))
</div>
