{{-- Rich-text listing blocks (Programs page) — after program description --}}
<div class="row mt-30 mb-40">
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="what_its_for">Who it&apos;s for <i class="fa fa-retweet clear_area" data-field-id="what_its_for" title="Clear Text Area..."></i></label>
            <textarea class="custom_summernote" name="what_its_for" id="what_its_for" cols="30" rows="6">{!! old('what_its_for', $programListing->what_its_for ?? '') !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="what_makes_different">What makes it different <i class="fa fa-retweet clear_area" data-field-id="what_makes_different" title="Clear Text Area..."></i></label>
            <textarea class="custom_summernote" name="what_makes_different" id="what_makes_different" cols="30" rows="6">{!! old('what_makes_different', $programListing->what_makes_different ?? '') !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="what_you_will_learn">What you will learn <i class="fa fa-retweet clear_area" data-field-id="what_you_will_learn" title="Clear Text Area..."></i></label>
            <textarea class="custom_summernote" name="what_you_will_learn" id="what_you_will_learn" cols="30" rows="6">{!! old('what_you_will_learn', $programListing->what_you_will_learn ?? '') !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="primary_input mb-25">
            <label class="primary_input_label" for="signature_features">Signature features <i class="fa fa-retweet clear_area" data-field-id="signature_features" title="Clear Text Area..."></i></label>
            <textarea class="custom_summernote" name="signature_features" id="signature_features" cols="30" rows="6">{!! old('signature_features', $programListing->signature_features ?? '') !!}</textarea>
        </div>
    </div>
</div>
