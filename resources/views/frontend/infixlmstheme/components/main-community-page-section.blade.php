@php
    $studentHubUrl = function_exists('mainCommunityEntryUrl')
        ? mainCommunityEntryUrl('student')
        : (auth()->check() ? route('main-community.index') : route('login') . '?redirect=' . urlencode('/community') . '&portal=student');
    $nurseNetworkUrl = function_exists('mainCommunityEntryUrl')
        ? mainCommunityEntryUrl('ce')
        : (auth()->check() ? route('main-community.index') : route('login') . '?redirect=' . urlencode('/community') . '&portal=ce');
    $mentorUrl = function_exists('mainCommunityEntryUrl')
        ? mainCommunityEntryUrl('ce')
        : $nurseNetworkUrl;
@endphp

<div class="mxp-main-community">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{--teal-mid:#1A8A6F;--teal-deep:#0F6E56;--teal-darkest:#0A4D3C;--terracotta:#C65D3A;--terracotta-deep:#A84B2D;--cream:#F5EDE0;--cream-warm:#EFE3D0;--charcoal:#2B2B2B;--charcoal-soft:#4A4A4A;--white:#FFFFFF;--gray-line:#E8DFD0;--serif:'Playfair Display',Georgia,serif;--sans:'Montserrat',system-ui,sans-serif;--shadow-sm:0 2px 8px rgba(10,77,60,.06);--shadow-md:0 8px 24px rgba(10,77,60,.10);--shadow-lg:0 20px 50px rgba(10,77,60,.15)}
*{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth;scroll-padding-top:80px}body{font-family:var(--sans);color:var(--charcoal);background:var(--cream);line-height:1.6;-webkit-font-smoothing:antialiased}h1,h2,h3,h4{font-family:var(--serif);font-weight:700;line-height:1.2;color:var(--teal-darkest)}
.nav{position:sticky;top:0;z-index:100;background:rgba(245,237,224,.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--gray-line);padding:16px 0}.nav-inner{max-width:1240px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;gap:32px}.nav-brand{font-family:var(--serif);font-weight:700;font-size:20px;color:var(--teal-darkest);text-decoration:none}.nav-brand-accent{color:var(--terracotta);font-style:italic}.nav-links{display:flex;gap:28px;list-style:none}.nav-links a{font-size:14px;font-weight:500;color:var(--charcoal);text-decoration:none;transition:color .2s}.nav-links a:hover,.nav-links a.active{color:var(--teal-mid)}.nav-cta{background:var(--terracotta);color:var(--white);padding:10px 22px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:600;transition:background .2s}.nav-cta:hover{background:var(--terracotta-deep)}
.breadcrumb{background:var(--cream-warm);padding:14px 32px;border-bottom:1px solid var(--gray-line)}.breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--charcoal-soft)}.breadcrumb-inner a{color:var(--teal-mid);text-decoration:none;font-weight:500}.breadcrumb-inner span{margin:0 8px;opacity:.5}
.container{max-width:1240px;margin:0 auto;padding:0 24px}
.section-header{text-align:center;max-width:720px;margin:0 auto 50px}.section-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--terracotta);margin-bottom:16px}.section-header h2{font-size:clamp(30px,4vw,42px);margin-bottom:14px}.section-header p{font-size:16px;color:var(--charcoal-soft);line-height:1.6}

/* HERO */
.hero{background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%);color:var(--white);padding:90px 32px 100px;text-align:center;position:relative;overflow:hidden}.hero::before{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(198,93,58,.15) 0%,transparent 70%);border-radius:50%}.hero-inner{max-width:800px;margin:0 auto;position:relative;z-index:1}.hero-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:var(--terracotta);margin-bottom:20px;padding:6px 16px;border:1px solid var(--terracotta);border-radius:30px}.hero h1{font-size:clamp(36px,5vw,52px);color:var(--white);margin-bottom:20px}.hero h1 em{font-style:italic;color:var(--cream);font-weight:400}.hero-sub{font-size:18px;color:var(--cream-warm);line-height:1.65;max-width:640px;margin:0 auto}

/* nav title */

.mxp-main-community .ce-breadcrumb{background:var(--ce-cream-warm);padding:14px 32px;border-bottom:1px solid var(--ce-gray-line)}
.mxp-main-community .ce-breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-main-community .ce-breadcrumb-inner a{color:var(--ce-teal-mid);text-decoration:none;font-weight:500}
.mxp-main-community .ce-breadcrumb-inner a:hover{color:var(--ce-terracotta)}
.mxp-main-community .ce-breadcrumb-inner span{margin:0 8px;opacity:.5}


