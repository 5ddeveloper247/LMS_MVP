@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $course->title }}
@endsection
@section('og_image')
    {{ asset($course->image) }}
@endsection

@section('mainContent')
    <x-course-deatils-page-section :course="$course" :request="$request" :isEnrolled="$isEnrolled" :enrollmentRecord="$enrollmentRecord" />
    @include(theme('partials._custom_footer'))
@endsection

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/class_details.js') }}"></script>
    @if ($errors->has('review') || $errors->has('rating'))
        <script>
            $(function () { $('#myModal').modal('show'); });
        </script>
    @endif
@endsection
