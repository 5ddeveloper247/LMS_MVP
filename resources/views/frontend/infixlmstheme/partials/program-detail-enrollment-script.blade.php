<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.addToCartBuyNow', function () {
        var installmentCount = $(this).attr('data-installment');
        var redirectURL = $(this).attr('data-url');

        if (parseInt(installmentCount, 10) > 0) {
            Swal.fire({
                title: 'Choose your option',
                text: 'Would you like to buy with installments or full payment?',
                icon: 'question',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Buy Installment',
                denyButtonText: 'Buy Full',
                cancelButtonText: 'Close'
            }).then(function (result) {
                if (result.isConfirmed) {
                    redirectURL += (redirectURL.indexOf('?') >= 0 ? '&' : '?') + 'is_installment=true';
                    window.location.href = redirectURL;
                } else if (result.isDenied) {
                    redirectURL += (redirectURL.indexOf('?') >= 0 ? '&' : '?') + 'is_installment=false';
                    window.location.href = redirectURL;
                }
            });
        } else {
            redirectURL += (redirectURL.indexOf('?') >= 0 ? '&' : '?') + 'is_installment=false';
            window.location.href = redirectURL;
        }
    });
</script>
