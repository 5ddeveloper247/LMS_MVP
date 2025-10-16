<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-K2m8j9G5CrXJcS7MZyDZp3c9ZFehXbZ2M4m8KpA4y6XrbY6x9xL7DkIbYp6EZxjEJSt2eyM4f53S4z2f6i2PAA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>


@section('css')
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

        .fab, .fa {
            font-family: "Font Awesome 6 Brands" !important;
            font-weight: 400;
        }

        .fa-angle-up,.fa-angle-right {
            font-family: "Font Awesome 6 Free" !important;
        }

        .fa-classic, .fa-regular, .fa-solid, .far, .fas {
            font-family: "Font Awesome 6 Free" !important;
        }
    </style>
@endsection


<section class="mt-5">
    <div class="container-fluid py-5 px-3 px-sm-5" style="max-width: 1650px !important;">
        <div class="row align-items-center" style="background: #F8F6F9; border-radius: 20px">
            <!-- Right Content Section -->
            <div class="col-lg-7 py-4 px-5">
                <h2 class="mb-4" style="font-weight: bold; color: #2b1c61;">
                    Join <span style="color: #ff7b00;">Our Adult Learner’s</span>Community
                </h2>
                <p class="mb-4" style="color: #555;">
                    Encourage visitors to join your email list to receive exclusive content and updates. This positions
                    you as a helpful partner and nurtures leads who aren’t yet ready to buy.
                </p>

                <div class="container-footer mb-2" style="max-width: 37rem">
                    <form action="{{ route('subscribe') }}" class="form" method="POST">
                        @csrf
                        <input type="email" class="sub_email bg-white" placeholder="Enter Your Email" name="email"
                            style="">
                        <button type="submit" class="subscribe_newsleter py-2 px-3"
                            style="background-color: var(--system_primery_color)">
                            <i class="fas fa-envelope" style="color: #ffffff;"></i>
                            SUBSCRIBE
                        </button>
                    </form>

                </div>
                <h6 class="custom_footer_text" style="color: #000;">
                    By Subscribing You agree to and with
                    <a href="{{ route('customer-help') }}#v-pills-profile-tab-1"
                        style="color: #8a8a8a; font-weight:700;">
                        <u>Our Privacy Policy</u>
                    </a> &
                    <a href="{{ route('customer-help') }}#v-pills-home-tab" style="color: #8a8a8a; font-weight:700;">
                        <u>Terms</u>
                    </a>
                </h6>
            </div>

            <div class="col-lg-5" style="text-align: end">
                <img src="{{ asset('public/assets/envelop.png') }}" class="envelop"
                    width="80%" alt="">
            </div>
        </div>
    </div>
</section>


