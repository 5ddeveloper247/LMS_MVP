@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ __('frontend.Account Settings') }}
@endsection

@push('css')
    <link href="{{ asset('public/frontend/infixlmstheme/css/myProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('public/modules/ceprofessional/css/ce-profile.css') }}" rel="stylesheet">
@endpush

@section('mainContent')
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="account_profile_wrapper p-4 ce-profile-page">
                <div class="account_profile_thumb text-center mb_30">
                    <div class="thumb mb-15">
                        <img class="w-100 h-100" src="{{ getProfileImage($account->image) }}" alt="{{ $account->name }}">
                    </div>
                    <h4>{{ $account->name }}</h4>
                    <p>{{ $account->email }}</p>
                </div>

                <div class="account_profile_form">
                    <div class="account_title">
                        <h3 class="font_22 f_w_700">{{ __('student.Account Settings') }}</h3>
                        <p class="mb_25 font_1 f_w_500 theme_text2">
                            {{ __('student.Edit your account settings and change your password here') }}.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="primary_label2">{{ __('student.Email Address') }}</label>
                            <input name="email" placeholder="{{ __('student.Email Address') }}"
                                value="{{ $account->email }}" readonly class="primary_input4" type="email">
                        </div>
                    </div>

                    <form action="{{ route('cePortal.account.password') }}" method="POST" class="mt_30">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="primary_label2">{{ __('frontend.Existing Password') }}
                                    <span class="text-danger">*</span></span>
                                <input type="password" placeholder="{{ __('student.Type existing password') }}"
                                    class="primary_input4 {{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                    name="old_password">
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                            </div>
                            <div class="col-lg-12 mt_20">
                                <span class="primary_label2">{{ __('common.New') }} {{ __('common.Password') }}
                                    <span class="text-danger">*</span></span>
                                <input type="password" placeholder="{{ __('student.Type new password') }}"
                                    class="primary_input4 {{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                    name="new_password">
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            </div>
                            <div class="col-lg-12 mt_20">
                                <span class="primary_label2">{{ __('frontend.Re-Type Password') }}
                                    <span class="text-danger">*</span></span>
                                <input type="password" placeholder="{{ __('student.Re-type new password') }}"
                                    class="primary_input4 {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}"
                                    name="confirm_password">
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="theme_btn w-100 mt-3 text-center">
                                    {{ __('frontend.Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
