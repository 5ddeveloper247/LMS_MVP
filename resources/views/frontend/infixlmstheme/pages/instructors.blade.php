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

        /* .form_label {
                                                        width: -webkit-fill-available;
                                                        text-overflow: ellipsis;
                                                        overflow: hidden;
                                                        white-space: nowrap;
                                                    } */

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

        /* .right-divv {
                                                    max-height: 56vh !important;
                                                    overflow-y: auto;
                                                    scrollbar-width: none;

                                                } */

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

        @media (min-width: 1800px) {
            .grid_container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
                gap: 30px;
            }
        }

        .fw-bold {
            font-weight: 600;
        }
    </style>
    {{-- @endsection --}}
@section('mainContent')
    <div>
        <div class="row">
            <div class="col-md-12 px-0">
                {{-- <div class="breadcrumb_area position-relative">
                        <div class="w-100 h-100 position-absolute bottom-0 left-0">
                            <img alt="Banner Image" class="w-100 h-100 img-cover"
                                src="{{ asset('public/frontend/infixlmstheme/img/images/Teacher Explaining.jpg') }}">
                            </div>
                            <div class="col-lg-9 offset-1">
                                <div class="breadcam_wrap">&nbsp;
                                    <h1 class="text-white custom-heading">Instructors</h1>
                                    @if (!auth()->check())
                                    <button
                                        class="btn_responsive font-weight-bold hit ml-1 bg-transparent px-2 px-md-3 py-2 text-white openModal">
                                        Become
                                        an
                                        Instructor
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                @php
                    $banner_title = 'Instructors';
                    $banner_image = 'public/frontend/infixlmstheme/img/images/Teacher Explaining.jpg';
                    $btn_title = auth()->check() ? '' : 'Become an Instructor';
                @endphp
                <x-breadcrumb :banner="$banner_image" :title="$banner_title" :btntitle="$btn_title" :btnclass="'openModal'" />
            </div>
        </div>


        <!-- Main heading Section  -->
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-6 col-12 d-flex align-items-center mb-5 mb-md-0 pe-md-5"
                    style="text-align: end; padding: 0 3rem 0 0;" data-aos="fade-left" data-aos-delay="500">
                    <div class="pt-3 pt-md-0">
                        <div class="text-end"> {{-- previous class for responsive custom_height_2 --}}
                            <h5 class="mb-3">Get Started</h5>
                            <div class="d-flex justify-content-end">
                                <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-4"
                                    style="width: fit-content">
                                    <span class="text-dark">Why Join</span> <br> Merkaii Xcellence Prep?
                                    <svg class="position-absolute d-none d-md-block" style="left: 0%; bottom: -52px;"
                                        width="150" height="60" viewBox="0 0 150 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4" fill="transparent"
                                            stroke-linecap="round" />
                                    </svg>
                                </h2>
                            </div>
                            <p>
                                You will have the opportunity to:
                                Our teachers, like our students, come from diverse communities fostering a strong community
                                support.
                            </p>
                            {{-- <p class="text-end shadow-p right-divv mb-lg-4 mb-2">
                                    <span class="font-weight-bold">As a faculty member at Merkaii Xcellence Prep, you will have the opportunity to:</span>
                                    <br>
                                    <span class="font-weight-bold">Shape the Future of Healthcare:</span> You will play a vital role in educating the next generation of medical professionals who will define the future of healthcare.
                                    <br>
                                    <span class="font-weight-bold">Work with a Collaborative and Passionate Team:</span> Our faculty is comprised of experienced and dedicated educators who are passionate about sharing their knowledge and expertise.
                                    <br>
                                    <span class="font-weight-bold">Be at the Forefront of Medical Education:</span> We are constantly innovating and developing new teaching methods to ensure our students receive the best possible education.
                                    <br>
                                    <span class="font-weight-bold">Enjoy a Supportive and Rewarding Work Environment:</span> We value our faculty and provide them with the support and resources they need to succeed.
                                    <br>
                                    <span class="font-weight-bold">Teacher Well-Being:</span> We believe that happy teachers are the foundation of successful students. By taking exceptional care of our educators, we ensure they can focus wholeheartedly on their goals, bringing passion and dedication to every lesson.
                                </p> --}}
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12" data-aos="fade-right">
                    {{-- <div class="custom_height_1">
                        <img src="{{ asset('public/assets/Instructor 1.jpg') }}" height="250" class="w-100">
                    </div> --}}

                    <div class="row h-100">
                        <div class="col-6">
                            <img src="https://merkaiixcelprep.com/public/uploads/images/footerimg/fantasticopportunityimg.jpeg" height="550" width="100%" style="border-radius: 8px; object-fit: cover; margin-top: -3rem;">
                        </div>
    
                        <div class="col-6">
                            <img src="https://merkaiixcelprep.com/public/uploads/images/footerimg/astutorimg.jpeg" height="550" width="100%" style="border-radius: 8px; object-fit: cover;">
                        </div>
    
                        <div class="position-absolute" style="right: 0; top: -20%; z-index: -1;">
                            <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-1.png" alt="">
                        </div>
    
                        <div class="position-absolute" style="left: 0; bottom: -10%; z-index: -1;">
                            <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5" style="background-color: #fffaf4;">
            <div class="container py-4">
                <div class="d-flex justify-content-center">
                    <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-4"
                        style="width: fit-content">
                        <span class="text-dark">Interactive Online</span> Tutoring
                        <svg class="position-absolute d-none d-md-block" style="right: 0%; bottom: -52px;" width="150"
                            height="60" viewBox="0 0 150 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4" fill="transparent"
                                stroke-linecap="round" />
                        </svg>
                    </h2>
                </div>

                <div class="grid_container mt-4">
                    <div class="d-flex flex-column align-items-center bg-white text-center px-3 pb-5"
                        style="border-radius: 8px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #fff9f1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 64 64">
                                <path fill="currentColor"
                                    d="M40.067 20.573c0 4.557-3.699 8.25-8.26 8.25c-4.556 0-8.249-3.694-8.249-8.25s3.693-8.25 8.249-8.25c4.561 0 8.26 3.694 8.26 8.25" />
                                <path fill="currentColor"
                                    d="M31.82.524c-3.818 0-9.151 1.522-13.014 5.385l4.588 8.359a10.7 10.7 0 0 1 8.426-4.09c3.459 0 6.537 1.634 8.498 4.175l4.5-8.636C41.475 2.064 35.48.525 31.82.525zm3.4 6.138h-2.136v2.134h-2.566V6.662h-2.136V4.097h2.136V1.954h2.566v2.143h2.136zM20.966 43.651h2.113l-3.018 10.344h23.581l-3.004-10.344h2.115l3.023 10.344h6.939l-4.736-15.672c-.74-2.587-3.984-7.142-9.582-7.28l-12.87-.011c-5.725.028-9.037 4.672-9.786 7.29l-4.828 15.672h7.037zM.947 57.293h61.73v5.873H.947z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">
                            Diverse Staff to Shape Future
                        </h5>
                        <p class="mb-0">
                            Our teachers, like our students, come from diverse communities fostering a strong community
                            support
                        </p>
                    </div>

                    <div class="d-flex flex-column align-items-center bg-white text-center px-3 pb-5"
                        style="border-radius: 8px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #fff9f1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M6 21v-1H4v1a7 7 0 0 0 7 7h3v-2h-3a5 5 0 0 1-5-5m18-10v1h2v-1a7 7 0 0 0-7-7h-3v2h3a5 5 0 0 1 5 5m-13 0H5a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-3-1a4 4 0 1 0-4-4a4 4 0 0 0 4 4m0-6a2 2 0 1 1-2 2a2 2 0 0 1 2-2m19 21h-6a3 3 0 0 0-3 3v2h2v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2h2v-2a3 3 0 0 0-3-3m-7-5a4 4 0 1 0 4-4a4 4 0 0 0-4 4m6 0a2 2 0 1 1-2-2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">
                            Collaborative and Passionate Team
                        </h5>
                        <p class="mb-0">
                            Experienced and dedicated educators who are passionate about the subjects they teach and enjoy
                            sharing their knowledge
                        </p>
                    </div>

                    <div class="d-flex flex-column align-items-center bg-white text-center px-3 pb-5"
                        style="border-radius: 8px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #fff9f1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M11 2C6.582 2 3 5.545 3 9.919c0 1.493.417 2.89 1.143 4.081M17 5h-2c-.943 0-1.414 0-1.707.293S13 6.057 13 7v2c0 .943 0 1.414.293 1.707S14.057 11 15 11h2c.943 0 1.414 0 1.707-.293S19 9.943 19 9V7c0-.943 0-1.414-.293-1.707S17.943 5 17 5m-2.5 6v2m3-2v2m-3-10v2m3-2v2M13 6.5h-2m2 3h-2m10-3h-2m2 3h-2M6.383 17.098c-.092-.276-.138-.415-.133-.527a.6.6 0 0 1 .382-.53c.104-.041.25-.041.54-.041h7.656c.291 0 .436 0 .54.04a.6.6 0 0 1 .382.531c.005.112-.041.25-.133.527c-.17.511-.255.767-.386.974a2 2 0 0 1-1.2.869c-.238.059-.506.059-1.043.059H9.012c-.537 0-.806 0-1.043-.06a2 2 0 0 1-1.2-.868c-.131-.207-.216-.463-.386-.974M14 19l-.13.647c-.14.707-.211 1.06-.37 1.34a2 2 0 0 1-1.113.912C12.082 22 11.72 22 11 22s-1.082 0-1.387-.1a2 2 0 0 1-1.113-.913c-.159-.28-.23-.633-.37-1.34L8 19"
                                    color="currentColor" />
                            </svg>
                        </div>

                        <h5 class="fw-bold mt-4 mb-2">
                            Forefront of Innovation
                        </h5>
                        <p class="mb-0">
                            We are constantly revising our teaching methods to ensure our students receive the best possible
                            education for success.
                        </p>
                    </div>

                    <div class="d-flex flex-column align-items-center bg-white text-center px-3 pb-5"
                        style="border-radius: 8px">
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: 80px;
                                    width: 80px;
                                    border-radius: 50px;
                                    background-color: #fff;
                                    margin-top: -3rem;
                                    border: 10px solid #fff9f1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M8 12a1.5 1.5 0 0 1-1.474-1.22a5 5 0 0 1-2.474-1.712a5 5 0 1 1 8.924-3.567c.027.275-.2.499-.476.499s-.497-.225-.53-.499a4 4 0 1 0-5.285 4.278A1.5 1.5 0 1 1 8 12m-4-1.5v-.027a6 6 0 0 1-.748-.805A1.5 1.5 0 0 0 3 10.5v.5c0 1.971 1.86 4 5 4s5-2.029 5-4v-.5A1.5 1.5 0 0 0 11.5 9H10c.219.29.375.63.45 1h1.05a.5.5 0 0 1 .5.5v.5c0 1.438-1.432 3-4 3s-4-1.562-4-3zM8 8a2.5 2.5 0 0 0-1.572.556A2.99 2.99 0 0 1 5 6a3 3 0 1 1 4.572 2.556A2.5 2.5 0 0 0 8 8M6 6a2 2 0 1 0 4 0a2 2 0 0 0-4 0" />
                            </svg>
                        </div>

                        <h5 class="fw-bold mt-4 mb-2">
                            Continuous Support in a Rewarding Environment
                        </h5>
                        <p class="mb-0">
                            We believe that happy teachers are the foundation for successful students – we provide them with
                            support and resources.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-5">
            <div class="container d-flex flex-column flex-xl-row gap-4 justify-content-between" style="gap: 20px">
                @if(getRawHomeContents($home_content,'instructor_tile1_title','en') != '')
                <div class="d-flex flex-column flex-md-row align-items-start gap-4 justify-content-between px-5 pt-5 w-100" style="border-radius: 8px; background-color: #dbb8db">
                    <div class="pb-5 w-100">
                        <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-5"
                            style="width: fit-content">
                            {!! getRawHomeContents($home_content,'instructor_tile1_title','en') !!}
                            <svg class="position-absolute d-none d-md-block" style="right: 5%; bottom: -52px;"
                                width="150" height="60" viewBox="0 0 150 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4" fill="transparent"
                                    stroke-linecap="round" />
                            </svg>
                        </h2>
                        <p class="mb-2">{!! getRawHomeContents($home_content,'instructor_tile1_text','en') !!}</p>
                        <a href="{{getRawHomeContents($home_content,'instructor_tile1_btnlink','en')}}">
                        <button class="py-2 px-4 mt-3" style="background-color: #bf75bf; border-radius: 7px;">
                            {{getRawHomeContents($home_content,'instructor_tile1_btntext','en')}}
                        </button>
                        </a>
                    </div>

                    <img src="{{asset(getRawHomeContents($home_content,'instructor_tile1_image','en'))}}" style="padding-top:4rem"
                        width="100%" height="100%" alt="">
                </div>
                @endif
                @if(getRawHomeContents($home_content,'instructor_tile2_title','en') != '')
                <div class="d-flex flex-column flex-md-row align-items-start gap-4 justify-content-between px-5 pt-5 w-100" style="border-radius: 8px; background-color: rgb(255, 234, 195)">
                    <div class="pb-5 w-100">
                        <h2 class="position-relative custom_small_heading font-weight-bold text-end mb-5"
                            style="width: fit-content">
                            {!! getRawHomeContents($home_content,'instructor_tile2_title','en') !!}
                            <svg class="position-absolute d-none d-md-block" style="right: 5%; bottom: -52px;"
                                width="150" height="60" viewBox="0 0 150 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0,0 Q75,-30 140,0" stroke="#FFC107" stroke-width="4" fill="transparent"
                                    stroke-linecap="round" />
                            </svg>
                        </h2>
                        <p class="mb-2">{!! getRawHomeContents($home_content,'instructor_tile2_text','en') !!}</p>
                        <a href="{{getRawHomeContents($home_content,'instructor_tile2_btnlink','en')}}">
                            <button class="py-2 px-4 mt-3" style="background-color: rgb(229, 185, 102); border-radius: 7px;">
                                {{getRawHomeContents($home_content,'instructor_tile2_btntext','en')}}
                            </button>
                        </a>
                    </div>

                    <img src="{{asset(getRawHomeContents($home_content,'instructor_tile2_image','en'))}}" style="padding-top:4rem"
                        width="100%" height="100%" alt="">
                </div>
                @endif
            </div>
        </div>

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

        <!-- becomeInsructor section  -->
        <div class="custom_section_color mb-md-5 mb-4">
            <div class="container py-5">
                <div class="row py-5 justify-content-between" style="gap: 20px">
                    <div class="col-lg-5 px-0" data-aos="fade-left">
                        <div class="position-relative d-flex justify-content-end h-100">
                            <div class="bg-white py-2 px-3 d-flex gap-2 justify-content-between align-items-center"
                                style="position: absolute; top: 5%; right: -10%; border: 1px solid orange; border-radius: 8px;">
                                <div class="d-flex align-items-center justify-content-center "
                                    style="background: orange; height: 60px; width: 60px; border-radius: 50px">
                                    <i class="fa-solid fa-graduation-cap text-white" style="font-size: 1.5rem"></i>
                                </div>
                                <div>
                                    <h5 class="text-dark mt-2 mb-0" style="font-weight: 700">59k</h5>
                                    <span style="font-weight: 600">Total Students</span>
                                </div>
                            </div>

                            <img src="{{ asset('public/assets/Instructor2.jpg') }}" height="700" width="80%"
                                style="border-radius: 10px; object-fit: cover;">

                            <div class="position-absolute bg-white" style="bottom: -10%; left: 0px; border-radius: 10px;">
                                <img src="{{ asset('public/assets/Instructor2.jpg') }}" height="150" width="250"
                                    style="object-fit: cover" class="p-3" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg p-lg-4 pt-2 pb-4 px-3 d-flex align-items-center">
                        <div class="custom-l-padd pl-sm-5 p-2 custom_height_instructor" data-aos="fade-right">
                            <h2
                                class="custom_small_heading font-weight-bold text-capitalize d-flex-flex-column justify-content-center mb-3">
                                Who we are looking for
                            </h2>
                            <p class="mb-4">
                                If you are a highly motivated and experienced educator who is passionate about making a
                                difference in the future of healthcare education, we encourage you to apply.
                                <br>
                                Merkaii Xcel Prep offers a competitive salary and benefits package, as well as the
                                opportunity to work in a rewarding student and staff-centered environment.
                            </p>

                            <div class="row">
                                <div class="col-12 col-xl-6 mb-4 d-flex align-items-start gap-2">
                                    <div>
                                        <div class="bg-white d-flex align-items-center justify-content-center"
                                            style="height: 50px; width: 50px; border-radius: 50%;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 32 32">
                                                <path fill="currentColor"
                                                    d="M26 30h-2v-3a5.006 5.006 0 0 0-5-5h-6a5.006 5.006 0 0 0-5 5v3H6v-3a7.01 7.01 0 0 1 7-7h6a7.01 7.01 0 0 1 7 7zM5 6a1 1 0 0 0-1 1v9h2V7a1 1 0 0 0-1-1" />
                                                <path fill="currentColor"
                                                    d="M4 2v2h5v7a7 7 0 0 0 14 0V4h5V2Zm7 2h10v3H11Zm5 12a5 5 0 0 1-5-5V9h10v2a5 5 0 0 1-5 5" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold" style="font-size: 1.3rem">Passionate Educators</h6>
                                        <p>We are seeking educators who are passionate about their field and dedicated to
                                            helping students succeed.</p>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6 mb-4 d-flex align-items-start gap-2">
                                    <div>
                                        <div class="bg-white d-flex align-items-center justify-content-center"
                                            style="height: 50px; width: 50px; border-radius: 50%;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 4.5a8.5 8.5 0 0 0-6.016 14.505a.75.75 0 0 1-1.061 1.06A9.97 9.97 0 0 1 2 13C2 7.477 6.477 3 12 3s10 4.477 10 10a9.97 9.97 0 0 1-2.923 7.065a.75.75 0 0 1-1.061-1.06A8.5 8.5 0 0 0 12 4.5M12 8a5 5 0 0 0-3.534 8.537a.75.75 0 0 1-1.06 1.061a6.5 6.5 0 1 1 9.188 0a.75.75 0 0 1-1.06-1.06A5 5 0 0 0 12 8m0 2.5a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M11 13a1 1 0 1 1 2 0a1 1 0 0 1-2 0" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold" style="font-size: 1.3rem">Strong Communication Skills</h6>
                                        <p>The ability to communicate complex medical concepts clearly and concisely is
                                            essential.</p>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6 mb-4 d-flex align-items-start gap-2">
                                    <div>
                                        <div class="bg-white d-flex align-items-center justify-content-center"
                                            style="height: 50px; width: 50px; border-radius: 50%;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 48 48">
                                                <g fill="currentColor">
                                                    <path
                                                        d="M19 15v3h-3v2h3v3h2v-3h3v-2h-3v-3zm-2 11a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2zm-1 6a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H17a1 1 0 0 1-1-1m1 4a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2z" />
                                                    <path fill-rule="evenodd"
                                                        d="M17 7a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3h4a3 3 0 0 1 3 3v31a3 3 0 0 1-3 3H13a3 3 0 0 1-3-3V10a3 3 0 0 1 3-3zm11 5a3 3 0 0 0 3-3h4a1 1 0 0 1 1 1v31a1 1 0 0 1-1 1H13a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h4a3 3 0 0 0 3 3zm-8-6a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"
                                                        clip-rule="evenodd" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold" style="font-size: 1.3rem">Clinical Expertise</h6>
                                        <p>We value educators with a strong foundation in clinical healthcare skills</p>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-6 mb-4 d-flex align-items-start gap-2">
                                    <div>
                                        <div class="bg-white d-flex align-items-center justify-content-center"
                                            style="height: 50px; width: 50px; border-radius: 50%;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 14 14">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4.194 8.094a1.86 1.86 0 1 0 0-3.719a1.86 1.86 0 0 0 0 3.719M.523 13.479A3.7 3.7 0 0 1 1 11.704a3.71 3.71 0 0 1 3.195-1.868c1.31.003 2.55.727 3.195 1.868a3.7 3.7 0 0 1 .477 1.774m2.02-12.095v-.82m2.799 1.827l.671-.471m-6.271.471l-.672-.471m5.506 3.139a2.055 2.055 0 0 0-2.077-2.042a2.055 2.055 0 0 0-1.99 2.127a2.07 2.07 0 0 0 1.126 1.73v1a.227.227 0 0 0 .226.22h1.361a.227.227 0 0 0 .227-.22V6.855a2.07 2.07 0 0 0 1.128-1.797Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold" style="font-size: 1.3rem">Commitment to Collaboration</h6>
                                        <p>We are looking for team players who are excited to collaborate with colleagues
                                            to create a dynamic learning environment</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <p class="mb-2"><span class="font-weight-bold">Passionate Educators:</span> We are seeking
                                educators
                                who are passionate about
                                their field and dedicated to helping students succeed.</p>
                            <p class="mb-2"><span class="font-weight-bold">Strong Communication Skills:</span> The
                                ability
                                to
                                communicate complex medical
                                concepts clearly and concisely is essential.</p>
                            <p class="mb-2"><span class="font-weight-bold">Clinical Expertise:</span> We value educators
                                with a
                                strong foundation in clinical
                                healthcare skills.</p>
                            <p class="mb-2"><span class="font-weight-bold">Commitment to Collaboration:</span> We are
                                looking
                                for
                                team players who are
                                excited to collaborate with colleagues to create a dynamic learning
                                environment.</p>
                            <br>
                            <p class="mb-2">If you are a highly motivated and experienced educator who is passionate
                                about
                                making a difference in the future of healthcare education, we encourage you to
                                apply. Merkaii Xcellence Prep offers a competitive salary and benefits package, as
                                well as the opportunity to work in a rewarding student and staff-centered
                                environment.</p> --}}
                            @if (!auth()->check())
                                <button
                                    class="border-purple text-purple font-weight-bold hit btn_responsive mt-3 px-2 px-md-3 py-2 openModal"
                                    style="width: fit-content;">
                                    Become
                                    an
                                    Instructor
                                </button>
                            @endif
                        </div>
                    </div>
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
