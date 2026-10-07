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
.mxp-forum-thread {
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
  font-family: var(--sans);
  color: var(--charcoal);
  background: var(--cream);
  border-radius: 12px;
  padding: 28px 24px 32px;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  width: 100%;
  max-width: none;
  box-sizing: border-box;
}
.mxp-forum-thread h1,
.mxp-forum-thread h3,
.mxp-forum-thread h4 {
  font-family: var(--serif);
  font-weight: 700;
  line-height: 1.2;
  color: var(--teal-darkest);
  margin: 0;
}
.mxp-forum-thread a { text-decoration: none; }
.mxp-forum-thread p { margin: 0; }

.mxp-forum-thread .thread-breadcrumb {
  font-size: 13px;
  color: var(--charcoal-soft);
  margin-bottom: 24px;
  line-height: 1.5;
}
.mxp-forum-thread .thread-breadcrumb a { color: var(--teal-mid); font-weight: 500; }
.mxp-forum-thread .thread-breadcrumb a:hover { color: var(--terracotta); }
.mxp-forum-thread .thread-breadcrumb span { margin: 0 8px; opacity: 0.4; }

.mxp-forum-thread .thread-header { margin-bottom: 32px; }
.mxp-forum-thread .thread-header-cat {
  display: inline-block;
  background: var(--cream-warm);
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 11px;
  font-weight: 600;
  color: var(--teal-deep);
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 12px;
}
.mxp-forum-thread .thread-header h1 {
  font-size: 26px;
  color: var(--teal-darkest);
  margin-bottom: 8px;
}
.mxp-forum-thread .thread-header-meta {
  font-size: 13px;
  color: var(--charcoal-soft);
}
.mxp-forum-thread .thread-header-meta strong { color: var(--teal-deep); }

