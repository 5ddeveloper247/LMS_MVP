<?php

namespace Modules\ContinuingEducation\Http\Requests\Concerns;

use Modules\Shop\Entities\ShopProduct;

trait ValidatesCeCourse
{
    public function authorize()
    {
        return true;
    }

    abstract protected function courseId(): ?int;

    public function rules()
    {
        $courseId = $this->courseId();

        $codeRule = 'nullable|string|max:100|unique:ce_courses,course_code';

        if ($courseId) {
            $codeRule .= ',' . $courseId;
        }

        return [
            'title' => 'required|string|max:255',
            'course_code' => $codeRule,
            'about' => 'nullable|string',
            'outcomes' => 'nullable|string',
            'assign_instructor' => 'required|integer|exists:users,id',
            'assistant_instructors' => 'nullable|array',
            'assistant_instructors.*' => 'integer|exists:users,id',
            'price' => 'nullable|numeric|min:0',
            'tax_percent' => 'nullable|numeric|min:0|max:100',
            'discount_type' => 'nullable|in:fixed,percent',
            'discount' => 'nullable|numeric|min:0',
            'contact_hours' => 'required|numeric|min:0|max:999.9',
            'course_type' => 'required|in:mandatory,elective',
            'audience_groups' => 'required|array|min:1',
            'audience_groups.*' => 'in:rn,lpn_aprn',
            // 'compliance_topic' => 'nullable|string|max:150',
            // 'ce_broker_course_id' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,bmp,png,jpg,gif,webp|max:4096',
            'status' => 'nullable',
            'is_featured' => 'nullable',
            'is_free' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter a course title.',
            'title.max' => 'The course title may not be greater than 255 characters.',
            'course_code.max' => 'The course code may not be greater than 100 characters.',
            'course_code.unique' => 'This course code is already in use. Please enter a different one.',
            'assign_instructor.required' => 'Please select an instructor.',
            'assign_instructor.integer' => 'Please select a valid instructor.',
            'assign_instructor.exists' => 'The selected instructor could not be found.',
            'assistant_instructors.*.integer' => 'Each assistant instructor must be valid.',
            'assistant_instructors.*.exists' => 'One or more assistant instructors could not be found.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'tax_percent.numeric' => 'Tax percent must be a valid number.',
            'tax_percent.min' => 'Tax percent cannot be negative.',
            'tax_percent.max' => 'Tax percent may not be greater than 100.',
            'discount_type.in' => 'Discount type must be fixed or percent.',
            'discount.numeric' => 'Discount must be a valid number.',
            'discount.min' => 'Discount cannot be negative.',
            'contact_hours.required' => 'Please enter contact hours.',
            'contact_hours.numeric' => 'Contact hours must be a valid number.',
            'contact_hours.min' => 'Contact hours cannot be negative.',
            'contact_hours.max' => 'Contact hours may not exceed 999.9.',
            'course_type.required' => 'Please select a course type (Mandatory or Elective).',
            'course_type.in' => 'Please select a valid course type.',
            'audience_groups.required' => 'Please select at least one audience (RN and/or LPN/APRN).',
            'audience_groups.min' => 'Please select at least one audience (RN and/or LPN/APRN).',
            'audience_groups.*.in' => 'Please select a valid audience.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a JPEG, PNG, JPG, GIF, BMP, or WebP file.',
            'image.max' => 'The image may not be larger than 4 MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'course title',
            'course_code' => 'course code',
            'assign_instructor' => 'instructor',
            'contact_hours' => 'contact hours',
            'course_type' => 'course type',
            'audience_groups' => 'audience',
            'tax_percent' => 'tax percent',
            'discount_type' => 'discount type',
            'discount' => 'discount',
        ];
    }

    public function toPayload(): array
    {
        $validated = $this->validated();

        $validated['user_id'] = (int) $validated['assign_instructor'];
        unset($validated['assign_instructor']);

        $validated['audience'] = ceAudienceFromGroups($this->input('audience_groups', []));
        unset($validated['audience_groups']);

        $validated['category_id'] = null;
        $validated['lang_id'] = 19;
        $validated['level'] = null;
        $validated['requirements'] = null;
        $validated['what_learn1'] = null;
        $validated['what_learn2'] = null;
        $validated['meta_keywords'] = null;
        $validated['meta_description'] = null;
        $validated['seq_no'] = null;
        $validated['compliance_topic'] = null;
        $validated['ce_broker_course_id'] = null;
        $validated['duration'] = null;
        $validated['trailer_link'] = null;
        $validated['publish'] = 1;
        $validated['status'] = $this->boolean('status', true) ? 1 : 0;
        $validated['is_featured'] = $this->boolean('is_featured') ? 1 : 0;

        if ($this->boolean('is_free')) {
            $validated['price'] = 0;
            $validated['tax_percent'] = 0;
            $validated['tax'] = 0;
            $validated['discount_type'] = null;
            $validated['discount'] = 0;
            $validated['total_amount'] = 0;
            $validated['total_tax'] = 0;
            $validated['total_discount'] = 0;
            $validated['discount_price'] = null;
        } else {
            $price = (float) ($validated['price'] ?? 0);
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

            $validated['price'] = $price;
            $validated['tax_percent'] = $taxPercent;
            $validated['tax'] = $taxPercent;
            $validated['discount_type'] = $discountType;
            $validated['discount'] = $discount;
            $validated['total_amount'] = $totals['total_amount'];
            $validated['total_tax'] = $totals['total_tax'];
            $validated['total_discount'] = $totals['total_discount'];
            $validated['discount_price'] = $totals['total_discount'] > 0.001
                ? max($price - $totals['total_discount'], 0)
                : null;
        }

        $validated['assistant_instructors'] = $this->input('assistant_instructors', []);

        unset($validated['is_free'], $validated['image']);

        return $validated;
    }
}
