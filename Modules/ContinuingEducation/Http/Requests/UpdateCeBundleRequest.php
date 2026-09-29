<?php

namespace Modules\ContinuingEducation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\ContinuingEducation\Http\Requests\Concerns\ValidatesCeBundle;

class UpdateCeBundleRequest extends FormRequest
{
    use ValidatesCeBundle;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->ceBundleRules();
    }

    public function toPayload(): array
    {
        return $this->ceBundlePayload();
    }
}
