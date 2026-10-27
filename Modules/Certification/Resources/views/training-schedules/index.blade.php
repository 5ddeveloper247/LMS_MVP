@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb-sm_20px mb-0">{{ __('Training schedule') }}</h3>
                            <p class="text-muted mb-0 ml-md-3">
                                {{ __('Manage in-person and live class dates shown on the enrollment page.') }}
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
                                            <th scope="col">{{ __('Upcoming dates') }}</th>
                                            <th scope="col">{{ __('Total active') }}</th>
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
                                                <td>{{ $offering->upcoming_schedules_count ?? '—' }}</td>
                                                <td>{{ $offering->active_schedules_count ?? '—' }}</td>
                                                <td>
                                                    <a class="primary-btn small fix-gr-bg"
                                                        href="{{ route('certificationOfferingSessions.index', $offering->id) }}">
                                                        {{ __('Manage dates') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">{{ __('No certifications found.') }}</td>
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
