<?php

namespace Modules\ContinuingEducation\Http\Requests\Concerns;

use Illuminate\Validation\Validator;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeLicenseType;
use Modules\Shop\Entities\ShopProduct;

trait ValidatesCeBundle
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'elective_hours_allowed' => $this->computeElectiveHoursAllowed(),
        ]);
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $this->validateCeBundleHours($validator);
        });
    }

    protected function computeElectiveHoursAllowed(): float
    {
        $totalHours = (float) $this->input('total_hours', 0);
        $courseIds = array_map('intval', $this->input('mandatory_course_ids', []));

        if ($courseIds === []) {
            return max(0, round($totalHours, 1));
        }

        $mandatorySum = (float) CeCourse::query()
            ->whereIn('id', $courseIds)
            ->sum('contact_hours');

        return max(0, round($totalHours - $mandatorySum, 1));
    }

    protected function validateCeBundleHours(Validator $validator): void
    {
        if ($validator->errors()->isNotEmpty()) {
            return;
        }

        $totalHours = (float) $this->input('total_hours', 0);
        $courseIds = array_map('intval', $this->input('mandatory_course_ids', []));

        if ($courseIds === []) {
            return;
        }

        $mandatorySum = (float) CeCourse::query()
            ->whereIn('id', $courseIds)
            ->sum('contact_hours');

        if ($mandatorySum > $totalHours) {
            $validator->errors()->add(
                'mandatory_course_ids',
                'Selected mandatory courses total ' . $this->formatHours($mandatorySum)
                . ' hours, which exceeds total hours (' . $this->formatHours($totalHours) . ').'
                . ' Remove some mandatory courses or increase total hours.'
            );
        }
    }

    protected function formatHours(float $hours): string
    {
        return rtrim(rtrim(number_format($hours, 1, '.', ''), '0'), '.');
    }

    protected function ceBundleRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'component_1' => ['required', 'string', 'max:500'],
            'component_2' => ['required', 'string', 'max:500'],
            'component_3' => ['required', 'string', 'max:500'],
            'component_4' => ['required', 'string', 'max:500'],
            'component_5' => ['required', 'string', 'max:500'],
            'component_6' => ['required', 'string', 'max:500'],
            'total_hours' => ['required', 'numeric', 'min:0', 'max:999.9'],
            'elective_hours_allowed' => ['required', 'numeric', 'min:0', 'max:999.9'],
            'price' => ['required', 'numeric', 'min:0'],
            'tax_percent' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount_type' => ['nullable', 'in:fixed,percent'],
            'discount' => ['nullable', 'numeric', 'min:0'],
            'ce_license_type_id' => [
                'required',
                'integer',
                'exists:ce_license_types,id',
            ],
            'card_style' => ['required', 'in:primary,secondary'],
            'mandatory_course_ids' => ['required', 'array', 'min:1'],
            'mandatory_course_ids.*' => ['integer', 'exists:ce_courses,id'],
            'elective_course_ids' => ['nullable', 'array'],
            'elective_course_ids.*' => ['integer', 'exists:ce_courses,id'],
            'seq_no' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'status' => ['nullable', 'boolean'],
            'publish' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
            'is_best_seller' => ['nullable', 'boolean'],
        ];
    }

    protected function ceBundlePayload(): array
    {
        $licenseId = (int) $this->input('ce_license_type_id');
        $license = CeLicenseType::query()
            ->forLms()
            ->where('status', 1)
            ->findOrFail($licenseId);

        $audienceKey = ceLicenseCardStyleToAudienceKey($license->card_style) ?? 'rn_lpn';

        $price = (float) $this->input('price', 0);
        $taxPercent = (float) $this->input('tax_percent', 0);
        $discountType = $this->input('discount_type') ?: null;
        $discount = (float) $this->input('discount', 0);

        if ($discountType === null || $discount <= 0) {
            $discountType = null;
            $discount = 0;
        }

        if ($discountType === 'percent' && $discount > 100) {
            $discount = 100;
        }

        $totals = ShopProduct::calculatePricing($price, $discountType, $discount, $taxPercent);

        return [
            'name' => $this->input('name'),
            'subtitle' => $this->input('subtitle'),
            'component_1' => $this->input('component_1'),
            'component_2' => $this->input('component_2'),
            'component_3' => $this->input('component_3'),
            'component_4' => $this->input('component_4'),
            'component_5' => $this->input('component_5'),
            'component_6' => $this->input('component_6'),
            'total_hours' => $this->input('total_hours'),
            'elective_hours_allowed' => $this->computeElectiveHoursAllowed(),
            'price' => $price,
            'tax_percent' => $taxPercent,
            'discount_type' => $discountType,
            'discount' => $discount,
            'total_amount' => $totals['total_amount'],
            'total_tax' => $totals['total_tax'],
            'total_discount' => $totals['total_discount'],
            'compare_at_price' => null,
            'ce_license_type_id' => $license->id,
            'license_type' => $audienceKey,
            'card_style' => $this->input('card_style', 'primary'),
            'mandatory_course_ids' => array_map('intval', $this->input('mandatory_course_ids', [])),
            'elective_course_ids' => array_values(array_unique(array_map('intval', $this->input('elective_course_ids', [])))),
            'seq_no' => $this->input('seq_no'),
            'status' => $this->has('status'),
            'publish' => $this->has('publish'),
            'featured' => $this->has('featured'),
            'is_best_seller' => $this->has('is_best_seller'),
        ];
    }
}
