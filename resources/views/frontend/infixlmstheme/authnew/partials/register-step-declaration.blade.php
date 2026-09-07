@php
    $declName = old('student_name');
    if ($declName === null) {
        if (is_object($userDeclaration ?? null)) {
            $declName = $userDeclaration->student_name ?? auth()->user()->name;
        } elseif (is_array($userDeclaration ?? null)) {
            $declName = $userDeclaration['student_name'] ?? auth()->user()->name;
        } else {
            $declName = auth()->user()->name;
        }
    }
    $declDate = old('declare_date');
    if ($declDate === null) {
        if (is_object($userDeclaration ?? null)) {
            $declDate = $userDeclaration->declare_date ?? null;
        } elseif (is_array($userDeclaration ?? null)) {
            $declDate = $userDeclaration['declare_date'] ?? null;
        }
    }
@endphp

<form action="{{ route('register.declarationp') }}" method="POST" id="regForm" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id }}">

  @if ($errors->any())
    <div class="form-group" style="margin-bottom:12px;">
      <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;"><strong>Required!</strong> Please fill all fields.</p>
      @foreach ($errors->all() as $error)
        <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;">{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <div class="form-group">
    <label>Enrollment Acknowledgment Declaration</label>
    <div class="decl-text">
      <p>I, the undersigned, solemnly declare that the information provided above is accurate,
        acknowledging the potential consequences, such as perjury, for providing false
        information. After carefully examining the Remediation Course Participant Handbook, I
        accept its contents and agree to the terms mentioned below.</p>
      <p>To meet the standards set by the Florida Board of Nursing (BON), I understand that I
        must complete a total of 96 clinical hours, which will include both Med-Surg and
        Ambulatory care. These hours can be fulfilled either in a real hospital setting or
        through simulated experiences. It is important to note that the duration of the clinical
        simulation should not exceed 48 hours. If I want to obtain a license from the Florida
        Board of Nursing while living outside of Florida, I understand that I must fulfill the
        requirement of completing hours in person in Florida.</p>
      <p>Recognizing the extensive scope of this obligation, I acknowledge that fulfilling the
        BON prerequisites entails not only completing clinical hours but also successfully
        finishing 80 didactic hours, consistently submitting homework assignments, achieving
        passing grades in all mandatory exams, and paying all specified fees. I will only be
        eligible to get the Completion Letter for the Board of Nursing once these components are
        successfully completed.</p>
      <p>It is important to understand that being able to participate in the RN Remediation
        Course depends on individual merit and does not automatically ensure success on the
        NCLEX-RN examination. After carefully examining the handbook and requesting
        clarification for any questions, I confirm that I have taken proactive measures to
        guarantee my comprehension before signing this agreement.</p>
      <p>Ultimately, I pledge to adhere to the specified criteria and prerequisites stated in
        this document, fully comprehending the significance of this commitment and the
        obligations it includes for achieving effective course fulfillment.</p>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Student Name <span class="req">*</span></label>
      <input type="text" name="student_name" id="student_name" value="{{ $declName }}" required>
    </div>
    <div class="form-group">
      <label>Date <span class="req">*</span></label>
      <input type="date" name="declare_date" id="declare_date" min="{{ date('Y-m-d') }}" value="{{ $declDate }}" required>
    </div>
  </div>

  <div class="form-group">
    <label>Signature <span class="req">*</span></label>
    <p class="hint" style="margin-bottom:8px;">Please sign below and click Save, or upload your signature.</p>
    <div style="margin-bottom:6px;font-size:11px;color:var(--charcoal-soft);text-align:right;">
      Selected file: <strong id="sign_filename">No file chosen</strong>
    </div>
    <div class="signature-box">
      <div id="root"></div>
      <div class="signature-date">
        <input class="date-btn" type="date" id="datepicker" value="{{ date('Y-m-d') }}">
      </div>
      <div class="signature-actions">
        <input type="button" value="Reset" id="resetCanvas" class="sig-btn">
        <input type="button" value="Save" id="saveImage" class="sig-btn">
      </div>
      <img id="signatureImage" class="signature-preview" alt="">
    </div>
    <input type="file" id="canvasFileInput" name="signature-img" style="display:none" accept="image/*">
    <label for="canvasFileInput" class="btn-upload-sig">Upload Signature</label>
  </div>

  <div class="form-row" style="margin-top:8px;">
    <button type="button" class="btn-submit" id="back-button" style="background:var(--cream);color:var(--teal-darkest);border:1.5px solid var(--gray-line);">Back</button>
    <button type="submit" class="btn-submit student-btn" id="next-button">Continue &rarr;</button>
  </div>
</form>
