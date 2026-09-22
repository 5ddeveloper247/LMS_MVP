@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | Prep-Courses
@endsection

@section('mainContent')
    <x-quiz-page-section :request="$request" :categories="$categories" :languages="$languages" />
    @include(theme('partials._custom_footer'))
@endsection
