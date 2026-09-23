@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | Resource Center
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--teal-mid:#1A8A6F;--teal-deep:#0F6E56;--teal-darkest:#0A4D3C;--terracotta:#C65D3A;--terracotta-deep:#A84B2D;--cream:#F5EDE0;--cream-warm:#EFE3D0;--charcoal:#2B2B2B;--charcoal-soft:#4A4A4A;--white:#FFFFFF;--gray-line:#E8DFD0;--serif:'Playfair Display',Georgia,serif;--sans:'Montserrat',system-ui,sans-serif;--shadow-sm:0 2px 8px rgba(10,77,60,.06);--shadow-md:0 8px 24px rgba(10,77,60,.10)}
.mxp-resource-center *{box-sizing:border-box}
.mxp-resource-center h1,.mxp-resource-center h2,.mxp-resource-center h3,.mxp-resource-center h4{font-family:var(--serif);font-weight:700;line-height:1.2;color:var(--teal-darkest)}
.mxp-resource-center .breadcrumb{background:var(--cream-warm);padding:14px 32px;border-bottom:1px solid var(--gray-line)}.mxp-resource-center .breadcrumb-inner{max-width:1240px;margin:0 auto;font-size:13px;color:var(--charcoal-soft)}.mxp-resource-center .breadcrumb-inner a{color:var(--teal-mid);text-decoration:none;font-weight:500}.mxp-resource-center .breadcrumb-inner span{margin:0 8px;opacity:.5}
.mxp-resource-center .container{max-width:1240px;margin:0 auto;padding:0 24px}
.mxp-resource-center .hero{background:linear-gradient(135deg,var(--teal-darkest) 0%,var(--teal-deep) 100%);color:var(--white);padding:70px 32px 80px;text-align:center;position:relative;overflow:hidden}.mxp-resource-center .hero::before{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(198,93,58,.15) 0%,transparent 70%);border-radius:50%}.mxp-resource-center .hero-inner{max-width:700px;margin:0 auto;position:relative;z-index:1}.mxp-resource-center .hero h1{font-size:clamp(32px,4vw,46px);color:var(--white);margin-bottom:14px}.mxp-resource-center .hero h1 em{font-style:italic;color:var(--cream);font-weight:400}.mxp-resource-center .hero-sub{font-size:17px;color:var(--cream-warm);line-height:1.6}
.mxp-resource-center .audience-tabs{background:var(--white);padding:0 32px;border-bottom:1px solid var(--gray-line);position:sticky;top:56px;z-index:90}
.mxp-resource-center .tabs-inner{max-width:1000px;margin:0 auto;display:flex;gap:0}
.mxp-resource-center .aud-tab{flex:1;padding:16px 20px;text-align:center;font-size:14px;font-weight:600;color:var(--charcoal-soft);cursor:pointer;border-bottom:3px solid transparent;transition:all .2s;background:none;border-top:none;border-left:none;border-right:none;font-family:var(--sans);display:flex;align-items:center;justify-content:center;gap:8px}
.mxp-resource-center .aud-tab svg{width:18px;height:18px}
.mxp-resource-center .aud-tab:hover{color:var(--teal-mid)}
.mxp-resource-center .aud-tab.active{color:var(--teal-darkest);border-bottom-color:var(--terracotta)}
.mxp-resource-center .search-section{background:var(--white);padding:28px 32px 0}
.mxp-resource-center .search-inner{max-width:700px;margin:0 auto;display:flex;gap:10px}
.mxp-resource-center .search-input{flex:1;padding:12px 18px;border:1.5px solid var(--gray-line);border-radius:8px;font-family:var(--sans);font-size:14px;background:var(--cream)}.mxp-resource-center .search-input:focus{outline:none;border-color:var(--teal-mid)}
.mxp-resource-center .search-btn{background:var(--teal-darkest);color:var(--white);padding:12px 24px;border-radius:8px;border:none;font-family:var(--sans);font-size:14px;font-weight:600;cursor:pointer;transition:background .2s}.mxp-resource-center .search-btn:hover{background:var(--teal-deep)}
.mxp-resource-center .resource-panel{display:none;padding:40px 32px 80px;background:var(--cream)}.mxp-resource-center .resource-panel.active{display:block}
.mxp-resource-center .panel-inner{max-width:1080px;margin:0 auto}
.mxp-resource-center .panel-section{margin-bottom:48px}
.mxp-resource-center .panel-section-label{font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--terracotta);margin-bottom:18px}
.mxp-resource-center .panel-section h2{font-size:26px;margin-bottom:10px}
.mxp-resource-center .panel-section>p{font-size:15px;color:var(--charcoal-soft);margin-bottom:24px;line-height:1.6}
.mxp-resource-center .res-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px}
.mxp-resource-center .res-card{background:var(--white);border-radius:12px;border:1px solid var(--gray-line);padding:24px;display:flex;gap:16px;align-items:flex-start;transition:all .2s;text-decoration:none;color:inherit}
.mxp-resource-center .res-card:hover{box-shadow:var(--shadow-sm);transform:translateY(-2px);border-color:var(--teal-mid)}
.mxp-resource-center .res-icon{width:48px;height:48px;border-radius:10px;flex-shrink:0;display:flex;align-items:center;justify-content:center}
.mxp-resource-center .res-icon svg{width:22px;height:22px}
.mxp-resource-center .res-icon.pdf{background:rgba(198,93,58,.1);color:var(--terracotta)}
.mxp-resource-center .res-icon.video{background:rgba(26,138,111,.1);color:var(--teal-mid)}
.mxp-resource-center .res-icon.guide{background:rgba(10,77,60,.1);color:var(--teal-darkest)}
.mxp-resource-center .res-icon.tool{background:rgba(75,65,55,.1);color:var(--charcoal-soft)}
.mxp-resource-center .res-icon.reg{background:rgba(26,138,111,.15);color:var(--teal-deep)}
.mxp-resource-center .res-info h4{font-family:var(--sans);font-size:15px;font-weight:600;color:var(--teal-darkest);margin-bottom:4px}
.mxp-resource-center .res-info p{font-size:13px;color:var(--charcoal-soft);line-height:1.5;margin-bottom:6px}
.mxp-resource-center .res-tag{font-size:10px;font-weight:600;letter-spacing:1px;text-transform:uppercase;padding:3px 8px;border-radius:4px;display:inline-block}
.mxp-resource-center .res-tag.free{background:rgba(45,155,78,.1);color:#2D9B4E}
.mxp-resource-center .res-tag.member{background:rgba(26,138,111,.1);color:var(--teal-deep)}
.mxp-resource-center .res-tag.new{background:rgba(198,93,58,.1);color:var(--terracotta)}
.mxp-resource-center .featured-card{background:var(--teal-darkest);border-radius:16px;padding:40px;color:var(--white);display:grid;grid-template-columns:1fr 1fr;gap:36px;align-items:center;margin-bottom:32px}
.mxp-resource-center .featured-card h3{font-size:24px;color:var(--white);margin-bottom:10px}
.mxp-resource-center .featured-card p{font-size:15px;color:var(--cream-warm);line-height:1.6;margin-bottom:20px}
.mxp-resource-center .featured-card .btn-feat{display:inline-block;background:var(--terracotta);color:var(--white);padding:12px 28px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:600;transition:all .2s}.mxp-resource-center .featured-card .btn-feat:hover{background:var(--terracotta-deep)}
.mxp-resource-center .featured-visual{background:rgba(255,255,255,.08);border-radius:12px;padding:30px;text-align:center}
.mxp-resource-center .featured-visual .feat-stat{font-family:var(--serif);font-size:48px;font-weight:700;color:var(--white);margin-bottom:6px}
.mxp-resource-center .featured-visual .feat-label{font-size:13px;color:var(--cream-warm)}
.mxp-resource-center .resource-cta{background:var(--cream-warm);border-radius:16px;padding:40px;text-align:center;max-width:700px;margin:0 auto}
.mxp-resource-center .resource-cta h3{font-size:22px;margin-bottom:10px}
.mxp-resource-center .resource-cta p{font-size:15px;color:var(--charcoal-soft);margin-bottom:20px;line-height:1.6}
.mxp-resource-center .resource-cta .btn-res{display:inline-block;background:var(--teal-darkest);color:var(--white);padding:14px 32px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:600;transition:all .2s}.mxp-resource-center .resource-cta .btn-res:hover{background:var(--teal-deep)}
@media(max-width:960px){.mxp-resource-center .res-grid{grid-template-columns:1fr}.mxp-resource-center .featured-card{grid-template-columns:1fr}}
@media(max-width:640px){.mxp-resource-center .aud-tab{font-size:12px;padding:12px 8px}.mxp-resource-center .aud-tab svg{display:none}}
</style>

@section('mainContent')
<div class="mxp-resource-center">

<div class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>Resource Center</div></div>

<header class="hero">
  <div class="hero-inner">
    <h1>Resource <em>Center</em></h1>
    <p class="hero-sub">Free guides, study tools, regulatory updates, and reference materials &mdash; organized by where you are in your nursing journey.</p>
  </div>
</header>

<div class="audience-tabs">
  <div class="tabs-inner">
    <button type="button" class="aud-tab active" onclick="switchResTab('student', this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>Student Resources</button>
    <button type="button" class="aud-tab" onclick="switchResTab('ce', this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>CE Professional Resources</button>
    <button type="button" class="aud-tab" onclick="switchResTab('all', this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>Browse All</button>
  </div>
</div>

<div class="search-section">
  <div class="search-inner">
    <input type="text" class="search-input" id="resource-search" placeholder="Search resources...">
    <button type="button" class="search-btn" onclick="filterResources()">Search</button>
  </div>
</div>

<div class="resource-panel active" id="panel-student">
  <div class="panel-inner">

    @if($studentFeatured)
    <div class="featured-card">
      <div>
        <h3>{{ $studentFeatured->name }}</h3>
        <p>{{ $studentFeatured->short_description }}</p>
        <a href="{{ route('resource.download', $studentFeatured->id) }}" class="btn-feat">Download Free &rarr;</a>
      </div>
      <div class="featured-visual">
        <p class="feat-stat">PDF</p>
        <p class="feat-label">Featured &middot; Free Download</p>
      </div>
    </div>
    @endif

    <div class="panel-section">
      <p class="panel-section-label">Study Guides &amp; Tools</p>
      <div class="res-grid">
        @forelse($studentResources->where('is_featured', false) as $resource)
          @include(theme('components.partials.resource-card'), ['resource' => $resource])
        @empty
          @if(!$studentFeatured)
            <p class="panel-section">No student resources available yet.</p>
          @endif
        @endforelse
      </div>
    </div>

    <div class="resource-cta">
      <h3>Need more than resources?</h3>
      <p>If you&rsquo;re looking for structured support with a coach, study plan, and accountability &mdash; explore our programs.</p>
      <a href="{{ route('programs') }}" class="btn-res">View Programs &rarr;</a>
    </div>
  </div>
</div>

<div class="resource-panel" id="panel-ce">
  <div class="panel-inner">

    @if($ceFeatured)
    <div class="featured-card" style="background:linear-gradient(135deg,#0D2E3F,var(--teal-darkest))">
      <div>
        <h3>{{ $ceFeatured->name }}</h3>
        <p>{{ $ceFeatured->short_description }}</p>
        <a href="{{ route('resource.download', $ceFeatured->id) }}" class="btn-feat">Download Guide &rarr;</a>
      </div>
      <div class="featured-visual">
        <p class="feat-stat">PDF</p>
        <p class="feat-label">Featured &middot; Free Download</p>
      </div>
    </div>
    @endif

    <div class="panel-section">
      <p class="panel-section-label">CE Professional Resources</p>
      <div class="res-grid">
        @forelse($ceResources->where('is_featured', false) as $resource)
          @include(theme('components.partials.resource-card'), ['resource' => $resource])
        @empty
          @if(!$ceFeatured)
            <p class="panel-section">No CE professional resources available yet.</p>
          @endif
        @endforelse
      </div>
    </div>

    <div class="resource-cta">
      <h3>Ready to complete your renewal?</h3>
      <p>Browse our Florida Board of Nursing approved CEU courses and bundles. Auto-reported to CE Broker.</p>
      <a href="{{ url('/prep-courses') }}" class="btn-res">View CE Courses &rarr;</a>
    </div>
  </div>
</div>

<div class="resource-panel" id="panel-all">
  <div class="panel-inner">
    <div class="panel-section">
      <p class="panel-section-label">All Resources</p>
      <p>Showing all resources across both student and CE professional categories. Use the search bar above to filter by topic.</p>
      <div class="res-grid" style="margin-top:20px">
        @forelse($allResources as $resource)
          @include(theme('components.partials.resource-card'), ['resource' => $resource])
        @empty
          <p>No resources available yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>

</div>
@include(theme('partials._custom_footer'))
@endsection

@section('js')
<script>
function switchResTab(tab, el) {
  document.querySelectorAll('.mxp-resource-center .aud-tab').forEach(function(t) { t.classList.remove('active'); });
  document.querySelectorAll('.mxp-resource-center .resource-panel').forEach(function(p) { p.classList.remove('active'); });
  el.classList.add('active');
  document.getElementById('panel-' + tab).classList.add('active');
  filterResources();
}

function filterResources() {
  var query = (document.getElementById('resource-search').value || '').toLowerCase().trim();
  document.querySelectorAll('.mxp-resource-center .res-card').forEach(function(card) {
    var haystack = card.getAttribute('data-search') || '';
    card.style.display = !query || haystack.indexOf(query) !== -1 ? '' : 'none';
  });
}

document.getElementById('resource-search').addEventListener('input', filterResources);
document.getElementById('resource-search').addEventListener('keyup', function(e) {
  if (e.key === 'Enter') { filterResources(); }
});
</script>
@endsection
