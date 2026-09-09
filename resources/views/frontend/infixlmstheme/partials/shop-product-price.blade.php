{{-- Shared product price: big = sale (after discount+tax), crossed = original with tax --}}
@php
    $salePrice = $product->salePrice();
    $originalWithTax = $product->originalPriceWithTax();
@endphp
@if ($product->hasShopDiscount())
    <div>
        <span class="product-price">{{ getPriceFormat($salePrice) }}</span>
        <span class="text-muted text-decoration-line-through ms-2">
            <del>{{ getPriceFormat($originalWithTax) }}</del>
        </span>
    </div>
@else
    <span class="product-price">{{ getPriceFormat($salePrice) }}</span>
@endif
