@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex align-items-center">
                            <h3 class="mr-30 mb_xs_15px mb_sm_20px mb-0">
                                {{ __('Session Packages') }}
                            </h3>
                            <ul class="d-flex custom_list_style p-0 mb-0">
                                <li>
                                    <a class="primary-btn radius_30px fix-gr-bg mr-10"
                                        href="{{ route('tutorSessionPackages.create') }}">
                                        <i class="ti-plus"></i> {{ __('Add Package') }}
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
                                            <th scope="col">{{ __('Heading') }}</th>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Sessions') }}</th>
                                            <th scope="col">{{ __('Price') }}</th>
                                            <th scope="col">{{ __('Featured') }}</th>
                                            <th scope="col">{{ __('Popular') }}</th>
                                            <th scope="col">{{ __('common.Status') }}</th>
                                            <th scope="col">{{ __('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($packages as $key => $package)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $package->heading }}</td>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->sessions_count }}</td>
                                                <td>${{ number_format((float) $package->price, 2) }}</td>
                                                <td>{{ $package->is_featured ? __('Yes') : __('No') }}</td>
                                                <td>{{ $package->popular ? __('Yes') : __('No') }}</td>
                                                <td>
                                                    <a href="{{ route('tutorSessionPackages.status', $package->id) }}"
                                                        class="primary-btn small {{ $package->status ? 'fix-gr-bg' : 'tr-bg' }}">
                                                        {{ $package->status ? __('Active') : __('Inactive') }}
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
                                                                href="{{ route('tutorSessionPackages.edit', $package->id) }}">
                                                                {{ __('common.Edit') }}
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('tutorSessionPackages.destroy', $package->id) }}"
                                                                onclick="return confirm('{{ __('Are you sure to delete ?') }}')">
                                                                {{ __('common.Delete') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted py-4">
                                                    {{ __('No session packages yet. Click Add Package to create one.') }}
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
@endsection
