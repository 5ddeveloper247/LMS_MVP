@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ __('Package details') }}
                            </h3>
                            <a href="{{ route('hired.tutors') }}#packages_hired" class="primary-btn small fix-gr-bg">
                                ← {{ __('Back to Packages Hired') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="white_box_30px">
                        <h4 class="mb-3">{{ $purchase->package_name ?: __('Session Package') }}</h4>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('student.Student') }}:</strong>
                                {{ optional($purchase->user)->name ?? '—' }}
                            </div>
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('common.Price') }}:</strong>
                                {{ getPriceFormat($purchase->price) }}
                            </div>
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('Purchased') }}:</strong>
                                {{ $purchase->created_at ? \Illuminate\Support\Carbon::parse($purchase->created_at)->format('d M Y') : '—' }}
                            </div>
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('Sessions') }}:</strong>
                                {{ (int) $purchase->sessions_used }} / {{ (int) $purchase->sessions_allowed }}
                            </div>
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('Remaining') }}:</strong>
                                {{ $purchase->remainingSessions() }}
                            </div>
                            <div class="col-md-4 mb-2">
                                <strong>{{ __('Tracking') }}:</strong>
                                {{ $purchase->tracking_id ?: '—' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ __('Hired tutors & sessions') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <table class="table table-responsive Crm_table_active3">
                                <thead>
                                    <tr>
                                        <th>{{ __('common.SL') }}</th>
                                        <th>{{ __('instructor.Instructor') }}</th>
                                        <th>{{ __('courses.Course') }}</th>
                                        <th>{{ __('common.Date') }}</th>
                                        <th>{{ __('common.Start') }} {{ __('common.Time') }}</th>
                                        <th>{{ __('common.End') }} {{ __('common.Time') }}</th>
                                        <th>{{ __('Start Join') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($hirings as $index => $hiring)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ optional($hiring->instructor)->name ?? '—' }}</td>
                                            <td>{{ optional($hiring->course)->title ?? '—' }}</td>
                                            <td>
                                                {{ $hiring->assign_date ? \Illuminate\Support\Carbon::parse($hiring->assign_date)->format('d M Y') : '—' }}
                                            </td>
                                            <td>
                                                {{ $hiring->assign_start_time ? \Illuminate\Support\Carbon::parse($hiring->assign_start_time)->format('H:i a') : '—' }}
                                            </td>
                                            <td>
                                                {{ $hiring->assign_end_time ? \Illuminate\Support\Carbon::parse($hiring->assign_end_time)->format('H:i a') : '—' }}
                                            </td>
                                            <td>
                                                @if (!empty($hiring->meeting_join_url))
                                                    <a class="primary-btn small fix-gr-bg border-0 text-white"
                                                        href="{{ $hiring->meeting_join_url }}" target="_blank">
                                                        {{ __('Join') }}
                                                    </a>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">
                                                {{ __('No tutors hired on this package yet.') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
