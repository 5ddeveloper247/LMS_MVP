@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | CE Dashboard
@endsection

@section('mainContent')
    @include('ceprofessional::components.welcome-header')

    <div class="ce-stats-grid">
        @include('ceprofessional::components.stat-card', [
            'label' => 'Hours Completed',
            'value' => $stats['hours_completed'] . ' <small>/ ' . $stats['hours_required'] . '</small>',
            'note' => $stats['hours_percent'] . '% of renewal requirement',
        ])
        @include('ceprofessional::components.stat-card', [
            'label' => 'Courses In Progress',
            'value' => (string) $stats['courses_in_progress'],
            'note' => $stats['courses_in_progress_note'],
            'valueClass' => 'gold',
        ])
        @include('ceprofessional::components.stat-card', [
            'label' => 'Certificates Earned',
            'value' => (string) $stats['certificates_earned'],
            'note' => 'All reported to CE Broker',
            'valueClass' => 'green',
        ])
        @include('ceprofessional::components.stat-card', [
            'label' => 'Days Until Renewal',
            'value' => (string) $days_until_renewal,
            'note' => $stats['renewal_date_label'],
            'valueClass' => 'gold',
        ])
    </div>

    {{-- Figma layout: Compliance tracker (left) + Active Courses (right) --}}
    <div class="ce-dashboard-grid">
        <div class="ce-dashboard-col-left">
            @include('ceprofessional::components.compliance-tracker', ['compliance' => $compliance])
        </div>

        <div class="ce-dashboard-col-right">
            @include('ceprofessional::components.section-header', [
                'title' => 'Active Courses',
                'link' => route('cePortal.courses'),
                'linkLabel' => 'View All →',
            ])

            @if ($has_live_enrollments ?? false)
                <div class="ce-course-list">
                    @foreach ($active_courses as $course)
                        @include('ceprofessional::components.active-course-card', ['course' => $course])
                    @endforeach
                </div>
            @else
                @include('ceprofessional::components.empty-state', [
                    'title' => 'No active courses',
                    'message' => 'Purchase a CE course to launch training and track your renewal progress here.',
                    'buttonLabel' => 'Browse CE Courses',
                    'buttonUrl' => route('continuingEducationRnLpn'),
                ])
            @endif
        </div>
    </div>

    @include('ceprofessional::components.recommended-electives')

    @include('ceprofessional::components.nurse-network')

    @include('ceprofessional::components.broker-sync-tabs')
@endsection
