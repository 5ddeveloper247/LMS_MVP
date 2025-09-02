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

@section('mainContent')

    {{-- <div class="row m-0">
            <div class="col-md-12 p-0"> --}}
    {{-- <div class="row change m-0">
                    <div class="col-md-12 vansena"></div>
                </div> --}}
    <div class="col-md-12 px-0">
        <div class="breadcrumb_area position-relative">
            <div class="w-100 h-100 position-absolute bottom-0 left-0">
                <img alt="Banner Image" class="w-100 h-100 img-cover"
                    src="{{ asset('public\frontend\infixlmstheme\img\images\instructors.jpg') }}">
            </div>

            <div class="col-lg-9 offset-1">
                <div class="breadcam_wrap">&nbsp;
                    <h5 class="text-white custom-heading">Instructor Details</h5>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="row m-0 mt-5">
                    <div class="col-md-12"> --}}
    {{-- <div class="container-fluid"> --}}
    <div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">
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

                {{-- <div class="whatWedo how mx-3 my-3">
                                    <h5 class="d-inine" onclick="shoot(4)">
                                        <i class="bi bi-arrow-right"></i>How we do it
                                    </h5>
                                </div>
                                <div class="whatWedo program mx-3 my-3">
                                    <h5 class="d-inine" onclick="shoot(5)">
                                        <i class="bi bi-arrow-right"></i>Our Program
                                    </h5>
                                </div> --}}
            </div>
            <div class="col-6 col-md-8 col-lg-6 select whatmain hide-scrollbar px-2" style="">
                <h5 class="custom_small_heading h-font font-weight-bold">{{ $tutor->name }}</h5>
                <div class="markdone">
                    <p style="text-align: justify;">{!! $tutor->about !!}</p>
                    {{-- <p> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p> --}}
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
                    {{-- <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p> --}}
                </div>
            </div>
            <div class="col-6 d-none registermain select px-0 px-md-2">
                <h5 class="h-font font-weight-bold">Book Now</h5>
                <p>If you want to hire the Tutor, Please Click the Below Button</p>

                <a href="{{ route('tutorBooking', $tutor->id) }}"
                    class="theme_btn small_btn2 btn-for-book mt-4 p-2">Book</a>


                {{-- <div class="markdone">
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                </div> --}}
            </div>
            {{-- <div class="col-md-4 select howmain d-none">
                                <h2>How we do it</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                <div class="markdone">
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                </div>
                            </div>
                            <div class="col-md-4 select programmain d-none">
                                <h2>Our Program</h2>
                                <p> consectetur adipiscing elit, Lorem ipsum dolor sit amet</p>
                                <div class="markdone">
                                    <p> <i class="bi bi-check"></i>
                                        Nulla ante eros, venenatis vel suad
                                    </p>
                                    <p><i class="bi bi-check"></i> Lorem ipsum dolor sit amet conse</p>
                                    <p> <i class="bi bi-check"></i>
                                        Vestibulum vitae libero neque</p>
                                    <p><i class="bi bi-check"></i>
                                        Lorem ipscras maximus turpis egit
                                    </p>
                                </div>
                            </div> --}}
            <div class="col-6 col-lg-3 p-0">
                <div class="tutor_detail_image">
                    <img src="{{ !empty($tutor->image) ? asset($tutor->image) : asset('public/demo/user/admin.jpg') }}"
                        class="img-fluid w-100 h-100" style="object-fit:cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="half py-5">
        <div class="container py-4 px-md-5 text-center">
            <h5 class="fw-bold mb-3">Working Process</h5>
            <h2 class="fw-bold mb-3 custom_small_heading">How It Works For Tutors</h2>
            <p>Our Tutor sessions are interactive and engaging, focusing on the student specific<br> needs</p>

            <div class="grid_system mt-5">
                <div class="p-4" style="background-color: #fff; border: 1px solid #00000019; border-radius: 8px;">
                    <div class="d-flex flex-column align-items-center px-4 py-5"
                        style="background-color: rgb(255, 249, 243); border-radius: 8px;">
                        <div class="position-relative" style="width: 90px">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y291cnNlfGVufDB8fDB8fHww"
                                width="90" height="90" class="rounded-circle object-fit-cover" alt="">
                            <span
                                class="position-absolute end-0 text-white translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="top: 0px; right: 0px; height: 25px; width: 25px;">
                                1
                            </span>
                        </div>

                        <h5 class="fw-bold mt-3">Get registered as instructor/tutor</h5>
                    </div>
                </div>

                <div class="p-4" style="background-color: #fff; border: 1px solid #00000019; border-radius: 8px;">
                    <div class="d-flex flex-column align-items-center px-4 py-5"
                        style="background-color: rgb(255, 249, 243); border-radius: 8px;">
                        <div class="position-relative" style="width: 90px">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y291cnNlfGVufDB8fDB8fHww"
                                width="90" height="90" class="rounded-circle object-fit-cover" alt="">
                            <span
                                class="position-absolute end-0 text-white translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="top: 0px; right: 0px; height: 25px; width: 25px;">
                                1
                            </span>
                        </div>

                        <h5 class="fw-bold mt-3">Admin will allow you hours to teach</h5>
                    </div>
                </div>

                <div class="p-4" style="background-color: #fff; border: 1px solid #00000019; border-radius: 8px;">
                    <div class="d-flex flex-column align-items-center px-4 py-5"
                        style="background-color: rgb(255, 249, 243); border-radius: 8px;">
                        <div class="position-relative" style="width: 90px">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y291cnNlfGVufDB8fDB8fHww"
                                width="90" height="90" class="rounded-circle object-fit-cover" alt="">
                            <span
                                class="position-absolute end-0 text-white translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="top: 0px; right: 0px; height: 25px; width: 25px;">
                                1
                            </span>
                        </div>

                        <h5 class="fw-bold mt-3">Make schedule from tutor system</h5>
                    </div>
                </div>

                <div class="p-4" style="background-color: #fff; border: 1px solid #00000019; border-radius: 8px;">
                    <div class="d-flex flex-column align-items-center px-4 py-5"
                        style="background-color: rgb(255, 249, 243); border-radius: 8px;">
                        <div class="position-relative" style="width: 90px">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y291cnNlfGVufDB8fDB8fHww"
                                width="90" height="90" class="rounded-circle object-fit-cover" alt="">
                            <span
                                class="position-absolute end-0 text-white translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="top: 0px; right: 0px; height: 25px; width: 25px;">
                                1
                            </span>
                        </div>

                        <h5 class="fw-bold mt-3">See schedule bought list and start class</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-md-5 pb-5">
        <div class="row align-items-center justify-content-between gap-4">
            <div class="col-12 col-xl-5">
                <span class="py-2 px-3 d-flex align-items-center gap-2"
                    style="width: fit-content; color: orangered; border-radius: 50px; background-color: rgba(255, 68, 0, 0.217);">
                    <div style="height: 8px; width: 8px; border-radius: 50px; background-color: orangered"></div>
                    Why Choose Us
                </span>

                <h2 class="fw-bold mb-3 mt-4 custom_small_heading">
                    FANTASTIC OPPORTUNITY FOR <br> NCLEX SUCCESS
                </h2>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates a laborum fuga voluptatibus natus.
                    Nostrum vitae optio perspiciatis voluptatum non odio quis doloremque aspernatur ipsa accusantium eveniet
                    deleniti fugit velit dolor, vero blanditiis veritatis nulla dolorem? Aperiam quos architecto laboriosam!
                </p>

                <ul class="mb-4">
                    <li class="d-flex align-items-center gap-2 fw-bold">
                        <i class="fa-regular fa-circle-check"></i>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                    <li class="d-flex align-items-center gap-2 fw-bold">
                        <i class="fa-regular fa-circle-check"></i>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                    <li class="d-flex align-items-center gap-2 fw-bold">
                        <i class="fa-regular fa-circle-check"></i>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi.
                    </li>
                </ul>

                <a class="theme_btn d-flex align-items-center gap-2" style="width: fit-content"
                    href="{{ route('instructors') }}#our-tutors-list">
                    See All Tutors
                    <i class="fa-solid fa-circle-arrow-right"></i>
                </a>
            </div>

            <div class="col-12 col-xl">
                <div class="grid-container mt-4">
                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 2rem; border-radius: 17px; background-color: #9966993e">
                        <div class="blob position-relative">
                            <svg width="80px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" color="currentColor">
                                    <path
                                        d="M6.514 2c-1.304.129-2.182.419-2.838 1.076c-1.175 1.177-1.175 3.072-1.175 6.863v4.02c0 3.79 0 5.686 1.175 6.864S6.743 22 10.526 22h2.007c3.783 0 5.675 0 6.85-1.177c1.067-1.07 1.166-2.717 1.175-5.846" />
                                    <path
                                        d="m10.526 7l1.003 3.5c.56 1.11 1.263 1.4 3.01 1.5c1.389-.034 2.195-.198 2.883-.796c.469-.408.681-1.023.784-1.635L18.55 7.5m2.508-2v5M8.601 4.933c1.587-1.317 3.001-2.024 5.934-2.802a1.94 1.94 0 0 1 1.009.005c2.596.714 3.998 1.348 5.876 2.758c.08.06.104.172.048.255c-.613.902-1.982 1.633-5.34 2.935a2.98 2.98 0 0 1-2.171-.012c-3.576-1.42-5.22-2.18-5.42-2.969a.17.17 0 0 1 .064-.17" />
                                </g>
                            </svg>
                        </div>

                        <div style="height: 6.7rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-dark mb-3 mt-2" style="font-size: 22px">
                                Importance of NCLEX Preparation & Why the NCLEX is Crucial
                            </h5>
                            <p class="mb-0">
                                As you know, passing the NCLEX is a critical step in becoming a licensed nurse. It's a
                                challenging exam, but with the right preparation, you can conquer it.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 2rem; border-radius: 17px; background-color: #9966993e">
                        <div class="blob position-relative">
                            <svg width="80px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="54" height="34" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"
                                    d="m12 22l-2-6H2l2 6zm0 0h4m-4-9v-.5c0-1.886 0-2.828-.586-3.414S9.886 8.5 8 8.5s-2.828 0-3.414.586S4 10.614 4 12.5v.5m15 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m-9-9a2 2 0 1 1-4 0a2 2 0 0 1 4 0m4 13.5h6a2 2 0 0 1 2 2v.5a2 2 0 0 1-2 2h-1"
                                    color="currentColor" />
                            </svg>
                        </div>

                        <div style="height: 6.7rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-dark mb-3 mt-2" style="font-size: 22px">Advantages of One-on-One
                                Tutoring
                            </h5>
                            <p class="mb-0">
                                Imagine having a highly experienced tutor dedicated solely to your success. Our one-on-one
                                tutoring sessions are tailored to your specific needs and learning style. You'll build your
                                confidence and knowledge to a level where you'll feel ready to PASS your NCLEX!
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 2rem; border-radius: 17px; background-color: #9966993e">

                        <div class="blob position-relative">
                            <svg width="80px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 36 36">
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
                            <h5 class="fw-bold text-dark mb-3 mt-2" style="font-size: 22px">How to Book a Session</h5>
                            <p class="mb-0">
                                Booking a session is simple, but we recommend planning ahead. Try to book your session at
                                least 2-6 weeks in advance. This ensures you get the best possible slot with our tutors |
                                mentors. Remember, we may not be able to accommodate last-minute bookings if you book less
                                than 7-21 days in advance.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start gap-2"
                        style="padding: 2rem; border-radius: 17px; background-color: #9966993e">
                        <div class="blob position-relative">
                            <svg width="80px" viewBox="40 40 160 161" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FF7619" stroke="#FF7619" stroke-width="20"
                                    d="M18.8,-35.6C24.9,-29,31,-25.2,43.2,-19.7C55.5,-14.2,74.1,-7.1,74.1,0C74.2,7.2,55.8,14.4,44.9,22.2C33.9,29.9,30.4,38.2,24.2,48.2C17.9,58.1,9,69.7,2.5,65.3C-3.9,60.9,-7.7,40.5,-8.9,27.6C-10,14.7,-8.4,9.3,-10.8,6C-13.1,2.6,-19.5,1.3,-27.2,-4.5C-34.9,-10.2,-44,-20.5,-41.9,-24.2C-39.8,-28,-26.5,-25.4,-17.6,-30.5C-8.7,-35.5,-4.4,-48.4,1,-50.1C6.3,-51.7,12.6,-42.3,18.8,-35.6Z"
                                    transform="translate(100 100)" />
                            </svg>


                            <svg class="position-absolute"
                                style="top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -80%);"
                                xmlns="http://www.w3.org/2000/svg" width="40" height="30" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 18h18V6H3zM1 5a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm8 5a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a3 3 0 1 1-6 0a3 3 0 0 1 6 0m-2.998 6c-.967 0-1.84.39-2.475 1.025l-1.414-1.414A5.5 5.5 0 0 1 8.002 14a5.5 5.5 0 0 1 3.889 1.61l-1.414 1.415A3.5 3.5 0 0 0 8.002 16m8.205-1.293l4-4l-1.414-1.414l-3.293 3.293l-1.793-1.793l-1.414 1.414l2.5 2.5l.707.707z" />
                            </svg>
                        </div>

                        <div style="height: 6.7rem; overflow-y: auto; scrollbar-width: none;">
                            <h5 class="fw-bold text-dark mb-3 mt-2" style="font-size: 22px">What to Expect After Purchase
                            </h5>
                            <p class="mb-0">
                                Once you purchase a session, your tutor will reach out to you within 24-72 business hours or
                                2-3 days to schedule your session. We are passionate about your success and will make sure
                                you get the help to achieve your goals
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-md-5 py-5">
        <div class="row justify-content-between gap-4 position-relative">
            <div class="col-12 col-xl-5">
                <div class="row h-100">
                    <div class="col-6">
                        <img src="{{ asset('/public/uploads/images/footerimg/fantasticopportunityimg.jpeg') }}" height="100%" width="100%" style="border-radius: 8px; object-fit: cover; margin-top: -3rem;">
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('/public/uploads/images/footerimg/astutorimg.jpeg') }}" height="100%" width="100%" style="border-radius: 8px; object-fit: cover;">
                    </div>

                    <div class="position-absolute" style="right: 0; top: -20%; z-index: -1;">
                        <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-1.png" alt="">
                    </div>

                    <div class="position-absolute" style="left: 0; bottom: -10%; z-index: -1;">
                        <img src="https://demo2.pavothemes.com/edudeme/wp-content/uploads/2024/10/slider-3-decore-2.png" alt="">
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl">
                <span class="py-2 px-3 d-flex align-items-center gap-2"
                    style="width: fit-content; color: orangered; border-radius: 50px; background-color: rgba(255, 68, 0, 0.217);">
                    <div style="height: 8px; width: 8px; border-radius: 50px; background-color: orangered"></div>
                    Why Choose Us
                </span>

                <h2 class="custom_small_heading fw-bold mb-3 mt-4 text-uppercase">
                    We Change Lives Ignite Young Minds and Nurture Future Nurses!
                </h2>
                <p class="mb-4 text-muted">
                    Ready to make a difference? Are you a passionate nurse with a knack for teaching? Do you love helping
                    others achieve their goals? Then you might be the perfect tutor or mentor for Merkaii Xcellence Prep!
                    We're looking for experienced nurses who can guide our esteemed students through the complexities of
                    nursing school and prepare them to conquer the NCLEX-RN & PN Examination.
                </p>

                <div class="row align-items-start justify-content-between gap-3 mb-4">
                    <div class="col-6 d-flex flex-column justify-content-between">
                        <h6 class="fw-bold" style="font-size: 18px">
                            Ignite Young Minds and Nurture Future Nurses!
                        </h6>
                        <p style="height: 5rem; overflow-y: auto; scrollbar-width: none;">
                            Imagine being the guiding light for aspiring nurses. Picture yourself sharing your expertise,
                            answering questions, and watching your students grow into confident healthcare professionals. As
                            a tutor or mentor at Merkaii Xcellence Prep, you'll have the opportunity to make a real
                            difference in the lives of others. You'll be more than just a teacher; you'll be a mentor, a
                            role model, and a source of inspiration. It's more than just a job; it's a chance to give back
                            to the nursing community and leave a lasting impact.
                        </p>
                    </div>

                    <div class="col-6 d-flex flex-column justify-content-between">
                        <h6 class="fw-bold" style="font-size: 18px">
                            Encouraging Early Booking
                        </h6>
                        <p style="height: 5rem; overflow-y: auto; scrollbar-width: none;">
                            Don't wait until the last minute. Secure your spot today and take the first step towards passing
                            your NCLEX with flying colors!
                        </p>
                    </div>
                </div>

                <a class="theme_btn d-flex align-items-center gap-2" style="width: fit-content"
                    href="{{ route('instructors') }}#our-tutors-list">
                    See All Tutors
                    <i class="fa-solid fa-circle-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="mt-4 row">
        <div class="col-md-6 p-0">
            <!-- <img src="{{ asset('/public/assets/tutor/instructor.jpg') }}" class="img-fluid w-100 h-100"> -->
            <img src="{{ asset('/public/uploads/images/footerimg/fantasticopportunityimg.jpeg') }}"
                class="img-fluid h-100 w-100">

        </div>

        <div class="col-md-6 p-0 d-flex align-items-center px-xl-5" style="background-color: #996699">
            <div class="controlSize px-4 py-4 px-sm-5 hide-scrollbar">
                <div class="lead">
                    <div class="controlSize2">
                        <h2 class="custom_small_heading font-weight-bold text-white mb-3">FANTASTIC OPPORTUNITY THAT CAN
                            HELP YOU
                            ACE YOUR NCLEX EXAM </h2>
                        <h5 class="custom_small_heading font-weight-bold text-white mb-3">Importance of NCLEX Preparation &
                            Why
                            the NCLEX is Crucial</h5>
                        <p class="text-justify text-white">As you know, passing the NCLEX is a critical step in becoming a
                            licensed nurse. It's a challenging exam, but with the right preparation, you can conquer it.
                        </p>
                        <h5 class="text-white font-weight-bold mt-3">Advantages of One-on-One Tutoring</h5>
                        <p class="text-justify text-white">Imagine having a highly experienced tutor dedicated solely to
                            your success. Our one-on-one
                            tutoring sessions are tailored to your specific needs and learning style. You'll build your
                            confidence and knowledge to a level where you'll feel ready to PASS your NCLEX!</p>
                        <h5 class="text-white font-weight-bold mt-3">How to Book a Session</h5>
                        <p class="text-justify text-white">Booking a session is simple, but we recommend planning ahead.
                            Try
                            to book your session at least
                            2-6 weeks in advance. This ensures you get the best possible slot with our tutors | mentors.
                            Remember, we may not be able to accommodate last-minute bookings if you book less than 7-21 days
                            in advance.</p>
                        <h5 class="text-white font-weight-bold mt-3">What to Expect After Purchase</h5>
                        <p class="text-justify text-white">Once you purchase a session, your tutor will reach out to you
                            within 24-72 business hours or 2-3
                            days to schedule your session. We are passionate about your success and will make sure you get
                            the help to achieve your goals</p>
                    </div>
                    <p class="font-weight-bold mt-3 text-white"><a href="{{ route('instructors') }}"
                            style="color:inherit;">
                            <u>All
                                Tutors</u></a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 newknowledgeImg order-1 order-lg-0 order-md-0 px-1 px-xl-5 d-flex align-items-center"
            style="
            background: #eee; ">
            <div class="controlSize px-4 py-4 px-sm-5 hide-scrollbar">
                <div class="lead">
                    <div class="controlSize2">
                        <h2 class="custom_small_heading font-weight-bold">As We Tutor & Mentor – We Change Lives </h2>
                        <p class=" text-justify">Ready to make a difference? Are you a passionate nurse with a knack for
                            teaching? Do you love helping others achieve their goals? Then you might be the perfect tutor or
                            mentor for Merkaii Xcellence Prep! We're looking for experienced nurses who can guide our
                            esteemed students through the complexities of nursing school and prepare them to conquer the
                            NCLEX-RN & PN Examination. </p>
                        <h5 class="custom_small_heading font-weight-bold mt-3">Ignite Young Minds and Nurture Future
                            Nurses!</h5>
                        <p>Imagine being the guiding light for aspiring nurses. Picture yourself sharing your expertise,
                            answering questions, and watching your students grow into confident healthcare professionals. As
                            a tutor or mentor at Merkaii Xcellence Prep, you'll have the opportunity to make a real
                            difference in the lives of others. You'll be more than just a teacher; you'll be a mentor, a
                            role model, and a source of inspiration. It's more than just a job; it's a chance to give back
                            to the nursing community and leave a lasting impact.</p>
                        <h5 class="custom_small_heading font-weight-bold mt-3">Encouraging Early Booking</h5>
                        <p>Don't wait until the last minute. Secure your spot today and take the first step towards passing
                            your NCLEX with flying colors!</p>
                    </div>
                    <p class="font-weight-bold mt-3"><a href="{{ route('instructors') }}" style="color:inherit;">
                            <u>All
                                Tutors</u></a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <!-- <img src="{{ asset('/public/assets/tutor/instructor.jpg') }}" class="img-fluid h-100 w-100"> -->
            <img src="{{ asset('/public/uploads/images/footerimg/astutorimg.jpeg') }}" class="img-fluid h-100 w-100">
        </div>
    </div> --}}
    {{-- </div> --}}
    </div>
    <div class="container my-md-5 my-4 tutor_detail px-md-5 px-3">


        <div class="course_review_wrapper w-100">
            <div class="row px-3 px-md-5">
                <!-- content  -->


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
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

@endsection
