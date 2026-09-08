<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopBundle extends Model
{
    use SoftDeletes;

    protected $table = 'shop_bundles';

    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'decimal:2',
        'tax_percent' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'total_tax' => 'decimal:2',
        'total_discount' => 'decimal:2',
        'status' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Selected shop products (Books, Study Guides, Study Tools, Merchandise).
     */
    public function products()
    {
        return $this->belongsToMany(
            ShopProduct::class,
            'shop_bundle_products',
            'bundle_id',
            'product_id'
        )->withTimestamps();
    }

    /**
     * Gallery images (excludes video extensions).
     */
    public function files()
    {
        return $this->hasMany(ShopBundleFile::class, 'bundle_id')
            ->whereNotIn('file_type', ['mp4', 'avi', 'mov', 'webm', 'mkv', 'flv', 'wmv', 'm4v'])
            ->orderBy('created_at', 'desc');
    }

    /**
     * Video files only.
     */
    public function videos()
    {
        return $this->hasMany(ShopBundleFile::class, 'bundle_id')
            ->whereIn('file_type', ['mp4', 'avi', 'mov', 'webm', 'mkv', 'flv', 'wmv', 'm4v'])
            ->orderBy('created_at', 'desc');
    }

    /**
     * Frontend: only active bundles, newest first.
     */
    public function scopeForShopListing($query)
    {
        return $query->where('status', 1)->latest();
    }
}