/* TWO COMMUNITIES */
.two-comm{background:var(--white);padding:80px 32px}
.comm-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;max-width:1080px;margin:0 auto}
.comm-block{border-radius:20px;padding:48px 40px;position:relative;overflow:hidden}
.comm-block::before{content:'';position:absolute;top:0;left:0;right:0;height:5px}
.comm-block.student{background:var(--cream);border:1.5px solid var(--gray-line)}.comm-block.student::before{background:linear-gradient(90deg,var(--teal-mid),var(--teal-deep))}
.comm-block.nurse{background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%);color:var(--white);border:none}.comm-block.nurse::before{background:linear-gradient(90deg,var(--terracotta),var(--terracotta-deep))}
.comm-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;margin-bottom:20px}
.comm-block.student .comm-icon{background:rgba(26,138,111,.1);color:var(--teal-mid)}
.comm-block.nurse .comm-icon{background:rgba(255,255,255,.12);color:var(--white)}
.comm-icon svg{width:26px;height:26px}
.comm-block h3{font-size:26px;margin-bottom:6px}.comm-block.nurse h3{color:var(--white)}
.comm-block .comm-sub{font-family:var(--serif);font-style:italic;font-size:14px;margin-bottom:18px}.comm-block.student .comm-sub{color:var(--terracotta)}.comm-block.nurse .comm-sub{color:var(--cream-warm)}
.comm-block>p{font-size:15px;line-height:1.7;margin-bottom:24px}.comm-block.student>p{color:var(--charcoal-soft)}.comm-block.nurse>p{color:rgba(245,237,224,.8)}
.comm-features{list-style:none;margin-bottom:28px}.comm-features li{padding:7px 0;font-size:14px;display:flex;align-items:flex-start;gap:10px;line-height:1.5}.comm-block.student .comm-features li{color:var(--charcoal-soft)}.comm-block.nurse .comm-features li{color:rgba(245,237,224,.8)}.comm-features li svg{width:16px;height:16px;flex-shrink:0;margin-top:2px}.comm-block.student .comm-features li svg{color:var(--teal-mid)}.comm-block.nurse .comm-features li svg{color:var(--terracotta)}
.btn-comm{display:block;width:100%;text-align:center;padding:16px;border-radius:8px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s}
.btn-comm.teal{background:var(--teal-darkest);color:var(--white);border:2px solid var(--teal-darkest)}.btn-comm.teal:hover{background:var(--teal-deep);border-color:var(--teal-deep)}
.btn-comm.white{background:var(--white);color:var(--teal-darkest);border:2px solid var(--white)}.btn-comm.white:hover{background:var(--cream);border-color:var(--cream)}
.comm-access{text-align:center;font-size:12px;margin-top:10px}.comm-block.student .comm-access{color:var(--charcoal-soft)}.comm-block.nurse .comm-access{color:rgba(245,237,224,.5)}

/* MENTORSHIP BRIDGE */
.bridge{background:var(--cream);padding:80px 32px}
.bridge-card{max-width:900px;margin:0 auto;background:var(--white);border-radius:20px;padding:56px 60px;display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center;border:1px solid var(--gray-line);box-shadow:var(--shadow-md)}
.bridge-card h2{font-size:30px;margin-bottom:14px}
.bridge-card>div p{font-size:15px;color:var(--charcoal-soft);line-height:1.7;margin-bottom:20px}
.bridge-stats{display:flex;gap:24px}.bridge-stat{text-align:center}.bridge-stat-num{font-family:var(--serif);font-size:32px;font-weight:700;color:var(--terracotta)}.bridge-stat-label{font-size:11px;color:var(--charcoal-soft);text-transform:uppercase;letter-spacing:.8px}
.bridge-visual{background:linear-gradient(135deg,var(--teal-mid),var(--teal-deep));border-radius:16px;padding:40px;text-align:center;color:var(--white)}
.bridge-visual h3{font-size:22px;color:var(--white);margin-bottom:10px}
.bridge-visual p{font-size:14px;color:var(--cream-warm);line-height:1.6;margin-bottom:20px}
.bridge-visual .btn-comm{max-width:260px;margin:0 auto}

/* GUIDELINES */
.guidelines{background:var(--white);padding:80px 32px}
.guide-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;max-width:1000px;margin:0 auto}
.guide-card{background:var(--cream);border-radius:14px;padding:32px 28px;text-align:center}
.guide-card svg{width:32px;height:32px;color:var(--teal-mid);margin-bottom:14px}
.guide-card h4{font-size:16px;margin-bottom:8px}.guide-card p{font-size:13px;color:var(--charcoal-soft);line-height:1.6}

