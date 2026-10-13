<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
.program-detail-page {
    --pd-teal-mid: #1A8A6F;
    --pd-teal-deep: #0F6E56;
    --pd-teal-darkest: #0A4D3C;
    --pd-terracotta: #C65D3A;
    --pd-terracotta-deep: #A84B2D;
    --pd-cream: #F5EDE0;
    --pd-cream-warm: #EFE3D0;
    --pd-charcoal: #2B2B2B;
    --pd-charcoal-soft: #4A4A4A;
    --pd-white: #FFFFFF;
    --pd-gray-line: #E8DFD0;
    --pd-gold-star: #E8A840;
    --pd-serif: 'Playfair Display', Georgia, serif;
    --pd-sans: 'Montserrat', system-ui, sans-serif;
    font-family: var(--pd-sans);
    color: var(--pd-charcoal);
    background: var(--pd-cream);
    line-height: 1.6;
}
.program-detail-page h1,
.program-detail-page h2,
.program-detail-page h3,
.program-detail-page h4 {
    font-family: var(--pd-serif);
    font-weight: 700;
    line-height: 1.2;
    color: var(--pd-teal-darkest);
}
.program-detail-page .pd-container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }

.program-detail-page .pd-breadcrumb {
    background: var(--pd-cream-warm);
    padding: 10px 24px;
    border-bottom: 1px solid var(--pd-gray-line);
    font-size: 13px;
    color: var(--pd-charcoal-soft);
}
.program-detail-page .pd-breadcrumb-inner {
    max-width: 1240px;
    margin: 0 auto;
}
.program-detail-page .pd-breadcrumb a {
    color: var(--pd-teal-mid);
    text-decoration: none;
    font-weight: 500;
}
.program-detail-page .pd-breadcrumb a:hover { color: var(--pd-terracotta); }
.program-detail-page .pd-breadcrumb span { margin: 0 6px; opacity: .55; }

.program-detail-page .pd-hero {
    background: linear-gradient(135deg, var(--pd-teal-darkest) 0%, var(--pd-teal-deep) 100%);
    color: var(--pd-white);
    padding: 28px 24px 36px;
    position: relative;
    overflow: hidden;
}
.program-detail-page .pd-hero::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(198, 93, 58, .18) 0%, transparent 70%);
    border-radius: 50%;
}
.program-detail-page .pd-hero-inner { max-width: 1240px; margin: 0 auto; position: relative; z-index: 1; }
.program-detail-page .pd-hero-eyebrow {
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--pd-terracotta);
    margin-bottom: 10px;
    padding: 4px 12px;
    border: 1px solid var(--pd-terracotta);
    border-radius: 30px;
}
.program-detail-page .pd-hero h1 {
    font-size: clamp(26px, 3.5vw, 38px);
    color: var(--pd-white);
    margin-bottom: 10px;
}
.program-detail-page .pd-hero-subtitle {
    font-size: 15px;
    line-height: 1.55;
    color: var(--pd-cream-warm);
    max-width: 680px;
    margin-bottom: 16px;
}
.program-detail-page .pd-hero-meta { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 16px; }
.program-detail-page .pd-hero-meta-item { display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--pd-cream); }
.program-detail-page .pd-hero-meta-item i { color: var(--pd-terracotta); }
.program-detail-page .pd-hero-ctas { display: flex; gap: 14px; flex-wrap: wrap; }
.program-detail-page .pd-btn-hero {
    background: var(--pd-terracotta);
    color: var(--pd-white);
    padding: 14px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border: 2px solid var(--pd-terracotta);
    display: inline-block;
    cursor: pointer;
}
.program-detail-page .pd-btn-hero:hover { background: var(--pd-terracotta-deep); border-color: var(--pd-terracotta-deep); color: var(--pd-white); }
.program-detail-page .pd-btn-hero-outline {
    background: transparent;
    color: var(--pd-white);
    padding: 14px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border: 2px solid rgba(245, 237, 224, .4);
    display: inline-block;
}
.program-detail-page .pd-btn-hero-outline:hover { background: rgba(245, 237, 224, .1); color: var(--pd-white); }

