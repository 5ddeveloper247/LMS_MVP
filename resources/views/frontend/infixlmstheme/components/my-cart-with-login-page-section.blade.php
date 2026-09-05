@php
    $cartLines = [];
    $totalSum = 0;
    $taxSum = 0;

    foreach ($carts as $cart) {
        $link = '#';
        $title = 'Item';
        $thumbnail = 'public/assets/product-Placeholder.png';
        $meta = '';
        $price = (float) ($cart->price ?? 0);
        $lineTax = 0;
        $imageClass = '';
        $resolvedPrice = $price;

        if (!empty($cart->course_id) && $cart->course) {
            if (isset($cart->course->parent)) {
                $title = $cart->course->parent->title;
            } else {
                $title = $cart->course->title;
            }
            if (count($cart->course->children)) {
                foreach ($cart->course->children as $child) {
                    if ($cart->course_type == $child->type) {
                        $thumbnail = $child->thumbnail;
                        break;
                    }
                    $thumbnail = $cart->course->thumbnail;
                }
            } else {
                $thumbnail = $cart->course->thumbnail;
            }
            $link = courseDetailsUrl($cart->course->id, $cart->course->type, $cart->course->slug);
            if ($cart->course->discount_price > 0) {
                $resolvedPrice = (float) $cart->course->discount_price;
            } elseif ($resolvedPrice <= 0) {
                $resolvedPrice = (float) ($cart->course->price ?? 0);
            }
            $meta = __('Course');
        } elseif (!empty($cart->program_id) && $cart->program) {
            $thumbnail = $cart->program->icon ?: $thumbnail;
            $link = route('programs.detail', $cart->program->id);
            $title = $cart->program->programtitle;
            if ($cart->program->discount_price > 0) {
                $resolvedPrice = (float) $cart->program->discount_price;
            } elseif ($resolvedPrice <= 0) {
                $resolvedPrice = (float) ($cart->program->price ?? $cart->price ?? 0);
            }
            $meta = __('Program');
        } elseif (!empty($cart->product_id) && $cart->product) {
            $product = $cart->product;
            if ((int) $product->type === 1) {
                $link = route('shop.product.detail', $cart->product_id);
            } else {
                $link = route('shop.book.detail', $cart->product_id);
            }
            $thumbnail = $product->files[0]->file_path ?? $thumbnail;
            $title = $product->title;
            $meta = $product->type_label ?? __('Product');
            if (!empty($product->sub_title)) {
                $meta .= ' · ' . $product->sub_title;
            }
            $imageClass = ((int) $product->type === 1) ? 'merch' : 'tools';

            // Same formula as addToCart when cart row has 0 / stale price
            $catalogPrice = (float) ($product->total_amount ?? 0) - (float) ($product->total_discount ?? 0);
            if ($catalogPrice <= 0) {
                $catalogPrice = (float) ($product->price ?? 0);
            }
            if ($resolvedPrice <= 0 && $catalogPrice > 0) {
                $resolvedPrice = $catalogPrice;
                // Heal cart so checkout / payment also see the correct amount
                $cart->price = $resolvedPrice;
                $cart->save();
            }

            // Frontend cart: tax hardcoded to 0 (do not use product DB tax)
            $lineTax = 0;
        } elseif (!empty($cart->shop_bundle_id) && $cart->shopBundle) {
            $shopBundle = $cart->shopBundle;
            $link = route('shop.bundle.detail', $cart->shop_bundle_id);
            $firstProduct = $shopBundle->products->first();
            if ($firstProduct && $firstProduct->files->first()) {
                $thumbnail = $firstProduct->files->first()->file_path;
            }
            $title = $shopBundle->name ?? __('Bundle');
            $bundleItemCount = $shopBundle->products->count();
            $meta = __('Bundle') . ($bundleItemCount ? ' · ' . $bundleItemCount . ' ' . __('items') : '');

            $catalogPrice = (float) ($shopBundle->total_amount ?? 0);
            if ($catalogPrice <= 0) {
                $catalogPrice = (float) ($shopBundle->price ?? 0);
            }
            if ($resolvedPrice <= 0 && $catalogPrice > 0) {
                $resolvedPrice = $catalogPrice;
                $cart->price = $resolvedPrice;
                $cart->save();
            }

            // Frontend cart: tax hardcoded to 0 (do not use bundle DB tax)
            $lineTax = 0;
        } else {
            continue;
        }

        $price = $resolvedPrice;
        $totalSum += $price;
        $taxSum += $lineTax;

        $cartLines[] = (object) [
            'id' => $cart->id,
            'link' => $link,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'meta' => $meta,
            'price' => $price,
            'tax' => $lineTax,
            'imageClass' => $imageClass,
        ];
    }

    $itemCount = count($cartLines);
    $taxSum = 0; // hardcode — never show DB tax on cart frontend
    $grandTotal = $totalSum + $taxSum;
@endphp

