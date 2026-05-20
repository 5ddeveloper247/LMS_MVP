@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontendmanage.Home') }}
@endsection

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/home.css') }}">
<!-- <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script> -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>


{{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet"> --}}

<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/owl.theme.default.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


{{-- for scroll our partner --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- events and news tabs-content --}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
{{-- animation gsap --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-K2m8j9G5CrXJcS7MZyDZp3c9ZFehXbZ2M4m8KpA4y6XrbY6x9xL7DkIbYp6EZxjEJSt2eyM4f53S4z2f6i2PAA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,500&family=Montserrat:wght@300;400;500;600;700&display=swap"
  rel="stylesheet">


{{-- <style>
    .heading-icon {
        background-color: #a6f0ec59;
        color: #1E3A5F;
        height: 30px;
        width: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        font-size: 16px;
    }

    .sub-heading {
        color: #2CA6A4 !important;
    }

    .anim-btn button {
        background-color: #1E3A5F !important;
        border: 1px solid #1E3A5F !important;
        color: #fff !important;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 10px;
        padding: 15px 20px !important;

    }

    .anim-btn button:hover {
        background-color: #1e3a5f61 !important;
        border: 1px solid #1E3A5F !important;
        transition: all 0.3s ease;
    }

    @media (max-width: 1200px) {
        .anim-btn {
            font-size: 11px !important;
        }
    }


    .benefit-grid {
        background: radial-gradient(circle, rgba(60, 105, 164, 1) 0%, rgba(30, 58, 95, 1) 60%);
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .benefit-card {
        h3 {
            font-size: clamp(16px, 2.5vw, 20px) !important;
            font-weight: 600 !important;
            font-family: "Inter";
            color: #fff;
        }
    }

    h2 {
        font-size: clamp(1.3rem, 4vw, 2.5rem) !important;
        font-family: "Rubik" !important;
        font-weight: 600 !important;
    }

    @media (max-width: 1250px) {
        h2 {
            font-size: clamp(1.3rem, 2.5vw, 2rem) !important;
        }
    }

    .rubik {
        font-family: "Rubik" !important;
    }

    .testimonial-section .testimonial-top .card,
    .testimonial-bottom .card {
        background-image: url('{{ asset('public/assets/review.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        height: 16.7rem;
        width: 39rem;
        border: none !important;
        flex-shrink: 0;
    }

    .testimonial-top {
        display: flex;
        gap: 1rem;
        animation: slideLeft 30s linear infinite;
    }

    .testimonial-bottom {
        display: flex;
        gap: 1rem;
        animation: slideRight 30s linear infinite;
    }

    @keyframes slideLeft {
        from {
            transform: translateX(0%);
        }

        to {
            transform: translateX(-100%);
        }
    }

    @keyframes slideRight {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0%);
        }
    }

    @media (max-width: 767px) {

        .testimonial-bottom,
        .testimonial-top {
            animation-duration: 10s
        }

        @keyframes slideLeft {
            from {
                transform: translateX(0%);
            }

            to {
                transform: translateX(-600%);
            }
        }

        @keyframes slideRight {
            from {
                transform: translateX(-600%);
            }

            to {
                transform: translateX(0%);
            }
        }
    }

    /* =============SUCCESS-METRICS=============== */
    .success-metrics .card {
        background-color: var(--system_primery_color);
        border-radius: 14px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        position: relative !important;
        border: none !important;
        overflow: hidden;
    }

    .success-metrics .card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0%;
        transform: translate(-50%, -50%);
        height: 600px;
        width: 80%;
        background: linear-gradient(198deg, rgba(255, 255, 255, 1) 0%, rgba(47, 50, 144, 1) 100%);
        opacity: 0.2;
        z-index: 100;
        transform-origin: center;
        transform: rotate(-55deg);
    }

    .success-grid {
        display: grid;
        gap: 60px;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));

        .num {
            font-weight: 600 !important;
            font-size: clamp(30px, 4vw, 50px) !important;
            font-family: "Inter" !important;
        }

        h2 {
            font-weight: 500 !important;
            font-family: "Inter" !important;
        }

        h6 {
            font-weight: 600 !important;
            font-family: "Inter" !important;
        }
    }

    h1 {
        font-weight: 600 !important;
        font-size: 60px !important;
        line-height: 100% !important;
        font-family: "Inter" !important;
    }

    @media (max-width: 1240px) {
        .success-grid {
            display: grid;
            gap: 30px;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .success-grid {
            display: grid;
            gap: 30px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            text-align: center
        }
    }


    /* =============INSTRUCTOR-SECTION=============== */
    .instructor-section .card {
        background-color: var(--system_primery_color);
        border-radius: 14px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        position: relative !important;
        border: none !important;
    }

    .instructor-section .card::before {
        content: '';
        position: absolute;
        top: 16%;
        left: 19%;
        height: 150px;
        width: 18%;
        background: linear-gradient(198deg, rgba(255, 255, 255, 1) 0%, rgba(47, 50, 144, 1) 100%);
        opacity: 0.2;
        z-index: 100;
        transform: rotate(-55deg);
        pointer-events: none
    }

    .instructor-section .card::after {
        content: '';
        position: absolute;
        top: 30%;
        right: 19%;
        height: 150px;
        width: 35%;
        background: linear-gradient(198deg, rgba(255, 255, 255, 1) 0%, rgba(47, 50, 144, 1) 100%);
        opacity: 0.2;
        z-index: 100;
        transform: rotate(-55deg);
        pointer-events: none;
    }


    /* =============Course-Section=============== */
    .course-section .card {
        border-radius: 14px;
        box-shadow: rgba(0, 0, 0, 0.061) 0px 3px 20px;
        position: relative !important;
        border: none !important;
    }

    .course-section .nav-link {
        font-weight: 600 !important;
        font-size: clamp(14px, 2vw, 16px) !important;
        font-family: "Inter" !important;
        color: #1E3A5F !important;
        border-radius: 50px
    }

    .course-section .nav-link.active {
        font-weight: 600 !important;
        font-size: clamp(14px, 2vw, 16px) !important;
        font-family: "Inter" !important;
        background-color: var(--system_primery_color) !important;
        color: #fff !important;
        border-radius: 50px
    }

    .comparison-table {
        background-color: #fff;
        color: var(--system_primery_color) !important;
        border-radius: 8px;
        overflow: hidden;
    }

    .comparison-table th,
    .comparison-table td {
        padding: 1rem;
        vertical-align: middle;
        color: var(--system_primery_color) !important;
        border: none !important
    }

    /* Mobile card view */
    @media (max-width: 768px) {
        .comparison-table thead {
            display: none;
        }

        .comparison-table tr {
            display: block;
            margin-bottom: 1rem;
            background: #fff;
            border-radius: 8px;
            padding: 1rem;
        }

        .comparison-table td {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .comparison-table td:last-child {
            border-bottom: none;
        }

        .comparison-table td::before {
            content: attr(data-label);
            font-weight: 600;
            margin-right: 10px;
        }
    }

    @media (max-width: 1600px) {
        .success-grid {
            display: grid;
            gap: 30px;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        }

        h1 {
            font-size: 50px !important;
        }

        h2 {
            font-size: 30px !important
        }

        h5 {
            font-size: 20px !important
        }

        h6 {
            font-size: 14px !important
        }

        button {
            font-size: 14px !important
        }

        p {
            font-size: 14px !important
        }

        li {
            font-size: 12px !important
        }

        span {
            font-size: 13px !important
        }

    }

    @media (max-width: 1400px) {
        h1 {
            font-size: 40px !important;
        }

        h2 {
            font-size: 24px !important
        }

        h3, .benefit-card h3 {
            font-size: 18px !important
        }

        h5 {
            font-size: 16px !important
        }

        h6 {
            font-size: 12px !important
        }

        .success-grid .num {
            font-size: 35px !important
        }

        .success-grid {
            display: grid
    ;
            gap: 30px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        button, .theme_btn, .anim-btn button {
            font-size: 12px !important;
            padding: 8px 10px !important;
        }

        .anim-hero {
            width: 100px !important
        }

        p {
            font-size: 12px !important
        }

        li {
            font-size: 11px !important
        }

        span {
            font-size: 12px !important
        }
    }
</style> --}}




{{-- @section('mainContent') --}}
    {{-- MainBanner --}}



        {{-- Old hero  --}}
    {{-- <section class="sec-1 show-animate position-relative"
        style="background: linear-gradient(180deg, #2CA6A4, transparent); height: fit-content;">
        <img src="https://html.rrdevs.net/edcare/assets/img/shapes/hero-shape-11.png" width="300"
            style="position: absolute; left: 0; top: 0;" alt="">

        <div class="container-fluid px-0 g-0 h-100 mb-4">
            <div
                class="row bg_text position-relative justify-content-between align-items-center px-3 px-sm-5 h-100 pt-5 pt-md-0 mb-4">

                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="d-flex align-items-center gap-1 bg-white p-2 mb-4"
                        style="border-radius: 50px; width: fit-content; padding-right: 22px !important;">
                        <span class="heading-icon">
                            <i class="fa-sharp fa-solid fa-bolt"></i>
                        </span>Welcome to the Merkaii Xcellence Prepp
                    </h6>

                    <h1 class="mb-3 navy-text">
                        {{@$homeContent->slider_title}}
                        <!-- Pass The NCLEX® On Your First Attempt -->
                    </h1>

                    <p class="mb-4 hero-section-p">
                    {{@$homeContent->slider_text}}
                        <!-- Personalized Tutoring, Flexible Live Courses, and Expert Nurse Educators. -->
                    </p>

                    <p class="hero-section mb-1">
                        {{@$homeContent->slider_text}}
                    </p>

                    @if (@$homeContent->show_banner_search_box == 1)
                        <form action="{{ route('search') }}" class="mb-4 mt-3" id="search_form">
                            <div style="max-width: 530px !important;" class="d-none d-sm-flex position-relative">
                                <input type="text" style="border-radius: 50px; height: 50px;"
                                    class="form-control search_courses" name="query" placeholder="Search"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'">

                                <div class="input-group-prepend">
                                    <button class="btn px-4"
                                        style="background-color: #1E3A5F; color: #fff; border-radius: 50px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);"
                                        type="submit" id="button-addon1"><i class="ti-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="search_courses_list position-absolute"></div>
                    @endif

                    <div class="d-flex align-items-center gap-2 anim-btn border-0">
                        <button style="background-color: var(--system_primery_color); border-radius: 50px;"
                            class="py-2 px-4 text-white">Start Your Free NCLEX® Prep Trial</button>
                        <button style="background-color: var(--system_primery_color); border-radius: 50px;"
                            class="py-2 px-4 text-white">Learn How It Works</button>
                    </div>
                </div>

                <div class="col-md-6 home_bg overflow-hidden">
                    <div class="d-flex align-items-center justify-content-center position-relative h-100" style="z-index: 99;">
                        <!-- <img class="hero_img" src="{{ asset($homeContent->slider_banner) }}" width="80%" alt=""> -->
                        <!-- <img src="{{ asset('public/assets/hero-banner.png') }}" width="100%" alt=""> -->
                        <img src="{{ asset($homeContent->slider_banner) }}" width="100%" alt="">
                        <div class="anim-hero d-none flex-column align-items-center d-lg-flex"
                            style="position: absolute; top: 30%; left: 0%;">
                            <img src="{{ asset('public/assets/badge-1.png') }}" width="160px" alt="Live Classes"
                                class="benefit-icon-img">
                        </div>

                        <div class="anim-hero d-flex gap-2 justify-content-between align-items-center"
                            style="position: absolute; top: 10%; right: 10%;">
                            <img src="{{ asset('public/assets/badge-2.png') }}" style="width: clamp(100px, 20vw, 160px)"
                                alt="Live Classes" class="benefit-icon-img">
                        </div>
                    </div>
                </div>
            </div>

            <img style="position: absolute; right: 0; bottom: 0;" class="d-none d-lg-block"
                src="{{ asset('public/assets/r-lines.png') }}" width="350px" alt="Live Classes" class="benefit-icon-img">

            <x-featured-program-plan />
        </div>
    </section> --}}

    {{-- Benefits --}}
    {{-- <section class="benefits">
        <div class="container-fluid py-5 px-3 px-sm-5">
            <div class="benefit-grid row px-3 py-5">
                <div class="col-lg-3 col-6" data-aos="fade-up">
                    <div
                        class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/live_class.png') }}" width="60" alt="Live Classes"
                                class="benefit-icon-img">
                        </div>
                        <h3>Live, Interactive Classes</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-6" data-aos="fade-up">
                    <div
                        class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/onDemand.png') }}" width="60" alt="Live Classes"
                                class="benefit-icon-img">
                        </div>
                        <h3>On‑demand content for busy schedules</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-6" data-aos="fade-up">
                    <div
                        class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/expert.png') }}" width="60" alt="Live Classes"
                                class="benefit-icon-img">
                        </div>
                        <h3>Expert Nurse Educators</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-6" data-aos="fade-up">
                    <div
                        class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/pass_rate.png') }}" width="70" alt="Live Classes"
                                class="benefit-icon-img">
                        </div>
                        <h3>Pass-Rate Guarantee</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- Testimonials Section --}}
    {{-- <section class="testimonial-section">
        <div class="text-center">
            <h2 data-aos="fade-up">Trusted by Thousands of Nurses</h2>
            <p class="opacity-75 inter" data-aos="fade-up">
                We’re proud to help aspiring nurses succeed every day. Here’s what they’re saying.
            </p>
        </div>

        <div class="testimonial-top mt-4">
        @if(@$testimonials != "")
            @foreach (@$testimonials as $item)
                <div class="card" data-aos="fade-up">
                    <div class="card-body px-5 pt-5 pb-4 d-flex align-items-end">
                        <div class="d-flex flex-column">
                            <!-- Quote SVG -->
                            <svg class="mb-3" width="25" height="16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.68 6.38C..." fill="#FF6B6B" />
                            </svg>

                            <div>
                                <small>
                                    {{@$item->body}}
                                </small>
                                <!-- Closing Quote -->
                                <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68 6.38C..." fill="#FF6B6B" />
                                </svg>
                            </div>

                            <div class="mt-3">
                                <h6 class="fw-bold">{{@$item->author}}</h6>
                                <small class="text-muted">{{@$item->profession}}</small>
                            </div>
                        </div>

                        <img src="{{getTestimonialImage($item->image)}}" width="200" alt="Reviewer">
                    </div>
                </div>
            @endforeach
        @endif
        </div>

        <div class="testimonial-bottom mt-4" data-aos="fade-up">
        @if(@$testimonials2 != "")
            @foreach (@$testimonials2 as $item)
                <div class="card">
                    <div class="card-body px-5 pt-5 pb-4 d-flex align-items-end">
                        <div class="d-flex flex-column">
                            <!-- Quote SVG -->
                            <svg class="mb-3" width="25" height="16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.68 6.38C..." fill="#FF6B6B" />
                            </svg>

                            <div>
                                <small>
                                {{@$item->body}}
                                </small>
                                <!-- Closing Quote -->
                                <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68 6.38C..." fill="#FF6B6B" />
                                </svg>
                            </div>

                            <div class="mt-3">
                                <h6 class="fw-bold">{{@$item->author}}</h6>
                                <small class="text-muted">{{@$item->profession}}</small>
                            </div>
                        </div>

                        <img src="{{getTestimonialImage(@$item->image)}}" width="200" alt="Reviewer">
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </section> --}}

    {{-- Success-Metrics --}}
    {{-- <section class="success-metrics">
        <div class="container-fluid py-5 px-3 px-sm-5">
            <div class="card py-5 px-4 px-md-5" data-aos="fade-up">
                <h2 class="text-center text-white mb-4">Success Metrics</h2>

                <div class="success-grid">
                    <div>
                        <h1 class="num mb-2 text-white fw-bold">95%</h1>
                        <h6 class="mb-0 text-white">Pass Rate</h6>
                    </div>

                    <div>
                        <h1 class="num mb-2 text-white fw-bold">12K+</h1>
                        <h6 class="mb-0 text-white">Nurses Helped</h6>
                    </div>

                    <div>
                        <h1 class="num mb-2 text-white fw-bold">500+</h1>
                        <h6 class="mb-0 text-white">Stories Shared</h6>
                    </div>

                    <div>
                        <h1 class="num mb-2 text-white fw-bold">6-8</h1>
                        <h6 class="mb-0 text-white">Weeks Avg Time</h6>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('public/assets/partners.png') }}" data-aos="fade-up" width="100%" alt="">
    </section> --}}

    {{-- Instructor-Section --}}
    {{-- <section class="instructor-section">
        <div class="container-fluid py-5 px-3 px-sm-5 mt-5">
            <div class="card px-4 px-md-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4" data-aos="fade-right">
                        <!-- <img src="{{ asset('public/assets/instructor.png') }}" style="margin-top: -4rem" width="100%" alt=""> -->
                        <img src="{{ asset('/'.getRawHomeContents($home_content,'home_tile1_image','en'))}}" style="margin-top: -4rem" width="100%" alt="">
                    </div>
                    <div class="col-md-8 col-xl-6 py-4" data-aos="fade-left">
                        <h2 class="rubik text-white">{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_title','en') : ''}}</h2>
                        <p style="font-weight: 100" class="text-white rubik">{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_text','en') : ''}}</p>

                        <!-- <h5 style="font-weight: 400" class="mt-4 text-white rubik">Maria T. , Lead Instructor</h5> -->

                        <a href="{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_btnlink','en') : ''}}">
                            <button
                                style="background-color: var(--footer_text_hover_color); border: none; color: #fff; border-radius: 50px;"
                                class="py-2 px-4 text-white mt-3">{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_btntext','en') : ''}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    {{-- Courses-Section --}}
    {{-- <section class="course-section" style="background-color: #F7F7F7">
        <div class="container-fluid py-5 px-3 px-sm-5">

            <div class="text-center">
                <h2 data-aos="fade-up">Program & Course Pricing Overview</h2>
                <p class="opacity-75 inter" data-aos="fade-up">Find the program that best fits your goals, schedule, and
                    support needs.</p>
            </div>

            <ul class="nav nav-pills mb-3 d-flex align-items-center justify-content-center mt-3 mb-4" id="pills-tab"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-cards-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-cards" type="button" role="tab" aria-controls="pills-cards"
                        aria-selected="true">Courses</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-table-comparison-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-table-comparison" type="button" role="tab"
                        aria-controls="pills-table-comparison" aria-selected="false">Courses Comparison</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-cards" role="tabpanel"
                    aria-labelledby="pills-cards-tab" tabindex="0">
                    <div class="row">
                        @php
                            $recent_courses = $latest_courses;
                            //$first_course = $recent_courses->first();
                            //if ($first_course) {
                            //    $recent_courses = $recent_courses->except($first_course->id);
                            //}
                            //$i = 0;
                        @endphp

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card border-0 rounded-3 w-100" data-aos="fade-up">
                                    <div class="card-body rubik">
                                        <!-- Image with badge -->
                                        <div class="position-relative">
                                            <a
                                                href="{{ !empty($thiscourse->parent_id)
                                                    ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) . '?courseType=' . $thiscourse->type
                                                    : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}">
                                                <img src="{{ getCourseImage($thiscourse->image) }}" class="card-img-top"
                                                    alt="{{ $thiscourse->title }}">
                                            </a>

                                            <span style="position: absolute; top: 10px; right: 10px; border-radius: 6px;"
                                                class="py-2 px-3 d-flex align-items-center gap-1 bg-white text-dark m-2">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2032_122)">
                                                        <circle cx="8" cy="8.5" r="7.25" stroke="#413C69" stroke-width="1.5" />
                                                        <path d="M8 4.94434V9.06787L10.6667 10.2777" stroke="#413C69" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2032_122">
                                                            <rect width="16" height="16" fill="white" transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                {{ $thiscourse->duration ?? 'N/A' }} weeks
                                            </span>
                                        </div>

                                        <!-- Top meta -->
                                        <div class="d-flex justify-content-between my-2">
                                            <span class="text-success fw-bold">
                                                @if ($thiscourse->type == 1)
                                                    {{ __('Course') }}
                                                @elseif($thiscourse->type == 2)
                                                    {{ __('Big Quiz') }}
                                                @elseif($thiscourse->type == 3)
                                                    {{ __('Individual Course') }}
                                                @elseif($thiscourse->type == 4)
                                                    {{ __('Full Course') }}
                                                @elseif($thiscourse->type == 5)
                                                    {{ __('Prep-Course (On-Demand)') }}
                                                @elseif($thiscourse->type == 6)
                                                    {{ __('Prep-Course (Live)') }}
                                                @elseif($thiscourse->type == 8)
                                                    {{ __('Repeat Course') }}
                                                @elseif($thiscourse->type == 9)
                                                    {{ __('Tutor Course') }}
                                                @endif
                                            </span>
                                            <span style="color: #CA8804">{{ $thiscourse->category->name ?? 'N/A' }}</span>
                                        </div>

                                        <!-- Title & Subtitle -->
                                        <h5 style="font-weight: 600"
                                            class="card-title rubik fw-bold text-dark d-flex align-items-center justify-content-between">
                                            {{ !empty($thiscourse->parent_id) ? $thiscourse->parent->title : $thiscourse->title }}
                                            <svg width="24" height="28" viewBox="0 0 24 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 21L17 11M17 11H7M17 11V21" stroke="#101828" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </h5>

                                        <p class="card-text text-muted small mb-3">
                                            @php
                                                $requirements = str_replace(
                                                    '&nbsp;',
                                                    ' ',
                                                    htmlspecialchars_decode(
                                                        strip_tags(
                                                            !empty($thiscourse->parent_id)
                                                                ? $thiscourse->parent->requirements
                                                                : $thiscourse->requirements,
                                                        ),
                                                    ),
                                                );
                                            @endphp
                                            @if (Str::length($requirements) > 120)
                                                {{ Str::limit($requirements, 120, '...') }}
                                            @else
                                                {{ $requirements }}
                                            @endif
                                        </p>

                                        <!-- Features (example static items, you can make dynamic if needed) -->
                                        <ul class="list-unstyled small mb-4 d-flex flex-wrap justify-content-between">
                                            @foreach ($thiscourse->features ?? ['Diagnostic assessment', 'Expert Instructors', 'Interactive Sessions'] as $feature)
                                                <li class="mb-1 d-flex align-items-center gap-1">
                                                    <img src="{{ asset('public/assets/point.png') }}" width="25" alt="Feature">
                                                    {{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>

                                        <!-- Footer -->
                                        @php
                                            if (isset($thiscourse->currentCoursePlan[0])) {
                                                $course_price = $thiscourse->currentCoursePlan[0]->amount;
                                            } else {
                                                $course_price = $thiscourse->price + $thiscourse->tax;
                                            }
                                        @endphp
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a
                                                href="{{ !empty($thiscourse->parent_id)
                                                    ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) . '?courseType=' . $thiscourse->type
                                                    : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}">
                                                <button
                                                    style="background-color: var(--system_primery_color); border: none; color: #fff; border-radius: 50px;"
                                                    class="py-2 px-4 text-white mt-3">Enroll Now</button>
                                            </a>
                                            <h2 style="color: var(--system_secendory_color); font-weight: 700 !important; font-family: 'Inter' !important;"
                                                class="mb-0">
                                                ${{ number_format($course_price, 0) }}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-table-comparison" role="tabpanel"
                    aria-labelledby="pills-table-comparison-tab" tabindex="0">
                    <div class="table-responsive bg-white p-2 p-md-4" style="border-radius: 8px">
                        <table class="table comparison-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($comparisons) && count($comparisons) > 0)
                                    @foreach($comparisons as $index => $comparison)
                                        <tr style="background-color: {{ $comparison['type'] == 'course' ? '#f5f5f5' : '#ffffff' }};">
                                            <td data-label="Name">{{ $comparison['title'] }}</td>
                                            <td data-label="Type">{{ $comparison['type_label'] }}</td>
                                            <td data-label="Duration">{{ $comparison['duration'] }}</td>
                                            <td data-label="Price">{{ $comparison['price'] }}</td>
                                            <td data-label="Detail">
                                                <a href="{{ $comparison['detail_url'] }}" class="btn btn-sm btn-primary">
                                                    {{ __('Detail') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No comparisons available. Please add comparisons from the admin panel.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section
        style="background-image: url('{{ asset('public/assets/resources.png') }}'); background-size: 100%; background-repeat: no-repeat;">
        <div class="container-fluid py-5 px-3 px-sm-5">
            <div class="row justify-content-between">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="text-start">
                        <h2>Learn & Grow With Us</h2>
                        <p class="opacity-75 inter">
                            Access free study tips, expert guides, webinars, and blog posts — all designed
                            to support your learning journey. Plus, unlock your free Study Resource Kit
                            when you join our community.
                        </p>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-4">
                            <div class="p-3"
                                style="backdrop-filter: blur(3px); border: 1px solid var(--system_secendory_color); border-radius: 6px">
                                <h5 style="font-weight: 600; font-size: 20px" class="text-dark rubik">Mind Mapping</h5>
                                <p style="font-size: 14px; font-weight: 600; line-height: 1.5" class="inter">Transform
                                    complex subjects into easy-to-follow visual maps. This technique helps you connect ideas
                                    and recall them more effectively.</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="p-3"
                                style="backdrop-filter: blur(3px); border: 1px solid var(--system_secendory_color); border-radius: 6px">
                                <h5 style="font-weight: 600; font-size: 20px" class="text-dark rubik">Mind Mapping</h5>
                                <p style="font-size: 14px; font-weight: 600; line-height: 1.5" class="inter">Transform
                                    complex subjects into easy-to-follow visual maps. This technique helps you connect ideas
                                    and recall them more effectively.</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="p-3"
                                style="backdrop-filter: blur(3px); border: 1px solid var(--system_secendory_color); border-radius: 6px">
                                <h5 style="font-weight: 600; font-size: 20px" class="text-dark rubik">Mind Mapping</h5>
                                <p style="font-size: 14px; font-weight: 600; line-height: 1.5" class="inter">Transform
                                    complex subjects into easy-to-follow visual maps. This technique helps you connect ideas
                                    and recall them more effectively.</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="p-3"
                                style="backdrop-filter: blur(3px); border: 1px solid var(--system_secendory_color); border-radius: 6px">
                                <h5 style="font-weight: 600; font-size: 20px" class="text-dark rubik">Mind Mapping</h5>
                                <p style="font-size: 14px; font-weight: 600; line-height: 1.5" class="inter">Transform
                                    complex subjects into easy-to-follow visual maps. This technique helps you connect ideas
                                    and recall them more effectively.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5" data-aos="fade-left">
                    <img src="{{ asset('public/assets/comunity-right.png') }}" width="100%" alt="">
                </div>
            </div>
        </div>
    </section> --}}


    {{-- @if (!empty($blocks))
        @foreach ($blocks as $block)
            @if ($block->id == 1)
            @elseif($block->id == 3)
                @if ($homeContent->show_category_section == 1)
                    <div class="custom_section_backround_color section-padding-y d-none">
                        <div class="container g-0">
                            <div class="row g-0 justify-content-center mx-md-4 py-5">
                                <div class="col-12">
                                    <x-home-page-category-section :homeContent="$homeContent" :categories="$categories" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-margin-y container d-none">
                        <div class="row mx-md-4">
                            <div class="col-md-12 mb-4">
                                <h2 class="font-weight-bold text-center">How To Apply</h2>
                                <p class="text-center custom_paragraph custom_paragraph">"Pick a Program | Course to
                                    develop your skills
                                    & Get Started"
                                </p>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="300">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-solid fa-bars fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 1</h5>
                                    <p class="mt-auto text-center custom_paragraph">Trusted by companies of all sizes
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="600">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-regular fa-address-card fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 2</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="900">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-solid fa-book-open-reader fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 3</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 d-flex my-2" data-aos="zoom-in"
                                data-aos-delay="1200">
                                <div class="second_section rounded-card w-100 p-5 text-center shadow">
                                    <i class="fa-regular fa-image fa-2x p-3"></i>
                                    <h5 class="step_font font-weight-bold my-3">Step 4</h5>
                                    <p class="mt-auto text-center">Trusted by companies of all sizes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-margin-y container d-none">
                        <div class="row mx-md-4 px-1">
                            <div class="col-md-12 text-center">
                                <h2 class="font-weight-bold">Our Popular Prep-Courses</h2>
                                <p class="pb-3 custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Dolorem
                                    exerc
                                    <br>
                                    voluptatibus neque et obcaecati asperiores! Praesentium magnam error veritatis
                                    adipisicing elit. Dolorem exerc
                                </p>
                            </div>

                            @if (isset($latest_courses))
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($latest_courses as $latest_course)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex my-2 px-2"
                                        data-aos-delay="{{ $counter * 500 }}" data-aos="fade-down">
                                        <div class="card rounded-card shadow">
                                            <div class="card-header rounded-card-header p-0">
                                                <a
                                                    href="{{ !empty($latest_course->parent_id) ? courseDetailsUrl(@$latest_course->parent->id, @$latest_course->type, @$latest_course->parent->slug) . '?courseType=' . $latest_course->type : courseDetailsUrl(@$latest_course->id, @$latest_course->type, @$latest_course->slug) }}">
                                                    <img src="{{ getCourseImage($latest_course->thumbnail) }}"
                                                        class="img-fluid rounded-card-img custom_img_height w-100"
                                                        style="object-fit: none;"></a>
                                            </div>
                                            <div class="card-body d-flex flex-column p-3">
                                                <h5 class="font-weight-bold custom-h">
                                                    <a
                                                        href="{{ !empty($latest_course->parent_id) ? courseDetailsUrl(@$latest_course->parent->id, @$latest_course->type, @$latest_course->parent->slug) . '?courseType=' . $latest_course->type : courseDetailsUrl(@$latest_course->id, @$latest_course->type, @$latest_course->slug) }}">
                                                        {{ !empty($latest_course->parent_id) ? $latest_course->parent->title : $latest_course->title }}</a>
                                                </h5>

                                                <div class="paragraph_custom_height mt-auto pb-2">
                                                    <p>@php
                                                        $requirements = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(
                                                                strip_tags(
                                                                    !empty($latest_course->parent_id)
                                                                        ? $latest_course->parent->requirements
                                                                        : $latest_course->requirements,
                                                                ),
                                                            ),
                                                        );
                                                    @endphp
                                                        @if (Str::length($requirements) > 120)
                                                            {{ Str::limit($requirements, 120, '...') }}
                                                        @else
                                                            {{ $requirements }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <small>
                                                        <i class="fa fa-book-open"></i>
                                                        @if ($latest_course->type == 1)
                                                            {{ __('Course') }}
                                                        @elseif($latest_course->type == 2)
                                                            {{ __('Big Quiz') }}
                                                        @elseif($latest_course->type == 4)
                                                            {{ __('Full Course') }}
                                                        @elseif($latest_course->type == 5)
                                                            {{ __('Prep-Course (On-Demand)') }}
                                                        @elseif($latest_course->type == 6)
                                                            {{ __('Prep-Course (Live)') }}
                                                        @elseif($latest_course->type == 8)
                                                            {{ __('Repeat Course') }}
                                                        @endif
                                                    </small>

                                                    <small>
                                                        ${{ number_format($latest_course->price, 0) }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            @endif
                            @if (count($latest_courses) == 0)
                                <div class="col-lg-12">
                                    <div
                                        class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                                        <div class="thumb">
                                            <img style="width: 50px"
                                                src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                                alt="">
                                        </div>
                                        <h1>
                                            {{ __('No Course Found') }}
                                        </h1>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @elseif($block->id == 8)


                <div class="modal fade" id="video_image" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <video width="700" controls>
                                    <source src="https://jusoutbeauty.com/site/public/uploads/product/videos/57.mp4"
                                        type="video/mp4">
                                    <source src="https://jusoutbeauty.com/site/public/uploads/product/videos/57.mp4"
                                        type="video/ogg">
                                </video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn theme_btn small_btn2 px-4 py-2"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                @include(theme('partials._custom_footer'))
            @elseif($block->id == 16)

            @elseif($block->id == 17)
            @endif
        @endforeach
    @endif --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script> --}}

    {{-- <script>
        $('.blog-tag').on('click', function() {
            var tag = $(this).attr('data-tag');
            $('.blog-tag').removeClass('active');
            $('.blog-tag').closest('li').removeClass('active');
            $(this).addClass('active');
            $(this).closest('li').addClass('active');
            $('#blogs_ul').append(
                '<li class="notice-content-overlay"><span class="circle circle5 c51"></span></li>');
            $.ajax({
                type: "POST",
                url: '{{ route('fetchBlogsByTag') }}',
                data: {
                    tag: tag
                },
                success: function(response) {
                    if (response.success) {
                        var html = '';
                        $.each(response.data, function(index, row) {
                            var date = new Date(row.authored_date);
                            var day = date.getDate();
                            var month = date.getMonth();
                            var base_url = $('#baseUrl').val();
                            var blog_url = base_url + '/blog-details/' + row.slug;
                            console.log(row.authored_date)
                            var monthDay = [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'June',
                                'July',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec',
                            ];
                            html = html +
                                '<li class="single-notice">\
                                                                                                                                                                                                                                                                                                                                                            <div class="single-notice-item">\
                                                                                                                                                                                                                                                                                                                                                                <div class="notice-date">\
                                                                                                                                                                                                                                                                                                                                                                    ' +
                                day +
                                '<br>\
                                                                                                                                                                                                                                                                                                                                                                    <span>' +
                                monthDay[
                                    month] +
                                '</span>\
                                                                                                                                                                                                                                                                                                                                                                </div>\
                                                                                                                                                                                                                                                                                                                                                                <div class="notice-content">\
                                                                                                                                                                                                                                                                                                                                                                    <p>\
                                                                                                                                                                                                                                                                                                                                                                        <a href="' +
                                blog_url +
                                '">' +
                                row
                                .title
                                .en +
                                '</a>\
                                                                                                                                                                                                                                                                                                                                                                    </p>\
                                                                                                                                                                                                                                                                                                                                                                </div>\
                                                                                                                                                                                                                                                                                                                                                            </div>\
                                                                                                                                                                                                                                                                                                                                                        </li>';
                        });
                        $('#blogs_ul').html(html);
                    }
                }

            });
        });

        $(document).ready(function() {
            $('#years').select2();
            $('#program').select2();


            var url = '{{ route('getRandomProgram') }}';
            var random_program_data = '';
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (!response.status == true) {
                        var icon = response.program.icon ? response.program.icon :
                            "asset('public/assets/program/no-image.png')";
                        var programTitle = response.program.programtitle;
                        var programTotalsubtitle = response.program.subtitle;
                        var programTotaldesc = response.program.discription;
                        var programTotalcost = response.program.totalcost;
                        $('#program_icon').attr("src", icon);
                        $('#program_title').html(programTitle);
                        $('#program_subtitle').html(programTotalsubtitle);
                        $('#program_desc').html(programTotaldesc);
                        $('#program_cost').html('$' + programTotalcost);
                    }
                }
            });
            // }, 10000);


        });
    </script>

    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

    <script>
        // 3rdsection hovereffect
        const image_Card = document.querySelector(".image_card")
        document.addEventListener('DOMContentLoaded', function() {
            var firstRightCard = document.querySelector('#right-cards .prep_card');
            copyCardDataToLeftCard(firstRightCard);
            image_Card.style.transform = "translateX(0)"
        });

        function copyCardDataToLeftCard(prep_card) {
            var leftCard = document.querySelector('.left-card');
            var leftProTitle = document.getElementById('left-pro-title');
            var leftcardText = document.querySelector('.left-card-text');
            var leftMeetingInfo = document.querySelector('.widget-49-meeting-info');
            var leftForLeft = document.querySelector('.left-content .for-left');

            var imageUrl = prep_card.querySelector('.prep_card-image').getAttribute('src');
            var proTitle = prep_card.querySelector('.widget-49-pro-title').innerHTML;
            var cardText = prep_card.querySelector('.prep_card-text').innerHTML;

            leftCard.style.backgroundImage = 'url(' + imageUrl + ')';
            leftProTitle.innerHTML = proTitle;
            leftcardText.innerHTML = cardText;
            leftMeetingInfo.innerHTML = prep_card.querySelector('.widget-49-meeting-info').innerHTML;
            leftForLeft.innerHTML = prep_card.querySelector('.for-left').innerHTML;

            leftForLeft.style.display = 'block';
            leftForLeft.style.visibility = 'visible';

            // image_Card.style.transform = "translateX(-225%)";
            image_Card.style.transition = "transform .9s ease";
            image_Card.style.opacity = '0'


            setTimeout(function() {
                image_Card.style.transform = 'translateX(0)';
                image_Card.style.opacity = '1'
            }, 700);
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            const slideWidth = $(".custom-slide").outerWidth();
            const numSlides = $(".custom-slide").length;
            let currentSlide = 0;
            let autoplayInterval;
            let slideDelayTimeout;

            $(".custom-slider").width(numSlides * slideWidth);

            function nextSlide() {
                if (currentSlide < numSlides - 1) {
                    currentSlide++;
                } else {
                    currentSlide = 0;
                }
                $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
            }

            function prevSlide() {
                if (currentSlide > 0) {
                    currentSlide--;
                } else {
                    currentSlide = numSlides - 1;
                }
                $(".custom-slider").css("transform", `translateX(-${currentSlide * slideWidth}px)`);
            }

            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, 9000);
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            function restartAutoplay() {
                stopAutoplay();
                slideDelayTimeout = setTimeout(startAutoplay, 9000);
            }

            startAutoplay();

            $(".next").click(function() {
                stopAutoplay();
                clearTimeout(slideDelayTimeout);
                nextSlide();
                restartAutoplay();
            });

            $(".prev").click(function() {
                stopAutoplay();
                clearTimeout(slideDelayTimeout);
                prevSlide();
                restartAutoplay();
            });
        });
    </script> --}}

    {{-- //   scroll our partner --}}
    {{-- <script>
        var swiper = new Swiper('.swiper', {
            slidesPerView: 7,
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            autoplay: {
                delay: 2000,
            },

        });

        // Reference existing elements
        var video = document.getElementById("myVideo");
        var playPauseBtn = document.getElementById("playPauseBtn");
        var videoContainer = document.querySelector(".video-container");
        var overlay = document.querySelector(".overlay-video");
        var textOverlays = document.querySelectorAll(".text-video-overlay");
        var videoControls = document.querySelector(".video-controls");

        // Play video on hover without affecting custom controls
        videoContainer.addEventListener("mouseenter", function() {
            video.play(); // Play the video on hover
            hideOverlay(); // Hide overlay when playing
            hideTextAndButton(); // Hide text and button when video is playing
        });

        // Pause video when mouse leaves the video container
        videoContainer.addEventListener("mouseleave", function() {
            video.pause(); // Pause the video when mouse leaves
            showTextAndButton(); // Show text and button when video is paused
            showOverlay(); // Show overlay when video is paused
        });

        // Functions to hide and show overlay, text, and controls (maintaining your existing behavior)
        function hideOverlay() {
            overlay.style.opacity = "0";
        }

        function showOverlay() {
            overlay.style.opacity = "1";
        }

        function hideTextAndButton() {
            playPauseBtn.style.opacity = "0"; // Hide custom play/pause button
            textOverlays.forEach(function(overlay) {
                overlay.style.opacity = "0"; // Hide text overlays
            });
            videoControls.style.opacity = "0"; // Hide custom controls
        }

        function showTextAndButton() {
            playPauseBtn.style.opacity = "1"; // Show custom play/pause button
            textOverlays.forEach(function(overlay) {
                overlay.style.opacity = "1"; // Show text overlays
            });
            videoControls.style.opacity = "1"; // Show custom controls
        }

        // Keep your existing play/pause behavior with the play/pause button as well
        playPauseBtn.addEventListener("click", function() {
            if (video.paused) {
                video.play();
                playPauseBtn.querySelector("i").classList.remove("fa-play");
                playPauseBtn.querySelector("i").classList.add("fa-pause");
                hideOverlay();
                hideTextAndButton();
            } else {
                video.pause();
                playPauseBtn.querySelector("i").classList.remove("fa-pause");
                playPauseBtn.querySelector("i").classList.add("fa-play");
                showTextAndButton();
                showOverlay();
            }
        });
    </script>

    <script>
        function toggleAccordion(id) {
            var content = document.getElementById('collapse_' + id);
            var isOpen = content.style.maxHeight !== '0px' && content.style.maxHeight !== '';
            // Close all other tabs
            var allContents = document.querySelectorAll('.panel-about-content');
            allContents.forEach(function(item) {
                if (item.id !== 'collapse_' + id) {
                    item.style.maxHeight = '0';
                    var label = item.parentElement.querySelector('.panel-about_label');
                    label.classList.remove('rotate');
                }
            });
            if (!isOpen) {
                // Open the clicked tab
                content.style.maxHeight = content.scrollHeight + "px";
            } else {
                // Close the clicked tab
                content.style.maxHeight = '0';
                var label = content.parentElement.querySelector('.panel-about_label');
                label.classList.remove('rotate');
            }
        }
    </script> --}}

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        let sections = document.querySelectorAll('section');
        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                if (top >= offset && top < offset + height) {
                    sec.classList.add('show-animate');
                } else {
                    sec.classList.remove('show-animate'); // corrected typo here
                }
            })
        }
    </script> --}}

    {{-- sec-1 --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const heading = document.querySelector('.hero-section-main-heading');
            const paragraph = document.querySelector('.hero-section-p');
            const enrollLink = document.querySelector('.anim-btn');
            const headingLetters = heading.textContent.trim().split('');
            heading.innerHTML = '';
            headingLetters.forEach(letter => {
                const span = document.createElement('span');
                span.textContent = letter;
                heading.appendChild(span);
            });
            const headingAnimation = gsap.from(heading.children, {
                duration: 0.3,
                opacity: 0,
                y: 10,
                ease: "power2.out",
                stagger: 0.05
            });
            gsap.set([paragraph, enrollLink], {
                opacity: 0
            });
            const timeline = gsap.timeline();
            timeline.add(headingAnimation);
            timeline.to([paragraph, enrollLink], {
                duration: 0.7,
                opacity: 1,
                y: 0,
                ease: "power2.out",
                stagger: 1
            });
        });
    </script> --}}

    {{-- sec-2 --}}
    {{-- <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                console.log(entry)
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');

                } else {
                    entry.target.classList.remove('show');
                }
            });
        });
        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));
        document.addEventListener('DOMContentLoaded', function() {
            const options = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        gsap.to(entry.target, {
                            opacity: 1,
                            duration: 0.5
                        });
                        entry.target.classList.add('in-view');
                        observer.unobserve(entry
                            .target);
                    }
                });
            }, options);

            const elements = document.querySelectorAll('.content-feature1');
            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script> --}}

    {{-- sec-3 --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Register the ScrollTrigger plugin with GSAP
            gsap.registerPlugin(ScrollTrigger);

            // Create a timeline for the animations
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: ".sec-3", // The section to watch for scrolling
                    start: "top 75%", // Start animation when section is 75% from top of viewport
                    toggleActions: "play none none reverse" // Control play/pause behavior
                }
            });

            // Animate elements within the section
            tl.from(".cta_area-row1 h2", {
                    opacity: 0,
                    y: 50,
                    duration: 1
                }) // Animate the first heading
                .from(".cta_area-row1 p:nth-of-type(1)", {
                    opacity: 0,
                    y: 50,
                    duration: 1
                }, "-=0.5") // Animate the first subheading
                .from(".cta_area-row1 p:nth-of-type(2)", {
                    opacity: 0,
                    y: 50,
                    duration: 1
                }, "-=0.5") // Animate the second subheading
                .from(".container-subscription", {
                    opacity: 0,
                    y: 50,
                    duration: 1
                }, "-=0.5"); // Animate the subscription container
        });
    </script> --}}


    {{-- sec-5 --}}
    {{-- <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.percent-section');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.animatee');
                percentItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        x: -50,
                        duration: 0.9,
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script> --}}

    {{-- sec-7 --}}
    {{-- <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const imgSections = document.querySelectorAll('.about_us');

            imgSections.forEach((section) => {
                const imgItems = section.querySelectorAll('.about-img');
                imgItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        x: -50,
                        duration: 0.9,
                        ease: "power2.out",
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script> --}}

    {{-- sec-9 --}}
    {{-- <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.for-main');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.for-element');
                percentItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        y: -50,
                        duration: 0.9,
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script> --}}

    {{-- sec-12 --}}
    {{-- <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const percentSections = document.querySelectorAll('.flowdiv');

            percentSections.forEach((section) => {
                const percentItems = section.querySelectorAll('.flowdiv-ele');
                percentItems.forEach((item, index) => {
                    let animationProps = {
                        opacity: 0,
                        duration: 1,
                        delay: index * 0.4,
                    };

                    if (index === 0) {
                        animationProps.x = -200;
                    } else if (index === percentItems.length - 1) {
                        animationProps.x = 200;
                    } else {
                        animationProps.y = -200;
                    }

                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        ...animationProps
                    });
                });
            });
        }
        handleScroll();
    </script>

    <script>
        $(document).ready(function() {
            const $tabsBox = $(".news-events-navtabs"),
                $allTabs = $tabsBox.find(".nav-item"),
                $arrowEventsIcons = $(".eventsIcon i");

            const handleEventsIcons = () => {
                let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
                if (maxScrollableWidth <= 0) {
                    $arrowEventsIcons.parent().css("display", "none");
                } else {
                    // Handle visibility based on scroll position
                    $arrowEventsIcons.eq(0).parent().css("display", $tabsBox.scrollLeft() <= 0 ? "none" :
                        "flex");
                    $arrowEventsIcons.eq(1).parent().css("display", maxScrollableWidth - $tabsBox
                        .scrollLeft() <= 1 ? "none" : "flex");
                }
            };

            handleEventsIcons();

            $arrowEventsIcons.on("click", function() {
                if ($(this).attr("id") === "left") {
                    $tabsBox.animate({
                        scrollLeft: "-=340"
                    }, 400);
                } else {
                    $tabsBox.animate({
                        scrollLeft: "+=340"
                    }, 400);
                }
            });

            $allTabs.on("click", function() {
                $tabsBox.find(".active").removeClass("active");
                $(this).addClass("active");
            });

            $tabsBox.on("scroll", handleEventsIcons);
            $(window).on("resize", handleEventsIcons); // Check on resize as well
        });
    </script> --}}
{{-- 
    </body>

@endsection --}}


