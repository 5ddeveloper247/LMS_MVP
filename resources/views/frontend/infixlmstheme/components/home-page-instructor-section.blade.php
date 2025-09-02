<section class="sec-3">
    <div class="cta_area d-flex justify-content-center my-3 px-md-5 px-2"
        style="background-image: url('{{ asset(@$homeContent->instructor_banner) }}')">
        <div class="row justify-content-center align-items-center w-100 cta_area-row">
            <div class="mx-auto cta_area-row1">
                <div class="py-md-5 py-3 section__title text-white text-center px-lg-5 mx-0 cta_area_section" id="section__title">
                    <h2 class="custom_small_heading large_title text-white mb-lg-4 mb-2 font-weight-bold">
                        Ace Your NCLEX with Free Weekly Study Sessions
                        {{-- {{ @$homeContent->instructor_title }} --}}
                    </h2>
                    <p class="custom_small large_title text-white mb-lg-4 mb-2">
                        Join our exclusive Adult Learners community of nursing students.<br>
                        Boost your exam prep with FREE WEEKLY NCLEX review sessions on Teams.<br>
                        Gain valuable insights, tips, and support from experienced instructors.<br> <br>
                        Subscribe to our Email List now to secure your spot.<br>
                        Don't miss out on this golden opportunity to boost your exam confidence.<br>
                    </p>
                    <div class="container-subscription mt-5 mb-2">
                        <form action="{{ route('subscribe') }}" class="form" method="POST">
                            @csrf
                            <input type="email" class="sub_email" name="email" style="">
                            <button type="submit" class="subscribe_newsleter" style=" "><i class="fas fa-envelope"
                                    style="color: #ffffff;"></i> SUBSCRIBE</button>
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
        </div>
    </div>
</section>