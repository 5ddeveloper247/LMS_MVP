@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('public/backend/css/student_list.css') }}" />
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .image-editor-preview-img-1 {
            width: 180px;
            height: 90px;
            object-fit: contain;
        }
        .selectProgram{
            cursor: pointer;
        }
        ul.suggestions{
            max-height: 300px;
            overflow-y: auto;
        }
        .clear_area{
            color: #f0742c;
            font-size: 16px;
        }
    </style>
@endpush


@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-title">
                        <h3>{{ __('Program') }}</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('addprogram') }}" method="POST" enctype="multipart/form-data" id="program_add_form"
                  data-program-id=""
                  data-other-fl-bon-id="{{ $otherFlBonRemediationProgram->id ?? '' }}"
                  data-other-fl-bon-title="{{ $otherFlBonRemediationProgram->programtitle ?? '' }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">


                        <div class="white-box">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="main-title">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program Title <small>(Max size
                                                    100 Characters)</small> *</label>
                                            <input class="primary_input_field @if($errors->has('title')) border-danger @endif" id="ProgramTitle" name="ProgramTitle" placeholder="-"
                                                maxlength="100" type="text"
                                                {{ $errors->has('title') ? 'autofocus' : '' }}
                                                value="{{ old('ProgramTitle') }}" maxlength="100" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program subtitle/greetings
                                                <small>(Max size 250 Characters; also large heading on FL BON spotlight card)</small> *</label>
                                            <input class="primary_input_field @if($errors->first('subtitle')) border-danger @endif" name="subtitle" placeholder="-"
                                                id="subtitle" maxlength="250" type="text"
                                                {{ $errors->has('title') ? 'autofocus' : '' }}
                                                value="{{ old('subtitle') }}" maxlength="250" required>
                                        </div>
                                    </div>
                                </div>

                                @php $programListing = null; @endphp
                                @include('studentsetting::partials.program_admin_section_label')

                                <div class="row mb-10">
                                    <div class="col-xl-12">
                                        <label>Is FL BON Remediation Program <small class="text-muted">(shows spotlight on /programs; only one at a time)</small></label>
                                        @error('is_fl_bon_remediation')
                                            <p class="text-danger mb-0" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                        <div class="d-flex py-3">
                                            <label class="primary_checkbox d-flex nowrap mr-5" for="flBonRemediationYes">
                                            <input type="radio" id="flBonRemediationYes"
                                                name="is_fl_bon_remediation"
                                                value="1" {{ old('is_fl_bon_remediation') === '1' ? 'checked' : '' }}>
                                            <span class="checkmark mr-2"></span>
                                            {{ __('Yes') }}</label>
                                            <label class="primary_checkbox d-flex nowrap mr-5" for="flBonRemediationNo">
                                            <input type="radio" id="flBonRemediationNo"
                                                name="is_fl_bon_remediation"
                                                value="0" {{ old('is_fl_bon_remediation', '0') !== '1' ? 'checked' : '' }}>
                                            <span class="checkmark mr-2"></span>
                                            {{ __('No') }}</label>
                                        </div>
                                    </div>
                                </div>
                                @include('studentsetting::partials.program_featured_dependent_fields')

                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-5">
                                        <label class="primary_input_label">
                                            Program Thumbnail (Max 2MB, Recommended 1170×600 — crop to fit)

                                        </label>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="primary_input mb-35">
                                            <div class="primary_file_uploader" id="image_file-1">
                                                <input class="primary-input filePlaceholder" type="text" id="input-1"
                                                    {{ $errors->has('image') ? 'autofocus' : '' }}
                                                    placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                                <button onclick="destroyCropper1()" class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" id="avatar"
                                                        for="document_file_thumb-1">{{ __('common.Browse') }}</label>
                                                    <input type="file" class="d-none fileUpload upload-editor-1"
                                                        name="image" id="document_file_thumb-1" accept=".png,.jpg,.jpeg">
                                                    <input type="hidden" name="hidden_file" id="cropper_img"
                                                        class="upload-editor-hidden-file-1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 text-center">
                                        <img src="{{ asset('public/assets/course/no_image.png') }}"
                                            class="preview image-editor-preview-img-1" id="image_preview-1" />
                                    </div>
                                    @php
                                        $oldfaqs = old('faqs') == null ? [] : old('faqs');
                                    @endphp
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="faqs">Select faqs *</label>
                                            <select name="faqs[]" id="faqs"
                                                class="multypol_check_select active mb-15 e1" multiple>
                                                @foreach ($faqs as $faq)
                                                    <option value="{{ $faq->id }}"
                                                        {{ in_array((string) $faq->id, $oldfaqs) ? 'selected' : '' }}>
                                                        {{ $faq->question }}@if($faq->category) ({{ $faq->category->name }})@endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-8">
                                        <div class="primary_input mb-25 position-relative">
                                            <label class="primary_input_label" for="">Auto Load Content</label>
                                            <input class="primary_input_field" id="searchForContent" placeholder="Search Program to autoload content..."type="text">
                                            <div class="search_programs position-absolute" style="z-index:10"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-30 d-none mb-40">
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program duration in
                                                weeks *</label>
                                            <input class="primary_input_field" name="duration" placeholder="-weeks"
                                                id="" type="number"
                                                {{ $errors->has('title') ? 'autofocus' : '' }} value="{{old('duration')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for=""> Program total cost *</label>
                                            <input class="primary_input_field" name="totalcost" placeholder="-"
                                                id="" type="text"
                                                {{ $errors->has('title') ? 'autofocus' : '' }} value="{{old('totalcost')}}" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program description * <small class="text-muted">(program detail page; also main paragraph on FL BON spotlight if enabled)</small> <i class="fa fa-retweet clear_area" data-field-id="description" title="Clear Text Area..."></i></label>
                                            <textarea class="custom_summernote" name="description" id="description" cols="30" rows="10" required>{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                @include('studentsetting::partials.program_listing_content_fields')

                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for=""> Program outcome * <i class="fa fa-retweet clear_area" data-field-id="outcome" title="Clear Text Area..."></i></label>
                                            <textarea class="custom_summernote" name="outcome" id="outcome" cols="30" rows="10" required>{{old('outcome')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for=""> Program requirements * <i class="fa fa-retweet clear_area" data-field-id="requirements" title="Clear Text Area..."></i></label>
                                            <textarea class="custom_summernote" name="requirements" id="requirements" cols="30" rows="10" required>{{old('requirements')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-30 mb-40">
                                    {{--                                          <div class="col-xl-6"> --}}

                                    {{--                                <div class="primary_input mb-25"> --}}
                                    {{--                                            <label class="primary_input_label" --}}
                                    {{--                                                   for="">Number of courses </label> --}}
                                    {{--                                            <input class="primary_input_field" name="numberofcourses" --}}
                                    {{--                                                   placeholder="-" --}}
                                    {{--                                                   id="" --}}
                                    {{--                                                   type="number" {{$errors->has('title') ? 'autofocus' : ''}} --}}
                                    {{--                                                   value="{{ old('numberofcourses') }}" > --}}
                                    {{--                                        </div> --}}
                                    {{--                                      </div> --}}

                                    @php
                                        $oldcourses = old('allcourses') == null ? [] : old('allcourses');
                                    @endphp
                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="allcourses">Select
                                                Courses *</label>
                                            <select name="allcourses[]" id="allcourses"
                                                class="multypol_check_select active mb-15 e1" multiple>
                                                @foreach ($courses as $courses1)
                                                    <option value="{{ $courses1->id }}"
                                                        {{ in_array((string) $courses1->id, $oldcourses) ? 'selected' : '' }}>
                                                        {{ $courses1->slug }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label"
                                                   for="assign_instructor">{{ __('SELECT REVIEW') }}
                                            </label>
                                            <select class="primary_select " name="review"
                                                    id="review"
                                             >
                                                <option
                                                    data-display="{{ __('common.Select') }} {{ __('Review') }}"
                                                    value="">{{ __('common.Select') }}
                                                    {{ __('Review') }} </option>
                                                @foreach ($reviews as $review)
                                                    @if(empty(\App\Models\User::find($review->user_id)))
                                                        @continue
                                                    @endif
                                                    @if(empty(\Modules\CourseSetting\Entities\Course::find($review->course_id)))
                                                        @continue
                                                    @endif
                                                    <option value="{{ $review->id }}"
                                                        {{ old('review') ? 'selected' : '' }}>
                                                        {{ !empty($review->course()) ? $review->course()->title : '' }} {{ \Illuminate\Support\Str::limit($review->comment,15) }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-30 mb-40">
                                    <div class="col-xl-12">

                                        <div class="primary_input mb-25">
                                            <label class="primary_input_label" for="">Program Costing Details * <i class="fa fa-retweet clear_area" data-field-id="payment_plan" title="Clear Text Area..."></i></label>
                                            <textarea class="custom_summernote" name="Payment_plan" id="Payment_plan" cols="30" rows="10">{{old('Payment_plan')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <a class="primary-btn semi_large2 fix-gr-bg" href="javascript:void(0)"
                                           onclick="program_add_form()"
                                          >
                                            <span class="ti-check"></span>
                                            {{ __('Submit') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- 1st Modal --}}
    <div class="modal fade admin-query" id="image-editor-modal-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop Program Image</h4>
                    <button type="button" class="close image-editor-cancel-button-1" onclick="destroyCropper1()">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body mx-auto">
                    <h3 class="text-center">{{ __('Customize Your Image For Thumbnail') }}</h3>
                    <small class="text-dark"><span class="text-danger">*</span> Image can be adjusted via Zoom in and Zoom
                        out</small>
                    <img id="image-editor-image-1" class="image-editor-preview-container-1 img-fluid"
                        src="https://avatars0.githubusercontent.com/u/3456749">
                    <div class="preview image-editor-preview image-editor-preview-container-1 ml-5"></div>
                    <div class="col-lg-12 text-center">
                        <div class="d-flex justify-content-between mt-40">
                            <button onclick="destroyCropper1()" type="button"
                                class="primary-btn tr-bg image-editor-cancel-button-1"
                                id="">{{ __('common.Cancel') }}</button>
                            <a id="image-editor-save-button-1" onclick="saveCropImage1()"
                                class="primary-btn semi_large2 fix-gr-bg">{{ __('Save') }}</a>
                            <a id="image-editor-crop-1" class="primary-btn semi_large2 fix-gr-bg">{{ __('crop') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script  src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
        @include('studentsetting::partials.program_admin_featured_toggle_script')
    @endpush
    <script>
        
            let editorInstance = {};
        $('#searchForContent').on('keyup focus',function(e) {
            var value = $(this).val();
            // if(value.length > 3){
                $.ajax({
                    type: "GET",
                    url: "{{ route('searchprogram') }}",
                    data: {
                        'name': value
                    },
                    dataType: "json",
                    success: function(response) {
                        let html = '';
                        if(response.status == 1){
                            html = html + '<div class="card p-2">'
                            html = html + '<h4>Suggested Results:</h4>'
                            html = html + '<ul class="suggestions my-2">';
                            if(response.data.length > 0){
                                $.each(response.data,function(i,d){
                                    html = html + `<li class="list-group-item selectProgram" data-id="${d.id}">${d.programtitle}</li>`;
                                });
                            }else{
                                html = html + `<li class="list-group-item">No matching program found!</li>`;
                            }
                            html = html + `</ul>
                                <button class="btn btn-warning clearSearch">Clear</buttonn>
                                </div>`;
                            
                        }
                        $('.search_programs').html(html);
                    }
                });

            // }else{
            //     $('.search_programs').html('');
            // }
        });
        
        $(document).on('click','.clearSearch',function(){
            $("#searchForContent").val('');  
            $('.search_programs').html('');
        });

        function program_add_form() {
            $('.preloader').show();
            var errors = [];
            isUnique(
                {
                    columns: [
                        ['programs', 'programtitle', $('#ProgramTitle').val()]
                    ]
                }
                , function (res) {
                    errors = [...res.errors]
                    var type = $(".addType[name='type']:checked").val(); // 1 for course, 7 for timetable, 2 for big quiz

                    if (isEmpty($('#ProgramTitle').val())) {
                        errors.push('Program Title is required');
                    }
                    if (isEmpty($('#subtitle').val())) {
                        errors.push('Program subtitle is required');
                    }
                    if (isEmpty($('#document_file_thumb-1').val()) && isEmpty($('#cropper_img').val())) {
                        errors.push("Program thumbnail is required");
                    }

                    if (isEmpty($('#faqs').val())) {
                        errors.push("FAQS is required");
                    }

                    if (isEmptyEditor('#description')) {
                        errors.push("Description is required");
                    }
                    if (isEmptyEditor('#outcome')) {
                        errors.push("Outcome is required");
                    }
                    if (isEmptyEditor('#requirements')) {
                        errors.push("Requirement is required");
                    }

                    if (isEmpty($('#allcourses').val())) {
                        errors.push("Courses is required");
                    }

                    if (isEmptyEditor('#Payment_plan')) {
                        errors.push("Program Costing Details is required");
                    }

                    if (errors.length) {
                        console.log(errors);
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function (index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                        return false;
                    }

                    $('#program_add_form').submit();
                });


        }
        function isEmptyEditor(id) {
            if (
                $(id).val() == '' ||
                $(id).val() == '<p><br><p/>' ||
                // $(id).summernote('isEmpty') ||
                // $(id).summernote('code') == '<p><br><p/>' ||
                $(id).next('.note-editor').find('.note-editing-area').find('.note-editable').children().first().html() == '<br>'
            ) {
                return true;
            }
            return false;
        }

        // Image Cropper Start
        $(document).ready(function() {
            var editorInstance = {};
        	var customFontFam = ['Arial','Helvetica','Cavolini','Jost','Impact','Tahoma','Verdana','Garamond','Georgia','monospace','fantasy','Papyrus','Poppins'];
            
            $('.custom_summernote').each(function (){
                var elId = $(this).attr('id');
                ClassicEditor
                .create( document.getElementById(elId),{
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload',['_token' => csrf_token()]) }}",
                    },
                    //extraPlugins: ['font'],
                //     fontFamily: {
                //         options: [
                //             'default',
                //             'Arial, Helvetica, sans-serif',
                //             'Courier New, Courier, monospace',
                //             'Georgia, serif',
                //             'Lucida Sans Unicode, Lucida Grande, sans-serif',
                //             'Tahoma, Geneva, sans-serif',
                //             'Times New Roman, Times, serif',
                //             'Trebuchet MS, Helvetica, sans-serif',
                //             'Verdana, Geneva, sans-serif'
                //         ],
                //         supportAllValues: true
                //     },
                //     fontSize: {
                //     options: [
                //         'tiny',
                //         'small',
                //         'default',
                //         'big',
                //         'huge'
                //     ]
                // },
                // fontColor: {
                //     columns: 5,
                //     documentColors: 10
                // },
                // fontBackgroundColor: {
                //     columns: 5,
                //     documentColors: 10
                // },
                mediaEmbed : {
                    previewsInData: true,
                    removeProviders: [ 'instagram', 'twitter', 'googleMaps', 'flickr', 'facebook' ],
                },
                        // fontSize: {
                        //     options: [
                        //         9,
                        //         11,
                        //         13,
                        //         'default',
                        //         17,
                        //         19,
                        //         21
                        //     ]
                        // },
                        fontSize: {
                            options: [
                                8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 32, 36, 40, 48, 56, 64, 72
                            ],
                            supportAllValues: true
                        },
                        fontFamily: {
                            options: customFontFam
                        },
                toolbar: {
			items: [
				'heading',
				'|',
				'bold',
				'italic',
				'link',
				'bulletedList',
				'numberedList',
				'|',
				'blockQuote',
				'fontFamily',
				'fontSize',
				'fontColor',
				'alignment',
				'outdent',
				'indent',
				'|',
				'insertTable',
				'imageInsert',
			//	'imageUpload',
				'mediaEmbed',
			//	'CKFinder',
			//	'codeBlock',
				'|',
				'undo',
				'redo'
			]
		},
		language: 'en',
		image: {
			toolbar: [
				// 'imageTextAlternative',
				// 'toggleImageCaption',
				'imageStyle:inline',
				'imageStyle:block',
				'imageStyle:side'
			],
            insert: {
                // This is the default configuration, you do not need to provide
                // this configuration key if the list content and order reflects your needs.
                integrations: [ 'upload', 'url' ]
            }
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
		}
                } )
                .then(editor => {
                    // Save the editor instance to use it later
                    window.editor = editor;
                    
                    editorInstance[elId] = editor;
                    // Listen to the change:data event
                    editor.model.document.on('change:data', () => {
                        // Get the editor content
                        const editorData = editor.getData();
                        // Update the textarea with the editor content
                        // document.querySelector('#editor').value = editorData;
                        $(this).val(editorData);
                    });
                })
                .catch( error => {
                    console.error( error );
                });
            });
            

            // 1st Cropper — any image up to 2MB; crop to 1170×600 (same as courses)
            var _URL1 = window.URL || window.webkitURL;
            var maxProgramThumbBytes = 2 * 1024 * 1024;
            $("#document_file_thumb-1").change(function(e) {
                var file, img;
                if ((file = this.files[0])) {
                    if (!file.type.startsWith('image/')) {
                        setTimeout(function() {
                            $('#input-1, #document_file_thumb-1').val('');
                            $("#image_preview-1").attr("src",
                                "{{ asset('public/assets/course/no_image.png') }}");
                        }, 500);
                        toastr.error('Please select a valid image file!', 'Error');
                        return;
                    }
                    if (file.size > maxProgramThumbBytes) {
                        $('#input-1, #document_file_thumb-1').val('');
                        $("#image_preview-1").attr("src",
                            "{{ asset('public/assets/course/no_image.png') }}");
                        toastr.error('Image size must be 2MB or less.', 'Error');
                        return;
                    }
                    img = new Image();
                    img.onload = function() {
                        jQuery('#image-editor-modal-1').modal('show', {
                            backdrop: 'static'
                        });
                    };
                    img.onerror = function() {
                        $('#input-1, #document_file_thumb-1').val('');
                        toastr.error('Please select a valid image file!', 'Error');
                    };
                    img.src = _URL1.createObjectURL(file);
                }
            });
            $('.image-editor-cancel-button-1').on('click', function() {
                if ($('#image_preview-1').attr('src') != '' || $('#image_preview-1').attr('src') != null) {
                    $('#image_file-1').children().val('');
                }
                $('#input-1, #document_file_thumb-1').val('');
                $('#image-editor-modal-1').trigger("reset");
                $('#image-editor-modal-1').modal('hide');
            });

        $(document).on('click','.selectProgram',function(){
            let id = $(this).attr('data-id');
            let base_url = $('#url').val();
            $.ajax({
                    type: "GET",
                    url: base_url + "/admin/program/search_details/" + id,
                    // data: {
                    //     'name': value
                    // },
                    dataType: "json",
                    success: function(response) {
                        if(response.status == 1){
                            $("#searchForContent").val(response.data.programtitle);
                            //  $('#ProgramTitle').val(response.data.programtitle);
                            editorInstance.description.setData(response.data.discription);
                            editorInstance.outcome.setData(response.data.outcome);
                            editorInstance.requirements.setData(response.data.requirement);
                            editorInstance.Payment_plan.setData(response.data.payment_plan);
                        }else{
                            // $('#ProgramTitle').val('');
                            $("#searchForContent").val('');  
                            editorInstance.description.setData('');
                            editorInstance.outcome.setData('');
                            editorInstance.requirements.setData('');
                            editorInstance.Payment_plan.setData('');
                        }
                        $('.search_programs').html('');
                    }
                });
        });

        $(document).on('click','.clear_area',function(){
            var field_id = $(this).attr('data-field-id');
            if(field_id != '' && field_id != undefined){
                if(field_id == 'description'){
                    editorInstance.description.setData('');
                }
                if(field_id == 'outcome'){
                    editorInstance.outcome.setData('');
                }
                if(field_id == 'requirements'){
                    editorInstance.requirements.setData('');
                }
                if(field_id == 'payment_plan'){
                    editorInstance.Payment_plan.setData('');
                }
            }
        });

        });
        // Image Cropper End

        $(".imgBrowse").change(function(e) {

            e.preventDefault();

            var file = $(this).closest('.primary_file_uploader').find('.imgName');

            var filename = $(this).val().split('\\').pop();

            file.val(filename);

        });
        $("#save_button_parent").click(function() {
            $(this).attr('disabled');
            $(this).find('span').attr('class', '').addClass('fa fa-spinner fa-spin fa-lg');
        });
    </script>
@endsection
