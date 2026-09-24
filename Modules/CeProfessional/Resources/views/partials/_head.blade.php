<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep') | CE Professional Portal</title>
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" type="image/x-icon" href="{{ getCourseImage(Settings('favicon')) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/modules/ceprofessional/css/ce-variables.css') }}">
<link rel="stylesheet" href="{{ asset('public/modules/ceprofessional/css/ce-dashboard.css') }}">
@stack('css')
