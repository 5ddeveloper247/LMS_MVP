<?php

namespace Modules\ContinuingEducation\Services;

use Illuminate\Support\Str;
use Modules\ContinuingEducation\Entities\CeBundle;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeLicenseType;

class CeCatalogService
{
    public function __construct(
        protected CeLicenseService $licenseService,
        protected CeBundleService $bundleService
    ) {}

    public function listPublishedLicenses()
    {
        return $this->licenseService->listPublished();
    }

    public function listPublishedBundles(string $licenseType)
    {
        return $this->bundleService->listPublishedForLicenseType($licenseType);
    }

    public function listPublishedBundlePreviews(string $licenseType, int $limit = 2)
    {
        return $this->bundleService->listPublishedPreviewsForLicenseType($licenseType, $limit);
    }

    public function listPublishedBundlePreviewsByLicense(): array
    {
        return [
            'rn_lpn' => $this->listPublishedBundlePreviews('rn_lpn'),
            'aprn' => $this->listPublishedBundlePreviews('aprn'),
        ];
    }

    public function findPublishedLicenseForDetailPage(string $licenseType): ?CeLicenseType
    {
        $cardStyle = config('continuingeducation.license_type_card_styles.' . $licenseType);

        if (! $cardStyle) {
            return null;
        }

        return $this->licenseService->findPublishedByCardStyle($cardStyle);
    }

    public function findFeaturedBundleForLicenseType(string $licenseType): ?CeBundle
    {
        return $this->bundleService->findFeaturedForLicenseType($licenseType);
    }

    public function hourSummaryForBundle(?CeBundle $bundle): ?array
    {
        if (! $bundle) {
            return null;
        }

        $bundle->loadMissing('mandatoryCourses');

        $mandatory = (float) $bundle->mandatoryCourses->sum('contact_hours');
        $elective = (float) $bundle->elective_hours_allowed;
        $total = (float) $bundle->total_hours;

        if ($total <= 0) {
            $total = $mandatory + $elective;
        }

        return [
            'total' => $this->formatHourStat($total),
            'mandatory' => $this->formatHourStat($mandatory),
            'elective' => $this->formatHourStat($elective),
        ];
    }

    public function listPublishedCoursesForLicenseType(string $licenseType, ?string $courseType = null)
    {
        return CeCourse::query()
            ->published()
            ->forLms()
            ->when($courseType, fn ($query) => $query->where('course_type', $courseType))
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('title')
            ->get()
            ->filter(fn (CeCourse $course) => $course->matchesLicenseType($licenseType))
            ->values();
    }

    public function mandatoryCourseStats($courses): array
    {
        $collection = collect($courses);

        return [
            'count' => $collection->count(),
            'hours' => $this->formatHourStat((float) $collection->sum('contact_hours')),
        ];
    }

    public function licenseDetailPageData(string $licenseType): array
    {
        $featuredBundle = $this->findFeaturedBundleForLicenseType($licenseType);
        $mandatoryCourses = $this->listPublishedCoursesForLicenseType($licenseType, 'mandatory');
        $electiveCourses = $this->listPublishedCoursesForLicenseType($licenseType, 'elective');

        return [
            'license' => $this->findPublishedLicenseForDetailPage($licenseType),
            'featuredBundle' => $featuredBundle,
            'hourSummary' => $this->hourSummaryForBundle($featuredBundle),
            'mandatoryCourses' => $mandatoryCourses,
            'mandatoryCourseStats' => $this->mandatoryCourseStats($mandatoryCourses),
            'electiveCourses' => $electiveCourses,
            'ceCatalog' => $this,
        ];
    }

    public function formatHourStat(float $hours): string
    {
        if ($hours <= 0) {
            return '0';
        }

        return rtrim(rtrim(number_format($hours, 1, '.', ''), '0'), '.');
    }

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

    public function findPublishedBySlug(string $slug): CeCourse
    {
        return CeCourse::query()
            ->published()
            ->forLms()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function relatedCourses(CeCourse $course, int $limit = 3)
    {
        return CeCourse::query()
            ->published()
            ->forLms()
            ->where('course_type', $course->course_type)
            ->where('id', '!=', $course->id)
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('title')
            ->take($limit)
            ->get();
    }

    public function catalogUrl(CeCourse $course): string
    {
        if (! $course->slug) {
            return '#';
        }

        return route('continuingEducationCourse', ['slug' => $course->slug]);
    }

    public function catalogAnchor(CeCourse $course): string
    {
        $tab = $course->course_type === 'mandatory' ? 'mandatory' : 'elective';

        return route('continuingEducation') . '#ce-' . $tab;
    }

    public function courseTypeLabel(CeCourse $course): string
    {
        return config('continuingeducation.course_types.' . $course->course_type, ucfirst((string) $course->course_type));
    }

    public function bundleUrl(CeCourse $course): string
    {
        return $this->isAprnAudience($course)
            ? route('continuingEducationAprn')
            : route('continuingEducationRnLpn');
    }

    public function bundleLabel(CeCourse $course): string
    {
        return $this->isAprnAudience($course)
            ? 'View APRN Packages'
            : 'View RN & LPN Packages';
    }

    public function isAprnAudience(CeCourse $course): bool
    {
        $audience = $course->audience ?? [];

        return (in_array('lpn', $audience, true) || in_array('aprn', $audience, true))
            && ! in_array('rn', $audience, true);
    }

    public function isAprnSpecificCourse(CeCourse $course): bool
    {
        $audience = $course->audience ?? [];

        return in_array('aprn', $audience, true) && ! in_array('rn', $audience, true);
    }

    public function summary(CeCourse $course, int $limit = 120): string
    {
        $text = $course->compliance_topic;

        if ($text === null || trim((string) $text) === '') {
            $about = $course->about;
            if (is_array($about)) {
                $about = $about['en'] ?? reset($about) ?: '';
            }
            $text = strip_tags((string) $about);
        }

        return Str::limit(trim((string) $text), $limit);
    }

    public function courseCycleNote(CeCourse $course): ?string
    {
        $note = trim(strip_tags((string) ($course->requirements ?? '')));

        if ($note === '') {
            return null;
        }

        return Str::limit($note, 80);
    }

    public function contactHoursCardValue(CeCourse $course): string
    {
        return $this->formatHourStat((float) ($course->contact_hours ?? 0));
    }

    public function contactHoursCardUnit(CeCourse $course): string
    {
        $hours = (float) ($course->contact_hours ?? 0);

        return $hours === 1.0 ? 'Hour' : 'Hours';
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
