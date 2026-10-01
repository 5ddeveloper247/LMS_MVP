<?php

use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\CourseSetting\Entities\Course;

if (! function_exists('isCeLmsCourse')) {
    function isCeLmsCourse(Course|int|null $course): bool
    {
        if ($course === null) {
            return false;
        }

        if (! $course instanceof Course) {
            $course = Course::find($course);
        }

        if (! $course) {
            return false;
        }

        return (int) $course->type === (int) config('continuingeducation.lms_course_type', 11);
    }
}

if (! function_exists('ceCourseForLmsCourse')) {
    function ceCourseForLmsCourse(int $lmsCourseId): ?CeCourse
    {
        return CeCourse::where('course_id', $lmsCourseId)->first();
    }
}

if (! function_exists('ceCourseTabForLmsCourse')) {
    function ceCourseTabForLmsCourse(int $lmsCourseId): string
    {
        $tab = request('tab');
        if (in_array($tab, ['mandatory', 'elective'], true)) {
            return $tab;
        }

        return ceCourseForLmsCourse($lmsCourseId)?->course_type ?? 'elective';
    }
}

if (! function_exists('courseDetailsRedirectUrl')) {
    function courseDetailsRedirectUrl(int $courseId, array $query = []): string
    {
        if (isCeLmsCourse($courseId)) {
            $query = array_merge([
                'from' => 'ce',
                'tab' => ceCourseTabForLmsCourse($courseId),
            ], $query);
        }

        $base = route('courseDetails', ['id' => $courseId]);

        return empty($query) ? $base : $base . '?' . http_build_query($query);
    }
}

if (! function_exists('ceAudienceGroupMap')) {
    function ceAudienceGroupMap(): array
    {
        return [
            'rn_lpn' => ['rn', 'lpn'],
            'aprn_np' => ['aprn', 'np'],
            'cna' => ['cna'],
            // Legacy keys (pre Licence Category rename) — kept for old form posts.
            'rn' => ['rn', 'lpn'],
            'lpn_aprn' => ['aprn', 'np'],
        ];
    }
}

if (! function_exists('ceAudienceFromGroups')) {
    function ceAudienceFromGroups(array $groups): array
    {
        $audience = [];

        foreach ($groups as $group) {
            $mapped = ceAudienceGroupMap()[$group] ?? null;
            if ($mapped) {
                $audience = array_merge($audience, $mapped);
            }
        }

        return array_values(array_unique($audience));
    }
}

if (! function_exists('ceAudienceGroupsFromAudience')) {
    function ceAudienceGroupsFromAudience(?array $audience): array
    {
        $audience = $audience ?? [];
        $groups = [];

        $hasRn = in_array('rn', $audience, true);
        $hasLpn = in_array('lpn', $audience, true);
        $hasAprn = in_array('aprn', $audience, true);
        $hasNp = in_array('np', $audience, true);
        $hasCna = in_array('cna', $audience, true);

        // RN & LPN: new rows store rn+lpn; legacy RN-only had rn.
        // Legacy LPN/APRN was lpn+aprn without rn → do NOT map that to RN & LPN.
        if ($hasRn || ($hasLpn && ! $hasAprn && ! $hasNp)) {
            $groups[] = 'rn_lpn';
        }

        // APRN & NP: new rows store aprn+np; legacy LPN/APRN had aprn (+ lpn).
        if ($hasAprn || $hasNp) {
            $groups[] = 'aprn_np';
        }

        if ($hasCna) {
            $groups[] = 'cna';
        }

        return array_values(array_unique($groups));
    }
}

if (! function_exists('ceCourseDetailsLink')) {
    function ceCourseDetailsLink(int $lmsCourseId, array $query = [], ?string $tab = null): string
    {
        if ($tab !== null) {
            $query['tab'] = $tab;
        }

        if (! isset($query['from']) && isCeLmsCourse($lmsCourseId)) {
            $query['from'] = 'ce';
        }

        if (! isset($query['tab']) && isCeLmsCourse($lmsCourseId)) {
            $query['tab'] = ceCourseTabForLmsCourse($lmsCourseId);
        }

        $base = route('courseDetails', ['id' => $lmsCourseId]);

        return empty($query) ? $base : $base . '?' . http_build_query($query);
    }
}
