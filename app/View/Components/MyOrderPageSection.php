<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Modules\Shop\Entities\ShopOrder;

class MyOrderPageSection extends Component
{

    public function render()
    {
        $orderProductsListing = ShopOrder::where('user_id', Auth::id())
                                        ->whereHas('product', function ($q) {
                                            $q->where('type', 1);
                                        })
                                        ->with('product')->latest()->paginate(5, ['*'], 'products_page');

        $orderBooksListing = ShopOrder::where('user_id', Auth::id())
                                    ->whereHas('product', function ($q) {
                                        $q->where('type', 2);
                                    })
                                    ->with('product')->latest()->paginate(5, ['*'], 'books_page');
        
        return view(theme('components.my-order-page-section'), compact('orderProductsListing', 'orderBooksListing'));
    }
}
