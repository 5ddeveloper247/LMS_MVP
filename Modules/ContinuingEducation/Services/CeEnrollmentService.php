<?php

namespace Modules\ContinuingEducation\Services;

use App\User;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeCourseEnrollment;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseEnrolled;

class CeEnrollmentService
{
    public function lmsCourseType(): int
    {
        return (int) config('continuingeducation.lms_course_type', 11);
    }

    public function ensureLmsEnrollment(
        CeCourse $ceCourse,
        User $user,
        ?string $tracking = null,
        ?float $purchasePrice = null
    ): ?CourseEnrolled {
        $ceCourse = app(CeCourseService::class)->ensureLinkedLmsCourse($ceCourse);

        if (! $ceCourse->course_id) {
            return null;
        }

        $courseType = $this->lmsCourseType();
        $lmsCourseId = (int) $ceCourse->course_id;

        $existing = CourseEnrolled::query()
            ->where('user_id', $user->id)
            ->where('course_id', $lmsCourseId)
            ->where('course_type', $courseType)
            ->first();

        if ($existing) {
            return $existing;
        }

        $enrolled = new CourseEnrolled();
        $enrolled->user_id = $user->id;
        $enrolled->course_id = $lmsCourseId;
        $enrolled->course_type = $courseType;
        $enrolled->tracking = $tracking ?? '';
        $enrolled->purchase_price = $purchasePrice ?? 0;
        $enrolled->status = 1;
        $enrolled->save();

        return $enrolled;
    }

    public function syncProgressFromLms(int $userId, int $lmsCourseId, ?int $courseType = null): void
    {
        $courseType = $courseType ?? $this->lmsCourseType();

        if ((int) $courseType !== $this->lmsCourseType()) {
            return;
        }

        $ceCourse = CeCourse::query()->where('course_id', $lmsCourseId)->first();
        if (! $ceCourse) {
            return;
        }

        $enrollment = CeCourseEnrollment::query()
            ->where('user_id', $userId)
            ->where('ce_course_id', $ceCourse->id)
            ->first();

        if (! $enrollment) {
            return;
        }

        $lmsCourse = Course::query()->find($lmsCourseId);
        if (! $lmsCourse) {
            return;
        }

        $percent = (int) round($lmsCourse->userTotalPercentage($userId, $lmsCourseId));
        $percent = min(100, max(0, $percent));

        $enrollment->progress = $percent;
        $enrollment->status = match (true) {
            $percent >= 100 => 'completed',
            $percent > 0 => 'in_progress',
            default => 'not_started',
        };

        if ($percent >= 100 && ! $enrollment->completed_at) {
            $enrollment->completed_at = now();
        }

        $enrollment->save();
    }

    public function userHasEnrollment(User $user, CeCourse $ceCourse): bool
    {
        return CeCourseEnrollment::query()
            ->where('user_id', $user->id)
            ->where('ce_course_id', $ceCourse->id)
            ->exists();
    }

    public function lmsEnrollmentFor(User $user, CeCourse $ceCourse): ?CourseEnrolled
    {
        if (! $ceCourse->course_id) {
            return null;
        }

        return CourseEnrolled::query()
            ->where('user_id', $user->id)
            ->where('course_id', $ceCourse->course_id)
            ->where('course_type', $this->lmsCourseType())
            ->first();
    }

    /**
     * @return \Illuminate\Support\Collection<int, CeCourseEnrollment>
     */
    public function userEnrollments(User $user)
    {
        return CeCourseEnrollment::query()
            ->with(['ceCourse.linkedCourse'])
            ->where('user_id', $user->id)
            ->latest('id')
            ->get();
    }

