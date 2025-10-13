<style>
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

    .ck-content ul {
        display: flex !important;
        flex-direction: column !important;
        gap: 15px !important
    }

    .ck-content p {
        margin-bottom: 1rem !important
    }
</style>


<section>
    <div class="container px-lg-5">
        <div class="row position-relative py-5 px-3 px-sm-5">
            <!-- Product Image Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center"
                style="background: radial-gradient(50% 50% at 50% 50%, #FAFAFC 17.79%, #9FB4D1 100%); border-radius: 20px; padding: 12rem 2rem">
                <img src="{{ isset($product->files[0]) ? url($product->files[0]->file_path) : asset('public/assets/product-Placeholder.png') }}"
                    style="width: 350px; rotate: 30deg" alt="">
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6 p-md-5">
                <h2 class="mb-4">{{ $product->title }}</h2>

                <h2 class="" style="color: #1E3A5F">
                    {{ getPriceFormat($product->total_amount - $product->total_discount) }}
                </h2>

                <h5 class="mb-3">DESCRIPTION:</h5>
                <p class="mb-3">{{ $product->sub_title }}</p>

                <!-- Example features (update based on how features are stored) -->
                @if (!empty($product->features) && is_array($product->features))
                    <ul class="mt-4">
                        @foreach ($product->features as $feature)
                            <li class="mb-3">{{ $feature }}</li>
                        @endforeach
                    </ul>
                @else
                    <div class="ck-content">{!! $product->description !!}</div>
                @endif

                <!-- Variation Images -->
                <div class="other-vaiation d-flex align-items-center" style="gap: 10px">
                    @foreach ($product->files as $file)
                        <img src="{{ url($file->file_path) }}" width="100" height="100"
                            style="filter: drop-shadow(0px 0px 4px #00000048); object-fit: cover;" alt="">
                    @endforeach
                </div>
            </div>

            <!-- Floating Product Summary Bar -->
            <div class="p-4 d-flex align-items-center justify-content-between bg-white"
                style="position: relative; bottom: 60px; left: 0; width: 100%; box-shadow: 0px 2px 30px 0px #35385A1F; border-radius: 20px; max-width: 1200px; margin: 0 auto">
                <div class="d-flex align-items-center" style="gap: 10px">
                    <img src="{{ isset($product->files[0]) ? url($product->files[0]->file_path) : asset('public/assets/product-Placeholder.png') }}"
                        width="80" alt="">
                    <div>
                        <h5>{{ $product->title }}</h5>
                        <span>{{ $product->sub_title }}</span>
                    </div>
                </div>

                @if ($product->total_inventory > 0)
                    <a href="{{ route('shop.addToCart', [@$product->id]) }}" class="theme_btn">ADD TO CART</a>
                @else
                    <span class="theme_btn disabled">OUT OF STOCK</span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Related Items Section -->
<section>
    <div class="container px-lg-5">
        <div class="px-lg-5 px-3">
            <div class="text-center mb-4">
                <span class="text-muted">SOME QUALITY ITEMS</span>
                <h2 class="fw-bold">Products You May Also Like</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 60px">
                @if (!empty($relatedProducts))
                    @foreach ($relatedProducts as $relproduct)
                        @php
                            $relUrl =
                                $relproduct->type == 1
                                    ? route('shop.product.detail', $relproduct->id)
                                    : route('shop.book.detail', $relproduct->id);
                        @endphp
                        <div class="card p-4 border-0" style="box-shadow: 0px 4px 10px 0px #00000026;">
                            <a href="{{ $relUrl }}">
                                <img src="{{ isset($relproduct->files[0]) ? url($relproduct->files[0]->file_path) : asset('public/assets/product-Placeholder.png') }}"
                                    width="100%" style="object-fit: cover; height: 300px;" alt="">
                            </a>
                            <div class="text-center mt-3">
                                <h6 style="color: #393280">{{ $relproduct->title }}</h6>
                                <span>{{ $relproduct->type_label }}</span>
                                <h5 class="fw-bold" style="color: #ED553B">
                                    {{ getPriceFormat($relproduct->total_amount - $relproduct->total_discount) }}
                                </h5>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">No related products found.</p>
                @endif
            </div>
        </div>
    </div>
</section>


