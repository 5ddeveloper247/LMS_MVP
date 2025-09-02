@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Programs') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<style>
    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .custom_span_color {
        color: #ff7600;
    }

    .title_des {
        font-size: 22px;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        min-height: 78px;
    }

    li {
        list-style-type: disclosure-closed !important;
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

    /* .section-margin-y {
        margin: 60px auto !important;
    } */
    .bs-canvas-overlay {
        opacity: 0.85;
        z-index: 1000;
    }

    .bs-canvas {
        top: 0;
        z-index: 1000;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 140px 30px 40px 40px;
        width: 330px;
        transition: margin .4s ease-out;
        -webkit-transition: margin .4s ease-out;
        -moz-transition: margin .4s ease-out;
        -ms-transition: margin .4s ease-out;
    }

    .thumb_heading {
        /* display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        overflow: hidden; */
        white-space: nowrap;
        width: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .course-small {
        display: flex;
        justify-content: space-between;
        gap: 5px;
        text-align: center;
        white-space: nowrap;
    }

    @media (max-width: 1600px) {
        .bs-canvas {
            top: 0;
            z-index: 1000;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 105px 30px 40px 40px;
            width: 330px;
            transition: margin .4s ease-out;
            -webkit-transition: margin .4s ease-out;
            -moz-transition: margin .4s ease-out;
            -ms-transition: margin .4s ease-out;
        }
    }

    .bs-canvas-left {
        left: 0;
        margin-left: -330px;
    }

    .bs-canvas-right {
        right: 0;
        margin-right: -330px;
    }

    .accent-color {
        accent-color: #ff7600 !important;
    }

    .banner_img {
        object-fit: fill;
    }

    #filter_btn {
        color: #ff7600 !important;
    }

    @media only screen and (max-width: 358px) {

        h2,
        h3 {
            font-size: 14px !important;
        }

        .course-small {
            font-size: 12px !important;
        }

        .filter_btn {
            font-size: 12px !important;
        }

        /* .quiz_wizged {
    width: 14rem !important;
} */

    }

    @media only screen and (min-width: 359px)and (max-width: 769px) {

        h2,
        h3 {
            font-size: 17px !important;
        }

        .filter_btn {
            font-size: 14px !important;
        }

        .course-small {
            font-size: 13px !important;
        }
    }

    @media only screen and (min-width: 1800px) {
        .thumb-height {
            /* height: 400px; */
        }

        .course-small {
            display: flex !important;
            justify-content: space-between;
        }
    }

    .img-cover {
        min-height: auto !important;
    }

    @media only screen and (min-width: 1600px) {
        /* .img-cover {
            min-height: 45vh !important;
        } */

        /* .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
        min-height: 9vh !important;
    } */
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    @media (min-width: 1800px) {
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
    }
</style>

@section('mainContent')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-12 px-0">
                {{-- <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 banner_img"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}">
                    </div>
                    <div class="col-lg-9 offset-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h1 class="text-white custom-heading">Programs</h1>
                        </div>
                    </div>
                </div> --}}
                <x-breadcrumb :title="'Programs'" />
            </div>
        </div>

        <div
            style="background: linear-gradient(344deg, rgba(62,175,132,0.9360994397759104) 0%, rgba(107,183,154,0.8100490196078431) 38%, rgba(161,131,167,0.6055672268907564) 60%, rgba(164,84,167,1) 100%);">
            <div class="container px-lg-5 py-5">
                <div class="px-xl-5 px-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="fw-bold text-white">
                            How do our Programs Work?
                        </h2>

                        <a href="{{ route('quizzes') }}" class="theme_btn py-2 px-5 border-0">
                            Explore Courses
                        </a>
                    </div>
                    @if(count($how_programs_work) > 0)
                    <div class="grid-container">
                        @foreach ($how_programs_work as $i => $tile)
                        <div class="bg-white p-3" style="border-radius: 8px">
                            <div>
                                <div class="position-relative" style="width: 70px">
                                    <img src="{{asset($tile->image)}}"
                                        width="70" height="70" class="rounded-circle object-fit-cover"
                                        alt="">
                                    <span
                                        class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                        style="top: 0px; right: 0px; height: 25px; width: 25px;">
                                        {{$i+1}}
                                    </span>
                                </div>
                                <h5 class="my-3">{{$tile->title}}</h5>
                            </div>

                            <p>
                                {{$tile->text}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="grid-container mt-4">
                        @if(Settings('how_program_works_feature_title_1') && Settings('how_program_works_feature_text_1'))
                        <div class="d-flex align-items-start gap-2">
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

                            <div>
                                <h5 class="fw-bold text-dark" style="font-size: 20px">{{Settings('how_program_works_feature_title_1')}}</h5>
                                <p>
                                    {{Settings('how_program_works_feature_text_1')}}
                                </p>
                            </div>
                        </div>
                        @endif
                        
                        @if(Settings('how_program_works_feature_title_2') && Settings('how_program_works_feature_text_2'))
                        <div class="d-flex align-items-start gap-2">
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
                                    xmlns="http://www.w3.org/2000/svg" width="54" height="34"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="m12 22l-2-6H2l2 6zm0 0h4m-4-9v-.5c0-1.886 0-2.828-.586-3.414S9.886 8.5 8 8.5s-2.828 0-3.414.586S4 10.614 4 12.5v.5m15 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m-9-9a2 2 0 1 1-4 0a2 2 0 0 1 4 0m4 13.5h6a2 2 0 0 1 2 2v.5a2 2 0 0 1-2 2h-1"
                                        color="currentColor" />
                                </svg>
                            </div>

                            <div>
                                <h5 class="fw-bold text-dark" style="font-size: 20px">{{Settings('how_program_works_feature_title_2')}}</h5>
                                <p>
                                    {{Settings('how_program_works_feature_text_2')}}
                                </p>
                            </div>
                        </div>
                        @endif
                        
                        @if(Settings('how_program_works_feature_title_3') && Settings('how_program_works_feature_text_3'))
                        <div class="d-flex align-items-start gap-2">

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

                            <div>
                                <h5 class="fw-bold text-dark" style="font-size: 20px">{{Settings('how_program_works_feature_title_3')}}</h5>
                                <p>
                                    {{Settings('how_program_works_feature_text_3')}}
                                </p>
                            </div>
                        </div>
                        @endif
                        
                        @if(Settings('how_program_works_feature_title_4') && Settings('how_program_works_feature_text_4'))
                        <div class="d-flex align-items-start gap-2">
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
                                    xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M3 18h18V6H3zM1 5a1 1 0 0 1 1-1h20a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm8 5a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a3 3 0 1 1-6 0a3 3 0 0 1 6 0m-2.998 6c-.967 0-1.84.39-2.475 1.025l-1.414-1.414A5.5 5.5 0 0 1 8.002 14a5.5 5.5 0 0 1 3.889 1.61l-1.414 1.415A3.5 3.5 0 0 0 8.002 16m8.205-1.293l4-4l-1.414-1.414l-3.293 3.293l-1.793-1.793l-1.414 1.414l2.5 2.5l.707.707z" />
                                </svg>
                            </div>

                            <div>
                                <h5 class="fw-bold text-dark" style="font-size: 20px">{{Settings('how_program_works_feature_title_4')}}</h5>
                                <p>
                                    {{Settings('how_program_works_feature_text_4')}}
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container custom-padd px-lg-5 pt-md-5 pt-4">
            <div class="row px-4 ">
                <div class="col-12 d-flex justify-content-between mb-3">
                    <div class="col-6 col-md-8 p-0">
                        <h2 class="custom_small_heading font-weight-bold custom_heading_1">Program Features</h2>
                        <ul style="color: #996699!important" class="ml-4">
                            <li>
                                <h5 class="small_heading font-weight-bold">
                                    Courses | {{ getProgramListCourseCount() }}
                                </h5>
                            </li>
                            <li>
                                <h5 class="small_heading font-weight-bold">
                                    Classes | {{ getProgramListClassCount() }}
                                    {{-- @foreach(getProgramListClassCount() as $countclass)
                                        {{$countclass->id}}<br>
                                    @endforeach --}}
                                </h5>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-end">

                        <a class="font-weight-500 pull-bs-canvas-left text-dark filter_btn" id="filter_btn"
                            style="cursor: pointer; text-align:center;">
                            Show Filter
                            <svg width="22" height="16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg">
                                <g id="icon-filter" fill-rule="nonzero" fill="none">
                                    <rect fill="#D8D8D8" y="2" width="22" height="2" rx="1"></rect>
                                    <rect fill="#D8D8D8" y="12" width="22" height="2" rx="1"></rect>
                                    <circle fill="#373737" cx="15.5" cy="13" r="2.5"></circle>
                                    <circle fill="#373737" cx="6.5" cy="3" r="2.5"></circle>
                                </g>
                            </svg>
                        </a>
                        {{-- <form action="" class="form w-100 {{ request()->has('filter') ? '' : 'd-none' }}" id="filter_form">

                        <input type="hidden" name="filter" value="1">
                        <div class="row">
                            <div class="col-4">
                                <label for="program_title">Program Title</label>
                                <input type="text" name="program_title" class="form-control" id="program_title"
                                       value="{{ request()->has('filter') ? request()->input('program_title','') : '' }}">
                                <div id="program_list" class="position-absolute"></div>
                            </div>
                            <div class="col-8">
                                <label for="program_price">Price (0 to {{programFilterMaxPrice()}})</label>
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row-reverse">
                                        <p id="price_range_min"
                                           class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}</p>
                                        <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="100"
                                               name="program_price_min"
                                               class="form-control accent-color"
                                               oninput="price_range_min.innerText = this.value"
                                               id="program_price_min"
                                               value="{{ request()->has('filter') ? request()->input('program_price_min',0) : 0 }}">
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <p id="price_range_max"
                                           class="font-weight-bold">{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}</p>
                                        <input type="range" min="0" max="{{ programFilterMaxPrice() }}" step="100"
                                               name="program_price_max"
                                               class="form-control accent-color"
                                               oninput="price_range_max.innerText = this.value"
                                               id="program_price_max"
                                               value="{{ request()->has('filter') ? request()->input('program_price_max',0) : 0 }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form> --}}
                    </div>
                </div>
                @if (isset($programs))
                    @foreach ($programs as $program)
                        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex justify-content-center mb-md-4 mb-3">
                            <div class="quiz_wizged card rounded-card shadow w-100">
                                <div class="thumb rounded-card-img">
                                    <a href="{{ route('programs.detail', [$program->id]) }}"><img
                                            src="{{ getCourseImage($program->icon) }}"
                                            class="img-fluid img-cover w-100 rounded-card-img">
                                        <div>
                                            <span class="prise_tag"><span>
                                                    ${{ $program->effectiveProgramPlan[0]->amount }}</span>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="font-weight-bold thumb_heading">
                                        <a href="{{ route('programs.detail', [$program->id]) }}">

                                            {{ $program->programtitle }}
                                        </a>
                                    </h5>
                                    <p class="font-weight-bold thumb_heading">
                                        {{ $program->subtitle }}

                                    </p>
                                    <div class="paragraph_custom_height mb-2">
                                        <p style="font-size: 18px !important;">
                                            @php
                                                $description = str_replace(
                                                    '&nbsp;',
                                                    ' ',
                                                    htmlspecialchars_decode(strip_tags($program->discription)),
                                                );
                                            @endphp
                                            @if (Str::length($description) > 119)
                                                {{ Str::limit($description, 119, '...') }}
                                            @else
                                                {{ $description }}
                                            @endif
                                        </p>
                                    </div>

                                    <div class="course-small">
                                        <small>
                                            <i class="fa fa-book-open"></i>
                                            {{ count(json_decode($program->allcourses)) }} Courses
                                        </small>

                                        <small>
                                            <i class="fas fa-clock"></i>
                                            {{ round((strtotime($program->effectiveProgramPlan[0]->edate) - strtotime($program->effectiveProgramPlan[0]->sdate)) / 604800, 1) }}
                                            Weeks
                                        </small>
                                        {{-- <small>
                                            ${{ $program->effectiveProgramPlan[0]->amount }}
                                        </small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (count($programs) == 0)
                    <div class="col-lg-12 mb-md-5 mb-4">
                        <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                            <div class="thumb">
                                <img style="width: 50px"
                                    src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                            </div>
                            <h1>
                                {{ __('No Program Found') }}
                            </h1>
                        </div>
                    </div>
                @endif
                <div class="col-md-12 {{ count($programs) ? 'd-block' : 'd-none' }} mt-4">
                    {{ $programs->links() }}
                </div>

                {{-- <div class="col-md-12 my-3">
                <h2>You May Like</h2>
            </div> --}}
            </div>
        </div>

        {{-- <div class="row custom_slick_slider_02 mb-4 text-center">
            @forelse($recent_program as  $program)
                <div class="col-md-10 my-3">
                    <div class="card rounded-0 shadow">
                        <div class="card-header p-0">
                            <a href="{{ route('programs.detail', [$program->id]) }}">
                                <img style="" src="{{ getCourseImage($program->icon) }}" class="img-fluid">
                            </a>

                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold">
                                <a href="{{ route('programs.detail', [$program->id]) }}">
                                    @if (Str::length($program->programtitle) > 25)
                                        {{ Str::limit($program->programtitle, 25, '...') }}
                                    @else
                                        {{ Str::limit($program->programtitle, 25) }}
                                    @endif
                                </a>
                            </h5>
                            <p class="pb-2">
                                @if (Str::length($program->subtitle) > 25)
                                    {{ Str::limit($program->subtitle, 25, '...') }}
                                @else
                                    {{ $program->subtitle }}
                                @endif
                            </p>
                            <div class="row justify-content-between pt-2">
                                <div class="col-auto">
                                    <small>
                                        <i class="fas fa-clock"></i>
                                        {{ round((strtotime($program->effectiveProgramPlan[0]->edate) - strtotime($program->effectiveProgramPlan[0]->sdate)) / 604800, 1) }}
                                        Weeks
                                    </small>
                                </div>
                                <div class="font-weight-bold col-auto">
                                    <small class="font-weight-bold">
                                        ${{ $program->effectiveProgramPlan[0]->amount }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 my-3">
                    <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                        <div class="thumb">
                            <img style="width: 20px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
                                alt="">
                        </div>
                        <h6>
                            {{ __('No Program Found') }}
                        </h6>
                    </div>
                </div>
            @endforelse
        </div> --}}
        <div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
            <header class="border-bottom bs-canvas-header p-3">
                <h4 class="d-inline-block f_w_600 mb-0">Filter</h4>
                <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                        class="">&times;</span></button>
            </header>
            <div class="bs-canvas-content px-3 py-1">

                <form action="{{ route('programs') }}" method="GET" class="form w-100" id="filter_form">

                    <input type="hidden" name="filter" value="1">
                    <div class="row">
                        <div class="col-12">
                            <label for="program_title">Program Title</label>
                            <input type="text" name="program_title" class="form-control form-control-sm"
                                id="program_title"
                                value="{{ request()->has('filter') ? request()->input('program_title', '') : '' }}"
                                placeholder="Enter Program Name">
                            <div id="program_list" class="position-absolute"></div>
                        </div>

                        <div class="col-12 mt-3">
                            <small class="alert alert-info p-0">Min price must be less then max price</small>
                            <label for="program_price">Price (0 to {{ programFilterMaxPrice() }})</label>
                            <div class="d-flex flex-column">
                                <h6 class="mb-0">Min</h6>
                                <div class="align-items-center d-flex flex-row-reverse gap-2">
                                    <p id="price_range_min" class="font-weight-bold">
                                        {{ request()->has('filter') ? request()->input('program_price_min', 0) : 0 }}</p>
                                    <input type="range" min="0" max="{{ programFilterMaxPrice() }}"
                                        step="1" name="program_price_min" class="form-control accent-color p-0"
                                        oninput="price_range_min.innerText = this.value" id="program_price_min"
                                        value="{{ request()->has('filter') ? request()->input('program_price_min', 0) : 0 }}">
                                </div>
                                <h6 class="mb-0">Max</h6>
                                <div class="align-items-center d-flex flex-row-reverse gap-2">
                                    <p id="price_range_max" class="font-weight-bold">
                                        {{ request()->has('filter') ? request()->input('program_price_max', 0) : 0 }}</p>
                                    <input type="range" min="0" max="{{ programFilterMaxPrice() }}"
                                        step="1" name="program_price_max" class="form-control accent-color p-0"
                                        oninput="price_range_max.innerText = this.value" id="program_price_max"
                                        value="{{ request()->has('filter') ? request()->input('program_price_max', 0) : 0 }}">
                                </div>
                                <p class="text-center mb-0 mt-4">
                                    <a href="{{ route('programs') }}" class="theme_btn small_btn2 p-2">Clear</a>
                                    <button type="submit" class="theme_btn small_btn2 p-2">Submit</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>




    @include(theme('partials._custom_footer'))
    <script src="{{ asset('public/assets/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pull-bs-canvas-left', function() {
                $('body').prepend(
                    '<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                console.log(this);
                if ($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });

            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function() {
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $(
                    '.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });

            // var filter_form = $('#filter_form');
            // $('#filter_btn').on('click', function () {
            //     filter_form.toggleClass('d-none');
            // });

            $('#program_title').keyup(function(event) {
                var value = $(this).val();
                localStorage.setItem("is_program_page", 1);

                // if (event.which === 13) {
                //     event.preventDefault();
                //     $('#program_price_max').val(0)
                //     $('#program_price_min').val(0)
                //     $('#price_range_min').text(0)
                //     $('#price_range_max').text(0)
                //     $('#filter_form').submit();
                // }


                $.ajax({
                    type: "GET",
                    url: "{{ route('search') }}",
                    data: {
                        'name': value
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#program_list').html(response);
                    }
                });
            });



            $('#program_price_max,#program_price_min,#program_duration_min,#program_duration_max').on('change',
                function(event) {
                    event.preventDefault();
                    if (parseInt($('#program_price_min').val()) > parseInt($('#program_price_max').val())) {
                        toastr.error("Min price must be less then max price", "Error");
                        return false;
                    }
                    // if (parseInt($('#program_duration_min').val()) > parseInt($('#program_duration_max').val())) {
                    //     toastr.error("Min duration must be less then max duration", "Error");
                    //     return false;
                    // }
                    // $('#program_title').val('');
                    // $('#filter_form').submit();
                });

        });
        a = 1;

        function togglefn() {
            if (a == 1) {

                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "auto";
                a = 2;
            } else {
                a = 1;
                current = document.querySelector(".title_des");
                next = current.nextElementSibling;
                next.style.height = "80px";
            }
        }
    </script>
    <script>
        $('.custom_slick_slider_02').slick({
            // dots: true,
            lazyLoad: 'ondemand',
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            // nextArrow: '<button class="any-class-name-you-want-next">Next</button>',
            // prevArrow: '<button class="any-class-name-you-want-previous">Previous</button>'
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        // centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 320,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
