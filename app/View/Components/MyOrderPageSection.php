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
                                        ->whereNull('shop_bundle_id')
                                        ->whereHas('product', function ($q) {
                                            $q->where('type', 1);
                                        })
                                        ->with('product')->latest()->paginate(5, ['*'], 'products_page');

        $orderBooksListing = ShopOrder::where('user_id', Auth::id())
                                    ->whereNull('shop_bundle_id')
                                    ->whereHas('product', function ($q) {
                                            $q->where('type', 2);
                                    })
                                    ->with('product')->latest()->paginate(5, ['*'], 'books_page');

        $orderGuidesListing = ShopOrder::where('user_id', Auth::id())
                                    ->whereNull('shop_bundle_id')
                                    ->whereHas('product', function ($q) {
                                            $q->where('type', 3);
                                    })
                                    ->with('product')->latest()->paginate(5, ['*'], 'guides_page');

        $orderToolsListing = ShopOrder::where('user_id', Auth::id())
                                    ->whereNull('shop_bundle_id')
                                    ->whereHas('product', function ($q) {
                                            $q->where('type', 4);
                                    })
                                    ->with('product')->latest()->paginate(5, ['*'], 'tools_page');

        // One row per bundle purchase (group by tracking + shop_bundle_id)
        $bundleOrderLines = ShopOrder::where('user_id', Auth::id())
                                    ->whereNotNull('shop_bundle_id')
                                    ->with(['shopBundle', 'product'])
                                    ->latest()
                                    ->get();

        $orderBundlesListing = $bundleOrderLines
            ->groupBy(function ($order) {
                return ($order->tracking ?? '') . '|' . $order->shop_bundle_id;
            })
            ->map(function ($lines) {
                $first = $lines->first();
                return (object) [
                    'tracking' => $first->tracking,
                    'shop_bundle_id' => $first->shop_bundle_id,
                    'bundle' => $first->shopBundle,
                    'purchase_price' => $lines->sum('purchase_price'),
                    'discount_amount' => $lines->sum('discount_amount'),
                    'status' => $first->status,
                    'status_label' => $first->status_label,
                    'payment_status' => $first->payment_status,
                    'payment_status_label' => $first->payment_status_label,
                    'created_at' => $first->created_at,
                    'items_count' => $lines->count(),
                    'first_order_id' => $first->id,
                    'lines' => $lines,
                ];
            })
            ->values();

        return view(theme('components.my-order-page-section'), compact(
            'orderProductsListing',
            'orderBooksListing',
            'orderGuidesListing',
            'orderToolsListing',
            'orderBundlesListing'
        ));
    }
}
