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
        $table_name = 'shop_products';
    @endphp
    {{ $table_name }}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <div class="col-3">
                    <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#shop_products" role="tab"
                                data-toggle="tab">{{ __('Products') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#shop_books" role="tab" data-toggle="tab"
                                id="tutors">{{ __('Books') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-9 mt-3">
                    <div class="box_header common_table_header" style="float:right;">
                        <div class="main-title d-md-flex">
                            <ul class="d-flex">
                                <li>
                                    <a class="primary-btn radius_30px mr-10 fix-gr-bg "href="{{route('product.create')}}">
                                        <i class="ti-plus"></i>{{__('common.Add')}} {{__('Product')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                
            </div>
            <div class="row">
                
            </div>
            <div class="tab-content mt-4">
                <input type="hidden" name="selectTab" id="selectTab">
                {{-- Products Listing --}}
                <div role="tabpanel" class="tab-pane fade show active" id="shop_products">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Products') }}
                                        {{ __('common.List') }}
                                    </h3>

                                    <ul class="d-flex">
                                        <li>
                                            
                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" id="" 
                                                href="{{ route('product.create') }}">
                                                <i class="ti-plus"></i>{{__('Add New')}}
                                            </a>
                                            
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <!-- table-responsive -->

                                    <div class="">
                                        <table id="lms_table" class="Crm_table_active3 table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <!-- <th scope="col">{{ __('common.Image') }}</th> -->
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Sub Title') }}</th>
                                                    <th scope="col">{{ __('Price') }}</th>
                                                    <th scope="col">{{ __('Tax %') }}</th>
                                                    <th scope="col">{{ __('common.Status') }}</th>
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

                {{-- Books Listing --}}
                <div role="tabpanel" class="tab-pane fade" id="shop_books">
                    <div class="row justify-content-center">
                        
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex">
                                    <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Books') }}
                                        {{ __('common.List') }}
                                    </h3>
                                    <ul class="d-flex">
                                        <li>
                                            <a class="primary-btn radius_30px mr-10 fix-gr-bg" id="" 
                                                href="{{ route('product.create') }}">
                                                <i class="ti-plus"></i>{{__('Add New')}}
                                            </a>
                                        </li>
                                    </ul>
                            
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="QA_section QA_section_heading_custom check_box_table">
                                <div class="QA_table">
                                    <!-- table-responsive -->

                                    <div class="">
                                        <table id="lms_table2" class="Crm_table_active3 table">
                                            <thead>
                                            <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Sub Title') }}</th>
                                                    <th scope="col">{{ __('Price') }}</th>
                                                    <th scope="col">{{ __('Tax %') }}</th>
                                                    <th scope="col">{{ __('common.Status') }}</th>
                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <!-- <table id="lms_table2" class="Crm_table_active3 table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('common.SL') }}</th>
                                                    <th scope="col">{{ __('common.Image') }}</th>
                                                    <th scope="col">{{ __('common.Name') }}</th>
                                                    <th scope="col">{{ __('common.Email') }}</th>
                                                    @if (isModuleActive('OrgInstructorPolicy'))
                                                        <th scope="col">{{ __('policy.Group') }}
                                                            {{ __('policy.Policy') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('common.Status') }}</th>
                                                    <th scope="col">{{ __('common.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="modal fade admin-query" id="deleteProduct">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('product.delete') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('common.Delete') }} {{ __('Product') }} </h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>

                        <div class="modal-body">
                            <div class="text-center">

                                <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" id="productDeleteId">

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
        $get_all_product_url = route('product.getAll');
        $get_all_book_url = route('book.getAll');
        $individual_tutor_url = route('getAllIndividualTutorsData');
    @endphp
    
    <script>

        $(document).on("click", ".deleteProduct", function () {
            let id = $(this).data("id");
            $("#productDeleteId").val(id);
            $("#deleteProduct").modal("show");
        });
        
        // Products Table
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
                url: '{!! $get_all_product_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'sub_title',
                    name: 'sub_title'
                },
                {
                    data: 'price',
                    name: 'price',
                    orderable: false
                },
                {
                    data: 'tax_percent',
                    name: 'tax_percent',
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
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

        
        // Books Table
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
                url: '{!! $get_all_book_url !!}',
                pages: 5 // number of pages to cache
            }),
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'sub_title',
                    name: 'sub_title'
                },
                {
                    data: 'price',
                    name: 'price',
                    orderable: false
                },
                {
                    data: 'tax_percent',
                    name: 'tax_percent',
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
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
    
    <!-- <script src="{{ asset('public/backend/js/instructor_list.js') }}"></script> -->
@endpush
