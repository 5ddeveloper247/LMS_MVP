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


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">

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

<style>
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
</style>


@section('mainContent')
    {{-- MainBanner --}}
    <section class="sec-1 show-animate position-relative"
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
                        </span>Welcome to the Merkaii Xcellence Prep
                    </h6>

                    <h1 class="mb-3 navy-text">
                        {{-- {{@$homeContent->slider_title}} --}}
                        Pass The NCLEX® On Your First Attempt
                    </h1>

                    <p class="mb-4 hero-section-p">
                        Personalized Tutoring, Flexible Live Courses, and Expert Nurse Educators.
                    </p>

                    {{-- <p class="hero-section mb-1">
                        {{@$homeContent->slider_text}}
                    </p> --}}

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
                    <div class="d-flex align-items-center justify-content-center position-relative h-100"
                        style="z-index: 99;">
                        {{-- <img class="hero_img" src="{{ asset($homeContent->slider_banner) }}" width="80%" alt=""> --}}
                        <img src="{{ asset('public/assets/hero-banner.png') }}" width="100%" alt="">
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

            {{-- <x-featured-program-plan /> --}}
        </div>
    </section>

    {{-- Benefits --}}
    <section class="benefits">
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
    </section>

    {{-- Testimonials Section --}}
    <section class="testimonial-section">
        <div class="text-center">
            <h2 data-aos="fade-up">Trusted by Thousands of Nurses</h2>
            <p class="opacity-75 inter" data-aos="fade-up">
                We’re proud to help aspiring nurses succeed every day. Here’s what they’re saying.
            </p>
        </div>

        <div class="testimonial-top mt-4">
            @for ($i = 0; $i < 20; $i++)
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
                                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                    Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt
                                    nostrud amet.
                                </small>
                                <!-- Closing Quote -->
                                <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68 6.38C..." fill="#FF6B6B" />
                                </svg>
                            </div>

                            <div class="mt-3">
                                <h6 class="fw-bold">Cornelius B</h6>
                                <small class="text-muted">Professional Nurse</small>
                            </div>
                        </div>

                        <img src="{{ asset('public/assets/review-img.png') }}" width="200" alt="Reviewer">
                    </div>
                </div>
            @endfor
        </div>

        <div class="testimonial-bottom
    mt-4" data-aos="fade-up">
            @for ($i = 0; $i < 20; $i++)
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
                                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                    Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt
                                    nostrud amet.
                                </small>
                                <!-- Closing Quote -->
                                <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68 6.38C..." fill="#FF6B6B" />
                                </svg>
                            </div>

                            <div class="mt-3">
                                <h6 class="fw-bold">Cornelius B</h6>
                                <small class="text-muted">Professional Nurse</small>
                            </div>
                        </div>

                        <img src="{{ asset('public/assets/review-img.png') }}" width="200" alt="Reviewer">
                    </div>
                </div>
            @endfor
        </div>
    </section>

    {{-- Success-Metrics --}}
    <section class="success-metrics">
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
    </section>

    {{-- Instructor-Section --}}
    <section class="instructor-section">
        <div class="container-fluid py-5 px-3 px-sm-5 mt-5">
            <div class="card px-4 px-md-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ asset('public/assets/instructor.png') }}" style="margin-top: -4rem" width="100%"
                            alt="">
                    </div>
                    <div class="col-md-8 col-xl-6 py-4" data-aos="fade-left">
                        <h2 class="rubik text-white">Guidance from Real Nursing Experts</h2>
                        <p style="font-weight: 100" class="text-white rubik">Meet Maria, your lead instructor and
                            dedicated guide. With years of nursing and teaching experience, she’s here to support, motivate,
                            and help you succeed every step of the way.</p>

                        <h5 style="font-weight: 400" class="mt-4 text-white rubik">Maria T. , Lead Instructor</h5>

                        <a href="{{ route('instructors') }}">
                            <button
                                style="background-color: var(--footer_text_hover_color); border: none; color: #fff; border-radius: 50px;"
                                class="py-2 px-4 text-white mt-3">Meet the Team</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Courses-Section --}}
    <section class="course-section" style="background-color: #F7F7F7">
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
                        @for ($i = 0; $i < 3; $i++)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card border-0 rounded-3 w-100" data-aos="fade-up">

                                    <div class="card-body rubik">
                                        <!-- Image with badge -->
                                        <div class="position-relative">
                                            <img src="{{ asset('public/assets/course-img.png') }}" class="card-img-top"
                                                alt="Course Instructors">
                                            <span style="position: absolute; top: 10px; right: 10px; border-radius: 6px;"
                                                class="py-2 px-3 d-flex align-items-center gap-1 bg-white text-dark m-2">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2032_122)">
                                                        <circle cx="8" cy="8.5" r="7.25" stroke="#413C69"
                                                            stroke-width="1.5" />
                                                        <path d="M8 4.94434V9.06787L10.6667 10.2777" stroke="#413C69"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2032_122">
                                                            <rect width="16" height="16" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                8 weeks
                                            </span>
                                        </div>

                                        <!-- Top meta -->
                                        <div class="d-flex justify-content-between my-2">
                                            <span class="text-success fw-bold">Course 01</span>
                                            <span style="color: #CA8804">coaching</span>
                                        </div>

                                        <!-- Title & Subtitle -->
                                        <h5 style="font-weight: 600"
                                            class="card-title rubik fw-bold text-dark d-flex align-items-center justify-content-between">
                                            Live Prep Course
                                            <svg width="24" height="28" viewBox="0 0 24 28" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 21L17 11M17 11H7M17 11V21" stroke="#101828" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </h5>
                                        <p class="card-text text-muted small mb-3">
                                            Structured live sessions led by expert instructors
                                        </p>

                                        <!-- Features -->
                                        <ul class="list-unstyled small mb-4 d-flex flex-wrap justify-content-between">
                                            <li class="mb-1 d-flex align-items-center gap-1">
                                                <img src="{{ asset('public/assets/point.png') }}" width="25"
                                                    alt="Course Instructors">
                                                Diagnostic assessment
                                            </li>
                                            <li class="mb-1 d-flex align-items-center gap-1">
                                                <img src="{{ asset('public/assets/point.png') }}" width="25"
                                                    alt="Course Instructors">
                                                Diagnostic assessment
                                            </li>
                                            <li class="mb-1 d-flex align-items-center gap-1">
                                                <img src="{{ asset('public/assets/point.png') }}" width="25"
                                                    alt="Course Instructors">
                                                Diagnostic assessment
                                            </li>
                                        </ul>

                                        <!-- Footer -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('instructors') }}">
                                                <button
                                                    style="background-color: var(--system_primery_color); border: none; color: #fff; border-radius: 50px;"
                                                    class="py-2 px-4 text-white mt-3">Enroll Now</button>
                                            </a>
                                            <h2 style="color: var(--system_secendory_color); font-weight: 700 !important; font-family: 'Inter' !important;"
                                                class="mb-0">$499</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-table-comparison" role="tabpanel"
                    aria-labelledby="pills-table-comparison-tab" tabindex="0">
                    <div class="table-responsive bg-white p-2 p-md-4" style="border-radius: 8px">
                        <table class="table comparison-table">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Duration</th>
                                    <th>Format</th>
                                    <th>Price</th>
                                    <th>Key Feature</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Course">Live Prep Courses</td>
                                    <td data-label="Duration">8–12 weeks</td>
                                    <td data-label="Format">Live interactive classes</td>
                                    <td data-label="Price">From $499</td>
                                    <td data-label="Key Feature">Small groups + real-time instructor Q&amp;A</td>
                                </tr>
                                <tr>
                                    <td data-label="Course">On-Demand Prep</td>
                                    <td data-label="Duration">Self-paced</td>
                                    <td data-label="Format">Pre-recorded lessons</td>
                                    <td data-label="Price">From $299</td>
                                    <td data-label="Key Feature">Flexible access + practice quizzes</td>
                                </tr>
                                <tr>
                                    <td data-label="Course">Remedial Program</td>
                                    <td data-label="Duration">Flexible</td>
                                    <td data-label="Format">Personalized 1-on-1 coaching</td>
                                    <td data-label="Price">From $599</td>
                                    <td data-label="Key Feature">Tailored study plan + feedback</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- @if (count($latest_programs) > 0 || count($latest_courses) > 0)
        <section class="sec-4">
            <div class="container px-lg-5 pt-lg-5 pt-3">
                <div class="row text-center main_row mb-md-4 mb-3 px-2 px-md-0">
                    <h2 class="custom_small_heading font-weight-bold">Gain the Edge in Healthcare School & Beyond</h2>
                    <p class="custom_paragraph">Adult-Focused Programs & Prep-Courses Prepare You for NCLEX® & Career
                        Licensure.</p>
                </div>
                <div class="row d-flex align-items-stretch pb-3 pb-md-0 px-xl-5">
                    <div class="col-md-6 mb-2 px-md-0 hidden hidden-left">
                        <div class="custom-slider-container">
                            <button class="prev">❮</button>
                            <div class="custom-slider">
                                @php
                                    $recent_programs = $latest_programs;
                                    $first_program = $recent_programs->first();
                                    if ($first_program) {
                                        $recent_programs = $recent_programs->except($first_program->id);
                                    }
                                @endphp
                                @php
                                    $recent_courses = $latest_courses;
                                    $first_course = $recent_courses->first();
                                    if ($first_course) {
                                        $recent_courses = $recent_courses->except($first_course->id);
                                    }
                                    $i = 0;
                                @endphp
                                @foreach ($recent_programs as $keyprograms => $thisprogram)
                                    <a href = "{{ route('programs.detail', [$thisprogram->id]) }}">
                                        <div class="custom-slide">
                                            <img src="{{ getCourseImage($thisprogram->image) }}" alt="Image 1">
                                            <div class="overlay"></div>
                                            <div class="text-overlay px-4 py-2">
                                                <a href = "{{ route('programs.detail', [$thisprogram->id]) }}">
                                                    <h5 class="image-text font-weight-bold text-white">
                                                        {{ $thisprogram->programtitle }}
                                                    </h5>
                                                </a>
                                                <p class="text-white">
                                                    @php
                                                        $description = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(
                                                                strip_tags($thisprogram->discription),
                                                            ),
                                                        );
                                                    @endphp
                                                    @if (Str::length($description) > 120)
                                                        {{ Str::limit($description, 120, '...') }}
                                                    @else
                                                        {{ $description }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="category">
                                                <span class="category_name">Program</span>
                                            </div>
                                            <div class="date-overlay">
                                                <span
                                                    class="image-date">${{ $thisprogram->currentProgramPlan[0]->amount }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                @foreach ($recent_courses as $keycourses => $thiscourse)
                                    @if (array_key_exists($keycourses, $recent_courses->toArray()))
                                        <a
                                            href="{{ !empty($thiscourse->parent_id) ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) . '?courseType=' . $thiscourse->type : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}">
                                            <div class="custom-slide">
                                                <img src="{{ getCourseImage($thiscourse->image) }}"
                                                    alt="Recent Courses Image">

                                                <div class="overlay"></div>
                                                <div class="text-overlay">
                                                    <a
                                                        href="{{ !empty($thiscourse->parent_id) ? courseDetailsUrl(@$thiscourse->parent->id, @$thiscourse->type, @$thiscourse->parent->slug) . '?courseType=' . $thiscourse->type : courseDetailsUrl(@$thiscourse->id, @$thiscourse->type, @$thiscourse->slug) }}">
                                                        <h5 class="image-text font-weight-bold text-white">
                                                            {{ !empty($thiscourse->parent_id) ? $thiscourse->parent->title : $thiscourse->title }}
                                                        </h5>
                                                    </a>
                                                    <br>
                                                    <p class="text-white">
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
                                                </div>
                                                <div class="category">
                                                    <span class="text-black">
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
                                                </div>
                                                @php
                                                    if (isset($thiscourse->currentCoursePlan[0])) {
                                                        $course_price = $thiscourse->currentCoursePlan[0]->amount;
                                                    } else {
                                                        $course_price = $thiscourse->price + $thiscourse->tax;
                                                    }
                                                @endphp
                                                <div class="date-overlay">
                                                    <span class="image-date">${{ number_format($course_price, 0) }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <button class="next">❯</button>
                        </div>
                    </div>
                    @php

                    @endphp
                    <div class="col-md-6 hidden hidden-right">
                        <div class="row">
                            @if ($first_program)
                                <div class="col-6 px-md-2">
                                    <div class="card custom-card">
                                        <img src="{{ getCourseImage($first_program->icon) }}" class="card-img"
                                            alt="...">
                                        <a href="{{ route('programs.detail', [$first_program->id]) }}"
                                            class="card-img-overlay">
                                            <h5 class="card-title font-weight-bold">
                                                <a
                                                    href="{{ route('programs.detail', [$first_program->id]) }}">{{ $first_program->programtitle }}</a>
                                            </h5>
                                            <div class="d-flex justify-content-between" style="gap: 10px">
                                                <div class="card-date">
                                                    <span
                                                        class="card_date_heading">${{ number_format($first_program->currentProgramPlan[0]->amount, 0) }}</span>
                                                </div>
                                                <div class="card-date2">
                                                    <span class="card_date_heading">
                                                        Program
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if ($first_course)
                                @php
                                    if (isset($first_course->currentCoursePlan[0])) {
                                        $course_price = $first_course->currentCoursePlan[0]->amount;
                                    } else {
                                        $course_price = $first_course->price + $first_course->tax;
                                    }

                                @endphp
                                <div class="col-6 px-md-2">
                                    <div class="card custom-card">
                                        <img src="{{ getCourseImage($first_course->thumbnail) }}" class="card-img"
                                            alt="...">

                                        <a href="{{ !empty($first_course->parent_id) ? courseDetailsUrl(@$first_course->parent->id, @$first_course->type, @$first_course->parent->slug) . '?courseType=' . $first_course->type : courseDetailsUrl(@$first_course->id, @$first_course->type, @$first_course->slug) }}"
                                            class="card-img-overlay">
                                            <h5 class="card-title font-weight-bold">
                                                <a
                                                    href="{{ !empty($first_course->parent_id) ? courseDetailsUrl(@$first_course->parent->id, @$first_course->type, @$first_course->parent->slug) . '?courseType=' . $first_course->type : courseDetailsUrl(@$first_course->id, @$first_course->type, @$first_course->slug) }}">
                                                    {{ !empty($first_course->parent_id) ? $first_course->parent->title : $first_course->title }}
                                                </a>
                                            </h5>
                                            <div class="d-flex justify-content-between" style="gap: 10px">
                                                <div class="card-date">
                                                    <span
                                                        class="card_date_heading">${{ number_format($course_price, 0) }}</span>
                                                </div>
                                                <div class="card-date2">
                                                    <span class="card_date_heading">
                                                        @if ($first_course->type == 1)
                                                            {{ __('Course') }}
                                                        @elseif($first_course->type == 2)
                                                            {{ __('Big Quiz') }}
                                                        @elseif($first_course->type == 3)
                                                            {{ __('Individual Course') }}
                                                        @elseif($first_course->type == 4)
                                                            {{ __('Full Course') }}
                                                        @elseif($first_course->type == 5)
                                                            {{ __('Prep-Course (On-Demand)') }}
                                                        @elseif($first_course->type == 6)
                                                            {{ __('Prep-Course (Live)') }}
                                                        @elseif($first_course->type == 8)
                                                            {{ __('Repeat Course') }}
                                                        @elseif($first_course->type == 9)
                                                            {{ __('Tutor Course') }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mt-4 text-center">
                        <a href="{{ route('quizzes') }}" class="small_btn5 theme_btn py-2 px-4">View all Courses </a>

                    </div>
                </div>
            </div>
        </section>
    @endif --}}


    <section
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
    </section>


    {{-- <section class="sec-5 percent-section">
        <div class="container px-lg-5 py-lg-5 py-4">
            <div class="row percent-row px-xl-5">
                <div class="col-lg-6 d-flex flex-column counter-padd px-md-0 ">

                    <div class="d-flex justify-content-left align-items-center percent1 animatee">
                        <h2 class="percent font-weight-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340" width="50" height="40">
                                <g data-name="Layer 29">
                                    <path
                                        d="M295.094 120.483a11.956 11.956 0 0 1 11.955 11.956v12.288a12.193 12.193 0 0 1-5.634 10.428c-4.034 2.487-10.741 4.05-21.638.932a1.73 1.73 0 0 1-.7-2.936c2.255-2.031 5.084-5.632 4.391-10.537a45.723 45.723 0 0 1-.29-11.125 11.972 11.972 0 0 1 11.916-11.006z"
                                        style="fill:#ffc676" />
                                    <path
                                        d="M66.582 229.353s-20.584-31.059 0-95.515c0 0 9.792-39.71 35.257-37.318 0 0 14.345 28.784 15.784 53.486 0 0 2.878 62.762-17.267 84.622 0 0-19.104 13.637-33.774-5.275z"
                                        style="fill:#595975" />
                                    <path
                                        d="M113 23.5a43 43 0 0 0-12.811-1.419 8.247 8.247 0 0 0-7.794 7.3C90.667 45.262 80.967 90.6 26.876 131.991a8.263 8.263 0 0 0-2.208 10.641 32.392 32.392 0 0 0 14.662 13.18S96.949 90.792 113 23.5z"
                                        style="fill:#b8c7dd" />
                                    <path
                                        d="M110.8 13.959s-4.574 34.073-35.1 80.46Q70.493 117.6 49.592 128.9c-7.414 8.608-15.712 17.422-25 26.336a46.741 46.741 0 0 0 32.2 21.591 9.38 9.38 0 0 0 10.735-7.875 157.421 157.421 0 0 1 3.434-16.252c1.147-15.669 7.879-30.606 18.306-45.057a223.538 223.538 0 0 1 49.6-60.45 9.425 9.425 0 0 0 2.172-11.577C137.076 28.192 128.4 17.28 110.8 13.959z"
                                        style="fill:#fff" />
                                    <path
                                        d="M70.961 152.7a196.721 196.721 0 0 1 18.306-45.057l-14.915-11.19A337.064 337.064 0 0 1 49.588 128.9c4.497 8.441 11.278 17.408 21.373 23.8z"
                                        style="fill:#b8c7dd" />
                                    <path
                                        d="m55.654 108.89 13.124 13.319a15.687 15.687 0 0 0 11.174 4.677 15.689 15.689 0 0 1 11.442 4.955l17.5 18.654s2.367-37.123-7.052-53.975L83.605 79.1a12.4 12.4 0 0 0-17.011-.128 89.855 89.855 0 0 0-12.208 14 12.455 12.455 0 0 0 1.268 15.918z"
                                        style="fill:#ffd4ca" />
                                    <path
                                        d="M261.254 176.488s56.593 26.454 55.1 157.471H151s5.949-70.127-42.545-86.773a27.929 27.929 0 0 0-14.677-1c-8.051 1.657-23.235 2.071-27.2-16.83 0 0 7.294 10.335 22.1.5 21.989-14.613 21.105-93.356 13.16-133.33 17.031 7.187 31.1 21.584 41.453 45.011a65.824 65.824 0 0 0 11.337 17.552c2.762 3.055 5.02 5.32 5.02 5.32s35.082 27.991 101.606 12.079z"
                                        style="fill:#797996" />
                                    <path style="fill:#cbd5ea"
                                        d="m245.36 183.609-20.09-17.006h-22.309l-20.09 17.006 31.181 53.928 31.308-53.928z" />
                                    <path
                                        d="m206.345 188.748-3.384 30.6 10.639 15.28 10.636-15.277-2.94-26.594c-5.16-7.391-14.951-4.009-14.951-4.009z"
                                        style="fill:#ff6d8d" />
                                    <path d="M206.345 188.748a18.458 18.458 0 0 1 14.949 4.009l-2.261-20.447h-10.87z"
                                        style="fill:#e5486e" />
                                    <path
                                        d="m228.039 160.1 18.25 13.86-9.125 18.918L213.6 174.54s4.968-9.999 14.439-14.44zM199.156 160.1 177.9 170.357l12.132 22.52L213.6 174.54s-4.973-9.999-14.444-14.44z"
                                        style="fill:#fff" />
                                    <path style="fill:#ffd4ca"
                                        d="M199.156 152.822v7.277l14.442 14.441 14.441-14.441v-7.022l-28.883-.255z" />
                                    <path
                                        d="m246.289 173.959-32.11 54.1-35.641-60.53a10.441 10.441 0 0 0-8.054-5.107 20.867 20.867 0 0 0-10.835 1.978l50.909 82.527a4.255 4.255 0 0 0 7.242 0l43.454-70.442s-7.708-4.175-14.965-2.526z"
                                        style="fill:#fff" />
                                    <path d="M228.039 139.153h-28.883v13.669a49.712 49.712 0 0 0 28.883.255z"
                                        style="fill:#f99c9c" />
                                    <path
                                        d="M292.056 65.631a247.292 247.292 0 0 0-67.878-53.587 21.227 21.227 0 0 0-20 0A247.3 247.3 0 0 0 136.3 65.631a11.337 11.337 0 0 0 .38 15.393c34.668 35.586 77.5 42.81 77.5 42.81s42.829-7.224 77.5-42.81a11.337 11.337 0 0 0 .376-15.393z"
                                        style="fill:#797996" />
                                    <path d="M195.251 79.928s-16.706 0-24.6 6.855c0 0-2.5 22.641 12.3 29.233z"
                                        style="fill:#ffc676" />
                                    <path
                                        d="M184.723 118.01s-2.1-6.892-6.535-10.943c-5.124-4.676-13.312-.936-13.412 6-.047 3.266.909 7.375 4.213 12.014 8.309 11.668 18.032 3.182 18.032 3.182z"
                                        style="fill:#f99c9c" />
                                    <path d="M233.107 79.928s16.706 0 24.6 6.855c0 0 2.5 22.641-12.3 29.233z"
                                        style="fill:#ffc676" />
                                    <path
                                        d="M243.635 118.01s2.095-6.892 6.535-10.943c5.124-4.676 13.312-.936 13.412 6 .047 3.266-.909 7.375-4.213 12.014-8.309 11.668-18.032 3.182-18.032 3.182z"
                                        style="fill:#f99c9c" />
                                    <path
                                        d="M233.107 79.928a104.352 104.352 0 0 0-37.856 0s-17.069 21.631-12 44.953 30.927 21.463 30.927 21.463 25.856 1.859 30.927-21.463-11.998-44.953-11.998-44.953z"
                                        style="fill:#ffd4ca" />
                                    <path
                                        d="M256.875 71.784a11.935 11.935 0 0 0-3.868-8.187 61.883 61.883 0 0 0-21.534-12.512 53.328 53.328 0 0 0-34.589 0A61.879 61.879 0 0 0 175.351 63.6a11.931 11.931 0 0 0-3.868 8.187l-.832 15s14.772-6.855 43.528-6.855 43.528 6.855 43.528 6.855z"
                                        style="fill:#595975" />
                                    <path
                                        d="M202.784 112.049a3.5 3.5 0 0 1-3.5-3.5V105.3a3.5 3.5 0 0 1 7 0v3.247a3.5 3.5 0 0 1-3.5 3.502zM225.574 112.049a3.5 3.5 0 0 1-3.5-3.5V105.3a3.5 3.5 0 0 1 7 0v3.247a3.5 3.5 0 0 1-3.5 3.502zM214.132 134.43c-8.416 0-12.458-3.776-13.805-5.4a3.5 3.5 0 1 1 5.388-4.47c.4.48 2.671 2.869 8.417 2.869s8.018-2.389 8.416-2.868a3.5 3.5 0 1 1 5.387 4.47c-1.346 1.624-5.387 5.399-13.803 5.399z"
                                        style="fill:#f99c9c" />
                                    <path
                                        d="M262.818 173.355c-.9-.474-8.1-4.093-15.626-3.1l-15.653-11.888v-11.742a28.9 28.9 0 0 0 13.827-12.436 15 15 0 0 0 3.957.548c3.892 0 8.628-1.632 12.9-7.625 3.294-4.624 4.93-9.367 4.862-14.094a11.677 11.677 0 0 0-1.925-6.31 154.956 154.956 0 0 0 26.227-20.464v30.141a15.583 15.583 0 0 0-12.4 13.913 49.028 49.028 0 0 0 .311 11.9c.764 5.405-4.964 8.767-5.191 8.9a3.5 3.5 0 0 0 .566 6.361 48.052 48.052 0 0 0 15.515 2.979 23.13 23.13 0 0 0 12.365-3.2 15.768 15.768 0 0 0 7.3-13.409v-12.292a15.469 15.469 0 0 0-11.465-14.914V72.949a3.51 3.51 0 0 0-.052-.516 14.79 14.79 0 0 0-3.645-9.112 250.672 250.672 0 0 0-68.867-54.367 24.735 24.735 0 0 0-23.291 0 250.625 250.625 0 0 0-68.861 54.367 14.912 14.912 0 0 0 .5 20.146 154.2 154.2 0 0 0 29.028 23.24 11.68 11.68 0 0 0-1.927 6.311c-.068 4.726 1.568 9.468 4.862 14.094 4.26 5.981 8.971 7.634 12.878 7.634a14.983 14.983 0 0 0 3.987-.556 28.636 28.636 0 0 0 12.655 11.892V157.9l-14.636 7.063a13.947 13.947 0 0 0-10.224-6.025 24.808 24.808 0 0 0-10.292 1.322 177.763 177.763 0 0 1-3.28-3.525 62.209 62.209 0 0 1-10.733-16.621c-10.173-23.017-24.528-38.66-42.66-46.531l-1.087-1.038a226.084 226.084 0 0 1 38.417-42.707 12.869 12.869 0 0 0 2.968-15.871c-3.833-7.178-13.175-19.768-32.677-23.447a3.5 3.5 0 0 0-4.117 2.97c-.009.069-.278 1.924-1.041 5.268a42.049 42.049 0 0 0-6.286-.176A11.7 11.7 0 0 0 88.918 29c-.865 7.946-3.88 23.939-14.165 43.179a15.8 15.8 0 0 0-10.545 4.234 92.982 92.982 0 0 0-12.686 14.55 16 16 0 0 0-1.607 15.558 204.755 204.755 0 0 1-25.166 22.691 11.817 11.817 0 0 0-3.126 15.149 33.034 33.034 0 0 0 3.717 5.256c-1.053 1.034-2.1 2.071-3.169 3.1a3.5 3.5 0 0 0-.654 4.191A49.958 49.958 0 0 0 54.138 179.9c-1.614 30.848 7.21 47.526 9.163 50.8 3.451 15.162 15.059 22.23 31.182 18.91a24.425 24.425 0 0 1 12.835.885c45.318 15.557 40.25 82.494 40.194 83.169-.009.1-.013.2-.013.294h7.011a136.375 136.375 0 0 0-3.189-37.939c-6.274-26.9-18.636-45.082-43.881-52.8a26.478 26.478 0 0 0 7.411-8.063 3.5 3.5 0 1 0-6.059-3.507c-5.449 9.412-19.172 11.617-19.371 11.647-.025 0-.047.014-.072.018-7.132.69-12.421-1.317-15.8-6.017 4.326.833 10.041.13 17.063-4.536 22.947-15.25 22.57-88.944 15.882-130.093 14.057 7.791 25.087 21.033 33.591 40.274a69.185 69.185 0 0 0 11.943 18.485 174.709 174.709 0 0 0 4.847 5.15l54.325 88.06a3.5 3.5 0 0 0 5.957 0l45.269-73.385c4.619 3.069 14.552 10.978 24.315 27.268 12.33 20.573 26.87 59.028 26.116 125.439h7c.772-68.482-14.528-108.321-27.5-129.684-13.979-23.017-28.245-30.294-29.539-30.92zm40.03-41.818v12.288a8.726 8.726 0 0 1-3.972 7.45c-3.8 2.341-9.253 2.765-15.976 1.272a14.426 14.426 0 0 0 3.327-11.324 41.933 41.933 0 0 1-.267-10.352 8.457 8.457 0 0 1 16.888.666zM113.6 18.182a37.863 37.863 0 0 1 24.35 19.082 5.908 5.908 0 0 1-1.376 7.283 233.334 233.334 0 0 0-38.962 43.1l-8.622-8.235c13.843-24.386 22.777-52.222 24.61-61.23zM95.877 29.76a4.725 4.725 0 0 1 4.5-4.187 33.686 33.686 0 0 1 4.154.051c-3.05 10.794-9.155 28.1-20.9 49.063a15.79 15.79 0 0 0-1.76-.965C91.964 54.218 94.982 37.969 95.877 29.76zM57.25 94.987a85.906 85.906 0 0 1 11.731-13.451 8.9 8.9 0 0 1 12.206.1l17.427 16.646a293.681 293.681 0 0 1 4.59 41.035l-9.257-9.87a19.259 19.259 0 0 0-14-6.061 12.262 12.262 0 0 1-8.681-3.633l-13.123-13.32a8.958 8.958 0 0 1-.893-11.446zm-29.539 45.918A4.789 4.789 0 0 1 29 134.771 212.735 212.735 0 0 0 54.1 112.3l2.522 2.559a365.038 365.038 0 0 1-26.3 29.791 26.026 26.026 0 0 1-2.611-3.745zm29.649 32.469A43.816 43.816 0 0 1 29.1 155.75a377.782 377.782 0 0 0 32.47-35.87l4.714 4.785a19.282 19.282 0 0 0 8.63 5.019 178.553 178.553 0 0 0-10.84 38.74 5.91 5.91 0 0 1-2.379 3.91 5.759 5.759 0 0 1-4.335 1.04zm29.382 53.561c-11.294 7.508-16.62 1.29-17.275.433-.689-1.116-9.948-16.79-8.333-47.24a12.92 12.92 0 0 0 9.859-10.643 172.766 172.766 0 0 1 11.112-38.893 12.225 12.225 0 0 1 6.736 3.644l14.685 15.656c.522 34.717-4.304 68.748-16.784 77.043zm154.944-52.076-6.943 11.7-15.867-12.345 9.478-9.479zm-10.545 17.766-5.345 9.006-1.592-14.4zm-17.541-13.65 2.9 2.257 3.361 30.4-5.669 9.552-6.66-11.312 3.166-28.64zm-10.941-20.326v-9.987c6.989 1.834 18.027 1.152 21.882.282v9.705L213.6 169.59zm51.685-69.429a40.327 40.327 0 0 1-1.551 12.588 11.372 11.372 0 0 0-4.651 2.392 72.059 72.059 0 0 0-7.17-18.461 86.675 86.675 0 0 1 13.372 3.481zm-40.165-12.792c-19.651 0-32.952 3.121-39.74 5.251l.538-9.7a8.492 8.492 0 0 1 2.724-5.788A58.04 58.04 0 0 1 198.02 54.4a50.017 50.017 0 0 1 32.317 0 58.049 58.049 0 0 1 20.32 11.794 8.491 8.491 0 0 1 2.723 5.788l.538 9.7c-6.787-2.133-20.088-5.254-39.739-5.254zm42.339 46.623c-2.574 3.614-5.371 5.127-8.495 4.584.183-.653 1.639-10.148 1.442-14.046a17.06 17.06 0 0 1 3.064-3.936 4.3 4.3 0 0 1 4.724-.78 4.585 4.585 0 0 1 2.828 4.244c.046 3.207-1.152 6.549-3.563 9.934zM139.189 78.582a7.876 7.876 0 0 1-.257-10.642 243.435 243.435 0 0 1 66.893-52.808 17.737 17.737 0 0 1 16.707 0 243.483 243.483 0 0 1 66.894 52.808 7.877 7.877 0 0 1-.257 10.642 147.549 147.549 0 0 1-29.062 23.011 48.986 48.986 0 0 0 1.093-15.066l-.828-14.936A15.541 15.541 0 0 0 255.358 61a65.029 65.029 0 0 0-22.748-13.225 57.053 57.053 0 0 0-36.863 0A65.02 65.02 0 0 0 173 61a15.536 15.536 0 0 0-5.011 10.586l-.831 14.959a49.048 49.048 0 0 0 1.092 15.045 147.5 147.5 0 0 1-29.061-23.008zm32.65 44.469c-2.41-3.386-3.609-6.728-3.563-9.933a4.586 4.586 0 0 1 2.829-4.245 4.3 4.3 0 0 1 4.723.779 17.078 17.078 0 0 1 3.06 3.923c-.2 3.9 1.266 13.405 1.449 14.058-3.121.545-5.921-.965-8.498-4.582zm8.368-18.858a11.36 11.36 0 0 0-4.643-2.386 40.321 40.321 0 0 1-1.55-12.587 86.789 86.789 0 0 1 13.366-3.48 71.837 71.837 0 0 0-7.173 18.453zm6.465 19.945c-3.955-17.249 5.8-33.89 9.693-39.734a163.068 163.068 0 0 1 35.629 0c3.795 5.7 13.525 22.414 9.692 39.734-5.179 23.402-49.386 24.524-55.014 0zm11.768 40.193 9.88 9.881-14.942 11.625-8.741-14.845zm4.552 22.9L201.6 199.8l-4.642-7.884zm11.187 58.906-49.27-79.867a17.216 17.216 0 0 1 5.261-.355 6.954 6.954 0 0 1 5.353 3.4l35.64 60.531a3.5 3.5 0 0 0 3.01 1.725h.006a3.5 3.5 0 0 0 3.01-1.714l31.281-52.706a19.1 19.1 0 0 1 7.646 1.009z"
                                        style="fill:#3c3c4f" />
                                    <path
                                        d="M271.437 260.6a3.5 3.5 0 0 0-2.785 4.092c.063.335 6.36 33.857 6.36 66.944v2.32h7v-2.32c0-33.738-6.419-67.91-6.483-68.251a3.5 3.5 0 0 0-4.092-2.785z"
                                        style="fill:#3c3c4f" />
                                </g>
                            </svg>
                        </h2>
                        <div class="percent_content1">
                            <h5 class="percent-h">Live Learning & Flexibility</h5>
                            <p class="custom_paragraph percent-p">Embrace the opportunity to learn live, anytime, and
                                anywhere, and break free from the limitations of traditional schedules.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-left align-items-center percent2 animatee">
                        <h2 class="percent font-weight-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 180" xml:space="preserve"
                                width="50" height="40">
                                <path fill="#FF916E"
                                    d="M154.622 90c0 35.69-28.932 64.623-64.621 64.623-35.69 0-64.623-28.934-64.623-64.623 0-35.689 28.933-64.623 64.623-64.623 35.689 0 64.621 28.934 64.621 64.623z" />
                                <path fill="#FF916E"
                                    d="M57.667 121.357h16.467a2.72 2.72 0 0 1 2.71 2.711 2.718 2.718 0 0 1-2.71 2.711H57.667a2.718 2.718 0 0 1-2.71-2.711 2.72 2.72 0 0 1 2.71-2.711zM47.589 110.814h25.893a2.72 2.72 0 0 1 2.712 2.711 2.719 2.719 0 0 1-2.712 2.709H47.589a2.718 2.718 0 0 1-2.711-2.709 2.72 2.72 0 0 1 2.711-2.711zM37.398 110.814h3.988a2.72 2.72 0 0 1 2.71 2.711c0 1.49-1.22 2.709-2.71 2.709h-3.988a2.718 2.718 0 0 1-2.71-2.709 2.72 2.72 0 0 1 2.71-2.711z" />
                                <path fill="#FF916E"
                                    d="M63.002 118.484v.617a2.41 2.41 0 0 1-2.403 2.404h13.116a2.411 2.411 0 0 1-2.403-2.404v-.617c0-1.32 1.082-2.4 2.403-2.4H60.599a2.408 2.408 0 0 1 2.403 2.4zM113.747 102.973h16.465c1.49 0 2.71 1.219 2.71 2.711a2.72 2.72 0 0 1-2.71 2.711h-16.465a2.72 2.72 0 0 1-2.712-2.711 2.718 2.718 0 0 1 2.712-2.711zM103.667 92.43h25.894a2.718 2.718 0 0 1 2.71 2.711 2.719 2.719 0 0 1-2.71 2.711h-25.894a2.72 2.72 0 0 1-2.711-2.711 2.718 2.718 0 0 1 2.711-2.711zM93.478 92.43h3.986a2.719 2.719 0 0 1 2.712 2.711 2.72 2.72 0 0 1-2.712 2.711h-3.986a2.72 2.72 0 0 1-2.711-2.711 2.717 2.717 0 0 1 2.711-2.711z" />
                                <path fill="#FF916E"
                                    d="M119.079 100.102v.615a2.408 2.408 0 0 1-2.401 2.402h13.115a2.409 2.409 0 0 1-2.402-2.402v-.615a2.409 2.409 0 0 1 2.402-2.402h-13.115a2.406 2.406 0 0 1 2.401 2.402zM62.939 80.236h16.466a2.72 2.72 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711H62.939a2.72 2.72 0 0 1-2.711-2.711 2.721 2.721 0 0 1 2.711-2.711zM52.86 69.693h25.895a2.718 2.718 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711H52.86a2.72 2.72 0 0 1-2.71-2.711 2.718 2.718 0 0 1 2.71-2.711zM42.671 69.693h3.987a2.719 2.719 0 0 1 2.711 2.711 2.72 2.72 0 0 1-2.711 2.711h-3.987a2.72 2.72 0 0 1-2.71-2.711 2.718 2.718 0 0 1 2.71-2.711z" />
                                <path fill="#FF916E"
                                    d="M68.273 77.365v.617c0 1.32-1.081 2.4-2.402 2.4h13.116a2.408 2.408 0 0 1-2.403-2.4v-.617a2.41 2.41 0 0 1 2.403-2.404H65.871a2.41 2.41 0 0 1 2.402 2.404zM113.747 66.041h16.465c1.49 0 2.71 1.219 2.71 2.711a2.72 2.72 0 0 1-2.71 2.711h-16.465a2.72 2.72 0 0 1-2.712-2.711 2.719 2.719 0 0 1 2.712-2.711zM103.667 55.498h25.894a2.719 2.719 0 0 1 2.71 2.711 2.718 2.718 0 0 1-2.71 2.711h-25.894a2.719 2.719 0 0 1-2.711-2.711 2.72 2.72 0 0 1 2.711-2.711zM93.478 55.498h3.986a2.72 2.72 0 0 1 2.712 2.711 2.719 2.719 0 0 1-2.712 2.711h-3.986a2.718 2.718 0 0 1-2.711-2.711 2.719 2.719 0 0 1 2.711-2.711z" />
                                <path fill="#FF916E"
                                    d="M119.079 63.17v.617c0 1.32-1.08 2.4-2.401 2.4h13.115a2.408 2.408 0 0 1-2.402-2.4v-.617a2.41 2.41 0 0 1 2.402-2.402h-13.115a2.409 2.409 0 0 1 2.401 2.402z" />
                                <g>
                                    <path fill="#333"
                                        d="M137.133 80.832h-7.446a.385.385 0 0 1 0-.77h7.446a.385.385 0 0 1 0 .77zM138.141 83.602h-1.202a.385.385 0 1 1 0-.768h1.202a.383.383 0 1 1 0 .768zM145.284 85.904h-5.704a.383.383 0 0 1 0-.768h5.704a.385.385 0 1 1 0 .768zM121.386 89.273h-.96a.384.384 0 1 1 0-.768h.96a.384.384 0 1 1 0 .768zM133.085 89.273h-1.949a.385.385 0 1 1 0-.768h1.949a.384.384 0 0 1 0 .768zm-3.899 0h-1.95a.385.385 0 1 1 0-.768h1.95a.383.383 0 0 1 0 .768zm-3.901 0h-1.95a.383.383 0 0 1 0-.768h1.95a.385.385 0 1 1 0 .768zM135.995 89.273h-.96a.384.384 0 1 1 0-.768h.96a.384.384 0 0 1 0 .768z" />
                                    <g>
                                        <path fill="#333"
                                            d="M134.48 83.602h-5.475a.384.384 0 0 1 0-.768h5.475a.383.383 0 1 1 0 .768z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M131.098 116.816h-7.446a.385.385 0 0 1 0-.768h7.446a.385.385 0 1 1 0 .768zM132.106 119.588h-1.203a.384.384 0 0 1 0-.77h1.203a.386.386 0 0 1 0 .77zM139.25 121.891h-5.703a.384.384 0 1 1 0-.768h5.703a.384.384 0 0 1 0 .768zM115.351 125.26h-.96a.385.385 0 1 1 0-.768h.96a.384.384 0 1 1 0 .768zM127.051 125.26h-1.95a.385.385 0 1 1 0-.768h1.95a.384.384 0 1 1 0 .768zm-3.901 0h-1.95a.384.384 0 0 1 0-.768h1.95a.384.384 0 1 1 0 .768zm-3.899 0h-1.95a.385.385 0 1 1 0-.768h1.95a.383.383 0 0 1 0 .768zM129.961 125.26h-.96a.385.385 0 1 1 0-.768h.96a.384.384 0 0 1 0 .768z" />
                                    <g>
                                        <path fill="#333"
                                            d="M128.445 119.588h-5.474a.384.384 0 0 1 0-.77h5.474a.386.386 0 0 1 0 .77z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M65.553 139.607h-8.701a.385.385 0 1 1 0-.768h8.701a.383.383 0 1 1 0 .768zM68.578 137.412h-1.406a.386.386 0 0 1 0-.77h1.406a.384.384 0 0 1 0 .77zM70.251 142.473h-1.405a.384.384 0 0 1 0-.768h1.405a.384.384 0 1 1 0 .768zM65.553 137.412h-5.299a.386.386 0 0 1 0-.77h5.299a.385.385 0 0 1 0 .77zM73.449 135.178h-6.396a.385.385 0 1 1 0-.768h6.396a.384.384 0 1 1 0 .768z" />
                                    <g>
                                        <path fill="#333"
                                            d="M76.879 140.396h-3.323a.384.384 0 1 1 0-.768h3.323a.384.384 0 0 1 0 .768z" />
                                        <path fill="#333"
                                            d="M75.145 142.072a.386.386 0 0 1-.384-.385v-3.48a.385.385 0 1 1 .768 0v3.48a.387.387 0 0 1-.384.385z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M46.642 90.523H35.895a.384.384 0 0 1 0-.768h10.747a.383.383 0 1 1 0 .768zM50.377 87.811h-1.735a.383.383 0 1 1 0-.768h1.735a.385.385 0 1 1 0 .768zM52.445 94.061h-1.736a.383.383 0 1 1 0-.768h1.736a.384.384 0 0 1 0 .768zM46.642 87.811h-6.544a.384.384 0 1 1 0-.768h6.544a.384.384 0 1 1 0 .768zM56.396 85.053h-7.899a.385.385 0 1 1 0-.768h7.899a.384.384 0 1 1 0 .768z" />
                                    <g>
                                        <path fill="#333"
                                            d="M60.631 91.5h-4.104a.384.384 0 0 1 0-.768h4.104a.384.384 0 0 1 0 .768z" />
                                        <path fill="#333"
                                            d="M58.489 93.566a.384.384 0 0 1-.384-.385v-4.299c0-.213.171-.383.384-.383.212 0 .384.17.384.383v4.299a.384.384 0 0 1-.384.385z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M68.513 57.066H57.766a.383.383 0 1 1 0-.768h10.747a.383.383 0 1 1 0 .768zM55.766 59.779H54.03a.385.385 0 0 1 0-.77h1.735a.384.384 0 1 1 .001.77zM53.698 53.527h-1.736a.385.385 0 0 1 0-.768h1.736a.383.383 0 0 1 0 .768zM64.311 59.779h-6.545a.385.385 0 0 1 0-.77h6.545a.385.385 0 0 1 0 .77zM55.913 62.537h-7.9a.384.384 0 0 1-.384-.385c0-.213.171-.385.384-.385h7.9a.385.385 0 0 1 0 .77z" />
                                    <g>
                                        <path fill="#333"
                                            d="M50.904 57.949H46.8a.384.384 0 1 1 0-.768h4.104a.384.384 0 1 1 0 .768z" />
                                        <path fill="#333"
                                            d="M48.942 60.182a.385.385 0 0 1-.385-.385v-4.299c0-.211.172-.385.385-.385.211 0 .383.174.383.385v4.299a.384.384 0 0 1-.383.385z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#FFDB76"
                                        d="M116.831 148.939c-8.097 3.652-17.079 5.684-26.538 5.684a64.542 64.542 0 0 1-16.032-2.008c4.019-4.391 11.897-10.355 12.018-12.857.155-3.242-1.536-9.506-9.577-8.76-8.039.744-8.711-6.889-7.799-7.801 1.313-1.312 0-2.064 0-2.064s-1.44-.768-1.44-1.391c0-.625.864-1.49.864-1.49-1.824 0-1.488-1.822-1.488-1.822s.912-3.121-1.488-3.121c-2.399 0-2.303-2.16-2.063-3.072.24-.912 3.792-6.959 4.464-8.207.672-1.248-1.344-2.4-2.016-4.32a3.474 3.474 0 0 1-.153-.756h49.487c-.05 7.305-4.15 12.918-4.15 12.918s-4.737 4.607-4.737 10.494c0 5.889-.368 12.303 5.761 18.432 2.845 2.846 4.227 6.741 4.887 10.141z" />
                                </g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#ADEBF6"
                                        d="M116.483 65.5v15.777H71.062a7.904 7.904 0 0 1-7.543-7.895 7.895 7.895 0 0 1 7.364-7.883h45.6z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF"
                                        d="M116.483 66.641v13.494H72.111c-3.901 0-7.063-3.023-7.063-6.752 0-3.605 2.952-6.549 6.67-6.742h44.765z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#B2B2B2"
                                        d="m103.472 80.135.049-9.047-1.856.006v9.041z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                        d="m95.803 71.125 5.893-.037.099 15.795-2.969-2.5-2.925 2.537z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFDB76"
                                        d="m95.866 80.329 5.893-.038.018 2.77-5.893.037z" opacity=".5" />
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M108.388 65.496V45.365l-17.749 8.031-17.748-8.031v20.131h35.497z" />
                                    <path fill="#333"
                                        d="M108.386 45.365v4.363l-17.749 8.025-17.746-8.031v-4.357l17.749 8.031 17.746-8.031z" />
                                    <path fill="#757575"
                                        d="M90.638 51.537v1.865l-30.67-12.287V39.42l.012-.006 30.658 12.123z" />
                                    <path fill="#333"
                                        d="M90.638 51.537 59.967 39.408 90.864 27.49l29.874 11.93zM118.546 40.633h1.793v18.836h-1.793z" />
                                    <path fill="#333"
                                        d="M122.283 60.143a2.838 2.838 0 0 0-2.841-2.838 2.839 2.839 0 0 0-2.839 2.838 2.841 2.841 0 0 0 2.839 2.842 2.842 2.842 0 0 0 2.841-2.842z" />
                                    <path fill="#333"
                                        d="M121.333 61.566h-3.587c-.6 1.604-1.927 6.01-1.173 12.051h.001c0 .363 1.325.656 2.961.656s2.96-.293 2.96-.656c.755-6.041-.566-10.447-1.162-12.051z" />
                                    <g>
                                        <path fill="#B2B2B2"
                                            d="m90.638 51.537.001 1.865 30.099-12.287V39.42l-.012-.006-30.087 12.123z" />
                                    </g>
                                </g>
                                <g>
                                    <path fill="#333"
                                        d="M76.618 71.43h1.729v25.523h-1.729zM88.521 71.43h1.727v25.523h-1.727z" />
                                    <path fill="#333"
                                        d="M77.294 92.014h12.204v1.156H77.294zM77.294 86.109h12.204v1.154H77.294zM77.294 80.205h12.204v1.154H77.294zM77.294 74.301h12.204v1.156H77.294z" />
                                </g>
                            </svg>
                        </h2>
                        <div class="percent_content2">
                            <h5 class="percent-h">Affordability</h5>
                            <p class="custom_paragraph percent-p">Payment plans make it simple for you to plan your
                                educational
                                investment.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-left align-items-center percent3 animatee">
                        <h2 class="percent font-weight-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="50" height="40">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #374f68
                                        }

                                        .cls-2 {
                                            fill: #425b72
                                        }

                                        .cls-3 {
                                            fill: #ffde76
                                        }

                                        .cls-4 {
                                            fill: #fc6
                                        }

                                        .cls-5 {
                                            fill: #dad7e5
                                        }

                                        .cls-6 {
                                            fill: #edebf2
                                        }
                                    </style>
                                </defs>
                                <g id="_48._Mortarboard_and_Diploma_Roll_Certificate"
                                    data-name="48. Mortarboard and Diploma Roll Certificate">
                                    <path class="cls-1"
                                        d="M37 29a44.06 44.06 0 0 1-26 0l1.74-13.92h22.52C37.05 29.45 36.8 27.42 37 29z" />
                                    <path class="cls-2"
                                        d="M36.85 27.84a44 44 0 0 1-20.27-.13 3 3 0 0 1-2.26-3.29l1.17-9.34h19.77z" />
                                    <path class="cls-1" d="m47 11-23 8-23-8 23-8z" />
                                    <path class="cls-2" d="M42.69 9.5 24 16 5.31 9.5 24 3l18.69 6.5z" />
                                    <path class="cls-3"
                                        d="M5 20v-7.26a1 1 0 0 1 .9-1l16-1.56a1 1 0 0 1 .2 2L7 13.65V20a1 1 0 0 1-2 0z" />
                                    <path class="cls-4" d="M8 22v4H4v-4a2 2 0 0 1 4 0z" />
                                    <path class="cls-3"
                                        d="M8 22v3a3 3 0 0 1-3-3 4.1 4.1 0 0 1 .18-1.82A2 2 0 0 1 8 22z" />
                                    <path class="cls-4" d="M26 11a2 2 0 1 1-2.82-1.82A2 2 0 0 1 26 11z" />
                                    <path class="cls-3" d="M25.82 11.82a2 2 0 0 1-2.64-2.64 2 2 0 0 1 2.64 2.64z" />
                                    <path class="cls-5"
                                        d="m44.89 35.1-2 .34-1.39-7.87 2-.35a2 2 0 0 1 2.31 1.62l.7 3.94a2 2 0 0 1-1.62 2.32z" />
                                    <path class="cls-6"
                                        d="M46.52 32.87a2 2 0 0 1-3-1.4l-.73-4.13.66-.12a2 2 0 0 1 2.31 1.62c.78 4.16.76 3.93.76 4.03z" />
                                    <path class="cls-5"
                                        d="m7.46 41.7-2 .34a2 2 0 0 1-2.31-1.62l-.7-3.94a2 2 0 0 1 1-2.09c.39-.22.45-.2 2.6-.57 1.75 9.86.67 3.71 1.41 7.88z" />
                                    <path class="cls-6"
                                        d="m7.14 39.93-.65.07a2 2 0 0 1-2.31-1.62c-.73-4.11-.71-3.93-.71-4 .39-.22.45-.2 2.6-.57z" />
                                    <path class="cls-5"
                                        d="M43.07 36.33a1 1 0 0 1-.9 1.17C22.82 39 27 38.27 8.87 43.38a1 1 0 0 1-1.25-.8c-1.07-6.06-.68-3.84-1.7-9.65a1 1 0 0 1 .9-1.17c19.16-1.4 15.67-.91 33.3-5.88a1 1 0 0 1 1.25.8c1.45 8.24 1.33 7.52 1.7 9.65z" />
                                    <path class="cls-6"
                                        d="M42.94 35.59c-17.46 1.32-13.84.65-32.07 5.79a1 1 0 0 1-1.25-.8c-1-5.87-.67-3.82-1.57-8.91 17.38-1.3 13.72-.61 32.07-5.79a1 1 0 0 1 1.25.8c1.02 5.8.63 3.76 1.57 8.91z" />
                                    <path class="cls-4"
                                        d="M30.13 36.68c-1.48 1.25-1.09.65-1.78 2.55-1.9.34-1.26 0-2.81 1.31-1.9-.69-1.19-.61-3.1-.27-1.24-1.48-.64-1.09-2.54-1.78-.34-1.91 0-1.27-1.31-2.82.66-1.81.62-1.1.27-3.09 1.55-1.3 1.12-.73 1.78-2.55 1.87-.31 1.29 0 2.81-1.31 1.9.69 1.19.61 3.1.27 1.24 1.48.64 1.09 2.54 1.78.34 1.91 0 1.27 1.31 2.82-.66 1.81-.62 1.1-.27 3.09z" />
                                    <path
                                        d="m29.19 44-3.13-.47L23.28 45l-.84-4.73c2-.35 1.29-.39 3.1.27 1.48-1.24.82-1 2.81-1.31.82 4.6.65 3.66.84 4.77z"
                                        style="fill:#db5669" />
                                    <path
                                        d="m29.05 43.16-.84.15a4 4 0 0 1-4.63-3.24c.6-.11.19-.18 2 .47 1.48-1.24.82-1 2.81-1.31z"
                                        style="fill:#f26674" />
                                    <path class="cls-3"
                                        d="M30.13 36.68c-1.43 1.21-1.19.93-1.35 1.37A6 6 0 0 1 21.07 30c1.45-.25.9 0 2.38-1.24 1.9.69 1.19.61 3.1.27 1.24 1.48.64 1.09 2.54 1.78.34 1.91 0 1.27 1.31 2.82-.66 1.77-.62 1.06-.27 3.05z" />
                                    <path d="M26.32 35.45a2 2 0 1 1-2.17-2.79 2 2 0 0 1 2.17 2.79z" style="fill:#f16f39" />
                                    <path d="M26.32 35.45a2 2 0 0 1-2.63-2.65 2 2 0 0 1 2.63 2.65z" style="fill:#f8834b" />
                                </g>
                            </svg>
                        </h2>
                        <div class="percent_content3">
                            <h5 class="percent-h">High Pass - Your NCLEX and General Licensure</h5>
                            <p class="custom_paragraph percent-p">Students successfully pass
                                the NCLEX exam and other License exams, equipping them for licensure in their
                                chosen healthcare field.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-left align-items-center percent4 animatee">
                        <h2 class="percent font-weight-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                                style="enable-background:new 0 0 256 256" xml:space="preserve" width="50"
                                height="40">
                                <style>
                                    .st2 {
                                        fill: none;
                                        stroke: #6b1d1d;
                                        stroke-width: .5;
                                        stroke-miterlimit: 10
                                    }

                                    .st3 {
                                        fill: #3a312a
                                    }

                                    .st4 {
                                        fill: #87796f
                                    }

                                    .st5 {
                                        fill: #d5de58
                                    }

                                    .st9 {
                                        fill: #8ac6dd
                                    }

                                    .st14 {
                                        fill: #d7e057
                                    }

                                    .st26 {
                                        fill: #f7e3c7
                                    }
                                </style>
                                <g id="Layer_1">
                                    <path
                                        d="m61.616 16.372-24.448-.012C25.755 16.354 16.5 25.604 16.5 37.017v158.966c0 11.408 9.249 20.657 20.657 20.657h119.186c11.408 0 20.657-9.249 20.657-20.657V68.485l-.304-31.604c-.109-11.327-9.318-20.453-20.645-20.459l-81.666-.042-12.769-.008z"
                                        style="fill:#f16c7a" />
                                    <path class="st3"
                                        d="M156.343 218.14H37.157C24.94 218.14 15 208.2 15 195.983V37.018a22.015 22.015 0 0 1 6.493-15.672 22.013 22.013 0 0 1 15.664-6.486h.012l24.448.013a1.5 1.5 0 0 1-.001 3h-.001l-24.448-.013h-.01a19.033 19.033 0 0 0-13.543 5.607A19.035 19.035 0 0 0 18 37.018v158.966c0 10.562 8.594 19.156 19.157 19.156h119.186c10.563 0 19.157-8.594 19.157-19.156v-127.5l-.304-31.589c-.1-10.457-8.689-18.968-19.146-18.974l-81.666-.041a1.5 1.5 0 0 1 .001-3h.001l81.666.042c12.095.006 22.028 9.851 22.145 21.944l.303 31.604v127.514c0 12.216-9.939 22.156-22.157 22.156z" />
                                    <path class="st26"
                                        d="M39.5 127.291v91.495c0 11.526 9.329 20.854 20.854 20.854h118.792c11.525 0 20.854-9.328 20.854-20.854V91.485l-52.135-52.136h-87.51c-11.525 0-20.854 9.329-20.854 20.855v67.087z" />
                                    <path class="st3"
                                        d="M179.145 241.14H60.354C48.028 241.14 38 231.112 38 218.786v-91.495a1.5 1.5 0 0 1 3 0v91.495c0 10.672 8.683 19.354 19.354 19.354h118.791c10.672 0 19.355-8.682 19.355-19.354V92.105l-51.257-51.257H60.354C49.683 40.849 41 49.531 41 60.203v53.871a1.5 1.5 0 0 1-3 0V60.203c0-12.326 10.028-22.354 22.354-22.354h87.51c.397 0 .779.158 1.061.44l52.136 52.136a1.5 1.5 0 0 1 .439 1.061v127.302c0 12.324-10.028 22.352-22.355 22.352z" />
                                    <path class="st3"
                                        d="M170.506 156.206H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3zM170.506 181.093H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3zM170.506 205.979H68.993a1.5 1.5 0 0 1 0-3h101.513a1.5 1.5 0 0 1 0 3z" />
                                    <path class="st26"
                                        d="M200 91.485v.129h-33.668c-10.14 0-18.36-8.22-18.36-18.36V39.457L200 91.485z" />
                                    <path class="st3"
                                        d="M200 93.114h-33.668c-10.951 0-19.86-8.909-19.86-19.86V39.457a1.501 1.501 0 0 1 2.561-1.061l52.028 52.028a1.5 1.5 0 0 1 .439 1.061v.129a1.5 1.5 0 0 1-1.5 1.5zm-50.528-50.036v30.176c0 9.297 7.564 16.86 16.86 16.86h30.176l-47.036-47.036z" />
                                    <path class="st14"
                                        d="M226.278 26.131s3.408 12.659 13.222 13.246c0 0-13.1 4.525-13.321 14.202 0 0-2.579-13.572-12.925-14.059 0 .001 12.05-1.825 13.024-13.389z" />
                                    <path class="st3"
                                        d="M226.178 55.079a1.502 1.502 0 0 1-1.473-1.218c-.023-.124-2.494-12.417-11.521-12.843a1.5 1.5 0 0 1-.155-2.982c.441-.068 10.895-1.816 11.754-12.032a1.5 1.5 0 0 1 1.359-1.367c.74-.052 1.394.399 1.584 1.102.031.116 3.259 11.626 11.863 12.142a1.5 1.5 0 0 1 .402 2.914c-.121.042-12.119 4.311-12.312 12.819a1.5 1.5 0 0 1-1.501 1.465zm-7.74-15.729c3.878 1.969 6.23 5.746 7.586 8.876 2.026-4.021 5.941-6.787 8.949-8.427-4.134-1.842-6.783-5.651-8.334-8.723-1.793 4.361-5.271 6.869-8.201 8.274z" />
                                    <path class="st14"
                                        d="M204.579 43.112s2.411 8.954 9.352 9.369c0 0-9.266 3.201-9.422 10.045 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.291 9.212-9.47z" />
                                    <path class="st3"
                                        d="M204.508 64.026a1.502 1.502 0 0 1-1.473-1.22c-.016-.082-1.703-8.442-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.242 7.941-8.113a1.5 1.5 0 0 1 1.361-1.368 1.517 1.517 0 0 1 1.581 1.102c.022.079 2.229 7.92 7.995 8.266a1.5 1.5 0 0 1 .399 2.915c-.08.028-8.282 2.952-8.412 8.661a1.5 1.5 0 0 1-1.499 1.465zm-4.519-11.527c2.107 1.332 3.523 3.394 4.447 5.279 1.376-2.231 3.515-3.872 5.365-4.972-2.287-1.269-3.885-3.35-4.942-5.225-1.173 2.288-3.014 3.877-4.87 4.918z" />
                                    <path class="st14"
                                        d="M204.579 16.454s2.411 8.954 9.352 9.37c0 0-9.266 3.201-9.422 10.045 0 0-1.824-9.6-9.142-9.944 0 0 8.524-1.292 9.212-9.471z" />
                                    <path class="st3"
                                        d="M204.508 37.369a1.502 1.502 0 0 1-1.473-1.22c-.016-.082-1.703-8.442-7.738-8.726a1.5 1.5 0 0 1-.155-2.982c.296-.047 7.363-1.243 7.941-8.113a1.5 1.5 0 0 1 1.361-1.368 1.517 1.517 0 0 1 1.581 1.102c.022.079 2.229 7.92 7.995 8.265a1.499 1.499 0 0 1 .4 2.915c-.081.028-8.283 2.953-8.413 8.662a1.5 1.5 0 0 1-1.499 1.465zm-4.519-11.527c2.107 1.332 3.522 3.394 4.447 5.279 1.376-2.232 3.515-3.872 5.364-4.973-2.286-1.269-3.884-3.35-4.941-5.224-1.173 2.288-3.014 3.876-4.87 4.918z" />
                                    <path class="st4"
                                        d="m176.109 239.64-6.429-12.924-14.68 1.292 25.643-46.535 21.109 11.632z" />
                                    <path class="st3"
                                        d="M176.109 241.141h-.031a1.498 1.498 0 0 1-1.311-.832l-5.975-12.009-13.66 1.203a1.5 1.5 0 0 1-1.446-2.218l25.643-46.536a1.499 1.499 0 0 1 2.037-.59l21.109 11.632c.726.399.99 1.311.59 2.037l-25.643 46.536c-.263.48-.767.777-1.313.777zm-6.428-15.925a1.5 1.5 0 0 1 1.342.832l5.155 10.361 23.536-42.715-18.481-10.184-23.561 42.757 11.876-1.046a1.97 1.97 0 0 1 .133-.005z" />
                                    <path class="st4"
                                        d="m217.891 239.64 6.429-12.924 14.68 1.292-25.643-46.535-21.109 11.632z" />
                                    <path class="st3"
                                        d="M217.891 241.141c-.546 0-1.05-.297-1.313-.776l-25.643-46.536a1.498 1.498 0 0 1 .59-2.037l21.109-11.632a1.498 1.498 0 0 1 2.037.59l25.643 46.536a1.498 1.498 0 0 1-1.446 2.218l-13.66-1.203-5.975 12.009a1.5 1.5 0 0 1-1.311.832l-.031-.001zm-23.605-47.447 23.536 42.715 5.155-10.361a1.49 1.49 0 0 1 1.475-.826l11.876 1.046-23.561-42.757-18.481 10.183z" />
                                    <path class="st9"
                                        d="m232.342 177.162-.018.015a8.457 8.457 0 0 0-2.863 8.813l.005.019c1.419 5.217-2.354 10.408-7.755 10.667l-.015.001a8.456 8.456 0 0 0-7.504 5.454c-1.915 5.062-8.026 7.047-12.55 4.077l-.001-.001a8.458 8.458 0 0 0-9.281 0l-.001.001c-4.524 2.969-10.635.984-12.55-4.077a8.456 8.456 0 0 0-7.504-5.454l-.015-.001c-5.401-.259-9.174-5.45-7.755-10.667l.005-.019a8.457 8.457 0 0 0-2.863-8.813l-.018-.014c-4.213-3.385-4.214-9.8 0-13.185l.018-.015a8.457 8.457 0 0 0 2.863-8.813l-.005-.019c-1.419-5.217 2.354-10.408 7.755-10.667l.015-.001a8.456 8.456 0 0 0 7.504-5.454c1.915-5.062 8.026-7.047 12.55-4.077l.001.001a8.458 8.458 0 0 0 9.281 0l.001-.001c4.524-2.969 10.635-.984 12.55 4.077a8.456 8.456 0 0 0 7.504 5.454l.015.001c5.401.259 9.174 5.45 7.755 10.667l-.005.019a8.457 8.457 0 0 0 2.863 8.813l.018.015c4.213 3.384 4.213 9.799 0 13.184z" />
                                    <path class="st3"
                                        d="M206.27 209.1a9.915 9.915 0 0 1-5.451-1.638 6.958 6.958 0 0 0-7.636-.001 9.907 9.907 0 0 1-8.541 1.146 9.91 9.91 0 0 1-6.236-5.945 6.955 6.955 0 0 0-6.173-4.488 9.912 9.912 0 0 1-7.591-4.091 9.91 9.91 0 0 1-1.555-8.469 6.962 6.962 0 0 0-2.35-7.269 9.92 9.92 0 0 1-3.739-7.776 9.916 9.916 0 0 1 3.721-7.762 6.964 6.964 0 0 0 2.374-7.265c-.802-2.946-.235-6.033 1.549-8.487s4.545-3.945 7.575-4.09a6.96 6.96 0 0 0 6.189-4.487 9.908 9.908 0 0 1 6.236-5.946c2.887-.939 6-.522 8.54 1.145a6.96 6.96 0 0 0 7.636.001 9.915 9.915 0 0 1 8.541-1.146 9.91 9.91 0 0 1 6.236 5.945 6.951 6.951 0 0 0 6.172 4.487c3.046.146 5.808 1.637 7.592 4.091s2.352 5.541 1.555 8.469a6.964 6.964 0 0 0 2.35 7.27 9.92 9.92 0 0 1 3.739 7.775 9.916 9.916 0 0 1-3.731 7.771l-.019.015a6.952 6.952 0 0 0-2.346 7.241c.802 2.947.235 6.034-1.549 8.488s-4.545 3.945-7.575 4.09a6.96 6.96 0 0 0-6.189 4.487 9.908 9.908 0 0 1-6.236 5.946 9.993 9.993 0 0 1-3.088.493zm-18.543-74.058c-.723 0-1.45.113-2.158.343a6.922 6.922 0 0 0-4.357 4.155 9.949 9.949 0 0 1-8.836 6.421 6.933 6.933 0 0 0-5.308 2.859 6.921 6.921 0 0 0-1.086 5.917 9.96 9.96 0 0 1-3.366 10.394 6.936 6.936 0 0 0-2.618 5.438c0 2.12.947 4.097 2.6 5.423a9.964 9.964 0 0 1 3.39 10.391 6.937 6.937 0 0 0 1.08 5.937 6.925 6.925 0 0 0 5.294 2.858 9.96 9.96 0 0 1 8.851 6.422 6.925 6.925 0 0 0 4.357 4.155 6.935 6.935 0 0 0 5.967-.801 9.955 9.955 0 0 1 10.929-.001 6.918 6.918 0 0 0 5.968.801 6.923 6.923 0 0 0 4.357-4.154 9.95 9.95 0 0 1 8.836-6.421 6.93 6.93 0 0 0 5.308-2.859 6.921 6.921 0 0 0 1.086-5.917 9.962 9.962 0 0 1 3.366-10.395l.018-.016a6.921 6.921 0 0 0 2.6-5.423 6.918 6.918 0 0 0-2.6-5.422 9.966 9.966 0 0 1-3.39-10.392 6.935 6.935 0 0 0-1.081-5.937 6.922 6.922 0 0 0-5.293-2.857 9.96 9.96 0 0 1-8.851-6.422 6.922 6.922 0 0 0-4.357-4.155 6.927 6.927 0 0 0-5.967.8 9.95 9.95 0 0 1-10.929.001 6.939 6.939 0 0 0-3.81-1.143z" />
                                    <path class="st3"
                                        d="M206.27 209.1a9.915 9.915 0 0 1-5.451-1.638 6.958 6.958 0 0 0-7.636-.001 9.907 9.907 0 0 1-8.541 1.146 9.91 9.91 0 0 1-6.236-5.945 6.955 6.955 0 0 0-6.173-4.488 9.912 9.912 0 0 1-7.591-4.091 9.91 9.91 0 0 1-1.555-8.469 6.962 6.962 0 0 0-2.35-7.269 9.92 9.92 0 0 1-3.739-7.776 9.916 9.916 0 0 1 3.721-7.762 6.964 6.964 0 0 0 2.374-7.265c-.802-2.946-.235-6.033 1.549-8.487s4.545-3.945 7.575-4.09a6.96 6.96 0 0 0 6.189-4.487 9.908 9.908 0 0 1 6.236-5.946c2.887-.939 6-.522 8.54 1.145a6.96 6.96 0 0 0 7.636.001 9.915 9.915 0 0 1 8.541-1.146 9.91 9.91 0 0 1 6.236 5.945 6.951 6.951 0 0 0 6.172 4.487c3.046.146 5.808 1.637 7.592 4.091s2.352 5.541 1.555 8.469a6.964 6.964 0 0 0 2.35 7.27 9.92 9.92 0 0 1 3.739 7.775 9.916 9.916 0 0 1-3.731 7.771l-.019.015a6.952 6.952 0 0 0-2.346 7.241c.802 2.947.235 6.034-1.549 8.488s-4.545 3.945-7.575 4.09a6.96 6.96 0 0 0-6.189 4.487 9.908 9.908 0 0 1-6.236 5.946 9.993 9.993 0 0 1-3.088.493zm-18.543-74.058c-.723 0-1.45.113-2.158.343a6.922 6.922 0 0 0-4.357 4.155 9.949 9.949 0 0 1-8.836 6.421 6.933 6.933 0 0 0-5.308 2.859 6.921 6.921 0 0 0-1.086 5.917 9.96 9.96 0 0 1-3.366 10.394 6.936 6.936 0 0 0-2.618 5.438c0 2.12.947 4.097 2.6 5.423a9.964 9.964 0 0 1 3.39 10.391 6.937 6.937 0 0 0 1.08 5.937 6.925 6.925 0 0 0 5.294 2.858 9.96 9.96 0 0 1 8.851 6.422 6.925 6.925 0 0 0 4.357 4.155 6.935 6.935 0 0 0 5.967-.801 9.955 9.955 0 0 1 10.929-.001 6.918 6.918 0 0 0 5.968.801 6.923 6.923 0 0 0 4.357-4.154 9.95 9.95 0 0 1 8.836-6.421 6.93 6.93 0 0 0 5.308-2.859 6.921 6.921 0 0 0 1.086-5.917 9.962 9.962 0 0 1 3.366-10.395l.018-.016a6.921 6.921 0 0 0 2.6-5.423 6.918 6.918 0 0 0-2.6-5.422 9.966 9.966 0 0 1-3.39-10.392 6.935 6.935 0 0 0-1.081-5.937 6.922 6.922 0 0 0-5.293-2.857 9.96 9.96 0 0 1-8.851-6.422 6.922 6.922 0 0 0-4.357-4.155 6.927 6.927 0 0 0-5.967.8 9.95 9.95 0 0 1-10.929.001 6.939 6.939 0 0 0-3.81-1.143z" />
                                    <circle transform="rotate(-80.781 197.003 170.567)" class="st14" cx="197"
                                        cy="170.57" r="25.471" />
                                    <path class="st3"
                                        d="M197 197.541c-14.872 0-26.971-12.1-26.971-26.972 0-14.872 12.099-26.971 26.971-26.971s26.971 12.099 26.971 26.971-12.099 26.972-26.971 26.972zm0-50.942c-13.218 0-23.971 10.753-23.971 23.971s10.753 23.972 23.971 23.972 23.971-10.754 23.971-23.972c0-13.218-10.753-23.971-23.971-23.971z" />
                                    <path
                                        d="m198.305 156.316 3.744 7.587c.212.429.622.727 1.095.796l8.373 1.217c1.193.173 1.67 1.64.806 2.482l-6.059 5.906a1.454 1.454 0 0 0-.418 1.288l1.43 8.339c.204 1.188-1.044 2.095-2.111 1.534l-7.489-3.937a1.454 1.454 0 0 0-1.354 0l-7.489 3.937c-1.067.561-2.315-.345-2.111-1.534l1.43-8.339a1.456 1.456 0 0 0-.419-1.288l-6.059-5.906c-.863-.842-.387-2.308.806-2.482l8.373-1.217a1.455 1.455 0 0 0 1.095-.796l3.745-7.587c.536-1.081 2.078-1.081 2.612 0z"
                                        style="fill:#fae6ca" />
                                    <path class="st3"
                                        d="M205.846 187.134c-.47 0-.941-.113-1.377-.342l-7.49-3.938-7.446 3.938a2.943 2.943 0 0 1-3.112-.227 2.938 2.938 0 0 1-1.175-2.89l1.43-8.339-6.045-5.865a2.938 2.938 0 0 1-.748-3.029 2.937 2.937 0 0 1 2.385-2.011l8.373-1.217 3.711-7.562a2.934 2.934 0 0 1 2.648-1.646h.001c1.133 0 2.148.631 2.649 1.646l3.744 7.587 8.34 1.192a2.937 2.937 0 0 1 2.385 2.011 2.938 2.938 0 0 1-.748 3.029l-6.059 5.905 1.443 8.299a2.939 2.939 0 0 1-1.175 2.89 2.942 2.942 0 0 1-1.734.569zm-8.888-30.157-3.662 7.59a2.95 2.95 0 0 1-2.227 1.616l-8.371 1.217 6.084 5.828a2.958 2.958 0 0 1 .85 2.616l-1.43 8.339 7.423-3.985a2.962 2.962 0 0 1 2.749 0l7.49 3.938-1.496-8.291a2.956 2.956 0 0 1 .848-2.615l6.061-5.906-8.348-1.14a2.954 2.954 0 0 1-2.226-1.617l-3.745-7.59z" />
                                    <path class="st9"
                                        d="M148.193 106.768v21.278a5.409 5.409 0 0 1-5.41 5.41h-47.57a5.41 5.41 0 0 1-5.411-5.41v-21.278l29.195 14.849 29.196-14.849z" />
                                    <path class="st3"
                                        d="M142.782 134.956H95.213c-3.811 0-6.91-3.1-6.91-6.91v-21.277a1.5 1.5 0 0 1 2.18-1.337l28.516 14.503 28.515-14.503a1.502 1.502 0 0 1 2.18 1.337v21.277c-.002 3.81-3.101 6.91-6.912 6.91zm-51.479-25.742v18.832a3.914 3.914 0 0 0 3.91 3.91h47.569a3.914 3.914 0 0 0 3.91-3.91v-18.832l-27.015 13.74a1.5 1.5 0 0 1-1.359 0l-27.015-13.74z" />
                                    <path class="st9" d="M118.998 76.933 75.071 99.275l43.927 22.342 43.926-22.342z" />
                                    <path class="st3"
                                        d="M118.998 123.117c-.233 0-.467-.055-.68-.163l-43.927-22.343a1.498 1.498 0 0 1 0-2.674l43.927-22.342a1.5 1.5 0 0 1 1.359 0l43.926 22.342a1.498 1.498 0 0 1 0 2.674l-43.926 22.343a1.5 1.5 0 0 1-.679.163zM78.38 99.274l40.618 20.66 40.617-20.66-40.617-20.659L78.38 99.274z" />
                                    <path class="st5"
                                        d="M162.924 99.275v27.213c-1.125-1.446-2.646-2.336-4.328-2.336-1.671 0-3.193.889-4.318 2.336v-22.82l8.646-4.393z" />
                                    <path class="st3"
                                        d="M162.924 127.987a1.5 1.5 0 0 1-1.184-.579c-.88-1.133-1.996-1.756-3.144-1.756-1.14 0-2.253.624-3.134 1.756a1.5 1.5 0 0 1-2.684-.921v-22.82a1.5 1.5 0 0 1 .82-1.337l8.645-4.393a1.49 1.49 0 0 1 1.464.059c.445.272.716.757.716 1.278v27.213a1.5 1.5 0 0 1-1.499 1.5zm-4.328-5.335c.985 0 1.94.229 2.828.668v-21.601l-5.645 2.868v18.732a6.312 6.312 0 0 1 2.817-.667z" />
                                    <ellipse class="st5" cx="158.599" cy="132.799" rx="6.33"
                                        ry="8.645" />
                                    <path class="st3"
                                        d="M158.599 142.944c-4.317 0-7.829-4.551-7.829-10.146 0-5.595 3.512-10.146 7.829-10.146s7.83 4.551 7.83 10.146c0 5.596-3.513 10.146-7.83 10.146zm0-17.291c-2.617 0-4.829 3.272-4.829 7.146 0 3.873 2.212 7.146 4.829 7.146 2.618 0 4.83-3.272 4.83-7.146 0-3.873-2.212-7.146-4.83-7.146z" />
                                    <path
                                        d="m175.46 64.832-15.14-15.15-.12-12.79c-.1-10.45-8.69-18.96-19.15-18.97h15c10.46.01 19.05 8.52 19.15 18.97l.26 27.94z"
                                        style="fill:#d34e5c" />
                                    <path
                                        d="M183.5 93.113v39.87c.37-.17.75-.32 1.14-.45 2.89-.94 6-.52 8.54 1.14a6.935 6.935 0 0 0 5.32.96v-41.52h-15z"
                                        style="fill:#decaad" />
                                </g>
                            </svg>
                        </h2>
                        <div class="percent_content4">
                            <h5 class="percent-h">Knowledge & Skills-Ready</h5>
                            <p class="custom_paragraph percent-p">Our Dedicated, Experienced and Skills Proficient Faculty
                                prepare students for career in their chosen healthcare field, showcasing the marketability
                                of our prep-courses.</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 percent-video pr-2">
                    <img src="{{ asset('/public/assets/homesection5.png') }}" class="w-100 h-100">

                </div>

            </div>
        </div>
    </section> --}}

    {{-- <div class="custom_section_color mb-md-5 mb-4">
        <div class="container py-5">
            <div class="row py-5 justify-content-between" style="gap: 20px">
                <div class="col-xl-5">
                    <div class="position-relative d-flex justify-content-start h-100">

                        <div class="d-none d-md-flex flex-column align-items-center justify-content-center"
                            style="position: absolute; top: -3%; right: 10%; z-index: 2; background: orange; height: 150px; width: 150px; border-radius: 50%">
                            <h3 class="text-white mt-2 mb-0" style="font-weight: 700; font-size: 2.3rem;">59k</h3>
                            <span class="text-white">Students</span>
                        </div>

                        <svg class="position-absolute " style="right: 6%; top: -9%; z-index: 1;"
                            xmlns="http://www.w3.org/2000/svg" width="110" height="110" viewBox="0 0 125 125"
                            fill="none">
                            <rect y="57.6584" width="34.9177" height="9.68306" rx="4.84153" fill="currentcolor">
                            </rect>
                            <rect x="90.082" y="57.6584" width="34.9177" height="9.68306" rx="4.84153"
                                fill="currentcolor"></rect>
                            <rect x="21.7295" y="14.8826" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(45 21.7295 14.8826)" fill="currentcolor"></rect>
                            <rect x="85.4268" y="78.5796" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(45 85.4268 78.5796)" fill="currentcolor"></rect>
                            <rect x="67.3418" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(90 67.3418 0)" fill="currentcolor"></rect>
                            <rect x="67.3418" y="90.0812" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(90 67.3418 90.0812)" fill="currentcolor"></rect>
                            <rect x="110.117" y="21.7294" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(135 110.117 21.7294)" fill="currentcolor"></rect>
                            <rect x="46.4199" y="85.4264" width="34.9177" height="9.68306" rx="4.84153"
                                transform="rotate(135 46.4199 85.4264)" fill="currentcolor"></rect>
                        </svg>

                        <img src="{{ asset('public/assets/Instructor2.jpg') }}" height="100%" width="80%"
                            style="border-radius: 10px; object-fit: cover;">

                        <div class="position-absolute bg-white d-none d-md-block"
                            style="bottom: -10%; right: 0px; border-radius: 10px;">
                            <div class="p-3 d-flex" style="gap: 15px">
                                <img src="{{ asset('public/assets/Instructor2.jpg') }}" height="250" width="200"
                                    style="object-fit: cover; border-radius: 8px" alt="">

                                <img src="{{ asset('public/assets/Instructor2.jpg') }}" height="250" width="200"
                                    style="object-fit: cover; border-radius: 8px" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl p-lg-4 pt-2 pb-4 px-3 d-flex align-items-center">
                    <div class="custom-l-padd pl-sm-5 p-2 custom_height_instructor overflow-x-hidden">
                        <h2
                            class="custom_small_heading font-weight-bold text-capitalize d-flex-flex-column justify-content-center mb-3">
                            TUTOR & MENTOR
                        </h2>
                        <p class="mb-4">
                            Don't Just Study for the NCLEX-RN, Excel With It!
                            <br>
                            Elevate your nursing education with Merkaii Xcellence Prep's
                            personalized tutoring and mentorship. Achieve your academic goals, conquer Nursing School
                            Courses and Exams, NCLEX- RN & PN, HESI, TEAS, ATI, other Healthcare Exams and unlock a
                            fulfilling nursing career.
                        </p>

                        <div class="row">
                            <div class="col-12 col-xl-6 mb-4 d-flex flex-column align-items-start gap-2">
                                <div>
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="background-color: rgba(255, 166, 0, 0.212); height: 60px; width: 60px; border-radius: 8px;">
                                        <h4 class="mb-0" style="font-size: 1.6rem; color: orangered; font-weight: 600">
                                            01</h4>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="fw-bold" style="font-size: clamp(1rem, 1.5vw, 1.4rem)">Ignite Your Nursing
                                        Passion</h6>
                                    <p>Our expert tutors go beyond textbooks, to empowering you to reach your full potential
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 mb-4 d-flex flex-column align-items-start gap-2">
                                <div>
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="background-color: rgba(255, 166, 0, 0.212); height: 60px; width: 60px; border-radius: 8px;">
                                        <h4 class="mb-0" style="font-size: 1.6rem; color: orangered; font-weight: 600">
                                            02</h4>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="fw-bold" style="font-size: clamp(1rem, 1.5vw, 1.4rem)">Conquer Test Anxiety
                                    </h6>
                                    <p>Overcome exam fear with our proven strategies. Ace the NCLEX-RN & PN.</p>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 mb-4 d-flex flex-column align-items-start gap-2">
                                <div>
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="background-color: rgba(255, 166, 0, 0.212); height: 60px; width: 60px; border-radius: 8px;">
                                        <h4 class="mb-0" style="font-size: 1.6rem; color: orangered; font-weight: 600">
                                            03</h4>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="fw-bold" style="font-size: clamp(1rem, 1.5vw, 1.4rem)">Lost in Nursing
                                        Prep?</h6>
                                    <p>Find your path with our personalized tutoring. Conquer nursing courses and NCLEX
                                        exams with confidence</p>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 mb-4 d-flex flex-column align-items-start gap-2">
                                <div>
                                    <div class="d-flex align-items-center justify-content-center"
                                        style="background-color: rgba(255, 166, 0, 0.212); height: 60px; width: 60px; border-radius: 8px;">
                                        <h4 class="mb-0" style="font-size: 1.6rem; color: orangered; font-weight: 600">
                                            04</h4>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="fw-bold" style="font-size: clamp(1rem, 1.5vw, 1.4rem)">Struggling in
                                        Nursing School?</h6>
                                    <p>We'll pinpoint your weaknesses, master the content, boost your understanding, and
                                        guide you to success.</p>
                                </div>
                            </div>
                        </div>
                        @if (!auth()->check())
                            <a href="{{ route('instructors') }}#our-tutors-list"
                                class="theme_btn border-purple text-purple font-weight-bold hit btn_responsive mt-3 px-2 px-md-3 py-2 openModal"
                                style="width: fit-content;">
                                Lets Get Started Today
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- section-3b -->
    {{-- <section class="sec-9 py-5"
        style="background: linear-gradient(rgba(35, 7, 77, 0.8), rgba(35, 7, 77, 0.8)), url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1lZGljYWx8ZW58MHx8MHx8fDA%3D'); background-size: cover; background-position: center; color: white;">
        <div class="container for-backcolor-container p-lg-5 py-5">
            <div class="row align-items-center justify-content-left px-xl-5 for-backcolor-row py-5">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center bg-white"
                                style="height: 70px; width: 70px; border-radius: 50px;">
                                <img src="{{ asset('public/assets/remedial/nclex_program.png') }}" width="40"
                                    style="object-fit: fill">
                            </div>
                            <h5 class="for-label1 text-white font-weight-bold mt-3">Tired of NCLEX retakes? </h5>
                            <p class="for-para custom_paragraph pr-2 text-white text-center">Our program is your roadmap
                                and escape
                                route
                                to successful RN career. </p>
                        </div>

                        <div class="col-6 d-flex align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-center bg-white"
                                style="height: 70px; width: 70px; border-radius: 50px;">
                                <img src="{{ asset('public/assets/remedial/care-confidence2.png') }}" width="50"
                                    style="object-fit: fill">
                            </div>
                            <h5 class="for-label1 text-white font-weight-bold mt-3">NCLEX-RN Proving Tough?
                            </h5>
                            <p class="for-para custom_paragraph pr-2 text-white text-center">Our Florida Board-approved
                                program
                                pinpoints
                                your weak spots and builds your strong nursing knowledge.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 text-start">
                    <div>
                        <label class="for-label text-white">WHY JOIN MERKAII XCELLENCE PREP</label>
                        <h2 class="custom_small_heading for-bold text-white font-weight-bold">FLORIDA BOARD OF NURSING
                            REMEDIAL
                            PROGRAM
                        </h2>
                        <h6>Struggling to Pass the NCLEX-RN After 3 Attempts? </h6>
                        <p class="for-para custom_paragraph mb-2 text-white">Taking the NCLEX-RN can be challenging, but it
                            doesn't
                            have to be an insurmountable obstacle. Don't Give Up! Merkaii’s Florida Board of Nursing
                            approved remedial course provides the personalized support and targeted strategies you need to
                            succeed. With our help, you'll be well on your way to achieving your nursing career goals and
                            licensure. Become the Registered Nurse You Were Meant to Be.</p>
                        <a href="{{ url('pre-registration') }}"
                            class="d-flex justify-content-center justify-content-sm-start"><button
                                class="theme_btn font-weight-bold mt-md-4 mt-sm-3 text-center">Register today and unlock
                                <br>your potential!</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- section2 end -->


    @if (!empty($blocks))
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
                {{-- @if ($homeContent->show_testimonial_section == 1)
                    
                @endif

                <section class="sec-10">
                    <div class="container py-5">
                        <div class="row faqs-row px-xl-5">
                            <div class="col-12 col-md-12 mt-4 mt-lg-0 px-md-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <h2 class="section-header font-weight-bold m-0 p-3">ASK US
                                        ANYTHING: FAQs</h2>
                                    <div class="accordion p-sm-3 p-2">
                                        <div class="row align-items-start justify-content-center">
                                            @foreach ($faqs as $faq)
                                                <div class="panel-about col-md-5" style="margin: 1rem">
                                                    <div class="panel-about-wrapper mb-2">
                                                        <input type="checkbox" name="checkbox-1"
                                                            id="cb{{ $loop->iteration }}" />
                                                        <label for="cb{{ $loop->iteration }}" class="panel-about_label"
                                                            style="font-weight: 600"
                                                            onclick="toggleAccordion('{{ $loop->iteration }}')">{{ $faq->question }}</label>
                                                        <div id="collapse_{{ $loop->iteration }}"
                                                            class="panel-about-content accordion-body">
                                                            <p class="" style="text-align: start !important">
                                                                @php
                                                                    $answer = str_replace(
                                                                        '&nbsp;',
                                                                        ' ',
                                                                        htmlspecialchars_decode(
                                                                            strip_tags($faq->answer),
                                                                        ),
                                                                    );
                                                                @endphp
                                                                {{ $answer }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <a href="{{ route('customer-help') }}#tab-7" class="m-md-3 m-2"> <button
                                            class="Faq-btn">More FAQS</button></a>
                                </div>
                            </div>





                            <div class="col-md-3 col-sm-6 col-12 custom_section_color shadow_row custom_paragraph d-none"
                                style="padding: 1rem">
                                <form>
                                    <h2 class="custom_heading_1 font-weight-bold my-2 form_h1">Stay in Touch!</h2>
                                    <div class="form-row mt-3">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <input type="text" class="outside form-control" required />
                                                <span class="floating-label-outside">Your name</span>
                                                <i class="fa fa-user-o input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <input type="text" id="dateInput" class="outside" required />
                                                <span class="floating-label-outside">Email Address</span>
                                                <i class="fa fa-envelope-o input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <input type="text" class="outside" required />
                                                <span class="floating-label-outside">Phone #</span>
                                                <i class="fa fa-mobile input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <input type="text" class="outside" required />
                                                <span class="floating-label-outside">Zip Code</span>
                                                <i class="fa fa-map-marker input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <select class="outside" required>
                                                    <option value="" disabled selected></option>
                                                    <option value="9">Grade 9</option>
                                                    <option value="10">Grade 10</option>
                                                    <option value="11">Grade 11</option>
                                                    <option value="12">Grade 12</option>
                                                </select>
                                                <span class="floating-label-outside">Select Program</span>
                                                <i class="fa fa-chalkboard-user input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12 ">
                                            <div class="position-relative mb-2">
                                                <select class="outside" required>
                                                    <option value="" disabled selected></option>
                                                    <option value="9">Grade 9</option>
                                                    <option value="10">Grade 10</option>
                                                    <option value="11">Grade 11</option>
                                                    <option value="12">Grade 12</option>
                                                </select>
                                                <span class="floating-label-outside">High School Grade Year</span>
                                                <i class="fa fa-graduation-cap input-icon-outside"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="position-relative mb-2">
                                                <input type="text" class="shadow_msg" required />
                                                <span class="floating-label-msg">Message</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="theme_btn small_btn4 py-2 px-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="px-3 px-md-5">
                    <div class="container py-5 d-flex flex-column flex-xl-row gap-4 justify-content-between px-xl-5"
                        style="gap: 20px">
                        @if ($homeContent->home_tile1_title && $homeContent->home_tile1_title != '')
                            <div class="d-flex flex-column flex-md-row align-items-start gap-4 justify-content-between px-5 w-100"
                                style="padding-top: 4rem;  border-radius: 8px; background-color: #e2c7a1">
                                <div class="pb-5 w-100">
                                    <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-5"
                                        style="width: fit-content">
                                        {!! $homeContent->home_tile1_title !!}
                                        <svg class="position-absolute d-none d-md-block" style="right: 5%; bottom: -52px;"
                                            width="150" height="60" viewBox="0 0 150 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4"
                                                fill="transparent" stroke-linecap="round" />
                                        </svg>
                                    </h2>
                                    <p class="mb-2">{!! $homeContent->home_tile1_text !!}</p>
                                    <a href="{{ $homeContent->home_tile1_btnlink }}">
                                        <button class="py-2 px-4 mt-3"
                                            style="background-color: #bf8f75; border-radius: 7px;">
                                            {{ $homeContent->home_tile1_btntext }}
                                        </button>
                                    </a>
                                </div>

                                <img src="{{ asset($homeContent->home_tile1_image) }}" style="padding-top:4rem"
                                    width="50%" height="100%" alt="">
                            </div>
                        @endif
                        @if ($homeContent->home_tile2_title && $homeContent->home_tile2_title != '')
                            <div class="d-flex flex-column flex-md-row align-items-start gap-4 justify-content-between px-5 pt-5 w-100"
                                style="padding-top: 4rem; border-radius: 8px; background-color: rgb(227, 255, 195)">
                                <div class="pb-5 w-100">
                                    <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-5"
                                        style="width: fit-content">
                                        {!! $homeContent->home_tile2_title !!}
                                        <svg class="position-absolute d-none d-md-block" style="right: 5%; bottom: -52px;"
                                            width="150" height="60" viewBox="0 0 150 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4"
                                                fill="transparent" stroke-linecap="round" />
                                        </svg>
                                    </h2>
                                    <p class="mb-2"> {!! $homeContent->home_tile2_text !!} </p>
                                    <a href="{{ $homeContent->home_tile2_btnlink }}">
                                        <button class="py-2 px-4 mt-3"
                                            style="background-color: rgb(123, 229, 102); border-radius: 7px;">
                                            {{ $homeContent->home_tile2_btntext }}
                                        </button>
                                    </a>
                                </div>

                                <img src="{{ asset($homeContent->home_tile2_image) }}" style="padding-top:4rem"
                                    width="50%" height="100%" alt="">
                            </div>
                        @endif
                    </div>
                </section>

                @if (count($latest_blogs) > 0)
                    <section class="sec-11">
                        <div class="container px-lg-5 py-3">
                            <div class="row px-xl-5">
                                <div class="col-md-12">
                                    <div class="pb-lg-5 pb-4 text-center ">
                                        <h2 class="custom_small_heading custom_heading_1 font-weight-bold">
                                            Popular Events and News</h2>
                                        <p class="custom_paragraph font-weight-bold">
                                            Be in the Know: What’s happening at Merkaii Xcellence?
                                        </p>
                                        <p>Connect and Engage for all news and events from the desk of ThaRakii </p>
                                    </div>
                                </div>
                                @if (count($featured_blogs) > 0)
                                    <div class="col-lg-7 px-lg-0 mb-4 mb-lg-0">
                                        <div class="rts-event-section">
                                            <h4 class="rts-section-title mb--25">Blogs and News</h4>
                                            <div class="events-content">
                                                <ul class="list-unstyled rts-counter">
                                                    @foreach ($featured_blogs as $thisblog)
                                                        <li class="single-event">
                                                            <div class="single-event-counter">
                                                                <div class="count-number rt-clip-text"></div>
                                                            </div>
                                                            <a href = "{{ route('blogDetails', [$thisblog->slug]) }}"
                                                                class="single-event-content">
                                                                <h5 class="event-title">{{ $thisblog->title }}</h5>
                                                                <div class="single-event-content-meta">
                                                                    <div class="event-date">
                                                                        <span><i class="fa fa-calendar"></i></span>
                                                                        <span>{{ Carbon\Carbon::parse($thisblog->authored_date)->format('M, d') }}</span>
                                                                    </div>
                                                                    <div class="event-time">
                                                                        <span><i class="fa fa-clock"></i></span>
                                                                        <span>{{ Carbon\Carbon::parse($thisblog->created_at)->format('h:i a') }}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12 @if (count($featured_blogs) > 0) col-lg-5 @else col-lg-12 @endif">
                                    @php
                                        $tags = Modules\Blog\Entities\Blog::where('status', 1)
                                            ->pluck('tags')
                                            ->toArray(); // Assuming 'tags' is the column name

                                        $tagsArray = [];

                                        foreach ($tags as $tagString) {
                                            $tagsArray = array_merge($tagsArray, explode(',', trim($tagString)));
                                        }
                                        $tagsArray = array_unique($tagsArray);
                                    @endphp
                                    <div class="news-events-tabs-section">
                                        <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                                            <h4 class="rts-section-title">Events</h4>
                                            <a href="{{ route('blogs') }}" class="rts-arrow">View All <span><i
                                                        class="fa fa-arrow-right"></i></span></a>
                                        </div>
                                        <div class="news-events-tab">
                                            <div class="events_wrapper">
                                                <div class="eventsIcon"><i id="left"
                                                        class="fa-solid fa-angle-left"></i>
                                                </div>
                                                <ul class="nav nav-tabs pb--30 news-events-navtabs">
                                                    <li class="nav-item active" role="presentation">
                                                        <a class="nav-link blog-tag active" data-tag="latest"
                                                            href="javascript:void(0)">Latest</a>
                                                    </li>
                                                    @foreach ($tagsArray as $tag)
                                                        @if ($tag != '')
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link blog-tag" class="nav-link"
                                                                    data-tag="{{ $tag }}"
                                                                    href="javascript:void(0)">
                                                                    {{ $tag }} </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                <div class="eventsIcon"><i id="right"
                                                        class="fa-solid fa-angle-right"></i></div>
                                            </div>
                                            <div class="tab-content">
                                                <div id="home" class="tab-pane active">
                                                    <ul class="list-unstyled notice-content-box" id="blogs_ul">
                                                        @foreach ($latest_blogs as $latest_blog)
                                                            <li class="single-notice">
                                                                <div class="single-notice-item">
                                                                    <div class="notice-date">
                                                                        {{ Carbon\Carbon::parse($latest_blog->authored_date)->format('d') }}<br>
                                                                        <span>{{ Carbon\Carbon::parse($latest_blog->authored_date)->format('M') }}</span>
                                                                    </div>
                                                                    <div class="notice-content">
                                                                        <p>
                                                                            <a
                                                                                href="{{ route('blogDetails', [$latest_blog->slug]) }}">
                                                                                {{ $latest_blog->title }}
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                @endif --}}


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

                <!-- new section -->
                {{-- <section class="sec-12 pb-3" id="stay-in-touch">
                    <div class="container-fluid mintban px-lg-5 my-lg-5 my-4">
                        <div class="container mintban_row d-flex justify-content-center">
                            <div class="row flowdiv ">
                                <div class="col-lg-4 col-md-6 my-3 my-lg-0 flowdiv-ele d-flex align-items-center">
                                    <form method="POST" action="{{ route('contactMsgSubmit') }}"
                                        class="w-100 custom_section_color shadow_row custom_paragraph custom_form mb-0 py-3 py-md-0 px-sm-4 px-2"
                                        style="height:800px;">
                                        <h2 class="custom_small_heading custom_heading_1 font-weight-bold my-2 form_h1">
                                            Stay in Touch!</h2>
                                        @csrf
                                        <div class="form-row mt-3">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside form-control" required
                                                        name="name" />
                                                    <span class="floating-label-outside">Your name</span>
                                                    <i class="fa fa-user-o input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" id="dateInput" class="outside" required
                                                        name="email" />
                                                    <span class="floating-label-outside">Email Address</span>
                                                    <i class="fa fa-envelope-o input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside" required name="phone" />
                                                    <span class="floating-label-outside">Phone #</span>
                                                    <i class="fa fa-mobile input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="outside" name="zip" required />
                                                    <span class="floating-label-outside">Zip Code</span>
                                                    <i class="fa fa-map-marker input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <select class="outside" name="program" required>
                                                        <option value="" disabled selected></option>
                                                        <optgroup label="Programs">
                                                            @if (count($allPrograms) > 0)
                                                                @foreach ($allPrograms as $thisProgram)
                                                                    <option value="{{ $thisProgram->programtitle }}">
                                                                        {{ $thisProgram->programtitle }}</option>
                                                                @endforeach
                                                            @else
                                                                <option disabled>-- No Program --</option>
                                                            @endif
                                                        </optgroup>
                                                        <optgroup label="Courses">
                                                            @if (count($allCourses) > 0)
                                                                @foreach ($allCourses as $thisCourse)
                                                                    <option value="{{ $thisCourse->title }}">
                                                                        {{ $thisCourse->title }}</option>
                                                                @endforeach
                                                            @else
                                                                <option disabled>-- No Course --</option>
                                                            @endif
                                                        </optgroup>
                                                    </select>
                                                    <span class="floating-label-outside">Course / Program</span>
                                                    <i class="fa fa-chalkboard-user input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12 ">
                                                <div class="position-relative mb-2">
                                                    <select class="outside" required name="year">
                                                        <option value="" disabled selected></option>
                                                        @for ($yr = (int) date('Y', strtotime('-1 year')); $yr >= 2000; $yr--)
                                                            <option value="{{ $yr }}">
                                                                {{ $yr }}</option>
                                                        @endfor
                                                    </select>
                                                    <span class="floating-label-outside">High School Grade Year</span>
                                                    <i class="fa fa-graduation-cap input-icon-outside"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="position-relative mb-2">
                                                    <input type="text" class="shadow_msg" required name="message" />
                                                    <span class="floating-label-msg">Message</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3 text-start">
                                            <small>"By clicking 'Submit', you agree to Meraki International Societe's Terms
                                                of Use and <a
                                                    href="{{ url('customer-help#v-pills-profile-tab-1') }}">Privacy
                                                    Policy</a>. You consent to receive phone calls and SMS messages from
                                                Meraki International Societe to provide updates and information in regards
                                                to your business with Meraki International Societe. Message frequency may
                                                vary. Message & data rates may apply. Reply STOP to opt-out of further
                                                messaging. Reply HELP for more information. See our <a
                                                    href="{{ url('customer-help#v-pills-profile-tab-1') }}">Privacy
                                                    Policy</a>."</small>
                                        </div>
                                        <div class="col-md-12 text-center mb-3 d-flex justify-content-center">
                                            <button type="submit" class="theme_btn small_btn4 py-2 px-4">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-4 col-md-6 flowdiv-ele my-3 my-lg-0">
                                    <div class="eltdf-eh-item eltdf-background-arrow-left changeborder ankar_eltdf p-2"
                                        style="background: var(--footer_background_color); height:800px;">

                                        <div class="eltdf-eh-item-inner d-flex align-items-center justify-content-center"
                                            style="">

                                            <div
                                                class="eltdf-eh-item-content eltdf-eh-custom-5500 py-3 py-md-0 px-sm-4 px-2">
                                                <div class="cta_service_info py-3">
                                                    <h2 class="custom_small_heading mb-4">Expand Your Reach to Global
                                                        Adult Learners</h2>
                                                    <p class="mb-4 text-white"> Fuel your passion for Teaching and join
                                                        Merkaii Xcellence vibrant
                                                        community of
                                                        Educators. Our diverse student body welcomes instructors from all
                                                        walks of life.
                                                        List Your Course & Reach Adult Healthcare Learners Worldwide.
                                                    </p>
                                                    <a href="{{ url('/teach-with-us') }}"
                                                        class="theme_btn small_btn py-2 px-4">Create
                                                        &
                                                        Sell Your Courses</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}

                @include(theme('partials._custom_footer'))
            @elseif($block->id == 16)

            @elseif($block->id == 17)
            @endif
        @endforeach
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>

    <script>
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
    </script>

    {{-- //   scroll our partner --}}
    <script>
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
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

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
    </script>

    {{-- sec-1 --}}
    <script>
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
    </script>

    {{-- sec-2 --}}
    <script>
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
    </script>

    {{-- sec-3 --}}
    <script>
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
    </script>

    {{-- sec-4 --}}

    {{-- sec-5 --}}
    <script>
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
    </script>

    {{-- sec-7 --}}
    <script>
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
    </script>

    {{-- sec-9 --}}
    <script>
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
    </script>

    {{-- sec-12 --}}
    <script>
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
    </script>

    </body>

@endsection
