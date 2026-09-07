<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Registration') }}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ getCourseImage(Settings('favicon')) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/css/preloader.css') }}{{ assetVersion() }}" />
<link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}{{ assetVersion() }}" />
<script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
<style>
:root{--teal-mid:#1A8A6F;--teal-deep:#0F6E56;--teal-darkest:#0A4D3C;--terracotta:#C65D3A;--terracotta-deep:#A84B2D;--cream:#F5EDE0;--cream-warm:#EFE3D0;--charcoal:#2B2B2B;--charcoal-soft:#4A4A4A;--white:#FFFFFF;--gray-line:#E8DFD0;--serif:'Playfair Display',Georgia,serif;--sans:'Montserrat',system-ui,sans-serif;--shadow-md:0 8px 24px rgba(10,77,60,.10);--shadow-lg:0 20px 50px rgba(10,77,60,.15)}
*{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth}body{font-family:var(--sans);color:var(--charcoal);background:var(--cream);line-height:1.6;-webkit-font-smoothing:antialiased;min-height:100vh;display:flex;flex-direction:column}h1,h2,h3,h4{font-family:var(--serif);font-weight:700;line-height:1.2;color:var(--teal-darkest)}

.nav{background:rgba(245,237,224,.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--gray-line);padding:16px 0}
.nav-inner{max-width:1240px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;gap:32px}
.nav-brand{font-family:var(--serif);font-weight:700;font-size:20px;color:var(--teal-darkest);text-decoration:none}
.nav-brand-accent{color:var(--terracotta);font-style:italic}
.nav-links{display:flex;gap:28px;list-style:none;flex-wrap:wrap}
.nav-links a{font-size:14px;font-weight:500;color:var(--charcoal);text-decoration:none;transition:color .2s}
.nav-links a:hover{color:var(--teal-mid)}
.nav-home{background:var(--teal-darkest);color:var(--white);padding:10px 22px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:600;transition:background .2s;white-space:nowrap}
.nav-home:hover{background:var(--teal-deep)}

.login-page{flex:1;display:flex;align-items:center;justify-content:center;padding:50px 24px}
.login-container{max-width:1060px;width:100%;display:grid;grid-template-columns:380px 1fr;border-radius:24px;overflow:hidden;box-shadow:var(--shadow-lg);background:var(--white);min-height:640px}

.brand-panel{padding:52px 40px;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden;background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%)}
.brand-panel::before{content:'';position:absolute;top:-80px;right:-80px;width:280px;height:280px;background:radial-gradient(circle,rgba(245,237,224,.12) 0%,transparent 70%);border-radius:50%}
.brand-panel>*{position:relative;z-index:1}
.brand-icon{width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;margin-bottom:24px}
.brand-icon svg{width:26px;height:26px;color:var(--white)}
.brand-panel h2{font-size:26px;color:var(--white);margin-bottom:12px}
.brand-panel .brand-desc{font-size:14px;color:rgba(245,237,224,.8);line-height:1.7;margin-bottom:28px}
.brand-features{list-style:none}
.brand-features li{padding:7px 0;font-size:13px;color:rgba(245,237,224,.85);display:flex;align-items:center;gap:10px}
.brand-features li svg{width:16px;height:16px;flex-shrink:0;color:var(--terracotta)}
.brand-footer{margin-top:auto;padding-top:28px;border-top:1px solid rgba(255,255,255,.12)}
.brand-tagline{font-family:var(--serif);font-style:italic;font-size:14px;color:var(--cream);opacity:.65}
.brand-motto{font-family:var(--serif);font-style:italic;font-size:12px;color:rgba(245,237,224,.45);margin-top:4px}

.form-panel{padding:44px 44px;display:flex;flex-direction:column;max-height:calc(100vh - 140px);overflow-y:auto}
.form-panel-title{font-family:var(--serif);font-size:28px;color:var(--teal-darkest);margin-bottom:6px}
.form-panel-sub{font-size:13px;color:var(--charcoal-soft);margin-bottom:22px}

.reg-steps{display:flex;gap:8px;margin-bottom:22px}
.reg-step{flex:1;height:4px;border-radius:4px;background:var(--gray-line)}
.reg-step.active,.reg-step.done{background:var(--teal-mid)}
.reg-step-label{font-size:11px;font-weight:600;letter-spacing:.4px;text-transform:uppercase;color:var(--charcoal-soft);margin-bottom:18px}

