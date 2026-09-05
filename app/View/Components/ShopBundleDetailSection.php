<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopBundleDetailSection extends Component
{
    public $request;
    public $bundle;
    public $relatedProducts;

    public function __construct($request, $bundle = null, $relatedProducts = null)
    {
        $this->request = $request;
        $this->bundle = $bundle;
        $this->relatedProducts = $relatedProducts;
    }

    public function render()
    {
        return view(theme('components.shop-bundle-detail-section'));
    }
}
