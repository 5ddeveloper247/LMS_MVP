@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | My CE Courses
@endsection

@section('mainContent')
    @include('ceprofessional::components.section-header', [
        'title' => 'My Courses',
        'link' => route('continuingEducationRnLpn'),
        'linkLabel' => 'Browse CE Catalog →',
    ])

    @if (count($courses) > 0)
        <div class="ce-course-list">
            @foreach ($courses as $course)
                @include('ceprofessional::components.active-course-card', ['course' => $course])
            @endforeach
        </div>
    @else
        @include('ceprofessional::components.empty-state', [
            'title' => 'No courses yet',
            'message' => 'When you purchase a continuing education course, it will appear here with launch and progress tracking.',
            'buttonLabel' => 'Browse CE Courses',
            'buttonUrl' => route('continuingEducationRnLpn'),
        ])
    @endif
@endsection
