@extends(theme('layouts.master'))
@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('blogs.Blog') }}
@endsection


@section('mainContent')

@include(theme('components._new-blog-page-section'))
@include(theme('partials._custom_footer'))
@endsection