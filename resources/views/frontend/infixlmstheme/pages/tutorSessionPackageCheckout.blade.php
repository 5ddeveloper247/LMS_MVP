@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Checkout') }} — {{ $package->name }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-pkg-checkout {
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
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        min-height: 60vh;
    }

    .mxp-pkg-checkout h1, .mxp-pkg-checkout h2, .mxp-pkg-checkout h3 {
        font-family: var(--serif);
        color: var(--teal-darkest);
        font-weight: 700;
    }

    .mxp-pkg-checkout a { color: var(--teal-mid); text-decoration: none; }
    .mxp-pkg-checkout a:hover { color: var(--terracotta); }

    .mxp-pkg-checkout .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }
    .mxp-pkg-checkout .breadcrumb-inner { max-width: 1100px; margin: 0 auto; }
    .mxp-pkg-checkout .breadcrumb span { margin: 0 8px; opacity: 0.5; }

    .mxp-pkg-checkout .page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 36px 24px 80px;
    }

    .mxp-pkg-checkout .layout {
        display: grid;
        grid-template-columns: 1.3fr 0.9fr;
        gap: 24px;
        align-items: start;
    }

    @media (max-width: 900px) {
        .mxp-pkg-checkout .layout { grid-template-columns: 1fr; }
    }

    .mxp-pkg-checkout .card {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 14px;
        padding: 28px 32px;
    }

    .mxp-pkg-checkout h1 {
        font-size: 28px;
        margin: 0 0 8px;
    }

    .mxp-pkg-checkout .sub {
        color: var(--charcoal-soft);
        font-size: 14px;
        margin: 0 0 20px;
    }

    .mxp-pkg-checkout .price {
        font-family: var(--serif);
        font-size: 36px;
        font-weight: 700;
        color: var(--teal-mid);
        margin: 0 0 6px;
    }

    .mxp-pkg-checkout .price-note {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0 0 20px;
    }

    .mxp-pkg-checkout .info {
        background: var(--cream);
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .mxp-pkg-checkout .info strong { color: var(--teal-darkest); }

    .mxp-pkg-checkout .session-item {
        padding: 10px 0;
        border-bottom: 1px solid var(--gray-line);
        font-size: 13px;
    }
    .mxp-pkg-checkout .session-item:last-child { border-bottom: none; }
    .mxp-pkg-checkout .session-item strong {
        display: block;
        color: var(--teal-darkest);
        margin-bottom: 2px;
    }

    .mxp-pkg-checkout .form-label {
        display: block;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--teal-deep);
        margin-bottom: 8px;
    }

    .mxp-pkg-checkout .mxp-field-input {
        display: block;
        width: 100%;
        box-sizing: border-box;
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        font-size: 15px;
        font-family: var(--sans);
        color: var(--charcoal);
        min-height: 48px;
        padding: 12px 14px;
    }

    .mxp-pkg-checkout .field-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 18px;
    }

    .mxp-pkg-checkout .field-full { grid-column: 1 / -1; }

    @media (max-width: 640px) {
        .mxp-pkg-checkout .field-grid { grid-template-columns: 1fr; }
        .mxp-pkg-checkout .field-full { grid-column: auto; }
    }

    .mxp-pkg-checkout .terms-box {
        background: var(--cream);
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 18px;
        font-size: 13px;
        color: var(--charcoal-soft);
        line-height: 1.6;
    }

    .mxp-pkg-checkout .terms-check {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        margin-top: 12px;
        font-weight: 600;
        color: var(--charcoal);
        cursor: pointer;
    }

    .mxp-pkg-checkout .pay-cta {
        display: inline-flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        padding: 14px 22px;
        border-radius: 8px;
        border: none;
        background: var(--terracotta);
        color: var(--white);
        font-size: 15px;
        font-weight: 600;
        font-family: var(--sans);
        cursor: pointer;
    }

    .mxp-pkg-checkout .pay-cta:hover { background: var(--terracotta-deep); }

    .mxp-pkg-checkout .mxp-back-link {
        display: inline-block;
        margin-top: 18px;
        padding: 10px 18px;
        border-radius: 8px;
        border: 2px solid var(--teal-darkest);
        color: var(--teal-darkest) !important;
        font-size: 13px;
        font-weight: 600;
        font-family: var(--sans);
        text-decoration: none !important;
        background: transparent;
        transition: all 0.2s;
    }

    .mxp-pkg-checkout .mxp-back-link:hover {
        background: var(--teal-darkest);
        color: var(--white) !important;
    }

    .mxp-pkg-checkout .mxp-field-input:focus {
        border-color: var(--teal-mid);
        box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.15);
        background: var(--white);
        outline: none;
    }
</style>

@section('mainContent')
@php
    $selected = count($cart['sessions'] ?? []);
    $allowed = (int) $package->sessions_count;
    $remaining = max(0, $allowed - $selected);
    $payAmount = number_format((float) $package->price, 2, '.', '');
