<?php

namespace Modules\Certification\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\Certification\Entities\CertificationCategory;
use Modules\Certification\Entities\CertificationGroup;
use Modules\Certification\Entities\CertificationOffering;
use Modules\Certification\Entities\CertificationOfferingOption;
use Modules\Certification\Entities\CertificationOfferingSession;

class CertificationCatalogService
{
    private ?bool $offeringsHasOutcomesColumn = null;

    private ?bool $offeringsHasRequirementsColumn = null;

    /** @var array<string, array<string, mixed>> */
    private array $groupPresentation = [
        'life-support' => [
            'section_id' => 'life-support',
            'section_class' => 'course-group',
            'layout' => 'grid',
            'eyebrow' => 'Life Support',
            'title_html' => 'Life support <em>certifications</em>',
            'intro' => 'Choose <strong>Initial</strong> if this is your first time or your card has expired. Choose <strong>Renewal</strong> if you hold a current card for the same course.',
        ],
        'clinical-quality' => [
            'section_id' => 'clinical-quality',
            'section_class' => 'course-group alt',
            'layout' => 'stack',
            'eyebrow' => 'Clinical Skills & Quality',
            'title_html' => 'Build skills that <em>advance your practice</em>',
            'intro' => 'Specialized training for nurses expanding their scope at the bedside, and for clinicians moving into quality, data, and chart abstraction roles.',
        ],
        'skills-specialty' => [
            'section_id' => 'skills',
            'section_class' => 'course-group',
            'layout' => 'skills',
            'eyebrow' => 'AHA Blended Learning',
            'title_html' => 'Finished online? <em>Finish your card here.</em>',
            'intro' => 'If you completed the online HeartCode® portion of ACLS, BLS, or PALS, the hands-on skills session is the last step before you receive your course completion card.',
        ],
    ];

    public function hubCatalog(): array
    {
        if (! Schema::hasTable('certification_offerings')) {
            return $this->emptyCatalog();
        }

        $offerings = $this->publishedOfferings();
        $groups = $this->publishedGroups();

        $groupBlocks = [];
        foreach ($groups as $group) {
            $groupOfferings = $offerings->where('certification_group_id', $group->id)->values();
            if ($groupOfferings->isEmpty()) {
                continue;
            }

            $presentation = $this->groupPresentation[$group->slug] ?? [
                'section_id' => $group->slug,
                'section_class' => 'course-group',
                'layout' => 'grid',
                'eyebrow' => $group->name,
                'title_html' => e($group->name),
                'intro' => '',
            ];

            $groupBlocks[] = [
                'group' => $group,
                'presentation' => $presentation,
                'offerings' => $groupOfferings,
            ];
        }

        $ungrouped = $offerings->whereNull('certification_group_id')->values();
        if ($ungrouped->isNotEmpty()) {
            $groupBlocks[] = [
                'group' => null,
                'presentation' => [
                    'section_id' => 'more-certifications',
                    'section_class' => 'course-group',
                    'layout' => 'grid',
                    'eyebrow' => 'Certifications',
                    'title_html' => 'More <em>offerings</em>',
                    'intro' => '',
                ],
                'offerings' => $ungrouped,
            ];
        }

        $jumpItems = $this->hubJumpItems($offerings);

        $firstSectionId = $groupBlocks[0]['presentation']['section_id'] ?? 'life-support';

        return [
            'groupBlocks' => $groupBlocks,
            'jumpItems' => $jumpItems,
            'heroOfferings' => $this->heroOfferings($offerings),
            'glanceOfferings' => $offerings,
            'totalCount' => $offerings->count(),
            'firstSectionId' => $firstSectionId,
        ];
    }

    public function findPublishedBySlug(string $slug): ?CertificationOffering
    {
        return $this->resolvePublishedSlug($slug);
    }

