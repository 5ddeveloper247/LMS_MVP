@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
    <style>
        .image-editor-preview-img-1 {
            width: 90px !important;
            height: 120px !important;
            object-fit: contain !important;
        }
    </style>
@endpush

@section('table')
    @php
        $table_name = 'shop_orders';
    @endphp
    {{ $table_name }}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="section__title3 mb_40">
                        <h3 class="custom_small_heading mb-0">{{ __('Bundle Order Details') }}</h3>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-6">
                                <a href="{{ route('shop.orders') }}" style="color:#2ca6a4;">
                                    <i class="fa fa-arrow-left"></i> Back to Orders
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                @if ($orderDetail->status == 5 && $orderDetail->payment_status == 2)
                                    <a type="button" class="btn btn-rounded btn-danger"
                                        onclick="changeOrderPaymentStatus({{ $orderDetail->id }}, 4);">Refund Cancel</a>
                                    <a type="button" class="btn btn-rounded btn-warning"
                                        onclick="changeOrderPaymentStatus({{ $orderDetail->id }}, 3);">Refund Confirm</a>
                                @elseif(in_array($orderDetail->status, [1, 2, 3, 4]))
                                    <a type="button" class="btn btn-rounded btn-danger"
                                        onclick="changeOrderStatus({{ $orderDetail->id }}, 5)">Cancel Bundle</a>
                                @endif

                                @if ($orderDetail->status == 1)
                                    <a type="button" class="btn btn-rounded btn-warning"
                                        onclick="changeOrderStatus({{ $orderDetail->id }}, 2)">Order Confirm</a>
                                @elseif($orderDetail->status == 2)
                                    <a type="button" class="btn btn-rounded btn-warning"
                                        onclick="changeOrderStatus({{ $orderDetail->id }}, 3)">Order Shipped</a>
                                @elseif($orderDetail->status == 3)
                                    <a type="button" class="btn btn-rounded btn-warning"
                                        onclick="changeOrderStatus({{ $orderDetail->id }}, 4)">Order Delivered</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div>
                                        <strong>{{ $orderDetail->checkout->billing->first_name ?? '' }} {{ $orderDetail->checkout->billing->last_name ?? '' }}</strong>
                                    </div>
                                    <div>{{ $orderDetail->checkout->billing->email ?? ($orderDetail->user->email ?? 'N/A') }}</div>
                                    <div>{{ $orderDetail->checkout->billing->phone ?? 'N/A' }}</div>
                                    <div>{{ $orderDetail->checkout->billing->address1 ?? 'N/A' }}</div>
                                    <div>{{ $orderDetail->checkout->billing->countryDetails->name ?? '' }}</div>
                                </div>
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                    <div class="align-items-center">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Bundle</strong></td>
                                                    <td class="text-right text-info text-bold">{{ $bundle->name ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Tracking</strong></td>
                                                    <td class="text-right">{{ $orderDetail->tracking }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Order status</strong></td>
                                                    <td class="text-right"><span class="badge badge-inline badge-info">{{ $orderDetail->status_label }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Order date</strong></td>
                                                    <td class="text-right">{{ date('d M Y', strtotime($orderDetail->created_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Items</strong></td>
                                                    <td class="text-right">{{ $orderLines->count() }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Total amount</strong></td>
                                                    <td class="text-right">${{ number_format($grandTotal, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment method</strong></td>
                                                    <td class="text-right">{{ strtoupper($orderDetail->checkout->payment_method ?? 'N/A') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment status</strong></td>
                                                    <td class="text-right">{{ strtoupper($orderDetail->payment_status_label ?? 'N/A') }}</td>
                                                </tr>
                                                @if ($orderDetail->payment_status == 4)
                                                    <tr>
                                                        <td class="text-main text-bold" colspan="2" style="max-width: 400px;">
                                                            <p class="text-danger">{{ $orderDetail->refund_cancel_reason ?? '' }}</p>
                                                        </td>
                                                    </tr>
                                                @endif
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
                                            <th>{{ __('Product Name') }}</th>
                                            <th>{{ __('Type') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Sub-Title') }}</th>
                                            <th class="right">{{ __('Price') }}</th>
                                            <th class="center">{{ __('Discount') }}</th>
                                            <th class="right">{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderLines as $index => $line)
                                            @php
                                                $product = $line->product;
                                                $imageSrc = isset($product->files[0]->file_path)
                                                    ? url($product->files[0]->file_path)
                                                    : url('public/assets/product-Placeholder.png');
                                            @endphp
                                            <tr>
                                                <td class="center">{{ $index + 1 }}</td>
                                                <td class="left strong">{{ $product->title ?? 'N/A' }}</td>
                                                <td class="left">{{ $product->type_label ?? 'N/A' }}</td>
                                                <td>
                                                    <img class="round-product-img" style="height:50px; width:50px;" src="{{ $imageSrc }}" alt="">
                                                </td>
                                                <td class="left">{{ $product->sub_title ?? 'N/A' }}</td>
                                                <td class="right">${{ number_format($line->purchase_price + $line->discount_amount, 2) }}</td>
                                                <td class="center">${{ number_format($line->discount_amount, 2) }}</td>
                                                <td class="right">${{ number_format($line->purchase_price, 2) }}</td>
                                            </tr>
                                        @endforeach
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
                                                <td class="text-right">${{ number_format($discountTotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong></td>
                                                <td class="text-right"><strong>${{ number_format($grandTotal, 2) }}</strong></td>
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

        <div class="modal fade admin-query" id="statusConfirmationModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('order.update_status') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Confirmation') }}</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h4>{{ __('Are you sure you want to change order status ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" class="orderId">
                            <input type="hidden" name="order_status" value="" id="orderStatus">
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal">{{ __('No') }}</button>
                                <button class="primary-btn fix-gr-bg" type="submit">{{ __('Yes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="paymentStatusConfirmationModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('order.update_payment_status') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Confirmation') }}</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h4>{{ __('Are you sure you want to change payment status ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" class="orderId">
                            <input type="hidden" name="payment_status" value="" id="paymentStatus">
                            <div id="refundCancelReasonWrap" class="mt-3" style="display:none;">
                                <label>{{ __('Cancel reason') }}</label>
                                <textarea name="refund_cancel_reason" class="form-control" maxlength="250"></textarea>
                            </div>
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal">{{ __('No') }}</button>
                                <button class="primary-btn fix-gr-bg" type="submit">{{ __('Yes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function changeOrderStatus(id, status) {
            $('#statusConfirmationModal .orderId').val(id);
            $('#orderStatus').val(status);
            $('#statusConfirmationModal').modal('show');
        }

        function changeOrderPaymentStatus(id, status) {
            $('#paymentStatusConfirmationModal .orderId').val(id);
            $('#paymentStatus').val(status);
            if (parseInt(status, 10) === 4) {
                $('#refundCancelReasonWrap').show();
            } else {
                $('#refundCancelReasonWrap').hide();
            }
            $('#paymentStatusConfirmationModal').modal('show');
        }
    </script>
@endpush
