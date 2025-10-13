{{-- <style>
    .slider p {
        text-align: justify;
        flex-direction: row-reverse;
    }

    .slider {
        flex: 1;
        box-sizing: border-box;
        position: relative;
        padding-left: 20px;
    }

    .slider img {
        max-width: 100%;
        height: auto;
    }

    .stepper_row {
        display: flex;
        flex: 1;
        width: 100%;
    }

    .stepper_row .slider {
        flex-wrap: wrap;
        flex: 1;
    }

    .slider:not(:last-child) {
        border-right: 2px solid var(--system_primery_color);
    }

    .about-us-stepper .image img {
        height: 385px;
        width: 100%;
    }

    .about-us-stepper .image img img {
        object-fit: cover;
    }

    .slider h2 {
        position: relative;
    }

    .slider h2::before {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translate(10px, -50%);
        width: 60px;
        height: 2px;
        background-color: var(--system_primery_color);
    }

    .stepper_right {
        padding-left: 70px;
        padding-top: 40px;
    }

    .paddingy {
        padding-right: 70px;
        padding-top: 100px;

    }

    .slider-right h2 {
        position: relative;
    }

    .slider-right h2::before {
        content: "";
        position: absolute;
        left: -70px;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 2px;
        background-color: var(--system_primery_color);
    }

    .center-content-about {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media only screen and (min-width: 1800px) {
        .row-padding {
            padding: 0px 70px !important;
        }

        .about-us-stepper .image img {
            height: 500px !important;
            width: 100%;
        }
    }
    @media only screen and (max-width: 576px) {

        .stepper_right,
        .paddingy {
            padding-left: 0px !important;
        }

        .stepper_row {
            flex-direction: column;
        }

        .paddingy {
            padding-top: 20px !important;
        }

        .slider {
            width: 100%;
            padding-left: 20px !important;
            padding-right: 20px !important;
            border-right: none !important;
            text-align: left !important;
            /* margin-bottom: 10px; */
        }

        .slider h2 {
            padding-left: 0 !important;
        }

        .slider h2::before,
        .slider-right h2::before {
            display: none;
        }

        .slider-right {
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        .slider-right h2 {
            padding-left: 0 !important;
        }

        .stepper_row:not(:last-child) .slider::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -30px;
            transform: translateX(-50%);
            width: 2px;
            height: 30px;
            background-color: #ccc;
        }

        .stepper_row:nth-child(2) .slider:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -30px;
            transform: translateX(-50%);
            width: 2px;
            height: 30px;
            background-color: #ccc;
        }

        .about-us-stepper .image img img {
            /* object-fit: fill !important; */
        }
    }

    @media only screen and (max-width: 767px) {
        .stepper_right {
            padding-left: 40px;
        }

        .paddingy {
            padding-right: 40px;
        }

        .slider h2::before {
            width: 30px !important;
        }

        .slider-right h2::before {
            width: 30px !important;
            left: -40px !important;
        }

        .about-us-stepper .image img {
            height: 200px !important;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .about-us-stepper .image img {
            height: 280px !important;
        }
    }


</style>


<div class="custom-padding px-md-5 mb-md-5 mb-4">
    <div class="container center-content-about px-0 about-us-stepper">
        <div class="row stepper_row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-md-end text-end paddingy" data-aos="fade-left"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Mission & Story</h2>
                <h4 class="custom_text_small">Mission Statement</h4>
                <p class="mb-3">At Merkaii Xcellence Prep, our mission is to empower aspiring healthcare
                    professionals through exceptional education and unwavering support, ensuring they
                    achieve their fullest potential in the ever-evolving world of healthcare.</p>
                <h4 class="custom_text_small">Our Story</h4>
                <p class="mb-3">Our journey began in 2015 with a simple yet profound goal: to create a student-
                    centered environment that fosters success in healthcare education. Over the years,
                    we've grown from a small tutoring service in the basement into a comprehensive
                    education hub, offering specialized review courses, personalized tutoring, and in-
                    depth exam reviews. Our commitment to excellence and our passion for student
                    success have driven us every step of the way.</p>
                <div class="image">
                    <img src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                        class="w-100">
                </div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Evolution & Transformation</h2>
                <h4 class="custom_text_small">Our Evolution</h4>
                <p class="mb-3">From our humble beginnings, we've continuously evolved to meet the needs of our
                    students. What started as a modest family and friends tutoring service in the
                    basement has transformed into a renowned institution known for its rigorous
                    healthcare review courses and individualized tutoring programs. We've embraced
                    new teaching methodologies, integrated cutting-edge technology, and expanded
                    our curriculum to cover the diverse and dynamic field of healthcare.</p>
                <h4 class="custom_text_small">Our “Aha!” Moment</h4>
                <p class="mb-3">Our pivotal moment came when we realized the profound impact personalized
                    education has on family and friends’ outcomes. Witnessing this we embarked on
                    opening our services to others and observing students transform from struggling
                    learners into confident, competent healthcare professionals. This has become our
                    cornerstone approach in offering tailored education and one-on-one support.</p>
                <div class="image">
                    <img src="{{ asset('/public/assets/lms/newabout-slider2.png') }}"
                        class="w-100">
                </div>
            </div>
        </div>
        <div class="row stepper_row px-xl-5 px-lg-4 px-3 row-padding">
            <div class="pl-0 slider d-flex flex-column align-items-md-end text-end paddingy" data-aos="fade-right"
                data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">Who We Serve</h2>
                <h4 class="custom_text_small">Our Audience</h4>
                <p class="mb-3"> Merkaii Xcellence Prep serves a diverse group of aspiring healthcare professionals,
                    from nursing students to future doctors, pharmacists, and allied health practitioners.
                    Our students come from various backgrounds, united by their dedication to
                    healthcare and their desire to excel. We are here to guide them, support them, and
                    celebrate their achievements along the way.</p>
                <div class="image">
                    <img src="{{ asset('/public/assets/lms/output_image.jpeg') }}"
                        class="w-100">
                </div>
            </div>
            <div class="pr-0 slider slider-right stepper_right" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="custom_small_heading font-weight-bold">The Merkaii Values</h2>
                <h4 class="custom_text_small">Our Brand Values</h4>
                <p class="mb-3"><span class="font-weight-bold">Student-Centric:</span> Our students are at the heart
                    of everything we do. Their success
                    is our success.</p>
                <p class="mb-3"><span class="font-weight-bold">Excellence:</span> We strive for excellence in all
                    aspects of our educational offerings,
                    ensuring high quality, comprehensive, and relevant content.</p>
                <p class="mb-3"><span class="font-weight-bold">Innovation:</span> We embrace innovative teaching
                    methods and technologies to
                    enhance learning and keep pace with the evolving healthcare landscape.</p>
                <p class="mb-3"><span class="font-weight-bold">Support:</span> We provide unwavering support, understanding
                    that each student’s
                    journey is unique and deserving of personalized attention.</p>
                <p class="mb-3"><span class="font-weight-bold">Integrity:</span> We uphold the highest standards of
                    integrity, fostering a trustworthy and
                    respectful learning environment.</p>
                <p class="mb-3"><span class="font-weight-bold">Teacher Well-Being:</span> We believe that happy
                    teachers are the foundation of
                    successful students. By taking exceptional care of our educators, we ensure they
                    can focus wholeheartedly on their goals, bringing passion and dedication to every
                    lesson.</p>
                <div class="image">
                    <img src="{{ asset('/public/assets/lms/newabout-slider1.png') }}"
                        class="w-100">
                </div>
            </div>
        </div>
    </div>
</div> --}}


<style>
    .img-con {
        display: grid;
        grid-template-columns: 1.3fr 1.8fr 1.3fr;
        gap: 100px;

        p {
            height: 100px;
            overflow-y: auto;
            scrollbar-width: none;
        }
    }

    .mid-img {
        margin-top: 5rem
    }

    @media (max-width: 1200px) {
        .img-con {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
        }

        .mid-img {
            margin-top: 0rem
        }
    }

    img {
        border-radius: 20px;
    }

    .object-fit-cover {
        object-fit: cover
    }

    .fw-semibold {
        font-weight: 600;
    }

    .light-text {
        color: #ffffffd8
    }

    .pointer {
        cursor: pointer
    }

    .value {
        border: 2px solid rgba(92, 181, 92, 0.354);
        border-radius: 15px;
    }

    .input_shadow {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        border-radius: 15px !important
    }

    .serve-left,
    .serve-right {
        background-color: #EFECE3;
        backdrop-filter: blur(15px);
        border-radius: 10px;
    }

    .msg-text1 {
        background-color: #fff;
        border-radius: 15px 15px 15px 0;
        width: fit-content
    }

    .msg-text2 {
        background-color: #fff;
        width: fit-content;
        border-radius: 0px 15px 15px 15px;
    }

    .w-break {
        word-break: break-all
    }

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

    .breadcam_wrap h1,
    .breadcam_wrap p {
        text-shadow: 1px 0px 5px #737373;
    }

    .theme_btn {
        border-radius: 50px !important;
        font-weight: 600 !important
    }

    h1,
    h2 {
        font-family: "Inter" !important;
        font-weight: 600 !important;
    }

    h2 {
        font-size: clamp(1.3rem, 4vw, 2.5rem) !important;
        font-family: "Rubik" !important;
        font-weight: 600 !important;
    }

    * {
        font-family: "Rubik" !important
    }

    section .container {
        max-width: 1700px !important
    }

    .benefit-grid {
        background: radial-gradient(circle, rgba(60, 105, 164, 1) 0%, rgba(30, 58, 95, 1) 60%);
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .benefit-card {
        h3 {
            font-size: clamp(16px, 2.5vw, 20px) !important;
            font-weight: 600 !important;
            font-family: "Inter";
            color: #fff;
        }
    }

    .accordion-button {
        background-color: transparent !important;
        color: #000 !important;
        box-shadow: none !important;
        border: none !important;
        font-weight: 600 !important;
        font-size: clamp(14px, 2vw, 20px) !important
    }

    .accordion-button:focus {
        box-shadow: none !important;
    }

    .accordion-item {
        border-radius: 15px !important;
        border: none !important;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 1rem !important
    }

    .testimonial-section .testimonial-top .card,
    .testimonial-bottom .card {
        background-image: url('{{ asset('public/assets/review.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        height: 16.7rem;
        width: 39rem;
        border: none !important;
        flex-shrink: 0;
    }

    .testimonial-top {
        display: flex;
        gap: 1rem;
        animation: slideLeft 30s linear infinite;
    }

    .testimonial-bottom {
        display: flex;
        gap: 1rem;
        animation: slideRight 30s linear infinite;
    }

    @keyframes slideLeft {
        from {
            transform: translateX(0%);
        }

        to {
            transform: translateX(-100%);
        }
    }

    @keyframes slideRight {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0%);
        }
    }

    @media (max-width: 767px) {

        .testimonial-bottom,
        .testimonial-top {
            animation-duration: 10s
        }

        @keyframes slideLeft {
            from {
                transform: translateX(0%);
            }

            to {
                transform: translateX(-600%);
            }
        }

        @keyframes slideRight {
            from {
                transform: translateX(-600%);
            }

            to {
                transform: translateX(0%);
            }
        }
    }

    .sec-6 {
        display: none !important
    }
</style>


<section class="px-md-5 py-5" style="background-color: #F6F4EE">
    <div class="container">
        <div class="img-con service_cta_row d-grid" style="height: fit-content !important">
            <div class="single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover" src="{{ asset('public/assets/about-tile-1.jpg') }}" height="450"
                    width="100%">
                <h5 style="font-weight: 500" class="mt-3 mb-2">Our Mission</h5>
                <p>
                    To empower aspiring healthcare students from all backgrounds,
                    especially marginalized communities, through outstanding education and dedicated support,
                    unlocking their potential for lasting success in healthcare.
                </p>
            </div>

            <div class="mid-img single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover" src="{{ asset('public/assets/about-tile-2.jpg') }}"
                    height="450" width="100%">
                <h5 style="font-weight: 500" class="mt-3 mb-2">Our Vision</h5>
                <p>
                    To be the leading catalyst in creating equitable opportunities in healthcare education,
                    fostering a generation of skilled and diverse professionals who elevate patient care and transform
                    communities.
                </p>
            </div>

            <div class="single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover" src="{{ asset('public/assets/about-tile-3.jpg') }}"
                    height="450" width="100%">
                <h5 style="font-weight: 500" class="mt-3 mb-2">Our Core Values</h5>
                <p>
                    We place our students at the heart of everything we do,
                    as we are committed to the highest standards in educational content,
                    instruction, and support services.
                    We also embrace forward-thinking approaches as we foster an
                    encouraging and inclusive environment.
                </p>
            </div>
        </div>


        <div class="row py-5 px-3 px-lg-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 border-0" data-aos="fade-right"
                    style="border-radius: 10px; box-shadow: 0px 4px 10px 0px #00000026;">
                    <h5>Our Story</h5>
                    <p>
                        Nursing school was tough. I almost gave up, but two amazing instructors kept me motivated. Their
                        support
                        inspired me to create a place where students find the same encouragement to succeed.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 border-0" data-aos="fade-up"
                    style="border-radius: 10px; box-shadow: 0px 4px 10px 0px #00000026;">
                    <h5>Our “Aha!” Moment</h5>
                    <p>
                        After passing the NCLEX, I realized many students face similar struggles. This sparked the idea
                        to build
                        a support system that empowers learners to overcome challenges with confidence.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4 border-0" data-aos="fade-left"
                    style="border-radius: 10px; box-shadow: 0px 4px 10px 0px #00000026;">
                    <h5>Evolution & Transformation</h5>
                    <p>
                        Since 2015, we’ve grown from a single idea into a thriving community. Through dedication and
                        innovation,
                        we’ve transformed how students experience healthcare education.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="benefits">
    <div class="container py-5 px-3 px-sm-5">
        <div class="benefit-grid row px-3 px-lg-5 py-5">
            <div class="col-lg-3 col-6" data-aos="fade-up">
                <div
                    class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                    <div class="benefit-icon">
                        <img src="{{ asset('public/assets/live_class.png') }}" width="60" alt="Live Classes"
                            class="benefit-icon-img">
                    </div>
                    <h3>Live, Interactive Classes</h3>
                </div>
            </div>

            <div class="col-lg-3 col-6" data-aos="fade-up">
                <div
                    class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                    <div class="benefit-icon">
                        <img src="{{ asset('public/assets/onDemand.png') }}" width="60" alt="Live Classes"
                            class="benefit-icon-img">
                    </div>
                    <h3>On‑demand content for busy schedules</h3>
                </div>
            </div>

            <div class="col-lg-3 col-6" data-aos="fade-up">
                <div
                    class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                    <div class="benefit-icon">
                        <img src="{{ asset('public/assets/expert.png') }}" width="60" alt="Live Classes"
                            class="benefit-icon-img">
                    </div>
                    <h3>Expert Nurse Educators</h3>
                </div>
            </div>

            <div class="col-lg-3 col-6" data-aos="fade-up">
                <div
                    class="benefit-card d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 h-100">
                    <div class="benefit-icon">
                        <img src="{{ asset('public/assets/pass_rate.png') }}" width="70" alt="Live Classes"
                            class="benefit-icon-img">
                    </div>
                    <h3>Pass-Rate Guarantee</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container px-lg-5 pt-5">
    <div class="py-5 px-xl-5 px-3">
        <h2 class="text-center mb-4">The Merkaii Xcellence Values</h2>

        <div class="accordion row" id="globalfaq">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq1" aria-expanded="true" aria-controls="globalfaq1">
                            The Merkaii Xcel Value
                        </button>
                    </h2>
                    <div id="globalfaq1" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            Our students are at the heart of everything we do. Their success is our success.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq2" aria-expanded="false" aria-controls="globalfaq2">
                            Excellence
                        </button>
                    </h2>
                    <div id="globalfaq2" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            In all aspects of our educational offerings, ensuring high quality, comprehensive, and
                            relevant
                            content.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq3" aria-expanded="false" aria-controls="globalfaq3">
                            Innovation
                        </button>
                    </h2>
                    <div id="globalfaq3" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            We embrace innovative teaching methods and technologies to enhance learning and keep pace
                            with
                            the evolving healthcare landscape.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq4" aria-expanded="false" aria-controls="globalfaq4">
                            Support
                        </button>
                    </h2>
                    <div id="globalfaq4" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            We provide unwavering support, understanding that each student’s journey is unique and
                            deserves
                            personalized attention.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq5" aria-expanded="false" aria-controls="globalfaq5">
                            Integrity
                        </button>
                    </h2>
                    <div id="globalfaq5" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            We uphold the highest standards of integrity, fostering a trustworthy and respectful
                            learning
                            environment.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed inter" type="button" data-bs-toggle="collapse"
                            data-bs-target="#globalfaq6" aria-expanded="false" aria-controls="globalfaq6">
                            Teacher Well-Being
                        </button>
                    </h2>
                    <div id="globalfaq6" class="accordion-collapse collapse" data-bs-parent="#globalfaq">
                        <div class="accordion-body inter">
                            We believe happy teachers are the foundation of successful students. We take exceptional
                            care
                            of
                            our educators, so they can focus totally on their goals, bringing passion and dedication to
                            every lesson.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section style="background-color: #F6F4EE">
    <div class="container px-lg-5 px-3 py-5">
        <div class="row px-lg-5">
            <div class="col-md-3 col-lg-4 col-xl-6">
                <h2 class="fw-bold" data-aos="fade-right">Who We Serve</h2>
            </div>
            <div class="col-md-9 col-lg-8 col-xl-6" data-aos="fade-left">
                <p>
                    Merkaii Xcel Prep serves a diverse group of aspiring healthcare professionals, from nursing students
                    to other allied healthcare. Our students come from various backgrounds, united by their dedication
                    to healthcare and their desire to excel. We are here to guide them, support them, and celebrate
                    their highs and lows along the way.
                </p>
                <p>
                    Our commitment to excellence and our passion for student success have driven us every step of the
                    way.
                </p>
            </div>
        </div>

        <div class="row px-3 gap-3 gap-lg-5 pt-4">
            <div data-aos="fade-right"
                class="col-md-12 col-lg-4 col-xl-6 serve-left p-5 d-flex flex-column justify-content-between">
                <span class="py-1 px-2 bg-warning rounded-2" style="width: fit-content">Improves retention</span>
                <h1 class="fw-bold" style="font-size: clamp(4rem, 10vw, 8rem) !important">96<small
                        class="fs-2">%</small></h1>
                <p>of our students successfully graduate and begin their career development.</p>
            </div>

            <div data-aos="fade-left"
                class="col-md-12 col-lg col-xl serve-right p-5 d-flex flex-column justify-content-between">
                <h3 class="fw-semibold">What do you need to bring?</h3>
                <p>A phone with an Internet connection, and we recommend that you bring a charger.</p>
                <div class="d-flex align-items-center gap-3">
                    <img src="https://wp.themepure.net/acadia/wp-content/uploads/2024/08/mission-mesg.png.webp"
                        style="width: 50% !important" alt="">
                    <div class="d-flex flex-column gap-2">
                        <span class="py-2 px-3 msg-text1">Hello</span>
                        <span class="py-2 px-3 msg-text2">Ready for my first assignment!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Testimonials Section --}}