.program-detail-page .pd-image-costing-row { background: var(--pd-white); padding: 0 32px; }
.program-detail-page .pd-image-costing-inner {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 24px;
    align-items: start;
    transform: translateY(-24px);
}
.program-detail-page .pd-program-thumb {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 12px 32px rgba(10, 77, 60, .12);
    aspect-ratio: 1170 / 600;
    max-height: 260px;
    background: var(--pd-gray-line);
}
.program-detail-page .pd-program-thumb img {
    width: 100%;
    height: 100%;
    max-height: 260px;
    object-fit: cover;
    display: block;
}
.program-detail-page .pd-thumb-placeholder {
    height: 100%;
    min-height: 160px;
    max-height: 260px;
    background: linear-gradient(135deg, rgba(26, 138, 111, .12) 0%, rgba(15, 110, 86, .2) 100%);
    border: 2px dashed var(--pd-gray-line);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--pd-charcoal-soft);
    font-size: 14px;
    border-radius: 12px;
}

.program-detail-page .pd-costing-card {
    background: var(--pd-cream);
    border-radius: 14px;
    padding: 22px;
    border: 2px solid var(--pd-teal-mid);
    box-shadow: 0 8px 24px rgba(10, 77, 60, .1);
    max-height: 420px;
    overflow-y: auto;
}
.program-detail-page .pd-costing-label { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--pd-teal-mid); margin-bottom: 6px; }
.program-detail-page .pd-costing-price { font-family: var(--pd-serif); font-size: 36px; font-weight: 700; color: var(--pd-terracotta); margin-bottom: 4px; }
.program-detail-page .pd-costing-type { font-size: 14px; font-weight: 600; color: var(--pd-teal-darkest); margin-bottom: 16px; }
.program-detail-page .pd-btn-enroll {
    display: block;
    width: 100%;
    text-align: center;
    background: var(--pd-terracotta);
    color: var(--pd-white) !important;
    padding: 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    border: 2px solid var(--pd-terracotta);
    margin-bottom: 10px;
    cursor: pointer;
}
.program-detail-page .pd-btn-enroll:hover { background: var(--pd-terracotta-deep); border-color: var(--pd-terracotta-deep); }
.program-detail-page .pd-btn-enroll.pd-disabled { opacity: .65; pointer-events: none; }
.program-detail-page .pd-btn-consult {
    display: block;
    width: 100%;
    text-align: center;
    background: transparent;
    color: var(--pd-teal-darkest) !important;
    padding: 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border: 1.5px solid var(--pd-teal-darkest);
    margin-bottom: 16px;
}
.program-detail-page .pd-btn-consult:hover { background: var(--pd-teal-darkest); color: var(--pd-white) !important; }
.program-detail-page .pd-costing-includes { list-style: none; padding: 0; margin: 0; }
.program-detail-page .pd-costing-includes li,
.program-detail-page .pd-costing-card .ck-content ul li {
    padding: 7px 0 7px 26px;
    position: relative;
    font-size: 13px;
    color: var(--pd-charcoal-soft);
    border-bottom: 1px solid rgba(0, 0, 0, .06);
}
.program-detail-page .pd-costing-includes li::before,
.program-detail-page .pd-costing-card .ck-content ul li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--pd-teal-mid);
    font-weight: 700;
}

