<?php

namespace Modules\ContinuingEducation\Http\Requests\Concerns;

use Illuminate\Validation\Validator;
use Modules\ContinuingEducation\Entities\CeCourse;

trait ValidatesCeBundle
{
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $this->validateCeBundleHours($validator);
        });
    }

    protected function validateCeBundleHours(Validator $validator): void
    {
        if ($validator->errors()->isNotEmpty()) {
            return;
        }

        $totalHours = (float) $this->input('total_hours', 0);
        $electiveHours = (float) $this->input('elective_hours_allowed', 0);
        $courseIds = array_map('intval', $this->input('mandatory_course_ids', []));

        if ($electiveHours > $totalHours) {
            $validator->errors()->add(
                'elective_hours_allowed',
                'Elective hours cannot exceed total hours.'
            );
        }

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
            );

            return;
        }

        if (($mandatorySum + $electiveHours) > $totalHours) {
            $validator->errors()->add(
                'elective_hours_allowed',
                'Mandatory hours (' . $this->formatHours($mandatorySum)
                . ') plus elective hours cannot exceed total hours (' . $this->formatHours($totalHours) . ').'
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
            'compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'license_type' => ['required', 'in:rn_lpn,aprn'],
            'card_style' => ['required', 'in:primary,secondary'],
            'mandatory_course_ids' => ['required', 'array', 'min:1'],
            'mandatory_course_ids.*' => ['integer', 'exists:ce_courses,id'],
            'seq_no' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'status' => ['nullable', 'boolean'],
            'publish' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
            'is_best_seller' => ['nullable', 'boolean'],
        ];
    }

    protected function ceBundlePayload(): array
    {
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
            'elective_hours_allowed' => $this->input('elective_hours_allowed'),
            'price' => $this->input('price'),
            'compare_at_price' => $this->input('compare_at_price'),
            'license_type' => $this->input('license_type', 'rn_lpn'),
            'card_style' => $this->input('card_style', 'primary'),
            'mandatory_course_ids' => array_map('intval', $this->input('mandatory_course_ids', [])),
            'seq_no' => $this->input('seq_no'),
            'status' => $this->has('status'),
            'publish' => $this->has('publish'),
            'featured' => $this->has('featured'),
            'is_best_seller' => $this->has('is_best_seller'),
        ];
    }
}
