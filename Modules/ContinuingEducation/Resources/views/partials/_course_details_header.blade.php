@php
    $ceTab = $ceTab ?? ceCourseTabForLmsCourse($course->id);
@endphp

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>CE Course Details</h1>
            <div class="bc-pages">
                <a href="{{ validRouteUrl('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                <a href="{{ route('continuing-education.courses.index', ['tab' => $ceTab]) }}">Continuing Education</a>
                <a href="{{ route('continuing-education.courses.index', ['tab' => $ceTab]) }}">CE Courses</a>
                <a href="#">CE Course Details</a>
            </div>
        </div>
    </div>
</section>

<div class="d-flex flex-wrap align-items-center justify-content-between mb-20">
    <a href="{{ route('continuing-education.courses.index', ['tab' => $ceTab]) }}" class="primary-btn tr-bg">
        <i class="ti-arrow-left"></i> Back to CE Courses
    </a>
</div>