{{-- <div>
    <!-- course_details::start  -->
    <div class="course__details">
        <div class="container px-lg-5">

            <!-- firststart -->
            <div class="row px-3 px-lg-5">
                <div class="col-lg-9 col-md-8 col-sm-7 d-flex justify-content-between px-2">
                    <div class="course__details_title w-100 mb-md-0">

                        <div class="col-lg-6 col-md-8 details_content d-flex flex-column justify-content-start">

                            <h5 class="small_heading course-span f_w_700">{{ $product->title }}</h5>
                            <p class="course-span">{{ $product->sub_title }}</p>
                            <p class="course-span" style="color: #ff6700;">
                                <small>{{ $product->total_inventory > 0 ? 'In-Stock' : 'Out of Stock' }}</small>
                            </p>

                        </div>

                        <div class="col-lg-6 col-md-4 d-flex align-items-end justify-content-end">

                            <div class="sidebar__title text-right">
                                <h2 class="custom_small_heading font-weight-bold custom_heading_1 mb-0"
                                    style="color: #ff6700;">
                                    {{ getPriceFormat($product->total_amount - $product->total_discount) }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- firstend -->

        <!-- 2ndstart -->
        <div class="container px-0">
            <div class="row my-sm-4 my-2 px-lg-5 small_screen course_padding">

                <div class="col-lg-9 col-md-8 col-sm-7 mb-2 mb-sm-0 course_main_image">

                    <div class="course_detail_image image_responsive px-md-2">
                        <img src="{{ isset($product->files[0]) ? url($product->files[0]->file_path) : url('public/assets/product-Placeholder.png') }}"
                            class="img-fluid w-100 img_round course_image" style="object-fit:contain;">
                    </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 py-sm-0 py-3 course_main_text">
                    <div class="custom_section_color img_round course_tab px-2 pt-2 course_main_section"
                        style="background-color: #eee;">
                        <h5 class="font-weight-bold mt-1 course-span custom_heading_1 small_heading">You May also Like
                        </h5>
                        <div class="row mx-0">
                            @if (!empty($relatedProducts))
                                @foreach ($relatedProducts as $relproduct)
                                    @php
                                        if ($relproduct->type == 1) {
                                            $detailUrl = route('shop.product.detail', $relproduct->id);
                                        } elseif ($relproduct->type == 2) {
                                            $detailUrl = route('shop.book.detail', $relproduct->id);
                                        } else {
                                            $detailUrl = '';
                                        }
                                    @endphp
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-4 mb-3 pl-0 pr-2 course_tabs_section">
                                        <a href="{{ $detailUrl }}">
                                            <img style=""
                                                src="{{ isset($relproduct->files[0]) ? url(@$relproduct->files[0]->file_path) : url('public/assets/product-Placeholder.png') }}"
                                                class="img-fluid h-100">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-8 p-clamp0 p-0 course_tabs_section">
                                        <p class="p-clamp">
                                            <a class="text-dark course-span"
                                                href="{{ $detailUrl }}">{{ $relproduct->title }}</a>
                                        </p>

                                        <p class="color course-span">{{ $relproduct->type_label }}</p>

                                        <p class="course-span" style="color: #ff6700;">
                                            {{ getPriceFormat($relproduct->total_amount - $relproduct->total_discount) }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2ndend -->
        <!-- 3rdstart -->

        <!-- <div class="col-12"> -->
        <div class="container px-0">
            <div class="row px-lg-5 small_screen course_padding">
                <div class="col-lg-9 col-md-8 col-12">

                    <div class="course_tabs w-100 mb-3 px-md-2">
                        <div class="events_wrapper">
                            <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="left"
                                    class="fa-solid fa-angle-left"></i>
                            </div>
                            <ul class="d-flex lms_tabmenu nav w-100 text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                        role="tab" aria-controls="Overview"
                                        aria-selected="true">{{ __('Description') }}</a>
                                </li>
                                @if (@$product->type == 2)
                                    <li class="nav-item">
                                        <a class="nav-link" id="Curriculum-tab" data-toggle="tab" href="#Curriculum"
                                            role="tab" aria-controls="Curriculum"
                                            aria-selected="false">{{ __('Book Detail') }}</a>
                                    </li>
                                @endif


                            </ul>
                            <div class="pre-eventsIcon eventsIcon d-xl-none">
                                <i id="right" class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content lms_tab_content px-sm-2 mb-2 mb-md-0" id="myTabContent">
                        <div class="tab-pane fade show active" id="Overview" role="tabpanel"
                            aria-labelledby="Overview-tab">
                            <!-- content  -->
                            <div class="course_overview_description">

                                <div class="">
                                    <h5 class="font-weight-bold custom_heading_1 small_heading mt-1">
                                        {{ __('Product Description') }}</h5>
                                    <div class="theme_border"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive ck ckdtext ck-content clearfix">
                                                {!! @$product->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (@$product->type == 2)
                            <div class="tab-pane fade" id="Curriculum" role="tabpanel"
                                aria-labelledby="Curriculum-tab">
                                <!-- <h5 class="font-weight-bold custom_heading_1 small_heading mb-3">{{ __('Book Detail') }}</h5> -->

                                <div class="mt-4">
                                    <h5 class="font-weight-bold custom_heading_1 small_heading mt-1">
                                        {{ __('Book Author') }}</h5>
                                    <div class="theme_border"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive ck ckdtext ck-content clearfix">
                                                {!! @$product->author !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5 class="font-weight-bold custom_heading_1 small_heading mt-1">
                                        {{ __('Book Publisher') }}</h5>
                                    <div class="theme_border"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive ck ckdtext ck-content clearfix">
                                                {!! @$product->publisher !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5 class="font-weight-bold custom_heading_1 small_heading mt-1">
                                        {{ __('Book Publication Date') }}</h5>
                                    <div class="theme_border"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive ck ckdtext ck-content clearfix">
                                                {{ date('d M Y', strtotime(@$product->publication_date)) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>

                <!-- 3rdmid -->


                
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 pb- py-sm-0">


                    <div class="">
                        <div class="sidebar__widget p-2 p-sm-0">
                            @if ($product->total_inventory > 0)
                                <a href="{{ route('shop.addToCart', [@$product->id]) }}"
                                    class="d-block mb_10 small_btn theme_btn text-center mt-2 mt-sm-0">{{ __('common.Add To Cart') }}</a>

                                <a href="{{ route('shop.buyNow', [@$product->id]) }}"
                                    class="d-block mb_10 small_btn theme_btn text-center ">{{ __('common.Buy Now') }}</a>
                            @else
                                <a href="javascript:;"
                                    class="d-block mb_10 small_btn theme_btn text-center mt-2 mt-sm-0">{{ __('Out of Stock') }}</a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


</div>
@include(theme('partials._custom_footer'))
<!-- <script src="{{ asset('public/frontend/infixlmstheme') }}/js/html2pdf.bundle.js"></script>
<script src="{{ asset('public/frontend/infixlmstheme/js/my_invoice.js') }}"></script> -->


<script>
    // $(document).ready(function() {

    //     // set About iframe
    //     var iframeAbout = document.getElementById("iframeAbout");
    //     var iframeDocAbout = iframeAbout.contentDocument || iframeAbout.contentWindow.document;
    //     var dynamicDivAbout = document.createElement("div");

    //     dynamicDivAbout.innerHTML = '{!! @$course->about !!}';

    //     iframeDocAbout.body.appendChild(dynamicDivAbout);

    //     var bodyHeight2 = iframeDocAbout.body.querySelector("div").scrollHeight + 25;
    //     $("#iframeAbout").css('height', bodyHeight2);

    //     // set outcome iframe
    //     var iframe = document.getElementById("iframeOutcome");
    //     var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    //     var dynamicDiv = document.createElement("div");

    //     dynamicDiv.innerHTML = '{!! @$course->outcomes !!}';

    //     iframeDoc.body.appendChild(dynamicDiv);

    //     var bodyHeight = iframeDoc.body.querySelector("div").scrollHeight + 25;
    //     $("#iframeOutcome").css('height', bodyHeight);

    //     // set requirement iframe
    //     var iframeReq = document.getElementById("iframeRequirements");
    //     var iframeDocReq = iframeReq.contentDocument || iframeReq.contentWindow.document;
    //     var dynamicDivReq = document.createElement("div");

    //     dynamicDivReq.innerHTML = '{!! @$course->requirements !!}';

    //     iframeDocReq.body.appendChild(dynamicDivReq);

    //     var bodyHeight1 = iframeDocReq.body.querySelector("div").scrollHeight + 25;
    //     $("#iframeRequirements").css('height', bodyHeight1);



    // });
</script>
<script>
    //         $(document).ready(function() {
    //     const $tabsBox = $(".lms_tabmenu"),
    //         $allTabs = $tabsBox.find(".nav-item"),
    //         $arrowEventsIcons = $(".eventsIcon i");

    //     const handleEventsIcons = () => {
    //         let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
    //         if (maxScrollableWidth <= 0) {
    //             // Hide both arrows if there's no overflow
    //             $arrowEventsIcons.parent().css("display", "none");
    //         } else {
    //             // Handle visibility based on scroll position
    //             $arrowEventsIcons.eq(0).parent().css("display", $tabsBox.scrollLeft() <= 0 ? "none" : "flex");
    //             $arrowEventsIcons.eq(1).parent().css("display", maxScrollableWidth - $tabsBox.scrollLeft() <= 1 ? "none" : "flex");
    //         }
    //     };

    //     // Initial check
    //     handleEventsIcons();

    //     $arrowEventsIcons.on("click", function() {
    //         if ($(this).attr("id") === "left") {
    //             $tabsBox.animate({
    //                 scrollLeft: "-=340"
    //             }, 400);
    //         } else {
    //             $tabsBox.animate({
    //                 scrollLeft: "+=340"
    //             }, 400);
    //         }
    //     });

    //     $allTabs.on("click", function() {
    //         $tabsBox.find(".active").removeClass("active");
    //         $(this).addClass("active");
    //     });

    //     $tabsBox.on("scroll", handleEventsIcons);
    //     $(window).on("resize", handleEventsIcons); // Check on resize as well
    // });
</script>
