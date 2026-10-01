<?php

namespace Modules\ContinuingEducation\Services;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Modules\ContinuingEducation\Entities\CeBundle;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeLicenseType;

class CeBundleService
{
    public function listPublishedForLicenseType(string $licenseType)
    {
        return CeBundle::query()
            ->with(['mandatoryCourses' => fn ($q) => $q->select('ce_courses.id', 'ce_courses.title')])
            ->published()
            ->forLms()
            ->where('license_type', $licenseType)
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->get();
    }

    public function listPublishedPreviewsForLicenseType(string $licenseType, int $limit = 2)
    {
        return CeBundle::query()
            ->withCount(['courses as mandatory_courses_count' => function ($query) {
                $query->where('ce_bundle_courses.course_role', 'mandatory');
            }])
            ->published()
            ->forLms()
            ->where('license_type', $licenseType)
            ->where('price', '>', 0)
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->limit($limit)
            ->get();
    }

    public function findFeaturedForLicenseType(string $licenseType): ?CeBundle
    {
        $baseQuery = fn () => CeBundle::query()
            ->with(['mandatoryCourses' => fn ($q) => $q->select(
                'ce_courses.id',
                'ce_courses.title',
                'ce_courses.contact_hours'
            )])
            ->published()
            ->forLms()
            ->where('license_type', $licenseType)
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name');

        return $baseQuery()->where('is_best_seller', true)->first()
            ?? $baseQuery()->first();
    }

    public function listForAdmin()
    {
        return CeBundle::query()
            ->with('licenseType:id,name,card_style')
            ->withCount(['courses as mandatory_courses_count' => function ($query) {
                $query->where('ce_bundle_courses.course_role', 'mandatory');
            }])
            ->forLms()
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->get();
    }

    public function findForLms(int $id): CeBundle
    {
        return CeBundle::query()
            ->with([
                'licenseType',
                'mandatoryCourses',
                'electiveCourses',
            ])
            ->forLms()
            ->findOrFail($id);
    }

    public function audienceKeyForLicenseId(?int $licenseId): ?string
    {
        if (! $licenseId) {
            return null;
        }

        $license = CeLicenseType::query()->forLms()->find($licenseId);

        return $license ? ceLicenseCardStyleToAudienceKey($license->card_style) : null;
    }

    public function coursesForForm(?string $licenseType = null, string $courseType = 'mandatory')
    {
        if (! $licenseType || ! in_array($licenseType, ['rn_lpn', 'aprn', 'cna'], true)) {
            return collect();
        }

        if (! in_array($courseType, ['mandatory', 'elective'], true)) {
            return collect();
        }

        return CeCourse::query()
            ->forLms()
            ->published()
            ->where('course_type', $courseType)
            ->orderBy('title')
            ->get()
            ->filter(fn (CeCourse $course) => $course->matchesLicenseType($licenseType))
            ->values();
    }

    public function mandatoryCoursesForForm(?string $licenseType = null)
    {
        return $this->coursesForForm($licenseType, 'mandatory');
    }

    public function electiveCoursesForForm(?string $licenseType = null)
    {
        return $this->coursesForForm($licenseType, 'elective');
    }

    public function mandatoryCoursesForLicenseId(?int $licenseId)
    {
        return $this->mandatoryCoursesForForm($this->audienceKeyForLicenseId($licenseId));
    }

    public function electiveCoursesForLicenseId(?int $licenseId)
    {
        return $this->electiveCoursesForForm($this->audienceKeyForLicenseId($licenseId));
    }

    public function mandatoryCoursesPayloadForLicenseId(int $licenseId): array
    {
        return $this->mapCoursesPayload($this->mandatoryCoursesForLicenseId($licenseId));
    }

    public function electiveCoursesPayloadForLicenseId(int $licenseId): array
    {
        return $this->mapCoursesPayload($this->electiveCoursesForLicenseId($licenseId));
    }

    public function coursesPayloadForLicenseId(int $licenseId): array
    {
        return [
            'mandatory' => $this->mandatoryCoursesPayloadForLicenseId($licenseId),
            'elective' => $this->electiveCoursesPayloadForLicenseId($licenseId),
        ];
    }

    protected function mapCoursesPayload($courses): array
    {
        return $courses
            ->map(fn (CeCourse $course) => [
                'id' => $course->id,
                'title' => $course->title,
                'contact_hours' => (float) $course->contact_hours,
            ])
            ->values()
            ->all();
    }

    public function mandatoryCoursesPayloadForLicenseType(string $licenseType): array
    {
        return $this->mapCoursesPayload($this->mandatoryCoursesForForm($licenseType));
    }

    public function create(array $payload): CeBundle
    {
        $bundle = new CeBundle();
        $bundle->lms_id = $this->lmsId();
        $this->applyPayload($bundle, $payload);
        $this->assertBestSellerLimit($bundle);
        $bundle->save();
        $this->syncMandatoryCourses($bundle, $payload['mandatory_course_ids'] ?? []);
        $this->syncElectiveCourses($bundle, $payload['elective_course_ids'] ?? []);

        return $bundle->load(['mandatoryCourses', 'electiveCourses']);
    }

    public function update(CeBundle $bundle, array $payload): CeBundle
    {
        $this->applyPayload($bundle, $payload);
        $this->assertBestSellerLimit($bundle);
        $bundle->save();
        $this->syncMandatoryCourses($bundle, $payload['mandatory_course_ids'] ?? []);
        $this->syncElectiveCourses($bundle, $payload['elective_course_ids'] ?? []);

        return $bundle->load(['mandatoryCourses', 'electiveCourses']);
    }

    public function delete(CeBundle $bundle): void
    {
        $bundle->delete();
    }

