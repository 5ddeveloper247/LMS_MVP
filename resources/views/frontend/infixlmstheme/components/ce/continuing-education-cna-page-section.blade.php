<div id="mxp-ce-cna" class="mxp-ce-cna">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
.mxp-ce-cna{
  --ce-teal-mid:#1A8A6F;--ce-teal-deep:#0F6E56;--ce-teal-darkest:#0A4D3C;
  --ce-terracotta:#C65D3A;--ce-terracotta-deep:#A84B2D;
  --ce-cream:#F5EDE0;--ce-cream-warm:#EFE3D0;
  --ce-charcoal:#2B2B2B;--ce-charcoal-soft:#4A4A4A;
  --ce-white:#FFFFFF;--ce-gray-line:#E8DFD0;--ce-green:#2D9B4E;
  --ce-serif:'Playfair Display',Georgia,serif;
  --ce-sans:'Montserrat',system-ui,sans-serif;
  --ce-shadow-sm:0 2px 8px rgba(10,77,60,.06);
  --ce-shadow-md:0 8px 24px rgba(10,77,60,.10);
  --ce-shadow-lg:0 20px 50px rgba(10,77,60,.15);
  font-family:var(--ce-sans);color:var(--ce-charcoal);background:var(--ce-cream);line-height:1.6;-webkit-font-smoothing:antialiased;
}
.mxp-ce-cna *{box-sizing:border-box}
.mxp-ce-cna h1,.mxp-ce-cna h2,.mxp-ce-cna h3,.mxp-ce-cna h4{
  font-family:var(--ce-serif);font-weight:700;line-height:1.2;color:var(--ce-teal-darkest);
}
.mxp-ce-cna .ce-container{max-width:1240px;margin:0 auto;padding:0 24px}

.mxp-ce-cna .ce-breadcrumb{background:var(--ce-cream-warm);padding:14px 32px;border-bottom:1px solid var(--ce-gray-line)}
.mxp-ce-cna .ce-breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-ce-cna .ce-breadcrumb-inner a{color:var(--ce-teal-mid);text-decoration:none;font-weight:500}
.mxp-ce-cna .ce-breadcrumb-inner a:hover{color:var(--ce-terracotta)}
.mxp-ce-cna .ce-breadcrumb-inner span{margin:0 8px;opacity:.5}

.mxp-ce-cna .ce-hero{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 60%,var(--ce-teal-mid) 100%);color:var(--ce-white);padding:80px 32px 0;position:relative;overflow:hidden}
.mxp-ce-cna .ce-hero::before{content:'';position:absolute;top:-150px;right:-100px;width:500px;height:500px;background:radial-gradient(circle,rgba(198,93,58,.2) 0%,transparent 70%);border-radius:50%;pointer-events:none}
.mxp-ce-cna .ce-hero::after{content:'';position:absolute;bottom:-200px;left:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(245,237,224,.06) 0%,transparent 70%);border-radius:50%;pointer-events:none}
.mxp-ce-cna .ce-hero-inner{max-width:1120px;margin:0 auto;position:relative;z-index:1}
.mxp-ce-cna .ce-hero-top{display:grid;grid-template-columns:1fr 380px;gap:50px;align-items:center;padding-bottom:60px}
.mxp-ce-cna .ce-hero-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:600;letter-spacing:2.5px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:22px;padding:6px 16px;border:1px solid var(--ce-terracotta);border-radius:30px}
.mxp-ce-cna .ce-hero-eyebrow svg{width:14px;height:14px}
.mxp-ce-cna .ce-hero h1{font-size:clamp(36px,5vw,52px);color:var(--ce-white)!important;margin:0 0 18px;letter-spacing:-.5px;line-height:1.15}
.mxp-ce-cna .ce-hero h1 em{font-style:italic;color:var(--ce-cream);font-weight:400}
.mxp-ce-cna .ce-hero-sub{font-size:17px;line-height:1.7;color:var(--ce-cream-warm);margin:0 0 28px;max-width:560px}
.mxp-ce-cna .ce-hero-trust{display:flex;gap:20px;flex-wrap:wrap}
.mxp-ce-cna .ce-hero-trust-item{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--ce-cream);font-weight:500}
.mxp-ce-cna .ce-hero-trust-item svg{width:16px;height:16px;color:var(--ce-terracotta);flex-shrink:0}

