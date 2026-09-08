{{-- <style>
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
</style> --}}

<!-- PRODUCT HEADER -->
<section class="product-header">
    <div class="product-header-grid">

        <!-- Left: Gallery -->
        <div class="product-gallery">
            <div class="product-main-image" id="main-preview-container">

                @php $firstImage = $product->files->first(); @endphp

                @if ($firstImage)
                    <img id="main-preview-image" src="{{ url($firstImage->file_path) }}"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;" alt="{{ $product->title }}">
                @else
                    <img id="main-preview-image" src="{{ asset('public/assets/product-Placeholder.png') }}"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;" alt="{{ $product->title }}">
                @endif

                <video id="main-preview-video" width="100%" height="auto" controls
                    style="display: none; max-width: 100%; border-radius: 10px;">
                    <source src="" type="">
                </video>

                @php
                    // Study Guide / Study Tool are digital — inventory is not required
                    $isDigitalShopItem = in_array((int) $product->type, [3, 4], true);
                    $shopItemInStock = $isDigitalShopItem || (int) $product->total_inventory > 0;
                @endphp
                @if (!$shopItemInStock)
                    <span class="product-main-badge">Out of Stock</span>
                @else
                    <span class="product-main-badge">Bestseller</span>
                @endif

            </div>

            <div class="product-thumbs">
                @foreach ($product->videos as $video)
                    <div class="product-thumb video-thumbnail-wrapper"
                        data-type="video"
                        data-src="{{ url($video->file_path) }}"
                        data-video-type="{{ $video->file_type }}"
                        style="position: relative; cursor: pointer;">
                        <video width="100%" height="100%" muted preload="metadata"
                            style="object-fit: cover; display: block; width: 100%; height: 100%;">
                            <source src="{{ url($video->file_path) }}" type="video/{{ $video->file_type }}">
                        </video>
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                            width: 30px; height: 30px; background-color: rgba(44,166,164,0.9); border-radius: 50%;
                            display: flex; align-items: center; justify-content: center; pointer-events: none; z-index: 10;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="white" style="margin-left: 2px;">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                @endforeach

                @foreach ($product->files as $index => $file)
                    <div class="product-thumb {{ $index === 0 ? 'active' : '' }}"
                        data-type="image"
                        data-src="{{ url($file->file_path) }}"
                        style="cursor: pointer;">
                        <img src="{{ url($file->file_path) }}"
                            style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right: Purchase Card -->
        <div class="purchase-card">
            <p class="purchase-tag">{{ $product->sub_title }}</p>
            <h1>{{ $product->title }}</h1>
            <p class="purchase-author">By <a href="tutor-profile.html">Paula Martin, LPN</a></p>

            <div class="purchase-rating">
                <span class="purchase-stars">★★★★★</span>
                <span class="purchase-rating-text">4.9 out of 5 · 47 reviews</span>
            </div>

            <div class="purchase-price-row">
                <span class="purchase-price">
                    {{ getPriceFormat($product->total_amount - $product->total_discount) }}
                </span>
            </div>
            <p class="purchase-format">Paperback · 186 pages · 8.5" × 11"</p>

            @if (!empty($product->features) && is_array($product->features))
                <ul class="purchase-features">
                    {{-- <li>Complete NCLEX PASS Method™ framework</li>
          <li>Clinical judgment exercises per chapter</li>
          <li>Content area diagnostic worksheet</li>
          <li>200+ practice scenarios with rationales</li>
          <li>Study planning templates</li>
          <li>Companion to any MXP coaching program</li> --}}
                    @foreach ($product->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @else
                <div class="ck-content">{!! $product->description !!}</div>
            @endif

            <div class="quantity-row">
                <span class="quantity-label">Quantity</span>
                <div class="quantity-control">
                    <button class="qty-btn" onclick="changeQty(-1)">−</button>
                    <input type="text" class="qty-value" id="qty" value="1" readonly>
                    <button class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
            </div>

            @if ($shopItemInStock)
                <a href="{{ route('shop.addToCart', $product->id) }}" class="purchase-cta">Add to Cart →</a>
            @else
                <span class="purchase-cta" aria-disabled="true" style="opacity: 0.6; cursor: not-allowed;">Out of Stock</span>
            @endif
            <a href="{{ url('/contact') }}" class="purchase-secondary">Have questions? Talk to an advisor</a>

            <div class="purchase-trust">
                <div class="purchase-trust-item"><span class="trust-check">✓</span> Free shipping on orders $50+</div>
                <div class="purchase-trust-item"><span class="trust-check">✓</span> 30-day satisfaction guarantee</div>
                <div class="purchase-trust-item"><span class="trust-check">✓</span> Secure checkout</div>
            </div>
        </div>

    </div>
</section>

<!-- PRODUCT DETAILS -->
<section class="details-section">
    <div class="details-inner">

        <div class="details-tabs">
            <button class="detail-tab active" onclick="switchTab('description')">Description</button>
            {{-- What's Inside: hidden for products/books (static looked irrelevant). Re-enable later if needed.
            <button class="detail-tab" onclick="switchTab('contents')">What's Inside</button>
            --}}
            <button class="detail-tab" onclick="switchTab('reviews')">Reviews (47)</button>
            <button class="detail-tab" onclick="switchTab('shipping')">Shipping &amp; Returns</button>
        </div>

        <!-- Description (from DB) -->
        <div class="detail-panel active" id="panel-description">
            <div class="detail-prose ck-content">
                @if (!empty($product->description))
                    {!! $product->description !!}
                @elseif (!empty($product->short_description))
                    {!! nl2br(e($product->short_description)) !!}
                @else
                    <p>{{ __('No description available.') }}</p>
                @endif
            </div>
        </div>

        {{-- What's Inside: hidden for products/books until we have real content. Bundles keep dynamic What's Inside.
        <div class="detail-panel" id="panel-contents">
            <div class="contents-grid">
                <div class="contents-item">
                    <h4>Chapter 1: The Diagnostic</h4>
                    <p>Content area self-assessment, baseline scoring, and study plan template.</p>
                </div>
                <div class="contents-item">
                    <h4>Chapter 2: Content Mastery</h4>
                    <p>Systems-based review organized by NCLEX test plan domains with priority-weighted notes.</p>
                </div>
                <div class="contents-item">
                    <h4>Chapter 3: Process Training</h4>
                    <p>Question stem decoding, distractor elimination, and the clinical judgment decision tree.</p>
                </div>
                <div class="contents-item">
                    <h4>Chapter 4: NGN Scenarios</h4>
                    <p>Next-Generation NCLEX case studies with extended drag-and-drop, highlight, and matrix exercises.
                    </p>
                </div>
                <div class="contents-item">
                    <h4>Chapter 5: Confidence Protocol</h4>
                    <p>Test-day mindset exercises, anxiety management, and the 72-hour pre-exam routine.</p>
                </div>
                <div class="contents-item">
                    <h4>Chapter 6: Practice Sets</h4>
                    <p>200+ practice scenarios with detailed rationales — organized by difficulty and content area.</p>
                </div>
                <div class="contents-item">
                    <h4>Appendix A: Study Planner</h4>
                    <p>Blank templates for 4-week, 6-week, and 8-week study plans you can customize.</p>
                </div>
                <div class="contents-item">
                    <h4>Appendix B: Quick Reference</h4>
                    <p>Lab values, drug classifications, priority frameworks, and delegation rules on tear-out cards.
                    </p>
                </div>
            </div>
        </div>
        --}}

        <!-- Reviews -->
        <div class="detail-panel" id="panel-reviews">
            <div class="review-summary">
                <div>
                    <p class="review-big-num">4.9</p>
                </div>
                <div>
                    <p class="review-big-stars">★★★★★</p>
                    <p class="review-count">Based on 47 verified reviews</p>
                </div>
            </div>
            <div class="reviews-list">
                <div class="review-card">
                    <p class="review-stars-sm">★★★★★</p>
                    <p class="review-text">This workbook changed the way I study. I'd been reading and re-reading
                        content for
                        months, but the process training chapter taught me how to actually think through questions.
                        Passed on my
                        next attempt.</p>
                    <p class="review-attr"><span class="review-name">K.L., RN</span> · Verified Purchase · September
                        2024</p>
                </div>
                <div class="review-card">
                    <p class="review-stars-sm">★★★★★</p>
                    <p class="review-text">The diagnostic worksheet alone was worth the price. I spent 15 minutes on it
                        and
                        immediately knew where my gaps were. No other prep book had ever helped me identify that so
                        clearly.</p>
                    <p class="review-attr"><span class="review-name">[Name]</span> · Verified Purchase · [Month Year]
                    </p>
                </div>
                <div class="review-card">
                    <p class="review-stars-sm">★★★★☆</p>
                    <p class="review-text">Really solid workbook. The NGN scenarios are especially useful — hard to find
                        good
                        practice material for those question types. Only wish there were more practice sets, but 200 is
                        still
                        plenty.</p>
                    <p class="review-attr"><span class="review-name">[Name]</span> · Verified Purchase · [Month Year]
                    </p>
                </div>
            </div>
        </div>

        <!-- Shipping -->
        <div class="detail-panel" id="panel-shipping">
            <div class="detail-prose">
                <h3>Shipping</h3>
                <p>Standard shipping (5–7 business days) is free on orders over $50. Orders under $50 ship for a flat
                    rate of
                    $5.99. Expedited shipping (2–3 business days) is available for $12.99. All orders ship from
                    Lakeland, FL via
                    USPS.</p>
                <h3>Returns &amp; Satisfaction Guarantee</h3>
                <p>We offer a 30-day satisfaction guarantee. If the workbook isn't what you expected, return it in
                    original
                    condition for a full refund. No questions asked, no restocking fees. Contact
                    contact@merkaiixcelprep.com to
                    initiate a return.</p>
                <h3>Digital Version</h3>
                <p>A downloadable PDF version of this workbook is not currently available. The workbook is designed to
                    be
                    written in — the physical format is intentional. If you need a digital resource, check out our <a
                        href="{{ route('courses') }}" style="color: var(--teal-mid);">Prep-Courses</a> for on-screen learning.</p>
            </div>
        </div>

    </div>
</section>

<!-- RELATED PRODUCTS -->
<section class="related-section">
    <div class="section-header">
        <p class="section-eyebrow">You Might Also Like</p>
        <h2 class="section-title">Related Resources</h2>
    </div>

    <div class="related-grid">
        @if (!empty($relatedProducts))
            @foreach ($relatedProducts as $relproduct)
                @php
                    $relUrl =
                        $relproduct->type == 1
                            ? route('shop.product.detail', $relproduct->id)
                            : route('shop.book.detail', $relproduct->id);
                @endphp
                <div class="related-card">
                    <a href="{{ $relUrl }}">
                        <div class="related-image">
                            <img src="{{ isset($relproduct->files[0]) ? url($relproduct->files[0]->file_path) : asset('public/assets/product-Placeholder.png') }}"
                                style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $relproduct->title }}">
                        </div>
                    </a>
                    <div class="related-body">
                        <p class="related-tag">{{ $relproduct->type_label }}</p>
                        <h3>{{ Str::limit($relproduct->title, 50, '...') }}</h3>
                        <div class="related-footer">
                            <span class="related-price">
                                {{ getPriceFormat($relproduct->total_amount - $relproduct->total_discount) }}
                            </span>
                            <a href="{{ $relUrl }}" class="related-link">View &rarr;</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No related products found.</p>
        @endif
    </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta">
    <h2>Need more than a workbook? <em>Get the full program.</em></h2>
    <p>The workbook is a powerful self-study tool — but if you want live coaching, a personalized study plan, and real
        accountability, our programs deliver all of that.</p>
    <a href="{{ url('/programs') }}" class="btn-on-teal">Explore Programs</a>
    <a href="{{ url('/shop') }}" class="btn-outline-light">Back to Shop</a>