<section class="testimonial-section py-5">
    <div class="text-center">
        <h2 data-aos="fade-up">Trusted by Thousands of Nurses</h2>
        <p class="opacity-75 inter" data-aos="fade-up">
            We’re proud to help aspiring nurses succeed every day. Here’s what they’re saying.
        </p>
    </div>

    <div class="testimonial-top mt-4">
        @for ($i = 0; $i < 20; $i++)
            <div class="card" data-aos="fade-up">
                <div class="card-body px-5 pt-5 pb-4 d-flex align-items-end">
                    <div class="d-flex flex-column">
                        <!-- Quote SVG -->
                        <svg class="mb-3" width="25" height="16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.68 6.38C..." fill="#FF6B6B" />
                        </svg>

                        <div>
                            <small>
                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt
                                nostrud amet.
                            </small>
                            <!-- Closing Quote -->
                            <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.68 6.38C..." fill="#FF6B6B" />
                            </svg>
                        </div>

                        <div class="mt-3">
                            <h6 class="fw-bold">Cornelius B</h6>
                            <small class="text-muted">Professional Nurse</small>
                        </div>
                    </div>

                    <img src="{{ asset('public/assets/review-img.png') }}" width="200" alt="Reviewer">
                </div>
            </div>
        @endfor
    </div>

    <div class="testimonial-bottom
    mt-4" data-aos="fade-up">
        @for ($i = 0; $i < 20; $i++)
            <div class="card">
                <div class="card-body px-5 pt-5 pb-4 d-flex align-items-end">
                    <div class="d-flex flex-column">
                        <!-- Quote SVG -->
                        <svg class="mb-3" width="25" height="16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.68 6.38C..." fill="#FF6B6B" />
                        </svg>

                        <div>
                            <small>
                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt
                                nostrud amet.
                            </small>
                            <!-- Closing Quote -->
                            <svg class="mt-3" style="rotate:180deg" width="25" height="16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.68 6.38C..." fill="#FF6B6B" />
                            </svg>
                        </div>

                        <div class="mt-3">
                            <h6 class="fw-bold">Cornelius B</h6>
                            <small class="text-muted">Professional Nurse</small>
                        </div>
                    </div>

                    <img src="{{ asset('public/assets/review-img.png') }}" width="200" alt="Reviewer">
                </div>
            </div>
        @endfor
    </div>
</section>
