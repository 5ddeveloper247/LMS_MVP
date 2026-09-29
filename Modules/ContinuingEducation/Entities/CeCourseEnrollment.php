<?php

namespace Modules\ContinuingEducation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CeCourseEnrollment extends Model
{
    protected $table = 'ce_course_enrollments';

    protected $fillable = [
        'user_id',
        'ce_course_id',
        'ce_purchase_id',
        'ce_purchase_item_id',
        'source',
        'progress',
        'status',
        'purchase_price',
        'completed_at',
        'certificate_path',
        'ce_broker_reported_at',
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'completed_at' => 'datetime',
        'ce_broker_reported_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function ceCourse()
    {
        return $this->belongsTo(CeCourse::class, 'ce_course_id');
    }

    public function purchase()
    {
        return $this->belongsTo(CePurchase::class, 'ce_purchase_id');
    }

    public function purchaseItem()
    {
        return $this->belongsTo(CePurchaseItem::class, 'ce_purchase_item_id');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }
}
