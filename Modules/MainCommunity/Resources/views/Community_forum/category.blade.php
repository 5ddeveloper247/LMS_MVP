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

.mxp-forum .forum-crumb {
  font-size: 13px;
  color: var(--charcoal-soft);
  margin-bottom: 20px;
}
.mxp-forum .forum-crumb a { color: var(--teal-mid); font-weight: 500; }
.mxp-forum .forum-crumb a:hover { color: var(--terracotta); }
.mxp-forum .forum-crumb span { margin: 0 8px; opacity: .45; }

.mxp-forum .page-top {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 12px;
  gap: 16px;
  flex-wrap: wrap;
}
.mxp-forum .page-top h1 { font-size: 28px; margin-bottom: 8px; }
.mxp-forum .page-top .cat-desc {
  font-size: 14px;
  color: var(--charcoal-soft);
  max-width: 640px;
  line-height: 1.55;
}
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

.mxp-forum .cat-meta-bar {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
  margin: 18px 0 28px;
  font-size: 13px;
  color: var(--charcoal-soft);
}
.mxp-forum .cat-meta-bar strong { color: var(--teal-deep); }
.mxp-forum .cat-pill {
  display: inline-block;
  background: var(--cream-warm);
  border: 1px solid var(--gray-line);
  color: var(--teal-deep);
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .6px;
  text-transform: uppercase;
  padding: 4px 12px;
  border-radius: 20px;
}
.mxp-forum .cat-pill.accent { color: var(--terracotta); }
.mxp-forum .cat-pill.dark { color: var(--teal-darkest); }

.mxp-forum .topics-toolbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
  margin-bottom: 18px;
}
.mxp-forum .topics-toolbar h2 {
  font-size: 18px;
}
.mxp-forum .threads-filter { display: flex; gap: 8px; flex-wrap: wrap; }
.mxp-forum a.filter-btn {
  text-decoration: none;
  display: inline-block;
}
.mxp-forum .filter-btn {
  background: var(--white);
  border: 1px solid var(--gray-line);
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
  border-color: var(--teal-darkest);
  color: var(--white);
}

.mxp-forum .topics-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
}
.mxp-forum .topic-card {
  background: var(--white);
  border: 1px solid var(--gray-line);
  border-radius: 14px;
  padding: 22px 22px 18px;
  display: flex;
  flex-direction: column;
  gap: 14px;
  transition: all 0.2s;
  color: inherit;
  min-height: 100%;
}
.mxp-forum .topic-card:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-md);
  color: inherit;
  border-color: rgba(26, 138, 111, 0.25);
}
.mxp-forum .topic-card-top {
  display: flex;
  align-items: flex-start;
  gap: 14px;
}
.mxp-forum .thread-avatar {
  width: 42px;
  height: 42px;
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
.mxp-forum .topic-card h3 {
  font-family: var(--sans);
  font-size: 15px;
  font-weight: 600;
  color: var(--charcoal);
  margin-bottom: 6px;
  line-height: 1.35;
}
.mxp-forum .topic-card:hover h3 { color: var(--teal-mid); }
.mxp-forum .topic-card .topic-excerpt {
  font-size: 13px;
  color: var(--charcoal-soft);
  line-height: 1.55;
}
.mxp-forum .topic-card .topic-author {
  font-size: 12px;
  color: var(--charcoal-soft);
  margin-top: 8px;
}
.mxp-forum .topic-card .topic-author strong { color: var(--teal-deep); font-weight: 600; }
.mxp-forum .topic-card-footer {
  margin-top: auto;
  padding-top: 14px;
  border-top: 1px solid var(--gray-line);
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
  font-size: 12px;
  color: var(--charcoal-soft);
}
.mxp-forum .topic-stats {
  display: flex;
  gap: 14px;
}
.mxp-forum .topic-stats strong {
  color: var(--teal-darkest);
  font-family: var(--serif);
  font-size: 15px;
  font-weight: 700;
  margin-right: 4px;
}

.mxp-forum .empty-topics {
  grid-column: 1 / -1;
  background: var(--white);
  border: 1px dashed var(--gray-line);
  border-radius: 14px;
  padding: 40px 24px;
  text-align: center;
  color: var(--charcoal-soft);
}

@media (max-width: 900px) {
  .mxp-forum { padding: 20px 16px 24px; }
  .mxp-forum .topics-grid { grid-template-columns: 1fr; }
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

                        <div class="forum-crumb">
                            <a href="{{ route('main-community.index') }}">Community Forum</a>
                            <span>&rsaquo;</span>
                            {{ $category['name'] }}
                        </div>

                        <div class="page-top">
                            <div>
                                <h1>{{ $category['name'] }}</h1>
                                <p class="cat-desc">{{ $category['description'] }}</p>
                            </div>
                            <a href="{{ route('main-community.topics.create', ['category' => $category['slug']]) }}" class="new-topic-btn">+ New Topic</a>
                        </div>

                        <div class="cat-meta-bar">
                            <span class="cat-pill {{ $category['accent'] }}">{{ $category['name'] }}</span>
                            <span><strong>{{ count($topics) }}</strong> topics shown</span>
                            <span><strong>{{ $category['topics_count'] }}</strong> total topics</span>
                            <span><strong>{{ $category['replies_count'] }}</strong> replies</span>
                        </div>

                        <div class="topics-toolbar">
                            <h2>Topics in this category</h2>
                            <div class="threads-filter">
                                <a href="{{ route('main-community.category', ['slug' => $category['slug'], 'sort' => 'latest']) }}" class="filter-btn {{ ($topicSort ?? 'latest') === 'latest' ? 'active' : '' }}">Latest</a>
                                <a href="{{ route('main-community.category', ['slug' => $category['slug'], 'sort' => 'popular']) }}" class="filter-btn {{ ($topicSort ?? '') === 'popular' ? 'active' : '' }}">Popular</a>
                                <a href="{{ route('main-community.category', ['slug' => $category['slug'], 'sort' => 'unanswered']) }}" class="filter-btn {{ ($topicSort ?? '') === 'unanswered' ? 'active' : '' }}">Unanswered</a>
                            </div>
                        </div>

                        <div class="topics-grid">
                            @forelse($topics as $topic)
                                <a href="{{ route('main-community.topic', $topic['id']) }}" class="topic-card">
                                    <div class="topic-card-top">
                                        <div class="thread-avatar {{ $topic['avatar_class'] }}">{{ $topic['avatar'] }}</div>
                                        <div>
                                            <h3>{{ $topic['title'] }}</h3>
                                            <p class="topic-excerpt">{{ $topic['excerpt'] }}</p>
                                            <p class="topic-author">
                                                <strong>{{ $topic['author'] }}</strong> · {{ $topic['role_label'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="topic-card-footer">
                                        <div class="topic-stats">
                                            <span><strong>{{ $topic['replies'] }}</strong> replies</span>
                                            <span><strong>{{ $topic['views'] }}</strong> views</span>
                                        </div>
                                        <span>{{ $topic['time'] }}</span>
                                    </div>
                                </a>
                            @empty
                                <div class="empty-topics">
                                    No topics in this category yet. Be the first to start a discussion.
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
