@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $tutor->name }}
@endsection

@php
    $main_stars = $tutor->total_tutor_rating;
    $stars = intval($tutor->total_tutor_rating);
    $tutorSlug = \Illuminate\Support\Str::slug($tutor->name);
    $profileUrl = route('tutorDetails', ['id' => $tutor->id, 'name' => $tutorSlug]);
    $hourlyRate = $tutor->tutor_price;
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-tutor-booking {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --terracotta: #C65D3A;
        --terracotta-deep: #A84B2D;
        --cream: #F5EDE0;
        --cream-warm: #EFE3D0;
        --charcoal: #2B2B2B;
        --charcoal-soft: #4A4A4A;
        --white: #FFFFFF;
        --gray-line: #E8DFD0;
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Montserrat', system-ui, sans-serif;
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
        --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    .mxp-tutor-booking h1,
    .mxp-tutor-booking h2,
    .mxp-tutor-booking h3 {
        font-family: var(--serif);
        font-weight: 700;
        color: var(--teal-darkest);
    }

    .mxp-tutor-booking a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-tutor-booking a:hover {
        color: var(--terracotta);
    }

    .mxp-tutor-booking .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-booking .breadcrumb-inner {
        max-width: 1100px;
        margin: 0 auto;
    }

    .mxp-tutor-booking .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-tutor-booking .booking-page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 48px 32px 80px;
    }

    .mxp-tutor-booking .booking-layout {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 48px;
        align-items: start;
    }

    .mxp-tutor-booking .tutor-summary {
        background: var(--white);
        border-radius: 14px;
        border: 1px solid var(--gray-line);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        position: sticky;
        top: 88px;
    }

    .mxp-tutor-booking .tutor-photo {
        aspect-ratio: 3/4;
        background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mxp-tutor-booking .tutor-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .mxp-tutor-booking .tutor-summary-body {
        padding: 24px;
        text-align: center;
        border-top: 3px solid var(--terracotta);
    }

    .mxp-tutor-booking .tutor-summary-body h2 {
        font-size: 22px;
        margin-bottom: 6px;
    }

    .mxp-tutor-booking .tutor-rate {
        font-size: 15px;
        color: var(--charcoal-soft);
        margin-bottom: 16px;
    }

    .mxp-tutor-booking .tutor-rate strong {
        font-family: var(--serif);
        font-size: 28px;
        color: var(--teal-darkest);
    }

    .mxp-tutor-booking .rating-wrap {
        margin-bottom: 8px;
    }

    .mxp-tutor-booking .rating-wrap .rating-num {
        font-family: var(--serif);
        font-size: 20px;
        font-weight: 700;
        color: var(--teal-deep);
    }

    .mxp-tutor-booking .feedmak_stars {
        color: var(--terracotta);
        font-size: 14px;
        margin: 4px 0;
    }

    .mxp-tutor-booking .rating-label {
        font-size: 11px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-booking .back-profile {
        display: inline-block;
        margin-top: 16px;
        font-size: 13px;
        font-weight: 600;
    }

    .mxp-tutor-booking .booking-card {
        background: var(--white);
        border: 2px solid var(--terracotta);
        border-radius: 14px;
        padding: 36px 32px;
        box-shadow: var(--shadow-lg);
    }

    .mxp-tutor-booking .booking-card-title {
        font-size: clamp(26px, 3vw, 32px);
        margin-bottom: 8px;
    }

    .mxp-tutor-booking .booking-card-eyebrow {
        font-size: 11px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 12px;
    }

    .mxp-tutor-booking .booking-divider {
        height: 1px;
        background: var(--gray-line);
        margin: 28px 0;
    }

    .mxp-tutor-booking .form-label {
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--teal-deep);
        margin-bottom: 8px;
    }

    .mxp-tutor-booking .mxp-field-input,
    .mxp-tutor-booking .mxp-field-select {
        display: block;
        width: 100%;
        box-sizing: border-box;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        font-size: 15px;
        font-family: var(--sans);
        color: var(--charcoal);
        transition: border-color 0.2s, box-shadow 0.2s;
        line-height: 1.5 !important;
        min-height: 52px;
        height: auto !important;
        padding: 14px 16px !important;
        overflow: visible !important;
    }

    .mxp-tutor-booking .mxp-field-select {
        padding-right: 44px !important;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%230A4D3C' d='M1.41 0L6 4.58 10.59 0 12 1.41l-6 6-6-6z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 12px 8px;
    }

    .mxp-tutor-booking .mxp-field-input:focus,
    .mxp-tutor-booking .mxp-field-select:focus {
        border-color: var(--teal-mid);
        box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.15);
        background-color: var(--white);
        outline: none;
    }

    .mxp-tutor-booking .mxp-field-select option {
        padding: 10px 12px;
        line-height: 1.5;
        font-size: 15px;
    }

    .mxp-tutor-booking .field-group {
        margin-bottom: 22px;
    }

    .mxp-tutor-booking .slots-hint {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0;
    }

    .mxp-tutor-booking .slots-empty {
        color: #b42318;
        font-weight: 600;
        font-size: 14px;
    }

    .mxp-tutor-booking .mxp-slot-option {
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
        color: var(--charcoal);
        transition: border-color 0.2s, background 0.2s;
    }

    .mxp-tutor-booking .mxp-slot-option:hover {
        border-color: var(--teal-mid);
        background: var(--white);
    }

    .mxp-tutor-booking .mxp-slot-option input {
        accent-color: var(--teal-deep);
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .mxp-tutor-booking .total-row {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        padding: 16px 0 8px;
        border-top: 1px solid var(--gray-line);
        margin-top: 8px;
    }

    .mxp-tutor-booking .total-label {
        font-size: 14px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-booking .total-amount {
        font-family: var(--serif);
        font-size: 32px;
        font-weight: 700;
        color: var(--teal-darkest);
    }

    .mxp-tutor-booking .booking-cta {
        display: block;
        width: 100%;
        text-align: center;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 16px;
        border-radius: 8px;
        border: none;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.2s;
        margin-top: 20px;
        cursor: pointer;
    }

    .mxp-tutor-booking .booking-cta:hover:not(:disabled) {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .mxp-tutor-booking .booking-cta:disabled {
        opacity: 0.55;
        cursor: not-allowed;
    }

    .mxp-tutor-booking .admin-notice {
        display: block;
        text-align: center;
        background: #fef3cd;
        color: #856404;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 13px;
        margin-top: 12px;
    }

    .mxp-tutor-booking .policy-block {
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid var(--gray-line);
    }

    .mxp-tutor-booking .policy-block p {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin-bottom: 12px;
    }

    .mxp-tutor-booking .policy-block .policy-heading {
        font-family: var(--serif);
        font-style: italic;
        font-size: 17px;
        font-weight: 700;
        color: var(--teal-darkest);
        margin-top: 16px;
        line-height: 1.4;
    }

    @media (max-width: 991px) {
        .mxp-tutor-booking .booking-layout {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .mxp-tutor-booking .tutor-summary {
            position: static;
            max-width: 360px;
            margin: 0 auto;
        }

        .mxp-tutor-booking .booking-page {
            padding: 32px 20px 64px;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-tutor-booking">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('common.Home') }}</a>
                <span>/</span>
                <a href="{{ route('tutoring') }}">{{ __('Tutoring') }}</a>
                <span>/</span>
                <a href="{{ $profileUrl }}">{{ $tutor->name }}</a>
                <span>/</span>
                {{ __('Book a Session') }}
            </div>
        </nav>

        <div class="booking-page">
            <div class="booking-layout">
                <aside class="tutor-summary">
                    <div class="tutor-photo">
                        <img src="{{ asset($tutor->image) }}" alt="{{ $tutor->name }}">
                    </div>
                    <div class="tutor-summary-body">
                        <h2>{{ $tutor->name }}</h2>
                        <p class="tutor-rate">
                            <strong>${{ $hourlyRate }}</strong> | hr.
                        </p>
                        <div class="rating-wrap">
                            <div class="feedmak_stars">
                                <span class="rating-num">({{ $tutor->total_tutor_rating }})</span>
                                @for ($i = 0; $i < $stars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @if ($main_stars > $stars)
                                    <i class="fas fa-star-half"></i>
                                @endif
                                @if ($main_stars == 0)
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <span class="rating-label">Tutor Rating</span>
                        </div>
                        <a href="{{ $profileUrl }}" class="back-profile">&larr; {{ __('View full profile') }}</a>
                    </div>
                </aside>

                <div class="booking-card">
                    <p class="booking-card-eyebrow">{{ __('Schedule your session') }}</p>
                    <h1 class="booking-card-title">{{ __('Book with') }} {{ $tutor->name }}</h1>

                    <form action="{{ route('tutorPayment') }}" method="post" id="form_submit">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                        <input type="hidden" name="amount" value="0" id="total_amount">

                        <div class="field-group">
                            <label for="course_id" class="form-label">Courses</label>
                            <select name="course_id" id="course_id" class="mxp-field-select" required>
                                <option value="">Select Course</option>
                                @forelse ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @empty
                                    <option disabled>No Course</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="field-group">
                            <label for="date" class="form-label">Select Date</label>
                            <input type="date" name="date" id="date" class="mxp-field-input" required>
                        </div>

                        <div class="field-group">
                            <label for="time_slot" class="form-label">Time Slots</label>
                            <div class="row" id="time_slots">
                                <div class="col-12">
                                    <p class="slots-hint">Please Select Date First</p>
                                </div>
                            </div>
                            <div class="total-row">
                                <span class="total-label">Total ($)</span>
                                <span id="total_amount_text" class="total-amount">0</span>
                            </div>
                        </div>

                        @if (isAdmin())
                            <small class="admin-notice">Admin cannot place order</small>
                        @endif
                        <button type="submit" id="form_button" class="booking-cta" style="display: none;"
                            {{ isAdmin() ? 'disabled' : '' }}>Proceed To Pay</button>
                    </form>

                    <div class="policy-block">
                        <p>
                            All the different tutoring options taught by Nurse Jocelyn. Once purchased, please allow
                            24-72 business hours for the tutor to reach out to you.
                        </p>
                        <p>
                            You <b>must</b> reach out to your tutor to reschedule/cancel your appointment at least 24
                            hours prior to the scheduled session. If no notice is given, the full appointment fee will be
                            charged.
                        </p>
                        <p class="policy-heading">
                            TUTORING MUST BE SCHEDULED/USED WITHIN 60 DAYS OF PURCHASE OR YOU WILL NOT RECEIVE A REFUND.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include(theme('partials._custom_footer'))

    <script>
        var price_per_hour = {{ (int) $hourlyRate }};

        function changePrice(el) {
            var price = parseInt($('#total_amount').val(), 10) || 0;

            if (el.checked) {
                $('#total_amount').val(price + price_per_hour);
                $('#total_amount_text').text(price + price_per_hour);
            } else {
                $('#total_amount').val(price - price_per_hour);
                $('#total_amount_text').text(price - price_per_hour);
            }
            if (parseInt($('#total_amount').val(), 10) === 0) {
                $('#form_button').hide();
            } else {
                $('#form_button').show();
            }
        }

        $(document).ready(function() {
            $('#date').change(function(e) {
                e.preventDefault();
                var date = $(this).val();
                var url = '{{ route('checkAvailableSlots') }}';
                var tutor_id = {{ $tutor->id }};
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        date: date,
                        tutor_id: tutor_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#total_amount').val(0);
                        $('#total_amount_text').text('0');
                        $('#form_button').hide();

                        if (response.length === 0) {
                            $('#time_slots').html(
                                '<div class="col-12 slots-empty">Slots Not Available in Selected Date</div>'
                            );
                            return;
                        }

                        var html = '';
                        $.each(response, function(key, value) {
                            if (value.start_time != null) {
                                html += '<div class="col-md-6">' +
                                    '<label class="mxp-slot-option">' +
                                    '<input type="checkbox" name="time_slot[]" value="' + value.id +
                                    '" onclick="changePrice(this)">' +
                                    '<span>' + value.start_time + ' — ' + value.end_time + '</span>' +
                                    '</label></div>';
                            }
                        });
                        $('#time_slots').html(html);
                    }
                });
            });
        });
    </script>
@endsection
