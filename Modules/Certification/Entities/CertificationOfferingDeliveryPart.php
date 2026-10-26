<?php

namespace Modules\Certification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificationOfferingDeliveryPart extends Model
{
    protected $fillable = [
        'certification_offering_id',
        'part_type',
        'duration',
        'session_label',
        'notes',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function offering(): BelongsTo
    {
        return $this->belongsTo(CertificationOffering::class, 'certification_offering_id');
    }
}