.program-detail-page .pd-main-content { background: var(--pd-white); padding: 8px 24px 48px; margin-top: -8px; }
.program-detail-page .pd-content-grid {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 32px;
    align-items: start;
}
.program-detail-page .pd-content-sidebar { position: sticky; top: 90px; max-height: calc(100vh - 100px); overflow-y: auto; }
.program-detail-page .pd-section-block { margin-bottom: 28px; }
.program-detail-page .pd-section-block:last-child { margin-bottom: 0; }
.program-detail-page .pd-section-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--pd-terracotta);
    margin-bottom: 10px;
}
.program-detail-page .pd-section-block h2 { font-size: 22px; margin-bottom: 12px; }
.program-detail-page .pd-section-block .ck-content {
    font-size: 15px;
    color: var(--pd-charcoal-soft);
    line-height: 1.65;
}
.program-detail-page .pd-section-block .ck-content p { margin-bottom: 0.65em; }
.program-detail-page .pd-section-block .ck-content p:last-child { margin-bottom: 0; }
.program-detail-page .pd-section-block .ck-content ol,
.program-detail-page .pd-section-block .ck-content ul {
    margin: 0.5em 0 0.75em;
    padding-left: 1.25em;
}
.program-detail-page .pd-section-block .ck-content ol li,
.program-detail-page .pd-section-block .ck-content ul li {
    margin-bottom: 0.35em;
    padding: 4px 0;
}
.program-detail-page .pd-section-block .ck-content ul.pd-desc-list,
.program-detail-page .pd-section-block .ck-content > ul:first-child {
    list-style: none;
    padding: 0;
}
.program-detail-page .pd-section-block .ck-content > ul:first-child li {
    padding: 8px 0 8px 28px;
    position: relative;
    border-bottom: 1px solid var(--pd-gray-line);
}
.program-detail-page .pd-section-block .ck-content ul li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 14px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--pd-teal-mid);
}

.program-detail-page .pd-plans-card {
    background: var(--pd-white);
    border: 1.5px solid var(--pd-gray-line);
    border-radius: 14px;
    padding: 22px;
    margin-bottom: 14px;
}
.program-detail-page .pd-plans-card.pd-current { border-color: var(--pd-teal-mid); background: var(--pd-cream); }
.program-detail-page .pd-plan-status {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 10px;
}
.program-detail-page .pd-plan-status.active { background: var(--pd-teal-mid); color: var(--pd-white); }
.program-detail-page .pd-plan-status.upcoming { background: rgba(198, 93, 58, .12); color: var(--pd-terracotta); }
.program-detail-page .pd-plan-status.closed { background: var(--pd-gray-line); color: var(--pd-charcoal-soft); }
.program-detail-page .pd-plans-card h4 { font-size: 16px; margin-bottom: 4px; }
.program-detail-page .pd-plan-dates { font-size: 12px; color: var(--pd-charcoal-soft); margin-bottom: 8px; }
.program-detail-page .pd-plan-price { font-family: var(--pd-serif); font-size: 20px; font-weight: 700; color: var(--pd-terracotta); margin-bottom: 8px; }
.program-detail-page .pd-plan-spots { font-size: 12px; color: var(--pd-charcoal-soft); margin-bottom: 8px; }
.program-detail-page .pd-btn-plan {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    margin-top: 8px;
    cursor: pointer;
    text-decoration: none;
}
.program-detail-page .pd-btn-plan.enroll { background: var(--pd-terracotta); color: var(--pd-white) !important; border: none; }
.program-detail-page .pd-btn-plan.waitlist { background: transparent; color: var(--pd-teal-darkest) !important; border: 1.5px solid var(--pd-teal-darkest); }
.program-detail-page .pd-btn-plan.pd-disabled { opacity: .65; pointer-events: none; }

.program-detail-page .pd-courses-section { background: var(--pd-cream); padding: 48px 24px; }
.program-detail-page .pd-courses-header { text-align: center; margin-bottom: 28px; }
.program-detail-page .pd-courses-header h2 { font-size: 26px; margin-bottom: 6px; }
.program-detail-page .pd-courses-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    max-width: 1120px;
    margin: 0 auto;
}
.program-detail-page .pd-course-card {
    background: var(--pd-white);
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--pd-gray-line);
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    transition: transform .2s, box-shadow .2s;
}
.program-detail-page .pd-course-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(10, 77, 60, .1); }
.program-detail-page .pd-course-card-img { width: 100%; height: 140px; overflow: hidden; }
.program-detail-page .pd-course-card-img img { width: 100%; height: 100%; object-fit: cover; }
.program-detail-page .pd-course-card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.program-detail-page .pd-course-card h3 { font-size: 17px; margin-bottom: 8px; }
.program-detail-page .pd-course-card p { font-size: 13px; color: var(--pd-charcoal-soft); flex: 1; }
.program-detail-page .pd-course-card-footer { display: flex; justify-content: space-between; align-items: center; margin-top: 12px; }
.program-detail-page .pd-course-card-price { font-family: var(--pd-serif); font-size: 18px; font-weight: 700; color: var(--pd-terracotta); }

