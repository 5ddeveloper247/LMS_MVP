@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row pt-0">
                <ul class="nav nav-tabs no-bottom-border mt-sm-md-20 mb-10 ml-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $activeTab === 'mandatory' ? 'active' : '' }}"
                            href="#mandatory_courses" role="tab" data-toggle="tab">
                            {{ $courseTypes['mandatory'] ?? 'Mandatory' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $activeTab === 'elective' ? 'active' : '' }}"
                            href="#elective_courses" role="tab" data-toggle="tab">
                            {{ $courseTypes['elective'] ?? 'Elective' }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content mt-4">
                <div role="tabpanel"
                    class="tab-pane fade {{ $activeTab === 'mandatory' ? 'show active' : '' }}"
                    id="mandatory_courses">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex w-100">
                                    <h3 class="mb-0">{{ $courseTypes['mandatory'] ?? 'Mandatory' }} CE Courses</h3>
                                    <ul class="d-flex ml-auto">
                                        <li>
                                            <a class="primary-btn fix-gr-bg"
                                                href="{{ route('continuing-education.courses.create') }}">
                                                <i class="ti-plus"></i> Add CE Course
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                @include('continuingeducation::courses._course_table', [
                                    'courses' => $mandatoryCourses,
                                    'tab' => 'mandatory',
                                ])
                            </div>
                        </div>
                    </div>
                </div>

                <div role="tabpanel"
                    class="tab-pane fade {{ $activeTab === 'elective' ? 'show active' : '' }}"
                    id="elective_courses">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex w-100">
                                    <h3 class="mb-0">{{ $courseTypes['elective'] ?? 'Elective' }} CE Courses</h3>
                                    <ul class="d-flex ml-auto">
                                        <li>
                                            <a class="primary-btn fix-gr-bg"
                                                href="{{ route('continuing-education.courses.create') }}">
                                                <i class="ti-plus"></i> Add CE Course
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                @include('continuingeducation::courses._course_table', [
                                    'courses' => $electiveCourses,
                                    'tab' => 'elective',
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('backend.partials.delete_modal')
@endsection

@push('scripts')
    <script>
        (function() {
            var activeTab = @json($activeTab);

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var tab = $(e.target).attr('href') === '#elective_courses' ? 'elective' : 'mandatory';
                var url = new URL(window.location.href);
                url.searchParams.set('tab', tab);
                window.history.replaceState({}, '', url);
            });

            if (activeTab === 'elective') {
                $('a[href="#elective_courses"]').tab('show');
            }
        })();
    </script>
@endpush
