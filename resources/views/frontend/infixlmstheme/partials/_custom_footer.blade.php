@section('css')
    <style>
        overflow-x: visible !important;
        }

        */
    </style>
@endsection
<!-- UP_ICON  -->
{{-- <div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="fa fa-angle-up font-weight-bold" aria-hidden="true" style="
    margin-top: 15px;
"></i>
    </a>
</div> --}}
{{-- <div> --}}


<section class="mt-5">
    <div class="container px-lg-5 "
        style="background: linear-gradient(to right, #fdfbfb, #f5ebe0); border-radius: 40px 40px 0 0;">
        <div class="row align-items-center px-xl-5">
            <!-- Left Image Section -->
            <div class="col-lg-5 text-center">
                <img src="https://skola.madrasthemes.com/wp-content/uploads/2021/03/photo-11.png"
                    style="margin-top: -3rem" width="55%" alt="">
            </div>

            <!-- Right Content Section -->
            <div class="col-lg-7 pb-4">
                <p class="mb-3" style="color: #ff7b00; font-weight: bold; text-transform: uppercase;">Newsletter</p>
                <h2 class="mb-4" style="font-weight: bold; color: #2b1c61;">
                    Join <span style="color: #ff7b00;">Our Adult Learner’s</span> <span
                        style="color: #2b1c61;">Community</span>
                </h2>
                <p class="mb-4" style="color: #555;">
                    Exclusive offers and latest healthcare courses and eBooks <br>
                </p>

                <div class="container-footer mb-2">
                    <form action="{{ route('subscribe') }}" class="form" method="POST">
                        @csrf
                        <input type="email" class="sub_email" name="email" style="">
                        <button type="submit" class="subscribe_newsleter" style=" "><i class="fas fa-envelope"
                                style="color: #ffffff;"></i> SUBSCRIBE</button>
                    </form>

                </div>
                <h6 class="custom_footer_text" style="color: #000;">By Subscribing You agree to and with <a
                        href="{{ route('customer-help') }}#v-pills-profile-tab-1"
                        style="color: #8a8a8a; font-weight:700;"><u>Our Privacy Policy</a></u> & <a
                        href="{{ route('customer-help') }}#v-pills-home-tab"
                        style="color: #8a8a8a; font-weight:700;"><u>Terms</a></u></h6>
            </div>
        </div>
    </div>
</section>


<footer class="footer py-4">
    <div class="containerdoosme container" style="
