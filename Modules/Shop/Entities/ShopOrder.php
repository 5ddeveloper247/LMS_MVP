<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    protected $fillable = [];

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id');
    }
}
