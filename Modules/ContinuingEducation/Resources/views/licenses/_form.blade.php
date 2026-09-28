@php
    $isEdit = isset($license);
    $action = $isEdit
        ? route('continuing-education.licenses.update', $license->id)
        : route('continuing-education.licenses.store');
@endphp

<form action="{{ $action }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xl-8">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="name">
                    Name <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="name" id="name"
                    value="{{ old('name', $license->name ?? '') }}" maxlength="255" placeholder="Florida RN & LPN" required>
                @error('name')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="seq_no">Sort Order</label>
                <input class="primary_input_field" type="number" min="0" max="9999" name="seq_no" id="seq_no"
                    value="{{ old('seq_no', $license->seq_no ?? '') }}" placeholder="1">
                @error('seq_no')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="subtitle">Subtitle</label>
                <input class="primary_input_field" type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $license->subtitle ?? '') }}" maxlength="255"
                    placeholder="License Renewal Packages">
                @error('subtitle')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="description">Description</label>
                <textarea class="primary_input_field" name="description" id="description" rows="4"
                    placeholder="Short description shown on the license card.">{{ old('description', $license->description ?? '') }}</textarea>
                @error('description')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="component_1">
                    Component 1 <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="component_1" id="component_1"
                    value="{{ old('component_1', $license->component_1 ?? '') }}" maxlength="500" required>
                @error('component_1')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="component_2">
                    Component 2 <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="component_2" id="component_2"
                    value="{{ old('component_2', $license->component_2 ?? '') }}" maxlength="500" required>
                @error('component_2')<span class="text-danger d-block">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="component_3">
                    Component 3 <strong class="text-danger">*</strong>
                </label>
                <input class="primary_input_field" type="text" name="component_3" id="component_3"
                    value="{{ old('component_3', $license->component_3 ?? '') }}" maxlength="500" required>
                @error('component_3')<span class="text-danger d-block">{{ $message }}</span>@enderror
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
                            {{ old('card_style', $license->card_style ?? 'teal') === $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('card_style')<span class="text-danger d-block">{{ $message }}</span>@enderror
                <p class="text-muted mb-0 mt-2" style="font-size:13px;">
                    Teal opens the RN &amp; LPN packages page; Terracotta opens the APRN packages page.
                </p>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="button_label">Button Label</label>
                <input class="primary_input_field" type="text" name="button_label" id="button_label"
                    value="{{ old('button_label', $license->button_label ?? '') }}" maxlength="255"
                    placeholder="View RN & LPN Packages">
                @error('button_label')<span class="text-danger d-block">{{ $message }}</span>@enderror
                <p class="text-muted mb-0 mt-2" style="font-size:13px;">
                    Button destination is set automatically from card style.
                </p>
            </div>
        </div>

        @php
            $isFeatured = old('featured', $license->featured ?? false);
            $featuredSlotsLeft = ($maxFeatured ?? 2) - ($featuredCount ?? 0);
            $canFeature = $isFeatured || ($featuredSlotsLeft ?? 0) > 0;
        @endphp

        <div class="col-xl-12">
            <label class="primary_input_label d-block mb-3">Status</label>
        </div>

        <div class="col-xl-4 mt-10">
            <label class="primary_checkbox d-flex mr-12" for="license_status">
                <input type="checkbox" id="license_status" name="status" value="1"
                    {{ old('status', $license->status ?? true) ? 'checked' : '' }}>
                <span class="checkmark mr-2"></span>
                {{ __('common.Active') }}
            </label>
        </div>

        <div class="col-xl-4 mt-10">
            <label class="primary_checkbox d-flex mr-12" for="license_publish">
                <input type="checkbox" id="license_publish" name="publish" value="1"
                    {{ old('publish', $license->publish ?? true) ? 'checked' : '' }}>
                <span class="checkmark mr-2"></span>
                Published on frontend
            </label>
        </div>

        <div class="col-xl-4 mt-10">
            <label class="primary_checkbox d-flex mr-12" for="license_featured">
                <input type="checkbox" id="license_featured" name="featured" value="1"
                    {{ $isFeatured ? 'checked' : '' }}
                    {{ $canFeature ? '' : 'disabled' }}>
                <span class="checkmark mr-2"></span>
                Featured on CE homepage
            </label>
        </div>

        <div class="col-xl-12 mt-10">
            <p class="text-muted mb-0" style="font-size:13px;">
                Maximum {{ $maxFeatured ?? 2 }} licenses can be featured at a time
                ({{ $featuredCount ?? 0 }}/{{ $maxFeatured ?? 2 }} used).
            </p>
            @error('featured')<span class="text-danger d-block">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="col-lg-12 text-center mt-40 pt-3">
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('continuing-education.licenses.index') }}" class="primary-btn tr-bg mr-10">
                {{ trans('common.Cancel') }}
            </a>
            <button type="submit" class="primary-btn fix-gr-bg">
                <i class="ti-check"></i>
                {{ $isEdit ? 'Update License' : 'Save License' }}
            </button>
        </div>
    </div>
</form>
