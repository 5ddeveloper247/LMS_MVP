{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-K2m8j9G5CrXJcS7MZyDZp3c9ZFehXbZ2M4m8KpA4y6XrbY6x9xL7DkIbYp6EZxjEJSt2eyM4f53S4z2f6i2PAA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> @section('css')

    <style>
        footer h5 {
            font-family: "Inter" !important
        }

        footer p:hover a {
            color: var(--footer_text_hover_color) !important
        }

        .envelop {
            margin-top: -5rem;
            margin-right: -4rem;
        }

        @media (max-width: 992px) {
            .envelop {
                margin-top: 0;
                margin-right: 0;
            }
        }

        .fab,
        .fa {
            font-family: "Font Awesome 6 Brands" !important;
            font-weight: 400;
        }

        .fa-angle-up,
        .fa-angle-right {
            font-family: "Font Awesome 6 Free" !important;
        }

        .fa-classic,
        .fa-regular,
        .fa-solid,
        .far,
        .fas {
            font-family: "Font Awesome 6 Free" !important;
        }
    </style>
@endsection <section class="mt-5">
    <div class="container-fluid py-5 px-3 px-sm-5" style="max-width: 1650px !important;">
        <div class="row align-items-center" style="background: #F8F6F9; border-radius: 20px">
            <!-- Right Content Section -->
            <div class="col-lg-7 py-4 px-5">
                <h2 class="mb-4" style="font-weight: bold; color: #2b1c61;"> Join <span style="color: #ff7b00;">Our
                        Adult Learner’s</span>Community </h2>
                <p class="mb-4" style="color: #555;"> Encourage visitors to join your email list to receive exclusive
                    content and updates. This positions you as a helpful partner and nurtures leads who aren’t yet ready
                    to buy. </p>
                <div class="container-footer mb-2" style="max-width: 37rem">
                    <form action="{{ route('subscribe') }}" class="form" method="POST"> @csrf <input type="email"
                            class="sub_email bg-white" placeholder="Enter Your Email" name="email" style="">
                        <button type="submit" class="subscribe_newsleter py-2 px-3"
                            style="background-color: var(--system_primery_color)"> <i class="fas fa-envelope"
                                style="color: #ffffff;"></i> SUBSCRIBE </button>
                    </form>
                </div>
                <h6 class="custom_footer_text" style="color: #000;"> By Subscribing You agree to and with <a
                        href="{{ route('customer-help') }}#v-pills-profile-tab-1"
                        style="color: #8a8a8a; font-weight:700;"> <u>Our Privacy Policy</u> </a> & <a
                        href="{{ route('customer-help') }}#v-pills-home-tab" style="color: #8a8a8a; font-weight:700;">
                        <u>Terms</u> </a> </h6>
            </div>
            <div class="col-lg-5" style="text-align: end"> <img src="{{ asset('public/assets/envelop.png') }}"
                    class="envelop" width="80%" alt=""> </div>
        </div>
    </div>
</section> --}}

