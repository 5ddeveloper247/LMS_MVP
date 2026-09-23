<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | CE Professional Portal</title>
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" type="image/x-icon" href="{{ getCourseImage(Settings('favicon')) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--teal-mid:#1A8A6F;--teal-deep:#0F6E56;--teal-darkest:#0A4D3C;--navy:#1a3a5c;--terracotta:#C65D3A;--cream:#F5EDE0;--charcoal:#2B2B2B;--charcoal-soft:#4A4A4A;--white:#FFFFFF;--gray-line:#E8DFD0;--serif:'Playfair Display',Georgia,serif;--sans:'Montserrat',system-ui,sans-serif;--shadow-lg:0 20px 50px rgba(10,77,60,.15)}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:var(--sans);color:var(--charcoal);background:var(--cream);line-height:1.6;-webkit-font-smoothing:antialiased;min-height:100vh;display:flex;flex-direction:column}
h1,h2{font-family:var(--serif);font-weight:700;line-height:1.2;color:var(--teal-darkest)}

.nav{background:rgba(245,237,224,.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--gray-line);padding:16px 0}
.nav-inner{max-width:1240px;margin:0 auto;padding:0 24px;text-align:center}
.nav-brand{font-family:var(--serif);font-weight:700;font-size:20px;color:var(--teal-darkest)}
.nav-brand em{color:var(--terracotta);font-style:italic;font-weight:400}

.page{flex:1;display:flex;align-items:center;justify-content:center;padding:48px 24px 64px}
.card{max-width:640px;width:100%;background:var(--white);border-radius:24px;overflow:hidden;box-shadow:var(--shadow-lg);border:1px solid var(--gray-line)}

.hero{background:linear-gradient(135deg,var(--navy) 0%,var(--teal-darkest) 100%);padding:48px 36px 42px;text-align:center;color:var(--white);position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;top:-60px;right:-60px;width:220px;height:220px;background:radial-gradient(circle,rgba(91,168,217,.2) 0%,transparent 70%);border-radius:50%}
.hero>*{position:relative;z-index:1}
.success-icon{width:72px;height:72px;border-radius:50%;background:rgba(45,155,78,.2);border:2px solid rgba(45,155,78,.45);display:flex;align-items:center;justify-content:center;margin:0 auto 20px}
.success-icon svg{width:36px;height:36px;color:#7ee09a}
.hero h1{font-size:clamp(26px,4vw,34px);color:var(--white);margin-bottom:10px}
.hero h1 em{font-style:italic;color:var(--cream);font-weight:400}
.hero-lead{font-size:15px;color:rgba(245,237,224,.88);max-width:460px;margin:0 auto;line-height:1.65}

.body{padding:36px 36px 40px;text-align:center}
.coming-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(26,138,111,.1);border:1px solid rgba(26,138,111,.25);color:var(--teal-deep);font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:8px 14px;border-radius:30px;margin-bottom:18px}
.coming-badge svg{width:14px;height:14px}
.body h2{font-size:22px;margin-bottom:12px}
.body>p{font-size:14px;color:var(--charcoal-soft);margin-bottom:8px;line-height:1.75;max-width:520px;margin-left:auto;margin-right:auto}
.body .note{font-size:13px;color:var(--charcoal-soft);margin-top:20px;padding-top:20px;border-top:1px solid var(--gray-line);line-height:1.65}

.detail-list{list-style:none;text-align:left;max-width:480px;margin:24px auto 0}
.detail-list li{display:flex;align-items:flex-start;gap:12px;padding:12px 0;border-bottom:1px solid var(--gray-line);font-size:13px;color:var(--charcoal-soft)}
.detail-list li:last-child{border-bottom:none}
.detail-list li svg{width:18px;height:18px;color:var(--teal-mid);flex-shrink:0;margin-top:2px}

.btn-logout{display:inline-flex;align-items:center;justify-content:center;gap:8px;margin-top:28px;padding:12px 28px;border-radius:8px;font-size:14px;font-weight:600;font-family:var(--sans);color:var(--teal-darkest);background:var(--white);border:1.5px solid var(--gray-line);text-decoration:none;cursor:pointer;transition:all .2s}
.btn-logout:hover{border-color:var(--teal-mid);color:var(--teal-mid)}
.btn-logout svg{width:16px;height:16px}

.footer-mini{background:var(--teal-darkest);padding:18px 24px;text-align:center;font-size:11px;color:rgba(245,237,224,.45)}

@media(max-width:600px){.hero,.body{padding-left:24px;padding-right:24px}}
</style>
</head>
<body>

<nav class="nav">
  <div class="nav-inner">
    <span class="nav-brand">Merkaii <em>Xcellence Prep</em></span>
  </div>
</nav>

<main class="page">
  <div class="card">
    <div class="hero">
      <div class="success-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
      </div>
      <h1>Welcome{{ !empty($name) ? ',' : '' }} <em>{{ $name ?? 'CE Professional' }}</em></h1>
      <p class="hero-lead">Your CE Professional account has been registered successfully.</p>
    </div>

    <div class="body">
      <div class="coming-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        Dashboard coming soon
      </div>

      <h2>CE Professional Dashboard</h2>
      <p>We&rsquo;re building your dedicated Florida CE portal. Your license details are saved and your account is ready.</p>
      <p>When the dashboard launches, you&rsquo;ll be able to track renewal progress, view compliance requirements, manage course completion, and access CE Broker reporting — all in one place.</p>

      <ul class="detail-list">
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span>Your Florida license profile is on file</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <span>CE transcript &amp; renewal tracker — launching soon</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <span>We&rsquo;ll notify you when your dashboard is live</span>
        </li>
      </ul>

      <p class="note">Thank you for registering with Merkaii Xcellence Prep. No further action is needed at this time.</p>

      @auth
        <a href="{{ route('logout') }}" class="btn-logout">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
          Log Out
        </a>
      @endauth
    </div>
  </div>
</main>

<div class="footer-mini">
  &copy; {{ date('Y') }} Merakii International Societe, Inc
</div>

</body>
</html>
