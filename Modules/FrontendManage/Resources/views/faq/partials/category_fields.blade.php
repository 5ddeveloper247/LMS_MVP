@php
    $fieldPrefix = isset($prefix) ? $prefix . '_' : '';
@endphp
<div class="row">
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="{{ $fieldPrefix }}categoryName">{{ __('common.Name') }} <strong class="text-danger">*</strong></label>
            <input class="primary_input_field" type="text" name="name" id="{{ $fieldPrefix }}categoryName"
                   placeholder="Programs" required maxlength="255">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="{{ $fieldPrefix }}categorySlug">Slug (anchor id)</label>
            <input class="primary_input_field" type="text" name="slug" id="{{ $fieldPrefix }}categorySlug"
                   placeholder="programs">
            <small class="text-muted">Leave blank to generate from name.</small>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="{{ $fieldPrefix }}categoryEyebrow">Eyebrow</label>
            <input class="primary_input_field" type="text" name="eyebrow" id="{{ $fieldPrefix }}categoryEyebrow"
                   placeholder="Programs">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="{{ $fieldPrefix }}categorySectionTitle">Section title</label>
            <input class="primary_input_field" type="text" name="section_title" id="{{ $fieldPrefix }}categorySectionTitle"
                   placeholder="About Our Programs">
        </div>
    </div>
</div>
