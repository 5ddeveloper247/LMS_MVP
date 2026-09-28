<div class="mxp-continuing-education">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
.mxp-continuing-education{
  --ce-teal-mid:#1A8A6F;--ce-teal-deep:#0F6E56;--ce-teal-darkest:#0A4D3C;
  --ce-terracotta:#C65D3A;--ce-terracotta-deep:#A84B2D;
  --ce-cream:#F5EDE0;--ce-cream-warm:#EFE3D0;
  --ce-charcoal:#2B2B2B;--ce-charcoal-soft:#4A4A4A;
  --ce-white:#FFFFFF;--ce-gray-line:#E8DFD0;
  --ce-serif:'Playfair Display',Georgia,serif;
  --ce-sans:'Montserrat',system-ui,sans-serif;
  --ce-shadow-sm:0 2px 8px rgba(10,77,60,.06);
  --ce-shadow-md:0 8px 24px rgba(10,77,60,.10);
  --ce-shadow-lg:0 20px 50px rgba(10,77,60,.15);
  font-family:var(--ce-sans);color:var(--ce-charcoal);background:var(--ce-cream);line-height:1.6;-webkit-font-smoothing:antialiased;
}
.mxp-continuing-education *{box-sizing:border-box}
.mxp-continuing-education h1,.mxp-continuing-education h2,.mxp-continuing-education h3,.mxp-continuing-education h4{
  font-family:var(--ce-serif);font-weight:700;line-height:1.2;color:var(--ce-teal-darkest);
}
.mxp-continuing-education .ce-container{max-width:1240px;margin:0 auto;padding:0 24px}

.mxp-continuing-education .ce-breadcrumb{background:var(--ce-cream-warm);padding:14px 32px;border-bottom:1px solid var(--ce-gray-line)}
.mxp-continuing-education .ce-breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-continuing-education .ce-breadcrumb-inner a{color:var(--ce-teal-mid);text-decoration:none;font-weight:500}
.mxp-continuing-education .ce-breadcrumb-inner a:hover{color:var(--ce-terracotta)}
.mxp-continuing-education .ce-breadcrumb-inner span{margin:0 8px;opacity:.5}

.mxp-continuing-education .ce-hero{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 100%);color:var(--ce-white);padding:90px 32px 100px;position:relative;overflow:hidden;text-align:center}
.mxp-continuing-education .ce-hero::before{content:'';position:absolute;top:-120px;right:-120px;width:500px;height:500px;background:radial-gradient(circle,rgba(198,93,58,.15) 0%,transparent 70%);border-radius:50%}
.mxp-continuing-education .ce-hero-inner{max-width:820px;margin:0 auto;position:relative;z-index:1}
.mxp-continuing-education .ce-hero-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:22px;padding:6px 16px;border:1px solid var(--ce-terracotta);border-radius:30px}
.mxp-continuing-education .ce-hero h1{font-size:clamp(36px,5vw,52px);color:var(--ce-white);margin-bottom:20px;letter-spacing:-.5px}
.mxp-continuing-education .ce-hero h1 em{font-style:italic;color:var(--ce-cream);font-weight:400}
.mxp-continuing-education .ce-hero-sub{font-size:18px;line-height:1.65;color:var(--ce-cream-warm);max-width:680px;margin:0 auto 28px}
.mxp-continuing-education .ce-trust-strip{display:flex;justify-content:center;gap:32px;flex-wrap:wrap;margin-top:10px}
.mxp-continuing-education .ce-trust-item{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--ce-cream);font-weight:500}
.mxp-continuing-education .ce-trust-item svg{width:18px;height:18px;color:var(--ce-terracotta)}