    public function resolvePublishedSlug(string $slug): ?CertificationOffering
    {
        if (! Schema::hasTable('certification_offerings')) {
            return null;
        }

        $normalized = strtolower(trim($slug));
        $with = ['category:id,name,slug', 'options', 'deliveryParts', 'group:id,name,slug'];

        $offering = CertificationOffering::query()
            ->published()
            ->whereRaw('LOWER(slug) = ?', [$normalized])
            ->with($with)
            ->first();

        if ($offering) {
            return $offering;
        }

        if (! Schema::hasTable('certification_categories')) {
            return null;
        }

        $category = CertificationCategory::query()
            ->active()
            ->whereRaw('LOWER(slug) = ?', [$normalized])
            ->first();

        if (! $category) {
            return null;
        }

        return CertificationOffering::query()
            ->published()
            ->where('certification_category_id', $category->id)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->with($with)
            ->first();
    }

    /** URL slug for show / enroll / detail switcher (category slug when set). */
    public function routeSlug(CertificationOffering $offering): string
    {
        if ($offering->relationLoaded('category') && $offering->category?->slug) {
            return $offering->category->slug;
        }

        return $offering->slug;
    }

    /**
     * @return array{slug: string, switcherItems: Collection, coursesJson: array<string, array>, pageTitle: string}
     */
    public function detailPage(CertificationOffering $current): array
    {
        $offerings = $this->publishedOfferings();
        $currentKey = $this->routeSlug($current);
        $coursesJson = [];

        foreach ($offerings as $offering) {
            $key = $this->routeSlug($offering);
            if (isset($coursesJson[$key])) {
                continue;
            }
            $coursesJson[$key] = $this->offeringToDetailCourse(
                $offering,
                $offerings,
                $key === $currentKey
            );
        }

        if (! isset($coursesJson[$currentKey])) {
            $coursesJson[$currentKey] = $this->offeringToDetailCourse($current, $offerings, true);
        }

        $switcherItems = $this->hubJumpItems($offerings)->map(fn (array $item) => [
            'slug' => ltrim($item['anchor'], '#'),
            'label' => $item['label'],
        ]);

        return [
            'slug' => $this->routeSlug($current),
            'switcherItems' => $switcherItems,
            'coursesJson' => $coursesJson,
            'pageTitle' => $this->pillLabel($current).' Certification',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function offeringToDetailCourse(
        CertificationOffering $offering,
        Collection $allOfferings,
        bool $includeFullBody = true
    ): array {
        $options = $offering->relationLoaded('options') ? $offering->options : $offering->options()->get();

        $tuition = $options->map(fn ($option) => [
            $option->title,
            (float) $option->price,
            $option->product_code ?: '',
        ])->values()->all();

        $codes = $options->map(fn ($option) => [
            $option->title,
            $option->product_code ?: '—',
        ])->values()->all();

        if ($codes === []) {
            $codes = [['Course', '—']];
        }

        $ceHours = $offering->ce_hours;
        if ($ceHours !== null && (float) $ceHours > 0) {
            $ce = rtrim(rtrim(number_format((float) $ceHours, 1), '0'), '.').' contact hours';
            $ceNote = (string) ($offering->ce_note ?? '');
        } else {
            $ce = $offering->ce_note ?: 'Not applicable';
            $ceNote = '';
        }

        $durationNote = $offering->relationLoaded('deliveryParts') && $offering->deliveryParts->isNotEmpty()
            ? $offering->deliveryPartsSummary()
            : '';

        $related = $allOfferings
            ->filter(fn (CertificationOffering $o) => $o->id !== $offering->id
                && $o->certification_group_id === $offering->certification_group_id)
            ->take(3)
            ->map(fn (CertificationOffering $o) => $this->routeSlug($o))
            ->values()
            ->all();

        if (count($related) < 3) {
            foreach ($allOfferings as $other) {
                if (count($related) >= 3) {
                    break;
                }
                if ($other->id === $offering->id) {
                    continue;
                }
                $key = $this->routeSlug($other);
                if (! in_array($key, $related, true)) {
                    $related[] = $key;
                }
            }
        }

        return [
            'mark' => $this->pillLabel($offering),
            'name' => $offering->name,
            'cat' => $this->cardCategoryLabel($offering),
            'variant' => $this->cardCredVariant($offering),
            'fmt' => $this->hubFormatLabel($offering),
            'ctaVerb' => 'get certified?',
            'desc' => $offering->short_description ?: Str::limit(strip_tags($offering->content ?? ''), 500),
            'duration' => $this->hubDurationLabel($offering),
            'durationShort' => $this->hubDurationLabel($offering),
            'durationNote' => $durationNote,
            'ce' => $ce,
            'ceNote' => $ceNote,
            'codes' => $codes,
            'tuition' => $tuition,
            'expect' => '',
            'learn' => [],
            'outline' => [],
            'outcomesHtml' => $includeFullBody && $this->offeringsHasOutcomesColumn()
                ? ($offering->outcomes ?? '')
                : '',
            'requirementsHtml' => $includeFullBody && $this->offeringsHasRequirementsColumn()
                ? ($offering->requirements ?? '')
                : '',
            'contentHtml' => $includeFullBody ? ($offering->content ?? '') : '',
            'related' => $related,
        ];
    }

    private function offeringsHasOutcomesColumn(): bool
    {
        if ($this->offeringsHasOutcomesColumn === null) {
            $this->offeringsHasOutcomesColumn = Schema::hasColumn('certification_offerings', 'outcomes');
        }

        return $this->offeringsHasOutcomesColumn;
    }

    private function offeringsHasRequirementsColumn(): bool
    {
        if ($this->offeringsHasRequirementsColumn === null) {
            $this->offeringsHasRequirementsColumn = Schema::hasColumn('certification_offerings', 'requirements');
        }

        return $this->offeringsHasRequirementsColumn;
    }

    /**
     * Jump nav pills — active categories that have at least one published offering.
     */
    public function hubJumpItems(Collection $publishedOfferings): Collection
    {
        if (! Schema::hasTable('certification_categories')) {
            return collect();
        }

        $categoryIds = $publishedOfferings
            ->pluck('certification_category_id')
            ->filter()
            ->unique()
            ->values();

        if ($categoryIds->isEmpty()) {
            return collect();
        }

        return CertificationCategory::query()
            ->active()
            ->whereIn('id', $categoryIds)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name', 'slug'])
            ->map(fn (CertificationCategory $category) => [
                'label' => $category->name,
                'anchor' => '#'.$category->slug,
            ])
            ->values();
    }

    public function offeringAnchorId(CertificationOffering $offering): string
    {
        if ($offering->relationLoaded('category') && $offering->category?->slug) {
            return $offering->category->slug;
        }

        return $offering->slug;
    }

    public function pillLabel(CertificationOffering $offering): string
    {
        if ($offering->relationLoaded('category') && $offering->category) {
            return $offering->category->name;
        }

        return $offering->name;
    }

    public function cardCategoryLabel(CertificationOffering $offering): string
    {
        $categorySlug = $offering->category->slug ?? null;
        if ($categorySlug === 'hedis') {
            return 'Quality & Data';
        }
        if (in_array($categorySlug, ['iv-therapy', 'skills-check'], true)) {
            return 'Clinical Skills';
        }
        if (($offering->group->slug ?? null) === 'life-support') {
            return 'Life Support';
        }

        return $offering->group->name ?? 'Certification';
    }

    public function cardCredVariant(CertificationOffering $offering): string
    {
        $categorySlug = $offering->category->slug ?? null;
        if ($categorySlug === 'hedis') {
            return 'cred--warm';
        }
        if (in_array($categorySlug, ['iv-therapy', 'skills-check'], true)) {
            return 'cred--mid';
        }

        return '';
    }

    public function hubFormatLabel(CertificationOffering $offering): string
    {
        if ($offering->format_label) {
            return $offering->format_label;
        }

        if ($offering->delivery_mode === 'hybrid' && $offering->relationLoaded('deliveryParts') && $offering->deliveryParts->isNotEmpty()) {
            return $offering->deliveryPartsSummary();
        }

        return $offering->delivery_mode_label;
    }

    public function hubDurationLabel(CertificationOffering $offering): string
    {
        return $offering->duration_summary ?: '—';
    }

    /** @return array<int, array{label: string, amount: string, note: ?string, is_renewal: bool}> */
    public function hubPriceBoxes(CertificationOffering $offering): array
    {
        $options = $offering->relationLoaded('options') ? $offering->options : $offering->options()->get();

        return $options->map(function ($option) {
            $isRenewal = stripos((string) $option->title, 'renewal') !== false;

            return [
                'label' => $option->title,
                'amount' => $this->formatMoney($option->price),
                'note' => $option->subtitle ?: null,
                'is_renewal' => $isRenewal,
            ];
        })->all();
    }

    /**
     * @return array{mode: string, initial?: string, renewal?: string, combined?: string}
     */
    public function glancePricing(CertificationOffering $offering): array
    {
        $options = $offering->relationLoaded('options') ? $offering->options : $offering->options()->get();

        if ($options->isEmpty()) {
            return ['mode' => 'single', 'combined' => '—'];
        }

        if ($options->count() === 1) {
            $option = $options->first();

            return [
                'mode' => 'single',
                'combined' => $this->formatMoney($option->price).' '.strtolower($option->title),
            ];
        }

        $initial = $options->first(fn ($o) => stripos((string) $o->title, 'initial') !== false);
        $renewal = $options->first(fn ($o) => stripos((string) $o->title, 'renewal') !== false);

        if ($initial && $renewal) {
            return [
                'mode' => 'dual',
                'initial' => $this->formatMoney($initial->price),
                'renewal' => $this->formatMoney($renewal->price),
            ];
        }

        $combined = $options
            ->map(fn ($o) => $this->formatMoney($o->price).' '.$o->title)
            ->implode(' · ');

        return ['mode' => 'combined', 'combined' => $combined];
    }

    public function approvalBadgeText(CertificationOffering $offering): ?string
    {
        $note = trim((string) $offering->ce_note);
        if ($note === '') {
            return null;
        }

        if (stripos($note, 'approved') !== false || stripos($note, 'BON') !== false) {
            return $note;
        }

        return null;
    }

    public function formatMoney($amount): string
    {
        return '$'.number_format((float) $amount, 0);
    }

    public function optionSkipsSession(CertificationOfferingOption $option): bool
    {
        $title = strtolower((string) $option->title);
        $sub = strtolower((string) ($option->subtitle ?? ''));

        return str_contains($title, 'self-study') || str_contains($title, 'self study')
            || str_contains($sub, 'self-study') || str_contains($sub, 'on your schedule');
    }

    public function optionRequiresRenewalDate(CertificationOfferingOption $option): bool
    {
        return stripos((string) $option->title, 'renewal') !== false;
    }

    /**
     * @return array<int, array{id: int, key: string, title: string, sub: string, optionId: int|null, location: string|null}>
     */
    public function enrollSessionsPayload(CertificationOffering $offering): array
    {
        if (! Schema::hasTable('certification_offering_sessions')) {
            return [];
        }

        return CertificationOfferingSession::query()
            ->where('certification_offering_id', $offering->id)
            ->bookable()
            ->get()
            ->map(function (CertificationOfferingSession $session) {
                return [
                    'id' => (int) $session->id,
                    'key' => (string) $session->id,
                    'title' => $session->title,
                    'sub' => $session->subtitle ?? '',
                    'optionId' => $session->certification_offering_option_id
                        ? (int) $session->certification_offering_option_id
                        : null,
                    'location' => $session->location,
                ];
            })
            ->values()
            ->all();
    }

    public function resolveBookableSession(
        CertificationOffering $offering,
        CertificationOfferingOption $option,
        int $sessionId
    ): ?CertificationOfferingSession {
        if (! Schema::hasTable('certification_offering_sessions')) {
            return null;
        }

        $session = CertificationOfferingSession::query()
            ->where('certification_offering_id', $offering->id)
            ->where('id', $sessionId)
            ->bookable()
            ->first();

        if (! $session) {
            return null;
        }

        if ($session->certification_offering_option_id
            && (int) $session->certification_offering_option_id !== (int) $option->id) {
            return null;
        }

        return $session;
    }

    /**
     * @return array{slug: string, switcherItems: Collection, certsJson: array, schedulesJson: array, checkoutUrl: string, pageTitle: string}
     */
    public function enrollPage(CertificationOffering $current): array
    {
        $offerings = $this->publishedOfferings();
        $currentKey = $this->routeSlug($current);
        $certsJson = [
            $currentKey => $this->offeringToEnrollCert($current),
        ];

        $switcherItems = $this->hubJumpItems($offerings)->map(fn (array $item) => [
            'slug' => ltrim($item['anchor'], '#'),
            'label' => $item['label'],
        ]);

        return [
            'slug' => $this->routeSlug($current),
            'switcherItems' => $switcherItems,
            'certsJson' => $certsJson,
            'schedulesJson' => $this->sampleEnrollmentSchedules(),
            'checkoutUrl' => route('certifications.enroll.checkout'),
            'pageTitle' => 'Enroll in '.$this->pillLabel($current),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function offeringToEnrollCert(CertificationOffering $offering): array
    {
        $categorySlug = $offering->category?->slug ?? '';
        $options = $offering->relationLoaded('options') ? $offering->options : $offering->options()->get();

        $optionRows = $options->map(function ($option) {
            $renewal = stripos((string) $option->title, 'renewal') !== false;

            return [
                'id' => (int) $option->id,
                'title' => $option->title,
                'sub' => $option->subtitle ?? '',
                'price' => (float) $option->price,
                'noSession' => $this->optionSkipsSession($option),
                'renewal' => $renewal,
            ];
        })->values()->all();

        $includes = $this->defaultIncludes($offering);
        $badge = $this->approvalBadgeText($offering);
        $scheduleKey = $this->enrollScheduleKey($offering);

        $sessionTitle = match ($scheduleKey) {
            'iv' => 'Pick your 2-day in-person lab',
            'hedis' => 'Pick a cohort start date',
            'skills' => 'Pick an appointment',
            default => 'Choose your training date',
        };

        $sessionLabel = match ($scheduleKey) {
            'iv' => 'In-person lab',
            'hedis' => 'Start date',
            'skills' => 'Appointment',
            default => 'Class date',
        };

        $prereq = null;
        if ($categorySlug === 'iv-therapy') {
            $prereq = [
                'title' => 'For licensed nurses',
                'text' => 'Enrollees must hold an active nursing license or advanced nursing student status. Complete the online pre-work before your in-person lab.',
            ];
        } elseif ($categorySlug === 'skills-check') {
            $prereq = [
                'title' => 'Complete the online portion first',
                'text' => 'Bring a printed, valid copy of your AHA HeartCode® online certificate of completion. No training is provided during this session; it is evaluation only.',
            ];
        }

        return [
            'mark' => $this->pillLabel($offering),
            'name' => $offering->name,
            'cat' => $this->cardCategoryLabel($offering),
            'variant' => $this->cardCredVariant($offering),
            'length' => $this->hubDurationLabel($offering),
            'fmt' => $this->hubFormatLabel($offering),
            'desc' => $offering->short_description ?: Str::limit(strip_tags($offering->content ?? ''), 500),
            'options' => $optionRows,
            'schedule' => $scheduleKey,
            'sessionTitle' => $sessionTitle,
            'sessionLabel' => $sessionLabel,
            'badge' => $badge,
            'needsLicense' => $categorySlug === 'iv-therapy',
            'needsOnline' => $categorySlug === 'skills-check',
            'prereq' => $prereq,
            'includes' => $includes,
            'sessions' => $this->enrollSessionsPayload($offering),
        ];
    }

    /** @return array<int, string> */
    private function defaultIncludes(CertificationOffering $offering): array
    {
        $parts = array_filter([
            $offering->duration_summary ? $offering->duration_summary.' of training' : null,
            $offering->format_label,
            $offering->ce_note,
            'Course completion card on successful completion',
        ]);

        return array_values($parts) ?: ['Enrollment includes instruction per the course description.'];
    }

    private function enrollScheduleKey(CertificationOffering $offering): string
    {
        return match ($offering->category?->slug ?? '') {
            'bls' => 'short',
            'iv-therapy' => 'iv',
            'hedis' => 'hedis',
            'skills-check' => 'skills',
            'acls', 'pals', 'cpr-first-aid' => 'long',
            default => 'long',
        };
    }

    /** Sample session dates until a training calendar is wired. */
    public function sampleEnrollmentSchedules(): array
    {
        return [
            'long' => [
                ['2026-11-05', 'Thursday, November 5, 2026', '9:00 AM – 5:00 PM'],
                ['2026-11-19', 'Thursday, November 19, 2026', '9:00 AM – 5:00 PM'],
                ['2026-12-03', 'Thursday, December 3, 2026', '9:00 AM – 5:00 PM'],
                ['2026-12-17', 'Thursday, December 17, 2026', '9:00 AM – 5:00 PM'],
            ],
            'short' => [
                ['2026-11-05', 'Thursday, November 5, 2026', '9:00 AM – 1:00 PM'],
                ['2026-11-14', 'Saturday, November 14, 2026', '10:00 AM – 2:00 PM'],
                ['2026-11-19', 'Thursday, November 19, 2026', '2:30 PM – 6:30 PM'],
                ['2026-12-05', 'Saturday, December 5, 2026', '10:00 AM – 2:00 PM'],
            ],
            'iv' => [
                ['2026-11-11', 'Wed–Thu, November 11–12, 2026', '8:30 AM – 6:30 PM both days · 20-hour skills lab'],
                ['2026-12-09', 'Wed–Thu, December 9–10, 2026', '8:30 AM – 6:30 PM both days · 20-hour skills lab'],
            ],
            'hedis' => [
                ['2026-11-09', 'Monday, November 9, 2026', 'Live cohort begins'],
                ['2026-12-07', 'Monday, December 7, 2026', 'Live cohort begins'],
                ['2027-01-11', 'Monday, January 11, 2027', 'Live cohort begins'],
            ],
            'skills' => [
                ['2026-11-02', 'Monday, November 2, 2026', '10:00 AM'],
                ['2026-11-04', 'Wednesday, November 4, 2026', '4:00 PM'],
                ['2026-11-07', 'Saturday, November 7, 2026', '11:00 AM'],
                ['2026-11-12', 'Thursday, November 12, 2026', '6:00 PM'],
            ],
        ];
    }

    private function publishedOfferings(): Collection
    {
        $query = CertificationOffering::query()
            ->published()
            ->orderBy('sort_order')
            ->orderBy('id');

        $with = ['options', 'deliveryParts', 'group:id,name,slug'];
        if (Schema::hasTable('certification_categories')) {
            $with[] = 'category:id,name,slug';
        }

        return $query->with($with)->get();
    }

    private function publishedGroups(): Collection
    {
        if (! Schema::hasTable('certification_groups')) {
            return collect();
        }

        return CertificationGroup::query()
            ->active()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    private function heroOfferings(Collection $offerings): Collection
    {
        $preferredSlugs = ['hedis', 'iv-therapy', 'acls'];
        $picked = collect();

        foreach ($preferredSlugs as $slug) {
            $match = $offerings->first(function (CertificationOffering $o) use ($slug) {
                return $o->slug === $slug || ($o->category && $o->category->slug === $slug);
            });
            if ($match && ! $picked->contains('id', $match->id)) {
                $picked->push($match);
            }
        }

        foreach ($offerings as $offering) {
            if ($picked->count() >= 3) {
                break;
            }
            if (! $picked->contains('id', $offering->id)) {
                $picked->push($offering);
            }
        }

        return $picked->take(3);
    }

    private function emptyCatalog(): array
    {
        return [
            'groupBlocks' => [],
            'jumpItems' => collect(),
            'heroOfferings' => collect(),
            'glanceOfferings' => collect(),
            'totalCount' => 0,
            'firstSectionId' => 'life-support',
        ];
    }
}
