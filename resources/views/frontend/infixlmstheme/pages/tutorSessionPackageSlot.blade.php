@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Select slot') }} — {{ $tutor->name }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-pkg-slot {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --terracotta: #C65D3A;
        --cream: #F5EDE0;
        --cream-warm: #EFE3D0;
        --charcoal: #2B2B2B;
        --charcoal-soft: #4A4A4A;
        --white: #FFFFFF;
        --gray-line: #E8DFD0;
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Montserrat', system-ui, sans-serif;
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        min-height: 60vh;
    }

    .mxp-pkg-slot h1, .mxp-pkg-slot h2 {
        font-family: var(--serif);
        color: var(--teal-darkest);
        font-weight: 700;
    }

    .mxp-pkg-slot a { color: var(--teal-mid); text-decoration: none; }
    .mxp-pkg-slot a:hover { color: var(--terracotta); }

    .mxp-pkg-slot .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }
    .mxp-pkg-slot .breadcrumb-inner { max-width: 900px; margin: 0 auto; }
    .mxp-pkg-slot .breadcrumb span { margin: 0 8px; opacity: 0.5; }

    .mxp-pkg-slot .page {
        max-width: 900px;
        margin: 0 auto;
        padding: 36px 24px 80px;
    }

    .mxp-pkg-slot .card {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 14px;
        padding: 28px 32px;
    }

    .mxp-pkg-slot .eyebrow {
        font-size: 12px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--teal-deep);
        margin: 0 0 8px;
    }

    .mxp-pkg-slot h1 {
        font-size: 28px;
        margin: 0 0 8px;
    }

    .mxp-pkg-slot .sub {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0 0 24px;
    }

    .mxp-pkg-slot .field-group { margin-bottom: 20px; }

    .mxp-pkg-slot .form-label {
        display: block;
        font-size: 12px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--teal-deep);
        margin-bottom: 8px;
    }

    .mxp-pkg-slot .mxp-field-input,
    .mxp-pkg-slot .mxp-field-select {
        display: block;
        width: 100%;
        box-sizing: border-box;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        font-size: 15px;
        font-family: var(--sans);
        color: var(--charcoal);
        min-height: 52px;
        padding: 14px 16px;
    }

    .mxp-pkg-slot .mxp-slot-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        margin-bottom: 10px;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
    }

    .mxp-pkg-slot .slots-hint,
    .mxp-pkg-slot .slots-empty {
        font-size: 14px;
        color: var(--charcoal-soft);
    }
    .mxp-pkg-slot .slots-empty { color: #b42318; font-weight: 600; }

    .mxp-pkg-slot .booking-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-top: 8px;
        padding: 14px 24px;
        border-radius: 8px;
        border: none;
        background: var(--terracotta);
        color: var(--white);
        font-size: 14px;
        font-weight: 600;
        font-family: var(--sans);
        cursor: pointer;
    }

    .mxp-pkg-slot .back-link {
        display: inline-block;
        margin-top: 18px;
        font-size: 14px;
        font-weight: 600;
    }
</style>

@section('mainContent')
@php
    $selected = count($cart['sessions'] ?? []);
    $allowed = (int) $package->sessions_count;
@endphp
<div class="mxp-pkg-slot">
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <a href="{{ route('sessionPackage.bookTutors', $package->id) }}">{{ __('Book tutors') }}</a>
            <span>/</span>
            {{ $tutor->name }}
        </div>
    </div>

    <div class="page">
        <div class="card">
            <p class="eyebrow">{{ $package->name }} · {{ $selected }} / {{ $allowed }} {{ __('sessions') }}</p>
            <h1>{{ __('Book with') }} {{ $tutor->name }}</h1>
            <p class="sub">{{ __('Pick one course, date, and time slot for this package session.') }}</p>

            <form action="{{ route('sessionPackage.addSession', $package->id) }}" method="post" id="pkg_slot_form">
                @csrf
                <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">

                <div class="field-group">
                    <label for="course_id" class="form-label">{{ __('Course') }}</label>
                    <select name="course_id" id="course_id" class="mxp-field-select" required>
                        <option value="">{{ __('Select Course') }}</option>
                        @forelse ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @empty
                            <option disabled>{{ __('No Course') }}</option>
                        @endforelse
                    </select>
                </div>

                <div class="field-group">
                    <label for="date" class="form-label">{{ __('Select Date') }}</label>
                    <input type="date" name="date" id="date" class="mxp-field-input" required>
                </div>

                <div class="field-group">
                    <label class="form-label">{{ __('Time Slot') }}</label>
                    <div id="time_slots">
                        <p class="slots-hint">{{ __('Please select a date first') }}</p>
                    </div>
                </div>

                <button type="submit" id="form_button" class="booking-cta" style="display:none;">
                    {{ __('Add session to package') }} →
                </button>
            </form>

            <a class="back-link" href="{{ route('sessionPackage.bookTutors', $package->id) }}">
                ← {{ __('Back to tutor list') }}
            </a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#date').change(function(e) {
            e.preventDefault();
            var date = $(this).val();
            $('#form_button').hide();
            $.ajax({
                type: 'POST',
                url: '{{ route('checkAvailableSlots') }}',
                data: {
                    date: date,
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
