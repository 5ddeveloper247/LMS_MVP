@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 300px;
            color: #000 !important;
            background-color: #fff !important;
            -webkit-text-fill-color: #000 !important;
        }

        .ck-editor__editable p,
        .ck-editor__editable li,
        .ck-editor__editable span {
            color: #000 !important;
            -webkit-text-fill-color: #000 !important;
        }

        .ck-editor__editable ul li {
            list-style: disc;
        }

        .ck-editor__editable ol li {
            list-style: decimal;
        }
    </style>
@endpush

@php
    $offering = $offering ?? null;
    $groups = $groups ?? collect();
    $categories = $categories ?? collect();
    $onlinePart = $offering ? $offering->deliveryParts->firstWhere('part_type', 'online') : null;
    $inPersonPart = $offering ? $offering->deliveryParts->firstWhere('part_type', 'in_person') : null;
    $deliveryMode = old('delivery_mode', $offering->delivery_mode ?? 'in_person');
    $formAction = $offering
        ? route('certificationOfferings.update', $offering->id)
        : route('certificationOfferings.store');

    $optionRows = old('options');
    if ($optionRows === null) {
        if ($offering && $offering->relationLoaded('options') && $offering->options->isNotEmpty()) {
            $optionRows = $offering->options->map(function ($opt) {
                return [
                    'title' => $opt->title,
                    'subtitle' => $opt->subtitle,
                    'price' => $opt->price,
                    'product_code' => $opt->product_code,
                    'sort_order' => $opt->sort_order,
                ];
            })->values()->all();
        } else {
            $optionRows = [
                ['title' => 'Initial', 'subtitle' => '', 'price' => '', 'product_code' => '', 'sort_order' => 0],
                ['title' => 'Renewal', 'subtitle' => '', 'price' => '', 'product_code' => '', 'sort_order' => 1],
            ];
        }
    }
@endphp

