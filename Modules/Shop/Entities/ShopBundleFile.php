<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopBundleFile extends Model
{
    protected $table = 'shop_bundle_files';

    protected $fillable = [
        'bundle_id',
        'file_name',
        'file_path',
        'file_type',
        'is_primary',
    ];

    public function bundle()
    {
        return $this->belongsTo(ShopBundle::class, 'bundle_id');
    }
}
