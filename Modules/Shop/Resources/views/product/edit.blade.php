@extends('backend.master')
@push('styles')
    <style>
        .image-editor-preview-img-1 {
            width: 100%;
            height: 85px;
            /* object-fit: contain; */
        }
    </style>
@endpush
@section('mainContent')
    @php
        $LanguageList = getLanguageList();
    @endphp
    
    <link rel="stylesheet" href="{{ asset('Modules/Blog/Resources/views/assets/taginput/tagsinput.css') }}" />

    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">


            <div class="white_box mb_30">
                <div class="white_box_tittle list_header">
                    <h4>{{ __('Update') }} {{ __('Product') }}</h4>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <!-- table-responsive -->
                            <div class="student-details header-menu">
                                
                                <form id="update_product_form" action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="product_id" name="product_id" value="{{@$product->id}}">
                                    
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="element">
                                            <div class="row">
                                                <div class="col-xl-12 mb-2">
                                                    <div class="d-flex flex-column">
                                                        <label class="primary_input_label">
                                                            {{ __('Type') }}
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <div class="d-flex">
                                                            <div class="mr-5">
                                                                <label for="type_product" class="d-flex align-items-center">
                                                                    <input type="radio" id="type_product" name="type" value="1" {{@$product->type == 1 ? 'checked' : ''}} disabled>
                                                                    <span class="checkmark mr-2"></span> Product
                                                                </label>
                                                            </div>
                                                            <div class="mr-4">
                                                                <label for="type_book" class="d-flex align-items-center">
                                                                    <input type="radio" id="type_book" name="type" value="2" {{@$product->type == 2 ? 'checked' : ''}} disabled>
                                                                    <span class="checkmark mr-2"></span> Book
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label" for="">
                                                            {{ __('Title') }}
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input class="primary_input_field" name="title" 
                                                            placeholder="-" type="text" value="{{ @$product->title }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label" for="">
                                                            {{ __('Sub-Title') }}
                                                            <strong class="text-danger">*</strong>
                                                        </label>
                                                        <input class="primary_input_field" name="sub_title" 
                                                            placeholder="-" type="text" value="{{ @$product->sub_title }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-35">
                                                        <label class="primary_input_label" for="">
                                                            {{ __('Short Description') }}
                                                        </label>
                                                        <textarea class="primary_input_field" name="short_description" id="short_description" cols="30"
                                                            rows="10">{{ @$product->short_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-35">
                                                        <label class="primary_input_label" for="">
                                                            {{ __('Description') }}
                                                        </label>
                                                        <textarea class="custom_summernote" name="description" id="description" cols="30"
                                                            rows="10">{{ @$product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="book_related_fields">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Author') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input class="primary_input_field" name="author" placeholder="-"
                                                    type="text" value="{{ @$product->author }}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Publisher') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input class="primary_input_field" name="publisher" placeholder="-"
                                                    type="text" value="{{ @$product->publisher }}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for="">
                                                    {{ __('Publication Date') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input class="primary_input_field primary-input date form-control"
                                                                    id="publication_date" type="text" name="publication_date"
                                                                    value="{{@$product->publication_date}}" autocomplete="off">{{-- getJsDateFormat(date('m/d/Y')) --}}
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--======================= Book Upload ====================== -->
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <label class="primary_input_label" for="">
                                                    {{ __('Book') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder placeholder_txt" type="text" id="input-1" placeholder="{{ @$product->book_pdf }}" readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="document_file_thumb_1">{{ __('common.Browse') }}</label>
                                                        <input type="file" class="d-none" name="book_pdf"
                                                            id="document_file_thumb_1" accept="pdf/*">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" id="">

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Price') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input class="primary_input_field" id="price" name="price" placeholder="00.00"
                                                    type="number" value="{{ @$product->price }}" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Tax Percent') }}
                                                    <strong class="text-danger">*</strong>
                                                </label>
                                                <input class="primary_input_field" id="tax_percent" name="tax_percent" placeholder="-"
                                                    type="number" value="{{ @$product->tax_percent }}" required>
                                            </div>
                                        </div>

                                        <!-- ======================== DISCOUNT FIELDS ==================== -->

                                        <div class="col-xl-6 courseBox mb-25">
                                            <label class="primary_input_label" for=""> 
                                                {{ __('Discount Type') }}
                                            </label>
                                            <select class="primary_select" name="discount_type" id="discount_type">
                                                <option value="">{{ __('Select Type') }}</option>
                                                <option value="percent" {{ @$product->discount_type == 'percent' ? 'selected' : '' }}>Percent</option>
                                                <option value="fixed" {{ @$product->discount_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Discount') }}
                                                </label>
                                                <input class="primary_input_field" id="discount" name="discount" placeholder="-"
                                                    type="number" value="{{ @$product->discount }}" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Inventory') }}
                                                </label>
                                                <input class="primary_input_field" name="inventory" placeholder="1"
                                                    type="number" value="{{ @$product->total_inventory }}" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""> 
                                                    {{ __('Total Amount') }}
                                                </label>
                                                <input class="primary_input_field" id="total_amount" placeholder="0.00"
                                                    type="number" value="" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ======================== IMAGES ==================== -->
                                    <div class="row mt-4">
                                        <div class="col-xl-12">
                                            <label class="primary_input_label">
                                                Product Images (Max Image Size 2MB)
                                                <strong class="text-danger">*</strong>
                                            </label>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="primary_input mb-35">
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder placeholder_txt" type="text" 
                                                        id="" placeholder="Browse Image file" readonly>
                                                    <button type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="document_file_thumb_2">Browse</label>
                                                        <input type="file" class="d-none fileUpload" name="images[]" id="document_file_thumb_2" 
                                                            accept="image/*,video/*" multiple>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Preview section -->
                                        <div class="col-xl-10 text-center">
                                            <div class="row" id="preview-container">
                                                @php
                                                    $files = $product->files;
                                                @endphp

                                                @if (!empty($files))
                                                    @foreach ($files as $index => $file)
                                                        <div class="col-sm-2 preview-item" data-index="{{$index}}">
                                                            <div class="position-relative d-inline-block">
                                                                <img src="{{url($file->file_path)}}" class="img-thumbnail" style="width:100px;height:100px;object-fit:cover;">
                                                                <span class="deleteFile" data-id="{{$file->id}}" style="position:absolute;top:0px;right:0px;
                                                                    cursor:pointer;color:red;
                                                                    background:white;border-radius:50%;
                                                                    padding:0px 6px;font-size:12px;">&times;</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    


                                    <div class="col-lg-12 pt_15 text-center">
                                        <div class="d-flex justify-content-center">
                                            <button class="primary-btn semi_large2 fix-gr-bg" id="update_button"
                                                type="submit"><i class="ti-check"></i> {{ __('common.Add') }}   
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade admin-query" id="deleteProductFile">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('product.file.delete') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('common.Delete') }} {{ __('File') }} </h4>
                            <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                        </div>

                        <div class="modal-body">
                            <div class="text-center">

                                <h4>{{ __('common.Are you sure to delete ?') }}</h4>
                            </div>
                            <input type="hidden" name="id" value="" id="productFileDeleteId">

                            <div class="d-flex justify-content-between mt-40">
                                <button type="button" class="primary-btn tr-bg"
                                    data-dismiss="modal">{{ __('common.Cancel') }}</button>
                                <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
       

    </section>

    <!-- <script src="{{ asset('public/backend/js/blog_list.js') }}"></script> -->

@endsection

@push('scripts')
    <!-- <script src="{{ asset('Modules/Blog/Resources/views/assets/taginput/tagsinput.js') }}"></script> -->

    <script>

        let selectedFiles = [];
        
        function calculateTotal() {
            let price = parseFloat($("#price").val()) || 0;
            let taxPercent = parseFloat($("#tax_percent").val()) || 0;
            let discountType = $("#discount_type").val();
            let discountVal = parseFloat($("#discount").val()) || 0;
            

            let discount = 0;

            // Apply discount
            if (discountType === "fixed") {
                discount = Math.min(discountVal, price); // avoid negative total
            } else if (discountType === "percent") {
                discount = (price * discountVal) / 100;
            }

            // Taxable amount
            let taxableAmount = price - discount;

            // Tax
            let totalTax = (taxableAmount * taxPercent) / 100;

            // Final total
            let totalAmount = taxableAmount + totalTax;

            $("#total_amount").val(totalAmount.toFixed(2));
        }

        $("#price, #discount_type, #discount, #tax_percent").on("input change", function () {
            calculateTotal();
        });

        calculateTotal();

        $(document).on("click", ".deleteFile", function () {
            let id = $(this).data("id");
            $("#productFileDeleteId").val(id);
            $("#deleteProductFile").modal("show");
        });

        $(document).on('click', '#update_button', function(e) {
            e.preventDefault();
            var form = $('#update_product_form');
            var url = form.attr('action');
            
            form.find('.submit').hide();
            form.find('.submitting').show();
            const formData = new FormData(form[0]);

            formData.append('type', {{@$product->type}});

            // Add images
            selectedFiles.forEach((file, i) => {
                formData.append('product_images[]', file);
            });
            
            $.ajax({
                url: url,
                method: 'POST',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                dataType: 'JSON',
                data:formData,
                success: function(data) {
                    
                    toastr.success(data.message, 'Success');
                    if (data.goto) {
                        setTimeout(function() {
                            window.location.href = data.goto;
                        }, 2000);
                    }
                },
                error: function(data) {
                    
                    toastr.error(data.responseJSON.message, 'Error');
                }
            });
        });
        

        function toggleBookFields() {
            if ($("#type_book").is(":checked")) {
                $("#book_related_fields").show();
            } else {
                $("#book_related_fields").hide();
            }
        }

        // Run on page load
        toggleBookFields();

        // Run on change
        $("input[name='type']").on("change", function () {
            toggleBookFields();
        });
        
        // File input change
        $('#document_file_thumb_2').on('change', function(e) {
            let files = e.target.files;

            $.each(files, function(i, file) {
                if (!file.type.match('image.*') && !file.type.match('video.*')) return;

                // Add to selectedFiles
                selectedFiles.push(file);

                let reader = new FileReader();
                reader.onload = function(e) {
                    let index = selectedFiles.length - 1;
                    let previewContent = '';

                    if (file.type.match('image.*')) {
                        // ✅ Image preview
                        previewContent = `<img src="${e.target.result}" class="img-thumbnail" style="width:100px;height:100px;object-fit:cover;">`;
                    } else if (file.type.match('video.*')) {
                        // ✅ Video placeholder (not autoplay to save resources)
                        previewContent = `
                            <video width="100" height="100" style="object-fit:cover;" muted>
                                <source src="${e.target.result}" type="${file.type}">
                                Your browser does not support video.
                            </video>
                        `;
                    }

                    // Create preview card
                    let html = `
                        <div class="col-sm-2 preview-item" data-index="${index}">
                            <div class="position-relative d-inline-block">
                                ${previewContent}
                                <span class="remove-preview" style="
                                    position:absolute;top:0px;right:0px;
                                    cursor:pointer;color:red;
                                    background:white;border-radius:50%;
                                    padding:0px 6px;font-size:12px;">&times;</span>
                            </div>
                        </div>
                    `;
                    $('#preview-container').append(html);
                };

                reader.readAsDataURL(file);
            });

            // reset input (so same file can be chosen again)
            $(this).val('');
        });

        // Remove preview
        $(document).on('click', '.remove-preview', function() {
            let parent = $(this).closest('.preview-item');
            let index = parent.data('index');

            // Remove from array
            selectedFiles.splice(index, 1);

            // Remove preview element
            parent.remove();

            // Reassign indexes after removal
            $('#preview-container .preview-item').each(function(i, el) {
                $(el).attr('data-index', i);
            });
        });



        // Image Cropper Start
        $(document).ready(function() {

            var customFontFam = ['Arial','Helvetica','Cavolini','Jost','Impact','Tahoma','Verdana','Garamond','Georgia','monospace','fantasy','Papyrus','Poppins'];
            
            $('.custom_summernote').each(function (){
                var elId = $(this).attr('id');
                ClassicEditor .create( document.getElementById(elId),{
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload',['_token' => csrf_token()]) }}",
                    },
                    mediaEmbed : {
                        previewsInData: true,
                        removeProviders: [ 'instagram', 'twitter', 'googleMaps', 'flickr', 'facebook' ],
                    },
                    fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            17,
                            19,
                            21
                        ]
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
                            'imageTextAlternative',
                            'toggleImageCaption',
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
                })
                .then(editor => {
                    // Save the editor instance to use it later
                    window.editor = editor;

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

            
            // 1st Cropper
            var _URL1 = window.URL || window.webkitURL;
            $("#document_file_thumb_1").change(function(e) {
                let file = this.files[0];

                if (file) {
                    let fileName = file.name;
                    let fileExt = fileName.split('.').pop().toLowerCase();

                    if (fileExt !== 'pdf') {
                        $('#input-1').val(''); // clear field
                        toastr.error('Only PDF files are allowed!', 'Error');
                        $(this).val(''); // reset file input
                        return false;
                    }

                    $('#input-1').val(fileName);

                    // (Optional) If you want to validate size:
                    let maxSize = 5 * 1024 * 1024; // 5MB
                    if (file.size > maxSize) {
                        $('#input-1').val('');
                        toastr.error('File size exceeds 5MB!', 'Error');
                        $(this).val('');
                        return false;
                    }

                    toastr.success('PDF file selected: ' + fileName, 'Success');
                }
            });
            $('.image-editor-cancel-button-1').on('click', function() {
                if ($('#image_preview-1').attr('src') != '' || $('#image_preview-1').attr('src') != null) {
                    $('#image_file-1').children().val('');
                }
                $('#image-editor-modal-1').trigger("reset");
                $('#image-editor-modal-1').modal('hide');
            });
        });
        // Image Cropper End
        $("#document_file_thumb_2").on('change',function(e) {
            var file, img;
            if ((file = this.files[0])) {
                if (file.type.startsWith('image/')) {
                    img = new Image();
                    img.onload = function() {
                        var image_width = img.width;
                        // var image_width = this.width;
                        var image_height = img.height;
                        // var image_height = this.height;
                        console.log(image_width,image_height);
                        // if (image_width != 1170 || image_height != 600) {
                        //     $('#input-1').val('');
                        //     $('#document_file_thumb_2').val('');
                        //     // e.preventDefault();
                        //     toastr.error(
                        //         'Wrong Image Dimensions, Please Select Image of 1170 X 600 !',
                        //         'Error')
                        // }
                    };
                    img.src = URL.createObjectURL(file);
                } else {
                        $('#document_file_thumb_2').val('');
                    toastr.error('Please select a valid image file!', 'Error')
                }
            }
        });

        
    </script>
@endpush
