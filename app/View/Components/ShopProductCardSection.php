<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopProductCardSection extends Component
{
    public $request, $products;

    public function __construct($request, $products = null)
    {

        $this->request = $request;
        $this->products = $products;
    }


    public function render()
    {
        return view(theme('components.shop-product-card-section'));
    }
}
