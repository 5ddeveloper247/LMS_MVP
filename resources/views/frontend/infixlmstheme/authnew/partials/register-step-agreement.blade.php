@php
    $hasAgreement = \App\Models\UserAuthorzIationAgreement::where('user_id', $user->id)->exists();
@endphp

<form action="{{ route('register.3') }}" method="POST" id="regForm">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id }}">

  <div class="form-group">
    @if ($hasAgreement)
      <div class="decl-text">
        <p><strong>Note:</strong> Your authorization form has already been uploaded / recorded.</p>
        <p>You can continue to the payment step to complete enrollment.</p>
      </div>
    @else
      <div class="decl-text">
        <p><strong>Authorization Agreement</strong></p>
        <p>Please download the Authorization Form using the button below. After download starts, registration will continue automatically to the payment step.</p>
        <p>Keep a copy of the downloaded form for your records.</p>
      </div>
    @endif
  </div>

  <div class="form-row" style="margin-top:8px;">
    <a href="{{ route('register.declaration') }}" class="btn-submit" style="background:var(--cream);color:var(--teal-darkest);border:1.5px solid var(--gray-line);text-decoration:none;display:flex;align-items:center;justify-content:center;">Back</a>

    @if ($hasAgreement)
      <a href="{{ route('register.pay') }}" class="btn-submit student-btn" style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Continue to Payment &rarr;</a>
    @else
      <a href="{{ asset('public/student_affidavit/agreement_form/Agreement_file.pdf') }}"
         download="Agreement_file.pdf"
         id="redirect_to"
         class="btn-submit student-btn"
         style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Download Form &amp; Continue &rarr;</a>
    @endif
  </div>
</form>
