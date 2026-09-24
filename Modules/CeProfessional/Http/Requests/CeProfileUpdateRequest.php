<?php

namespace Modules\CeProfessional\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CeProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:14',
            'consent_marketing_email' => 'nullable|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'full name',
            'phone' => 'phone number',
        ];
    }

    public function messages()
    {
        $messages = validationMessage($this->rules());

        return array_merge($messages, [
            'name.required' => 'Please enter your full name.',
            'name.max' => 'Full name cannot be longer than 255 characters.',
            'phone.regex' => 'Please enter a valid phone number (digits, spaces, dashes, or parentheses only).',
            'phone.min' => 'Phone number must be at least 10 characters.',
            'phone.max' => 'Phone number cannot be longer than 14 characters.',
        ]);
    }
}
