<input type="hidden" id="accesskey" value="{{ $pakms ?? null }}">

@if ($errors->first('Error'))
  <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 12px;">{{ $errors->first('Error') }}</p>
@endif

@if ($errors->any())
  <div class="form-group" style="margin-bottom:12px;">
    @foreach ($errors->all() as $error)
      <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;">{{ $error }}</p>
    @endforeach
  </div>
@endif

<form action="{{ route('register.payp') }}" method="post" id="payment-form">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id ?? null }}">
  <input type="hidden" name="amount"
    value="{{ convertCurrency(Settings('currency_code') ?? 'BDT', 'USD', 100) * 100 }}"
    placeholder="Amount">

  <p class="reg-fee-note">Payment $100</p>

  <div class="form-row">
    <div class="form-group">
      <label>Card Holder First Name <span class="req">*</span></label>
      <input type="text" name="cardHolder" id="cardHolder" required>
    </div>
    <div class="form-group">
      <label>Card Holder Last Name <span class="req">*</span></label>
      <input type="text" name="cardHolderLastname" id="cardHolderLastname" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>Card No <span class="req">*</span></label>
      <input type="text" name="cardNumber" id="cardNumber" required>
    </div>
    <div class="form-group">
      <label>Expiry Date (MM/YYYY) <span class="req">*</span></label>
      <input type="text" name="expiryDate" id="expiryDate" placeholder="MM/YYYY" required pattern="(?:0[1-9]|1[0-2])/[0-9]{4}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group">
      <label>CVV <span class="req">*</span></label>
      <input type="text" name="cvv" id="cvv" required>
    </div>
    <div class="form-group">
      <label>Amount</label>
      <input type="text" disabled value="100">
    </div>
  </div>

  <div class="form-group">
    <div class="decl-text">
      <p>I <strong>{{ $user->name }}</strong> hereby authorize Merkaii Xcellence Prep to charge my Credit or Debit
        Card for payment of Education services rendered as described on
        <strong>Date: {{ \Carbon\Carbon::now()->format(Settings('active_date_format') ?: 'd-M-Y') }}</strong>.</p>
      <p>I <strong>{{ $user->name }}</strong> agree, in all cases, to pay the Credit or Debit Card amount for the full payment of Education services rendered as described above.</p>
    </div>
    <label class="pay-accept" style="display:flex;align-items:flex-start;gap:10px;margin-top:12px;cursor:pointer;">
      <input type="checkbox" name="accept" id="accept" style="margin-top:3px;width:16px;height:16px;accent-color:var(--teal-mid);">
      <span style="font-size:12px;color:var(--charcoal);line-height:1.4;font-weight:600;">I HAVE READ AND FULLY UNDERSTAND AND AGREE WITH ALL OF THE ABOVE TERMS.</span>
    </label>
  </div>

  <div class="form-row" style="margin-top:8px;">
    <a href="{{ route('register.3') }}" class="btn-submit" style="background:var(--cream);color:var(--teal-darkest);border:1.5px solid var(--gray-line);text-decoration:none;display:flex;align-items:center;justify-content:center;">Back</a>
    <button type="submit" class="btn-submit student-btn" id="pay-button">Pay Now</button>
  </div>
</form>
