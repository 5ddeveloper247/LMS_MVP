@php
    $typeLabels = [
        1 => 'Merchandise',
        2 => 'Books',
        3 => 'Study Guides',
        4 => 'Study Tools',
    ];
    $grouped = $selectableProducts->groupBy('type');
@endphp

<div class="row">
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="name">
                {{ __('Name of Bundle') }} <strong class="text-danger">*</strong>
            </label>
            <input class="primary_input_field" name="name" id="name" type="text"
                value="{{ old('name', $bundle->name ?? '') }}" required>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="status">{{ __('common.Status') }}</label>
            <select class="primary_select" name="status" id="status">
                <option value="1" {{ (string) old('status', isset($bundle) ? ($bundle->status ? '1' : '0') : '1') === '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (string) old('status', isset($bundle) ? ($bundle->status ? '1' : '0') : '1') === '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="is_featured">{{ __('Best Value') }}</label>
            <select class="primary_select" name="is_featured" id="is_featured">
                <option value="0" {{ (string) old('is_featured', isset($bundle) ? ($bundle->is_featured ? '1' : '0') : '0') === '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ (string) old('is_featured', isset($bundle) ? ($bundle->is_featured ? '1' : '0') : '0') === '1' ? 'selected' : '' }}>Yes — show Best Value badge</option>
            </select>
            <small class="text-muted">Only one bundle can be Best Value. Setting Yes clears it on others.</small>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="primary_input mb-35">
            <label class="primary_input_label" for="short_description">{{ __('Short Description') }}</label>
            <textarea class="custom_summernote" name="short_description" id="short_description" cols="30"
                rows="10">{{ old('short_description', $bundle->short_description ?? '') }}</textarea>
        </div>
    </div>
</div>

<div class="row">
    @foreach ([1, 2, 3, 4] as $n)
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="component_{{ $n }}">{{ __('Component') }} {{ $n }}</label>
                <input class="primary_input_field" name="component_{{ $n }}" id="component_{{ $n }}" type="text"
                    value="{{ old('component_' . $n, $bundle->{'component_' . $n} ?? '') }}">
            </div>
        </div>
    @endforeach
</div>

<div class="row" id="pricing_fields">
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="price">
                {{ __('Price of Bundle') }} <strong class="text-danger">*</strong>
            </label>
            <input class="primary_input_field" id="price" name="price" type="number" step="0.01" min="0"
                value="{{ old('price', $bundle->price ?? '') }}" required>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="tax_percent">
                {{ __('Tax Percent') }} <strong class="text-danger">*</strong>
            </label>
            <input class="primary_input_field" id="tax_percent" name="tax_percent" type="number" step="0.01" min="0" max="100"
                value="{{ old('tax_percent', $bundle->tax_percent ?? '0') }}" required>
        </div>
    </div>
    <div class="col-xl-6 courseBox mb-25">
        <label class="primary_input_label" for="discount_type">{{ __('Discount Type') }}</label>
        <select class="primary_select" name="discount_type" id="discount_type">
            <option value="">{{ __('Select Type') }}</option>
            <option value="percent" {{ old('discount_type', $bundle->discount_type ?? '') === 'percent' ? 'selected' : '' }}>Percent</option>
            <option value="fixed" {{ old('discount_type', $bundle->discount_type ?? '') === 'fixed' ? 'selected' : '' }}>Fixed</option>
        </select>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="discount">{{ __('Discount') }}</label>
            <input class="primary_input_field" name="discount" id="discount" type="number" step="0.01" min="0"
                value="{{ old('discount', $bundle->discount ?? '') }}">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="total_amount">{{ __('Total Amount') }}</label>
            <input class="primary_input_field" id="total_amount" type="number" value="{{ old('total_amount', $bundle->total_amount ?? '') }}" disabled>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-xl-12 mb-2">
        <label class="primary_input_label">
            {{ __('Select Products') }} <strong class="text-danger">*</strong>
        </label>
        <small class="text-muted d-block mb-2">Choose items from each category (multiple allowed).</small>
    </div>

    @foreach ([2, 3, 4, 1] as $type)
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="bundle_products_{{ $type }}">{{ $typeLabels[$type] }}</label>
                <select class="bundle-product-select"
                    name="product_ids[]"
                    id="bundle_products_{{ $type }}"
                    multiple
                    data-placeholder="Select {{ strtolower($typeLabels[$type]) }}...">
                    @if ($grouped->has($type) && $grouped[$type]->count())
                        @foreach ($grouped[$type] as $product)
                            <option value="{{ $product->id }}"
                                {{ in_array($product->id, (array) $selectedProductIds) ? 'selected' : '' }}>
                                {{ $product->title }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    @endforeach
</div>

{{-- Bundle Images (required on create; optional add-more on edit) --}}
<div class="row mt-4">
    <div class="col-xl-12">
        <label class="primary_input_label">
            {{ __('Bundle Images') }} (Max Image Size 2MB)
            @if (!isset($bundle) || empty($bundle->id))
                <strong class="text-danger">*</strong>
            @endif
        </label>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-35">
            <div class="primary_file_uploader">
                <input class="primary-input filePlaceholder placeholder_txt" type="text"
                    placeholder="Browse Image file" readonly>
                <button type="button">
                    <label class="primary-btn small fix-gr-bg" for="bundle_images_input">Browse</label>
                    <input type="file" class="d-none fileUpload" id="bundle_images_input"
                        accept="image/jpeg,image/jpg,image/png" multiple>
                </button>
            </div>
        </div>
    </div>
    <div class="col-xl-10 text-center">
        <div class="row" id="bundle-preview-container">
            @if (isset($bundle) && $bundle->files && $bundle->files->count())
                @foreach ($bundle->files as $index => $file)
                    <div class="col-sm-2 preview-item" data-index="{{ $index }}">
                        <div class="position-relative d-inline-block">
                            <img src="{{ url($file->file_path) }}" class="img-thumbnail"
                                style="width:100px;height:100px;object-fit:cover;">
                            <span class="deleteBundleFile" data-id="{{ $file->id }}"
                                style="position:absolute;top:0px;right:0px;cursor:pointer;color:red;background:white;border-radius:50%;padding:0px 6px;font-size:12px;">&times;</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

{{-- Bundle Video (optional) --}}
<div class="row mt-4">
    <div class="col-xl-12">
        <label class="primary_input_label">
            {{ __('Bundle Video') }} (Max Video Size 1MB)
        </label>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-35">
            <div class="primary_file_uploader">
                <input class="primary-input filePlaceholder placeholder_txt" type="text"
                    id="bundle_video_placeholder" placeholder="Browse Video file" readonly>
                <button type="button">
                    <label class="primary-btn small fix-gr-bg" for="bundle_video_input">Browse</label>
                    <input type="file" class="d-none fileUpload" id="bundle_video_input"
                        accept="video/*">
                </button>
            </div>
        </div>
    </div>
    <div class="col-xl-10 text-center">
        <div class="row" id="bundle-video-preview-container">
            @php
                $existingBundleVideo = isset($bundle) ? optional($bundle->videos)->first() : null;
            @endphp
            @if (!empty($existingBundleVideo))
                <div class="col-sm-4 video-preview-item" data-file-id="{{ $existingBundleVideo->id }}">
                    <div class="position-relative d-inline-block">
                        <video width="200" height="150" controls style="object-fit:cover;">
                            <source src="{{ url($existingBundleVideo->file_path) }}"
                                type="video/{{ $existingBundleVideo->file_type }}">
                            Your browser does not support the video tag.
                        </video>
                        <span class="deleteBundleFile" data-id="{{ $existingBundleVideo->id }}"
                            style="position:absolute;top:0px;right:0px;cursor:pointer;color:red;background:white;border-radius:50%;padding:0px 6px;font-size:12px;">&times;</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