/* CTA */
.final-cta{background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%);color:var(--white);padding:80px 32px;text-align:center}.final-cta-inner{max-width:700px;margin:0 auto}.final-cta h2{color:var(--white);font-size:clamp(28px,4vw,38px);margin-bottom:16px}.final-cta h2 em{font-style:italic;color:var(--cream)}.final-cta p{font-size:17px;color:var(--cream-warm);margin-bottom:28px;line-height:1.6}
.cta-btns{display:flex;gap:16px;justify-content:center;flex-wrap:wrap}
.btn-primary{background:var(--terracotta);color:var(--white);padding:16px 32px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid var(--terracotta)}.btn-primary:hover{background:var(--terracotta-deep);border-color:var(--terracotta-deep)}
.btn-outline-w{background:transparent;color:var(--white);padding:16px 32px;border-radius:6px;text-decoration:none;font-size:15px;font-weight:600;transition:all .2s;display:inline-block;border:2px solid rgba(245,237,224,.4)}.btn-outline-w:hover{background:rgba(245,237,224,.1);border-color:rgba(245,237,224,.7)}

/* FOOTER */
.footer{background:var(--teal-darkest);color:var(--cream-warm);padding:70px 32px 30px}.footer-inner{max-width:1240px;margin:0 auto}.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr 1fr;gap:40px;margin-bottom:40px}.footer-col h5{font-family:var(--serif);font-weight:700;font-size:16px;color:var(--cream);margin-bottom:16px}.footer-col ul{list-style:none}.footer-col ul li{margin-bottom:10px}.footer-col ul a{color:rgba(245,237,224,.75);text-decoration:none;font-size:13.5px;transition:color .2s}.footer-col ul a:hover{color:var(--terracotta)}.footer-brand-block .footer-brand{font-family:var(--serif);font-weight:700;font-size:22px;color:var(--white);margin-bottom:14px}.footer-brand-block .footer-brand em{font-style:italic;color:var(--terracotta)}.footer-brand-block p{font-size:13px;line-height:1.7;color:rgba(245,237,224,.7);max-width:340px}.footer-tagline{font-family:var(--serif);font-style:italic;font-size:15px;color:var(--terracotta);margin-top:18px}.footer-motto{font-family:var(--serif);font-style:italic;font-size:13px;color:rgba(245,237,224,.6);margin-top:8px}
.footer-contact-band{background:rgba(0,0,0,.18);padding:28px 0;margin:0 -32px;padding-left:32px;padding-right:32px}.footer-contact-inner{max-width:1240px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:24px}.footer-contact-info{font-size:13px;line-height:1.8;color:rgba(245,237,224,.85)}.footer-contact-info strong{color:var(--cream)}.footer-contact-info a{color:rgba(245,237,224,.85);text-decoration:none}.footer-social{display:flex;gap:12px}.footer-social a{width:38px;height:38px;border-radius:50%;background:rgba(245,237,224,.1);border:1px solid rgba(245,237,224,.15);display:flex;align-items:center;justify-content:center;color:var(--cream);text-decoration:none;transition:all .2s}.footer-social a:hover{background:var(--terracotta);border-color:var(--terracotta)}.footer-social svg{width:16px;height:16px}
.footer-legal{background:#052821;padding:24px 32px;margin:0 -32px}.footer-legal-inner{max-width:1240px;margin:0 auto}.footer-legal-top{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:14px;padding-bottom:14px;border-bottom:1px solid rgba(255,255,255,.1);font-size:11.5px;color:rgba(255,255,255,.5)}.footer-legal-links{display:flex;gap:18px}.footer-legal-links a{color:rgba(255,255,255,.6);text-decoration:none;font-size:11.5px}.footer-disclaimer{font-size:11px;color:rgba(255,255,255,.38);line-height:1.65}

@media(max-width:960px){.nav-links{display:none}.comm-grid{grid-template-columns:1fr}.bridge-card{grid-template-columns:1fr}.guide-grid{grid-template-columns:1fr}.footer-grid{grid-template-columns:1fr 1fr;gap:32px}.footer-brand-block{grid-column:1/-1}}
@media(max-width:640px){.footer-grid{grid-template-columns:1fr}.footer-contact-inner{flex-direction:column;align-items:flex-start}.footer-legal-top{flex-direction:column;align-items:flex-start}}
</style>


<div class="ce-breadcrumb">
    <div class="ce-breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>Main Community
    </div>
</div>

<!-- HERO -->
<header class="hero">
  <div class="hero-inner">
    <span class="hero-eyebrow">Community</span>
    <h1>Two communities. <em>One mission.</em></h1>
    <p class="hero-sub">Whether you&rsquo;re studying for the NCLEX or renewing your license after 15 years on the floor &mdash; you belong here. Same building, different rooms, one shared purpose: better nurses.</p>
  </div>
</header>

<!-- TWO COMMUNITIES SIDE BY SIDE -->
<section class="two-comm">
  <div class="container">
    <div class="section-header">
      <span class="section-eyebrow">Choose Your Space</span>
      <h2>Find your people.</h2>
      <p>Each community is designed for the stage of nursing you&rsquo;re in. You&rsquo;ll see only what&rsquo;s relevant to you.</p>
    </div>
    <div class="comm-grid">

      <!-- STUDENT HUB -->
      <div class="comm-block student">
        <div class="comm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
        <h3>The Student Hub</h3>
        <p class="comm-sub">For nursing students &amp; NCLEX candidates</p>
        <p>Study groups, accountability partners, exam strategy discussions, and support from people who truly understand what you&rsquo;re going through. This is your safe space to ask questions, share wins, and lean on each other through the hard parts.</p>
        <ul class="comm-features">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Study groups by subject and program</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>NCLEX prep accountability threads</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Weekly wins &amp; motivation board</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Ask-a-nurse educator Q&amp;A</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Connect with licensed nurse mentors</li>
        </ul>
        <a href="{{ $studentHubUrl }}" class="btn-comm teal">Join the Student Hub &rarr;</a>
        <p class="comm-access">Available with any student membership or course purchase</p>
      </div>

      <!-- LICENSED NURSE NETWORK -->
      <div class="comm-block nurse" id="nurse-lounge">
        <div class="comm-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3>Licensed Nurse Network</h3>
        <p class="comm-sub">For RNs, LPNs &amp; APRNs</p>
        <p>Stay connected between renewal cycles. Florida regulatory updates, clinical practice discussions, peer networking by specialty, and the opportunity to mentor the next generation of nurses. This is your professional home.</p>
        <ul class="comm-features">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Florida regulatory updates &amp; BON news</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Clinical practice discussions by specialty</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Renewal deadline reminders</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>CE Broker help &amp; troubleshooting</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Mentor a nursing student (volunteer)</li>
        </ul>
        <a href="{{ $nurseNetworkUrl }}" class="btn-comm white">Join the Nurse Network &rarr;</a>
        <p class="comm-access">Available with any CE course or bundle purchase</p>
      </div>

    </div>
  </div>
</section>

<!-- MENTORSHIP BRIDGE -->
<section class="bridge">
  <div class="bridge-card">
    <div>
      <h2>The bridge between the two.</h2>
      <p>Licensed nurses who remember what it was like can volunteer to mentor MXP students. Thirty minutes a month. No curriculum, no pressure — just one nurse helping another get through. That&rsquo;s the kind of community that changes outcomes.</p>
      <div class="bridge-stats">
        <div class="bridge-stat"><p class="bridge-stat-num">30</p><p class="bridge-stat-label">Minutes / Month</p></div>
        <div class="bridge-stat"><p class="bridge-stat-num">1:1</p><p class="bridge-stat-label">Mentorship</p></div>
        <div class="bridge-stat"><p class="bridge-stat-num">100%</p><p class="bridge-stat-label">Volunteer</p></div>
      </div>
    </div>
    <div class="bridge-visual">
      <h3>Become a Mentor</h3>
      <p>Share your experience with a student who needs to hear &ldquo;I was in your shoes, and I made it.&rdquo; Sign up takes 2 minutes inside the Licensed Nurse Network.</p>
      <a href="{{ $mentorUrl }}" class="btn-comm white">Sign Up to Mentor &rarr;</a>
    </div>
  </div>
</section>

<!-- COMMUNITY GUIDELINES -->
<section class="guidelines">
  <div class="container">
    <div class="section-header">
      <span class="section-eyebrow">How We Show Up</span>
      <h2>Community Guidelines</h2>
    </div>
    <div class="guide-grid">
      <div class="guide-card">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        <h4>Lead with Empathy</h4>
        <p>Everyone here is at a different stage. What feels basic to one person is a breakthrough for another. We lift, we don&rsquo;t judge.</p>
      </div>
      <div class="guide-card">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <h4>Protect the Space</h4>
        <p>No soliciting, no spam, no sharing of test content. This is a professional community. We keep it that way for everyone&rsquo;s benefit.</p>
      </div>
      <div class="guide-card">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <h4>Show Up Authentically</h4>
        <p>Share your real experiences — the wins and the setbacks. Vulnerability builds the trust that makes this community work.</p>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta">
  <div class="final-cta-inner">
    <h2>Nursing is hard. <em>You don&rsquo;t have to do it alone.</em></h2>
    <p>Whether you&rsquo;re studying for the biggest exam of your life or 15 years into your career &mdash; your community is here.</p>
    <div class="cta-btns">
      <a href="{{ $studentHubUrl }}" class="btn-primary">Student Hub &rarr;</a>
      <a href="{{ $nurseNetworkUrl }}" class="btn-outline-w">Nurse Network &rarr;</a>
    </div>
  </div>
</section>

