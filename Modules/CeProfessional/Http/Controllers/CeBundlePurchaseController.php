<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeCourseEnrollment;
use Modules\ContinuingEducation\Entities\CePurchase;
use Modules\ContinuingEducation\Entities\CePurchaseItem;
use Modules\ContinuingEducation\Services\CeCatalogService;
use Modules\ContinuingEducation\Services\CeEnrollmentService;

class CeBundlePurchaseController extends Controller
{
    public function __construct(
        protected CeCatalogService $catalogService,
        protected CeEnrollmentService $enrollmentService
    ) {}

    public function show($id)
    {
        $purchase = $this->findOwnedBundlePurchase((int) $id);
        $bundle = $purchase->ceBundle;

        if ($bundle && $bundle->slug) {
            return redirect()->route('continuingEducationBundle', ['slug' => $bundle->slug]);
        }

        return redirect()->route('cePortal.courses', ['view' => 'bundles']);
    }

    public function storeElectives(Request $request, $id)
    {
        $purchase = $this->findOwnedBundlePurchase((int) $id);
        $bundle = $purchase->ceBundle;

        if (! $bundle) {
            Toastr::error('Bundle not found for this purchase.', trans('common.Failed'));

            return redirect()->route('cePortal.courses', ['view' => 'bundles']);
        }

        $selectedIds = $request->input('elective_course_ids', []);
        if (! is_array($selectedIds)) {
            $selectedIds = [$selectedIds];
        }
        $selectedIds = array_values(array_unique(array_filter(array_map('intval', $selectedIds))));

        if ($selectedIds === []) {
            Toastr::error('Select at least one elective course.', trans('common.Failed'));

            return redirect()->back();
        }

        $data = $this->setupPageData($purchase);
        $availableIds = collect($data['optionalElectiveCourses'])->pluck('id')->map(function ($courseId) {
            return (int) $courseId;
        })->all();

        foreach ($selectedIds as $courseId) {
            if (! in_array($courseId, $availableIds, true)) {
                Toastr::error('One or more selected electives are not available.', trans('common.Failed'));

                return redirect()->back();
            }
        }

        $courses = CeCourse::query()->whereIn('id', $selectedIds)->get()->keyBy('id');
        $sortBase = (int) $purchase->items()->max('sort_order') + 1;

        DB::transaction(function () use ($purchase, $selectedIds, $courses, $sortBase) {
            foreach ($selectedIds as $index => $courseId) {
                $course = $courses->get($courseId);
                if (! $course) {
                    continue;
                }

                $exists = CeCourseEnrollment::query()
                    ->where('user_id', $purchase->user_id)
                    ->where('ce_course_id', $course->id)
                    ->exists();

                if ($exists) {
                    continue;
                }

                $enrollment = CeCourseEnrollment::create([
                    'user_id' => $purchase->user_id,
                    'ce_course_id' => $course->id,
                    'ce_purchase_id' => $purchase->id,
                    'source' => 'bundle',
                    'progress' => 0,
                    'status' => 'not_started',
                    'purchase_price' => 0,
                ]);

                CePurchaseItem::create([
                    'ce_purchase_id' => $purchase->id,
                    'ce_course_id' => $course->id,
                    'course_title' => $course->title,
                    'contact_hours' => $course->contact_hours ?? 0,
                    'course_role' => 'elective',
                    'sort_order' => $sortBase + $index,
                    'ce_course_enrollment_id' => $enrollment->id,
                ]);

                $this->enrollmentService->ensureLmsEnrollment(
                    $course,
                    Auth::user(),
                    $purchase->tracking,
                    0
                );

                $course->increment('total_enrolled');
            }
        });

        Toastr::success('Elective courses added to your package.', trans('common.Success'));

        $purchase->refresh();
        $updated = $this->setupPageData($purchase);

        if (($updated['remainingElectiveHours'] ?? 0) > 0.001 && $bundle->slug) {
            return redirect()->route('continuingEducationBundle', ['slug' => $bundle->slug]);
        }

        return redirect()->route('cePortal.courses');
    }

    protected function findOwnedBundlePurchase(int $id): CePurchase
    {
        return CePurchase::query()
            ->with(['ceBundle.electiveCourses', 'ceBundle.mandatoryCourses', 'items', 'enrollments'])
            ->paid()
            ->where('user_id', Auth::id())
            ->where('item_type', 'bundle')
            ->findOrFail($id);
    }

    protected function setupPageData(CePurchase $purchase): array
    {
        $bundle = $purchase->ceBundle;
        $enrolledIds = $purchase->enrollments->pluck('ce_course_id')->map(function ($id) {
            return (int) $id;
        })->all();

        $lockedElectives = collect();
        $mandatoryCourses = collect();

        if ($bundle) {
            $mandatoryCourses = $bundle->mandatoryCourses;
            $lockedElectives = $this->catalogService->lockedElectivesForBundle($bundle);
            $optionalElectives = $this->catalogService->optionalElectivesForBundle($bundle)
                ->reject(function (CeCourse $course) use ($enrolledIds) {
                    return in_array((int) $course->id, $enrolledIds, true);
                })
                ->values();
        } else {
            $optionalElectives = collect();
        }

        $enrolledElectiveHours = (float) $purchase->items
            ->where('course_role', 'elective')
            ->sum('contact_hours');

        $allowed = (float) ($purchase->elective_hours_allowed ?? optional($bundle)->elective_hours_allowed ?? 0);
        $remaining = max(0, $allowed - $enrolledElectiveHours);

        return [
            'purchase' => $purchase,
            'bundle' => $bundle,
            'mandatoryCourses' => $mandatoryCourses,
            'lockedElectiveCourses' => $lockedElectives,
            'enrolledElectiveItems' => $purchase->items->where('course_role', 'elective')->values(),
            'optionalElectiveCourses' => $optionalElectives,
            'electiveHoursAllowed' => $allowed,
            'enrolledElectiveHours' => $enrolledElectiveHours,
            'remainingElectiveHours' => $remaining,
            'ceCatalog' => $this->catalogService,
        ];
    }
}
