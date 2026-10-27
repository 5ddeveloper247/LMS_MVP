<?php

namespace Modules\Certification\Services;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Modules\Certification\Entities\CertificationEnrollment;

class CertificationStudentDashboardService
{
    public function __construct(
        protected CertificationCatalogService $catalog
    ) {}

    public function isAvailable(): bool
    {
        try {
            if (! function_exists('routeIsExist') || ! routeIsExist('certifications.index')) {
                return false;
            }

            return Schema::hasTable('certification_offerings');
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * @return array{show: bool, is_ce_professional?: bool, enrollment_count?: int, items?: Collection, title?: string, intro?: string, browse_url?: string, browse_label?: string, empty_message?: string}
     */
    public function forUser(User $user): array
    {
        if (! $this->isAvailable()) {
            return ['show' => false];
        }

        $isCe = function_exists('userIsCeProfessional') && userIsCeProfessional($user);

        $count = 0;
        $items = collect();

        if (Schema::hasTable('certification_enrollments')) {
            $baseQuery = CertificationEnrollment::query()
                ->where('user_id', $user->id)
                ->where('payment_status', 'paid');

            $count = (clone $baseQuery)->count();

            $recent = (clone $baseQuery)
                ->with(['offering.category'])
                ->orderByDesc('id')
                ->limit(3)
                ->get();

            $items = $recent->map(function (CertificationEnrollment $enrollment) {
            $offering = $enrollment->offering;
            $slug = $offering ? $this->catalog->routeSlug($offering) : null;

            return [
                'title' => $offering->name ?? __('Certification'),
                'badge' => optional($offering->category)->name,
                'option' => $enrollment->option_title,
                'class_date' => $enrollment->classDateLabel(),
                'enrolled_at' => showDate($enrollment->created_at),
                'amount' => getPriceFormat($enrollment->total_paid),
                'enroll_url' => $slug
                    ? route('certifications.show', ['slug' => $slug])
                    : route('certifications.index'),
            ];
            });
        }

        return [
            'show' => true,
            'is_ce_professional' => $isCe,
            'enrollment_count' => $count,
            'items' => $items,
            'title' => $isCe
                ? 'Life support certifications'
                : 'My life support certifications',
            'intro' => $isCe
                ? 'Hands-on ACLS, BLS, PALS, and skills sessions. These programs are separate from your CE course hours and CE Broker reporting.'
                : 'Track your life support registrations, class dates, and next steps for ACLS, BLS, and related programs.',
            'browse_url' => route('certifications.index'),
            'browse_label' => $isCe ? 'View certification catalog' : 'Browse certifications',
            'empty_message' => $isCe
                ? 'You have not registered for a life support certification yet. Many CE professionals complete ACLS or BLS here alongside online CE courses.'
                : 'You have not registered for a life support certification yet. Explore ACLS, BLS, PALS, and more.',
        ];
    }
}
