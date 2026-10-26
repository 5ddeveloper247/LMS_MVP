<div class="breadcrumb">
  <div class="breadcrumb-inner">
    <a href="{{ url('/') }}">Home</a>
    <span class="breadcrumb-sep">›</span>
    <a href="{{ route('certifications.index') }}">Certifications</a>
    <span class="breadcrumb-sep">›</span>
    <span data-f="crumb">Enroll</span>
  </div>
</div>

<!-- ================================================================
     COURSE SWITCHER — one template serves all 7 certifications.
     Selecting a course updates ?cert= in the URL.
     ================================================================ -->
<nav class="switcher" aria-label="Choose a certification">
  <div class="switcher-inner">
    <span class="switcher-label">Enrolling in:</span>
    @foreach ($switcherItems ?? [] as $item)
      @php
        $itemSlug = $item['slug'] ?? '';
        $isActive = ($slug ?? '') === $itemSlug;
      @endphp
      <a href="{{ route('certifications.enroll', ['slug' => $itemSlug]) }}"
         class="switch-btn{{ $isActive ? ' is-active' : '' }}"
         @if($isActive) aria-current="page" @endif>{{ $item['label'] }}</a>
    @endforeach
  </div>
</nav>

<main id="main">

<!-- ================================================================
     COURSE HERO
     ================================================================ -->
<section class="course-hero" aria-live="polite">
  <div class="course-hero-grid">
    <div>
      <span class="hero-eyebrow">Enroll Now · <span data-f="cat"></span></span>
      <h1><span data-f="mark"></span><em data-f="name"></em></h1>
      <p class="course-desc" data-f="desc"></p>
      <a class="details-link" data-details href="#">View full course outline</a>
      <span class="course-badge" data-f="badgeWrap" hidden><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg><span data-f="badge"></span></span>
    </div>
    <div class="hero-cred-wrap" aria-hidden="true">
      <div class="cred" data-cred>
            <div class="cred-top"><span class="cred-issuer"><svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="3"/><circle cx="50" cy="50" r="40" fill="#0F6E56"/><text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text><text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text><text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text><line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="2"/></svg>MXP</span><span class="cred-cat" data-f="cat"></span></div>
            <p class="cred-mark" data-f="mark"></p>
            <p class="cred-name" data-f="name"></p>
            <div class="cred-strip"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span data-f="length"></span></span><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg><span data-f="fmt"></span></span></div>
          </div>
      <p class="hero-cred-price"><strong data-f="from"></strong><span data-f="fromNote"></span></p>
    </div>
  </div>
</section>

<!-- ================================================================
     ENROLLMENT FORM + SUMMARY
     ================================================================ -->
