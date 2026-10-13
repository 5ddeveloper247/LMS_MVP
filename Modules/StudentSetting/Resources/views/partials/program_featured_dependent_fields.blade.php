<div id="featured-program-admin-fields" class="featured-program-admin-fields" style="display: none;">
    <div class="row mb-30">
        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="short_description">Short description</label>
                <textarea class="primary_input_field" name="short_description" id="short_description" rows="2" maxlength="500"
                          placeholder="Brief summary on the FL BON spotlight card (orange left side)">{{ old('short_description', $programListing->short_description ?? '') }}</textarea>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="featured_meta_specialty">Specialty</label>
                <input class="primary_input_field" type="text" name="featured_meta_specialty" id="featured_meta_specialty" maxlength="255"
                       placeholder="Example: FL BON Compliance"
                       value="{{ old('featured_meta_specialty', $programListing->featured_meta_specialty ?? '') }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="featured_meta_format">Format</label>
                <input class="primary_input_field" type="text" name="featured_meta_format" id="featured_meta_format" maxlength="255"
                       placeholder="Example: Structured + Personal"
                       value="{{ old('featured_meta_format', $programListing->featured_meta_format ?? '') }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for="featured_meta_since">Since</label>
                <input class="primary_input_field" type="text" name="featured_meta_since" id="featured_meta_since" maxlength="255"
                       placeholder="Example: 2019"
                       value="{{ old('featured_meta_since', $programListing->featured_meta_since ?? '') }}">
            </div>
        </div>
    </div>
</div>
