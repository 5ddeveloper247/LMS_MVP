@extends(theme('layouts.master'))
@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ $blog->title ?? __('blogs.Blog') }}
@endsection


@section('mainContent')

@include(theme('components._new-blog-detail-page-section'))
@include(theme('partials._custom_footer'))
@endsection