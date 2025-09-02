@extends('backend.master')

@section('table')
    @php
        $table_name='how_programs_work';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> @if(!isset($slider))
                                            Add New Tile
                                        @else
                                            {{__('common.Update')}}
                                        @endif</h3>
                                    @if(isset($slider))

                                        <a href="{{route('frontend.how_programs_work.index')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           style="position: absolute;  right: 0;   margin-right: 15px;"
                                           title="{{__('coupons.Add')}}">+ </a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        @if (isset($slider))
                            <form action="{{route('frontend.how_programs_work.update')}}" method="POST" id="coupon-form"
                                  name="coupon-form"
                                  enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$slider->id}}">
                                @else
                                    <form action="{{route('frontend.how_programs_work.store') }}" method="POST"
                                          id="coupon-form"
                                          name="coupon-form" enctype="multipart/form-data">

                                        @endif
                                        @csrf
                                        <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('common.Title') }}</label>
                                                        <input name="title" id="title" maxlength="50"
                                                               class="primary_input_field name {{ @$errors->has('title') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Title') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->title:old('title')}}" {{$errors->has('title') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('title') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 d-none">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('common.Sub Title') }}</label>
                                                        <input name="sub_title" id="sub_title"
                                                               class="primary_input_field name {{ @$errors->has('sub_title') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Sub Title') }}"
                                                               type="text"
                                                               value="{{isset($slider)?$slider->sub_title:old('sub_title')}}" {{$errors->has('sub_title') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('sub_title'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('sub_title') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">Sequence #</label>
                                                        <select name="seq_no" id="seq_no"
                                                               class="primary_input_field name {{ @$errors->has('seq_no') ? ' is-invalid' : '' }}"
                                                               {{$errors->has('seq_no') ? 'autofocus' : ''}}>
                                                            <option value="1"  @if(isset($slider) && $slider->seq_no == 1) selected @endif>1</option>
                                                            <option value="2" @if(isset($slider) && $slider->seq_no == 2) selected @endif>2</option>
                                                            <option value="3" @if(isset($slider) && $slider->seq_no == 3) selected @endif>3</option>
                                                            <option value="4" @if(isset($slider) && $slider->seq_no == 4) selected @endif>4</option>
                                                        </select>
                                                        @if ($errors->has('seq_no'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('seq_no') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">Text</label>
                                                        <textarea name="text" id="text"
                                                               class="primary_input_field name {{ @$errors->has('text') ? ' is-invalid' : '' }}" maxlength="150"
                                                               placeholder="{{ __('Slider Text') }}" required>{{(isset($slider) && $slider->text != null)?$slider->text:old('text')}}</textarea>
                                                        @if ($errors->has('text'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('text') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{__('frontendmanage.Image')}}*
                                                        <small>({{__('common.Recommended Size')}} 100×100)</small>
                                                    </label>
                                                    <div class="primary_file_uploader">
                                                        <input class="primary-input filePlaceholder" type="text"
                                                               placeholder="{{isset($slider) && $slider->image ? showPicName($slider->image) :__('virtual-class.Browse Image file')}}"
                                                               readonly="" {{ $errors->has('image') ? ' autofocus' : '' }}>
                                                        <button class="" type="button">
                                                            <label class="primary-btn small fix-gr-bg"
                                                                   for="document_file1">{{__('common.Browse')}}</label>
                                                            <input type="file"
                                                                   class="d-none fileUpload" name="image"
                                                                   id="document_file1">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 text-center">
                                                <div class="d-flex justify-content-center pt_20">
                                                    <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                            id="save_button_parent">
                                                        <i class="ti-check"></i>
                                                        @if(!isset($slider))
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
                <div class="col-lg-9 ">
                    <div class="main-title">
                        <h3 class="mb-20">Tiles List</h3>
                    </div>

                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table id="lms_table" class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                            <th scope="col">{{ __('common.Title') }}</th>
                                            <th scope="col">Sequence #</th>
                                        <th scope="col">{{ __('common.Image') }}</th>
                                       
                                        <th scope="col">{{ __('common.Status') }}</th>
                                        <th scope="col">{{ __('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key => $slide)
                                        <tr>
                                            <th><span class="m-3">{{ $key+1 }}</span></th>
                                                <td>{{@$slide->title }}</td>
                                                <td>{{@$slide->seq_no  ?? ''}}</td>
                                            <td>
                                                <div>
                                                    @if($slide->image && $slide->image != '')
                                                    <img style="max-width: 100px" src="{{asset(@$slide->image)}}"
                                                         alt=""
                                                         class="img img-responsive m-2">
                                                    @else
                                                        --Image not available--
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox{{@$slide->id }}">
                                                    <input type="checkbox" class="status_enable_disable"
                                                           id="active_checkbox{{@$slide->id }}"
                                                           @if (@$slide->status == 1) checked
                                                           @endif value="{{@$slide->id }}">
                                                    <i class="slider round"></i>
                                                </label>
                                            </td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">

                                                        <a class="dropdown-item edit_brand"
                                                           href="{{route('frontend.how_programs_work.edit',$slide->id)}}">{{__('common.Edit')}}</a>


                                                        <a onclick="confirm_modal('{{route('frontend.how_programs_work.destroy', $slide->id)}}');"
                                                           class="dropdown-item edit_brand">{{__('common.Delete')}}</a>

                                                    </div>
                                                </div>
                                                <!-- shortby  -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!isset($slider))
                <div class="col-lg-12">
                    <div class="white-box mt-3">
                        <div class="main-title d-md-flex mb-3 py-3">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">Program Features</h3>
                        </div>
                        <form action="{{route('frontend.how_programs_work.settingSubmit')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Title 1</label>
                                        <input name="how_program_works_feature_title_1" id="how_program_works_feature_title_1" maxlength="50"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_title_1') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('frontendmanage.Title') }}"
                                                type="text"
                                                value="{{Settings('how_program_works_feature_title_1')}}" {{$errors->has('how_program_works_feature_title_1') ? 'autofocus' : ''}}>
                                        @if ($errors->has('how_program_works_feature_title_1'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_title_1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Text 1</label>
                                        <textarea name="how_program_works_feature_text_1" id="how_program_works_feature_text_1"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_text_1') ? ' is-invalid' : '' }}" maxlength="150"
                                                placeholder="Text">{{Settings('how_program_works_feature_text_1') ?? ''}}</textarea>
                                        @if ($errors->has('how_program_works_feature_text_1'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_text_1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Title 2</label>
                                        <input name="how_program_works_feature_title_2" id="how_program_works_feature_title_2" maxlength="50"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_title_1') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('frontendmanage.Title') }}"
                                                type="text"
                                                value="{{Settings('how_program_works_feature_title_2')}}" {{$errors->has('how_program_works_feature_title_2') ? 'autofocus' : ''}}>
                                        @if ($errors->has('how_program_works_feature_title_2'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_title_2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Text 2</label>
                                        <textarea name="how_program_works_feature_text_2" id="how_program_works_feature_text_2"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_text_2') ? ' is-invalid' : '' }}" maxlength="150"
                                                placeholder="Text">{{Settings('how_program_works_feature_text_2') ?? ''}}</textarea>
                                        @if ($errors->has('how_program_works_feature_text_2'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_text_2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Title 3</label>
                                        <input name="how_program_works_feature_title_3" id="how_program_works_feature_title_3" maxlength="50"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_title_1') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('frontendmanage.Title') }}"
                                                type="text"
                                                value="{{Settings('how_program_works_feature_title_3')}}" {{$errors->has('how_program_works_feature_title_3') ? 'autofocus' : ''}}>
                                        @if ($errors->has('how_program_works_feature_title_3'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_title_3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Text 3</label>
                                        <textarea name="how_program_works_feature_text_3" id="how_program_works_feature_text_3"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_text_3') ? ' is-invalid' : '' }}" maxlength="150"
                                                placeholder="Text">{{Settings('how_program_works_feature_text_3') ?? ''}}</textarea>
                                        @if ($errors->has('how_program_works_feature_text_3'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_text_3') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Title 4</label>
                                        <input name="how_program_works_feature_title_4" id="how_program_works_feature_title_4" maxlength="50"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_title_4') ? ' is-invalid' : '' }}"
                                                placeholder="{{ __('frontendmanage.Title') }}"
                                                type="text"
                                                value="{{Settings('how_program_works_feature_title_4')}}" {{$errors->has('how_program_works_feature_title_4') ? 'autofocus' : ''}}>
                                        @if ($errors->has('how_program_works_feature_title_4'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_title_4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label"
                                                for="">Feature Text 4</label>
                                        <textarea name="how_program_works_feature_text_4" id="how_program_works_feature_text_4"
                                                class="primary_input_field name {{ @$errors->has('how_program_works_feature_text_4') ? ' is-invalid' : '' }}" maxlength="150"
                                                placeholder="Text">{{Settings('how_program_works_feature_text_4') ?? ''}}</textarea>
                                        @if ($errors->has('how_program_works_feature_text_4'))
                                            <span class="invalid-feedback d-block mb-10"
                                                    role="alert">
                                            <strong>{{ @$errors->first('how_program_works_feature_text_4') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="d-flex justify-content-center pt_20">
                                        <button type="submit" class="primary-btn semi_large fix-gr-bg">
                                            <i class="ti-check"></i>
                                                {{ __('common.Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                                    
                </div>
                @endif
            </div>
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="view_details">

    </div>


    @include('backend.partials.delete_modal')
@endsection
@push('scripts')
    <script>

        $("input[name='btn_type1']").change(function () {
            var type = $("input[name='btn_type1']:checked").val();
            if (type == 0) {
                $('#btn_title1').hide();
                $('#btn_image1').show();
            } else {
                $('#btn_title1').show();
                $('#btn_image1').hide();
            }
        });

        $("input[name='btn_type2']").change(function () {
            var type = $("input[name='btn_type2']:checked").val();
            if (type == 0) {
                $('#btn_title2').hide();
                $('#btn_image2').show();
            } else {
                $('#btn_title2').show();
                $('#btn_image2').hide();
            }
        });

        $(document).ready(function () {
            $("input[name='btn_type1']").trigger('change');
            $("input[name='btn_type2']").trigger('change');
        });


    </script>
@endpush