.mxp-ce-cna .ce-hero-buy{
  background:var(--ce-white)!important;border-radius:20px;padding:36px 32px;
  box-shadow:0 20px 60px rgba(0,0,0,.25);color:var(--ce-charcoal)!important;
}
.mxp-ce-cna .ce-hero-buy p{margin:0!important;padding:0!important}
.mxp-ce-cna .ce-hero-buy-label{font-family:var(--ce-sans)!important;font-size:11px!important;font-weight:700!important;letter-spacing:2px;text-transform:uppercase;color:var(--ce-teal-mid)!important;margin-bottom:6px!important}
.mxp-ce-cna .ce-hero-buy-price{font-family:var(--ce-serif)!important;font-size:44px!important;font-weight:700!important;color:var(--ce-terracotta)!important;line-height:1.05;margin-bottom:2px!important}
.mxp-ce-cna .ce-hero-buy-name{font-family:var(--ce-serif)!important;font-size:17px!important;font-weight:600!important;color:var(--ce-teal-darkest)!important;margin-bottom:4px!important;line-height:1.3}
.mxp-ce-cna .ce-hero-buy-desc{font-family:var(--ce-sans)!important;font-size:13px!important;color:var(--ce-charcoal-soft)!important;margin-bottom:20px!important;line-height:1.5!important}
.mxp-ce-cna .ce-hero-buy a.ce-btn-hero-buy{
  display:block!important;width:100%!important;text-align:center!important;background:var(--ce-terracotta)!important;color:var(--ce-white)!important;
  padding:15px!important;border-radius:8px!important;text-decoration:none!important;font-family:var(--ce-sans)!important;
  font-size:15px!important;font-weight:600!important;border:2px solid var(--ce-terracotta)!important;transition:all .2s;
  margin:0 0 10px!important;cursor:pointer;line-height:1.2!important;box-sizing:border-box!important;
}
.mxp-ce-cna .ce-hero-buy a.ce-btn-hero-buy:hover{background:var(--ce-terracotta-deep)!important;border-color:var(--ce-terracotta-deep)!important;color:var(--ce-white)!important}
.mxp-ce-cna .ce-hero-buy a.ce-btn-hero-alt{
  display:block!important;width:100%!important;text-align:center!important;background:transparent!important;color:var(--ce-teal-darkest)!important;
  padding:12px!important;border-radius:8px!important;text-decoration:none!important;font-family:var(--ce-sans)!important;
  font-size:13px!important;font-weight:600!important;border:1.5px solid var(--ce-gray-line)!important;transition:all .2s;
  cursor:pointer;line-height:1.2!important;box-sizing:border-box!important;margin:0!important;
}
.mxp-ce-cna .ce-hero-buy a.ce-btn-hero-alt:hover{border-color:var(--ce-teal-mid)!important;color:var(--ce-teal-mid)!important}
.mxp-ce-cna .ce-hero-buy-save{text-align:center;font-family:var(--ce-sans)!important;font-size:11px!important;color:var(--ce-green)!important;font-weight:600!important;margin-top:10px!important}

.mxp-ce-cna .ce-req-strip{background:rgba(0,0,0,.2);padding:20px 0;margin-top:0;position:relative;z-index:1}
.mxp-ce-cna .ce-req-strip-inner{max-width:1120px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);gap:20px;text-align:center}
.mxp-ce-cna .ce-req-strip-item{padding:0 20px}
.mxp-ce-cna .ce-req-strip-num{font-family:var(--ce-serif);font-size:28px;font-weight:700;color:var(--ce-white);line-height:1;margin:0!important}
.mxp-ce-cna .ce-req-strip-label{font-size:11px;color:rgba(245,237,224,.6);text-transform:uppercase;letter-spacing:1px;margin-top:4px;margin-bottom:0!important}

