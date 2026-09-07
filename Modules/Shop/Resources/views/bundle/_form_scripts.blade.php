<style>
    .bundle-product-select + .select2-container {
        width: 100% !important;
    }
    .bundle-product-select + .select2-container .select2-selection--multiple {
        min-height: 46px;
        max-height: 46px;
        overflow-y: auto;
        border: 1px solid #eceef4;
        border-radius: 30px;
        padding: 4px 10px;
        background: #fff;
    }
    .bundle-product-select + .select2-container.select2-container--focus .select2-selection--multiple,
    .bundle-product-select + .select2-container.select2-container--open .select2-selection--multiple {
        border-color: #7c32ff;
    }
    .bundle-product-select + .select2-container .select2-selection__choice {
        margin-top: 3px;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<script>
    $(document).ready(function () {
        var customFontFam = ['Arial', 'Helvetica', 'Cavolini', 'Jost', 'Impact', 'Tahoma', 'Verdana', 'Garamond', 'Georgia', 'monospace', 'fantasy', 'Papyrus', 'Poppins'];

        if (typeof $.fn.select2 === 'function') {
            $('.bundle-product-select').each(function () {
                var $el = $(this);
                $el.select2({
                    width: '100%',
                    placeholder: $el.data('placeholder') || 'Select products...',
                    allowClear: true,
                    closeOnSelect: false
                });
            });
        }

        // Same CKEditor setup as Shop Products description (not TinyMCE)
        $('.custom_summernote').each(function () {
            var el = this;
            var elId = $(el).attr('id');
            if (!elId || typeof ClassicEditor === 'undefined') {
                return;
            }

            ClassicEditor.create(document.getElementById(elId), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                },
                mediaEmbed: {
                    previewsInData: true,
                    removeProviders: ['instagram', 'twitter', 'googleMaps', 'flickr', 'facebook'],
                },
                fontSize: {
                    options: [9, 11, 13, 'default', 17, 19, 21]
                },
                fontFamily: {
                    options: customFontFam
                },
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                        'blockQuote', 'fontFamily', 'fontSize', 'fontColor', 'alignment',
                        'outdent', 'indent', '|',
                        'insertTable', 'imageInsert', 'mediaEmbed', '|',
                        'undo', 'redo'
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
                        integrations: ['upload', 'url']
                    }
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                }
            }).then(function (editor) {
                editor.model.document.on('change:data', function () {
                    $(el).val(editor.getData());
                });
            }).catch(function (error) {
                console.error(error);
            });
        });
    });

    $(document).on('click', '#save_button', function (e) {
        e.preventDefault();
        var form = $('#{{ $formId }}');
        var url = form.attr('action');
        const formData = new FormData(form[0]);

        selectedBundleFiles.forEach(function (file) {
            formData.append('bundle_images[]', file);
        });

        if (selectedBundleVideoFile) {
            formData.append('bundle_video', selectedBundleVideoFile);
        }

        $.ajax({
            url: url,
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'JSON',
            data: formData,
            success: function (data) {
                toastr.success(data.message, 'Success');
                if (data.goto) {
                    setTimeout(function () {
                        window.location.href = data.goto;
                    }, 1200);
                }
            },
            error: function (data) {
                let msg = (data.responseJSON && data.responseJSON.message)
                    ? data.responseJSON.message
                    : 'Something went wrong';
                toastr.error(msg, 'Error');
            }
        });
    });

    let selectedBundleFiles = [];
    let selectedBundleVideoFile = null;

    $('#bundle_images_input').on('change', function (e) {
        let files = e.target.files;

        $.each(files, function (i, file) {
            if (!file.type.match('image.*')) {
                return;
            }

            selectedBundleFiles.push(file);

            let reader = new FileReader();
            reader.onload = function (ev) {
                let index = selectedBundleFiles.length - 1;
                let html = `
                    <div class="col-sm-2 preview-item bundle-new-preview" data-index="${index}">
                        <div class="position-relative d-inline-block">
                            <img src="${ev.target.result}" class="img-thumbnail" style="width:100px;height:100px;object-fit:cover;">
                            <span class="remove-bundle-preview" style="position:absolute;top:0px;right:0px;cursor:pointer;color:red;background:white;border-radius:50%;padding:0px 6px;font-size:12px;">&times;</span>
                        </div>
                    </div>
                `;
                $('#bundle-preview-container').append(html);
            };
            reader.readAsDataURL(file);
        });

        $(this).val('');
    });

    $('#bundle_video_input').on('change', function (e) {
        let file = e.target.files[0];
        if (!file) {
            return;
        }

        if (!file.type.match('video.*')) {
            toastr.error('Please select a video file.', 'Error');
            $(this).val('');
            return;
        }

        if (file.size > 1048576) {
            toastr.error('Video file size must be less than 1MB.', 'Error');
            $(this).val('');
            return;
        }

        selectedBundleVideoFile = file;
        $('#bundle-video-preview-container').empty();
        $('#bundle_video_placeholder').val(file.name);

        let reader = new FileReader();
        reader.onload = function (ev) {
            let html = `
                <div class="col-sm-4 video-preview-item">
                    <div class="position-relative d-inline-block">
                        <video width="200" height="150" controls style="object-fit:cover;">
                            <source src="${ev.target.result}" type="${file.type}">
                            Your browser does not support the video tag.
                        </video>
                        <span class="remove-bundle-video-preview" style="position:absolute;top:0px;right:0px;cursor:pointer;color:red;background:white;border-radius:50%;padding:0px 6px;font-size:12px;">&times;</span>
                    </div>
                </div>
            `;
            $('#bundle-video-preview-container').html(html);
        };
        reader.readAsDataURL(file);
    });

    $(document).on('click', '.remove-bundle-video-preview', function () {
        selectedBundleVideoFile = null;
        $('#bundle_video_input').val('');
        $('#bundle_video_placeholder').val('');
        $('#bundle-video-preview-container').empty();
    });

    $(document).on('click', '.remove-bundle-preview', function () {
        let parent = $(this).closest('.preview-item');
        let index = parent.data('index');
        selectedBundleFiles.splice(index, 1);
        parent.remove();
        $('#bundle-preview-container .preview-item.bundle-new-preview').each(function (i, el) {
            $(el).attr('data-index', i);
        });
    });

    $(document).on('click', '.deleteBundleFile', function () {
        let id = $(this).data('id');
        $('#bundleFileDeleteId').val(id);
        $('#deleteBundleFile').modal('show');
    });

    function calculateTotal() {
        let price = parseFloat($("#price").val()) || 0;
        let taxPercent = parseFloat($("#tax_percent").val()) || 0;
        let discountType = $("#discount_type").val();
        let discountVal = parseFloat($("#discount").val()) || 0;
        let discount = 0;

        if (discountType === "fixed") {
            discount = Math.min(discountVal, price);
        } else if (discountType === "percent") {
            discount = (price * discountVal) / 100;
        }

        let taxableAmount = price - discount;
        let totalTax = (taxableAmount * taxPercent) / 100;
        let totalAmount = taxableAmount + totalTax;
        $("#total_amount").val(totalAmount.toFixed(2));
    }

    $("#price, #discount_type, #discount, #tax_percent").on("input change", function () {
        calculateTotal();
    });

    calculateTotal();
</script>
