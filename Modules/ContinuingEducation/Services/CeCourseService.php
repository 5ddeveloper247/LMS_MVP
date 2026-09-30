<?php

namespace Modules\ContinuingEducation\Services;

use App\Traits\ImageStore;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\CourseSetting\Entities\Course;

class CeCourseService
{
    use ImageStore;

    public function listForAdmin(?string $courseType = null): Collection
    {
        return CeCourse::query()
            ->with(['instructor'])
            ->forLms()
            ->when(
                $courseType,
                fn ($query) => $query->where('course_type', $courseType)
            )
            ->orderByDesc('id')
            ->get()
            ->each(function (CeCourse $course) {
                $this->ensureLinkedLmsCourse($course);
            });
    }

    public function findForLms(int $id): CeCourse
    {
        return CeCourse::query()->forLms()->findOrFail($id);
    }

    public function create(array $payload, ?UploadedFile $image = null): CeCourse
    {
        return DB::transaction(function () use ($payload, $image) {
            $course = new CeCourse();
            $this->applyPayload($course, $payload, $image);
            $course->lms_id = $this->lmsId();
            $course->created_by = Auth::id();
            $course->updated_by = Auth::id();
            $course->save();
            $this->syncLinkedLmsCourse($course);

            return $course;
        });
    }

    public function update(CeCourse $course, array $payload, ?UploadedFile $image = null): CeCourse
    {
        return DB::transaction(function () use ($course, $payload, $image) {
            $this->applyPayload($course, $payload, $image);
            $course->updated_by = Auth::id();
            $course->save();
            $this->syncLinkedLmsCourse($course);

            return $course;
        });
    }

    public function delete(CeCourse $course): void
    {
        if ($course->enrollments()->exists()) {
            throw new InvalidArgumentException('Cannot delete a course with enrollments.');
        }

        $course->delete();
    }

    public function toggleStatus(CeCourse $course): CeCourse
    {
        $course->status = $course->status ? 0 : 1;
        $course->updated_by = Auth::id();
        $course->save();
        $this->syncLinkedLmsCourse($course);

        return $course;
    }

    public function ensureLinkedLmsCourse(CeCourse $course): CeCourse
    {
        if ($course->course_id && Course::query()->whereKey($course->course_id)->exists()) {
            return $course;
        }

        return $this->syncLinkedLmsCourse($course);
    }

    protected function syncLinkedLmsCourse(CeCourse $ceCourse): CeCourse
    {
        $type = (int) config('continuingeducation.lms_course_type', 11);
        $lmsCourse = $ceCourse->course_id
            ? Course::query()->find($ceCourse->course_id)
            : null;

        if (!$lmsCourse) {
            $lmsCourse = new Course();
            $lmsCourse->type = $type;
            $lmsCourse->lms_id = $ceCourse->lms_id ?: $this->lmsId();
            $lmsCourse->required_type = 0;
            $lmsCourse->scope = 1;
        }

        $lmsCourse->title = $ceCourse->title;
        $lmsCourse->user_id = $ceCourse->user_id;
        $lmsCourse->assistant_instructors = $ceCourse->assistant_instructors;
        $lmsCourse->about = $ceCourse->about;
        $lmsCourse->outcomes = $ceCourse->outcomes;
        $lmsCourse->requirements = $ceCourse->requirements;
        $lmsCourse->lang_id = $ceCourse->lang_id ?: 19;
        $lmsCourse->image = $ceCourse->image;
        $lmsCourse->thumbnail = $ceCourse->thumbnail ?: $ceCourse->image;
        $lmsCourse->price = $ceCourse->price ?? 0;
        $lmsCourse->discount_price = $ceCourse->discount_price;
        $lmsCourse->status = $ceCourse->status ? 1 : 0;
        $lmsCourse->publish = $ceCourse->publish ? 1 : 0;
        $lmsCourse->course_code = $this->uniqueLmsCourseCode($ceCourse->course_code, $lmsCourse->exists ? $lmsCourse->id : null);
        $lmsCourse->type = $type;
        $lmsCourse->save();

        if ((int) $ceCourse->course_id !== (int) $lmsCourse->id) {
            $ceCourse->course_id = $lmsCourse->id;
            $ceCourse->save();
        }

        return $ceCourse;
    }

