<script>
const CERTS = window.CERTIFICATION_CERTS || {};
const SCHEDULES = window.CERTIFICATION_SCHEDULES || {};
const CHECK = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>';
const money = n => '$' + Number(n).toLocaleString('en-US', { maximumFractionDigits: 0 });
const $ = id => document.getElementById(id);
const esc = s => String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;');

let slug = null, option = null, session = null;

function defaultSlug() {
  const keys = Object.keys(CERTS);
  return window.CERT_ENROLL_SLUG && CERTS[window.CERT_ENROLL_SLUG]
    ? window.CERT_ENROLL_SLUG
    : (keys[0] || '');
}

function setText(field, value) {
  document.querySelectorAll('[data-f="' + field + '"]').forEach(el => { el.textContent = value; });
}

function findOption(c, id) {
  return (c.options || []).find(o => String(o.id) === String(id));
}

function render(newSlug, push) {
  const keys = Object.keys(CERTS);
  slug = CERTS[newSlug] ? newSlug : defaultSlug();
  if (!slug || !CERTS[slug]) return;

  const c = CERTS[slug];
  option = c.options.length === 1 ? c.options[0] : null;
  session = null;

  document.title = 'Enroll in ' + c.mark + ' | Merkaii Xcellence Prep';
  if (push && window.CERTIFICATIONS_ENROLL_BASE) {
    history.replaceState(null, '', window.CERTIFICATIONS_ENROLL_BASE + '/' + slug);
  }
  const certField = $('certField');
  if (certField) certField.value = slug;

  document.querySelectorAll('.switch-btn').forEach(b => b.setAttribute('aria-pressed', b.dataset.cert === slug ? 'true' : 'false'));

  ['mark','name','cat','length','fmt','desc'].forEach(f => setText(f, c[f]));
  setText('crumb', 'Enroll: ' + c.mark);
  document.querySelectorAll('[data-details]').forEach(a => {
    a.href = window.CERTIFICATIONS_SHOW_BASE ? window.CERTIFICATIONS_SHOW_BASE + '/' + slug : '#';
  });
  document.querySelectorAll('[data-cred]').forEach(el => { el.className = 'cred ' + (c.variant || ''); });
  const badgeWrap = document.querySelector('[data-f="badgeWrap"]');
  if (badgeWrap) {
    badgeWrap.hidden = !c.badge;
    if (c.badge) setText('badge', c.badge);
  }

  const prices = (c.options || []).map(o => o.price);
  const low = prices.length ? Math.min(...prices) : 0;
  setText('from', c.options.length > 1 ? 'From ' + money(low) : money(low));
  setText('fromNote', (c.options || []).map(o => o.title + ' ' + money(o.price)).join(' · '));
  setText('optionNote', c.options.length > 1 ? 'Pricing depends on the option you choose.' : 'This course has one option.');
  setText('sessionTitle', c.sessionTitle || 'Pick a session');
  setText('sessionLabel', c.sessionLabel || 'Session');

  const og = $('optionGroup');
  if (!og) {
    return;
  }
  og.className = 'choice-grid' + (c.options.length === 1 ? ' one' : '');
  og.innerHTML = (c.options || []).map(o => `
    <div class="choice">
      <input type="radio" name="option_id" id="opt-${o.id}" value="${o.id}" ${option && option.id === o.id ? 'checked' : ''}>
      <label for="opt-${o.id}">
        <span class="choice-left"><span class="choice-dot" aria-hidden="true"></span>
          <span class="choice-main"><span class="choice-title">${esc(o.title)}</span><span class="choice-sub">${esc(o.sub || '')}</span></span>
        </span>
        <span class="choice-price">${money(o.price)}</span>
      </label>
    </div>`).join('');
  og.querySelectorAll('input').forEach(i => i.addEventListener('change', () => {
    option = findOption(c, i.value);
    $('optionError').hidden = true;
    updateSession();
    updateConditional();
    updateSummary();
  }));

  const skillsCourseField = $('skillsCourseField');
  if (skillsCourseField) skillsCourseField.hidden = !c.needsOnline;

  const sg = $('sessionGroup');
  if (!sg) {
    return;
  }
  const list = SCHEDULES[c.schedule] || [];
  sg.innerHTML = list.map((s, i) => `
    <div class="choice">
      <input type="radio" name="session_pick" id="ses-${i}" value="${esc(s[0])}">
      <label for="ses-${i}">
        <span class="choice-left"><span class="choice-dot" aria-hidden="true"></span>
          <span class="choice-main"><span class="choice-title">${esc(s[1])}</span><span class="choice-sub">${esc(s[2])}</span></span>
        </span>
      </label>
    </div>`).join('') + `
    <div class="choice">
      <input type="radio" name="session_pick" id="ses-more" value="contact">
      <label for="ses-more">
        <span class="choice-left"><span class="choice-dot" aria-hidden="true"></span>
          <span class="choice-main"><span class="choice-title">Contact me with more dates</span><span class="choice-sub">Our team will reach out with other options.</span></span>
        </span>
      </label>
    </div>`;
  sg.querySelectorAll('input').forEach(i => i.addEventListener('change', () => {
    const titleEl = i.nextElementSibling.querySelector('.choice-title');
    const subEl = i.nextElementSibling.querySelector('.choice-sub');
    const lbl = titleEl ? titleEl.textContent : '';
    const sub = subEl ? subEl.textContent : '';
    if (i.value === 'contact') {
      session = 'Contact me with more dates';
      $('sessionKey').value = 'contact';
      $('sessionLabel').value = lbl;
      $('sessionSub').value = sub;
    } else {
      session = lbl.replace(/, \d{4}$/, '') + ' · ' + (sub.split(' · ')[0] || sub);
      $('sessionKey').value = i.value;
      $('sessionLabel').value = lbl;
      $('sessionSub').value = sub;
    }
    $('sessionError').hidden = true;
    updateSummary();
  }));

  const sumIncludes = $('sumIncludes');
  if (sumIncludes) {
    sumIncludes.innerHTML = (c.includes || []).map(t => `<li>${CHECK}<span>${esc(t)}</span></li>`).join('');
  }

  const othersRow = $('othersRow');
  if (othersRow) {
    othersRow.innerHTML = keys.filter(k => k !== slug).map(k => {
      const href = window.CERTIFICATIONS_ENROLL_BASE ? window.CERTIFICATIONS_ENROLL_BASE + '/' + k : '?cert=' + k;
      return `<a class="other-link" href="${href}"><strong>${esc(k)}</strong><span>View enroll</span></a>`;
    }).join('');
  }

  const confirmEl = $('confirm');
  if (confirmEl) confirmEl.hidden = true;
  const enrollFormEl = $('enrollForm');
  if (enrollFormEl) enrollFormEl.hidden = false;
  const formAlertEl = $('formAlert');
  if (formAlertEl) formAlertEl.hidden = true;

  updateSession();
  updateConditional();
  updateSummary();
}

