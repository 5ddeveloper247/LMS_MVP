{{-- <style>
    .object-fit-cover {
        object-fit: cover
    }

    .fw-bold {
        font-weight: 700;
    }

    h6 {
        font-weight: 600;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    @media (min-width: 1800px) {
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
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

    .left-portion {
        padding-left: 7vw !important
    }

    @media (min-width: 1800px) {
        .left-portion {
            padding-left: 11vw !important
        }
    }
</style> --}}


{{-- <section style="background-color: #F8F6F9">
    <div class="row align-items-center">
        <div class="col-lg-6 left-portion py-5" data-aos="fade-right">
            <span style="color: var(--footer_text_hover_color)">eBOOK</span>
            <h2 class="my-4">Access, Read, Practice & Engage with Digital Content (eBook) </h2>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra
                hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.Lorem ipsum dolor sit amet,
                consectetur adipiscing elit.
            </p>

            <form class="mt-4">
                <div class="d-flex align-items-center" style="gap: 10px">
                    <input type="email" placeholder="Enter Your Email" class="py-2 px-4 mt-0"
                        style="border-radius: 50px" style="border: 1px solid #0000005b !important">
                    <label class="theme_btn" for="">Login</label>
                </div>
            </form>
        </div>

        <div class="col-lg-6" data-aos="fade-left">
            <img src="{{ asset('public/assets/join-m.png') }}" style="max-height: 700px; object-fit: cover"
                width="100%" alt="">
        </div>
    </div>
</section> --}}

<!-- CATEGORY TABS -->
<div class="tabs-section">
    <div class="tabs-inner">
        <button class="tab-btn active" onclick="scrollToCategory('books', this)">Books &amp; Journals</button>
        <button class="tab-btn" onclick="scrollToCategory('study-guides', this)">Study Guides</button>
        <button class="tab-btn" onclick="scrollToCategory('study-tools', this)">Study Tools</button>
        <button class="tab-btn" onclick="scrollToCategory('bundles', this)">Bundles &amp; Savings</button>
        <button class="tab-btn" onclick="scrollToCategory('merchandise', this)">Merchandise</button>
    </div>
</div>

<!-- FEATURED PRODUCT: FL BON REMEDIATION GUIDE -->
<section class="featured-section">
    <div class="featured-inner">
        <div class="featured-visual">
            <span class="featured-visual-badge">Flagship Resource</span>
            <p class="featured-visual-eyebrow">Merkaii Xcellence Prep</p>
            <h3>FL BON Remediation Guide&trade;</h3>
            <p>NCLEX-RN Preparation for Repeat Test-Takers</p>
            <div class="placeholder">Product image<br>coming soon</div>
        </div>
        <div class="featured-content">
            <p class="featured-eyebrow">New Release &middot; Digital Download</p>
            <h2>The FL BON <em>Remediation Guide&trade;</em></h2>
            <p class="featured-desc">The complete remediation roadmap used in our instructor-led program — now available
                as
                a standalone digital guide. Built on The NCLEX Pass Method&trade; framework with 13+ years of nursing
                education expertise.</p>
            <ul class="featured-includes">
                <li>The NCLEX Pass Method&trade; framework (Content &middot; Process &middot; Confidence)</li>
                <li>All 8 NCLEX Client Needs categories with study plans</li>
                <li>SATA, Prioritization &amp; Delegation strategy guides</li>
                <li>Clinical Judgment (CJMM) walkthrough templates</li>
                <li>8-Week &amp; 12-Week study calendars</li>
                <li>Mistake Log, Reflection Journal &amp; Mastery Tracker templates</li>
                <li>Test-Day preparation strategy sheet</li>
            </ul>
            <div class="featured-price-row">
                <span class="featured-price" id="remGuidePrice">$67</span>
                <span class="featured-price-orig" id="remGuidePriceOrig">$87</span>
                <span class="featured-price-save" id="remGuidePriceSave">Early Bird &mdash; Save $20</span>
            </div>
            <a href="#" class="featured-cta">Get the Remediation Guide &rarr;</a>
            <div class="featured-trust">
                <span>Instant download</span>
                <span>Secure checkout</span>
                <span>Printable PDF</span>
            </div>
        </div>
    </div>
</section>

<section class="products-section">
    <div class="products-inner">

        <!-- BOOKS & JOURNALS -->
        <div class="category-group" id="books">
            <div class="category-header">
                <h2>Books &amp; Journals by Paula Martin</h2>
                <p>Published study guides, workbooks, and journals written by the founder of Merkaii Xcellence Prep and
                    her
                    team of nursing educators. Available in digital download and spiral-bound print editions. Every
                    title is
                    built specifically for repeat NCLEX test-takers.</p>
            </div>
            <div class="products-grid">
                @php $hasBook = false; @endphp
                @if (!empty($products) && count($products))
                    @foreach ($products as $product)
                        @if ((int) $product->type === 2)
                            @php
                                $hasBook = true;
                                $productImages = $product->files;
                                $imageUrl =
                                    @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');
                                $detailUrl = route('shop.book.detail', $product->id);
                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="product-card">
                                <div class="product-image books">
                                    @if ($product->total_inventory <= 0)
                                        <span class="product-badge soon">Out of Stock</span>
                                    @endif
                                    <a href="{{ $detailUrl }}">
                                        <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="product-body">
                                    <p class="product-tag">{{ $product->sub_title }}</p>
                                    <h3>{{ $product->title }}</h3>

                                    <div class="product-footer">
                                        @if ($discountPrice > 0)
                                            <div>
                                                <span
                                                    class="product-price">{{ getPriceFormat($originalPrice) }}</span>
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    <del>{{ getPriceFormat($originalPrice + $discountPrice) }}</del>
                                                </span>
                                            </div>
                                        @else
                                            <span
                                                class="product-price">{{ getPriceFormat($originalPrice - $discountPrice) }}</span>
                                        @endif

                                        @if ($product->total_inventory > 0)
                                            <a href="{{ $detailUrl }}" class="product-action">Buy Now &rarr;</a>
                                        @else
                                            <a href="#" class="product-action">Notify Me &rarr;</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if (!$hasBook)
                    <div class="text-center py-5" style="grid-column: 1 / -1;">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                            style="width: 50px;">
                        <h4 class="mt-3">No Product Found</h4>
                    </div>
                @endif
            </div>
        </div>

         <!-- DIGITAL STUDY GUIDES -->
        <div class="category-group" id="study-guides">
            <div class="category-header">
                <h2>Digital Study Guides</h2>
                <p>Comprehensive study resources written by Paula Martin, LPN and the Merkaii Xcellence Prep team — the
                    same
                    material used in our coaching and remediation programs.</p>
            </div>
            <div class="products-grid">
                @php $hasStudyGuide = false; @endphp
                @if (!empty($products) && count($products))
                    @foreach ($products as $product)
                        @if ((int) $product->type === 3)
                            @php
                                $hasStudyGuide = true;
                                $productImages = $product->files;
                                $imageUrl =
                                    @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');
                                // Piece 1: reuse book detail until dedicated route (piece 2)
                                $detailUrl = route('shop.book.detail', $product->id);
                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="product-card">
                                <div class="product-image guides">
                                    <a href="{{ $detailUrl }}">
                                        <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="product-body">
                                    <p class="product-tag">{{ $product->sub_title }}</p>
                                    <h3>{{ $product->title }}</h3>

                                    <div class="product-footer">
                                        @if ($discountPrice > 0)
                                            <div>
                                                <span
                                                    class="product-price">{{ getPriceFormat($originalPrice) }}</span>
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    <del>{{ getPriceFormat($originalPrice + $discountPrice) }}</del>
                                                </span>
                                            </div>
                                        @else
                                            <span
                                                class="product-price">{{ getPriceFormat($originalPrice - $discountPrice) }}</span>
                                        @endif

                                        <a href="{{ $detailUrl }}" class="product-action">Buy Now &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if (!$hasStudyGuide)
                    <div class="text-center py-5" style="grid-column: 1 / -1;">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                            style="width: 50px;">
                        <h4 class="mt-3">No Product Found</h4>
                    </div>
                @endif
            </div>
        </div>

        <!-- STUDY TOOLS -->
        <div class="category-group" id="study-tools">
            <div class="category-header">
                <h2>Study Tools</h2>
                <p>Quick-reference guides, diagnostic kits, and practice materials designed to complement our study
                    guides and
                    coaching programs.</p>
            </div>
            <div class="products-grid">
                @php $hasStudyTool = false; @endphp
                @if (!empty($products) && count($products))
                    @foreach ($products as $product)
                        @if ((int) $product->type === 4)
                            @php
                                $hasStudyTool = true;
                                $productImages = $product->files;
                                $imageUrl =
                                    @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');
                                $detailUrl = route('shop.book.detail', $product->id);
                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="product-card">
                                <div class="product-image guides">
                                    <a href="{{ $detailUrl }}">
                                        <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="product-body">
                                    <p class="product-tag">{{ $product->sub_title }}</p>
                                    <h3>{{ $product->title }}</h3>

                                    <div class="product-footer">
                                        @if ($discountPrice > 0)
                                            <div>
                                                <span
                                                    class="product-price">{{ getPriceFormat($originalPrice) }}</span>
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    <del>{{ getPriceFormat($originalPrice + $discountPrice) }}</del>
                                                </span>
                                            </div>
                                        @else
                                            <span
                                                class="product-price">{{ getPriceFormat($originalPrice - $discountPrice) }}</span>
                                        @endif

                                        <a href="{{ $detailUrl }}" class="product-action">Buy Now &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if (!$hasStudyTool)
                    <div class="text-center py-5" style="grid-column: 1 / -1;">
                        <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                            style="width: 50px;">
                        <h4 class="mt-3">No Product Found</h4>
                    </div>
                @endif
            </div>
        </div> 

    </div>
</section>


<!-- BUNDLES -->
<section class="bundles-section" id="bundles">
    <div class="section-header">
        <p class="section-eyebrow">Save More</p>
        <h2 class="section-title">Bundles &amp; Savings</h2>
        <p class="section-subtitle">Combine study resources for the best value. Every bundle is instant download —
            start
            studying the minute you purchase.</p>
    </div>

    <div class="bundles-grid">

        <!-- BUNDLE 1: The NCLEX Reset Bundle -->
        <div class="bundle-card">
            <h3 class="bundle-name">The NCLEX Reset Bundle&trade;</h3>
            <p class="bundle-desc">Your complete comeback toolkit — the day-by-day planner paired with the full
                remediation
                roadmap.</p>
            <ul class="bundle-includes">
                <li>FL BON Remediation Guide&trade; ($87 value)</li>
                <li>The NCLEX Reset Planner&trade; ($67 value)</li>
                <li>Combined: All 8 Client Needs + 30-day daily structure</li>
            </ul>
            <div class="bundle-price-row">
                <span class="bundle-price">$127</span>
                <span class="bundle-original">$154</span>
                <span class="bundle-savings">Save $27</span>
            </div>
            <a href="#" class="bundle-cta primary">Get the Bundle &rarr;</a>
        </div>

        <!-- BUNDLE 2: The Study Starter Bundle -->
        <div class="bundle-card featured">
            <span class="bundle-badge">Best Value</span>
            <h3 class="bundle-name">The Study Starter Bundle&trade;</h3>
            <p class="bundle-desc">Everything you need to begin your NCLEX prep with the right tools, strategy, and
                mindset.
            </p>
            <ul class="bundle-includes">
                <li>FL BON Remediation Guide&trade; ($87 value)</li>
                <li>The NCLEX Reset Planner&trade; ($67 value)</li>
                <li>Content Area Diagnostic Kit&trade; ($19 value)</li>
                <li>NCLEX Day-Of Checklist &amp; Calm Kit&trade; ($9 value)</li>
            </ul>
            <div class="bundle-price-row">
                <span class="bundle-price">$146</span>
                <span class="bundle-original">$182</span>
                <span class="bundle-savings">Save 20%</span>
            </div>
            <a href="#" class="bundle-cta primary">Get the Bundle &rarr;</a>
        </div>

        <!-- BUNDLE 3: The Full Comeback Bundle -->
        <div class="bundle-card">
            <h3 class="bundle-name">The Full Comeback Bundle&trade;</h3>
            <p class="bundle-desc">The complete MXP study toolkit — every guide, every tool, every reference. Built for
                the
                student going all-in.</p>
            <ul class="bundle-includes">
                <li>Everything in Study Starter, plus:</li>
                <li>NCLEX PASS Method&trade; Workbook ($69 value)</li>
                <li>Pharmacology Quick Reference&trade; ($29 value)</li>
                <li class="coming">+ Exclusive early access to new releases</li>
            </ul>
            <div class="bundle-price-row">
                <span class="bundle-price">$207</span>
                <span class="bundle-original">$280</span>
                <span class="bundle-savings">Save 26%</span>
            </div>
            <a href="#" class="bundle-cta secondary">Get the Bundle
                &rarr;</a>
        </div>

    </div>
</section> 

<!-- MERCHANDISE (Coming Soon) -->
<section class="products-section" style="background: var(--cream); padding-top: 60px;">
    <div class="products-inner">
        <div class="category-group" id="merchandise">
            <div class="category-header">
                <h2>Merchandise</h2>
                <p>Wear the mission. Represent for every nursing student on their comeback. Coming soon.</p>
            </div>

            @if (!empty($products) && count($products))
                <div class="products-grid">
                    @foreach ($products as $product)
                        @if ($product->type == 1)
                            @php
                                $productImages = $product->files;
                                $imageUrl =
                                    @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');

                                if ($product->type == 1) {
                                    $detailUrl = route('shop.product.detail', $product->id);
                                } elseif ($product->type == 2) {
                                    $detailUrl = route('shop.book.detail', $product->id);
                                } else {
                                    $detailUrl = '#';
                                }

                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="product-card">
                                <div class="product-image merch">
                                    @if ($product->total_inventory <= 0)
                                        <span class="product-badge soon">Out of Stock</span>
                                    @endif
                                    <a href="{{ $detailUrl }}">
                                        <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="product-body">
                                    <p class="product-tag">{{ $product->sub_title }}</p>
                                    <h3>{{ $product->title }}</h3>

                                    <div class="product-footer">
                                        @if ($discountPrice > 0)
                                            <div>
                                                <span
                                                    class="product-price">{{ getPriceFormat($originalPrice - $discountPrice) }}</span>
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    <del>{{ getPriceFormat($originalPrice) }}</del>
                                                </span>
                                            </div>
                                        @else
                                            <span
                                                class="product-price">{{ getPriceFormat($originalPrice - $discountPrice) }}</span>
                                        @endif

                                        @if ($product->total_inventory > 0)
                                            <a href="{{ $detailUrl }}" class="product-action">Buy Now
                                                &rarr;</a>
                                        @else
                                            <a href="#" class="product-action">Notify Me &rarr;</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                        style="width: 50px;">
                    <h4 class="mt-3">No Product Found</h4>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter-section">
    <div class="newsletter-inner">
        <h2>New arrivals &amp; study tips.</h2>
        <p>Get notified when new study tools drop, plus weekly notes with a question breakdown, a study tip, or a
            comeback
            story.</p>
        <div class="newsletter-form">
            <input type="email" placeholder="Email address" aria-label="Email address">
            <button onclick="event.preventDefault();">Subscribe &rarr;</button>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta">
    <h2>Need more than resources? <em>Get the full program.</em></h2>
    <p>Our study tools complement — but don't replace — the structure, coaching, and accountability of a full Merkaii
        program.</p>
    <a href="{{ url('/programs') }}" class="btn-on-teal">Explore Programs</a>
    <a href="{{ url('/contact') }}" class="btn-outline-light">Schedule a Call</a>
</section>



{{-- <section>
    <div class="container py-5 px-lg-5">
        <div class="px-lg-5 px-3 py-5">
            <div class="text-center mb-4">
                <span class="text-muted">SOME QUALITY ITEMS</span>
                <h2 class="fw-bold">New Release Books</h2>
            </div>

            @if (!empty($products) && count($products))
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 60px">
                    @foreach ($products as $product)
                        @if ($product->type == 2)
                            @php
                                $productImages = $product->files;
                                $imageUrl = @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');
                
                                if ($product->type == 1) {
                                    $detailUrl = route('shop.product.detail', $product->id);
                                } elseif ($product->type == 2) {
                                    $detailUrl = route('shop.book.detail', $product->id);
                                } else {
                                    $detailUrl = '#';
                                }
                            
                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="product-card featured-product">
                                <a href="{{ $detailUrl }}">
                                    <div class="product-image books">
                                        <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </a>
                                <div class="product-body">
                                    <p class="product-tag">{{ $product->sub_title }}</p>
                                    <h3>{{ $product->title }}</h3>
                                
                                    <div class="product-footer">
                                        @if ($discountPrice > 0)
                                            <div>
                                                <span class="product-price">
                                                    {{ getPriceFormat($originalPrice) }}
                                                </span>
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    <del>{{ getPriceFormat($originalPrice + $discountPrice) }}</del>
                                                </span>
                                            </div>
                                        @else
                                            <span class="product-price">
                                                {{ getPriceFormat($originalPrice - $discountPrice) }}
                                            </span>
                                        @endif
                                        
                                        <a href="{{ $detailUrl }}" class="product-action">
                                            {{ $product->total_inventory > 0 ? 'Buy Now →' : 'Out of Stock' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @else
                <div class="text-center py-5">
                    <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                        style="width: 50px;">
                    <h4 class="mt-3">No Product Found</h4>
                </div>
            @endif
        </div>
    </div>
</section> --}}

{{-- <section class="instructor-section">
    <div class="container py-5 px-3 px-sm-5 mt-5">
        <div class="card px-3 px-md-5"
            style="background-color: var(--system_primery_color); max-width: 1600px; margin: 0 auto">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-8 col-xl-6 py-4">
                    <h6 style="color: #2FC7A1;; font-weight: 400 !important">Other Products</h6>

                    <h2 class="text-white my-4">Wear your passion. <br>Live your purpose.</h2>

                    <p class="text-white">Explore our collection of nursing-inspired apparel and accessories made for
                        students and future
                        nurses. From
                        motivational t-shirts to practical gear, these items let you celebrate your journey while
                        staying
                        comfortable
                        and confident. Perfect for study sessions, clinicals, or everyday wear.</p>

                    <button class="py-2 px-4 border-0 text-white mt-4"
                        style="border-radius: 50px !important; background-color: #2FC7A1;">
                        Explore All
                    </button>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('public/assets/instructor.png') }}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- <section>
    <div class="container py-5 px-lg-5">
        <div class="px-lg-5 px-3 py-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Explore Our Products</h2>
            </div>

            @if (!empty($products) && count($products))
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 60px">
                    @foreach ($products as $product)
                        @if ($product->type == 1)
                            @php
                                $productImages = $product->files;
                                $imageUrl =
                                    @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png');

                                if ($product->type == 1) {
                                    $detailUrl = route('shop.product.detail', $product->id);
                                } elseif ($product->type == 2) {
                                    $detailUrl = route('shop.book.detail', $product->id);
                                } else {
                                    $detailUrl = '#';
                                }

                                $discountPrice = $product->total_discount;
                                $originalPrice = $product->total_amount;
                            @endphp

                            <div class="card p-4 border-0" style="box-shadow: 0px 4px 10px 0px #00000026;">
                                <a href="{{ $detailUrl }}">
                                    <img src="{{ $imageUrl }}" alt="{{ $product->title }}"
                                        style="filter: drop-shadow(0px 0px 4px #00000048); object-fit: cover; height: 300px;"
                                        width="100%">
                                </a>
                                <div class="text-center mt-3">
                                    <h6 style="color: #393280">{{ $product->title }}</h6>
                                    <span class="d-block mb-2 text-muted">{{ $product->sub_title }}</span>

                                    @if ($discountPrice > 0)
                                        <div>
                                            <span class="fw-bold" style="color: #ED553B;">
                                                {{ getPriceFormat($originalPrice - $discountPrice) }}
                                            </span>
                                            <span class="text-muted text-decoration-line-through ms-2">
                                                <del>{{ getPriceFormat($originalPrice) }}</del>
                                            </span>
                                        </div>
                                    @else
                                        <h5 class="fw-bold" style="color: #ED553B">
                                            {{ getPriceFormat($originalPrice - $discountPrice) }}</h5>
                                    @endif

                                    <small class="d-block mt-2">
                                        <i class="ti-shopping-cart"></i>
                                        {{ $product->total_inventory > 0 ? 'In-Stock' : 'Out of Stock' }}
                                    </small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <img src="{{ asset('public/frontend/infixlmstheme/img/not-found.png') }}" alt="Not Found"
                        style="width: 50px;">
                    <h4 class="mt-3">No Product Found</h4>
                </div>
            @endif
        </div>
    </div>
</section> --}}


{{-- <section>
    <div class="container px-lg-5 py-5">
        <div class="row px-xl-5 px-3">

            <div class="col-12">
                <div class="box_header d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex justify-content-between w-100 align-items-center mb-3 mb-md-4">
                        <h5 class="custom_small_heading f_w_700 ">{{ count(@$products) }} Products</h5>
                        <a class="font-weight-500 pull-bs-canvas-left filter_btn" id="filter_btn"
                            style="cursor: pointer; text-align: center;">
                            Show Filter
                            <svg width="22" height="16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg">
                                <g id="icon-filter" fill-rule="nonzero" fill="none">
                                    <rect fill="#D8D8D8" y="2" width="22" height="2" rx="1">
                                    </rect>
                                    <rect fill="#D8D8D8" y="12" width="22" height="2" rx="1">
                                    </rect>
                                    <circle fill="#373737" cx="15.5" cy="13" r="2.5">
                                    </circle>
                                    <circle fill="#373737" cx="6.5" cy="3" r="2.5">
                                    </circle>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <div class="box_header_right mb_30">
                        <div class="short_select d-flex align-items-center">
                            <div class="mobile_filter mr_10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13"
                                    viewBox="0 0 19.5 13">
                                    <g transform="translate(28)">
                                        <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5" height="2"
                                            rx="1" transform="translate(-28)"
                                            fill="var(--system_primery_color)" />
                                        <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5" height="2"
                                            rx="1" transform="translate(-26 5.5)"
                                            fill="var(--system_primery_color)" />
                                        <rect id="Rectangle_3" data-name="Rectangle 3" width="5" height="2"
                                            rx="1" transform="translate(-20.75 11)"
                                            fill="var(--system_primery_color)" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($products))
                @foreach ($products as $product)
                    @php
                        $productImages = $product->files;
                        if ($product->type == 1) {
                            $detailUrl = route('shop.product.detail', $product->id);
                        } elseif ($product->type == 2) {
                            $detailUrl = route('shop.book.detail', $product->id);
                        } else {
                            $detailUrl = '';
                        }

                    @endphp

                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center">
                        <div class="quiz_wizged card rounded-card shadow mb-md-4 mb-3 w-100">
                            <a href="{{ $detailUrl }}">
                                <div class="thumb rounded-card-img">
                                    <img src="{{ @$productImages[0]->file_path ?? url('public/assets/product-Placeholder.png') }}"
                                        class="img-fluid w-100 rounded-card-img img-thumb course-page-img"
                                        alt="">

                                    <x-price-tag :price="$product->total_amount" :discount="$product->total_amount - $product->total_discount" />

                                    <span class="quiz_tag">{{ $product->type_label }}<small></small></span>
                                </div>
                            </a>
                            <div class="card-body course_content">
                                <a href="{{ $detailUrl }}">
                                    <h5 class="noBrake font-weight-bold" title="Network Security">
                                        {{ $product->title }}</h5>
                                </a>
                                <div class="rating_cart">
                                    <div class="rateing">
                                        <span>{{ $product->sub_title }}</span>
                                        <!-- <i class="fas fa-star"></i> -->
                                    </div>
                                </div>
                                <div class="course_less_students d-flex justify-content-between course-small"
                                    style="gap: 7px; text-align: center;">
                                    <small class="small_tag_color">
                                        <i class="ti-shopping-cart"></i>
                                        {{ $product->total_inventory > 0 ? 'In-Stock' : 'Out of Stock' }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">

                    <div class="Nocouse_wizged d-flex align-items-center justify-content-center text-center">
                        <div class="thumb">
                            <img style="width: 50px"
                                src="{{ asset('public/frontend/infixlmstheme') }}/img/not-found.png" alt="">
                        </div>
                        <h1>
                            {{ __('No Product Found') }}
                        </h1>
                    </div>
                </div>
            @endif

        </div>

    </div>
</section> --}}





<div class="bs-canvas bs-canvas-left position-fixed bg-light h-100">
    <header class="border-bottom bs-canvas-header p-3">
        <h4 class="d-inline-block f_w_600 mb-0">Filter</h4>
        <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                class="">&times;</span></button>
    </header>

    <div class="bs-canvas-content px-3 py-1">

        <form>

            <input type="hidden" name="tutor_courses" value="1">

            <div class="row">
                <div class="col-md-12">
                    <h6>Course Name</h6>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control form-control-sm" name="filter_search_by"
                        id="" placeholder="Enter Course Name" value="">
                </div>
                <div class="col-md-12 mt-3">
                    <h6>Course Type</h6>
                </div>
                <div class="col-md-12">

                </div>
                <div class="col-md-12 mt-3">
                    <h6>Categories</h6>
                    <select id="categories" name="filter_by_categories" class="form-control form-control-sm mb-2">
                        <option value="" selected>Select Category</option>
                        <option value="1">Category 1</option>
                        <option value="2">Category 2</option>
                        <option value="3">Category 3</option>
                        <option value="4">Category 4</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <h6>Sub Categories</h6>
                    <select id="sub_categories" name="filter_by_sub_categories"
                        class="form-control form-control-sm mb-2">
                        <option value="" selected>Select Sub Category</option>
                        <option value="2">Sub Category 2</option>
                        <option value="1">Sub Category 1</option>
                        <option value="3">Sub Category 3</option>
                        <option value="4">Sub Category 4</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <h6 class="mb-3">Price</h6>
                    <div class="d-flex flex-column">
                        <h6 class="mb-0">From</h6>
                        <div class="align-items-center d-flex flex-row-reverse gap-2">
                            <p id="price_range_min" class="font-weight-bold">0</p>
                            <input type="range" min="0" max="100" step="1"
                                name="filter_by_price_min" class="form-control accent-color p-0"
                                oninput="price_range_min.innerText = this.value" id="program_price_min"
                                value="{{ @$request->filter_by_price_min ?? 0 }}">
                        </div>
                        <h6 class="mb-0">To</h6>
                        <div class="align-items-center d-flex flex-row-reverse gap-2">
                            <p id="price_range_max" class="font-weight-bold">100</p>
                            <input type="range" min="0" max="100" step="1"
                                name="filter_by_price_max" class="form-control accent-color p-0"
                                oninput="price_range_max.innerText = this.value" id="program_price_max"
                                value="100">
                        </div>
                    </div>
                </div>
            </div>
            <p class="mb-0 mt-4 text-center">
                <button type="submit" class="theme_btn small_btn2 p-2">Submit</button>
            </p>
        </form>
    </div>
</div>
</div>


<script>
    function scrollToCategory(id, btn) {
        document.getElementById(id).scrollIntoView({
            behavior: 'smooth'
        });
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        if (btn) {
            btn.classList.add('active');
        }
    }
</script>
