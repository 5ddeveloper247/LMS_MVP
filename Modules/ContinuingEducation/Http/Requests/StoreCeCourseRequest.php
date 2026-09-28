<?php

namespace Modules\ContinuingEducation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\ContinuingEducation\Http\Requests\Concerns\ValidatesCeCourse;

class StoreCeCourseRequest extends FormRequest
{
    use ValidatesCeCourse;

    protected function courseId(): ?int
    {
        return null;
    }
}
