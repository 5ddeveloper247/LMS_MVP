@php
    use Illuminate\Support\Facades\Auth;
    $c = $confirmation ?? [];
    $items = $c['items'] ?? [];
    $email = $c['email'] ?? (Auth::user()->email ?? '');
    $orderNumber = $c['order_number'] ?? ('MXP-' . ($checkout->id ?? ''));
    $paidAt = !empty($c['paid_at'])
        ? \Carbon\Carbon::parse($c['paid_at'])->format('F j, Y')
        : now()->format('F j, Y');
@endphp
<div class="mxp-confirm">
    <div class="mxp-progress-bar">
        <div class="mxp-progress-inner">
            <div class="mxp-progress-step is-done">
                <div class="mxp-progress-dot">✓</div> {{ __('Cart') }}
            </div>
            <div class="mxp-progress-line"></div>
            <div class="mxp-progress-step is-done">
                <div class="mxp-progress-dot">✓</div> {{ __('Checkout') }}
            </div>
            <div class="mxp-progress-line"></div>
            <div class="mxp-progress-step is-active">
                <div class="mxp-progress-dot">3</div> {{ __('Confirmation') }}
            </div>
        </div>
    </div>

    <section class="mxp-confirm-section">
        <div class="mxp-confirm-grid">
            <div class="mxp-confirm-card">
                <div class="mxp-confirm-check">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <h1>Order <em>confirmed!</em></h1>
                <p class="mxp-confirm-sub">
                    Thank you for your purchase. A confirmation email has been sent to
                    <strong>{{ $email }}</strong> with your order details and tracking information.
                </p>

                <div class="mxp-order-number-box">
                    <div class="mxp-order-number-label">{{ __('Order Number') }}</div>
                    <div class="mxp-order-number-value">{{ $orderNumber }}</div>
                </div>

                <div class="mxp-confirm-details">
                    <div class="mxp-confirm-detail-row">
                        <span class="mxp-confirm-detail-label">{{ __('Date') }}</span>
                        <span class="mxp-confirm-detail-value">{{ $paidAt }}</span>
                    </div>
                    <div class="mxp-confirm-detail-row">
                        <span class="mxp-confirm-detail-label">{{ __('payment.Payment') }}</span>
                        <span class="mxp-confirm-detail-value">{{ $c['payment_label'] ?? 'Authorize.Net' }}</span>
                    </div>
                    <div class="mxp-confirm-detail-row">
                        <span class="mxp-confirm-detail-label">{{ __('Shipping') }}</span>
                        <span class="mxp-confirm-detail-value">{{ $c['shipping_label'] ?? 'Standard (5–7 business days)' }}</span>
                    </div>
                    @if (!empty($c['shipping_address']))
                        <div class="mxp-confirm-detail-row">
                            <span class="mxp-confirm-detail-label">{{ __('Shipping Address') }}</span>
                            <span class="mxp-confirm-detail-value">{{ $c['shipping_address'] }}</span>
                        </div>
                    @endif
                </div>

                <hr class="mxp-confirm-divider">

                <div class="mxp-next-steps">
                    <h3>{{ __('What happens next?') }}</h3>
                    <div class="mxp-next-step-item">
                        <div class="mxp-next-step-number">1</div>
                        <div class="mxp-next-step-text">
                            <strong>{{ __('Confirmation email') }}</strong> — Check your inbox (and spam folder) for your order receipt and any digital download links.
                        </div>
                    </div>
                    <div class="mxp-next-step-item">
                        <div class="mxp-next-step-number">2</div>
                        <div class="mxp-next-step-text">
                            <strong>{{ __('Shipping updates') }}</strong> — You'll receive tracking information once your order ships, typically within 1–2 business days.
                        </div>
                    </div>
                    <div class="mxp-next-step-item">
                        <div class="mxp-next-step-number">3</div>
                        <div class="mxp-next-step-text">
                            <strong>{{ __('Start studying') }}</strong> — If your order includes digital resources or course access, check your dashboard for instant access.
                        </div>
                    </div>
                </div>

                <div class="mxp-confirm-actions">
                    <a href="{{ route('studentDashboard') }}" class="mxp-btn-primary">{{ __('Go to My Dashboard') }} →</a>
                    <a href="{{ route('shop.index') }}" class="mxp-btn-secondary">{{ __('Continue Shopping') }}</a>
                </div>
            </div>

            <aside class="mxp-order-summary">
                <div class="mxp-summary-title">{{ __('Order Summary') }}</div>

                @forelse ($items as $item)
                    <div class="mxp-summary-item">
                        <div class="mxp-summary-thumb">
                            @if (!empty($item['image']))
                                <img src="{{ getCourseImage($item['image']) }}" alt="">
                            @else
                                {!! nl2br(e(str_replace(' ', "\n", $item['thumb_label'] ?? 'Item'))) !!}
                            @endif
                        </div>
                        <div class="mxp-summary-item-details">
                            <div class="mxp-summary-item-name">{{ $item['title'] ?? 'Item' }}</div>
                            <div class="mxp-summary-item-meta">{{ $item['meta'] ?? 'Qty: 1' }}</div>
                        </div>
                        <div class="mxp-summary-item-price">{{ getPriceFormat($item['price'] ?? 0) }}</div>
                    </div>
                @empty
                    <div class="mxp-summary-item">
                        <div class="mxp-summary-item-details">
                            <div class="mxp-summary-item-name">{{ __('Your order') }}</div>
                            <div class="mxp-summary-item-meta">{{ $c['tracking'] ?? '' }}</div>
                        </div>
                        <div class="mxp-summary-item-price">{{ getPriceFormat($c['total'] ?? 0) }}</div>
                    </div>
                @endforelse

                <div class="mxp-summary-totals">
                    <div class="mxp-summary-row">
                        <span>{{ __('frontend.Subtotal') }}</span>
                        <span>{{ getPriceFormat($c['subtotal'] ?? 0) }}</span>
                    </div>
                    <div class="mxp-summary-row">
                        <span>{{ __('Shipping') }}</span>
                        <span>{{ __('Free') }}</span>
                    </div>
                    @if (!empty($c['discount']) && (float) $c['discount'] > 0)
                        <div class="mxp-summary-row">
                            <span>{{ __('payment.Discount Amount') }}</span>
                            <span>-{{ getPriceFormat($c['discount']) }}</span>
                        </div>
                    @endif
                    @if (!empty($c['tax']) && (float) $c['tax'] > 0)
                        <div class="mxp-summary-row">
                            <span>{{ __('tax.TAX') }}</span>
                            <span>{{ getPriceFormat($c['tax']) }}</span>
                        </div>
                    @endif
                    <div class="mxp-summary-row is-total">
                        <span>{{ __('Total Paid') }}</span>
                        <span>{{ getPriceFormat($c['total'] ?? 0) }}</span>
                    </div>
                </div>

                <div class="mxp-summary-shipping-note">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    Estimated delivery: {{ $c['delivery_estimate'] ?? '5–7 business days' }}
                </div>

                <div style="margin-top:16px;text-align:center;">
                    <a href="{{ route('myOrders') }}" style="color:#1A8A6F;font-size:13px;font-weight:600;text-decoration:none;">{{ __('View My Orders') }} →</a>
                </div>
            </aside>
        </div>
    </section>

    <section class="mxp-share-section">
        <div class="mxp-share-inner">
            <h2>{{ __('Share the love.') }}</h2>
            <p>Know a nursing student who could use better tools? Every share helps a student who's been counted out find their way back in.</p>
            <div class="mxp-share-buttons">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="mxp-share-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    Share on Instagram
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/')) }}" target="_blank" rel="noopener" class="mxp-share-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    Share on Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode('Just ordered from Merkaii Xcellence Prep!') }}&url={{ urlencode(url('/')) }}" target="_blank" rel="noopener" class="mxp-share-btn">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733 -16z"/><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/></svg>
                    Share on X
                </a>
            </div>
        </div>
    </section>
</div>
