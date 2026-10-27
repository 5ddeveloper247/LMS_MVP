@extends(theme('layouts.dashboard_master'))

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | {{ __('Certifications') }}
@endsection

@section('mainContent')
    <div class="main_content_iner main_content_padding">
        @if (!empty($certificationDashboard['show']))
            @include(theme('components.certification-student-dashboard-section'), $certificationDashboard)
        @else
            <div class="dashboard_card p-4">
                <p class="mb-0">{{ __('Certifications are not available right now. Please try again later.') }}</p>
            </div>
        @endif
    </div>
@endsection
