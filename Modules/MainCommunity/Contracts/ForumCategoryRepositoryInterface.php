<?php

namespace Modules\MainCommunity\Contracts;

use Illuminate\Support\Collection;
use Modules\MainCommunity\Entities\CommunityForumCategories;

interface ForumCategoryRepositoryInterface
{
    public function getActive(): Collection;

    public function findActiveBySlug(string $slug): ?CommunityForumCategories;

    // Topic/reply create hone pe counters ke liye (Step 4/5 me use honge)
    public function incrementTopicsCount(int $categoryId, int $by = 1): void;

    public function incrementRepliesCount(int $categoryId, int $by = 1): void;
}