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
        $orderDetail = ShopOrder::where('id', $id)->with('product')->first();

        return view('shop::order_detail', get_defined_vars());
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

            $order->status = $request->order_status;
            $order->save();

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

            $order->payment_status = $request->payment_status;
            $order->save();

            if($order->payment_status == 3){    // in case of order refund confirm then add amount in user balance.
                $this->addBalance($order->user_id, $order->purchase_price);
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
        
        $query = ShopOrder::query();
        $query->whereIn('payment_status', [0,1]);
        
        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('order_number', function ($query) {
                return 'order#'.$query->id;
            })
            ->editColumn('username', function ($query) {
                $firstname = $query->checkout->billing->first_name ?? '';
                $lastname = $query->checkout->billing->last_name ?? '';
                return $firstname . ' ' . $lastname;
            })
            ->addColumn('product_title', function ($query) {
                return $query->product->title ?? '';
            })
            ->addColumn('product_sub_title', function ($query) {
                return $query->product->sub_title ?? '';
            })
            ->addColumn('purchase_price', function ($query) {
                return '$' . number_format($query->purchase_price ?? 0, 2);
            })
            ->addColumn('discount', function ($query) {
                return '$' . number_format($query->discount_amount ?? 0, 2);
            })
            ->addColumn('order_status', function ($query) {
                return $query->status_label  ?? '';
            })
            ->addColumn('payment_status', function ($query) {
                return view('shop::partials._td_status_order', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_action_order', compact('query'));
            })
            ->rawColumns(['order_number', 'username', 'product_title', 'product_sub_title','order_amount','discount','order_status','payment_status','action'])->make(true);
    }

    public function getAllRefundRequestData(Request $request)
    {
        
        $query = ShopOrder::query();
        $query->whereIn('payment_status', [2,3,4]);
        
        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('order_number', function ($query) {
                return 'order#'.$query->id;
            })
            ->editColumn('username', function ($query) {
                $firstname = $query->checkout->billing->first_name ?? '';
                $lastname = $query->checkout->billing->last_name ?? '';
                return $firstname . ' ' . $lastname;
            })
            ->addColumn('product_title', function ($query) {
                return $query->product->title;
            })
            ->addColumn('product_sub_title', function ($query) {
                return $query->product->sub_title;
            })
            ->addColumn('purchase_price', function ($query) {
                return '$' . number_format($query->purchase_price, 2);
            })
            ->addColumn('discount', function ($query) {
                return '$' . number_format($query->discount_amount, 2);
            })
            ->addColumn('order_status', function ($query) {
                return $query->status_label;
            })
            ->addColumn('payment_status', function ($query) {
                return view('shop::partials._td_status_order', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_action_order', compact('query'));
            })
            ->rawColumns(['order_number', 'username', 'product_title', 'product_sub_title','order_amount','discount','order_status','payment_status','action'])->make(true);
    }
}