.mxp-ce-cna .ce-mandatory-section{background:var(--ce-white);padding:80px 32px}
.mxp-ce-cna .ce-section-header{text-align:center;max-width:720px;margin:0 auto 50px}
.mxp-ce-cna .ce-section-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:16px}
.mxp-ce-cna .ce-section-header h2{font-size:clamp(28px,3.5vw,40px);margin-bottom:14px}
.mxp-ce-cna .ce-section-header p{font-size:16px;color:var(--ce-charcoal-soft);line-height:1.6;margin:0}

.mxp-ce-cna .ce-mand-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;max-width:1120px;margin:0 auto}
.mxp-ce-cna .ce-mand-card{background:var(--ce-cream);border-radius:16px;padding:0;overflow:hidden;border:1px solid var(--ce-gray-line);display:flex;flex-direction:column;transition:all .2s}
.mxp-ce-cna .ce-mand-card:hover{transform:translateY(-3px);box-shadow:var(--ce-shadow-md)}
.mxp-ce-cna .ce-mand-card-top{background:var(--ce-teal-darkest);padding:18px 22px;display:flex;align-items:center;justify-content:space-between}
.mxp-ce-cna .ce-mand-card-hours{font-family:var(--ce-serif);font-size:22px;font-weight:700;color:var(--ce-white)}
.mxp-ce-cna .ce-mand-card-hours small{font-size:11px;font-weight:400;color:rgba(245,237,224,.6);display:block;text-transform:uppercase;letter-spacing:1px}
.mxp-ce-cna .ce-mand-card-price{font-family:var(--ce-serif);font-size:20px;font-weight:700;color:var(--ce-terracotta)}
.mxp-ce-cna .ce-mand-card-body{padding:22px;flex:1;display:flex;flex-direction:column}
.mxp-ce-cna .ce-mand-card-body h3{font-size:17px;margin-bottom:8px;color:var(--ce-teal-darkest)}
.mxp-ce-cna .ce-mand-card-body p{font-size:13px;color:var(--ce-charcoal-soft);line-height:1.6;flex:1;margin-bottom:12px}
.mxp-ce-cna .ce-mand-card-cycle{display:inline-flex;align-items:center;gap:5px;font-size:11px;color:var(--ce-terracotta);font-weight:600;font-style:italic}
.mxp-ce-cna .ce-mand-card-cycle svg{width:12px;height:12px}
.mxp-ce-cna .ce-mand-card-btn{display:block;text-align:center;padding:10px;background:var(--ce-white);border-top:1px solid var(--ce-gray-line);color:var(--ce-teal-darkest);font-size:13px;font-weight:600;text-decoration:none;transition:all .2s}
.mxp-ce-cna .ce-mand-card-btn:hover{background:var(--ce-teal-darkest);color:var(--ce-white)}

