@php
    $reactionTypes = mainCommunityReactionTypes();
    $summary = $post['reaction_summary'] ?? [];
    $total = (int) ($post['reactions_total'] ?? 0);
    $userReaction = $post['user_reaction'] ?? null;
    $actionLabel = $post['reaction_action_label'] ?? 'Like';
    $reactUrl = $post['react_url'] ?? '';
    $reactionsListUrl = $post['reactions_list_url'] ?? '';
    $summaryLabel = $post['reaction_summary_label'] ?? '';
    $postKey = ($post['react_kind'] ?? 'post') . '-' . ($post['react_id'] ?? 0);
@endphp

<div class="post-reactions-wrap" data-post-key="{{ $postKey }}">
    @if($total > 0)
        <button
            type="button"
            class="post-reactions-summary js-forum-reactions-open"
            data-reactions-list-url="{{ $reactionsListUrl }}"
            aria-haspopup="dialog"
        >
            <span class="post-reactions-icons" aria-hidden="true">
                @foreach(array_slice($summary, 0, 3) as $item)
                    <span class="post-reaction-bubble" title="{{ $item['label'] }}">{{ $item['emoji'] }}</span>
                @endforeach
            </span>
            <span class="post-reactions-summary-text js-forum-reactions-summary-text">{{ $summaryLabel }}</span>
        </button>
    @else
        <div class="post-reactions-bar is-empty" data-reactions-bar hidden></div>
    @endif

    <div class="post-actions">
        <div class="forum-react-wrap">
            <button
                type="button"
                class="post-action js-forum-react-trigger {{ $userReaction ? 'has-reaction' : '' }}"
                data-react-url="{{ $reactUrl }}"
                data-reactions-list-url="{{ $reactionsListUrl }}"
                data-user-reaction="{{ $userReaction ?? '' }}"
                aria-haspopup="true"
                aria-expanded="false"
            >
                <span class="js-forum-react-trigger-emoji" data-default-emoji="👍">
                    @if($userReaction && isset($reactionTypes[$userReaction]))
                        {{ $reactionTypes[$userReaction]['emoji'] }}
                    @else
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
                    @endif
                </span>
                <span class="js-forum-react-trigger-label">{{ $actionLabel }}</span>
            </button>
            <div class="forum-react-picker" hidden role="menu">
                @foreach($reactionTypes as $type => $meta)
                    <button
                        type="button"
                        class="forum-react-option {{ $userReaction === $type ? 'is-active' : '' }}"
                        data-reaction="{{ $type }}"
                        title="{{ $meta['label'] }}"
                        role="menuitem"
                    >{{ $meta['emoji'] }}</button>
                @endforeach
            </div>
        </div>

        <a href="#reply-composer" class="post-action">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Reply
        </a>

        @if(! empty($post['is_original']))
            <button
                type="button"
                class="post-action js-forum-open-share"
                data-share-url="{{ route('main-community.topic', $topic['id']) }}"
                data-share-title="{{ e($topic['title'] ?? 'Community discussion') }}"
                data-share-record-url="{{ route('main-community.topics.share', $topic['id']) }}"
                data-shares-count="{{ (int) ($shares_count ?? 0) }}"
                aria-haspopup="dialog"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                Share (<span class="js-forum-share-btn-count">{{ (int) ($shares_count ?? 0) }}</span>)
            </button>
        @endif
    </div>
</div>