<footer class="footer py-4">
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
                        <h5 class="mb-1 inter" style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">Address:</h5>
                        <span>
                            501 S. Florida Avenue
                            Lakeland, FL 33801
                        </span>
                    </div>
                </div>


                <div class="call fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                        <i class="fas fa-phone text-white" style="font-size: 1.5rem"></i>
                    </div>

                    <div class="text-white">
                        <h5 class="text-white mb-1 inter" style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">Phone Number:</h5>
                        <a href="tel:+18632508764" style="text-decoration: none; color: #fff !important;">
                            863-250-8764
                        </a> |
                        <a href="tel:+13475251736" style="text-decoration: none; color: #fff !important;">
                            347-525-1736
                        </a>
                    </div>
                </div>


                <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                        <i class="fi fi-rs-clock-three text-white" style="font-size: 1.5rem"></i>
                    </div>
                    <div>
                        <h5 class="mb-1 inter" style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">Operations</h5>
                        <div class="d-flex flex-column gap-0">
                            <span>Mon – Thur: 8:30am – 7:00pm</span>
                            <span style="line-height: 100%">Sat: 10:00am – 3:00pm</span>
                        </div>
                    </div>
                </div>


                <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank"
                        style="text-decoration: none; color: #fff !important;">
                        <div class="d-flex align-items-center justify-content-center"
                            style="background-color: #ffffff0d; border: 1px solid #fff; height: 75px; width: 75px; border-radius: 50px;">
                            <i class="fas fa-envelope text-white" style="font-size: 1.5rem"></i>
                        </div>
                    </a>
                    <div>
                        <h5 class="mb-1 inter" style="color: var(--system_secendory_color) !important; font-weight: 500 !important; font-size: 18px;">Email</h5>
                        <span>contact@merkaiixcelprep.com</span>
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
                    <div class=" ">
                        <a href="{{ url('/') }}">
                            <img class="image_size" style="filter: drop-shadow(0px 4px 4px #000000);" src="{{ getLogoImage(Settings('logo')) }}"
                                alt="{{ Settings('site_name') }}">
                        </a>
                    </div>
                    <h5 class="text-white fw-bold inter mb-0">Merkaii Xcellence Prep</h5>
                </div>

                <p class="text-white inter" style="font-size: 16px !important; line-height: 1.3;">
                    Interdum velit laoreet id donec ultrices tincidunt arcu. Tincidunt tortor aliqua mfacilisi cras fermentum odio eu.
                </p>

                <div class="row align-items-center justify-content-start mt-3 mx-1">
                    @php
                        $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status', 1)
                            ->orderBy('order', 'desc')
                            ->get();
                    @endphp
                    @if (count($social_icons) > 0)
                        <span class="d-flex icons justify-content-start" style="gap: 10px;">
                            @foreach ($social_icons as $link)
                                <a href="{{ $link->link }}" class="d-flex align-items-center justify-content-center" style="color:#FF6B6B; background-color: #4D5756; border-radius: 50px; height: 50px; width: 50px;">
                                    <i class="{{ $link->icon }}"></i>
                                </a>
                            @endforeach
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="expore px-4 inter py-lg-2 py-sm-4 py-2 text-white">
                    <x-footer-section-one-widget />
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-4 inter py-lg-2 py-sm-4 py-2">
                    <x-footer-section-two-widget />
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-lg-0 px-4 inter py-lg-2 py-sm-4 py-2">
                    <x-footer-section-three-widget />
                </div>
            </div>
            {{-- <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-4 inter py-lg-2 py-sm-4 py-2">
                    <x-footer-section-four-widget />
                </div>
            </div> --}}
        </div>
    </div>
</footer>

<div class="col-md-12 py-3" style="background-color: #0F2C53;">
    <div style="max-width: 1650px !important" class="container-fluid px-3 px-sm-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div>
            <span style="" class="fs-responsive text-white">
                {{ function_exists('footerSettings') ? strip_tags(footerSettings('footer_copy_right')) : '' }}
            </span>
        </div>

        <div>
            <span style="" class="fs-responsive text-white">
                <a href="{{ route('customer-help') }}#v-pills-profile-tab-1" class="text-white">Privacy
                    Policy</a> |
                <a href="{{ route('customer-help') }}#v-pills-home-tab" class="text-white">Terms</a>
                |
                <a href="{{ route('customer-help') }}#v-pills-cookies-tab" class="text-white">Cookies
                    Policy</a> |
                <a href="{{ route('customer-help') }}#tab-7" class="text-white">FAQs</a>
            </span>
        </div>
    </div>
</div>

<script src="{{ asset('public/vendor/ckeditor5/build/ckeditor.js') }}"></script>

<script>
    $(document).ready(function() {

        $('.search_courses').keyup(function(e) {
            // alert('working');
            if ($('#search').val() == '') {
                $('#search_listing').remove();
                return false;
            }
            var value = $(this).val();
            localStorage.setItem("is_program_search", 1);
            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                data: {
                    'name': value
                },
                dataType: "json",
                success: function(response) {
                    $('.search_courses_list').html(response);
                }
            });
        });
    });

    function selectedSearch(name, type = 'program') {

        if (type != null) {
            switch (type) {
                case 'prep_course_live':

                    name = name + '(Prep Course - Live)';
                    break;
                case 'full_course':
                    name = name + '(Full Course)';

                    break;
                case 'program':
                    name = name + '(Program)';

                    break;

                default:
                    break;
            }
        }
        if (localStorage.getItem('is_program_search') == 1) {

            $('#search_form').find('#search').val(name);
            $('#search_form').find('#search').focus();
            $('#search_listing').remove();
        }
        if (localStorage.getItem('is_program_page') == 1) {
            $('#program_title').val(name);
            $('#program_title').focus();
        }
    }

    function informationflag($text) {
        localStorage.setItem("information", $text);
    }
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
