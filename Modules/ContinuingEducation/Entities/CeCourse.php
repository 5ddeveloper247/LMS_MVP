<?php

namespace Modules\ContinuingEducation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Category;
use Modules\CourseSetting\Entities\Course;
use Modules\Shop\Entities\ShopProduct;

class CeCourse extends Model
{
    protected $table = 'ce_courses';

    protected $fillable = [
        'title',
        'slug',
        'about',
        'outcomes',
        'requirements',
        'course_code',
        'user_id',
        'assistant_instructors',
        'category_id',
        'lang_id',
        'image',
        'thumbnail',
        'trailer_link',
        'duration',
        'price',
        'discount_price',
        'tax',
        'tax_percent',
        'discount_type',
        'discount',
        'total_amount',
        'total_tax',
        'total_discount',
        'what_learn1',
        'what_learn2',
        'level',
        'meta_keywords',
        'meta_description',
        'total_enrolled',
        'review_avg',
        'view_count',
        'status',
        'publish',
        'is_featured',
        'seq_no',
        'contact_hours',
        'course_type',
        'audience',
        'compliance_topic',
        'ce_broker_course_id',
        'course_id',
        'lms_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'audience' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'tax' => 'decimal:2',
        'tax_percent' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'total_tax' => 'decimal:2',
        'total_discount' => 'decimal:2',
        'review_avg' => 'decimal:2',
        'contact_hours' => 'decimal:1',
        'status' => 'boolean',
        'publish' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function linkedCourse()
    {
        return $this->belongsTo(Course::class, 'course_id')->withDefault();
    }

    public function reviews()
    {
        return $this->hasMany(CeCourseReview::class, 'ce_course_id');
    }

    public function activeReviews()
    {
        return $this->reviews()->where('status', 1);
    }

    public function enrollments()
    {
        return $this->hasMany(CeCourseEnrollment::class, 'ce_course_id');
    }

    public function scopePublished($query)
    {
        return $query->where('publish', 1)->where('status', 1);
    }

    public function scopeForLms($query, ?int $lmsId = null)
    {
        $lmsId = $lmsId ?? (isModuleActive('LmsSaas') ? (int) app('institute')->id : 1);

        return $query->where('lms_id', $lmsId);
    }

    public function getAudienceLabelsAttribute(): array
    {
        $keys = $this->audience ?? [];
        $labels = [];

        if (in_array('rn', $keys, true)) {
            $labels[] = 'RN';
        }

        if (in_array('lpn', $keys, true) || in_array('aprn', $keys, true)) {
            $labels[] = 'LPN/APRN';
        }

        return $labels;
    }

    public function getAssistantInstructorIdsAttribute(): array
    {
        if (empty($this->assistant_instructors)) {
            return [];
        }

        $decoded = json_decode($this->assistant_instructors, true);

        return is_array($decoded) ? array_map('intval', $decoded) : [];
    }

    public function getCourseTypeLabelAttribute(): string
    {
        return config('continuingeducation.course_types.' . $this->course_type, ucfirst($this->course_type));
    }

    public function matchesLicenseType(string $licenseType): bool
    {
        $audience = $this->audience ?? [];

        if ($licenseType === 'rn_lpn') {
            return in_array('rn', $audience, true) || in_array('lpn', $audience, true);
        }

        return in_array('aprn', $audience, true) || in_array('lpn', $audience, true);
    }

    public function taxPercentValue(): float
    {
        return (float) ($this->tax_percent ?? $this->tax ?? 0);
    }

    public static function computePricingTotals(
        float $price,
        ?string $discountType,
        ?float $discount,
        float $taxPercent
    ): array {
        return ShopProduct::calculatePricing($price, $discountType, $discount, $taxPercent);
    }

    public function pricingTotals(): array
    {
        return self::computePricingTotals(
            (float) ($this->price ?? 0),
            $this->discount_type,
            (float) ($this->discount ?? 0),
            $this->taxPercentValue()
        );
    }

    /** Final customer price (after discount + tax on discounted base). */
    public function salePrice(): float
    {
        if ((float) ($this->price ?? 0) <= 0) {
            return 0.0;
        }

        return (float) $this->pricingTotals()['total_amount'];
    }

    /** Original list price with tax (before discount). */
    public function originalPriceWithTax(): float
    {
        if ((float) ($this->price ?? 0) <= 0) {
            return 0.0;
        }

        return (float) $this->pricingTotals()['original_with_tax'];
    }

    public function hasCeDiscount(): bool
    {
        return $this->salePrice() + 0.001 < $this->originalPriceWithTax();
    }

    public function applyPricingTotals(): void
    {
        $price = (float) ($this->price ?? 0);
        $taxPercent = $this->taxPercentValue();

        if ($price <= 0) {
            $this->tax_percent = $taxPercent;
            $this->tax = $taxPercent;
            $this->total_amount = 0;
            $this->total_tax = 0;
            $this->total_discount = 0;
            $this->discount_price = null;

            return;
        }

        $discountType = $this->discount_type ?: null;
        $discountInput = (float) ($this->discount ?? 0);

        if ($discountType === null || $discountInput <= 0) {
            $discountType = null;
            $discountInput = 0;
        }

        $totals = self::computePricingTotals($price, $discountType, $discountInput, $taxPercent);

        $this->tax_percent = $taxPercent;
        $this->tax = $taxPercent;
        $this->discount_type = $discountType;
        $this->discount = $discountInput;
        $this->total_amount = $totals['total_amount'];
        $this->total_tax = $totals['total_tax'];
        $this->total_discount = $totals['total_discount'];
        $this->discount_price = $totals['total_discount'] > 0.001
            ? max($price - $totals['total_discount'], 0)
            : null;
    }
}
