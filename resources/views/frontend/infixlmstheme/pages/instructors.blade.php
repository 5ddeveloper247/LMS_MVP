@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontend.Instructor') }}
@endsection
{{-- @section('css') --}}
{{-- @endsection --}}
@section('js')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .modal.open {
            display: block;
        }


        .model-close {
            position: relative;
            top: -30px;
            right: 8px;
        }

        .is-invalid {
            border-bottom: 2px solid red !important;
        }

        .custom_section_color {
            background-color: #eee !important;

        }

        .border-purple {
            border: 2px solid #996699 !important;
        }

        .text-purple {
            color: #996699;
        }

        .btn_responsive {
            font-size: 12.5px;
            border-radius: 16px !important;
            border: 2px solid #fff;
        }

        .btn_responsive:hover {
            background-color: var(--system_primery_color) !important;
            border-color: var(--system_primery_color) !important;
            transition: 0.3s ease !important;
            color: #fff;
        }

        .rounded-card {
            border-radius: 25px !important;
        }

        .rounded-card-header {
            border-radius: 25px !important;
        }

        .rounded-card-img {
            border-top-left-radius: 25px !important;
            border-top-right-radius: 25px !important;
        }

        .section-margin-y {
            margin: 60px auto !important;
        }


        label span {
            color: red !important;
            display: inline !important;
        }

        .thumb-height {
            object-fit: none;
        }

        .thumb-height:hover {
            transition: 0.3s;
        }

        .quiz_wizged {
            overflow: hidden;
        }

        .custom-heading {
            font-size: 60px;
        }

        .custom-padding {
            padding-right: 60px;
        }


        .custom-padd {
            padding-left: 60px;
        }

        .custom-padd {
            padding: 30px 0;
        }

        .modal.fade.show {
            background: rgba(3, 3, 3, 0.7) !important;
        }


        .instructor-image {
            height: 310px;
            object-fit: cover;
        }

        .card-header {
            height: 300px;
            overflow: hidden;
        }

        .card-header img {
            height: 100%;
        }

        @media only screen and (min-width: 501px) and (max-width: 767px) {
            .btn_responsive {
                font-size: 13px;
            }
        }

        @media only screen and (min-width:1450px) {
            .btn_responsive {
                font-size: 15px !important;
                border-radius: 20px !important;
            }

            .card-header {
                height: 400px !important;
            }
        }

        @media only screen and (min-width: 1800px) {
            .quiz_wizged {
                height: 700px !important;
            }

            .instructor-image {
                height: 420px !important;
                object-fit: cover;
            }

            .thumb-height {
                height: 400px !important;
                object-fit: cover;
            }

            .btn_responsive {
                font-size: 18px !important;
                border-radius: 20px !important;
            }

            .modal_form {
                max-width: 1500px !important;
            }
        }

        .grid_container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        @media (min-width: 1600px) {
            .grid_container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
                gap: 30px;
            }
        }

        .fw-bold {
            font-weight: 600;
        }


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

        * {
            font-family: 'Rubik' !important
        }

        h1 {
            color: var(--system_primery_color) !important
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

        section .container {
            max-width: 1700px !important
        }

        .left-portion {
            padding-left: 7vw !important
        }

        @media (min-width: 1800px) {
            .left-portion {
                padding-left: 11vw !important
            }
        }

        .instructor-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 65%;
            background: linear-gradient(0deg, #1E3A5F 0%, #285898 100%);
        }

        .slider-wrapper {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .card-container {
            display: flex;
            gap: 60px;
            animation: slideLeft 15s linear infinite alternate-reverse;
            will-change: transform;
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @media (max-width: 767px) {
            .card-container {
                animation-duration: 6s;
            }
        }

        .sub .text-dark {
            color: #fff !important
        }

        .sub strong {
            font-weight: 400 !important
        }

        .prep-card {
            background-image: url('{{ asset('public/assets/i-bottom.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    {{-- @endsection --}}
@section('mainContent')
    <div>
        {{-- <div class="row">
            <div class="col-md-12 px-0">
                @php
                    $banner_title = 'Instructors';
                    $banner_image = 'public/frontend/infixlmstheme/img/images/Teacher Explaining.jpg';
                    $btn_title = auth()->check() ? '' : 'Become an Instructor';
                @endphp
                <x-breadcrumb :banner="$banner_image" :title="$banner_title" :btntitle="$btn_title" :btnclass="'openModal'" />
            </div>
        </div> --}}


        {{-- MainBanner --}}
        <section class="sec-1 show-animate position-relative"
            style="background: linear-gradient(180deg, #2CA6A4 0%, #B7E1E0 100%); height: fit-content;">
            <img src="https://html.rrdevs.net/edcare/assets/img/shapes/hero-shape-11.png" width="300"
                style="position: absolute; left: 0; top: 0;" alt="">

            <div class="container h-100">
                <div
                    class="row bg_text position-relative justify-content-between align-items-center px-3 px-sm-5 h-100 pt-5 pt-md-0">

                    <div class="col-md-6 mb-4 mb-md-0">
                        <h1 class="hero-section-main-heading mb-3 navy-text"
                            style="font-weight: 600; font-size: clamp(1.6rem, 4vw, 5rem) !important; line-height: 100%;">
                            {{-- {{@$homeContent->slider_title}} --}}
                            Meet Your Tutors & Remediation Coaches
                        </h1>

                        <p class="mb-4 hero-section-p">
                            Failed the NCLEX? You're not alone—and you’re not out. Our Florida Board-Approved Remedial
                            Program is built to help you rise again.
                        </p>

                        {{-- <p class="hero-section mb-1">
                            {{@$homeContent->slider_text}}
                        </p> --}}


                        <div class="d-flex align-items-center gap-2 anim-btn border-0">
                            <button style="background-color: var(--system_primery_color); border-radius: 50px;"
                                class="py-2 px-4 text-white">
                                Apply Now
                            </button>

                            <button style="background-color: var(--system_primery_color); border-radius: 50px;"
                                class="py-2 px-4 text-white">
                                Speak to an advisor
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 home_bg overflow-hidden">
                        <div class="d-flex align-items-center justify-content-center position-relative h-100"
                            style="z-index: 99;">
                            {{-- <img class="hero_img" src="{{ asset($homeContent->slider_banner) }}" width="80%" alt=""> --}}
                            <img src="{{ asset('public/assets/tutor_shape.svg') }}" width="80%" alt="">
                            <img src="{{ asset('public/assets/i.png') }}" width="100%"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -40%); max-width: 540px"
                                alt="">
                        </div>
                    </div>
                </div>

                <img style="position: absolute; right: 0; bottom: 0;" class="d-none d-lg-block"
                    src="{{ asset('public/assets/r-lines.png') }}" width="350px" alt="Live Classes"
                    class="benefit-icon-img">
            </div>

            <div class="py-5 px-4 position-relative"
                style="
                    background-image: url('{{ asset('public/assets/i-bottom.png') }}');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                ">
                <div style="gap: 40px; max-width: 800px; margin: 0 auto"
                    class="d-flex align-items-center justify-content-between w-100">
                    <div
                        style="background-color: var(--footer_text_hover_color); border-radius: 100px; height: 130px; width: 130px; position: absolute; top: -20px; right: -20px; ">
                    </div>
                    <div>
                        <h2 style="font-weight: 800; font-size: clamp(35px, 5vw, 50px) !important" class="text-white">
                            150+
                        </h2>
                        <small class="text-white">Total Courses</small>
                    </div>
                    <hr
                        style="rotate: 90deg; rotate: 90deg;
                            background-color: #ffffff70;
                            height: 1px;
                            width: 90px;">
                    <div>
                        <h2 style="font-weight: 800; font-size: clamp(35px, 5vw, 50px) !important" class="text-white">
                            250
                        </h2>
                        <small class="text-white">Total Instructor</small>
                    </div>
                    <hr
                        style="rotate: 90deg; rotate: 90deg;
                            background-color: #ffffff70;
                            height: 1px;
                            width: 90px;">
                    <div>
                        <h2 style="font-weight: 800; font-size: clamp(35px, 5vw, 50px) !important" class="text-white">
                            35K+
                        </h2>
                        <small class="text-white">Total Students</small>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="row align-items-center">
                <div class="col-lg-6 left-portion py-5" data-aos="fade-right">
                    <span style="color: var(--footer_text_hover_color)">Get Started</span>
                    <h2>Why Join Merkaii Xcelellence Prep</h2>
                    <p>You will have the opportunity to: Our teachers, like our students, come from diverse communities
                        fostering a strong community support.</p>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                <h6>Florida BON Approved</h6>
                                <small>Our program meets Florida BON standards, ensuring your coursework, clinical
                                    hours,
                                    and coaching are fully recognized, trusted, and professionally guided.</small>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                <h6>Personalized Coaching Support</h6>
                                <small>Receive tailored one-on-one mentorship with weekly check-ins, personalized study
                                    plans, and constant guidance to help you master NCLEX confidently.</small>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                <h6>Proven Student Success</h6>
                                <small>Thousands of students have passed after multiple failed attempts by using our
                                    structured remediation approach and supportive, experienced nursing mentors.</small>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                <h6>Flexible Learning Options</h6>
                                <small>Choose between online or hybrid formats that adapt to your schedule, making it
                                    easier to balance study, practice, and real-life responsibilities.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('public/assets/join-m.png') }}" style="max-height: 700px; object-fit: cover"
                        width="100%" alt="">
                </div>
            </div>
        </section>

        <section class="instructor-section position-relative">
            <div class="py-5 position-relative" style="z-index: 10">
                <div class="slider-wrapper py-5">
                    <h2 class="mb-5 text-center text-white px-3" data-aos="fade-up">Meet Our Expert Instructors</h2>
                    <div class="card-container align-items-center" data-aos="fade-up">
                        {{-- Original set --}}
                        @for ($i = 0; $i < 10; $i++)
                            <div class="card border-0" style="min-width: 325px; border-radius: 10px">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1544168190-79c17527004f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW5zdHJ1Y3RvcnxlbnwwfHwwfHx8MA%3D%3D"
                                        width="100%" height="320" style="object-fit: cover" alt="">
                                    <span class="p-1 text-white"
                                        style="background-color: var(--footer_text_hover_color); position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); border-radius: 3px">
                                        $40/hr
                                    </span>
                                </div>

                                <div class="p-4" style="background-color: var(--system_primery_color)">
                                    <h4 class="text-center text-white" style="text-transform: uppercase">Nathan Allen</h4>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-white">Total Hours</span>
                                        <span class="text-white">3 hours</span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">Tutor</span>
                                        <span class="text-white">Gen-ED</span>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        {{-- Duplicate set for seamless scroll --}}
                        @for ($i = 0; $i < 10; $i++)
                            <div class="card border-0" style="min-width: 325px; border-radius: 10px">
                                <div class="position-relative">
                                    <img src="https://images.unsplash.com/photo-1544168190-79c17527004f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW5zdHJ1Y3RvcnxlbnwwfHwwfHx8MA%3D%3D"
                                        width="100%" height="320" style="object-fit: cover" alt="">
                                    <span class="p-1 text-white"
                                        style="background-color: var(--footer_text_hover_color); position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); border-radius: 3px">
                                        $40/hr
                                    </span>
                                </div>

                                <div class="p-4" style="background-color: var(--system_primery_color)">
                                    <h4 class="text-center text-white" style="text-transform: uppercase">Nathan Allen</h4>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-white">Total Hours</span>
                                        <span class="text-white">3 hours</span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">Tutor</span>
                                        <span class="text-white">Gen-ED</span>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>
        </section>

        <section class="py-5" style="background-color: #F7F7F7;">
            <div class="container py-4">
                <h2 class="fw-bold text-center" data-aos="fade-up">
                    Interactive Online Tutoring
                </h2>

                <div class="grid_container px-3 px-sm-4" style="margin-top: 4rem">
                    <div data-aos="fade-up" class="d-flex flex-column align-items-center bg-white text-center px-4 pb-5"
                        style="border-radius: 30px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #F7F7F7;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 64 64">
                                <path fill="#FF6B6B"
                                    d="M40.067 20.573c0 4.557-3.699 8.25-8.26 8.25c-4.556 0-8.249-3.694-8.249-8.25s3.693-8.25 8.249-8.25c4.561 0 8.26 3.694 8.26 8.25" />
                                <path fill="#FF6B6B"
                                    d="M31.82.524c-3.818 0-9.151 1.522-13.014 5.385l4.588 8.359a10.7 10.7 0 0 1 8.426-4.09c3.459 0 6.537 1.634 8.498 4.175l4.5-8.636C41.475 2.064 35.48.525 31.82.525zm3.4 6.138h-2.136v2.134h-2.566V6.662h-2.136V4.097h2.136V1.954h2.566v2.143h2.136zM20.966 43.651h2.113l-3.018 10.344h23.581l-3.004-10.344h2.115l3.023 10.344h6.939l-4.736-15.672c-.74-2.587-3.984-7.142-9.582-7.28l-12.87-.011c-5.725.028-9.037 4.672-9.786 7.29l-4.828 15.672h7.037zM.947 57.293h61.73v5.873H.947z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold my-4 text-dark">
                            Diverse Staff to Shape Future
                        </h5>
                        <p class="mb-0">
                            Our teachers, like our students, come from diverse communities fostering a strong community
                            support
                        </p>
                    </div>

                    <div data-aos="fade-up" class="d-flex flex-column align-items-center bg-white text-center px-4 pb-5"
                        style="border-radius: 30px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #F7F7F7;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="#FF6B6B"
                                    d="M6 21v-1H4v1a7 7 0 0 0 7 7h3v-2h-3a5 5 0 0 1-5-5m18-10v1h2v-1a7 7 0 0 0-7-7h-3v2h3a5 5 0 0 1 5 5m-13 0h6a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-3-1a4 4 0 1 0-4-4a4 4 0 0 0 4 4m0-6a2 2 0 1 1-2 2a2 2 0 0 1 2-2m19 21h-6a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-7-5a4 4 0 1 0 4-4a4 4 0 0 0-4 4m6 0a2 2 0 1 1-2-2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                        <h5 class="fw-bold my-4 text-dark">
                            Collaborative and Passionate Team
                        </h5>
                        <p class="mb-0">
                            Experienced and dedicated educators who are passionate about the subjects they teach and enjoy
                            sharing their knowledge
                        </p>
                    </div>

                    <div data-aos="fade-up" class="d-flex flex-column align-items-center bg-white text-center px-4 pb-5"
                        style="border-radius: 30px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #F7F7F7;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                                <path fill="none" stroke="#FF6B6B" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M11 2C6.582 2 3 5.545 3 9.919c0 1.493.417 2.89 1.143 4.081M17 5h-2c-.943 0-1.414 0-1.707.293S13 6.057 13 7v2c0 .943 0 1.414.293 1.707S14.057 11 15 11h2c.943 0 1.414 0 1.707-.293S19 9.943 19 9V7c0-.943 0-1.414-.293-1.707S17.943 5 17 5m-2.5 6v2m3-2v2m-3-10v2m3-2v2M13 6.5h-2m2 3h-2m10-3h-2m2 3h-2M6.383 17.098c-.092-.276-.138-.415-.133-.527a.6.6 0 0 1 .382-.53c.104-.041.25-.041.54-.041h7.656c.291 0 .436 0 .54.04a.6.6 0 0 1 .382.531c.005.112-.041.25-.133.527c-.17.511-.255.767-.386.974a2 2 0 0 1-1.2.869c-.238.059-.506.059-1.043.059H9.012c-.537 0-.806 0-1.043-.06a2 2 0 0 1-1.2-.868c-.131-.207-.216-.463-.386-.974M14 19l-.13.647c-.14.707-.211 1.06-.37 1.34a2 2 0 0 1-1.113.912C12.082 22 11.72 22 11 22s-1.082 0-1.387-.1a2 2 0 0 1-1.113-.913c-.159-.28-.23-.633-.37-1.34L8 19"
                                    color="#FF6B6B" />
                            </svg>
                        </div>

                        <h5 class="fw-bold my-4 text-dark">
                            Forefront of Innovation
                        </h5>
                        <p class="mb-0">
                            We are constantly revising our teaching methods to ensure our students receive the best possible
                            education for success.
                        </p>
                    </div>

                    <div data-aos="fade-up" class="d-flex flex-column align-items-center bg-white text-center px-4 pb-5"
                        style="border-radius: 30px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #F7F7F7;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 16 16">
                                <path fill="#FF6B6B"
                                    d="M8 12a1.5 1.5 0 0 1-1.474-1.22a5 5 0 0 1-2.474-1.712a5 5 0 1 1 8.924-3.567c.027.275-.2.499-.476.499s-.497-.225-.53-.499a4 4 0 1 0-5.285 4.278A1.5 1.5 0 1 1 8 12m-4-1.5v-.027a6 6 0 0 1-.748-.805A1.5 1.5 0 0 0 3 10.5v.5c0 1.971 1.86 4 5 4s5-2.029 5-4v-.5A1.5 1.5 0 0 0 11.5 9H10c.219.29.375.63.45 1h1.05a.5.5 0 0 1 .5.5v.5c0 1.438-1.432 3-4 3s-4-1.562-4-3zM8 8a2.5 2.5 0 0 0-1.572.556A2.99 2.99 0 0 1 5 6a3 3 0 1 1 4.572 2.556A2.5 2.5 0 0 0 8 8M6 6a2 2 0 1 0 4 0a2 2 0 0 0-4 0" />
                            </svg>
                        </div>

                        <h5 class="fw-bold my-4 text-dark">
                            Continuous Support in a Rewarding Environment
                        </h5>
                        <p class="mb-0">
                            We believe that happy teachers are the foundation for successful students – we provide them with
                            support and resources.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container py-5">
                <div class="row px-3 px-sm-4 py-5">
                    @if (getRawHomeContents($home_content, 'instructor_tile1_title', 'en') != '')
                        <div class="col-lg-6" data-aos="fade-right" style="min-height: 18rem">
                            <div class="card h-100 d-flex flex-column flex-md-row align-items-center justify-content-between prep-card position-relative"
                                style="border-radius: 18px;">
                                <div class="d-flex flex-column p-5" style="gap: 15px; min-width: 60%">
                                    <p class="text-white sub">{!! getRawHomeContents($home_content, 'instructor_tile1_title', 'en') !!}</p>

                                    <p style="font-weight: 600" class="text-white">{!! getRawHomeContents($home_content, 'instructor_tile1_text', 'en') !!}</p>

                                    <a href="{{ getRawHomeContents($home_content, 'instructor_tile1_btnlink', 'en') }}"
                                        class="text-white d-flex align-items-center justify-space-between"
                                        style="background-color: #2FC7A1; border-radius: 50px; padding-left: 18px; padding-right: 0; width: fit-content; gap: 10px">
                                        {{ getRawHomeContents($home_content, 'instructor_tile1_btntext', 'en') }}
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="42" height="42" rx="21" fill="#35D7AE" />
                                            <path d="M23.5 14.2402L28.5 20.2402L23.5 26.2402" stroke="white"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.5 20.2402H28.5" stroke="white" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>

                                <div>
                                    <img src="{{ asset(getRawHomeContents($home_content, 'instructor_tile1_image', 'en')) }}"
                                        width="100%" height="100%" style="object-fit: cover" alt="">
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (getRawHomeContents($home_content, 'instructor_tile2_title', 'en') != '')
                        <div class="col-lg-6" data-aos="fade-left" style="min-height: 18rem">
                            <div class="card h-100 d-flex flex-column flex-md-row align-items-center justify-content-between position-relative"
                                style="border-radius: 18px; background-color: #2FC7A1">
                                <div class="d-flex flex-column p-5" style="gap: 15px; min-width: 60%">
                                    <p class="text-white sub">{!! getRawHomeContents($home_content, 'instructor_tile2_title', 'en') !!}</p>

                                    <p style="font-weight: 600" class="text-white">{!! getRawHomeContents($home_content, 'instructor_tile2_text', 'en') !!}</p>

                                    <a href="{{ getRawHomeContents($home_content, 'instructor_tile2_btnlink', 'en') }}"
                                        class="text-white d-flex align-items-center justify-space-between"
                                        style="background-color: #17254E; border-radius: 50px; padding-left: 18px; padding-right: 0; width: fit-content; gap: 10px">
                                        {{ getRawHomeContents($home_content, 'instructor_tile2_btntext', 'en') }}
                                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="42" height="42" rx="21" fill="#35D7AE" />
                                            <path d="M23.5 14.2402L28.5 20.2402L23.5 26.2402" stroke="white"
                                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.5 20.2402H28.5" stroke="white" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>

                                <div>
                                    <img src="{{ asset(getRawHomeContents($home_content, 'instructor_tile2_image', 'en')) }}"
                                        width="100%" height="100%" alt="">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section style="background-color: #FAF8FB">
            <div class="container py-5">
                <div class="row py-5 px-sm-5 align-items-center justify-content-between">
                    <div class="col-lg-7" data-aos="fade-right">
                        <span style="color: var(--footer_text_hover_color)">Get Started</span>
                        <h2>Who we are Looking for ?</h2>
                        <p class="mb-4">If you are a highly motivated and experienced educator who is passionate about
                            making a
                            difference in the future of healthcare education, we encourage you to apply.Merkaii Xcel Prep
                            offers a competitive salary and benefits package, as well as the opportunity to work in a
                            rewarding student and staff-centered environment.</p>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                    <h6>Passionate Educators</h6>
                                    <small>We are seeking educators who are passionate about their field and dedicated to
                                        helping students succeed.</small>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                    <h6>Strong Communication Skills</h6>
                                    <small>The ability to communicate complex medical concepts clearly and concisely is
                                        essential.</small>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                    <h6>Clinical Expertise</h6>
                                    <small>We value educators with a strong foundation in clinical healthcare skills</small>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="h-100 p-3" style="box-shadow: 0px 4px 4px 0px #0000001A; border-radius: 6px">
                                    <h6>Commitment to Collaboration</h6>
                                    <small>We are looking for team players who are excited to collaborate with colleagues to
                                        create a dynamic learning environment</small>
                                </div>
                            </div>
                        </div>

                        <button class="theme_btn py-2 px-4">
                            Become an Instructor
                        </button>
                    </div>

                    <div class="col-lg-5 d-flex justify-content-center" data-aos="fade-left">
                        <img src="{{ asset('public/assets/looking-right.png') }}"
                            style="max-height: 700px; max-width: 90%; object-fit: cover" width="100%" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- profile slidder -->


        <div class="container pt-md-5 pb-md-5 py-3" id="our-tutors-list">
            <div class="row mx-xl-5">
                <div class="col-md-12">
                    <h2 class="custom_small_heading font-weight-bold pb-3 text-center text-capitalize"
                        id="instructors-custom-heading">
                        Merkaii Xcellence Tutors use Elsevier Products for Tutoring</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <p class="text-center pb-md-5 pb-3"> Elevate your studies and master Nursing Concepts with MPX
                                Tutors offering expert guidance using industry-leading resources like Saunders| Shadow
                                Health| HESI for comprehensive exam preparation and unparallel success.</p>
                        </div>
                    </div>
                </div>
                @forelse ($instructors as $instructor)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4 d-flex justify-content-center">
                        <div class="quiz_wizged card rounded-card shadow">
                            <div class="card-header rounded-card-header p-0" style="">
                                <a
                                    href="{{ route('tutorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}">
                                    <img src="{{ getInstructorImage($instructor->image) }}" alt="Avatar"
                                        class="img-fluid w-100 rounded-card-img instructor_image"
                                        style="object-fit:cover">
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-8 col-md-10 px-2 pt-3">
                                    <a
                                        href="{{ route('tutorDetails', [$instructor->id, Str::slug($instructor->name, '-')]) }}">
                                        <h5 class="font-weight-bold">{{ $instructor->name }}</h5>
                                    </a>
                                </div>
                                <div class="col-4 col-md-2 px-2">
                                    <h5 class="font-weight-bold float-right pt-3">{{ $instructor->total_tutor_rating }}
                                    </h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-5 col-sm-5 col-6 px-2">
                                    <span>{{ __('frontend.Course Rating') }}</span>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-7 col-sm-7 col-6 px-2">
                                    <span class="float-right">
                                        @php
                                            $main_stars = $instructor->total_tutor_rating;
                                            $stars = intval($instructor->total_tutor_rating);
                                        @endphp
                                        @for ($i = 0; $i < $stars; $i++)
                                            <i class="fas fa-star text-warning fa-sm"></i>
                                        @endfor
                                        @if ($main_stars > $stars)
                                            <i class="fas fa-star-half fa-sm"></i>
                                        @endif
                                        @if ($main_stars == 0)
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="far fa-star fa-sm"></i>
                                            @endfor
                                        @endif
                                    </span>
                                </div>
                                <div class="col-7 px-2">
                                    <span>Total Hours:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">{{ $instructor->total_hours }} Hrs.</span>
                                </div>
                                <div class="col-7 px-2">
                                    <span>Tutor:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">
                                        {{ $instructor->tutor_type == 1 ? 'Nursing' : 'Gen-Ed' }}
                                    </span>
                                </div>
                                <div class="col-7 px-2 ">
                                    <span>Price:</span>
                                </div>
                                <div class="col-5 px-2">
                                    <span class="float-right">${{ $instructor->tutor_price }}/hr.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center mx-auto">No Tutor Found</p>
                @endforelse
                <div class="col-md-12 {{ count($instructors) ? 'd-block' : 'd-none' }}">
                    {{ $instructors->links() }}
                </div>
            </div>
        </div>

        <div class="modal fade instructor-2" id="becomeAnInstructor" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close-modal theme_btn small_btn4 px-3 py-2 closeModal"
                            aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                            id="Instructor_reqister">
                            @csrf
                            <input name="type" value="Instructor" type="hidden">
                            <input name="role_id" value="2" type="hidden">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Become an Instructor
                                        </h2>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">What position are you
                                            applying?<span>*</span></label>
                                        <select name="instructor_position_id"
                                            class="form-select text_small form-control @if ($errors->first('instructor_position_id')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            @foreach ($postions as $postion)
                                                <option value="{{ $postion->id }}"
                                                    {{ (string) $postion->id == old('instructor_position_id') ? 'selected' : '' }}>
                                                    {{ $postion->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">How did you hear about us
                                            ?<span>*</span></label>
                                        <select name="instructor_hear_id"
                                            class="form-select text_small form-control @if ($errors->first('instructor_hear_id')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            @foreach ($hears as $hear)
                                                <option value="{{ $hear->id }}"
                                                    {{ (string) $hear->id == old('instructor_hear_id') ? 'selected' : '' }}>
                                                    {{ $hear->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form_content">
                                        <label class="mb-0 mt-2 form_label">Start Date</label>
                                        <input name="start_date" id="start_date"
                                            class="input--style-1 js-datepicker text_small form-control @if ($errors->first('start_date')) is-invalid @endif"
                                            type="date" placeholder="" name="birthday"
                                            value="{{ old('start_date') }}">
                                    </div>

                                    <!-- personal information section  -->
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Personal Information
                                        </h2>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">First Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('first_name')) is-invalid @endif"
                                            type="text" placeholder="" name="first_name"
                                            value="{{ old('first_name') }}" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Middle Name</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('middle_name')) is-invalid @endif"
                                            type="text" placeholder="" name="middle_name"
                                            value="{{ old('middle_name') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Last Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('last_name')) is-invalid @endif"
                                            type="text" placeholder="" name="last_name"
                                            value="{{ old('last_name') }}" required>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Gender<span>*</span></label>
                                        <select name="gender"
                                            class="form-select text_small form-control @if ($errors->first('gender')) is-invalid @endif"
                                            aria-label="Default select example" required>
                                            <option value="" selected>--SELECT--</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                Male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Date of Birth<span>*</span></label>
                                        <input id="datepicker"
                                            class="text_small form-control @if ($errors->first('dob')) is-invalid @endif"
                                            type="date" placeholder="" name="dob" value="{{ old('dob') }}"
                                            required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Email<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('email')) is-invalid @endif"
                                            type="email" placeholder="" name="email" value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Phone (Home)</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('phone')) is-invalid @endif"
                                            maxlength="14" type="text" placeholder="" name="phone"
                                            value="{{ old('phone') }}"
                                            onKeyPress="if(this.value.length==14) return false;">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Cell<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('cell')) is-invalid @endif"
                                            maxlength="14" type="text" placeholder="" name="cell"
                                            value="{{ old('cell') }}"
                                            onKeyPress="if(this.value.length==14) return false;" required>
                                    </div>
                                    <div class="col-lg-3 col-sm-4 form_content">
                                        <label class="mb-0 mt-2 form_label">Work</label>
                                        <textarea name="work" class="text_small form-control @if ($errors->first('work')) is-invalid @endif">{{ old('work') }}</textarea>
                                    </div>
                                    <div class="col-lg-9 col-sm-8 form_content">
                                        <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                        <textarea name="address" class="text_small form-control @if ($errors->first('address')) is-invalid @endif"
                                            required>{{ old('address') }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            School Information
                                        </h2>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">High School/GED</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('high_school')) is-invalid @endif"
                                            type="text" placeholder="" name="high_school"
                                            value="{{ old('high_school') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('school_years_attended')) is-invalid @endif"
                                            type="date" placeholder="" name="school_years_attended"
                                            value="{{ old('school_years_attended') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates</label>
                                        <select name="school_year_graduate"
                                            class="form-select text_small form-control @if ($errors->first('school_year_graduate')) is-invalid @endif"
                                            aria-label="Default select example">
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('school_year_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('school_year_graduate') ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Degree/Major</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('school_degree')) is-invalid @endif"
                                            type="text" placeholder="" name="school_degree"
                                            value="{{ old('school_degree') }}">
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">College</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('college')) is-invalid @endif"
                                            type="text" placeholder="" name="college" value="{{ old('college') }}">
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('college_email')) is-invalid @endif"
                                            type="date" placeholder="" name="college_email"
                                            value="{{ old('college_email') }}">
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates</label>
                                        <select name="college_graduate"
                                            class="form-select text_small form-control @if ($errors->first('college_graduate')) is-invalid @endif"
                                            aria-label="Default select example" value="{{ old('f_name') }}">
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('college_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('college_graduate') ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Trade or Correspondence School</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_school')) is-invalid @endif"
                                            type="text" placeholder="" name="trade_school"
                                            value="{{ old('trade_school') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Degree/Major</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_degree')) is-invalid @endif"
                                            type="text" placeholder="" name="trade_degree"
                                            value="{{ old('trade_degree') }}">
                                    </div>
                                    <div class="col-lg-3 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Year Attended</label>
                                        <input
                                            class="text_small form-control @if ($errors->first('trade_years_attended')) is-invalid @endif"
                                            type="date" placeholder="" name="trade_years_attended"
                                            value="{{ old('trade_years_attended') }}">
                                    </div>

                                    <div class="col-lg-3 form_content">
                                        <label class="mb-0 mt-2 form_label">Graduates</label>
                                        <select name="trade_year_graduate"
                                            class="form-select text_small form-control @if ($errors->first('trade_year_graduate')) is-invalid @endif"
                                            aria-label="Default select example">
                                            <option value="" selected>--SELECT--</option>
                                            <option value="yes"
                                                {{ 'yes' == old('trade_year_graduate') ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                            <option value="no"
                                                {{ 'no' == old('trade_year_graduate') ? 'selected' : '' }}>
                                                No
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Teaching Experience section  -->
                                    <div class="col-md-12">
                                        <h2 class="custom_small_heading my-3 text-center">
                                            Teaching Experience
                                        </h2>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Current Position<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('current_position')) is-invalid @endif"
                                            type="text" placeholder="" name="current_position"
                                            value="{{ old('current_position') }}" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2">Employer's Phone Number <span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('Teach_phone')) is-invalid @endif"
                                            type="text" placeholder="" name="Teach_phone" maxlength="14"
                                            value="{{ old('Teach_phone') }}"
                                            onKeyPress="if(this.value.length==14) return false;" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Employer Name <span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('employee_name')) is-invalid @endif"
                                            type="text" placeholder="" name="employee_name"
                                            value="{{ old('employee_name') }}" required>
                                    </div>
                                    <div class="col-lg-5 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Position Start Date<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('date_employer_start')) is-invalid @endif"
                                            type="date" placeholder="" name="date_employer_start"
                                            value="{{ old('date_employer_start') }}" required>
                                    </div>
                                    <div class="col-lg-5 col-sm-7 form_content">
                                        <div id="end_date_div"
                                            style="{{ old('currently_employed') ? 'display:none;' : '' }}">
                                            <label class="mb-0 mt-2 form_label">Position End Date<span>*</span></label>
                                            <input
                                                class="text_small form-control @if ($errors->first('date_employer_end')) is-invalid @endif"
                                                type="date" placeholder="" name="date_employer_end"
                                                value="{{ old('date_employer_end') }}" required>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-5 d-flex justify-content-center align-items-center mt-3 gap-2">
                                        <input class="@if ($errors->first('currently_employed')) is-invalid @endif"
                                            type="checkbox" id="postion" name="currently_employed"
                                            {{ old('currently_employed') ? 'checked' : '' }}>
                                        <label class="mb-0" for="postion">Currently Employed?</label><br>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Supervisor Name<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('supervisor_name')) is-invalid @endif"
                                            type="text" placeholder="" name="supervisor_name"
                                            value="{{ old('supervisor_name') }}" required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Upload Resume<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('upload_resume')) is-invalid @endif"
                                            type="file" placeholder="" name="upload_resume" accept=".doc,.docx,.pdf"
                                            required>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 form_content">
                                        <label class="mb-0 mt-2 form_label">Upload Coverletter<span>*</span></label>
                                        <input
                                            class="text_small form-control @if ($errors->first('cover_letter')) is-invalid @endif"
                                            type="file" placeholder="" name="cover_letter" accept=".doc,.docx,.pdf"
                                            required>
                                    </div>
                                    <div class="col-md-12 form_content">
                                        <label class="mb-0 mt-2 form_label">Address<span>*</span></label>
                                        <textarea name="employer_address"
                                            class="text_small form-control @if ($errors->first('employer_address')) is-invalid @endif" required>{{ old('employer_address') }}</textarea>
                                    </div>
                                    <div class="col-md-auto ml-auto mt-3">
                                        <button type="button"
                                            class="btn btn-secondary close-modal closeModal">Close</button>
                                        <button type="submit" class="btn small_btn4 theme_btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include(theme('partials._custom_footer'))
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> --}}
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $('.custom_slick_slider_03').slick({
            "slidesToShow": 4,
            "pauseOnHover": true,
            "autoplay": true,
            "infinite": true,
            "dots": false,
            "arrows": false,
            "responsive": [{
                    "breakpoint": 1400,
                    "settings": {
                        "slidesToShow": 4
                    }
                },
                {
                    "breakpoint": 1200,
                    "settings": {
                        "slidesToShow": 3
                    }
                },
                {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 2
                    }
                },
                {
                    "breakpoint": 576,
                    "settings": {
                        "slidesToShow": 1
                    }
                }
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("datepicker").setAttribute('max', today);
            document.getElementById("start_date").setAttribute('min', today);

            $('#postion').change(function() {
                if ($(this).is(':checked')) {
                    $('#end_date_div').hide();
                    $('#end_date_div input').removeAttr('required');
                } else {
                    $('#end_date_div').show();
                    $('#end_date_div input').attr('required', 'required');
                }
            });

            // $("#datepicker").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     maxDate:'0'
            // });
            // $("#start_date").datepicker({
            //     dateFormat: 'dd/mm/yy',
            //     minDate:'0'
            // });
        });
        $(".hit").click(function() {
            $('#becomeAnInstructor').modal('show');
            // $('.popup').removeClass('d-none');

        });
        $('.close-modal').click(modalFormControl);

        if (window.location.hash) {
            let hash = window.location.hash;
            if ($(hash).hasClass('modal')) {
                $(hash).modal('show');

            }
        }


        function modalFormControl() {
            var form = $('#Instructor_reqister');
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.is-invalid, .is-focused, .is-filled').removeClass(["is-invalid", "is-focused",
                "is-filled"
            ]);
            form.find('#category_id').val(null).trigger('change');
            form.find('.invalid-feedback').children().text('');
            form.trigger("reset");


            $('.modal-backdrop').removeClass('show');
            $('.modal-backdrop').removeClass('fade');
            $('.modal-backdrop').removeClass('modal-backdrop');
            form.parents('.modal').removeClass('show');
            form.parents('.modal').removeClass('fade');
            form.parents('.modal').attr('style', '');
            form.parents('.modal').modal('hide');

        }
    </script>
    @if (count($errors))
        <script>
            $('#becomeAnInstructor').modal('show');
        </script>
    @endif

    <!-- Optional JavaScript; select of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        // Add event listener to elements with class 'openModal'
        var openModalButtons = document.getElementsByClassName('openModal');
        for (var i = 0; i < openModalButtons.length; i++) {
            openModalButtons[i].addEventListener('click', function() {
                var instructors = document.getElementsByClassName('instructor-2');
                for (var j = 0; j < instructors.length; j++) {
                    instructors[j].style.display = 'block';
                }
                document.body.classList.add('modal-open');
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
                document.getElementById('modalContent').addEventListener('scroll', function(event) {
                    event.stopPropagation();
                });
            });
        }

        // Add event listener to elements with class 'closeModal'
        var closeModalButtons = document.getElementsByClassName('closeModal');
        for (var k = 0; k < closeModalButtons.length; k++) {
            closeModalButtons[k].addEventListener('click', function() {
                var instructors = document.getElementsByClassName('instructor-2');
                for (var l = 0; l < instructors.length; l++) {
                    instructors[l].style.display = 'none';
                }
                document.body.classList.remove('modal-open');
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            });
        }
    </script>

    {{-- <script>
        $(".hit").click(function() {
            $('.popup').removeClass('d-none');

        });
        $(".model-close").click(function() {

            $('.popup').addClass('d-none');

        })
    </script> --}}
    <!-- Optional JavaScript; select of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
@endsection
