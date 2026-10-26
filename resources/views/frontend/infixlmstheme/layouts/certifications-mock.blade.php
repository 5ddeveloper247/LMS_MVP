<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Certifications | Merkaii Xcellence Prep')</title>
    <meta name="description" content="ACLS, BLS, PALS, CPR &amp; First Aid, IV Therapy, HEDIS, and AHA Skills Check certification courses with Merkaii Xcellence Prep in Lakeland, FL.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/certifications/certifications.css') }}?v=1">
    @stack('styles')
</head>
<body>
@yield('content')
@stack('scripts')
</body>
</html>
