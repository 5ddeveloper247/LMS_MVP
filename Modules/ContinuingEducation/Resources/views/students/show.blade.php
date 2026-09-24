@extends('backend.master')

@push('styles')
    <style>
        .ce-student-view .form-control {
            border-radius: 10px;
            background: #f8f9fa;
        }

        .ce-student-view .section-title {
            font-size: 18px;
            font-weight: 600;
            margin: 24px 0 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e9ecef;
        }

        .ce-student-view .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .ce-student-view .profile-header img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
        }

        .ce-student-view .consent-yes {
            color: #28a745;
            font-weight: 600;
        }

        .ce-student-view .consent-no {
            color: #6c757d;
        }
    </style>
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area ce-student-view">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="box_header common_table_header mb-3">
                        <div class="main-title d-md-flex w-100 align-items-center">
                            <h3 class="mb-0">CE Student Profile</h3>
                            <ul class="d-flex ml-auto mb-0">
                                <li>
                                    <a href="{{ route('continuing-education.students.index') }}" class="primary-btn fix-gr-bg mr-10">
                                        <i class="ti-arrow-left"></i> Back to CE Students
                                    </a>
                                </li>
                                @if (permissionCheck('student.secretLogin'))
                                    <li>
                                        <a href="{{ route('secretLogin', $student->id) }}" class="primary-btn fix-gr-bg">
                                            {{ trans('common.Secret Login') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="white_box_30px">
                        <div class="profile-header mb-4">
                            <img src="{{ getProfileImage($student->image) }}" alt="{{ $student->name }}">
                            <div>
                                <h4 class="mb-1">{{ $student->name }}</h4>
                                <p class="mb-1">{{ $student->email }}</p>
                                <span class="badge {{ (int) $student->status === 1 ? 'badge-success' : 'badge-secondary' }}">
                                    {{ (int) $student->status === 1 ? trans('common.Active') : trans('common.Inactive') }}
                                </span>
                            </div>
                        </div>

                        <h5 class="section-title">Account Information</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.Name') }}</label>
                                <input class="form-control" type="text" readonly value="{{ $student->name ?: '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.Email') }}</label>
                                <input class="form-control" type="text" readonly value="{{ $student->email ?: '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Registration Date</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $student->preregister_date ? showDate($student->preregister_date) : '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Registration Source</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $student->register_source ?: '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.Status') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ (int) $student->status === 1 ? trans('common.Active') : trans('common.Inactive') }}">
                            </div>
                        </div>

                        <h5 class="section-title">Personal Details</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('student.Phone') }}</label>
                                <input class="form-control" type="text" readonly value="{{ $student->phone ?: '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.gender') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $student->gender ? ucfirst($student->gender) : '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.Date of Birth') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $student->dob ? showDate($student->dob) : '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ trans('common.Country') }}</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($student->userCountry)->name ?: '—' }}">
                            </div>
                        </div>

                        <h5 class="section-title">Florida License</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>FL License Number</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($profile)->fl_license_number ?: '—' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>License Type</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ $licenseTypes[optional($profile)->license_type] ?? optional($profile)->license_type ?? '—' }}">
                            </div>
                            @if (optional($profile)->license_type === 'aprn')
                                <div class="col-md-4 mb-3">
                                    <label>Nationally Certified APRN?</label>
                                    <input class="form-control" type="text" readonly
                                        value="{{ optional($profile)->aprn_nationally_certified === null ? '—' : (optional($profile)->aprn_nationally_certified ? 'Yes' : 'No') }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Autonomous APRN in Florida?</label>
                                    <input class="form-control" type="text" readonly
                                        value="{{ optional($profile)->aprn_autonomous === null ? '—' : (optional($profile)->aprn_autonomous ? 'Yes' : 'No') }}">
                                </div>
                            @endif
                            @if (optional($profile)->renewal_date)
                                <div class="col-md-4 mb-3">
                                    <label>License Renewal Date</label>
                                    <input class="form-control" type="text" readonly
                                        value="{{ showDate($profile->renewal_date) }}">
                                </div>
                            @endif
                            @if (optional($profile)->ce_broker_last_synced_at)
                                <div class="col-md-4 mb-3">
                                    <label>CE Broker Last Synced</label>
                                    <input class="form-control" type="text" readonly
                                        value="{{ showDate($profile->ce_broker_last_synced_at) }}">
                                </div>
                            @endif
                        </div>

                        <h5 class="section-title">Legal &amp; Reporting Consents</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>License Information Accurate</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($profile)->consent_license_accurate ? 'Yes' : 'No' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>CE Broker Reporting Authorized</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($profile)->consent_ce_broker_reporting ? 'Yes' : 'No' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Marketing Emails</label>
                                <input class="form-control" type="text" readonly
                                    value="{{ optional($profile)->consent_marketing_email ? 'Yes' : 'No' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