">

        <div class="row mb-5">
            <div class="float-lg-right d-flex flex-wrap align-items-center w-100 justify-content-between footerbox1 px-lg-5 px-4 py-lg-2 py-sm-4 py-2"
                style="gap: 14px">
                {{-- <h5>
                    Contact
                </h5> --}}

                <div class="locaton fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: orangered; height: 70px; width: 70px; border-radius: 50px;">
                        <i class="fi fi-rs-marker text-white" style="font-size: 2rem"></i>
                    </div>
                    <div>
                        <h3 class="text-white mb-1">Address</h3>
                        <span>
                            501 S. Florida Avenue
                            Lakeland, FL 33801
                        </span>
                    </div>
                </div>


                <div class="call fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color: orangered; height: 70px; width: 70px; border-radius: 50px;">
                        <i class="fas fa-phone text-white" style="font-size: 2rem"></i>
                    </div>
                    <div class="text-white">
                        <h3 class="text-white mb-1">Phone Number</h3>
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
                        style="background-color: orangered; height: 70px; width: 70px; border-radius: 50px;">
                        <i class="fi fi-rs-clock-three text-white" style="font-size: 2rem"></i>
                    </div>
                    <div>
                        <h3 class="text-white mb-1">Hours</h3>
                        <span>Mon – Thur: 8:30am – 7:00pm</span>
                        <span>Sat: 10:00am – 3:00pm</span>
                    </div>
                </div>

                {{-- <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <div class="d-flex align-items-center justify-content-center" style="background-color: orangered; height: 70px; width: 70px; border-radius: 50px;">
                        <i class="fi fi-rs-clock-three text-white"></i>
                    </div>
                    
                </div> --}}

                <div class="time fs-responsive d-flex align-items-center gap-2" style="line-height:35px;">
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank"
                        style="text-decoration: none; color: #fff !important;">
                        <div class="d-flex align-items-center justify-content-center"
                            style="background-color: orangered; height: 70px; width: 70px; border-radius: 50px;">
                            <i class="fas fa-envelope text-white" style="font-size: 2rem"></i>
                        </div>
                    </a>
                    <div>
                        <h3 class="text-white mb-1">Email</h3>
                        <span>contact@merkaiixcelprep.com</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row text-white">
            <div class="col-lg-3 col-sm-6">
                <div class="expore px-4 py-lg-2 py-sm-4 py-2 text-white">
                    <x-footer-section-one-widget />
                    {{-- <h5 class="font-weight-bold mb-3 mt-4 text-white">
                        Join our Community of Students
                    </h5> --}}
                    {{-- <div class="input-group mb-3">
                        <input type="text" class="bg-white form-control form-control_responsive"
                            placeholder="Enter Your Email" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary newsletter_btn" type="button">Subscribe</button>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-4 py-lg-2 py-sm-4 py-2">
                    <x-footer-section-two-widget />
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-lg-0 px-4 py-lg-2 py-sm-4 py-2">
                    {{-- <h5>
                            Support | Services
                        </h5>
                        <p><a href="{{ route('blogs') }}" style="color:inherit;">News | Events</a></p>
                    <p><a href="{{ route('customer-help') }}" onclick="informationflag('Help and Support')"
                            style="color:inherit;">Help &
                            Support</a></p>
                    <p><a href="{{ route('resource') }}" style="color:inherit;">Resource Center</a></p>
                    <p><a href="" style="color:inherit;">NCLEX Practice Questions</a></p>
                    <p><a href="" style="color:inherit;">Next Gen NCLEX Questions</a></p> --}}

                    <x-footer-section-three-widget />
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footerbox1 px-4 py-lg-2 py-sm-4 py-2">
                    <x-footer-section-four-widget />
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center text-center">
            @php
                $social_icons = Modules\SystemSetting\Entities\SocialLink::where('status', 1)
                    ->orderBy('order', 'desc')
                    ->get();
            @endphp
            @if (count($social_icons) > 0)
                {{-- <h5 class="mb-3 mt-4">
                Our Socials
            </h5> --}}
                <span class="d-flex icons justify-content-center" style="gap: 25px;">
                    @foreach ($social_icons as $link)
                        <a href="{{ $link->link }}" style="color:white;"><i class="{{ $link->icon }}"></i>
                        </a>
                    @endforeach
                    {{-- <i class="fa-brands fa-linkedin"></i> --}}
                    {{-- <a href="https://www.facebook.com/merakiicollege" style="color:inherit;"><i
                class="fa-brands fa-facebook"></i></a>
        <a href="https://www.tiktok.com/@merakiinursing" style="color:inherit;">
            <i class="fa-brands fa-tiktok"></i></a> --}}
                </span>
            @endif
        </div>
    </div>
    </div>
</footer>
<div class="col-md-12" style="background: #996699;box-shadow: 0px -10px 20px -14px;">
    <div class="container d-md-flex footercolor justify-content-between footer-padd">
        <div class="my-lg-0 my-2">
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
        <div class="my-lg-0 my-2">
            <span style="" class="fs-responsive text-white">
                {{-- © 2023 Merakii College of Health --}}
                {{ function_exists('footerSettings') ? strip_tags(footerSettings('footer_copy_right')) : '' }}
            </span>
        </div>
        <div class="my-lg-0 my-2">
            <span style="" class="fs-responsive text-white"> Call us 863-250-8764 | 347-525-1736
            </span>
        </div>
    </div>
</div>
<script src="{{ asset('public/vendor/ckeditor5/build/ckeditor.js') }}"></script>
<script>
    //  $(document).on("click", "#back-top", function (e) {
    //     e.preventDefault(); // Prevent the default anchor link behavior
    //     alert('ads')
    //     window.scrollTo({
    //         top: 0,
    //         behavior: 'smooth' // Smooth scrolling effect
    //     });
    // });
    
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
{{-- <div class="" style="background: black;">
    <div class="containerdoosme">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left text-white">
                <p style="font-weight: 300;" class="my-4 mx-5 text-white">
                    © 2018 Qode Interactive, All Rights Reserved
                </p>
            </div>
            <div class="col-md-6 icons my-4 text-center text-lg-right text-white">
                <span style="font-weight: 300;" class="my-4">
                    Call +44 300 303 026 Follow us
                </span>
               <span class="d-inline-flex gap_15 mr-lg-5 mx-2">
                 <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-google-plus-g"></i>
                <i class="fa-brands fa-linkedin"></i>
                </span>
            </div>
        </div>
    </div>
</div> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>