<style>
  :root {
    --mid-teal: #1A8A6F;
    --deep-teal: #0F6E56;
    --darkest-teal: #0A4D3C;
    --terracotta: #C65D3A;
    --terracotta-dark: #A84827;
    --cream: #F5EDE0;
    --charcoal: #2B2B2B;
    --charcoal-soft: #4a4a4a;
    --white: #FFFFFF;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  html {
    scroll-behavior: smooth;
  }

  body {
    font-family: 'Montserrat', sans-serif;
    color: var(--charcoal);
    line-height: 1.6;
    background: var(--white);
  }

  .serif {
    font-family: 'Playfair Display', serif;
  }

  .container {
    max-width: 1180px;
    margin: 0 auto;
    padding: 0 24px;
  }

  .narrow {
    max-width: 820px;
    margin: 0 auto;
    padding: 0 24px;
  }


  .btn {
    display: inline-block;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 14px;
    padding: 12px 24px;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s;
    border: 2px solid transparent;
    letter-spacing: 0.3px;
  }

  .btn-primary {
    background: var(--terracotta);
    color: var(--white);
    border-color: var(--terracotta);
  }

  .btn-primary:hover {
    background: var(--deep-teal);
    border-color: var(--deep-teal);
    color: white !important;
  }

  .btn-secondary {
    background: transparent;
    color: var(--mid-teal);
    border-color: var(--mid-teal);
  }

  .btn-secondary:hover {
    background: var(--mid-teal);
    color: var(--white);
  }

  .btn-on-teal {
    background: var(--terracotta) !important;
    color: var(--white) !important;
    border-color: var(--terracotta) !important;
  }

  .btn-on-teal:hover {
    background: var(--white) !important;
    color: var(--deep-teal) !important;
    border-color: var(--white) !important;
  }

  .btn-outline-white {
    background: transparent !important;
    color: var(--white) !important;
    border-color: var(--white) !important;
  }

  .btn-outline-white:hover {
    background: var(--white) !important;
    color: var(--deep-teal) !important;
  }

  .btn-large {
    padding: 16px 32px;
    font-size: 15px;
  }

  /* ============ SECTION 1 — HERO ============ */
  .hero {
    background: var(--mid-teal);
    color: var(--white);
    padding: 100px 24px 110px;
    text-align: center;
    position: relative;
    border-top: 4px solid var(--terracotta);
    border-bottom: 4px solid var(--terracotta);
  }

  .hero-eyebrow {
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--cream);
    margin-bottom: 28px;
    font-weight: 500;
  }

  .hero h1 {
    font-family: 'Playfair Display', serif;
    font-weight: 800;
    font-size: 76px;
    line-height: 1.05;
    margin-bottom: 8px;
    color: var(--white);
  }

  .hero h1 .second-line {
    color: var(--cream);
    display: block;
  }

  .hero-support {
    max-width: 720px;
    margin: 32px auto 40px;
    font-size: 18px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.92);
  }

  .hero-ctas {
    display: flex;
    gap: 18px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 24px;
  }

  .hero-secondary-link {
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    font-size: 14px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    padding-bottom: 2px;
    transition: color 0.2s;
  }

  .hero-secondary-link:hover {
    color: var(--terracotta);
    border-color: var(--terracotta);
  }

  /* ============ SECTION 2 — SIGNATURE LINE + FOUNDER ============ */
  .signature-band {
    background: var(--cream);
    padding: 80px 24px;
    text-align: center;
  }

  .signature-line {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 38px;
    color: var(--charcoal);
    line-height: 1.3;
    max-width: 800px;
    margin: 0 auto 18px;
  }

  .signature-attribution {
    font-size: 13px;
    letter-spacing: 1.5px;
    color: var(--charcoal-soft);
    text-transform: uppercase;
    font-weight: 500;
  }

  .founder-section {
    background: var(--white);
    padding: 90px 24px;
  }

  .founder-grid {
    display: grid;
    grid-template-columns: 1fr 1.4fr;
    gap: 60px;
    align-items: center;
    max-width: 1100px;
    margin: 0 auto;
  }

  .founder-photo {
    aspect-ratio: 4/5;
    background: linear-gradient(135deg, var(--mid-teal) 0%, var(--deep-teal) 100%);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--cream);
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 18px;
    text-align: center;
    padding: 40px;
    border: 3px solid var(--terracotta);
  }

  .founder-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
  }

  .founder-eyebrow {
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--terracotta);
    font-weight: 600;
    margin-bottom: 16px;
  }

  .founder-section h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 44px;
    color: var(--deep-teal);
    margin-bottom: 12px;
  }

  .founder-credentials {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 17px;
    color: var(--terracotta);
    margin-bottom: 28px;
  }

  .founder-personal {
    font-family: 'Playfair Display', serif !important;
    font-size: 32px !important;
    font-weight: 700;
    color: var(--terracotta) !important;
    line-height: 1.2 !important;
    margin-bottom: 22px !important;
    letter-spacing: -0.5px;
  }

  .founder-section p {
    margin-bottom: 18px;
    font-size: 15.5px;
    line-height: 1.75;
  }

  .founder-close {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 19px;
    color: var(--deep-teal);
    margin: 24px 0 28px;
  }

  /* ============ SECTION 3 — FOUR PATHS ============ */
  .paths-section {
    background: var(--cream);
    padding: 100px 24px;
  }

  .section-header {
    text-align: center;
    margin-bottom: 56px;
  }

  .section-eyebrow {
    font-size: 12px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--terracotta);
    font-weight: 600;
    margin-bottom: 14px;
  }

  .section-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 44px;
    color: var(--charcoal);
    line-height: 1.2;
    margin-bottom: 14px;
  }

  .section-subtitle {
    font-size: 17px;
    color: var(--charcoal-soft);
    max-width: 640px;
    margin: 0 auto;
  }

  .paths-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    max-width: 1080px;
    margin: 0 auto;
  }

  .path-card {
    background: var(--white);
    border-top: 4px solid var(--mid-teal);
    padding: 36px 32px;
    border-radius: 4px;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .path-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(15, 110, 86, 0.12);
  }

  .path-card.specialty {
    border-top-color: var(--terracotta);
  }

  .path-card.ecommerce {
    border-top-color: var(--darkest-teal);
  }

  .path-tag {
    display: inline-block;
    font-size: 11px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 600;
    background: var(--cream);
    color: var(--deep-teal);
    padding: 5px 12px;
    border-radius: 100px;
    margin-bottom: 18px;
  }

  .path-tag.specialty {
    background: rgba(198, 93, 58, 0.12);
    color: var(--terracotta-dark);
  }

  .path-tag.ecommerce {
    background: rgba(10, 77, 60, 0.10);
    color: var(--darkest-teal);
  }

  .path-card h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 24px;
    color: var(--deep-teal);
    margin-bottom: 14px;
    line-height: 1.25;
  }

  .path-card p {
    font-size: 14.5px;
    line-height: 1.7;
    color: var(--charcoal);
    margin-bottom: 22px;
  }

  .path-cta {
    color: var(--terracotta);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border-bottom: 2px solid var(--terracotta);
    padding-bottom: 2px;
  }

  .path-cta:hover {
    color: var(--deep-teal);
    border-color: var(--deep-teal);
  }

  /* ============ SECTION 4 — NCLEX PASS METHOD ============ */
  .method-section {
    background: var(--white);
    padding: 100px 24px;
  }

  .method-italic {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 22px;
    color: var(--terracotta);
    margin: 8px 0 24px;
  }

  .method-lead {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 64px;
    font-size: 16px;
    line-height: 1.75;
    color: var(--charcoal-soft);
  }

  .method-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
    max-width: 1080px;
    margin: 0 auto;
  }

  .method-col {
    text-align: center;
  }

  .method-numeral {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 80px;
    color: var(--terracotta);
    line-height: 1;
    margin-bottom: 12px;
  }

  .method-col h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 26px;
    color: var(--deep-teal);
    margin-bottom: 14px;
  }

  .method-col p {
    font-size: 14.5px;
    line-height: 1.75;
    color: var(--charcoal);
    text-align: left;
  }

  .method-close {
    text-align: center;
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 22px;
    color: var(--deep-teal);
    margin-top: 56px;
  }

  /* ============ SECTION 5 — PREP-COURSES ============ */
  .courses-section {
    background: var(--cream);
    padding: 100px 24px;
  }

  .courses-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    max-width: 1080px;
    margin: 0 auto;
  }

  .course-card {
    background: var(--white);
    border-radius: 4px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .course-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(15, 110, 86, 0.15);
  }

  .course-thumb {
    aspect-ratio: 16/10;
    background: var(--mid-teal);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    position: relative;
    overflow: hidden;
  }

  .course-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .course-thumb.deep {
    background: var(--deep-teal);
  }

  .course-thumb.dark {
    background: var(--darkest-teal) !important;
  }

  .course-thumb-label {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 28px;
    text-align: center;
    padding: 16px;
    line-height: 1.15;
  }

  .course-body {
    padding: 24px 22px 26px;
  }

  .course-tag {
    font-size: 10px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--terracotta);
    font-weight: 600;
    margin-bottom: 8px;
  }

  .course-card h3 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 20px;
    color: var(--deep-teal);
    margin-bottom: 8px;
  }

  .course-card p {
    font-size: 13.5px;
    line-height: 1.6;
    color: var(--charcoal-soft);
    margin-bottom: 18px;
    min-height: 60px;
  }

  .course-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid rgba(0, 0, 0, 0.08);
    padding-top: 16px;
  }

  .course-price {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 22px;
    color: var(--terracotta);
  }

  .course-enroll {
    color: var(--mid-teal);
    text-decoration: none;
    font-weight: 600;
    font-size: 13px;
  }

  .course-enroll:hover {
    color: var(--deep-teal);
  }

  .courses-browse-all {
    text-align: center;
    margin-top: 48px;
  }

  .courses-browse-all a {
    color: var(--mid-teal);
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    border-bottom: 2px solid var(--mid-teal);
    padding-bottom: 4px;
  }

  .courses-browse-all a:hover {
    color: var(--terracotta);
    border-color: var(--terracotta);
  }

  /* ============ SECTION 6 — PROOF ============ */
  .stats-band {
    background: var(--mid-teal);
    padding: 70px 24px;
    color: var(--white);
    border-top: 4px solid var(--terracotta);
    border-bottom: 4px solid var(--terracotta);
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    max-width: 1080px;
    margin: 0 auto;
    text-align: center;
  }

  .stat-number {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 56px;
    color: var(--white);
    line-height: 1;
    margin-bottom: 10px;
  }

  .stat-label {
    font-size: 13px;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    color: var(--cream);
    font-weight: 500;
  }

  .testimonials-section {
    background: var(--white);
    padding: 100px 24px;
  }

  .testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    max-width: 1080px;
    margin: 0 auto;
  }

  .testimonial-card {
    background: var(--cream);
    padding: 36px 30px 30px;
    border-radius: 4px;
    border-left: 4px solid var(--terracotta);
  }

  .testimonial-quote {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 16.5px;
    line-height: 1.65;
    color: var(--charcoal);
    margin-bottom: 22px;
  }

  .testimonial-attribution {
    font-size: 13px;
    line-height: 1.6;
    color: var(--charcoal-soft);
  }

  .testimonial-name {
    font-weight: 700;
    color: var(--deep-teal);
  }

  /* ============ SECTION 7 — EMAIL CAPTURE ============ */
  .email-section {
    background: var(--cream);
    padding: 100px 24px;
  }

  .email-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    align-items: center;
    max-width: 1080px;
    margin: 0 auto;
  }

  .email-mockup {
    aspect-ratio: 3/4;
    background: var(--white);
    border-radius: 4px;
    border: 1px solid rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(15, 110, 86, 0.15);
  }

  .email-mockup-top {
    background: var(--deep-teal);
    color: var(--white);
    padding: 40px 32px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .email-mockup-top .label {
    font-size: 11px;
    letter-spacing: 2px;
    color: var(--cream);
    text-transform: uppercase;
    margin-bottom: 24px;
  }

  .email-mockup-top h4 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 32px;
    line-height: 1.2;
    color: white;
    margin-bottom: 14px;
  }

  .email-mockup-top .sub {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 16px;
    color: var(--cream);
  }

  .email-mockup-bottom {
    background: var(--cream);
    padding: 24px 28px;
    text-align: center;
  }

  .email-mockup-bottom .author {
    font-size: 11px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--charcoal-soft);
    font-weight: 500;
  }

  .email-form-eyebrow {
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--terracotta);
    font-weight: 600;
    margin-bottom: 14px;
  }

  .email-form h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 40px;
    color: var(--deep-teal);
    line-height: 1.15;
    margin-bottom: 18px;
  }

  .email-form p {
    font-size: 15.5px;
    line-height: 1.75;
    color: var(--charcoal);
    margin-bottom: 28px;
  }

  .email-form-fields {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 14px;
  }

  .email-form-fields input {
    padding: 14px 18px;
    border: 1.5px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    font-size: 14.5px;
    font-family: 'Montserrat', sans-serif;
    background: var(--white);
  }

  .email-form-fields input:focus {
    outline: none;
    border-color: var(--mid-teal);
  }

  .email-form-microcopy {
    font-size: 12px;
    line-height: 1.6;
    color: var(--charcoal-soft);
    margin-top: 14px;
  }

  /* ============ SECTION 8 — FAQ + FINAL CTA ============ */
  .faq-section {
    background: var(--white);
    padding: 100px 24px;
  }

  .faq-list {
    max-width: 820px;
    margin: 0 auto;
  }

  .faq-item {
    border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    padding: 22px 0;
    cursor: pointer;
  }

  .faq-q {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 19px;
    color: var(--deep-teal);
  }

  .faq-chevron {
    color: var(--terracotta);
    font-size: 22px;
  }

  .faq-a {
    margin-top: 14px;
    font-size: 14.5px;
    line-height: 1.75;
    color: var(--charcoal);
    display: none;
  }

  .faq-item.open .faq-a {
    display: block;
  }

  .faq-item.open .faq-chevron {
    transform: rotate(45deg);
  }

  .final-cta {
    background: var(--mid-teal);
    color: var(--white);
    padding: 90px 24px;
    text-align: center;
    border-top: 4px solid var(--terracotta);
  }

  .final-cta h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 52px;
    margin-bottom: 22px;
    color: var(--white);
  }

  .final-cta-body {
    max-width: 700px;
    margin: 0 auto 24px;
    font-size: 17px;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.95);
  }

  .final-cta-italic {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 22px;
    color: var(--cream);
    margin-bottom: 36px;
  }

  .final-cta-btns {
    display: flex;
    gap: 18px;
    justify-content: center;
    flex-wrap: wrap;
  }

  /* ============ RESPONSIVE ============ */
  @media (max-width: 880px) {
    .hero h1 {
      font-size: 52px;
    }

    .paths-grid,
    .courses-grid,
    .testimonials-grid,
    .stats-grid,
    .method-grid,
    .founder-grid,
    .email-grid {
      grid-template-columns: 1fr;
    }

    .nav-links {
      display: none;
    }

    .section-title,
    .email-form h2,
    .founder-section h2 {
      font-size: 32px;
    }

    .final-cta h2 {
      font-size: 36px;
    }

    .signature-line {
      font-size: 26px;
    }

    .founder-personal {
      font-size: 26px !important;
    }
  }

  /* ============ MOCKUP NOTE BANNER ============ */
  .mockup-banner {
    background: var(--terracotta);
    color: var(--white);
    text-align: center;
    padding: 10px 16px;
    font-size: 13px;
    letter-spacing: 0.5px;
  }
