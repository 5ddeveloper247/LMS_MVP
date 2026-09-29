<div id="mxp-ce-aprn" class="mxp-ce-aprn">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
.mxp-ce-aprn{
  --ce-teal-mid:#1A8A6F;--ce-teal-deep:#0F6E56;--ce-teal-darkest:#0A4D3C;
  --ce-terracotta:#C65D3A;--ce-terracotta-deep:#A84B2D;
  --ce-cream:#F5EDE0;--ce-cream-warm:#EFE3D0;
  --ce-charcoal:#2B2B2B;--ce-charcoal-soft:#4A4A4A;
  --ce-white:#FFFFFF;--ce-gray-line:#E8DFD0;
  --ce-serif:'Playfair Display',Georgia,serif;
  --ce-sans:'Montserrat',system-ui,sans-serif;
  --ce-shadow-sm:0 2px 8px rgba(10,77,60,.06);
  --ce-shadow-md:0 8px 24px rgba(10,77,60,.10);
  font-family:var(--ce-sans);color:var(--ce-charcoal);background:var(--ce-cream);line-height:1.6;-webkit-font-smoothing:antialiased;
}
.mxp-ce-aprn *{box-sizing:border-box}
.mxp-ce-aprn h1,.mxp-ce-aprn h2,.mxp-ce-aprn h3,.mxp-ce-aprn h4{
  font-family:var(--ce-serif);font-weight:700;line-height:1.2;color:var(--ce-teal-darkest);
}
.mxp-ce-aprn .ce-container{max-width:1240px;margin:0 auto;padding:0 24px}

.mxp-ce-aprn .ce-breadcrumb{background:var(--ce-cream-warm);padding:14px 32px;border-bottom:1px solid var(--ce-gray-line)}
.mxp-ce-aprn .ce-breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-ce-aprn .ce-breadcrumb-inner a{color:var(--ce-teal-mid);text-decoration:none;font-weight:500}
.mxp-ce-aprn .ce-breadcrumb-inner a:hover{color:var(--ce-terracotta)}
.mxp-ce-aprn .ce-breadcrumb-inner span{margin:0 8px;opacity:.5}

.mxp-ce-aprn .ce-hero{background:linear-gradient(135deg,#3D1F0E 0%,var(--ce-terracotta-deep) 50%,var(--ce-terracotta) 100%);color:var(--ce-white);padding:80px 32px 90px;position:relative;overflow:hidden;text-align:center}
.mxp-ce-aprn .ce-hero::before{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(26,138,111,.2) 0%,transparent 70%);border-radius:50%;pointer-events:none}
.mxp-ce-aprn .ce-hero-inner{max-width:900px;margin:0 auto;position:relative;z-index:1}
.mxp-ce-aprn .ce-hero-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--ce-cream);margin-bottom:20px;padding:6px 16px;border:1px solid rgba(245,237,224,.4);border-radius:30px}
.mxp-ce-aprn .ce-hero h1{font-size:clamp(34px,5vw,50px);color:var(--ce-white)!important;margin:0 0 18px}
.mxp-ce-aprn .ce-hero h1 em{font-style:italic;color:var(--ce-cream);font-weight:400}
.mxp-ce-aprn .ce-hero-sub{font-size:17px;line-height:1.65;color:rgba(245,237,224,.85);max-width:700px;margin:0 auto}

.mxp-ce-aprn .ce-explainer{background:var(--ce-white);padding:70px 32px}
.mxp-ce-aprn .ce-explainer-inner{max-width:900px;margin:0 auto}
.mxp-ce-aprn .ce-explainer-inner h2{font-size:28px;margin-bottom:14px}
.mxp-ce-aprn .ce-explainer-inner>p{font-size:15px;color:var(--ce-charcoal-soft);line-height:1.8;margin:0 0 14px}
.mxp-ce-aprn .ce-callout-important{background:var(--ce-cream);border-left:4px solid var(--ce-terracotta);padding:20px 24px;border-radius:0 12px 12px 0;margin:24px 0}
.mxp-ce-aprn .ce-callout-important strong{color:var(--ce-terracotta-deep);display:block;margin-bottom:4px;font-size:12px;text-transform:uppercase;letter-spacing:1.5px}
.mxp-ce-aprn .ce-callout-important p{font-size:14px;color:var(--ce-charcoal);line-height:1.6;margin:0}