.mxp-continuing-education .ce-select-section{background:var(--ce-white);padding:80px 32px}
.mxp-continuing-education .ce-select-header{text-align:center;max-width:700px;margin:0 auto 60px}
.mxp-continuing-education .ce-select-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:16px}
.mxp-continuing-education .ce-select-header h2{font-size:clamp(30px,4vw,42px);margin-bottom:14px}
.mxp-continuing-education .ce-select-header p{font-size:16px;color:var(--ce-charcoal-soft);line-height:1.6}
.mxp-continuing-education .ce-license-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;max-width:1040px;margin:0 auto}
.mxp-continuing-education .ce-license-card{background:var(--ce-cream);border-radius:20px;padding:44px 40px;border:2px solid transparent;transition:all .3s;position:relative;overflow:hidden}
.mxp-continuing-education .ce-license-card:hover{border-color:var(--ce-teal-mid);transform:translateY(-4px);box-shadow:var(--ce-shadow-lg)}
.mxp-continuing-education .ce-license-card::before{content:'';position:absolute;top:0;left:0;right:0;height:5px}
.mxp-continuing-education .ce-license-card.rn-lpn::before{background:linear-gradient(90deg,var(--ce-teal-mid),var(--ce-teal-deep))}
.mxp-continuing-education .ce-license-card.aprn::before{background:linear-gradient(90deg,var(--ce-terracotta),var(--ce-terracotta-deep))}
.mxp-continuing-education .ce-license-icon{width:56px;height:56px;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px}
.mxp-continuing-education .ce-license-card.rn-lpn .ce-license-icon{background:rgba(26,138,111,.12);color:var(--ce-teal-mid)}
.mxp-continuing-education .ce-license-card.aprn .ce-license-icon{background:rgba(198,93,58,.12);color:var(--ce-terracotta)}
.mxp-continuing-education .ce-license-icon svg{width:28px;height:28px}
.mxp-continuing-education .ce-license-card h3{font-size:24px;margin-bottom:6px}
.mxp-continuing-education .ce-license-subtitle{font-family:var(--ce-serif);font-style:italic;font-size:14px;color:var(--ce-terracotta);margin-bottom:16px}
.mxp-continuing-education .ce-license-card p{font-size:15px;color:var(--ce-charcoal-soft);line-height:1.7;margin-bottom:20px}
.mxp-continuing-education .ce-license-req{list-style:none;margin-bottom:24px;padding:0}
.mxp-continuing-education .ce-license-req li{padding:6px 0;font-size:13.5px;color:var(--ce-charcoal-soft);display:flex;align-items:flex-start;gap:10px;line-height:1.5}
.mxp-continuing-education .ce-license-req li svg{width:16px;height:16px;color:var(--ce-teal-mid);flex-shrink:0;margin-top:2px}
.mxp-continuing-education .ce-license-card.aprn .ce-license-req li svg{color:var(--ce-terracotta)}
.mxp-continuing-education .ce-license-bundles{background:var(--ce-white);border-radius:12px;padding:20px 22px;margin-bottom:24px}
.mxp-continuing-education .ce-license-bundles h4{font-family:var(--ce-sans);font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--ce-teal-mid);margin-bottom:12px}
.mxp-continuing-education .ce-license-card.aprn .ce-license-bundles h4{color:var(--ce-terracotta)}
.mxp-continuing-education .ce-bundle-row{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid var(--ce-gray-line)}
.mxp-continuing-education .ce-bundle-row:last-child{border-bottom:none}
.mxp-continuing-education .ce-bundle-name{font-size:14px;font-weight:600;color:var(--ce-teal-darkest);margin:0}
.mxp-continuing-education .ce-bundle-detail{font-size:12px;color:var(--ce-charcoal-soft);margin:0}
.mxp-continuing-education .ce-bundle-price{font-family:var(--ce-serif);font-weight:700;color:var(--ce-terracotta);font-size:16px;white-space:nowrap}
.mxp-continuing-education .ce-btn-portal{display:block;width:100%;text-align:center;padding:16px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;cursor:pointer}
.mxp-continuing-education .ce-btn-portal.teal{background:var(--ce-teal-darkest);color:var(--ce-white);border:2px solid var(--ce-teal-darkest)}
.mxp-continuing-education .ce-btn-portal.teal:hover{background:var(--ce-teal-deep);border-color:var(--ce-teal-deep);color:var(--ce-white)}
.mxp-continuing-education .ce-btn-portal.terra{background:var(--ce-terracotta);color:var(--ce-white);border:2px solid var(--ce-terracotta)}
.mxp-continuing-education .ce-btn-portal.terra:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);color:var(--ce-white)}