</section>


{{-- <section>
    <div class="container px-lg-5">
        <div class="row position-relative py-5 px-3 px-sm-5">
            <!-- Product Image Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center"
                style="background: radial-gradient(50% 50% at 50% 50%, #FAFAFC 17.79%, #9FB4D1 100%); border-radius: 20px; padding: 12rem 2rem"
                id="main-preview-container">
                @php
                    $firstImage = $product->files->first();
                @endphp
                @if ($firstImage)
                    <img id="main-preview-image" src="{{ url($firstImage->file_path) }}"
                        style="width: 350px; rotate: 30deg; display: block;" alt="">
                @else
                    <img id="main-preview-image" src="{{ asset('public/assets/product-Placeholder.png') }}"
                        style="width: 350px; rotate: 30deg; display: block;" alt="">
                @endif
                <video id="main-preview-video" width="350" height="auto" controls style="display: none; max-width: 100%; border-radius: 10px;">
                    <source src="" type="">
                </video>
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

                <!-- Variation Images and Videos -->
                <div class="other-vaiation d-flex align-items-center" style="gap: 10px">
                    @foreach ($product->videos as $video)
                        <div class="video-thumbnail-wrapper" style="position: relative; display: inline-block; cursor: pointer;">
                            <video width="150" height="100" muted preload="metadata"
                                class="product-thumbnail"
                                data-type="video"
                                data-src="{{ url($video->file_path) }}"
                                data-video-type="{{ $video->file_type }}"
                                style="filter: drop-shadow(0px 0px 4px #00000048); object-fit: cover; display: block;">
                                <source src="{{ url($video->file_path) }}" type="video/{{ $video->file_type }}">
                            </video>
                            <div class="video-play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; background-color: rgba(44, 166, 164, 0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; pointer-events: none; z-index: 10;">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="white" style="margin-left: 2px;">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($product->files as $index => $file)
                        <img src="{{ url($file->file_path) }}" width="100" height="100"
                            class="product-thumbnail"
                            data-type="image"
                            data-src="{{ url($file->file_path) }}"
                            style="filter: drop-shadow(0px 0px 4px #00000048); object-fit: cover; cursor: pointer; {{ $index === 0 ? 'border: 2px solid #2ca6a4;' : '' }}" alt="">
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
</section> --}}

