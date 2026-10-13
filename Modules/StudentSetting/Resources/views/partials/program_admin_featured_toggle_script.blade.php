<script>
    (function ($) {
        function toggleFlBonRemediationFields() {
            if ($('#flBonRemediationYes').is(':checked')) {
                $('#featured-program-admin-fields').slideDown(200);
            } else {
                $('#featured-program-admin-fields').slideUp(200);
            }
        }

        function blockDuplicateFlBonSelection() {
            if (!$('#flBonRemediationYes').is(':checked')) {
                return;
            }
            var $form = $('#flBonRemediationYes').closest('form');
            var otherId = $form.data('other-fl-bon-id');
            var otherTitle = $form.data('other-fl-bon-title') || 'another program';
            var currentId = $form.data('program-id');
            if (otherId && String(otherId) !== String(currentId || '')) {
                toastr.error(
                    'An FL BON Remediation Program is already set (“' + otherTitle + '”). Turn it off on that program first, then try again.',
                    'Error'
                );
                $('#flBonRemediationNo').prop('checked', true);
                toggleFlBonRemediationFields();
            }
        }

        $(document).ready(function () {
            toggleFlBonRemediationFields();
            $('#flBonRemediationYes, #flBonRemediationNo').on('change', function () {
                toggleFlBonRemediationFields();
                blockDuplicateFlBonSelection();
            });
        });
    })(jQuery);
</script>
