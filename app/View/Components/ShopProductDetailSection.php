<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopProductDetailSection extends Component
{
    public $request, $product, $relatedProducts;

    public function __construct($request, $product = null, $relatedProducts = null)
    {

        $this->request = $request;
        $this->product = $product;
        $this->relatedProducts = $relatedProducts;
    }


    public function render()
    {
        return view(theme('components.shop-product-detail-section'));
    }
}
