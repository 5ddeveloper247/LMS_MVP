@extends(theme('layouts.dashboard_master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Select slot') }}
@endsection
@section('css')
    <style>
        .mxp-hire-slot .card-box {
            background: #fff;
            border: 1px solid #e8dfd0;
            border-radius: 12px;
            padding: 24px;
            max-width: 720px;
        }
        .mxp-hire-slot .form-label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #0F6E56;
        }
        .mxp-hire-slot .mxp-field-input,
        .mxp-hire-slot .mxp-field-select {
            width: 100%;
            min-height: 48px;
            padding: 12px 14px;
            border: 1px solid #e8dfd0;
            border-radius: 8px;
            background: #F5EDE0;
            margin-bottom: 16px;
        }
        .mxp-hire-slot .mxp-slot-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            margin-bottom: 10px;
            background: #F5EDE0;
            border: 1px solid #e8dfd0;
            border-radius: 8px;
            cursor: pointer;
        }
        .mxp-hire-slot .slots-empty { color: #b42318; font-weight: 600; }
    </style>
@endsection

@section('mainContent')
<div class="mxp-hire-slot">
    <div class="main_content_iner main_content_padding">
        <div class="dashboard_lg_card">
            <div class="container-fluid no-gutters">
                <div class="section__title3 margin-50">
                    <h3>{{ __('Book with') }} {{ $tutor->name }}</h3>
                </div>

                <div class="card-box">
                    <p style="font-size:13px;color:#666;margin-bottom:18px;">
                        {{ $purchase->package_name }} ·
                        {{ __('Remaining') }}: {{ $purchase->remainingSessions() }}
                    </p>

                    <form action="{{ route('sessionPackage.hireAddSession', $purchase->id) }}" method="post" id="hire_slot_form">
                        @csrf
                        <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">

                        <label class="form-label" for="course_id">{{ __('Course') }}</label>
                        <select name="course_id" id="course_id" class="mxp-field-select" required>
                            <option value="">{{ __('Select Course') }}</option>
                            @forelse ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @empty
                                <option disabled>{{ __('No Course') }}</option>
                            @endforelse
                        </select>

                        <label class="form-label" for="date">{{ __('Select Date') }}</label>
                        <input type="date" name="date" id="date" class="mxp-field-input" required>

                        <label class="form-label">{{ __('Time Slot') }}</label>
                        <div id="time_slots">
                            <p>{{ __('Please select a date first') }}</p>
                        </div>

                        <button type="submit" id="form_button" class="theme_btn small_btn4" style="display:none;">
                            {{ __('Book session') }} →
                        </button>
                    </form>

                    <a href="{{ route('sessionPackage.hireFromPurchase', $purchase->id) }}" class="d-inline-block mt-3">
                        ← {{ __('Back to tutors') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#date').change(function(e) {
            e.preventDefault();
            $('#form_button').hide();
            $.ajax({
                type: 'POST',
                url: '{{ route('checkAvailableSlots') }}',
                data: {
                    date: $(this).val(),
                    tutor_id: {{ $tutor->id }},
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (!response.length) {
                        $('#time_slots').html(
                            '<p class="slots-empty">{{ __('Slots not available on selected date') }}</p>'
                        );
                        return;
                    }
                    var html = '';
                    $.each(response, function(key, value) {
                        if (value.start_time != null) {
                            html += '<label class="mxp-slot-option">' +
                                '<input type="radio" name="time_slot" value="' + value.id + '" required>' +
                                '<span>' + value.start_time + ' — ' + value.end_time + '</span>' +
                                '</label>';
                        }
                    });
                    $('#time_slots').html(html);
                    $('input[name="time_slot"]').on('change', function() {
                        $('#form_button').show();
                    });
                }
            });
        });
    });
</script>
@endsection
