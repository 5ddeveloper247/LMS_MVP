<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Modules\Shop\Entities\ShopBundle;
use Modules\Shop\Entities\ShopProduct;
use Modules\Payment\Entities\Cart;
use Modules\Shop\Entities\ShopOrder;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DrewM\MailChimp\MailChimp;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index(Request $request)
    {
        try {
            
            $products = ShopProduct::where('status', '1')->get();
            $bundles = ShopBundle::forShopListing()->get();

            return view(theme('pages.shop'), compact('request', 'products', 'bundles'));
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function products(Request $request)
    {
        try {
            
            $products = ShopProduct::where('type', 1)->where('status', '1')->get();// 1: product, 2:books
            
            return view(theme('pages.shopProducts'), compact('request', 'products'));
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function books(Request $request)
    {
        try {
            
            $products = ShopProduct::where('type', 2)->where('status', '1')->get(); // 1: product, 2:books
            
            return view(theme('pages.shopBooks'), compact('request', 'products'));
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function productDetail(Request $request, $id)
    {
        try {
            
            $product = ShopProduct::where('id', $id)->where('status', '1')->first();
            $relatedProducts = ShopProduct::where('status', '1')->where('id', '!=', $id)->inRandomOrder()->take(3)->get();
            
            return view(theme('pages.shopProductDetails'), compact('request', 'product', 'relatedProducts'));
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function bookDetail(Request $request, $id)
    {
        try {
            
            $product = ShopProduct::where('id', $id)->where('status', '1')->first();
            $relatedProducts = ShopProduct::where('status', '1')->where('id', '!=', $id)->inRandomOrder()->take(3)->get();
            
            return view(theme('pages.shopProductDetails'), compact('request', 'product', 'relatedProducts'));
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Bundle detail — additive only; does not alter product/book detail flows.
     */
    public function bundleDetail(Request $request, $id)
    {
        try {
            $bundle = ShopBundle::with(['products.files'])
                ->where('id', $id)
                ->where('status', 1)
                ->first();

            if (!$bundle) {
                Toastr::error('Bundle not found', 'Failed');
                return redirect()->route('shop.index');
            }

            $relatedProducts = ShopProduct::where('status', '1')
                ->with('files')
                ->inRandomOrder()
                ->take(3)
                ->get();

            return view(theme('pages.shopBundleDetails'), compact('request', 'bundle', 'relatedProducts'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * Product (1) uses product detail; Book / Study Guide / Study Tool share book detail.
     */
    private function shopDetailRoute(?ShopProduct $product): string
    {
        if ($product && (int) $product->type === 1) {
            return 'shop.product.detail';
        }

        return 'shop.book.detail';
    }

    /** Study Guide (3) and Study Tool (4) are digital — no physical stock check. */
    private function shopItemRequiresInventory(ShopProduct $product): bool
    {
        return !in_array((int) $product->type, [3, 4], true);
    }

    public function addToCartShop(Request $request, $id)
    {
        try {
            
            $product = ShopProduct::where('id', $id)->first();
            $detailUrl = $this->shopDetailRoute($product);

            if (!Auth::check()) {
                Toastr::error('You must login', 'Error');
                session(['redirectTo' => route('shop.addToCart', ['id' => $id])]);
                return \redirect()->route('login');
            }

            $user = Auth::user();

            if (Auth::check() && in_array($user->role_id,[1,2])) {  // admin, instructor
                Toastr::error('Unable to add product in cart, please try with student login.', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }
           
            if (!$product) {
                Toastr::error('Product not found', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }

            if (Auth::check() && !in_array($user->role_id, [1,2])) {    // admin , instructor
            
                $exist = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
                $oldCart = Cart::where('user_id', $user->id)->when(isModuleActive('Appointment'), function ($query) {
                    $query->whereNotNull('product_id');
                })->first();


                if ($this->shopItemRequiresInventory($product) && $product->total_inventory <= 0) {

                    Toastr::error(trans('Product out of stock...'), trans('common.Failed'));
                    return redirect()->to(route($detailUrl, $id));

                }elseif (isset($exist)) {
                    
                    Toastr::error(trans('Product already added in your cart'), trans('common.Failed'));
                    return redirect()->to(route($detailUrl, $id));

                } elseif (Auth::check() && ($user->role_id == 1)) {
                    
                    Toastr::error(trans('frontend.You logged in as admin so can not add cart'), trans('common.Failed'));
                    return redirect()->to(route($detailUrl, $id));
                
                } else {
                    
                    $total_amount = $product->total_amount - $product->total_discount;

                    if (isset($oldCart)) {

                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->product_id = $product->id;
                        // $cart->instructor_id = $program->user_id;
                        // $cart->program_id = $id;
                        // $cart->plan_id = $request->plan_id;
                        $cart->tracking = $oldCart->tracking;

                        $cart->price = $total_amount ?? 0;
                        $cart->save();
                    } else {

                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->product_id = $product->id;
                        // $cart->instructor_id = $program->user_id;
                        // $cart->program_id = $id;
                        // $cart->plan_id = $request->plan_id;
                        $cart->tracking = getTrx();
                        $cart->price = $total_amount ?? 0;
                        
                        $cart->save();
                    }
                   
                    Toastr::success(trans('Product Added to your cart'), trans('common.Success'));
                    return redirect()->to(route($detailUrl, $id));
                }
            }
        
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function buyNowShop(Request $request, $id)
    {
        try {

            $product = ShopProduct::where('id', $id)->first();
            $detailUrl = $this->shopDetailRoute($product);

            if (Session::has('pre-registered-user')) {
                if (!Auth::check()) {
                    // Toastr::error('You must register first', 'Error');
                    Session::put('redirectTo', route('shop.buyNow', ['id' => $id]));
                    return redirect()->route('register');
                }
            } else {
                if (!Auth::check()) {
                    Toastr::error('You must login', 'Error');
                    session(['redirectTo' => route($detailUrl, ['id' => $id])]);
                    return redirect()->route('login');
                }
            }

            $user = Auth::user();

            if (Auth::check() && in_array($user->role_id,[1,2])) {  // admin, instructor
                Toastr::error('Unable to add product in cart, please try with student login.', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }

            if (!$product) {
                Toastr::error('Product not found', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }

            if (Auth::check() && !in_array($user->role_id, [1,2])) {    // admin, instructor


                $exist = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
                $oldCart = Cart::where('user_id', $user->id)->when(isModuleActive('Appointment'), function ($query) {
                    $query->whereNotNull('product_id');
                })->first();

                if ($this->shopItemRequiresInventory($product) && $product->total_inventory <= 0) {

                    Toastr::error(trans('Product out of stock...'), trans('common.Failed'));
                    return redirect()->to(route($detailUrl, $id));

                }elseif (isset($exist)) {

                    Toastr::error(trans('Product already added in your cart.'), trans('common.Failed'));
                    return redirect()->route('CheckOut');

                } elseif (Auth::check() && ($user->role_id == 1)) {

                    Toastr::error(trans('frontend.You logged in as admin so can not add cart.'), trans('common.Failed'));
                    return redirect()->to(route($detailUrl, $id));

                } else {

                    $total_amount = $product->total_amount - $product->total_discount;

                    if (isset($oldCart)) {

                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->product_id = $product->id;
                        // $cart->instructor_id = $program->user_id;
                        // $cart->program_id = $id;
                        // $cart->plan_id = $request->plan_id;
                        $cart->tracking = $oldCart->tracking;
                        $cart->price = $total_amount ?? 0;

                        $cart->save();
                    } else {

                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->product_id = $product->id;
                        // $cart->instructor_id = $program->user_id;
                        // $cart->program_id = $id;
                        // $cart->plan_id = $request->plan_id;
                        $cart->tracking = getTrx();
                        $cart->price = $total_amount ?? 0;

                        $cart->save();
                    }
                    
                    Toastr::success(trans('Product Added to your cart'), trans('common.Success'));
                    return redirect()->route('CheckOut')->with('back', route($detailUrl, $product->id));
                }
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * Add shop bundle to cart (separate from product addToCart — live-safe).
     */
    public function addToCartBundle(Request $request, $id)
    {
        try {
            $bundle = ShopBundle::with('products')->where('id', $id)->where('status', 1)->first();
            $detailRoute = route('shop.bundle.detail', $id);

            if (!Auth::check()) {
                Toastr::error('You must login', 'Error');
                session(['redirectTo' => route('shop.bundle.addToCart', ['id' => $id])]);
                return redirect()->route('login');
            }

            $user = Auth::user();

            if (in_array((int) $user->role_id, [1, 2], true)) {
                Toastr::error('Unable to add bundle in cart, please try with student login.', 'Failed');
                return redirect()->to($detailRoute);
            }

            if (!$bundle) {
                Toastr::error('Bundle not found', 'Failed');
                return redirect()->route('shop.index');
            }

            if ($bundle->products->isEmpty()) {
                Toastr::error('This bundle has no products.', 'Failed');
                return redirect()->to($detailRoute);
            }

            $stockError = $this->bundlePhysicalStockError($bundle);
            if ($stockError) {
                Toastr::error($stockError, 'Failed');
                return redirect()->to($detailRoute);
            }

            $exist = Cart::where('user_id', $user->id)->where('shop_bundle_id', $bundle->id)->first();
            if ($exist) {
                Toastr::error('Bundle already added in your cart', 'Failed');
                return redirect()->to($detailRoute);
            }

            $oldCart = Cart::where('user_id', $user->id)->first();
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->shop_bundle_id = $bundle->id;
            $cart->tracking = $oldCart ? $oldCart->tracking : getTrx();
            $cart->price = (float) ($bundle->total_amount ?? 0);
            $cart->save();

            Toastr::success('Bundle added to your cart', 'Success');
            return redirect()->to($detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * Buy now shop bundle — same cart write, then checkout.
     */
    public function buyNowBundle(Request $request, $id)
    {
        try {
            $bundle = ShopBundle::with('products')->where('id', $id)->where('status', 1)->first();
            $detailRoute = route('shop.bundle.detail', $id);

            if (!Auth::check()) {
                Toastr::error('You must login', 'Error');
                session(['redirectTo' => route('shop.bundle.buyNow', ['id' => $id])]);
                return redirect()->route('login');
            }

            $user = Auth::user();

            if (in_array((int) $user->role_id, [1, 2], true)) {
                Toastr::error('Unable to add bundle in cart, please try with student login.', 'Failed');
                return redirect()->to($detailRoute);
            }

            if (!$bundle) {
                Toastr::error('Bundle not found', 'Failed');
                return redirect()->route('shop.index');
            }

            if ($bundle->products->isEmpty()) {
                Toastr::error('This bundle has no products.', 'Failed');
                return redirect()->to($detailRoute);
            }

            $stockError = $this->bundlePhysicalStockError($bundle);
            if ($stockError) {
                Toastr::error($stockError, 'Failed');
                return redirect()->to($detailRoute);
            }

            $exist = Cart::where('user_id', $user->id)->where('shop_bundle_id', $bundle->id)->first();
            if ($exist) {
                Toastr::error('Bundle already added in your cart.', 'Failed');
                return redirect()->route('CheckOut');
            }

            $oldCart = Cart::where('user_id', $user->id)->first();
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->shop_bundle_id = $bundle->id;
            $cart->tracking = $oldCart ? $oldCart->tracking : getTrx();
            $cart->price = (float) ($bundle->total_amount ?? 0);
            $cart->save();

            Toastr::success('Bundle added to your cart', 'Success');
            return redirect()->route('CheckOut')->with('back', $detailRoute);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    /**
     * @return string|null Error message if a physical item in the bundle is out of stock.
     */
    private function bundlePhysicalStockError(ShopBundle $bundle): ?string
    {
        foreach ($bundle->products as $product) {
            if ($this->shopItemRequiresInventory($product) && (int) $product->total_inventory <= 0) {
                return 'A product in this bundle is out of stock (' . $product->title . ').';
            }
        }

        return null;
    }

    public function myOrders()
    {
        try {
            if(session()->has('previous_url')){
                session()->forget('previous_url');
            }
            return view(theme('pages.myOrders'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function myOrderDetail($id)
    {
        try {
            
            $orderDetail = ShopOrder::where('user_id', Auth::id())->where('id', $id)->with('product')->first();
            
            if($orderDetail){
                return view(theme('pages.myOrderDetails'), compact('orderDetail'));
            }

            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function myBundleOrderDetail($tracking, $bundleId)
    {
        try {
            $orderLines = ShopOrder::where('user_id', Auth::id())
                ->where('tracking', $tracking)
                ->where('shop_bundle_id', $bundleId)
                ->with(['product.files', 'shopBundle', 'checkout.billing.countryDetails', 'user'])
                ->orderBy('id')
                ->get();

            if ($orderLines->isEmpty()) {
                Toastr::error(trans('Order not found'), trans('common.Failed'));
                return redirect()->route('myOrders');
            }

            $firstOrder = $orderLines->first();
            $bundle = $firstOrder->shopBundle;
            $subtotal = $orderLines->sum(function ($line) {
                return (float) $line->purchase_price + (float) $line->discount_amount;
            });
            $discountTotal = $orderLines->sum('discount_amount');
            $grandTotal = $orderLines->sum('purchase_price');

            return view(theme('pages.myBundleOrderDetails'), compact(
                'orderLines',
                'firstOrder',
                'bundle',
                'subtotal',
                'discountTotal',
                'grandTotal'
            ));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function cancelOrder(Request $request, $id)
    {
        try {
            $order = ShopOrder::where('user_id', Auth::id())->where('id', $id)->first();
            
            if($order){
                if (!empty($order->shop_bundle_id)) {
                    Toastr::error(trans('Bundle items cannot be cancelled individually. Please cancel the full bundle.'), trans('common.Failed'));
                    return redirect()->back();
                }

                $order->status = 5; // 5:cancel status
                $order->save();
    
                Toastr::success(trans('Order Cancelled Successfully...'), trans('common.Success'));
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function cancelBundleOrder(Request $request, $tracking, $bundleId)
    {
        try {
            $orderLines = ShopOrder::where('user_id', Auth::id())
                ->where('tracking', $tracking)
                ->where('shop_bundle_id', $bundleId)
                ->get();

            if ($orderLines->isEmpty()) {
                Toastr::error(trans('Order not found'), trans('common.Failed'));
                return redirect()->route('myOrders');
            }

            $cancellable = $orderLines->where('status', '!=', 5);
            if ($cancellable->isEmpty()) {
                Toastr::error(trans('This bundle order is already cancelled.'), trans('common.Failed'));
                return redirect()->back();
            }

            ShopOrder::where('user_id', Auth::id())
                ->where('tracking', $tracking)
                ->where('shop_bundle_id', $bundleId)
                ->where('status', '!=', 5)
                ->update(['status' => 5]);

            Toastr::success(trans('Bundle order cancelled successfully.'), trans('common.Success'));
            return redirect()->route('myOrders');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function orderRefundRequest(Request $request, $id)
    {
        try {
            $order = ShopOrder::where('user_id', Auth::id())->where('id', $id)->first();
            
            if($order){
                if (!empty($order->shop_bundle_id)) {
                    Toastr::error(trans('Bundle items cannot be refunded individually. Please manage the full bundle order.'), trans('common.Failed'));
                    return redirect()->back();
                }

                $order->payment_status = 2;  // 0:unpaid, 1:paid, 2:refund request, 3: refund confirmed, 4:refund cancelled
                $order->save();
    
                Toastr::success(trans('Order refund request successfully send...'), trans('common.Success'));
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}