{{-- <footer class="footer py-4">
    <div class="container-fluid pt-5 px-3 px-sm-5" style="max-width: 1650px !important;">
        <div class="row mb-5">
            <div class="float-lg-right d-flex flex-wrap align-items-center w-100 justify-content-between footerbox1"
                style="gap: 14px">
                <div class="locaton fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                        <i class="fi fi-rs-marker text-white" style="font-size: 1.5rem"></i>
                    </div>
                    <div>
                        <h5 class="mb-1 inter"
                            style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">
                            Address:</h5> <span> 501 S. Florida Avenue Lakeland, FL 33801 </span>
                    </div>
                </div>
                <div class="call fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                        <i class="fas fa-phone text-white" style="font-size: 1.5rem"></i>
                    </div>
                    <div class="text-white">
                        <h5 class="text-white mb-1 inter"
                            style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">
                            Phone Number:</h5> <a href="tel:+18632508764"
                            style="text-decoration: none; color: #fff !important;"> 863-250-8764 </a> | <a
                            href="tel:+13475251736" style="text-decoration: none; color: #fff !important;"> 347-525-1736
                        </a>
                    </div>
                </div>
                <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                        <i class="fi fi-rs-clock-three text-white" style="font-size: 1.5rem"></i>
                    </div>
                    <div>
                        <h5 class="mb-1 inter"
                            style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">
                            Operations</h5>
                        <div class="d-flex flex-column gap-0"> <span>Mon – Thur: 8:30am – 7:00pm</span> <span
                                style="line-height: 100%">Sat: 10:00am – 3:00pm</span> </div>
                    </div>
                </div>
                <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;"> <a
                        href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank"
                        style="text-decoration: none; color: #fff !important;">
                        <div class="d-flex align-items-center justify-content-center"
                            style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                            <i class="fas fa-envelope text-white" style="font-size: 1.5rem"></i>
                        </div>
                    </a>
                    <div>
                        <h5 class="mb-1 inter"
                            style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">
                            Email</h5> <span>contact@merkaiixcelprep.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 1px; width: 100%; background-color: #ffffff43;"></div>
    <div class="container-fluid pt-5 px-3 px-sm-5" style="max-width: 1650px !important;">
        <div class="row text-white">
            <div class="col-lg-3">
                <div class="d-flex align-items-center mb-3 gap-1">
                    <div class=" "> <a href="{{ url('/') }}"> <img class="image_size"
                                style="filter: drop-shadow(0px 4px 4px #000000);"
                                src="{{ getLogoImage(Settings('logo')) }}" alt="{{ Settings('site_name') }}"> </a>
                    </div>
                    <h5 class="text-white fw-bold inter mb-0">Merkaii Xcellence Prep</h5>
                </div>
                <p class="text-white inter" style="font-size: 16px !important; line-height: 1.3;">
                    {{ function_exists('footerSettings') ? footerSettings('footer_about_description') : '' }} </p>
                <div class="row align-items-center justify-content-start mt-3 mx-1"> @php $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status', 1) ->orderBy('order', 'desc') ->get(); @endphp @if (count($social_icons) > 0) <span
                            class="d-flex icons justify-content-start" style="gap: 10px;">
                            @foreach ($social_icons as $link)
                                <a href="{{ $link->link }}" class="d-flex align-items-center justify-content-center"
                                    style="color:#FF6B6B; background-color: #4D5756; border-radius: 50px; height: 50px; width: 50px;">
                                    <i class="{{ $link->icon }}"></i> </a>
                            @endforeach
                        </span> @endif
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="expore px-4 inter py-lg-2 py-sm-4 py-2 text-white"> <x-footer-section-one-widget /> </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-4 inter py-lg-2 py-sm-4 py-2"> <x-footer-section-two-widget /> </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-lg-0 px-4 inter py-lg-2 py-sm-4 py-2"> <x-footer-section-three-widget />
                </div>
            </div> <div class="col-lg-3 col-sm-6"> <div class="footerbox1 px-4 inter py-lg-2 py-sm-4 py-2"> <x-footer-section-four-widget /> </div> </div>
        </div>
    </div>
</footer> --}}

{{-- 
<div class="col-md-12 py-3" style="background-color: #0F2C53;">
    <div style="max-width: 1650px !important"
        class="container-fluid px-3 px-sm-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div> <span style="" class="fs-responsive text-white">
                {{ function_exists('footerSettings') ? strip_tags(footerSettings('footer_copy_right')) : '' }} </span>
        </div>
        <div> <span style="" class="fs-responsive text-white"> <a
                    href="{{ route('customer-help') }}#v-pills-profile-tab-1" class="text-white">Privacy Policy</a> |
                <a href="{{ route('customer-help') }}#v-pills-home-tab" class="text-white">Terms</a> | <a
                    href="{{ route('customer-help') }}#v-pills-cookies-tab" class="text-white">Cookies Policy</a> |
                <a href="{{ route('customer-help') }}#tab-7" class="text-white">FAQs</a> </span> </div>
    </div>
</div> --}}