.mxp-ce-cna .ce-bundles-section{background:var(--ce-cream);padding:80px 32px}
.mxp-ce-cna .ce-bundle-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;max-width:1040px;margin:0 auto}
.mxp-ce-cna .ce-bundle-empty-note{grid-column:1/-1;text-align:center;color:var(--ce-charcoal-soft);font-size:15px;line-height:1.6;padding:24px 12px;margin:0}
.mxp-ce-cna .ce-bundle-card{border-radius:20px;padding:44px 36px;position:relative;display:flex;flex-direction:column;transition:all .2s}
.mxp-ce-cna .ce-bundle-card:hover{transform:translateY(-3px)}
.mxp-ce-cna .ce-bundle-card.primary{background:var(--ce-teal-darkest);color:var(--ce-white);border:2px solid var(--ce-teal-darkest);box-shadow:var(--ce-shadow-lg)}
.mxp-ce-cna .ce-bundle-card.secondary{background:var(--ce-white);color:var(--ce-charcoal);border:2px solid var(--ce-gray-line)}
.mxp-ce-cna .ce-bundle-badge{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--ce-terracotta);color:var(--ce-white);font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:5px 18px;border-radius:30px;white-space:nowrap}
.mxp-ce-cna .ce-bundle-card h3{font-size:26px;margin-bottom:4px}
.mxp-ce-cna .ce-bundle-card.primary h3{color:var(--ce-white)}
.mxp-ce-cna .ce-bundle-subtitle{font-size:14px;margin-bottom:20px;opacity:.75}
.mxp-ce-cna .ce-bundle-price-row{display:flex;align-items:baseline;gap:8px;margin-bottom:4px}
.mxp-ce-cna .ce-bundle-price{font-family:var(--ce-serif);font-size:48px;font-weight:700}
.mxp-ce-cna .ce-bundle-card.primary .ce-bundle-price{color:var(--ce-cream)}
.mxp-ce-cna .ce-bundle-card.secondary .ce-bundle-price{color:var(--ce-terracotta)}
.mxp-ce-cna .ce-bundle-price-compare{font-size:16px;text-decoration:line-through;opacity:.4}
.mxp-ce-cna .ce-bundle-price-note{font-size:12px;margin-bottom:24px;opacity:.6}
.mxp-ce-cna .ce-bundle-divider{height:1px;margin:0 0 20px;opacity:.15}
.mxp-ce-cna .ce-bundle-card.primary .ce-bundle-divider{background:var(--ce-cream)}
.mxp-ce-cna .ce-bundle-card.secondary .ce-bundle-divider{background:var(--ce-charcoal)}
.mxp-ce-cna .ce-bundle-features{list-style:none;flex:1;margin-bottom:28px;padding:0}
.mxp-ce-cna .ce-bundle-features li{padding:7px 0;font-size:14px;display:flex;align-items:flex-start;gap:10px;line-height:1.5}
.mxp-ce-cna .ce-bundle-features li svg{width:16px;height:16px;flex-shrink:0;margin-top:2px}
.mxp-ce-cna .ce-bundle-card.primary .ce-bundle-features li svg{color:var(--ce-terracotta)}
.mxp-ce-cna .ce-bundle-card.secondary .ce-bundle-features li svg{color:var(--ce-teal-mid)}
.mxp-ce-cna .ce-bundle-card.primary .ce-bundle-features li{color:rgba(245,237,224,.85)}
.mxp-ce-cna .ce-bundle-card.secondary .ce-bundle-features li{color:var(--ce-charcoal-soft)}
.mxp-ce-cna .ce-btn-bundle{display:block;width:100%;text-align:center;padding:16px;border-radius:8px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;cursor:pointer}
.mxp-ce-cna .ce-btn-bundle.white{background:var(--ce-white);color:var(--ce-teal-darkest);border:2px solid var(--ce-white)}
.mxp-ce-cna .ce-btn-bundle.white:hover{background:var(--ce-cream);color:var(--ce-teal-darkest)}
.mxp-ce-cna .ce-btn-bundle.terra{background:var(--ce-terracotta);color:var(--ce-white);border:2px solid var(--ce-terracotta)}
.mxp-ce-cna .ce-btn-bundle.terra:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);color:var(--ce-white)}
.mxp-ce-cna .ce-bundle-savings{text-align:center;font-size:12px;margin-top:12px;font-weight:600;color:var(--ce-green)}

