<?php

namespace Modules\ContinuingEducation\Http\Requests\Concerns;

trait ValidatesCeLicense
{
    protected function ceLicenseRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'component_1' => ['required', 'string', 'max:500'],
            'component_2' => ['required', 'string', 'max:500'],
            'component_3' => ['required', 'string', 'max:500'],
            'card_style' => ['required', 'in:teal,terra,cna'],
            'button_label' => ['nullable', 'string', 'max:255'],
            'seq_no' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'status' => ['nullable', 'boolean'],
            'publish' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
        ];
    }

    protected function ceLicensePayload(): array
    {
        return [
            'name' => $this->input('name'),
            'subtitle' => $this->input('subtitle'),
            'description' => $this->input('description'),
            'component_1' => $this->input('component_1'),
            'component_2' => $this->input('component_2'),
            'component_3' => $this->input('component_3'),
            'card_style' => $this->input('card_style', 'teal'),
            'button_label' => $this->input('button_label'),
            'seq_no' => $this->input('seq_no'),
            'status' => $this->has('status'),
            'publish' => $this->has('publish'),
            'featured' => $this->has('featured'),
        ];
    }
}
