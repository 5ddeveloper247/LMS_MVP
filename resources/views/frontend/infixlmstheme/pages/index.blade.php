@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontendmanage.Home') }}
@endsection

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>


<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />

<link rel="stylesheet" href="{{ asset('public/assets/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/assets/owl.theme.default.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


{{-- for scroll our partner --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{-- events and news tabs-content --}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
{{-- animation gsap --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<style>
    /* faqs about section */
    @import url("https:://fonts.googleleapis.com/css2?family=Poppins&display=swap");
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

    * {
        font-family: "Rubik"
    }

    .panel-about {
        width: 100%;
        border: 1px solid;
        border-radius: 0.5rem 0.5rem 0 0;
    }

    .panel-about input {
        position: absolute;
        opacity: 0;
        z-index: -1;
    }

    .panel-about .panel-about-content {
        max-height: 0;
        overflow: hidden;
    }

    .panel-about input:checked~.panel-about-content {
        max-height: max-content;
    }

    .accordion {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        border: none;
        border-radius: 1rem;
        max-height: 430px;
        overflow: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .accordion::-webkit-scrollbar {
        display: none;
    }

    .section-header {
        width: 100%;
        color: var(--system_secendory_color);
    }

    .panel-about-wrapper {
        width: 100%;
        height: auto;
        padding: 0.5rem 0.5rem;
        transition: background-color 0.25s ease-in;
    }

    .panel-about-wrapper:hover {
        background-color: transparent;
    }

    .panel-about label {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        font-size: 16px;
        margin: 0px;
    }

    .panel-about_label::after {
        content: "\276F";
        width: 1em;
        height: 1em;
        text-align: center;
        transform: rotate(90deg);
        transition: all 0.5s;
    }

    .panel-about_label.rotate::after {
        transform: rotate(270deg);
    }

    .panel-about_content.closed+.panel-about_label::after {
        transform: rotate(0deg);
    }

    /* faqs aboutend */
    /* animation */
    section .animate {
        opacity: 0;
        transition: 2s;
    }

    section.show-animate .animate {
        opacity: 1;
    }

    .sec-4.show-animate .animate {
        animation: fadeInAnimation ease .1s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .sec-8 .animate {
        transform: scale(.5);
    }

    .sec-8.show-animate .animate {
        transform: scale(1);
    }

    /* events and news new section */


    /* newevents */
    .rts-section-title {
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .mb--25 {
        margin-bottom: 25px !important;
    }

    .events-content .rts-counter {
        counter-reset: rt-counter;
    }

    .events-content .single-event {
        margin: 0;
        padding: 45px 40px;
        background: #F5F5FF;
        display: flex;
        gap: 20px;
        align-items: center;
        position: relative;
        z-index: 1;
        overflow: hidden;
        transition: all 1s ease-in-out;

    }

    .events-content .single-event:hover {
        background: var(--system_secendory_color);
    }

    .single-event {
        display: flex;
        align-items: center;
        margin: 10px 0;
        padding: 10px;
        /* border: 1px solid #ccc; */
        position: relative;
    }

    .single-event::before {
        content: "";
        position: absolute;
        left: 170px;
        top: 0;
        bottom: 0;
        width: 1px;
        background-color: #ccc;
    }

    .events-content .single-event-counter {
        padding-right: 20px;
        position: relative;
        width: 106px;
    }

    .events-content .single-event>* {
        position: relative;
        z-index: 10;
    }

    .events-content .single-event-counter .count-number {
        font-size: 80px;
        position: relative;
        transition: all 0.4s ease;
        font-weight: 600;
    }

    .rt-clip-text {
        -webkit-text-fill-color: transparent;
        -webkit-text-stroke-color: #DEDEDE;
        -webkit-text-stroke: 1px;
    }

    .events-content .single-event-content .single-event-content-meta {
        display: flex;
        gap: 25px;
        align-items: center;
        color: #110c2d;
        transition: all 0.4s ease;
    }

    .events-content .single-event:hover .single-event-content-meta {
        color: #eee !important;
    }

    .events-content .single-event:hover .event-title {
        color: #eee !important;
    }

    .events-content .single-event:hover .count-number {
        color: #eee !important;
    }

    .events-content .single-event-counter .count-number::before {
        content: counter(rt-counter, decimal-leading-zero);
        counter-increment: rt-counter;
    }

    .events-content .single-event-content {
        padding-left: 20px;
    }

    .events-content .single-event-content .single-event-content-meta .event-date,
    .events-content .single-event-content .single-event-content-meta .event-time,
    .events-content .single-event-content .single-event-content-meta .event-place {
        display: flex;
        gap: 5px;
        align-items: center;
    }

    .events-content .single-event:nth-child(2n):hover::after {
        opacity: 1;
        top: 0;
    }

    .events-content .single-event:nth-child(2n) .single-event-counter .count-number {
        color: #eee;
    }

    .events-content .single-event:nth-child(2n) .single-event-content-meta {
        color: #eee;
    }

    .events-content .single-event:nth-child(2n) .event-title {
        color: #eee;
    }

    .events-content .single-event::after {
        position: absolute;
        height: 100%;
        width: 100%;
        content: "";
        left: 0;
        top: 0;
        top: -50%;
        left: 0;
        background: var(--system_secendory_color);
        z-index: -1;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .events-content .single-event:after .event-title {
        color: #eee !important;
    }

    .events-content .single-event:after .count-number {
        color: #eee !important;
    }

    .events-content .single-event:nth-child(2n):not(:hover)::after {
        opacity: 1;
        top: 0;
    }

    /*  */
    .ml_span {
        margin-left: -117px;
    }

    /* col-md-5 */
    .events_wrapper {
        position: relative;
        overflow-x: hidden;
    }

    .events_wrapper .eventsIcon {
        position: absolute;
        top: 0;
        height: 100%;
        width: auto;
        display: flex;
        align-items: center;
    }

    .eventsIcon:first-child {
        left: 0;
        display: none;
        background: linear-gradient(90deg, #fff 70%, transparent);
    }

    .eventsIcon:last-child {
        right: 0;
        justify-content: flex-end;
        background: linear-gradient(-90deg, #fff 70%, transparent);
    }

    .eventsIcon i {
        cursor: pointer;
        font-size: 14px;
        text-align: center;
        border-radius: 10%;
        background: #efedfb;
        padding: 10
    }

    .eventsIcon:first-child i {
        margin-left: 0px;
    }

    .eventsIcon:last-child i {
        margin-right: 0px;
    }

    .news-events-tabs-section {
        padding-left: 75px;
    }

    .news-events-navtabs {
        display: flex;
        justify-content: flex-start !important;
        flex-wrap: nowrap !important;
        overscroll-behavior: inherit;
        overflow-x: scroll;
        overflow-y: hidden;
        scrollbar-width: none;
        margin: 0 !important;
        gap: 10px;
    }

    .rt-between {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .rts-border-bottom-2 {
        border-bottom: 2px solid #ddd8f9;
    }

    .pb--25 {
        padding-bottom: 25px !important;
    }

    .rts-section-title {
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .rts-arrow {
        color: var(--rt-primary);
        font-weight: 600;
        display: inline-block;
    }

    .rts-arrow span {
        margin-left: 5px;
    }

    .pb--30 {
        padding-bottom: 30px !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item {
        margin: 30px 0 0 0;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link.active {
        background: var(--system_secendory_color);
        color: #fff !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link:hover {
        background: var(--system_secendory_color);
        color: #fff !important;
    }

    .news-events-tabs-section .news-events-tab .nav-item .nav-link {
        padding: 7px 15px;
        border: 1px solid #ddd8f9;
        border-radius: 0;
        color: #110c2d;
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        -ms-overflow-style: none;
        scrollbar-width: thin;
        scrollbar-color: var(--system_secendory_color) #F1F1FF;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        scrollbar-color: var(--system_secendory_color) #F1F1FF;
        scrollbar-width: medium;
    }

    .news-events-tabs-section .news-events-tab .tab-content {
        max-height: 500px;
        overscroll-behavior: inherit;
        overflow-y: auto;
        margin-top: 15px;
    }

    .news-events-tabs-section .news-events-tab .notice-content-box .notice-content-overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #ffffff87;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .news-events-tabs-section .news-events-tab .notice-content-box {
        position: relative;
    }

    .news-events-tabs-section .news-events-tab .single-notice {
        border-bottom: 1px solid #ddd8f9;
        padding: 25px 0;
        margin-right: 10px;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-date {
        font-size: 24px;
        font-weight: 600;
        color: #b2dfcc;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-date span {
        font-size: 16px;
        font-weight: 500;
        color: #737477;
    }

    .news-events-tabs-section .news-events-tab .single-notice-item .notice-content p a {
        color: #737477;
        transition: all 0.4s ease;
    }

    /*  stayintouch new-form*/

    .outside,
    select.outside,
    [type=password].outside {
        color: #555;
        width: 100%;
        font-size: 1rem;
        line-height: normal;
        border: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        box-sizing: border-box;
        padding: .375rem 10px .375rem 45px !important;
        position: relative;
        z-index: 1;
        height: calc(1.5em + .75rem + 2px);
    }

    :focus,
    select:focus {
        outline: 0 !important;
        color: #555 !important;
        border-color: #9e9e9e;
        z-index: 2
    }

    :focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside,
    :focus~.floating-label-outside select:not(:focus):valid~.floating-label-outside,
    select:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside,
    select:focus~.floating-label-outside select:not(:focus):valid~.floating-label-outside {
        top: 15px;
        left: 40px;
        font-size: 14px;
        opacity: 1;
        font-weight: 400
    }

    :focus~.floating-label-outside,
    select:focus~.floating-label-outside,
    :valid~.floating-label-outside,
    select:valid~.floating-label-outside {
        top: -10px;
        opacity: 1;
        font-size: 14px;
        color: #727272;
        background-color: #eee;
        padding: 0px 5px;
    }

    :focus~.floating-label-outside,
    :valid~.floating-label-outside,
    select:focus~.floating-label-outside,
    select:valid~.floating-label-outside {
        left: 40px;
    }

    .form-control:focus {
        box-shadow: none !important;
        border-color: #ced4da !important;
    }

    .shadow_msg {
        height: 100px !important;
        max-width: 100%;
        word-wrap: break-word;
        color: #555;
        width: 100%;
        font-size: 12px;
        line-height: normal;
        border: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        box-sizing: border-box;
        position: relative;
        z-index: 1;
    }

    :focus~.floating-label-msg input:not(:focus):valid~.floating-label-msg,
    :focus~.floating-label-msg select:not(:focus):valid~.floating-label-msg,
    select:focus~.floating-label-msg input:not(:focus):valid~.floating-label-msg,
    select:focus~.floating-label-msg select:not(:focus):valid~.floating-label-msg {
        top: 15px;
        left: 45px;
        font-size: 15px;
        opacity: 1;
        font-weight: 400;
    }

    :focus~.floating-label-msg,
    select:focus~.floating-label-msg,
    :valid~.floating-label-msg,
    select:valid~.floating-label-msg {
        top: -10px;
        opacity: 1;
        font-size: 13px;
        color: #727272;
        background: #fff;
        padding: 0px 5px;
    }

    :focus~.floating-label-msg,
    :valid~.floating-label-msg,
    select:focus~.floating-label-msg,
    select:valid~.floating-label-msg {
        left: 20px;
    }

    .floating-label-msg {
        position: absolute;
        pointer-events: none;
        left: 12px;
        top: 12px;
        transition: .2s ease all;
        color: #777;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: .5px;
        z-index: 3;
        text-transform: uppercase
    }

    .floating-label-outside {
        position: absolute;
        pointer-events: none;
        left: 50px;
        top: 12px;
        transition: .2s ease all;
        color: #777;
        font-weight: 500;
        font-size: 10px;
        letter-spacing: .5px;
        z-index: 3;
        text-transform: uppercase;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .input-icon-outside {
        position: absolute;
        font-size: 1rem !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
        top: 0.5px;
        left: 0.5px;
        z-index: 3;
        color: #fff;
        background: linear-gradient(0deg, var(--system_primery_color) 0%, var(--footer_background_color) 75%);
        padding: .4rem .75rem;
        display: flex !important;
        align-items: center;
        border-right: 1px solid #ced4da;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    html {
        overflow-x: hidden;
        font-size: 16px;
    }

    .single-box-parent {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .single-box-child {
        width: 100%;
        max-width: 500px;
        min-width: 500px;
        background-color: #373737;
    }

    .work-wrap .text {
        background: #ffffff;
        height: 350px;
    }


    .owl-nav {
        margin-top: -100px !important;
    }

    .owl-carousel .owl-nav .owl-next {
        left: 12%;
        margin-top: -125px;
        margin-left: 400px;
        position: relative;
        font-size: 60px !important;
        color: #eee !important;
    }

    .owl-carousel .owl-nav button.owl-prev {
        z-index: 12 !important;
        position: relative;
        display: block;

        font-size: 60px;
        left: 63%;
        font-size: 60px !important;
        top: -37px;
        color: #eee;
    }

    .owl-carousel .owl-nav .owl-prev span:before,
    .owl-carousel .owl-nav .owl-next span:before {
        font-size: 60px;
        font-weight: bold;
        color: #eee;
    }

    .second_section {

        border: 1px solid rgb(255, 255, 255);
        box-shadow: 0 3px 20px rgb(0 0 0 / 5%);
    }

    .second_section:hover {

        border: 1px solid rgb(255, 255, 255);
    }

    .second_section i {
        background: #fff0f0;
        border-radius: 50%;
        color: var(--system_primery_color);
    }

    .learn_more {
        font-size: 16px;
        border-bottom: 2px solid #373737;
        color: #373737;
    }

    .learn_more:hover {
        color: var(--system_primery_color);
        border-bottom: 2px solid var(--system_primery_color);
    }

    body {
        font-family: sans-serif;
        font-style: normal;
        font-weight: 400;
    }

    .blog {
        background-color: #252525
    }

    .blog img {
        /* height: 16.875rem;
        width: 100%; */
        transition: 500ms ease-in-out
    }

    .blog img:hover {
        opacity: 0.5;
    }

    .lms_section_color {
        color: var(--system_secondary_color);
    }

    .lms_container_color {
        background-color: #eee;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 37px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 36px !important;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .btn_glo {
        border-radius: 16px;
        font-size: 12.5px;
        font-weight: 700;
        background-color: transparent;
        border: 2px solid #eee !important;
        position: relative;
    }

    .btn_glo:hover {
        background-color: var(--system_primery_color) !important;
        border: 2px solid var(--system_primery_color) !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }

    .vidicons {
        width: 66px;
        position: relative;
        height: 66px;
        background: #eee;
        text-align: center;
        border-radius: 50%;
        top: 283px;
        cursor: pointer;
        transition: .5s;
    }

    .vidicons i {
        color: red;
        padding: 28px;
        font-size: 17px;
    }

    .about_us {
        height: auto;
    }

    .about_us_height {
        height: auto;
        overflow: hidden;
    }

    .about_us_p {
        height: auto;

    }

    .about_us_p::-webkit-scrollbar {
        display: none;
    }

    .about_us_image {
        height: 100%;
        object-fit: fill;
        object-position: right;
        border-radius: 20px;
    }

    .shadow_row {
        height: auto;
        justify-content: center;
    }

    .shadow_ist {
        height: 490px;
        border-radius: 20px;
        justify-content: space-between;
    }

    .Faq-btn {
        font-size: 12.5px;
        background: transparent;
        color: black;
        font-weight: 700;
        /* margin: 0px 0px 13px 0px; */
        border: 1px solid black;
        border-radius: 16px;
        padding: 0.5rem 1.5rem;
    }

    .Faq-btn:hover {
        /* background: #eee; */
        color: var(--system_secendory_color);
        border: 1px solid var(--system_secendory_color);
    }

    .vidicons:hover {
        box-shadow: 0px 1px 15px 7px red;
    }

    .video-container {
        position: relative;
        width: 100%;
        height: 490px;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: fill;
        border-radius: 20px;
    }

    .overlay-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 1;
        transition: opacity 0.5s ease;
        border-radius: 20px;
    }

    .top-center {
        top: 16%;
        left: 50%;
        transform: translate(-50%, 0%) !important;
        white-space: nowrap;
    }

    .bottom-center {
        bottom: 10%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text-video-overlay {
        position: absolute;
        color: #eee;
        opacity: 1;
        transition: opacity 0.3s ease;
        text-align: center;
    }

    .text-video-overlay h2 {
        font-size: 1.9rem;
    }

    .video-controls {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #eee;
        padding: 25px;
        border-radius: 12px;
        opacity: 1;
        transition: opacity 0.5s linear;
    }

    #playPauseBtn {
        color: var(--system_primery_color);
    }

    .video-container:hover .overlay-video {
        opacity: 1;
    }

    .video-container:hover .video-controls {
        opacity: 1;
    }

    .video-container.video-playing .text-video-overlay,
    .video-container.video-playing .video-controls,
    .video-container.video-playing .overlay-video {
        opacity: 1;
    }


    /* end of video css */

    .owl-nav {
        display: none !important;
    }

    .imgdata {
        /* background: url("{{ asset('public/frontend/infixlmstheme/img/images/courses-4.jpg') }}"); */
        background: url("{{ asset('public/frontend/infixlmstheme/img/images/demo_img.png') }}");
        background-size: cover;
        /* height: 402px; */
    }

    .owl-carousel .owl-dots {
        display: none !important;
    }

    .small_section_bg_color {
        background-color: #996699 !important;
    }

    .small_section_bg_color>h2 {
        font-size: calc(2vw + 0.7rem);
    }

    .small_section_bg_color>h4 {
        font-size: calc(1.5vw + 0.6rem);
    }

    .main_bannar {
        background-image: url("{{ asset(HomeContents('slider_banner')) }}");
        background-size: cover;
        height: 510px;
        position: relative;
        padding-left: 30px;
        /* min-height: 90vh; */
    }

    /* .old_row {
        height: 510px;
        overflow: hidden;
    } */

    .main_banner_2 {
        height: 255px;
        overflow: hidden;
    }

    .main_bannar::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: #0000007a;
    }

    .text-custom-height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .main_bannar .main_banner-section>h1 {
        font-weight: bold;
        color: #eee;
        position: relative;
    }

    .main_bannar .main_banner-section>p {
        color: #eee;
        position: relative;
    }

    .main_bannar>a {
        position: relative;
        border: 3px solid #eee;
    }

    .custom_section_color {
        background-color: #eee !important;
    }

    .random_program_data_2 {
        overflow: hidden;
    }

    .modal-lg,
    .modal-xl {
        max-width: 600px;
    }

    .paragraph_custom_height {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    .select2-container .select2-selection--single {
        height: 32px !important;

    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 35px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 35px !important;

    }

    .theme_btn.small_btn {
        margin-bottom: 11px;
    }

    .card-shadow {
        min-height: 94vh;
    }

    /* shift from contact */
    .mintban {
        background-image: url("{{ asset('public/assets/Section9-.jpg') }}");
        height: auto;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .flowdiv {
        width: 100% !important;
        padding: 5rem 0px;
        margin: auto;
        /* gap: 5px; */
        justify-content: center;
    }

    .eltdf-eh-item-content {
        height: 100%;
        display: flex;
        align-items: center;
    }

    .custom_form {
        height: 615px;
        border-radius: 20px;
        overflow: hidden;
    }

    .dataflow {
        height: 615px;
        background-color: var(--system_secendory_color);
        position: relative;
        border-radius: 20px;
        overflow: hidden;
    }

    .ankar_eltdf {
        height: 615px;
        overflow: hidden;
        border-radius: 20px;
        display: flex;
        justify-content: center;
    }

    .imgcls {
        min-width: 100%
    }

    .formdokana .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-date,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-number,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-quiz,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-select,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-text,
    .eltdf-contact-form-7-widget .wpcf7-form-control.wpcf7-textarea {
        border: 0;
        border-bottom: 1px solid #e1e1e1;
        margin: 7px 0 20px;
        padding: 7px 10px;
        font-size: 15px;
    }

    .cta_service_info h2 {
        font-weight: 700;
        color: white;
    }

    .cta_service_info.txt h2 {
        color: white;
    }

    .cta_service_info.txt p {
        color: white;
    }

    .theme_btn {
        background: var(--system_primery_color);
        border-radius: 16px;
        font-family: Source Sans Pro, sans-serif;
        font-size: 16px;
        color: #fff;
        font-weight: 700;
        border: 2px solid transparent;
        text-transform: capitalize;
        display: inline-block;
        padding: 0.5rem 1.5rem;
    }

    .lia {
        top: 50%;
        transform: translateY(-50%);
    }

    /* new_section_hover */
    .main_row {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .for-left {
        display: none;
        visibility: hidden;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(122 104 104 / 30%);
    }

    .prep_card {
        height: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        background-color: #FDFCFC;
        padding: 7px !important;
        /* transition: all 0.3s ease; */
        cursor: pointer;
        border-radius: 6px;
        border: 1px solid gainsboro;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        word-wrap: break-word;
    }

    .card-paddingx {
        padding: 30 80px 0;
    }

    .prep_card-text {
        margin: 0px !important;
        text-wrap: nowrap;
        overflow: hidden;
    }

    .prep_card-image {
        position: relative;
        object-fit: cover;
        width: 100%;
        height: 11rem;
    }

    .prep_card-title {
        margin-top: 20px;
    }

    .widget-49-meeting-info {
        position: absolute;
        right: 0;
    }

    .widget-49-pro-title {
        background-color: var(--system_primery_color);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 9px;
        display: flex;
        width: auto;
        height: auto;
        align-items: center;
        justify-content: center;
    }

    .image_card {
        overflow: hidden !important;
        border: 1px solid #E1DED9;
        border-radius: .25rem;
        /* transform: translateX(-245%); */
        transition: all .5s ease-in;
    }

    .left-top-content {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
    }

    .left-bottom-content {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .left-content {
        color: #fff;
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 1;
        width: 30rem;
    }

    #left-pro-title {
        display: none;
    }

    .left-card-text {
        font-size: 20px;
        color: #fff;
        font-weight: 500;
    }

    .learn-more,
    .prep-paragraph {
        color: #fff;
    }

    /* section2 */

    .for-label {
        display: block;
        width: fit-content;
        /* white-space: nowrap; */
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 6px;
        text-align: left;
        border-left: 3px solid;
        position: relative;
        z-index: 2;
        text-decoration: none;
        color: var(--system_secendory_color);
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .for-label:hover {
        border-bottom: 0px;
        color: #fff;
        border-left: 3px solid #365e88;
    }

    .learn-more:hover {
        color: #fff
    }

    .for-label::after {
        content: "";
        height: 100%;
        left: 0;
        top: 0;
        width: 0px;
        position: absolute;
        transition: all 0.3s ease 0s;
        -webkit-transition: all 0.3s ease 0s;
        z-index: -1;
    }

    .for-label:hover:after {
        width: 100%;
    }

    .for-label:after {
        background: #D3D3D3;
    }

    .for-border {
        min-height: auto;
        border: 0px;
        border-left: 1px solid #D3D3D3;
        padding-left: 20px;
        /* min-width: 82%; */
    }

    .for-main-2nd {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    .icons-style {
        font-size: 2rem;
        margin-right: 2rem;
        color: cadetblue;
    }

    .icon-img {
        height: 40px !important;
        max-width: 13% !important;
        width: 100%;
    }

    .section-margin-y {
        margin: 60px auto;
    }

    .main_banner-section {
        width: 29rem;
    }

    .for-affordability {
        max-width: 40px !important;
        height: 40px;
        padding: 0px !important;
    }

    /* percentage section 3a */
    .animation {
        opacity: 0;
        transform: translateX(-300px);
        transition: all 0.7s ease-out;
        transition-delay: 0.4s;

    }

    .scroll-animation {
        opacity: 1;
        transform: translateX(0);
    }

    .percent-video img {
        clip-path: polygon(26% 0, 100% 0, 100% 100%, 0 100%);
    }

    .percent-h {
        color: var(--system_secendory_color);
        font-weight: 700;
    }

    .percent1 {
        margin: 0 -132px 1.5rem 160px;
    }

    .percent2 {
        margin: 0 -100px 1.5rem 104px;
    }

    .percent3 {
        margin: 0 -63px 1.5rem 50px;
    }

    .percent4 {
        margin: 0 -6px 1.5rem -8px;
    }

    .percent {
        margin-right: 30px !important;
        color: var(--system_primery_color);
    }

    /* features */
    .content-features {
        border-radius: 10px;
        box-sizing: border-box;
        background-size: cover;
        background-position: center;
        color: white;
        width: 100%;
        height: 490px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        word-wrap: break-word;
        background-image: url('{{ asset('/public/assets/Untitled design (40).png') }}');

    }

    .content-feature {
        height: 490px;
        overflow: auto;
        scrollbar-width: none;
    }

    .content-features1 {
        font-family: Mulish;
        gap: 20px;
        display: flex;
        flex-direction: column;
        overflow: auto;
    }

    .content-features2-h {
        text-align: left;
        color: #2F2F2F;
    }

    .content-feature1 h2,
    .content-feature1 h5,
    .content-feature1 p {
        opacity: 1;
        transition: opacity 0.5s ease-in all;
        color: #000;
    }

    .content-feature1:hover h2,
    .content-feature1:hover h5,
    .content-feature1:hover p {
        color: var(--system_secendory_color);
    }

    .content-feature1 {
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .in-view {
        opacity: 1;
    }

    .content-features2-hh {
        color: #000;
    }

    .content-features-h {
        letter-spacing: 0em;
        text-align: left;
        color: white;
    }

    .content-features-p {
        color: white;
        height: 200px;
        overflow: auto;
        scrollbar-width: none;
    }

    .content-features-btn {
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 0em;
        text-align: center;
        border-radius: 16px;
        color: #000;
        border: none;
        cursor: pointer;
        border: 2px solid white;
        padding: 0.5rem 1.5rem;
    }

    .content-features-btn:hover {
        background-color: transparent;
        color: white;
    }

    .custom-h {
        font-size: 19px;
    }

    .hidden {
        opacity: 0;
        transition: all 1s;
        filter: blur(1px);
    }

    .hidden-left {
        transform: translateX(-100%);
        animation-name: hidden-left;
    }

    .hidden-right {
        transform: translateX(100%);
    }

    .show {
        opacity: 1;
        filter: blur(0);
        transform: translateX(0);
        transition: all 2s ease;
    }

    /* features end */
    /* logos section */
    .logos {
        justify-content: space-between;
        overflow: hidden;
        flex-wrap: wrap;
        min-width: 1330px;
    }

    .logos-img {
        height: 80px;
        width: 80px;
    }

    .logos-img8 {
        height: 80px;
        width: 100px;
    }

    .logos-img7 {
        height: 80px;
        width: 80px;
    }

    .logos-img2 {
        height: 80px;
        width: 80px;
    }

    .logos-img3 {
        height: 80px;
        width: 80px;
    }

    .logos-img4 {
        height: 80px;
        width: 80px;
    }

    .logos-img5 {
        height: 75px;
        width: 80px;
    }

    /* logos section end */
    .about-img {
        height: 100%;
        /* width: 250px; */
        scale: 1;
        overflow: hidden;
        border-radius: 20px;
    }

    .about-img:hover img {
        scale: 1.2;
        transition: all 2s;
    }

    .at_Merkaii {
        font-size: 1.8rem;
    }

    .custom_border_radius {
        border-radius: 40px !important;
    }

    .top-padd {
        padding-top: 4rem;
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

    .section-padding-y {
        padding-top: 60px !important;
        padding-bottom: 60px !important
    }

    .banner-img {
        width: 100%;
    }

    .cus-padding {
        padding-left: 70px;
    }

    .counter-section .counter_wrapper .single_counter h3 {
        min-width: 115px !important;
        margin-right: 0px !important;
    }

    .counter-padd {
        justify-content: space-between;

    }

    .custom-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.5s ease;
    }

    .custom-slider {
        display: flex;
        width: 400% !important;
        /* Total width is 4 times the width of a single custom-slide (4 slides in this example) */
        transition: transform 0.3s ease;
        /* Smooth transition for custom-slide movement */
    }

    .custom-slide {
        flex: 0 0 25%;
        /* Each custom-slide takes up 25% of the custom-slider width (4 slides per row) */
        box-sizing: border-box;
        padding: 0;
        text-align: center;
        position: relative;
    }

    .custom-slide img {
        width: 100%;
        height: 450px;
        filter: brightness(70%);
        border-radius: 10px;
        transition: transform 0.9s ease;
    }

    .custom-slide:hover img {
        transform: scale(1.1);
        border-radius: 10px;
    }

    /* .custom-slide:hover h5 {
        color:var(--system_secendory_color) !important;
    }
    .custom-slide:hover p {
        color:var(--system_secendory_color) !important;
    } */
    /* Overlay styles */
    .custom-slide .overlay {
        position: absolute;
        border-radius: 10px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    /* Text overlay styles */
    .text-overlay {
        position: absolute;
        bottom: 0%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        color: white;
        padding: 1.5rem 7.5rem
    }

    /* Text overlay styles */
    .text-overlay p {
        color: white;
    }

    .category_name {
        /* color: var(--system_primery_color); */
        color: #000;
    }

    .image-text {
        color: white;
    }

    /* Date overlay styles */
    .date-overlay {
        position: absolute;
        top: 30px;
        left: 30px;
        background-color: white;
        padding: 5px 10px;
        border-radius: 5px;
        width: fit-content;
    }

    .image-date {
        margin: 0;
        color: black;
        font-size: 12.5px;
    }

    button.prev,
    button.next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.5);
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1.5em;
        padding: 10px;
        z-index: 1;
        color: #000 !important;
    }

    button.prev {
        left: 30px;
    }

    button.next {
        right: 30px;
    }

    .category {
        position: absolute;
        font-size: 12.5px;
        top: 30px;
        right: 30px;
        /* background: rgba(255, 255, 255, 0.5); */
        background-color: white;
        padding: 5px 10px;
        border-radius: 5px;
        width: fit-content;
    }

    /* Custom CSS for the card */
    .custom-card {
        position: relative;
        overflow: hidden;
        color: white;
        border-radius: 10px !important;
    }

    .custom-card img {
        filter: brightness(70%);
        border-radius: 10px;
        height: 450px;
        transition: transform 0.6s ease;
    }

    .custom-card:hover img {
        transform: scale(1.1);
    }

    .custom-card:hover h5 {
        /* color: var(--system_secendory_color) !important; */
        color: #fff
    }

    .custom-card .card-img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        /* padding: 20px; */
        transition: background-color 0.3s ease;
        background-color: transparent;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        border-radius: 10px;
        display: flex;
        justify-content: center;
    }

    .custom-card h5 {
        position: absolute;
        text-align: center;
        bottom: 0%;
        /* left: 30px; */
        color: white;
        padding: 1.4rem 1.8rem;
        margin-bottom: 0;
        width: 100%
    }

    .custom-card:hover h5 {
        background-color: #00000056;
        backdrop-filter: blur(10px);
    }

    .card-date {
        position: absolute;
        top: 30px;
        left: 30px;
        font-size: 12.5px;
    }

    .card-date2 {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 12.5px;
    }

    .card_date_heading {
        background-color: white;
        color: black;
        padding: 5px 10px;
        border-radius: 5px;

    }

    /* secondayr call to action by arsam  */
    .online-learning {
        position: relative;
        /* Ensure relative positioning for absolute pseudo-element */
        background-image: url('{{ asset('/public/assets/Section8-Transformation.jpg') }}');
        color: white;
        /* Set text color to white for better visibility */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: 999;
        height: 500px;
    }

    .online-learning::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--footer_background_color);
        opacity: 0.7;
        /* Adjust opacity to your preference */
        z-index: -1;
        /* Ensure the pseudo-element is behind the content */
    }

    /* Custom CSS for the button */
    .custom-button-call-to-action {
        font-size: 12.5px;
        font-weight: 700;
        border: 2px solid white !important;
        border-radius: 16px;
        color: white !important;
        background-color: transparent !important;
        transition: all 0.3s ease;
        padding: 0.5rem 1.5rem;
        /* Smooth transition for hover effect */
    }

    .custom-button-call-to-action:hover {
        font-size: 12.5px;
        font-weight: 700;
        background-color: white !important;
        color: black !important;
        border-color: white !important;
    }

    @media only screen and (max-width: 575px) {
        .text-custom-height {
            -webkit-line-clamp: 2 !important;
        }

        .for-main-2nd {
            gap: 2rem !important;
        }

        .custom-card img {
            height: 240px !important;
        }

        .about-img {
            height: 250px !important;
        }

        .prep_card_height {
            height: 100%;
            width: 100%;
        }

        .prep_card-text {
            font-size: 12px !important;
        }

        .left-content {
            margin-bottom: 10px;
            font-size: 12px;
        }

        .card-date {
            left: 5px !important;
            background-color: white !important;
            color: black !important;
            padding: 0px !important;
            border-radius: 5px !important;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: auto;
        }

        .card-date2 {
            right: 5px !important;
            background-color: white;
            color: black;
            border-radius: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 60px;
            height: 20px;
            line-height: 20px;
        }

        .card_date_heading {
            padding: 5px !important;
            background-color: transparent !important;

        }
    }

    @media (min-width: 768px) {
        .responsive-style-btn {
            padding: 10px 0 !important;
            display: flex !important;
            justify-content: center;
        }

    }

    @media only screen and (max-width: 767.5px) {
        .for-main {
            gap: 2rem !important;
        }

        .rts-section a {
            font-size: 14px;
        }

        .event-date span {
            font-size: 13px !important;
        }

        .video-container {
            height: 450px !important;
        }

        .shadow_ist {
            height: 450px !important;
        }

        .online-learning {
            height: 400px !important;
        }

        .main_banner-section {
            width: 18rem;
        }

        .cus-padding {
            padding-left: 0px !important;
        }

        .date-overlay {
            right: 10px !important;
            left: auto;
        }

        .category {
            left: 10px !important;
        }

        .card-date {
            left: 5px !important;
        }

        .card-date2 {
            right: 5px !important;
        }

        .card_date_heading {
            padding: 5px !important;
        }

        .about-img {
            height: 300px;
        }

        .content-features-btn {
            padding: 4px 9px !important;
        }

        .custom-button-call-to-action {
            padding: 4px 9px !important
        }

        .Faq-btn {
            padding: 4px 9px !important;
        }

        .for-backcolor-row {
            gap: 1.5rem;
        }

        .random_program_data_1 {
            height: 270px;
            overflow: hidden;
        }

        .custom-slide img {
            height: 350px !important;
        }

        .custom-card img {
            height: 260px !important;
        }

        .percent-video {
            height: 390px !important;
        }

        .fa-lightbulb {
            display: flex !important;
            justify-content: center;
        }

        .at_Merkaii,
        .at_Merkaii span {
            text-align: center;
        }

        .ml_span {
            margin: 0px !important;
        }

        .main_bannar {
            height: 400px !important;
        }

        .main_banner_2 {
            height: 200px !important;
        }

        .percent-h,
        .for-label1,
        .heading-responsive-style,
        .content-features2-hh,
        .card-title,
        .rts-section-title,
        .event-title,
        .rts-section-title {
            font-size: 16px !important;
        }

        .cta_service_info h2,
        .section-header,
        .text-video-overlay h2,
        .custom_small_heading,
        .content-features-h,
        .content-features2-h,
        .text-video-overlay h2 {
            font-size: 18px !important;
        }

        button.prev {
            left: 5px !important;
        }

        button.next {
            right: 5px !important;
        }

        .about_us {
            height: auto;
        }

        .top-center {
            left: 20% !important;
            transform: translate(-13%, -0%) !important;
            white-space: normal !important;
        }

        .single-event::before {
            left: 85px !important;
        }

        .events-content .single-event {
            padding: 35px 10px !important;
        }

        .events-content .single-event-counter .count-number {
            font-size: 50px !important;
        }

        .events-content .single-event-content {
            padding-left: 5px !important;
        }

        .news-events-tabs-section {
            padding-left: 0px !important;
        }

        .percent1 {
            margin: 0 0px 1.5rem 0px !important;
        }

        .percent2 {
            margin: 0 0px 1.5rem 0px !important;
        }

        .percent3 {
            margin: 0 0px 1.5rem 0px !important;
        }

        .percent4 {
            margin: 0 0px 1.5rem 0px !important;
        }

        .content-features {
            height: 375px !important;
        }

        .content-feature {
            height: auto !important;
        }

        .map-main-div {
            height: 400px !important;
            width: 100% !important;
        }

        .section-margin-y {
            margin: 20px auto !important;
        }

        .left-s-h-cls {
            height: 200px !important;
        }

        .reviews {
            text-align: center !important;
        }

        .for-bold {
            font-size: 25px;
        }

        .hero-section-main-heading {
            font-size: 20px !important;
        }

        .flowdiv {
            padding: 3rem 0px !important;
        }
    }

    @media only screen and (min-width:768px) and (max-width: 991.98px) {
        .about-img {
            max-height: 330px !important;
        }

        .percent-video {
            max-height: 520px !important;
        }

        .percent1 {
            margin: 0 0px 1.5rem 160px !important;
        }

        .percent2 {
            margin: 0 0px 1.5rem 104px !important;

        }

        .percent3 {
            margin: 0 0px 1.5rem 50px !important;
        }

        .percent4 {
            margin: 0 0px 1.5rem -8px !important;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1023px) {

        .content-features-btn,
        .custom-button-call-to-action,
        .Faq-btn {
            font-size: 14px !important;
            padding: .2rem .6rem !important;
        }

        .video-container {
            height: 550px !important;
        }

        .shadow_ist {
            height: 550px !important;
        }

        .percent1 {
            margin: 0 -103px 1.5rem 160px;
        }

        .about_us_image {
            object-fit: cover !important;
            object-position: top !important;
        }

        .online-learning {
            height: 500px !important;
        }

        .card-date {
            left: 5px !important;
        }

        .card-date2 {
            right: 5px !important;

        }

        .card_date_heading {
            padding: 5px !important;
        }

        .custom-slide img {
            height: 390px !important;
        }

        .custom-card img {
            height: 390px !important;
        }

        .heading-responsive-style {
            font-size: 18px !important;
        }

        .at_Merkaii,
        .at_Merkaii span {
            text-align: center;
            white-space: nowrap;
        }

        .ml_span {
            margin: 0px !important
        }

        .fa-lightbulb {
            display: flex !important;
            justify-content: center;
        }

        .text-video-overlay h2,
        .content-features2-h,
        .section-header,
        .custom_small_heading,
        .custom_heading_1,
        .content-features-h,
        .cta_service_info h2 {
            font-size: 1.5rem !important;
        }

        .about_us {
            height: auto;
        }

        .top-center {
            /* top: 16%;
            left: 2% !important;
            transform: translate(0%, 0%) !important;
            white-space: normal !important; */

        }

        .news-events-tabs-section {
            padding-left: 0px !important;
        }

        .main_banner-section {
            width: 23rem;
        }

        .hero-section-main-heading {
            font-size: 30px !important;
        }

        .cus-padding {
            padding-left: 25px !important;
        }

        #program_title {
            font-size: 15px !important;
        }


    }

    @media only screen and (min-width: 1024px) and (max-width: 1279px) {

        .about_us_img2,
        .about_us_img1 {
            height: 450px;
        }

        /* .video-container {
            height: 500px !important;
        } */

        /* .shadow_ist {
            height: 500px !important;
        } */

        .card-date {
            left: 10px !important;
        }

        .card-date2 {
            right: 10px !important;
        }

        .about_us {
            height: auto !important;
        }

        .main_banner-section {
            width: 24rem !important;
        }

        .hero-section-main-heading {
            font-size: 35px !important;
        }

        .left-content {
            width: 28rem;
        }

        .card-shadow {
            min-height: 95vh;
        }

        .percent1 {
            margin: 0 -103px 1.5rem 160px;
        }

        .percent2 {
            margin: 0 -77px 1.5rem 104px;
        }

        .percent3 {
            margin: 0 -53px 1.5rem 50px;
        }

        .text-video-overlay h2,
        .section-header,
        .custom_small_heading,
        .custom_heading_1,
        .content-features-h {
            font-size: 1.6rem !important;
        }

        .custom_small {
            font-size: 1.2rem !important
        }
    }

    @media only screen and (min-width: 1281px) {
        .text-video-overlay h2 {
            font-size: 2rem !important;
        }

        .prep_card-image {
            height: 15rem;
        }

        .main_banner-section {
            width: 40rem;
        }
    }

    @media only screen and (min-width: 1350px) {
        .main_bannar {
            height: 630px !important;
        }

        .shadow_ist {
            height: 630px !important;
        }

        .video-container {
            height: 630px !important;
        }

        .main_banner_2 {
            height: 315px !important;

        }

        .cta_area {
            height: 600px !important;
        }

        .card-shadow {
            min-height: 95vh;
        }

        .shadow_msg {
            height: 5rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            height: 2.4rem !important;
        }

        .form_sm {
            height: 2.4rem !important;
        }

    }

    @media only screen and (min-width: 1440px) {
        .main-content-feature {
            height: 790px !important;
            overflow: hidden;
        }

        .content-features {
            height: 790px !important;
        }

        .content-feature {
            height: 790px !important;
        }

        .accordion {
            max-height: 520px !important;
        }

        .logos {
            min-width: 100rem !important;
        }

        /* .percent-video {
            padding: 0px 25px 0px 0px !important;
        } */

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 18px;
        }

        .select2-container .select2-selection--single {
            height: 2.3rem !important;
        }

        .form_sm {
            height: 2.3rem !important;
        }

        .video {
            height: 610px;
        }
    }

    @media only screen and (min-width: 1530px) {
        .online-learning {
            height: 630px !important;
        }

        .flowdiv {
            padding: 5rem 3rem !important;
        }

        .content-feature1 {
            margin: 30px 0px;
            display: flex;
            flex-direction: column;
        }
    }

    @media only screen and (min-width: 1560px) {
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .percent4 {
            margin: 0 -8px 1.5rem -8px !important;
        }
    }

    @media screen and (width < 1650px) {

        #program_subtitle {
            font-size: 18px !important;
        }

        .random_program_data_2 {
            font-size: 20px !important;

        }

    }

    @media only screen and (min-width: 1650px) {

        .custom_form {
            height: 660px !important;
        }

        .dataflow {
            height: 660px !important;
        }

        .ankar_eltdf {
            height: 660px !important;
        }

        .video-container {
            height: 755px !important;
        }

        .shadow_ist {
            height: 755px !important;
        }

        .main_bannar {
            height: 820px !important;
        }

        .main_banner_2 {
            height: 410px !important;
        }

        .cta_area {
            height: 800px !important;
        }

        .online-learning {
            height: 800px !important;
        }

        .custom-slide img {
            height: 600px !important;
        }

        .custom-card img {
            height: 600px !important;
        }

        .logos {
            min-width: 125rem !important;
        }

        .percent1 {
            margin-top: 110px !important;
        }

        .percent4 {
            margin-bottom: 110px !important;
        }

        .prep_card-image {
            height: 13rem;
        }

        .left-content {
            width: 45rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .icon-img {
            max-width: 7% !important;
        }

        .for-label {
            font-size: 18px;
        }

        .widget-49-pro-title {
            font-size: 14px;
        }
    }

    @media only screen and (min-width: 1800px) {
        .accordion {
            max-height: 720px !important;
        }

        .flowdiv {
            padding: 5rem 3.5rem !important;
        }

        .card-date {
            font-size: 18px !important;
        }

        .card-date2 {
            font-size: 18px !important;
        }

        .image-date {
            font-size: 18px !important;
        }

        .category {
            font-size: 18px !important;
        }

        .ml_span {
            margin-left: -270px;
        }

        .Faq-btn,
        .content-features-btn {
            font-size: 18px;
            border-radius: 20px !important;
        }

        .btn_glo {
            border-radius: 20px;
            font-size: 18px;
        }

        .text-video-overlay {
            padding: 40px 0px;
        }

        .video-controls {
            padding: 25px 35px;
        }

        .fa-play {
            font-size: 30px !important;
        }

        .custom-button-call-to-action {
            font-size: 18px !important;
            border-radius: 20px !important;
        }

        .custom-button-call-to-action:hover {
            font-size: 18px !important;
        }

        .faqs-row {
            padding: 0px 20px !important;
        }

        .about-img {
            /* height: 760px !important; */
        }

        .logo-text {
            font-size: 25px;
        }

        .logos-img {
            height: 120px;
            width: 120px;
        }

        .logos-img2 {
            height: 120px;
            width: 120px;
        }

        .logos-img3 {
            height: 128px;
            width: 128px;
        }

        .logos-img4 {
            height: 115px;
            width: 128px;
        }


        .logos-img5 {
            height: 120px;
            width: 120px;
        }

        .logos-img6 {
            height: 100px;
            width: 128px;
        }

        .logos-img7 {
            height: 120px;
            width: 120px;
        }

        .logos-img8 {
            height: 120px;
            width: 120px;
        }

        .card-shadow {
            min-height: 79vh;
        }

        .percent-video {
            padding: 0px 20px 0px 0px !important;
        }

        .percent_wrapper {
            padding: 157px 0;
        }

        .percent-row {
            padding: 0px 38px !important;
        }

        .percent {
            font-size: 60px;
        }

        .percent1 {
            margin: 0 -166px 1.5rem 230px;
        }

        .percent2 {
            margin: 0 -127px 1.5rem 155px;
        }

        .percent3 {
            margin: 0 -83px 1.5rem 85px;
        }

        .percent4 {
            margin: 0 -39px 1.5rem 0px;
        }

        .percent-padd {
            padding: 134px 0 !important;
        }

        .content-features-p {
            font-size: 20px;
        }

        .main_banner-section {
            width: 45rem !important;
        }

        .video {
            height: 835px;
        }

        .panel-about label {
            font-size: 20px;
        }

        .prep_card {
            height: 300px;
        }

        .prep_card-image {
            height: 16rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 19px;
        }

        .select2-container .select2-selection--single {
            height: 2.7rem !important;
        }

        .form_sm {
            height: 2.8rem !important;
        }

        .shadow_msg {
            height: 8rem !important;
        }

        .content-features {
            min-width: 580px !important;
            max-width: 580px !important;
            margin-right: 45px;
        }



    }

    .new-intro-video {
        object-fit: cover;
    }

    /* Apply object-fit: contain for screens smaller than 600px */
    @media (max-width: 600px) {
        .new-intro-video {
            object-fit: contain;
        }
    }

    @media only screen and (min-width: 2560px) {

        .custom_heading_1 {
            font-size: 35px;
        }

        .custom_paragraph {
            font-size: 25px;
        }

        .p-shadow {
            font-size: 20px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 22px;

        }

        .select2-container .select2-selection--single {
            height: 3.5rem !important;
        }

        .form_sm {
            height: 3.5rem !important;
        }
    }

    .sec-10 {
        background-image: url('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQG_5mZnAqphmsXMZhlDB39ZjVkQnBcIN1mry6hrczAuOn56h-1');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .home_bg {
        position: relative;
    }

    .home_bg::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #2CA6A4;
        height: 650px;
        width: 650px;
        border-radius: 50%;
    }

    @media (max-width: 1400px) {
        .home_bg::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #2CA6A4;
            height: 350px;
            width: 350px;
            border-radius: 50%;
        }
    }

    /* .bg_text::after {
        content: "NCLEX® & NURSING SCHOOL";
        position: absolute;
        bottom: 0;
        left: 15%;
        font-size: clamp(2rem, 5vw, 7rem);
        font-weight: 800;
        color: #0000000a;
    } */

    .need_to_learn {
        padding-top: 4rem;
        padding-bottom: 4rem;
        background-image: url('https://merkaiixcelprep.com/public/images/photo-1579684385127-1ef15d508118-min.jpg');
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .need_to_learn::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 255, 0.515);
    }

    .custom-slide:hover .text-overlay {
        background-color: #00000053 !important;
        backdrop-filter: blur(10px) !important;
        color: #fff !important;
        transition: all ease .4s
    }

    .custom-shape-divider-bottom-1756293429 {
        position: absolute;
        bottom: -1px;
        left: 0;
        z-index: 999;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1756293429 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 150px;
    }

    .custom-shape-divider-bottom-1756293429 .shape-fill {
        fill: #1E3A5F;
    }

    .anim-hero {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translatey(0px);
        }

        50% {
            transform: translatey(-20px);
        }

        100% {
            transform: translatey(0px);
        }
    }

    .home_bg {
        height: 100%
    }

    @media (max-width: 768px) {
        .home_bg {
            height: auto;
            margin-top: 2rem
        }

        .custom-shape-divider-bottom-1756293429 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }
    }

    @media (max-width: 1600px) {
        .hero_img {
            width: 65%;
        }
    }

    .rounded {
        border-radius: 8px !important;
    }

    .gap-1 {
        gap: .75rem !important;
    }

    .gap-2 {
        gap: 1rem !important;
    }

    .gap-3 {
        gap: 1.2rem !important;
    }

    .gap-4 {
        gap: 1.5rem !important;
    }

    .navy-text {
        color: #1E3A5F !important;
    }

    .container-fluid {
        max-width: 1600px !important;
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

    @media min-width(1500px) {
        .anim-btn button {
            font-size: 16px
        }
    }

    .anim-btn button:hover {
        background-color: #1e3a5f61 !important;
        border: 1px solid #1E3A5F !important;
        transition: all 0.3s ease;  
    }


    .benefits {
        background-color: #F2F4F6;

        h2 {
            color: white;
        }
    }
    
    .benefit-card {
        padding: 20px;
        border-radius: 12px;
        display: flex;
        gap: 14px;
        align-items: center;
        flex-direction: column;
        border: 2px solid #CFAF6E;
        box-shadow: rgb(0 0 0 / 0%) 0px 2px 4px, rgb(250 255 35 / 0%) 0px 7px 13px -3px, rgb(182 178 10) 0px -3px 0px inset;
        background-color: #1E3A5F;

        h3 {
            font-size: clamp(1rem, 2.5vw, 1.5rem);
        }
    }

    h2 {
        font-size: clamp(1.3rem, 4vw, 2.5rem) !important;
        font-family: "Rubik" !important
    }

</style>


@section('mainContent')
    {{-- MainBanner --}}
    <section class="sec-1 show-animate position-relative" style="background: linear-gradient(180deg, #2CA6A4, transparent); height: 90vh;">
        <img src="https://html.rrdevs.net/edcare/assets/img/shapes/hero-shape-11.png" width="250"
            style="position: absolute; left: 0; top: 0;" alt="">
        <div class="container-fluid px-0 g-0 h-100">
            <div class="row bg_text position-relative flex-column justify-content-between flex-md-row align-items-center px-3 px-sm-5 h-100 pt-5 pt-md-0">

                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="sub-heading d-flex align-items-center gap-1 bg-white p-2 mb-4" style="border-radius: 50px; width: fit-content; padding-right: 22px !important;">
                        <span class="heading-icon">
                            <i class="fa-sharp fa-solid fa-bolt"></i>
                        </span>Welcome to Online Education
                    </h6>

                    <h1 class="hero-section-main-heading mb-3 navy-text"
                        style="font-weight: 600; font-size: clamp(1.6rem, 4vw, 3rem) !important">
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
                                <input type="text" style="border-radius: 50px; height: 50px;" class="form-control search_courses" name="query"
                                    placeholder="Search" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Search'">

                                <div class="input-group-prepend">
                                    <button class="btn px-4" style="background-color: #1E3A5F; color: #fff; border-radius: 50px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);" type="submit"
                                        id="button-addon1"><i class="ti-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="search_courses_list position-absolute"></div>
                    @endif

                    <div class="d-flex align-items-center gap-2 anim-btn border-0">
                        <button style="background-color: var(--system_primery_color)" class="py-2 px-4 text-white">Start Your Free NCLEX® Prep Trial</button>
                        <button style="background-color: var(--system_primery_color)" class="py-2 px-4 text-white">Learn How It Works</button>
                    </div>
                </div>

                <div class="col-md-6 home_bg overflow-hidden">
                    <div class="d-flex align-items-center justify-content-end flex-column position-relative h-100"
                        style="z-index: 99;">
                        <img class="hero_img" src="{{ asset($homeContent->slider_banner) }}" width="80%" alt="">
                        <div class="anim-hero bg-white py-2 px-4 d-none flex-column align-items-center d-lg-flex"
                            style="position: absolute; top: 5%; left: 15%; border: 1px solid #2CA6A4; border-radius: 8px;">
                            <div class="d-flex align-items-center justify-content-center "
                                style="background: #2CA6A4; height: 60px; width: 60px; border-radius: 50px">
                                <i class="fa-solid fa-graduation-cap text-white" style="font-size: 1.5rem"></i>
                            </div>
                            <h5 class="text-dark mt-2 mb-0" style="font-weight: 700">59k</h5>
                            <span style="font-weight: 600">Total Students</span>
                        </div>

                        <div class="anim-hero bg-white py-2 px-3 d-flex gap-2 justify-content-between align-items-center"
                            style="position: absolute; bottom: 20%; right: 0%; border: 1px solid #2CA6A4; border-radius: 8px;">
                            <div class="d-flex align-items-center justify-content-center "
                                style="background: #2CA6A4; height: 60px; width: 60px; border-radius: 50px">
                                <i class="fa-solid fa-graduation-cap text-white" style="font-size: 1.5rem"></i>
                            </div>
                            <div>
                                <h5 class="text-dark mt-2 mb-0" style="font-weight: 700">59k</h5>
                                <span style="font-weight: 600">Total Students</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-featured-program-plan />

            {{-- <div class="row mb-3">
                <div class="col-md-8 px-md-0 hero-section-h-responsive">
                    <div class="main_bannar d-flex align-items-start justify-content-center flex-column py-5 pl-sm-5 pl-3">

                        <div class="main_banner-section cus-padding">

                            <h1 class="hero-section-main-heading">
                                PASS YOUR EXAMS - BECOME A LICENSED HEALTHCARE PROFESSIONAL
                            </h1>
                            <p class="mt-4 hero-section-p mb-5"> <span class="font-weight-bold">Adult Learners, </span>
                                discover the ultimate roadmap for selecting preparatory courses to conquer exams such as the
                                Nursing School, <span class="font-weight-bold"> NCLEX, CPT, CPhT, CPC, CMA </span> and
                                various general licensures.

                            </p>

                            @guest
                                <a href="{{ url('/register') }}" class="btn_glo read_more text-white px-4 py-2">
                                    Enroll Now
                                </a>

                            @endguest
                        </div>
                    </div> 
                </div>

                <div class="col-md-4 old_row">
                    <div class="row" id="random_programs" @if (!isset($random_program)) style="height:100%" @endif>
                        @if (isset($random_program))
                            <div class="col-6 px-0 main_banner_2">
                                <div class="first_div random_program_data_1 height-card">
                                    <img id="program_icon" src="{{ $random_program->icon }}"
                                        class="w-100 h-100 imgcls img-fluid height-card">
                                </div>
                            </div>
                            <div class="col-6 small_section_bg_color main_banner_2 pl-0 pl-xl-2">
                                <div class="first_div height-card d-flex justify-content-center h-100">
                                    <a href="{{ route('programs.detail', ['id' => $random_program->id]) }}"
                                        class="d-flex flex-column h-100 justify-content-center">
                                        <h5 class="font-weight-bold px-2 px-xl-4 text-white" id="program_title">
                                            {{ $random_program->programtitle }}
                                        </h5>
                                        <h5 class="font-weight-bold px-2 px-xl-4 text-white text-custom-height"
                                            id="program_subtitle">
                                            {{ $random_program->subtitle }}
                                        </h5>
                                        <p class="px-2 px-xl-4 text-white text-custom-height" style="margin-bottom:0.5rem"
                                            id="program_desc">

                                            @php
                                                $program_description = strip_tags($random_program->discription);
                                            @endphp
                                            @if (Str::length($program_description) > 100)
                                                {{ Str::limit($program_description, 100, '...') }}
                                            @else
                                                {{ $program_description }}
                                            @endif
                                        </p>
                                        <h5 class="px-2 px-xl-4 pt-2 text-white" id="program_cost">
                                            ${{ $random_program->currentProgramPlan[0]->amount }}
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div
                            class="col-6 @if (!isset($random_program)) col-md-12 order-md-2 @endif random_program_data_2 height-card main_banner_2">
                            <div
                                class="d-flex flex-column h-100 justify-content-center py-3 py-md-0 pl-md-2 pl-4 text-center align-items-center">
                                <h5 class="font-weight-bold custom_heading_2 heading-responsive-style mb-4"
                                    @if (!isset($random_program)) style="font-size:1.8rem" @endif>
                                    Accelerate Your Future
                                    <br>
                                    Learn New Things
                                    <br>
                                    Get New skills,
                                    <br> JOIN US !
                                </h5>
                                <a class="theme_btn small_btn mt-2 text-center responsive-style-btn"
                                    href="{{ url('/prep-courses') }}">View
                                    Courses</a>
                            </div>
                        </div>
                        <div
                            class="col-6 @if (!isset($random_program)) col-md-12 order-md-1 @endif height-card random_program_data_1 px-0 main_banner_2">
                            
                            <img src="{{ asset('/public/assets/lms/homepage-leftimg.png') }}" alt=""
                                class="w-100 h-100 imgcls img-fluid" style="object-fit: cover;">
                        </div>
                    </div>


                </div>
            </div> --}}
            {{-- banner imagadd 2ndsection --}}
            {{-- <section class="d-flex justify-content-center align-items-center custom-padding">
            <div class="banner-img">
                <img src="{{ asset('/public/uploads/images/footerimg/WE ARE HERE TO LISTEN (2).png') }}"
                    class="h-100 w-100">
                <div>
        </section> --}}
            {{-- 3rdsection --}}
            {{-- features section --}}
        </div>
        <div class="custom-shape-divider-bottom-1756293429">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>


    <section class="benefits">
        <div class="container-fluid py-5">
            <h2 class="text-center">Why Choose Our Program?</h2>
            <div class="benefit-grid row">
                <div class="col-md-3">
                    <div class="benefit-card h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/live_classes.png') }}" width="90px" alt="Live Classes" class="benefit-icon-img">
                        </div>
                        <h3>Live, Interactive Classes</h3>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="benefit-card h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/live_classes.png') }}" width="90px" alt="Live Classes" class="benefit-icon-img">
                        </div>
                        <h3>On-Demand Content</h3>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="benefit-card h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/live_classes.png') }}" width="90px" alt="Live Classes" class="benefit-icon-img">
                        </div>
                        <h3>Expert Nurse Educators</h3>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="benefit-card h-100">
                        <div class="benefit-icon">
                            <img src="{{ asset('public/assets/live_classes.png') }}" width="90px" alt="Live Classes" class="benefit-icon-img">
                        </div>
                        <h3>Pass-Rate Guarantee</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="sec-2">
        <div class="container p-lg-5 p-3">
            <div class="row px-xl-5 main-content-feature align-items-center">
                <div class="col-md-5 px-md-0">
                    <div class="content-features p-lg-5 px-4 py-4">
                        <div class="content-features1 px-md-2">
                            <h2 class="content-features-h font-weight-bold">TUTOR & MENTOR</h2>
                            <h6 class="text-capitalize">Don't Just Study for the NCLEX-RN, Excel With It!</h6>
                            <p class="content-features-p">Elevate your nursing education with Merkaii Xcellence Prep's
                                personalized tutoring and mentorship. Achieve your academic goals, conquer Nursing School
                                Courses and Exams, NCLEX- RN & PN, HESI, TEAS, ATI, other Healthcare Exams and unlock a
                                fulfilling nursing career.</p>
                            <a href="{{ route('instructors') }}#instructors-custom-heading" ><button class="content-features-btn mt-lg-3">Let's get started today!</button></a>
                        </div>
                    </div>
                </div>
                <div id="content-container" class="col-md-7 content-feature mt-4 mt-md-0 d-flex flex-column justify-content-xl-center">
                    <div class="row content-features2 px-md-4 px-3">
                        <div class="col-lg-6 col-12 px-2 content-feature1 hidden hidden-left">
                            <h2 class="content-features2-h font-weight-bold">01</h2>
                            <h5 class="content-features2-hh font-weight-bold">Ignite Your Nursing Passion
                            </h5>
                            <p class="content-features2-p">Our expert tutors go beyond textbooks, to empowering you to reach your full potential. </p>
                        </div>
                        <div class="col-lg-6 col-12 px-2 content-feature1 hidden hidden-right">
                            <h2 class="content-features2-h font-weight-bold">02</h2>
                            <h5 class="content-features2-hh font-weight-bold">Conquer Test Anxiety
                            </h5>
                            <p class="content-features2-p">Overcome exam fear with our proven strategies. Ace the NCLEX-RN & PN.</p>

                        </div>
                    </div>

                    <div class="row content-features2 px-md-4 px-3">
                        <div class="col-lg-6 col-12 content-feature1 px-2 hidden hidden-left">
                            <h2 class="content-features2-h font-weight-bold">03
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Lost in Nursing Prep?
                            </h5>
                            <p class="content-features2-p">Find your path with our personalized tutoring. Conquer nursing courses and NCLEX exams with confidence.</p>
                        </div>
                        <div class="col-lg-6 col-12 content-feature1 px-2 hidden hidden-right">
                            <h2 class="content-features2-h font-weight-bold">04
                            </h2>
                           
                            <h5 class=" content-features2-hh font-weight-bold">Struggling in Nursing School?
                            </h5>
                            <p class="content-features2-p">We'll pinpoint your weaknesses, master the content, boost your understanding, and guide you to success.</p>
                        </div>

                    </div>

                    <div class="row content-features2 px-md-4 px-3">

                        <div class="col-lg-6 col-12 content-feature1 px-2 hidden hidden-left">

                            <h2 class="content-features2-h font-weight-bold">05
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Break Through Exam Barriers
                            </h5>
                            <p class="content-features2-p">Overcome HESI, TEAS, & ATI challenges. Achieve your healthcare career goals. </p>
                        </div>

                        <div class="col-lg-6 col-12 content-feature1 px-2 hidden hidden-right">
                            <h2 class="content-features2-h font-weight-bold">06
                            </h2>
                            <h5 class="content-features2-hh font-weight-bold">Navigating Nursing School?
                            </h5>
                            <p class="content-features2-p"> Let our mentors be your guide. Master nursing complexities and personal growth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    {{-- features end --}}

    {{-- component-call sec-3 --}}
    {{-- @elseif($block->id == 4) --}}

    {{-- @if ($homeContent->show_instructor_section == 1)
        <x-home-page-instructor-section :homeContent="$homeContent" />
    @endif --}}

    <section class="sec-3">
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center h-100 w-100 cta_area-row">
                <div class="col-lg-6 d-flex flex-column justify-content-center mx-auto cta_area-row1 w-100 px-0"
                    style="background-color: antiquewhite">
                    <div class="py-md-5 py-3 section__title text-white text-start px-3 px-lg-5 mx-0 cta_area_section"
                        id="section__title">
                        <h2 class="custom_small_heading large_title text-dark mb-lg-4 mb-2 font-weight-bold">
                            Ace Your NCLEX with Free Weekly Study Sessions
                            {{-- {{ @$homeContent->instructor_title }} --}}
                        </h2>
                        <p class="custom_small large_title text-dark mb-lg-4 mb-2">
                            Join our exclusive Adult Learners community of nursing students.<br>
                            Boost your exam prep with FREE WEEKLY NCLEX review sessions on Teams.<br>
                            Gain valuable insights, tips, and support from experienced instructors.<br> <br>
                            Subscribe to our Email List now to secure your spot.<br>
                            Don't miss out on this golden opportunity to boost your exam confidence.<br>
                        </p>
                        <div class="container-subscription mt-5 mb-2 mx-0">
                            <form action="{{ route('subscribe') }}" class="form" method="POST">
                                @csrf
                                <input type="email" class="sub_email" name="email" style="">
                                <button type="submit" class="subscribe_newsleter" style=" "><i
                                        class="fas fa-envelope" style="color: #ffffff;"></i> SUBSCRIBE</button>
                            </form>

                        </div>
                        {{-- <p class="mb-lg-4 mb-2 text-white ">
                            {{ @$homeContent->instructor_sub_title }}
                        </p> --}}
                        {{-- <a href="{{ url('pre-registration') }}" class="theme_btn mt-2 cta_btn py-2 px-4 ">
                        Create Your Account
                        {{ __('frontend.Find Our Instructor') }}
                        </a> --}}
                    </div>
                </div>

                <div class="col-lg-6 px-0">
                    <img src="{{ asset(@$homeContent->instructor_banner) }}" width="100%" height="100%"
                        style="object-fit-cover" alt="">
                </div>
            </div>
        </div>
    </section>

    @if (count($latest_programs) > 0 || count($latest_courses) > 0)
        {{-- Custom Slider by Arsam --}}
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
                                                {{-- <br> --}}
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
                                        {{-- <img src="https://demoapus2.com/edumy/wp-content/uploads/elementor/thumbs/301242-pe3njtkqt5gexzmb6f3gua5ab17rzk5a1ccdwchmj0.jpg"
                                    class="card-img" alt="..."> --}}
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
        {{-- Custom Slider End --}}
    @endif

    {{-- percent section --}}
    <section class="sec-5 percent-section">
        {{-- <div class=""> --}}
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
            {{-- </div> --}}
        </div>
    </section>

    <div class="custom_section_color mb-md-5 mb-4">
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
    </div>

    {{-- sec-6 about-page-section"testimonial" --}}
    <x-about-page-students-work />

    {{-- Map aboutus --}}

    {{-- <section class="sec-7">
        <div class="container p-lg-5 py-3">
            <div class="row about_us px-xl-5 justify-content-between">
                <div
                    class="col-md-6 col-xl-5 about_us_height d-flex justify-content-center align-items-center mb-3 mb-md-0">
                    <div class="about_us_p">
                        <i class="fa-regular fa-lightbulb fa-2x " style="color: var(--system_primery_color);"></i>
                        <h2 class="custom_small_heading font-weight-bold mb-4 at_Merkaii">AT Merkaii Xcellence</h2>
                        <h2 class="custom_small_heading font-weight-bold mb-4 at_Merkaii">WE ARE ADULT LEARNER-CENTRIC <br>
                            <span class="d-flex justify-content-center ml_span">and</span>EDUCATION IS FOR
                            EVERYONE
                        </h2>
                        <p class="mb-4 custom_paragraph">
                            At Merkaii Xcellence, we believe education is the key to unlocking potential, and that's why we
                            offer a variety of prep courses designed to fit diverse student body and learning styles. We
                            offer accessible learning pathways to fuel your passion for healthcare, regardless of
                            background, experience, or location. Merkaii Xcellence fosters a vibrant and supportive global
                            community where <span class="font-weight-bold">everyone can learn, grow, and achieve
                                their healthcare goals.</span>
                        </p>
                        <a href="{{ route('about') }}" class="learn_more font-weight-bold">Know More</a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-7 d-flex flex-md-column flex-lg-row justify-content-center about-image-main"
                    style="gap: 1rem">
                    <div class="col-6 col-md-11 col-lg-6 p-0 about-img about_us_img1 shadow">

                        <img src="{{ asset('public/assets/Untitled-1.png') }}" class="w-100 about_us_image">

                    </div>
                    <div class="col-6 col-md-11 col-lg-6 p-md-0 pl-0 about-img about_us_img2 shadow">

                        <img src="{{ asset('public/assets/About-Section7.jpg') }}" class=" w-100 about_us_image">

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- aboutus end --}}
    {{-- after-about-section --}}

    {{-- <section class="px-5 d-none">
        <div class="container">
            <div class="row mx-lg-2" style="overflow: hidden">
                <h2 class="col-12 text-center mb-5 font-weight-bold">Our Trusted Education Partners</h2>
                <div class=" row logos mx-4 swiper">
                    <div class="swiper-wrapper d-flex">
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column align-items-center my-2 px-0 "> <img
                                    src="{{ asset('/public/uploads/images/footerimg/cie.png') }}" class="logos-img">
                                <span class="logo-text text-center">CIE </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/falbon.png') }}" class="logos-img2">
                                <span class="logo-text text-center"> FLBON </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/fapsc.png') }}" class="logos-img3">
                                <span class="logo-text text-center"> FAPSC </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/miltery.png') }}"
                                    class="logos-img4"><span class="logo-text text-center"> Military Spouse</span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/career.png') }}"
                                    class="logos-img5"><span class="logo-text text-center"> Career Source </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/post.png') }}" class="logos-img">
                                <span class="logo-text text-center">Post 9/11 GI Bill </span>
                            </div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/national.png') }}"
                                    class="logos-img7"> <span class="logo-text text-center">National Healthcare
                                    Association </span></div>
                        </a>
                        <a href="" class="swiper-slide text-dark">
                            <div class="col d-flex flex-column  align-items-center my-2 px-0 swiper-slide"><img
                                    src="{{ asset('/public/uploads/images/footerimg/lakeland1.png') }}"
                                    class="logos-img8"><span class="logo-text text-center"> Lakeland General
                                    Hospital</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- call to action added by arsam  -->

    {{-- <section class="sec-8 online-learning d-flex align-items-center justify-content-center my-3">
        <div class="hidden hidden-left px-2">
            <h2 class="custom_small_heading text-white text-center font-weight-bold mb-md-4 mb-2">ADULT-LEARNER'S SUCCESS
            </h2>
            <h3 class="custom_small_heading text-white text-center font-weight-bold text-capitalize">Start your
                transformation with a
                single click.
                <br>
                LIMITED SEATS AVAILABLE!
            </h3>
            <p class="text-white text-center my-md-4 my-2">Prepare for Licensure: <a
                    href="{{ url('pre-registration') }}"><span class="font-weight-bold text-white">Apply Now
                    </span></a> Merkaii Xcellence Healthcare Remedial Program and Prep Courses</p>
            <div class="d-flex justify-content-center mt-2">
                <a href="{{ url('contact#contact-form-ankar') }}"><button class="custom-button-call-to-action">Contact
                        Admission Specialist</button></a>
            </div>
        </div>
    </section> --}}

    <!-- section-3b -->
    <section class="sec-9 py-5"
        style="background: linear-gradient(rgba(35, 7, 77, 0.8), rgba(35, 7, 77, 0.8)), url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1lZGljYWx8ZW58MHx8MHx8fDA%3D'); background-size: cover; background-position: center; color: white;">
        <div class="container for-backcolor-container p-lg-5 py-5">
            <div class="row align-items-center justify-content-left px-xl-5 for-backcolor-row py-5">
                {{-- <div class="col-lg-4 col-sm-12 for-main px-lg-2 mb-sm-3 mb-md-0">
                    <div>
                        <label class="for-label">WHY JOIN MERKAII XCELLENCE PREP</label>
                        <h2 class="custom_small_heading for-bold font-weight-bold">FLORIDA BOARD OF NURSING REMEDIAL
                            PROGRAM
                        </h2>
                        <h6>Struggling to Pass the NCLEX-RN After 3 Attempts? </h6>
                        <p class="for-para custom_paragraph mb-2">Taking the NCLEX-RN can be challenging, but it doesn't
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
                <div class="col-lg-8 for-main-2nd mt-md-4 mt-lg-0">
                    <div class="row for-main">
                        <div class="col-md-6">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/nclex_program.png') }}"
                                        class="h-100 w-100" style="object-fit: fill">
                                </div>
                                <div class="col-9 for-border ml-4">

                                    <h5 class="for-label1 font-weight-bold">Tired of NCLEX retakes? </h5>
                                    <p class="for-para custom_paragraph pr-2">Our program is your roadmap and escape route
                                        to successful RN career. </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 for-main">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/care-confidence2.png') }}"
                                        class="h-100 w-100" style="object-fit: fill">
                                </div>
                                <div class="col-9 for-border ml-4">
                                    <h5 class="for-label1 font-weight-bold">Feeling Defeated by NCLEX? </h5>
                                    <p class="for-para custom_paragraph pr-2">Our live-virtual Instructor-led program
                                        transforms test anxiety into patient care confidence. </p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row for-main">
                        <div class="col-md-6">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/dream-job.png') }}" class="h-100 w-100"
                                        style="object-fit: fill">
                                </div>
                                <div class="col-9 for-border ml-4">
                                    <h5 class="for-label1 font-weight-bold">NCLEX Blocking Your Dream Job?</h5>
                                    <p class="for-para custom_paragraph pr-2">Our Florida Board-approved program delivers
                                        results and fast-tracks your nursing career.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/gain-knowledge.png') }}"
                                        class="h-100 w-100" style="object-fit: fill">
                                </div>
                                <div class="col-9 for-border ml-4">

                                    <h5 class="for-label1 font-weight-bold">Conquer NCLEX Anxiety </h5>
                                    <p class="for-para custom_paragraph pr-2">Our supportive program empowers you to gain
                                        the knowledge and skills to pass with confidence. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row for-main">
                        <div class="col-md-6">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/strong-knowledge.png') }}"
                                        class="h-100 w-100" style="object-fit: fill">
                                </div>
                                <div class="col-9 for-border ml-4">

                                    <h5 class="for-label1 font-weight-bold">NCLEX-RN Proving Tough?
                                    </h5>
                                    <p class="for-para custom_paragraph pr-2">Our Florida Board-approved program pinpoints
                                        your weak spots and builds your strong nursing knowledge.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row for-element justify-content-center">

                                <div class="col-2 for-affordability">
                                    <img src="{{ asset('public/assets/remedial/ncxlex-code.png') }}" alt=""
                                        class="h-100 w-100" style="object-fit: fill;">
                                </div>
                                <div class="col-9 for-border ml-4">
                                    <h5 class="for-label1 font-weight-bold">Crack the NCLEX code
                                    </h5>
                                    <p class="for-para custom_paragraph pr-2">Our Florida Board-approved program provides
                                        clarity and confidence for exam success.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
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

    </section>
    <!-- section2 end -->


    @if (!empty($blocks))
        @foreach ($blocks as $block)
            @if ($block->id == 1)
                {{--
    <x-home-page-banner :homeContent="$homeContent" /> --}}
                {{-- Courses --}}
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


                    <!-- new_section_add -->
                    {{-- <section class="bg-light card-paddingx d-none">
                            @if (isset($latest_courses))
                                <div class="container">
                                    <div class="row text-center mb-4 main_row">
                                        <h2 class="font-weight-bold">Gain the Edge in Nursing School & Beyond</h2>
                                        <p class="custom_paragraph">Our comprehensive Prep Courses equip Adult-Learners to
                                            gain knowledge, sharpen skills, learn effective strategies and ace the NCLEX®
                                            you need to thrive.</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 card_height left-s-h-cls image_card p-2">
                                            <div class="prep_card left-card h-100 w-100" id="left-card">
                                                <div class="overlay h-100"></div>
                                                <div class="left-top-content">
                                                    <div class="widget-49-meeting-info" id="left-title-info"></div>
                                                    <div id="left-pro-title"></div>
                                                </div>
                                                <!-- left image start  -->
                                                <div class="left-content">
                                                    <p class="left-card-text font-weight-bolder mb-4 custom_paragraph"></p>

                                                    <div class="for-left"></div>
                                                </div>
                                                <!-- left image end  -->
                                            </div>
                                        </div>
                                        <!-- 1 -->

                                        @php
                                            $counter = 1;
                                        @endphp


                                        <div class="col-md-5 pr-md-0" id="right-cards">
                                            <div class="row">
                                                <div class="col-md-6 col-6 h-auto mb-2 mt-md-0 mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[0]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0111</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[0]->parent_id) ? $latest_courses[0]->parent->title : $latest_courses[0]->title }}
                                                            </p>
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[0]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[0]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[0]
                                                                                            ->requirements,
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
                                                                <a href="{{ !empty($latest_courses[0]->parent_id) ? courseDetailsUrl(@$latest_courses[0]->parent->id, @$latest_courses[0]->type, @$latest_courses[0]->parent->slug) . '?courseType=' . $latest_courses[0]->type : courseDetailsUrl(@$latest_courses[0]->id, @$latest_courses[0]->type, @$latest_courses[0]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[0]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[0]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[0]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[0]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[0]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[0]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    <!-- <small>
                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-clock"></i>

                                                                                                                                                                                                                                                                                                                                                                                    </small> -->

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[0]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- 2 -->
                                                <div
                                                    class="col-md-6 col-6 h-auto  mb-2 mt-md-0 mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[1]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0222</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[1]->parent_id) ? $latest_courses[1]->parent->title : $latest_courses[1]->title }}
                                                            </p>
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[1]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[1]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[1]
                                                                                            ->requirements,
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
                                                                <a href="{{ !empty($latest_courses[1]->parent_id) ? courseDetailsUrl(@$latest_courses[1]->parent->id, @$latest_courses[1]->type, @$latest_courses[1]->parent->slug) . '?courseType=' . $latest_courses[1]->type : courseDetailsUrl(@$latest_courses[1]->id, @$latest_courses[1]->type, @$latest_courses[1]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[1]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[1]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[1]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[1]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[1]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[1]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[1]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 3 -->
                                                <div class="col-md-6 col-6 h-auto  mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[2]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0333</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[2]->parent_id) ? $latest_courses[2]->parent->title : $latest_courses[2]->title }}
                                                            </p>
                                                            <!-- Container for .for-left content -->
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[2]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[2]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[2]
                                                                                            ->requirements,
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
                                                                <a href="{{ !empty($latest_courses[2]->parent_id) ? courseDetailsUrl(@$latest_courses[2]->parent->id, @$latest_courses[2]->type, @$latest_courses[2]->parent->slug) . '?courseType=' . $latest_courses[2]->type : courseDetailsUrl(@$latest_courses[2]->id, @$latest_courses[2]->type, @$latest_courses[2]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[2]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[2]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[2]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[2]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[2]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[2]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[2]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 4 -->
                                                <div class="col-md-6 col-6 h-auto mt-2 prep_card_height px-2">
                                                    <div class="prep_card" onmouseover="copyCardDataToLeftCard(this)">
                                                        <img class="prep_card-image"
                                                            src="{{ $latest_courses[3]->thumbnail }}" />
                                                        <div class="widget-49-meeting-info pr-2">
                                                            <span class="widget-49-pro-title">PRO-0444</span>
                                                        </div>
                                                        <div class="container px-0">
                                                            <p class="prep_card-text custom_paragraph">
                                                                {{ !empty($latest_courses[3]->parent_id) ? $latest_courses[3]->parent->title : $latest_courses[3]->title }}
                                                            </p>
                                                            <!-- Container for .for-left content -->
                                                            <div class="for-left">
                                                                <p class="prep-paragraph custom_paragraph"
                                                                    style="display: block;">
                                                                    @php
                                                                        $requirements = str_replace(
                                                                            '&nbsp;',
                                                                            ' ',
                                                                            htmlspecialchars_decode(
                                                                                strip_tags(
                                                                                    !empty(
                                                                                        $latest_courses[3]->parent_id
                                                                                    )
                                                                                        ? $latest_courses[3]->parent
                                                                                            ->requirements
                                                                                        : $latest_courses[3]
                                                                                            ->requirements,
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
                                                                <a href="{{ !empty($latest_courses[3]->parent_id) ? courseDetailsUrl(@$latest_courses[3]->parent->id, @$latest_courses[3]->type, @$latest_courses[3]->parent->slug) . '?courseType=' . $latest_courses[3]->type : courseDetailsUrl(@$latest_courses[3]->id, @$latest_courses[3]->type, @$latest_courses[3]->slug) }}"
                                                                    class="learn-more mr-2">Learn more</a><i
                                                                    class="fa fa-long-arrow-right"></i>
                                                                <div class="d-flex justify-content-between pt-2">
                                                                    <small>
                                                                        <i class="fa fa-book-open">
                                                                            @if ($latest_courses[3]->type == 1)
                                                                                {{ __('Course') }}
                                                                            @elseif($latest_courses[3]->type == 2)
                                                                                {{ __('Big Quiz') }}
                                                                            @elseif($latest_courses[3]->type == 4)
                                                                                {{ __('Full Course') }}
                                                                            @elseif($latest_courses[3]->type == 5)
                                                                                {{ __('Prep-Course (On-Demand)') }}
                                                                            @elseif($latest_courses[3]->type == 6)
                                                                                {{ __('Prep-Course (Live)') }}
                                                                            @elseif($latest_courses[3]->type == 8)
                                                                                {{ __('Repeat Course') }}
                                                                            @endif
                                                                        </i>

                                                                    </small>

                                                                    

                                                                    <small style="padding-right: 4px" class="">
                                                                        <i class="fa fa-dollar">
                                                                            {{ number_format($latest_courses[3]->price, 0) }}
                                                                        </i>

                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end4 -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
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
                        </section> --}}
                    <!-- new_section_hover_end -->

                    {{-- <div class="section-margin-y container g-0">
                            <div class="row g-0 mx-md-4 px-1">
                                <div class="col-md-12 text-center">
                                    <h2 class="font-weight-bold custom_heading_1">Healthcare Programs Options</h2>
                                    <p class="pb-3 custom_paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem exerc
                                        <br>
                                        voluptatibus neque et obcaecati asperiores! Praesentium magnam error veritatis
                                        adipisicing elit. Dolorem exerc
                                    </p>
                                </div>

                                @if (isset($latest_programs))
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($latest_programs as $latest_program)
                                 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 d-flex my-2 px-2"
                                    data-aos-delay="{{ $counter * 500 }}" data-aos="fade-down">
                                    <div class="card rounded-card shadow">
                                        <div class="card-header rounded-card-header p-0 mw h-auto">
                                            <a href="{{ route('programs.detail', [$latest_program->id]) }}">
                                                <img src="{{ getCourseImage($latest_program->icon) }}"
                                                    class="img-fluid img-cover w-100 h-auto rounded-card-img"></a>
                                        </div>
                                        <div class="card-body d-flex flex-column p-3">
                                            <h5 class="font-weight-bold">
                                                <a {{ route('programs.detail', [$latest_program->id]) }}>
                                                    {{ $latest_program->programtitle }}</a>
                                            </h5>
                                            <div class="paragraph_custom_height mt-auto pb-2">
                                                <p>
                                                    @php
                                                        $description = str_replace(
                                                            '&nbsp;',
                                                            ' ',
                                                            htmlspecialchars_decode(
                                                                strip_tags(
                                                                    $latest_program->discription,
                                                                ),
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
                                            <div class="d-flex justify-content-between pt-2">
                                                <small>
                                                    <i class="fa fa-book-open"></i>
                                                    {{ count(json_decode($latest_program->allcourses)) }}
                                                    Courses
                                                </small>

                                                <small>
                                                    <i class="fas fa-clock"></i>
                                                    {{ $latest_program->duration }} weeks
                                                </small>

                                                <small class="">
                                                    <i class="fa fa-dollar"></i>
                                                    {{ $latest_program->currentProgramPlan[0]->amount }}
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
                                                                                                                                                                                                                                                                                                                                                        @if (count($latest_programs) == 0)
    <div class="col-lg-12">
            <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
            <div class="thumb">
            <img style="width: 50px" src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png"
            alt="">
            </div>
            <h1>
            {{ __('No Program Found') }}
            </h1>
            </div>
            </div>
            @endif
            </div>
            </div> --}}
                    <!-- <section>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-md-12">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <img src="{{ asset('public/frontend/infixlmstheme/img/images/WE_ARE_HERE_TO_LISTEN.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    alt="" class="img-fluid w-100">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </section> -->
                    {{-- How to Buy --}}
                    {{-- hide from all screen --}}
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

                <!-- new slider -->

                {{-- @include(theme('pages.reviews')) --}}


                {{-- Learning More --}}
                {{-- @elseif($block->id == 4)
                    @if ($homeContent->show_instructor_section == 1)
                        <x-home-page-instructor-section :homeContent="$homeContent" />
                    @endif --}}




                {{-- <section class="custom_section_color py-5">
        <div class="container" style="padding-top: 60px;">
            <div class="row mx-md-4">
                <div class="col-md-12">
                    <div class="mt-4 pb-2 text-center">
                        <h2 class="custom_heading_1 font-weight-bold">
                            What Our happy Students Say
                        </h2>
                        <p class="custom_paragraph">
                            The world’s largest selection of courses choose from 130,000 online video
                            courses
                            <br>with
                            new additions published every month
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($latest_course_reveiws as $course_reveiw)
                <!-- 1 -->
                <div class="swiper-slide" style="">
                    <div class="card card-review p-3">
                        <div class="row content d-flex justify-content-between">

                            <div class="col-md-4 image">
                                <img src="{{ asset($course_reveiw->user->image) }}"
                                    alt="{{ $course_reveiw->user->name }}" class="rounded-circle img-fluid">
                            </div>
                            <div class="col-md-8 heading d-flex flex-column justify-content-center">{{
                                $course_reveiw->user->name }}
                                <div class="text-warning">
                                    @php
                                    $main_stars = $course_reveiw->star;
                                    $stars = intval($course_reveiw->star);
                                    @endphp
                                    @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($main_stars > $stars)
                                        <i class="fas fa-star-half"></i>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="paragraph font-italic">
                            {{ $course_reveiw->comment }}
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}


                {{-- <section class="custom_section_color">
        <div class="container" style="padding-top: 60px; padding-bottom: 60px;">
            <div class="row mx-md-4">
                <div class="col-md-12">
                    <div class="mt-4 pb-2 text-center">
                        <h2 class="custom_heading_1 font-weight-bold">
                            What Our happy Students Say
                        </h2>
                        <p>
                            The world’s largest selection of courses choose from 130,000 online video
                            courses
                            <br>with
                            new additions published every month
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mx-md-4 justify-content-center pb-5 pt-2">

                @foreach ($latest_course_reveiws as $course_reveiw)
                <div class="col-md-4">
                    <div class="zakana" style="">
                        <div class="p-3">
                            <div class="card rounded-card p-3 shadow">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset($course_reveiw->user->image) }}"
                                            class="rounded-circle img-fluid mx-auto"
                                            style="width: 77px; height: 77px;" />
                                    </div>
                                    <div class="reviews col-md-8 d-flex flex-column justify-content-center">
                                        <p class="font-weight-bold">{{ $course_reveiw->user->name }}</p>
                                        <div class="text-warning">
                                            @php
                                            $main_stars = $course_reveiw->star;
                                            $stars = intval($course_reveiw->star);
                                            @endphp
                                            @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                                @endfor
                                                @if ($main_stars > $stars)
                                                <i class="fas fa-star-half"></i>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 font-italic mt-3">
                                        <p>"{!! $course_reveiw->comment !!}"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
            @elseif($block->id == 8)
                @if ($homeContent->show_testimonial_section == 1)
                    {{--
    <x-home-page-testimonial-section :homeContent="$homeContent" /> --}}
                @endif
                {{-- <div class="row p-2" style="background: rgb(240 246 251);">
        <div class="col-md-12">
            <div class="ourprogram mt-4 pb-2 text-center">
                <h1 class="custom_heading_1 font-weight-bold">
                    What Our Student Have To <br> Say</h1>
                <p style="font-size:19px;">
                    The world’s largest selection of courses choose from 130,000 online video courses
                    <br>with
                    new additions published every month
                </p>
            </div>
        </div>
    </div> --}}
                {{-- <div class="row zakana m-0 py-4" style="background: rgb(240 246 251); justify-content: space-around; ">
        @foreach ($latest_course_reveiws as $course_reveiw)
        <div class="col-md-12">
            <div class="row m-0 p-4">
                <div class="col-md-12 col-sm-6 bg-white" style="border-radius: 7px;">
                    <div class="row p-5">
                        <div class="col-md-2">
                            <div class="image mt-2">
                                <img src="{{ asset($course_reveiw->user->image) }}"
                                    style="width: 77px; height: 77px; border-radius: 50%;" />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="para m-3 mt-3 px-3">
                                <p style="font-weight: bold;">{{ $course_reveiw->user->name }}</p>
                                @php
                                $main_stars = $course_reveiw->star;
                                $stars = intval($course_reveiw->star);
                                @endphp
                                @for ($i = 0; $i < $stars; $i++) <i class="fas fa-star"></i>
                                    @endfor
                                    @if ($main_stars > $stars)
                                    <i class="fas fa-star-half"></i>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p>
                                {!! $course_reveiw->comment !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}
                {{-- <div class="col-md-12"> --}}
                {{-- <div class="row m-0 p-4"> --}}
                {{-- <div class="col-md-12 bg-white" style="border-radius: 7px;"> --}}
                {{-- <div class="row p-5"> --}}
                {{-- <div class="col-md-2"> --}}
                {{-- <div class="image mt-2"> --}}
                {{-- <img src="{{ asset('public/assets/c2.jpg') }}" --}} {{--
                                    style="width: 77px; height: 77px; border-radius: 50%;" /> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-md-10"> --}}
                {{-- <div class="para m-3 mt-3 px-3"> --}}
                {{-- <p style="font-weight: bold;">Lorem Ipsum</p> --}}
                {{-- <p style="color: #373737;">Writer</p> --}}
                {{-- <i class="fa-sharp fa-solid fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}} {{--
                                    class="fa-sharp fa-solid d fa-star"></i><i --}}
                {{--
                                    class="fa-sharp fa-solid d fa-star"></i> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-md-12 mt-3"> --}}
                {{-- <p> --}}
                {{-- “Lorem Ipsum is simply dummy text of the printing and --}}
                {{-- typesetting industry. Lorem Ipsum has been the industry's --}}
                {{-- standard dummy text ever since the 1500s, when an unknown --}}
                {{-- printer took a galley of type and scrambled it to make a type --}}
                {{-- specimen book” --}}
                {{-- </p> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}


                {{--
    </div> --}}


                {{-- FAQS section --}}
                <section class="sec-10">
                    <div class="container py-5">
                        <div class="row faqs-row px-xl-5">
                            {{-- <div class="col-sm-7 shadow_row video-h-cls p-0">
                            <div class="video-container">
                                <video id="myVideo" class="h-100 w-100" style="object-fit: cover">
                                    <source src="{{ asset('/public/uploads/images/footerimg/ezgif-2-78802b2d5b.mp4') }}">
                                </video>
                                <div class="overlay-video"></div>
                                <div class="text-video-overlay" style="top: 0">

                                    <div class="d-flex text-center overlay-heading">
                                      <h2 class="font-weight-bold text-white">The Greatest Minds don't <br>Crumble Under Pressure<br> They Use it to Rise Higher</h2>
                                    </div>
                                  </div>
                                <div class="text-video-overlay" >

                                  <div class="d-flex text-center overlay-heading1">
                                    <h2 class="font-weight-bold text-white">Take a Tour of Merkaii Xcellence</h2>
                                  </div>
                                </div>
                                <div class="video-controls">
                                    <button onclick="togglePlayPause()" style="border: none">
                                        <i id="playPauseBtn" class="fa fa-play"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                            {{-- <div class="col-lg-8 col-md-12 shadow_row video-h-cls pr-2 mt-lg-0 mt-4">
                                <div class="video-container">
                                    <video id="myVideo" class="new-intro-video w-100">
                                        <source
                                            src="{{ asset('/public/uploads/images/footerimg/new-intro-video-com.mp4') }}">
                                    </video>
                                    <div class="overlay-video"></div>
                                    <div class="text-video-overlay top-center">
                                        <div class="d-flex justify-content-md-center text-md-center overlay-heading">
                                            <h2 class="font-weight-bold text-white text-md-center">The Greatest Minds don't
                                                Crumble Under
                                                Pressure<br> They Use it to Rise Higher</h2>
                                        </div>
                                    </div>
                                    <div class="text-video-overlay bottom-center">
                                        <div class="d-flex justify-content-md-center text-md-center overlay-heading1">
                                            <h2 class="font-weight-bold text-white text-md-center">Take a Tour of Merkaii
                                                Xcellence</h2>
                                        </div>
                                    </div>
                                    <div class="video-controls">
                                        <button onclick="togglePlayPause()" style="border: none">
                                            <i id="playPauseBtn" class="fa fa-play"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-12 col-md-12 mt-4 mt-lg-0 px-md-3">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <h2 class="section-header font-weight-bold m-0 p-3">ASK US
                                        ANYTHING: FAQs</h2>
                                    <div class="accordion p-sm-3 p-2">
                                        <!-- panel-about1 -->
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
                                {{-- <form method="POST" action="{{ route('contactMsgSubmit') }}" class="fe mx-4 mt-1">
                                <h2 class="custom_heading_1 font-weight-bold my-2 form_h1">Stay in Touch!</h2>
                                @csrf
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Phone #</label>
                                <input type="text" name="phone" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Zip Code</label>
                                <input type="text" name="zip" class="form-control form_sm mb-2" placeholder="">
                                <label for="" class="form-label">Select Program</label>
                                <select id="program" name="program" class="form-control form_sm mb-2"
                                    style="width: 100%" required>
                                    <option value="" selected>Select Program</option>
                                    <option value="REMEDIAL-RN(176 Hours)">REMEDIAL-RN(176 Hours)</option>
                                    <option value="Refresher-RM(Endorsement & inactive License)">
                                        Refresher-RM(Endorsement & inactive License)
                                    </option>
                                    <option value="NCLEX Refresher(Prep)">NCLEX Refresher(Prep)</option>
                                    <option value="CNA Exam Prep(Skills Testing)">CNA Exam Prep(Skills
                                        Testing)
                                    </option>
                                    <option value="Clinical-Proctor">Clinical-Proctor</option>
                                </select>
                                <label for="year" class="form-label mt-2">High School Grade Year</label>
                                <select id="years" name="year"
                                    class="form-control form_sm w-100 mb-2"style="width: 100%" required>
                                    <option value="" selected>Select Year</option>
                                    @php
                                        $years = range(date('Y'), 1950);
                                    @endphp
                                    @forelse ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @empty
                                        <option value="">No Year Found</option>
                                    @endforelse
                                </select>
                                <label for="message" class="form-label mt-2">Message</label>
                                <textarea name="message" class="form-control form_sm shadow_msg" rows="4" aria-required="true"
                                    aria-invalid="false" placeholder="" required style="resize: none"></textarea>
                                <div class="col-md-12 my-2 text-center">
                                    <button type="submit" class="theme_btn small_btn4">Submit</button>
                                </div>
                            </form> --}}
                                {{-- new form --}}
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

                {{-- stayin touchend --}}
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
                                {{-- new section --}}
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
                                                                    {{-- <div class="event-place">
                                <span><i class="fa fa-location-dot"></i></span>
                                <span>Yarra Park, UK</span>
                            </div> --}}
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
                                                    {{-- <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-toggle="pill" href="#Admission">Admission</a>
                                            </li> --}}
                                                </ul>
                                                <div class="eventsIcon"><i id="right"
                                                        class="fa-solid fa-angle-right"></i></div>
                                            </div>
                                            {{-- fortabs --}}
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

                                {{-- section tabssss --}}


                            </div>
                        </div>
                    </section>
                @endif
                <!-- <div class="row m-0 mt-5 shadow">
                                                                                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 bg-dark">
                                                                                                                                <div class="text-white">
                                                                                                                                <h2 class="custom_heading_1 font-weight-bold my-4 text-white">About Us</h2>
                                                                                                                                <p class="my-3 text-justify text-white">
                                                                                                                                MCOH is an inclusive and equitable enviroment that provides educational
                                                                                                                                oppturities for anyone seeking update their skill being a new career path and
                                                                                                                                enhance professional Skills </p>
                                                                                                                                <div class="mb-4 text-white">
                                                                                                                                <p class="locaton py-1 text-white">
                                                                                                                                    <i class="fi fi-rs-marker"></i>
                                                                                                                                    501 S. Florida Avenue<br>
                                                                                                                                    <span class="ml-4">Lakeland, FL 33801</span>
                                                                                                                                </p>
                                                                                                                                <p class="call py-1 text-white">
                                                                                                                                    <i class="fi fi-br-phone-call"></i>
                                                                                                                                    863-250-8764 | 347-525-1736
                                                                                                                                </p>
                                                                                                                                <p class="time py-1 text-white">
                                                                                                                                    <i class="fi fi-rs-clock-three"></i>
                                                                                                                                    Mon - Thur: 8:30 AM - 7:00 PM
                                                                                                                                </p>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 custom_section_color p-0">
                                                                                                                                <form method="POST" action="{{ route('contactMsgSubmit') }}" class="fe mx-4 mt-2">
                                                                                                                                <h2 class="custom_heading_1 font-weight-bold my-4">Stay in Touch!</h2>
                                                                                                                                @csrf
                                                                                                                                <label for="name" class="form-label">Your Name</label>
                                                                                                                                <input type="text" name="name" class="form-control form_sm mb-2"
                                                                                                                                placeholder="">
                                                                                                                                <label for="" class="form-label">Email Address</label>
                                                                                                                                <input type="email" name="email" class="form-control form_sm mb-2"
                                                                                                                                placeholder="">
                                                                                                                                <label for="" class="form-label">Phone #</label>
                                                                                                                                <input type="text" name="phone" class="form-control form_sm mb-2"
                                                                                                                                placeholder="">
                                                                                                                                <label for="" class="form-label">Zip Code</label>
                                                                                                                                <input type="text" name="zip" class="form-control form_sm mb-2"
                                                                                                                                placeholder="">
                                                                                                                                <label for="" class="form-label">Select Program</label>
                                                                                                                                <select id="program" name="program" class="form-control form_sm mb-2" required>
                                                                                                                                <option value="" selected>Select Program</option>
                                                                                                                                <option value="REMEDIAL-RN(176 Hours)">REMEDIAL-RN(176 Hours)</option>
                                                                                                                                <option value="Refresher-RM(Endorsement & inactive License)">
                                                                                                                                    Refresher-RM(Endorsement & inactive License)
                                                                                                                                </option>
                                                                                                                                <option value="NCLEX Refresher(Prep)">NCLEX Refresher(Prep)</option>
                                                                                                                                <option value="CNA Exam Prep(Skills Testing)">CNA Exam Prep(Skills
                                                                                                                                    Testing)
                                                                                                                                </option>
                                                                                                                                <option value="Clinical-Proctor">Clinical-Proctor</option>
                                                                                                                                </select>
                                                                                                                                <label for="year" class="form-label mt-2">High School Grade Year</label>
                                                                                                                                <select id="years" name="year" class="form-control form_sm w-100 mb-2"
                                                                                                                                required>
                                                                                                                                <option value="" selected>Select Year</option>
                                                                                                                                @php
                                                                                                                                    $years = range(
                                                                                                                                        date(
                                                                                                                                            'Y',
                                                                                                                                        ),
                                                                                                                                        1950,
                                                                                                                                    );
                                                                                                                                @endphp
                                                                                                                                @forelse ($years as $year)
    <option value="{{ $year }}">{{ $year }}</option>
    @empty
                                                                                                                                <option value="">No Year Found</option>
    @endforelse
                                                                                                                                    </select>
                                                                                                                                    <label for="message" class="form-label mt-2">Message</label>
                                                                                                                                    <textarea name="message" class="form-control form_sm" rows="4" aria-required="true" aria-invalid="false"
                                                                                                                                        placeholder="" required style="resize: none"></textarea>
                                                                                                                                    <div class="col-md-12 my-3 text-center">
                                                                                                                                        <button type="submit" class="theme_btn small_btn4">Submit</button>
                                                                                                                                    </div>
                                                                                                                                </form>
                                                                                                                                </div>
                                                                                                                                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-lg-block d-md-block p-0">

                                                                                                                                <div class="video1" onclick="homeVideo()">
                                                                                                                                    <div class="vidicons m-auto">
                                                                                                                                        <i class="fa-solid fa-play"></i>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                </div>
                                                                                                                                -->


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
                </div>


                <!-- new section -->
                <section class="sec-12 pb-3" id="stay-in-touch">
                    <div class="container-fluid mintban px-lg-5 my-lg-5 my-4">
                        <div class="container mintban_row d-flex justify-content-center">
                            {{-- <div class="col-md-12 mb-5">
            <div class="row "> --}}
                            <div class="row flowdiv ">
                                {{-- <div class="row m-0" style=""> --}}
                                {{-- <div class="col-lg-4 col-md-6 my-3 my-lg-0 ankar flowdiv-ele">

                                    <div class="dataflow p-2 text-white d-flex justify-content-center align-items-center">
                                        <div class="eltdf-eh-item-content eltdf-eh-custom-5500 py-3 py-md-0 px-sm-4 px-2">
                                            <div class="cta_service_info txt py-3">
                                                <h2 class="custom_small_heading mb-4">Become a MCInstructor | Tutor</h2>
                                                <p class="mb-4"> Make a difference in the lives of future generations:
                                                    Merkaii Xcellence seeks
                                                    passionate
                                                    educators. Our students come from a variety of backgrounds, and so can
                                                    you. Share
                                                    your expertise, be it industry knowledge, academic prowess, or
                                                    real-world
                                                    experience.
                                                </p>
                                                <a href="{{ url('/instructors') }}"
                                                    class="theme_btn small_btn py-2 px-4">MC
                                                    Instructor</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- <div class="col-sm-6 ankar col-md-6 p-0" >
                                                                                                                                                                                             </div> -->
                                {{-- form-add --}}
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
                                                    {{-- <input type="date" class="outside" name="year" id="contactYr"/> --}}
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

                                {{-- form-end --}}
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
                                {{-- </div> --}}
                            </div>
                        </div>
                        {{--
        </div> --}}
                        {{-- </div> --}}
                    </div>
                </section>




                @include(theme('partials._custom_footer'))
            @elseif($block->id == 16)
                {{-- @if ($homeContent->show_how_to_buy == 1)
<x-home-page-how-to-buy :homeContent="$homeContent" />
@endif --}}
            @elseif($block->id == 17)
                {{-- @if ($homeContent->show_home_page_faq == 1)
<x-home-page-faq :homeContent="$homeContent" />
@endif --}}
            @endif
        @endforeach
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="path/to/swiper.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    {{-- for scroll --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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

        // AOS.init({
        //     duration: 1000,
        // });

        $(document).ready(function() {
            $('#years').select2();
            $('#program').select2();

            // var first_div = $('.first_div');
            // var second_div = $('.second_div');
            // var random_program = $('#random_programs');
            var url = '{{ route('getRandomProgram') }}';
            var random_program_data = '';
            // setInterval(() => {
            $.ajax({
                type: "GET",
                url: url,
                // data: "null",
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

    {{-- <script src="{{ asset('public/assets/popper.js') }}"></script>
<script src="{{ asset('public/assets/owl.carousel.min.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
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

    <script>
        // $('.zakana').slick({
        //     lazyLoad: 'ondemand',
        //     slidesToShow: 2,
        //     slidesToScroll: 1,
        //     infinite: true,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     // dots: false,
        //     // prevArrow: false,
        //     // nextArrow: false
        //     arrows: true,

        //     responsive: [{
        //             breakpoint: 992,
        //             settings: {
        //                 arrows: false,
        //                 centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 768,
        //             settings: {
        //                 arrows: true,
        //                 centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 576,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 320,
        //             settings: {
        //                 arrows: true,
        //                 // centerMode: true,
        //                 // centerPadding: '40px',
        //                 slidesToShow: 1
        //             }
        //         }
        //     ]
        // });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        (function($) {
            "use strict";

            var fullHeight = function() {
                $(".js-fullheight").css("height", $(window).height());
                $(window).resize(function() {
                    $(".js-fullheight").css("height", $(window).height());
                });
            };
            fullHeight();

            var carousel = function() {

                $(".owl-carousel").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    // navigation : true,

                    margin: 30,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    nav: true,
                    dots: false,
                    // autoplayHoverPause: false,
                    items: 1,
                    // navText: [
                    //   "<p><small>Prev</small><span class='ion-ios-arrow-round-back'></span></p>",
                    //   "<p><small>Next</small><span class='ion-ios-arrow-round-forward'></span></p>",
                    // ],

                    // responsive: {
                    //   0: {
                    //     items: 1,
                    //   },
                    //   600: {
                    //     items: 1,
                    //   },
                    //   1000: {
                    //     items: 1,
                    //   },
                    // },
                });
            };
            carousel();
        })(jQuery);
        // jQuery(document).ready(function($) {
        // $('.owl-carousel').find('.owl-nav').removeClass('disabled');
        //     $('.owl-carousel').on('changed.owl.carousel', function(event) {
        //         $(this).find('.owl-nav').removeClass('disabled');
        //     });
        // });


        //         $(document).ready(function(){
        //     $(window).scroll(function(){
        //         $(".custom_form").css( "transform": "translateY(-100%)",
        //             "opacity": 0).animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //         $(".dataflow").css("transform", "translateY(-100%)").animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //         $(".ankar_eltdf").css("transform", "translateY(-100%)").animate({
        //             transform: 'translateY(0)'
        //         }, 500);
        //     });
        // });
    </script>
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
        // var video = document.getElementById("myVideo");
        // var playPauseBtn = document.getElementById("playPauseBtn");
        // var videoContainer = document.querySelector(".video-container");
        // var overlay = document.querySelector(".overlay-video");
        // var textOverlays = document.querySelectorAll(".text-video-overlay");
        // var videoControls = document.querySelector(".video-controls");

        // function togglePlayPause() {
        //     if (video.paused) {
        //         video.play();
        //         playPauseBtn.querySelector("i").classList.remove("fa-play");
        //         playPauseBtn.querySelector("i").classList.add("fa-pause");
        //         hideOverlay();
        //         hideTextAndButton();
        //         videoContainer.classList.add("video-playing");
        //     } else {
        //         video.pause();
        //         playPauseBtn.querySelector("i").classList.remove("fa-pause");
        //         playPauseBtn.querySelector("i").classList.add("fa-play");
        //         showTextAndButton();
        //         videoContainer.classList.remove("video-playing");
        //     }
        // }

        // document.body.addEventListener("mouseenter", function(event) {
        //     if (videoContainer.contains(event.target) && event.target !== playPauseBtn) {
        //         showOverlay();
        //         showTextAndButton();
        //     }
        // });

        // videoContainer.addEventListener("mouseenter", function(event) {
        //     togglePlayPause();
        // });

        // playPauseBtn.addEventListener("mouseenter", function(event) {
        //     togglePlayPause();
        // });

        // function hideOverlay() {
        //     overlay.style.opacity = "0";
        // }

        // function showOverlay() {
        //     overlay.style.opacity = "1";
        // }

        // function hideTextAndButton() {
        //     playPauseBtn.style.opacity = "1";
        //     textOverlays.forEach(function(overlay) {
        //         overlay.style.opacity = "0";
        //     });
        //     videoControls.style.opacity = "0";
        // }

        // function showTextAndButton() {
        //     playPauseBtn.style.opacity = "1";
        //     textOverlays.forEach(function(overlay) {
        //         overlay.style.opacity = "1";
        //     });
        //     videoControls.style.opacity = "1";
        // }

        // video.addEventListener("click", function() {
        //     if (video.paused) {
        //         togglePlayPause();
        //     } else {
        //         showTextAndButton();
        //     }
        // });

        // video.addEventListener("play", function() {
        //     hideOverlay();
        //     hideTextAndButton();
        // });
        // video.addEventListener("pause", function() {
        //     showTextAndButton();
        //     showOverlay();
        // });
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