</style>



@section('mainContent')


        <!-- ============ SECTION 1 — HERO ============ -->
        <section class="hero">
              <div class="hero-eyebrow">Since 2019 · Nursing test prep & FL BON remediation</div>
              <h1>
                 {{@$homeContent->slider_title}}
                {{-- <span class="second-line">Your comeback starts here.</span> --}}
              </h1>
              <p class="hero-support">
                {{@$homeContent->slider_text}}
              </p>
              <div class="hero-ctas">
                <a href="#final" class="btn btn-on-teal btn-large">Schedule a Free Advisor Call</a>
              </div>
              <a href="#courses" class="hero-secondary-link">Just need a single subject? Browse prep-courses →</a>

        </section>
    
         <!-- ============ SECTION 2 — SIGNATURE LINE ============ -->
        <section class="signature-band">
          <p class="signature-line">"A struggling student is not a failing student."</p>
          <p class="signature-attribution">— Paula Martin · Founder</p>
        </section>
            

        <!-- ============ FOUNDER ============ -->
        <section class="founder-section" id="founder">
          <div class="founder-grid">
            <div class="founder-photo">
              @if (isset($home_content) && getRawHomeContents($home_content, 'home_tile1_image', 'en'))
              <img src="{{ asset('/' . getRawHomeContents($home_content, 'home_tile1_image', 'en')) }}" alt="Founder">
              @else
              [Founder portrait<br>800 × 1000px<br>Warm, professional<br>Looking at camera]
              @endif
            </div>
            <div>
              <p class="founder-eyebrow">Your founder</p>
              <h2>Meet Paula Martin</h2>
              <p class="founder-credentials">Nurse · Health Educator · College Instructor · Founder of Merkaii Xcellence
                Prep</p>
              <p class="founder-personal">I failed the NCLEX.</p>
              <p>I remember sitting in my car after I got the results, hands shaking, certain that everything I'd worked
                for had just collapsed. Years of clinicals. Sleepless nights. The pride of my family. Gone — or so it
                felt. I was distraught. I felt invisible to a system that had moved on without me, and hopeless about
                what came next.</p>
              <p>What I learned in the weeks that followed changed the rest of my career: I wasn't a bad student. I had
                the wrong system, the wrong support, and a culture that treats one failed attempt like a verdict on your
                entire future. When I finally passed, I knew exactly the kind of student I wanted to spend my life
                building programs for — the one I had been.</p>
              <p>That's why Merkaii Xcellence Prep exists. After 13 years in nursing and years teaching at the college
                level, I've worked with over 1,500 nursing students since 2019 — first-timers, repeat test-takers, FL
                BON remediation candidates, and students fighting to stay in their programs. Ninety-five percent of them
                pass. Not because they're exceptional. Because they were finally given a system built for the way real
                students learn.</p>
              <p class="founder-close">A struggling student is not a failing student. I was one. Let me show you what's
                possible on the other side.</p>
              <a href="#final" class="btn btn-primary">Schedule a Free Advisor Call</a>
            </div>
          </div>
        </section>

        <!-- ============ SECTION 3 — FOUR PATHS ============ -->
        <section class="paths-section" id="paths">
              <div class="section-header">
                <p class="section-eyebrow">Choose your path</p>
                <h2 class="section-title">Wherever You Are, We Meet You There.</h2>
                <p class="section-subtitle">Four populations. Two product lines. One mission — get you through.</p>
              </div>
              <div class="paths-grid">
            
                <div class="path-card">
                  <span class="path-tag">Coaching Program</span>
                  <h3>You've Failed Before. You Won't Again.</h3>
                  <p>You've faced setbacks but you haven't given up. You don't need more content — you need a different
                    approach. The NCLEX PASS Method™ is built specifically for the student everyone else stopped believing
                    in. Live coaching, diagnostic-driven planning, and the confidence work first-time prep skipped.</p>
                  <a href="#final" class="path-cta">Schedule a Free Advisor Call →</a>
                </div>
            
                <div class="path-card specialty">
                  <span class="path-tag specialty">Coaching Program · Specialty</span>
                  <h3>Florida Board-Required Remediation, Done Right.</h3>
                  <p>Court-ordered or program-required remediation handled by a specialist. Structured curriculum, official
                    documentation accepted by the Florida Board of Nursing, and one-on-one instructor support through the
                    entire process. We've walked over a thousand students through this exact pathway.</p>
                  <a href="#final" class="path-cta">Schedule a Confidential Call →</a>
                </div>
            
                <div class="path-card">
                  <span class="path-tag">Coaching Program</span>
                  <h3>Pass on the First Attempt — With Confidence, Not Luck.</h3>
                  <p>You've worked hard to get here. Now you want to walk into the testing center prepared, calm, and certain.
                    Full NCLEX Coaching gives you the live classes, the personalized roadmap, and the confidence work that
                    turns nervous students into confident test-takers.</p>
                  <a href="#final" class="path-cta">Schedule a Free Advisor Call →</a>
                </div>
            
                <div class="path-card ecommerce">
                  <span class="path-tag ecommerce">Prep-Courses · Shop Directly</span>
                  <h3>Failing One Subject? Master It Before It Costs You the Degree.</h3>
                  <p>Failing exams, on academic probation, or watching one bad subject drag down your GPA? Our subject
                    prep-courses give you focused, on-demand mastery in A&P, Mental Health, Pharm, Med-Surg, OB, Peds, and
                    more. Buy what you need, learn at your pace, pass the next exam.</p>
                  <a href="#courses" class="path-cta">Browse Prep-Courses →</a>
                </div>
            
              </div>
        </section>

        <!-- ============ SECTION 4 — NCLEX PASS METHOD ============ -->
        <section class="method-section" id="method">
            <div class="section-header">
              <p class="section-eyebrow">Our methodology</p>
              <h2 class="section-title">The NCLEX PASS Method™</h2>
              <p class="method-italic">Content + Process + Confidence</p>
            </div>
            <p class="method-lead">
              Most prep programs sell you content and call it done. The NCLEX PASS Method™ is built on three layers because
              passing the NCLEX requires all three. Every Merkaii program and prep-course is engineered around this framework.
            </p>
            <div class="method-grid">
            
              <div class="method-col">
                <div class="method-numeral">1</div>
                <h3>Content</h3>
                <p>Evidence-based curriculum aligned to the current NCSBN test plan, integrated with Saunders Comprehensive
                  Review, and updated for Next-Generation NCLEX (NGN) clinical judgment items. We teach what's actually on
                  the test today — not what was on it five years ago.</p>
              </div>
            
              <div class="method-col">
                <div class="method-numeral">2</div>
                <h3>Process</h3>
                <p>A personalized study roadmap built from your diagnostic. Our SMARTCARE and PRIORITY-X frameworks teach
                  you how to think like a nurse on test day — not just what to memorize. Process is the difference between
                  knowing the answer and choosing the right answer.</p>
              </div>
            
              <div class="method-col">
                <div class="method-numeral">3</div>
                <h3>Confidence</h3>
                <p>Live coaching, weekly check-ins, and trauma-informed support for test anxiety. Because the student who
                  doubts herself fails questions she actually knows. We rebuild test-day confidence with the same care we
                  rebuild content gaps.</p>
              </div>
            
            </div>
            <p class="method-close">This is the system that gets a struggling student to a passing score.</p>
        </section>

            <!-- ============ SECTION 5 — PREP-COURSES ============ -->
        <section class="courses-section" id="courses">
          <div class="section-header">
            <p class="section-eyebrow">Shop prep-courses</p>
            <h2 class="section-title">Master One Subject. Or All of Them.</h2>
            <p class="section-subtitle">Self-paced subject mastery, built on the NCLEX PASS Method™. Buy individual courses
              or bundle for savings. Every course includes practice questions, clinical judgment scenarios, and lifetime
              access.</p>
          </div>
          <div class="courses-grid">
        
            @php
            $recent_courses = $latest_courses;
            $course_backgrounds = ['', 'deep', 'dark'];
            @endphp
            @foreach ($recent_courses as $index => $thiscourse)
            @if (array_key_exists($index, $recent_courses->toArray()))
            <div class="course-card">
            
            <div class="course-thumb dark">
                <div class="course-thumb-label">
                    {{ json_decode($thiscourse->title)->en }}
                </div>      
            </div>
              {{-- <div class="course-thumb {{ $course_backgrounds[$index % 3] }}">
                <img src="{{ getCourseImage($thiscourse->image) }}" alt="{{ $thiscourse->title }}">
              </div> --}}
            
              <div class="course-body">
                <p class="course-tag">
                  @if ($thiscourse->type == 1)
                  {{ __('Course') }}
                  @elseif($thiscourse->type == 2)
                  {{ __('Big Quiz') }}
                  @elseif($thiscourse->type == 3)
                  {{ __('Individual Course') }}
                  @elseif($thiscourse->type == 4)
                  {{ __('Full Course') }}
                  @elseif($thiscourse->type == 5)
                  {{ __('Prep-Course (On-Demand)') }}
                  @elseif($thiscourse->type == 6)
                  {{ __('Prep-Course (Live)') }}
                  @elseif($thiscourse->type == 8)
                  {{ __('Repeat Course') }}
                  @elseif($thiscourse->type == 9)
                  {{ __('Tutor Course') }}
                  @endif
                </p>
                <h3>{{ !empty($thiscourse->parent_id) ? $thiscourse->parent->title : $thiscourse->title }}</h3>
                <p>
                  @php
                  $requirements = str_replace(
                  '&nbsp;',
                  ' ',
                  htmlspecialchars_decode(
                  strip_tags(
                  !empty($thiscourse->parent_id)
                  ? $thiscourse->parent->requirements
                  : $thiscourse->requirements,
                  ),
                  ),
                  );
                  @endphp
                  @if (Str::length($requirements) > 120)
                  {{ Str::limit($requirements, 120, '...') }}
                  @else
                  {{ $requirements }}
                  @endif
                </p>
                <div class="course-footer">
                  @php
                  if (isset($thiscourse->currentCoursePlan[0])) {
                  $course_price = $thiscourse->currentCoursePlan[0]->amount;
                  } else {
                  $course_price = $thiscourse->price + $thiscourse->tax;
                  }
                  @endphp
                  <span class="course-price">${{ number_format($course_price, 0) }}</span>
                  <a href="{{ !empty($thiscourse->parent_id)
                                            ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) .
                                                '?courseType=' .
                                                $thiscourse->type
                                            : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}"
                    class="course-enroll">Enroll Now →</a>
                </div>
              </div>
            </div>
            @endif
            @endforeach
        
          </div>
          <div class="courses-browse-all">
            <a href="{{ url('/prep-courses') }}">Browse all prep-courses →</a>
          </div>
        </section>

        <!-- ============ SECTION 6 — PROOF ============ -->
        <section class="stats-band">
          <div class="stats-grid">
            <div>
              <p class="stat-number">1,500+</p>
              <p class="stat-label">Students Served Since 2019</p>
            </div>
            <div>
              <p class="stat-number">95%</p>
              <p class="stat-label">Pass Rate</p>
            </div>
            <div>
              <p class="stat-number">13</p>
              <p class="stat-label">Years in Nursing</p>
            </div>
            <div>
              <p class="stat-number">100%</p>
              <p class="stat-label">FL BON Approved</p>
            </div>
          </div>
        </section>

        <section class="testimonials-section">
          <div class="section-header">
            <p class="section-eyebrow">Real students. Real outcomes.</p>
            <h2 class="section-title">Trusted by Nurses Who Almost Gave Up.</h2>
          </div>
          <div class="testimonials-grid">
        
            @if (@$testimonials != '' && count($testimonials) > 0)
            @foreach (@$testimonials->take(3) as $item)
            <div class="testimonial-card">
              <p class="testimonial-quote">{{ @$item->body }}</p>
              <p class="testimonial-attribution">
                <span class="testimonial-name">{{ @$item->author }}</span><br>
                {{ @$item->profession }}
              </p>
            </div>
            @endforeach
            @else
            <div class="testimonial-card">
              <p class="testimonial-quote">I failed three times. I had given up. The Merkaii team was the first one
                that didn't treat me like a number — they rebuilt my confidence and my study system. I passed on
                attempt four with 75 questions.</p>
              <p class="testimonial-attribution">
                <span class="testimonial-name">K.L., RN</span><br>
                NCLEX Repeat Test-Taker Coaching<br>
                Passed September 2024
              </p>
            </div>
        
            <div class="testimonial-card">
              <p class="testimonial-quote">The NCLEX PASS Method™ was the difference. I'd done two other prep
                programs before MXP and neither one worked because I didn't have a process — I just had more
                content. The Merkaii system finally taught me how to think on test day.</p>
              <p class="testimonial-attribution">
                <span class="testimonial-name">[Name], RN</span><br>
                Full NCLEX Coaching<br>
                Passed [Month Year]
              </p>
            </div>
        
            <div class="testimonial-card">
              <p class="testimonial-quote">I was facing FL BON remediation and I didn't know where to start. Merkaii
                walked me through every step — the documentation, the curriculum, the support. I passed and I'm
                practicing again.</p>
              <p class="testimonial-attribution">
                <span class="testimonial-name">[Name], RN</span><br>
                FL BON Remediation Program<br>
                Completed [Month Year]
              </p>
            </div>
            @endif
        
          </div>
        </section>

        <!-- ============ SECTION 7 — EMAIL CAPTURE ============ -->
        <section class="email-section">
          <div class="email-grid">
            <div class="email-mockup">
              <div class="email-mockup-top">
                <p class="label">Free PDF · 12 Pages</p>
                <h4>The NCLEX Comeback Starter Kit</h4>
                <p class="sub">Knowledge · Understanding · Wisdom</p>
              </div>
              <div class="email-mockup-bottom">
                <p class="author">By Paula Martin · Founder, Merkaii Xcellence Prep</p>
              </div>
            </div>
        
        
                <div class="email-form">
                    <p class="email-form-eyebrow">Free resource</p>

                    <h2>The NCLEX Comeback Starter Kit</h2>

                    <p>
                        Three things every repeat test-taker needs to do in the first 7 days after a failed attempt — plus a
                        one-page diagnostic worksheet that shows you exactly which content area cost you the most points. The
                        same intake tool I use with paying students.
                    </p>
                
                    {{-- <div class="email-form-fields"> --}}
                        <form action="{{ route('subscribe') }} " class="email-form-fields" method="POST">
                            @csrf
                        
                            <input type="text" placeholder="First name" name="name" />
                        
                            <input type="email" placeholder="Email address" name="email" required />
                        
                            <button  type="submit" class="  btn btn-primary btn-large"
                                style="display: block; width: 100%; text-align: center;">
                                Send Me the Starter Kit
                            </button>
                        </form>
                    {{-- </div> --}}
                    
                    <p class="email-form-microcopy">
                        No spam. Unsubscribe any time. By signing up you'll also get my weekly
                        email — one short note with a study tip, a question breakdown, or a comeback story.
                    </p>
                
                </div>
        
          </div>
        </section>

        <!-- ============ SECTION 8 — FAQ ============ -->
        <section class="faq-section" id="faq">
          <div class="section-header">
            <p class="section-eyebrow">Answers before you ask</p>
            <h2 class="section-title">Frequently Asked Questions</h2>
          </div>
          <div class="faq-list">
        
            @if (isset($faqs) && count($faqs) > 0)
            @foreach ($faqs as $faq)
            <div class="faq-item {{ $loop->first ? 'open' : '' }}" onclick="this.classList.toggle('open')">
              <div class="faq-q">
                <span>{{ $faq->question }}</span>
                <span class="faq-chevron">+</span>
              </div>
              <p class="faq-a">
                @php
                $answer = str_replace('&nbsp;', ' ', htmlspecialchars_decode(strip_tags($faq->answer)));
                @endphp
                {{ $answer }}
              </p>
            </div>
            @endforeach
            @endif 
        
          </div>
        </section>

        <!-- ============ FINAL CTA ============ -->
        <section class="final-cta" id="final">
          <h2>Your Nursing Career Is Waiting.</h2>
          <p class="final-cta-body">
            Whether you're preparing for your first NCLEX, recovering from a setback, completing remediation, or fighting to
            stay in nursing school — Merkaii has a path for you. You're not alone. You're not behind. You just need the
            right support.
          </p>
          <p class="final-cta-italic">Merkaii Xcellence Prep is ready when you are.</p>
          <div class="final-cta-btns">
            <a href="#" class="btn btn-on-teal btn-large">Schedule a Free Advisor Call</a>
            <a href="#courses" class="btn btn-outline-white btn-large">Browse Prep-Courses</a>
          </div>
        </section>

        @include(theme('partials._custom_footer'))

{{-- <!--<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
... [rest of old external links] --}}



@endsection