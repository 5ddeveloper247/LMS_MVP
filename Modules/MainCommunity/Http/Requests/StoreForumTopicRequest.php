<?php

namespace Modules\MainCommunity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreForumTopicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'category' => [
                'required',
                'string',
                'max:120',
                Rule::exists('forum_categories', 'slug')->where(fn ($q) => $q->where('is_active', true)),
            ],
            'title' => ['required', 'string', 'max:150'],
            'body' => ['required', 'string', 'max:5000'],
        ];
    }
}
