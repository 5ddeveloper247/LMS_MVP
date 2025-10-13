<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
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
            
            return view(theme('pages.shop'), compact('request', 'products'));
        
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

    public function addToCartShop(Request $request, $id)
    {
        try {
            
            $product = ShopProduct::where('id', $id)->first();

            if ($product->type == 1) {
                $detailUrl = 'shop.product.detail';
            } elseif ($product->type == 2) {
                $detailUrl = 'shop.book.detail';
            } else {
                $detailUrl = '';
            }

            // dd($product);
            if (!Auth::check()) {
                Toastr::error('You must login', 'Error');
                session(['redirectTo' => route('shop.addToCart', ['id' => $id])]);
                return \redirect()->route('login');
            }
           
            if (!$product) {
                Toastr::error('Product not found', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }
           
            $user = Auth::user();

            if (Auth::check() && ($user->role_id != 1)) {
            
                $exist = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
                $oldCart = Cart::where('user_id', $user->id)->when(isModuleActive('Appointment'), function ($query) {
                    $query->whereNotNull('product_id');
                })->first();


                if ($product->total_inventory <= 0) {

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

            if ($product->type == 1) {
                $detailUrl = 'shop.product.detail';
            } elseif ($product->type == 2) {
                $detailUrl = 'shop.book.detail';
            } else {
                $detailUrl = '';
            }
            
            //dd( $product);
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

            if (!$product) {
                Toastr::error('Product not found', 'Failed');
                return redirect()->to(route($detailUrl, $id));
            }

            $user = Auth::user();
            
            if (Auth::check() && ($user->role_id != 1)) {


                $exist = Cart::where('user_id', $user->id)->where('product_id', $id)->first();
                $oldCart = Cart::where('user_id', $user->id)->when(isModuleActive('Appointment'), function ($query) {
                    $query->whereNotNull('product_id');
                })->first();

                if ($product->total_inventory <= 0) {

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

    public function cancelOrder(Request $request, $id)
    {
        try {
            $order = ShopOrder::where('user_id', Auth::id())->where('id', $id)->first();
            
            if($order){
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

    public function orderRefundRequest(Request $request, $id)
    {
        try {
            $order = ShopOrder::where('user_id', Auth::id())->where('id', $id)->first();
            
            if($order){
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