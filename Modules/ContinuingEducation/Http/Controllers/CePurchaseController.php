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
        $query = CePurchase::query()
            ->forLms()
            ->with(['user:id,name,email,role_id'])
            ->orderByDesc('purchased_at')
            ->orderByDesc('id');

        if ($request->filled('item_type') && in_array($request->item_type, ['course', 'bundle'], true)) {
            $query->where('item_type', $request->item_type);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
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
            ->addColumn('item_type_badge', function (CePurchase $purchase) {
                if ($purchase->isBundlePurchase()) {
                    return '<span class="badge badge-info">Bundle</span>';
                }

                return '<span class="badge badge-primary">Course</span>';
            })
            ->addColumn('item_name', function (CePurchase $purchase) {
                return e($purchase->item_name ?? 'N/A');
            })
            ->addColumn('amount', function (CePurchase $purchase) {
                $paid = '$' . number_format((float) $purchase->total_paid, 2);
                $discount = (float) $purchase->discount_amount;

                if ($discount > 0) {
                    $paid .= '<div class="text-muted small">Disc: $' . number_format($discount, 2) . '</div>';
                }

                return $paid;
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
            ->rawColumns(['buyer', 'item_type_badge', 'amount', 'payment_status_badge', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        try {
            $purchase = CePurchase::query()
                ->forLms()
                ->with([
                    'user:id,name,email,phone,image,role_id,status',
                    'ceCourse:id,title,slug,course_type,contact_hours',
                    'ceBundle:id,name,slug,license_type,total_hours,elective_hours_allowed',
                    'items.enrollment',
                    'items.ceCourse:id,title,slug',
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
