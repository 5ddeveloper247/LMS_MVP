@extends('backend.master')
@push('styles')
    {{--    <link rel="stylesheet" href="{{asset('public/backend/css/student_list.css')}}"/> --}}
@endpush

{{-- @section('table') --}}
{{--    @php --}}
{{--        $table_name='users'; --}}
{{--    @endphp --}}
{{--    {{$table_name}} --}}
{{-- @stop --}}
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#single_tutor_hired" role="tab" data-toggle="tab">
                            Single Tutor Hired
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#packages_hired" role="tab" data-toggle="tab">
                            Packages Hired
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content mt-4">
                {{-- Single Tutor Hired (existing list) --}}
                <div role="tabpanel" class="tab-pane fade show active" id="single_tutor_hired">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                        Single Tutor Hired {{ __('common.List') }}
                                    </h3>
                                </div>
                                @if (!isAdmin())
                                    <a href="{{ route('tutor.slots') }}" class="primary-btn fix-gr-bg">Set Hours</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <div class="">
                                        <table id="lms_table" class="Crm_table_active3 table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                        <th scope="col">{{ __('instructor.Instructor') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('student.Student') }}</th>
                                                    <th scope="col">{{ __('courses.Course') }}</th>
                                                    <th scope="col">{{ __('common.Date') }}</th>
                                                    <th scope="col">{{ __('common.Start') }} {{ __('common.Time') }}</th>
                                                    <th scope="col">{{ __('common.End') }} {{ __('common.Time') }}</th>
                                                    <th scope="col">{{ __('common.Price') }}</th>
                                                    <th scope="col">{{ __('Start Join') }}</th>
                                                    <th scope="col">{{ __('Cancel Request') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Packages Hired --}}
                <div role="tabpanel" class="tab-pane fade" id="packages_hired">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                        Packages Hired {{ __('common.List') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <div class="">
                                        <table id="packages_hired_table" class="Crm_table_active3 table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('student.Student') }}</th>
                                                    <th scope="col">{{ __('Package') }}</th>
                                                    <th scope="col">{{ __('Sessions') }}</th>
                                                    <th scope="col">{{ __('Remaining') }}</th>
                                                    <th scope="col">{{ __('common.Price') }}</th>
                                                    <th scope="col">{{ __('Purchased') }}</th>
                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
    @php
        $url = route('get.all.slots');
        $packagesUrl = route('get.all.package.purchases');
    @endphp

    <script>
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
                url: '{!! $url !!}',
                pages: 5
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                @if (\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    {
                        data: 'instructor',
                        name: 'instructor'
                    },
                @endif {
                    data: 'student',
                    name: 'student'
                },
                {
                    data: 'course',
                    name: 'course'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'start_time',
                    name: 'start_time'
                },
                {
                    data: 'end_time',
                    name: 'end_time'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'cancel_request',
                    name: 'cancel_request',
                    render: function(data, type, row) {
                        return data == 0 ? 'No Request' : '<span class="text-info"> Cancel request received</span>';
                    }
                }
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

        let packagesTable = $('#packages_hired_table').DataTable({
            bLengthChange: true,
            lengthChange: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            bDestroy: true,
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            ajax: $.fn.dataTable.pipeline({
                url: '{!! $packagesUrl !!}',
                pages: 5
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'student',
                    name: 'student'
                },
                {
                    data: 'package',
                    name: 'package'
                },
                {
                    data: 'sessions',
                    name: 'sessions'
                },
                {
                    data: 'remaining',
                    name: 'remaining'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'purchased_at',
                    name: 'purchased_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
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
                    titleAttr: '{{ __('common.Copy') }}',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: '{{ __('common.Excel') }}',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="far fa-file-alt"></i>',
                    titleAttr: '{{ __('common.CSV') }}',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: '{{ __('common.Print') }}',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    postfixButtons: ['colvisRestore']
                }
            ],
            responsive: true,
        });

        // Open Packages Hired tab when hash is present
        if (window.location.hash === '#packages_hired') {
            $('a[href="#packages_hired"]').tab('show');
        }
    </script>
@endpush
