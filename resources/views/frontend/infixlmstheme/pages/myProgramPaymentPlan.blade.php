@extends(theme('layouts.dashboard_master'))
@section('title'){{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('My Program Payment Plan')}} @endsection
@section('css') @endsection
@section('js')
<script>
    $(document).on('click','.show-modal',function(){
        let id = $(this).attr('data-id');
        console.log(id);
        $('#requestChangeModal').modal('show');
        $('#planId').val(id);
        $('#requestReason').val('');
    });
</script>
@endsection

@section('mainContent')
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="row">
                    <div class="col-12">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__title3 mb_40">

                                        <h3 class="mb-0">{{ $program->programtitle . __(' Payment Plan') }}</h3>
                                        <h4></h4>
                                    </div>
                                </div>
                            </div>
                            @if(count($plans)==0)
                                <div class="col-12">
                                    <div class="section__title3 margin_50">
                                        <p class="text-center">{{__('No Plan Found')}}!</p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table custom_table3">
                                                <thead>
                                                <tr>
                                                    <th scope="col">{{__('common.SL')}}</th>
                                                    <th scope="col">{{__('Installments')}}</th>
                                                    <th scope="col">{{__('payment.Total Price')}}</th>
                                                    <th scope="col">{{__('Start Date')}}</th>
                                                    <th scope="col">{{__('End date')}}</th>
                                                    <th scope="col">{{__('payment.Invoice')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($plans))
                                                    @foreach ($plans as $plan)

                                                        <tr>
                                                            <td scope="row">{{$plan->type+1}}</td>

                                                            <td>
                                                                @if($plan->type == 0)
                                                                    Initial
                                                                @else
                                                                    Installment {{$plan->type}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $plan->amount }}
                                                            </td>

                                                            <td>
                                                                {{ $plan->sdate }}

                                                            </td>
                                                            <td>

                                                                {{ $plan->edate }}

                                                            </td>
                                                            <td>

                                                                @if($plan->pay_status == 'paid')
                                                                <a href="javascript:void(0)"
                                                                   class="link_value theme_btn small_btn4">Paid</a>
                                                                @else
                                                                    <div class="dropdown CRM_dropdown">
                                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                            {{__('common.Action')}}
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="dropdownMenu2">
                                                                            <a class="dropdown-item" 
                                                                                href="{{ route('my.payment.plan.installment',[$plan->id,'plan_id'=>$request->plan_id]) }}">
                                                                                Pay Now
                                                                            </a>
                                                                            @if($plan->change_request == 1)
                                                                            <a href="javascript:void(0)"
                                                                            type="button"
                                                                            class="dropdown-item bg-secondary text-white">Change Requested</a>
                                                                            @else
                                                                            <a href="javascript:void(0)" data-id="{{$plan->id}}"
                                                                            type="button"
                                                                            class="dropdown-item show-modal">Request Change</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                   {{-- @if($plan->sdate <= \Carbon\Carbon::now()->format('Y-m-d'))
                                                                        <a href="{{ route('my.payment.plan.installment',[$plan->id,'plan_id'=>$request->plan_id]) }}"
                                                                           class="link_value theme_btn small_btn4" >Pay Now</a>
                                                                   @else
                                                                       <a href="javascript:void(0)"
                                                                          class="link_value theme_btn small_btn4 disabled" >Pay Now</a>
                                                                   @endif --}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
{{--                                            <div class="mt-4">--}}
{{--                                                {{ $plans->links() }}--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade admin-query" id="requestChangeModal">
        <div class="modal-dialog modal_1000px modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Request Change</h4>
                    <button type="button" class="close " data-dismiss="modal">
                        <i class="ti-close "></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('myProgramPaymentPlan.requestChange')}}" method="POST">
                        @csrf
                        <input type="hidden" id="planId" name="id" value="0">
                        <div class="row">

                            <div class="col-xl-12">
                                <div class="primary_input h-auto mb-25">
                                    <label class="primary_input_label"
                                            for="">  Reason
                                    </label>
                                    <textarea class="form-control primary_input_field addTitle" id="requestReason" name="reason" placeholder="Specify your reason..."
                                            value="{{old('title')}}"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 text-center pt_15">
                            <div class="d-flex justify-content-center">
                                <button class="theme_btn small_btn4 fix-gr-bg" id="save_button_parent"
                                        type="submit"><i
                                        class="ti-check"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