.mxp-ce-cna .ce-electives-section{background:var(--ce-white);padding:80px 32px}
.mxp-ce-cna .ce-elective-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;max-width:1040px;margin:0 auto}
.mxp-ce-cna .ce-el-card{background:var(--ce-cream);border-radius:14px;padding:24px 26px;border:1px solid var(--ce-gray-line);display:grid;grid-template-columns:1fr auto;gap:20px;align-items:center;transition:all .2s;color:inherit;text-decoration:none}
.mxp-ce-cna .ce-el-card:hover{box-shadow:var(--ce-shadow-sm);border-color:var(--ce-teal-mid);transform:translateY(-2px)}
.mxp-ce-cna .ce-el-card-main{text-decoration:none;color:inherit;display:block}
.mxp-ce-cna .ce-el-card h4{font-family:var(--ce-sans);font-size:15px;font-weight:600;color:var(--ce-teal-darkest);margin-bottom:4px}
.mxp-ce-cna .ce-el-card p{font-size:12px;color:var(--ce-charcoal-soft);line-height:1.5;margin:0 0 8px}
.mxp-ce-cna .ce-el-meta{display:flex;gap:12px;align-items:center}
.mxp-ce-cna .ce-el-hours{font-size:10px;font-weight:600;letter-spacing:1px;text-transform:uppercase;color:var(--ce-teal-mid);background:rgba(26,138,111,.08);padding:3px 10px;border-radius:20px}
.mxp-ce-cna .ce-el-right{text-align:center;flex-shrink:0;min-width:80px}
.mxp-ce-cna .ce-el-price{font-family:var(--ce-serif);font-size:20px;font-weight:700;color:var(--ce-terracotta);margin-bottom:8px}
.mxp-ce-cna .ce-el-add{display:block;padding:8px 16px;background:var(--ce-teal-darkest);color:var(--ce-white);border-radius:6px;font-size:11px;font-weight:600;text-decoration:none;transition:all .2s;cursor:pointer;border:none;font-family:var(--ce-sans)}
.mxp-ce-cna .ce-el-add:hover{background:var(--ce-teal-deep);color:var(--ce-white)}

.mxp-ce-cna .ce-how-section{background:var(--ce-cream);padding:80px 32px}
.mxp-ce-cna .ce-how-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;max-width:1040px;margin:0 auto}
.mxp-ce-cna .ce-how-step{text-align:center;position:relative}
.mxp-ce-cna .ce-how-step::after{content:'\2192';position:absolute;top:24px;right:-18px;font-size:22px;color:var(--ce-gray-line)}
.mxp-ce-cna .ce-how-step:last-child::after{display:none}
.mxp-ce-cna .ce-how-num{width:52px;height:52px;border-radius:50%;background:var(--ce-teal-darkest);color:var(--ce-white);font-family:var(--ce-serif);font-size:20px;font-weight:700;display:flex;align-items:center;justify-content:center;margin:0 auto 14px}
.mxp-ce-cna .ce-how-step h4{font-size:15px;margin-bottom:6px}
.mxp-ce-cna .ce-how-step p{font-size:12px;color:var(--ce-charcoal-soft);line-height:1.5;margin:0}

.mxp-ce-cna .ce-faq-section{background:var(--ce-white);padding:80px 32px}
.mxp-ce-cna .ce-faq-header{text-align:center;margin-bottom:50px}
.mxp-ce-cna .ce-faq-header h2{font-size:32px}
.mxp-ce-cna .ce-faq-list{max-width:820px;margin:0 auto;display:flex;flex-direction:column;gap:14px}
.mxp-ce-cna .ce-faq-item{background:var(--ce-cream);border-radius:12px;border:1px solid var(--ce-gray-line);overflow:hidden;transition:box-shadow .2s}
.mxp-ce-cna .ce-faq-item:hover{box-shadow:var(--ce-shadow-sm)}
.mxp-ce-cna .ce-faq-item summary{padding:22px 26px;cursor:pointer;font-family:var(--ce-serif);font-size:17px;font-weight:600;color:var(--ce-teal-darkest);list-style:none;display:flex;justify-content:space-between;align-items:center;gap:16px}
.mxp-ce-cna .ce-faq-item summary::-webkit-details-marker{display:none}
.mxp-ce-cna .ce-faq-item summary::after{content:'+';font-size:24px;color:var(--ce-terracotta);font-weight:400;flex-shrink:0}
.mxp-ce-cna .ce-faq-item[open] summary::after{content:'\2212'}
.mxp-ce-cna .ce-faq-body{padding:0 26px 22px;font-size:15px;color:var(--ce-charcoal-soft);line-height:1.7}
.mxp-ce-cna .ce-faq-body a{color:var(--ce-terracotta);font-weight:600}

