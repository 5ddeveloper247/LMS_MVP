<div class="row mt-20 mb-20">
    <div class="col-xl-12">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="programs_page_eyebrow">Programs page — section label</label>
            <input class="primary_input_field" type="text" name="programs_page_eyebrow" id="programs_page_eyebrow" maxlength="255"
                   placeholder="Example: For NCLEX Test-Takers"
                   value="{{ old('programs_page_eyebrow', $programListing->programs_page_eyebrow ?? $programListing->featured_eyebrow ?? '') }}">
        </div>
    </div>
</div>
