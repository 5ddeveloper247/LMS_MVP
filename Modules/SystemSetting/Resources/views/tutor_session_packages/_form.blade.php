@php
    $isEdit = isset($package);
    $action = $isEdit
        ? route('tutorSessionPackages.update', $package->id)
        : route('tutorSessionPackages.store');
@endphp

<form action="{{ $action }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="heading">{{ __('Heading') }} <strong class="text-danger">*</strong></label>
                <input class="primary_input_field" type="text" name="heading" id="heading"
                    value="{{ old('heading', $package->heading ?? '') }}" maxlength="100" required>
                @error('heading')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="name">{{ __('Name') }} <strong class="text-danger">*</strong></label>
                <input class="primary_input_field" type="text" name="name" id="name"
                    value="{{ old('name', $package->name ?? '') }}" maxlength="150" required>
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="description">{{ __('Description') }}</label>
                <textarea class="primary_input_field" name="description" id="description" rows="4">{{ old('description', $package->description ?? '') }}</textarea>
                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="sessions_count">{{ __('Number of Sessions') }} <strong class="text-danger">*</strong></label>
                <input class="primary_input_field" type="number" name="sessions_count" id="sessions_count"
                    value="{{ old('sessions_count', $package->sessions_count ?? 1) }}" min="1" max="100" required>
                @error('sessions_count')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="price">{{ __('Package Price') }} <strong class="text-danger">*</strong></label>
                <input class="primary_input_field" type="number" step="0.01" min="0" name="price" id="price"
                    value="{{ old('price', $package->price ?? '') }}" required>
                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="sort_order">{{ __('Sort Order') }}</label>
                <input class="primary_input_field" type="number" name="sort_order" id="sort_order"
                    value="{{ old('sort_order', $package->sort_order ?? 0) }}" min="0">
                @error('sort_order')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="price_note">{{ __('Short Description Under Price') }}</label>
                <input class="primary_input_field" type="text" name="price_note" id="price_note"
                    value="{{ old('price_note', $package->price_note ?? '') }}" maxlength="255"
                    placeholder="e.g. $65/session · Save $40">
                @error('price_note')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        @foreach ([1, 2, 3, 4, 5] as $i)
            <div class="col-xl-12">
                <div class="primary_input mb-25">
                    <label class="primary_input_label" for="line_{{ $i }}">{{ __('Line Component') }} {{ $i }}</label>
                    <input class="primary_input_field" type="text" name="line_{{ $i }}" id="line_{{ $i }}"
                        value="{{ old('line_' . $i, $package->{'line_' . $i} ?? '') }}" maxlength="255">
                    @error('line_' . $i)<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        @endforeach

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_checkbox d-flex mr-12" for="is_featured">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                        {{ old('is_featured', $package->is_featured ?? false) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <p class="ml-2 mb-0">{{ __('Show on Tutoring (max 3)') }}</p>
                </label>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_checkbox d-flex mr-12" for="popular">
                    <input type="checkbox" id="popular" name="popular" value="1"
                        {{ old('popular', $package->popular ?? false) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <p class="ml-2 mb-0">{{ __('Most Popular badge') }}</p>
                </label>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_checkbox d-flex mr-12" for="status">
                    <input type="checkbox" id="status" name="status" value="1"
                        {{ old('status', $package->status ?? true) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <p class="ml-2 mb-0">{{ __('Active') }}</p>
                </label>
            </div>
        </div>

        <div class="col-lg-12 text-center">
            <div class="d-flex justify-content-center">
                <a href="{{ route('tutorSessionPackages.index') }}" class="primary-btn tr-bg mr-10">{{ __('common.Cancel') }}</a>
                <button class="primary-btn fix-gr-bg" type="submit">
                    <i class="ti-check"></i>
                    {{ $isEdit ? __('common.Update') : __('common.Save') }}
                </button>
            </div>
        </div>
    </div>
</form>
