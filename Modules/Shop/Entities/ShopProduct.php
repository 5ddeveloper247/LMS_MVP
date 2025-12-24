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
        return $this->hasMany(ShopProductFile::class, 'product_id')->whereNotIn('file_type', ['mp4','avi','mov','webm','mkv','flv','wmv','m4v'])->orderBy('created_at', 'desc');
    }

    public function videos()
    {
        return $this->hasMany(ShopProductFile::class, 'product_id')->whereIn('file_type', ['mp4','avi','mov','webm','mkv','flv','wmv','m4v'])->orderBy('created_at', 'desc');
    }
}