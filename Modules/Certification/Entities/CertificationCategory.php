<?php

namespace Modules\Certification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificationCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'integer',
        'sort_order' => 'integer',
    ];

    public function offerings(): HasMany
    {
        return $this->hasMany(CertificationOffering::class, 'certification_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
