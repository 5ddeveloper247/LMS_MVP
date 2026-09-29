@php
    $isEdit = isset($bundle);
    $action = $isEdit
        ? route('continuing-education.bundles.update', $bundle->id)
        : route('continuing-education.bundles.store');
    $selectedCourseIds = $selectedCourseIds ?? [];
    $selectedLicenseType = old('license_type', $selectedLicenseType ?? null);
    $hasLicenseType = filled($selectedLicenseType);
@endphp

<form action="{{ $action }}" method="POST" id="ce_bundle_form" class="ce-bundle-form"
    data-mandatory-courses-url="{{ route('continuing-education.bundles.mandatory-courses') }}">
    @csrf

    <div class="row">
        <div class="col-xl-8">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="name">
                    Bundle Name <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="name" id="name"
                    value="{{ old('name', $bundle->name ?? '') }}" maxlength="255"
                    placeholder="Complete 26-Hour Renewal" required>
                @error('name')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="seq_no">Sort Order</label>
                <input class="primary_input_field" type="number" min="0" max="9999" name="seq_no" id="seq_no"
                    value="{{ old('seq_no', $bundle->seq_no ?? '') }}" placeholder="1">
                @error('seq_no')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="subtitle">Subtitle</label>
                <input class="primary_input_field" type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $bundle->subtitle ?? '') }}" maxlength="255"
                    placeholder="Everything you need. One checkout.">
                @error('subtitle')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="license_type">
                    License Type <strong class="text-danger">*</strong>
                </label>
                <select class="primary_select" name="license_type" id="license_type" required>
                    <option value="" disabled {{ $hasLicenseType ? '' : 'selected' }}>Select license type</option>
                    @foreach ($licenseTypes as $value => $label)
                        <option value="{{ $value }}"
                            {{ $selectedLicenseType === $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('license_type')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="card_style">
                    Card Style <strong class="text-danger">*</strong>
                </label>
                <select class="primary_select" name="card_style" id="card_style" required>
                    @foreach ($cardStyles as $value => $label)
                        <option value="{{ $value }}"
                            {{ old('card_style', $bundle->card_style ?? 'primary') === $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('card_style')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="total_hours">
                    Total Hours <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="number" step="0.1" min="0" max="999.9"
                    name="total_hours" id="total_hours"
                    value="{{ old('total_hours', $bundle->total_hours ?? '') }}" placeholder="26" required>
                <p class="text-muted mb-0 mt-2 ce-bundle-field-hint">
                    Define the full bundle hour requirement first. Mandatory + elective cannot exceed this total.
                </p>
                @error('total_hours')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="mandatory_course_ids">
                    Mandatory Courses <strong class="text-danger">*</strong>
                </label>
                <p class="text-muted mb-3 ce-bundle-field-hint">
                    Select mandatory CE courses included in this bundle. Courses load after you choose a license type.
                </p>
                <p id="ce_bundle_mandatory_pick_license"
                    class="ce-bundle-empty-courses {{ $hasLicenseType ? 'd-none' : '' }}">
                    Select a license type above to load mandatory courses.
                </p>
                <p id="ce_bundle_mandatory_loading"
                    class="ce-bundle-empty-courses d-none">
                    Loading mandatory courses...
                </p>
                <p id="ce_bundle_mandatory_none"
                    class="ce-bundle-empty-courses {{ ($hasLicenseType && $mandatoryCourses->isEmpty()) ? '' : 'd-none' }}">
                    No published mandatory courses found for this license type.
                </p>
                <div id="ce_bundle_mandatory_select_wrap"
                    class="{{ ($hasLicenseType && $mandatoryCourses->isNotEmpty()) ? '' : 'd-none' }}">
                    <select class="ce-bundle-mandatory-select" name="mandatory_course_ids[]"
                        id="mandatory_course_ids" multiple
                        data-placeholder="Select mandatory courses">
                        @foreach ($mandatoryCourses as $course)
                            <option value="{{ $course->id }}"
                                data-hours="{{ $course->contact_hours }}"
                                {{ in_array($course->id, $selectedCourseIds, true) ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('mandatory_course_ids')<span class="text-danger d-block">{{ $message }}</span>@enderror
                @error('mandatory_course_ids.*')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="mandatory_hours_total">
                    Total Mandatory Hours
                </label>
                <input class="primary_input_field" type="text" id="mandatory_hours_total"
                    value="0" placeholder="0" disabled readonly>
                <p class="text-muted mb-0 mt-2 ce-bundle-field-hint">
                    Auto-calculated from selected mandatory courses.
                </p>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="elective_hours_allowed">
                    Elective Hours Allowed <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="number" step="0.1" min="0" max="999.9"
                    name="elective_hours_allowed" id="elective_hours_allowed"
                    value="{{ old('elective_hours_allowed', $bundle->elective_hours_allowed ?? '') }}" placeholder="15" required>
                <p class="text-muted mb-0 mt-2 ce-bundle-field-hint">
                    Remaining hours after mandatory courses. Must fit within total hours.
                </p>
                <span class="text-danger d-none ce-bundle-hours-error" id="ce_bundle_hours_error"></span>
                @error('elective_hours_allowed')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="ce_bundle_hours_summary">Hours Summary</label>
                <input class="primary_input_field" type="text" id="ce_bundle_hours_summary"
                    value="0 + 0 = 0 / 0" disabled readonly>
                <p class="text-muted mb-0 mt-2 ce-bundle-field-hint" id="ce_bundle_hours_summary_hint">
                    Mandatory + elective vs total hours.
                </p>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="price">
                    Price <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="number" step="0.01" min="0"
                    name="price" id="price"
                    value="{{ old('price', $bundle->price ?? '') }}" placeholder="79.00" required>
                @error('price')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="compare_at_price">Compare-at Price</label>
                <input class="primary_input_field" type="number" step="0.01" min="0"
                    name="compare_at_price" id="compare_at_price"
                    value="{{ old('compare_at_price', $bundle->compare_at_price ?? '') }}" placeholder="250.00">
                @error('compare_at_price')<span class="text-danger d-block">{{ $message }}</span>@enderror
                <p class="text-muted mb-0 mt-2" style="font-size:13px;">Optional strikethrough value on the bundle card.</p>
            </div>
        </div>

        @for ($i = 1; $i <= 6; $i++)
            <div class="col-xl-12">
                <div class="primary_input mb-25">
                    <label class="primary_input_label" for="component_{{ $i }}">
                        Component {{ $i }} <strong class="text-danger">*</strong>
                    </label>
                    <input class="primary_input_field" type="text" name="component_{{ $i }}"
                        id="component_{{ $i }}"
                        value="{{ old('component_' . $i, $bundle->{'component_' . $i} ?? '') }}" maxlength="500" required>
                    @error('component_' . $i)<span class="text-danger d-block">{{ $message }}</span>@enderror
                </div>
            </div>
        @endfor

        <div class="col-xl-12">
            <label class="primary_input_label d-block mb-3">Status</label>
        </div>

        <div class="col-xl-4 col-lg-6 mt-10">
            <label class="ce-bundle-status-option d-flex align-items-center mb-0" for="bundle_status">
                <span class="primary_checkbox mr-10" style="flex: 0 0 auto;">
                    <input type="checkbox" id="bundle_status" name="status" value="1"
                        {{ old('status', $bundle->status ?? true) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </span>
                <span class="ce-bundle-status-label">{{ __('common.Active') }}</span>
            </label>
        </div>

        <div class="col-xl-4 col-lg-6 mt-10">
            <label class="ce-bundle-status-option d-flex align-items-center mb-0" for="bundle_publish">
                <span class="primary_checkbox mr-10" style="flex: 0 0 auto;">
                    <input type="checkbox" id="bundle_publish" name="publish" value="1"
                        {{ old('publish', $bundle->publish ?? true) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </span>
                <span class="ce-bundle-status-label">Published on frontend</span>
            </label>
        </div>

        <div class="col-xl-4 col-lg-6 mt-10">
            <label class="ce-bundle-status-option d-flex align-items-center mb-0" for="bundle_featured">
                <span class="primary_checkbox mr-10" style="flex: 0 0 auto;">
                    <input type="checkbox" id="bundle_featured" name="featured" value="1"
                        {{ old('featured', $bundle->featured ?? false) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </span>
                <span class="ce-bundle-status-label">Featured</span>
            </label>
        </div>

        <div class="col-xl-4 col-lg-6 mt-10">
            <label class="ce-bundle-status-option d-flex align-items-center mb-0" for="bundle_is_best_seller">
                <span class="primary_checkbox mr-10" style="flex: 0 0 auto;">
                    <input type="checkbox" id="bundle_is_best_seller" name="is_best_seller" value="1"
                        {{ old('is_best_seller', $bundle->is_best_seller ?? false) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </span>
                <span class="ce-bundle-status-label">Best Seller badge</span>
            </label>
        </div>

        <div class="col-xl-12 mt-10">
            <p class="text-muted mb-0" style="font-size:13px;">
                Only one bundle per license type can be marked Best Seller at a time.
            </p>
            @error('is_best_seller')<span class="text-danger d-block">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="col-lg-12 text-center mt-40 pt-3">
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('continuing-education.bundles.index') }}" class="primary-btn tr-bg mr-10">
                {{ trans('common.Cancel') }}
            </a>
            <button type="submit" class="primary-btn fix-gr-bg">
                <i class="ti-check"></i>
                {{ $isEdit ? 'Update Bundle' : 'Save Bundle' }}
            </button>
        </div>
    </div>
</form>

@push('styles')
    <style>
        .ce-bundle-form .ce-bundle-field-hint {
            font-size: 13px;
            line-height: 1.5;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container {
            width: 100% !important;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-selection--multiple {
            min-height: 46px;
            max-height: 46px;
            overflow-x: hidden;
            overflow-y: auto;
            scrollbar-width: thin;
            border: 1px solid #eceef4;
            border-radius: 30px;
            padding: 4px 12px;
            background: #fff;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-selection--multiple::-webkit-scrollbar {
            height: 0;
            width: 6px;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-selection__rendered {
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-search--inline {
            width: 100% !important;
            float: none;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-search--inline .select2-search__field {
            width: 100% !important;
            max-width: 100%;
            margin-top: 6px;
            color: #415094;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container.select2-container--focus .select2-selection--multiple,
        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container.select2-container--open .select2-selection--multiple {
            border-color: var(--system_secendory_color, #7c32ff);
            box-shadow: 0 0 0 2px rgba(124, 50, 255, 0.08);
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-selection__choice {
            margin-top: 3px;
            max-width: calc(100% - 8px);
            overflow: hidden;
            text-overflow: ellipsis;
            background: linear-gradient(90deg, var(--system_secendory_color, #7c32ff) .47%, var(--footer_background_color, #c738d8));
            border: 0;
            color: #fff;
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .ce-bundle-form .ce-bundle-mandatory-select + .select2-container .select2-selection__choice__remove {
            color: rgba(255, 255, 255, 0.85);
            margin-right: 4px;
        }

        .select2-dropdown.ce-bundle-mandatory-dropdown {
            border: 0;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 10px 20px rgba(108, 39, 255, 0.18);
            overflow: hidden;
            z-index: 9999 !important;
        }

        .ce-bundle-mandatory-dropdown .select2-search--dropdown {
            padding: 12px 12px 8px;
        }

        .ce-bundle-mandatory-dropdown .select2-search__field {
            width: 100% !important;
            height: 42px;
            line-height: 42px;
            border: 1px solid #eceef4 !important;
            border-radius: 24px;
            padding: 0 14px;
            color: #415094;
            outline: 0;
        }

        .ce-bundle-mandatory-dropdown .select2-search__field:focus {
            border-color: var(--system_secendory_color, #7c32ff) !important;
        }

        .ce-bundle-select-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 0 12px 10px;
            border-bottom: 1px solid #eceef4;
        }

        .ce-bundle-select-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .ce-bundle-select-actions button {
            background: none;
            border: 0;
            padding: 0;
            color: var(--system_secendory_color, #7c32ff);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .ce-bundle-select-count {
            color: #828bb2;
            font-size: 12px;
            white-space: nowrap;
        }

        .ce-bundle-mandatory-dropdown .select2-results__options {
            max-height: 260px;
            overflow-x: hidden;
        }

        .ce-bundle-mandatory-dropdown .select2-results {
            overflow-x: hidden;
        }

        .ce-bundle-mandatory-dropdown .select2-results__option {
            padding: 0;
        }

        .ce-bundle-course-option {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 10px 14px;
            color: #415094;
        }

        .ce-bundle-course-check {
            width: 18px;
            height: 18px;
            border: 1px solid #828bb2;
            border-radius: 50%;
            flex: 0 0 18px;
            position: relative;
            background: #fff;
        }

        .ce-bundle-mandatory-dropdown .select2-results__option[aria-selected="true"] .ce-bundle-course-check {
            border: 0;
            background: linear-gradient(90deg, var(--system_secendory_color, #7c32ff) .47%, var(--footer_background_color, #c738d8));
            box-shadow: 0 3px 8px rgba(108, 39, 255, 0.2);
        }

        .ce-bundle-mandatory-dropdown .select2-results__option[aria-selected="true"] .ce-bundle-course-check::after {
            content: "\E64C";
            font-family: themify;
            position: absolute;
            top: 0;
            left: 3px;
            color: #fff;
            font-size: 10px;
            line-height: 18px;
        }

        .ce-bundle-course-title {
            flex: 1;
            font-size: 14px;
            line-height: 1.4;
            padding-right: 8px;
        }

        .ce-bundle-course-hours {
            flex: 0 0 auto;
            font-size: 12px;
            color: #828bb2;
            white-space: nowrap;
        }

        .ce-bundle-mandatory-dropdown .select2-results__option--highlighted .ce-bundle-course-option {
            background: rgba(124, 50, 255, 0.06);
        }

        .ce-bundle-form .ce-bundle-status-option {
            cursor: pointer;
            min-height: 24px;
        }

        .ce-bundle-form .ce-bundle-status-label {
            color: #415094;
            font-size: 14px;
            line-height: 1.4;
            white-space: normal;
        }

        .ce-bundle-form .ce-bundle-empty-courses {
            padding: 16px;
            border: 1px dashed #eceef4;
            border-radius: 16px;
            background: #fafbff;
        }

        .ce-bundle-form #mandatory_hours_total,
        .ce-bundle-form #ce_bundle_hours_summary {
            background: #f5f7fb;
            color: #415094;
            cursor: not-allowed;
        }

        .ce-bundle-form .ce-bundle-hours-error {
            display: block;
            font-size: 13px;
            margin-top: 8px;
        }

        .ce-bundle-form .ce-bundle-hours-error.is-visible {
            display: block;
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function () {
            var $form = $('#ce_bundle_form');
            var mandatoryCoursesUrl = $form.data('mandatory-courses-url');
            var $licenseType = $('#license_type');
            var $mandatorySelect = $('#mandatory_course_ids');
            var $pickLicense = $('#ce_bundle_mandatory_pick_license');
            var $loading = $('#ce_bundle_mandatory_loading');
            var $none = $('#ce_bundle_mandatory_none');
            var $selectWrap = $('#ce_bundle_mandatory_select_wrap');
            var noneDefaultMessage = 'No published mandatory courses found for this license type.';
            var select2Initialized = false;
            var mandatoryRequestId = 0;

            if (!$mandatorySelect.length || typeof $.fn.select2 !== 'function') {
                return;
            }

            function setMandatoryState(state) {
                $pickLicense.toggleClass('d-none', state !== 'pick');
                $loading.toggleClass('d-none', state !== 'loading');
                $none.toggleClass('d-none', state !== 'none');
                $selectWrap.toggleClass('d-none', state !== 'select');
            }

            function destroyMandatorySelect2() {
                if (!select2Initialized || !$mandatorySelect.hasClass('select2-hidden-accessible')) {
                    return;
                }

                $mandatorySelect.off('select2:open change');
                $mandatorySelect.select2('destroy');
                select2Initialized = false;
            }

            function formatMandatoryCourse(option) {
                if (!option.id) {
                    return option.text;
                }

                var hours = $(option.element).data('hours');
                var hoursHtml = hours !== undefined && hours !== ''
                    ? '<span class="ce-bundle-course-hours">' + hours + 'h</span>'
                    : '';

                return $(
                    '<span class="ce-bundle-course-option">' +
                        '<span class="ce-bundle-course-check" aria-hidden="true"></span>' +
                        '<span class="ce-bundle-course-title">' + option.text + '</span>' +
                        hoursHtml +
                    '</span>'
                );
            }

            function formatHours(value) {
                var hours = parseFloat(value) || 0;
                return hours.toFixed(1).replace(/\.0$/, '');
            }

            function sumMandatoryHours() {
                var total = 0;

                ($mandatorySelect.val() || []).forEach(function (id) {
                    var hours = parseFloat($mandatorySelect.find('option[value="' + id + '"]').data('hours')) || 0;
                    total += hours;
                });

                return total;
            }

            function updateHoursSummary() {
                var totalHours = parseFloat($('#total_hours').val()) || 0;
                var mandatoryTotal = sumMandatoryHours();
                var electiveHours = parseFloat($('#elective_hours_allowed').val()) || 0;
                var combined = mandatoryTotal + electiveHours;
                var remaining = totalHours - combined;
                var $error = $('#ce_bundle_hours_error');
                var $summary = $('#ce_bundle_hours_summary');
                var $summaryHint = $('#ce_bundle_hours_summary_hint');

                $('#mandatory_hours_total').val(formatHours(mandatoryTotal));
                $summary.val(formatHours(mandatoryTotal) + ' + ' + formatHours(electiveHours) + ' = ' + formatHours(combined) + ' / ' + formatHours(totalHours));

                $error.removeClass('is-visible').addClass('d-none').text('');
                $summaryHint.removeClass('text-danger').addClass('text-muted');

                if (mandatoryTotal > totalHours && totalHours > 0) {
                    $error.removeClass('d-none').addClass('is-visible').text(
                        'Selected mandatory courses total ' + formatHours(mandatoryTotal) + ' hours, which exceeds total hours (' + formatHours(totalHours) + ').'
                    );
                    $summaryHint.removeClass('text-muted').addClass('text-danger');
                } else if (combined > totalHours && totalHours > 0) {
                    $error.removeClass('d-none').addClass('is-visible').text(
                        'Mandatory + elective (' + formatHours(combined) + 'h) cannot exceed total hours (' + formatHours(totalHours) + 'h).'
                    );
                    $summaryHint.removeClass('text-muted').addClass('text-danger');
                } else if (totalHours > 0 && remaining >= 0) {
                    $summaryHint.text(formatHours(remaining) + ' hour(s) remaining in this bundle total.');
                } else {
                    $summaryHint.text('Mandatory + elective vs total hours.');
                }
            }

            function updateMandatoryCount() {
                var count = ($mandatorySelect.val() || []).length;
                var mandatoryTotal = sumMandatoryHours();
                var label = count + ' selected';

                if (mandatoryTotal > 0) {
                    label += ' · ' + formatHours(mandatoryTotal) + 'h mandatory';
                }

                $('.ce-bundle-select-count').text(label);
                updateHoursSummary();
            }

            function ensureMandatoryToolbar() {
                var $dropdown = $('.select2-container--open .select2-dropdown');
                if (!$dropdown.length || $dropdown.find('.ce-bundle-select-toolbar').length) {
                    return;
                }

                var $toolbar = $(
                    '<div class="ce-bundle-select-toolbar">' +
                        '<div class="ce-bundle-select-actions">' +
                            '<button type="button" class="ce-bundle-select-all">Select all</button>' +
                            '<button type="button" class="ce-bundle-select-clear">Clear</button>' +
                        '</div>' +
                        '<span class="ce-bundle-select-count">0 selected</span>' +
                    '</div>'
                );

                $dropdown.find('.select2-search--dropdown').after($toolbar);

                $toolbar.find('.ce-bundle-select-all').on('click', function (event) {
                    event.preventDefault();
                    var allIds = $mandatorySelect.find('option').map(function () {
                        return $(this).val();
                    }).get();
                    $mandatorySelect.val(allIds).trigger('change');
                    updateMandatoryCount();
                });

                $toolbar.find('.ce-bundle-select-clear').on('click', function (event) {
                    event.preventDefault();
                    $mandatorySelect.val(null).trigger('change');
                    updateMandatoryCount();
                });
            }

            function initMandatorySelect2() {
                if (select2Initialized) {
                    return;
                }

                $mandatorySelect.select2({
                    width: '100%',
                    placeholder: $mandatorySelect.data('placeholder') || 'Select mandatory courses',
                    closeOnSelect: false,
                    allowClear: true,
                    dropdownCssClass: 'ce-bundle-mandatory-dropdown',
                    templateResult: formatMandatoryCourse,
                    escapeMarkup: function (markup) {
                        return markup;
                    }
                });

                $mandatorySelect.on('select2:open', function () {
                    setTimeout(function () {
                        ensureMandatoryToolbar();
                        updateMandatoryCount();
                    }, 0);
                });

                $mandatorySelect.on('change', updateMandatoryCount);
                select2Initialized = true;
            }

            function buildMandatoryOptions(courses, selectedIds) {
                var selectedSet = {};

                (selectedIds || []).forEach(function (id) {
                    selectedSet[String(id)] = true;
                });

                $mandatorySelect.empty();

                courses.forEach(function (course) {
                    var $option = $('<option></option>')
                        .val(course.id)
                        .attr('data-hours', course.contact_hours)
                        .text(course.title);

                    if (selectedSet[String(course.id)]) {
                        $option.prop('selected', true);
                    }

                    $mandatorySelect.append($option);
                });
            }

            function loadMandatoryCourses(licenseType, selectedIds) {
                if (!licenseType) {
                    destroyMandatorySelect2();
                    $mandatorySelect.empty();
                    setMandatoryState('pick');
                    updateMandatoryCount();
                    return;
                }

                setMandatoryState('loading');
                $none.text(noneDefaultMessage);

                var requestId = ++mandatoryRequestId;

                $.ajax({
                    url: mandatoryCoursesUrl,
                    method: 'GET',
                    data: { license_type: licenseType },
                    dataType: 'json'
                }).done(function (response) {
                    if (requestId !== mandatoryRequestId) {
                        return;
                    }

                    var courses = response.courses || [];

                    destroyMandatorySelect2();
                    buildMandatoryOptions(courses, selectedIds || []);

                    if (courses.length === 0) {
                        setMandatoryState('none');
                    } else {
                        setMandatoryState('select');
                        initMandatorySelect2();
                    }

                    updateMandatoryCount();
                }).fail(function () {
                    if (requestId !== mandatoryRequestId) {
                        return;
                    }

                    destroyMandatorySelect2();
                    $mandatorySelect.empty();
                    $none.text('Could not load mandatory courses. Please try again.');
                    setMandatoryState('none');
                    updateMandatoryCount();
                });
            }

            $licenseType.on('change', function () {
                loadMandatoryCourses(this.value, []);
            });

            $('#total_hours, #elective_hours_allowed').on('input change', updateHoursSummary);

            var initialLicenseType = $licenseType.val();
            if (initialLicenseType) {
                if ($mandatorySelect.find('option').length > 0) {
                    setMandatoryState('select');
                    initMandatorySelect2();
                    updateMandatoryCount();
                } else {
                    setMandatoryState('none');
                    updateMandatoryCount();
                }
            } else {
                destroyMandatorySelect2();
                $mandatorySelect.empty();
                setMandatoryState('pick');
                updateMandatoryCount();
            }

            $('#ce_bundle_form').on('submit', function (event) {
                if (!$mandatorySelect.length) {
                    return;
                }

                if (!$licenseType.val()) {
                    event.preventDefault();
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Select a license type first.', 'Error');
                    }
                    return;
                }

                if ($selectWrap.hasClass('d-none')) {
                    event.preventDefault();
                    if (typeof toastr !== 'undefined') {
                        toastr.error('No mandatory courses are available for this license type.', 'Error');
                    }
                    return;
                }

                var selected = $mandatorySelect.val() || [];
                if (selected.length === 0) {
                    event.preventDefault();
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Select at least one mandatory course.', 'Error');
                    }
                    return;
                }

                updateHoursSummary();

                var totalHours = parseFloat($('#total_hours').val()) || 0;
                var mandatoryTotal = sumMandatoryHours();
                var electiveHours = parseFloat($('#elective_hours_allowed').val()) || 0;

                if (mandatoryTotal > totalHours) {
                    event.preventDefault();
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Selected mandatory courses exceed total hours.', 'Error');
                    }
                    return;
                }

                if ((mandatoryTotal + electiveHours) > totalHours) {
                    event.preventDefault();
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Mandatory plus elective hours cannot exceed total hours.', 'Error');
                    }
                }
            });
        })();
    </script>
@endpush
