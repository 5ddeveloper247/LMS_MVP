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
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">
                                        @if(!isset($tab))
                                            Add Resource
                                        @else
                                            {{ __('common.Update') }} Resource
                                        @endif
                                    </h3>
                                    <a href="{{ route('frontend.resource_center.index') }}"
                                       class="primary-btn small fix-gr-bg ml-3"
                                       style="position: absolute; right: 0; margin-right: 15px;">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box">
                        @if (isset($tab))
                            <form action="{{ route('frontend.resource_center.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $tab->id }}">
                        @else
                            <form action="{{ route('frontend.resource_center.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                        @endif

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="name">Resource Name *</label>
                                    <input name="name" id="name"
                                           class="primary_input_field {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           type="text"
                                           value="{{ isset($tab) ? $tab->name : old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="short_description">Short Description *</label>
                                    <textarea name="short_description" id="short_description" rows="4"
                                              class="primary_input_field {{ $errors->has('short_description') ? 'is-invalid' : '' }}">{{ isset($tab) ? $tab->short_description : old('short_description') }}</textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ $errors->first('short_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="category">Category *</label>
                                    <select name="category" id="category"
                                            class="primary_input_field {{ $errors->has('category') ? 'is-invalid' : '' }}">
                                        @foreach(\Modules\FrontendManage\Entities\ResourceTab::categories() as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('category', $tab->category ?? \Modules\FrontendManage\Entities\ResourceTab::CATEGORY_STUDENT) === $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label">Featured Resource</label>
                                    <div class="d-flex align-items-start">
                                        <label class="primary_checkbox mr-3 flex-shrink-0" for="is_featured">
                                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                                   {{ old('is_featured', $tab->is_featured ?? false) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <div>
                                            <label for="is_featured" class="mb-1 d-block" style="cursor: pointer; font-weight: 500; line-height: 1.5;">
                                                Mark as featured for this category
                                            </label>
                                            <small class="text-muted d-block">Only one featured resource per category.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="file">
                                        PDF File @if(!isset($tab))*@endif
                                    </label>
                                    <div class="primary_file_uploader">
                                        <input class="primary-input filePlaceholder" type="text" readonly="">
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg" for="resource_file">{{ __('common.Browse') }}</label>
                                            <input type="file" class="d-none fileUpload" name="file" id="resource_file" accept=".pdf,application/pdf">
                                        </button>
                                    </div>
                                    @if(isset($tab) && $tab->file_path)
                                        <small class="text-muted d-block mt-2">Current file uploaded. Leave empty to keep existing file.</small>
                                    @endif
                                    @if ($errors->has('file'))
                                        <span class="invalid-feedback d-block mb-10" role="alert">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <div class="d-flex justify-content-center pt_20">
                                    <button type="submit" class="primary-btn semi_large fix-gr-bg">
                                        <i class="ti-check"></i>
                                        @if(!isset($tab))
                                            {{ __('common.Save') }}
                                        @else
                                            {{ __('common.Update') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
