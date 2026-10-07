<?php

namespace Modules\MainCommunity\Contracts;

use Illuminate\Support\Collection;
use Modules\MainCommunity\Entities\CommunityForumTopics;

interface ForumTopicRepositoryInterface
{
    public function listForCategorySlug(string $slug, string $sort = 'latest'): Collection;

    public function listRecent(string $sort = 'latest', int $limit = 10): Collection;

    public function findById(int $id): ?CommunityForumTopics;
}