.mxp-ce-cna .ce-final-cta{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 100%);color:var(--ce-white);padding:80px 32px;text-align:center;position:relative;overflow:hidden}
.mxp-ce-cna .ce-final-cta::before{content:'';position:absolute;top:-150px;left:50%;transform:translateX(-50%);width:500px;height:500px;background:radial-gradient(circle,rgba(198,93,58,.15) 0%,transparent 70%);border-radius:50%}
.mxp-ce-cna .ce-final-cta-inner{max-width:700px;margin:0 auto;position:relative;z-index:1}
.mxp-ce-cna .ce-final-cta h2{color:var(--ce-white);font-size:clamp(28px,4vw,40px);margin-bottom:16px}
.mxp-ce-cna .ce-final-cta h2 em{font-style:italic;color:var(--ce-cream)}
.mxp-ce-cna .ce-final-cta p{font-size:17px;color:var(--ce-cream-warm);margin-bottom:30px;line-height:1.6}
.mxp-ce-cna .ce-btn-primary{background:var(--ce-terracotta);color:var(--ce-white);padding:16px 36px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid var(--ce-terracotta)}
.mxp-ce-cna .ce-btn-primary:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);transform:translateY(-1px);color:var(--ce-white)}

@media(max-width:960px){
  .mxp-ce-cna .ce-hero-top{grid-template-columns:1fr;padding-bottom:40px}
  .mxp-ce-cna .ce-hero-buy{max-width:400px;margin:0 auto}
  .mxp-ce-cna .ce-req-strip-inner{grid-template-columns:repeat(3,1fr);gap:12px}
  .mxp-ce-cna .ce-mand-grid{grid-template-columns:1fr}
  .mxp-ce-cna .ce-bundle-grid{grid-template-columns:1fr}
  .mxp-ce-cna .ce-elective-grid{grid-template-columns:1fr}
  .mxp-ce-cna .ce-how-grid{grid-template-columns:repeat(2,1fr)}
  .mxp-ce-cna .ce-how-step::after{display:none}
}
@media(max-width:640px){
  .mxp-ce-cna .ce-hero-trust{flex-direction:column;gap:8px}
  .mxp-ce-cna .ce-req-strip-inner{grid-template-columns:1fr}
  .mxp-ce-cna .ce-how-grid{grid-template-columns:1fr}
}
</style>

<div class="ce-breadcrumb">
    <div class="ce-breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>
        <a href="{{ route('continuingEducation') }}">Continuing Education</a><span>&rsaquo;</span>
        CNA Renewal
    </div>
</div>

@php
    /** @var \Modules\ContinuingEducation\Entities\CeLicenseType|null $license */
    /** @var \Modules\ContinuingEducation\Entities\CeBundle|null $featuredBundle */
    $licenseEyebrow = config('continuingeducation.bundle_license_types.cna', 'CNA') . ' Renewal';
    $licenseTitle = $license?->name ?? 'Florida CNA License Renewal';
    $licenseDescription = $license?->description ?? '';
    $licenseComponents = array_values(array_filter([
        $license?->component_1,
        $license?->component_2,
        $license?->component_3,
    ]));
    $bundleCount = ($bundles ?? collect())->count();
@endphp

