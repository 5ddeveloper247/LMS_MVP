@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ __('Savings & Bundles') }} {{ __('common.List') }}
                            </h3>
                            <ul class="d-flex">
                                <li>
                                    <a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                        href="{{ route('bundle.create') }}">
                                        <i class="ti-plus"></i>{{ __('Add New') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <div class="">
                                <table id="lms_table5" class="Crm_table_active3 table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Short Description') }}</th>
                                            <th scope="col">{{ __('Price') }}</th>
                                            <th scope="col">{{ __('Total Amount') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
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

        <div class="modal fade admin-query" id="deleteBundle">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('bundle.delete') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('common.Delete') }} {{ __('Savings & Bundles') }}</h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" id="bundleDeleteId">
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>
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
        $get_all_bundle_url = route('bundle.getAll');
    @endphp
    <script>
        $(document).on("click", ".deleteBundle", function () {
            $("#bundleDeleteId").val($(this).data("id"));
            $("#deleteBundle").modal("show");
        });

        $(function () {
            function bindShopBundleStatusToggle() {
                $(document).off("change.shopBundleStatus");
                $(document).on(
                    "change.shopBundleStatus",
                    "#lms_table5 .bundle_status_enable_disable",
                    function (e) {
                        e.stopImmediatePropagation();
                        let el = $(this);
                        let status = el.is(":checked") ? '1' : '0';
                        let id = el.val();

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "{{ route('bundle.changeStatus') }}",
                            data: { id: id, status: status },
                            success: function (response) {
                                if (response.success) {
                                    toastr.success(response.success, "Success");
                                } else if (response.error) {
                                    toastr.error(response.error, "Error");
                                    el.prop("checked", status === '0');
                                }
                            },
                            error: function (xhr) {
                                let msg = (xhr.responseJSON && xhr.responseJSON.error)
                                    ? xhr.responseJSON.error
                                    : "Something went wrong!";
                                toastr.error(msg, "Failed");
                                el.prop("checked", status === '0');
                            }
                        });
                    }
                );
            }

            bindShopBundleStatusToggle();
            setTimeout(bindShopBundleStatusToggle, 800);
        });

        $('#lms_table5').DataTable({
            bLengthChange: true,
            lengthChange: true,
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            bDestroy: true,
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: $.fn.dataTable.pipeline({
                url: '{!! $get_all_bundle_url !!}',
                pages: 5
            }),
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'short_description', name: 'short_description', orderable: false },
                { data: 'price', name: 'price', orderable: false },
                { data: 'total_amount', name: 'total_amount', orderable: false },
                { data: 'status', name: 'status', orderable: false },
                { data: 'action', name: 'action', orderable: false },
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
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class="far fa-copy"></i>',
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    titleAttr: '{{ __('common.PDF') }}',
                    exportOptions: { columns: ':not(:last-child)' },
                    orientation: 'landscape',
                    pageSize: 'A4'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    exportOptions: { columns: ':not(:last-child)' }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            responsive: true
        });
    </script>
@endpush