.mxp-ce-aprn .ce-paths-section{background:var(--ce-cream);padding:80px 32px}
.mxp-ce-aprn .ce-section-header{text-align:center;max-width:720px;margin:0 auto 50px}
.mxp-ce-aprn .ce-section-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:16px}
.mxp-ce-aprn .ce-section-header h2{font-size:clamp(28px,3.5vw,38px);margin-bottom:14px}
.mxp-ce-aprn .ce-section-header p{font-size:16px;color:var(--ce-charcoal-soft);line-height:1.6;margin:0}
.mxp-ce-aprn .ce-paths-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:28px;max-width:1120px;margin:0 auto}
.mxp-ce-aprn .ce-path-empty-note{grid-column:1/-1;text-align:center;color:var(--ce-charcoal-soft);font-size:15px;line-height:1.6;padding:24px 12px;margin:0}
.mxp-ce-aprn .ce-path-card{background:var(--ce-white);border-radius:18px;padding:36px 30px;border:2px solid var(--ce-gray-line);display:flex;flex-direction:column;transition:all .2s;position:relative}
.mxp-ce-aprn .ce-path-card:hover{box-shadow:var(--ce-shadow-md)}
.mxp-ce-aprn .ce-path-card.featured{border-color:var(--ce-terracotta);box-shadow:var(--ce-shadow-md)}
.mxp-ce-aprn .ce-path-badge{position:absolute;top:-13px;left:50%;transform:translateX(-50%);background:var(--ce-terracotta);color:var(--ce-white);font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:5px 16px;border-radius:30px;white-space:nowrap}
.mxp-ce-aprn .ce-path-hours{font-family:var(--ce-serif);font-size:36px;font-weight:700;color:var(--ce-terracotta);margin-bottom:2px;line-height:1}
.mxp-ce-aprn .ce-path-hours small{font-size:16px;color:var(--ce-charcoal-soft);font-weight:400;font-family:var(--ce-sans)}
.mxp-ce-aprn .ce-path-card h3{font-size:20px;margin-bottom:4px}
.mxp-ce-aprn .ce-path-subtitle{font-size:13px;color:var(--ce-charcoal-soft);margin-bottom:16px}
.mxp-ce-aprn .ce-path-divider{height:1px;background:var(--ce-gray-line);margin:0 0 16px}
.mxp-ce-aprn .ce-path-features{list-style:none;flex:1;margin-bottom:24px;padding:0}
.mxp-ce-aprn .ce-path-features li{padding:6px 0;font-size:13.5px;color:var(--ce-charcoal-soft);display:flex;align-items:flex-start;gap:10px;line-height:1.5}
.mxp-ce-aprn .ce-path-features li svg{width:16px;height:16px;color:var(--ce-terracotta);flex-shrink:0;margin-top:2px}
.mxp-ce-aprn .ce-path-price{font-family:var(--ce-serif);font-size:28px;font-weight:700;color:var(--ce-terracotta);margin-bottom:16px}
.mxp-ce-aprn .ce-btn-path{display:block;width:100%;text-align:center;padding:14px;border-radius:6px;text-decoration:none!important;font-size:14px;font-weight:600;transition:all .2s;cursor:pointer;box-sizing:border-box}
.mxp-ce-aprn .ce-btn-path.terra{background:var(--ce-terracotta);color:var(--ce-white)!important;border:2px solid var(--ce-terracotta)}
.mxp-ce-aprn .ce-btn-path.terra:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);color:var(--ce-white)!important}
.mxp-ce-aprn .ce-btn-path.outline{background:transparent;color:var(--ce-teal-darkest)!important;border:1.5px solid var(--ce-teal-darkest)}
.mxp-ce-aprn .ce-btn-path.outline:hover{background:var(--ce-teal-darkest);color:var(--ce-white)!important}
.mxp-ce-aprn .ce-path-note{font-size:11px;color:var(--ce-charcoal-soft);text-align:center;margin-top:10px;line-height:1.5;margin-bottom:0}

.mxp-ce-aprn .ce-mandatory-section{background:var(--ce-white);padding:80px 32px}
.mxp-ce-aprn .ce-mand-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;max-width:960px;margin:0 auto}
.mxp-ce-aprn .ce-mand-card{background:var(--ce-cream);border-radius:12px;padding:22px 24px;border:1px solid var(--ce-gray-line);display:flex;justify-content:space-between;align-items:center;gap:16px;text-decoration:none;color:inherit;transition:all .2s}
.mxp-ce-aprn a.ce-mand-card:hover{box-shadow:var(--ce-shadow-sm);border-color:var(--ce-teal-mid);transform:translateY(-1px)}
.mxp-ce-aprn .ce-mand-card.aprn-specific{border-left:3px solid var(--ce-terracotta)}
.mxp-ce-aprn .ce-mc-info h4{font-family:var(--ce-sans);font-size:14px;font-weight:600;color:var(--ce-teal-darkest);margin-bottom:3px}
.mxp-ce-aprn .ce-mc-info p{font-size:12px;color:var(--ce-charcoal-soft);margin:0}
.mxp-ce-aprn .ce-mc-right{text-align:right;flex-shrink:0}
.mxp-ce-aprn .ce-mc-hours{font-size:11px;font-weight:600;letter-spacing:1px;text-transform:uppercase;color:var(--ce-teal-mid);margin-bottom:2px}
.mxp-ce-aprn .ce-mc-price{font-family:var(--ce-serif);font-size:17px;font-weight:700;color:var(--ce-terracotta);margin:0}

