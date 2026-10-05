@extends('backend.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <div class="col-12">
                    <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#ce_purchase_courses" role="tab" data-toggle="tab">
                                {{ __('Course') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ce_purchase_bundles" role="tab" data-toggle="tab">
                                {{ __('Bundle') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content mt-4">
                <div role="tabpanel" class="tab-pane fade show active" id="ce_purchase_courses">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">Course Purchases</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <table id="lms_table" class="Crm_table_active3 table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('common.SL') }}</th>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Buyer</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Discount</th>
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

                <div role="tabpanel" class="tab-pane fade" id="ce_purchase_bundles">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">Bundle Purchases</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <table id="lms_table2" class="Crm_table_active3 table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('common.SL') }}</th>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Buyer</th>
                                                <th scope="col">Bundle</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Discount</th>
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
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function () {
            function purchaseTableOptions(itemType) {
                return {
                    bLengthChange: true,
                    lengthChange: true,
                    lengthMenu: [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    bDestroy: true,
                    processing: true,
                    serverSide: true,
                    order: [[0, 'desc']],
                    ajax: {
                        url: '{!! route('continuing-education.purchases.data') !!}',
                        data: function (d) {
                            d.item_type = itemType;
                            d.payment_status = 'paid';
                        }
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'id', orderable: true },
                        { data: 'tracking', name: 'tracking' },
                        { data: 'buyer', name: 'user.name', orderable: false },
                        { data: 'item_name', name: 'item_name' },
                        { data: 'purchase_amount', name: 'total_paid', orderable: false },
                        { data: 'discount', name: 'discount_amount', orderable: false },
                        { data: 'purchased_on', name: 'purchased_at' },
                        { data: 'payment_status_badge', name: 'payment_status', orderable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ],
                    language: {
                        emptyTable: "{{ __('common.No data available in the table') }}",
                        search: "<i class='ti-search'></i>",
                        searchPlaceholder: '{!! __("common.Quick Search") !!}',
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
                        exportOptions: { columns: ':not(:last-child)' }
                    }, {
                        extend: 'excelHtml5',
                        text: '<i class="far fa-file-excel"></i>',
                        title: $("#logo_title").val(),
                        exportOptions: { columns: ':not(:last-child)' }
                    }, {
                        extend: 'csvHtml5',
                        text: '<i class="far fa-file-alt"></i>',
                        title: $("#logo_title").val(),
                        exportOptions: { columns: ':not(:last-child)' }
                    }, {
                        extend: 'pdfHtml5',
                        text: '<i class="far fa-file-pdf"></i>',
                        title: $("#logo_title").val(),
                        exportOptions: { columns: ':not(:last-child)' }
                    }, {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        title: $("#logo_title").val(),
                        exportOptions: { columns: ':not(:last-child)' }
                    }, {
                        extend: 'colvis',
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ['colvisRestore']
                    }],
                    responsive: true
                };
            }

            var courseTable = $('#lms_table').DataTable(purchaseTableOptions('course'));
            var bundleTable = null;

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr('href');
                if (target === '#ce_purchase_bundles') {
                    if (!bundleTable) {
                        bundleTable = $('#lms_table2').DataTable(purchaseTableOptions('bundle'));
                    } else {
                        bundleTable.columns.adjust().responsive.recalc();
                    }
                } else if (target === '#ce_purchase_courses') {
                    courseTable.columns.adjust().responsive.recalc();
                }
            });
        })();
    </script>
@endpush