<form action="{{ $formAction }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Name') }} <span class="text-danger">*</span></label>
                <input class="primary_input_field" name="name" type="text"
                    value="{{ old('name', $offering->name ?? '') }}" required>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Slug') }}</label>
                <input class="primary_input_field" name="slug" type="text"
                    value="{{ old('slug', $offering->slug ?? '') }}" placeholder="auto-from-name">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Catalog group') }}</label>
                <select class="primary_select" name="certification_group_id">
                    <option value="">{{ __('— None —') }}</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}"
                            {{ (string) old('certification_group_id', $offering->certification_group_id ?? '') === (string) $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Certification category') }}</label>
                <select class="primary_select" name="certification_category_id">
                    <option value="">{{ __('— Select —') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (string) old('certification_category_id', $offering->certification_category_id ?? '') === (string) $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Pill label on enroll hub (ACLS, BLS, …).</small>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Short description') }}</label>
                <textarea class="primary_input_field" name="short_description" rows="3"
                    placeholder="Card / list summary (plain text)">{{ old('short_description', $offering->short_description ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Learning Objectives') }}</label>
                <small class="text-muted d-block mb-2">{{ __('Same as course detail — use a bullet list in the editor.') }}</small>
                <textarea class="custom_summernote" name="outcomes" id="cert_outcomes" rows="6">{{ old('outcomes', $offering->outcomes ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Who this course is for') }}</label>
                <textarea class="custom_summernote" name="requirements" id="cert_requirements" rows="5">{{ old('requirements', $offering->requirements ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Format label') }}</label>
                <input class="primary_input_field" name="format_label" type="text"
                    value="{{ old('format_label', $offering->format_label ?? '') }}"
                    placeholder="e.g. In-person skills session">
            </div>
        </div>
        <div class="col-xl-3">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('CE hours') }}</label>
                <input class="primary_input_field" name="ce_hours" type="number" step="0.01" min="0"
                    value="{{ old('ce_hours', $offering->ce_hours ?? '') }}">
            </div>
        </div>
        <div class="col-xl-3">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('CE note') }}</label>
                <input class="primary_input_field" name="ce_note" type="text"
                    value="{{ old('ce_note', $offering->ce_note ?? '') }}"
                    placeholder="e.g. Contact hours">
            </div>
        </div>

        <div class="col-xl-12 mb-10">
            <h5 class="mb-3">{{ __('Pricing options') }} <span class="text-danger">*</span></h5>
            <p class="text-muted mb-15">Initial / Renewal or a single price row for one-option courses.</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="cert_options_table">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Subtitle') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Product code') }}</th>
                            <th width="60"></th>
                        </tr>
                    </thead>
                    <tbody id="cert_options_body">
                        @foreach ($optionRows as $idx => $row)
                            <tr class="cert-option-row">
                                <td>
                                    <input class="primary_input_field" name="options[{{ $idx }}][title]" type="text"
                                        value="{{ $row['title'] ?? '' }}" required>
                                    <input type="hidden" name="options[{{ $idx }}][sort_order]"
                                        value="{{ $row['sort_order'] ?? $idx }}" class="cert-option-sort">
                                </td>
                                <td>
                                    <input class="primary_input_field" name="options[{{ $idx }}][subtitle]" type="text"
                                        value="{{ $row['subtitle'] ?? '' }}">
                                </td>
                                <td>
                                    <input class="primary_input_field" name="options[{{ $idx }}][price]" type="number"
                                        step="0.01" min="0" value="{{ $row['price'] ?? '' }}" required>
                                </td>
                                <td>
                                    <input class="primary_input_field" name="options[{{ $idx }}][product_code]" type="text"
                                        value="{{ $row['product_code'] ?? '' }}">
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="primary-btn small tr-bg cert-option-remove"
                                        title="{{ __('Remove') }}">&times;</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="primary-btn radius_30px fix-gr-bg" id="cert_option_add">
                <i class="fa fa-plus"></i> {{ __('Add price option') }}
            </button>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Delivery mode') }} <span class="text-danger">*</span></label>
                <select class="primary_select" name="delivery_mode" id="cert_delivery_mode" required>
                    <option value="in_person" {{ $deliveryMode === 'in_person' ? 'selected' : '' }}>In person</option>
                    <option value="online" {{ $deliveryMode === 'online' ? 'selected' : '' }}>Online</option>
                    <option value="hybrid" {{ $deliveryMode === 'hybrid' ? 'selected' : '' }}>Hybrid (online + in person)</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Duration summary') }}</label>
                <input class="primary_input_field" name="duration_summary" type="text"
                    value="{{ old('duration_summary', $offering->duration_summary ?? '') }}"
                    placeholder="Optional overall label, e.g. 6-8 hours total">
            </div>
        </div>

        <div class="col-xl-12 mb-10" id="cert_online_block">
            <h5 class="mb-3">Online component</h5>
            <div class="row">
                <div class="col-xl-4">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Duration') }} <span class="text-danger cert-online-req">*</span></label>
                        <input class="primary_input_field cert-online-field" name="online_duration" type="text"
                            value="{{ old('online_duration', optional($onlinePart)->duration ?? '') }}"
                            placeholder="e.g. 2 days, 4 hours">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Session label') }}</label>
                        <input class="primary_input_field cert-online-field" name="online_session_label" type="text"
                            value="{{ old('online_session_label', optional($onlinePart)->session_label ?? '') }}"
                            placeholder="e.g. Live virtual sessions">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Notes') }}</label>
                        <textarea class="primary_input_field cert-online-field" name="online_notes" rows="2">{{ old('online_notes', optional($onlinePart)->notes ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-10" id="cert_in_person_block">
            <h5 class="mb-3">In-person component</h5>
            <div class="row">
                <div class="col-xl-4">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Duration') }} <span class="text-danger cert-inperson-req">*</span></label>
                        <input class="primary_input_field cert-inperson-field" name="in_person_duration" type="text"
                            value="{{ old('in_person_duration', optional($inPersonPart)->duration ?? '') }}"
                            placeholder="e.g. 3-4 hour, 1 day">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Session label') }}</label>
                        <input class="primary_input_field cert-inperson-field" name="in_person_session_label" type="text"
                            value="{{ old('in_person_session_label', optional($inPersonPart)->session_label ?? '') }}"
                            placeholder="e.g. 1-2 Day Physical Lab">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label">{{ __('Notes') }}</label>
                        <textarea class="primary_input_field cert-inperson-field" name="in_person_notes" rows="2">{{ old('in_person_notes', optional($inPersonPart)->notes ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Course outline') }} (HTML) <span class="text-danger">*</span></label>
                <small class="text-muted d-block mb-2">{{ __('Shown in the Course Outline section on the public detail page.') }}</small>
                <textarea class="custom_summernote" name="content" id="cert_content" rows="8">{{ old('content', $offering->content ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Sort order') }}</label>
                <input class="primary_input_field" name="sort_order" type="number" min="0"
                    value="{{ old('sort_order', $offering->sort_order ?? 0) }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('common.Status') }}</label>
                <select class="primary_select" name="status">
                    <option value="1" {{ (string) old('status', $offering->status ?? 1) === '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="0" {{ (string) old('status', $offering->status ?? 1) === '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-lg-12 text-center">
        <div class="d-flex justify-content-center pt_20">
            <button type="submit" class="primary-btn semi_large fix-gr-bg">
                <i class="ti-check"></i> {{ $offering ? __('common.Update') : __('common.Save') }}
            </button>
            <a href="{{ route('certificationOfferings.index') }}" class="primary-btn tr-bg ml-2">{{ __('common.Cancel') }}</a>
            @if ($offering)
                <a href="{{ route('certificationOfferingSessions.index', $offering->id) }}" class="primary-btn tr-bg ml-2">
                    {{ __('Training sessions') }}
                </a>
            @endif
        </div>
    </div>
</form>

@push('scripts')
    <script>
        function toggleCertDeliveryBlocks() {
            var mode = $('#cert_delivery_mode').val();
            var showOnline = mode === 'online' || mode === 'hybrid';
            var showInPerson = mode === 'in_person' || mode === 'hybrid';

            $('#cert_online_block').toggle(showOnline);
            $('#cert_in_person_block').toggle(showInPerson);

            $('.cert-online-field').prop('required', showOnline);
            $('.cert-inperson-field').prop('required', showInPerson);
        }

        function reindexCertOptions() {
            $('#cert_options_body .cert-option-row').each(function (i) {
                $(this).find('input, select, textarea').each(function () {
                    var name = $(this).attr('name');
                    if (name) {
                        $(this).attr('name', name.replace(/options\[\d+\]/, 'options[' + i + ']'));
                    }
                });
                $(this).find('.cert-option-sort').val(i);
            });
        }

        $(document).ready(function () {
            toggleCertDeliveryBlocks();
            $('#cert_delivery_mode').on('change', toggleCertDeliveryBlocks);

            $('#cert_option_add').on('click', function () {
                var idx = $('#cert_options_body .cert-option-row').length;
                var row = '<tr class="cert-option-row">' +
                    '<td><input class="primary_input_field" name="options[' + idx + '][title]" type="text" required>' +
                    '<input type="hidden" name="options[' + idx + '][sort_order]" value="' + idx + '" class="cert-option-sort"></td>' +
                    '<td><input class="primary_input_field" name="options[' + idx + '][subtitle]" type="text"></td>' +
                    '<td><input class="primary_input_field" name="options[' + idx + '][price]" type="number" step="0.01" min="0" required></td>' +
                    '<td><input class="primary_input_field" name="options[' + idx + '][product_code]" type="text"></td>' +
                    '<td class="text-center align-middle"><button type="button" class="primary-btn small tr-bg cert-option-remove">&times;</button></td>' +
                    '</tr>';
                $('#cert_options_body').append(row);
            });

            $(document).on('click', '.cert-option-remove', function () {
                if ($('#cert_options_body .cert-option-row').length <= 1) {
                    return;
                }
                $(this).closest('tr').remove();
                reindexCertOptions();
            });

            var customFontFam = ['Arial', 'Helvetica', 'Cavolini', 'Jost', 'Impact', 'Tahoma', 'Verdana',
                'Garamond', 'Georgia', 'monospace', 'fantasy', 'Papyrus', 'Poppins'
            ];

            var certEditors = {};

            function certEditorConfig() {
                return {
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
                };
            }

            ['cert_content', 'cert_outcomes', 'cert_requirements'].forEach(function (fieldId) {
                var el = document.getElementById(fieldId);
                var $field = $('#' + fieldId);
                if (!el || !$field.length || typeof ClassicEditor === 'undefined') {
                    return;
                }
                ClassicEditor.create(el, certEditorConfig()).then(function (editor) {
                    certEditors[fieldId] = editor;
                    editor.model.document.on('change:data', function () {
                        $field.val(editor.getData());
                    });
                }).catch(function (error) {
                    console.error(error);
                });
            });

            $('#cert_content').closest('form').on('submit', function () {
                Object.keys(certEditors).forEach(function (fieldId) {
                    var editor = certEditors[fieldId];
                    if (editor) {
                        $('#' + fieldId).val(editor.getData());
                    }
                });
            });
        });
    </script>
@endpush
