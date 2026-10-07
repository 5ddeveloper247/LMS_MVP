<?php

namespace Modules\MainCommunity\Services;

use Illuminate\Support\Facades\Schema;
use Modules\MainCommunity\Contracts\ForumServiceInterface;

class ForumService implements ForumServiceInterface
{
    public function __construct(
        protected CategoryService $categoryService,
        protected ForumTopicService $topicService
    ) {}

    public function categories(): array
    {
        if ($this->canUseDatabaseCategories()) {
            return $this->categoryService->all();
        }

        return $this->shouldUseDemoFallback() ? ForumDemoData::categories() : [];
    }

    public function category(string $slug): ?array
    {
        if ($this->canUseDatabaseCategories()) {
            return $this->categoryService->find($slug);
        }

        return $this->shouldUseDemoFallback() ? ForumDemoData::category($slug) : null;
    }

    public function topicsForCategory(string $slug, string $sort = 'latest'): array
    {
        $sort = mainCommunityTopicSort($sort);

        if ($this->canUseDatabaseTopics()) {
            return $this->topicService->listForCategory($slug, $sort);
        }

        if (! $this->shouldUseDemoFallback()) {
            return [];
        }

        return $this->sortDemoTopics(ForumDemoData::topicsForCategory($slug), $sort);
    }

    public function recentDiscussions(string $sort = 'latest'): array
    {
        $sort = mainCommunityTopicSort($sort);

        if ($this->canUseDatabaseTopics()) {
            return $this->topicService->listRecentDiscussions($sort);
        }

        if (! $this->shouldUseDemoFallback()) {
            return [];
        }

        $topics = $this->sortDemoTopics($this->flattenDemoTopics(), $sort);
        $limit = (int) config('maincommunity.recent_discussions_limit', 10);

        return array_slice($topics, 0, max(1, $limit));
    }

    public function thread(int $id): ?array
    {
        if ($this->canUseDatabaseTopics()) {
            $thread = $this->topicService->threadById($id, auth()->user());
            if ($thread !== null) {
                return $thread;
            }

            if (! $this->shouldUseDemoFallback()) {
                return null;
            }
        }

        return $this->shouldUseDemoFallback() ? ForumDemoData::thread($id) : null;
    }

    protected function canUseDatabaseCategories(): bool
    {
        try {
            return Schema::hasTable('forum_categories');
        } catch (\Throwable) {
            return false;
        }
    }

    protected function canUseDatabaseTopics(): bool
    {
        try {
            return Schema::hasTable('forum_topics');
        } catch (\Throwable) {
            return false;
        }
    }

    protected function shouldUseDemoFallback(): bool
    {
        return (bool) config('maincommunity.demo_fallback', false);
    }

    /** @param  array<int, array<string, mixed>>  $topics */
    protected function sortDemoTopics(array $topics, string $sort): array
    {
        $collection = collect($topics);

        $sorted = match ($sort) {
            'popular' => $collection->sortByDesc(
                fn ($t) => ((int) ($t['replies'] ?? 0) * 100000) + (int) ($t['views'] ?? 0)
            ),
            'unanswered' => $collection->filter(fn ($t) => (int) ($t['replies'] ?? 0) === 0),
            default => $collection,
        };

        return $sorted->values()->all();
    }

    /** @return array<int, array<string, mixed>> */
    protected function flattenDemoTopics(): array
    {
        $all = [];
        foreach (ForumDemoData::categories() as $slug => $category) {
            foreach (ForumDemoData::topicsForCategory($slug) as $topic) {
                $topic['category_name'] = $category['name'];
                $topic['category_accent'] = $category['accent'] ?? '';
                $all[] = $topic;
            }
        }

        return $all;
    }
}