<section class="enroll">
  <div class="enroll-grid">

    <div class="form-card">
      <form id="enrollForm" method="post" action="{{ $checkoutUrl ?? route('certifications.enroll.checkout') }}" novalidate>
        @csrf
        <input type="hidden" name="certification_slug" id="certField">
        <input type="hidden" name="session_key" id="sessionKey">
        <input type="hidden" name="session_label" id="sessionLabel">
        <input type="hidden" name="session_sub" id="sessionSub">

        <!-- STEP 1 — OPTION -->
        <div class="form-step" role="group">
          <div class="step-head">
            <span class="step-num" aria-hidden="true">1</span>
            <div>
              <h2>Choose your option</h2>
              <span class="step-note" data-f="optionNote"></span>
            </div>
          </div>
          <div class="choice-grid" id="optionGroup"></div>
          <div class="field" id="skillsCourseField" hidden style="margin-top:18px;">
            <label for="skillsCourse">Which online course did you complete? <span class="req">*</span></label>
            <select id="skillsCourse" name="skills_course">
              <option value="">Select a course</option>
              <option>ACLS (HeartCode® ACLS)</option>
              <option>BLS (HeartCode® BLS)</option>
              <option>PALS (HeartCode® PALS)</option>
            </select>
          </div>
          <p class="field-error" id="optionError" hidden>Choose an option to continue.</p>
        </div>

        <!-- STEP 2 — SESSION -->
        <div class="form-step" role="group" id="sessionStep">
          <div class="step-head">
            <span class="step-num" aria-hidden="true">2</span>
            <div>
              <h2 data-f="sessionTitle">Pick a session</h2>
              <span class="step-note">Sessions are held at 501 S. Florida Avenue, Lakeland, FL 33801.</span>
            </div>
          </div>
          <div class="session-list" id="sessionGroup"></div>
          <div class="selfstudy-msg" id="selfStudyMsg" hidden>Self-Study does not need a session date. After you enroll, our team will email you everything you need to get started.</div>
          <p class="sample-note" id="sampleNote">Dates shown are samples for this preview. Live dates will load from the training calendar.</p>
          <p class="field-error" id="sessionError" hidden>Pick a session, or choose “Contact me with more dates.”</p>
        </div>

        <!-- STEP 3 — YOUR INFORMATION -->
        <div class="form-step" role="group">
          <div class="step-head">
            <span class="step-num" aria-hidden="true">3</span>
            <div>
              <h2>Your information</h2>
              <span class="step-note">Enter your name exactly as it should appear on your card or certificate.</span>
            </div>
          </div>
          <div class="field-row">
            <div class="field"><label for="firstName">First name <span class="req">*</span></label><input id="firstName" name="first_name" autocomplete="given-name" required></div>
            <div class="field"><label for="lastName">Last name <span class="req">*</span></label><input id="lastName" name="last_name" autocomplete="family-name" required></div>
          </div>
          <div class="field-row">
            <div class="field"><label for="email">Email <span class="req">*</span></label><input id="email" name="email" type="email" autocomplete="email" required></div>
            <div class="field"><label for="phone">Phone <span class="req">*</span></label><input id="phone" name="phone" type="tel" autocomplete="tel" required></div>
          </div>
          <div class="field-row">
            <div class="field">
              <label for="role">Current role <span class="req">*</span></label>
              <select id="role" name="role" required>
                <option value="">Select your role</option>
                <option>Registered Nurse (RN)</option>
                <option>Licensed Nurse</option>
                <option>Advanced Practice Registered Nurse (APRN)</option>
                <option>Nursing Student</option>
                <option>CNA / Patient Care Technician</option>
                <option>Medical Assistant</option>
                <option>EMT / Paramedic</option>
                <option>Allied Health Professional</option>
                <option>Quality / Health Plan Professional</option>
                <option>Non-clinical / Community Responder</option>
                <option>Other</option>
              </select>
            </div>
            <div class="field">
              <label for="license">Nursing license number <span class="req" id="licenseReq" hidden>*</span><span class="opt" id="licenseOpt">(if applicable)</span></label>
              <input id="license" name="license">
              <p class="field-hint" id="licenseHint" hidden>Required for the IV Therapy course.</p>
            </div>
          </div>
          <div class="field"><label for="employer">Employer, school, or organization <span class="opt">(optional)</span></label><input id="employer" name="employer" autocomplete="organization"></div>
        </div>

        <!-- STEP 4 — BEFORE YOUR SESSION -->
        <div class="form-step" role="group">
          <div class="step-head">
            <span class="step-num" aria-hidden="true">4</span>
            <div>
              <h2>Before you check out</h2>
              <span class="step-note">A few details so we can prepare for you.</span>
            </div>
          </div>

          <div class="prereq-box" id="prereqBox" hidden>
            <h3 data-f="prereqTitle"></h3>
            <p data-f="prereqText"></p>
          </div>
          <div class="field" id="renewField" hidden>
            <label for="cardExp">Current card expiration date <span class="req">*</span></label>
            <input id="cardExp" name="card_exp" type="date">
            <p class="field-hint">Renewal is for providers whose card for this course has not expired.</p>
          </div>
          <div class="field" id="onlineField" hidden>
            <label for="onlineCert">Online course completion certificate <span class="req">*</span></label>
            <input id="onlineCert" name="online_cert" placeholder="Certificate number or completion date">
            <p class="field-hint">Bring a copy of your online completion certificate to your session.</p>
          </div>

          <div class="field">
            <label for="notes">Anything we should know? <span class="opt">(optional)</span></label>
            <textarea id="notes" name="notes" placeholder="Accommodations, employer billing, group enrollment, scheduling needs…"></textarea>
          </div>

          <div class="check-row"><input type="checkbox" name="agree_pay" id="agreePay" value="1" required><label for="agreePay">I understand my enrollment is confirmed once payment is complete.</label></div>
          <div class="check-row"><input type="checkbox" name="agree_terms" id="agreeTerms" value="1" required><label for="agreeTerms">I agree to the <a href="terms.html">Terms of Service</a> and <a href="privacy.html">Privacy Policy</a>.</label></div>
          <div class="check-row"><input type="checkbox" name="opt_in" id="optIn" value="1"><label for="optIn">Email me session reminders and renewal notices.</label></div>
        </div>

        <div class="submit-wrap">
          <button type="submit" class="btn-primary btn-submit" id="submitBtn">Continue to Checkout</button>
          <div class="form-alert" id="formAlert" role="alert" hidden></div>
          <p class="submit-note">You will review your order before payment. Questions? Call <a href="tel:8632508764">(863) 250-8764</a>.</p>
        </div>
      </form>

      <!-- CONFIRMATION (shown after a valid submit) -->
      <div class="confirm" id="confirm" hidden tabindex="-1">
        <div class="confirm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div>
        <h2>You’re almost enrolled.</h2>
        <p id="confirmText"></p>
        <div class="confirm-actions">
          <!-- DEVELOPER: point this to the live checkout with the order payload. -->
          <a href="checkout.html" class="btn-primary">Go to Secure Checkout</a>
          <button type="button" class="btn-secondary" id="editBtn">Edit Enrollment</button>
        </div>
      </div>
    </div>

    <!-- SUMMARY -->
    <aside class="summary" aria-label="Enrollment summary">
      <div class="summary-card">
        <div class="summary-cred"><div class="cred" data-cred>
            <div class="cred-top"><span class="cred-issuer"><svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="3"/><circle cx="50" cy="50" r="40" fill="#0F6E56"/><text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text><text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text><text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text><line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="2"/></svg>MXP</span><span class="cred-cat" data-f="cat"></span></div>
            <p class="cred-mark" data-f="mark"></p>
            <p class="cred-name" data-f="name"></p>
            <div class="cred-strip"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span data-f="length"></span></span><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg><span data-f="fmt"></span></span></div>
          </div></div>
        <div class="summary-body">
          <div class="sum-line"><span class="lbl">Option</span><span class="val" id="sumOption"></span></div>
          <div class="sum-line"><span class="lbl">Length</span><span class="val" data-f="length"></span></div>
          <div class="sum-line"><span class="lbl">Format</span><span class="val" data-f="fmt"></span></div>
          <div class="sum-line"><span class="lbl" data-f="sessionLabel">Session</span><span class="val" id="sumSession"></span></div>
          <div class="sum-total"><span class="lbl">Total</span><span class="val" id="sumTotal"></span></div>
        </div>
        <div class="sum-includes">
          <h3>What’s included</h3>
          <ul id="sumIncludes"></ul>
        </div>
      </div>
      <div class="help-card">
        <h3>Questions before you enroll?</h3>
        <p>Call <a href="tel:8632508764">(863) 250-8764</a> or email <a href="mailto:contact@@merkaiixcelprep.com">contact@@merkaiixcelprep.com</a>.<br>Mon–Thu 8:30am–7:00pm · Sat 10:00am–3:00pm</p>
      </div>
      <div class="help-card">
        <h3>Enrolling a team?</h3>
        <p>We schedule group sessions for facilities, clinics, and nursing programs. <a href="contact.html">Request a group quote</a></p>
      </div>
    </aside>

  </div>
</section>

<!-- ================================================================
     OTHER CERTIFICATIONS
     ================================================================ -->
<section class="others" aria-labelledby="others-title">
  <div class="container">
    <h2 id="others-title">Other certifications</h2>
    <div class="others-row" id="othersRow"></div>
  </div>
</section>

<!-- ================================================================
     IMPORTANT NOTICE
     ================================================================ -->
<section class="notice-section">
  <div class="container">
    <div class="notice-card">
      <h4>Important Notice</h4>
      <p>Certification courses are standalone training programs. They are not part of our NCLEX coaching programs and do not fulfill Florida Board of Nursing remediation requirements. For NCLEX preparation, see our <a href="nclex-coaching.html">NCLEX Success Coaching Program</a>. For FL BON remediation, see our <a href="remediation.html">FL BON Remediation Program</a>. Session availability may depend on minimum enrollment.</p>
    </div>
  </div>
</section>

</main>
