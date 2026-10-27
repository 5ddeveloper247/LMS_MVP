@extends('backend.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="mb-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_area d-flex flex-wrap align-items-center justify-content-between">
                        <h3 class="mb-0">{{ __('Enrolled students') }} — {{ $offering->name }}</h3>
                        <a href="{{ route('certificationEnrollments.index') }}" class="primary-btn tr-bg">{{ __('common.Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="col-lg-12 mt-20">
                <div class="QA_section QA_section_heading_custom check_box_table">
                    <div class="QA_table">
                        <table id="lms_table" class="Crm_table_active3 table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('common.SL') }}</th>
                                    <th scope="col">{{ __('common.Image') }}</th>
                                    <th scope="col">{{ __('common.Name') }}</th>
                                    <th scope="col">{{ __('common.Email') }}</th>
                                    <th scope="col">{{ __('Option') }}</th>
                                    <th scope="col">{{ __('Class date') }}</th>
                                    <th scope="col">{{ __('Payment') }}</th>
                                    <th scope="col">{{ __('common.Enrolled') }}</th>
                                    <th scope="col">{{ __('common.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#lms_table').DataTable({
            bLengthChange: true,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            bDestroy: true,
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: $.fn.dataTable.pipeline({
                url: '{!! route('certificationEnrollments.offering.data', $offering->id) !!}',
                pages: 5
            }),
            columns: [
                { data: 'DT_RowIndex', name: 'id', orderable: true },
                { data: 'image', name: 'image', orderable: false },
                { data: 'student_name', name: 'student_name' },
                { data: 'email', name: 'email' },
                { data: 'option', name: 'option_title' },
                { data: 'class_date', name: 'class_date', orderable: false },
                { data: 'payment', name: 'payment_status', orderable: false },
                { data: 'enrolled_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false },
            ],
            language: {
                emptyTable: "{{ __('common.No data available in the table') }}",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __('common.Quick Search') }}',
            },
            dom: 'Blfrtip',
        });
    </script>
@endpush