.mxp-continuing-education .ce-how-section{background:var(--ce-cream);padding:80px 32px}
.mxp-continuing-education .ce-how-header{text-align:center;margin-bottom:50px}
.mxp-continuing-education .ce-how-header h2{font-size:32px;margin-bottom:10px}
.mxp-continuing-education .ce-how-header p{font-size:15px;color:var(--ce-charcoal-soft)}
.mxp-continuing-education .ce-how-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;max-width:1040px;margin:0 auto}
.mxp-continuing-education .ce-how-step{text-align:center;position:relative}
.mxp-continuing-education .ce-how-step::after{content:'\2192';position:absolute;top:28px;right:-18px;font-size:24px;color:var(--ce-gray-line)}
.mxp-continuing-education .ce-how-step:last-child::after{display:none}
.mxp-continuing-education .ce-how-num{width:56px;height:56px;border-radius:50%;background:var(--ce-teal-darkest);color:var(--ce-white);font-family:var(--ce-serif);font-size:22px;font-weight:700;display:flex;align-items:center;justify-content:center;margin:0 auto 16px}
.mxp-continuing-education .ce-how-step h4{font-size:16px;margin-bottom:6px;color:var(--ce-teal-darkest)}
.mxp-continuing-education .ce-how-step p{font-size:13px;color:var(--ce-charcoal-soft);line-height:1.6;margin:0}

.mxp-continuing-education .ce-catalog-section{background:var(--ce-white);padding:80px 32px}
.mxp-continuing-education .ce-catalog-header{text-align:center;margin-bottom:50px}
.mxp-continuing-education .ce-catalog-header h2{font-size:32px;margin-bottom:10px}
.mxp-continuing-education .ce-catalog-header p{font-size:15px;color:var(--ce-charcoal-soft)}
.mxp-continuing-education .ce-catalog-label{font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:18px;max-width:1080px;margin-left:auto;margin-right:auto}
.mxp-continuing-education .ce-catalog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;max-width:1080px;margin:0 auto 40px}
.mxp-continuing-education .ce-cat-card{background:var(--ce-cream);border-radius:12px;padding:22px 24px;border:1px solid var(--ce-gray-line);display:flex;justify-content:space-between;align-items:center;gap:16px;transition:all .2s;text-decoration:none;color:inherit}
.mxp-continuing-education .ce-cat-card:hover{box-shadow:var(--ce-shadow-sm);border-color:var(--ce-teal-mid)}
.mxp-continuing-education .ce-cat-card-info h4{font-family:var(--ce-sans);font-size:14px;font-weight:600;color:var(--ce-teal-darkest);margin-bottom:3px}
.mxp-continuing-education .ce-cat-card-info p{font-size:12px;color:var(--ce-charcoal-soft);margin:0}
.mxp-continuing-education .ce-cat-card-right{text-align:right;flex-shrink:0}
.mxp-continuing-education .ce-cat-card-hours{font-size:11px;font-weight:600;letter-spacing:1px;text-transform:uppercase;color:var(--ce-teal-mid);margin-bottom:2px}
.mxp-continuing-education .ce-cat-card-price{font-family:var(--ce-serif);font-size:17px;font-weight:700;color:var(--ce-terracotta);margin:0}
.mxp-continuing-education .ce-cat-card.aprn-only{border-left:3px solid var(--ce-terracotta)}
.mxp-continuing-education .ce-catalog-divider{height:1px;background:var(--ce-gray-line);max-width:1080px;margin:10px auto 30px}
.mxp-continuing-education .ce-catalog-empty{max-width:1080px;margin:0 auto 40px;padding:28px 24px;background:var(--ce-cream);border:1px dashed var(--ce-gray-line);border-radius:12px;text-align:center;color:var(--ce-charcoal-soft);font-size:15px}

.mxp-continuing-education .ce-faq-section{background:var(--ce-cream);padding:80px 32px}
.mxp-continuing-education .ce-faq-header{text-align:center;margin-bottom:50px}
.mxp-continuing-education .ce-faq-header h2{font-size:32px}
.mxp-continuing-education .ce-faq-list{max-width:820px;margin:0 auto;display:flex;flex-direction:column;gap:14px}
.mxp-continuing-education .ce-faq-item{background:var(--ce-white);border-radius:10px;border:1px solid var(--ce-gray-line);overflow:hidden}
.mxp-continuing-education .ce-faq-item summary{padding:22px 24px;cursor:pointer;font-family:var(--ce-serif);font-size:17px;font-weight:600;color:var(--ce-teal-darkest);list-style:none;display:flex;justify-content:space-between;align-items:center;gap:16px}
.mxp-continuing-education .ce-faq-item summary::-webkit-details-marker{display:none}
.mxp-continuing-education .ce-faq-item summary::after{content:'+';font-size:24px;color:var(--ce-terracotta);font-weight:400;flex-shrink:0}
.mxp-continuing-education .ce-faq-item[open] summary::after{content:'\2212'}
.mxp-continuing-education .ce-faq-body{padding:0 24px 22px;font-size:15px;color:var(--ce-charcoal-soft);line-height:1.7}
.mxp-continuing-education .ce-faq-body a{color:var(--ce-terracotta);font-weight:600}

