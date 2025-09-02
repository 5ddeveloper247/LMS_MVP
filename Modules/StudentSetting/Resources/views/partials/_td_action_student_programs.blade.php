<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        @if (round($program->userTotalPercentage($query->user->id, $program->id)) < 100)
        <a href="{{route('program.programStudentNotify', [$program->id, $query->user->id])}}" data-id="{{$query->user->id}}"
            class="dropdown-item" type="button">Notify
        </a>

        @else
        @if($program_enroll && $program_enroll->certificate_access == 0)

        <a href="{{route('course.generateCertificate',[$query->id])}}" class="dropdown-item">
            Generate Certificate
        </a>
        @endif
        @endif
        @if($request->plan_id)
        <a href="{{route('program.studentProgramPlan',['program_id' => $program->id, 'student_id' => $query->user->id, 'plan_id' => $request->plan_id])}}"
            class="dropdown-item" type="button">Payment Plan
        </a>
        @else
        <a href="{{route('program.studentProgramPlan',['program_id' => $program->id, 'student_id' => $query->user->id])}}"
            class="dropdown-item" type="button">Payment Plan
        </a>
        @endif
    </div>
</div>
