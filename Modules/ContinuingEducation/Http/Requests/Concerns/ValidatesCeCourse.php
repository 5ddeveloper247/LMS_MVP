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
            'audience_group' => 'required|in:rn,lpn_aprn',
            // 'compliance_topic' => 'nullable|string|max:150',
            // 'ce_broker_course_id' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,bmp,png,jpg,gif,webp|max:4096',
            'status' => 'nullable',
            'is_featured' => 'nullable',
            'is_free' => 'nullable',
            'is_discount' => 'nullable',
        ];
    }

    public function messages()
    {
        return validationMessage($this->rules());
    }

    public function toPayload(): array
    {
        $validated = $this->validated();

        $validated['user_id'] = (int) $validated['assign_instructor'];
        unset($validated['assign_instructor']);

        $audienceMap = [
            'rn' => ['rn'],
            'lpn_aprn' => ['lpn', 'aprn'],
        ];
        $validated['audience'] = $audienceMap[$this->input('audience_group')] ?? ['rn'];
        unset($validated['audience_group']);

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
