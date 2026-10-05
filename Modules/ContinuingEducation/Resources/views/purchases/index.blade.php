@extends('backend.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex w-100 align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">CE Purchases</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mb-3">
                    <div class="white_box_30px">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="primary_input_label" for="filter_item_type">Type</label>
                                <select id="filter_item_type" class="primary_select">
                                    <option value="">All</option>
                                    <option value="course">Course</option>
                                    <option value="bundle">Bundle</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="primary_input_label" for="filter_payment_status">Payment Status</label>
                                <select id="filter_payment_status" class="primary_select">
                                    <option value="">All</option>
                                    <option value="paid" selected>Paid</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                    <option value="refunded">Refunded</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="button" id="ce_purchase_filter_btn" class="primary-btn fix-gr-bg">
                                    {{ __('common.Search') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">Tracking</th>
                                        <th scope="col">Buyer</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function () {
            if (typeof $.fn.niceSelect !== 'undefined') {
                $('#filter_item_type, #filter_payment_status').niceSelect();
            }

            var table = $('#lms_table').DataTable({
                bLengthChange: true,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All']
                ],
                bDestroy: true,
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: {
                    url: '{!! route('continuing-education.purchases.data') !!}',
                    data: function (d) {
                        d.item_type = $('#filter_item_type').val();
                        d.payment_status = $('#filter_payment_status').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'id', orderable: true },
                    { data: 'tracking', name: 'tracking' },
                    { data: 'buyer', name: 'user.name', orderable: false },
                    { data: 'item_type_badge', name: 'item_type', orderable: false },
                    { data: 'item_name', name: 'item_name' },
                    { data: 'amount', name: 'total_paid', orderable: false },
                    { data: 'purchased_on', name: 'purchased_at' },
                    { data: 'payment_status_badge', name: 'payment_status', orderable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    emptyTable: '{{ __('common.No data available in the table') }}',
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: '{{ __('common.Quick Search') }}',
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>"
                    }
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    title: $("#logo_title").val(),
                    exportOptions: { columns: ':visible:not(:last-child)' }
                }, {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    title: $("#logo_title").val(),
                    exportOptions: { columns: ':visible:not(:last-child)' }
                }, {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    title: $("#logo_title").val(),
                    exportOptions: { columns: ':visible:not(:last-child)' }
                }, {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    exportOptions: { columns: ':visible:not(:last-child)' }
                }, {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    title: $("#logo_title").val(),
                    exportOptions: { columns: ':visible:not(:last-child)' }
                }, {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }]
            });

            $('#ce_purchase_filter_btn').on('click', function () {
                table.ajax.reload();
            });
        })();
    </script>
@endpush
