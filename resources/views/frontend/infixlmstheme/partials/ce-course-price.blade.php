{{-- CE course price: sale = total_amount (after discount + tax), crossed = original with tax --}}
@php
    $salePrice = $course->salePrice();
    $originalWithTax = $course->originalPriceWithTax();
    $priceClass = $priceClass ?? '';
@endphp
@if ($course->hasCeDiscount())
    <span class="{{ $priceClass }}">
        {{ getPriceFormat($salePrice) }}
        <span class="text-muted text-decoration-line-through ms-1">
            <del>{{ getPriceFormat($originalWithTax) }}</del>
        </span>
    </span>
@else
    <span class="{{ $priceClass }}">{{ getPriceFormat($salePrice) }}</span>
@endif
