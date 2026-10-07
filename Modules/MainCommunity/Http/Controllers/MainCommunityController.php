<?php

namespace Modules\MainCommunity\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\MainCommunity\Contracts\ForumServiceInterface;
use Modules\MainCommunity\Http\Controllers\Concerns\RendersForumViews;

class MainCommunityController extends Controller
{
    use RendersForumViews;

    public function __construct(
        protected ForumServiceInterface $forum
    ) {}

    public function index()
    {
        $categories = $this->forum->categories();
        $discussionSort = mainCommunityTopicSort(request()->query('discussions'));
        $recentDiscussions = $this->forum->recentDiscussions($discussionSort);

        return $this->renderForum('index', compact('categories', 'recentDiscussions', 'discussionSort'));
    }

    public function category($slug)
    {
        $category = $this->forum->category($slug);

        if (! $category) {
            abort(404);
        }

        $topicSort = mainCommunityTopicSort(request()->query('sort'));
        $topics = $this->forum->topicsForCategory($slug, $topicSort);

        return $this->renderForum('category', compact('category', 'topics', 'topicSort'));
    }

    public function topic($id)
    {
        $thread = $this->forum->thread((int) $id);

        if (! $thread) {
            abort(404);
        }

        $topic = $thread['topic'];
        $posts = $thread['posts'];
        $replies_count = $thread['replies_count'];
        $topicIsDatabase = (bool) ($thread['is_database'] ?? false);
        $shares_count = (int) ($thread['shares_count'] ?? 0);
        $views_count = (int) ($thread['views_count'] ?? ($topic['views_count'] ?? 0));
        $topicIsLocked = (bool) ($thread['is_locked'] ?? false);

        return $this->renderForum('thread', compact(
            'topic',
            'posts',
            'replies_count',
            'topicIsDatabase',
            'shares_count',
            'views_count',
            'topicIsLocked'
        ));
    }
}
