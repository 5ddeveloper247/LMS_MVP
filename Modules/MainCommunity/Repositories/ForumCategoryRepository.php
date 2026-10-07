<?php

namespace Modules\MainCommunity\Repositories;

use Illuminate\Support\Collection;
use Modules\MainCommunity\Contracts\ForumCategoryRepositoryInterface;
use Modules\MainCommunity\Entities\CommunityForumCategories;

class ForumCategoryRepository implements ForumCategoryRepositoryInterface
{
    public function getActive(): Collection
    {
        return CommunityForumCategories::active()->ordered()->get();
    }

    public function findActiveBySlug(string $slug): ?CommunityForumCategories
    {
        return CommunityForumCategories::active()->where('slug', $slug)->first();
    }

    public function incrementTopicsCount(int $categoryId, int $by = 1): void
    {
        CommunityForumCategories::whereKey($categoryId)->increment('topics_count', $by);
    }

    public function incrementRepliesCount(int $categoryId, int $by = 1): void
    {
        CommunityForumCategories::whereKey($categoryId)->increment('replies_count', $by);
    }
}