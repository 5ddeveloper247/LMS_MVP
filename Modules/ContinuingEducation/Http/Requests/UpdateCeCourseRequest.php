<?php

namespace Modules\ContinuingEducation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\ContinuingEducation\Http\Requests\Concerns\ValidatesCeCourse;

class UpdateCeCourseRequest extends FormRequest
{
    use ValidatesCeCourse;

    protected function courseId(): ?int
    {
        return (int) $this->route('id');
    }
}
