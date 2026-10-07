<?php

namespace Modules\MainCommunity\Services;

use App\User;
use Illuminate\Support\Str;
use Modules\MainCommunity\Contracts\ForumCategoryRepositoryInterface;
use Modules\MainCommunity\Contracts\ForumTopicRepositoryInterface;
use Modules\MainCommunity\Entities\CommunityForumCategories;
use Modules\MainCommunity\Entities\CommunityForumTopics;

class ForumTopicService
{
    public function __construct(
        protected ForumCategoryRepositoryInterface $categoryRepository,
        protected ForumTopicRepositoryInterface $topicRepository,
        protected ForumTopicPresenter $presenter,
        protected ForumEngagementService $engagement
    ) {}

    /** @return array<int, array<string, mixed>> */
    public function listForCategory(string $slug, string $sort = 'latest'): array
    {
        $sort = mainCommunityTopicSort($sort);

        return $this->topicRepository
            ->listForCategorySlug($slug, $sort)
            ->map(fn (CommunityForumTopics $topic) => $this->presenter->toCategoryCard($topic))
            ->values()
            ->all();
    }

    /** @return array<int, array<string, mixed>> */
    public function listRecentDiscussions(string $sort = 'latest', ?int $limit = null): array
    {
        $sort = mainCommunityTopicSort($sort);
        $limit = $limit ?? (int) config('maincommunity.recent_discussions_limit', 10);

        return $this->topicRepository
            ->listRecent($sort, $limit)
            ->map(fn (CommunityForumTopics $topic) => $this->presenter->toRecentDiscussionRow($topic))
            ->values()
            ->all();
    }

    /** @return array{topic: array, posts: array, replies_count: int, is_database?: bool}|null */
    public function threadById(int $id, ?User $viewer = null): ?array
    {
        $topic = $this->topicRepository->findById($id);

        if (! $topic) {
            return null;
        }

        $viewer = $viewer ?? auth()->user();

        if ($viewer instanceof User) {
            $this->engagement->recordTopicView($topic, $viewer);
            $topic->refresh();
        }

        return $this->presenter->toThread($topic, $viewer);
    }

    public function create(array $data, User $user): CommunityForumTopics
    {
        $category = CommunityForumCategories::active()
            ->where('slug', $data['category'])
            ->firstOrFail();

        $topic = CommunityForumTopics::create([
            'category_id' => $category->id,
            'user_id' => $user->id,
            'title' => $data['title'],
            'slug' => $this->uniqueSlug($data['title']),
            'body' => $data['body'],
            'is_pinned' => false,
            'is_locked' => false,
            'views_count' => 0,
            'replies_count' => 0,
            'likes_count' => 0,
            'shares_count' => 0,
            'lms_id' => mainCommunityLmsId($user),
        ]);

        $this->categoryRepository->incrementTopicsCount((int) $category->id);

        return $topic;
    }

    protected function uniqueSlug(string $title): string
    {
        $base = Str::slug(Str::limit($title, 80, ''));
        if ($base === '') {
            $base = 'topic';
        }

        $slug = $base;
        $suffix = 1;

        while (CommunityForumTopics::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }
}
