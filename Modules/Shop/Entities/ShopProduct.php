<?php
namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopProduct extends Model
{
    use SoftDeletes;

    // Accessor for type (human readable)
    // 1 = Product, 2 = Book, 3 = Study Guide, 4 = Study Tool
    public function getTypeLabelAttribute()
    {
        $labels = [
            1 => 'Product',
            2 => 'Book',
            3 => 'Study Guide',
            4 => 'Study Tool',
        ];

        return $labels[$this->type] ?? 'Unknown';
    }

    public function files()
    {
        return $this->hasMany(ShopProductFile::class, 'product_id')->whereNotIn('file_type', ['mp4','avi','mov','webm','mkv','flv','wmv','m4v'])->orderBy('created_at', 'desc');
    }

    public function videos()
    {
        return $this->hasMany(ShopProductFile::class, 'product_id')->whereIn('file_type', ['mp4','avi','mov','webm','mkv','flv','wmv','m4v'])->orderBy('created_at', 'desc');
    }

    /**
     * Bundles that include this product.
     */
    public function bundles()
    {
        return $this->belongsToMany(
            ShopBundle::class,
            'shop_bundle_products',
            'product_id',
            'bundle_id'
        )->withTimestamps();
    }
}