@extends($forumLayout)

@if($useAdminShell)
@push('styles')
@elseif($isCePortalShell)
@push('css')
@else
@section('css')
@endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Scoped to .mxp-forum so admin navbar/sidebar stay untouched */
.mxp-forum {
  --teal-mid: #1A8A6F;
  --teal-deep: #0F6E56;
  --teal-darkest: #0A4D3C;
  --terracotta: #C65D3A;
  --terracotta-deep: #A84B2D;
  --cream: #F5EDE0;
  --cream-warm: #EFE3D0;
  --charcoal: #2B2B2B;
  --charcoal-soft: #4A4A4A;
  --white: #FFFFFF;
  --gray-line: #E8DFD0;
  --serif: 'Playfair Display', Georgia, serif;
  --sans: 'Montserrat', system-ui, sans-serif;
  --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
  --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
  font-family: var(--sans);
  color: var(--charcoal);
  background: var(--cream);
  border-radius: 12px;
  padding: 28px 24px 32px;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}
.mxp-forum h1,
.mxp-forum h2,
.mxp-forum h3,
.mxp-forum h4 {
  font-family: var(--serif);
  font-weight: 700;
  line-height: 1.2;
  color: var(--teal-darkest);
  margin: 0;
}
.mxp-forum a { text-decoration: none; }
.mxp-forum p { margin: 0; }

.mxp-forum .page-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 28px;
  gap: 16px;
  flex-wrap: wrap;
}
.mxp-forum .page-top h1 { font-size: 28px; }
.mxp-forum .new-topic-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--terracotta);
  color: var(--white);
  padding: 12px 24px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 600;
  font-family: var(--sans);
  border: none;
  cursor: pointer;
  transition: all 0.2s;
}
.mxp-forum .new-topic-btn:hover {
  background: var(--terracotta-deep);
  transform: translateY(-1px);
  color: var(--white);
}

.mxp-forum .online-bar {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 24px;
  font-size: 13px;
  color: var(--charcoal-soft);
}
.mxp-forum .online-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #4CAF50;
  flex-shrink: 0;
}
.mxp-forum .online-bar strong { color: var(--teal-deep); }

.mxp-forum .pinned-banner {
  background: linear-gradient(135deg, var(--cream), var(--cream-warm));
  border: 1px solid var(--gray-line);
  border-left: 4px solid var(--terracotta);
  border-radius: 0 10px 10px 0;
  padding: 18px 24px;
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 14px;
}
.mxp-forum .pinned-icon { font-size: 18px; flex-shrink: 0; }
.mxp-forum .pinned-text h4 {
  font-family: var(--sans);
  font-size: 14px;
  font-weight: 600;
  color: var(--teal-darkest);
  margin-bottom: 2px;
}
.mxp-forum .pinned-text p { font-size: 13px; color: var(--charcoal-soft); }
.mxp-forum .pinned-text a { color: var(--teal-mid); font-weight: 600; }
.mxp-forum .pinned-text a:hover { color: var(--terracotta); }

.mxp-forum .categories-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-bottom: 36px;
}
.mxp-forum .cat-card {
  background: var(--white);
  border-radius: 12px;
  padding: 24px 22px;
  border: 1px solid var(--gray-line);
  border-top: 4px solid var(--teal-mid);
  transition: all 0.2s;
  cursor: pointer;
  display: block;
  color: inherit;
}
.mxp-forum .cat-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
  color: inherit;
}
.mxp-forum .cat-card.accent { border-top-color: var(--terracotta); }
.mxp-forum .cat-card.dark { border-top-color: var(--teal-darkest); }
.mxp-forum .cat-card h3 {
  font-size: 17px;
  color: var(--teal-darkest);
  margin-bottom: 6px;
}
.mxp-forum .cat-card p {
  font-size: 12.5px;
  color: var(--charcoal-soft);
  line-height: 1.5;
  margin-bottom: 12px;
}
.mxp-forum .cat-stats {
  display: flex;
  gap: 16px;
  font-size: 11px;
  color: var(--charcoal-soft);
}
.mxp-forum .cat-stats strong { color: var(--teal-deep); font-weight: 700; }