<!-- Related Items Section -->
{{-- <section>
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
</section> --}}


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
                                        if ((int) $relproduct->type === 1) {
                                            $detailUrl = route('shop.product.detail', $relproduct->id);
                                        } else {
                                            $detailUrl = route('shop.book.detail', $relproduct->id);
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


{{-- <script>
    $(document).ready(function() {
        // Product gallery functionality
        $('.product-thumbnail, .video-thumbnail-wrapper').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Get the thumbnail element (could be img, video, or wrapper)
            let thumbnail = $(this);
            if ($(this).hasClass('video-thumbnail-wrapper')) {
                thumbnail = $(this).find('.product-thumbnail');
            }
            
            const type = thumbnail.data('type');
            const src = thumbnail.data('src');
            const mainImage = $('#main-preview-image');
            const mainVideo = $('#main-preview-video');
            const videoElement = mainVideo[0];
            
            // Remove active border from all thumbnails and wrappers
            $('.product-thumbnail').css('border', '');
            $('.video-thumbnail-wrapper').css('border', '');
            
            // Add active border to clicked thumbnail or its wrapper
            if (type === 'video') {
                thumbnail.closest('.video-thumbnail-wrapper').css('border', '2px solid #2ca6a4');
            } else {
                thumbnail.css('border', '2px solid #2ca6a4');
            }
             
            if (type === 'image') { 
                // Show image, hide video
                mainImage.attr('src', src).css({
                    'display': 'block',
                    'width': '350px',
                    'rotate': '30deg'
                });
                videoElement.pause();
                mainVideo.hide();
                // Clear video source
                mainVideo.find('source').attr('src', '').attr('type', '');
                videoElement.load();
            } else if (type === 'video') {
                // Show video, hide image
                const videoType = thumbnail.data('video-type') || 'mp4';
                mainVideo.find('source').attr('src', src).attr('type', 'video/' + videoType);
                videoElement.load(); // Reload video source
                mainVideo.css({
                    'display': 'block',
                    'max-width': '100%',
                    'border-radius': '10px'
                });
                mainImage.hide();
            }
        });
    });
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
</script> --}}

