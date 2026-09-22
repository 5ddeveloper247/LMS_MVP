@php
  $isSidebar = ($variant ?? 'header') === 'sidebar';
  $wrapperClass = $isSidebar ? 'sidebar-card' : 'purchase-card';
  $buyClass = $isSidebar ? 'btn-enroll-il' : 'btn-buy';
  $cartClass = $isSidebar ? 'btn-cart-il' : 'btn-cart';
  $bundleClass = $isSidebar ? 'btn-bundle-il' : 'btn-bundle-link';
  $includesClass = $isSidebar ? 'sidebar-includes' : 'purchase-includes';
@endphp

<div class="{{ $wrapperClass }}">
  @if (!empty($option['badge']))
    <div class="sidebar-il-badge">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      {{ $option['badge'] }}
    </div>
  @else
    <p class="purchase-card-label">{{ $option['label'] }}</p>
  @endif

  @if ($option['price_label'])
    <p class="purchase-price">{{ $option['price_label'] }}</p>
  @else
    <p class="purchase-price" style="font-size:24px;">Pricing TBA</p>
  @endif

  <p class="purchase-type">{{ $option['title'] }}</p>

  @if ($option['sub_note'])
    <p class="purchase-sub-note">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      {{ $option['sub_note'] }}
      @if ($option['duration_weeks'])
        &middot;
        @if ($option['duration_weeks'] <= 1)
          1 Week
        @else
          {{ $option['duration_weeks'] }} Weeks
        @endif
      @endif
    </p>
  @endif

  @if ($option['can_purchase'])
    <a href="{{ $option['buy_url'] }}" class="{{ $buyClass }}">{{ $option['buy_label'] }}</a>
    <a href="{{ $option['cart_url'] }}" class="{{ $cartClass }}">Add to Cart</a>
  @else
    <span class="{{ $buyClass }} is-disabled">{{ $option['type'] === 5 ? 'Not Available' : 'Enrollment Coming Soon' }}</span>
  @endif

  <a href="{{ route('quizzes') }}#catalog" class="{{ $bundleClass }}">Save with a Bundle</a>

  <div class="purchase-divider"></div>
  <ul class="{{ $includesClass }}">
    @foreach ($option['includes'] as $include)
      <li>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        {{ $include }}
      </li>
    @endforeach
  </ul>
</div>