    public function toggleStatus(CeBundle $bundle): CeBundle
    {
        $bundle->status = ! $bundle->status;
        $bundle->publish = $bundle->status;
        $bundle->save();

        return $bundle;
    }

    protected function applyPayload(CeBundle $bundle, array $payload): void
    {
        $name = $payload['name'];
        $slug = $bundle->exists && $bundle->name === $name
            ? $bundle->slug
            : $this->uniqueSlug($name, $bundle->exists ? $bundle->id : null);

        $bundle->fill([
            'name' => $name,
            'subtitle' => $payload['subtitle'] ?? null,
            'slug' => $slug,
            'component_1' => $payload['component_1'],
            'component_2' => $payload['component_2'],
            'component_3' => $payload['component_3'],
            'component_4' => $payload['component_4'],
            'component_5' => $payload['component_5'],
            'component_6' => $payload['component_6'],
            'total_hours' => $payload['total_hours'],
            'elective_hours_allowed' => $payload['elective_hours_allowed'],
            'price' => $payload['price'],
            'tax_percent' => $payload['tax_percent'] ?? 0,
            'discount_type' => $payload['discount_type'] ?? null,
            'discount' => $payload['discount'] ?? 0,
            'total_amount' => $payload['total_amount'] ?? 0,
            'total_tax' => $payload['total_tax'] ?? 0,
            'total_discount' => $payload['total_discount'] ?? 0,
            'compare_at_price' => null,
            'ce_license_type_id' => $payload['ce_license_type_id'] ?? null,
            'license_type' => $payload['license_type'] ?? 'rn_lpn',
            'card_style' => $payload['card_style'] ?? 'primary',
            'is_best_seller' => (bool) ($payload['is_best_seller'] ?? false),
            'seq_no' => $payload['seq_no'] ?? null,
            'status' => (bool) ($payload['status'] ?? true),
            'publish' => (bool) ($payload['publish'] ?? true),
            'featured' => (bool) ($payload['featured'] ?? false),
        ]);
    }

    protected function syncMandatoryCourses(CeBundle $bundle, array $courseIds): void
    {
        $courseIds = array_values(array_unique(array_map('intval', $courseIds)));
        $audienceKey = $bundle->license_type
            ?: $this->audienceKeyForLicenseId($bundle->ce_license_type_id);

        $this->assertMandatoryCoursesValid((string) $audienceKey, $courseIds);

        $existingMandatoryIds = $bundle->courses()
            ->wherePivot('course_role', 'mandatory')
            ->pluck('ce_courses.id');

        if ($existingMandatoryIds->isNotEmpty()) {
            $bundle->courses()->detach($existingMandatoryIds);
        }

        foreach ($courseIds as $index => $courseId) {
            $bundle->courses()->attach($courseId, [
                'course_role' => 'mandatory',
                'sort_order' => $index + 1,
            ]);
        }
    }

    protected function syncElectiveCourses(CeBundle $bundle, array $courseIds): void
    {
        $courseIds = array_values(array_unique(array_map('intval', $courseIds)));
        $audienceKey = $bundle->license_type
            ?: $this->audienceKeyForLicenseId($bundle->ce_license_type_id);

        $this->assertElectiveCoursesValid((string) $audienceKey, $courseIds);

        $existingElectiveIds = $bundle->courses()
            ->wherePivot('course_role', 'elective')
            ->pluck('ce_courses.id');

        if ($existingElectiveIds->isNotEmpty()) {
            $bundle->courses()->detach($existingElectiveIds);
        }

        foreach ($courseIds as $index => $courseId) {
            $bundle->courses()->attach($courseId, [
                'course_role' => 'elective',
                'sort_order' => $index + 1,
            ]);
        }
    }

    protected function assertMandatoryCoursesValid(string $licenseType, array $courseIds): void
    {
        if ($courseIds === []) {
            throw new InvalidArgumentException('Select at least one mandatory course for this bundle.');
        }

        $allowedIds = $this->mandatoryCoursesForForm($licenseType)->pluck('id')->all();

        foreach ($courseIds as $courseId) {
            if (! in_array($courseId, $allowedIds, true)) {
                throw new InvalidArgumentException('One or more selected courses are not valid mandatory courses for this license.');
            }
        }
    }

    protected function assertElectiveCoursesValid(string $licenseType, array $courseIds): void
    {
        if ($courseIds === []) {
            return;
        }

        $allowedIds = $this->electiveCoursesForForm($licenseType)->pluck('id')->all();

        foreach ($courseIds as $courseId) {
            if (! in_array($courseId, $allowedIds, true)) {
                throw new InvalidArgumentException('One or more selected courses are not valid elective courses for this license.');
            }
        }
    }

    protected function assertBestSellerLimit(CeBundle $bundle): void
    {
        if (! $bundle->is_best_seller) {
            return;
        }

        $query = CeBundle::query()
            ->forLms($bundle->lms_id)
            ->where('license_type', $bundle->license_type)
            ->where('is_best_seller', true);

        if ($bundle->exists) {
            $query->where('id', '!=', $bundle->id);
        }

        if ($query->exists()) {
            throw new InvalidArgumentException(
                'Only one bundle per license type can be marked as Best Seller at a time.'
            );
        }
    }

    protected function uniqueSlug(string $name, ?int $exceptId = null): string
    {
        $base = Str::slug($name) ?: 'ce-bundle';
        $slug = $base;
        $counter = 1;

        while ($this->slugExists($slug, $exceptId)) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function slugExists(string $slug, ?int $exceptId = null): bool
    {
        $query = CeBundle::query()->forLms()->where('slug', $slug);

        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }

        return $query->exists();
    }

    protected function lmsId(): int
    {
        return isModuleActive('LmsSaas') ? (int) app('institute')->id : 1;
    }
}
