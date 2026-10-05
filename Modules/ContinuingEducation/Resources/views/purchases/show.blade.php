@extends('backend.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush

@section('mainContent')
    @php
        $formatHours = function ($hours) {
            return rtrim(rtrim(number_format((float) $hours, 1, '.', ''), '0'), '.');
        };
        $status = strtoupper((string) ($purchase->payment_status ?: 'N/A'));
        $paid = (float) $purchase->total_paid;
        $discount = (float) $purchase->discount_amount;
        $unit = (float) $purchase->unit_price;
        $subtotal = $unit > 0 ? $unit : ($paid + $discount);
    @endphp

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="section__title3 mb_40">
                        <h3 class="custom_small_heading mb-0">
                            {{ $purchase->isBundlePurchase() ? 'Bundle Purchase Details' : 'Course Purchase Details' }}
                        </h3>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-6">
                                <a href="{{ route('continuing-education.purchases.index') }}" style="color:#2ca6a4;">
                                    <i class="fa fa-arrow-left"></i> Back to Purchases
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                @if ($isCeBuyer && routeIsExist('continuing-education.students.show'))
                                    <a href="{{ route('continuing-education.students.show', $purchase->user_id) }}"
                                        class="btn btn-rounded btn-info">
                                        View CE Student
                                    </a>
                                @endif
                                @if (! empty($purchase->checkout_id) && routeIsExist('invoice'))
                                    <a href="{{ route('invoice', $purchase->checkout_id) }}"
                                        class="btn btn-rounded btn-warning">
                                        View Invoice
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div>
                                        <strong>{{ $purchase->user->name ?? 'N/A' }}</strong>
                                    </div>
                                    <div>{{ $purchase->user->email ?? 'N/A' }}</div>
                                    <div>{{ $purchase->user->phone ?? 'N/A' }}</div>
                                </div>

                                <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                    <div class="align-items-center">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>{{ $purchase->isBundlePurchase() ? 'Bundle' : 'Course' }}</strong></td>
                                                    <td class="text-right text-info text-bold">{{ $purchase->item_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Tracking</strong></td>
                                                    <td class="text-right">{{ $purchase->tracking ?: ('ce#' . $purchase->id) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Purchase date</strong></td>
                                                    <td class="text-right">
                                                        {{ $purchase->purchased_at ? $purchase->purchased_at->format('d M Y') : ($purchase->created_at ? $purchase->created_at->format('d M Y') : 'N/A') }}
                                                    </td>
                                                </tr>
                                                @if ($purchase->isBundlePurchase())
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>Courses</strong></td>
                                                        <td class="text-right">{{ $purchase->items->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>Hours</strong></td>
                                                        <td class="text-right">
                                                            {{ $formatHours($purchase->total_hours) }}h
                                                            @if ((float) $purchase->elective_hours_allowed > 0)
                                                                (elective {{ $formatHours($purchase->elective_hours_allowed) }}h)
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="text-main text-bold"><strong>Hours</strong></td>
                                                        <td class="text-right">{{ $formatHours($purchase->contact_hours) }}h</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Total amount</strong></td>
                                                    <td class="text-right">${{ number_format($paid, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment method</strong></td>
                                                    <td class="text-right">{{ strtoupper((string) ($purchase->payment_method ?: 'N/A')) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment status</strong></td>
                                                    <td class="text-right">{{ $status }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Course Name</th>
                                            <th>Role</th>
                                            <th>Hours</th>
                                            <th>Enrollment</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($purchase->isBundlePurchase())
                                            @forelse ($purchase->items as $index => $item)
                                                <tr>
                                                    <td class="center">{{ $index + 1 }}</td>
                                                    <td class="left strong">{{ $item->course_title }}</td>
                                                    <td class="left">{{ ucfirst($item->course_role) }}</td>
                                                    <td class="left">{{ $formatHours($item->contact_hours) }}h</td>
                                                    <td class="left">{{ ucfirst(str_replace('_', ' ', (string) ($item->enrollment->status ?? 'N/A'))) }}</td>
                                                    <td class="left">{{ (int) ($item->enrollment->progress ?? 0) }}%</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">No courses found for this bundle purchase.</td>
                                                </tr>
                                            @endforelse
                                        @else
                                            @php
                                                $course = $purchase->ceCourse;
                                                $enrollment = $purchase->enrollments->first();
                                            @endphp
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">{{ $course->title ?? $purchase->item_name }}</td>
                                                <td class="left">{{ ucfirst((string) ($course->course_type ?? 'course')) }}</td>
                                                <td class="left">{{ $formatHours($course->contact_hours ?? $purchase->contact_hours) }}h</td>
                                                <td class="left">{{ ucfirst(str_replace('_', ' ', (string) ($enrollment->status ?? 'N/A'))) }}</td>
                                                <td class="left">{{ (int) ($enrollment->progress ?? 0) }}%</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-5"></div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Subtotal</strong></td>
                                                <td class="text-right">${{ number_format($subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Discount:</strong></td>
                                                <td class="text-right">${{ number_format($discount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong></td>
                                                <td class="text-right"><strong>${{ number_format($paid, 2) }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