.mxp-forum-thread .post {
  background: var(--white);
  border-radius: 14px;
  border: 1px solid var(--gray-line);
  padding: 28px;
  margin-bottom: 16px;
}
.mxp-forum-thread .post.original { border-left: 4px solid var(--teal-mid); }
.mxp-forum-thread .post.instructor {
  border-left: 4px solid var(--terracotta);
  background: linear-gradient(135deg, var(--white) 0%, rgba(245, 237, 224, 0.3) 100%);
}
.mxp-forum-thread .post-header {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 18px;
}
.mxp-forum-thread .post-avatar {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--serif);
  font-weight: 700;
  font-size: 16px;
  color: var(--white);
}
.mxp-forum-thread .post-avatar.a1 { background: var(--teal-mid); }
.mxp-forum-thread .post-avatar.a2 { background: var(--teal-deep); }
.mxp-forum-thread .post-avatar.a3 { background: var(--terracotta); }
.mxp-forum-thread .post-avatar.a4 { background: var(--teal-darkest); }
.mxp-forum-thread .post-avatar.a5 { background: #7B6B5D; }
.mxp-forum-thread .post-author-info h4 {
  font-family: var(--sans);
  font-size: 14px;
  font-weight: 600;
  color: var(--charcoal);
}
.mxp-forum-thread .post-author-badge {
  display: inline-block;
  font-size: 10px;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 10px;
  margin-left: 8px;
  vertical-align: middle;
}
.mxp-forum-thread .post-author-badge.student { background: var(--cream); color: var(--teal-deep); }
.mxp-forum-thread .post-author-badge.instructor { background: var(--terracotta); color: var(--white); }
.mxp-forum-thread .post-author-badge.alumni { background: var(--teal-darkest); color: var(--cream); }
.mxp-forum-thread .post-time { font-size: 11px; color: var(--charcoal-soft); margin-top: 2px; }
.mxp-forum-thread .post-body { font-size: 15px; line-height: 1.8; color: var(--charcoal); }
.mxp-forum-thread .post-body p { margin-bottom: 14px; }
.mxp-forum-thread .post-body p:last-child { margin-bottom: 0; }
.mxp-forum-thread .post-body ul { margin: 10px 0 10px 20px; }
.mxp-forum-thread .post-body li { margin-bottom: 6px; font-size: 14.5px; }
.mxp-forum-thread .post-body blockquote {
  background: var(--cream);
  border-left: 3px solid var(--terracotta);
  border-radius: 0 8px 8px 0;
  padding: 14px 18px;
  margin: 14px 0;
  font-style: italic;
  color: var(--charcoal-soft);
  font-size: 14px;
}

.mxp-forum-thread .post-reactions-wrap {
  margin-top: 18px;
  padding-top: 14px;
  border-top: 1px solid var(--gray-line);
}
.mxp-forum-thread .post-reactions-summary {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 10px;
  padding: 0;
  border: none;
  background: none;
  cursor: pointer;
  font-family: var(--sans);
  text-align: left;
  max-width: 100%;
}
.mxp-forum-thread .post-reactions-summary:hover .post-reactions-summary-text {
  color: var(--teal-mid);
  text-decoration: underline;
}
.mxp-forum-thread .post-reactions-icons {
  display: flex;
  align-items: center;
  flex-shrink: 0;
}
.mxp-forum-thread .post-reaction-bubble {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: var(--white);
  border: 2px solid var(--white);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  line-height: 1;
  margin-left: -5px;
  box-shadow: 0 1px 2px rgba(0,0,0,.1);
}
.mxp-forum-thread .post-reaction-bubble:first-child { margin-left: 0; }
.mxp-forum-thread .post-reactions-summary-text {
  font-size: 12px;
  color: var(--charcoal-soft);
  font-weight: 500;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.mxp-forum-thread .post-actions {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-top: 12px;
  flex-wrap: wrap;
}
.mxp-forum-thread .forum-react-wrap {
  position: relative;
}
.mxp-forum-thread .forum-react-picker {
  position: absolute;
  left: 0;
  bottom: calc(100% + 10px);
  display: flex;
  gap: 6px;
  padding: 8px 10px;
  background: var(--white);
  border: 1px solid var(--gray-line);
  border-radius: 999px;
  box-shadow: 0 8px 24px rgba(10, 77, 60, 0.15);
  z-index: 20;
}
.mxp-forum-thread .forum-react-picker[hidden] { display: none !important; }
.mxp-forum-thread .forum-react-option {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: none;
  background: var(--cream);
  font-size: 22px;
  line-height: 1;
  cursor: pointer;
  transition: transform 0.12s, background 0.12s;
}
.mxp-forum-thread .forum-react-option:hover {
  transform: scale(1.15);
  background: var(--cream-warm);
}
.mxp-forum-thread .forum-react-option.is-active {
  outline: 2px solid var(--teal-mid);
  outline-offset: 2px;
}
.mxp-forum-thread .post-action.has-reaction {
  color: var(--teal-deep);
  font-weight: 600;
}
.mxp-forum-thread .js-forum-react-trigger-emoji svg { width: 16px; height: 16px; }
.mxp-forum-thread .js-forum-react-trigger-emoji {
  display: inline-flex;
  align-items: center;
  font-size: 15px;
  line-height: 1;
}
.mxp-forum-thread .post-action-form {
  display: inline;
  margin: 0;
}
.mxp-forum-thread .post-action {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  color: var(--charcoal-soft);
  cursor: pointer;
  transition: color 0.15s;
  background: none;
  border: none;
  font-family: var(--sans);
  padding: 0;
}
.mxp-forum-thread .post-action:hover { color: var(--teal-mid); }
.mxp-forum-thread .post-action svg { width: 16px; height: 16px; }
.mxp-forum-thread .post-action.liked { color: var(--terracotta); font-weight: 600; }

.mxp-forum-thread .reply-composer {
  background: var(--white);
  border-radius: 14px;
  border: 1px solid var(--gray-line);
  padding: 28px;
  margin-top: 8px;
}
.mxp-forum-thread .reply-composer h3 {
  font-family: var(--sans);
  font-size: 15px;
  font-weight: 600;
  color: var(--teal-darkest);
  margin-bottom: 16px;
}
.mxp-forum-thread .reply-textarea {
  width: 100%;
  min-height: 120px;
  padding: 16px;
  border: 1.5px solid var(--gray-line);
  border-radius: 8px;
  font-family: var(--sans);
  font-size: 14px;
  color: var(--charcoal);
  resize: vertical;
  line-height: 1.7;
}
.mxp-forum-thread .reply-textarea:focus {
  outline: none;
  border-color: var(--teal-mid);
  box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.12);
}
.mxp-forum-thread .reply-textarea::placeholder { color: #B5ADA0; }
.mxp-forum-thread .reply-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 14px;
  gap: 12px;
  flex-wrap: wrap;
}
.mxp-forum-thread .reply-hint { font-size: 12px; color: var(--charcoal-soft); }
.mxp-forum-thread .reply-submit {
  background: var(--terracotta);
  color: var(--white);
  padding: 10px 24px;
  border-radius: 6px;
  font-size: 14px;
  font-weight: 600;
  font-family: var(--sans);
  border: none;
  cursor: pointer;
  transition: all 0.2s;
}
.mxp-forum-thread .reply-submit:hover { background: var(--terracotta-deep); color: var(--white); }

.forum-share-modal {
  --teal-mid: #1A8A6F;
  --teal-deep: #0F6E56;
  --teal-darkest: #0A4D3C;
  --cream: #F5EDE0;
  --cream-warm: #EFE3D0;
  --charcoal: #2B2B2B;
  --charcoal-soft: #4A4A4A;
  --white: #FFFFFF;
  --gray-line: #E8DFD0;
  --serif: 'Playfair Display', Georgia, serif;
  --sans: 'Montserrat', system-ui, sans-serif;
  position: fixed;
  inset: 0;
  z-index: 10050;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  box-sizing: border-box;
  font-family: var(--sans);
}
.forum-share-modal[hidden] { display: none !important; }
.forum-share-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(43, 43, 43, 0.55);
}
.forum-share-dialog {
  position: relative;
  width: 100%;
  max-width: 440px;
  background: var(--white);
  border-radius: 16px;
  border: 1px solid var(--gray-line);
  padding: 28px 24px 24px;
  box-shadow: 0 24px 48px rgba(10, 77, 60, 0.18);
}
.forum-share-dialog h3 {
  font-family: var(--serif);
  font-size: 22px;
  margin-bottom: 6px;
}
.forum-share-dialog > p {
  font-size: 13px;
  color: var(--charcoal-soft);
  margin-bottom: 20px;
}
.forum-share-close {
  position: absolute;
  top: 14px;
  right: 14px;
  width: 36px;
  height: 36px;
  border: none;
  background: var(--cream);
  border-radius: 50%;
  font-size: 22px;
  line-height: 1;
  color: var(--charcoal-soft);
  cursor: pointer;
}
.forum-share-close:hover { background: var(--cream-warm); color: var(--charcoal); }
.forum-share-copy-row {
  display: flex;
  gap: 8px;
  margin-bottom: 8px;
}
.forum-share-copy-row input {
  flex: 1;
  min-width: 0;
  padding: 10px 12px;
  border: 1.5px solid var(--gray-line);
  border-radius: 8px;
  font-size: 13px;
  font-family: var(--sans);
  color: var(--charcoal);
  background: var(--cream);
}
.forum-share-copy-btn {
  flex-shrink: 0;
  padding: 10px 16px;
  border: none;
  border-radius: 8px;
  background: var(--teal-darkest);
  color: var(--white);
  font-size: 13px;
  font-weight: 600;
  font-family: var(--sans);
  cursor: pointer;
  white-space: nowrap;
}
.forum-share-copy-btn:hover { background: var(--teal-deep); }
.forum-share-copy-btn.is-copied { background: var(--teal-mid); }
.forum-share-copy-hint {
  font-size: 12px;
  color: var(--teal-deep);
  min-height: 18px;
  margin-bottom: 20px;
}
.forum-share-social-label {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--charcoal-soft);
  margin-bottom: 12px;
}
.forum-share-social {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center;
}
.forum-share-social a,
.forum-share-social button {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  cursor: pointer;
  color: var(--white);
  transition: transform 0.15s, opacity 0.15s;
  text-decoration: none;
}
.forum-share-social a:hover,
.forum-share-social button:hover {
  transform: scale(1.06);
  opacity: 0.92;
}
.forum-share-social svg { width: 22px; height: 22px; }
.forum-share-social .share-fb { background: #1877F2; }
.forum-share-social .share-ig { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
.forum-share-social .share-x { background: #0f1419; }
.forum-share-social .share-li { background: #0A66C2; }
.forum-share-social .share-wa { background: #25D366; }

.forum-reactions-drawer {
  --cream: #F5EDE0;
  --cream-warm: #EFE3D0;
  --charcoal: #2B2B2B;
  --charcoal-soft: #4A4A4A;
  --white: #FFFFFF;
  --gray-line: #E8DFD0;
  --teal-mid: #1A8A6F;
  --teal-darkest: #0A4D3C;
  --sans: 'Montserrat', system-ui, sans-serif;
  position: fixed;
  inset: 0;
  z-index: 10060;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  font-family: var(--sans);
}
.forum-reactions-drawer[hidden] { display: none !important; }
.forum-reactions-drawer-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(43, 43, 43, 0.55);
}
.forum-reactions-drawer-panel {
  position: relative;
  width: 100%;
  max-width: 520px;
  max-height: min(80vh, 640px);
  background: var(--white);
  border-radius: 16px;
  border: 1px solid var(--gray-line);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  box-shadow: 0 24px 48px rgba(10, 77, 60, 0.2);
}
.forum-reactions-drawer-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 20px 12px;
  border-bottom: 1px solid var(--gray-line);
}
.forum-reactions-drawer-head h3 {
  margin: 0;
  font-size: 18px;
  color: var(--teal-darkest);
}
.forum-reactions-drawer-tabs {
  display: flex;
  gap: 4px;
  padding: 0 16px 12px;
  border-bottom: 1px solid var(--gray-line);
  overflow-x: auto;
  flex-shrink: 0;
}
.forum-reactions-drawer-tab {
  border: none;
  background: none;
  padding: 10px 12px;
  font-size: 13px;
  font-weight: 600;
  color: var(--charcoal-soft);
  cursor: pointer;
  border-bottom: 2px solid transparent;
  white-space: nowrap;
  font-family: var(--sans);
}
.forum-reactions-drawer-tab.is-active {
  color: var(--teal-mid);
  border-bottom-color: var(--teal-mid);
}
.forum-reactions-drawer-tab .tab-emoji { margin-right: 4px; }
.forum-reactions-drawer-list {
  overflow-y: auto;
  padding: 8px 0;
  flex: 1;
}
.forum-reactions-drawer-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 20px;
}
.forum-reactions-drawer-row + .forum-reactions-drawer-row {
  border-top: 1px solid var(--gray-line);
}
.forum-reactions-drawer-avatar-wrap {
  position: relative;
  flex-shrink: 0;
}
.forum-reactions-drawer-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: var(--teal-mid);
  color: var(--white);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 14px;
}
.forum-reactions-drawer-avatar-badge {
  position: absolute;
  right: -2px;
  bottom: -2px;
  width: 22px;
  height: 22px;
  border-radius: 50%;
  background: var(--white);
  border: 2px solid var(--white);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  box-shadow: 0 1px 3px rgba(0,0,0,.12);
}
.forum-reactions-drawer-meta h4 {
  margin: 0 0 2px;
  font-size: 14px;
  font-weight: 600;
  color: var(--charcoal);
}
.forum-reactions-drawer-meta p {
  margin: 0;
  font-size: 12px;
  color: var(--charcoal-soft);
}
.forum-reactions-drawer-empty {
  padding: 32px 20px;
  text-align: center;
  color: var(--charcoal-soft);
  font-size: 14px;
}

@media (max-width: 900px) {
  .mxp-forum-thread { padding: 20px 16px 24px; }
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
                    <div class="mxp-forum-thread">

                        <div class="thread-breadcrumb">
                            <a href="{{ route('main-community.index') }}">Community</a>
                            <span>&rsaquo;</span>
                            <a href="{{ route('main-community.category', $topic['category_slug']) }}">{{ $topic['category_name'] }}</a>
                            <span>&rsaquo;</span>
                            {{ $topic['title'] }}
                        </div>

                        <div class="thread-header">
                            <span class="thread-header-cat">{{ $topic['category_name'] }}</span>
                            <h1>{{ $topic['title'] }}</h1>
                            <p class="thread-header-meta">
                                Started by <strong>{{ $topic['author'] }}</strong>
                                · {{ $replies_count }} {{ $replies_count === 1 ? 'reply' : 'replies' }}
                                @if(! empty($topicIsDatabase))
                                    · {{ number_format($views_count ?? 0) }} {{ ($views_count ?? 0) === 1 ? 'view' : 'views' }}
                                    · <span id="forum-topic-shares-count">{{ number_format($shares_count ?? 0) }}</span> {{ ($shares_count ?? 0) === 1 ? 'share' : 'shares' }}
                                @endif
                                · {{ $topic['time'] }}
                            </p>
                        </div>

                        @foreach($posts as $post)
                            @php
                                $postClass = 'post';
                                if (! empty($post['is_original'])) {
                                    $postClass .= ' original';
                                }
                                if (! empty($post['is_instructor'])) {
                                    $postClass .= ' instructor';
                                }
                            @endphp
                            <div class="{{ $postClass }}">
                                <div class="post-header">
                                    <div class="post-avatar {{ $post['avatar_class'] }}">{{ $post['avatar'] }}</div>
                                    <div class="post-author-info">
                                        <h4>
                                            {{ $post['author'] }}
                                            <span class="post-author-badge {{ $post['badge_class'] }}">{{ $post['badge'] }}</span>
                                        </h4>
                                        <p class="post-time">{{ $post['time'] }}</p>
                                    </div>
                                </div>
                                <div class="post-body">
                                    @foreach($post['body'] ?? [] as $paragraph)
                                        <p>{!! $paragraph !!}</p>
                                    @endforeach
                                    @if(! empty($post['list']))
                                        <ul>
                                            @foreach($post['list'] as $item)
                                                <li>{!! $item !!}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @foreach($post['body_after'] ?? [] as $paragraph)
                                        <p>{!! $paragraph !!}</p>
                                    @endforeach
                                    @if(! empty($post['quote']))
                                        <blockquote>{{ $post['quote'] }}</blockquote>
                                    @endif
                                </div>
                                @if(! empty($topicIsDatabase))
                                    @include('maincommunity::Community_forum.partials.post_reactions', [
                                        'post' => $post,
                                        'topic' => $topic,
                                        'shares_count' => $shares_count ?? 0,
                                    ])
                                @else
                                    <div class="post-reactions-wrap">
                                        <div class="post-actions">
                                            <button type="button" class="post-action {{ ! empty($post['liked']) ? 'liked' : '' }}" onclick="event.preventDefault();">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                                {{ $post['likes'] }} Likes
                                            </button>
                                            <button type="button" class="post-action" onclick="event.preventDefault();">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                                Reply
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="reply-composer" id="reply-composer">
                            <h3>Write a Reply</h3>
                            @if(! empty($topicIsDatabase) && empty($topicIsLocked))
                                <form method="POST" action="{{ route('main-community.topics.replies.store', $topic['id']) }}">
                                    @csrf
                                    <textarea name="body" class="reply-textarea" placeholder="Share your thoughts, ask a follow-up question, or help a fellow student..." required>{{ old('body') }}</textarea>
                                    @error('body')
                                        <p class="field-error" style="color:#b42318;font-size:12px;margin-top:6px;">{{ $message }}</p>
                                    @enderror
                                    <div class="reply-footer">
                                        <p class="reply-hint">Be supportive. We&rsquo;re all here to help each other pass.</p>
                                        <button type="submit" class="reply-submit">Post Reply &rarr;</button>
                                    </div>
                                </form>
                            @elseif(! empty($topicIsDatabase) && ! empty($topicIsLocked))
                                <p class="reply-hint">This topic is locked. New replies are not accepted.</p>
                            @else
                                <textarea class="reply-textarea" placeholder="Share your thoughts, ask a follow-up question, or help a fellow student..." disabled></textarea>
                                <div class="reply-footer">
                                    <p class="reply-hint">Replies are available on live community topics.</p>
                                </div>
                            @endif
                        </div>

                        @if(! empty($topicIsDatabase))
                            <div class="forum-share-modal" id="forum-share-modal" hidden aria-hidden="true">
                                <div class="forum-share-backdrop js-forum-share-close" aria-hidden="true"></div>
                                <div class="forum-share-dialog" role="dialog" aria-modal="true" aria-labelledby="forum-share-title">
                                    <button type="button" class="forum-share-close js-forum-share-close" aria-label="Close">&times;</button>
                                    <h3 id="forum-share-title">Share this post</h3>
                                    <p>Copy the link or share on social media.</p>
                                    <div class="forum-share-copy-row">
                                        <input type="text" id="forum-share-url-input" readonly value="" aria-label="Post link">
                                        <button type="button" class="forum-share-copy-btn" id="forum-share-copy-btn">Copy link</button>
                                    </div>
                                    <p class="forum-share-copy-hint" id="forum-share-copy-hint" aria-live="polite"></p>
                                    <p class="forum-share-social-label">Share via</p>
                                    <div class="forum-share-social">
                                        <a href="#" class="share-fb js-forum-share-channel" data-channel="facebook" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        </a>
                                        <button type="button" class="share-ig js-forum-share-instagram" data-channel="instagram" aria-label="Copy link for Instagram">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                        </button>
                                        <a href="#" class="share-x js-forum-share-channel" data-channel="twitter" target="_blank" rel="noopener noreferrer" aria-label="Share on X (Twitter)">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                        </a>
                                        <a href="#" class="share-li js-forum-share-channel" data-channel="linkedin" target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                        </a>
                                        <a href="#" class="share-wa js-forum-share-channel" data-channel="whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.883 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="forum-reactions-drawer" id="forum-reactions-drawer" hidden aria-hidden="true">
                                <div class="forum-reactions-drawer-backdrop js-forum-reactions-drawer-close"></div>
                                <div class="forum-reactions-drawer-panel" role="dialog" aria-modal="true" aria-labelledby="forum-reactions-drawer-title">
                                    <div class="forum-reactions-drawer-head">
                                        <h3 id="forum-reactions-drawer-title">Reactions</h3>
                                        <button type="button" class="forum-share-close js-forum-reactions-drawer-close" aria-label="Close">&times;</button>
                                    </div>
                                    <div class="forum-reactions-drawer-tabs" id="forum-reactions-drawer-tabs"></div>
                                    <div class="forum-reactions-drawer-list" id="forum-reactions-drawer-list"></div>
                                </div>
                            </div>

                            <script>
                                (function () {
                                    var reactionMeta = @json(mainCommunityReactionTypes());
                                    var reactCsrf = @json(csrf_token());
                                    var thumbSvg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>';
                                    var pickerHideTimer = null;

                                    function closeAllReactPickers() {
                                        document.querySelectorAll('.forum-react-picker').forEach(function (picker) {
                                            picker.hidden = true;
                                        });
                                        document.querySelectorAll('.js-forum-react-trigger').forEach(function (btn) {
                                            btn.setAttribute('aria-expanded', 'false');
                                        });
                                    }

                                    function renderTriggerEmoji(trigger, userReaction) {
                                        var emojiWrap = trigger.querySelector('.js-forum-react-trigger-emoji');
                                        if (!emojiWrap) return;
                                        if (userReaction && reactionMeta[userReaction]) {
                                            emojiWrap.innerHTML = reactionMeta[userReaction].emoji;
                                        } else {
                                            emojiWrap.innerHTML = thumbSvg;
                                        }
                                    }

                                    function escapeHtml(text) {
                                        var div = document.createElement('div');
                                        div.textContent = text == null ? '' : String(text);
                                        return div.innerHTML;
                                    }

                                    function renderReactionSummary(wrap, data) {
                                        var total = data.total || 0;
                                        var summary = data.summary || [];
                                        var summaryLabel = data.summary_label || '';
                                        var trigger = wrap.querySelector('.js-forum-react-trigger');
                                        var listUrl = trigger ? (trigger.getAttribute('data-reactions-list-url') || '') : '';
                                        var existing = wrap.querySelector('.js-forum-reactions-open');

                                        if (total <= 0) {
                                            if (existing) existing.remove();
                                            return;
                                        }

                                        var iconsHtml = summary.slice(0, 3).map(function (item) {
                                            return '<span class="post-reaction-bubble" title="' + escapeHtml(item.label) + '">' + item.emoji + '</span>';
                                        }).join('');

                                        var html =
                                            '<button type="button" class="post-reactions-summary js-forum-reactions-open" data-reactions-list-url="' + escapeHtml(listUrl) + '" aria-haspopup="dialog">' +
                                                '<span class="post-reactions-icons" aria-hidden="true">' + iconsHtml + '</span>' +
                                                '<span class="post-reactions-summary-text js-forum-reactions-summary-text">' + escapeHtml(summaryLabel) + '</span>' +
                                            '</button>';

                                        if (existing) {
                                            existing.outerHTML = html;
                                        } else {
                                            var actions = wrap.querySelector('.post-actions');
                                            if (actions) {
                                                actions.insertAdjacentHTML('beforebegin', html);
                                            }
                                        }
                                    }

                                    function applyReactionUi(wrap, data) {
                                        var trigger = wrap.querySelector('.js-forum-react-trigger');
                                        var labelEl = wrap.querySelector('.js-forum-react-trigger-label');
                                        var userReaction = data.user_reaction || '';
                                        if (trigger) {
                                            trigger.dataset.userReaction = userReaction;
                                            trigger.classList.toggle('has-reaction', !!userReaction);
                                            renderTriggerEmoji(trigger, userReaction);
                                        }
                                        if (labelEl) {
                                            labelEl.textContent = data.action_label || 'Like';
                                        }
                                        wrap.querySelectorAll('.forum-react-option').forEach(function (opt) {
                                            opt.classList.toggle('is-active', opt.getAttribute('data-reaction') === userReaction);
                                        });
                                        renderReactionSummary(wrap, data);
                                    }

                                    var reactionsDrawer = document.getElementById('forum-reactions-drawer');
                                    var reactionsTabs = document.getElementById('forum-reactions-drawer-tabs');
                                    var reactionsList = document.getElementById('forum-reactions-drawer-list');
                                    var reactionsListBaseUrl = '';
                                    var reactionsActiveFilter = 'all';

                                    function closeReactionsDrawer() {
                                        if (!reactionsDrawer) return;
                                        reactionsDrawer.hidden = true;
                                        reactionsDrawer.setAttribute('aria-hidden', 'true');
                                        document.body.style.overflow = '';
                                    }

                                    function renderReactionsDrawerTabs(tabs, active) {
                                        if (!reactionsTabs) return;
                                        reactionsTabs.innerHTML = (tabs || []).map(function (tab) {
                                            var emoji = tab.emoji ? '<span class="tab-emoji">' + tab.emoji + '</span>' : '';
                                            var label = tab.type === 'all' ? 'All ' + tab.count : (emoji + tab.count);
                                            return '<button type="button" class="forum-reactions-drawer-tab ' + (tab.type === active ? 'is-active' : '') + '" data-filter="' + tab.type + '">' + label + '</button>';
                                        }).join('');
                                    }

                                    function renderReactionsDrawerPeople(people) {
                                        if (!reactionsList) return;
                                        if (!people || !people.length) {
                                            reactionsList.innerHTML = '<div class="forum-reactions-drawer-empty">No reactions in this filter yet.</div>';
                                            return;
                                        }
                                        reactionsList.innerHTML = people.map(function (person) {
                                            var name = person.is_you ? person.name + ' (You)' : person.name;
                                            return '<div class="forum-reactions-drawer-row">' +
                                                '<div class="forum-reactions-drawer-avatar-wrap">' +
                                                    '<div class="forum-reactions-drawer-avatar">' + escapeHtml(person.avatar) + '</div>' +
                                                    '<span class="forum-reactions-drawer-avatar-badge">' + person.emoji + '</span>' +
                                                '</div>' +
                                                '<div class="forum-reactions-drawer-meta">' +
                                                    '<h4>' + escapeHtml(name) + '</h4>' +
                                                    '<p>' + escapeHtml(person.role) + ' · ' + escapeHtml(person.label) + '</p>' +
                                                '</div>' +
                                            '</div>';
                                        }).join('');
                                    }

                                    function loadReactionsDrawer(filter) {
                                        if (!reactionsListBaseUrl) return;
                                        reactionsActiveFilter = filter || 'all';
                                        var url = reactionsListBaseUrl + (reactionsListBaseUrl.indexOf('?') >= 0 ? '&' : '?') + 'filter=' + encodeURIComponent(reactionsActiveFilter);
                                        reactionsList.innerHTML = '<div class="forum-reactions-drawer-empty">Loading…</div>';
                                        fetch(url, {
                                            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                                        }).then(function (r) { return r.ok ? r.json() : null; })
                                          .then(function (data) {
                                              if (!data || !data.success) {
                                                  reactionsList.innerHTML = '<div class="forum-reactions-drawer-empty">Could not load reactions.</div>';
                                                  return;
                                              }
                                              renderReactionsDrawerTabs(data.tabs || [], reactionsActiveFilter);
                                              renderReactionsDrawerPeople(data.people || []);
                                          }).catch(function () {
                                              reactionsList.innerHTML = '<div class="forum-reactions-drawer-empty">Could not load reactions.</div>';
                                          });
                                    }

                                    function openReactionsDrawer(listUrl) {
                                        if (!reactionsDrawer || !listUrl) return;
                                        reactionsListBaseUrl = listUrl.split('?')[0];
                                        reactionsDrawer.hidden = false;
                                        reactionsDrawer.setAttribute('aria-hidden', 'false');
                                        document.body.style.overflow = 'hidden';
                                        loadReactionsDrawer('all');
                                    }

                                    document.addEventListener('click', function (e) {
                                        var openBtn = e.target.closest('.js-forum-reactions-open');
                                        if (openBtn) {
                                            e.preventDefault();
                                            openReactionsDrawer(openBtn.getAttribute('data-reactions-list-url'));
                                            return;
                                        }
                                        var tabBtn = e.target.closest('.forum-reactions-drawer-tab');
                                        if (tabBtn && reactionsDrawer && !reactionsDrawer.hidden) {
                                            loadReactionsDrawer(tabBtn.getAttribute('data-filter') || 'all');
                                        }
                                    });

                                    if (reactionsDrawer) {
                                        reactionsDrawer.querySelectorAll('.js-forum-reactions-drawer-close').forEach(function (el) {
                                            el.addEventListener('click', closeReactionsDrawer);
                                        });
                                    }
                                    document.addEventListener('keydown', function (e) {
                                        if (e.key === 'Escape' && reactionsDrawer && !reactionsDrawer.hidden) {
                                            closeReactionsDrawer();
                                        }
                                    });

                                    function submitReaction(wrap, reaction) {
                                        var trigger = wrap.querySelector('.js-forum-react-trigger');
                                        if (!trigger) return;
                                        var url = trigger.getAttribute('data-react-url');
                                        if (!url) return;

                                        fetch(url, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                                'X-CSRF-TOKEN': reactCsrf,
                                                'X-Requested-With': 'XMLHttpRequest'
                                            },
                                            body: JSON.stringify({ reaction: reaction })
                                        }).then(function (r) { return r.ok ? r.json() : null; })
                                          .then(function (data) {
                                              if (data && data.success) {
                                                  applyReactionUi(wrap, data);
                                              }
                                          }).catch(function () {});
                                    }

                                    document.querySelectorAll('.forum-react-wrap').forEach(function (wrapEl) {
                                        var postWrap = wrapEl.closest('.post-reactions-wrap');
                                        var trigger = wrapEl.querySelector('.js-forum-react-trigger');
                                        var picker = wrapEl.querySelector('.forum-react-picker');
                                        if (!postWrap || !trigger || !picker) return;

                                        wrapEl.addEventListener('mouseenter', function () {
                                            clearTimeout(pickerHideTimer);
                                            closeAllReactPickers();
                                            picker.hidden = false;
                                            trigger.setAttribute('aria-expanded', 'true');
                                        });

                                        wrapEl.addEventListener('mouseleave', function () {
                                            pickerHideTimer = setTimeout(function () {
                                                picker.hidden = true;
                                                trigger.setAttribute('aria-expanded', 'false');
                                            }, 280);
                                        });

                                        trigger.addEventListener('click', function (e) {
                                            e.preventDefault();
                                            var isTouchUi = window.matchMedia('(hover: none)').matches;
                                            if (isTouchUi && picker.hidden) {
                                                closeAllReactPickers();
                                                picker.hidden = false;
                                                trigger.setAttribute('aria-expanded', 'true');
                                                return;
                                            }
                                            var current = trigger.getAttribute('data-user-reaction') || '';
                                            submitReaction(postWrap, current ? current : 'like');
                                            closeAllReactPickers();
                                        });

                                        picker.querySelectorAll('.forum-react-option').forEach(function (opt) {
                                            opt.addEventListener('click', function (e) {
                                                e.preventDefault();
                                                e.stopPropagation();
                                                submitReaction(postWrap, opt.getAttribute('data-reaction') || 'like');
                                                closeAllReactPickers();
                                            });
                                        });
                                    });

                                    document.addEventListener('click', function (e) {
                                        if (!e.target.closest('.forum-react-wrap')) {
                                            closeAllReactPickers();
                                        }
                                    });
                                })();
                            </script>
                            <script>
                                (function () {
                                    var modal = document.getElementById('forum-share-modal');
                                    if (!modal) return;

                                    var urlInput = document.getElementById('forum-share-url-input');
                                    var copyBtn = document.getElementById('forum-share-copy-btn');
                                    var copyHint = document.getElementById('forum-share-copy-hint');
                                    var sharesHeader = document.getElementById('forum-topic-shares-count');
                                    var shareBtnCount = document.querySelector('.js-forum-share-btn-count');
                                    var recordUrl = '';
                                    var csrf = @json(csrf_token());
                                    var shareUrl = '';
                                    var shareTitle = '';

                                    function encode(u) { return encodeURIComponent(u); }

                                    function socialHref(channel) {
                                        if (channel === 'facebook') {
                                            return 'https://www.facebook.com/sharer/sharer.php?u=' + encode(shareUrl);
                                        }
                                        if (channel === 'twitter') {
                                            return 'https://twitter.com/intent/tweet?url=' + encode(shareUrl) + '&text=' + encode(shareTitle);
                                        }
                                        if (channel === 'linkedin') {
                                            return 'https://www.linkedin.com/sharing/share-offsite/?url=' + encode(shareUrl);
                                        }
                                        if (channel === 'whatsapp') {
                                            return 'https://api.whatsapp.com/send?text=' + encode(shareTitle + ' ' + shareUrl);
                                        }
                                        return shareUrl;
                                    }

                                    function updateShareCounts(count) {
                                        var n = parseInt(count, 10);
                                        if (isNaN(n)) return;
                                        if (sharesHeader) sharesHeader.textContent = n.toLocaleString();
                                        if (shareBtnCount) shareBtnCount.textContent = String(n);
                                    }

                                    function recordShare(channel) {
                                        if (!recordUrl) return;
                                        fetch(recordUrl, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                                'X-CSRF-TOKEN': csrf,
                                                'X-Requested-With': 'XMLHttpRequest'
                                            },
                                            body: JSON.stringify({ channel: channel })
                                        }).then(function (r) { return r.ok ? r.json() : null; })
                                          .then(function (data) {
                                              if (data && typeof data.shares_count !== 'undefined') {
                                                  updateShareCounts(data.shares_count);
                                              }
                                          }).catch(function () {});
                                    }

                                    function copyLink(opts) {
                                        opts = opts || {};
                                        var text = shareUrl || urlInput.value;
                                        function onCopied() {
                                            if (opts.hint) {
                                                copyHint.textContent = opts.hint;
                                            } else if (opts.showHint !== false) {
                                                copyHint.textContent = 'Link copied to clipboard.';
                                            }
                                            if (opts.showHint !== false || opts.hint) {
                                                copyBtn.textContent = 'Copied!';
                                                copyBtn.classList.add('is-copied');
                                                setTimeout(function () {
                                                    copyBtn.textContent = 'Copy link';
                                                    copyBtn.classList.remove('is-copied');
                                                }, 2000);
                                            }
                                            if (!opts.skipRecord) {
                                                recordShare(opts.channel || 'link');
                                            }
                                        }
                                        if (navigator.clipboard && navigator.clipboard.writeText) {
                                            navigator.clipboard.writeText(text).then(onCopied).catch(function () {
                                                urlInput.select();
                                                document.execCommand('copy');
                                                onCopied();
                                            });
                                        } else {
                                            urlInput.select();
                                            document.execCommand('copy');
                                            onCopied();
                                        }
                                    }

                                    function openModal(trigger) {
                                        shareUrl = trigger.getAttribute('data-share-url') || '';
                                        shareTitle = trigger.getAttribute('data-share-title') || 'Community discussion';
                                        recordUrl = trigger.getAttribute('data-share-record-url') || '';
                                        urlInput.value = shareUrl;
                                        copyHint.textContent = '';
                                        copyBtn.textContent = 'Copy link';
                                        copyBtn.classList.remove('is-copied');

                                        modal.querySelectorAll('.js-forum-share-channel').forEach(function (el) {
                                            el.setAttribute('href', socialHref(el.getAttribute('data-channel')));
                                        });

                                        modal.hidden = false;
                                        modal.setAttribute('aria-hidden', 'false');
                                        document.body.style.overflow = 'hidden';
                                        copyBtn.focus();
                                    }

                                    function closeModal() {
                                        modal.hidden = true;
                                        modal.setAttribute('aria-hidden', 'true');
                                        document.body.style.overflow = '';
                                    }

                                    document.querySelectorAll('.js-forum-open-share').forEach(function (btn) {
                                        btn.addEventListener('click', function () { openModal(btn); });
                                    });

                                    modal.querySelectorAll('.js-forum-share-close').forEach(function (el) {
                                        el.addEventListener('click', closeModal);
                                    });

                                    copyBtn.addEventListener('click', function () { copyLink({ showHint: true, channel: 'link' }); });

                                    modal.querySelectorAll('.js-forum-share-channel').forEach(function (el) {
                                        el.addEventListener('click', function () {
                                            recordShare(el.getAttribute('data-channel') || 'link');
                                        });
                                    });

                                    var igBtn = modal.querySelector('.js-forum-share-instagram');
                                    if (igBtn) {
                                        igBtn.addEventListener('click', function () {
                                            copyLink({
                                                channel: 'instagram',
                                                hint: 'Link copied — paste it in your Instagram story, post, or bio.'
                                            });
                                        });
                                    }

                                    document.addEventListener('keydown', function (e) {
                                        if (e.key === 'Escape' && !modal.hidden) closeModal();
                                    });
                                })();
                            </script>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