{{-- <script src="{{ asset('public/vendor/ckeditor5/build/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
                $('.search_courses').keyup(function(
                            e
                            ) { // alert('working'); if ($('#search').val() == '') { $('#search_listing').remove(); return false; } var value = $(this).val(); localStorage.setItem("is_program_search", 1); $.ajax({ type: "GET", url: "{{ route('search') }}", data: { 'name': value }, dataType: "json", success: function(response) { $('.search_courses_list').html(response); } }); }); }); function selectedSearch(name, type = 'program') { if (type != null) { switch (type) { case 'prep_course_live': name = name + '(Prep Course - Live)'; break; case 'full_course': name = name + '(Full Course)'; break; case 'program': name = name + '(Program)'; break; default: break; } } if (localStorage.getItem('is_program_search') == 1) { $('#search_form').find('#search').val(name); $('#search_form').find('#search').focus(); $('#search_listing').remove(); } if (localStorage.getItem('is_program_page') == 1) { $('#program_title').val(name); $('#program_title').focus(); } } function informationflag($text) { localStorage.setItem("information", $text); } 
</script>
<script>
    document.addEventListener('click', function(event) {
        var isClickInside = document.getElementById('collapseExample').contains(event.target);
        var isIconClick = event.target.closest('.input-group-prepend');
        if (!isClickInside && !isIconClick) {
            $('#collapseExample').collapse('hide');
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}



{{-- NEW FOOTER CODE  --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,500&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">


@section('css')
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
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: var(--sans) !important;
      color: var(--charcoal);
      background: var(--cream);
      line-height: 1.6;
    }

    /* Demo content placeholder */
    .demo-content {
      max-width: 800px;
      margin: 60px auto;
      padding: 0 24px;
    }
    .demo-content h1 {
      font-family: var(--serif) !important;
      font-size: 36px;
      color: var(--teal-darkest);
      margin-bottom: 20px;
    }
    .demo-content p {
      font-size: 15px;
      color: var(--charcoal-soft);
      line-height: 1.8;
      margin-bottom: 16px;
    }
    .demo-note {
      background: var(--cream-warm);
      border: 2px dashed var(--terracotta);
      border-radius: 12px;
      padding: 28px;
      margin-bottom: 40px;
      font-size: 14px;
      color: var(--charcoal-soft);
      line-height: 1.7;
    }
    .demo-note strong { color: var(--terracotta); }


    /* ================================================================
       ROW 1: FOOTER NAV GRID
       ================================================================ */
    .footer-main {
      background: var(--teal-darkest);
      color: rgba(255, 255, 255, 0.85);
      padding: 70px 0 0;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
      gap: 40px;
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 24px 50px;
    }

    /* --- Brand Column --- */
    .footer-brand-col {
      padding-right: 20px;
    }
    .footer-logo-mark {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
      margin-bottom: 20px;
    }
    .footer-seal-wrap {
      width: 56px;
      height: 56px;
      flex-shrink: 0;
    }
    .footer-seal-wrap svg {
      width: 100%;
      height: 100%;
      display: block;
    }
    .footer-logo-text {
      display: flex;
      flex-direction: column;
      line-height: 1.05;
    }
    .footer-logo-text .name {
      font-family: var(--serif) !important;
      font-weight: 700;
      font-size: 20px;
      color: var(--white);
      letter-spacing: 0.2px;
    }
    .footer-logo-text .tag {
      font-family: var(--sans) !important;
      font-size: 9.5px;
      letter-spacing: 1.8px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      margin-top: 3px;
    }
    .footer-desc {
      font-size: 13.5px;
      line-height: 1.7;
      color: rgba(255, 255, 255, 0.72);
      margin-bottom: 22px;
      max-width: 340px;
       display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .footer-tagline-motto {
      font-family: var(--serif) !important;
      font-style: italic;
      font-size: 15px;
      color: var(--terracotta);
      margin-bottom: 10px;
    }
    .footer-tagline-quote {
      font-family: var(--serif) !important;
      font-style: italic;
      font-size: 14px;
      color: var(--cream);
      opacity: 0.75;
      padding-top: 14px;
      margin-top: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    /* --- Nav Columns --- */
    .footer-col h5 {
      font-family: var(--serif) !important;
      font-weight: 700;
      font-size: 16px;
      color: var(--cream);
      margin-bottom: 18px;
      letter-spacing: 0.3px;
    }
    .footer-col ul {
      list-style: none;
    }
    .footer-col li {
      margin-bottom: 11px;
    }
    .footer-col  p a {
      color: rgba(255, 255, 255, 0.75) !important;
      text-decoration: none;
      font-size: 13.5px !important;
      transition: color 0.2s !important;
      font-family: var(--sans) !important;
    }
    .footer-col a:hover {
      color: var(--terracotta) !important;
    }


    /* ================================================================
       ROW 2: CONTACT BAND
       ================================================================ */
    .footer-contact {
      background: rgba(0, 0, 0, 0.18);
      padding: 30px 0;
    }
    .footer-contact-inner {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 24px;
    }
    .footer-contact-info {
      font-size: 13.5px;
      line-height: 1.85;
      color: rgba(255, 255, 255, 0.82);
    }
    .footer-contact-info strong {
      color: var(--cream);
      font-size: 14.5px;
    }
    .footer-contact-info a {
      color: rgba(255, 255, 255, 0.82);
      text-decoration: none;
      transition: color 0.2s;
    }
    .footer-contact-info a:hover {
      color: var(--terracotta);
    }
     .footer-social {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .footer-social a {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--cream);
      text-decoration: none;
      transition: all 0.2s;
    }

   .footer-social a:hover {
      background: var(--terracotta);
      border-color: var(--terracotta);
      color: var(--white);
      transform: translateY(-2px);
    }

   .footer-social svg {
      width: 15px;
      height: 15px;
    }

    /* ================================================================
       ROW 3: LEGAL BAR
       ================================================================ */
    .footer-legal {
      background: #052821;
      padding: 24px 0;
      font-size: 11.5px;
      color: rgba(255, 255, 255, 0.5);
      line-height: 1.7;
    }
    .footer-legal-inner {
      max-width: 1240px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .footer-legal-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 14px;
      padding-bottom: 14px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .footer-legal-links {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .footer-legal a {
      color: rgba(255, 255, 255, 0.6) !important;
      text-decoration: none;
      transition: color 0.2s;
    }
    .footer-legal a:hover {
      color: var(--terracotta) !important;
    }
    .footer-disclaimer {
      font-size: 11px;
      color: rgba(255, 255, 255, 0.38);
      line-height: 1.65;
      max-width: 1100px;
    }


    /* ================================================================
       RESPONSIVE
       ================================================================ */
    @media (max-width: 1024px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 36px;
      }
      .footer-brand-col {
        grid-column: 1 / -1;
        padding-right: 0;
      }
    }

    @media (max-width: 768px) {
      .footer-grid {
        grid-template-columns: 1fr;
        gap: 32px;
        padding: 0 24px 40px;
      }
      .footer-contact-inner {
        flex-direction: column;
        align-items: flex-start;
      }
      .footer-social {
        justify-content: flex-start;
      }
      .footer-legal-top {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
      }
      .footer-legal-links {
        gap: 16px;
      }
    }

    @media (max-width: 480px) {
      .footer-main { padding: 50px 0 0; }
      .footer-grid { padding: 0 16px 32px; }
      .footer-contact-inner { padding: 0 16px; }
      .footer-legal-inner { padding: 0 16px; }
    }
  </style>
@endsection


 <footer class="footer-main">

  <!-- ROW 1: NAV GRID -->
  <div class="footer-grid">

    <!-- Brand Column -->
    <div class="footer-col footer-brand-col">
      <a href="index.html" class="footer-logo-mark">
        <div class="footer-seal-wrap">
          <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="1.5"/>
            <circle cx="50" cy="50" r="40" fill="#0F6E56"/>
            <text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text>
            <text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text>
            <text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text>
            <line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="1.2"/>
          </svg>
        </div>
        <div class="footer-logo-text">
          <span class="name">Merkaii Xcellence Prep</span>
          <span class="tag">NCLEX Prep · Remediation</span>
        </div>
      </a>
      <p class="footer-desc" style="font-family: var(--sans)">{{ function_exists('footerSettings') ? footerSettings('footer_about_description') : '' }}</p>
      <p class="footer-tagline-motto">Knowledge · Understanding · Wisdom</p>
      <p class="footer-tagline-quote">"A struggling student is not a failing student."</p>
    </div>

    <!-- Programs Column -->
    <div class="footer-col">
        <x-footer-section-one-widget />
    </div>

    <!-- Learn Column -->
   <div class="footer-col">
        <x-footer-section-two-widget />
    </div>

    <!-- Shop Column -->
    <div class="footer-col">
        <x-footer-section-three-widget />
    </div>

    <!-- Connect Column -->
    <div class="footer-col">
        <x-footer-section-four-widget />
    </div>

  </div>

  <!-- ROW 2: CONTACT BAND -->
  <div class="footer-contact">
    <div class="footer-contact-inner">
      <div class="footer-contact-info">
        <strong>Merkaii Xcellence Prep</strong><br>
        501 S. Florida Avenue, Lakeland, FL 33801<br>
        <a href="tel:8632508764">(863) 250-8764</a> · <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a><br>
        Mon–Thu 8:30am–7:00pm · Sat 10:00am–3:00pm
      </div>

     <div class="footer-social">

        @php
        $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status', 1)
        ->orderBy('order', 'desc')
        ->get();
        @endphp

        @foreach ($social_icons as $link)

        <a href="{{ $link->link }}" target="_blank" aria-label="{{ $link->name ?? 'Social Media' }}"
          title="{{ $link->name ?? 'Social Media' }}">

          <i class="{{ $link->icon }}"></i>

        </a>

        @endforeach
      </div>

    </div>
  </div>

  <!-- ROW 3: LEGAL BAR -->
  <div class="footer-legal">
    <div class="footer-legal-inner">
      <div class="footer-legal-top">
        <span>{{ function_exists('footerSettings') ? strip_tags(footerSettings('footer_copy_right')) : '' }}</span>
        
        {{-- <div class="footer-legal-links">
            <a href="{{ route('customer-help') }}#v-pills-profile-tab-1" class="text-white">Privacy Policy</a>
            <a href="{{ route('customer-help') }}#v-pills-home-tab" class="text-white">Terms</a>
            <a href="{{ route('customer-help') }}#v-pills-cookies-tab" class="text-white">Cookies Policy</a>
            <a href="{{ route('customer-help') }}#tab-7" class="text-white">FAQs</a> </span> 
        </div> --}}
      </div>
      <p class="footer-disclaimer">Merkaii Xcellence Prep offers educational materials and preparatory resources for the NCLEX, FL BON remediation, and related nursing examinations. All cited trademarks (NCLEX®, NCSBN®, etc.) are the property of their respective owners and are used here for referential purposes only. Merkaii Xcellence Prep operates independently and is not affiliated with, sponsored by, or endorsed by the proprietors of these examination trademarks. For the most current information about these examinations, please refer to the official testing bodies.</p>
    </div>
  </div>

</footer>