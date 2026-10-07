<?php

namespace Modules\MainCommunity\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\MainCommunity\Entities\CommunityForumReplies;
use Modules\MainCommunity\Entities\CommunityForumTopics;
use Modules\MainCommunity\Services\ForumEngagementService;

class ForumEngagementController extends Controller
{
    public function __construct(
        protected ForumEngagementService $engagement
    ) {}

    public function toggleTopicLike(Request $request, CommunityForumTopics $topic)
    {
        return $this->reactTopic($request, $topic);
    }

    public function toggleReplyLike(Request $request, CommunityForumReplies $reply)
    {
        return $this->reactReply($request, $reply);
    }

    public function reactTopic(Request $request, CommunityForumTopics $topic)
    {
        $reaction = mainCommunityValidReaction($request->input('reaction', 'like'));
        $payload = $this->engagement->reactToTopic($topic, $request->user(), $reaction);

        if ($request->expectsJson()) {
            return response()->json(['success' => true] + $payload);
        }

        return redirect()->route('main-community.topic', $topic->id);
    }

    public function reactReply(Request $request, CommunityForumReplies $reply)
    {
        $reaction = mainCommunityValidReaction($request->input('reaction', 'like'));
        $payload = $this->engagement->reactToReply($reply, $request->user(), $reaction);
        $topicId = (int) $reply->topic_id;

        if ($request->expectsJson()) {
            return response()->json(['success' => true] + $payload);
        }

        return redirect()->route('main-community.topic', $topicId);
    }

    public function listTopicReactions(Request $request, CommunityForumTopics $topic)
    {
        $filter = (string) $request->query('filter', 'all');
        $payload = $this->engagement->listReactionsForModel($topic, $request->user(), $filter);

        return response()->json(['success' => true] + $payload);
    }

    public function listReplyReactions(Request $request, CommunityForumReplies $reply)
    {
        $filter = (string) $request->query('filter', 'all');
        $payload = $this->engagement->listReactionsForModel($reply, $request->user(), $filter);

        return response()->json(['success' => true] + $payload);
    }

    public function share(Request $request, CommunityForumTopics $topic)
    {
        $channel = (string) $request->input('channel', 'link');
        $allowed = ['link', 'facebook', 'twitter', 'linkedin', 'whatsapp', 'instagram'];
        if (! in_array($channel, $allowed, true)) {
            $channel = 'link';
        }

        $sharesCount = $this->engagement->recordShare($topic, $request->user(), $channel);
        $url = route('main-community.topic', $topic->id);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'shares_count' => $sharesCount,
                'url' => $url,
            ]);
        }

        return redirect()->route('main-community.topic', $topic->id);
    }
}
