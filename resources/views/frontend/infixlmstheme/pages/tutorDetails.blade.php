@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $tutor->name }}
@endsection
{{-- @section('css') --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<link href="{{ asset('public/frontend/infixlmstheme/css/class_details.css') }}" rel="stylesheet" />


<style>
    .d-inine {
        cursor: pointer;
    }

    /* .btn-for-book{
        width: 6rem;
        text-align: center;
    } */
    .thumb-link {
        padding: 10px 18px;
        font-size: 32px;
        font-weight: 700;
        font-family: Source Sans Pro, sans-serif;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--system_primery_color);
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        line-height: 80px;

    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews:last-child {
        padding-bottom: 0px !important;
        border: 0;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews {
        margin-bottom: 10px !important
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {
        font-size: 20px;
        font-weight: 700;
        font-family: Source Sans Pro, sans-serif;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--system_primery_color);
        flex: 80px 0 0;
        margin-left: 40px;
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        line-height: 80px;
        margin-bottom: 14px !important;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer {
        display: flex;
        align-items: center;
        margin: 7px 0 0px !important;
    }

    .course_review_wrapper .course_cutomer_reviews .single_reviews .review_content .rated_customer .feedmak_stars {
        display: flex;
        align-items: center;
        margin: unset !important
    }

    #review_comment {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        max-height: 151px;
        overflow: auto;
        scrollbar-width: none;
    }

    .single_reviews {
        background: #eee;
    }

    /* .course_review_wrapper .course_feedback .course_feedback_left {
        padding-right: 55px;
        margin-bottom: 15px !important;
    } */
    .tutor_detail_image {
        height: 60vh;
    }

    .review_username {
        width: 150px;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    body::-webkit-scrollbar-thumb {
        background: #d5d5d5;
    }

    /* Handle on hover */
    body::-webkit-scrollbar-thumb:hover {
        background: #909090;
    }

    /* Left Sidebar Section  style*/
    .left {
        position: fixed;
        width: 23%;
        height: 100vh;
        float: left;
    }

    /* Right Sidebar Section  style */
    .right {
        background-repeat: no-repeat;
        height: auto;
        width: 100%;
    }

    /* Main Banner Section style */
    .vansena {
        background-image: url("{{ asset('/public/assets/tutor/backimg.png') }}");
        height: 630px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* Main banner Heading Section style  */
    .vansena h2 {
        text-align: right;
        z-index: 5;
        font-family: Poppins;
        height: auto;
        width: auto;
        color: rgb(255, 255, 255);
        text-decoration: none;
        white-space: nowrap;
        min-height: 0px;
        min-width: 0px;
        max-height: none;
        max-width: none;
        line-height: 100px;
        letter-spacing: 0px;
        font-weight: 700;
        font-size: 80px;
        transform-origin: 50% 50%;
        opacity: 1;
        transform: translate(0px, 0px);
        visibility: visible;

    }

    .vansena p {
        font-weight: 300;
        font-size: 22px;
        text-align: right;
    }

    /* What we do Section Style  */
    .whatWedo h5 {
        cursor: pointer;
    }

    .whatWedo {

        border-bottom: 2px dotted #e1e1e1;
    }

    .whatWedo i {
        color: #ff7600;
        margin-right: 1rem;
        font-weight: bold;
    }

    .whatWedo h5 i:hover {
        color: #ff7600;
        margin-right: 1rem;
        font-weight: bold;
        opacity: 1;
    }

    /* .select h2 {
        font-weight: bold;
        font-size: calc(2vw + 0.7rem);
    }

    .select p {
        font-size: 23px;
        font-weight: 300;
    } */

    /* .markdone p {
        font-size: 14px;
        color: #252525;
        font-family: Poppins, sans-serif;
    } */

    .markdone {
        max-height: 55vh;
        overflow-y: auto;
        scrollbar-width: none;

    }

    .markdone p i {
        font-size: 20px;
        color: #ff7600;
        font-weight: 800;
    }


    .controlSize2 {
        height: 350px;
        overflow: auto;
        scrollbar-width: none;
    }

    .newknowledge {
        background-color: #996699;
    }

    /* .heading h2 {
        font-size: calc(2.7vw + 0.7rem);
        color: white;
        font-weight: bold;
    } */

    /* .heading p {
        font-size: 18px;
        color: white;
        font-weight: bold;
        text-decoration: underline;
    } */

    /* .lead h2 {
        font-size: calc(2.7vw + 0.7rem);
        font-weight: bold;
    } */

    /* .lead p {
        font-size: 18px;
        font-weight: bold;
        text-decoration: underline;
    } */

    .newknowledgeImg {
        background-image: url('images/banner.jpg');
        background-size: cover;
    }

    .datatext {
        width: 600px;
    }

    .slick-dots {
        position: absolute;
        bottom: 80px !important;
        display: block;
        width: 100%;
        padding: 0;
        margin: 0;
        list-style: none;
        text-align: center;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .theme_color2 {
        color: var(--system_primery_color);
    }

    @media only screen and (max-width: 540px) {
        .controlSize2 {
            height: 220px !important;
        }
    }

    @media only screen and (max-width: 767.5px) {
        /* .controlSize2 {
            height: auto;
        } */

        /* Left Sidebar Section  style*/
        .left {
            position: relative;
            width: 100%;
            height: 50vh;
            float: left;
        }

        /* Right Sidebar Section  style */
        .right {
            margin-left: 0%;
            background-repeat: no-repeat;
            height: auto;
            width: 100%;
            float: right;
        }

        /* Main Banner Section style */
        .vansena {
            background-image: url('images/backimg.png');
            height: 630px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Main banner Heading Section style  */
        .vansena h2 {
            text-align: right;
            z-index: 5;
            font-family: Poppins;
            height: auto;
            width: auto;
            color: rgb(255, 255, 255);
            text-decoration: none;
            white-space: nowrap;
            min-height: 0px;
            min-width: 0px;
            max-height: none;
            max-width: none;
            line-height: 100px;
            letter-spacing: 0px;
            font-weight: 700;
            font-size: 40px;
            transform-origin: 50% 50%;
            opacity: 1;
            transform: translate(0px, 0px);
            visibility: visible;

        }

        .datatext {
            width: auto;
        }

        .course_review_wrapper .course_cutomer_reviews .single_reviews .thumb {

            margin-right: 38px;
            margin-left: 129px !important;
        }

        .d-flex.gap-3 {
            flex-direction: column;
        }

        .review_username {
            width: unset;
        }

        .for-column {
            display: flex;
            flex-direction: column;
        }

        .h-font {
            font-size: 20px;
        }
    }


    /* @media (width >

    1650px

    ) {
        .breadcrumb_area .breadcam_wrap h5 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }


    } */

    .section-margin-y {
        margin: 60px auto !important;
    }

    @media only screen and (min-width: 1800px) {
        .lead {
            padding: 0px 45px !important;
        }

        .controlSize2 {
            height: 410px !important;
        }
    }

    .grid_system {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
    }

    @media (min-width: 1800px) {
        .grid_system {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 30px;
        }
    }

    .half {
        position: relative;
    }

    .half h5,
    .half h2,
    .half p,
    .half .grid_system {
        position: relative;
        z-index: 7;
    }

    .half::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 70%;
        width: 100%;
        background-color: rgb(255, 249, 243);
        z-index: 1
    }

    .fw-bold {
        font-weight: 600;
    }

    .fa-circle-check {
        color: orangered
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    @media (min-width: 1800px) {
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 30px;
        }
    }

    * {
        font-family: "Rubik" !important
    }

    section .container {
        max-width: 1700px !important
    }

    li {
        font-size: clamp(13px, 1.5vw, 18px) !important
    }
</style>


{{-- @endsection --}}
@section('js')
    <script>
        function shoot(id) {
            if (id == 1) {
                $('.registermain').addClass('d-none');
                $('.whatmain').removeClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            }
            if (id == 2) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').removeClass('d-none');
            } else if (id == 3) {
                $('.registermain').removeClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 4) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').removeClass('d-none');
                $('.programmain').addClass('d-none');
                $('.coursemain').addClass('d-none');
            } else if (id == 5) {
                $('.registermain').addClass('d-none');
                $('.whatmain').addClass('d-none');
                $('.howmain').addClass('d-none');
                $('.programmain').removeClass('d-none');
                $('.coursemain').addClass('d-none');
            }

        }

        $(document).on('click', '.tab_spy', function() {
            $(".tab_spy").find('i').addClass('d-none');
            $(this).find('i').removeClass('d-none');

        });
    </script>
@endsection

<!-- Font Awesome (switched to jsDelivr stable build to avoid integrity mismatches) -->
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
<!-- AOS CSS (Animate On Scroll) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@section('mainContent')


    <div class="col-md-12 px-0">
        <div class="breadcrumb_area position-relative">
            <div class="w-100 h-100 position-absolute bottom-0 left-0">
                <img alt="Banner Image" class="w-100 h-100 img-cover"
                    src="{{ asset('public\frontend\infixlmstheme\img\images\instructors.jpg') }}">
            </div>

            <div class="col-lg-12 text-center">
                <div class="breadcam_wrap text-center">&nbsp;
                    <h5 class="text-white custom-heading text-center">Instructor Details</h5>
                </div>
            </div>

        </div>
    </div>


    <section class="py-5">
        <div class="container py-5" style="background-color: #E8E8F4">
            <div class="row px-3 px-lg-5">
                <!-- Tutor Image + Book Button -->
                <div class="col-lg-6 col-xl-4" data-aos="fade-right">
                    <img src="{{ !empty($tutor->image) ? asset($tutor->image) : asset('public/demo/user/admin.jpg') }}"
                        style="max-height: 400px; border-radius: 20px; object-fit: cover; width: 100%;"
                        alt="{{ $tutor->name }}">

                    @if (auth()->check())
                        @if (isStudent() || isAdmin())
                            <a href="{{ route('tutorBooking', $tutor->id) }}" class="theme_btn mt-4 p-0"
                                style="padding: 0 0 0 30px !important; border-radius: 50px !important;">
                                Book Now
                                <svg width="59" height="59" viewBox="0 0 59 59" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.580078" y="0.5" width="58" height="58" rx="29"
                                        fill="#ffffff10" />
                                    <path d="M32.0801 22.7402L37.0801 28.7402L32.0801 34.7402" stroke="white"
                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M22.0801 28.7402H37.0801" stroke="white" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('tutorBooking', $tutor->id) }}" class="theme_btn mt-4 p-0"
                            style="padding: 0 0 0 30px !important; border-radius: 50px !important;">
                            Book Now
                            <svg width="59" height="59" viewBox="0 0 59 59" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.580078" y="0.5" width="58" height="58" rx="29" fill="#ffffff10" />
                                <path d="M32.0801 22.7402L37.0801 28.7402L32.0801 34.7402" stroke="white" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22.0801 28.7402H37.0801" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    @endif
                </div>

                <!-- Tutor Info + Courses -->
                <div class="col-lg-6 col-xl-8" data-aos="fade-left">
                    <div style="background-color: #fff" class="p-4 p-lg-5">
                        <h2 style="color: #1E3A5F; font-weight: 600;">{{ $tutor->name }}</h2>
                        <span style="color: #FF6B6B">{{ $tutor->designation ?? 'Tutor' }}</span>

                        @if (!empty($tutor->about))
                            <p class="my-4 text-muted" style="text-align: justify;">
                                {!! $tutor->about !!}
                            </p>
                        @endif

                        <h2 class="mb-4" style="font-weight: 600; color: #1E3A5F">Courses</h2>

                        <ul>
                            @forelse ($courses as $course)
                                <li class="mb-3 text-muted d-flex align-items-center gap-2">
                                    <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="20"
                                        alt="">
                                    {{ $course->title }}
                                </li>
                            @empty
                                <li class="text-muted">No Course of This Tutor</li> @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">
        <div class="row px-3 px-lg-5">
            <div class="col-lg-3 col-md-4 d-md-block justify-content-between for-column px-0 px-lg-2">
                <div class="whatWedo what tab_spy mb-3">
                    <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(1)">
                        About Tutor
                        <i class="fa-solid fa-arrow-right "></i>
                    </h5>
                </div>
                <div class="whatWedo course tab_spy mb-3">
                    <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(2)">
                        Courses
                        <i class="fa-solid fa-arrow-right d-none"></i>
                    </h5>
                </div>
                @if (auth()->check())
                    @if (isStudent() || isAdmin())
                        <div class="whatWedo register tab_spy mb-3">
                            <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(3)">
                                Book Now
                                <i class="fa-solid fa-arrow-right d-none"></i>
                            </h5>
                        </div>
                    @endif
                @else
                    <div class="whatWedo register tab_spy mb-3">
                        <h5 class="custom_small_heading d-inine font-weight-bold" onclick="shoot(3)">
                            Book Now
                            <i class="fa-solid fa-arrow-right d-none"></i>
                        </h5>
                    </div>
                @endif
            </div>
            <div class="col-6 col-md-8 col-lg-6 select whatmain hide-scrollbar px-2" style="">
                <h5 class="custom_small_heading h-font font-weight-bold">{{ $tutor->name }}</h5>
                <div class="markdone">
                    <p style="text-align: justify;">{!! $tutor->about !!}</p>
                </div>
            </div>
            <div class="col-6 coursemain d-none select px-0 px-md-2">
                <h5 class="h-font font-weight-bold">Course</h5>
                <div class="markdone">
                    <ul>
                        @forelse ($courses as $course)
                            <li>
                                <p><i class="ti ti-check"></i> {{ $course->title }}</p>
                            </li>
                        @empty
                            <li>
                                <p>No Course of This Tutor</p>
                            </li>
                            <h5></h5>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-6 d-none registermain select px-0 px-md-2">
                <h5 class="h-font font-weight-bold">Book Now</h5>
                <p>If you want to hire the Tutor, Please Click the Below Button</p>

                <a href="{{ route('tutorBooking', $tutor->id) }}"
                    class="theme_btn small_btn2 btn-for-book mt-4 p-2">Book</a>
            </div>
            <div class="col-6 col-lg-3 p-0">
                <div class="tutor_detail_image">
                    <img src="{{ !empty($tutor->image) ? asset($tutor->image) : asset('public/demo/user/admin.jpg') }}"
                        class="img-fluid w-100 h-100" style="object-fit:cover;">
                </div>
            </div>
        </div>
    </div> --}}

    <img src="{{ asset('public/assets/tutor-work.png') }}"
    data-aos="fade-up" width="100%" alt="">


<section>
    <div class="container py-5">
        <div class="row align-items-center py-5 px-3 px-sm-5">
            <div class="col-12 col-xl-5" data-aos="fade-right">
                <span class="py-2 px-3 d-flex align-items-center gap-2"
                    style="width: fit-content; color: orangered; border-radius: 50px; background-color: rgba(255, 68, 0, 0.217);">
                    <div style="height: 8px; width: 8px; border-radius: 50px; background-color: orangered"></div>
                    Why Choose Us
                </span>

                <h2 class="fw-bold mb-3 mt-4 custom_small_heading">
                    FANTASTIC OPPORTUNITY FOR <br> NCLEX SUCCESS
                </h2>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates a laborum fuga voluptatibus
                    natus.
                    Nostrum vitae optio perspiciatis voluptatum non odio quis doloremque aspernatur ipsa accusantium
                    eveniet.
                </p>

                <ul class="mb-4">
                    <li class="d-flex align-items-center gap-2 text-muted">
                        <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="15"
                            alt="">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                    <li class="d-flex align-items-center gap-2 text-muted">
                        <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="15"
                            alt="">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                    <li class="d-flex align-items-center gap-2 text-muted">
                        <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="15"
                            alt="">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                </ul>

                <a class="theme_btn" style="border-radius: 50px !important; font-weight: 500 !important"
                    href="{{ route('instructors') }}#our-tutors-list">
                    See All Tutors
                </a>
            </div>

            <div class="col-12 col-xl-7" data-aos="fade-left">
                <div class="grid-container mt-4">
                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 1.5rem; border-radius: 17px; background-color: #1E3A5F">
                        <div class="blob position-relative">
                            <svg width="65px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" color="currentColor">
                                    <path
                                        d="M6.514 2c-1.304.129-2.182.419-2.838 1.076c-1.175 1.177-1.175 3.072-1.175 6.863v4.02c0 3.79 0 5.686 1.175 6.864S6.743 22 10.526 22h2.007c3.783 0 5.675 0 6.85-1.177c1.067-1.07 1.166-2.717 1.175-5.846" />
                                    <path
                                        d="m10.526 7l1.003 3.5c.56 1.11 1.263 1.4 3.01 1.5c1.389-.034 2.195-.198 2.883-.796c.469-.408.681-1.023.784-1.635L18.55 7.5m2.508-2v5M8.601 4.933c1.587-1.317 3.001-2.024 5.934-2.802a1.94 1.94 0 0 1 1.009.005c2.596.714 3.998 1.348 5.876 2.758c.08.06.104.172.048.255c-.613.902-1.982 1.633-5.34 2.935a2.98 2.98 0 0 1-2.171-.012c-3.576-1.42-5.22-2.18-5.42-2.969a.17.17 0 0 1 .064-.17" />
                                </g>
                            </svg>
                        </div>

                        <div style="height: 8rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-white my-1" style="font-size: 20px">
                                Importance of NCLEX Preparation
                            </h5>
                            <p class="mb-0 text-white" style="font-size: clamp(12px, 1.4vw, 16px); line-height: 1.3">
                                Passing the NCLEX is essential for becoming a licensed nurse. With the right
                                preparation,
                                you can conquer this critical exam.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 1.5rem; border-radius: 17px; background-color: #1E3A5F">
                        <div class="blob position-relative">
                            <svg width="65px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="28" height="34" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"
                                    d="m12 22l-2-6H2l2 6zm0 0h4m-4-9v-.5c0-1.886 0-2.828-.586-3.414S9.886 8.5 8 8.5s-2.828 0-3.414.586S4 10.614 4 12.5v.5m15 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m-9-9a2 2 0 1 1-4 0a2 2 0 0 1 4 0m4 13.5h6a2 2 0 0 1 2 2v.5a2 2 0 0 1-2 2h-1"
                                    color="currentColor" />
                            </svg>
                        </div>

                        <div style="height: 6.7rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-white my-1" style="font-size: 20px">
                                Advantages of One-on-One Tutoring
                            </h5>
                            <p class="mb-0 text-white" style="font-size: clamp(12px, 1.4vw, 16px); line-height: 1.3">
                                Get personalized support from expert tutors who focus on your goals, boost your
                                confidence,
                                and help you get NCLEX-ready.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 1.5rem; border-radius: 17px; background-color: #1E3A5F">

                        <div class="blob position-relative">
                            <svg width="65px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                viewBox="0 0 36 36">
                                <path fill="currentColor" d="M8.57 30.9A16 16 0 0 0 33.95 19H18.43Z"
                                    class="clr-i-solid--alerted clr-i-solid-path-1--alerted" />
                                <path fill="currentColor"
                                    d="M33.95 17a16 16 0 0 0-.18-1.61H22.23A3.68 3.68 0 0 1 19 9.89l4.06-7A16 16 0 0 0 7 29.6L17.49 17Z"
                                    class="clr-i-solid--alerted clr-i-solid-path-2--alerted" />
                                <path fill="currentColor"
                                    d="M26.85 1.14L21.13 11a1.28 1.28 0 0 0 1.1 2h11.45a1.28 1.28 0 0 0 1.1-2l-5.72-9.86a1.28 1.28 0 0 0-2.21 0"
                                    class="clr-i-solid--alerted clr-i-solid-path-3--alerted clr-i-alert" />
                                <path fill="none" d="M0 0h36v36H0z" />
                            </svg>
                        </div>

                        <div style="height: 6.7rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-white my-1" style="font-size: 20px">
                                How to Book a Session
                            </h5>
                            <p class="mb-0 text-white" style="font-size: clamp(12px, 1.4vw, 16px); line-height: 1.3">
                                Book your session 2–6 weeks in advance to secure your preferred slot. Last-minute
                                bookings
                                may be harder to accommodate.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 1.5rem; border-radius: 17px; background-color: #1E3A5F">
                        <div class="blob position-relative">
                            <svg width="65px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 18h18V6H3zM1 5a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm8 5a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a3 3 0 1 1-6 0a3 3 0 0 1 6 0m-2.998 6c-.967 0-1.84.39-2.475 1.025l-1.414-1.414A5.5 5.5 0 0 1 8.002 14a5.5 5.5 0 0 1 3.889 1.61l-1.414 1.415A3.5 3.5 0 0 0 8.002 16m8.205-1.293l4-4l-1.414-1.414l-3.293 3.293l-1.793-1.793l-1.414 1.414l2.5 2.5l.707.707z" />
                            </svg>
                        </div>

                        <div style="height: 8rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-white my-1" style="font-size: 20px">
                                What to Expect After Purchase
                            </h5>
                            <p class="mb-0 text-white" style="font-size: clamp(12px, 1.4vw, 16px); line-height: 1.3">
                                After purchasing, your tutor will contact you within 2–3 business days to schedule and
                                get
                                you started.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container py-5">
        <div class="row px-3 px-sm-5 py-5 position-relative">
            <div class="col-12 col-xl-5" data-aos="fade-right">
                <div class="row h-100">
                    <div class="col-6">
                        <img src="{{ asset('/public/uploads/images/footerimg/fantasticopportunityimg.jpeg') }}"
                            height="100%" width="100%"
                            style="border-radius: 8px; object-fit: cover; margin-top: -3rem;">
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('/public/uploads/images/footerimg/astutorimg.jpeg') }}" height="100%"
                            width="100%" style="border-radius: 8px; object-fit: cover;">
                    </div>

                    <div class="position-absolute" style="right: 0; top: -20%; z-index: -1;">
                        <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-1.png"
                            alt="">
                    </div>

                    <div class="position-absolute" style="left: 0; bottom: -10%; z-index: -1;">
                        <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-2.png"
                            alt="">
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl-7" data-aos="fade-left">
                <span class="py-2 px-3 d-flex align-items-center gap-2"
                    style="width: fit-content; color: orangered; border-radius: 50px; background-color: rgba(255, 68, 0, 0.217);">
                    <div style="height: 8px; width: 8px; border-radius: 50px; background-color: orangered"></div>
                    Why Choose Us
                </span>

                <h2 class="custom_small_heading fw-bold mb-3 mt-4 text-uppercase">
                    We Change Lives Ignite Young Minds and Nurture Future Nurses!
                </h2>
                <p class="mb-4 text-muted">
                    Ready to make a difference? Are you a passionate nurse with a knack for teaching? Do you love
                    helping
                    others achieve their goals? Then you might be the perfect tutor or mentor for Merkaii Xcellence
                    Prep!
                    We're looking for experienced nurses who can guide our esteemed students through the complexities of
                    nursing school and prepare them to conquer the NCLEX-RN & PN Examination.
                </p>

                <div class="row align-items-start justify-content-between gap-3 mb-4">
                    <div class="col-6 d-flex flex-column justify-content-between">
                        <div class="card h-100 p-3"
                            style="border-radius: 15px; box-shadow: 0px 4px 4px 0px #0000001A;">
                            <h6 class="fw-bold" style="font-size: 18px">
                                Ignite Young Minds
                            </h6>
                            <p
                                style="height: 5rem; overflow-y: auto; scrollbar-width: none; font-size: clamp(12px, 1.3vw, 15px); line-height: 1.3">
                                Inspire future nurses by sharing your knowledge and guiding them toward success. Be the
                                mentor who makes a real impact.

                            </p>
                        </div>
                    </div>

                    <div class="col-6 d-flex flex-column justify-content-between">
                        <div class="card h-100 p-3"
                            style="border-radius: 15px; box-shadow: 0px 4px 4px 0px #0000001A;">
                            <h6 class="fw-bold" style="font-size: 18px">
                                Encouraging Early Booking
                            </h6>
                            <p
                                style="height: 5rem; overflow-y: auto; scrollbar-width: none; font-size: clamp(12px, 1.3vw, 15px); line-height: 1.3">
                                Reserve your session early to secure the best slots and set yourself up for NCLEX
                                success
                                with confidence.

                            </p>
                        </div>
                    </div>
                </div>

                <a class="theme_btn" style="border-radius: 50px !important; font-weight: 500 !important"
                    href="{{ route('instructors') }}#our-tutors-list">
                    See All Tutors
                </a>
            </div>
        </div>
    </div>
