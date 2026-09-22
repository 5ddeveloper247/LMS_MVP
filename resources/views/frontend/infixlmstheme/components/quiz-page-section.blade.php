<div class="mxp-prep-courses">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
  .mxp-prep-courses {
    --teal-mid: #1A8A6F; --teal-deep: #0F6E56; --teal-darkest: #0A4D3C;
    --terracotta: #C65D3A; --terracotta-deep: #A84B2D;
    --cream: #F5EDE0; --cream-warm: #EFE3D0;
    --charcoal: #2B2B2B; --charcoal-soft: #4A4A4A;
    --white: #FFFFFF; --gray-line: #E8DFD0;
    --serif: 'Playfair Display', Georgia, serif;
    --sans: 'Montserrat', system-ui, sans-serif;
    --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
    --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
    font-family: var(--sans);
    color: var(--charcoal);
    background: var(--cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  .mxp-prep-courses * { box-sizing: border-box; }
  .mxp-prep-courses h1, .mxp-prep-courses h2, .mxp-prep-courses h3, .mxp-prep-courses h4 {
    font-family: var(--serif); font-weight: 700; line-height: 1.2; color: var(--teal-darkest);
  }

  .mxp-prep-courses .pc-breadcrumb { background: var(--cream-warm); padding: 14px 32px; border-bottom: 1px solid var(--gray-line); }
  .mxp-prep-courses .pc-breadcrumb-inner { max-width: 1240px; margin: 0 auto; font-size: 13px; color: var(--charcoal-soft); }
  .mxp-prep-courses .pc-breadcrumb-inner a { color: var(--teal-mid); text-decoration: none; font-weight: 500; }
  .mxp-prep-courses .pc-breadcrumb-inner a:hover { color: var(--terracotta); }
  .mxp-prep-courses .pc-breadcrumb-inner span { margin: 0 8px; opacity: 0.5; }

  .mxp-prep-courses .pc-hero { background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%); color: var(--white); padding: 90px 32px 100px; position: relative; overflow: hidden; }
  .mxp-prep-courses .pc-hero::before { content: ''; position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%); border-radius: 50%; }
  .mxp-prep-courses .pc-hero-inner { max-width: 900px; margin: 0 auto; text-align: center; position: relative; z-index: 1; }
  .mxp-prep-courses .pc-hero-eyebrow { display: inline-block; font-size: 12px; font-weight: 600; letter-spacing: 3px; text-transform: uppercase; color: var(--terracotta); margin-bottom: 24px; padding: 6px 16px; border: 1px solid var(--terracotta); border-radius: 30px; }
  .mxp-prep-courses .pc-hero h1 { font-size: clamp(36px, 5vw, 54px); color: var(--white); margin-bottom: 20px; letter-spacing: -1px; }
  .mxp-prep-courses .pc-hero h1 em { font-style: italic; color: var(--cream); font-weight: 400; }
  .mxp-prep-courses .pc-hero-sub { font-size: 18px; line-height: 1.6; color: var(--cream-warm); max-width: 720px; margin: 0 auto 32px; }
  .mxp-prep-courses .pc-hero-meta { display: flex; gap: 32px; justify-content: center; flex-wrap: wrap; font-size: 14px; color: var(--cream); }
  .mxp-prep-courses .pc-hero-meta-item { display: flex; align-items: center; gap: 8px; }
  .mxp-prep-courses .pc-hero-meta-item svg { width: 18px; height: 18px; color: var(--terracotta); }

  .mxp-prep-courses .pc-container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
  .mxp-prep-courses .pc-section { padding: 70px 0; }

  .mxp-prep-courses .pc-how-section { background: var(--white); padding: 70px 0; }
  .mxp-prep-courses .pc-how-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 28px; max-width: 1080px; margin: 0 auto; }
  .mxp-prep-courses .pc-how-step { text-align: center; position: relative; }
  .mxp-prep-courses .pc-how-step::after { content: '→'; position: absolute; right: -18px; top: 28px; font-size: 22px; color: var(--teal-mid); font-weight: 700; }
  .mxp-prep-courses .pc-how-step:last-child::after { display: none; }
  .mxp-prep-courses .pc-how-number { font-family: var(--serif); font-size: 42px; font-weight: 700; color: var(--cream-warm); margin-bottom: 10px; }
  .mxp-prep-courses .pc-how-step h4 { font-family: var(--sans); font-size: 14px; font-weight: 700; color: var(--teal-darkest); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
  .mxp-prep-courses .pc-how-step p { font-size: 13px; color: var(--charcoal-soft); line-height: 1.6; margin: 0; }

  .mxp-prep-courses .pc-filter-section { background: var(--cream); padding: 0; position: sticky; top: 58px; z-index: 50; border-bottom: 1px solid var(--gray-line); }
  .mxp-prep-courses .pc-filter-inner { max-width: 1240px; margin: 0 auto; padding: 0 24px; overflow-x: auto; -webkit-overflow-scrolling: touch; }
  .mxp-prep-courses .pc-filter-tabs { display: flex; gap: 4px; padding: 14px 0; min-width: max-content; }
  .mxp-prep-courses .pc-filter-tab {
    padding: 8px 18px; border-radius: 30px; font-size: 13px; font-weight: 600;
    color: var(--charcoal-soft); background: transparent; border: 1.5px solid transparent;
    cursor: pointer; transition: all 0.2s; white-space: nowrap; font-family: var(--sans);
  }
  .mxp-prep-courses .pc-filter-tab:hover { color: var(--teal-mid); background: var(--white); }
  .mxp-prep-courses .pc-filter-tab.active { background: var(--teal-darkest); color: var(--white); border-color: var(--teal-darkest); }
  .mxp-prep-courses .pc-filter-count { font-size: 11px; opacity: 0.7; margin-left: 4px; }

  .mxp-prep-courses .pc-courses-section { background: var(--cream); padding: 50px 0 80px; }
  .mxp-prep-courses .pc-courses-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
  .mxp-prep-courses .pc-course-card {
    background: var(--white); border-radius: 14px; overflow: hidden;
    border: 1px solid var(--gray-line); transition: transform 0.2s, box-shadow 0.2s;
  }
  .mxp-prep-courses .pc-course-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
  .mxp-prep-courses .pc-course-thumb {
    height: 160px; display: flex; align-items: center; justify-content: center;
    padding: 24px; position: relative; overflow: hidden;
  }
  .mxp-prep-courses .pc-course-thumb img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
  }
  .mxp-prep-courses .pc-course-thumb::after {
    content: ''; position: absolute; inset: 0; z-index: 1; pointer-events: none;
    background: linear-gradient(to top, rgba(10, 77, 60, 0.55) 0%, transparent 55%);
  }
  .mxp-prep-courses .pc-course-type-badges {
    position: absolute; bottom: 12px; left: 12px; right: 12px;
    display: flex; flex-wrap: wrap; gap: 6px; z-index: 2;
  }
  .mxp-prep-courses .pc-type-badge {
    display: inline-flex; align-items: center;
    padding: 5px 11px; border-radius: 999px;
    font-size: 10px; font-weight: 700; letter-spacing: 0.5px;
    text-transform: uppercase; line-height: 1;
    border: 1px solid rgba(255, 255, 255, 0.35);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.18);
    backdrop-filter: blur(4px);
  }
  .mxp-prep-courses .pc-badge-live { background: rgba(198, 93, 58, 0.94); color: var(--white); }
  .mxp-prep-courses .pc-badge-ondemand { background: rgba(26, 138, 111, 0.94); color: var(--white); }
  .mxp-prep-courses .pc-badge-full { background: rgba(10, 77, 60, 0.94); color: var(--white); }
  .mxp-prep-courses .pc-empty-state {
    grid-column: 1 / -1; text-align: center; padding: 48px 24px;
    background: var(--white); border-radius: 14px; border: 1px solid var(--gray-line);
  }
  .mxp-prep-courses .pc-course-thumb-label {
    font-family: var(--serif); font-weight: 700; font-size: 20px;
    color: var(--white); text-align: center; line-height: 1.2;
    position: relative; z-index: 1;
  }
  .mxp-prep-courses .pc-thumb-foundations { background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%); }
  .mxp-prep-courses .pc-thumb-physiological { background: linear-gradient(135deg, #1A8A6F 0%, #0A4D3C 100%); }
  .mxp-prep-courses .pc-thumb-psychosocial { background: linear-gradient(135deg, #4A7C6B 0%, #2D5A4A 100%); }
  .mxp-prep-courses .pc-thumb-health-promo { background: linear-gradient(135deg, #3D8B6E 0%, #1A6B4F 100%); }
  .mxp-prep-courses .pc-thumb-safe-care { background: linear-gradient(135deg, #0F6E56 0%, #073D30 100%); }
  .mxp-prep-courses .pc-thumb-high-yield { background: linear-gradient(135deg, var(--terracotta) 0%, var(--terracotta-deep) 100%); }
  .mxp-prep-courses .pc-thumb-bundle { background: linear-gradient(135deg, var(--teal-darkest) 0%, #041F18 100%); }
  .mxp-prep-courses .pc-thumb-ngn { background: linear-gradient(135deg, #8B5E3C 0%, #5D3A22 100%); }
  .mxp-prep-courses .pc-thumb-remedial { background: linear-gradient(135deg, #C65D3A 0%, #8B3E24 100%); }

  .mxp-prep-courses .pc-course-body { padding: 22px 24px 24px; }
  .mxp-prep-courses .pc-course-tag {
    display: inline-block; font-size: 11px; font-weight: 600; letter-spacing: 1.5px;
    text-transform: uppercase; color: var(--teal-mid); margin-bottom: 8px;
  }
  .mxp-prep-courses .pc-course-body h3 { font-size: 18px; margin-bottom: 8px; color: var(--teal-darkest); }
  .mxp-prep-courses .pc-course-body p { font-size: 13.5px; color: var(--charcoal-soft); line-height: 1.6; margin-bottom: 18px; min-height: 44px; }
  .mxp-prep-courses .pc-course-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 16px; border-top: 1px solid var(--gray-line); }
  .mxp-prep-courses .pc-course-price { font-family: var(--serif); font-size: 22px; font-weight: 700; color: var(--terracotta); }
  .mxp-prep-courses .pc-course-enroll {
    font-size: 13px; font-weight: 600; color: var(--teal-mid); text-decoration: none;
    padding: 8px 18px; border: 1.5px solid var(--teal-mid); border-radius: 6px;
    transition: all 0.2s;
  }
  .mxp-prep-courses .pc-course-enroll:hover { background: var(--teal-mid); color: var(--white); }

  .mxp-prep-courses .pc-course-card.is-pc-hidden { display: none !important; }
  .mxp-prep-courses .pc-load-more-wrap { text-align: center; margin-top: 40px; }
  .mxp-prep-courses .pc-load-more-btn {
    font-family: var(--sans);
    font-size: 14px;
    font-weight: 600;
    color: var(--teal-mid);
    background: var(--white);
    border: 1.5px solid var(--teal-mid);
    border-radius: 6px;
    padding: 12px 32px;
    cursor: pointer;
    transition: all 0.2s;
  }
  .mxp-prep-courses .pc-load-more-btn:hover {
    background: var(--teal-mid);
    color: var(--white);
  }
  .mxp-prep-courses .pc-load-more-wrap.is-pc-hidden { display: none; }

  .mxp-prep-courses .pc-bundle-section {
    background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
    padding: 80px 32px;
    text-align: center;
    color: var(--white);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .mxp-prep-courses .pc-bundle-section::before { content: ''; position: absolute; top: -100px; left: 50%; transform: translateX(-50%); width: 500px; height: 500px; background: radial-gradient(circle, rgba(198, 93, 58, 0.12) 0%, transparent 70%); border-radius: 50%; }
  .mxp-prep-courses .pc-bundle-inner {
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 1;
    box-sizing: border-box;
  }
  .mxp-prep-courses .pc-bundle-eyebrow { display: inline-block; font-size: 12px; font-weight: 600; letter-spacing: 3px; text-transform: uppercase; color: var(--terracotta); margin-bottom: 20px; }
  .mxp-prep-courses .pc-bundle-section h2 { color: var(--white); font-size: clamp(30px, 4vw, 42px); margin-bottom: 16px; }
  .mxp-prep-courses .pc-bundle-section h2 em { font-style: italic; color: var(--cream); font-weight: 400; }
  .mxp-prep-courses .pc-bundle-intro { font-size: 17px; color: var(--cream-warm); line-height: 1.6; margin: 0 auto 36px; max-width: 680px; }
  .mxp-prep-courses .pc-bundle-cards {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
    margin: 0 auto 36px;
    width: 100%;
    max-width: 752px;
  }
  .mxp-prep-courses .pc-bundle-card {
    background: rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 28px 20px;
    border: 1px solid rgba(245,237,224,0.15);
    text-align: center;
    min-height: 196px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
  }
  .mxp-prep-courses .pc-bundle-card p { margin: 0; }
  .mxp-prep-courses .pc-bundle-card-name { font-family: var(--serif); font-size: 18px; font-weight: 700; color: var(--white); margin-bottom: 6px !important; line-height: 1.25; }
  .mxp-prep-courses .pc-bundle-card-desc {
    font-size: 13px;
    color: var(--cream-warm);
    margin-bottom: 14px !important;
    line-height: 1.5;
    min-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 100%;
  }
  .mxp-prep-courses .pc-bundle-card-price { font-family: var(--serif); font-size: 28px; font-weight: 700; color: var(--terracotta); line-height: 1.1; margin-bottom: 0 !important; }
  .mxp-prep-courses .pc-bundle-card-save { font-size: 12px; color: var(--cream); margin-top: 4px !important; line-height: 1.4; }
  .mxp-prep-courses .pc-btn-primary { background: var(--terracotta); color: var(--white); padding: 16px 36px; border-radius: 6px; text-decoration: none; font-size: 15px; font-weight: 600; letter-spacing: 0.5px; transition: all 0.2s; display: inline-block; border: 2px solid var(--terracotta); }
  .mxp-prep-courses .pc-btn-primary:hover { background: var(--terracotta-deep); border-color: var(--terracotta-deep); transform: translateY(-1px); color: var(--white); }

  .mxp-prep-courses .pc-notice-section { background: var(--white); padding: 50px 32px; }
  .mxp-prep-courses .pc-notice-card { max-width: 900px; margin: 0 auto; background: var(--cream); border-radius: 12px; padding: 28px 32px; border-left: 5px solid var(--terracotta); }
  .mxp-prep-courses .pc-notice-card h4 { font-family: var(--sans); font-size: 14px; font-weight: 700; color: var(--terracotta); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
  .mxp-prep-courses .pc-notice-card p { font-size: 14px; color: var(--charcoal-soft); line-height: 1.7; margin: 0; }
  .mxp-prep-courses .pc-notice-card a { color: var(--terracotta); font-weight: 600; }

  .mxp-prep-courses .pc-stats-band { background: var(--teal-darkest); padding: 50px 32px; }
  .mxp-prep-courses .pc-stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; max-width: 900px; margin: 0 auto; text-align: center; }
  .mxp-prep-courses .pc-stat-number { font-family: var(--serif); font-size: 42px; font-weight: 700; color: var(--white); line-height: 1; margin-bottom: 6px; }
  .mxp-prep-courses .pc-stat-label { font-size: 13px; color: var(--cream-warm); text-transform: uppercase; letter-spacing: 1px; margin: 0; }

  .mxp-prep-courses .pc-final-cta { background: var(--cream-warm); padding: 80px 32px; text-align: center; }
  .mxp-prep-courses .pc-final-cta-inner { max-width: 700px; margin: 0 auto; }
  .mxp-prep-courses .pc-final-cta h2 { font-size: clamp(28px, 4vw, 38px); margin-bottom: 16px; }
  .mxp-prep-courses .pc-final-cta h2 em { font-style: italic; color: var(--terracotta); }
  .mxp-prep-courses .pc-final-cta p { font-size: 16px; color: var(--charcoal-soft); line-height: 1.6; margin-bottom: 30px; }
  .mxp-prep-courses .pc-final-cta .pc-btn-primary { padding: 16px 40px; }

  @media (max-width: 960px) {
    .mxp-prep-courses .pc-hero { padding: 70px 24px 80px; }
    .mxp-prep-courses .pc-how-grid { grid-template-columns: repeat(2, 1fr); }
    .mxp-prep-courses .pc-how-step::after { display: none; }
    .mxp-prep-courses .pc-courses-grid { grid-template-columns: repeat(2, 1fr); }
    .mxp-prep-courses .pc-bundle-cards { grid-template-columns: 1fr; max-width: 340px; margin: 0 auto 36px; }
    .mxp-prep-courses .pc-bundle-card { min-height: 180px; }
    .mxp-prep-courses .pc-stats-grid { grid-template-columns: repeat(2, 1fr); gap: 24px; }
  }
  @media (max-width: 640px) {
    .mxp-prep-courses .pc-courses-grid { grid-template-columns: 1fr; }
    .mxp-prep-courses .pc-filter-section { top: 56px; }
  }
</style>

<div class="pc-breadcrumb">
  <div class="pc-breadcrumb-inner">
    <a href="{{ url('/') }}">Home</a><span>›</span>Prep-Courses
  </div>
</div>

<header class="pc-hero">
  <div class="pc-hero-inner">
    <span class="pc-hero-eyebrow">Shop Prep-Courses</span>
    <h1>Master One Subject. <em>Or All of Them.</em></h1>
    <p class="pc-hero-sub">Self-paced subject mastery, built on the NCLEX PASS Method™. Buy individual courses or bundle for savings. Every course includes practice questions, clinical judgment scenarios, and lifetime access.</p>
    <div class="pc-hero-meta">
      <div class="pc-hero-meta-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        {{ $total ?? 0 }}+ Subjects
      </div>
      <div class="pc-hero-meta-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        Self-Paced
      </div>
      <div class="pc-hero-meta-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        Lifetime Access
      </div>
      <div class="pc-hero-meta-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
        NGN-Aligned
      </div>
    </div>
  </div>
</header>

<section class="pc-how-section">
  <div class="pc-container">
    <div class="pc-how-grid">
      <div class="pc-how-step">
        <div class="pc-how-number">01</div>
        <h4>Choose a Subject</h4>
        <p>Browse by NCLEX test plan domain or pick your weakest area.</p>
      </div>
      <div class="pc-how-step">
        <div class="pc-how-number">02</div>
        <h4>Enroll Instantly</h4>
        <p>One-time purchase. No subscription. Immediate access.</p>
      </div>
      <div class="pc-how-step">
        <div class="pc-how-number">03</div>
        <h4>Learn at Your Pace</h4>
        <p>Video lessons, clinical scenarios, and practice Qbank included.</p>
      </div>
      <div class="pc-how-step">
        <div class="pc-how-number">04</div>
        <h4>Master &amp; Move On</h4>
        <p>Track your progress. Lifetime access for review anytime.</p>
      </div>
    </div>
  </div>
</section>

<div class="pc-filter-section" id="catalog">
  <div class="pc-filter-inner">
    <div class="pc-filter-tabs">
      <button type="button" class="pc-filter-tab active" data-filter="all">All Courses<span class="pc-filter-count">({{ $total ?? 0 }})</span></button>
      @foreach ($categoryFilters ?? [] as $filterCategory)
        <button type="button" class="pc-filter-tab" data-filter="cat-{{ $filterCategory->id }}">
          {{ $filterCategory->name }}<span class="pc-filter-count">({{ $filterCategory->count }})</span>
        </button>
      @endforeach
    </div>
  </div>
</div>

<section class="pc-courses-section">
  <div class="pc-container">
    <div class="pc-courses-grid">
      @forelse ($courses ?? [] as $course)
        @php
          $categoryName = $course->category
            ? (is_array($course->category->name) ? ($course->category->name[app()->getLocale()] ?? reset($course->category->name)) : $course->category->name)
            : 'Course';
          $priceLabel = \App\View\Components\QuizPageSection::listingPriceLabel($course);
          $excerpt = \App\View\Components\QuizPageSection::excerpt($course->about);
          $thumbClass = \App\View\Components\QuizPageSection::thumbClass($loop->index);
          $typeBadges = \App\View\Components\QuizPageSection::listingTypeBadges($course);
        @endphp
        <div class="pc-course-card" data-category="cat-{{ $course->category_id ?? 0 }}">
          <div class="pc-course-thumb {{ $thumbClass }}">
            @if (!empty($course->thumbnail))
              <img src="{{ getCourseImage($course->thumbnail) }}" alt="{{ $course->title }}">
            @else
              <div class="pc-course-thumb-label">{{ $course->title }}</div>
            @endif
            @if (count($typeBadges))
              <div class="pc-course-type-badges">
                @foreach ($typeBadges as $badge)
                  <span class="pc-type-badge {{ $badge['class'] }}">{{ $badge['label'] }}</span>
                @endforeach
              </div>
            @endif
          </div>
          <div class="pc-course-body">
            <p class="pc-course-tag">{{ $categoryName }}</p>
            <h3>{{ $course->title }}</h3>
            <p>{{ $excerpt ?: 'Explore this prep-course and choose the learning option that fits you best.' }}</p>
            <div class="pc-course-footer">
              @if ($priceLabel)
                <span class="pc-course-price">{{ $priceLabel }}</span>
              @else
                <span class="pc-course-price" style="font-size:14px;">View options</span>
              @endif
              <a href="{{ route('courseDetailsView', $course->slug) }}" class="pc-course-enroll">Learn More &rarr;</a>
            </div>
          </div>
        </div>
      @empty
        <div class="pc-empty-state">
          <h3>No courses available yet</h3>
          <p>Check back soon for new prep-courses.</p>
        </div>
      @endforelse

    </div>
    <div class="pc-load-more-wrap" id="pcLoadMoreWrap">
      <button type="button" class="pc-load-more-btn" id="pcLoadMoreBtn">Load More</button>
    </div>
  </div>
</section>

<section class="pc-bundle-section">
  <div class="pc-bundle-inner">
    <span class="pc-bundle-eyebrow">Save with Bundles</span>
    <h2>Buy One. Or <em>Bundle and Save.</em></h2>
    <p class="pc-bundle-intro">Most students need more than one subject. Bundles give you the complete package at a fraction of individual pricing — with the same lifetime access and practice Qbank.</p>
    <div class="pc-bundle-cards">
      <div class="pc-bundle-card">
        <p class="pc-bundle-card-name">Foundations Pack</p>
        <p class="pc-bundle-card-desc">A&amp;P + Pharm + Fundamentals</p>
        <p class="pc-bundle-card-price">$365</p>
        <p class="pc-bundle-card-save">Save $92 vs. individual</p>
      </div>
      <div class="pc-bundle-card">
        <p class="pc-bundle-card-name">Specialty Pack</p>
        <p class="pc-bundle-card-desc">Mental Health + OB + Peds + Med-Surg</p>
        <p class="pc-bundle-card-price">$529</p>
        <p class="pc-bundle-card-save">Save $137 vs. individual</p>
      </div>
      <div class="pc-bundle-card">
        <p class="pc-bundle-card-name">Full Subject Pack</p>
        <p class="pc-bundle-card-desc">All 20+ courses included</p>
        <p class="pc-bundle-card-price">$1,497</p>
        <p class="pc-bundle-card-save">Best value · Save $1,000+</p>
      </div>
    </div>
    <a href="#" class="pc-btn-primary">Questions? Schedule a Free Call →</a>
  </div>
</section>

<section class="pc-notice-section">
  <div class="pc-notice-card">
    <h4>Important Notice</h4>
    <p>Prep-courses are self-paced educational resources. They are not coaching programs and do not include live instruction or 1:1 support. For personalized coaching, see our NCLEX Success Coaching Program™ or Nursing School Success Program. Prep-courses do not fulfill Florida Board of Nursing remediation requirements — for that, see our FL BON Remediation Program.</p>
  </div>
</section>

<section class="pc-stats-band">
  <div class="pc-stats-grid">
    <div>
      <p class="pc-stat-number">{{ $total ?? 0 }}+</p>
      <p class="pc-stat-label">Subject Courses</p>
    </div>
    <div>
      <p class="pc-stat-number">1,500+</p>
      <p class="pc-stat-label">Students Served</p>
    </div>
    <div>
      <p class="pc-stat-number">95%</p>
      <p class="pc-stat-label">Pass Rate</p>
    </div>
    <div>
      <p class="pc-stat-number">∞</p>
      <p class="pc-stat-label">Lifetime Access</p>
    </div>
  </div>
</section>

<section class="pc-final-cta">
  <div class="pc-final-cta-inner">
    <h2>Not sure which courses <em>you need?</em></h2>
    <p>Schedule a free 20-minute consultation. We'll help you identify your weak areas and recommend the right courses — or the right program — for where you are right now.</p>
    <a href="#" class="pc-btn-primary">Schedule a Free Advisor Call →</a>
  </div>
</section>

<script>
(function() {
  var root = document.querySelector('.mxp-prep-courses');
  if (!root) return;

  var PER_PAGE = 3;
  var tabs = root.querySelectorAll('.pc-filter-tab');
  var cards = root.querySelectorAll('.pc-course-card');
  var loadMoreWrap = root.querySelector('#pcLoadMoreWrap');
  var loadMoreBtn = root.querySelector('#pcLoadMoreBtn');
  var activeFilter = 'all';
  var shownCount = PER_PAGE;

  function getMatchingCards() {
    return Array.prototype.filter.call(cards, function(card) {
      return activeFilter === 'all' || card.dataset.category === activeFilter;
    });
  }

  function applyCourseVisibility() {
    var matching = getMatchingCards();

    cards.forEach(function(card) {
      card.classList.add('is-pc-hidden');
    });

    matching.forEach(function(card, index) {
      if (index < shownCount) {
        card.classList.remove('is-pc-hidden');
      }
    });

    if (loadMoreWrap) {
      if (matching.length <= shownCount) {
        loadMoreWrap.classList.add('is-pc-hidden');
      } else {
        loadMoreWrap.classList.remove('is-pc-hidden');
      }
    }
  }

  tabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      tabs.forEach(function(t) { t.classList.remove('active'); });
      this.classList.add('active');
      activeFilter = this.dataset.filter;
      shownCount = PER_PAGE;
      applyCourseVisibility();
    });
  });

  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function() {
      shownCount += PER_PAGE;
      applyCourseVisibility();
    });
  }

  applyCourseVisibility();
})();
</script>
</div>
