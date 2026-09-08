<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Login') }}</title>
<meta name="description" content="Sign in or create your Merkaii Xcellence Prep account. Student LMS access, CE Professional portal for licensed nurses, and Instructor/Tutor portal — all in one place.">
<link rel="shortcut icon" type="image/x-icon" href="{{ getCourseImage(Settings('favicon')) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/css/preloader.css') }}{{ assetVersion() }}" />
<link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}{{ assetVersion() }}" />
<style>

:root{--teal-mid:#1A8A6F;--teal-deep:#0F6E56;--teal-darkest:#0A4D3C;--terracotta:#C65D3A;--terracotta-deep:#A84B2D;--cream:#F5EDE0;--cream-warm:#EFE3D0;--charcoal:#2B2B2B;--charcoal-soft:#4A4A4A;--white:#FFFFFF;--gray-line:#E8DFD0;--serif:'Playfair Display',Georgia,serif;--sans:'Montserrat',system-ui,sans-serif;--shadow-md:0 8px 24px rgba(10,77,60,.10);--shadow-lg:0 20px 50px rgba(10,77,60,.15)}
*{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth}body{font-family:var(--sans);color:var(--charcoal);background:var(--cream);line-height:1.6;-webkit-font-smoothing:antialiased;min-height:100vh;display:flex;flex-direction:column}h1,h2,h3,h4{font-family:var(--serif);font-weight:700;line-height:1.2;color:var(--teal-darkest)}

/* NAV */
.nav{background:rgba(245,237,224,.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--gray-line);padding:16px 0}
.nav-inner{max-width:1240px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;gap:32px}
.nav-brand{font-family:var(--serif);font-weight:700;font-size:20px;color:var(--teal-darkest);text-decoration:none}
.nav-brand-accent{color:var(--terracotta);font-style:italic}
.nav-links{display:flex;gap:28px;list-style:none}
.nav-links a{font-size:14px;font-weight:500;color:var(--charcoal);text-decoration:none;transition:color .2s}
.nav-links a:hover{color:var(--teal-mid)}
.nav-home{background:var(--teal-darkest);color:var(--white);padding:10px 22px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:600;transition:background .2s}
.nav-home:hover{background:var(--teal-deep)}

/* MAIN LAYOUT */
.login-page{flex:1;display:flex;align-items:center;justify-content:center;padding:50px 24px}
.login-container{max-width:1060px;width:100%;display:grid;grid-template-columns:380px 1fr;border-radius:24px;overflow:hidden;box-shadow:var(--shadow-lg);background:var(--white);min-height:640px}

/* LEFT BRAND PANEL â€” changes with portal type */
.brand-panel{padding:52px 40px;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden;transition:background .4s}
.brand-panel::before{content:'';position:absolute;top:-80px;right:-80px;width:280px;height:280px;background:radial-gradient(circle,rgba(245,237,224,.12) 0%,transparent 70%);border-radius:50%}
.brand-panel>*{position:relative;z-index:1}
.brand-panel[data-theme="student"]{background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%)}
.brand-panel[data-theme="ce"]{background:linear-gradient(135deg,#1a3a5c 0%,var(--teal-darkest) 100%)}
.brand-panel[data-theme="instructor"]{background:linear-gradient(135deg,#3D1F0E 0%,var(--terracotta-deep) 80%)}

.brand-icon{width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;margin-bottom:24px}
.brand-icon svg{width:26px;height:26px;color:var(--white)}
.brand-panel h2{font-size:26px;color:var(--white);margin-bottom:12px}
.brand-panel .brand-desc{font-size:14px;color:rgba(245,237,224,.8);line-height:1.7;margin-bottom:28px}

.brand-features{list-style:none}
.brand-features li{padding:7px 0;font-size:13px;color:rgba(245,237,224,.85);display:flex;align-items:center;gap:10px}
.brand-features li svg{width:16px;height:16px;flex-shrink:0}
.brand-panel[data-theme="student"] .brand-features li svg{color:var(--terracotta)}
.brand-panel[data-theme="ce"] .brand-features li svg{color:#5BA8D9}
.brand-panel[data-theme="instructor"] .brand-features li svg{color:var(--cream)}

.brand-footer{margin-top:auto;padding-top:28px;border-top:1px solid rgba(255,255,255,.12)}
.brand-tagline{font-family:var(--serif);font-style:italic;font-size:14px;color:var(--cream);opacity:.65}
.brand-motto{font-family:var(--serif);font-style:italic;font-size:12px;color:rgba(245,237,224,.45);margin-top:4px}

/* RIGHT FORM PANEL */
.form-panel{padding:44px 44px;display:flex;flex-direction:column}

/* PORTAL SELECTOR */
.portal-tabs{display:flex;gap:0;margin-bottom:28px;background:var(--cream);border-radius:10px;padding:4px;border:1px solid var(--gray-line)}
.portal-tab{flex:1;padding:10px 8px;text-align:center;font-size:12px;font-weight:600;letter-spacing:.5px;cursor:pointer;transition:all .2s;background:transparent;color:var(--charcoal-soft);border:none;border-radius:7px;font-family:var(--sans);line-height:1.3}
.portal-tab.active{background:var(--white);color:var(--teal-darkest);box-shadow:0 2px 8px rgba(0,0,0,.08)}
.portal-tab svg{display:block;margin:0 auto 4px;width:18px;height:18px}

/* SIGN IN / CREATE ACCOUNT TOGGLE */
.auth-toggle{display:flex;gap:0;margin-bottom:24px;border-bottom:2px solid var(--gray-line)}
.auth-btn{flex:1;padding:12px 8px;text-align:center;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;background:transparent;color:var(--charcoal-soft);border:none;border-bottom:2px solid transparent;margin-bottom:-2px;font-family:var(--sans)}
.auth-btn.active{color:var(--teal-darkest);border-bottom-color:var(--terracotta)}

/* FORMS */
.auth-panel{display:none;animation:fadeIn .3s ease}.auth-panel.active{display:block}
@keyframes fadeIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}

.form-group{margin-bottom:16px}
.form-group label{display:block;font-size:12px;font-weight:600;color:var(--teal-darkest);margin-bottom:5px}
.form-group label .req{color:var(--terracotta);font-size:10px}
.form-group input,.form-group select{width:100%;padding:11px 14px;border:1.5px solid var(--gray-line);border-radius:6px;font-size:14px;font-family:var(--sans);color:var(--charcoal);background:var(--white);transition:border-color .2s}
.form-group input:focus,.form-group select:focus{outline:none;border-color:var(--teal-mid)}
.form-group .hint{font-size:10px;color:var(--charcoal-soft);margin-top:3px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}

/* PORTAL-SPECIFIC FIELDS */
.ce-fields,.instructor-fields,.student-fields{display:none}
.portal-ce .ce-fields{display:block}
.portal-instructor .instructor-fields{display:block}
.portal-student .student-fields{display:block}

/* APRN DYNAMIC FIELDS (inside CE fields) */
.aprn-fields{display:none;margin-top:4px}
.aprn-fields.visible{display:block}
.radio-group{margin-bottom:16px}
.radio-group>label{display:block;font-size:12px;font-weight:600;color:var(--teal-darkest);margin-bottom:8px}
.radio-option{display:flex;align-items:flex-start;gap:10px;padding:8px 0;cursor:pointer}
.radio-option input[type="radio"]{margin-top:3px;accent-color:var(--teal-mid);width:16px;height:16px;cursor:pointer;flex-shrink:0}
.radio-option span{font-size:13px;color:var(--charcoal-soft);line-height:1.4}
.promo-banner{background:rgba(26,138,111,.08);border:1px solid rgba(26,138,111,.2);border-radius:8px;padding:12px 14px;margin-top:8px;display:none}
.promo-banner.visible{display:block}
.promo-banner p{font-size:12px;color:var(--teal-darkest);line-height:1.5;margin:0}
.promo-banner strong{color:var(--terracotta)}
.flag-banner{background:rgba(198,93,58,.08);border:1px solid rgba(198,93,58,.2);border-radius:8px;padding:12px 14px;margin-top:8px;display:none}
.flag-banner.visible{display:block}
.flag-banner p{font-size:12px;color:var(--terracotta-deep);line-height:1.5;margin:0}

/* CONSENT CHECKBOXES */
.consent-section{display:none;margin-top:8px;padding-top:16px;border-top:1px solid var(--gray-line)}
.portal-ce .consent-section{display:block}
.consent-label{font-size:11px;font-weight:600;letter-spacing:1px;text-transform:uppercase;color:var(--teal-darkest);margin-bottom:12px}
.consent-item{display:flex;align-items:flex-start;gap:10px;padding:8px 0;cursor:pointer}
.consent-item input[type="checkbox"]{margin-top:2px;accent-color:var(--teal-mid);width:16px;height:16px;cursor:pointer;flex-shrink:0}
.consent-item span{font-size:12px;color:var(--charcoal-soft);line-height:1.5}
.consent-item span a{color:var(--terracotta);text-decoration:none;font-weight:600}
.consent-item.optional span{color:var(--charcoal-soft);font-style:italic}
.consent-tag{font-size:9px;font-weight:700;letter-spacing:.5px;text-transform:uppercase;padding:2px 6px;border-radius:3px;margin-right:4px;vertical-align:middle}
.consent-tag.required{background:var(--terracotta);color:var(--white)}
.consent-tag.opt{background:var(--gray-line);color:var(--charcoal-soft)}

.btn-submit{display:block;width:100%;padding:14px;border-radius:6px;font-size:15px;font-weight:600;font-family:var(--sans);cursor:pointer;transition:all .2s;margin-top:4px;border:2px solid}
.btn-submit.student-btn{background:var(--teal-darkest);color:var(--white);border-color:var(--teal-darkest)}
.btn-submit.student-btn:hover{background:var(--teal-deep);border-color:var(--teal-deep)}
.btn-submit.ce-btn{background:#1a3a5c;color:var(--white);border-color:#1a3a5c}
.btn-submit.ce-btn:hover{background:#153050;border-color:#153050}
.btn-submit.instructor-btn{background:var(--terracotta);color:var(--white);border-color:var(--terracotta)}
.btn-submit.instructor-btn:hover{background:var(--terracotta-deep);border-color:var(--terracotta-deep)}
.btn-submit:disabled{opacity:.4;cursor:not-allowed;transform:none}
.btn-submit{font-size:13px;letter-spacing:.3px}

/* FILE UPLOAD */
.file-upload{position:relative}
.file-upload input[type="file"]{position:absolute;inset:0;opacity:0;cursor:pointer;z-index:2}
.file-upload-display{border:2px dashed var(--gray-line);border-radius:8px;padding:20px;text-align:center;transition:border-color .2s;cursor:pointer;background:var(--cream)}
.file-upload:hover .file-upload-display{border-color:var(--teal-mid)}
.file-upload-display svg{width:24px;height:24px;color:var(--teal-mid);margin-bottom:6px}
.file-upload-display span{display:block;font-size:13px;color:var(--charcoal);font-weight:500}
.file-upload-display small{display:block;font-size:11px;color:var(--charcoal-soft);margin-top:2px}
.file-upload-display.has-file{border-color:var(--teal-mid);border-style:solid;background:rgba(26,138,111,.05)}
.file-upload-display.has-file span{color:var(--teal-darkest)}

.form-links{text-align:center;margin-top:16px;font-size:12px;color:var(--charcoal-soft)}
.form-links a{color:var(--terracotta);font-weight:600;text-decoration:none}
.form-links a:hover{color:var(--terracotta-deep)}

.form-legal{text-align:center;font-size:10px;color:var(--charcoal-soft);margin-top:14px;line-height:1.5}
.form-legal a{color:var(--teal-mid);text-decoration:none}

.form-divider{display:flex;align-items:center;gap:14px;margin:18px 0;font-size:11px;color:var(--charcoal-soft)}
.form-divider::before,.form-divider::after{content:'';flex:1;height:1px;background:var(--gray-line)}

/* FOOTER */
.footer-mini{background:var(--teal-darkest);padding:18px 32px;text-align:center;font-size:11px;color:rgba(245,237,224,.45)}
.footer-mini a{color:rgba(245,237,224,.55);text-decoration:none;margin:0 8px}
.footer-mini a:hover{color:var(--terracotta)}

/* RESPONSIVE */
@media(max-width:860px){
  .login-container{grid-template-columns:1fr;max-width:520px}
  .brand-panel{padding:36px 32px}
  .form-panel{padding:32px 28px}
  .portal-tab{font-size:11px}
  .form-row{grid-template-columns:1fr}
}
@media(max-width:480px){
  .nav-links{display:none}
  .portal-tabs{flex-direction:column;gap:4px}
}

</style>
</head>
<body>
@include('preloader')

<nav class="nav">
  <div class="nav-inner">
    @php
      // Same destination as site logo / icon click
      $homeUrl = route('frontendHomePage');
      if (!isset($menus) || !$menus) {
          try {
              $menus = \Modules\FrontendManage\Entities\HeaderMenu::orderBy('position', 'asc')
                  ->select('id', 'type', 'element_id', 'title', 'link', 'parent_id', 'position', 'show', 'is_newtab', 'mega_menu', 'mega_menu_column', 'permissions')
                  ->with('childs')
                  ->get();
          } catch (\Exception $e) {
              $menus = collect();
          }
      }
    @endphp
    <a href="{{ $homeUrl }}" class="nav-brand">Merkaii <span class="nav-brand-accent">Xcellence Prep</span></a>
    <ul class="nav-links">
      @foreach ($menus->where('parent_id', null) as $menu)
        @php
          $permissions = json_decode($menu->permissions, true);
          if ($menu->title == 'Forum' && !isModuleActive('Forum')) {
            continue;
          }
          if ($menu->link == '/saas-signup') {
            if (Auth::check()) {
              continue;
            } elseif (SaasDomain() != 'main') {
              continue;
            }
          }
          $menuUrl = getMenuLink($menu);
        @endphp
        @if (headerMenuPermissions($permissions))
          @if ($menu->element_id == null || $menu->element_id != 0)
            <li>
              <a @if ($menu->is_newtab == 1) target="_blank" @endif href="{{ $menuUrl }}">
                {{ $menu->title }}
              </a>
            </li>
          @endif
        @endif
      @endforeach
    </ul>
    <a href="{{ $homeUrl }}" class="nav-home">Back to Home</a>
  </div>
</nav>

<main class="login-page">
  <div class="login-container">

    <!-- LEFT: BRAND PANEL (changes with portal selection) -->
    <div class="brand-panel" id="brandPanel" data-theme="student">

      <!-- Student brand content (default) -->
      <div class="brand-content" id="brand-student">
        <div class="brand-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
        <h2>Student Portal</h2>
        <p class="brand-desc">Access your on-demand courses, join live lectures, participate in the student community, and track your progress &mdash; all from one dashboard.</p>
        <ul class="brand-features">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>On-demand course library</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Live lecture sessions &amp; recordings</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Student community &amp; forums</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Progress tracking &amp; certificates</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Coaching program access</li>
        </ul>
      </div>

      <!-- CE brand content -->
      <div class="brand-content" id="brand-ce" style="display:none">
        <div class="brand-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h2>CE Professional Portal</h2>
        <p class="brand-desc">Access your Florida Board of Nursing approved CEU courses, download completion certificates, and track your CE Broker reporting status.</p>
        <ul class="brand-features">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>FL Board of Nursing approved</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Auto-reported to CE Broker</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Instant certificate download</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Self-paced completion</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>CE transcript dashboard</li>
        </ul>
      </div>

      <!-- Instructor brand content -->
      <div class="brand-content" id="brand-instructor" style="display:none">
        <div class="brand-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h2>Instructor &amp; Tutor Portal</h2>
        <p class="brand-desc">Manage your courses, access your teaching schedule, view student progress, and connect with the MXP educator community.</p>
        <ul class="brand-features">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Course management dashboard</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Teaching schedule &amp; calendar</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Student progress &amp; analytics</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Live session tools</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Educator community</li>
        </ul>
      </div>

      <div class="brand-footer">
        <p class="brand-tagline">Knowledge &middot; Understanding &middot; Wisdom</p>
        <p class="brand-motto">&ldquo;A Struggling Student is not a Failing Student&rdquo;</p>
      </div>
    </div>

    <!-- RIGHT: FORM PANEL -->
    <div class="form-panel portal-student">

      <!-- PORTAL SELECTOR TABS -->
      <div class="portal-tabs">
        <button class="portal-tab active" onclick="switchPortal('student')">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          Student
        </button>
        <button class="portal-tab" onclick="switchPortal('ce')">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          CE Professional
        </button>
        <button class="portal-tab" onclick="switchPortal('instructor')">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Instructor / Tutor
        </button>
      </div>

      <!-- AUTH TOGGLE: Sign In / Create Account -->
      <div class="auth-toggle">
        <button type="button" class="auth-btn{{ ($errors->any() && old('signup_source') === 'login_create') ? '' : ' active' }}" onclick="switchAuth('signin')">Sign In</button>
        <button type="button" class="auth-btn{{ ($errors->any() && old('signup_source') === 'login_create') ? ' active' : '' }}" onclick="switchAuth('create')">Create Account</button>
      </div>

      <!-- ==========================================
           SIGN IN (Universal — same for all portals)
           Wired to existing POST /login — backend redirect by role_id
           ========================================== -->
      <div class="auth-panel{{ ($errors->any() && old('signup_source') === 'login_create') ? '' : ' active' }}" id="auth-signin">
        <form action="{{ route('login') }}" method="POST" id="loginForm">
          @csrf
          @if ($errors->any())
            <div class="form-group" style="margin-bottom:12px;">
              @foreach ($errors->all() as $error)
                <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;">{{ $error }}</p>
              @endforeach
            </div>
          @endif
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autocomplete="username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
          </div>

          @if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true')
            <div class="form-group">
              @if (saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
                {!! NoCaptcha::display(['data-size' => 'invisible']) !!}
              @else
                {!! NoCaptcha::display() !!}
              @endif
            </div>
          @endif

          @if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true' && saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
            <button type="button" class="btn-submit student-btn g-recaptcha" id="signinBtn"
              data-sitekey="{{ saasEnv('NOCAPTCHA_SITEKEY') }}" data-size="invisible"
              data-callback="onLoginSubmit">Sign In &rarr;</button>
          @else
            <button type="submit" class="btn-submit student-btn" id="signinBtn">Sign In &rarr;</button>
          @endif
        </form>
        <p class="form-links" style="margin-top:14px"><a href="{{ route('SendPasswordResetLink') }}">Forgot your password?</a></p>
        <div class="form-divider">or</div>
        <p class="form-links">Don&rsquo;t have an account? <a href="#" onclick="switchAuth('create');return false;">Create one now</a></p>
      </div>

      <!-- ==========================================
           CREATE ACCOUNT (fields change by portal)
           Student portal posts to preRegister; CE/Instructor UI only for now
           ========================================== -->
      <div class="auth-panel{{ ($errors->any() && old('signup_source') === 'login_create') ? ' active' : '' }}" id="auth-create">
        <form action="{{ route('preRegister') }}" method="POST" id="createAccountForm">
          @csrf
          <input type="hidden" name="signup_source" value="login_create">
          <input type="hidden" name="name" id="createFullName" value="{{ old('name') }}">

          @if ($errors->any() && old('signup_source') === 'login_create')
            <div class="form-group" style="margin-bottom:12px;">
              @foreach ($errors->all() as $error)
                <p class="hint" style="color:var(--terracotta);font-size:12px;margin:0 0 4px;">{{ $error }}</p>
              @endforeach
            </div>
          @endif

        <!-- Shared fields: Name + Email -->
        <div class="form-row">
          <div class="form-group">
            <label>First Name <span class="req">*</span></label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required autocomplete="given-name">
          </div>
          <div class="form-group">
            <label>Last Name <span class="req">*</span></label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required autocomplete="family-name">
          </div>
        </div>
        <div class="form-group">
          <label>Email Address <span class="req">*</span></label>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autocomplete="email">
        </div>

        <!-- STUDENT-SPECIFIC FIELDS -->
        <div class="student-fields">
          <div class="form-row">
            <div class="form-group">
              <label>I am studying for <span class="req">*</span></label>
              <select id="studentCredential" name="studying_for" onchange="handleStudentCredential(this.value)" required>
                <option value="" disabled {{ old('studying_for') ? '' : 'selected' }}>Select credential</option>
                <option value="rn" {{ old('studying_for') === 'rn' ? 'selected' : '' }}>RN (Registered Nurse)</option>
                <option value="pn" {{ old('studying_for') === 'pn' ? 'selected' : '' }}>PN (Practical Nurse)</option>
                <option value="cna" {{ old('studying_for') === 'cna' ? 'selected' : '' }}>CNA (Certified Nursing Assistant)</option>
              </select>
            </div>
            <div class="form-group student-journey-field" id="studentJourneyGroup" style="{{ in_array(old('studying_for'), ['rn', 'pn'], true) ? 'display:block' : 'display:none' }}">
              <label>Where are you in your journey? <span class="req">*</span></label>
              <select id="studentJourney" name="student_journey">
                <option value="" disabled {{ old('student_journey') ? '' : 'selected' }}>Select your situation</option>
                <option value="nursing-school" {{ old('student_journey') === 'nursing-school' ? 'selected' : '' }}>Currently in Nursing School</option>
                <option value="repeat-tester" {{ old('student_journey') === 'repeat-tester' ? 'selected' : '' }}>Repeat Test-Taker (Failed NCLEX)</option>
                <option value="reentry" {{ old('student_journey') === 'reentry' ? 'selected' : '' }}>Re-Entry (Dismissed &amp; Coming Back)</option>
              </select>
            </div>
          </div>
        </div>

        <!-- CE-SPECIFIC FIELDS (UI only — not submitted for student signup) -->
        <div class="ce-fields">
          <div class="form-row">
            <div class="form-group">
              <label>FL License Number <span class="req">*</span></label>
              <input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="e.g. 1234567" oninput="this.value=this.value.replace(/[^0-9]/g,'')" disabled>
              <p class="hint">Numbers only â€” do not include RN, LPN, or APRN prefix</p>
            </div>
            <div class="form-group">
              <label>License Type <span class="req">*</span></label>
              <select id="licenseType" onchange="handleLicenseType(this.value)" disabled>
                <option value="" disabled selected>Select type</option>
                <option value="rn">Registered Nurse (RN)</option>
                <option value="lpn">Licensed Practical Nurse (LPN)</option>
                <option value="aprn">Advanced Practice RN (APRN)</option>
              </select>
            </div>
          </div>

          <!-- APRN DYNAMIC FIELDS â€” only visible when APRN selected -->
          <div class="aprn-fields" id="aprnFields">

            <div class="radio-group">
              <label>Are you a Nationally Certified APRN? <span class="req">*</span></label>
              <label class="radio-option">
                <input type="radio" name="aprn_certified_ui" value="yes" onchange="handleCertified(true)" disabled>
                <span>Yes, I hold an active national certification (ANCC, AANP, NCC, NBCRNA, etc.)</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="aprn_certified_ui" value="no" onchange="handleCertified(false)" disabled>
                <span>No</span>
              </label>
              <div class="promo-banner" id="certifiedPromo">
                <p><strong>You qualify for the 5-Hour Exemption Bundle.</strong> As a nationally certified APRN, you only need Safe &amp; Effective Prescribing (3h) and Human Trafficking (2h) to complete your renewal. <a href="#" style="color:var(--terracotta);font-weight:600;">View APRN Packages &rarr;</a></p>
              </div>
            </div>

            <div class="radio-group">
              <label>Are you registered as an Autonomous APRN in Florida? <span class="req">*</span></label>
              <label class="radio-option">
                <input type="radio" name="aprn_autonomous_ui" value="yes" onchange="handleAutonomous(true)" disabled>
                <span>Yes, I practice without a supervisory protocol</span>
              </label>
              <label class="radio-option">
                <input type="radio" name="aprn_autonomous_ui" value="no" onchange="handleAutonomous(false)" disabled>
                <span>No</span>
              </label>
              <div class="flag-banner" id="autonomousFlag">
                <p>Your profile will be flagged for the additional 10 contact hours of CME electives required for autonomous APRNs. We&rsquo;ll make sure your dashboard reflects the correct total requirement.</p>
              </div>
            </div>

          </div>

          <!-- LEGAL & REPORTING CONSENTS (CE Portal only) -->
          <div class="consent-section">
            <p class="consent-label">Legal &amp; Reporting Consents</p>

            <label class="consent-item">
              <input type="checkbox" class="consent-mandatory" onchange="checkConsents()" disabled>
              <span><span class="consent-tag required">Required</span> I certify that the nursing license information provided above is accurate, active, and belongs to me. I understand that typographical errors may result in credit reporting delays or failures with <a href="https://cebroker.com" target="_blank">CE Broker</a>.</span>
            </label>

            <label class="consent-item">
              <input type="checkbox" class="consent-mandatory" onchange="checkConsents()" disabled>
              <span><span class="consent-tag required">Required</span> I authorize Merkaii Xcellence Prep to electronically transmit my course completion data, license number, and registration details to CE Broker and the Florida Department of Health for licensure compliance tracking.</span>
            </label>

            <label class="consent-item optional">
              <input type="checkbox" disabled>
              <span><span class="consent-tag opt">Optional</span> Send me email updates regarding upcoming Florida nursing renewal deadlines, new pharmacology electives, and bundle discounts.</span>
            </label>
          </div>
        </div>

        <!-- INSTRUCTOR-SPECIFIC FIELDS (UI only) -->
        <div class="instructor-fields">
          <div class="form-row">
            <div class="form-group">
              <label>Credentials / Certification <span class="req">*</span></label>
              <input type="text" placeholder="e.g. MSN, RN, CNE" disabled>
              <p class="hint">Your professional credentials</p>
            </div>
            <div class="form-group">
              <label>Specialty Area <span class="req">*</span></label>
              <select disabled>
                <option value="" disabled selected>Select specialty</option>
                <option value="medsurg">Medical-Surgical</option>
                <option value="pharm">Pharmacology</option>
                <option value="peds">Pediatrics</option>
                <option value="ob">OB / Maternity</option>
                <option value="psych">Mental Health</option>
                <option value="fundamentals">Fundamentals</option>
                <option value="nclex">NCLEX Prep</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>College / University Attended <span class="req">*</span></label>
              <input type="text" placeholder="e.g. University of Central Florida" disabled>
            </div>
            <div class="form-group">
              <label>Year Graduated <span class="req">*</span></label>
              <input type="text" inputmode="numeric" pattern="[0-9]{4}" maxlength="4" placeholder="e.g. 2018" oninput="this.value=this.value.replace(/[^0-9]/g,'')" disabled>
            </div>
          </div>
          <div class="form-group">
            <label>Upload Resume / CV <span class="req">*</span></label>
            <div class="file-upload">
              <input type="file" id="resumeUpload" accept=".pdf,.doc,.docx" onchange="handleFileUpload(this)" disabled>
              <div class="file-upload-display" id="fileDisplay">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                <span>Click to upload or drag &amp; drop</span>
                <small>PDF, DOC, or DOCX â€” Max 5MB</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Shared fields: Password -->
        <div class="form-row">
          <div class="form-group">
            <label>Password <span class="req">*</span></label>
            <input type="password" name="password" placeholder="Create a password" required minlength="8" autocomplete="new-password">
          </div>
          <div class="form-group">
            <label>Confirm Password <span class="req">*</span></label>
            <input type="password" name="password_confirmation" placeholder="Confirm password" required minlength="8" autocomplete="new-password">
          </div>
        </div>

        @php
          $createCaptchaKey = saasEnv('NOCAPTCHA_SITEKEY') ?: env('NOCAPTCHA_SITEKEY');
        @endphp
        @if (!empty($createCaptchaKey))
          <div class="form-group" id="createCaptchaWrap">
            @if (saasEnv('NOCAPTCHA_IS_INVISIBLE') == 'true')
              {!! NoCaptcha::display(['data-size' => 'invisible']) !!}
            @else
              {!! NoCaptcha::display() !!}
            @endif
          </div>
        @endif

        <button type="submit" class="btn-submit student-btn" id="createBtn">CREATE MY ACCOUNT &amp; CONTINUE REGISTRATION &rarr;</button>
        <p class="form-legal">By creating an account you agree to our <a href="{{ route('terms') }}">Terms of Service</a> and <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Privacy Policy</a>.</p>
        </form>
      </div>

    </div>
  </div>
</main>

<div class="footer-mini">
  &copy; Merakii International Societe, Inc &middot; Established 2019 &middot;
  <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Privacy</a><a href="{{ route('terms') }}">Terms</a><a href="{{ url('/') }}">Home</a><a href="{{ route('contact') }}">Contact</a>
</div>

<script>
let currentPortal = 'student';

function switchPortal(portal) {
  currentPortal = portal;
  // Update portal tabs
  document.querySelectorAll('.portal-tab').forEach(t => t.classList.remove('active'));
  event.currentTarget.classList.add('active');

  // Update brand panel theme + content
  const bp = document.getElementById('brandPanel');
  bp.setAttribute('data-theme', portal === 'ce' ? 'ce' : portal === 'instructor' ? 'instructor' : 'student');
  document.querySelectorAll('.brand-content').forEach(c => c.style.display = 'none');
  document.getElementById('brand-' + portal).style.display = 'block';

  // Update form portal class for conditional fields
  const fp = document.querySelector('.form-panel');
  fp.classList.remove('portal-student', 'portal-ce', 'portal-instructor');
  fp.classList.add('portal-' + portal);

  // Reset APRN fields when switching portals
  const aprnFields = document.getElementById('aprnFields');
  if (aprnFields) aprnFields.classList.remove('visible');

  // Reset student journey dropdown when switching portals
  const journeyGroup = document.getElementById('studentJourneyGroup');
  if (journeyGroup) journeyGroup.style.display = 'none';

  // Update button styles and consent state
  updateButtons();
  checkConsents();
  syncStudentFieldRequirements();
}

function switchAuth(mode) {
  document.querySelectorAll('.auth-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.auth-panel').forEach(p => p.classList.remove('active'));
  if (mode === 'signin') {
    document.querySelectorAll('.auth-btn')[0].classList.add('active');
    document.getElementById('auth-signin').classList.add('active');
  } else {
    document.querySelectorAll('.auth-btn')[1].classList.add('active');
    document.getElementById('auth-create').classList.add('active');
  }
}

function updateButtons() {
  const classes = { student: 'student-btn', ce: 'ce-btn', instructor: 'instructor-btn' };
  ['signinBtn', 'createBtn'].forEach(id => {
    const btn = document.getElementById(id);
    if (!btn) return;
    const keepRecaptcha = btn.classList.contains('g-recaptcha');
    btn.className = 'btn-submit ' + (classes[currentPortal] || 'student-btn') + (keepRecaptcha ? ' g-recaptcha' : '');
  });
  checkConsents();
}

// APRN dynamic fields â€” show when APRN selected as license type
function handleLicenseType(value) {
  const aprnFields = document.getElementById('aprnFields');
  if (value === 'aprn') {
    aprnFields.classList.add('visible');
  } else {
    aprnFields.classList.remove('visible');
    // Reset radio buttons and banners
    document.querySelectorAll('input[name="aprn_certified_ui"]').forEach(r => r.checked = false);
    document.querySelectorAll('input[name="aprn_autonomous_ui"]').forEach(r => r.checked = false);
    document.getElementById('certifiedPromo').classList.remove('visible');
    document.getElementById('autonomousFlag').classList.remove('visible');
  }
}

// Show/hide certified promo banner
function handleCertified(isCertified) {
  const promo = document.getElementById('certifiedPromo');
  if (isCertified) {
    promo.classList.add('visible');
  } else {
    promo.classList.remove('visible');
  }
}

// Show/hide autonomous flag banner
function handleAutonomous(isAutonomous) {
  const flag = document.getElementById('autonomousFlag');
  if (isAutonomous) {
    flag.classList.add('visible');
  } else {
    flag.classList.remove('visible');
  }
}

// Student credential â€” show journey dropdown for RN/PN, hide for CNA
function handleStudentCredential(value) {
  const journeyGroup = document.getElementById('studentJourneyGroup');
  const journey = document.getElementById('studentJourney');
  if (value === 'rn' || value === 'pn') {
    journeyGroup.style.display = 'block';
    if (journey) journey.required = currentPortal === 'student';
  } else {
    journeyGroup.style.display = 'none';
    if (journey) {
      journey.required = false;
      journey.selectedIndex = 0;
    }
  }
}

function syncStudentFieldRequirements() {
  const cred = document.getElementById('studentCredential');
  const journey = document.getElementById('studentJourney');
  if (!cred) return;
  if (currentPortal === 'student') {
    cred.required = true;
    handleStudentCredential(cred.value);
  } else {
    cred.required = false;
    if (journey) journey.required = false;
  }
}

// File upload display handler
function handleFileUpload(input) {
  const display = document.getElementById('fileDisplay');
  if (input.files && input.files[0]) {
    const fileName = input.files[0].name;
    const fileSize = (input.files[0].size / 1024 / 1024).toFixed(1);
    display.classList.add('has-file');
    display.querySelector('span').textContent = fileName;
    display.querySelector('small').textContent = fileSize + ' MB';
  }
}

// Consent checkbox validation â€” disable Create Account until both mandatory are checked
function checkConsents() {
  const createBtn = document.getElementById('createBtn');
  if (!createBtn) return;

  // Only enforce consent checks for CE portal
  if (currentPortal === 'ce') {
    const mandatory = document.querySelectorAll('.consent-mandatory');
    const allChecked = Array.from(mandatory).every(cb => cb.checked);
    createBtn.disabled = !allChecked;
  } else {
    createBtn.disabled = false;
  }
}

// Initialize consent state on load
document.addEventListener('DOMContentLoaded', function () {
  checkConsents();
  syncStudentFieldRequirements();

  const createForm = document.getElementById('createAccountForm');
  if (createForm) {
    createForm.addEventListener('submit', function (e) {
      if (currentPortal !== 'student') {
        e.preventDefault();
        alert('CE Professional and Instructor signup will be available soon. Please use the Student portal to create an account.');
        return false;
      }
      const first = (createForm.querySelector('[name="first_name"]') || {}).value || '';
      const last = (createForm.querySelector('[name="last_name"]') || {}).value || '';
      const fullName = document.getElementById('createFullName');
      if (fullName) fullName.value = (first + ' ' + last).trim();
    });
  }
});

// Same site preloader hide behavior as other frontend pages
(function () {
  function hidePreloader() {
    var el = document.querySelector('.preloader');
    if (!el) return;
    el.style.transition = 'opacity 0.35s ease';
    el.style.opacity = '0';
    setTimeout(function () {
      el.style.display = 'none';
    }, 400);
  }
  if (document.readyState === 'complete') {
    setTimeout(hidePreloader, 0);
  } else {
    window.addEventListener('load', function () {
      setTimeout(hidePreloader, 0);
    });
  }
})();
</script>
<script src="{{ asset('public/js/jquery-3.5.1.min.js') }}{{ assetVersion() }}"></script>
<script src="{{ asset('public/js/toastr.min.js') }}{{ assetVersion() }}"></script>
{!! Toastr::message() !!}
@if (saasEnv('NOCAPTCHA_FOR_LOGIN') == 'true' || !empty(saasEnv('NOCAPTCHA_SITEKEY') ?: env('NOCAPTCHA_SITEKEY')))
  {!! NoCaptcha::renderJs() !!}
  <script>
    function onLoginSubmit(token) {
      document.getElementById('loginForm').submit();
    }
  </script>
@endif

</body>
</html>
