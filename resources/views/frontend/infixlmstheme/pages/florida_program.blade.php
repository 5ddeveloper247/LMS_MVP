@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Teach With Us') }}
@endsection
{{-- @section('css') --}}
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/slick/slick-theme.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

{{-- slider-timeline --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .card-custom {
        border: none;
        border-radius: 15px !important;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.4s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-custom:hover {
        transform: translateY(-8px);
    }

    /* .card-custom:hover h5 {
        color: #000 !important;
    }

    .card-custom:hover p {
        color: white !important;
    } */

    .icon {
        font-size: 2rem;
        color: #007bff;
    }

    .highlight-heading {
        font-weight: bold;
        color: #007bff;
    }

    .card-custom-body {
        padding: 20px;
        flex-grow: 1;
    }

    /* Ensure only this card has the hover effect */
    /* .hover-bg {
        position: relative;
        overflow: hidden;
    }

    .hover-bg::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -100%;
        width: 100%;
        height: 100%;
        background-color: #ff7619e0;
        z-index: 0;
        transition: all 1s ease;
    } */

    .hover-bg:hover::before {
        bottom: 0;
    }

    /* Ensure card content is on top of the hover effect */
    .card-custom-body {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 20rem;
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
        clip-path: polygon(0% 0, 75% 0, 100% 100%, 0 100%);
    }

    .percent-h {
        color: var(--system_secendory_color);
        font-weight: 700;
    }

    .percent1 {
        margin: 0 0px 1.5rem -94px;
        /* margin: 0 -132px 1.5rem 160px; */
    }

    .percent2 {
        margin: 0 0px 1.5rem -50px;
        /* margin: 0 -100px 1.5rem 104px; */
    }

    .percent3 {
        margin: 0 0px 1.5rem 0px;
        /* margin: 0 -63px 1.5rem 50px; */
    }

    .percent4 {
        margin: 0 -6px 1.5rem 45px;
        /* margin: 0 -6px 1.5rem -8px; */
    }

    .percent {
        margin-right: 30px !important;
        color: var(--system_primery_color);
    }

    /* .percent1 {
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
    } */

    .percent {
        margin-right: 30px !important;
        color: var(--system_primery_color);
    }

    .accordion-new-item {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
    }

    .accordion-section {
        padding-bottom: 3rem;
    }

    .custom_height_accordion {
        height: 470px;
        width: 70%;
        ;
        position: relative;
    }

    .accordion-border-orange {
        border: 1px solid var(--system_primery_color);
        background: var(--system_primery_color);
        position: absolute;
        top: 55%;
        height: 300px;
        text-align: center;
        padding: 20px;
        left: 40%;
        color: white;
        overflow: auto;
    }

    .accordion-button {
        width: 100%;
        border: none;
        padding: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: bold;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }

    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");

    }

    .accordion-content {
        display: none;
        padding: 10px;
    }

    .accordion-content p {
        margin: 0;
    }

    .acc-btn1::after {
        background-color: #b2dfcc !important;
        background-position: center;
        padding: 25px;
    }

    .acc-btn2::after {
        background-color: #4ea6c88f !important;
        background-position: center;
        padding: 25px;
    }

    .acc-btn3::after {
        background-color: #d1a9d182 !important;
        background-position: center;
        padding: 25px;
    }

    .acc-btn1 {
        background-color: #4ea982 !important;
        color: #373737 !important;
    }

    .acc-btn2 {
        background-color: var(--system_secendory_color) !important;
        color: #373737 !important;
    }

    .acc-btn3 {
        background-color: var(--footer_background_color) !important;
        color: #373737 !important;
    }

    .acc-cnt1 {
        background-color: #b2dfcc !important;
    }

    .acc-cnt2 {
        background-color: #4ea6c88f !important;
    }

    .acc-cnt3 {
        background-color: #d1a9d182 !important;
    }

    .accordion-button:not(.collapsed)::after {
        color: #fdfbfb;
        transform: rotate(0deg) !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    @media only screen and (max-width: 768.5px) {
        .accordion-section {
            padding-bottom: 8rem !important;
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

        .custom_height_accordion {
            height: 300px !important;
        }

        .accordion-border-orange {
            height: 300px !important;
            overflow: auto;
        }

        .nclex-cardp {
            padding: 0px !important;
        }
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
        background-image: url('{{ asset(' /public/assets/Untitled design (40).png') }}');

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
        bottom: 7%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        color: white;
    }

    /* Text overlay styles */
    .text-overlay p {
        color: white;
    }

    .category_name {
        color: var(--system_primery_color);
    }

    .image-text {
        color: white;
    }

    /* Date overlay styles */
    .date-overlay {
        position: absolute;
        top: 30px;
        right: 30px;
        background-color: white;
        padding: 5px 10px;
        border-radius: 5px;
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
        left: 30px;
        background: rgba(255, 255, 255, 0.5);
        padding: 5px 10px;
        border-radius: 10px;
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

    .custom-card .card-img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 20px;
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
        bottom: 5%;
        /* left: 30px; */
        color: white;
    }

    .card-date {
        position: absolute;
        top: 35px;
        left: 30px;
        font-size: 12.5px;
    }

    .card-date2 {
        position: absolute;
        top: 35px;
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
        background-image: url('{{ asset(' /public/assets/Section8-Transformation.jpg') }}');
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

    .section-heading {
        font-weight: bold;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 1.5rem;
    }

    .cta-btn {
        background-color: #007bff;
        color: white;
        margin-top: 20px;
    }

    .cta-btn:hover {
        background-color: #0056b3;
    }

    .nclex-section-heading {
        font-weight: bold;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .nclex-card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .nclex-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .nclex-card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .nclex-program-title {
        font-weight: bold;
        font-size: 1.4rem;
        margin-bottom: 15px;
    }

    .nclex-program-content {
        font-size: 1rem;
        margin-bottom: auto;
    }

    .equal-height-row {
        display: flex;
        flex-wrap: wrap;
    }

    .equal-height-row .col-md-4 {
        display: flex;
    }

    .main-container {
        padding: 50px;
    }

    .nclex-header {
        font-size: 2.5rem;
        font-weight: 700;
        color: #343a40;
        text-align: center;
        margin-bottom: 40px;
    }

    .nclex-intro {
        color: #495057;
        margin-bottom: 30px;
    }

    .nclex-card {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        flex-grow: 1;
        /* Makes the cards take up the same height */
    }

    .nclex-card:hover {
        transform: translateY(-10px);
    }

    .nclex-card h4 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #0056b3;
        margin-bottom: 15px;
    }

    .nclex-card ul {
        list-style-type: none;
        padding-left: 0;
    }

    .nclex-card li {
        color: #6c757d;
        margin-bottom: 10px;
    }

    .nclex-row {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: stretch;
        /* Ensures all cards stretch to the same height */
    }

    .nclex-col {
        /* flex: 0 0 48%; */
        margin-bottom: 30px;
        display: flex;
    }

    .bg-full-nclex-card {
        background-color: #b2dfcc;
    }

    .benefits-remeditaion {
        position: relative;
        justify-content: center;
        align-items: center;
        background-image: url({{ asset('/public/uploads/images/footerimg/testimonial.jpg') }});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    @media only screen and (max-width: 767.5px) {
        .custom_text_small {
            font-size: 14px;
        }

        .accordion-section {
            padding-bottom: 8rem !important;
        }
    }

    @media only screen and (max-width: 565.5px) {
        .custom_height_accordion {
            width: auto !important;
        }

        .accordion-border-orange {
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
        }

        .accordion-section {
            padding-bottom: 0px !important
        }

        .nclex-header {
            margin-bottom: 0px !important;
        }
    }

    .fw-semibold {
        font-weight: 600;
    }

    .object-fit-cover {
        object-fit: cover
    }

    .d-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));

        .cus-h {
            max-height: 500px;
            overflow-y: auto;
            scrollbar-width: none;
        }
    }

    @media (min-width: 1500px) {
        .d-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        }
    }

    @media (min-width: 1800px) {
        .d-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
        }
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
        gap: 30px;
    }

    .c-even {
        background-color: var(--cyan) !important;

        p {
            color: #fff !important
        }
    }

    .c-odd {
        background-color: var(--teal) !important;

        h5 {
            color: #fff !important
        }

        p {
            color: #fff !important
        }
    }

    .work_flow {
        gap: 80px
    }

    @media (min-width: 1500px) {
        .work_flow {
            gap: 180px
        }
    }

    @keyframes anime {
        from {
            transform: translateX(-35%)
        }

        to {
            transform: translateX(0%)
        }
    }

    .sliding_auto {
        animation: anime 10s linear alternate-reverse infinite;
    }

    .sliding_auto:hover {
        animation-play-state: paused;
    }
    .need_to_learn::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color:#20c9978c;
    }
    .need_to_learn{
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .col-lg-6 {
        margin: 0 !important
    }


    /* ===============BANNER============== */
    .breadcrumb_area {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100% !important;
        text-align: center;
    }

    .breadcrumb_area:before {
        display: none
    }

    .breadcrumb_area:after {
        content: "";
        position: absolute;
        top: 0; 
        left: 0;
        height: 100%;
        width: 100%;
        background: #2ca6a49d !important;
    }

    .breadcam_wrap {
        padding: 0 !important;
        position: relative;
        z-index: 99
    }

    .breadcam_wrap h1, .breadcam_wrap p {
        text-shadow: 1px 0px 5px #737373;
    }

    h1, h2 {
        font-family: "Inter" !important;
        font-weight: 600 !important;
    }

    h2 {
        font-size: clamp(1.3rem, 4vw, 2.5rem) !important;
        font-family: "Rubik" !important;
        font-weight: 600 !important;
    }

    p, a {
        font-family: "Rubik" !important;
    }

    .breadcrumb_area a {
        border-radius: 50px !important;
        font-weight: 400 !important
    }

    li {
        font-family: "Inter" !important;
        font-size: clamp(14px, 1.5vw, 18px) !important;
        font-weight: 500
    }
</style>
@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0 inter">
                @php
                    $banner_title = 'New Page';
                    $banner_image = 'public/frontend/infixlmstheme/img/images/courses-4.jpg';
                    $btn_title = auth()->check() ? '' : 'Sell With Us';
                    $sub_title = 'YOUR COMEBACK STARTS HERE';
                @endphp
                <x-breadcrumb :title="$banner_title" :btntitle="$btn_title" :sub_title="$sub_title" :btnclass="'hit openModal'" />
            </div>
        </div>

        {{-- =============== FLORIDA BOARD OF NURSING REMEDIATION ================= --}}
        <section style="background-image: url('{{ asset('public/assets/program-bg.png') }}'); background-size: 100%; background-repeat: no-repeat;">
            <div class="container px-lg-5 py-5">
                <div class="row justify-content-between py-5 px-xl-5 px-3">
                    <div data-aos="fade-left" class="col-md-6">
                        <div class="text-start">
                            <h2>Why This Program</h2>
                            <p class="text-muted inter">
                                Access free study tips, expert guides, webinars, and blog posts — all designed
                                to support your learning journey. Plus, unlock your free Study Resource Kit
                                when you join our community.
                            </p>
                        </div>

                        <ul class="mt-3">
                            <li class="mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="25" alt="">
                                Florida BON-Approved Program 
                            </li>

                            <li class="mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="25" alt="">
                                For students who failed 3x or more 
                            </li>

                            <li class="mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="25" alt="">
                                NCLEX-RN and NCLEX-PN coverage
                            </li>

                            <li class="mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="25" alt="">
                                Online and Hybrid Options
                            </li>

                            <li class="mb-4">
                                <img src="https://cdn-icons-png.flaticon.com/128/10096/10096560.png" width="25" alt="">
                                Personal tutor & remediation mentor
                            </li>
                        </ul>
                    </div>
    
                    <div data-aos="fade-right" class="col-md-6 col-lg-5 text-end">
                        <img src="{{ asset('public/assets/comunity-right.png') }}" width="90%" alt="">
                    </div>
                </div>
            </div>
        </section>
        
        {{-- <div class="container px-lg-5 teach_offer">
            <div class="row py-md-5 pt-md-0 pt-3 px-xl-5 px-3">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_small_heading mb-md-5 mb-3 text-capitalize"> FLORIDA BOARD OF NURSING
                        REMEDIATION</h2>
                </div>

                <div data-aos="fade-left" class="col-md-6 col-12 my-auto px-lg-1 teach_offer2">
                    <div class="px-xl-3 custom_height_2 mb-3 mb-md-0">
                        <h5 class="mb-3 percent-h custom_text_small">Transform Your NCLEX Journey.</h5>
                        <p class="mb-lg-4 mb-3">
                            If you are a nursing graduate faced with challenges passing the NCLEX exam after multiple
                            attempts, don't be disheartened. Every setback is an opportunity for a comeback.
                        </p>

                        <p class="mb-lg-4 mb-3">
                            Merakii’s (MCOH) Florida Board of Nursing-Approved NCLEX Remediation Prep Program is tailored
                            for those who’ve faced the NCLEX multiple times without success, and who are determined to
                            retake the NCLEX exam and succeed.
                        </p>

                        <p class="mb-lg-4 mb-3">
                            This comprehensive Program includes 80 hours of informative content lectures, and 96 clinical
                            hours. It is designed to provide a structured, supportive environment where graduate nurses can
                            rebuild confidence, fill in nursing knowledge gaps, and develop the skills needed to ace the
                            NCLEX exam.
                        </p>

                        <div class="d-flex align-items-center gap-4 justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2 p-3 w-100"
                                style="background-color: #f1f1f1; border-radius: 6px">
                                <div>
                                    <div class="p-2 d-flex align-items-center justify-content-center"
                                        style="height: 60px; width: 60px; border-radius: 50px; background-color: var(--cyan)">
                                        <img src="https://kodesolution.com/2019/skans/wp-content/uploads/2019/10/Layer-1.png"
                                            width="100%" alt="">
                                    </div>
                                </div>
                                <h6 class="mb-0 fw-semibold">Learn With Our Best Instructors</h6>
                            </div>

                            <div class="d-flex align-items-center gap-2 p-3 w-100"
                                style="background-color: #f1f1f1; border-radius: 6px">
                                <div>
                                    <div class="p-2 d-flex align-items-center justify-content-center"
                                        style="height: 60px; width: 60px; border-radius: 50px; background-color: var(--orange)">
                                        <img src="https://kodesolution.com/2019/skans/wp-content/uploads/2019/10/Layer-11.png"
                                            width="100%" alt="">
                                    </div>
                                </div>
                                <h6 class="mb-0 fw-semibold">Increase Your Knowledge Now</h6>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('programs') }}"
                                class="theme_btn small_btn text-center responsive-style-btn ">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-right" class="col-md-6 col-12 px-md-2 teach_offer1">
                    <div class="pb-4 pb-md-0">
                        <div class="row h-100">
                            <div class="col-6">
                                <img src="https://merkaiixcelprep.com/public/uploads/images/footerimg/fantasticopportunityimg.jpeg"
                                    height="500" width="100%"
                                    style="border-radius: 8px; object-fit: cover;">
                            </div>

                            <div class="col-6">
                                <img src="https://merkaiixcelprep.com/public/uploads/images/footerimg/astutorimg.jpeg"
                                    height="500" width="100%" style="border-radius: 8px; object-fit: cover; margin-top: -3rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- ______________________________________________________________________________  -->

        <div class="container px-lg-5">
            <div class="row percent-row px-xl-5 px-3">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_small_heading mb-3 mt-md-0 text-capitalize">Who Program Is For?</h2>
                </div>
            </div>

            <div class="d-grid px-xl-5 px-3">
                <div>
                    @if(isset($recent_program[0]))
                    <div data-aos="fade-right" class="row justify-content-left align-items-center p-3"
                        style="background-color: #996699; height: 375px !important;">
                        <h2 class="col-2 m-0 percent font-weight-bold">
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
                        <div class="col-10 percent_content1 cus-h">
                            <h5 class="percent-h custom_text_small text-white">{{$recent_program[0]['programtitle']}}</h5>
                            <p class="custom_paragraph percent-p text-white">{{$recent_program[0]['subtitle']}}</p>
                            <div class="d-flex gap-2 flex-column">
                                <p class="custom_paragraph percent-p text-white">
                                    <b>Duration:</b> 
                                    {{ $recent_program[0]['effective_program_plan'][0]['sdate'] }} to {{ $recent_program[0]['effective_program_plan'][0]['edate'] }}
                                    <br>
                                    <b>Price:</b> 
                                        {{showPrice($recent_program[0]['effective_program_plan'][0]['amount'])}}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-auto">

                            <a href="{{route('programs.detail',$recent_program[0]['id'])}}" class="theme_btn small_btn text-center responsive-style-btn ">Apply Now</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($recent_program[2]))
                    <div data-aos="fade-right" data-aos-delay="100"
                        class="row justify-content-left align-items-center p-3"
                        style="background-color: var(--teal); height: 375px !important;">
                        <h2 class="col-2 m-0 percent font-weight-bold">
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
                        <div class="col-10 percent_content2 cus-h">
                            <h5 class="percent-h custom_text_small text-white">{{$recent_program[2]['programtitle']}}</h5>
                            <p class="custom_paragraph percent-p text-white">{{$recent_program[2]['subtitle']}}</p>
                            <div class="d-flex gap-2 flex-column">
                                <p class="custom_paragraph percent-p text-white">
                                    <b>Duration:</b> 
                                    {{ $recent_program[2]['effective_program_plan'][0]['sdate'] }} to {{ $recent_program[2]['effective_program_plan'][0]['edate'] }}
                                    <br>
                                    <b>Price:</b> 
                                        {{showPrice($recent_program[2]['effective_program_plan'][0]['amount'])}}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-auto">

                            <a href="{{route('programs.detail',$recent_program[2]['id'])}}" class="theme_btn small_btn text-center responsive-style-btn ">Apply Now</a>
                        </div>
                    </div>
                    @endif
                </div>

                <div>
                    <img src="{{ asset('/public/uploads/images/footerimg/whoprogramisfor.png') }}"
                        style="height: 750px !important" class="w-100 object-fit-cover">
                </div>

                <div>
                    @if(isset($recent_program[1]))
                    <div data-aos="fade-right" data-aos-delay="200"
                        class="row justify-content-left align-items-center p-3"
                        style="background-color: var(--teal); height: 375px !important;">
                        <h2 class="col-2 m-0 percent font-weight-bold">
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
                        <div class="col-10 percent_content3 cus-h">
                            <h5 class="percent-h custom_text_small text-white">{{$recent_program[1]['programtitle']}}</h5>
                            <p class="custom_paragraph percent-p text-white">{{$recent_program[1]['subtitle']}}</p>
                            <div class="d-flex gap-2 flex-column">
                                <p class="custom_paragraph percent-p text-white">
                                    <b>Duration:</b> 
                                    {{ $recent_program[1]['effective_program_plan'][0]['sdate'] }} to {{ $recent_program[1]['effective_program_plan'][0]['edate'] }}
                                    <br>
                                    <b>Price:</b> 
                                        {{showPrice($recent_program[1]['effective_program_plan'][0]['amount'])}}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-auto">

                            <a href="{{route('programs.detail',$recent_program[1]['id'])}}" class="theme_btn small_btn text-center responsive-style-btn ">Apply Now</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($recent_program[3]))
                    <div data-aos="fade-right" data-aos-delay="300"
                        class="row justify-content-left align-items-center p-3"
                        style="background-color: #996699; height: 375px !important;">
                        <h2 class="col-2 m-0 percent font-weight-bold">
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
                        <div class="col-10 percent_content4 cus-h">
                            <h5 class="percent-h custom_text_small text-white">{{$recent_program[3]['programtitle']}}</h5>
                            <p class="custom_paragraph percent-p text-white">{{$recent_program[3]['subtitle']}}</p>
                            <div class="d-flex gap-2 flex-column">
                                <p class="custom_paragraph percent-p text-white">
                                    <b>Duration:</b> 
                                    {{ $recent_program[3]['effective_program_plan'][0]['sdate'] }} to {{ $recent_program[3]['effective_program_plan'][0]['edate'] }}
                                    <br>
                                    <b>Price:</b>
                                        {{showPrice($recent_program[3]['effective_program_plan'][0]['amount'])}}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-auto">

                            <a href="{{route('programs.detail',$recent_program[3]['id'])}}" class="theme_btn small_btn text-center responsive-style-btn ">Apply Now</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            {{-- </div> --}}
        </div>

        <!-- ______________________________________________________________________________  -->
        <div class="container p-xl-5 py-3 py-md-5">
            <div class="px-xl-5 px-3 position-relative py-5" style="overflow: hidden">
                <div class="position-absolute top-0 start-0 w-100 px-xl-5 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#F1F1F1" fill-opacity="1"
                            d="M0,160L21.8,160C43.6,160,87,160,131,186.7C174.5,213,218,267,262,240C305.5,213,349,107,393,90.7C436.4,75,480,149,524,176C567.3,203,611,181,655,170.7C698.2,160,742,160,785,176C829.1,192,873,224,916,240C960,256,1004,256,1047,218.7C1090.9,181,1135,107,1178,80C1221.8,53,1265,75,1309,85.3C1352.7,96,1396,96,1418,96L1440,96L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z">
                        </path>
                    </svg>
                </div>

                <div class="position-absolute w-100 px-xl-5 px-3" style="top: 60px; left: 0px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#f3f4f5" fill-opacity="0.6"
                            d="M0,96L10.4,101.3C20.9,107,42,117,63,138.7C83.5,160,104,192,125,218.7C146.1,245,167,267,188,240C208.7,213,230,139,250,133.3C271.3,128,292,192,313,181.3C333.9,171,355,85,376,85.3C396.5,85,417,171,438,218.7C459.1,267,480,277,501,282.7C521.7,288,543,288,563,288C584.3,288,605,288,626,293.3C647,299,668,309,689,266.7C709.6,224,730,128,751,80C772.2,32,793,32,814,53.3C834.8,75,856,117,877,122.7C897.4,128,918,96,939,69.3C960,43,981,21,1002,58.7C1022.6,96,1043,192,1064,218.7C1085.2,245,1106,203,1127,154.7C1147.8,107,1169,53,1190,69.3C1210.4,85,1231,171,1252,181.3C1273,192,1294,128,1315,85.3C1335.7,43,1357,21,1377,37.3C1398.3,53,1419,107,1430,133.3L1440,160L1440,0L1429.6,0C1419.1,0,1398,0,1377,0C1356.5,0,1336,0,1315,0C1293.9,0,1273,0,1252,0C1231.3,0,1210,0,1190,0C1168.7,0,1148,0,1127,0C1106.1,0,1085,0,1064,0C1043.5,0,1023,0,1002,0C980.9,0,960,0,939,0C918.3,0,897,0,877,0C855.7,0,835,0,814,0C793,0,772,0,751,0C730.4,0,710,0,689,0C667.8,0,647,0,626,0C605.2,0,584,0,563,0C542.6,0,522,0,501,0C480,0,459,0,438,0C417.4,0,397,0,376,0C354.8,0,334,0,313,0C292.2,0,271,0,250,0C229.6,0,209,0,188,0C167,0,146,0,125,0C104.3,0,83,0,63,0C41.7,0,21,0,10,0L0,0Z">
                        </path>
                    </svg>
                </div>

                <div class="col-md-12 text-center my-5 px-xl-5 px-3">
                    <h2 class="font-weight-bold custom_small_heading mb-md-3 text-capitalize">Program Highlights</h2>
                </div>

                <div style="overflow: hidden">
                    <div class="d-flex gap-5 pt-2 sliding_auto">

                        <!-- Flexible 14-Weeks Learning -->
                        <div data-aos="fade-up">
                            <div class="card card-custom h-100 hover-bg c-even">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-solid fa-chalkboard-user fs-2 text-white"></i>
                                        <h5 class="custom_text_small text-white font-weight-bold">Flexible 14-Weeks
                                            Learning
                                        </h5>
                                    </div>
                                    <p>Live and Self-Paced online for over 14 weeks, fitting into your schedule seamlessly.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- NGN Case Studies and NCLEX-style Questions -->
                        <div data-aos="fade-up" data-aos-delay="200">
                            <div class="card card-custom h-100 hover-bg c-odd">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-solid fa-book fs-2 text-white"></i>
                                        <h5 class="custom_text_small text-white font-weight-bold">NGN Case Studies &
                                            NCLEX-style
                                            Questions
                                        </h5>
                                    </div>
                                    <p>Sharpen your critical thinking with practical case studies and exam-style questions.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Comprehensive Materials -->
                        <div data-aos="fade-up" data-aos-delay="400">
                            <div class="card card-custom h-100 hover-bg c-even">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-solid fa-book fs-2 text-white"></i>
                                        <h5 class="custom_text_small text-white font-weight-bold">Comprehensive Materials
                                        </h5>
                                    </div>
                                    <p>Access lectures, case studies, practice questions, and NCLEX-style resources for 3
                                        months.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Clinical Experience -->
                        <div data-aos="fade-up" data-aos-delay="500">
                            <div class="card card-custom h-100 hover-bg c-odd">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-regular fa-hospital fs-2 text-white"></i>
                                        <h5 class="custom_text_small text-white font-weight-bold">Clinical Experience</h5>
                                    </div>
                                    <p>Fulfill 96 clinical hours with 50% online simulation and 50% community-based clinical
                                        practice.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Interactive Online Sessions -->
                        <div data-aos="fade-up" data-aos-delay="300">
                            <div class="card card-custom h-100 hover-bg c-odd">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-solid fa-laptop fs-2 text-white"></i>
                                        <h5 class="custom_text_small text-white font-weight-bold">Interactive Online
                                            Sessions
                                        </h5>
                                    </div>
                                    <p>Join 14 live lectures covering key nursing concepts and test-taking strategies, held
                                        every
                                        Wednesday & Thursday from 7:00 pm - 10:00 pm EST.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Certification -->
                        <div data-aos="fade-up" data-aos-delay="800">
                            <div class="card card-custom h-100 hover-bg c-even">
                                <div class="card-custom-body py-5">
                                    <div class="d-flex align-items-center flex-column gap-2 mb-3">
                                        <i class="fa-solid fa-certificate fs-2 text-white"></i>
                                        <h5 class="custom_text_small font-weight-bold text-white">Certification</h5>
                                    </div>
                                    <p>Receive your completion certificate promptly, with submission to the board within 72
                                        hours of
                                        finishing the course.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ______________________________________________________________________________  -->
        <div class="container-fluid bg-full-nclex-card py-3 m-0 d-none d-md-block"
            style="background-image: url('https://brilliance.jwsuperthemes.com/wp-content/uploads/2019/02/h3-bg1-1.jpg?id=1400'); background-position: center; background-size: cover;">
            <div class="container px-xl-5 pb-3 py-5 text-center">

                <h5>Process</h5>
                <h2 class="font-weight-bold custom_small_heading text-capitalize mt-3">How it works</h2>

                <div class="work_flow d-flex align-items-center justify-content-center py-5 px-4">
                    <div class="position-relative p-5 d-flex align-items-center justify-content-center text-center"
                        style="background-color: white; height: 150px; width: 150px; border-radius: 50%; margin-top: 1rem;">
                        <span
                            class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="top: 10px; height: 20px; width: 20px;">
                            1
                        </span>
                        <h6>Create an Account</h6>
                    </div>

                    <div class="position-relative p-5 d-flex align-items-center justify-content-center text-center"
                        style="background-color: white; height: 150px; width: 150px; border-radius: 50%; margin-top: 8rem;">
                        <span
                            class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="top: 10px; height: 20px; width: 20px;">
                            2
                        </span>
                        <h6>Get registered by paying 100 USD</h6>
                    </div>

                    <div class="position-relative p-5 d-flex align-items-center justify-content-center text-center"
                        style="background-color: white; height: 150px; width: 150px; border-radius: 50%; margin-top: 0rem;">
                        <span
                            class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="top: 10px; height: 20px; width: 20px;">
                            3
                        </span>
                        <h6>Buy Program</h6>
                    </div>

                    <div class="position-relative p-5 d-flex align-items-center justify-content-center text-center"
                        style="background-color: white; height: 150px; width: 150px; border-radius: 50%; margin-top: -4rem;">
                        <span
                            class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="top: 10px; height: 20px; width: 20px;">
                            4
                        </span>
                        <h6>Submit Notarize Agreement Form</h6>
                    </div>
                    <div class="position-relative p-5 d-flex align-items-center justify-content-center text-center"
                        style="background-color: white; height: 150px; width: 150px; border-radius: 50%; margin-top: 10rem;">
                        <span
                            class="position-absolute end-0 translate-middle badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="top: 10px; height: 20px; width: 20px;">
                            5
                        </span>
                        <h6>Enjoy your Program</h6>
                    </div>
                </div>

                {{-- <div class="text-center mb-md-5 mb-3 mx-xl-5 px-3">
                    <div class="col-md-12 text-center">
                        <h2 class="font-weight-bold custom_small_heading text-capitalize mt-3">Additional Information</h2>
                    </div>
                </div>

                <div class="row g-4 px-xl-5 px-3">

                    <!-- Study Resources Card -->
                    <div class="col-md-6 mb-2" data-aos="zoom-in">
                        <div class="card nclex-card nclex-cardp">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="#0079a8" stroke-width="1.5">
                                            <path
                                                d="M16 4.002c2.175.012 3.353.109 4.121.877C21 5.758 21 7.172 21 10v6c0 2.829 0 4.243-.879 5.122C19.243 22 17.828 22 15 22H9c-2.828 0-4.243 0-5.121-.878C3 20.242 3 18.829 3 16v-6c0-2.828 0-4.242.879-5.121c.768-.768 1.946-.865 4.121-.877" />
                                            <path stroke-linecap="round" d="M8 14h8m-9-3.5h10m-8 7h6" />
                                            <path
                                                d="M8 3.5A1.5 1.5 0 0 1 9.5 2h5A1.5 1.5 0 0 1 16 3.5v1A1.5 1.5 0 0 1 14.5 6h-5A1.5 1.5 0 0 1 8 4.5z" />
                                        </g>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="custom_text_small font-weight-bold text-white">Study Resources</h5>
                                    <p class="card-text">Utilize additional NCLEX preparation resources like practice
                                        questions and review ebooks.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NCLEX Support Card -->
                    <div class="col-md-6 mb-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card nclex-card nclex-cardp">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                        viewBox="0 0 14 14">
                                        <path fill="none" stroke="#0079a8" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 7V4.37A3.93 3.93 0 0 1 7 .5a3.93 3.93 0 0 1 4 3.87V7M1.5 5.5h1A.5.5 0 0 1 3 6v3a.5.5 0 0 1-.5.5h-1a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1m11 4h-1A.5.5 0 0 1 11 9V6a.5.5 0 0 1 .5-.5h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1M9 12.25a2 2 0 0 0 2-2V8m-2 4.25a1.25 1.25 0 0 1-1.25 1.25h-1.5a1.25 1.25 0 0 1 0-2.5h1.5A1.25 1.25 0 0 1 9 12.25" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="custom_text_small font-weight-bold">NCLEX Support</h5>
                                    <p class="card-text">Merakii offers personalized tutoring and support for retakers
                                        after failing the NCLEX.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Test Anxiety Management Card -->
                    <div class="col-md-6 mb-2" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card nclex-card nclex-cardp">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                        viewBox="0 0 2048 2048">
                                        <path fill="#0079a8"
                                            d="M1792 1280h256v768H1024v-768h256v-256h512zm-384 0h256v-128h-256zm512 384h-128v128h-128v-128h-256v128h-128v-128h-128v256h768zm-768-256v128h768v-128zM896 896q0 93-41 174t-117 136q45 23 85 53t73 67v338q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149H0q0-73 20-141t57-129t91-108t118-81q-75-54-116-135t-42-174q0-79 30-149t82-122t122-83t150-30q72 0 137 25t119 74q32-29 71-51q-34-35-52-81t-19-95q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100q0 49-18 95t-53 81q83 46 135 124q52-78 135-124q-34-35-52-81t-19-95q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100q0 49-18 95t-53 81q46 25 83 61t62 79t40 94t14 102h-128q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100h-128q0-53-20-99t-55-82t-81-55t-100-20q-49 0-95 18t-81 53q24 42 36 89t12 96m768-640q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10m-640 0q-27 0-50 10t-40 27t-28 41t-10 50q0 27 10 50t27 40t41 28t50 10q27 0 50-10t40-27t28-41t10-50q0-27-10-50t-27-40t-41-28t-50-10m-512 896q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="custom_text_small font-weight-bold">Test Anxiety Management</h5>
                                    <p class="card-text">Learn relaxation techniques and strategies to overcome test
                                        anxiety.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Suitability Card -->
                    <div class="col-md-6 mb-2" data-aos="zoom-in" data-aos-delay="300">
                        <div class="card nclex-card nclex-cardp">
                            <div class="card-body d-flex align-items-center">
                                <div class="icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em"
                                        viewBox="0 0 24 24">
                                        <path fill="#0079a8"
                                            d="M11 7a4 4 0 1 0-8 0a4 4 0 0 0 8 0M9.5 7a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0M21 7a4 4 0 1 0-8 0a4 4 0 0 0 8 0m-1.5 0a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0M7 21a4 4 0 1 1 0-8a4 4 0 0 1 0 8m0-1.5a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5M21 17a4 4 0 1 0-8 0a4 4 0 0 0 8 0m-1.5 0a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="custom_text_small font-weight-bold">Suitability</h5>
                                    <p class="card-text">This program benefits both NCLEX-RN and NCLEX-PN candidates.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}
            </div>
        </div>

        {{-- <div class="px-xl-5 px-3 py-4" style="background-color: var(--teal);">
            <div class="container px-lg-5 py-5 text-center">
                <h5 class="mb-2 text-white">Program begins on January 10th</h5>
                <h2 class="text-white fw-bold mb-4">Year-Round Open
                    Enroll Remediation Now</h2>

                <button class="py-2 px-5 theme_btn">Enroll Now</button>
            </div>
        </div> --}}
        <x-florida-featured-program-plan />

        <!-- ______________________________________________________________________________  -->

        <div class="container px-xl-5 py-5">
            <h1 class="nclex-header"></h1>
            <div class="col-md-12 text-center" data-aos="fade-up">
                <h2 class="font-weight-bold custom_small_heading mb-4 text-capitalize">Understanding the NCLEX Exam</h2>
            </div>
            <div class="d-flex justify-content-center">
                <p class="col-md-9 nclex-intro px-xl-5 px-3 mx-md-5 text-md-start text-center mb-4" data-aos="fade-up"
                    data-aos-delay="100">
                    The NCLEX, or National Council Licensure Examination, is a standardized test that
                    every nursing graduate must pass to become a licensed nurse. It's designed to test
                    the knowledge, skills, and abilities essential for safe and effective nursing practice.
                    The stakes are high, and understandably, the pressure can be immense. The Test Plan Content
                    The content is organized around four categories of human needs, which have been
                    identified by the NCSBN. The four (4) categories and their related subcategories are
                    as follows:
                </p>
            </div>
            <div class="nclex-row px-xl-5 px-3">
                <!-- Safe, Effective Care Environment -->
                <div class="nclex-col col-md-6" data-aos="fade-right">
                    <div class="nclex-card">
                        <h5 class="custom_text_small font-weight-bold">Safe, Effective Care Environment</h5>
                        <ul>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Management of Care
                            </li>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Safety and Infection Control
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Health Promotion and Maintenance -->
                <div class="nclex-col col-md-6" data-aos="fade-left">
                    <div class="nclex-card">
                        <h5 class="custom_text_small font-weight-bold">Health Promotion and Maintenance</h5>
                        <ul>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Growth and Development Through the Lifespan
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Psychosocial Integrity -->
                <div class="nclex-col col-md-6" data-aos="fade-right">
                    <div class="nclex-card">
                        <h5 class="custom_text_small font-weight-bold">Psychosocial Integrity</h5>
                        <ul>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Coping and Adaptation
                            </li>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Psychosocial Adjustment
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Physiological Integrity -->
                <div class="nclex-col col-md-6" data-aos="fade-left">
                    <div class="nclex-card">
                        <h5 class="custom_text_small font-weight-bold">Physiological Integrity</h5>
                        <ul>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Basic Care and Comfort
                            </li>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Pharmacological Therapies
                            </li>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Reduction of Risk Potential
                            </li>
                            <li>
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 64 64">
                                    <path fill="#ff7619"
                                        d="M56.734 5.081c-8.437 7.302-15.575 14.253-22.11 23.322c-2.882 4-6.087 8.708-8.182 13.153c-1.196 2.357-3.352 6.04-4.087 9.581c-4.02-3.74-8.338-7.985-12.756-11.31c-3.149-2.369-12.219 2.461-8.527 5.239c6.617 4.977 12.12 11.176 18.556 16.375c2.692 2.172 8.658-2.545 10.06-4.524c4.602-6.52 5.231-14.49 8.585-21.602c5.121-10.877 14.203-19.812 23.17-27.571c5.941-5.541-.195-6.563-4.7-2.663" />
                                </svg>
                                Physiological Adaptation
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <p class="col-md-9 px-3 text-md-start text-center mb-3">
                        Each of these subcategories constitutes 5–13% of the test except for Reduction of
                        Risk Potential and Physiological Adaptation each of which accounts for 12–18% of
                        the total questions. Integrated throughout each of the client needs categories are
                        the steps of the nursing process, caring, communication and documentation, and
                        teaching and learning.
                    </p>
                </div>
            </div>
        </div>

        <!-- ______________________________________________________________________________  -->

        <div class="container px-xl-5 pb-0 d-none">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold custom_small_heading text-capitalize">NCLEX Program Components</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="col-md-9 nclex-intro px-xl-5 px-3 mx-md-5 text-md-start text-center mb-0">A detailed
                        breakdown of our NCLEX preparation program, offering comprehensive theory and practical experiences
                        to help you succeed.</p>
                </div>
            </div>
            <!-- Program Components -->
            <div class="row equal-height-row px-xl-5 px-3">
                <!-- Theory Hours -->
                <div class="col-md-4 d-flex" data-aos="flip-up">
                    <div class="nclex-card p-3 w-100">
                        <div class="nclex-card-body">
                            <h5 class="custom_text_small font-weight-bold">80 Hours of Theory</h5>
                            <p class="nclex-program-content">A comprehensive curriculum covering essential nursing concepts
                                and updates, preparing you for modern nursing practice.</p>
                        </div>
                    </div>
                </div>

                <!-- Simulated Clinical Hours -->
                <div class="col-md-4 d-flex mt-4 mt-md-0" data-aos="flip-up" data-aos-delay="100">
                    <div class="nclex-card p-3 w-100 bg-light">
                        <div class="nclex-card-body">
                            <h5 class="custom_text_small font-weight-bold">48 Hours of Acute Care Simulated Clinical</h5>
                            <p class="nclex-program-content">Experience simulated clinical scenarios in 8 different areas
                                to sharpen your clinical decision-making and practical skills.</p>
                        </div>
                    </div>
                </div>

                <!-- In-Person Clinical Hours (Florida Only) -->
                <div class="col-md-4 d-flex mt-4 mt-md-0" data-aos="flip-up" data-aos-delay="200">
                    <div class="nclex-card p-3 w-100">
                        <div class="nclex-card-body">
                            <h5 class="custom_text_small font-weight-bold">48 Hours of In-Person Clinical (Florida Only)
                            </h5>
                            <p class="nclex-program-content">Gain hands-on clinical experience either with Merakii’s
                                Faculty or under a preceptor with active Florida RN or LPN/RN licensure. All clinical time
                                must be completed in Florida, as out-of-state clinicals are not allowed by the Florida Board
                                of Nursing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- new-sectionnnnnn --}}
        <div class="container px-xl-5 accordion-section">
            <div class="row g-4 p-xl-5 p-3">
                <div class="col-xl-6">
                    <h2 class="font-weight-bold custom_small_heading text-capitalize">NCLEX Program Components</h2>
                    <p class="nclex-intro">A detailed breakdown of our NCLEX preparation program, offering comprehensive
                        theory and practical experiences to help you succeed.</p>
                    <div class="custom-accordion">
                        <div class="accordion-new-item" data-aos="flip-up">
                            <button class="accordion-button acc-btn1" onclick="toggleAccordion(this)">
                                <span class="custom_text_small font-weight-bold">80 Hours of Theory</span>

                            </button>
                            <div class="accordion-content acc-cnt1">
                                <p>A comprehensive curriculum covering essential nursing concepts and updates, preparing you
                                    for modern nursing practice.</p>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="accordion-new-item" data-aos="flip-up" data-aos-delay="100">
                            <button class="accordion-button acc-btn2" onclick="toggleAccordion(this)">
                                <span class="custom_text_small font-weight-bold">48 Hours of Acute Care Simulated
                                    Clinical</span>

                            </button>
                            <div class="accordion-content acc-cnt2">
                                <p>Gain hands-on clinical experience either with Merakii’s Faculty or under a preceptor with
                                    active Florida RN or LPN/RN licensure. All clinical time must be completed in Florida,
                                    as out-of-state clinicals are not allowed by the Florida Board of Nursing.</p>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="accordion-new-item" data-aos="flip-up" data-aos-delay="200">
                            <button class="accordion-button acc-btn3" onclick="toggleAccordion(this)">
                                <span class="custom_text_small font-weight-bold">48 Hours of In-Person Clinical (Florida
                                    Only)</span>

                            </button>
                            <div class="accordion-content acc-cnt3">
                                <p>Gain hands-on clinical experience either with Merakii’s Faculty or under a preceptor with
                                    active Florida RN or LPN/RN licensure. All clinical time must be completed in Florida,
                                    as out-of-state clinicals are not allowed by the Florida Board of Nursing.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6">
                    {{-- <div class="custom_height_accordion">

                        <img src="{{ asset('/public/uploads/images/footerimg/transformyourncleximg.jpeg') }}"
                            class="h-100 w-100">
                    </div>
                    <div class="accordion-border-orange d-flex align-items-center">
                        <p class="text-white">Gain hands-on clinical experience either with Merakii’s Faculty or under a
                            preceptor with active Florida RN or LPN/RN licensure. All clinical time must be completed in
                            Florida, as out-of-state clinicals are not allowed by the Florida Board of Nursing.</p>
                    </div> --}}

                    <div class="benefits-remeditaion h-100 d-flex align-items-center">
                        <div class="py-4">
                            <!-- Header Section -->
                            <div class="text-center my-3 mx-xl-5 px-3">
                                <div class="col-md-12 text-center">
                                    <h2 class="font-weight-bold custom_small_heading text-capitalize">Benefits of the
                                        Remediation
                                        Program</h2>
                                </div>
                            </div>
                            <!-- Study Resources Section -->
                            <div class="px-3">
                                <div class="row align-items-center">
                                    <div data-aos="fade-right" data-aos-delay="200" class="col-md-4">
                                        <img src="{{ asset('/public/uploads/images/footerimg/new-footer-img.png') }}"
                                            width="100%">
                                    </div>
                                    <div data-aos="fade-left" data-aos-delay="200" class="col-md-8">
                                        <div class="card-body py-0">
                                            <h5 class="custom_text_small font-weight-bold">What makes this program stand
                                                out?</h5>
                                            <p>For starters, it’s tailored to your needs. <br> The
                                                focused coursework and structured schedule are designed to address your
                                                specific
                                                weaknesses and turn them into strengths. <br>
                                                Past participants have seen significant improvements in their NCLEX pass
                                                rates and
                                                have gone on to enjoy successful nursing careers.</p>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('resource') }}"
                                                    class="theme_btn small_btn mt-3 text-center responsive-style-btn mx-1">Resource
                                                    Center</a>
                                                <a href="{{ route('programs') }}"
                                                    class="theme_btn small_btn mt-3 text-center responsive-style-btn mx-1 ">Buy
                                                    Now</a>
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


        <!-- ______________________________________________________________________________  -->
        <div class="px-xl-5 px-3 py-4" style="background-color: #edededc8;">
            <div class="container px-lg-5 py-5 text-center">
                <h2 class="fw-bold mb-3">Comprehensive Expert Support</h2>
                <p>
                    Interact with our experienced instructors and receive personalized guidance. <br>
                    Access live chat, detailed FAQs, and submit queries anytime through our Help Center.
                </p>

                <span class="mt-3">
                    863-250-8764 / 347-525-1736
                </span>
            </div>
        </div>

    </div>
    @include(theme('partials._custom_footer'))
    <script>
        AOS.init();
    </script>
    <script>
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', () => {
                const accordionItem = button.parentElement;
                const accordionContent = accordionItem.querySelector('.accordion-content');

                // Close all other accordions
                document.querySelectorAll('.accordion-new-item').forEach(item => {
                    if (item !== accordionItem) {
                        item.classList.remove('open');
                        item.querySelector('.accordion-button').classList.add('collapsed');
                        item.querySelector('.accordion-content').style.display = 'none';
                    }
                });

                // Toggle the clicked accordion
                const isOpen = accordionItem.classList.contains('open');
                if (isOpen) {
                    accordionItem.classList.remove('open');
                    button.classList.add('collapsed');
                    accordionContent.style.display = 'none';
                } else {
                    accordionItem.classList.add('open');
                    button.classList.remove('collapsed');
                    accordionContent.style.display = 'block';
                }
            });
        });
    </script>
@endsection
