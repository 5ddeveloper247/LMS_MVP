<?php

namespace Modules\MainCommunity\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\MainCommunity\Contracts\ForumTopicRepositoryInterface;
use Modules\MainCommunity\Entities\CommunityForumCategories;
use Modules\MainCommunity\Entities\CommunityForumTopics;

class ForumTopicRepository implements ForumTopicRepositoryInterface
{
    public function listForCategorySlug(string $slug, string $sort = 'latest'): Collection
    {
        $category = CommunityForumCategories::active()->where('slug', $slug)->first();

        if (! $category) {
            return collect();
        }

        $query = CommunityForumTopics::query()
            ->with(['author', 'category'])
            ->where('category_id', $category->id);

        if ($sort === 'latest') {
            $query->orderByDesc('is_pinned');
        }

        $this->applySort($query, $sort);

        return $query->get();
    }

    public function listRecent(string $sort = 'latest', int $limit = 10): Collection
    {
        $query = CommunityForumTopics::query()
            ->with(['author', 'category']);

        $this->applySort($query, $sort);

        return $query->limit(max(1, $limit))->get();
    }

    public function findById(int $id): ?CommunityForumTopics
    {
        return CommunityForumTopics::query()
            ->with([
                'author',
                'category',
                'replies' => fn ($query) => $query->with('author')->orderBy('created_at'),
            ])
            ->find($id);
    }

    protected function applySort(Builder $query, string $sort): void
    {
        match ($sort) {
            'popular' => $query
                ->orderByDesc('replies_count')
                ->orderByDesc('views_count')
                ->orderByDesc('created_at'),
            'unanswered' => $query
                ->where('replies_count', 0)
                ->orderByDesc('created_at'),
            default => $query->orderByDesc('created_at'),
        };
    }
}
