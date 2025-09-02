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

    .serve-left, .serve-right {
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
</style>


<div class="px-md-5 py-5" style="background-color: #F6F4EE">
    <div class="container px-xl-5 px-lg-4 px-3">
        <div class="img-con service_cta_row d-grid" style="height: fit-content !important">
            <div class="single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover"
                    src="{{asset('public/assets/about-tile-1.jpg')}}"
                    height="450" width="100%">
                <h3 class="fw-bold mt-3 mb-2">Our Mission</h3>
                <p>
                    To empower aspiring healthcare students from all backgrounds, 
                    especially marginalized communities, through outstanding education and dedicated support, 
                    unlocking their potential for lasting success in healthcare.
                </p>
            </div>

            <div class="mid-img single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover"
                    src="{{asset('public/assets/about-tile-2.jpg')}}"
                    height="450" width="100%">
                <h3 class="fw-bold mt-3 mb-2">Our Vision</h3>
                <p>
                    To be the leading catalyst in creating equitable opportunities in healthcare education, 
                    fostering a generation of skilled and diverse professionals who elevate patient care and transform communities.
                </p>
            </div>

            <div class="single_cta_service">
                {{-- <img class="rounded-5 object-fit-cover" src="{{ asset('/public/assets/lms/newabout-slider4.png') }}"
                    height="350"> --}}
                <img class="rounded-5 object-fit-cover"
                    src="{{asset('public/assets/about-tile-3.jpg')}}"
                    height="450" width="100%">
                <h3 class="fw-bold mt-3 mb-2">Our Core Values</h3>
                <p>
                    We place our students at the heart of everything we do, 
                    as we are committed to the highest standards in educational content, 
                    instruction, and support services. 
                    We also embrace forward-thinking approaches as we foster an 
                    encouraging and inclusive environment.
                </p>
            </div>
        </div>

        <div>
            <div class="row g-0 gap-4 justify-content-between mt-5">
                <div class="col-md-2">
                    <h2 class="fw-bold">Our Story</h2>
                </div>
                <div class="col-md">
                    <p class="w-break">
                        I was struggling in nursing school; the grades were very bad; I wanted to quit. There were two
                        determined instructors who kept encouraging me on days when I would cry because I couldn’t grasp
                        the subject content to stay on the course. I was successful on my NCLEX exam, and I am
                        determined to help others who have the same experience. In 2015 after 3 years in the profession
                        I set out with a simple yet profound goal: to create a student- centered environment that
                        provides meaningful support to foster success in healthcare education.
                    </p>
                </div>
            </div>

            <div class="row py-5 g-0 gap-4 justify-content-between">
                <div class="col-md-2">
                    <h2 class="fw-bold">Our “Aha!” Moment</h2>
                </div>
                <div class="col-md">
                    <p class="w-break">
                        Our pivotal moment came when we realized the profound impact personalized education has on family and friends’ outcomes. Witnessing this we embarked on opening our services to others and observing students transform from struggling learners into confident, competent nursing professionals. This has become our cornerstone approach in offering tailored education and one-on-one support.
                    </p>
                </div>
            </div>

            <div class="row g-0 gap-4 justify-content-between">
                <div class="col-md-2">
                    <h2 class="fw-bold">Evolution & Transformation</h2>
                </div>
                <div class="col-md">
                    <p class="w-break">
                        From our humble beginnings, we've grown from a small family and friends tutoring service in the basement into a comprehensive education hub, offering specialized review courses, personalized tutoring, and in-depth exam reviews. We've embraced new teaching methodologies, integrated cutting-edge technology, and expanded our curriculum to cover the diverse and dynamic field of healthcare.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5" style="background-color: var(--teal)">
    <div class="container px-md-5 py-4">
        <div class="row align-items-start gy-4 gx-0">
            <div class="col-md-6 col-lg-3 d-flex align-items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 14 14">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M6.35.5h6.302c.469 0 .849.38.849.849v6.778c0 .47-.38.85-.849.85H7.5M3.149 4.001a1.75 1.75 0 1 0 0-3.501a1.75 1.75 0 0 0 0 3.501" />
                        <path
                            d="M9 5.527C9 4.96 8.54 4.5 7.973 4.5H3.149v0A2.65 2.65 0 0 0 .5 7.149V9.5h1.135l.379 4h2.27l.872-6.945h2.817C8.54 6.555 9 6.095 9 5.527" />
                    </g>
                </svg>
                </div>

                <div>
                    <h5 class="mb-1 fw-semibold text-white">Student-Centric</h5>
                    <span class="light-text">Our students are at the heart of everything we do. Their success is our success.</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 14 14">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M6.35.5h6.302c.469 0 .849.38.849.849v6.778c0 .47-.38.85-.849.85H7.5M3.149 4.001a1.75 1.75 0 1 0 0-3.501a1.75 1.75 0 0 0 0 3.501" />
                        <path
                            d="M9 5.527C9 4.96 8.54 4.5 7.973 4.5H3.149v0A2.65 2.65 0 0 0 .5 7.149V9.5h1.135l.379 4h2.27l.872-6.945h2.817C8.54 6.555 9 6.095 9 5.527" />
                    </g>
                </svg>
                </div>

                <div>
                    <h5 class="mb-1 fw-semibold text-white">Excellence</h5>
                    <span class="light-text">In all aspects of our educational offerings, ensuring high quality, comprehensive, and relevant content.</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 14 14">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M6.35.5h6.302c.469 0 .849.38.849.849v6.778c0 .47-.38.85-.849.85H7.5M3.149 4.001a1.75 1.75 0 1 0 0-3.501a1.75 1.75 0 0 0 0 3.501" />
                        <path
                            d="M9 5.527C9 4.96 8.54 4.5 7.973 4.5H3.149v0A2.65 2.65 0 0 0 .5 7.149V9.5h1.135l.379 4h2.27l.872-6.945h2.817C8.54 6.555 9 6.095 9 5.527" />
                    </g>
                </svg>
                </div>

                <div>
                    <h5 class="mb-1 fw-semibold text-white">Innovation:</h5>
                    <span class="light-text">We embrace innovative teaching methods and technologies to enhance learning and keep pace with the evolving healthcare landscape</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 14 14">
                    <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M6.35.5h6.302c.469 0 .849.38.849.849v6.778c0 .47-.38.85-.849.85H7.5M3.149 4.001a1.75 1.75 0 1 0 0-3.501a1.75 1.75 0 0 0 0 3.501" />
                        <path
                            d="M9 5.527C9 4.96 8.54 4.5 7.973 4.5H3.149v0A2.65 2.65 0 0 0 .5 7.149V9.5h1.135l.379 4h2.27l.872-6.945h2.817C8.54 6.555 9 6.095 9 5.527" />
                    </g>
                </svg>
                </div>

                <div>
                    <h5 class="mb-1 fw-semibold text-white">Support</h5>
                    <span class="light-text">We provide unwavering support, understanding that each student’s journey is unique and deserves personalized attention.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="container px-xl-5 px-lg-4 px-3 py-5">
        <h2 class="fw-bold text-center mb-2">The Merkaii Xcel Values</h2>
        <p class="mb-4 text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque doloribus voluptate laudantium tempora, itaque optio.</p>
        <div class="row gy-4">
            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Student-Centric" aria-expanded="false"
                        aria-controls="Student-Centric">
                        Student-Centric: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Student-Centric">
                        <p>Our students are at the heart of everything we do. Their success is our success.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Excellence" aria-expanded="false"
                        aria-controls="Excellence">
                        Excellence: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Excellence">
                        <p>In all aspects of our educational offerings, ensuring high quality, comprehensive, and relevant
                        content.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Innovation" aria-expanded="false"
                        aria-controls="Innovation">
                        Innovation: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Innovation">
                        <p>We embrace innovative teaching methods and technologies to enhance learning and keep pace with
                        the evolving healthcare landscape.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Support" aria-expanded="false"
                        aria-controls="Support">
                        Support: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Support">
                        <p>We provide unwavering support, understanding that each student’s journey is unique and deserves
                        personalized attention.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Integrity" aria-expanded="false"
                        aria-controls="Integrity">
                        Integrity: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Integrity">
                        <p>We uphold the highest standards of integrity, fostering a trustworthy and respectful learning
                        environment.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="value p-3">
                    <h5 class="fw-bold d-flex align-items-center justify-content-between pointer"
                        data-bs-toggle="collapse" data-bs-target="#Well-Being" aria-expanded="false"
                        aria-controls="Well-Being">
                        Teacher Well-Being: <i class="fa-solid fa-chevron-down"></i>
                    </h5>
                    <div class="collapse" id="Well-Being">
                        <p>We believe happy teachers are the foundation of successful students. We take exceptional care of
                        our educators, so they can focus totally on their goals, bringing passion and dedication to
                        every lesson.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background-color: #F6F4EE">
    <div class="container px-xl-5 px-lg-4 px-3 py-5">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-6">
                <h2 class="fw-bold">Who We Serve</h2>
            </div>
            <div class="col-md-9 col-lg-8 col-xl-6">
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
            <div class="col-md-12 col-lg-4 col-xl-6 serve-left p-5 d-flex flex-column justify-content-between">
                <span class="py-1 px-2 bg-warning rounded-2" style="width: fit-content">Improves retention</span>
                <h1 class="fw-bold" style="font-size: clamp(4rem, 10vw, 8rem) !important">96<small class="fs-2">%</small></h1>
                <p>of our students successfully graduate and begin their career development.</p>
            </div>
            <div class="col-md-12 col-lg col-xl serve-right p-5 d-flex flex-column justify-content-between">
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
</div>
