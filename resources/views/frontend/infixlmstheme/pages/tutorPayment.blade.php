@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | @lang('frontendmanage.Payment Method')
@endsection

@php
    $pakms = Config::get('apiaccess');
    $tutorSlug = \Illuminate\Support\Str::slug($tutor->name);
    $profileUrl = route('tutorDetails', ['id' => $tutor->id, 'name' => $tutorSlug]);

    $courseTitle = $course->title ?? '';
    if (is_array($courseTitle)) {
        $locale = app()->getLocale();
        $courseTitle = $courseTitle[$locale] ?? ($courseTitle['en'] ?? reset($courseTitle));
    }
    $courseTitle = is_string($courseTitle) ? $courseTitle : '';

    $billingAddress = Auth::user()->address ?? '';
    if (is_array($billingAddress)) {
        $billingAddress = implode(', ', array_filter($billingAddress));
    }
    $billingAddress = is_string($billingAddress) ? $billingAddress : '';

    $accessKeyValue = is_string($pakms ?? null) || is_numeric($pakms ?? null) ? (string) ($pakms ?? '') : '';
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .clover-footer {
        display: none;
    }

    .mxp-tutor-payment {
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

    .mxp-tutor-payment h1,
    .mxp-tutor-payment h2,
    .mxp-tutor-payment h3,
    .mxp-tutor-payment h4 {
        font-family: var(--serif);
        font-weight: 700;
        color: var(--teal-darkest);
    }

    .mxp-tutor-payment a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-tutor-payment a:hover {
        color: var(--terracotta);
    }

    .mxp-tutor-payment .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-payment .breadcrumb-inner {
        max-width: 1100px;
        margin: 0 auto;
    }

    .mxp-tutor-payment .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-tutor-payment .payment-page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 48px 32px 80px;
    }

    .mxp-tutor-payment .payment-layout {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 40px;
        align-items: start;
    }

    .mxp-tutor-payment .panel {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 14px;
        padding: 28px 26px;
        box-shadow: var(--shadow-md);
        margin-bottom: 24px;
    }

    .mxp-tutor-payment .panel-accent {
        border: 2px solid var(--terracotta);
        box-shadow: var(--shadow-lg);
    }

    .mxp-tutor-payment .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 18px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-tutor-payment .panel-header h4 {
        margin: 0;
        font-size: 20px;
    }

    .mxp-tutor-payment .panel-eyebrow {
        font-size: 11px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .mxp-tutor-payment .panel-title {
        font-size: clamp(24px, 3vw, 30px);
        margin-bottom: 20px;
    }

    .mxp-tutor-payment .billing-body p {
        margin: 0 0 6px;
        font-size: 15px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-payment .mxp-btn-edit {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 8px;
        border: 2px solid var(--teal-darkest);
        color: var(--teal-darkest) !important;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-tutor-payment .mxp-btn-edit:hover {
        background: var(--teal-darkest);
        color: var(--white) !important;
    }

    .mxp-tutor-payment .form-label {
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--teal-deep);
        margin-bottom: 8px;
    }

    .mxp-tutor-payment .mxp-field-input {
        display: block;
        width: 100%;
        box-sizing: border-box;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        font-size: 15px;
        font-family: var(--sans);
        color: var(--charcoal);
        line-height: 1.5 !important;
        min-height: 48px;
        height: auto !important;
        padding: 12px 14px !important;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .mxp-tutor-payment .mxp-field-input:focus {
        border-color: var(--teal-mid);
        box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.15);
        background: var(--white);
        outline: none;
    }

    .mxp-tutor-payment .mxp-field-input:disabled {
        opacity: 0.85;
        cursor: not-allowed;
    }

    .mxp-tutor-payment .field-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }

    .mxp-tutor-payment .field-full {
        grid-column: 1 / -1;
    }

    .mxp-tutor-payment .terms-box {
        margin-top: 20px;
        padding: 18px;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 10px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-tutor-payment .terms-box b {
        color: var(--charcoal);
    }

    .mxp-tutor-payment .terms-check {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 14px;
        font-size: 12px;
        font-weight: 600;
        color: var(--teal-darkest);
    }

    .mxp-tutor-payment .terms-check input {
        margin-top: 3px;
        accent-color: var(--teal-deep);
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .mxp-tutor-payment .pay-cta {
        display: block;
        width: 100%;
        max-width: 320px;
        margin: 28px auto 0;
        text-align: center;
        background: var(--terracotta);
        color: var(--white) !important;
        padding: 16px;
        border-radius: 8px;
        border: none;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .mxp-tutor-payment .pay-cta:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .mxp-tutor-payment .order-summary {
        position: sticky;
        top: 88px;
        background: var(--white);
        border: 2px solid var(--terracotta);
        border-radius: 14px;
        padding: 28px 24px;
        box-shadow: var(--shadow-lg);
    }

    .mxp-tutor-payment .tutor-head {
        text-align: center;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--gray-line);
    }

    .mxp-tutor-payment .tutor-head img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid var(--terracotta);
        margin-bottom: 14px;
    }

    .mxp-tutor-payment .tutor-head h3 {
        font-size: 22px;
        margin: 0;
    }

    .mxp-tutor-payment .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 16px;
    }

    .mxp-tutor-payment .summary-label {
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--terracotta);
    }

    .mxp-tutor-payment .summary-value {
        font-size: 15px;
        font-weight: 500;
        color: var(--charcoal);
        text-align: right;
        max-width: 60%;
    }

    .mxp-tutor-payment .slots-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
        font-size: 14px;
    }

    .mxp-tutor-payment .slots-table td {
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        color: var(--charcoal-soft);
    }

    .mxp-tutor-payment .slots-table td.price {
        text-align: right;
        font-weight: 600;
        color: var(--charcoal);
    }

    .mxp-tutor-payment .slots-table tr.total td {
        border-bottom: none;
        padding-top: 14px;
        font-family: var(--serif);
        font-size: 18px;
        font-weight: 700;
        color: var(--teal-darkest);
    }

    @media (max-width: 991px) {
        .mxp-tutor-payment .payment-layout {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .mxp-tutor-payment .order-summary {
            position: static;
            order: -1;
        }

        .mxp-tutor-payment .payment-page {
            padding: 32px 20px 64px;
        }

        .mxp-tutor-payment .field-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-tutor-payment" id="mainFormData">
        <input type="hidden" name="id" id="accesskey" value="{{ $accessKeyValue }}">

        <nav class="breadcrumb" aria-label="Breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">{{ __('common.Home') }}</a>
                <span>/</span>
                <a href="{{ route('tutoring') }}">Tutoring</a>
                <span>/</span>
                <a href="{{ $profileUrl }}">{{ $tutor->name }}</a>
                <span>/</span>
                @lang('payment.Payment')
            </div>
        </nav>

        <div class="payment-page">
            <div class="payment-layout">
                <div class="payment-main">
                    <div class="panel billing_details_wrapper">
                        <div class="panel-header">
                            <h4>{{ __('frontendmanage.Billing Address') }}</h4>
                            @if (isModuleActive('Invoice') && (isset($type) && ($type == 'invoice' || $type == 'certificate')))
                                <a class="billingUpdate mxp-btn-edit">{{ __('common.Edit') }}</a>
                                <a class="billingUpdateShow d-none mxp-btn-edit">{{ __('common.Show') }}</a>
                            @else
                                <a class="mxp-btn-edit" href="{{ route('CheckOut') }}?type=edit">{{ __('common.Edit') }}</a>
                            @endif
                        </div>
                        <div class="billing-body" id="deafult">
                            <p>{{ Auth::user()->name }}</p>
                            <p>{{ $billingAddress }}</p>
                        </div>
                    </div>

                    @if (isModuleActive('Invoice'))
                        @includeIf('invoice::billing')
                    @endif

                    <div class="panel panel-accent select_payment_method">
                        <p class="panel-eyebrow">Secure checkout</p>
                        <h2 class="panel-title">AuthorizeNet Payment</h2>

                        <form action="{{ route('tutorPaymentSubmit') }}" method="post" id="payment-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Illuminate\Support\Facades\Auth::user()->id ?? null }}">
                            <input type="hidden" name="payment_type" value="{{ $payment_type }}">
                            <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                            <div class="field card-number">
                                <input type="hidden" name="amount" value="{{ request()->amount * 100 }}">
                            </div>

                            <div class="field-grid">
                                <div>
                                    <label for="cardHolder" class="form-label">Cardholder Name</label>
                                    <input type="text" class="mxp-field-input" name="cardHolder" id="cardHolder" required>
                                    @error('cardHolder')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cardHolderLastname" class="form-label">Cardholder Last Name</label>
                                    <input type="text" class="mxp-field-input" name="cardHolderLastname" id="cardHolderLastname" required>
                                    @error('cardHolderLastname')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field-full">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" class="mxp-field-input" name="cardNumber" id="cardNumber"
                                        placeholder="____ ____ ____ ____" required>
                                    @error('cardNumber')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="mxp-field-input" name="expiryDate" id="expiryDate"
                                        placeholder="MM/YYYY" required>
                                    @error('expiryDate')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="mxp-field-input" name="cvv" id="cvv" required
                                        placeholder="_ _ _">
                                    @error('cvv')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label">Amount</label>
                                    <input type="text" disabled class="mxp-field-input" value="{{ request()->amount }}">
                                </div>
                            </div>

                            <div class="terms-box">
                                <p class="mb-2"><b>Terms & Conditions</b></p>
                                <small class="agree_checkbox_p">I <b>{{ auth()->user()->name }}</b> hereby authorize Merkaii
                                    Xcellence Prep to charge my Credit or Debit Card for payment of Education services
                                    rendered as described on <b>Date:
                                        {{ Carbon\Carbon::now()->format(Settings('active_date_format')) }}</b>.<br>
                                    I <b>{{ auth()->user()->name }}</b> agree, in all cases, to pay the Credit or Debit Card
                                    amount for the full payment of Education services rendered as described above.
                                </small>
                                <label class="terms-check">
                                    <input type="checkbox" name="accept" id="accept">
                                    <span>I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.</span>
                                </label>
                            </div>

                            <div id="card-response" role="alert"></div>
                            <button id="paybtn" class="pay-cta" type="submit">Pay now</button>
                        </form>
                    </div>
                </div>

                <aside class="order_wrapper order-summary">
                    <div class="tutor-head">
                        <img src="{{ getInstructorImage($tutor->image) }}" alt="{{ $tutor->name }}">
                        <h3>{{ $tutor->name }}</h3>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">Course</span>
                        <span class="summary-value">{{ $courseTitle }}</span>
                    </div>

                    @if ($payment_type == 'tutor_payment')
                        <div>
                            <span class="summary-label">Slots</span>
                            <table class="slots-table">
                                @forelse ($time_slots as $time)
                                    <tr>
                                        <td>{{ $time->start_time . '---' . $time->end_time }}</td>
                                        <td class="price">${{ $tutor->tutor_price }}.00</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No Slot Selected</td>
                                    </tr>
                                @endforelse
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="price">{{ getPriceFormat(request()->amount) }}</td>
                                </tr>
                            </table>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>

    @include(theme('partials._custom_footer'))
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cardNumber').mask('0000 0000 0000 0000');
            $('#expiryDate').mask('00/0000');
            $('#cvv').mask('000');

            $('#payment-form').submit(function(e) {
                e.preventDefault();

                var cardholderName = $('#cardHolder').val();
                var cardNumber = $('#cardNumber').val();
                var expirationDate = $('#expiryDate').val();
                var cvv = $('#cvv').val();

                if (cardholderName === '' || cardNumber === '' || expirationDate === '' || cvv === '') {
                    alert('All fields are required');
                    return false;
                }
                if (cardNumber.replace(/\s/g, '').length < 16 || cvv.length < 3) {
                    alert('Invalid card number or CVV');
                    $('#cardNumber').addClass('bordered-1 border-danger');
                    $('#cvv').addClass('bordered-1 border-danger');
                    return false;
                }

                if (!$('#accept').is(':checked')) {
                    toastr.error('Terms & Conditions must be accepted.', 'Error');
                    return false;
                }

                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();
                var currentMonth = currentDate.getMonth() + 1;
                var expiryParts = expirationDate.split('/');
                var expiryMonth = parseInt(expiryParts[0], 10);
                var expiryYear = parseInt(expiryParts[1], 10);

                if (expiryYear < currentYear || (expiryYear == currentYear && expiryMonth < currentMonth)) {
                    alert('Expiration date must be in the future');
                    $('#expiryDate').addClass('bordered-1 border-danger');
                } else if (expiryYear > currentYear + 50) {
                    alert('Expiration year must not be more than 50 years ahead');
                    $('#expiryDate').addClass('bordered-1 border-danger');
                } else {
                    document.querySelector('#payment-form').submit();
                }
            });
        });
    </script>
@endsection