.mxp-ce-aprn .ce-faq-section{background:var(--ce-cream);padding:80px 32px}
.mxp-ce-aprn .ce-faq-header{text-align:center;margin-bottom:50px}
.mxp-ce-aprn .ce-faq-header h2{font-size:32px}
.mxp-ce-aprn .ce-faq-list{max-width:820px;margin:0 auto;display:flex;flex-direction:column;gap:14px}
.mxp-ce-aprn .ce-faq-item{background:var(--ce-white);border-radius:10px;border:1px solid var(--ce-gray-line);overflow:hidden}
.mxp-ce-aprn .ce-faq-item summary{padding:22px 24px;cursor:pointer;font-family:var(--ce-serif);font-size:17px;font-weight:600;color:var(--ce-teal-darkest);list-style:none;display:flex;justify-content:space-between;align-items:center;gap:16px}
.mxp-ce-aprn .ce-faq-item summary::-webkit-details-marker{display:none}
.mxp-ce-aprn .ce-faq-item summary::after{content:'+';font-size:24px;color:var(--ce-terracotta);font-weight:400;flex-shrink:0}
.mxp-ce-aprn .ce-faq-item[open] summary::after{content:'\2212'}
.mxp-ce-aprn .ce-faq-body{padding:0 24px 22px;font-size:15px;color:var(--ce-charcoal-soft);line-height:1.7}
.mxp-ce-aprn .ce-faq-body a{color:var(--ce-terracotta);font-weight:600}

.mxp-ce-aprn .ce-final-cta{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 100%);color:var(--ce-white);padding:80px 32px;text-align:center}
.mxp-ce-aprn .ce-final-cta-inner{max-width:700px;margin:0 auto}
.mxp-ce-aprn .ce-final-cta h2{color:var(--ce-white);font-size:clamp(28px,4vw,38px);margin-bottom:16px}
.mxp-ce-aprn .ce-final-cta h2 em{font-style:italic;color:var(--ce-cream)}
.mxp-ce-aprn .ce-final-cta p{font-size:17px;color:var(--ce-cream-warm);margin-bottom:30px;line-height:1.6}
.mxp-ce-aprn .ce-btn-primary{background:var(--ce-terracotta);color:var(--ce-white)!important;padding:16px 36px;border-radius:6px;text-decoration:none!important;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid var(--ce-terracotta)}
.mxp-ce-aprn .ce-btn-primary:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep);color:var(--ce-white)!important}

@media(max-width:960px){
  .mxp-ce-aprn .ce-paths-grid{grid-template-columns:1fr}
  .mxp-ce-aprn .ce-mand-grid{grid-template-columns:1fr}
}
</style>

<div class="ce-breadcrumb">
    <div class="ce-breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>
        <a href="{{ route('continuingEducation') }}">Continuing Education</a><span>&rsaquo;</span>
        APRN Renewal
    </div>
</div>

@php
    /** @var \Modules\ContinuingEducation\Entities\CeLicenseType|null $license */
    $licenseEyebrow = $license?->subtitle ?? config('continuingeducation.bundle_license_types.aprn', 'APRN');
    $licenseTitle = $license?->name ?? 'Florida APRN Prescribing & Renewal';
    $licenseDescription = $license?->description ?? '';
    $explainerComponents = array_values(array_filter([
        $license?->component_1,
        $license?->component_2,
    ]));
    $calloutNote = $license?->component_3;
    $mandatoryStats = $mandatoryCourseStats ?? ['count' => 0, 'hours' => '0'];
@endphp

<header class="ce-hero">
    <div class="ce-hero-inner">
        <span class="ce-hero-eyebrow">{{ $licenseEyebrow }}</span>
        <h1>{{ $licenseTitle }}</h1>
        @if ($licenseDescription)
            <p class="ce-hero-sub">{{ $licenseDescription }}</p>
        @endif
    </div>
</header>