.form-group{margin-bottom:16px}
.form-group label{display:block;font-size:12px;font-weight:600;color:var(--teal-darkest);margin-bottom:5px}
.form-group label .req{color:var(--terracotta);font-size:10px}
.form-group input,.form-group select{width:100%;padding:11px 14px;border:1.5px solid var(--gray-line);border-radius:6px;font-size:14px;font-family:var(--sans);color:var(--charcoal);background:var(--white);transition:border-color .2s}
.form-group input:focus,.form-group select:focus{outline:none;border-color:var(--teal-mid)}
.form-group .hint{font-size:10px;color:var(--charcoal-soft);margin-top:3px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.reg-fee-note{font-size:13px;font-weight:700;color:var(--terracotta);margin-bottom:14px}

.btn-submit{width:100%;padding:14px 24px;border:none;border-radius:8px;font-size:14px;font-weight:700;font-family:var(--sans);cursor:pointer;transition:all .2s;letter-spacing:.3px}
.student-btn{background:var(--teal-darkest);color:var(--white)}.student-btn:hover{background:var(--teal-deep);transform:translateY(-1px)}
.form-legal{text-align:center;font-size:10px;color:var(--charcoal-soft);margin-top:14px;line-height:1.5}
.form-legal a{color:var(--teal-mid);text-decoration:none}

.signature-box{position:relative;border:1.5px solid var(--gray-line);border-radius:8px;height:155px;width:100%;overflow:hidden;background:var(--white)}
#root{height:100%;width:100%}
.signature-box canvas{height:100%}
.signature-date{position:absolute;bottom:0;left:0;padding:5px;z-index:2}
.signature-actions{position:absolute;bottom:4px;right:6px;z-index:2;display:flex;gap:4px}
.sig-btn{background:var(--teal-mid);border:none;border-radius:5px;font-size:12px;color:#fff;font-weight:600;padding:6px 10px;cursor:pointer;font-family:var(--sans)}
.sig-btn:hover{background:var(--teal-deep)}
.signature-preview{display:none}
.btn-upload-sig{display:block;width:100%;text-align:center;margin-top:10px;padding:11px 14px;border:1.5px dashed var(--gray-line);border-radius:6px;font-size:13px;font-weight:600;color:var(--teal-darkest);cursor:pointer;background:var(--cream)}
.btn-upload-sig:hover{border-color:var(--teal-mid);background:rgba(26,138,111,.06)}

.decl-text{background:var(--cream);border:1px solid var(--gray-line);border-radius:8px;padding:14px 16px;max-height:220px;overflow-y:auto;margin-top:6px}
.decl-text p{font-size:12px;color:var(--charcoal-soft);line-height:1.55;margin:0 0 10px}
.decl-text p:last-child{margin-bottom:0}

.footer-mini{background:var(--teal-darkest);padding:18px 32px;text-align:center;font-size:11px;color:rgba(245,237,224,.45)}
.footer-mini a{color:rgba(245,237,224,.55);text-decoration:none;margin:0 8px}
.footer-mini a:hover{color:var(--terracotta)}

@media(max-width:900px){.login-container{grid-template-columns:1fr}.brand-panel{display:none}.form-panel{padding:32px 28px;max-height:none}.form-row{grid-template-columns:1fr}.nav-links{display:none}}
</style>
</head>
<body>
@include('preloader')

@php
  $registerStep = $registerStep ?? 1;
  $registerStepTotal = $registerStepTotal ?? 4;
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

<nav class="nav">
  <div class="nav-inner">
    <a href="{{ $homeUrl }}" class="nav-brand">Merkaii <span class="nav-brand-accent">Xcellence Prep</span></a>
    <ul class="nav-links">
      @foreach ($menus->where('parent_id', null) as $menu)
        @php
          $permissions = json_decode($menu->permissions, true);
          if ($menu->title == 'Forum' && !isModuleActive('Forum')) { continue; }
          if ($menu->link == '/saas-signup') {
            if (Auth::check()) { continue; }
            elseif (SaasDomain() != 'main') { continue; }
          }
          $menuUrl = getMenuLink($menu);
        @endphp
        @if (headerMenuPermissions($permissions))
          @if ($menu->element_id == null || $menu->element_id != 0)
            <li>
              <a @if ($menu->is_newtab == 1) target="_blank" @endif href="{{ $menuUrl }}">{{ $menu->title }}</a>
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
    <div class="brand-panel">
      <div class="brand-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
      <h2>Student Registration</h2>
      <p class="brand-desc">Complete your profile to unlock courses, live lectures, community access, and progress tracking.</p>
      <ul class="brand-features">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Profile details</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Declaration</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Agreement &amp; enrollment</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Same secure backend flow</li>
      </ul>
      <div class="brand-footer">
        <p class="brand-tagline">Knowledge · Understanding · Wisdom</p>
        <p class="brand-motto">&ldquo;A Struggling Student is not a Failing Student&rdquo;</p>
      </div>
    </div>

    <div class="form-panel">
      <h1 class="form-panel-title">{{ $registerStepTitle ?? 'Complete Your Profile' }}</h1>
      <p class="form-panel-sub">{{ $registerStepSubtitle ?? 'Step ' . $registerStep . ' of ' . $registerStepTotal . ' — please fill the form below to continue.' }}</p>

      <div class="reg-steps" aria-hidden="true">
        @for ($i = 1; $i <= $registerStepTotal; $i++)
          <div class="reg-step{{ $i < $registerStep ? ' done' : ($i === $registerStep ? ' active' : '') }}"></div>
        @endfor
      </div>
      <p class="reg-step-label">Registration · Step {{ $registerStep }} / {{ $registerStepTotal }}</p>

      @include($registerStepPartial)
    </div>
  </div>
</main>

<div class="footer-mini">
  &copy; Merakii International Societe, Inc &middot; Established 2019 &middot;
  <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Privacy</a><a href="{{ route('terms') }}">Terms</a><a href="{{ url('/') }}">Home</a><a href="{{ route('contact') }}">Contact</a>
</div>

<script src="{{ asset('public/js/jquery-3.5.1.min.js') }}{{ assetVersion() }}"></script>
<script src="{{ asset('public/js/toastr.min.js') }}{{ assetVersion() }}"></script>
{!! Toastr::message() !!}
@stack('register_scripts')

<script>
(function () {
  function hidePreloader() {
    var el = document.querySelector('.preloader');
    if (!el) return;
    el.style.transition = 'opacity 0.35s ease';
    el.style.opacity = '0';
    setTimeout(function () { el.style.display = 'none'; }, 400);
  }
  if (document.readyState === 'complete') setTimeout(hidePreloader, 0);
  else window.addEventListener('load', function () { setTimeout(hidePreloader, 0); });
})();
</script>
</body>
</html>