.mxp-continuing-education .ce-final-cta{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 100%);color:var(--ce-white);padding:80px 32px;text-align:center;position:relative;overflow:hidden}
.mxp-continuing-education .ce-final-cta::before{content:'';position:absolute;top:-150px;left:50%;transform:translateX(-50%);width:500px;height:500px;background:radial-gradient(circle,rgba(198,93,58,.15) 0%,transparent 70%);border-radius:50%}
.mxp-continuing-education .ce-final-cta-inner{max-width:700px;margin:0 auto;position:relative;z-index:1}
.mxp-continuing-education .ce-final-cta h2{color:var(--ce-white);font-size:clamp(28px,4vw,40px);margin-bottom:16px}
.mxp-continuing-education .ce-final-cta h2 em{font-style:italic;color:var(--ce-cream)}
.mxp-continuing-education .ce-final-cta p{font-size:17px;color:var(--ce-cream-warm);margin-bottom:30px;line-height:1.6}
.mxp-continuing-education .ce-cta-btns{display:flex;gap:16px;justify-content:center;flex-wrap:wrap}
.mxp-continuing-education .ce-btn-primary{background:var(--ce-terracotta);color:var(--ce-white);padding:16px 36px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid var(--ce-terracotta)}
.mxp-continuing-education .ce-btn-primary:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);transform:translateY(-1px);color:var(--ce-white)}
.mxp-continuing-education .ce-btn-outline-white{background:transparent;color:var(--ce-white);padding:16px 36px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid rgba(245,237,224,.4)}
.mxp-continuing-education .ce-btn-outline-white:hover{background:rgba(245,237,224,.1);border-color:rgba(245,237,224,.7);color:var(--ce-white)}

@media(max-width:960px){
  .mxp-continuing-education .ce-license-grid{grid-template-columns:1fr}
  .mxp-continuing-education .ce-how-grid{grid-template-columns:repeat(2,1fr)}
  .mxp-continuing-education .ce-how-step::after{display:none}
  .mxp-continuing-education .ce-catalog-grid{grid-template-columns:1fr}
}
@media(max-width:640px){
  .mxp-continuing-education .ce-how-grid{grid-template-columns:1fr}
  .mxp-continuing-education .ce-trust-strip{flex-direction:column;gap:12px;align-items:center}
}
</style>

<div class="ce-breadcrumb">
    <div class="ce-breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>Continuing Education
    </div>
</div>

<header class="ce-hero">
    <div class="ce-hero-inner">
        <span class="ce-hero-eyebrow">Florida-Approved CE Provider</span>
        <h1>Continuing Education <em>for Florida Nurses</em></h1>
        <p class="ce-hero-sub">Complete your Florida Board of Nursing renewal requirements online. 15 courses, 4 ready-made bundles, and automatic CE Broker reporting &mdash; so you can focus on your patients, not your paperwork.</p>
        <div class="ce-trust-strip">
            <div class="ce-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>FL Board of Nursing Approved</div>
            <div class="ce-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Auto-Reported to CE Broker</div>
            <div class="ce-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Complete at Your Own Pace</div>
            <div class="ce-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Instant Certificate Download</div>
        </div>
    </div>
</header>

