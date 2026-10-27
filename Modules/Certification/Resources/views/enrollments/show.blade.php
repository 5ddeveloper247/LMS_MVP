@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    @php
        $offering = $enrollment->offering;
    @endphp
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center justify-content-between flex-wrap w-100">
                            <h3 class="mb-0">{{ __('Enrollment record') }} #{{ $enrollment->id }}</h3>
                            <div class="mt-2 mt-md-0">
                                @if ($offering)
                                    <a href="{{ route('certificationEnrollments.offering', $offering->id) }}" class="primary-btn tr-bg mr-10">
                                        {{ __('Back to list') }}
                                    </a>
                                @endif
                                <a href="{{ route('certificationEnrollments.index') }}" class="primary-btn tr-bg">
                                    {{ __('All certifications') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="white_box_30px mb-30">
                        <h4 class="mb-20">{{ __('Certification') }}</h4>
                        <table class="table table-borderless mb-0">
                            <tr><th>{{ __('Course') }}</th><td>{{ $offering->name ?? '—' }}</td></tr>
                            <tr><th>{{ __('Option') }}</th><td>{{ $enrollment->option_title }}</td></tr>
                            <tr><th>{{ __('Class date') }}</th><td>{{ $enrollment->classDateLabel() }}</td></tr>
                            <tr><th>{{ __('Location') }}</th><td>{{ $data['session_location'] ?? '—' }}</td></tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="white_box_30px mb-30">
                        <h4 class="mb-20">{{ __('Payment') }}</h4>
                        <table class="table table-borderless mb-0">
                            <tr><th>{{ __('Status') }}</th><td>{{ ucfirst($enrollment->payment_status) }}</td></tr>
                            <tr><th>{{ __('Method') }}</th><td>{{ $enrollment->payment_method ?? '—' }}</td></tr>
                            <tr><th>{{ __('Amount paid') }}</th><td>{{ getPriceFormat($enrollment->total_paid) }}</td></tr>
                            <tr><th>{{ __('Tracking') }}</th><td>{{ $enrollment->tracking }}</td></tr>
                            <tr><th>{{ __('Enrolled on') }}</th><td>{{ showDate($enrollment->created_at) }}</td></tr>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="white_box_30px mb-30">
                        <h4 class="mb-20">{{ __('Registrant information') }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr><th>{{ __('Name') }}</th><td>{{ $enrollment->registrantName() }}</td></tr>
                                    <tr><th>{{ __('Email') }}</th><td>{{ $data['email'] ?? ($enrollment->user->email ?? '—') }}</td></tr>
                                    <tr><th>{{ __('Phone') }}</th><td>{{ $data['phone'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('Role') }}</th><td>{{ $data['role'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('LMS account') }}</th><td>{{ optional($enrollment->user)->name ?? '—' }} (ID {{ $enrollment->user_id }})</td></tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr><th>{{ __('License') }}</th><td>{{ $data['license'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('Employer') }}</th><td>{{ $data['employer'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('Card expiration') }}</th><td>{{ $data['card_exp'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('Online certificate') }}</th><td>{{ $data['online_cert'] ?? '—' }}</td></tr>
                                    <tr><th>{{ __('Skills course') }}</th><td>{{ $data['skills_course'] ?? '—' }}</td></tr>
                                </table>
                            </div>
                        </div>
                        @if (!empty($data['notes']))
                            <h5 class="mt-20">{{ __('Notes') }}</h5>
                            <p class="mb-0">{{ $data['notes'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
