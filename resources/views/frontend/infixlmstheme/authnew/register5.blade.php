{{-- Payment step (/register-pay) — same backend; login-matching design shell --}}
@php
    $registerStep = 4;
    $registerStepTotal = 4;
    $registerStepTitle = 'Enrollment Payment';
    $registerStepSubtitle = 'Step 4 of 4 — complete payment to finish student enrollment.';
    $registerStepPartial = theme('authnew.partials.register-step-payment');
@endphp

@push('register_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(document).ready(function () {
    $('#cardNumber').mask('0000 0000 0000 0000');
    $('#expiryDate').mask('00/0000');
    $('#cvv').mask('000');

    $('#payment-form').submit(function (e) {
      e.preventDefault();

      var cardholderName = $('#cardHolder').val();
      var cardNumber = $('#cardNumber').val();
      var expirationDate = $('#expiryDate').val();
      var cvv = $('#cvv').val();

      if (!$("#accept").is(':checked')) {
        toastr.error('Terms & Conditions must be accepted.', 'Error');
        return false;
      }

      if (cardholderName === '' || cardNumber === '' || expirationDate === '' || cvv === '') {
        alert('All fields are required');
      } else if (cardNumber.length < 16 || cvv.length < 3) {
        alert('Invalid card number or CVV');
        $('#cardNumber').addClass("bordered-1 border-danger");
        $('#cvv').addClass("bordered-1 border-danger");
      } else {
        const form = document.querySelector('#payment-form');
        form.submit();
      }
    });
  });
</script>
@endpush

@include(theme('authnew.register-flow'))