<header class="ce-hero">
    <div class="ce-hero-inner">
        <div class="ce-hero-top">
            <div>
                <span class="ce-hero-eyebrow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    {{ $licenseEyebrow }}
                </span>
                <h1>{{ $licenseTitle }}</h1>
                @if ($licenseDescription)
                    <p class="ce-hero-sub">{{ $licenseDescription }}</p>
                @endif
                @if (! empty($licenseComponents))
                    <div class="ce-hero-trust">
                        @foreach ($licenseComponents as $component)
                            <span class="ce-hero-trust-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                {{ $component }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
            @if ($featuredBundle)
                <aside class="ce-hero-buy" aria-label="Featured renewal package">
                    @if ($featuredBundle->is_best_seller)
                        <p class="ce-hero-buy-label">Most Popular</p>
                    @endif
                    <p class="ce-hero-buy-price">{{ $featuredBundle->formatted_price }}</p>
                    <p class="ce-hero-buy-name">{{ $featuredBundle->name }}</p>
                    @if ($featuredBundle->subtitle)
                        <p class="ce-hero-buy-desc">{{ $featuredBundle->subtitle }}</p>
                    @elseif ($featuredBundle->price_note)
                        <p class="ce-hero-buy-desc">{!! strip_tags($featuredBundle->price_note) !!}</p>
                    @endif
                    <a href="{{ $featuredBundle->buy_url }}" class="ce-btn-hero-buy">{!! $featuredBundle->buy_button_label !!}</a>
                    @if ($bundleCount > 1)
                        <a href="#bundles" class="ce-btn-hero-alt">Compare Both Bundles</a>
                    @endif
                    @if ($featuredBundle->savings_text)
                        <p class="ce-hero-buy-save">{{ $featuredBundle->savings_text }}</p>
                    @endif
                </aside>
            @endif
        </div>
    </div>
    @if ($hourSummary)
        <div class="ce-req-strip">
            <div class="ce-req-strip-inner">
                <div class="ce-req-strip-item">
                    <p class="ce-req-strip-num">{{ $hourSummary['total'] }}</p>
                    <p class="ce-req-strip-label">Total Hours Required</p>
                </div>
                <div class="ce-req-strip-item">
                    <p class="ce-req-strip-num">{{ $hourSummary['mandatory'] }}</p>
                    <p class="ce-req-strip-label">Mandatory Hours</p>
                </div>
                <div class="ce-req-strip-item">
                    <p class="ce-req-strip-num">{{ $hourSummary['elective'] }}</p>
                    <p class="ce-req-strip-label">Elective Hours</p>
                </div>
            </div>
        </div>
    @endif
</header>

@php
    $mandatoryStats = $mandatoryCourseStats ?? ['count' => 0, 'hours' => '0'];
@endphp

