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
                        <h3 class="custom_small_heading mb-0">{{ __('Order Details') }}</h3>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">  
                            <div class="col-6">
                                <a href="{{route('shop.orders')}}" style="color:#2ca6a4;">
                                    <i class="fa fa-arrow-left"></i> Back to Orders
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                
                                @if ($orderDetail->status == 5 && $orderDetail->payment_status == 2)
                                    <a type="button" class="btn btn-rounded btn-danger" 
                                        onclick="changeOrderPaymentStatus({{ $orderDetail->id }}, 4);">Refund Cancel</a>
                                    <a type="button" class="btn btn-rounded btn-warning" 
                                        onclick="changeOrderPaymentStatus({{ $orderDetail->id }}, 3);">Refund Confirm</a>
                                @elseif(in_array($orderDetail->status, [1,2,3]))
                                    <a type="button" class="btn btn-rounded btn-danger" 
                                        onclick="changeOrderStatus({{$orderDetail->id}}, 5)">Cancel</a>
                                @endif

                                @if ($orderDetail->status == 1)

                                    <a type="button" class="btn btn-rounded btn-warning" 
                                        onclick="changeOrderStatus({{$orderDetail->id}}, 2)">Order Confirm</a>
                                
                                @elseif($orderDetail->status == 2)
                                
                                    <a type="button" class="btn btn-rounded btn-warning" 
                                        onclick="changeOrderStatus({{$orderDetail->id}}, 3)">Order Shipped</a>

                                @elseif($orderDetail->status == 3)
                            
                                    <a type="button" class="btn btn-rounded btn-warning" 
                                        onclick="changeOrderStatus({{$orderDetail->id}}, 4)">Order Delivered</a>
                                
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row mb-5">
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div> 
                                        <strong>{{ $orderDetail->checkout->billing->first_name ?? ''}} {{ $orderDetail->checkout->billing->last_name ?? ''}}</strong>
                                    </div>
                                    <div>{{ $orderDetail->checkout->billing->email ?? $orderDetail->user->email}}</div>
                                    <div>{{ $orderDetail->checkout->billing->phone ?? 'N/A'}}</div>
                                    <div>{{ $orderDetail->checkout->billing->address1 ?? 'N/A'}}</div>
                                    <div>{{ $orderDetail->checkout->billing->countryDetails->name ?? '' }}</div>
                                </div>
                                <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                    <div class="align-items-center">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Order #</strong></td>
                                                    <td class="text-right text-info text-bold"> Order#{{ $orderDetail->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Order status</strong></td>
                                                    <td class="text-right"><span class="badge badge-inline badge-info">{{$orderDetail->status_label}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Order date</strong></td>
                                                    <td class="text-right">{{ date('d M Y', strtotime($orderDetail->created_at)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Total amount</strong></td>
                                                    <td class="text-right">${{ number_format($orderDetail->purchase_price, 2)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment method</strong></td>
                                                    <td class="text-right">{{strtoupper($orderDetail->checkout->payment_method ?? 'N/A')}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-main text-bold"><strong>Payment status</strong></td>
                                                    <td class="text-right">{{strtoupper($orderDetail->payment_status_label ?? 'N/A')}}</td>
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
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Sub-Title</th>
                                            <th class="right">Price</th>
                                            <th class="center">Discount</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="left strong">{{ $orderDetail->product->title ?? 'N/A' }}</td>
                                            <td class="">
                                                <img class="round-product-img" style="height:50px; width:50px;"
                                                    src="{{isset($orderDetail->product->files[0]->file_path) ? url($orderDetail->product->files[0]->file_path) : url('public/assets/product-Placeholder.png')}}">
                                            </td>
                                            <td class="left">{{ $orderDetail->product->sub_title ?? 'N/A' }}</td>
                                            <td class="right">${{ number_format($orderDetail->purchase_price + $orderDetail->discount_amount, 2) }}</td>
                                            <td class="center">${{ number_format($orderDetail->discount_amount, 2) }}</td>
                                            <td class="right">${{ number_format($orderDetail->purchase_price - $orderDetail->discount_amount, 2)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"> </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Subtotal</strong></td>
                                                <td class="text-right">${{ number_format($orderDetail->purchase_price + $orderDetail->discount_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Discount:</strong></td>
                                                <td class="text-right">${{ number_format($orderDetail->discount_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong></td>
                                                <td class="text-right"><strong>${{ number_format($orderDetail->purchase_price, 2) }}</strong></td>
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
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('No') }}</button>
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
                                <h4 id="payment_status_msg"></h4>
                            </div>

                            <input type="hidden" name="id" value="" class="orderId">
                            <input type="hidden" name="payment_status" value="" id="paymentStatus">

                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('No') }}</button>
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
    @php
        $get_all_orders_url = route('order.getAll');
        $get_all_refund_request_url = route('order.getAllRefundReq');
    @endphp
    
    <script>

        function changeOrderStatus(id, status){
            
            $(".orderId").val(id);
            $("#orderStatus").val(status);
            $("#statusConfirmationModal").modal("show");
        }

        function changeOrderPaymentStatus(id, status){
            
            $(".orderId").val(id);
            $("#paymentStatus").val(status);

            if(status == 3){
               $("#payment_status_msg").text('Are you sure you want to confirm refund request?'); 
            }else if(status == 4){
                $("#payment_status_msg").text('Are you sure you want to cancel refund request?'); 
            }

            $("#paymentStatusConfirmationModal").modal("show");
        }
        
        // Orders Table
        let table = $('#lms_table').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $get_all_orders_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'order_number',
                    name: 'order_number'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'product_title',
                    name: 'product_title',
                    orderable: false
                },
                {
                    data: 'purchase_price',
                    name: 'purchase_price',
                    orderable: false
                },
                {
                    data: 'discount',
                    name: 'discount',
                    orderable: false
                },
                {
                    data: 'order_status',
                    name: 'order_status',
                    orderable: false
                },
                {
                    data: 'payment_status',
                    name: 'payment_status',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{!!  __("common.Quick Search") !!}',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });

        // Refund Request Table
        let table1 = $('#lms_table2').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            "ajax": $.fn.dataTable.pipeline({
                url: '{!! $get_all_refund_request_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'order_number',
                    name: 'order_number'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'product_title',
                    name: 'product_title',
                    orderable: false
                },
                {
                    data: 'purchase_price',
                    name: 'purchase_price',
                    orderable: false
                },
                {
                    data: 'discount',
                    name: 'discount',
                    orderable: false
                },
                {
                    data: 'order_status',
                    name: 'order_status',
                    orderable: false
                },
                {
                    data: 'payment_status',
                    name: 'payment_status',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },

            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __('common.Quick Search') }}',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    title: $("#logo_title").val(),
                    margin: [10, 10, 10, 0],
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    title: $("#logo_title").val(),
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            columnDefs: [{
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 1,
                    targets: 2
                },
                {
                    responsivePriority: 2,
                    targets: -2
                },
            ],
            responsive: true,
        });
    </script>

@endpush