<script>
    // Quantity control
    function changeQty(delta) {
        const el = document.getElementById('qty');
        let val = parseInt(el.value) + delta;
        if (val < 1) val = 1;
        if (val > 10) val = 10;
        el.value = val;
    }

    // Tab switching
    function switchTab(id) {
        document.querySelectorAll('.detail-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.detail-panel').forEach(p => p.classList.remove('active'));
        event.target.classList.add('active');
        document.getElementById('panel-' + id).classList.add('active');
    }
</script>


<script>
    document.querySelectorAll('.product-thumb').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            const type = this.dataset.type;
            const src = this.dataset.src;

            document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const mainImage = document.getElementById('main-preview-image');
            const mainVideo = document.getElementById('main-preview-video');

            if (type === 'video') {
                mainImage.style.display = 'none';
                mainVideo.style.display = 'block';
                mainVideo.querySelector('source').src = src;
                mainVideo.querySelector('source').type = 'video/' + this.dataset.videoType;
                mainVideo.load();
            } else {
                mainVideo.style.display = 'none';
                mainImage.style.display = 'block';
                mainImage.src = src;
            }
        });
    });

    function changeQty(delta) {
        const input = document.getElementById('qty');
        const current = parseInt(input.value) || 1;
        input.value = Math.max(1, current + delta);
    }
</script> 