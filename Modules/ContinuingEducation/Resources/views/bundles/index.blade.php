@extends('backend.master')

@push('styles')
    <style>
        .ce-bundles-index .table-responsive,
        .ce-bundles-index .QA_table,
        .ce-bundles-index .white_box {
            overflow: visible !important;
        }

        .ce-bundles-index .CRM_dropdown .dropdown-menu {
            z-index: 1050;
        }
    </style>
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor student-details ce-bundles-index">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex w-100">
                            <h3 class="mb-0">CE Bundles</h3>
                            <ul class="d-flex ml-auto">
                                <li>
                                    <a class="primary-btn fix-gr-bg" href="{{ route('continuing-education.bundles.create') }}">
                                        <i class="ti-plus"></i> Add Bundle
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <div class="table-responsive">
                                    <table class="table Crm_table_active3">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ trans('common.SL') }}</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">License Type</th>
                                                <th scope="col">Hours</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Courses</th>
                                                <th scope="col">Best Seller</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">{{ trans('common.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bundles as $key => $bundle)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        {{ $bundle->name }}
                                                        @if ($bundle->subtitle)
                                                            <br><small class="text-muted">{{ $bundle->subtitle }}</small>
                                                        @endif
                                                    </td>
                                                    <td>{{ $licenseTypes[$bundle->license_type] ?? $bundle->license_type }}</td>
                                                    <td>{{ $bundle->total_hours }}h</td>
                                                    <td>${{ number_format($bundle->price, 2) }}</td>
                                                    <td>{{ $bundle->mandatory_courses_count ?? 0 }}</td>
                                                    <td>
                                                        @if ($bundle->is_best_seller)
                                                            <span class="primary-btn small fix-gr-bg" style="cursor:default;">Yes</span>
                                                        @else
                                                            <span class="primary-btn small tr-bg" style="cursor:default;">No</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('continuing-education.bundles.status', $bundle->id) }}"
                                                            class="primary-btn small {{ $bundle->status && $bundle->publish ? 'fix-gr-bg' : 'tr-bg' }}">
                                                            {{ $bundle->status && $bundle->publish ? 'Active' : 'Inactive' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @include('continuingeducation::bundles._bundle_action_td', ['bundle' => $bundle])
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-5">
                                                        <p class="mb-2">No bundles yet.</p>
                                                        <p class="text-muted mb-0">
                                                            <a href="{{ route('continuing-education.bundles.create') }}">Add a bundle</a>
                                                        </p>
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
        </div>
    </section>

    @include('backend.partials.delete_modal')
@endsection
