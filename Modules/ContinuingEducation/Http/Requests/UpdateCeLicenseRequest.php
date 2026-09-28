<?php

namespace Modules\ContinuingEducation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\ContinuingEducation\Http\Requests\Concerns\ValidatesCeLicense;

class UpdateCeLicenseRequest extends FormRequest
{
    use ValidatesCeLicense;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return $this->ceLicenseRules();
    }

    public function toPayload(): array
    {
        return $this->ceLicensePayload();
    }
}
