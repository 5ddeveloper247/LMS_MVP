<?php

namespace Modules\MainCommunity\Services;

use Modules\MainCommunity\Contracts\ForumCategoryRepositoryInterface;
use Modules\MainCommunity\Entities\CommunityForumCategories;

class CategoryService
{
    protected ForumCategoryRepositoryInterface $repository;

    public function __construct(ForumCategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Saari active categories, slug => array.
     * Shape bilkul ForumDemoData::categories() jaisa hai, isliye Blade nahi badlegi.
     */
    public function all(): array
    {
        return $this->repository->getActive()
            ->mapWithKeys(fn ($category) => [$category->slug => $this->toArray($category)])
            ->all();
    }

    /**
     * Slug se ek category, nahi mili to null (controller 404 dega).
     */
    public function find(string $slug): ?array
    {
        $category = $this->repository->findActiveBySlug($slug);

        return $category ? $this->toArray($category) : null;
    }

    /**
     * Model ko view ke array shape me convert karna.
     */
    protected function toArray(CommunityForumCategories $category): array
    {
        return [
            'slug'          => $category->slug,
            'name'          => $category->name,
            'description'   => $category->description,
            'accent'        => $category->accent_color ?? '',
            'topics_count'  => $category->topics_count,          // int, e.g. 342
            'replies_count' => $category->replies_count_short,   // string, e.g. "1.8K"
        ];
    }
}