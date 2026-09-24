<?php

namespace Modules\CeProfessional\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CePasswordUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required_with:new_password|same:new_password|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'current password',
            'new_password' => 'new password',
            'confirm_password' => 'password confirmation',
        ];
    }

    public function messages()
    {
        $messages = validationMessage($this->rules());

        return array_merge($messages, [
            'old_password.required' => 'Please enter your current password.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'New password must be at least 8 characters.',
            'confirm_password.required_with' => 'Please confirm your new password.',
            'confirm_password.same' => 'Password confirmation does not match the new password.',
            'confirm_password.min' => 'Password confirmation must be at least 8 characters.',
        ]);
    }
}