    protected function uniqueLmsCourseCode(?string $code, ?int $exceptId): ?string
    {
        $code = trim((string) $code);
        if ($code === '') {
            return null;
        }

        $taken = Course::query()
            ->when($exceptId, fn ($query) => $query->where('id', '!=', $exceptId))
            ->where('course_code', $code)
            ->exists();

        return $taken ? null : $code;
    }

    public function syncCeMetaFromLmsRequest($lmsCourse, $request): void
    {
        $ceCourse = CeCourse::query()->where('course_id', $lmsCourse->id)->first();
        if (!$ceCourse) {
            return;
        }

        $courseType = $request->input('course_type');

        if (in_array($courseType, ['mandatory', 'elective'], true)) {
            $ceCourse->course_type = $courseType;
        }

        if ($request->filled('contact_hours')) {
            $ceCourse->contact_hours = $request->input('contact_hours');
        }

        if ($request->has('audience_groups')) {
            $ceCourse->audience = ceAudienceFromGroups((array) $request->input('audience_groups', []));
        } elseif ($request->filled('audience_group')) {
            $ceCourse->audience = ceAudienceFromGroups([$request->input('audience_group')]);
        }

        $ceCourse->title = $lmsCourse->title;
        $ceCourse->course_code = $lmsCourse->course_code;
        $ceCourse->about = is_array($lmsCourse->about) ? ($lmsCourse->getTranslation('about', 'en') ?? null) : $lmsCourse->about;
        $ceCourse->outcomes = is_array($lmsCourse->outcomes) ? ($lmsCourse->getTranslation('outcomes', 'en') ?? null) : $lmsCourse->outcomes;
        $ceCourse->user_id = $lmsCourse->user_id;
        $ceCourse->assistant_instructors = $lmsCourse->assistant_instructors;
        $ceCourse->image = $lmsCourse->image;
        $ceCourse->thumbnail = $lmsCourse->thumbnail;
        $ceCourse->price = $lmsCourse->price;
        $ceCourse->discount_price = $lmsCourse->discount_price;
        $ceCourse->status = $lmsCourse->status ? 1 : 0;
        $ceCourse->publish = 1;
        $ceCourse->updated_by = Auth::id();
        $ceCourse->save();
    }

    protected function applyPayload(CeCourse $course, array $payload, ?UploadedFile $image = null): void
    {
        if ($image) {
            $path = $this->saveImage($image);
            if ($path) {
                $course->image = $path;
                $course->thumbnail = $path;
            }
        }

        $assistantInstructors = $payload['assistant_instructors'] ?? [];
        unset($payload['assistant_instructors']);

        $slug = trim($payload['slug'] ?? '');
        if ($slug === '') {
            $slug = $this->uniqueSlug($payload['title'], $course->exists ? $course->id : null);
        }

        $course->fill($payload);
        $course->slug = $slug;

        $course->assistant_instructors = !empty($assistantInstructors)
            ? json_encode(array_values($assistantInstructors))
            : null;

        foreach (['about', 'outcomes', 'requirements'] as $field) {
            if (array_key_exists($field, $payload) && $payload[$field] !== null) {
                $course->{$field} = str_replace("'", '`', $payload[$field]);
            }
        }
    }

    protected function uniqueSlug(string $title, ?int $exceptId = null): string
    {
        $slug = Str::slug($title);
        if ($slug === '') {
            $slug = 'ce-course';
        }

        $original = $slug;
        $counter = 1;

        while (CeCourse::query()
            ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function lmsId(): int
    {
        return isModuleActive('LmsSaas') ? (int) app('institute')->id : 1;
    }
}