<section class="ce-select-section">
    <div class="ce-container">
        <div class="ce-select-header">
            <span class="ce-select-eyebrow">Start Here</span>
            <h2>Select your license type</h2>
            <p>Your renewal requirements depend on your license. Choose below and we&rsquo;ll show you exactly what you need &mdash; no guesswork, no random individual courses.</p>
        </div>

        <div class="ce-license-grid">
            <div class="ce-license-card rn-lpn" id="rn-lpn-packages">
                <div class="ce-license-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
                <h3>Florida RN &amp; LPN</h3>
                <p class="ce-license-subtitle">License Renewal Packages</p>
                <p>The Florida Board of Nursing requires RNs and LPNs to complete 26 contact hours every two years. Don&rsquo;t waste time buying random individual courses &mdash; our Board-approved bundles give you exactly what you need in a single checkout.</p>
                <ul class="ce-license-req">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>6 mandatory courses (11 contact hours)</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>15 hours of clinical electives to reach 26</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Auto-reported to CE Broker within 48&ndash;72 hours</li>
                </ul>
                <div class="ce-license-bundles">
                    <h4>Available Bundles</h4>
                    <div class="ce-bundle-row">
                        <div><p class="ce-bundle-name">Florida Mandatory Core</p><p class="ce-bundle-detail">6 courses &middot; 11 hours</p></div>
                        <span class="ce-bundle-price">$39&ndash;$49</span>
                    </div>
                    <div class="ce-bundle-row">
                        <div><p class="ce-bundle-name">Complete 26-Hour Renewal</p><p class="ce-bundle-detail">All mandatory + electives</p></div>
                        <span class="ce-bundle-price">$69&ndash;$79</span>
                    </div>
                </div>
                <a href="{{ route('continuingEducationRnLpn') }}" class="ce-btn-portal teal">View RN &amp; LPN Packages &rarr;</a>
            </div>

            <div class="ce-license-card aprn" id="aprn-packages">
                <div class="ce-license-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                <h3>Florida APRN / NP</h3>
                <p class="ce-license-subtitle">Prescribing &amp; Renewal Packages</p>
                <p>Advanced practice requires advanced compliance. Your renewal path depends on whether you hold an active national certification. We have your curriculum ready for either route &mdash; including the mandatory controlled substance prescribing update.</p>
                <ul class="ce-license-req">
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Certified-Exempt path: 5 hours total</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Standard full renewal: 27 hours total</li>
                    <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Autonomous APRNs: +10 additional hours</li>
                </ul>
                <div class="ce-license-bundles">
                    <h4>Available Bundles</h4>
                    <div class="ce-bundle-row">
                        <div><p class="ce-bundle-name">APRN Certified-Exempt</p><p class="ce-bundle-detail">2 courses &middot; 5 hours</p></div>
                        <span class="ce-bundle-price">$39&ndash;$45</span>
                    </div>
                    <div class="ce-bundle-row">
                        <div><p class="ce-bundle-name">APRN Executive Renewal</p><p class="ce-bundle-detail">All mandatory + prescribing + electives</p></div>
                        <span class="ce-bundle-price">$89&ndash;$99</span>
                    </div>
                </div>
                <a href="{{ route('continuingEducationAprn') }}" class="ce-btn-portal terra">View APRN Packages &rarr;</a>
            </div>
        </div>
    </div>
</section>

<section class="ce-how-section">
    <div class="ce-container">
        <div class="ce-how-header">
            <h2>How it works</h2>
            <p>From purchase to CE Broker &mdash; four steps, zero stress.</p>
        </div>
        <div class="ce-how-grid">
            <div class="ce-how-step">
                <div class="ce-how-num">1</div>
                <h4>Choose Your Bundle</h4>
                <p>Select the package that matches your license type and renewal cycle.</p>
            </div>
            <div class="ce-how-step">
                <div class="ce-how-num">2</div>
                <h4>Complete Online</h4>
                <p>Study at your own pace from any device. No deadlines, no live sessions required.</p>
            </div>
            <div class="ce-how-step">
                <div class="ce-how-num">3</div>
                <h4>Pass &amp; Download</h4>
                <p>Pass the course assessment and instantly download your completion certificate.</p>
            </div>
            <div class="ce-how-step">
                <div class="ce-how-num">4</div>
                <h4>We Report to CE Broker</h4>
                <p>Your hours are automatically reported to CE Broker within 48&ndash;72 business hours.</p>
            </div>
        </div>
    </div>
</section>

<section class="ce-catalog-section" id="ce-catalog">
    <div class="ce-container">
        <div class="ce-catalog-header">
            <h2>Full Course Catalog</h2>
            <p>
                @if (($catalogCourseCount ?? 0) > 0)
                    {{ $catalogCourseCount }} Florida Board of Nursing approved {{ Str::plural('course', $catalogCourseCount) }}.
                @else
                    Florida Board of Nursing approved courses
                @endif
                Buy individually or save with a bundle.
            </p>
        </div>

        <p class="ce-catalog-label">Mandatory Courses</p>
        @if (($mandatoryCourses ?? collect())->isNotEmpty())
            <div class="ce-catalog-grid">
                @foreach ($mandatoryCourses as $course)
                    @include(theme('components.ce._catalog-card'), compact('course'))
                @endforeach
            </div>
        @else
            <p class="ce-catalog-empty">No mandatory courses are published yet.</p>
        @endif

        <div class="ce-catalog-divider"></div>

        <p class="ce-catalog-label">Elective Courses</p>
        @if (($electiveCourses ?? collect())->isNotEmpty())
            <div class="ce-catalog-grid">
                @foreach ($electiveCourses as $course)
                    @include(theme('components.ce._catalog-card'), compact('course'))
                @endforeach
            </div>
        @else
            <p class="ce-catalog-empty">No elective courses are published yet.</p>
        @endif
    </div>