@endphp
<div class="mxp-pkg-checkout">
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <a href="{{ route('sessionPackage.show', $package->id) }}">{{ $package->name }}</a>
            <span>/</span>
            {{ __('Checkout') }}
        </div>
    </div>

    <div class="page">
        <div class="layout">
            <div class="card">
                <p style="font-size:12px;letter-spacing:1.4px;text-transform:uppercase;font-weight:600;color:var(--teal-deep);margin:0 0 8px;">
                    {{ __('Secure checkout') }}
                </p>
                <h1>{{ __('AuthorizeNet Payment') }}</h1>
                <p class="sub">{{ __('You will be charged the full package price.') }}</p>

                <form action="{{ route('sessionPackage.paySubmit', $package->id) }}" method="post" id="package-payment-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="payment_type" value="tutor_session_package">
                    <input type="hidden" name="amount" value="{{ (int) round(((float) $package->price) * 100) }}">

                    <div class="field-grid">
                        <div>
                            <label for="cardHolder" class="form-label">{{ __('Cardholder Name') }}</label>
                            <input type="text" class="mxp-field-input" name="cardHolder" id="cardHolder" required>
                        </div>
                        <div>
                            <label for="cardHolderLastname" class="form-label">{{ __('Cardholder Last Name') }}</label>
                            <input type="text" class="mxp-field-input" name="cardHolderLastname" id="cardHolderLastname" required>
                        </div>
                        <div class="field-full">
                            <label for="cardNumber" class="form-label">{{ __('Card Number') }}</label>
                            <input type="text" class="mxp-field-input" name="cardNumber" id="cardNumber"
                                placeholder="____ ____ ____ ____" inputmode="numeric" autocomplete="cc-number"
                                maxlength="19" required>
                        </div>
                        <div>
                            <label for="expiryDate" class="form-label">{{ __('Expiry Date') }}</label>
                            <input type="text" class="mxp-field-input" name="expiryDate" id="expiryDate"
                                placeholder="MM/YYYY" inputmode="numeric" autocomplete="cc-exp"
                                maxlength="7" required>
                        </div>
                        <div>
                            <label for="cvv" class="form-label">{{ __('CVV') }}</label>
                            <input type="text" class="mxp-field-input" name="cvv" id="cvv"
                                placeholder="_ _ _" inputmode="numeric" autocomplete="cc-csc"
                                maxlength="4" required>
                        </div>
                        <div class="field-full">
                            <label class="form-label">{{ __('Amount') }}</label>
                            <input type="text" class="mxp-field-input" value="${{ $payAmount }}" disabled>
                        </div>
                    </div>

                    <div class="terms-box">
                        <p class="mb-2"><b>{{ __('Terms & Conditions') }}</b></p>
                        <small>
                            I <b>{{ auth()->user()->name }}</b> hereby authorize Merkaii Xcellence Prep to charge my
                            Credit or Debit Card for payment of Education services rendered as described on
                            <b>Date: {{ \Carbon\Carbon::now()->format(Settings('active_date_format') ?: 'm/d/Y') }}</b>.
                            I agree to pay the full package amount of <b>${{ $payAmount }}</b>.
                        </small>
                        <label class="terms-check">
                            <input type="checkbox" name="accept" id="accept" value="1" required>
                            <span>{{ __('I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.') }}</span>
                        </label>
                    </div>

                    <button id="paybtn" class="pay-cta" type="submit">
                        {{ __('Pay now') }} — ${{ $payAmount }}
                    </button>
                </form>

                <a href="{{ route('sessionPackage.bookTutors', $package->id) }}" class="mxp-back-link">
                    ← {{ __('Add / edit tutors') }}
                </a>
            </div>

            <aside class="card">
                <h2 style="font-size:22px;margin:0 0 8px;">{{ __('Order summary') }}</h2>
                <p class="sub" style="margin-bottom:12px;">{{ $package->name }}</p>

                <p class="price">${{ number_format((float) $package->price, 0) }}</p>
                <p class="price-note">
                    {{ __('Full package') }} · {{ $allowed }} {{ __('sessions') }}
                </p>

                <div class="info">
                    <strong>{{ __('Selected now') }}:</strong> {{ $selected }} / {{ $allowed }}<br>
                    <strong>{{ __('Remaining after purchase') }}:</strong> {{ $remaining }}
                </div>

                @if ($selected > 0)
                    <h3 style="font-size:16px;margin:0 0 8px;">{{ __('Sessions scheduled') }}</h3>
                    @foreach ($cart['sessions'] as $session)
                        <div class="session-item">
                            <strong>{{ $session['tutor_name'] }}</strong>
                            {{ $session['course_title'] }} · {{ $session['date'] }} ·
                            {{ $session['start_time'] }} — {{ $session['end_time'] }}
                        </div>
                    @endforeach
                @else
                    <p class="sub" style="margin:0;">
                        {{ __('No tutors selected yet. Remaining sessions can be booked later from My Tutors.') }}
                    </p>
                @endif
            </aside>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cardNumber').mask('0000 0000 0000 0000');
            $('#expiryDate').mask('00/0000');
            $('#cvv').mask('000');

            $('#package-payment-form').submit(function(e) {
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
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Terms & Conditions must be accepted.', 'Error');
                    } else {
                        alert('Terms & Conditions must be accepted.');
                    }
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
                    this.submit();
                }
            });
        });
    </script>
@endsection
