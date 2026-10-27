<?php

namespace Modules\Certification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificationOfferingSession extends Model
{
    protected $fillable = [
        'certification_offering_id',
        'certification_offering_option_id',
        'starts_at',
        'ends_at',
        'title',
        'subtitle',
        'location',
        'capacity',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'status' => 'integer',
        'sort_order' => 'integer',
        'capacity' => 'integer',
    ];

    public function offering(): BelongsTo
    {
        return $this->belongsTo(CertificationOffering::class, 'certification_offering_id');
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(CertificationOfferingOption::class, 'certification_offering_option_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeBookable($query)
    {
        return $query->active()
            ->where('starts_at', '>=', now()->startOfDay())
            ->orderBy('starts_at')
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
