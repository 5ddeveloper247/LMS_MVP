<?php

namespace Modules\MainCommunity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumReplyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:5000'],
            'parent_id' => ['nullable', 'integer', 'exists:forum_replies,id'],
        ];
    }
}
