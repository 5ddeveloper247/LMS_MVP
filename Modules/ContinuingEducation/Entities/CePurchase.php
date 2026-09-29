<?php

namespace Modules\ContinuingEducation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CePurchase extends Model
{
    protected $table = 'ce_purchases';

    protected $fillable = [
        'tracking',
        'checkout_id',
        'user_id',
        'item_type',
        'ce_course_id',
        'ce_bundle_id',
        'item_name',
        'license_type',
        'contact_hours',
        'total_hours',
        'elective_hours_allowed',
        'unit_price',
        'discount_amount',
        'total_paid',
        'coupon_code',
        'payment_status',
        'payment_method',
        'gateway_transaction_id',
        'lms_id',
        'purchased_at',
    ];

    protected $casts = [
        'contact_hours' => 'decimal:1',
        'total_hours' => 'decimal:1',
        'elective_hours_allowed' => 'decimal:1',
        'unit_price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_paid' => 'decimal:2',
        'purchased_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function ceCourse()
    {
        return $this->belongsTo(CeCourse::class, 'ce_course_id');
    }

    public function ceBundle()
    {
        return $this->belongsTo(CeBundle::class, 'ce_bundle_id');
    }

    public function items()
    {
        return $this->hasMany(CePurchaseItem::class, 'ce_purchase_id')->orderBy('sort_order');
    }

    public function enrollments()
    {
        return $this->hasMany(CeCourseEnrollment::class, 'ce_purchase_id');
    }

    public function scopeForLms($query, ?int $lmsId = null)
    {
        $lmsId = $lmsId ?? (isModuleActive('LmsSaas') ? (int) app('institute')->id : 1);

        return $query->where('lms_id', $lmsId);
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function isBundlePurchase(): bool
    {
        return $this->item_type === 'bundle';
    }

    public function isCoursePurchase(): bool
    {
        return $this->item_type === 'course';
    }
}
