@extends('backend.master')

@section('table')
    @php
        $currentTheme = currentTheme();
        if($currentTheme=='wetech'){
                $currentTheme='infixlmstheme';
            }
            $table_name='sliders';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 ">


                    <div class="">
                        <div class="row">

                            <div class="col-lg-12">
                                    <!-- General -->
                                    <div class="white_box_30px">
                                        <div class="main-title mb-25">


                                            <form action="{{route('frontend.sliders.setting')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                                @csrf
                                                <div class="single_system_wrap">


                                                    @if(hasDynamicPage())
                                                        <div class="row">

                                                            <div class="col-xl-4">
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'slider_banner','en'))}}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-8">
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <label
                                                                        class="primary_input_label"
                                                                        for="">{{ __('frontendmanage.Homepage Banner') }}
                                                                        <small>({{__('common.Recommended Size')}}
                                                                            450X656                                                                                                )
                                                                        </small>
                                                                    </label>
                                                                    <div
                                                                        class="primary_file_uploader">
                                                                        <input
                                                                            class="primary-input  filePlaceholder {{ @$errors->has('slider_banner') ? ' is-invalid' : '' }}"
                                                                            type="text"
                                                                            id=""
                                                                            placeholder="Browse file"
                                                                            readonly="" {{ $errors->has('slider_banner') ? ' autofocus' : '' }}>
                                                                        <button class=""
                                                                                type="button">
                                                                            <label
                                                                                class="primary-btn small fix-gr-bg"
                                                                                for="file5">{{ __('common.Browse') }}</label>
                                                                            <input
                                                                                type="file"
                                                                                class="d-none fileUpload imgInput5"
                                                                                name="slider_banner"
                                                                                id="file5">
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <label
                                                                        class="primary_input_label"
                                                                        for="">{{__('frontendmanage.Homepage Banner Title')}} </label>
                                                                    <input
                                                                        class="primary_input_field"
                                                                        {{ $errors->has('slider_title') ? ' autofocus' : '' }}
                                                                        placeholder="{{__('frontendmanage.Homepage Banner Title')}}"
                                                                        type="text"
                                                                        name="slider_title"
                                                                        value="{{isset($home_content)? getRawHomeContents($home_content,'slider_title','en') : ''}}">
                                                                </div>
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <label
                                                                        class="primary_input_label"
                                                                        for="">{{ __('frontendmanage.Homepage Banner Text') }} </label>
                                                                    <input
                                                                        class="primary_input_field"
                                                                        placeholder="{{ __('frontendmanage.Homepage Banner Text') }}"
                                                                        type="text"
                                                                        name="slider_text"
                                                                        {{ $errors->has('slider_text') ? ' autofocus' : '' }}
                                                                        value="{{isset($home_content)? getRawHomeContents($home_content,'slider_text','en') : ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3">

                                                                <div class="mb_25">
                                                                    <label
                                                                        class="switch_toggle "
                                                                        for="show_menu_search_box">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="status_enable_disable"
                                                                            name="show_menu_search_box"
                                                                            id="show_menu_search_box"
                                                                            @if (@getRawHomeContents($home_content,'show_menu_search_box','en') == 1) checked
                                                                            @endif value="1">
                                                                        <i class="slider round"></i>


                                                                    </label>
                                                                    {{__('frontendmanage.Show Menu Search Box')}}

                                                                </div>


                                                            </div>

                                                            @if($currentTheme=="infixlmstheme")
                                                                <div class="col-xl-3">

                                                                    <div class="mb_25">
                                                                        <label
                                                                            class="switch_toggle "
                                                                            for="show_banner_search_box">
                                                                            <input
                                                                                type="checkbox"
                                                                                class="status_enable_disable"
                                                                                name="show_banner_search_box"
                                                                                id="show_banner_search_box"
                                                                                @if (@getRawHomeContents($home_content,'show_banner_search_box','en') == 1) checked
                                                                                @endif value="1">
                                                                            <i class="slider round"></i>


                                                                        </label>
                                                                        {{__('frontendmanage.Show Banner Search Box')}}

                                                                    </div>
                                                                </div>
                                                            @endif


                                                        </div>

                                                        <hr>
                                                    @endif

                                                    <div class="row d-none">
                                                        <div class="col-xl-6">
                                                            <div class="primary_input mb-25">
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <label class="primary_input_label"
                                                                               for="">  {{__('frontendmanage.Slider')}} {{__('common.Transition time')}}</label>
                                                                    </div>
                                                                    <div class="col-md-6 mb-25">
                                                                        <input class="primary_input_field"
                                                                               placeholder="{{__('common.Transition time')}}"
                                                                               type="number"
                                                                               name="slider_transition_time"
                                                                               min="1"
                                                                               value="{{Settings('slider_transition_time')?Settings('slider_transition_time'):5}}">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="white_box_30px">
                                    <div class="white_box_tittle list_header">
                                            <h4>Homepage Page Program Plan</h4>
                                        </div>
                                    <div class="main-title mb-25">
                                        <form action="{{route('frontend.sliders.setting2')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'featured_programplan_bg','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'featured_programplan_bg','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">
                                                        <div
                                                                    class="primary_input mb-25">
                                                                    <label
                                                                        class="primary_input_label"
                                                                        for="">Featured Program Plan Background
                                                                        <small>({{__('common.Recommended Size')}}
                                                                            1600X270                                                                                              )
                                                                        </small>
                                                                    </label>
                                                                    <div
                                                                        class="primary_file_uploader">
                                                                        <input
                                                                            class="primary-input  filePlaceholder {{ @$errors->has('featured_programplan_bg') ? ' is-invalid' : '' }}"
                                                                            type="text"
                                                                            id=""
                                                                            placeholder="Browse file"
                                                                            readonly="" {{ $errors->has('featured_programplan_bg') ? ' autofocus' : '' }}>
                                                                        <button class=""
                                                                                type="button">
                                                                            <label
                                                                                class="primary-btn small fix-gr-bg"
                                                                                for="file6">{{ __('common.Browse') }}</label>
                                                                            <input
                                                                                type="file"
                                                                                class="d-none fileUpload imgInput5"
                                                                                name="featured_programplan_bg"
                                                                                id="file6">
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Featured Program Plan</label>
                                                            <select
                                                                class="primary_input_field"
                                                                name="featured_programplan"
                                                                {{ $errors->has('featured_programplan') ? ' autofocus' : '' }}>
                                                                <option disabled selected>Select..</option>
                                                                @foreach ($program_plans as $item)
                                                                    <option value="{{$item->id}}" @if(getRawHomeContents($home_content,'featured_programplan','en') == $item->id) selected @endif> {{$item->programName->programtitle}} - ({{$item->sdate}} to {{$item->edate}}) </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="white_box_30px">
                                    <div class="main-title mb-25">
                                        <div class="white_box_tittle list_header">
                                            <h4>Florida Remedial Page Program Plan</h4>
                                        </div>
                                        <form action="{{route('frontend.sliders.settingFlorida')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'florida_programplan_bg','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'florida_programplan_bg','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">
                                                        <div
                                                                    class="primary_input mb-25">
                                                                    <label
                                                                        class="primary_input_label"
                                                                        for="">Florida Program Plan Background
                                                                        <small>({{__('common.Recommended Size')}}
                                                                            1600X270                                                                                              )
                                                                        </small>
                                                                    </label>
                                                                    <div
                                                                        class="primary_file_uploader">
                                                                        <input
                                                                            class="primary-input  filePlaceholder {{ @$errors->has('floridaprogramplan_bg') ? ' is-invalid' : '' }}"
                                                                            type="text"
                                                                            id=""
                                                                            placeholder="Browse file"
                                                                            readonly="" {{ $errors->has('florida_programplan_bg') ? ' autofocus' : '' }}>
                                                                        <button class=""
                                                                                type="button">
                                                                            <label
                                                                                class="primary-btn small fix-gr-bg"
                                                                                for="fileFlorida">{{ __('common.Browse') }}</label>
                                                                            <input
                                                                                type="file"
                                                                                class="d-none fileUpload imgInput5"
                                                                                name="florida_programplan_bg"
                                                                                id="fileFlorida">
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Florida Program Plan</label>
                                                            <select
                                                                class="primary_input_field"
                                                                name="florida_programplan"
                                                                {{ $errors->has('featured_programplan') ? ' autofocus' : '' }}>
                                                                <option disabled selected>Select..</option>
                                                                @foreach ($program_plans as $item)
                                                                    <option value="{{$item->id}}" @if(getRawHomeContents($home_content,'florida_programplan','en') == $item->id) selected @endif> {{$item->programName->programtitle}} - ({{$item->sdate}} to {{$item->edate}}) </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="white_box_30px">
                                    <div class="main-title mb-25">
                                        <div class="white_box_tittle list_header">
                                            <h4>Homepage Tile 1</h4>
                                        </div>
                                        <form action="{{route('frontend.sliders.setting3')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'home_tile1_image','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'home_tile1_image','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 1 Title</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile1_title') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile1_title"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_title','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 1 Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile1_text') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile1_text"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_text','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 1 Button Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile1_btntext') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile1_btntext"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_btntext','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 1 Button Link</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile1_btnlink') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile1_btnlink"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile1_btnlink','en') : ''}}">
                                                        </div>

                                                        
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Home Tile 1 Image
                                                                <small>({{__('common.Recommended Size')}}
                                                                    373X190                                                                                          )
                                                                </small>
                                                            </label>
                                                            <div
                                                                class="primary_file_uploader">
                                                                <input
                                                                    class="primary-input  filePlaceholder {{ @$errors->has('home_tile1_image') ? ' is-invalid' : '' }}"
                                                                    type="text"
                                                                    id=""
                                                                    placeholder="Browse file"
                                                                    readonly="" {{ $errors->has('home_tile1_image') ? ' autofocus' : '' }}>
                                                                <button class=""
                                                                        type="button">
                                                                    <label
                                                                        class="primary-btn small fix-gr-bg"
                                                                        for="file9">{{ __('common.Browse') }}</label>
                                                                    <input
                                                                        type="file"
                                                                        class="d-none fileUpload imgInput5"
                                                                        name="home_tile1_image"
                                                                        id="file9">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                        <hr />
                                    </div>
                                    <div class="main-title mb-25">
                                        <div class="white_box_tittle list_header">
                                            <h4>Homepage Tile 2</h4>
                                        </div>
                                        <form action="{{route('frontend.sliders.setting4')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'home_tile2_image','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'home_tile2_image','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 2 Title</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile2_title') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile2_title"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile2_title','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 2 Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile2_text') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile2_text"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile2_text','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 2 Button Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile2_btntext') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile2_btntext"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile2_btntext','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Homepage Tile 2 Button Link</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('home_tile2_btnlink') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="home_tile2_btnlink"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'home_tile2_btnlink','en') : ''}}">
                                                        </div>

                                                        
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Home Tile 2 Image
                                                                <small>({{__('common.Recommended Size')}}
                                                                    373X190                                                                                            )
                                                                </small>
                                                            </label>
                                                            <div
                                                                class="primary_file_uploader">
                                                                <input
                                                                    class="primary-input  filePlaceholder {{ @$errors->has('home_tile2_image') ? ' is-invalid' : '' }}"
                                                                    type="text"
                                                                    id=""
                                                                    placeholder="Browse file"
                                                                    readonly="" {{ $errors->has('home_tile2_image') ? ' autofocus' : '' }}>
                                                                <button class=""
                                                                        type="button">
                                                                    <label
                                                                        class="primary-btn small fix-gr-bg"
                                                                        for="file8">{{ __('common.Browse') }}</label>
                                                                    <input
                                                                        type="file"
                                                                        class="d-none fileUpload imgInput5"
                                                                        name="home_tile2_image"
                                                                        id="file8">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                        <hr />
                                    </div>
                                    <div class="main-title mb-25">
                                        <div class="white_box_tittle list_header">
                                            <h4>Instructor Tile 1</h4>
                                        </div>
                                        <form action="{{route('frontend.sliders.setting5')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'instructor_tile1_image','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'instructor_tile1_image','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 1 Title</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile1_title') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile1_title"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile1_title','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 1 Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile1_text') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile1_text"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile1_text','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 1 Button Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile1_btntext') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile1_btntext"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile1_btntext','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 1 Button Link</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile1_btnlink') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile1_btnlink"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile1_btnlink','en') : ''}}">
                                                        </div>

                                                        
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 1 Image
                                                                <small>({{__('common.Recommended Size')}}
                                                                    373X190                                                                                       )
                                                                </small>
                                                            </label>
                                                            <div
                                                                class="primary_file_uploader">
                                                                <input
                                                                    class="primary-input  filePlaceholder {{ @$errors->has('instructor_tile1_image') ? ' is-invalid' : '' }}"
                                                                    type="text"
                                                                    id=""
                                                                    placeholder="Browse file"
                                                                    readonly="" {{ $errors->has('instructor_tile1_image') ? ' autofocus' : '' }}>
                                                                <button class=""
                                                                        type="button">
                                                                    <label
                                                                        class="primary-btn small fix-gr-bg"
                                                                        for="file7">{{ __('common.Browse') }}</label>
                                                                    <input
                                                                        type="file"
                                                                        class="d-none fileUpload imgInput5"
                                                                        name="instructor_tile1_image"
                                                                        id="file7">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                        <hr />
                                    </div>
                                    <div class="main-title mb-25">
                                        <div class="white_box_tittle list_header">
                                            <h4>Instructor Tile 2</h4>
                                        </div>
                                        <form action="{{route('frontend.sliders.setting6')}}" id="" method="POST"
                                                  enctype="multipart/form-data">

                                            @csrf
                                            <div class="single_system_wrap">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4">
                                                        @if(getRawHomeContents($home_content,'instructor_tile2_image','en') != '')
                                                                <div
                                                                    class="primary_input mb-25">
                                                                    <img
                                                                        class="  imagePreview5"
                                                                        style="max-width: 100%"
                                                                        src="{{ asset('/'.getRawHomeContents($home_content,'instructor_tile2_image','en'))}}"
                                                                        alt="">
                                                                </div>
                                                        @else
                                                            <h4>--No Background Image Found!--</h4>
                                                            
                                                        @endif
                                                            </div>
                                                    <div class="col-xl-8">

                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 2 Title</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile2_title') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile2_title"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile2_title','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 2 Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile2_text') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile2_text"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile2_text','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 2 Button Text</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile2_btntext') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile2_btntext"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile2_btntext','en') : ''}}">
                                                        </div>
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 2 Button Link</label>
                                                            <input
                                                                class="primary_input_field"
                                                                {{ $errors->has('instructor_tile2_btnlink') ? ' autofocus' : '' }}
                                                                type="text"
                                                                name="instructor_tile2_btnlink"
                                                                value="{{isset($home_content)? getRawHomeContents($home_content,'instructor_tile2_btnlink','en') : ''}}">
                                                        </div>

                                                        
                                                        <div
                                                            class="primary_input mb-25">
                                                            <label
                                                                class="primary_input_label"
                                                                for="">Instructor Tile 2 Image
                                                                <small>({{__('common.Recommended Size')}}
                                                                    373X190                                                                                              )
                                                                </small>
                                                            </label>
                                                            <div
                                                                class="primary_file_uploader">
                                                                <input
                                                                    class="primary-input  filePlaceholder {{ @$errors->has('instructor_tile2_image') ? ' is-invalid' : '' }}"
                                                                    type="text"
                                                                    id=""
                                                                    placeholder="Browse file"
                                                                    readonly="" {{ $errors->has('instructor_tile2_image') ? ' autofocus' : '' }}>
                                                                <button class=""
                                                                        type="button">
                                                                    <label
                                                                        class="primary-btn small fix-gr-bg"
                                                                        for="file11">{{ __('common.Browse') }}</label>
                                                                    <input
                                                                        type="file"
                                                                        class="d-none fileUpload imgInput5"
                                                                        name="instructor_tile2_image"
                                                                        id="file11">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit_btn  mt-4">
                                                    <button class="primary-btn small fix-gr-bg" type="submit"
                                                            data-toggle="tooltip" title="" id="general_info_sbmt_btn"><i
                                                            class="ti-check"></i> {{__('common.Save')}}
                                                    </button>
                                                </div>
                                        </form>
                                        <hr />
                                    </div>
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
@push('scripts')

@endpush
