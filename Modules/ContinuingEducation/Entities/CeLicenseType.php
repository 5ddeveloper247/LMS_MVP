<?php

namespace Modules\ContinuingEducation\Entities;

use Illuminate\Database\Eloquent\Model;

class CeLicenseType extends Model
{
    protected $table = 'ce_license_types';

    protected $fillable = [
        'name',
        'subtitle',
        'description',
        'component_1',
        'component_2',
        'component_3',
        'card_style',
        'button_label',
        'button_url',
        'anchor_id',
        'seq_no',
        'status',
        'publish',
        'featured',
        'lms_id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'publish' => 'boolean',
        'featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('publish', 1)->where('status', 1);
    }

    public function scopeForLms($query, ?int $lmsId = null)
    {
        $lmsId = $lmsId ?? (isModuleActive('LmsSaas') ? (int) app('institute')->id : 1);

        return $query->where('lms_id', $lmsId);
    }

    public function getCardClassAttribute(): string
    {
        if ($this->card_style === 'terra') {
            return 'aprn';
        }

        if ($this->card_style === 'cna') {
            return 'cna';
        }

        return 'rn-lpn';
    }

    public function getButtonClassAttribute(): string
    {
        if ($this->card_style === 'terra') {
            return 'terra';
        }

        if ($this->card_style === 'cna') {
            return 'cna';
        }

        return 'teal';
    }

    public function getResolvedButtonUrlAttribute(): string
    {
        $routeName = config(
            'continuingeducation.license_detail_routes.' . $this->card_style,
            'continuingEducationRnLpn'
        );

        return route($routeName);
    }

    public function getResolvedAnchorIdAttribute(): string
    {
        return config(
            'continuingeducation.license_anchor_ids.' . $this->card_style,
            'rn-lpn-packages'
        );
    }
}
