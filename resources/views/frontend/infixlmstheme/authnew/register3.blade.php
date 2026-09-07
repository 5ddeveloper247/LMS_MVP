{{-- Declaration step — same backend route/controller; login-matching design shell --}}
@php
    $registerStep = 2;
    $registerStepTotal = 4;
    $registerStepTitle = 'Enrollment Declaration';
    $registerStepSubtitle = 'Step 2 of 4 — read and sign the acknowledgment to continue.';
    $registerStepPartial = theme('authnew.partials.register-step-declaration');
@endphp

@push('register_scripts')
<script>
  $('#canvasFileInput').on('change', function () {
    if (this.files.length > 0) {
      $('#sign_filename').text($('#canvasFileInput')[0].files[0].name);
    } else {
      $('#sign_filename').text('No file chosen');
    }
  });

  $('#back-button').on('click', function () {
    window.location.href = "{{ route('register') }}";
  });

  $('#regForm').on('submit', function (e) {
    e.preventDefault();
    let form = $('#regForm')[0];
    if (!form.checkValidity()) {
      form.reportValidity();
      return false;
    }
    if ($('#canvasFileInput')[0].files.length == 0) {
      toastr.error('Please submit your Signature', 'Error');
      return false;
    }
    form.submit();
  });

  function base64ToBlob(base64URL) {
    var parts = base64URL.split(';base64,');
    var contentType = parts[0].split(':')[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;
    var uInt8Array = new Uint8Array(rawLength);
    for (var i = 0; i < rawLength; ++i) {
      uInt8Array[i] = raw.charCodeAt(i);
    }
    return new Blob([uInt8Array], { type: contentType });
  }

  function setFileInputFromBase64(base64URL) {
    var blob = base64ToBlob(base64URL);
    var file = new File([blob], "signature.png", { type: blob.type });
    var fileInput = document.getElementById('canvasFileInput');
    var dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    fileInput.files = dataTransfer.files;
    fileInput.dispatchEvent(new Event('change'));
  }

  const root = document.getElementById("root");
  const resetCanvas = document.getElementById("resetCanvas");
  const saveImage = document.getElementById("saveImage");
  const component = Signature(root, { width: 1200, height: 150 });

  resetCanvas.addEventListener("click", () => { component.value = []; });

  const today = new Date().toISOString().split('T')[0];
  if (document.getElementById('datepicker')) {
    datepicker.min = today;
    datepicker.max = today;
  }

  saveImage.addEventListener("click", () => {
    const dataURL = component.getImage();
    const a = document.createElement("a");
    a.href = dataURL;
    a.download = "signature.png";
    a.click();
    setFileInputFromBase64(dataURL);
  });
</script>
@endpush

@include(theme('authnew.register-flow'))