    public function enrollmentToCard(CeCourseEnrollment $enrollment): ?array
    {
        $ceCourse = $enrollment->ceCourse;
        if (! $ceCourse) {
            return null;
        }

        $lmsCourse = $ceCourse->linkedCourse;
        if (! $lmsCourse || ! $lmsCourse->id) {
            return null;
        }

        $lmsPercent = (int) round($lmsCourse->userTotalPercentage($enrollment->user_id, $lmsCourse->id));
        $lmsPercent = min(100, max(0, $lmsPercent));
        $percent = max((int) $enrollment->progress, $lmsPercent);

        $status = match (true) {
            $percent >= 100 => 'completed',
            $percent > 0 => 'in_progress',
            default => 'not_started',
        };

        $courseType = $this->lmsCourseType();
        $launchUrl = route('continueCourse', $lmsCourse->slug) . '?courseType=' . $courseType;

        $contactHours = (float) ($ceCourse->contact_hours ?? 0);
        $hoursLabel = rtrim(rtrim(number_format($contactHours, 1, '.', ''), '0'), '.');

        $typeLabel = ucfirst((string) ($ceCourse->course_type ?? 'course'));
        if ($typeLabel === 'Mandatory') {
            $typeLabel = 'Mandatory';
        } elseif ($typeLabel === 'Elective') {
            $typeLabel = 'Elective';
        }

        $remainingMinutes = $percent > 0 && $percent < 100 && $contactHours > 0
            ? (int) round($contactHours * 60 * (1 - ($percent / 100)))
            : null;

        return [
            'enrollment_id' => $enrollment->id,
            'ce_course_id' => $ceCourse->id,
            'title' => $ceCourse->title,
            'type' => $typeLabel,
            'hours' => $hoursLabel,
            'status' => $status,
            'progress' => $percent,
            'progress_label' => $percent . '% Complete',
            'progress_detail' => match ($status) {
                'completed' => ($hoursLabel ?: '0') . ' contact hours',
                'in_progress' => $remainingMinutes !== null
                    ? '~' . max(1, $remainingMinutes) . ' min remaining'
                    : 'In progress',
                default => 'Not yet started',
            },
            'broker_status' => $enrollment->ce_broker_reported_at ? 'reported' : null,
            'action_label' => match ($status) {
                'completed' => 'Review Course',
                'in_progress' => 'Resume Course',
                default => 'Launch Course',
            },
            'action_style' => $status === 'completed' ? 'outline' : 'primary',
            'launch_url' => $launchUrl,
            'detail_url' => url('ce-courses/' . $ceCourse->slug),
            'compliance_topic' => $ceCourse->compliance_topic,
            'contact_hours' => $contactHours,
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function userEnrollmentCards(User $user): array
    {
        return $this->userEnrollments($user)
            ->map(fn (CeCourseEnrollment $enrollment) => $this->enrollmentToCard($enrollment))
            ->filter()
            ->values()
            ->all();
    }

    public function dashboardStats(User $user, array $fallback = []): array
    {
        $cards = $this->userEnrollmentCards($user);

        if ($cards === []) {
            return $fallback;
        }

        $hoursRequired = (float) ($fallback['hours_required'] ?? 26);
        $hoursCompleted = collect($cards)
            ->where('status', 'completed')
            ->sum('contact_hours');

        $inProgress = collect($cards)->whereIn('status', ['in_progress', 'not_started'])->count();
        $inProgressActive = collect($cards)->where('status', 'in_progress')->count();
        $mandatoryInProgress = collect($cards)
            ->where('type', 'Mandatory')
            ->whereIn('status', ['in_progress', 'not_started'])
            ->count();
        $electiveInProgress = collect($cards)
            ->where('type', 'Elective')
            ->whereIn('status', ['in_progress', 'not_started'])
            ->count();

        $certificates = collect($cards)->where('status', 'completed')->count();
        $hoursPercent = $hoursRequired > 0
            ? (int) min(100, round(($hoursCompleted / $hoursRequired) * 100))
            : 0;

        $noteParts = array_filter([
            $mandatoryInProgress ? $mandatoryInProgress . ' mandatory' : null,
            $electiveInProgress ? $electiveInProgress . ' elective' : null,
        ]);

        return [
            'hours_completed' => (int) round($hoursCompleted),
            'hours_required' => (int) $hoursRequired,
            'hours_percent' => $hoursPercent,
            'courses_in_progress' => $inProgress,
            'courses_in_progress_note' => $noteParts !== []
                ? implode(' · ', $noteParts)
                : ($inProgressActive ? 'Active enrollments' : 'Browse the CE catalog'),
            'certificates_earned' => $certificates,
            'renewal_date_label' => $fallback['renewal_date_label'] ?? '',
        ];
    }

    public function complianceData(User $user, array $fallback = []): array
    {
        $cards = collect($this->userEnrollmentCards($user));
        $completedTopics = $cards
            ->where('status', 'completed')
            ->pluck('compliance_topic')
            ->filter()
            ->map(fn ($topic) => trim((string) $topic))
            ->all();

        $requirements = collect($fallback['requirements'] ?? [])
            ->map(function (array $item) use ($completedTopics, $cards) {
                $label = (string) ($item['label'] ?? '');
                $matched = in_array($label, $completedTopics, true)
                    || $cards->contains(fn ($card) => $card['status'] === 'completed'
                        && strcasecmp((string) ($card['compliance_topic'] ?? ''), $label) === 0);

                return array_merge($item, ['completed' => $matched]);
            })
            ->all();

        $stats = $this->dashboardStats($user, $fallback);

        return [
            'percent' => $stats['hours_percent'],
            'hours_completed' => $stats['hours_completed'],
            'hours_required' => $stats['hours_required'],
            'requirements' => $requirements,
        ];
    }

    public function backfillLmsEnrollments(?int $userId = null): int
    {
        $query = CeCourseEnrollment::query()->with(['ceCourse', 'purchase']);

        if ($userId) {
            $query->where('user_id', $userId);
        }

        $created = 0;

        foreach ($query->get() as $enrollment) {
            if (! $enrollment->ceCourse) {
                continue;
            }

            $user = User::find($enrollment->user_id);
            if (! $user) {
                continue;
            }

            $tracking = optional($enrollment->purchase)->tracking;
            $before = $this->lmsEnrollmentFor($user, $enrollment->ceCourse);

            $this->ensureLmsEnrollment(
                $enrollment->ceCourse,
                $user,
                $tracking,
                (float) ($enrollment->purchase_price ?? 0)
            );

            if (! $before) {
                $created++;
            }

            if ($enrollment->ceCourse->course_id) {
                $this->syncProgressFromLms(
                    (int) $enrollment->user_id,
                    (int) $enrollment->ceCourse->course_id
                );
            }
        }

        return $created;
    }
}
