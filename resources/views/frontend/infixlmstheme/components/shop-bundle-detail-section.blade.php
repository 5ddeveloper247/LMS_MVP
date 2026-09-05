@php
    $bundleProducts = $bundle->products ?? collect();
    $primaryProduct = $bundleProducts->first();
    $primaryImage = $primaryProduct && $primaryProduct->files
        ? $primaryProduct->files->first()
        : null;
    $mainImageUrl = $primaryImage
        ? url($primaryImage->file_path)
        : asset('public/assets/product-Placeholder.png');

    $components = collect([
        $bundle->component_1,
        $bundle->component_2,
        $bundle->component_3,
        $bundle->component_4,
    ])->map(function ($item) {
        return trim(strip_tags((string) $item));
    })->filter(function ($item) {
        return $item !== '';
    })->values();

    $salePrice = (float) ($bundle->total_amount ?? 0);
    $discountAmount = (float) ($bundle->total_discount ?? 0);
    $originalPrice = $discountAmount > 0 ? $salePrice + $discountAmount : null;
@endphp

<!-- BUNDLE HEADER (same layout classes as product detail) -->
<section class="product-header">
    <div class="product-header-grid">

        <div class="product-gallery">
            <div class="product-main-image" id="main-preview-container">
                <img id="main-preview-image" src="{{ $mainImageUrl }}"
                    style="width: 100%; height: 100%; object-fit: cover; display: block;"
                    alt="{{ $bundle->name }}">

                @if ($bundle->is_featured)
                    <span class="product-main-badge">Best Value</span>
                @else
                    <span class="product-main-badge">Bundle</span>
                @endif
            </div>

            @if ($bundleProducts->count())
                <div class="product-thumbs">
                    @foreach ($bundleProducts as $index => $product)
                        @php
                            $thumb = $product->files->first();
                            $thumbUrl = $thumb
                                ? url($thumb->file_path)
                                : asset('public/assets/product-Placeholder.png');
                        @endphp
                        <div class="product-thumb {{ $index === 0 ? 'active' : '' }}"
                            data-type="image"
                            data-src="{{ $thumbUrl }}"
                            style="cursor: pointer;"
                            title="{{ $product->title }}">
                            <img src="{{ $thumbUrl }}"
                                style="width: 100%; height: 100%; object-fit: cover;"
                                alt="{{ $product->title }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="purchase-card">
            <p class="purchase-tag">Savings &amp; Bundles</p>
            <h1>{{ $bundle->name }}</h1>

            <div class="purchase-price-row">
                <span class="purchase-price">{{ getPriceFormat($salePrice) }}</span>
                @if ($originalPrice)
                    <span class="text-muted text-decoration-line-through ms-2"
                        style="font-size:18px;color:var(--charcoal-soft);">
                        <del>{{ getPriceFormat($originalPrice) }}</del>
                    </span>
                @endif
            </div>

            @if ($discountAmount > 0)
                <p class="purchase-format" style="color:var(--terracotta);font-weight:600;">
                    @if ($bundle->discount_type === 'percent' && (float) $bundle->discount > 0)
                        Save {{ rtrim(rtrim(number_format((float) $bundle->discount, 2, '.', ''), '0'), '.') }}%
                    @else
                        Save {{ getPriceFormat($discountAmount) }}
                    @endif
                </p>
            @else
                <p class="purchase-format">Instant access to all included items</p>
            @endif

            @if ($components->count())
                <ul class="purchase-features">
                    @foreach ($components as $component)
                        <li>{{ $component }}</li>
                    @endforeach
                </ul>
            @endif

            {{-- Cart wired — separate bundle routes (product cart untouched) --}}
            <a href="{{ route('shop.bundle.addToCart', $bundle->id) }}" class="purchase-cta">Add to Cart →</a>
            <a href="{{ route('shop.bundle.buyNow', $bundle->id) }}" class="purchase-secondary">Buy Now</a>
            <a href="{{ url('/contact') }}" class="purchase-secondary">Have questions? Talk to an advisor</a>

            <div class="purchase-trust">
                <div class="purchase-trust-item"><span class="trust-check">✓</span> Bundle savings applied at checkout</div>
                <div class="purchase-trust-item"><span class="trust-check">✓</span> 30-day satisfaction guarantee</div>
                <div class="purchase-trust-item"><span class="trust-check">✓</span> Secure checkout</div>
            </div>
        </div>
    </div>
</section>