function updateSession() {
  const self = option && option.noSession;
  $('sessionGroup').hidden = !!self;
  $('selfStudyMsg').hidden = !self;
  $('sampleNote').hidden = !!self;
  if (self) {
    session = 'Not needed for Self-Study';
    $('sessionKey').value = 'self-study';
    $('sessionLabel').value = session;
    $('sessionSub').value = '';
  } else if (session === 'Not needed for Self-Study') {
    session = null;
    $('sessionKey').value = '';
    $('sessionLabel').value = '';
    $('sessionSub').value = '';
  }
}

function updateConditional() {
  const c = CERTS[slug];
  const renewal = option && option.renewal;
  $('renewField').hidden = !renewal;
  $('onlineField').hidden = !c.needsOnline;
  const box = $('prereqBox');
  if (c.prereq) {
    box.hidden = false;
    setText('prereqTitle', c.prereq.title);
    setText('prereqText', c.prereq.text);
  } else if (renewal) {
    box.hidden = false;
    setText('prereqTitle', 'Renewing your card');
    setText('prereqText', 'Bring your current card to your session. If your card has already expired, switch to Initial certification above.');
  } else {
    box.hidden = true;
  }
  $('licenseReq').hidden = !c.needsLicense;
  $('licenseOpt').hidden = !!c.needsLicense;
  $('licenseHint').hidden = !c.needsLicense;
}

function updateSummary() {
  const o = $('sumOption'), s = $('sumSession');
  o.textContent = option ? option.title : 'Not selected';
  o.classList.toggle('empty', !option);
  s.textContent = session || 'Not selected';
  s.classList.toggle('empty', !session);
  $('sumTotal').textContent = option ? money(option.price) : '—';
}

function validate() {
  const c = CERTS[slug];
  const missing = [];
  const req = (id, ok, label) => {
    const el = $(id);
    if (el) el.setAttribute('aria-invalid', ok ? 'false' : 'true');
    if (!ok) missing.push(label);
  };
  if (!option) { $('optionError').hidden = false; missing.push('an option'); }
  if (c.needsOnline) req('skillsCourse', !!$('skillsCourse').value, 'your online course');
  if (!session) { $('sessionError').hidden = false; missing.push('a session'); }
  req('firstName', $('firstName').value.trim(), 'first name');
  req('lastName', $('lastName').value.trim(), 'last name');
  req('email', /^\S+@\S+\.\S+$/.test($('email').value.trim()), 'a valid email');
  req('phone', $('phone').value.replace(/\D/g, '').length >= 10, 'a phone number');
  req('role', !!$('role').value, 'your role');
  if (c.needsLicense) req('license', $('license').value.trim(), 'your license number');
  if (option && option.renewal) req('cardExp', !!$('cardExp').value, 'your card expiration date');
  if (c.needsOnline) req('onlineCert', $('onlineCert').value.trim(), 'your online completion certificate');
  if (!$('agreePay').checked || !$('agreeTerms').checked) missing.push('both agreements');
  return missing;
}

const enrollFormNode = $('enrollForm');
if (enrollFormNode) {
  enrollFormNode.addEventListener('submit', (e) => {
    const missing = validate();
    const alert = $('formAlert');
    if (missing.length) {
      e.preventDefault();
      if (alert) {
        alert.textContent = 'To continue, add ' + missing.join(', ') + '.';
        alert.hidden = false;
      }
      return;
    }
    if (alert) alert.hidden = true;
  });
}

(function bootCertEnroll() {
  try {
    const qsCert = new URLSearchParams(location.search).get('cert');
    render(qsCert || defaultSlug(), false);
  } catch (err) {
    console.error('Certification enroll render failed', err);
  } finally {
    if (typeof window.hideCertPreloader === 'function') {
      window.hideCertPreloader();
    }
  }
})();
</script>
