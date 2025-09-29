<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopProductFile extends Model
{
    protected $fillable = [
        'product_id',
        'file_name',
        'file_path',
        'file_type',
        'is_primary',
    ];

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id');
    }
}
