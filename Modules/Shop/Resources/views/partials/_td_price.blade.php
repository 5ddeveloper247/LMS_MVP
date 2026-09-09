@php
    $sale = $query->salePrice();
@endphp
<strong>{{ getPriceFormat($sale) }}</strong>
