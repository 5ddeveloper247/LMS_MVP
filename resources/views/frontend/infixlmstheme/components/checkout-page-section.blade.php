<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$clover = DB::table('clover_details')->first();
?>
<div class="mxp-checkout">
    <div class="mxp-page-header">
        <div class="mxp-page-header-inner">
            <h1>{{ __('Checkout') }}</h1>
        </div>
    </div>

    <div class="mxp-progress-bar">
        <div class="mxp-progress-inner">
            <div class="mxp-progress-step is-done">
                <div class="mxp-progress-dot">✓</div>
                <div class="mxp-progress-label">{{ __('Cart') }}</div>
            </div>
            <div class="mxp-progress-step is-active">
                <div class="mxp-progress-dot">2</div>
                <div class="mxp-progress-label">{{ __('Checkout') }}</div>
            </div>
            <div class="mxp-progress-step">
                <div class="mxp-progress-dot">3</div>
                <div class="mxp-progress-label">{{ __('Confirmation') }}</div>
            </div>
        </div>
    </div>

    <div class="mxp-checkout-section">
        <form action="{{ route('makePlaceOrder') }}" id="orderFrom" method="post" class="mb-0">
            @csrf
            <div class="checkout_wrapper" id="mainFormData">
                <input type="hidden" name="tracking_id" value="{{ $checkout->tracking }}">
                <input type="hidden" name="id" value="{{ $checkout->id }}">

                <div class="billing_details_wrapper">
                    <div class="mxp-form-card">
                        <h3 class="mxp-form-card-title">{{ __('frontend.Billing Details') }}</h3>
                        <p class="mxp-form-card-sub">{{ __('We’ll use this to process your order and send confirmation updates.') }}</p>

                        @if (count($bills) > 0)
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="remember_forgot_pass d-flex justify-content-between">
                                        <label class="primary_checkbox d-flex">
                                            <input type="radio" class="billing_address" checked="checked"
                                                name="billing_address" value="previous">
                                            <span class="checkmark mr_15"></span>
                                            <span class="label_name">{{ __('frontendmanage.Previous Billing Address') }}</span>
                                        </label>
                                    </div>
                                    <div class="remember_forgot_pass d-flex justify-content-between">
                                        <label class="primary_checkbox d-flex">
                                            <input type="radio" class="billing_address" name="billing_address" value="new">
                                            <span class="checkmark mr_15"></span>
                                            <span class="label_name">{{ __('frontendmanage.New Billing Address') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 w-100 prev_billings">
                                    <label class="primary_label2">{{ __('frontendmanage.Billing Address') }} <span>*</span></label>
                                    <select name="old_billing" class="wide mb_20 w-100 old_billing small_select mb-3">
                                        @if (isset($bills))
                                            @foreach ($bills as $bill)
                                                <option value="{{ $bill->id }}" data-id='@json($bill)'>
                                                    {{ $bill->first_name }} {{ $bill->last_name }}
                                                    => {{ $bill->address1 }},{{ $bill->city }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="billing_address" value="new">
                        @endif

                        <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
                            <h5 class="f_w_700 mb_30 billing_heading mt-3">
                                <span class="billing_heading_edit">{{ __('common.Edit') }}</span>
                                {{ __('frontend.Billing Details') }}
                            </h5>

                            <table class="table-bordered billing_info table"
                                style=" @if (count($bills) == 0) display: none @endif">
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="theme_btn small_btn2 float-right p-2"
                                            id="editPrevious">{{ __('common.Edit') }}</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('common.Name') }}</td>
                                    <td class="billing_name">{{ isset($bills[0]->first_name) ? $bills[0]->first_name : '' }}
                                        {{ isset($bills[0]->last_name) ? $bills[0]->last_name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('common.Email') }}</td>
                                    <td class="billing_email"> {{ isset($bills[0]->email) ? $bills[0]->email : '' }}</td>
                                </tr>
                                <tr class="d-none">
                                    <td>{{ __('common.Phone') }}</td>
                                    <td class="billing_phone">{{ isset($bills[0]->phone) ? $bills[0]->phone : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.Company Name') }}</td>
                                    <td class="billing_company">
                                        {{ isset($bills[0]->company_name) ? $bills[0]->company_name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.Country') }}</td>
                                    <td class="billing_country">
                                        {{ isset($bills[0]->country) ? $bills[0]->countryDetails->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('common.State') }}</td>
                                    <td class="billing_city">{{ isset($bills[0]->state) ? $bills[0]->stateDetails->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.City') }}</td>
                                    <td class="billing_city">{{ isset($bills[0]->city) ? $bills[0]->cityDetails->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.Zip Code') }}</td>
                                    <td class="billing_zip">{{ isset($bills[0]->zip_code) ? $bills[0]->zip_code : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.Street Address') }}</td>
                                    <td class="billing_address">{{ isset($bills[0]->address1) ? $bills[0]->address1 : '' }}
                                        {{ isset($bills[0]->address2) ? $bills[0]->address2 : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.Order Details') }}</td>
                                    <td class="billing_details">{{ isset($bills[0]->details) ? $bills[0]->details : '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mxp-form-card billing_form" style=" @if (count($bills) > 0) display: none @endif">
                        <h3 class="mxp-form-card-title">{{ __('Contact & Address') }}</h3>
                        <p class="mxp-form-card-sub">{{ __('Enter or update the billing details for this order.') }}</p>

                        <input type="hidden" name="previous_address_edit" value="0" id="previous_address_edit">
                        <div class="row">
                            <div class="col-lg-6">
                                @php
                                    $name = explode(' ', $profile->name);
                                @endphp
                                <label class="primary_label2">{{ __('frontend.First Name') }} <span>*</span></label>
                                <input id="first_name" name="first_name" placeholder="{{ __('frontend.Enter First Name') }}"
                                    class="primary_input3"
                                    value="{{ !empty($current) ? $current->first_name : $name[0] ?? '' }}" type="text"
                                    {{ $errors->first('first_name') ? 'autofocus' : '' }}>
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>

                            <div class="col-lg-6">
                                <label class="primary_label2">{{ __('frontend.Last Name') }} <span>*</span></label>
                                <input id="last_name" name="last_name" placeholder="{{ __('frontend.Enter Last Name') }}"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.Enter Last Name') }}'" class="primary_input3"
                                    value="@if (!empty($current)) {{ $current->last_name }}@else{{ $name[1] ?? '' }} @endif"
                                    type="text" {{ $errors->first('last_name') ? 'autofocus' : '' }}>
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>

                            <div class="col-lg-12 mt_20">
                                <label class="primary_label2">{{ __('frontend.Company Name') }} ({{ __('frontend.Optional') }}
                                    )</label>
                                <input id="company_name" name="company_name"
                                    placeholder="{{ __('frontend.Enter Company Name') }}" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.Enter Company Name') }}'"
                                    class="primary_input3" type="text"
                                    value="@if (!empty($current)) {{ $current->company_name }}@else{{ old('company_name') }} @endif">
                            </div>

                            <div class="col-lg-12 mt_20">
                                <label class="primary_label2">{{ __('frontend.Country') }} <span>*</span> </label>
                                <select id="country" name="country" class="select2 wide w-100 mb-3"
                                    {{ $errors->first('country') ? 'autofocus' : '' }}>
                                    <option data-display=" {{ __('common.Select') }} {{ __('frontend.Country') }}"
                                        value="">{{ __('common.Select') }} {{ __('frontend.Country') }}
                                    </option>
                                    @if (isset($countries))
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if (!empty($current)) {{ $current->country == $country->id ? 'selected' : '' }}@else{{ $profile->country == $country->id ? 'selected' : '' }} @endif>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            </div>

                            <div class="col-lg-12 mt_20">
                                <label class="primary_label2"> {{ __('common.State') }} </label>
                                <select class="select2 wide stateList" name="state" id="state">
                                    <option data-display=" {{ __('common.Select') }} {{ __('common.State') }}"
                                        value="">{{ __('common.Select') }} {{ __('common.State') }}
                                    </option>
                                    @foreach ($states as $state)
                                        <option value="{{ @$state->id }}" @if (@$user->state == $state->id) selected @endif>
                                            {{ @$state->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            </div>
                            <div class="col-lg-12 mt_20">
                                <label class="primary_label2">{{ __('frontend.City / Town') }} </label>
                                <select class="select2 wide cityList" name="city" id="city">
                                    <option data-display=" {{ __('common.Select') }} {{ __('common.City') }}"
                                        value="">{{ __('common.Select') }} {{ __('common.City') }}
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ @$city->id }}" @if (@$user->city == $city->id) selected @endif>
                                            {{ @$city->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            </div>

                            <div class="col-lg-12 mt_20">
                                <label class="primary_label2">{{ __('frontend.Street Address') }} <span>*</span></label>
                                <input id="address1" name="address1"
                                    placeholder="{{ __('frontend.House Number and street address') }}"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.House Number and street addres') }}s'"
                                    class="primary_input3" type="text"
                                    value="@if (!empty($current)) {{ $current->address1 }}@else{{ $profile->cityName }} @endif"
                                    {{ $errors->first('address1') ? 'autofocus' : '' }}>
                                <span class="text-danger">{{ $errors->first('address1') }}</span>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <input id="address2" name="address2"
                                    placeholder="{{ __('frontend.Apartment, suite, unit etc (Optional)') }}"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.Apartment, suite, unit etc (Optional)') }}'"
                                    class="primary_input3" type="text"
                                    value="@if (!empty($current)) {{ $current->address2 }}@else{{ old('address2') }} @endif">
                            </div>
                            <div class="col-lg-12 mt_20 mb_35">
                                <label class="primary_label2">{{ __('frontend.Postcode / ZIP') }}
                                    ({{ __('frontend.Optional') }}
                                    )</label>
                                <input id="zip_code" name="zip_code" placeholder="{{ __('frontend.Enter Company Name') }}"
                                    onfocus="this.placeholder = ''" class="primary_input3" type="text"
                                    value="@if (!empty($current)) {{ $current->zip_code }}@else{{ old('zip_code') }} @endif">
                            </div>

                            <div class="col-lg-12 mt_20 d-none">
                                <label class="primary_label2">{{ __('frontend.Phone No') }} <span>*</span></label>
                                <input id="phone" name="phone" placeholder="01XXXXXXXXXX"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = '01XXXXXXXXXX'"
                                    class="primary_input3" type="text"
                                    value="@if (!empty($current)) {{ $current->phone }}@else{{ !empty($profile->phone) ? $profile->phone : '00000000000' }} @endif"
                                    {{ $errors->first('phone') ? 'autofocus' : '' }}>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="col-lg-12 mt_20 mb_35 d-none">
                                <label class="primary_label2">{{ __('frontend.Email Address') }} <span>*</span></label>
                                <input id="email" name="email"
                                    placeholder="{{ __('frontend.e.g example@domian.com') }}"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.e.g example@domian.com') }}'"
                                    class="primary_input3" type="email"
                                    value="@if (!empty($current)) {{ $current->email }}@else{{ $profile->email }} @endif"
                                    {{ $errors->first('email') ? 'autofocus' : '' }}>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-12">
                                <h5 class="f_w_700 mb_23">{{ __('frontend.Additional Information') }}</h5>
                            </div>
                            <div class="col-lg-12">
                                <label class="primary_label2">{{ __('frontend.Information details') }}</label>
                                <textarea id="details" name="details" class="primary_textarea3"
                                    placeholder="{{ __('frontend.Note about your order, e.g. special note for you delivery') }}"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = '{{ __('frontend.Note about your order, e.g. special note for you delivery') }}'">
@if (!empty($current))
{{ $current->details }}@else{{ old('details') }}
@endif
</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Shipping Method (UI only — charges not applied yet) --}}
                    <div class="mxp-form-card">
                        <label class="mxp-ship-label">{{ __('Shipping Method') }}</label>
                        <div class="mxp-shipping-options" id="mxpShippingOptions">
                            <div class="mxp-ship-option is-selected" data-ship="standard" role="button" tabindex="0">
                                <div class="mxp-ship-radio" aria-hidden="true"></div>
                                <div class="mxp-ship-details">
                                    <p class="mxp-ship-name">{{ __('Standard Shipping') }}</p>
                                    <p class="mxp-ship-desc">{{ __('5–7 business days via USPS') }}</p>
                                </div>
                                <span class="mxp-ship-price">{{ __('Free') }}</span>
                            </div>
                            <div class="mxp-ship-option" data-ship="expedited" role="button" tabindex="0">
                                <div class="mxp-ship-radio" aria-hidden="true"></div>
                                <div class="mxp-ship-details">
                                    <p class="mxp-ship-name">{{ __('Expedited Shipping') }}</p>
                                    <p class="mxp-ship-desc">{{ __('2–3 business days via USPS Priority') }}</p>
                                </div>
                                <span class="mxp-ship-price">$12.99</span>
                            </div>
                        </div>
                    </div>

                    {{-- Payment (Authorize.Net — charged on Place Order) --}}
                    @php
                        $walletBalance = Auth::user()->balance ?? 0;
                        $chargeAmount = ($checkout->purchase_price > $walletBalance)
                            ? ($checkout->purchase_price - $walletBalance)
                            : 0;
                        $remainingBalance = ($checkout->purchase_price > $walletBalance)
                            ? 0
                            : ($walletBalance - $checkout->purchase_price);
                        $chargeAmountUsd = convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', $chargeAmount);
                    @endphp
                    @if ($checkout->purchase_price > 0)
                    <div class="mxp-form-card">
                        <h3 class="mxp-form-card-title">{{ __('payment.Payment') }}</h3>
                        <p class="mxp-form-card-sub">{{ __('All transactions are secure and encrypted.') }}</p>

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="remaining_balance" value="{{ $remainingBalance }}">
                        <input type="hidden" name="amount" value="{{ $chargeAmountUsd * 100 }}">

                        <div class="mxp-payment-fields">
                            <div class="mxp-pay-grid-2">
                                <div class="mxp-field">
                                    <label class="mxp-field-label" for="cardHolder">{{ __('Cardholder Name') }} <span class="req">*</span></label>
                                    <input type="text" class="mxp-input" name="cardHolder" id="cardHolder" required autocomplete="cc-name">
                                </div>
                                <div class="mxp-field">
                                    <label class="mxp-field-label" for="cardHolderLastname">{{ __('Cardholder Last Name') }} <span class="req">*</span></label>
                                    <input type="text" class="mxp-input" name="cardHolderLastname" id="cardHolderLastname" required autocomplete="cc-family-name">
                                </div>
                            </div>

                            <div class="mxp-field">
                                <label class="mxp-field-label" for="cardNumber">{{ __('Card Number') }} <span class="req">*</span></label>
                                <input type="text" class="mxp-input" name="cardNumber" id="cardNumber" placeholder="•••• •••• •••• ••••" required inputmode="numeric" autocomplete="cc-number">
                            </div>

                            <div class="mxp-pay-grid-3">
                                <div class="mxp-field">
                                    <label class="mxp-field-label" for="expiryDate">{{ __('MM / YYYY') }} <span class="req">*</span></label>
                                    <input type="text" class="mxp-input" name="expiryDate" id="expiryDate" placeholder="MM/YYYY" required inputmode="numeric" autocomplete="cc-exp">
                                </div>
                                <div class="mxp-field">
                                    <label class="mxp-field-label" for="cvv">{{ __('CVC') }} <span class="req">*</span></label>
                                    <input type="text" class="mxp-input" name="cvv" id="cvv" placeholder="•••" required inputmode="numeric" autocomplete="cc-csc">
                                </div>
                                <div class="mxp-field">
                                    <label class="mxp-field-label" for="cardZip">{{ __('ZIP') }}</label>
                                    <input type="text" class="mxp-input" name="cardZip" id="cardZip" placeholder="ZIP" inputmode="numeric" autocomplete="billing postal-code">
                                </div>
                            </div>

                            <div class="mxp-pay-badge">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                                </svg>
                                {{ __('Secure payment · Authorize.Net · 256-bit SSL') }}
                            </div>
                        </div>

                        <div class="mxp-terms-box">
                            <p class="mxp-terms-title"><b>{{ __('Terms & Conditions') }}</b></p>
                            <p class="mxp-terms-copy">
                                I <b>{{ auth()->user()->name }}</b> hereby authorize Merkaii Xcellence Prep to charge my Credit or Debit
                                Card for payment of Education services rendered as described on
                                <b>Date: {{ \Carbon\Carbon::now()->format(Settings('active_date_format')) }}</b>.
                                I <b>{{ auth()->user()->name }}</b> agree, in all cases, to pay the Credit or Debit Card amount for the full payment of Education services rendered as described above.
                            </p>
                            <label class="mxp-terms-check">
                                <input type="checkbox" name="accept" id="accept" value="1">
                                <span>I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.</span>
                            </label>
                        </div>
                    </div>
                    @endif

                    <div class="mxp-place-order-block">
                        <input type="hidden" name="access_token" value="{{ $clover->access_token ?? '' }}">
                        <button type="submit" id="submitBtn" class="theme_btn w-100 py-2 mxp-place-order-btn">
                            {{ __('frontend.Place An Order') }}
                            @if (!empty($checkout->purchase_price))
                                — {{ getPriceFormat($checkout->purchase_price) }}
                            @endif
                        </button>
                        <p class="mxp-order-terms">
                            {{ __('By placing this order you agree to our terms of service and privacy policy. Your payment is processed securely.') }}
                        </p>
                        <div class="mxp-secure-badge">
                            <span aria-hidden="true">🔒</span> {{ __('Secure checkout · 256-bit SSL') }}
                        </div>
                    </div>
                </div>

                <div class="order_wrapper">
                    <div class="mxp-sidebar-card">
                        <h5 class="mxp-sidebar-title">{{ __('Order Summary') }}</h5>
                        <div class="ordered_products">
                            @php
                                $totalSum = 0;
                            @endphp
                            @if (isset($carts))
                                @foreach ($carts as $cart)
                                    @if (!empty($cart->course_id))
                                        @php
                                            if (isset($cart->course->parent)) {
                                                $course_title = $cart->course->parent->title;
                                            } else {
                                                $course_title = $cart->course->title;
                                            }
                                            $price = 0;
                                            if ($cart->course_id != 0) {
                                                if ($cart->course->discount_price > 0) {
                                                    $price = $cart->course->discount_price;
                                                } else {
                                                    $price = $cart->price;
                                                }
                                            } else {
                                                $price = $cart->price;
                                            }
                                            $totalSum = $totalSum + $price;
                                            if (count($cart->course->children)) {
                                                foreach ($cart->course->children as $child) {
                                                    if ($cart->course_type == $child->type) {
                                                        $thumbnail = getCourseImage($child->thumbnail);
                                                        break;
                                                    } else {
                                                        $thumbnail = getCourseImage($cart->course->thumbnail);
                                                    }
                                                }
                                            } else {
                                                $thumbnail = getCourseImage($cart->course->thumbnail);
                                            }
                                        @endphp
                                        <div class="single_ordered_product">
                                            <div class="product_name d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ $thumbnail }}" class="h-100" alt="">
                                                </div>
                                                <span>{{ $course_title }}</span>
                                            </div>
                                            <span class="order_prise f_w_500 font_16 text-nowrap">
                                                {{ getPriceFormat($price) }}
                                            </span>
                                            <a href="#" class="text-danger bg-light px-1 removeFromCart" data-id="{{$cart->id}}">X</a>
                                        </div>
                                    @elseif (!empty($cart->program_id))
                                        @php
                                            $price = 0;
                                            if ($cart->program_id != 0) {
                                                if (@$cart->program->discount_price > 0) {
                                                    $price = $cart->program->discount_price;
                                                } else {
                                                    $price = $cart->price;
                                                }
                                            } else {
                                                $price = $cart->price;
                                            }
                                            $totalSum = $totalSum + $price;
                                        @endphp
                                        <div class="single_ordered_product">
                                            <div class="product_name d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ getCourseImage(@$cart->program->icon) }}" class="h-100"
                                                        alt="">
                                                </div>
                                                <span>{{ @$cart->program->programtitle }}</span>
                                            </div>
                                            <span class="order_prise f_w_500 font_16 text-nowrap">
                                                {{ getPriceFormat($price) }}
                                            </span>
                                            <a href="#" class="text-danger bg-light px-1 removeFromCart" data-id="{{$cart->id}}">X</a>
                                        </div>
                                    @elseif (!empty($cart->product_id))
                                        @php
                                            $title = $cart->product->title;
                                            $price = $cart->price;
                                            $totalSum = $totalSum + $price;
                                        @endphp
                                        <div class="single_ordered_product">
                                            <div class="product_name d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ getCourseImage(@$cart->product->files[0]->file_path ?? '') }}" class="h-100"
                                                        alt="">
                                                </div>
                                                <span>{{ $title }}</span>
                                            </div>
                                            <span class="order_prise f_w_500 font_16 text-nowrap">
                                                {{ getPriceFormat($price) }}
                                            </span>
                                            <a href="#" class="text-danger bg-light px-1 removeFromCart" data-id="{{$cart->id}}">X</a>
                                        </div>
                                    @elseif (!empty($cart->shop_bundle_id))
                                        @php
                                            $title = $cart->shopBundle->name ?? 'Bundle';
                                            $price = $cart->price;
                                            $totalSum = $totalSum + $price;
                                            $firstProduct = optional($cart->shopBundle)->products->first();
                                            $thumb = ($firstProduct && $firstProduct->files && $firstProduct->files->first())
                                                ? $firstProduct->files->first()->file_path
                                                : '';
                                        @endphp
                                        <div class="single_ordered_product">
                                            <div class="product_name d-flex align-items-center">
                                                <div class="thumb">
                                                    <img src="{{ getCourseImage($thumb) }}" class="h-100" alt="">
                                                </div>
                                                <span>{{ $title }}</span>
                                            </div>
                                            <span class="order_prise f_w_500 font_16 text-nowrap">
                                                {{ getPriceFormat($price) }}
                                            </span>
                                            <a href="#" class="text-danger bg-light px-1 removeFromCart" data-id="{{$cart->id}}">X</a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        @if (showEcommerce())
                            <div class="ordered_products_lists">
                                <div class="single_lists">
                                    <span class="total_text">
                                        @if ($checkout->purchase_price == 0)
                                            {{ __('frontend.Payable Amount') }}
                                        @else
                                            {{ __('frontend.Subtotal') }}
                                        @endif
                                    </span>
                                    <span>{{ getPriceFormat($checkout->price) }}</span>
                                </div>
                                <div class="single_lists">
                                    <span class="total_text">{{ __('Shipping') }}</span>
                                    <span id="mxpShipSidebarVal">{{ __('Free') }}</span>
                                </div>
                                @if ($checkout->purchase_price > 0)
                                    <div class="single_lists" id="couponBox"
                                        style="display: {{$checkout->discount ==0?'block':'none'}}">
                                        <div class="coupon_wrapper align-items-center">
                                            <input type="hidden" id="total"
                                                value="{{isset($totalSum)?$totalSum:0}}">
                                            <input id="code" name="code" placeholder="{{__('coupons.Enter coupon code')}}"
                                                class="primary_input3 " type="text">
                                            <button type="button" id="applyCoupon"
                                                class="theme_btn small_btn2 ">{{__('coupons.Apply')}}</button>
                                        </div>
                                    </div>

                                    <div class="single_lists" id="discountBox"
                                        style="display: {{ $checkout->discount != 0 ? 'block' : 'none' }}">
                                        <span class="total_text">{{ __('payment.Discount Amount') }} </span>
                                        <div class="" id="cancelCoupon">
                                            <svg id="icon3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16">
                                                <path data-name="Path 174" d="M0,0H16V16H0Z" fill="none" />
                                                <path data-name="Path 175"
                                                    d="M14.95,6l-1-1L9.975,8.973,6,5,5,6,8.973,9.975,5,13.948l1,1,3.973-3.973,3.973,3.973,1-1L10.977,9.975Z"
                                                    transform="translate(-1.975 -1.975)" fill="var(--system_primery_color)" />
                                            </svg>
                                        </div>
                                        <span class="discountAmount"></span>
                                    </div>

                                    @if (hasTax())
                                        <div class="single_lists">
                                            <span class="total_text">{{ __('tax.TAX') }} </span>
                                            <span class="totalTax">{{ getPriceFormat(taxAmount($checkout->price)) }}</span>
                                        </div>
                                    @endif

                                    <div class="single_lists mxp-total-row">
                                        <span class="total_text">{{ __('frontend.Payable Amount') }} </span>
                                        @if (hasTax())
                                            <span class="totalBalance">{{ getPriceFormat($checkout->purchase_price) }}</span>
                                        @else
                                            <span class="totalBalance">{{ getPriceFormat($checkout->purchase_price) }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif

                        <a href="{{ route('myCart') }}" class="mxp-sidebar-edit">← {{ __('Edit Cart') }}</a>

                        <div class="mxp-sidebar-trust">
                            <span><span class="mxp-t-check">✓</span> {{ __('Secure checkout') }}</span>
                            <span><span class="mxp-t-check">✓</span> {{ __('30-day guarantee') }}</span>
                            <span><span class="mxp-t-check">✓</span> {{ __('Free shipping $50+') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $('.removeFromCart').on('click',function(){
        let id = $(this).data('id');
            $(this).closest(".single_cart").hide();
            let url = "{{ url('/home/removeItemAjax') }}" + '/' + id;

            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    location.reload();
                }
            });
    });

    // Shipping method UI only — does not change totals / purchase_price yet
    (function () {
        var options = document.getElementById('mxpShippingOptions');
        if (!options) return;
        function selectShip(el) {
            options.querySelectorAll('.mxp-ship-option').forEach(function (n) {
                n.classList.remove('is-selected');
            });
            el.classList.add('is-selected');
        }
        options.querySelectorAll('.mxp-ship-option').forEach(function (el) {
            el.addEventListener('click', function () { selectShip(el); });
            el.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    selectShip(el);
                }
            });
        });
    })();

    $(document).ready(function () {
        if ($('#cardNumber').length) {
            $('#cardNumber').mask('0000 0000 0000 0000');
            $('#expiryDate').mask('00/0000');
            $('#cvv').mask('000');
        }

        $('#orderFrom').on('submit', function (e) {
            if (!$('#cardNumber').length) {
                return true;
            }

            var cardholderName = $('#cardHolder').val();
            var cardholderLast = $('#cardHolderLastname').val();
            var cardNumber = $('#cardNumber').val();
            var expirationDate = $('#expiryDate').val();
            var cvv = $('#cvv').val();

            if (!cardholderName || !cardholderLast || !cardNumber || !expirationDate || !cvv) {
                e.preventDefault();
                if (typeof toastr !== 'undefined') {
                    toastr.error('Please fill all payment fields');
                } else {
                    alert('Please fill all payment fields');
                }
                return false;
            }
            if (cardNumber.replace(/\s/g, '').length < 16 || cvv.length < 3) {
                e.preventDefault();
                $('#cardNumber, #cvv').addClass('mxp-input-error');
                if (typeof toastr !== 'undefined') {
                    toastr.error('Invalid card number or CVV');
                } else {
                    alert('Invalid card number or CVV');
                }
                return false;
            }
            if (!$('#accept').is(':checked')) {
                e.preventDefault();
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
                e.preventDefault();
                $('#expiryDate').addClass('mxp-input-error');
                if (typeof toastr !== 'undefined') {
                    toastr.error('Expiration date must be in the future');
                } else {
                    alert('Expiration date must be in the future');
                }
                return false;
            }
            if (expiryYear > currentYear + 50) {
                e.preventDefault();
                $('#expiryDate').addClass('mxp-input-error');
                if (typeof toastr !== 'undefined') {
                    toastr.error('Expiration year must not be more than 50 years ahead');
                } else {
                    alert('Expiration year must not be more than 50 years ahead');
                }
                return false;
            }

            return true;
        });
    });
</script>