</section>

<section class="ce-faq-section">
    <div class="ce-container">
        <div class="ce-faq-header"><h2>Frequently Asked Questions</h2></div>
        <div class="ce-faq-list">
            <details class="ce-faq-item"><summary>How many CEU hours do I need to renew my Florida nursing license?</summary><div class="ce-faq-body">RNs and LPNs need 26 contact hours every two years. This includes 6 mandatory courses (11 hours) plus 15 hours of electives. APRNs who are nationally certified may qualify for the 5-hour exempt path. Non-exempt APRNs need 27 hours, and autonomous APRNs need an additional 10 hours beyond that.</div></details>
            <details class="ce-faq-item"><summary>Are your courses approved by the Florida Board of Nursing?</summary><div class="ce-faq-body">Yes. Merkaii Xcellence Prep is an approved continuing education provider by the Florida Board of Nursing. Each course carries a FL BON approval number that will appear on your completion certificate.</div></details>
            <details class="ce-faq-item"><summary>How does the CE Broker reporting work?</summary><div class="ce-faq-body">When you complete a course and pass the assessment, your hours are automatically reported to CE Broker within 48&ndash;72 business hours. You don&rsquo;t need to do anything &mdash; it appears on your CE Broker transcript automatically. You can also download your certificate immediately for your own records.</div></details>
            <details class="ce-faq-item"><summary>Do I need to complete all mandatory courses every renewal?</summary><div class="ce-faq-body">Medical Errors, Laws &amp; Rules, and Human Trafficking are required every renewal cycle. Recognizing Impairment is required every other cycle. Domestic Violence is required every third cycle. HIV/AIDS is required for first-time renewals. Our Mandatory Core bundle includes all of them so you&rsquo;re covered regardless of which cycle you&rsquo;re in.</div></details>
            <details class="ce-faq-item"><summary>What is the APRN Certified-Exempt path?</summary><div class="ce-faq-body">If you hold an active national certification (ANCC, AANP, etc.), the Florida Board of Nursing allows a CE exemption. You only need to complete Safe &amp; Effective Prescribing of Controlled Substances (3 hours) and Human Trafficking (2 hours) &mdash; 5 hours total. This exemption does not apply to those specific statutory requirements.</div></details>
            <details class="ce-faq-item"><summary>Can I buy individual courses instead of a bundle?</summary><div class="ce-faq-body">Absolutely. Every course is available individually. However, the bundles save you significantly &mdash; the Mandatory Core bundle saves roughly $60&ndash;$70 compared to buying all 6 courses separately, and the Complete 26-Hour Renewal saves over $100.</div></details>
            <details class="ce-faq-item"><summary>How long do I have to complete a course?</summary><div class="ce-faq-body">There is no time limit. Once purchased, you can start and complete a course at your own pace from any device. Most nurses complete individual courses in one sitting.</div></details>
            <details class="ce-faq-item"><summary>Is this the same company that does NCLEX prep and remediation?</summary><div class="ce-faq-body">Yes. Merkaii Xcellence Prep has been providing nursing test prep, coaching, and Florida Board of Nursing approved remediation since 2019. Continuing education is our newest offering &mdash; built with the same standards and care as everything else we do.</div></details>
        </div>
    </div>
</section>

<section class="ce-final-cta">
    <div class="ce-final-cta-inner">
        <h2>Renew your license <em>without the stress.</em></h2>
        <p>Complete your Florida CEU requirements online, at your own pace, from any device. Your hours are auto-reported to CE Broker &mdash; one less thing on your plate.</p>
        <div class="ce-cta-btns">
            <a href="{{ route('continuingEducationRnLpn') }}" class="ce-btn-primary">RN &amp; LPN Packages &rarr;</a>
            <a href="{{ route('continuingEducationAprn') }}" class="ce-btn-outline-white">APRN Packages &rarr;</a>
        </div>
    </div>
</section>

</div>
