@extends('backend.master')

@push('styles')
    <style>
        .ce-purchase-view .section-title {
            font-size: 18px;
            font-weight: 600;
            margin: 24px 0 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e9ecef;
        }

        .ce-purchase-view .summary-table td {
            padding: 6px 10px;
            vertical-align: top;
        }

        .ce-purchase-view .summary-table td:first-child {
            font-weight: 600;
            width: 180px;
        }
    </style>
@endpush

@section('mainContent')
    @php
        $formatHours = function ($hours) {
            return rtrim(rtrim(number_format((float) $hours, 1, '.', ''), '0'), '.');
        };
        $status = strtolower((string) $purchase->payment_status);
        $statusClass = match ($status) {
            'paid' => 'badge-success',
            'pending' => 'badge-warning',
            'failed', 'cancelled' => 'badge-danger',
            'refunded' => 'badge-secondary',
            default => 'badge-light',
        };
    @endphp

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area ce-purchase-view">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="box_header common_table_header mb-3">
                        <div class="main-title d-md-flex w-100 align-items-center">
                            <h3 class="mb-0">CE Purchase Details</h3>
                            <ul class="d-flex ml-auto mb-0">
                                <li>
                                    <a href="{{ route('continuing-education.purchases.index') }}" class="primary-btn fix-gr-bg mr-10">
                                        <i class="ti-arrow-left"></i> Back to Purchases
                                    </a>
                                </li>
                                @if ($isCeBuyer && routeIsExist('continuing-education.students.show'))
                                    <li>
                                        <a href="{{ route('continuing-education.students.show', $purchase->user_id) }}"
                                            class="primary-btn fix-gr-bg mr-10">
                                            View CE Student
                                        </a>
                                    </li>
                                @endif
                                @if (! empty($purchase->checkout_id) && routeIsExist('invoice'))
                                    <li>
                                        <a href="{{ route('invoice', $purchase->checkout_id) }}" class="primary-btn fix-gr-bg">
                                            View Invoice
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="white_box_30px mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="section-title mt-0">Buyer</h5>
                                <table class="summary-table">
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $purchase->user->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $purchase->user->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $purchase->user->phone ?? 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="section-title mt-0">Purchase Summary</h5>
                                <table class="summary-table">
                                    <tr>
                                        <td>Tracking</td>
                                        <td>{{ $purchase->tracking ?: ('ce#' . $purchase->id) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td>
                                            @if ($purchase->isBundlePurchase())
                                                <span class="badge badge-info">Bundle</span>
                                            @else
                                                <span class="badge badge-primary">Course</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item</td>
                                        <td>{{ $purchase->item_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>License</td>
                                        <td>{{ strtoupper(str_replace('_', ' ', (string) ($purchase->license_type ?? 'N/A'))) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Hours</td>
                                        <td>
                                            @if ($purchase->isBundlePurchase())
                                                Total {{ $formatHours($purchase->total_hours) }}h
                                                @if ((float) $purchase->elective_hours_allowed > 0)
                                                    · Elective allowed {{ $formatHours($purchase->elective_hours_allowed) }}h
                                                @endif
                                            @else
                                                {{ $formatHours($purchase->contact_hours) }}h
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unit Price</td>
                                        <td>${{ number_format((float) $purchase->unit_price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td>${{ number_format((float) $purchase->discount_amount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Paid</td>
                                        <td><strong>${{ number_format((float) $purchase->total_paid, 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Method</td>
                                        <td>{{ strtoupper((string) ($purchase->payment_method ?: 'N/A')) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td><span class="badge {{ $statusClass }}">{{ ucfirst($status ?: 'N/A') }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Purchased At</td>
                                        <td>
                                            {{ $purchase->purchased_at ? showDate($purchase->purchased_at) : ( $purchase->created_at ? showDate($purchase->created_at) : '—' ) }}
                                        </td>
                                    </tr>
                                    @if (! empty($purchase->gateway_transaction_id))
                                        <tr>
                                            <td>Gateway Txn</td>
                                            <td>{{ $purchase->gateway_transaction_id }}</td>
                                        </tr>
                                    @endif
                                    @if (! empty($purchase->coupon_code))
                                        <tr>
                                            <td>Coupon</td>
                                            <td>{{ $purchase->coupon_code }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($purchase->isBundlePurchase())
                        <div class="white_box_30px">
                            <h5 class="section-title mt-0">Courses in Bundle</h5>
                            @if ($purchase->items->isNotEmpty())
                                <div class="table-responsive">
                                    <table class="table Crm_table_active3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Role</th>
                                                <th>Hours</th>
                                                <th>Enrollment Status</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchase->items as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->course_title }}</td>
                                                    <td>
                                                        <span class="badge {{ $item->course_role === 'mandatory' ? 'badge-dark' : 'badge-info' }}">
                                                            {{ ucfirst($item->course_role) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $formatHours($item->contact_hours) }}h</td>
                                                    <td>{{ ucfirst(str_replace('_', ' ', (string) ($item->enrollment->status ?? 'N/A'))) }}</td>
                                                    <td>{{ (int) ($item->enrollment->progress ?? 0) }}%</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted mb-0">No course line items found for this bundle purchase.</p>
                            @endif
                        </div>
                    @else
                        <div class="white_box_30px">
                            <h5 class="section-title mt-0">Course Details</h5>
                            @php
                                $course = $purchase->ceCourse;
                                $enrollment = $purchase->enrollments->first();
                            @endphp
                            <table class="summary-table">
                                <tr>
                                    <td>Course</td>
                                    <td>{{ $course->title ?? $purchase->item_name }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ ucfirst((string) ($course->course_type ?? 'course')) }}</td>
                                </tr>
                                <tr>
                                    <td>Hours</td>
                                    <td>{{ $formatHours($course->contact_hours ?? $purchase->contact_hours) }}h</td>
                                </tr>
                                <tr>
                                    <td>Enrollment Status</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', (string) ($enrollment->status ?? 'N/A'))) }}</td>
                                </tr>
                                <tr>
                                    <td>Progress</td>
                                    <td>{{ (int) ($enrollment->progress ?? 0) }}%</td>
                                </tr>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
