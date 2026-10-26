@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">{{ __('Certifications') }}</h3>
                            <ul class="d-flex custom_list_style p-0 mb-0">
                                <li>
                                    <a class="primary-btn radius_30px fix-gr-bg mr-10"
                                        href="{{ route('certificationOfferings.create') }}">
                                        <i class="ti-plus"></i> {{ __('Add Certification') }}
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
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Certification category') }}</th>
                                            <th scope="col">{{ __('Catalog group') }}</th>
                                            <th scope="col">{{ __('Price options') }}</th>
                                            <th scope="col">{{ __('Delivery') }}</th>
                                            <th scope="col">{{ __('Duration / sessions') }}</th>
                                            <th scope="col">{{ __('Sort') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
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
                                                    @if ($offering->duration_summary)
                                                        <br><small class="text-muted">{{ $offering->duration_summary }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ optional($offering->category)->name ?? '—' }}</td>
                                                <td>{{ optional($offering->group)->name ?? '—' }}</td>
                                                <td><small>{{ $offering->optionsPriceSummary() }}</small></td>
                                                <td>{{ $offering->delivery_mode_label }}</td>
                                                <td><small>{{ $offering->deliveryPartsSummary() ?: '—' }}</small></td>
                                                <td>{{ $offering->sort_order }}</td>
                                                <td>
                                                    <a href="{{ route('certificationOfferings.status', $offering->id) }}"
                                                        class="primary-btn small {{ $offering->status ? 'fix-gr-bg' : 'tr-bg' }}">
                                                        {{ $offering->status ? __('Active') : __('Inactive') }}
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
                                                                href="{{ route('certificationOfferings.edit', $offering->id) }}">
                                                                {{ __('common.Edit') }}
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('certificationOfferings.destroy', $offering->id) }}"
                                                                onclick="return confirm('{{ __('Are you sure to delete ?') }}')">
                                                                {{ __('common.Delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">{{ __('No Data Found') }}</td>
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
