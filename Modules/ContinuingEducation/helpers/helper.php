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
            'rn' => ['rn'],
            'lpn_aprn' => ['lpn', 'aprn'],
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

        if (in_array('rn', $audience, true)) {
            $groups[] = 'rn';
        }

        if (in_array('lpn', $audience, true) || in_array('aprn', $audience, true)) {
            $groups[] = 'lpn_aprn';
        }

        return $groups;
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
