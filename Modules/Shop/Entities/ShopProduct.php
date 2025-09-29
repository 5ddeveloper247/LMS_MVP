<?php
namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopProduct extends Model
{
    use SoftDeletes;

    // Accessor for type (human readable)
    public function getTypeLabelAttribute()
    {
        return $this->type == 1 ? 'Product' : 'Book';
    }

    public function files()
    {
        return $this->hasMany(ShopProductFile::class, 'product_id')->orderBy('created_at', 'desc');
    }
}