.mxp-forum .threads-section {
  background: var(--white);
  border-radius: 14px;
  border: 1px solid var(--gray-line);
  overflow: hidden;
}
.mxp-forum .threads-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--gray-line);
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}
.mxp-forum .threads-title {
  font-family: var(--serif);
  font-size: 18px;
  color: var(--teal-darkest);
}
.mxp-forum .threads-filter { display: flex; gap: 8px; flex-wrap: wrap; }
.mxp-forum a.filter-btn {
  text-decoration: none;
  display: inline-block;
}
.mxp-forum .filter-btn {
  background: var(--cream);
  border: none;
  border-radius: 20px;
  padding: 6px 14px;
  font-family: var(--sans);
  font-size: 12px;
  font-weight: 500;
  color: var(--charcoal-soft);
  cursor: pointer;
  transition: all 0.15s;
}
.mxp-forum .filter-btn:hover { background: var(--cream-warm); }
.mxp-forum .filter-btn.active {
  background: var(--teal-darkest);
  color: var(--white);
}

.mxp-forum a.thread-row {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 18px 24px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.04);
  transition: background 0.15s;
  color: inherit;
}
.mxp-forum a.thread-row:last-child { border-bottom: none; }
.mxp-forum a.thread-row:hover {
  background: rgba(245, 237, 224, 0.4);
  color: inherit;
}
.mxp-forum .thread-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--serif);
  font-weight: 700;
  font-size: 14px;
  color: var(--white);
}
.mxp-forum .thread-avatar.a1 { background: var(--teal-mid); }
.mxp-forum .thread-avatar.a2 { background: var(--teal-deep); }
.mxp-forum .thread-avatar.a3 { background: var(--terracotta); }
.mxp-forum .thread-avatar.a4 { background: var(--teal-darkest); }
.mxp-forum .thread-avatar.a5 { background: #7B6B5D; }
.mxp-forum .thread-content { flex: 1; min-width: 0; }
.mxp-forum .thread-content h4 {
  font-family: var(--sans);
  font-size: 14px;
  font-weight: 600;
  color: var(--charcoal);
  margin-bottom: 3px;
  cursor: pointer;
}
.mxp-forum .thread-content h4:hover { color: var(--teal-mid); }
.mxp-forum .thread-meta { font-size: 11.5px; color: var(--charcoal-soft); }
.mxp-forum .thread-cat {
  display: inline-block;
  background: var(--cream);
  padding: 2px 8px;
  border-radius: 10px;
  font-size: 10px;
  font-weight: 600;
  color: var(--teal-deep);
  margin-right: 6px;
}
.mxp-forum .thread-cat.accent {
  background: rgba(198, 93, 58, 0.1);
  color: var(--terracotta);
}
.mxp-forum .thread-stats {
  text-align: right;
  flex-shrink: 0;
  min-width: 80px;
}
.mxp-forum .thread-replies {
  font-family: var(--serif);
  font-weight: 700;
  font-size: 18px;
  color: var(--teal-darkest);
  line-height: 1;
}
.mxp-forum .thread-replies-label {
  font-size: 10px;
  color: var(--charcoal-soft);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.mxp-forum .thread-time {
  font-size: 11px;
  color: var(--charcoal-soft);
  margin-top: 4px;
}

.mxp-forum .threads-footer {
  padding: 16px 24px;
  border-top: 1px solid var(--gray-line);
  text-align: center;
}
.mxp-forum .threads-footer a {
  font-size: 13px;
  color: var(--teal-mid);
  font-weight: 600;
}
.mxp-forum .threads-footer a:hover { color: var(--terracotta); }

@media (max-width: 1100px) {
  .mxp-forum .categories-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .mxp-forum { padding: 20px 16px 24px; }
  .mxp-forum .categories-grid { grid-template-columns: 1fr; }
  .mxp-forum .thread-row { align-items: flex-start; }
}
</style>
@if($useAdminShell)
@endpush
@elseif($isCePortalShell)
@endpush
@else
@endsection
@endif

@section('mainContent')
    @if($useAdminShell)
        {!! generateBreadcrumb() !!}
    @endif

    <section class="{{ $useAdminShell ? 'admin-visitor-area up_st_admin_visitor' : '' }}">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="mxp-forum">
                        <div class="page-top">
                            <h1>Community Forum</h1>
                            <a href="{{ route('main-community.topics.create') }}" class="new-topic-btn">+ New Topic</a>
                        </div>

                        <div class="online-bar">
                            <span class="online-dot"></span>
                            <!-- <strong>23</strong> members online now · <strong>1,247</strong> total posts -->
                        </div>

                        <div class="pinned-banner">
                            <span class="pinned-icon">📌</span>
                            <div class="pinned-text">
                                <h4>Welcome to the MXP Community!</h4>
                                <p>New here? Start by <a href="{{route('main-community.topics.create')}}">introducing yourself</a> and reading the <a href="{{url('main-community')}}">community guidelines</a>.</p>
                            </div>
                        </div>

                        <div class="categories-grid">
                            @foreach($categories as $category)
                                <a href="{{ route('main-community.category', $category['slug']) }}" class="cat-card {{ $category['accent'] }}">
                                    <h3>{{ $category['name'] }}</h3>
                                    <p>{{ $category['description'] }}</p>
                                    <div class="cat-stats">
                                        <span><strong>{{ $category['topics_count'] }}</strong> topics</span>
                                        <span><strong>{{ $category['replies_count'] }}</strong> replies</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="threads-section">
                            <div class="threads-header">
                                <h3 class="threads-title">Recent Discussions</h3>
                                <div class="threads-filter">
                                    <a href="{{ route('main-community.index', ['discussions' => 'latest']) }}" class="filter-btn {{ ($discussionSort ?? 'latest') === 'latest' ? 'active' : '' }}">Latest</a>
                                    <a href="{{ route('main-community.index', ['discussions' => 'popular']) }}" class="filter-btn {{ ($discussionSort ?? '') === 'popular' ? 'active' : '' }}">Popular</a>
                                    <a href="{{ route('main-community.index', ['discussions' => 'unanswered']) }}" class="filter-btn {{ ($discussionSort ?? '') === 'unanswered' ? 'active' : '' }}">Unanswered</a>
                                </div>
                            </div>

                            @forelse($recentDiscussions as $discussion)
                                <a href="{{ route('main-community.topic', $discussion['id']) }}" class="thread-row">
                                    <div class="thread-avatar {{ $discussion['avatar_class'] }}">{{ $discussion['avatar'] }}</div>
                                    <div class="thread-content">
                                        <h4>{{ $discussion['title'] }}</h4>
                                        <div class="thread-meta">
                                            @if(! empty($discussion['category_name']))
                                                <span class="thread-cat {{ $discussion['category_accent'] ?? '' }}">{{ $discussion['category_name'] }}</span>
                                            @endif
                                            {{ $discussion['author'] }} · {{ $discussion['role_label'] }}
                                        </div>
                                    </div>
                                    <div class="thread-stats">
                                        <p class="thread-replies">{{ $discussion['replies'] }}</p>
                                        <p class="thread-replies-label">replies</p>
                                        <p class="thread-time">{{ $discussion['time'] }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="empty-topics" style="padding:24px;text-align:center;color:var(--charcoal-soft);">
                                    No discussions match this filter yet. <a href="{{ route('main-community.topics.create') }}">Start a topic</a>.
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