<section class="ce-explainer">
    <div class="ce-explainer-inner">
        <h2>Before you purchase, determine your renewal track.</h2>
        @if (! empty($explainerComponents))
            @foreach ($explainerComponents as $component)
                <p>{{ $component }}</p>
            @endforeach
        @else
            <p>The Florida Board of Nursing allows a CE exemption for APRNs holding an active national certification (ANCC, AANP, etc.). If you qualify, you are exempt from general electives and most mandatory courses.</p>
            <p>However, state law specifies that this exemption <strong>does not apply</strong> to controlled substance prescribing requirements and human trafficking training. These are statutory requirements regardless of certification status.</p>
        @endif
        @if ($calloutNote)
            <div class="ce-callout-important">
                <strong>Important</strong>
                <p>{{ $calloutNote }}</p>
            </div>
        @else
            <div class="ce-callout-important">
                <strong>Autonomous APRNs</strong>
                <p>If you practice as an autonomous APRN (without a supervisory protocol), you are required to complete an additional 10 contact hours on top of your standard renewal requirement. This brings your total to 37 contact hours if on the full renewal path.</p>
            </div>
        @endif
    </div>
</section>

<section class="ce-paths-section" id="aprn-packages">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Your Renewal Paths</span>
            <h2>Choose the path that matches your certification status.</h2>
        </div>
        <div class="ce-paths-grid">
            @forelse ($bundles ?? [] as $bundle)
                @include(theme('components.ce._bundle-path-card'), ['bundle' => $bundle])
            @empty
                <p class="ce-path-empty-note">Renewal packages are being updated. Please check back soon or contact us for a custom package.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="ce-mandatory-section">
    <div class="ce-container">
        <div class="ce-section-header">
            <span class="ce-section-eyebrow">Course Catalog</span>
            @if ($mandatoryStats['count'] > 0)
                <h2>{{ $mandatoryStats['count'] }} Mandatory Courses &middot; {{ $mandatoryStats['hours'] }} Hours</h2>
            @else
                <h2>APRN Mandatory &amp; Required Courses</h2>
            @endif
            <p>Mandatory courses applicable to APRN renewal. Courses marked with a terracotta bar are APRN-specific.</p>
        </div>
        <div class="ce-mand-grid">
            @forelse ($mandatoryCourses ?? [] as $course)
                @include(theme('components.ce._aprn-mandatory-course-row'), [
                    'course' => $course,
                    'ceCatalog' => $ceCatalog,
                ])
            @empty
                <p class="ce-path-empty-note">Mandatory courses are being updated. Please check back soon.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="ce-faq-section">
    <div class="ce-container">
        <div class="ce-faq-header"><h2>APRN Renewal FAQ</h2></div>
        <div class="ce-faq-list">
            <details class="ce-faq-item"><summary>How do I know if I qualify for the Certified-Exempt path?</summary><div class="ce-faq-body">If you hold an active national certification from a recognized body (ANCC, AANP, NCC, NBCRNA, etc.), you qualify for the 5-hour exempt path. Your certification must be current and in good standing at the time of renewal.</div></details>
            <details class="ce-faq-item"><summary>I&rsquo;m certified-exempt. Do I still need the RN/LPN mandatory courses?</summary><div class="ce-faq-body">No. The national certification exemption covers general CE requirements. You only need Safe &amp; Effective Prescribing of Controlled Substances (3 hours) and Human Trafficking (2 hours) &mdash; these are statutory requirements that the exemption does not waive.</div></details>
            <details class="ce-faq-item"><summary>What if I&rsquo;m an autonomous APRN?</summary><div class="ce-faq-body">Autonomous APRNs (practicing without a supervisory protocol) must complete an additional 10 contact hours on top of the standard renewal requirement. We recommend scheduling a consult so we can build a custom package for your specific situation.</div></details>
            <details class="ce-faq-item"><summary>Do non-exempt APRNs complete the same mandatory courses as RNs?</summary><div class="ce-faq-body">Yes. Non-exempt APRNs complete the same 6 mandatory courses as RNs and LPNs, plus the APRN-specific Safe &amp; Effective Prescribing course (3 hours). The remaining hours are filled with electives to reach 27 total.</div></details>
            <details class="ce-faq-item"><summary>I&rsquo;m an RN, not an APRN. Am I on the right page?</summary><div class="ce-faq-body">The <a href="{{ route('continuingEducationRnLpn') }}">RN &amp; LPN Renewal Portal</a> has your packages. This page is specifically for advanced practice registered nurses.</div></details>
        </div>
    </div>
</section>

<section class="ce-final-cta">
    <div class="ce-final-cta-inner">
        <h2>Advanced practice. <em>Simplified compliance.</em></h2>
        <p>
            Complete your APRN renewal requirements online, auto-reported to CE Broker.
            @if ($featuredBundle ?? null)
                Start with the {{ $featuredBundle->name }} package.
            @else
                Choose your path above or contact us for a custom package.
            @endif
        </p>
        @if ($featuredBundle ?? null)
            <a href="{{ $featuredBundle->buy_url }}" class="ce-btn-primary">{!! $featuredBundle->buy_button_label !!}</a>
        @else
            <a href="#aprn-packages" class="ce-btn-primary">View APRN Packages &rarr;</a>
        @endif
    </div>
</section>

</div>
