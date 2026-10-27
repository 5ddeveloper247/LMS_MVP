@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Enrolled students') }}</h3>
                            <p class="text-muted mb-0 ml-md-3">
                                {{ __('Select a certification to view paid enrollments and registration details.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('Certification') }}</th>
                                            <th scope="col">{{ __('Enrollments') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($offerings as $key => $offering)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <strong>{{ $offering->name }}</strong>
                                                    @if (optional($offering->category)->name)
                                                        <span class="badge badge-secondary ml-1">{{ $offering->category->name }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $offering->enrollments_count ?? 0 }}</td>
                                                <td>
                                                    <a class="primary-btn small fix-gr-bg"
                                                        href="{{ route('certificationEnrollments.offering', $offering->id) }}">
                                                        {{ __('View students') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">{{ __('No certifications found.') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
