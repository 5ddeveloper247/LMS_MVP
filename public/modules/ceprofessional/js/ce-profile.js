(function ($) {
    'use strict';

    $('#ce_profile_image').on('change', function () {
        var file = this.files && this.files[0];
        if (!file) {
            return;
        }

        $('#ce_profile_loading').show();
        uploadCeProfilePhoto(file);
    });

    function uploadCeProfilePhoto(file) {
        var formData = new FormData();
        var token = $('meta[name="csrf-token"]').attr('content');

        formData.append('file', file);
        formData.append('_token', token);

        $.ajax({
            url: $('#ce-ajax-update-profile-image').val(),
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status === 422 || data.state === 'error') {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Upload failed.');
                    }
                } else {
                    $('#ce_show_profile_image').attr('src', data.path);
                    $('.sidebar-profile').find('img').attr('src', data.path);
                    if (typeof toastr !== 'undefined') {
                        toastr.success(data.message || 'Photo updated.');
                    }
                }
                $('#ce_profile_loading').hide();
            },
            error: function () {
                if (typeof toastr !== 'undefined') {
                    toastr.error('Upload failed. Please try again.');
                }
                $('#ce_profile_loading').hide();
            }
        });
    }
})(jQuery);
