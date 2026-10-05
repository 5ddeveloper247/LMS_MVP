<?php

namespace Modules\ContinuingEducation\Services;

use App\User;
use Illuminate\Support\Str;
use Modules\ContinuingEducation\Entities\CeBundle;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeLicenseType;
use Modules\ContinuingEducation\Entities\CePurchase;

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

    public function findPublishedBundleBySlug(string $slug): CeBundle
    {
        return CeBundle::query()
            ->published()
            ->forLms()
            ->with([
                'mandatoryCourses',
                'electiveCourses',
                'licenseType:id,name,card_style',
            ])
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function bundleDetailUrl(CeBundle $bundle): string
    {
        if (! $bundle->slug) {
            return $this->bundleLandingUrlForType($bundle->license_type);
        }

        return route('continuingEducationBundle', ['slug' => $bundle->slug]);
    }

    public function bundleLandingUrlForType(?string $licenseType): string
    {
        if ($licenseType === 'aprn') {
            return route('continuingEducationAprn');
        }

        if ($licenseType === 'cna') {
            return route('continuingEducationCna');
        }

        return route('continuingEducationRnLpn');
    }

    /**
     * Admin-attached electives (locked for the buyer).
     */
    public function lockedElectivesForBundle(CeBundle $bundle)
    {
        $bundle->loadMissing('electiveCourses');

        return $bundle->electiveCourses->values();
    }

    /**
     * Buyer-choosable electives (license pool minus admin-locked electives).
     */
    public function optionalElectivesForBundle(CeBundle $bundle)
    {
        $lockedIds = $this->lockedElectivesForBundle($bundle)
            ->pluck('id')
            ->map(function ($id) {
                return (int) $id;
            })
            ->all();

        return $this->listPublishedCoursesForLicenseType((string) $bundle->license_type, 'elective')
            ->reject(function (CeCourse $course) use ($lockedIds) {
                return in_array((int) $course->id, $lockedIds, true);
            })
            ->values();
    }

    /**
     * Full elective universe for a bundle (locked + optional).
     */
    public function electivePoolForBundle(CeBundle $bundle)
    {
        return $this->lockedElectivesForBundle($bundle)
            ->concat($this->optionalElectivesForBundle($bundle))
            ->unique('id')
            ->values();
    }

    public function bundleDetailPageData(CeBundle $bundle): array
    {
        $bundle->loadMissing(['mandatoryCourses', 'electiveCourses', 'licenseType']);

        $mandatoryCourses = $bundle->mandatoryCourses;
        $lockedElectiveCourses = $this->lockedElectivesForBundle($bundle);
        $optionalElectiveCourses = $this->optionalElectivesForBundle($bundle);

        return [
            'bundle' => $bundle,
            'mandatoryCourses' => $mandatoryCourses,
            'lockedElectiveCourses' => $lockedElectiveCourses,
            'optionalElectiveCourses' => $optionalElectiveCourses,
            'electiveCourses' => $optionalElectiveCourses,
            'mandatoryCourseStats' => $this->mandatoryCourseStats($mandatoryCourses),
            'hourSummary' => $this->hourSummaryForBundle($bundle),
            'electiveHoursAllowed' => (float) ($bundle->elective_hours_allowed ?? 0),
            'lockedElectiveHours' => (float) $lockedElectiveCourses->sum('contact_hours'),
            'backUrl' => $this->bundleLandingUrlForType($bundle->license_type),
            'portalMode' => false,
            'ceCatalog' => $this,
        ];
    }

    public function findOwnedBundlePurchase(User $user, CeBundle $bundle): ?CePurchase
    {
        return CePurchase::query()
            ->with(['items', 'enrollments', 'ceBundle.electiveCourses', 'ceBundle.mandatoryCourses'])
            ->paid()
            ->where('user_id', $user->id)
            ->where('item_type', 'bundle')
            ->where('ce_bundle_id', $bundle->id)
            ->orderByDesc('purchased_at')
            ->orderByDesc('id')
            ->first();
    }

    /**
     * Public bundle detail page data when the signed-in CE user already owns this bundle.
     */
    public function ownedBundleDetailPageData(CeBundle $bundle, CePurchase $purchase): array
    {
        $base = $this->bundleDetailPageData($bundle);
        $enrolledIds = $purchase->enrollments->pluck('ce_course_id')->map(function ($id) {
            return (int) $id;
        })->all();

        $lockedElectives = $this->lockedElectivesForBundle($bundle);
        $optionalElectives = $this->optionalElectivesForBundle($bundle)
            ->reject(function (CeCourse $course) use ($enrolledIds) {
                return in_array((int) $course->id, $enrolledIds, true);
            })
            ->values();

        $enrolledElectiveItems = $purchase->items->where('course_role', 'elective')->values();
        $lockedIds = $lockedElectives->pluck('id')->map(function ($id) {
            return (int) $id;
        })->all();

        $enrolledUserElectives = $enrolledElectiveItems
            ->reject(function ($item) use ($lockedIds) {
                return in_array((int) $item->ce_course_id, $lockedIds, true);
            })
            ->values();

        $enrolledElectiveHours = (float) $enrolledElectiveItems->sum('contact_hours');
        $allowed = (float) ($purchase->elective_hours_allowed ?? $bundle->elective_hours_allowed ?? 0);
        $remaining = max(0, $allowed - $enrolledElectiveHours);

        return array_merge($base, [
            'purchase' => $purchase,
            'portalMode' => true,
            'portalPurchase' => $purchase,
            'lockedElectiveCourses' => $lockedElectives,
            'optionalElectiveCourses' => $optionalElectives,
            'electiveCourses' => $optionalElectives,
            'enrolledElectiveItems' => $enrolledElectiveItems,
            'enrolledUserElectiveItems' => $enrolledUserElectives,
            'electiveHoursAllowed' => $allowed,
            'lockedElectiveHours' => (float) $lockedElectives->sum('contact_hours'),
            'portalEnrolledElectiveHours' => $enrolledElectiveHours,
            'portalRemainingElectiveHours' => $remaining,
            'enrolledElectiveHours' => $enrolledElectiveHours,
            'remainingElectiveHours' => $remaining,
            'backUrl' => route('cePortal.courses', ['view' => 'bundles']),
        ]);
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
            'cna' => $this->listPublishedBundlePreviews('cna'),
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

    public function canPurchaseCourse(CeCourse $course): bool
    {
        return $this->coursePrice($course) > 0;
    }

    public function cartUrl(CeCourse $course): string
    {
        return route('ce.cart.addCourse', ['id' => $course->id]);
    }

    public function buyNowUrl(CeCourse $course): string
    {
        return route('ce.cart.buyNowCourse', ['id' => $course->id]);
    }

    public function coursePrice(CeCourse $course): float
    {
        return $course->salePrice();
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
        if ($this->isCnaAudience($course)) {
            return route('continuingEducationCna');
        }

        return $this->isAprnAudience($course)
            ? route('continuingEducationAprn')
            : route('continuingEducationRnLpn');
    }

    public function bundleLabel(CeCourse $course): string
    {
        if ($this->isCnaAudience($course)) {
            return 'View CNA Packages';
        }

        return $this->isAprnAudience($course)
            ? 'View APRN Packages'
            : 'View RN & LPN Packages';
    }

    public function isAprnAudience(CeCourse $course): bool
    {
        $groups = ceAudienceGroupsFromAudience($course->audience ?? []);

        return in_array('aprn_np', $groups, true) && ! in_array('rn_lpn', $groups, true) && ! in_array('cna', $groups, true);
    }

    public function isCnaAudience(CeCourse $course): bool
    {
        $groups = ceAudienceGroupsFromAudience($course->audience ?? []);

        return in_array('cna', $groups, true) && ! in_array('rn_lpn', $groups, true) && ! in_array('aprn_np', $groups, true);
    }

    public function isAprnSpecificCourse(CeCourse $course): bool
    {
        return $this->isAprnAudience($course);
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
        return getPriceFormat($course->salePrice());
    }

    public function courseHasDiscount(CeCourse $course): bool
    {
        return $course->hasCeDiscount();
    }

    public function courseComparePrice(CeCourse $course): string
    {
        return getPriceFormat($course->originalPriceWithTax());
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
