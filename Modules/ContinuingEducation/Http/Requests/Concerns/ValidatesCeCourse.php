<?php

namespace Modules\ContinuingEducation\Http\Requests\Concerns;

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
            'discount_price' => 'nullable|numeric|min:0',
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
            'is_discount' => 'nullable',
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
            'discount_price.numeric' => 'Discount price must be a valid number.',
            'discount_price.min' => 'Discount price cannot be negative.',
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
            'discount_price' => 'discount price',
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
            $validated['discount_price'] = null;
        } else {
            $validated['price'] = $validated['price'] ?? 0;
            if (!$this->boolean('is_discount')) {
                $validated['discount_price'] = null;
            }
        }

        $validated['assistant_instructors'] = $this->input('assistant_instructors', []);

        unset($validated['is_free'], $validated['is_discount'], $validated['image']);

        return $validated;
    }
}
