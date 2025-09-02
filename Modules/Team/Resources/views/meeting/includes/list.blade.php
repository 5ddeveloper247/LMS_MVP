<div class="@if(isset($editdata)) col-lg-9 @else col-lg-12 @endif">
    <div class="main-title">
        <h3 class="mb-20">{{__('team.Class')}} {{__('team.List')}}</h3>
    </div>

    <div class="QA_section QA_section_heading_custom check_box_table">
        {{-- @dd($editdata->class->teamMeetings) --}}
        <div class="QA_table ">
            <div class="">
                <table id="lms_table" class="table Crm_table_active3">
                    <thead>
                        <tr>
                            <th>{{ __('common.SL') }}</th>
                            <th> {{ __('zoom.Topic') }}</th>
                            <th> {{ __('zoom.Date') }}</th>
                            <th> {{ __('Day') }}</th>
                            <th> {{ __('zoom.Time') }}</th>
                            <th> {{ __('zoom.Duration') }}</th>
                            <th> {{ __('zoom.Start Join') }}</th>
                            <th>{{ __('zoom.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($editdata->class->teamMeetings as $key => $meeting)
                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $meeting->topic }}</td>
                                            <td>{{ $meeting->date_of_meeting }}</td>
                                            <td>{{ date('D',strtotime($meeting->date_of_meeting)) }}</td>
                                            <td>{{ $meeting->time_of_meeting }}</td>
                                            <td>{{ MinuteFormat($meeting->meeting_duration) }}</td>
                                            <td>
                                                <?php
                                                $now = Carbon\Carbon::now()->setTimezone(Settings('active_time_zone'));
                                                $current_date = $now->toDateString();
                                                $current_time = $now->toTimeString();
                                                // dd($meeting, $class, $current_date, $current_time, $now->toDateTimeString());
                                                if($meeting->cancelled == 1){
                                                    $currentstat = 'cancelled';
                                                }
                                                else{
                                                    if(Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) < Carbon\Carbon::parse($meeting->start_time)){
                                                    $currentstat = 'waiting';
                                                    }elseif (Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) >= Carbon\Carbon::parse($meeting->start_time) && Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) <= Carbon\Carbon::parse($meeting->end_time)) {
                                                    $currentstat = 'started';
                                                    }elseif(Carbon\Carbon::now()->setTimezone(Settings('active_time_zone')) > Carbon\Carbon::parse($meeting->end_time)){
                                                    $currentstat = 'closed';
                                                    }
                                                }
                                                ?>

                                                @if ($currentstat == 'started')
                                                    <a class="primary-btn small fix-gr-bg small border-0 text-white"
                                                        href="{{ route('team.meeting.join', $meeting->meeting_id) }}"
                                                        target="_blank">
                                                        @if (Auth::user()->role_id == 1 || Auth::user()->id == $meeting->instructor_id)
                                                            {{ __('zoom.Start') }}
                                                        @else
                                                            {{ __('zoom.Join') }}
                                                        @endif
                                                    </a>
                                                @elseif($currentstat == 'waiting')
                                                    <a href="javascript:void(0)"
                                                        class="primary-btn small bg-info border-0 text-white">Waiting</a>
                                                @elseif($currentstat == 'cancelled')
                                                    <a href="javascript:void(0)"
                                                        class="primary-btn small bg-danger border-0 text-white">Cancelled</a>
                                                        @else
                                                    <a href="javascript:void(0)"
                                                        class="primary-btn small bg-warning border-0 text-white">Closed</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($currentstat == 'waiting')
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenu2">
                                                        {{--                                                    <a class="dropdown-item" --}}
                                                        {{--                                                       href="{{ route('zoom.meetings.show', $meeting->meeting_id) }}">{{__('zoom.View')}}</a> --}}
                                                        @if ($meeting->created_by == $user->id || $user->id == $class->course->user_id)
                                                            {{--                                                        <a class="dropdown-item" --}}
                                                            {{--                                                           href="{{ route('zoom.meetings.edit',$meeting->id )}}">{{__('zoom.Edit')}}</a> --}}

                                                            
                                                            <a class="dropdown-item"
                                                                href="{{ route('team.meetings.edit',$meeting->id) }}">{{ __('Edit') }}</a>
                                                            <a class="dropdown-item"
                                                                onclick="assignCancelId({{ $meeting->id }})"
                                                                href="javascript:void(0)">{{ __('Cancel') }}</a>
                                                        @endif

                                                    </div>
                                                </div>
                                                @endif

                                            </td>
                                        </tr>


                                        <div class="modal fade admin-query" id="d{{ $meeting->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{ __('zoom.Delete Class') }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-40">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">{{ __('Close') }}</button>
                                                            <form class=""
                                                                action="{{ route('zoom.meetings.destroy', $meeting->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="primary-btn fix-gr-bg"
                                                                    type="submit">{{ __('Cancel') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="modal fade admin-query" id="cancelMeetingModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{__('Cancel Class')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h4>{{__('Are you sure to cancel ?')}}</h4>
                                        </div>

                                        <div class="mt-40 d-flex justify-content-between">
                                            <button type="button" class="primary-btn tr-bg"
                                                    data-dismiss="modal">{{__('Close')}}</button>
                                            <form class="" action="{{ route('team.meetings.cancel') }}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden" id="cancelClassId" name="meeting_id">
                                                <button class="primary-btn fix-gr-bg"
                                                        type="submit">{{__('Cancel')}}</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
<script>
    function assignCancelId(id){
        $('#cancelClassId').val(id);
        $('#cancelMeetingModal').modal('show');
    }
</script>
