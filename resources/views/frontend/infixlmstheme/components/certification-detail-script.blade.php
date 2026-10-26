<script>
const COURSES = window.CERTIFICATION_COURSES || {};
const CHECK = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>';
const CLOCK = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
const sealEl = document.querySelector('.mxp-certification-detail .cred-issuer svg');
const SEAL = sealEl ? sealEl.outerHTML : '';
const money = n => '$' + Number(n).toLocaleString('en-US', { maximumFractionDigits: 0 });
const esc = s => String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;');
const $ = id => document.getElementById(id);
const setText = (f, v) => document.querySelectorAll('[data-f="' + f + '"]').forEach(el => { el.textContent = v; });

function defaultSlug() {
  const keys = Object.keys(COURSES);
  return window.CERT_DETAIL_SLUG && COURSES[window.CERT_DETAIL_SLUG]
    ? window.CERT_DETAIL_SLUG
    : (keys[0] || '');
}

function render(slug, push) {
  if (!COURSES[slug]) slug = defaultSlug();
  if (!slug || !COURSES[slug]) return;

  const c = COURSES[slug];
  document.title = c.mark + ' Certification | Merkaii Xcellence Prep';

  if (push && window.CERTIFICATIONS_SHOW_BASE) {
    history.replaceState(null, '', window.CERTIFICATIONS_SHOW_BASE + '/' + slug);
  }

  document.querySelectorAll('.switch-btn').forEach(b => {
    b.setAttribute('aria-pressed', b.dataset.cert === slug ? 'true' : 'false');
  });
  document.querySelectorAll('[data-cred]').forEach(el => { el.className = 'cred ' + (c.variant || ''); });
  document.querySelectorAll('[data-enroll]').forEach(a => {
    a.href = window.CERTIFICATIONS_ENROLL_BASE
      ? window.CERTIFICATIONS_ENROLL_BASE + '/' + slug
      : '#';
  });

  ['mark', 'name', 'cat', 'desc', 'duration', 'durationShort', 'durationNote', 'ce', 'ceNote', 'fmt', 'expect', 'ctaVerb'].forEach(f => {
    if (c[f] !== undefined && c[f] !== null) setText(f, c[f]);
  });
  setText('learnEyebrow', c.learnEyebrow || 'Learning Objectives');
  setText('learnTitle', c.learnTitle || 'What you will learn');

  const tuition = c.tuition || [];
  if (tuition.length) {
    const prices = tuition.map(t => t[1]);
    setText('tuitionShort', tuition.length > 1 ? money(Math.max(...prices)) + ' / ' + money(Math.min(...prices)) : money(prices[0]));
    setText('tuitionNote', tuition.map(t => t[0]).join(' / '));
    setText('codeShort', (c.codes && c.codes[0]) ? c.codes[0][1] : '—');
    setText('codeNote', c.codes && c.codes.length > 1
      ? c.codes.slice(1).map(x => x[0] + ': ' + x[1]).join(' · ')
      : ((c.codes && c.codes[0]) ? c.codes[0][0] : ''));
    setText('sideNote', tuition.length > 1 ? 'Choose your option when you enroll.' : 'One all-inclusive tuition.');
    const tuitionList = $('tuitionList');
    if (tuitionList) {
      tuitionList.innerHTML = tuition.map(t =>
        `<div class="tuition-row"><span><span class="t-lbl">${esc(t[0])}</span><span class="t-code">${esc(t[2] || '')}</span></span><span class="t-amt">${money(t[1])}</span></div>`).join('');
    }
  } else {
    setText('tuitionShort', '—');
    setText('tuitionNote', '');
    const tuitionList = $('tuitionList');
    if (tuitionList) tuitionList.innerHTML = '';
  }

  const learnBlock = $('learn');
  const learn = c.learn || [];
  const outcomesHtml = (c.outcomesHtml || '').trim();
  if (learnBlock) {
    if (outcomesHtml) {
      learnBlock.hidden = false;
      const ll = $('learnList');
      ll.className = 'learn-list cert-detail-outcomes';
      ll.innerHTML = `<li class="content-full"><div class="cert-detail-html">${outcomesHtml}</div></li>`;
    } else if (learn.length) {
      learnBlock.hidden = false;
      const ll = $('learnList');
      ll.className = 'learn-list' + (learn.length === 1 ? ' one' : '');
      ll.innerHTML = learn.map(t => `<li>${CHECK}<span>${esc(t)}</span></li>`).join('');
    } else {
      learnBlock.hidden = true;
    }
  }

  const expectBlock = $('expect');
  const expectWrap = expectBlock ? expectBlock.querySelector('.expect') : null;
  const requirementsHtml = (c.requirementsHtml || '').trim();
  if (expectBlock && expectWrap) {
    if (requirementsHtml) {
      expectBlock.hidden = false;
      expectWrap.innerHTML = `<div class="cert-detail-html">${requirementsHtml}</div>`;
    } else if (c.expect) {
      expectBlock.hidden = false;
      expectWrap.innerHTML = `<p>${esc(c.expect)}</p>`;
    } else {
      expectBlock.hidden = true;
      expectWrap.innerHTML = '<p data-f="expect"></p>';
    }
  }

  const outlineList = $('outlineList');
  if (c.contentHtml && String(c.contentHtml).trim()) {
    outlineList.innerHTML = `<li class="content-full"><div class="course-content-html">${c.contentHtml}</div></li>`;
  } else if (c.outline && c.outline.length) {
    outlineList.innerHTML = c.outline.map(o => {
      const sub = o[3] ? `<ul class="ol-sub">${o[3].map(s => `<li>${s[0] === 'Topic' ? '' : '<strong>' + esc(s[0]) + '</strong>'}${esc(s[1])}</li>`).join('')}</ul>` : '';
      return `<li class="${o[2] || ''}"><span class="ol-label">${esc(o[0])}</span><p class="ol-title">${esc(o[1])}</p>${sub}</li>`;
    }).join('');
  } else {
    outlineList.innerHTML = '';
  }

  const related = c.related || [];
  setText('relatedNote', slug === 'skills-check'
    ? 'Prefer a full instructor-led course instead? Take any of these here.'
    : (related.length ? 'Courses that pair well with ' + c.mark + '.' : ''));

  const relatedGrid = $('relatedGrid');
  if (!relatedGrid) {
    return;
  }
  relatedGrid.innerHTML = related.filter(k => COURSES[k]).map(k => {
    const r = COURSES[k];
    const rTuition = r.tuition || [];
    const lo = rTuition.length ? Math.min(...rTuition.map(t => t[1])) : 0;
    const relHref = window.CERTIFICATIONS_SHOW_BASE ? window.CERTIFICATIONS_SHOW_BASE + '/' + k : '?cert=' + k;
    return `<a class="rel-card" href="${relHref}" data-cert="${k}">
      <div class="cred ${r.variant || ''}">
        <div class="cred-top"><span class="cred-issuer">${SEAL}MXP</span><span class="cred-cat">${esc(r.cat)}</span></div>
        <p class="cred-mark">${esc(r.mark)}</p><p class="cred-name">${esc(r.name)}</p>
        <div class="cred-strip"><span>${CLOCK}${esc(r.durationShort || '')}</span></div>
      </div>
      <div class="rel-foot"><span>${rTuition.length > 1 ? 'From ' : ''}${rTuition.length ? money(lo) : '—'}</span><strong>View course</strong></div>
    </a>`;
  }).join('');

  relatedGrid.querySelectorAll('a[data-cert]').forEach(a => a.addEventListener('click', e => {
    const targetSlug = a.dataset.cert;
    if (COURSES[targetSlug] && COURSES[targetSlug].contentHtml) {
      e.preventDefault();
      render(targetSlug, true);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }));
}

const qsCert = new URLSearchParams(location.search).get('cert');
render(qsCert || defaultSlug(), false);
</script>
