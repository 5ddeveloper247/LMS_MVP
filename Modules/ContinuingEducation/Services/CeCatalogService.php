<?php

namespace Modules\ContinuingEducation\Services;

use Illuminate\Support\Str;
use Modules\ContinuingEducation\Entities\CeCourse;

class CeCatalogService
{
    public function listPublishedCatalog(): array
    {
        $courses = CeCourse::query()
            ->published()
            ->forLms()
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('title')
            ->get();

        return [
            'mandatory' => $courses->where('course_type', 'mandatory')->values(),
            'elective' => $courses->where('course_type', 'elective')->values(),
            'total' => $courses->count(),
        ];
    }

    public function catalogUrl(CeCourse $course): string
    {
        return $course->slug ? url('ce-courses/' . $course->slug) : '#';
    }

    public function isAprnAudience(CeCourse $course): bool
    {
        $audience = $course->audience ?? [];

        return (in_array('lpn', $audience, true) || in_array('aprn', $audience, true))
            && ! in_array('rn', $audience, true);
    }

    public function summary(CeCourse $course): string
    {
        $text = $course->compliance_topic;

        if ($text === null || trim((string) $text) === '') {
            $about = $course->about;
            if (is_array($about)) {
                $about = $about['en'] ?? reset($about) ?: '';
            }
            $text = strip_tags((string) $about);
        }

        return Str::limit(trim((string) $text), 120);
    }

    public function displayPrice(CeCourse $course): string
    {
        $price = $course->discount_price ?? $course->price ?? 0;

        return '$' . number_format((float) $price, 2);
    }

    public function contactHoursLabel(CeCourse $course): string
    {
        $hours = (float) ($course->contact_hours ?? 0);

        if ($hours <= 0) {
            return '';
        }

        if ($hours === 1.0) {
            return '1 Hour';
        }

        $formatted = rtrim(rtrim(number_format($hours, 1, '.', ''), '0'), '.');

        return $formatted . ' Hours';
    }
}
