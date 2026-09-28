@extends('backend.master')

@push('styles')
    <style>
        .ce-licenses-index .table-responsive,
        .ce-licenses-index .QA_table,
        .ce-licenses-index .white_box {
            overflow: visible !important;
        }

        .ce-licenses-index .CRM_dropdown .dropdown-menu {
            z-index: 1050;
        }
    </style>
@endpush

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor student-details ce-licenses-index">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex w-100">
                            <h3 class="mb-0">CE License Types</h3>
                            <p class="text-muted mb-0 ml-3 align-self-center" style="font-size:13px;">
                                Featured: {{ $featuredCount }}/{{ $maxFeatured }} (shown on CE homepage)
                            </p>
                            <ul class="d-flex ml-auto">
                                <li>
                                    <a class="primary-btn fix-gr-bg" href="{{ route('continuing-education.licenses.create') }}">
                                        <i class="ti-plus"></i> Add License
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
                                                <th scope="col">Subtitle</th>
                                                <th scope="col">Style</th>
                                                <th scope="col">Sort</th>
                                                <th scope="col">Featured</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">{{ trans('common.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($licenses as $key => $license)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $license->name }}</td>
                                                    <td>{{ $license->subtitle ?: '—' }}</td>
                                                    <td>{{ $cardStyles[$license->card_style] ?? $license->card_style }}</td>
                                                    <td>{{ $license->seq_no ?? '—' }}</td>
                                                    <td>
                                                        @if ($license->featured)
                                                            <span class="primary-btn small fix-gr-bg" style="cursor:default;">Yes</span>
                                                        @else
                                                            <span class="primary-btn small tr-bg" style="cursor:default;">No</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('continuing-education.licenses.status', $license->id) }}"
                                                            class="primary-btn small {{ $license->status && $license->publish ? 'fix-gr-bg' : 'tr-bg' }}">
                                                            {{ $license->status && $license->publish ? 'Active' : 'Inactive' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @include('continuingeducation::licenses._license_action_td', ['license' => $license])
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center py-5">
                                                        <p class="mb-2">No license types yet.</p>
                                                        <p class="text-muted mb-0">
                                                            <a href="{{ route('continuing-education.licenses.create') }}">Add a license type</a>
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
