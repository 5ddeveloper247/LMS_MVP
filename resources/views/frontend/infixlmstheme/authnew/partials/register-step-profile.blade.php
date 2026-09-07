@php
    $redirectTo = session()->get('redirectTo');
    $nameParts = !empty($user) && !empty($user->name) ? preg_split('/\s+/', trim($user->name), 2) : [];
    $defaultFirst = $nameParts[0] ?? null;
    $defaultLast = $nameParts[1] ?? null;
    $setting = is_object($userSetting ?? null) ? $userSetting : null;
@endphp

<form action="{{ route('register') }}" method="POST" id="regForm" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="is_user_setting" value="1">
  <input type="hidden" name="id" value="{{ $user->id ?? '' }}">

  @if ($errors->any())
    <div class="form-group" style="margin-bottom:12px;">
      @foreach ($errors->all() as $error)
        <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;">{{ $error }}</p>
      @endforeach
    </div>
  @endif

  @if ((stripos((string) $redirectTo, '/buyNow/') === false || stripos((string) $redirectTo, '/addToCart/') === false) && stripos((string) $redirectTo, 'shop') === false)
    <p class="reg-fee-note">$100 Fee Required</p>
  @endif

  <div class="form-row">
    <div class="form-group">
      <label>First Name <span class="req">*</span></label>
      <input type="text" name="f_name" value="{{ $defaultFirst ?? old('f_name') }}" required>
    </div>
    <div class="form-group">
      <label>Last Name <span class="req">*</span></label>
      <input type="text" name="l_name" value="{{ $defaultLast ?? old('l_name') }}" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Date of Birth <span class="req">*</span></label>
      <input id="dob" type="text" name="dob" autocomplete="off" value="{{ !empty($user) ? $user->dob : old('dob') }}" max="{{ date('Y-m-d') }}" required>
    </div>
    <div class="form-group">
      <label>SS# <span class="req">*</span></label>
      <input type="text" name="SS" value="{{ $setting->SS ?? old('SS') }}" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>City <span class="req">*</span></label>
      <input type="text" name="city" value="{{ $setting->city ?? old('city') }}" required>
    </div>
    <div class="form-group">
      <label>State <span class="req">*</span></label>
      <input type="text" name="state" value="{{ $setting->state ?? old('state') }}" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Zip <span class="req">*</span></label>
      <input type="text" name="zip" value="{{ $user->zip ?? old('zip') }}" required>
    </div>
    <div class="form-group">
      <label>Country <span class="req">*</span></label>
      <select name="country" required>
        <option value="">Select Country</option>
        @foreach ($countries as $country)
          <option value="{{ $country->id }}" @if ($user && (string) $user->country === (string) $country->id) selected @endif>{{ $country->name }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Email <span class="req">*</span></label>
      <input type="email" name="email" value="{{ $user->email ?? old('email') }}" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label>Cell No <span class="req">*</span></label>
      <input type="number" name="phone" value="{{ $user->phone ?? old('phone') }}" maxlength="14" minlength="10" required>
    </div>
  </div>

  <div class="form-group">
    <label>Mailing Address <span class="req">*</span></label>
    <input type="text" name="mailing_address" value="{{ $setting->mailing_address ?? old('mailing_address') }}" required>
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
        <input class="date-btn" type="date" id="datepicker" value="{{ date('Y-m-d') }}" name="student_signature_date">
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

  <p class="form-legal" style="text-align:left;margin-bottom:16px;">
    By clicking Continue, you agree to Meraki International Societe&rsquo;s Terms of Use and
    <a href="{{ url('customer-help#v-pills-profile-tab-1') }}">Privacy Policy</a>.
    You consent to receive phone calls and SMS messages from Meraki International Societe.
    Message &amp; data rates may apply. Reply STOP to opt-out. Reply HELP for more information.
  </p>

  <button type="submit" class="btn-submit student-btn" id="next-button">Continue &rarr;</button>
</form>
