<div class="breadcrumb">
  <div class="breadcrumb-inner">
    <a href="{{ url('/') }}">Home</a>
    <span class="breadcrumb-sep">›</span>
    <a href="{{ route('certifications.index') }}">Certifications</a>
    <span class="breadcrumb-sep">›</span>
    <span data-f="mark">Course</span>
  </div>
</div>

<!-- ================================================================
     COURSE SWITCHER — one template serves all 7 certifications (?cert=)
     ================================================================ -->
<nav class="switcher" aria-label="Choose a certification">
  <div class="switcher-inner">
    <span class="switcher-label">Course details:</span>
    @foreach ($switcherItems ?? [] as $item)
      @php
        $itemSlug = $item['slug'] ?? '';
        $isActive = ($slug ?? '') === $itemSlug;
      @endphp
      <a href="{{ route('certifications.show', ['slug' => $itemSlug]) }}"
         class="switch-btn{{ $isActive ? ' is-active' : '' }}"
         @if($isActive) aria-current="page" @endif>{{ $item['label'] }}</a>
    @endforeach
  </div>
</nav>

<main id="main">

<!-- ================================================================
     COURSE HERO + FACT STRIP
     ================================================================ -->
<section class="course-hero" aria-labelledby="courseTitle">
  <div class="course-hero-grid">
    <div>
      <span class="hero-eyebrow" data-f="cat"></span>
      <h1 id="courseTitle"><span data-f="mark"></span><em data-f="name"></em></h1>
      <p class="course-desc" data-f="desc"></p>
      <div class="hero-actions">
        <a class="btn-primary" data-enroll href="certification-enroll.html">Enroll Now</a>
        <a class="btn-ghost-light" href="#outline">See the Course Outline</a>
      </div>
    </div>
    <div class="hero-cred-wrap" aria-hidden="true">
      <div class="cred" data-cred>
        <div class="cred-top"><span class="cred-issuer"><svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="3"/><circle cx="50" cy="50" r="40" fill="#0F6E56"/><text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text><text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text><text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text><line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="2"/></svg>MXP</span><span class="cred-cat" data-f="cat"></span></div>
        <p class="cred-mark" data-f="mark"></p>
        <p class="cred-name" data-f="name"></p>
        <div class="cred-strip"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span data-f="durationShort"></span></span><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg><span data-f="fmt"></span></span></div>
      </div>
    </div>
  </div>
  <div class="fact-strip">
    <dl class="facts">
      <div class="fact"><dt>Duration</dt><dd><span data-f="duration"></span><small data-f="durationNote"></small></dd></div>
      <div class="fact"><dt>CE Credit</dt><dd><span data-f="ce"></span><small data-f="ceNote"></small></dd></div>
      <div class="fact"><dt>Tuition</dt><dd><span data-f="tuitionShort"></span><small data-f="tuitionNote"></small></dd></div>
      <div class="fact"><dt>Course Code</dt><dd><span data-f="codeShort"></span><small data-f="codeNote"></small></dd></div>
    </dl>
  </div>
</section>

<!-- ================================================================
     CONTENT + SIDEBAR
     ================================================================ -->
<section class="detail">
  <div class="detail-grid">

    <div class="detail-main">
      <div class="block" id="learn">
        <span class="eyebrow" data-f="learnEyebrow">Learning Objectives</span>
        <h2 data-f="learnTitle">What you will learn</h2>
        <ul class="learn-list" id="learnList"></ul>
      </div>

      <div class="block" id="outline">
        <span class="eyebrow">Course Outline</span>
        <h2>How the course <em>is structured</em></h2>
        <ol class="outline" id="outlineList"></ol>
      </div>

      <div class="block" id="expect">
        <span class="eyebrow">Enrollee Expectations</span>
        <h2>Who this course <em>is for</em></h2>
        <div class="expect" data-expect-body>
          <p data-f="expect"></p>
        </div>
      </div>
    </div>

    <aside class="side" aria-label="Tuition and enrollment">
      <div class="side-card">
        <div class="side-head">
          <h2>Tuition</h2>
          <p data-f="sideNote"></p>
        </div>
        <div class="tuition" id="tuitionList"></div>
        <div class="side-actions">
          <a class="btn-primary" data-enroll href="certification-enroll.html">Enroll Now</a>
          <a class="btn-secondary" href="contact.html">Speak With Our Team</a>
        </div>
        <dl class="side-facts">
          <div><dt>Duration</dt><dd data-f="durationShort"></dd></div>
          <div><dt>Format</dt><dd data-f="fmt"></dd></div>
          <div><dt>CE credit</dt><dd data-f="ce"></dd></div>
          <div><dt>Location</dt><dd>Lakeland, FL</dd></div>
        </dl>
      </div>
      <div class="help-card">
        <h3>Questions about this course?</h3>
        <p>Call <a href="tel:8632508764">(863) 250-8764</a> or email <a href="mailto:contact@@merkaiixcelprep.com">contact@@merkaiixcelprep.com</a>.<br>Mon–Thu 8:30am–7:00pm · Sat 10:00am–3:00pm</p>
      </div>
      <div class="help-card">
        <h3>Training a team?</h3>
        <p>We schedule group sessions for facilities, clinics, and nursing programs. <a href="contact.html">Request a group quote</a></p>
      </div>
    </aside>

  </div>
</section>

<!-- ================================================================
     RELATED CERTIFICATIONS
     ================================================================ -->
<section class="related" aria-labelledby="relatedTitle">
  <div class="container">
    <h2 id="relatedTitle">Often taken <em>together</em></h2>
    <p class="lede" data-f="relatedNote"></p>
    <div class="related-grid" id="relatedGrid"></div>
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

<!-- ================================================================
     FINAL CTA
     ================================================================ -->
<section class="final-cta">
  <div class="final-cta-inner">
    <h2>Ready to <em data-f="ctaVerb">get certified?</em></h2>
    <p>Reserve your seat online, or speak with our team about which certification your role or employer requires.</p>
    <div class="final-cta-actions">
      <a class="btn-primary" data-enroll href="certification-enroll.html">Enroll Now</a>
      <a class="btn-ghost-light" href="{{ route('certifications.index') }}">View All Certifications</a>
    </div>
  </div>
</section>

