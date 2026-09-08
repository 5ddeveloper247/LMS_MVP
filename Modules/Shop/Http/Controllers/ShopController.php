<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Shop\Entities\ShopOrder;
use Modules\Shop\Entities\ShopProduct;
use Modules\Shop\Entities\ShopProductFile;
use App\Traits\ImageStore;
use Yajra\DataTables\Facades\DataTables;
use Modules\AuthorizeNetPayment\Http\Controllers\DoAuthorizeNetPaymentController;

use App\Jobs\SendGeneralEmail;
use App\User;
use App\DepositRecord;
use Modules\OfflinePayment\Entities\OfflinePayment;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('shop::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function viewOrderDetail($id)
    {
        $orderDetail = ShopOrder::where('id', $id)
            ->with(['product.files', 'shopBundle', 'checkout.billing.countryDetails', 'user'])
            ->first();

        if (empty($orderDetail)) {
            Toastr::error(trans('Order not found'), trans('common.Failed'));
            return redirect()->route('shop.orders');
        }

        // Bundle line items are viewed as one order (same as student portal)
        if (!empty($orderDetail->shop_bundle_id)) {
            return redirect()->route('order.view.bundle', [
                $orderDetail->tracking,
                $orderDetail->shop_bundle_id,
            ]);
        }

        return view('shop::order_detail', get_defined_vars());
    }

    public function viewBundleOrderDetail($tracking, $bundleId)
    {
        $orderLines = ShopOrder::where('tracking', $tracking)
            ->where('shop_bundle_id', $bundleId)
            ->with(['product.files', 'shopBundle', 'checkout.billing.countryDetails', 'user'])
            ->orderBy('id')
            ->get();

        if ($orderLines->isEmpty()) {
            Toastr::error(trans('Order not found'), trans('common.Failed'));
            return redirect()->route('shop.orders');
        }

        $orderDetail = $orderLines->first();
        $bundle = $orderDetail->shopBundle;
        $subtotal = $orderLines->sum(function ($line) {
            return (float) $line->purchase_price + (float) $line->discount_amount;
        });
        $discountTotal = $orderLines->sum('discount_amount');
        $grandTotal = $orderLines->sum('purchase_price');

        return view('shop::order_bundle_detail', compact(
            'orderLines',
            'orderDetail',
            'bundle',
            'subtotal',
            'discountTotal',
            'grandTotal'
        ));
    }
    
    public function changeOrderStatus(Request $request)
    {
        $rules = [
            'id' => 'required',
            'order_status' => 'required'
        ];

        $messages = [
            'id.required' => 'Order Id is required.',
            'order_status.required' => 'Status is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'   => $validator->errors()->first()
            ], 422);
        }

        try {

            $order = ShopOrder::where('id', $request->id)->first();
            
            if(empty($order)){
                Toastr::success('Record Not Found...', 'Error');
                return redirect()->back();
            }

            // Bundle purchases: update every line that shares tracking + shop_bundle_id
            if (!empty($order->shop_bundle_id)) {
                ShopOrder::where('tracking', $order->tracking)
                    ->where('shop_bundle_id', $order->shop_bundle_id)
                    ->update(['status' => $request->order_status]);
                $order->refresh();
            } else {
                $order->status = $request->order_status;
                $order->save();
            }

            $user = $order->user ?? '';
            // $user->email = 'hamzawaheed195@gmail.com';
            // dd($user);
            if(!empty($user) && !empty($order)){
                $title = !empty($order->shop_bundle_id)
                    ? ($order->shopBundle->name ?? 'Bundle')
                    : ($order->product->title ?? '');
                $amount = !empty($order->shop_bundle_id)
                    ? ShopOrder::where('tracking', $order->tracking)
                        ->where('shop_bundle_id', $order->shop_bundle_id)
                        ->sum('purchase_price')
                    : ($order->purchase_price ?? 0);

                $codes = [
                    'order_no' => 'order#'.$order->id,
                    'title' => $title,
                    'amount' =>  number_format($amount ?? 0, 2),
                    'currency' => '$',
                    'payment_status' => $order->payment_status_label ?? 'N/A',
                    'order_status' => $order->status_label ?? '',
                ];
                
                send_email($user,'Shop_Order',$codes);
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function changeOrderPaymentStatus(Request $request)
    {
        $rules = [
            'id' => 'required',
            'payment_status' => 'required'
        ];

        $messages = [
            'id.required' => 'Order Id is required.',
            'payment_status.required' => 'Status is required.',
        ];

        // Add validation for refund_cancel_reason when payment_status is 4 (refund cancel)
        if($request->payment_status == 4){
            $rules['refund_cancel_reason'] = 'required|string|max:250';
            $messages['refund_cancel_reason.required'] = 'Cancel reason is required.';
            $messages['refund_cancel_reason.max'] = 'Cancel reason must be less than 250 characters.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            Toastr::error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        try {

            $order = ShopOrder::where('id', $request->id)->first();
            
            if(empty($order)){
                Toastr::error('Record Not Found...', 'Error');
                return redirect()->back();
            }

            $orderRespnseDetail = json_decode($order->checkout->response);
            // dd($orderRespnseDetail);
            $trans_id = $orderRespnseDetail->source->id ?? '';
            $trans_amount = $orderRespnseDetail->amount ?? '';
            $trans_last4digits = $orderRespnseDetail->source->last4 ?? '';
            
            $order->payment_status = $request->payment_status;

            // Save refund cancel reason if payment_status is 4 (refund cancel)
            if($request->payment_status == 4 && $request->has('refund_cancel_reason')){
                $order->refund_cancel_reason = $request->refund_cancel_reason;
            } else {
                // Clear the reason if status is not refund cancel
                $order->refund_cancel_reason = null;
            }

            if($order->payment_status == 3){    // in case of order refund confirm then add amount in user balance.
                
                // $this->addBalance($order->user_id, $order->purchase_price);
                
                // code for refund payment functionality
                $authorize = new DoAuthorizeNetPaymentController();
                $response = $authorize->refundPayment($order, $trans_id, $trans_amount, $trans_last4digits);
                
                if($response['success'] == false){
                    Toastr::error($response['message'] ?? 'Unable to refund...', 'Error');
                    return redirect()->back();
                }
            }

            // if($order->payment_status == 4){ // in case of payment refund reject then payment status is paid and order status is placed
                
            //     $order->status = 1;             // placed
            //     $order->payment_status = 1;     // paid
            // }

            $order->save();

            // Bundle purchases: keep payment_status in sync on all lines
            if (!empty($order->shop_bundle_id)) {
                $bundleUpdate = [
                    'payment_status' => $order->payment_status,
                    'refund_cancel_reason' => $order->refund_cancel_reason,
                ];
                ShopOrder::where('tracking', $order->tracking)
                    ->where('shop_bundle_id', $order->shop_bundle_id)
                    ->where('id', '!=', $order->id)
                    ->update($bundleUpdate);
            }

            $user = $order->user ?? '';
            // $user->email = 'hamzawaheed195@gmail.com';
            if(!empty($user) && !empty($order)){
                $title = !empty($order->shop_bundle_id)
                    ? ($order->shopBundle->name ?? 'Bundle')
                    : ($order->product->title ?? '');
                $amount = !empty($order->shop_bundle_id)
                    ? ShopOrder::where('tracking', $order->tracking)
                        ->where('shop_bundle_id', $order->shop_bundle_id)
                        ->sum('purchase_price')
                    : ($order->purchase_price ?? 0);

                $codes = [
                    'order_no' => 'order#'.$order->id,
                    'title' => $title,
                    'amount' =>  number_format($amount ?? 0, 2),
                    'currency' => '$',
                    'payment_status' => $order->payment_status_label ?? 'N/A',
                    'order_status' => $order->status_label ?? '',
                ];
                send_email($user,'Shop_Order',$codes);
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function addBalance($user_id, $amount){
        
        $user = User::where('id', $user_id)->first();
        $tran = new OfflinePayment();
        $new = $user->balance + $amount;
        $tran->user_id = $user->id;
        $tran->role_id = $user->role_id;
        $tran->amount = $amount;
        $tran->status = 1;
        $tran->after_bal = $new;
        $tran->save();
        $user->balance = $new;
        $user->save();

        $depositRecord = new DepositRecord();
        $depositRecord->user_id = $user->id;
        $depositRecord->method = 'Offline Payment';
        $depositRecord->amount = $amount;
        $depositRecord->save();
        if ($user->role_id == 3) {
            $isStudent = true;
        } else {
            $isStudent = false;
        }

        if (UserEmailNotificationSetup('OffLine_Payment', $user)) {
            SendGeneralEmail::dispatch($user, $type = 'OffLine_Payment', $shortcodes = [
                'amount' => $amount,
                'currency' => Settings('currency_code'),
                'time' => now()->format(Settings('active_date_format') . ' H:i:s A'),
            ]);
        }
        if (UserBrowserNotificationSetup('OffLine_Payment', $user)) {

            send_browser_notification($user, 'OffLine_Payment', [
                'amount' => $amount,
                'currency' => Settings('currency_code'),
                'time' => now()->format(Settings('active_date_format') . ' H:i:s A'),
            ],
                '',//actionText
                ''//actionUrl
            );
        }

        if (UserMobileNotificationSetup('OffLine_Payment', $user) && !empty($user->device_token)) {
            send_mobile_notification($user, 'OffLine_Payment', [
                'amount' => $amount,
                'currency' => Settings('currency_code'),
                'time' => now()->format(Settings('active_date_format') . ' H:i:s A'),
            ]);
        }

        return true;
    }

    public function getAllOrdersData(Request $request)
    {
        return $this->makeOrdersDataTable([0, 1]);
    }

    public function getAllRefundRequestData(Request $request)
    {
        return $this->makeOrdersDataTable([2, 3, 4]);
    }

    /**
     * One DataTable row per standalone product order, or one row per bundle purchase
     * (grouped by tracking + shop_bundle_id), matching the student My Orders behaviour.
     */
    protected function makeOrdersDataTable(array $paymentStatuses)
    {
        $rows = $this->buildGroupedAdminOrderRows($paymentStatuses);

        return Datatables::of($rows)
            ->addIndexColumn()
            ->editColumn('order_number', function ($query) {
                if (!empty($query->is_bundle)) {
                    return 'bundle#' . ($query->id ?? '');
                }
                return 'order#' . ($query->id ?? '');
            })
            ->editColumn('username', function ($query) {
                $firstname = $query->checkout->billing->first_name ?? '';
                $lastname = $query->checkout->billing->last_name ?? '';
                return trim($firstname . ' ' . $lastname);
            })
            ->addColumn('product_title', function ($query) {
                if (!empty($query->is_bundle)) {
                    $name = $query->bundle_name ?? 'Bundle';
                    $count = (int) ($query->items_count ?? 0);
                    return e($name) . ' <span class="badge badge-info">Bundle · ' . $count . ' items</span>';
                }
                return $query->product->title ?? '';
            })
            ->addColumn('product_sub_title', function ($query) {
                if (!empty($query->is_bundle)) {
                    return '';
                }
                return $query->product->sub_title ?? '';
            })
            ->addColumn('purchase_price', function ($query) {
                return '$' . number_format($query->purchase_price ?? 0, 2);
            })
            ->addColumn('discount', function ($query) {
                return '$' . number_format($query->discount_amount ?? 0, 2);
            })
            ->addColumn('order_status', function ($query) {
                return $query->status_label ?? '';
            })
            ->addColumn('payment_status', function ($query) {
                return view('shop::partials._td_status_order', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_action_order', compact('query'));
            })
            ->rawColumns(['order_number', 'username', 'product_title', 'product_sub_title', 'order_amount', 'discount', 'order_status', 'payment_status', 'action'])
            ->make(true);
    }

    protected function buildGroupedAdminOrderRows(array $paymentStatuses)
    {
        $orders = ShopOrder::query()
            ->whereIn('payment_status', $paymentStatuses)
            ->with(['product', 'shopBundle', 'checkout.billing', 'user'])
            ->latest('id')
            ->get();

        $standalone = $orders->filter(function ($order) {
            return empty($order->shop_bundle_id);
        })->values();

        $bundleRows = $orders->filter(function ($order) {
            return !empty($order->shop_bundle_id);
        })->groupBy(function ($order) {
            return ($order->tracking ?? '') . '|' . $order->shop_bundle_id;
        })->map(function ($lines) {
            $first = $lines->sortBy('id')->first();
            $row = new \stdClass();
            $row->id = $first->id;
            $row->is_bundle = true;
            $row->tracking = $first->tracking;
            $row->shop_bundle_id = $first->shop_bundle_id;
            $row->user_id = $first->user_id;
            $row->purchase_price = $lines->sum('purchase_price');
            $row->discount_amount = $lines->sum('discount_amount');
            $row->status = $first->status;
            $row->payment_status = $first->payment_status;
            $row->status_label = $first->status_label;
            $row->payment_status_label = $first->payment_status_label;
            $row->checkout = $first->checkout;
            $row->user = $first->user;
            $row->product = $first->product;
            $row->shopBundle = $first->shopBundle;
            $row->bundle_name = $first->shopBundle->name ?? 'Bundle';
            $row->items_count = $lines->count();
            $row->created_at = $first->created_at;
            return $row;
        })->values();

        return $standalone->concat($bundleRows)
            ->sortByDesc(function ($row) {
                return $row->id ?? 0;
            })
            ->values();
    }
}
