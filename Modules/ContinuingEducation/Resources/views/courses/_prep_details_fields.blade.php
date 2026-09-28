@php
    $audienceGroup = old('audience_group');
    if (!$audienceGroup && $ceCourse) {
        $storedAudience = $ceCourse->audience ?? [];
        $audienceGroup = (in_array('lpn', $storedAudience, true) || in_array('aprn', $storedAudience, true))
            ? 'lpn_aprn'
            : 'rn';
    }
    $audienceGroup = $audienceGroup ?: 'rn';
    $courseTypes = config('continuingeducation.course_types', []);
    $audienceGroups = config('continuingeducation.audience_groups', []);
@endphp

<input type="hidden" name="type" value="{{ config('continuingeducation.lms_course_type', 11) }}">

<div class="row">
    <div class="col-xl-6">
        <div class="primary_input">
            <div class="row">
                <div class="col-md-12">
                    <label class="primary_input_label">{{ __('courses.Type') }}</label>
                </div>
                @foreach ($courseTypes as $value => $label)
                    <div class="col-md-4 col-sm-4 mb-25">
                        <label class="primary_checkbox d-flex nowrap mr-12" for="ce_type_{{ $value }}">
                            <input type="radio" id="ce_type_{{ $value }}" name="course_type" value="{{ $value }}"
                                {{ old('course_type', $ceCourse->course_type ?? 'elective') === $value ? 'checked' : '' }}>
                            <span class="checkmark mr-2"></span>{{ $label }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="contact_hours">
                Contact Hours <strong class="text-danger">*</strong>
            </label>
            <input class="primary_input_field" type="number" step="0.1" min="0" max="999.9" name="contact_hours"
                id="contact_hours" placeholder="-"
                value="{{ old('contact_hours', $ceCourse->contact_hours ?? '') }}" required>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="primary_input mb-25">
            <label class="primary_input_label">{{ __('quiz.Category') }} <strong class="text-danger">*</strong></label>
            <div class="row">
                @foreach ($audienceGroups as $value => $label)
                    <div class="col-md-4 col-sm-6 mb-25">
                        <label class="primary_checkbox d-flex nowrap mr-12" for="ce_category_{{ $value }}">
                            <input type="radio" id="ce_category_{{ $value }}" name="audience_group"
                                value="{{ $value }}" {{ $audienceGroup === $value ? 'checked' : '' }}>
                            <span class="checkmark mr-2"></span>{{ $label }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
