<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseLevel;

class QuizPageSection extends Component
{
    public $request, $categories, $languages;

    public function __construct($request, $categories, $languages)
    {
        $this->request = $request;
        $this->categories = $categories;
        $this->languages = $languages;
    }

    public function render()
    {
        $search = trim((string) $this->request->get('filter_search_by', ''));

        $query = Course::query()
            ->where('type', 1)
            ->where('status', 1)
            ->with(['category', 'children' => fn ($q) => $q->where('status', 1)])
            ->latest();

        if ($search !== '') {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        $courses = $query->get()
            ->filter(fn (Course $course) => $this->hasSellableChild($course))
            ->values();

        $categoryFilters = $courses
            ->groupBy('category_id')
            ->map(function ($group, $categoryId) {
                $category = $group->first()->category;
                $name = $category ? $this->translatableText($category->name) : 'Uncategorized';

                return (object) [
                    'id' => $categoryId ?: 0,
                    'name' => $name,
                    'count' => $group->count(),
                ];
            })
            ->sortBy('name')
            ->values();

        $levels = CourseLevel::select('id', 'title')->where('status', 1)->get();
        $total = $courses->count();

        return view(theme('components.quiz-page-section'), compact('courses', 'categoryFilters', 'levels', 'total'));
    }

    private function hasSellableChild(Course $parent): bool
    {
        foreach ($parent->children as $child) {
            if ($this->childListingPrice($child) !== null) {
                return true;
            }
        }

        return false;
    }

    private function childListingPrice(Course $child): ?float
    {
        return self::resolveChildListingPrice($child);
    }

    public static function resolveChildListingPrice(Course $child): ?float
    {
        if ((int) $child->type === 5) {
            $price = floatval($child->price) + floatval($child->tax ?? 0);

            return $price > 0 ? $price : null;
        }

        if (in_array((int) $child->type, [4, 6], true)) {
            $plan = $child->effectiveCoursePlan()->first();

            return $plan ? floatval($plan->amount) : null;
        }

        return null;
    }

    public static function listingPriceLabel(Course $parent): ?string
    {
        $prices = [];

        foreach ($parent->children as $child) {
            $price = self::resolveChildListingPrice($child);
            if ($price !== null) {
                $prices[] = $price;
            }
        }

        if (!count($prices)) {
            return null;
        }

        $min = min($prices);

        return count($prices) > 1
            ? __('From') . ' ' . getPriceFormat($min)
            : getPriceFormat($min);
    }

    public static function excerpt(?string $html, int $limit = 120): string
    {
        $text = trim(preg_replace('/\s+/', ' ', strip_tags($html ?? '')));

        return Str::limit($text, $limit);
    }

    public static function thumbClass(int $categoryId): string
    {
        $classes = [
            'pc-thumb-foundations',
            'pc-thumb-physiological',
            'pc-thumb-psychosocial',
            'pc-thumb-health-promo',
            'pc-thumb-safe-care',
            'pc-thumb-high-yield',
            'pc-thumb-ngn',
        ];

        $bucket = $categoryId > 0 ? $categoryId : crc32('uncategorized');

        return $classes[$bucket % count($classes)];
    }

    public static function listingTypeBadges(Course $parent): array
    {
        $childTypes = $parent->children
            ->pluck('type')
            ->map(fn ($type) => (int) $type)
            ->unique();

        $typeMap = [
            5 => ['label' => 'On Demand', 'class' => 'pc-badge-ondemand'],
            6 => ['label' => 'Live', 'class' => 'pc-badge-live'],
            4 => ['label' => 'Full Course', 'class' => 'pc-badge-full'],
        ];

        $badges = [];

        foreach ([5, 6, 4] as $type) {
            if ($childTypes->contains($type)) {
                $badges[] = $typeMap[$type];
            }
        }

        return $badges;
    }

    private function translatableText($value): string
    {
        if (is_array($value)) {
            $locale = app()->getLocale();

            return (string) ($value[$locale] ?? reset($value) ?? '');
        }

        return (string) $value;
    }
}
