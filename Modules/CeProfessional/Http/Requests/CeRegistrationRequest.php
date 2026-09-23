<?php

namespace Modules\CeProfessional\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CeRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->filled('first_name') || $this->filled('last_name')) {
            $this->merge([
                'name' => trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? '')),
            ]);
        }
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'fl_license_number' => 'required|regex:/^[0-9]+$/|max:20',
            'license_type' => 'required|in:rn,lpn,aprn',
            'consent_license_accurate' => 'required|accepted',
            'consent_ce_broker_reporting' => 'required|accepted',
            'consent_marketing_email' => 'nullable|boolean',
        ];

        if ($this->input('license_type') === 'aprn') {
            $rules['aprn_nationally_certified'] = 'required|in:yes,no';
            $rules['aprn_autonomous'] = 'required|in:yes,no';
        }

        $captchaKey = saasEnv('NOCAPTCHA_SITEKEY') ?: env('NOCAPTCHA_SITEKEY');
        if (! empty($captchaKey)) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'fl_license_number.regex' => 'Florida license number must contain numbers only.',
            'consent_license_accurate.accepted' => 'You must certify that your license information is accurate.',
            'consent_ce_broker_reporting.accepted' => 'You must authorize CE Broker reporting.',
        ];
    }
}