<section class="ce-mandatory-section">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Required for CNA Renewal</span>
            @if ($mandatoryStats['count'] > 0)
                <h2>{{ $mandatoryStats['count'] }} Mandatory Courses &middot; {{ $mandatoryStats['hours'] }} Hours</h2>
            @else
                <h2>Mandatory Courses</h2>
            @endif
            <p>These courses support Florida CNA license renewal requirements. Our CNA bundles package the required hours so you can renew in one checkout.</p>
        </div>
        <div class="ce-mand-grid">
            @forelse ($mandatoryCourses ?? [] as $course)
                @include(theme('components.ce._rn-mandatory-course-card'), [
                    'course' => $course,
                    'ceCatalog' => $ceCatalog,
                ])
            @empty
                <p class="ce-bundle-empty-note">Mandatory courses are being updated. Please check back soon.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="ce-bundles-section" id="bundles">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Save with Bundles</span>
            <h2>CNA Renewal Bundles</h2>
            <p>Skip the hassle of buying courses one by one. Choose the CNA bundle that fits your renewal needs and save.</p>
        </div>
        <div class="ce-bundle-grid">
            @forelse ($bundles ?? [] as $bundle)
                @include(theme('components.ce._bundle-card'), ['bundle' => $bundle])
            @empty
                <p class="ce-bundle-empty-note">CNA renewal bundles are being updated. Please check back soon or browse individual courses below.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="ce-electives-section">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Fill Your Remaining Hours</span>
            <h2>Elective Courses for CNAs</h2>
            <p>
                Need specific electives? Each course is available individually
                @if ($featuredBundle ?? null)
                    , or included in the {{ $featuredBundle->name }} bundle.
                @else
                    , or included in a CNA renewal bundle.
                @endif
            </p>
        </div>
        <div class="ce-elective-grid">
            @forelse ($electiveCourses ?? [] as $course)
                @include(theme('components.ce._rn-elective-course-card'), [
                    'course' => $course,
                    'ceCatalog' => $ceCatalog,
                ])
            @empty
                <p class="ce-bundle-empty-note">Elective courses are being updated. Please check back soon.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="ce-how-section">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Simple Process</span>
            <h2>How it works</h2>
        </div>
        <div class="ce-how-grid">
            <div class="ce-how-step"><div class="ce-how-num">1</div><h4>Choose Your Bundle</h4><p>Pick a CNA renewal package, or build your own from individual courses.</p></div>
            <div class="ce-how-step"><div class="ce-how-num">2</div><h4>Complete Online</h4><p>Self-paced from any device. No deadlines, no live sessions required.</p></div>
            <div class="ce-how-step"><div class="ce-how-num">3</div><h4>Pass &amp; Download</h4><p>Pass the assessment, instantly download your completion certificate.</p></div>
            <div class="ce-how-step"><div class="ce-how-num">4</div><h4>We Report to CE Broker</h4><p>Hours auto-reported within 48&ndash;72 business hours. Nothing for you to do.</p></div>
        </div>
    </div>
</section>

<section class="ce-faq-section">
    <div class="ce-container">
        <div class="ce-faq-header"><h2>CNA Renewal FAQ</h2></div>
        <div class="ce-faq-list">
            <details class="ce-faq-item"><summary>Are these courses designed for CNAs?</summary><div class="ce-faq-body">Yes. Courses and bundles on this page are filtered for the CNA licence category so you only see what applies to your renewal path.</div></details>
            <details class="ce-faq-item"><summary>Can I buy individual courses instead of a bundle?</summary><div class="ce-faq-body">Absolutely. Browse mandatory and elective courses below, or start with a CNA bundle if you want everything in one checkout.</div></details>
            <details class="ce-faq-item"><summary>When will my hours show up in CE Broker?</summary><div class="ce-faq-body">Within 48&ndash;72 business hours of completing your course assessment. You&rsquo;ll also receive an instant certificate download for your personal records.</div></details>
            <details class="ce-faq-item"><summary>Can I take courses on my phone?</summary><div class="ce-faq-body">Yes. All courses are optimized for desktop, tablet, and mobile. Study wherever and whenever works for you.</div></details>
            <details class="ce-faq-item"><summary>I&rsquo;m an RN, LPN, or APRN. Should I be on this page?</summary><div class="ce-faq-body">If you hold an RN or LPN license, visit the <a href="{{ route('continuingEducationRnLpn') }}">RN &amp; LPN Renewal Portal</a>. APRNs should use the <a href="{{ route('continuingEducationAprn') }}">APRN Renewal Portal</a>.</div></details>
        </div>
    </div>
</section>

<section class="ce-final-cta">
    <div class="ce-final-cta-inner">
        <h2>Renew your CNA license <em>in a single checkout.</em></h2>
        <p>
            Get the hours you need in one place, auto-reported to CE Broker.
            @if ($featuredBundle ?? null)
                Start with the {{ $featuredBundle->name }} package.
            @endif
        </p>
        @if ($featuredBundle ?? null)
            <a href="{{ $featuredBundle->buy_url }}" class="ce-btn-primary">{!! $featuredBundle->buy_button_label !!}</a>
        @else
            <a href="#bundles" class="ce-btn-primary">View CNA Bundles &rarr;</a>
        @endif
    </div>
</section>

</div>
