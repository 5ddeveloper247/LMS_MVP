<?php

namespace Modules\MainCommunity\Contracts;

interface ForumServiceInterface
{
    /** @return array<string, array<string, mixed>> */
    public function categories(): array;

    public function category(string $slug): ?array;

    /** @return array<int, array<string, mixed>> */
    public function topicsForCategory(string $slug, string $sort = 'latest'): array;

    /** @return array<int, array<string, mixed>> */
    public function recentDiscussions(string $sort = 'latest'): array;

    /** @return array{topic: array, posts: array, replies_count: int}|null */
    public function thread(int $id): ?array;
}
