<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopProductCardSection extends Component
{
    public $request, $products, $bundles;

    public function __construct($request, $products = null, $bundles = null)
    {
        $this->request = $request;
        $this->products = $products;
        $this->bundles = $bundles;
    }


    public function render()
    {
        return view(theme('components.shop-product-card-section'));
    }
}
