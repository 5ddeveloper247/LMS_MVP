@extends('backend.master')

@section('table')
    @php
        $table_name='resource_tabs';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title d-md-flex mb-20">
                        <h3>{{ __('Resource Center') }}</h3>
                        <a href="{{ route('frontend.resource_center.create') }}"
                           class="primary-btn small fix-gr-bg ml-3"
                           title="Add Resource">Add Resource</a>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3 table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th scope="col">{{ __('common.Title') }}</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">File</th>
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($resources as $key => $resource)
                                        <tr>
                                            <th><span class="m-3">{{ $key + 1 }}</span></th>
                                            <td>
                                                <strong>{{ $resource->name }}</strong>
                                                @if($resource->short_description)
                                                    <br><small class="text-muted">{{ \Illuminate\Support\Str::limit($resource->short_description, 80) }}</small>
                                                @endif
                                            </td>
                                            <td>{{ $resource->category_label }}</td>
                                            <td>
                                                @if($resource->is_featured)
                                                    <span class="badge badge-success">Featured</span>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($resource->file_path)
                                                    <span class="badge badge-info">PDF</span>
                                                @else
                                                    <span class="text-muted">No file</span>
                                                @endif
                                            </td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox{{ $resource->id }}">
                                                    <input type="checkbox" class="status_enable_disable"
                                                           id="active_checkbox{{ $resource->id }}"
                                                           @if ($resource->status == 1) checked @endif
                                                           value="{{ $resource->id }}">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                           href="{{ route('frontend.resource_center.edit', $resource->id) }}">{{ __('common.Edit') }}</a>
                                                        <a onclick="confirm_modal('{{ route('frontend.resource_center.destroy', $resource->id) }}');"
                                                           class="dropdown-item">{{ __('common.Delete') }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">No resources added yet.</td>
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
