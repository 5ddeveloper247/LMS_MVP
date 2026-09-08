<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Shop\Entities\ShopProduct;

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
        $flagshipProduct = null;

        try {
            $flagshipProduct = ShopProduct::where('is_flagship', 1)
                ->where('status', '1')
                ->with('files')
                ->first();
        } catch (\Throwable $e) {
            $flagshipProduct = null;
        }

        return view(theme('components.shop-product-card-section'), compact('flagshipProduct'));
    }
}
