@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center mt-50">

                <div class="col-lg-12">
                    <div class="main-title">
                        <h3 class="mb-20">{{__('student.Enrolled Courses')}}</h3>

                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="table-responsive">
                                <table id="lms_table" class="table Crm_table_active3 quiz_assign_table w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{__('common.ID')}}</th>
                                        <th scope="col" >Installment</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allplans as $index => $plan)
                                        <tr>
                                            <td scope="col">{{ $index+1 }}</td>
                                            <td scope="col">
                                                @if($plan->type == 0)
                                                    Initial
                                                @else
                                                    Installment {{$plan->type}}
                                                @endif
                                            </td>
                                            <td scope="col">{{ $plan->amount }}</td>
                                            <td scope="col">
                                                {{$plan->sdate}}
                                            </td>
                                            <td scope="col">{{ $plan->edate }}</td>
                                            <td>
                                                @if($plan->pay_status == 'paid')
                                                <a href="javascript:void(0)"
                                                    class="link_value theme_btn small_btn4">Paid</a>
                                                @else
                                                @if($plan->change_request == 0)
                                                <a href="javascript:void(0)"
                                                    class="link_value theme_btn small_btn4">Pending</a>
                                                    @else
                                                    <div class="dropdown CRM_dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Change Request
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenu2">
                                                            <a href="javascript:void(0)" data-id="{{$plan->id}}"
                                                            type="button"
                                                            class="dropdown-item show-modal">Accept / Reject</a>
                                                            
                                                            {{-- <a href="javascript:void(0)" data-id="{{$plan->id}}"
                                                            type="button"
                                                            class="dropdown-item rejectRequest">Reject</a> --}}
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade admin-query" id="changePlanModal">
        <div class="modal-dialog modal_1000px modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('program.acceptStudentProgramPlan')}}" method="POST">
                        @csrf
                        <input type="hidden" id="plandetailId" name="id" value="0">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ __('Amount') }}
                                        <strong class="text-danger">*</strong></label>
                                    <input class="primary_input_field" name="amount" placeholder="-" type="text"
                                        id="plandetailAmount" disabled>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">Reason</label>
                                    <textarea class="primary_input_field" placeholder="-"
                                        id="plandetailReason" disabled></textarea>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for="">{{ __('Start Date') }} <strong
                                            class="text-danger">*</strong> </label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input placeholder="Date"
                                                        class="primary_input_field primary-input date form-control"
                                                        id="sdate" {{ $errors->first('sdate') ? 'autofocus' : '' }}
                                                        type="text" name="sdate" value="{{ old('sdate') }}"
                                                        autocomplete="off" readonly>
                                                </div>
                                            </div>
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for="">{{ __('end Date') }} <strong
                                            class="text-danger">*</strong></label>
                                    <div class="primary_datepicker_input">
                                        <div class="no-gutters input-right-icon">
                                            <div class="col">
                                                <div class="">
                                                    <input placeholder="Date"
                                                        class="primary_input_field primary-input date form-control"
                                                        id="edate" {{ $errors->first('edate') ? 'autofocus' : '' }}
                                                        type="text" name="edate" value="{{ old('edate') }}"
                                                        autocomplete="off" readonly>
                                                </div>
                                            </div>
                                            <input type="reset" id="configreset1" value="Reset" hidden>
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pt_15 text-center">
                            <div class="d-flex justify-content-center">
                                <button class="primary-btn semi_large2 fix-gr-bg save_button_parent mx-2"
                                    id="saveplandetail"><i class="ti-check"></i> Accept
                                </button>
                                <button class="primary-btn semi_large2 fix-gr-bg save_button_parent mx-2 rejectRequest"
                                    type="button" id="saveplandetail"><i class="ti-close"></i> Reject
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="rejectPlanModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reject Change Request</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Do you really want to reject this request?</h3>
                    <div class="col-lg-12 text-center">
                        <form action="{{route('program.rejectStudentProgramPlan')}}" method="POST">
                        @csrf
                        <input type="hidden" id="rejectPlanId" name="id" value="0">
                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                <button type="submit"  class="primary-btn semi_large2 fix-gr-bg">Reject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let table = $('.quiz_assign_table').DataTable({
            bLengthChange: true,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "bDestroy": true,
            language: {
                emptyTable: "No data available in the table",
                search: "<i class='ti-search'></i>",
                searchPlaceholder: '{{ __("common.Quick Search") }}',
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
                    title: $("#logo_title").val(),
                    titleAttr: '{{ __("common.Copy") }}',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: 'Excel',
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
                    titleAttr: 'CSV',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="far fa-file-pdf"></i>',
                    title: $("#logo_title").val(),
                    titleAttr: 'PDF',
                    exportOptions: {
                        columns: ':visible',
                        columns: ':not(:last-child)',
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    margin: [0, 0, 0, 12],
                    alignment: 'center',
                    header: true,
                    customize: function (doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }

                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
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
            }, {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: 1},
            ],
            responsive: true,
        });

        $(document).on('click','.rejectRequest',function(){
            let id = $(this).attr('data-id');
            let url = $("#url").val();
            $('#rejectPlanId').val(id);
            $('.modal.show').modal('hide');
            $('#rejectPlanModal').modal('show');
        });

        $(document).on('click','.show-modal',function(){
            let id = $(this).attr('data-id');
            let url = $("#url").val();

            url = url + "/admin/program/get-student-plan/" + id;

            // let token = $('.csrf_token').val();

            $.ajax({
                type: "GET",

                url: url,

                data: {
                    // '_token': token,
                },

                success: function (response) {
                    if(response.status == 1){
                        $("#plandetailId").val(response.data.id);
                        $("#plandetailAmount").val(response.data.amount);
                        $("#plandetailReason").val(response.data.change_reason);
                        $("#sdate").val(response.data.sdate);
                        $("#edate").val(response.data.edate);
                        $('#changePlanModal').modal('show');
                        $('.rejectRequest').attr('data-id',response.data.id);
                    }
                },

                error: function (data) {
                    toastr.error("Something Went Wrong", "Error");
                },
            });

        });

        function editPlandetail(plandetail_id) {
            let url = $("#url").val();

            url = url + "/admin/program/get-student-plan/" + plandetail_id;

            // let token = $('.csrf_token').val();

            $.ajax({
                type: "GET",

                url: url,

                data: {
                    // '_token': token,
                },

                success: function (plandetail) {
                    $("#plandetailId").val(plandetail.id);
                    $("#plandetailAmount").val(plandetail.amount);
                    $("#preamount").val(plandetail.amount);
                    $("#sdate").val(plandetail.sdate);
                    $("#edate").val(plandetail.edate);
                },

                error: function (data) {
                    toastr.error("Something Went Wrong", "Error");
                },
            });
        }
    </script>
@endpush
