<?php

namespace Modules\ContinuingEducation\Services;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Modules\ContinuingEducation\Entities\CeBundle;
use Modules\ContinuingEducation\Entities\CeCourse;

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

    public function listForAdmin()
    {
        return CeBundle::query()
            ->withCount(['courses as mandatory_courses_count' => function ($query) {
                $query->where('ce_bundle_courses.course_role', 'mandatory');
            }])
            ->forLms()
            ->orderBy('license_type')
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->get();
    }

    public function findForLms(int $id): CeBundle
    {
        return CeBundle::query()
            ->with(['courses' => fn ($q) => $q->wherePivot('course_role', 'mandatory')])
            ->forLms()
            ->findOrFail($id);
    }

    public function mandatoryCoursesForForm(?string $licenseType = null)
    {
        $licenseType = $licenseType ?: 'rn_lpn';

        return CeCourse::query()
            ->forLms()
            ->published()
            ->where('course_type', 'mandatory')
            ->orderBy('title')
            ->get()
            ->filter(fn (CeCourse $course) => $course->matchesLicenseType($licenseType))
            ->values();
    }

    public function create(array $payload): CeBundle
    {
        $bundle = new CeBundle();
        $bundle->lms_id = $this->lmsId();
        $this->applyPayload($bundle, $payload);
        $this->assertBestSellerLimit($bundle);
        $bundle->save();
        $this->syncMandatoryCourses($bundle, $payload['mandatory_course_ids'] ?? []);

        return $bundle->load('mandatoryCourses');
    }

    public function update(CeBundle $bundle, array $payload): CeBundle
    {
        $this->applyPayload($bundle, $payload);
        $this->assertBestSellerLimit($bundle);
        $bundle->save();
        $this->syncMandatoryCourses($bundle, $payload['mandatory_course_ids'] ?? []);

        return $bundle->load('mandatoryCourses');
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
            'compare_at_price' => $payload['compare_at_price'] ?? null,
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
        $this->assertMandatoryCoursesValid($bundle->license_type, $courseIds);

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

    protected function assertMandatoryCoursesValid(string $licenseType, array $courseIds): void
    {
        if ($courseIds === []) {
            throw new InvalidArgumentException('Select at least one mandatory course for this bundle.');
        }

        $allowedIds = $this->mandatoryCoursesForForm($licenseType)->pluck('id')->all();

        foreach ($courseIds as $courseId) {
            if (! in_array($courseId, $allowedIds, true)) {
                throw new InvalidArgumentException('One or more selected courses are not valid mandatory courses for this license type.');
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
