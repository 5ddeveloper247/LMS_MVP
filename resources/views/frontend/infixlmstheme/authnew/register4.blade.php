{{-- Agreement step (/register3) — same backend; login-matching design shell --}}
@php
    $registerStep = 3;
    $registerStepTotal = 4;
    $registerStepTitle = 'Authorization Agreement';
    $registerStepSubtitle = 'Step 3 of 4 — download the authorization form to continue enrollment.';
    $registerStepPartial = theme('authnew.partials.register-step-agreement');
@endphp

@push('register_scripts')
<script>
  $(document).ready(function () {
    $("#redirect_to").click(function () {
      window.setTimeout(function () {
        $('#regForm').submit();
      }, 2500);
    });
  });
</script>
@endpush

@include(theme('authnew.register-flow'))