<div class="mxp-cart">
    <div class="mxp-breadcrumb">
        <div class="mxp-breadcrumb-inner">
            <a href="{{ url('/') }}">{{ __('Home') }}</a>
            <span>›</span>
            <a href="{{ route('shop.index') }}">{{ __('Shop') }}</a>
            <span>›</span>
            {{ __('Cart') }}
        </div>
    </div>

    <div class="mxp-page-header">
        <div class="mxp-page-header-inner">
            <h1>{{ __('Your Cart') }}</h1>
            <span class="mxp-cart-count">
                {{ $itemCount }} {{ $itemCount === 1 ? __('item') : __('items') }}
            </span>
        </div>
    </div>

    <div class="mxp-progress-bar">
        <div class="mxp-progress-inner">
            <div class="mxp-progress-step is-active">
                <div class="mxp-progress-dot">1</div>
                <div class="mxp-progress-label">{{ __('Cart') }}</div>
            </div>
            <div class="mxp-progress-step">
                <div class="mxp-progress-dot">2</div>
                <div class="mxp-progress-label">{{ __('Checkout') }}</div>
            </div>
            <div class="mxp-progress-step">
                <div class="mxp-progress-dot">3</div>
                <div class="mxp-progress-label">{{ __('Confirmation') }}</div>
            </div>
        </div>
    </div>

    <section class="mxp-cart-section">
        <div class="mxp-cart-grid">
            <div class="mxp-cart-items">
                @if ($itemCount === 0)
                    <div class="mxp-cart-empty">
                        <h2>{{ __('Your cart is empty.') }}</h2>
                        <p>{{ __('Looks like you haven’t added anything yet. Browse our study tools, books, and resources to get started.') }}</p>
                        <a href="{{ route('shop.index') }}" class="mxp-checkout-cta" style="max-width:300px;margin:0 auto;">
                            {{ __('Browse the Shop') }} →
                        </a>
                    </div>
                @else
                    @foreach ($cartLines as $line)
                        <div class="mxp-cart-item">
                            <div class="mxp-item-image {{ $line->imageClass }}">
                                <img src="{{ asset($line->thumbnail) }}" alt="{{ $line->title }}">
                            </div>
                            <div class="mxp-item-details">
                                <h3>
                                    <a href="{{ $line->link }}">{{ $line->title }}</a>
                                </h3>
                                @if ($line->meta)
                                    <p class="mxp-item-meta">{{ $line->meta }}</p>
                                @endif
                                <div class="mxp-item-controls">
                                    <div class="mxp-qty-control" title="{{ __('Quantity is fixed per cart line') }}">
                                        <button type="button" class="mxp-qty-btn" disabled aria-hidden="true">−</button>
                                        <input type="text" class="mxp-qty-val" value="1" readonly aria-label="{{ __('Quantity') }}">
                                        <button type="button" class="mxp-qty-btn" disabled aria-hidden="true">+</button>
                                    </div>
                                    <a class="mxp-item-remove" href="{{ route('removeItem', [$line->id]) }}">
                                        {{ __('Remove') }}
                                    </a>
                                </div>
                            </div>
                            <div class="mxp-item-right">
                                <span class="mxp-item-price">{{ getPriceFormat($line->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if ($itemCount > 0)
                <aside class="mxp-order-summary">
                    <h3 class="mxp-summary-title">{{ __('Order Summary') }}</h3>

                    <div class="mxp-summary-row">
                        <span>{{ __('Subtotal') }}</span>
                        <span class="mxp-summary-val">{{ getPriceFormat($totalSum) }}</span>
                    </div>
                    <div class="mxp-summary-row">
                        <span>{{ __('Shipping') }}</span>
                        <span class="mxp-summary-val">{{ __('At checkout') }}</span>
                    </div>
                    <p class="mxp-summary-note">{{ __('Shipping is confirmed at checkout.') }}</p>
                    <div class="mxp-summary-row">
                        <span>{{ __('Estimated Tax') }}</span>
                        <span class="mxp-summary-val">{{ getPriceFormat($taxSum) }}</span>
                    </div>
                    <div class="mxp-summary-row is-total">
                        <span>{{ __('Total') }}</span>
                        <span class="mxp-summary-val">{{ getPriceFormat($grandTotal) }}</span>
                    </div>

                    <div class="mxp-promo-section">
                        <p class="mxp-promo-label">{{ __('Promo Code') }}</p>
                        <p class="mxp-promo-hint">{{ __('You can apply a promo code on the checkout page.') }}</p>
                    </div>

                    <a href="{{ route('CheckOut') }}" class="mxp-checkout-cta">
                        {{ __('Proceed to Checkout') }} →
                    </a>
                    <a href="{{ route('shop.index') }}" class="mxp-continue-shopping">
                        ← {{ __('Continue Shopping') }}
                    </a>

                    <div class="mxp-trust-row">
                        <div class="mxp-trust-item"><span class="mxp-trust-check">✓</span> {{ __('Secure checkout') }}</div>
                        <div class="mxp-trust-item"><span class="mxp-trust-check">✓</span> {{ __('Trusted payment') }}</div>
                        <div class="mxp-trust-item"><span class="mxp-trust-check">✓</span> {{ __('Shop with confidence') }}</div>
                    </div>
                </aside>
            @endif
        </div>
    </section>

    <section class="mxp-explore">
        <p class="mxp-explore-eyebrow">{{ __('Keep exploring') }}</p>
        <h2>{{ __('Find your next study tool.') }}</h2>
        <a href="{{ route('shop.index') }}" class="mxp-explore-cta">{{ __('Browse the Shop') }} →</a>
    </section>
</div>
