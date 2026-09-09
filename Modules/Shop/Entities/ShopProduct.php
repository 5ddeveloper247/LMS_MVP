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

    protected $casts = [
        'is_flagship' => 'boolean',
        'price' => 'float',
        'discount' => 'float',
        'tax_percent' => 'float',
        'total_amount' => 'float',
        'total_tax' => 'float',
        'total_discount' => 'float',
    ];

    /**
     * Canonical shop pricing (create + update + display + cart).
     *
     * - sale (total_amount) = (price - discount) + tax on discounted amount
     * - original_with_tax   = price + tax on full price
     */
    public static function calculatePricing($price, $discountType, $discount, $taxPercent): array
    {
        $price = (float) $price;
        $discountInput = (float) ($discount ?? 0);
        $taxPercent = (float) ($taxPercent ?? 0);

        $discountAmount = 0.0;
        if ($discountType === 'fixed') {
            $discountAmount = min($discountInput, $price);
        } elseif ($discountType === 'percent') {
            $discountAmount = ($price * $discountInput) / 100;
        }

        $taxable = max($price - $discountAmount, 0);
        $totalTax = ($taxable * $taxPercent) / 100;
        $saleAmount = $taxable + $totalTax;
        $originalWithTax = $price + (($price * $taxPercent) / 100);

        return [
            'total_discount' => round($discountAmount, 2),
            'total_tax' => round($totalTax, 2),
            'total_amount' => round($saleAmount, 2),
            'original_with_tax' => round($originalWithTax, 2),
        ];
    }

    /** Live sale price (after discount + tax on discounted base). */
    public function salePrice(): float
    {
        return (float) self::calculatePricing(
            $this->price,
            $this->discount_type,
            $this->discount,
            $this->tax_percent
        )['total_amount'];
    }

    /** Original price with tax (before discount). */
    public function originalPriceWithTax(): float
    {
        return (float) self::calculatePricing(
            $this->price,
            $this->discount_type,
            $this->discount,
            $this->tax_percent
        )['original_with_tax'];
    }

    public function hasShopDiscount(): bool
    {
        return $this->salePrice() + 0.001 < $this->originalPriceWithTax();
    }

    /** Tax amount included in the sale price (on discounted base). */
    public function taxAmount(): float
    {
        return (float) self::calculatePricing(
            $this->price,
            $this->discount_type,
            $this->discount,
            $this->tax_percent
        )['total_tax'];
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