.program-detail-page .pd-reviews-section { background: var(--pd-white); padding: 48px 24px; }
.program-detail-page .pd-reviews-header { text-align: center; margin-bottom: 40px; }
.program-detail-page .pd-review-card { background: var(--pd-cream); border-radius: 14px; padding: 28px; border: 1px solid var(--pd-gray-line); max-width: 720px; margin: 0 auto; }
.program-detail-page .pd-review-text { font-size: 14px; color: var(--pd-charcoal-soft); line-height: 1.7; }

.program-detail-page .pd-faq-section { background: var(--pd-cream); padding: 48px 24px; }
.program-detail-page .pd-faq-header { text-align: center; margin-bottom: 36px; }
.program-detail-page .pd-faq-list { max-width: 820px; margin: 0 auto; display: flex; flex-direction: column; gap: 12px; }
.program-detail-page .pd-faq-item { background: var(--pd-white); border-radius: 10px; border: 1px solid var(--pd-gray-line); overflow: hidden; }
.program-detail-page .pd-faq-item summary {
    padding: 20px 22px;
    cursor: pointer;
    font-family: var(--pd-serif);
    font-size: 17px;
    font-weight: 600;
    color: var(--pd-teal-darkest);
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.program-detail-page .pd-faq-item summary::-webkit-details-marker { display: none; }
.program-detail-page .pd-faq-item summary::after { content: '+'; font-size: 22px; color: var(--pd-terracotta); }
.program-detail-page .pd-faq-item[open] summary::after { content: '−'; }
.program-detail-page .pd-faq-body { padding: 0 22px 20px; font-size: 15px; color: var(--pd-charcoal-soft); line-height: 1.7; }

.program-detail-page .pd-recommendations { background: var(--pd-white); padding: 48px 24px; }
.program-detail-page .pd-rec-header { text-align: center; margin-bottom: 36px; }
.program-detail-page .pd-rec-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1080px; margin: 0 auto; }
.program-detail-page .pd-rec-card {
    background: var(--pd-cream);
    border-radius: 14px;
    padding: 28px;
    border: 1px solid var(--pd-gray-line);
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform .2s;
}
.program-detail-page .pd-rec-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(10, 77, 60, .1); }
.program-detail-page .pd-rec-tag { font-size: 10px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: var(--pd-teal-mid); margin-bottom: 8px; }
.program-detail-page .pd-rec-price { font-family: var(--pd-serif); font-size: 18px; font-weight: 700; color: var(--pd-terracotta); margin-top: 10px; display: block; }

.program-detail-page .pd-final-cta {
    background: linear-gradient(135deg, var(--pd-teal-darkest) 0%, var(--pd-teal-deep) 100%);
    color: var(--pd-white);
    padding: 48px 24px;
    text-align: center;
}
.program-detail-page .pd-final-cta h2 { color: var(--pd-white); font-size: clamp(26px, 4vw, 38px); margin-bottom: 14px; }
.program-detail-page .pd-final-cta p { font-size: 16px; color: var(--pd-cream-warm); margin-bottom: 24px; }
.program-detail-page .pd-final-motto { margin-top: 20px; font-family: var(--pd-serif); font-style: italic; color: var(--pd-cream); font-size: 15px; opacity: .9; }

.program-detail-page .addToCartBuyNow { cursor: pointer; }

@media (max-width: 960px) {
    .program-detail-page .pd-image-costing-inner,
    .program-detail-page .pd-content-grid { grid-template-columns: 1fr; }
    .program-detail-page .pd-content-sidebar { position: static; max-width: 440px; order: -1; }
    .program-detail-page .pd-courses-grid,
    .program-detail-page .pd-rec-grid { grid-template-columns: 1fr; }
}
</style>
