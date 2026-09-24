@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ __('frontendmanage.My Profile') }}
@endsection

@push('css')
    <link href="{{ asset('public/frontend/infixlmstheme/css/myProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('public/modules/ceprofessional/css/ce-profile.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('public/modules/ceprofessional/js/ce-profile.js') }}"></script>
@endpush

@section('mainContent')
    <div class="dashboard_lg_card">
        <div class="container-fluid no-gutters">
            <div class="account_profile_wrapper p-4 ce-profile-page">
                <div class="account_profile_thumb text-center mb_30">
                    @include('ceprofessional::partials._profile-photo', ['user' => $user])
                    <h4>{{ $user->name }}</h4>
                    @if ($profile)
                        <p class="mb-0">{{ strtoupper($profile->license_type) }} · FL License</p>
                    @endif
                </div>

                <div class="account_profile_form">
                    <h3 class="font_22 f_w_700 mb_30">{{ __('frontendmanage.My Profile') }}</h3>

                    <form action="{{ route('cePortal.profile.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="primary_label2">{{ __('student.Full Name') }} <span>*</span></label>
                                <input name="name" class="primary_input4" type="text"
                                    value="{{ old('name', $user->name) }}" required>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-lg-6">
                                <label class="primary_label2">{{ __('common.Email') }}</label>
                                <input class="primary_input4" type="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="col-lg-6 mt_20">
                                <label class="primary_label2">{{ __('student.Phone') }}</label>
                                <input name="phone" class="primary_input4" type="text"
                                    value="{{ old('phone', $user->phone) }}"
                                    placeholder="{{ __('student.Phone') }}">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>

                        <div class="ce-profile-section mt_30">
                            <h4 class="ce-profile-section-title">Florida License</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="primary_label2">FL License Number</label>
                                    <input class="primary_input4" type="text" readonly
                                        value="{{ optional($profile)->fl_license_number ?: '—' }}">
                                </div>
                                <div class="col-lg-6">
                                    <label class="primary_label2">License Type</label>
                                    <input class="primary_input4" type="text" readonly
                                        value="{{ $licenseTypes[optional($profile)->license_type] ?? optional($profile)->license_type ?? '—' }}">
                                </div>
                                @if (optional($profile)->license_type === 'aprn')
                                    <div class="col-lg-6 mt_20">
                                        <label class="primary_label2">Nationally Certified APRN?</label>
                                        <input class="primary_input4" type="text" readonly
                                            value="{{ optional($profile)->aprn_nationally_certified === null ? '—' : (optional($profile)->aprn_nationally_certified ? 'Yes' : 'No') }}">
                                    </div>
                                    <div class="col-lg-6 mt_20">
                                        <label class="primary_label2">Autonomous APRN in Florida?</label>
                                        <input class="primary_input4" type="text" readonly
                                            value="{{ optional($profile)->aprn_autonomous === null ? '—' : (optional($profile)->aprn_autonomous ? 'Yes' : 'No') }}">
                                    </div>
                                @endif
                                @if (optional($profile)->renewal_date)
                                    <div class="col-lg-6 mt_20">
                                        <label class="primary_label2">License Renewal Date</label>
                                        <input class="primary_input4" type="text" readonly
                                            value="{{ showDate($profile->renewal_date) }}">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="ce-profile-section mt_30">
                            <h4 class="ce-profile-section-title">Preferences</h4>
                            <div class="form-check mt_10">
                                <input type="hidden" name="consent_marketing_email" value="0">
                                <input class="form-check-input" type="checkbox" name="consent_marketing_email"
                                    id="consent_marketing_email" value="1"
                                    {{ old('consent_marketing_email', optional($profile)->consent_marketing_email) ? 'checked' : '' }}>
                                <label class="form-check-label" for="consent_marketing_email">
                                    Receive marketing emails about CE courses and renewal reminders
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt_30">
                            <button type="submit" class="theme_btn w-100 text-center">
                                {{ __('common.Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
