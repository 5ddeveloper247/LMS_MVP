<?php

namespace Modules\CeProfessional\Services;

use App\User;
use Carbon\Carbon;
use Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface;

class CeDashboardService
{
    protected $ceProfessionalRepository;

    public function __construct(CeProfessionalRepositoryInterface $ceProfessionalRepository)
    {
        $this->ceProfessionalRepository = $ceProfessionalRepository;
    }

    public function getDashboardData(User $user): array
    {
        $profile = $this->ceProfessionalRepository->findByUserId($user->id);
        $licenseTypes = config('ceprofessional.license_types', []);
        $licenseShort = $profile ? strtoupper($profile->license_type) : 'RN';

        $preview = $this->getStaticPreviewData();

        $renewalDate = $profile?->renewal_date ?? Carbon::parse('2027-10-31');
        $daysUntilRenewal = max(0, now()->startOfDay()->diffInDays($renewalDate, false));

        return array_merge($preview, [
            'user' => $user,
            'profile' => $profile,
            'first_name' => explode(' ', trim($user->name ?? ''))[0] ?: 'there',
            'license_label' => $profile
                ? ($licenseTypes[$profile->license_type] ?? $licenseShort)
                : 'Registered Nurse (RN)',
            'license_short' => $licenseShort,
            'license_number' => $profile?->fl_license_number ?? '951234',
            'renewal_date' => $renewalDate,
            'days_until_renewal' => $daysUntilRenewal > 0 ? $daysUntilRenewal : $preview['stats']['days_until_renewal'],
        ]);
    }

    /**
     * Static Figma preview data — replace with live enrollments/compliance later.
     */
    protected function getStaticPreviewData(): array
    {
        return [
            'stats' => [
                'hours_completed' => 10,
                'hours_required' => 26,
                'hours_percent' => 38,
                'courses_in_progress' => 2,
                'courses_in_progress_note' => '1 mandatory · 1 elective',
                'certificates_earned' => 3,
                'days_until_renewal' => 463,
                'renewal_date_label' => 'October 31, 2027',
            ],
            'compliance' => [
                'percent' => 38,
                'hours_completed' => 10,
                'hours_required' => 26,
                'requirements' => [
                    ['label' => 'Prevention of Medical Errors', 'hours' => '2h', 'completed' => true],
                    ['label' => 'Human Trafficking', 'hours' => '2h', 'completed' => true],
                    ['label' => 'HIV/AIDS', 'hours' => '1h', 'completed' => true],
                    ['label' => 'Florida Laws & Rules', 'hours' => '2h', 'completed' => false],
                    ['label' => 'Recognizing Impairment', 'hours' => '2h', 'completed' => false],
                    ['label' => 'Domestic Violence', 'hours' => '2h', 'completed' => false],
                    ['label' => 'General Electives', 'hours' => '5h / 15h', 'completed' => false],
                ],
            ],
            'active_courses' => [
                [
                    'title' => 'Prevention of Medical Errors',
                    'type' => 'Mandatory',
                    'hours' => 2,
                    'status' => 'completed',
                    'progress' => 100,
                    'progress_label' => '100% Complete',
                    'progress_detail' => '2/2 hours',
                    'broker_status' => 'reported',
                    'action_label' => 'Download Certificate',
                    'action_style' => 'outline',
                ],
                [
                    'title' => 'Florida Laws & Rules',
                    'type' => 'Mandatory',
                    'hours' => 2,
                    'status' => 'in_progress',
                    'progress' => 45,
                    'progress_label' => '45% Complete',
                    'progress_detail' => '~40 min remaining',
                    'broker_status' => null,
                    'action_label' => 'Resume Course',
                    'action_style' => 'primary',
                ],
                [
                    'title' => 'Recognizing Impairment in the Workplace',
                    'type' => 'Mandatory',
                    'hours' => 2,
                    'status' => 'not_started',
                    'progress' => 0,
                    'progress_label' => '0% Complete',
                    'progress_detail' => 'Not yet started',
                    'broker_status' => null,
                    'action_label' => 'Launch Course',
                    'action_style' => 'primary',
                ],
            ],
            'recommended_electives' => [
                [
                    'category' => 'Patient Safety',
                    'title' => 'Documentation Pitfalls: Stay Out of Court',
                    'description' => 'Legal risk reduction in clinical charting and documentation.',
                    'hours' => '2 Contact Hours',
                    'price' => '$19.97',
                    'featured' => true,
                ],
                [
                    'category' => 'Behavioral Health',
                    'title' => 'Workplace De-escalation',
                    'description' => 'Verbal intervention strategies for healthcare settings.',
                    'hours' => '2 Contact Hours',
                    'price' => '$19.97',
                    'featured' => false,
                ],
                [
                    'category' => 'Compliance',
                    'title' => 'Social Media & HIPAA Rules',
                    'description' => 'Digital compliance and privacy pitfalls for modern nurses.',
                    'hours' => '1 Contact Hour',
                    'price' => '$19.97',
                    'featured' => false,
                ],
            ],
            'nurse_network' => [
                'regulatory' => [
                    'category' => 'FL Regulatory Update',
                    'title' => 'Florida BON Updates — July 2026',
                    'excerpt' => 'Summary of rule changes affecting RNs and APRNs effective August 1, 2026. Review new CE reporting requirements and renewal timelines.',
                    'author' => 'MXP Team',
                    'replies' => 12,
                ],
                'posts' => [
                    [
                        'initials' => 'LM',
                        'name' => 'Lisa M., RN',
                        'time' => '2 days ago',
                        'body' => 'Has anyone taken the De-escalation for Acute Agitation course? Looking for feedback before I enroll.',
                        'replies' => 8,
                        'tag' => 'Clinical Discussion',
                    ],
                    [
                        'initials' => 'TP',
                        'name' => 'Tanya P., APRN',
                        'time' => '4 days ago',
                        'body' => 'How long does it usually take for course completion to show up in CE Broker after finishing on MXP?',
                        'replies' => 14,
                        'tag' => 'CE Broker Help',
                    ],
                ],
                'mentorship' => [
                    'category' => 'Mentorship',
                    'title' => 'Mentor a Nursing Student',
                    'description' => 'Volunteer to guide pre-licensure nursing students through clinical readiness and career planning.',
                    'cta' => 'Sign up inside the community',
                ],
            ],
            'ce_broker' => [
                'renewal_date' => 'October 31, 2027',
                'days_remaining' => 463,
                'last_synced' => 'July 22, 2026 at 3:14 PM',
            ],
        ];
    }
}
