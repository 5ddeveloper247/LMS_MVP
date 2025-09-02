<style>

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
    .for-main-2nd {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    .for-border {
        min-height: auto;
        border: 0px;
        border-left: 1px solid #D3D3D3;
        padding-left: 20px;
        min-width: 82%;
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
    max-width: 40px;
    height: 40px;
    padding: 0px !important;
}
    @media only screen and (max-width:767.5px){
        .for-affordability {
    max-width: 30px !important;
}
.for-main{
            gap: 2rem;
        }
        .for-backcolor-row{
            gap: 1.5rem !important;
        }
    }
    @media only screen and (max-width: 567px){
        .for-main{
            gap: 2rem;
        }
        .for-main-2nd{
            gap: 2rem !important;
        }

    }
@media only screen and (max-width: 1650px){
    .for-label {
            font-size: 18px;
        }
}
</style>



<section class="sec-9 ">

        <div class="container for-backcolor-container p-lg-5 py-3">
            <div class="row justify-content-left px-xl-5 for-backcolor-row">
                <!-- 1st -->
                <div class="col-lg-4 col-sm-12 for-main px-lg-2 mb-sm-3 mb-md-0">
                    <div>
                        <label class="for-label">WHY JOIN MERKAII XCELLENCE PREP</label>
                        <h2 class="custom_small_heading for-bold font-weight-bold">Unbound Learning: Your Healthcare
                            Education, Anywhere
                        </h2>
                        <p class="for-para custom_paragraph mb-2">At Merkaii Xcellence, we understand that life doesn't
                            always
                            stop
                            for education. That's why we offer a
                            truly flexible learning experience that fits your schedule and lifestyle. Study on your
                            terms, whether you're at home, traveling the world, or juggling a busy work life.</p>

                        <p class="for-para custom_paragraph "><span class="font-weight-bold">Our global reach</span>
                            means you can join a vibrant community of learners from over 35
                            countries. Plus, with our pioneering approach to online healthcare education, you can be
                            confident you're receiving a top-notch education, no matter your location. <span
                                class="font-weight-bold">So, wherever
                                you go, your education goes with you.</span></p>
                    </div>
                </div>
                <!-- 2nd 1st-side-->
                <div class="col-lg-8 for-main-2nd mt-md-4 mt-lg-0">
                <div class="row for-main">
                    <div class="col-md-6">
                        <div class="row for-element justify-content-center">
                         <div class="col-2 for-affordability">
                         <img src="public/assets/remedial/LEARNING-OPTION.png" class="h-100 w-100" style="object-fit: fill">
                        </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">

                                <h5 class="for-label1 font-weight-bold">Flexible Learning Options</h5>
                                <p class="for-para custom_paragraph pr-2"> At Merkaii’s we offer a blend of live online
                                    courses, in-person sessions, and on-demand recordings, allowing you to choose the format
                                    that best suits your learning style and schedule.</p>

                            </div>
                        </div>
                            </div>
                        <!-- 2 -->
                        <div class="col-md-6">
                        <div class="row for-element justify-content-center">
                            <div class="col-2 for-affordability">
                          
                            <img src="public/assets/remedial/targeted- instruction.png" class="h-100 w-100" style="object-fit: fill">
                            </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">
                                <h5 class="for-label1 font-weight-bold">Targeted Instruction</h5>
                                <p class="for-para custom_paragraph pr-2">Merkaii Xcellence Prep offers courses
                                    specifically developed for your licensure exam, ensuring that content directly aligns
                                    with what you need to know for test success.</p>
                                </div>
                            </div>
                        </div>
                        

                                </div>
                                <!-- 2nd row -->
                                 <div class="row for-main">
                                    <div class="col-md-6">
                        <div class="row for-element justify-content-center">
                           <div class="col-2 for-affordability">
                           <img src="public/assets/remedial/expert-instruction.png" class="h-100 w-100" style="object-fit: fill">
                           </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">

                                <h5 class="for-label1 font-weight-bold">Expert Instructors</h5>
                                <p class="for-para custom_paragraph pr-2">Our Merkaii's instructors are experienced
                                    professionals in their field of expertise who understand the intricacies of the exam?
                                </p>
                            </div>
                        </div>
                                </div>
                        <!-- 2 -->
                        <div class="col-md-6">
                        <div class="row for-element justify-content-center">
                       <div class="col-2 for-affordability">
                       <img src="public/assets/remedial/comprehensive-work.png" class="h-100 w-100" style="object-fit: fill">
                       </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">

                                <h5 class="for-label1 font-weight-bold">Comprehensive Coursework</h5>
                                <p class="for-para custom_paragraph pr-2">Merkaii's Xcel course content cover the essential Test-Plan topics and strategies thoroughly, including lectures, practice questions, and sample test.</p>
                            </div>
                        </div>

                        </div>
                                </div>
                    <!-- 3rd row-->

                    <div class="row for-main">
                    <div class="col-md-6">
                    <div class="row for-element justify-content-center">
                         <div class="col-2 for-affordability">
                         <img src="public/assets/remedial/personalized-instruction.png" class="h-100 w-100" style="object-fit: fill">
                         </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">

                                <h5 class="for-label1 font-weight-bold">Personalized Support</h5>
                                <p class="for-para custom_paragraph pr-2">Our prep courses provide opportunities for
                                    personalized help from instructors or tutors-small groups or Q&A sessions.
                                    We address specific challenging concepts or filling knowledge
                                    gaps.
                                </p>
                            </div>
                        </div>
                            </div>
                     <!-- 2 -->
                     <div class="col-md-6">
                        <div class="row for-element justify-content-center">
                          <div class="col-2 for-affordability">
                          <img src="public/assets/remedial/community-support.png" class="h-100 w-100" style="object-fit: fill">
                          </div>
                            <div class="col-8 for-border ml-xl-3 ml-2">
                                <h5 class="for-label1 font-weight-bold">Community and Support</h5>
                                <p class="for-para custom_paragraph pr-2">Merkaii Xcellence offers opportunities to connect
                                    with other students preparing for the same exam or instructors, this can be a great
                                    source for support, motivation and study tips.</p>
                            </div>
                        </div>
                                </div>
                        <!--  -->
                    </div>
                </div>
                                </div>
                <!-- end col -->
            </div>
        </div>
    </section>

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