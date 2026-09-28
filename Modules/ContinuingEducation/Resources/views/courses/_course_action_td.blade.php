<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuCe{{ $course->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuCe{{ $course->id }}">
        @if ($course->slug)
            <a target="_blank" href="{{ url('ce-courses/' . $course->slug) }}" class="dropdown-item">
                {{ trans('courses.Frontend View') }}
            </a>
        @endif

        @if ($course->course_id)
            <a href="{{ ceCourseDetailsLink($course->course_id, ['type' => 'courseDetails'], $tab ?? null) }}" class="dropdown-item">
                {{ __('common.Edit') }}
            </a>
            <a href="{{ ceCourseDetailsLink($course->course_id, [], $tab ?? null) }}" class="dropdown-item">
                {{ trans('common.View') }}
            </a>
            <a href="{{ ceCourseDetailsLink($course->course_id, [], $tab ?? null) }}" class="dropdown-item">
                {{ __('courses.Add Lesson') }}
            </a>
        @endif

        @if (permissionCheck('continuing-education.courses.index'))
            <a onclick="confirm_modal('{{ route('continuing-education.courses.destroy', ['id' => $course->id, 'tab' => $tab]) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @endif

        @if (permissionCheck('continuing-education.courses.index'))
            <a href="{{ route('continuing-education.courses.enrolled_students', $course->id) }}" class="dropdown-item edit_brand">
                {{ trans('student.Students') }}
            </a>
        @endif
    </div>
</div>
