@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center flex-wrap">
                            <h3 class="mr-30 mb_xs_15px mb-sm_20px mb-0">
                                {{ __('Training schedule') }} — {{ $offering->name }}
                            </h3>
                            <ul class="d-flex custom_list_style p-0 mb-0">
                                <li>
                                    <a class="primary-btn radius_30px fix-gr-bg mr-10"
                                        href="{{ route('certificationOfferingSessions.create', $offering->id) }}">
                                        <i class="ti-plus"></i> {{ __('Add class date') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="primary-btn radius_30px tr-bg mr-10"
                                        href="{{ route('certificationTrainingSchedules.index') }}">
                                        {{ __('All schedules') }}
                                    </a>
                                    <a class="primary-btn radius_30px tr-bg"
                                        href="{{ route('certificationOfferings.index') }}">
                                        {{ __('Certifications') }}
                                    </a>
                                </li>
                            </ul>
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
                                            <th scope="col">{{ __('When') }}</th>
                                            <th scope="col">{{ __('Display') }}</th>
                                            <th scope="col">{{ __('Option') }}</th>
                                            <th scope="col">{{ __('Location') }}</th>
                                            <th scope="col">{{ __('Capacity') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sessions as $key => $session)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <strong>{{ $session->starts_at?->format('M j, Y g:i A') }}</strong>
                                                    @if ($session->ends_at)
                                                        <br><small class="text-muted">{{ __('to') }} {{ $session->ends_at->format('M j, Y g:i A') }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $session->title }}
                                                    @if ($session->subtitle)
                                                        <br><small class="text-muted">{{ $session->subtitle }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ optional($session->option)->title ?? '—' }}</td>
                                                <td><small>{{ $session->location ?: '—' }}</small></td>
                                                <td>{{ $session->capacity ?? '—' }}</td>
                                                <td>
                                                    <a href="{{ route('certificationOfferingSessions.status', [$offering->id, $session->id]) }}"
                                                        class="primary-btn small {{ $session->status ? 'fix-gr-bg' : 'tr-bg' }}">
                                                        {{ $session->status ? __('Active') : __('Inactive') }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="dropdown CRM_dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{ __('common.Action') }}
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ route('certificationOfferingSessions.edit', [$offering->id, $session->id]) }}">
                                                                {{ __('common.Edit') }}
                                                            </a>
                                                            <a onclick="confirm_modal('{{ route('certificationOfferingSessions.destroy', [$offering->id, $session->id]) }}');"
                                                                class="dropdown-item" href="javascript:void(0)">
                                                                {{ __('common.Delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    {{ __('No class dates yet. Add dates students can choose when enrolling.') }}
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
        </div>
    </section>

    @include('backend.partials.delete_modal')
@endsection
