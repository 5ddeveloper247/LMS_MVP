@php
    $isEdit = isset($course);
    $action = $isEdit
        ? route('continuing-education.courses.update', $course->id)
        : route('continuing-education.courses.store');
    $assistantIds = old('assistant_instructors', $course->assistant_instructor_ids ?? []);
    $isFree = old('is_free', $isEdit ? ((float) ($course->price ?? 0) === 0.0) : false);
    $taxPercent = old('tax_percent', $isEdit ? ($course->tax_percent ?? $course->tax ?? 0) : 0);
    $discountType = old('discount_type', $isEdit ? ($course->discount_type ?? '') : '');
    $discountVal = old('discount', $isEdit ? ($course->discount ?? 0) : 0);
    $totalAmount = old('total_amount', $isEdit ? ($course->total_amount ?? 0) : 0);

    $selectedAudienceGroups = old('audience_groups');
    if (! is_array($selectedAudienceGroups) && $isEdit) {
        $selectedAudienceGroups = ceAudienceGroupsFromAudience($course->audience ?? []);
    }
    if (! is_array($selectedAudienceGroups) || $selectedAudienceGroups === []) {
        $selectedAudienceGroups = ['rn'];
    }
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="title">
                    {{ __('Title') }} <small>(Max size 255 Characters)</small> <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="title" id="title"
                    value="{{ old('title', $course->title ?? '') }}" maxlength="255" placeholder="-" required>
                @error('title')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="course_code">{{ __('Course Code') }}</label>
                <input class="primary_input_field" type="text" name="course_code" id="course_code"
                    value="{{ old('course_code', $course->course_code ?? '') }}" maxlength="100" placeholder="-">
                @error('course_code')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="contact_hours">
                    Contact Hours <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="number" step="0.1" min="0" max="999.9" name="contact_hours"
                    id="contact_hours" value="{{ old('contact_hours', $course->contact_hours ?? '') }}" placeholder="-" required>
                @error('contact_hours')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="course_type">
                    Course Type <strong class="text-danger">*</strong>
                </label>
                <select class="primary_select" name="course_type" id="course_type" required>
                    @foreach ($courseTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('course_type', $course->course_type ?? request('tab', 'elective')) === $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('course_type')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        {{-- Compliance Topic & CE Broker — hidden until CE Broker integration is ready
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="compliance_topic">Compliance Topic</label>
                <input class="primary_input_field" type="text" name="compliance_topic" id="compliance_topic"
                    list="ce_compliance_topics"
                    value="{{ old('compliance_topic', $course->compliance_topic ?? '') }}" maxlength="150" placeholder="-">
                <datalist id="ce_compliance_topics">
                    @foreach ($complianceTopics as $topic)
                        <option value="{{ $topic }}"></option>
                    @endforeach
                </datalist>
                @error('compliance_topic')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="ce_broker_course_id">CE Broker Course ID</label>
                <input class="primary_input_field" type="text" name="ce_broker_course_id" id="ce_broker_course_id"
                    value="{{ old('ce_broker_course_id', $course->ce_broker_course_id ?? '') }}" maxlength="50" placeholder="-">
                @error('ce_broker_course_id')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>
        --}}

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('quiz.Category') }} <strong class="text-danger">*</strong></label>
                <div class="row">
                    @foreach ($audienceGroups as $value => $label)
                        <div class="col-md-4 col-sm-6 mb-25">
                            <label class="primary_checkbox d-flex nowrap mr-12" for="ce_category_{{ $value }}">
                                <input type="checkbox" id="ce_category_{{ $value }}" name="audience_groups[]"
                                    value="{{ $value }}" {{ in_array($value, $selectedAudienceGroups, true) ? 'checked' : '' }}>
                                <span class="checkmark mr-2"></span>{{ $label }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('audience_groups')<span class="text-danger d-block">{{ $message }}</span>@enderror
                @error('audience_groups.*')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-35">
                <label class="primary_input_label" for="about">{{ __('Description') }}</label>
                <textarea class="custom_summernote" name="about" id="about" cols="30" rows="10">{{ old('about', $course->about ?? '') }}</textarea>
                @error('about')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-35">
                <label class="primary_input_label" for="outcomes">Learning Objectives</label>
                <textarea class="custom_summernote" name="outcomes" id="outcomes" cols="30" rows="10">{{ old('outcomes', $course->outcomes ?? '') }}</textarea>
                @error('outcomes')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="assign_instructor">
                    {{ __('courses.Assign Instructor') }} <strong class="text-danger">*</strong>
                </label>
                <select class="primary_select" name="assign_instructor" id="assign_instructor" required>
                    <option value="">{{ __('common.Select') }} {{ __('courses.Instructor') }}</option>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}"
                            {{ (string) old('assign_instructor', $course->user_id ?? '') === (string) $instructor->id ? 'selected' : '' }}>
                            {{ $instructor->name }}
                        </option>
                    @endforeach
                </select>
                @error('assign_instructor')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="assistant_instructors">
                    {{ __('courses.Assistant Instructor') }}
                </label>
                <select class="primary_select" name="assistant_instructors[]" id="assistant_instructors" multiple>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}"
                            {{ in_array($instructor->id, $assistantIds, false) ? 'selected' : '' }}>
                            {{ $instructor->name }}
                        </option>
                    @endforeach
                </select>
                @error('assistant_instructors')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="row mt-20">
                <div class="col-xl-5">
                    <label class="primary_input_label">
                        Course Thumbnail (Max 4MB)
                    </label>
                </div>
                <div class="col-xl-5">
                    <div class="primary_input mb-35">
                        <input class="primary_input_field" type="file" name="image" id="image" accept="image/*">
                        @error('image')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                @if ($isEdit && $course->image)
                    <div class="col-xl-2 text-center">
                        <img src="{{ getCourseImage($course->image) }}" alt="" class="image-editor-preview-img-1"
                            style="max-height: 120px;">
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-12 mb-25">
            <div class="checkbox_wrap d-flex align-items-center mt-40">
                <label for="is_free" class="switch_toggle mr-2">
                    <input type="checkbox" id="is_free" name="is_free" value="1" {{ $isFree ? 'checked' : '' }}>
                    <i class="slider round"></i>
                </label>
                <label class="mb-0">{{ __('courses.This course is a free course') }}</label>
            </div>
        </div>

        <div class="col-xl-12" id="ce_pricing_fields">
            <div class="row">
                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="price">
                            {{ __('courses.Price') }}
                            <strong class="text-danger">*</strong>
                        </label>
                        <input class="primary_input_field ce-price-field" type="number" step="0.01" min="0"
                            name="price" id="price" value="{{ old('price', $course->price ?? 0) }}"
                            placeholder="00.00" {{ $isFree ? '' : 'required' }}>
                        @error('price')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="tax_percent">
                            {{ __('Tax Percent') }}
                            <strong class="text-danger">*</strong>
                        </label>
                        <input class="primary_input_field ce-tax-field" type="number" step="0.01" min="0" max="100"
                            name="tax_percent" id="tax_percent" value="{{ $taxPercent }}" placeholder="-"
                            {{ $isFree ? '' : 'required' }}>
                        @error('tax_percent')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-xl-6 courseBox mb-25">
                    <label class="primary_input_label" for="discount_type">{{ __('Discount Type') }}</label>
                    <select class="primary_select ce-discount-type-field" name="discount_type" id="discount_type">
                        <option value="">{{ __('Select Type') }}</option>
                        <option value="percent" {{ $discountType === 'percent' ? 'selected' : '' }}>Percent</option>
                        <option value="fixed" {{ $discountType === 'fixed' ? 'selected' : '' }}>Fixed</option>
                    </select>
                    @error('discount_type')<span class="text-danger d-block">{{ $message }}</span>@enderror
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="discount">{{ __('Discount') }}</label>
                        <input class="primary_input_field ce-discount-field" type="number" step="0.01" min="0"
                            name="discount" id="discount" placeholder="-" value="{{ $discountVal }}">
                        @error('discount')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for="total_amount">{{ __('Total Amount') }}</label>
                        <input class="primary_input_field" id="total_amount" type="number" step="0.01"
                            value="{{ $totalAmount }}" placeholder="0.00" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 mt-40">
            <label class="primary_checkbox d-flex mr-12" for="status">
                <input type="checkbox" id="status" name="status" value="1"
                    {{ old('status', $course->status ?? true) ? 'checked' : '' }}>
                <span class="checkmark mr-2"></span>
                {{ __('common.Active') }}
            </label>
        </div>

        <div class="col-xl-4 mt-40">
            <label class="primary_checkbox d-flex mr-12" for="is_featured">
                <input type="checkbox" id="is_featured" name="is_featured" value="1"
                    {{ old('is_featured', $course->is_featured ?? false) ? 'checked' : '' }}>
                <span class="checkmark mr-2"></span>
                {{ __('Featured') }}
            </label>
        </div>

        <div class="col-lg-12 text-center mt-40 pt-3">
            <div class="d-flex justify-content-center">
                <a href="{{ route('continuing-education.courses.index', ['tab' => old('course_type', $course->course_type ?? request('tab', 'mandatory'))]) }}"
                    class="primary-btn tr-bg mr-10">
                    {{ trans('common.Cancel') }}
                </a>
                <button class="primary-btn fix-gr-bg" type="submit">
                    <i class="ti-check"></i>
                    {{ $isEdit ? trans('common.Update') : trans('common.Save') }}
                </button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            var customFontFam = ['Arial', 'Helvetica', 'Cavolini', 'Jost', 'Impact', 'Tahoma', 'Verdana',
                'Garamond', 'Georgia', 'monospace', 'fantasy', 'Papyrus', 'Poppins'
            ];

            $('.custom_summernote').each(function() {
                var elId = $(this).attr('id');
                var $textarea = $(this);

                ClassicEditor
                    .create(document.getElementById(elId), {
                        ckfinder: {
                            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        },
                        mediaEmbed: {
                            previewsInData: true,
                            removeProviders: ['instagram', 'twitter', 'googleMaps', 'flickr', 'facebook'],
                        },
                        fontSize: {
                            options: [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 32, 36, 40, 48, 56, 64, 72],
                            supportAllValues: true
                        },
                        fontFamily: {
                            options: customFontFam
                        },
                        toolbar: {
                            items: [
                                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                                'blockQuote', 'fontFamily', 'fontSize', 'fontColor', 'alignment', 'outdent',
                                'indent', '|', 'insertTable', 'imageInsert', 'mediaEmbed', '|', 'undo', 'redo'
                            ]
                        },
                        language: 'en',
                        image: {
                            toolbar: ['imageStyle:inline', 'imageStyle:block', 'imageStyle:side'],
                            insert: {
                                integrations: ['upload', 'url']
                            }
                        },
                        table: {
                            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                        }
                    })
                    .then(function(editor) {
                        editor.model.document.on('change:data', function() {
                            $textarea.val(editor.getData());
                        });
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            });

            function calculateCeTotal() {
                var price = parseFloat($('#price').val()) || 0;
                var taxPercent = parseFloat($('#tax_percent').val()) || 0;
                var discountType = $('#discount_type').val();
                var discountVal = parseFloat($('#discount').val()) || 0;
                var discount = 0;

                if (discountType === 'fixed') {
                    discount = Math.min(discountVal, price);
                } else if (discountType === 'percent') {
                    discount = (price * discountVal) / 100;
                }

                var taxableAmount = price - discount;
                var totalTax = (taxableAmount * taxPercent) / 100;
                var totalAmount = taxableAmount + totalTax;

                $('#total_amount').val(totalAmount.toFixed(2));
            }

            function togglePricingFields() {
                var isFree = $('#is_free').is(':checked');

                if (isFree) {
                    $('#ce_pricing_fields').hide();
                    $('#price').val(0);
                    $('#tax_percent').val(0);
                    $('#discount_type').val('');
                    $('#discount').val(0);
                    $('#total_amount').val('0.00');
                } else {
                    $('#ce_pricing_fields').show();
                }

                $('.ce-price-field, .ce-tax-field, .ce-discount-type-field, .ce-discount-field')
                    .prop('disabled', isFree);
            }

            $('#is_free').on('change', function() {
                togglePricingFields();
                calculateCeTotal();
            });

            $('#price, #tax_percent, #discount_type, #discount').on('input change', calculateCeTotal);

            togglePricingFields();
            calculateCeTotal();
        });
    </script>
@endpush
