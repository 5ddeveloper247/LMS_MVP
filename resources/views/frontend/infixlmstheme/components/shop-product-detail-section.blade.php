<div>
    
    <!-- course_details::start  -->
    <div class="course__details p-md-5 p-4">
        <div class="container px-0">
            
            <!-- firststart -->
            <div class="row px-lg-5 small_screen course_padding">
                <div class="col-lg-9 col-md-8 col-sm-7 d-flex justify-content-between px-2">
                    <div class="course__details_title w-100 mb-md-0">

                        <div class="col-lg-6 col-md-8 details_content d-flex flex-column justify-content-start">
                            
                            <h5 class="small_heading course-span f_w_700">{{ $product->title }}</h5>
                            <p class="course-span">{{ $product->sub_title }}</p>
                            <p class="course-span" style="color: #ff6700;"><small>{{ $product->total_inventory > 0 ? 'In-Stock' : 'Out of Stock' }}</small></p>

                        </div>

                        <div class="col-lg-6 col-md-4 d-flex align-items-end justify-content-end">

                            <div class="sidebar__title text-right">
                                <h2 class="custom_small_heading font-weight-bold custom_heading_1 mb-0" style="color: #ff6700;">
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
                        <img src="{{isset($product->files[0]) ? url($product->files[0]->file_path) : url('public/assets/product-Placeholder.png')}}" class="img-fluid w-100 img_round course_image" style="object-fit:contain;">
                    </div>
                   
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 py-sm-0 py-3 course_main_text">
                    <div class="custom_section_color img_round course_tab px-2 pt-2 course_main_section" style="background-color: #eee;">
                        <h5 class="font-weight-bold mt-1 course-span custom_heading_1 small_heading">You May also Like</h5>
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
                                        <a href="{{$detailUrl}}">
                                            <img style="" src="{{isset($relproduct->files[0]) ? url(@$relproduct->files[0]->file_path) : url('public/assets/product-Placeholder.png')}}" class="img-fluid h-100">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-md-6 col-8 p-clamp0 p-0 course_tabs_section">
                                        <p class="p-clamp">
                                            <a class="text-dark course-span" href="{{$detailUrl}}">{{$relproduct->title}}</a>
                                        </p>
                                        
                                        <p class="color course-span">{{$relproduct->type_label}}</p>

                                        <p class="course-span" style="color: #ff6700;">{{ getPriceFormat($relproduct->total_amount - $relproduct->total_discount) }}</p>
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
                            <div class="pre-eventsIcon eventsIcon d-xl-none"><i id="left" class="fa-solid fa-angle-left"></i>
                            </div>
                        <ul class="d-flex lms_tabmenu nav w-100 text-center"
                            id="myTab" role="tablist">
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
                            <div class="tab-pane fade" id="Curriculum" role="tabpanel" aria-labelledby="Curriculum-tab">
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


                {{-- new card_2 starts  --}}
                {{-- this one needs to be fixed  --}}
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 pb- py-sm-0">
                     
                    {{-- new card_2 ends  --}}

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
</div>


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