</section>


<div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">
    <div class="course_review_wrapper w-100">
        <div class="row px-3 px-md-5">
            <div class="col-6 col-sm-4 col-lg-3 px-sm-0 px-lg-2">
                <div class="details_title">
                    <h5 class="f_w_700">Tutor Rating</h5>

                </div>
                <div class="course_feedback p-3 mb-2" style="background:#eee; min-height:11.8rem;">
                    <div class="course_feedback_left">
                        <label class="f_w_400">{{ $tutor->name }}</label>
                        <h5 class="h-font">{{ $tutor->total_tutor_rating }}</h5>
                        <div class="feedmak_stars">

                            @php

                                $main_stars = $tutor->total_tutor_rating;

                                $stars = intval($tutor->total_tutor_rating);

                            @endphp
                            @for ($i = 0; $i < $stars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @if ($main_stars > $stars)
                                <i class="fas fa-star-half"></i>
                            @endif
                            @if ($main_stars == 0)
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            @endif
                        </div>
                        <span>{{ __('frontend.Course Rating') }}</span>
                    </div>
                    {{--                    <div class="feedbark_progressbar"> --}}
                    {{--                        <div class="single_progrssbar"> --}}
                    {{--                            <div class="progress"> --}}
                    {{--                                <div class="progress-bar" role="progressbar" --}}
                    {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,5)}}%" --}}
                    {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,5)}}" --}}
                    {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                    {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                </div> --}}
                    {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,5)}}%</span> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="single_progrssbar"> --}}
                    {{--                            <div class="progress"> --}}
                    {{--                                <div class="progress-bar" role="progressbar" --}}
                    {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,4)}}%" --}}
                    {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,4)}}" --}}
                    {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                    {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                </div> --}}
                    {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,4)}}%</span> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="single_progrssbar"> --}}
                    {{--                            <div class="progress"> --}}
                    {{--                                <div class="progress-bar" role="progressbar" --}}
                    {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,3)}}%" --}}
                    {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,3)}}" --}}
                    {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                    {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}

                    {{--                                </div> --}}
                    {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,3)}}%</span> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="single_progrssbar"> --}}
                    {{--                            <div class="progress"> --}}
                    {{--                                <div class="progress-bar" role="progressbar" --}}
                    {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,2)}}%" --}}
                    {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,2)}}" --}}
                    {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                    {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                </div> --}}
                    {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,2)}}%</span> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="single_progrssbar"> --}}
                    {{--                            <div class="progress"> --}}
                    {{--                                <div class="progress-bar" role="progressbar" --}}
                    {{--                                     style="width: {{getPercentageRating($tutor->total_tutor_rating,1)}}%" --}}
                    {{--                                     aria-valuenow="{{getPercentageRating($tutor->total_tutor_rating,1)}}" --}}
                    {{--                                     aria-valuemin="0" aria-valuemax="100"> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <div class="rating_percent d-flex align-items-center"> --}}
                    {{--                                <div class="feedmak_stars d-flex align-items-center"> --}}
                    {{--                                    <i class="fas fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                    <i class="far fa-star"></i> --}}
                    {{--                                </div> --}}
                    {{--                                <span>{{getPercentageRating($tutor->total_tutor_rating,1)}}%</span> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                </div>
            </div>
            <div class="col-6 col-sm-8">
                @php
                    $PickId = $tutor->id;
                    $user_tutor_hiring_count = \Modules\SystemSetting\Entities\TutorHiring::where(
                        'user_id',
                        \Illuminate\Support\Facades\Auth::id(),
                    )
                        ->where('instructor_id', $PickId)
                        ->count();
                @endphp

                <div class="course_cutomer_reviews border-0">
                    <div class="details_title">
                        <h5 class="f_w_700">{{ __('frontend.Reviews') }}</h5>

                    </div>
                    <div class="slick-slider customers_reviews" id="customers_reviews">

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="course_review_header">
                    <div class="row align-items-center">
                        <div class="col-md-6 px-sm-0 px-lg-2">
                            <div class="review_poients">
                                @if (isAdmin() || isStudent())
                                    @if ($user_tutor_hiring_count > 0)
                                        @if ($tutor->tutorReviews->count() < 1)
                                            @if (Auth::check() && $tutor->userTutorReviews->count() == 0)
                                                <p class="theme_color font_16 mb-0">
                                                    {{ __('frontend.Be the first reviewer') }}
                                                </p>
                                            @else
                                                <p class="theme_color font_16 mb-0">
                                                    {{ __('frontend.No Review found') }}
                                                </p>
                                            @endif
                                        @endif
                                    @else
                                        <p class="theme_color font_16 mb-0">{{ __('First you buy then review') }}</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 px-sm-0 px-lg-2">
                            <div class="rating_star text-lg-right text-md-right">


                                @if (Auth::check())
                                    @if (isAdmin() || isStudent())
                                        @if ($tutor->userTutorReviews->count() == 0 && $user_tutor_hiring_count > 0)
                                            <div class="star_icon d-flex align-items-center justify-content-end">
                                                <a class="rating">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5" class="rating" /><label class="full"
                                                        for="star5" id="star5" title="Awesome - 5 stars"
                                                        onclick="Rates(5, {{ @$PickId }})"></label>

                                                    <input type="radio" id="star4" name="rating"
                                                        value="4" class="rating" /><label class="full"
                                                        for="star4" title="Pretty good - 4 stars"
                                                        onclick="Rates(4, {{ @$PickId }})"></label>

                                                    <input type="radio" id="star3" name="rating"
                                                        value="3" class="rating" /><label class="full"
                                                        for="star3" title="Meh - 3 stars"
                                                        onclick="Rates(3, {{ @$PickId }})"></label>

                                                    <input type="radio" id="star2" name="rating"
                                                        value="2" class="rating" /><label class="full"
                                                        for="star2" title="Kinda bad - 2 stars"
                                                        onclick="Rates(2, {{ @$PickId }})"></label>

                                                    <input type="radio" id="star1" name="rating"
                                                        value="1" class="rating" /><label class="full"
                                                        for="star1" title="Bad  - 1 star"
                                                        onclick="Rates(1,{{ @$PickId }})"></label>

                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                @else
                                    <p class=" f_w_400 mt-0"><a href="{{ url('login') }}"
                                            class="theme_color2">{{ __('frontend.Sign In') }}</a>
                                        {{ __('frontend.or') }} <a class="theme_color2"
                                            href="{{ url('register') }}">{{ __('frontend.Sign Up') }}</a>
                                        {{ __('frontend.as student to post a review') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="modal cs_modal fade admin-query" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('frontend.Review') }}</h5>
                <button type="button" class="close" data-dismiss="modal"><i class="ti-close "></i></button>
            </div>

            <form action="{{ route('submitTutorReview') }}" method="Post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="tutor_id" id="rating_tutor_id" value="">
                    <input type="hidden" name="rating" id="rating_value" value="">

                    <div class="text-center">
                        <textarea class="lms_summernote" name="review" name="" id=""
                            placeholder="{{ __('frontend.Write your review') }}" cols="30" rows="10">{{ old('review') }}</textarea>
                        <span class="text-danger" role="alert">{{ $errors->first('review') }}</span>
                    </div>


                </div>
                <div class="modal-footer justify-content-center">
                    <div class="mt-40">
                        <button type="button" class="theme_line_btn mr-2"
                            data-dismiss="modal">{{ __('common.Cancel') }}
                        </button>
                        <button class="theme_btn " type="submit">{{ __('common.Submit') }}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@include(theme('partials._delete_model'))
@include(theme('partials._custom_footer'))
<script>
    function Rates(val, id) {
        document.getElementById('rating_tutor_id').value = id;
        document.getElementById('rating_value').value = val;
        $("#myModal").modal();
    }
</script>


<script>
    function deleteCommnet(item, element) {
        let form = $('#deleteCommentForm')
        form.attr('action', item);
        form.attr('data-element', element);
    }
</script>


<script>
    var SITEURL = "{{ route('tutorDetails', [$tutor->id, Str::slug($tutor->name, '-')]) }}";
    var page = 1;

    load_more_review(page);


    // $(window).scroll(function () { //detect page scroll
    //     if ($(window).scrollTop() + $(window).height() >= $(document).height() - 400) {
    //         page++;
    //         load_more_review(page);
    //     }


    // });

    function load_more_review(page) {
        $.ajax({
                url: SITEURL + "?page=" + page,
                type: "get",
                datatype: "html",
                data: {
                    'type': 'review',
                },
                beforeSend: function() {
                    $('.ajax-loading').show();
                }
            })
            .done(function(data) {
                if (data.length == 0) {

                    //notify user if nothing to load
                    $('.ajax-loading').html("");
                    return;
                }
                $('.ajax-loading').hide(); //hide loading animation once data is received
                $("#customers_reviews").append(data); //append data into #results element

                if ($('.slick-slider').hasClass('slick-initialized')) {
                    $('.slick-slider').slick('destroy');
                }
                setTimeout(function() {
                    $('.slick-slider').slick({
                        slidesToShow: 1,
                        autoplaySpeed: 1500,
                        "infinite": true,
                        "autoplay": true,
                        "dots": true,
                        "arrows": false,
                        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-arrow-left' aria-hidden='true'></i></button>",
                        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-arrow-right' aria-hidden='true'></i></button>",
                        "responsive": [

                            {
                                "breakpoint": 1400,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            },

                            {
                                "breakpoint": 1366,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            },

                            {
                                "breakpoint": 1200,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            },

                            {
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            },

                            {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
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
                }, 500);

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('No response from server');
            });

    }
</script>
<!-- AOS JS (Animate On Scroll) -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
<script>
    AOS.init({
        duration: 1000,
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
</script>

<script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

@endsection