<!-- STATIC TABS (same content pattern as product detail) -->
<section class="details-section">
    <div class="details-inner">

        <div class="details-tabs">
            <button type="button" class="detail-tab active" onclick="switchBundleTab('description', this)">Description</button>
            <button type="button" class="detail-tab" onclick="switchBundleTab('contents', this)">What's Inside</button>
            <button type="button" class="detail-tab" onclick="switchBundleTab('reviews', this)">Reviews (47)</button>
            <button type="button" class="detail-tab" onclick="switchBundleTab('shipping', this)">Shipping &amp; Returns</button>
        </div>

        <div class="detail-panel active" id="bundle-panel-description">
            <div class="detail-prose">
                <p>The NCLEX PASS Method™ Workbook is the companion study guide used in all Merkaii Xcellence Prep
                    coaching
                    programs. It contains the complete three-pillar framework — Content Mastery, Process Training, and
                    Confidence Building — broken into practical exercises you can work through on your own or alongside
                    a
                    program.</p>
                <p>This isn't a question bank or a content review textbook. It's a system workbook — designed to change
                    the
                    way you think about NCLEX questions, organize your study time, and track your progress with
                    measurable
                    benchmarks instead of vague anxiety.</p>
                <h3>Who This Is For</h3>
                <p>Repeat test-takers who need a different approach. First-time test-takers who want to study smarter
                    from the
                    start. Nursing students preparing for finals or the NCLEX. Anyone enrolled in an MXP coaching
                    program who
                    wants the physical workbook companion.</p>
                <h3>What Makes This Different</h3>
                <p>Most NCLEX prep books give you more content. This workbook gives you a process. Every chapter builds
                    a
                    specific skill — from reading question stems to managing test-day anxiety — and every exercise has a
                    clear
                    purpose tied to measurable improvement.</p>
            </div>
        </div>

        <div class="detail-panel" id="bundle-panel-contents">
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
                    <p>Next-Generation NCLEX case studies with extended drag-and-drop, highlight, and matrix exercises.</p>
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
                    <p>Lab values, drug classifications, priority frameworks, and delegation rules on tear-out cards.</p>
                </div>
            </div>
        </div>

        <div class="detail-panel" id="bundle-panel-reviews">
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
                        content for months, but the process training chapter taught me how to actually think through
                        questions. Passed on my next attempt.</p>
                    <p class="review-attr"><span class="review-name">K.L., RN</span> · Verified Purchase · September 2024</p>
                </div>
                <div class="review-card">
                    <p class="review-stars-sm">★★★★★</p>
                    <p class="review-text">The diagnostic worksheet alone was worth the price. I spent 15 minutes on it
                        and immediately knew where my gaps were. No other prep book had ever helped me identify that so
                        clearly.</p>
                    <p class="review-attr"><span class="review-name">[Name]</span> · Verified Purchase · [Month Year]</p>
                </div>
                <div class="review-card">
                    <p class="review-stars-sm">★★★★☆</p>
                    <p class="review-text">Really solid workbook. The NGN scenarios are especially useful — hard to find
                        good practice material for those question types. Only wish there were more practice sets, but
                        200 is still plenty.</p>
                    <p class="review-attr"><span class="review-name">[Name]</span> · Verified Purchase · [Month Year]</p>
                </div>
            </div>
        </div>

        <div class="detail-panel" id="bundle-panel-shipping">
            <div class="detail-prose">
                <h3>Shipping</h3>
                <p>Standard shipping (5–7 business days) is free on orders over $50. Orders under $50 ship for a flat
                    rate of $5.99. Expedited shipping (2–3 business days) is available for $12.99. All orders ship from
                    Lakeland, FL via USPS.</p>
                <h3>Returns &amp; Satisfaction Guarantee</h3>
                <p>We offer a 30-day satisfaction guarantee. If the workbook isn't what you expected, return it in
                    original condition for a full refund. No questions asked, no restocking fees. Contact
                    contact@merkaiixcelprep.com to initiate a return.</p>
                <h3>Digital Version</h3>
                <p>A downloadable PDF version of this workbook is not currently available. The workbook is designed to
                    be written in — the physical format is intentional. If you need a digital resource, check out our
                    <a href="{{ url('/programs') }}" style="color: var(--teal-mid);">Prep-Courses</a> for on-screen
                    learning.</p>
            </div>
        </div>
    </div>
</section>

<!-- RELATED RESOURCES -->
<section class="related-section">
    <div class="section-header">
        <p class="section-eyebrow">You Might Also Like</p>
        <h2 class="section-title">Related Resources</h2>
    </div>

    <div class="related-grid">
        @if (!empty($relatedProducts) && count($relatedProducts))
            @foreach ($relatedProducts as $relproduct)
                @php
                    $relUrl = ((int) $relproduct->type === 1)
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
                        <h3>{{ \Illuminate\Support\Str::limit($relproduct->title, 50, '...') }}</h3>
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

{{-- Same include as product detail — do not edit _custom_footer --}}
@include(theme('partials._custom_footer'))

<script>
    function switchBundleTab(name, btn) {
        document.querySelectorAll('.details-section .detail-tab').forEach(function (el) {
            el.classList.remove('active');
        });
        document.querySelectorAll('.details-section .detail-panel').forEach(function (el) {
            el.classList.remove('active');
        });
        var panel = document.getElementById('bundle-panel-' + name);
        if (panel) {
            panel.classList.add('active');
        }
        if (btn) {
            btn.classList.add('active');
        }
    }

    document.querySelectorAll('.product-thumb[data-type="image"]').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            var src = this.getAttribute('data-src');
            var main = document.getElementById('main-preview-image');
            if (main && src) {
                main.src = src;
            }
            document.querySelectorAll('.product-thumb').forEach(function (t) {
                t.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
</script>
