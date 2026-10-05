<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Modules\ContinuingEducation\Entities\CePurchase;
use Yajra\DataTables\Facades\DataTables;

class CePurchaseController extends Controller
{
    public function index()
    {
        try {
            return view('continuingeducation::purchases.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function data(Request $request)
    {
        $itemType = $request->input('item_type', 'course');
        if (! in_array($itemType, ['course', 'bundle'], true)) {
            $itemType = 'course';
        }

        $query = CePurchase::query()
            ->forLms()
            ->with(['user:id,name,email,role_id', 'items:id,ce_purchase_id'])
            ->where('item_type', $itemType)
            ->orderByDesc('purchased_at')
            ->orderByDesc('id');

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        } else {
            $query->where('payment_status', 'paid');
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('tracking', function (CePurchase $purchase) {
                $tracking = trim((string) ($purchase->tracking ?? ''));

                return $tracking !== '' ? e($tracking) : 'ce#' . $purchase->id;
            })
            ->addColumn('buyer', function (CePurchase $purchase) {
                $name = e($purchase->user->name ?? 'N/A');
                $email = e($purchase->user->email ?? '');

                return '<div><strong>' . $name . '</strong><div class="text-muted small">' . $email . '</div></div>';
            })
            ->addColumn('item_name', function (CePurchase $purchase) {
                $name = e($purchase->item_name ?? 'N/A');

                if ($purchase->isBundlePurchase()) {
                    $count = $purchase->items->count();
                    $name .= ' <span class="badge badge-info">Bundle · ' . $count . ' courses</span>';
                }

                return $name;
            })
            ->addColumn('purchase_amount', function (CePurchase $purchase) {
                return '$' . number_format((float) $purchase->total_paid, 2);
            })
            ->addColumn('discount', function (CePurchase $purchase) {
                return '$' . number_format((float) $purchase->discount_amount, 2);
            })
            ->addColumn('purchased_on', function (CePurchase $purchase) {
                $date = $purchase->purchased_at ?? $purchase->created_at;

                return $date ? showDate($date) : '—';
            })
            ->addColumn('payment_status_badge', function (CePurchase $purchase) {
                $status = strtolower((string) $purchase->payment_status);
                $class = match ($status) {
                    'paid' => 'badge-success',
                    'pending' => 'badge-warning',
                    'failed', 'cancelled' => 'badge-danger',
                    'refunded' => 'badge-secondary',
                    default => 'badge-light',
                };

                return '<span class="badge ' . $class . '">' . e(ucfirst($status ?: 'N/A')) . '</span>';
            })
            ->addColumn('action', function (CePurchase $purchase) {
                return view('continuingeducation::purchases._td_action', compact('purchase'))->render();
            })
            ->rawColumns(['buyer', 'item_name', 'payment_status_badge', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        try {
            $purchase = CePurchase::query()
                ->forLms()
                ->with([
                    'user:id,name,email,phone,image,role_id,status',
                    'ceCourse:id,title,slug,course_type,contact_hours,thumbnail,image',
                    'ceBundle:id,name,slug,license_type,total_hours,elective_hours_allowed',
                    'items.enrollment',
                    'items.ceCourse:id,title,slug,course_type,contact_hours,thumbnail,image',
                    'enrollments.ceCourse:id,title,slug,course_type,contact_hours',
                ])
                ->findOrFail($id);

            $ceRoleId = (int) config('ceprofessional.role_id', 10);
            $isCeBuyer = (int) ($purchase->user->role_id ?? 0) === $ceRoleId;

            return view('continuingeducation::purchases.show', compact('purchase', 'isCeBuyer'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('continuing-education.purchases.index');
        }
    }
}
