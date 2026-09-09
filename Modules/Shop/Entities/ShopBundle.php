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
     * Tax included in bundle total_amount (bundle-level tax, not sum of product taxes).
     */
    public function taxAmount(): float
    {
        $price = (float) $this->price;
        $discountInput = (float) ($this->discount ?? 0);
        $taxPercent = (float) ($this->tax_percent ?? 0);
        $discountAmount = 0.0;

        if ($this->discount_type === 'fixed') {
            $discountAmount = min($discountInput, $price);
        } elseif ($this->discount_type === 'percent') {
            $discountAmount = ($price * $discountInput) / 100;
        }

        $taxable = max($price - $discountAmount, 0);

        return round(($taxable * $taxPercent) / 100, 2);
    }

    /** Catalog discount amount (before tax). */
    public function discountAmount(): float
    {
        $price = (float) $this->price;
        $discountInput = (float) ($this->discount ?? 0);
        $discountAmount = 0.0;

        if ($this->discount_type === 'fixed') {
            $discountAmount = min($discountInput, $price);
        } elseif ($this->discount_type === 'percent') {
            $discountAmount = ($price * $discountInput) / 100;
        }

        return round($discountAmount, 2);
    }

    /** Original bundle price with tax (before discount). */
    public function originalPriceWithTax(): float
    {
        $price = (float) $this->price;
        $taxPercent = (float) ($this->tax_percent ?? 0);

        return round($price + (($price * $taxPercent) / 100), 2);
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
