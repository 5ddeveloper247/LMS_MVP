@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Contact') }}
@endsection
{{-- @section('css') --}}
{{-- @endsection --}}

@section('mainContent')
    <script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Lms</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

    {{-- <style>
        .banner-img {
            height: calc(100vh - 100px);
            width: 100%;
        }

        .mainbanner {

            background-image: url("{{ asset('public/assets/contact.jpg') }}");
            background-size: cover;
        }

        .select2-container {
            width: 100% !important;
        }

        .custom_banner_height {
            height: 550px;
        }

        .boxbanner h1 {
            font-size: 70px;
            font-weight: bold;
            color: white;
        }

        .data h2 {
            /* font-size: 42px; */
            font-family: Poppins, sans-serif;
            color: #0079a8;
            font-weight: 700;
        }

        .data p {
            /* font-size: 20px; */
            font-weight: 400;
        }

        .separator {
            border-bottom: 4px solid var(--system_primery_color);
            max-width: 50px;
            margin-top: 15px;
        }

        .iconsdo i {
            color: var(--system_primery_color);
            font-size: 17px;
            padding-right: 5px;
            line-height: -16px;
            cursor: pointer;
        }

        .ankar a {
            text-decoration: none;
            color: #252525;
            line-height: 36px;
        }

        .custombtn {
            padding: 15px 50px;
            background-color: #ff7600;
            color: white;
            border: none;
            font-weight: bold;
        }

        .custombtn:hover {
            padding: 15px 50px;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            font-weight: bold;
        }

        .footerbox h4 {
            font-weight: 700;
            color: white;
            font-size: 35px;
        }

        .footerbox h5 {
            font-weight: 400;
        }

        .footerbox p {
            line-height: 30px !important;
            font-size: 17px !important;
            color: white;
            cursor: pointer !important;

        }

        .footerbox p:hover {
            line-height: 30px !important;
            font-size: 17px !important;
            color: var(--system_primery_color);
        }

        .fonts {
            font-size: 17px;
            font-weight: 400;
            text-align: justify;
            margin-top: 3px;
        }

        .mintban {
            background-image: url("{{ asset('public/assets/Section9.jpg') }}");
            height: auto;
            background-size: cover;
            background-position: left;
            background-repeat: no-repeat;
            position: relative;
        }

        .contact-overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            background-color: #2525255e;
        }

        .flowdiv {
            max-width: 90%;
            padding: 6rem 5rem;
            margin: auto;
            height: 100%;
            display: flex;
            align-items: center;
        }

        element.style {
            border-color: #ffffff;
            background-color: #ffffff;
            background-image: url(https://academist.qodeinteractive.com/wp-content/uploads/2018/07/Form-background-img.jpg);
        }


        user agent stylesheet .formdokana input[type="text" i] {
            padding: 1px 2px;
        }

        .formdokana .wpcf7-form-control-wrap {
            position: relative;
        }

        a,
        abbr,
        acronym,
        address,
        applet,
        b,
        big,
        blockquote,
        body,
        caption,
        center,
        cite,
        code,
        dd,
        del,
        dfn,
        div,
        dl,
        dt,
        em,
        fieldset,
        font,
        form,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        html,
        i,
        iframe,
        ins,
        kbd,
        label,
        legend,
        li,
        object,
        ol,
        p,
        pre,
        q,
        s,
        samp,
        small,
        span,
        strike,
        strong,
        sub,
        sup,
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr,
        tt,
        u,
        ul,
        var {
            background: 0 0;
            border: 0;
            margin: 0;
            outline: 0;
            padding: 0;
            vertical-align: baseline;
        }

        .btn-submit {
            padding: 14px 31px;
            background: var(--system_primery_color);
            border: 0;
            color: white;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .btn-submit:hover {
            padding: 14px 31px;
            background: rgb(0, 0, 0);
            border: 0;
            color: white;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .formdokana .changeborder .wpcf7-form-control.wpcf7-text,
        .wpcf7-form-control.wpcf7-textarea,
        input[data-name=your-email],
        input[type=password],
        input.form-control-text {
            background-color: transparent;
            /* border: 1px solid #e1e1e1; */
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .formdokana .change .wpcf7-form-control.wpcf7-text,
        .wpcf7-form-control.wpcf7-textarea,
        input[data-name=your-email],
        input[type=password],
        input.form-control-text {
            background-color: transparent;
            /* border: 1px solid #e1e1e1; */
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
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

        .formdokana input.form-control-text {
            background-color: transparent;
            border: 1px solid #e1e1e1;
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            padding: 12px 16px;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .formdokana input.form-control-text {
            background-color: transparent;
            border-radius: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #252525;
            font-family: inherit;
            font-size: 15px;
            font-weight: inherit;
            line-height: calc(50px - (12px * 2) - 2px);
            margin: 0 0 16px;
            outline: 0;
            position: relative;
            width: 100%;
            -webkit-appearance: none;
            -webkit-transition: border-color .2s ease-in-out;
            -o-transition: border-color .2s ease-in-out;
            transition: border-color .2s ease-in-out;
        }

        .selectProgram {
            margin: 0 0 1rem;
        }

        .breadcam_wrap {
            max-width: unset !important;
        }

        .select2-container .select2-selection--single {
            height: 38px !important;
            border: 1px solid #e1e1e1 !important;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444 !important;
            line-height: 35px !important;
        }

        .section-margin-y {
            margin: 60px auto !important;
        }

        .data-flow {
            height: 100%;
            background-color: #0079a8;
            position: relative;
            display: flex;
            align-items: center;
        }

        .dataflow {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: auto;
            scrollbar-width: none;
            height: 300px;
        }

        .dataflow-p::-webkit-scrollbar {
            width: 0;
        }

        .dataflow-p {
            scrollbar-width: none;
        }

        .dataflow h2 {
            font-family: Poppins, sans-serif;
            color: #fff !important;
            font-weight: bold;
        }

        .eltdf-eh-item {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        .lia {
            top: 50%;
            transform: translateY(-50%);
        }

        .map iframe {
            height: 500px;
        }

        @media only screen and (max-width: 768px) {

            .dataflow h2,
            .wpb_wrapper_h,
            .data h2 {
                font-size: 18px !important;
            }

            .flowdiv {
                height: 340px;
                padding: 0px;
                width: 85%;
                margin: auto;
            }

            .dataflow {
                height: 280px !important;
            }

            .flowdiv-dataflow img {
                width: 35px;
                height: 35px;
            }

            .dataflow-p {
                line-height: normal;
                overflow: auto;
            }

            .dataflow img {
                display: none;
            }

            .mintban {
                padding: 4rem 0rem;
            }

            .banner-img {
                height: 60vh !important;
            }
        }

        @media only screen and (min-width:769px) and (max-width: 1024px) {

            .dataflow {
                max-height: 300px !important;
                /* padding: 1rem 1rem; */
            }

            .dataflow-p {
                overflow: auto;
            }

            .dataflow h2 {
                font-size: 25px;
            }

            .dataflow h2,
            .wpb_wrapper_h,
            .data h2 {
                font-size: 1.6rem !important;
            }
        }

        @media only screen and (min-width: 1025px) and (max-width:1279px) {

            .dataflow h2,
            .wpb_wrapper_h,
            .data h2 {
                font-size: 1.6rem !important;
            }

            .dataflow {
                max-height: 300px !important;
            }

            .dataflow-p {
                overflow: auto;
            }
        }

        @media only screen and (min-width: 1500px) {
            .map iframe {
                height: 600px !important;
            }

            .dataflow {
                height: 400px !important;
            }

            .formdokana input[type=text] {
                background-color: transparent;
                /* border: 1px solid #e1e1e1; */
                border-radius: 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                color: #252525;
                font-family: inherit;
                font-size: 15px;
                font-weight: inherit;
                line-height: calc(50px - (12px * 2) - 2px);
                margin: 0 0 40px;
                outline: 0;
                /* padding: 12px 16px; */
                position: relative;
                width: 100%;
                -webkit-appearance: none;
                -webkit-transition: border-color .2s ease-in-out;
                -o-transition: border-color .2s ease-in-out;
                transition: border-color .2s ease-in-out;
            }

            .selectProgram {
                margin: 0 0 40px;
            }
        }



        @media only screen and (min-width: 1800px) {
            .map iframe {
                height: 750px !important;
            }

            .dataflow {
                height: 400px !important;
            }

            .formdokana input.form-control-text {
                font-size: 20px;
            }

            .formdokana .change .wpcf7-form-control.wpcf7-text,
            .wpcf7-form-control.wpcf7-textarea,
            input[data-name=your-email],
            input[type=password],
            input.form-control-text {

                font-size: 20px;
            }

            .flowdiv {
                max-width: 100% !important;
                padding: 8rem 9rem !important;
            }

            .small_btn2 {
                margin-top: 20px !important;
            }
        }

        .fw-bold {
            font-weight: 600;
        }

        .grid_info {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        @media (min-width: 1800px) {
            .grid_info {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
                gap: 30px;
            }
        }
    </style> --}}

<style>
     :root {
      --teal-mid: #1A8A6F;
      --teal-deep: #0F6E56;
      --teal-darkest: #0A4D3C;
      --terracotta: #C65D3A;
      --terracotta-deep: #A84B2D;
      --cream: #F5EDE0;
      --cream-warm: #EFE3D0;
      --charcoal: #2B2B2B;
      --charcoal-soft: #4A4A4A;
      --white: #FFFFFF;
      --gray-line: #E8DFD0;
      --serif: 'Playfair Display', Georgia, serif;
      --sans: 'Montserrat', system-ui, sans-serif;
      --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
      --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
      --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
      scroll-padding-top: 80px;
    }

    body {
      font-family: var(--sans) !important;
      color: var(--charcoal);
      background: var(--cream);
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
    }

    h1,
    h2,
    h3,
    h4 {
      font-family: var(--serif);
      font-weight: 700;
      line-height: 1.2;
      color: var(--teal-darkest);
    }

    /* Hero */
    .hero {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
      color: var(--white);
      padding: 90px 32px 100px;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: -100px;
      right: -100px;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
      border-radius: 50%;
    }

    .hero::after {
      content: '';
      position: absolute;
      bottom: -150px;
      left: -100px;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(245, 237, 224, 0.06) 0%, transparent 70%);
      border-radius: 50%;
    }

    .hero-inner {
      max-width: 900px;
      margin: 0 auto;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    .hero-eyebrow {
      display: inline-block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--terracotta);
      margin-bottom: 24px;
      padding: 6px 16px;
      border: 1px solid var(--terracotta);
      border-radius: 30px;
    }

    .hero h1 {
      font-size: clamp(38px, 5vw, 58px);
      color: var(--white);
      margin-bottom: 22px;
      font-weight: 700;
      letter-spacing: -1px;
    }

    .hero h1 em {
      font-style: italic;
      color: var(--cream);
      font-weight: 400;
    }

    .hero-sub {
      font-size: 18px;
      line-height: 1.7;
      color: var(--cream-warm);
      max-width: 660px;
      margin: 0 auto;
      font-family: var(--sans) !important;
    }

    .container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 32px;
    }

    /* Three-column layout */
    .contact-main {
      margin-top: -50px;
      position: relative;
      z-index: 2;
      padding-bottom: 80px;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 24px;
    }

    .contact-card {
      background: var(--white);
      border-radius: 16px;
      padding: 40px 36px;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--gray-line);
      display: flex;
      flex-direction: column;
    }

    .contact-card.form-card {
      grid-column: span 1;
    }

    .contact-card.calendar-card {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
      color: var(--white);
      border-color: transparent;
      position: relative;
      overflow: hidden;
    }

    .contact-card.calendar-card::before {
      content: '';
      position: absolute;
      top: -100px;
      right: -100px;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(198, 93, 58, 0.2) 0%, transparent 70%);
      border-radius: 50%;
    }

    .contact-card.info-card {
      background: var(--cream-warm);
    }

    .card-eyebrow {
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 2.5px;
      font-weight: 700;
      color: var(--terracotta);
      margin-bottom: 14px;
      position: relative;
      z-index: 1;
    }

    .calendar-card .card-eyebrow {
      color: var(--terracotta);
    }

    .card-title {
      font-family: var(--serif);
      font-size: 26px;
      font-weight: 700;
      color: var(--teal-darkest);
      line-height: 1.2;
      margin-bottom: 12px;
      position: relative;
      z-index: 1;
    }

    .calendar-card .card-title {
      color: var(--white);
    }

    .card-description {
      font-size: 14px;
      color: var(--charcoal-soft);
      line-height: 1.7;
      margin-bottom: 24px;
      position: relative;
      z-index: 1;
      font-family: var(--sans) !important;
    }

    .calendar-card .card-description {
      color: var(--cream-warm);
    }

    /* Form */
    .form-group {
      margin-bottom: 16px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 16px;
    }

    .form-row .form-group {
      margin-bottom: 0;
    }

    .form-label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: var(--teal-darkest);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .form-label .required {
      color: var(--terracotta);
    }

    /* =========================
       SELECT2 CUSTOM FORM STYLE
    ========================= */

    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single {
        height: auto !important;
        min-height: 48px !important;
        border: 1.5px solid var(--gray-line) !important;
        border-radius: 8px !important;
        background: var(--white) !important;
    
        display: flex !important;
        align-items: center !important;
    
        padding: 0 14px !important;
        overflow: hidden !important;

        transition: all 0.2s !important;
        box-shadow: none !important;
    }

    /* text */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--charcoal) !important;
        font-family: var(--sans) !important;
        font-size: 14px !important;
        line-height: normal !important;
     
        padding-left: 0 !important;
        padding-right: 24px !important;
     
        /* important */
        width: 100% !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
        display: block !important;
    }

    
    /* arrow */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        right: 12px !important;
        top: 0 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: var(--teal-darkest) transparent transparent transparent !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #888 transparent transparent transparent;
        border-style: solid;
        border-width: 8px 6px 0 6px !important;
        height: 50px !important;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
        top: 50%;
        width: 12px !important;
    }

    /* focus state same as form-select */
    .select2-container--default.select2-container--focus .select2-selection--single,
    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: var(--teal-mid) !important;
        box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.12) !important;
    }

    /* dropdown */
    .select2-dropdown {
        border: 1.5px solid var(--gray-line) !important;
        border-radius: 8px !important;
        overflow: hidden !important;
        box-shadow: var(--shadow-md) !important;
    }
  

    /* options */
    .select2-results__option {
        padding: 12px 14px !important;
        font-size: 14px !important;
        overflow-y: hidden !important;
        font-family: var(--sans) !important;
    }
    
    .select2-results__options li{
  
      white-space: normal !important
    }
    
    /* selected / hover option */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background: #4169e1 !important;
        /* color: #fff !important; */
        text-wrap: auto !important;
    }

    /* search field */
    .select2-search--dropdown .select2-search__field {
        border: 1.5px solid var(--gray-line) !important;
        border-radius: 6px !important;
        padding: 10px !important;
        font-size: 14px !important;
    }

    /* placeholder */
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #777 !important;
    }

    .form-input,
    .form-select,
    .form-textarea {
      width: 100%;
      padding: 12px 14px !important;
      border: 1.5px solid var(--gray-line) !important; 
      border-radius: 8px !important;
      font-family: var(--sans) !important;
      font-size: 14px !important;
      color: var(--charcoal) !important;
      background: var(--white) !important;
      transition: all 0.2s !important;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
      outline: none;
      border-color: var(--teal-mid) !important;
      box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.12) !important;
    }

    .form-textarea {
      resize: vertical;
      min-height: 110px;
      font-family: var(--sans) !important;
    }

    .form-select {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%230A4D3C' d='M6 8L0 0h12z'/%3E%3C/svg%3E") !important;
      background-repeat: no-repeat !important;
      background-position: right 14px center !important;
      padding-right: 36px !important;
    }

    .form-helper {
      font-size: 12px;
      color: var(--charcoal-soft);
      margin-top: 4px;
      line-height: 1.5;
    }

    .form-submit {
      background: var(--terracotta);
      color: var(--white);
      padding: 14px 28px;
      border: 2px solid var(--terracotta);
      border-radius: 8px;
      font-family: var(--sans) !important;
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: all 0.2s;
      width: 100%;
      margin-top: 8px;
    }

    .form-submit:hover {
      background: var(--terracotta-deep);
      border-color: var(--terracotta-deep);
      transform: translateY(-1px);
    }

    .form-microcopy {
      font-size: 12px;
      color: var(--charcoal-soft);
      margin-top: 14px;
      text-align: center;
      line-height: 1.6;
      font-family: var(--sans) !important;
    }

    /* Calendar Card */
    .calendar-features {
      list-style: none;
      padding: 0;
      margin-bottom: 28px;
      position: relative;
      z-index: 1;
      flex-grow: 1;
    }

    .calendar-features li {
      padding: 9px 0 9px 30px;
      position: relative;
      color: var(--cream);
      font-size: 14px;
      line-height: 1.5;
    }

    .calendar-features li::before {
      content: '✓';
      position: absolute;
      left: 0;
      top: 9px;
      color: var(--terracotta);
      font-weight: 700;
      font-size: 16px;
    }

    .calendar-quote {
      font-family: var(--serif);
      font-style: italic;
      font-size: 16px;
      color: var(--cream);
      padding: 18px 22px;
      border-left: 3px solid var(--terracotta);
      background: rgba(255, 255, 255, 0.04);
      border-radius: 0 8px 8px 0;
      margin-bottom: 24px;
      line-height: 1.5;
      position: relative;
      z-index: 1;
    }

    .calendar-cta {
      background: var(--terracotta);
      color: var(--white);
      padding: 14px 28px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.2s;
      display: block;
      text-align: center;
      border: 2px solid var(--terracotta);
      margin-bottom: 12px;
      position: relative;
      z-index: 1;
    }

    .calendar-cta:hover {
      background: var(--terracotta-deep);
      border-color: var(--terracotta-deep);
      transform: translateY(-1px);
    }

    .calendar-secondary {
      background: transparent;
      color: var(--cream);
      padding: 12px 28px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: all 0.2s;
      display: block;
      text-align: center;
      border: 1px solid rgba(245, 237, 224, 0.3);
      position: relative;
      z-index: 1;
    }

    .calendar-secondary:hover {
      border-color: var(--cream);
      background: rgba(255, 255, 255, 0.05);
    }

    .calendar-availability {
      font-size: 12px;
      color: var(--cream-warm);
      text-align: center;
      margin-top: 16px;
      position: relative;
      z-index: 1;
      padding-top: 16px;
      border-top: 1px solid rgba(245, 237, 224, 0.15);
      font-family: var(--sans) !important;
    }

    .availability-dot {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #4ade80;
      margin-right: 6px;
      box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.2);
      vertical-align: middle;
    }

    /* Info Card */
    .info-block {
      margin-bottom: 28px;
    }

    .info-block:last-of-type {
      margin-bottom: 0;
    }

    .info-block h4 {
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: var(--terracotta);
      font-weight: 700;
      font-family: var(--sans) !important;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-block h4 svg {
      width: 14px;
      height: 14px;
    }

    .info-block .info-value {
      font-family: var(--serif);
      font-size: 17px;
      color: var(--teal-darkest);
      font-weight: 600;
      line-height: 1.5;
      margin-bottom: 4px;
    }

    .info-block .info-detail {
      font-size: 13.5px;
      color: var(--charcoal-soft);
      line-height: 1.6;
      font-family: var(--sans) !important;
    }

    .info-block a {
      color: var(--teal-darkest);
      text-decoration: none;
      transition: color 0.2s;
    }

    .info-block a:hover {
      color: var(--terracotta);
    }

    .info-divider {
      border: none;
      border-top: 1px dashed rgba(10, 77, 60, 0.15);
      margin: 22px 0;
    }

    .info-social {
      display: flex;
      gap: 8px;
      margin-top: 4px;
    }

    .info-social a {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--white);
      border: 1px solid var(--gray-line);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--teal-darkest);
      text-decoration: none;
      transition: all 0.2s;
    }

    .info-social a:hover {
      background: var(--terracotta);
      border-color: var(--terracotta);
      color: var(--white);
      transform: translateY(-2px);
    }

    .info-social svg {
      width: 14px;
      height: 14px;
    }

    /* Map Section */
    .map-section {
      padding: 70px 0 90px;
      background: var(--white);
    }

    .map-header {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 50px;
    }

    .map-header .eyebrow {
      display: inline-block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--terracotta);
      margin-bottom: 16px;
    }

    .map-header h2 {
      font-size: clamp(30px, 4vw, 42px);
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }

    .map-header p {
      font-size: 16px;
      color: var(--charcoal-soft);
      line-height: 1.7;
      font-family: var(--sans) !important;
    }

    .map-container {
      position: relative;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: var(--shadow-lg);
      background: var(--cream);
    }

    .map-grid {
      display: grid;
      grid-template-columns: 1fr 1.6fr;
      min-height: 480px;
    }

    .map-info-panel {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
      color: var(--white);
      padding: 50px 44px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .map-info-panel::before {
      content: '';
      position: absolute;
      bottom: -100px;
      right: -100px;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
      border-radius: 50%;
    }

    .map-info-panel-content {
      position: relative;
      z-index: 1;
    }

    .map-info-panel h3 {
      color: var(--white);
      font-size: 26px;
      margin-bottom: 16px;
      line-height: 1.3;
    }

    .map-info-panel .address-line {
      font-family: var(--serif);
      font-size: 18px;
      color: var(--cream);
      line-height: 1.5;
      margin-bottom: 24px;
    }

    .map-info-panel p {
      color: var(--cream-warm);
      font-size: 14.5px;
      line-height: 1.7;
      margin-bottom: 24px;
      font-family: var(--sans) !important;
    }

    .map-actions {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .map-action {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(245, 237, 224, 0.25);
      color: var(--cream);
      padding: 12px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 13.5px;
      font-weight: 500;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
    }

    .map-action:hover {
      background: var(--terracotta);
      border-color: var(--terracotta);
      color: var(--white);
    }

    .map-action svg {
      width: 14px;
      height: 14px;
    }

    .map-iframe-wrap {
      position: relative;
      background: var(--cream);
    }

    .map-iframe-wrap iframe {
      border: 0;
      width: 100%;
      height: 100%;
      display: block;
      min-height: 480px;
    }

    /* FAQ Section */
    .faq-section {
      background: var(--cream);
      padding: 80px 0;
    }

    .faq-header {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 50px;
    }

    .faq-header .eyebrow {
      display: inline-block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--terracotta);
      margin-bottom: 16px;
    }

    .faq-header h2 {
      font-size: clamp(30px, 4vw, 42px);
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }

    .faq-list {
      max-width: 820px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .faq-item {
      background: var(--white);
      border-radius: 10px;
      border: 1px solid var(--gray-line);
      overflow: hidden;
      transition: box-shadow 0.2s;
    }

    .faq-item:hover {
      box-shadow: var(--shadow-sm);
    }

    .faq-item summary {
      padding: 22px 28px;
      cursor: pointer;
      font-family: var(--serif);
      font-size: 18px;
      font-weight: 600;
      color: var(--teal-darkest);
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
    }

    .faq-item summary::-webkit-details-marker {
      display: none;
    }

    .faq-item summary::after {
      content: '+';
      font-size: 26px;
      color: var(--terracotta);
      font-weight: 400;
      line-height: 1;
    }

    .faq-item[open] summary::after {
      content: '−';
    }

    .faq-item-body {
      padding: 0 28px 24px;
      font-size: 15px;
      color: var(--charcoal-soft);
      line-height: 1.7;
    }

   

    /* Responsive */
    @media (max-width: 1024px) {
      .contact-grid {
        grid-template-columns: 1fr 1fr;
      }

      .contact-card.info-card {
        grid-column: 1 / -1;
      }

      .map-grid {
        grid-template-columns: 1fr;
      }

      .map-iframe-wrap iframe {
        min-height: 380px;
      }
    }

    @media (max-width: 700px) {

      .contact-grid {
        grid-template-columns: 1fr;
      }

      .contact-card {
        padding: 32px 26px;
      }

      .form-row {
        grid-template-columns: 1fr;
      }

      .map-info-panel {
        padding: 36px 28px;
      }

      
    }
</style>


    {{-- <div class="row">
        <div class="col-md-12">
            <section class="d-flex">
        <div class="banner-img">
            <img src="{{ asset('/public/uploads/images/footerimg/WE ARE HERE TO LISTEN (3).png') }}" class="h-100 w-100">
            <div>
             </section>
            <x-breadcrumb />
        </div>
    </div> --}}

    <section class="hero">
        <div class="hero-inner">
            <span class="hero-eyebrow">Get In Touch</span>
            <h1>Let's <em>start</em> the conversation.</h1>
            <p class="hero-sub">Send a message, schedule a free consultation, or come visit us in Lakeland. Whichever way
            feels right — we're here, and we read every message.</p>
        </div>
    </section>


    <section class="contact-main">
        <div class="container">
          <div class="contact-grid">

            <!-- ============ FORM CARD ============ -->
            <div class="contact-card form-card">
              <span class="card-eyebrow">Send a Message</span>
              <h2 class="card-title">Tell us what you need.</h2>
              <p class="card-description">Fill out the form and a member of our team will respond within one business day.
                Your information stays private.</p>

              <form method="POST" action="{{ route('contactMsgSubmit') }}">
                  @csrf
                  <div class="form-row">
                    {{-- OLD: single "name" field — split into first/last in new design; name="name" on first, name="last_name" on last --}}
                    <div class="form-group">
                      <label class="form-label">First Name <span class="required">*</span></label>
                      <input type="text" name="name" class="form-input" required placeholder="Jane">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Last Name <span class="required">*</span></label>
                      <input type="text" name="last_name" class="form-input" placeholder="Doe">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" name="email" class="form-input" required placeholder="you@email.com">
                  </div>

                  <div class="form-group">
                    <label class="form-label">Phone (Optional)</label>
                    <input type="tel" name="phone" class="form-input" placeholder="(863) 250-8764">
                  </div>

                  {{-- OLD: zip field — NOT IN NEW DESIGN (skipped) --}}
                  {{-- <input type="text" name="zip" placeholder="Zip Code" class="form-control zip form-control-text" required> --}}

                  <div class="form-group">
                    <label class="form-label">I'm Reaching Out About <span class="required">*</span></label>
                    {{-- NEW field only — no equivalent in old form --}}
                    <select name="inquiry_type" class="form-select" required>
                      <option value="">Select an inquiry type…</option>
                      <option value="general">General Inquiry</option>
                      <option value="program">Program Question</option>
                      <option value="remediation">FL BON Remediation</option>
                      <option value="press">Press / Partnerships</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Which Program Interests You?</label>
                    {{-- OLD: name="program" select — connected --}}
                    <select name="program" id="program" class="form-select">
                      <option value="" disabled selected>Select Course / Program</option>
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
                                  {{-- <optgroup label="Courses">
                                      @if (count($allCourses) > 0)
                                          @foreach ($allCourses as $thisCourse)
                                              <option value="{{ $thisCourse->title }}">
                                                  {{ $thisCourse->title }}</option>
                                          @endforeach
                                      @else
                                          <option disabled>-- No Course --</option>
                                      @endif
                                  </optgroup> --}}
                      </select>
                  </div>

                  {{-- OLD: year select — NOT IN NEW DESIGN (skipped) --}}
                  {{-- <select id="years" name="year" class="form-control w-100 mb-2" required>
                      <option value="" selected>Select Year</option>
                      @php $years = range(date('Y'), 1950); @endphp
                      @forelse ($years as $year)
                          <option value="{{ $year }}">{{ $year }}</option>
                      @empty
                          <option value="">No Year Found</option>
                      @endforelse
                  </select> --}}

                  <div class="form-group">
                    <label class="form-label">Where Are You In Your Journey?</label>
                    {{-- NEW field only — no equivalent in old form --}}
                    <select name="journey_stage" class="form-select">
                      <option value="">Select your situation…</option>
                      <option value="failed-nclex">I failed the NCLEX</option>
                      <option value="bon-order">FL BON has ordered remediation</option>
                      <option value="in-school">Currently in nursing school</option>
                      <option value="dismissed">Recently dismissed from program</option>
                      <option value="ien">Internationally educated nurse</option>
                      <option value="compact">Compact license transfer to FL</option>
                      <option value="other">Other</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="form-label">Your Message <span class="required">*</span></label>
                    {{-- OLD: name="message" textarea — connected --}}
                    <textarea name="message" class="form-textarea" required
                      placeholder="Tell us a bit about where you are and what you're looking for. The more we know, the better we can help."></textarea>
                  </div>

                  {{-- OLD: checkbox "Save my name..." — NOT IN NEW DESIGN (skipped) --}}
                  {{-- <input type="checkbox" name="per" id="per"> --}}
                  {{-- <label for="per">Save my name, email, and website in this browser for the next time I comment.</label> --}}

                  <button type="submit" class="form-submit">Send Message →</button>

                  {{-- OLD: privacy/terms links route('customer-help') — NOT IN NEW DESIGN (replaced by microcopy below) --}}
                  {{-- <p>By Submitting You agree to and with <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Our Privacy Policy</a> & <a href="{{ route('customer-help') }}#v-pills-home-tab">Terms</a></p> --}}
                  <p class="form-microcopy">By submitting, you agree to receive a response from our team. We never share your
                    information.</p>
              </form>

           </div>

            <!-- ============ CALENDAR CARD ============ -->
            <div class="contact-card calendar-card" id="booking">
              <span class="card-eyebrow">Book a Free Consultation</span>
              <h2 class="card-title">Talk to us live.</h2>
              <p class="card-description">A free 20-minute call to understand your situation and help you find the right
                path — even if that means recommending a different resource.</p>

              <ul class="calendar-features">
                <li>20 minutes — no sales script, no pressure</li>
                <li>Honest assessment of which program fits</li>
                <li>Clear answers about timing, cost, and outcomes</li>
                <li>Available evenings and Saturday mornings</li>
              </ul>

              <p class="calendar-quote">"A struggling student is not a failing student."</p>

              {{-- <a href="#" class="calendar-cta">Pick a Time on the Calendar →</a> --}}
              <a href="tel:8632508764" class="calendar-secondary">Or call us: (863) 250-8764</a>

              <p class="calendar-availability">
                <span class="availability-dot"></span>
                Currently accepting new students for the next cohort
              </p>
            </div>

            <!-- ============ INFO CARD ============ -->
            <div class="contact-card info-card">
              <span class="card-eyebrow">Visit · Call · Connect</span>
              <h2 class="card-title">We're not just online.</h2>
              <p class="card-description">Merkaii Xcellence Prep is based in Lakeland, FL. Drop in, call us, or follow
                along.</p>

              <div class="info-block">
                <h4>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                    <circle cx="12" cy="10" r="3" />
                  </svg>
                  Visit Us
                </h4>
                <p class="info-value">501 S. Florida Avenue<br>Lakeland, FL 33801</p>
                <p class="info-detail"><a href="#map">See on map ↓</a></p>
              </div>

              <hr class="info-divider">

              <div class="info-block">
                <h4>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                      d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg>
                  Call Us
                </h4>
                <p class="info-value"><a href="tel:8632508764">(863) 250-8764</a></p>
                <p class="info-detail">Live during business hours · Voicemail anytime</p>
              </div>

              <hr class="info-divider">

              <div class="info-block">
                <h4>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                  </svg>
                  Email Us
                </h4>
                <p class="info-value"><a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a></p>
                <p class="info-detail">We reply within one business day</p>
              </div>

              <hr class="info-divider">

              <div class="info-block">
                <h4>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12,6 12,12 16,14" />
                  </svg>
                  Hours of Operation
                </h4>
                <p class="info-value">Mon–Thu · 8:30am – 7:00pm</p>
                <p class="info-value">Saturday · 10:00am – 3:00pm</p>
                <p class="info-detail">Closed Friday & Sunday</p>
              </div>

              <hr class="info-divider">

              <div class="info-block">
                <h4>Follow Along</h4>
                <p class="info-detail" style="margin-bottom: 12px;">Study tips, comeback stories, and weekly notes for
                  nurses in the trenches.</p>


                <div class="info-social">
                  {{-- <div class="footer-social"> --}}

                      @php
                        $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status', 1)
                        ->orderBy('order', 'desc')
                        ->get();
                      @endphp
        
                    @foreach ($social_icons as $link)
                
                      <a href="{{ $link->link }}" target="_blank"
                        aria-label="{{ $link->name ?? 'Social Media' }}"
                        title="{{ $link->name ?? 'Social Media' }}">
                          <i class="{{ $link->icon }}"></i>
                      </a>

                    @endforeach
                  {{-- </div> --}}
                </div>

              </div>
            </div>

          </div>
        </div>
    </section>



  <section class="map-section" id="map">
     <div class="container">
       <div class="map-header">
         <span class="eyebrow">Find Us</span>
         <h2>Visit our Lakeland location.</h2>
         <p>Centrally located on S. Florida Avenue, easily accessible from I-4 and surrounding Florida cities. On-site
           sessions available by appointment.</p>
       </div>
 
       <div class="map-container">
         <div class="map-grid">
           <div class="map-info-panel">
             <div class="map-info-panel-content">
               <h3>Merkaii Xcellence Prep</h3>
               <p class="address-line">501 S. Florida Avenue<br>Lakeland, FL 33801</p>
               <p>Centrally located in Lakeland — about an hour from Tampa, Orlando, and the broader Polk County region.
                 Free parking available on-site.</p>
               <div class="map-actions">
                 <a href="https://www.google.com/maps/dir/?api=1&destination=501+S+Florida+Ave+Lakeland+FL+33801"
                   target="_blank" rel="noopener" class="map-action">
                   <span>Get Directions</span>
                   <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M14 3h7v7" />
                     <path d="M21 3l-9 9" />
                     <path d="M21 14v5a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h5" />
                   </svg>
                 </a>
                 <a href="https://www.google.com/maps/place/501+S+Florida+Ave,+Lakeland,+FL+33801" target="_blank"
                   rel="noopener" class="map-action">
                   <span>Open in Google Maps</span>
                   <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M14 3h7v7" />
                     <path d="M21 3l-9 9" />
                     <path d="M21 14v5a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h5" />
                   </svg>
                 </a>
                 <a href="tel:8632508764" class="map-action">
                   <span>Call Before You Visit</span>
                   <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path
                       d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                   </svg>
                 </a>
               </div>
             </div>
           </div>
           <div class="map-iframe-wrap">
             <iframe src="https://www.google.com/maps?q=501+S+Florida+Ave,+Lakeland,+FL+33801&output=embed"
               allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
               title="Map of Merkaii Xcellence Prep at 501 S. Florida Avenue, Lakeland, FL 33801">
             </iframe>
           </div>
         </div>
       </div>
     </div>
  </section>


    <!-- FAQ -->
    {{-- <section class="faq-section">
        <div class="container">
            <div class="faq-header">
                <span class="eyebrow">Quick Answers</span>
                <h2>Before you reach out…</h2>
            </div>

            <div class="faq-list">

                @if (isset($faqs) && count($faqs) > 0)

                    @foreach ($faqs as $faq)

                        @php
                            $answer = str_replace('&nbsp;', ' ', htmlspecialchars_decode(strip_tags($faq->answer)));
                        @endphp

                        <details class="faq-item" {{ $loop->first ? 'open' : '' }}>
                            <summary>{{ $faq->question }}</summary>

                            <div class="faq-item-body">
                                {{ $answer }}
                            </div>
                        </details>

                    @endforeach

                @endif

            </div>
        </div>
    </section> --}}

  <section class="faq-section">
    <div class="container">
      <div class="faq-header">
        <span class="eyebrow">Quick Answers</span>
        <h2>Before you reach out…</h2>
      </div>
      <div class="faq-list">
        <details class="faq-item">
          <summary>How soon will I hear back?</summary>
          <div class="faq-item-body">We respond to every form submission within one business day, and usually much
            sooner. If your situation is time-sensitive (an upcoming exam date, a Board deadline), please mention that
            in your message and we'll prioritize accordingly.</div>
        </details>
        <details class="faq-item">
          <summary>Is the consultation really free?</summary>
          <div class="faq-item-body">Yes — completely free. The consultation is 20 minutes, scheduled at your
            convenience, with no obligation. Even if we're not the right fit for your situation, we'll do our best to
            point you toward a resource that is.</div>
        </details>
        <details class="faq-item">
          <summary>I'm not sure which program I need. What should I do?</summary>
          <div class="faq-item-body">Start with the consultation. Our team will listen to where you are, understand what
            you've already tried, and help you choose the right path — whether that's FL BON Remediation, NCLEX
            Coaching, Nursing School Success, or the Nursing Comeback Program.</div>
        </details>
        <details class="faq-item">
          <summary>Do I need to live in Florida?</summary>
          <div class="faq-item-body">For our state-mandated FL BON Remediation Program, you must be a Florida-licensed
            nurse. For our other programs (NCLEX Success Coaching, Nursing School Success, Nursing Comeback), we serve
            students nationwide via live online cohorts and 1-on-1 coaching.</div>
        </details>
        <details class="faq-item">
          <summary>Can I visit the Lakeland location?</summary>
          <div class="faq-item-body">Yes — we welcome on-site visits by appointment. Please call ahead at (863) 250-8764
            so we can ensure a team member is available to meet with you. Walk-ins during business hours are also
            welcome, but appointments get priority.</div>
        </details>
        <details class="faq-item">
          <summary>I'm a journalist or partner — how do I reach you?</summary>
          <div class="faq-item-body">Please use the contact form and select "Press / Partnerships" as your inquiry type.
            Include your outlet, deadline (if any), and the nature of your inquiry. We'll route your request to the
            appropriate team member.</div>
        </details>
      </div>
    </div>
  </section>


    {{-- <div class="container custom-padding p-lg-5 p-3" id="contact-form-ankar">
        <div class="row px-2">
            <div class="col-md-12 mx-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row  px-5">

            <div class="col-md-12 col-12 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="data text-center">
                    <h2 class="custom_small_heading font-weight-bold mb-2">
                        Get In Touch hjhdjddjdjdjjd
                    </h2>
                    <p class="mb-5">
                        Have questions, we are here to answer.
                    </p>
                </div>
                <form method="POST" action="{{ route('contactMsgSubmit') }}">
                    @csrf
                    <div class="row formdokana px-2">
                        <div class="col-sm-6 col-md-6 col-12">
                            <input type="text" name="name" placeholder="Your Name"
                                class="form-control name form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <input type="text" name="email" placeholder="Email Address"
                                class="form-control email form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">
                            <input type="text" name="phone" placeholder="Phone#"
                                class="form-control phone form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <input type="text" name="zip" placeholder="Zip Code"
                                class="form-control zip form-control-text" required>
                        </div>
                        <div class="col-sm-6 col-md-6 col-12 selectProgram">
                            <select name="program" id="program" class="form-control">
                                <option value="" disabled selected>Select Course / Program</option>
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
                                <option value="" selected> Select Program</option>
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
                        </div>
                        <div class="col-sm-6 col-md-6 col-12">

                            <select id="years" name="year" class="form-control w-100 mb-2" required>
                                <option value="" selected>Select Year</option>
                                @php
                                    $years = range(date('Y'), 1950);
                                @endphp
                                @forelse ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @empty
                                    <option value="">No Year Found</option>
                                @endforelse

                            </select>
                        </div>

                        <div class="col-md-12 col-12 mt-1">

                            <!-- <textarea class="form-control" placeholder="Message" style="height:200px;">

                                            </textarea> -->
                            <textarea name="message" class="wpcf7-form-control wpcf7-textarea form-control wpcf7-validates-as-required"
                                aria-required="true" aria-invalid="false" placeholder="Message" style="height:100px;" required></textarea>

                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" name="per" id="per">
                                <label for="per">Save my name, email, and website in this browser for the next time I
                                    comment.</label>
                            </div>


                            <button type="submit" class="small_btn2 theme_btn my-2">Send</button>

                            <p>
                                By Submitting You agree to and with <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Our Privacy Policy</a> & <a
                                    href="{{ route('customer-help') }}#v-pills-home-tab">Terms</a>
                            </p>
                        </div>

                    </div>
                </form>
            </div>

            <div class="ankar col-md-12" data-aos="fade-up" data-aos-delay="300">
                <div class="data px-1">
                    <div class="grid_info py-5">
                        <div class="p-4" style="border: 1px solid #0000003f; border-radius: 8px;">
                            <a class="iconsdo d-flex flex-column gap-1">
                                <i class="fi fi-rs-marker" style="height: 30px; width: 30px; padding-left: .3rem; border: 1px solid #0000005b; border-radius: 6px;"></i>
                                <h5 class="fw-bold mb-2 mt-2">Visit Us</h5>
                                <p class="locaton"> 
                                    501 S. Florida Avenue
                                    <br> Lakeland FL 33801
                                </p>
                            </a>
                        </div>

                        <div class="p-4" style="border: 1px solid #0000003f; border-radius: 8px;">
                            <a class="iconsdo d-flex flex-column gap-1">
                                <i class="fi fi-br-phone-call" style="height: 30px; width: 30px; padding-left: .3rem; border: 1px solid #0000005b; border-radius: 6px;"></i>
                                <h5 class="fw-bold mb-2 mt-2">Call Us</h5>
                                <p class="locaton"> 863-250-8764 | 347-525-1736</p>
                            </a>
                        </div>

                        <div class="p-4" style="border: 1px solid #0000003f; border-radius: 8px;">
                            <a class="iconsdo d-flex flex-column gap-1">
                                <i class="fi fi-br-envelope" style="height: 30px; width: 30px; padding-left: .3rem; border: 1px solid #0000005b; border-radius: 6px;"></i>
                                <h5 class="fw-bold mb-2 mt-2">Feedbacks</h5>
                                <p class="locaton">contact@merkaiixcelprep.com</p>
                            </a>
                        </div>

                        <div class="p-4" style="border: 1px solid #0000003f; border-radius: 8px;">
                            <a class="iconsdo d-flex flex-column gap-1">
                                <i class="fi fi-rs-clock-three" style="height: 30px; width: 30px; padding-left: .3rem; border: 1px solid #0000005b; border-radius: 6px;"></i>
                                <h5 class="fw-bold mb-2 mt-2">Opening and Closing timing</h5>
                                <p class="locaton"> Mon - Thur: 8:30 AM - 7:00 PM</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            </div>
            </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="container-fluid doosme p-0">
        <div class="row">
             <div class="col-md-12"> 
             <div class="row"> 
             <div class="col-md-12"> 
             <div class="row px-4"> 
             <div class="col-sm-12 col-md-12">
                <div class="map m-1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5753.884181787861!2d-81.95946927069843!3d28.0388028608652!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88dd38ca4722ecc9%3A0x10d88b4491e12478!2s501%20Florida%20Ave%20S%2C%20Lakeland%2C%20FL%2033801%2C%20USA!5e0!3m2!1sen!2s!4v1705573853815!5m2!1sen!2s"
                        width="100%" style="border: 0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div> 
            <div class="col-sm-6 col-md-4">
                              <div class="map m-1">
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14944372.906747056!2d34.40694603561576!3d23.87086960764348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1675226140271!5m2!1sen!2s"
                                  width="100%"
                                  height="450"
                                  style="border: 0;"
                                  allowfullscreen=""
                                  loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                              <div class="map m-1">
                                <iframe
                                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14944372.906747056!2d34.40694603561576!3d23.87086960764348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1675226140271!5m2!1sen!2s"
                                  width="100%"
                                  height="450"
                                  style="border: 0;"
                                  allowfullscreen=""
                                  loading="lazy"
                                  referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                              </div>
                            </div>
            </div>
            </div>
            </div>
            </div> 
        </div>
    </div> --}} 

    {{-- </div> --}}
    {{-- apply now Section  --}}
    {{-- <section class="contact_section mb-md-5 mb-4">
        <div class="contain mintban">
            <div class="contact-overlay"></div>
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div class="row ">
                <div class="col-md-12 flowdiv">
                    <div class="row m-0" style="">
                        <div class="col-6 p-0 flowdiv-dataflow" data-aos="fade-right">
                            <div class="data-flow p-3 p-md-5">
                                <div class="dataflow text-white">
                                    <h2 class="custom_small_heading mx-2 mx-md-3 pt-2">Achieve More</h2>
                                    <p class="mx-2 my-2 text-white dataflow-p">Elevate your educational experience with our
                                        dynamic lectures,
                                        review courses and programs. Apply today and let Merkaii Xcellence Prep be the
                                        foundation of your success.</p>
                                </div>
                            </div>
                            <img src="{{ asset('public/assets/left-arrow-64.png') }}" height="50" class="lia"
                                style="position:absolute;right: -12px;">
                        </div>
                        <!-- <div class="col-sm-6 ankar col-md-6 p-0" >
                                                                                                                                                                                                                 </div> -->
                        <div class="col-6 ankar p-0" data-aos="fade-left">
                            <div class="eltdf-eh-item eltdf-background-arrow-left changeborder p-2 p-sm-4"
                                style="background: white;">
                                <!-- <div class="eltdf-eh-item eltdf-background-arrow-left" style="/* visibility: hidden; */border-color: #ffffff;/* display: none; */background-color: #ffffff;background-image: url(https://academist.qodeinteractive.com/wp-content/uploads/2018/07/Form-background-img.jpg)" data-item-class="eltdf-eh-custom-5500" data-769-1024="15% 10% 6% 10%" data-681-768="10% 15% 5% 15%" data-680="0% 20px 0% 20px"> -->
                                <div class="eltdf-eh-item-inner pt-2 mx-2">
                                    <div class="eltdf-eh-item-content eltdf-eh-custom-5500 mx-sm-2 mx-md-3 text-center"
                                        style="">
                                        <div class="wpb_text_column wpb_content_element text-center">
                                            <div class="wpb_wrapper">
                                                <h2 class="wpb_wrapper_h"style="font-weight: bold;">Apply Now</h2>
                                            </div>
                                        </div>
                                         <div class="vc_empty_space" style="height: 25px"><span
                                                class="vc_empty_space_inner"></span></div>
                                        <div role="form" class="wpcf7" id="wpcf7-f910-p311-o2" lang="en-US"
                                            dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                <ul></ul>
                                            </div>
                                            <form action="{{ route('contactLogin') }}" method="POST"
                                                class="wpcf7-form init demo">
                                                @csrf
                                                <div class="eltdf-contact-form-7-widget">
                                                    <span class="wpcf7-form-control-wrap " data-name="your-email"><input
                                                            type="email" name="email" value="{{ old('email') }}"
                                                            size="40"
                                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email w-100"
                                                            required placeholder="Email"></span><br>
                                                    <span class="wpcf7-form-control-wrap w-100"
                                                        data-name="your-tel"><input type="password" name="password"
                                                            value="{{ old('password') }}" size="40"
                                                            class="w-100 wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel w-100"
                                                            required placeholder="Password"></span><br>
                                                     <input type="submit" value="Get it now"
                                                        class="has-spinner small_btn theme_btn wpcf7-form-control wpcf7-submit mt-4"><span
                                                        class="wpcf7-spinner"></span> 
                                                    <button type="submit" class="theme_btn small_btn5 text-center p-2">
                                                        {{ __('Apply') }}</button>
                                                </div>
                                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                                            </form>
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
        </div>

        
    </section> --}}
    {{-- footer Section  --}}




    @include(theme('partials._custom_footer'))



@endsection
@section('js')
    <script>
        AOS.init();

        // You can also pass an optional settings object
        // below listed default settings
        AOS.init({
            duration: 1000,
            // Global settings:
            // disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            // startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            // initClassName: 'aos-init', // class applied after initialization
            // animatedClassName: 'aos-animate', // class applied on animation
            // useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            // disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            // debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            // throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            // offset: 120, // offset (in px) from the original trigger point
            // delay: 0, // values from 0 to 3000, with step 50ms
            // // values from 0 to 3000, with step 50ms
            // easing: 'ease', // default easing for AOS animations
            // once: false, // whether animation should happen only once - while scrolling down
            // mirror: false, // whether elements should animate out while scrolling past them
            // anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

        });
        // $(document).ready(function() {
        //     $('#years').select2();
        //     $('#program').select2();

        // });
    </script>

    <script>
    $(document).ready(function () {
        $('#program').select2({
            width: '100%'
        });
    });
</script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Settings('gmap_key') }}"></script>
    <script src="{{ asset('public/frontend/infixlmstheme') }}/js/map.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/frontend/infixlmstheme/js/contact.js') }}"></script>
@endsection
