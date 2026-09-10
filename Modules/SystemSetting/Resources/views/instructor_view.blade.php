@extends('backend.master')
@push('styles')
    <style>
        .form-control,
        .form-select {
            border-radius: 10px;
        }

        textarea {
            height: 120px !important;
        }
    </style>
@endpush
@php
    if ($user_data->role_id == 9) {
        $url = route('getTutorAllPackages', $user_data->id);
        $instructor = 'Individual Tutor';
    } else {
        $instructor = 'Instructor';
    }
    $personal = $instructors_personal_info ?? null;
    $experience = $instructors_teaching_experience ?? null;
    $resumePath = optional($experience)->upload_resume;
    $hasResume = !empty($resumePath);
@endphp
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h3 class="">
                            {{ $instructor }} |
                            {{ optional($personal)->first_name }}
                            {{ optional($personal)->last_name }}
                        </h3>
                    </div>

                    <div class="white_box_30px">
                        <div class="row mt_0_sm">
                            <div class="col-md-12">
                                <h2 class="hit my-3 text-center">
                                    {{ __('Become a Tutor Application') }}
                                </h2>
                            </div>

                            <div class="col-md-12">
                                <h2 class="my-3 text-center">{{ __('Personal Information') }}</h2>
                            </div>
                            <div class="col-md-4">
                                <label>{{ __('First Name') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->first_name }}">
                            </div>
                            <div class="col-md-4">
                                <label>{{ __('Last Name') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->last_name }}">
                            </div>
                            <div class="col-md-4">
                                <label>{{ __('Email') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->email ?: optional($user_data)->email }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>{{ __('Phone') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->phone ?: optional($user_data)->phone }}">
                            </div>
                            <div class="col-md-8 mt-2">
                                <label>{{ __('Location') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->address ?: optional($user_data)->address }}">
                            </div>

                            <div class="col-md-12">
                                <h2 class="my-3 text-center">{{ __('Teaching Profile') }}</h2>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>{{ __('Highest Nursing Credential') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->nursing_credential }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>{{ __('Years of Nursing Experience') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->years_experience }}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>{{ __('Taught before?') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($personal)->taught_before }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label>{{ __('Clinical Specialty Areas') }}</label>
                                <textarea readonly class="form-control">@php
                                    $specs = optional($personal)->specialties;
                                    if (is_string($specs) && $specs !== '') {
                                        $decoded = json_decode($specs, true);
                                        echo is_array($decoded) ? e(implode(', ', $decoded)) : e($specs);
                                    }
                                @endphp</textarea>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label>{{ __('Availability') }}</label>
                                <textarea readonly class="form-control">@php
                                    $avail = optional($personal)->availability;
                                    if (is_string($avail) && $avail !== '') {
                                        $decoded = json_decode($avail, true);
                                        echo is_array($decoded) ? e(implode(', ', $decoded)) : e($avail);
                                    }
                                @endphp</textarea>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label>{{ __('Why teach with MXP?') }}</label>
                                <textarea readonly class="form-control">{{ optional($user_data)->about }}</textarea>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h2 class="my-3 text-center">{{ __('Resume / CV') }}</h2>
                            </div>
                            <div class="col-md-6 d-flex flex-column mt-2">
                                <label>{{ __('Download Resume') }}</label>
                                @if ($hasResume)
                                    <a href="{{ route('instructor.resume.download', $user_data->id) }}"
                                        class="primary-btn fix-gr-bg">
                                        {{ __('Download Resume') }}
                                    </a>
                                    <small class="text-muted mt-2">{{ basename($resumePath) }}</small>
                                @else
                                    <span class="text-muted">{{ __('No resume uploaded') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 mt-2">
                                <label>{{ __('Status') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ (int) optional($user_data)->status === 1 ? __('Active') : __('Inactive') }}">
                            </div>
                        </div>
                    </div>
                </div>

                @if ($user_data->role_id == 9)
                    <div class="col-md-12 my-4">
                        <h2>Package(s) Bought By This Tutor</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <div class="">
                                    <table id="lms_table" class="classList table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col"> {{ __('common.SL') }}</th>
                                                <th scope="col">{{ __('Package Name') }}</th>
                                                <th scope="col">{{ __('Price') }}</th>
                                                <th scope="col">{{ __('Allowed Courses') }}</th>
                                                <th scope="col">{{ __('Buying Date') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#save_button").click(function() {
            $(this).attr('disabled');
            $(this).find('span').first().remove();
            $(this).find('span').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');
        });
    </script>

    @if ($user_data->role_id == 9)
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table = $('.classList').DataTable({
                bLengthChange: true,
                "lengthChange": true,
                "bDestroy": true,
                processing: true,
                serverSide: true,
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-seq_no', (data.seq_no));
                    $(row).attr('data-course_id', (data.id));
                },
                "lengthMenu": [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                "ajax": $.fn.dataTable.pipeline({
                    url: '{!! $url !!}',
                }),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    }, {
                        data: 'package_name',
                        name: 'package_name',
                        searchable: false
                    },
                    {
                        data: 'price',
                        name: 'price',
                        searchable: false
                    },
                    {
                        data: 'course_limit',
                        name: 'course_limit',
                        searchable: false
                    },
                    {
                        data: 'buying_date',
                        name: 'buying_date',
                        searchable: false
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
                        responsivePriority: 2,
                        targets: 2
                    },
                    {
                        responsivePriority: 2,
                        targets: -2
                    },
                    {
                        "orderable": false,
                        "targets": [0, -1]
                    }
                ],
                responsive: true,
            });
        </script>
    @endif
@endpush
