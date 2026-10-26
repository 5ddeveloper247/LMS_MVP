<?php

namespace Modules\Certification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificationOfferingOption extends Model
{
    protected $fillable = [
        'certification_offering_id',
        'title',
        'subtitle',
        'price',
        'product_code',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sort_order' => 'integer',
    ];

    public function offering(): BelongsTo
    {
        return $this->belongsTo(CertificationOffering::class, 'certification_offering_id');
    }
}
