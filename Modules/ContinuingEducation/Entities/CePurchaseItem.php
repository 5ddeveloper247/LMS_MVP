<?php

namespace Modules\ContinuingEducation\Entities;

use Illuminate\Database\Eloquent\Model;

class CePurchaseItem extends Model
{
    protected $table = 'ce_purchase_items';

    protected $fillable = [
        'ce_purchase_id',
        'ce_course_id',
        'course_title',
        'contact_hours',
        'course_role',
        'sort_order',
        'ce_course_enrollment_id',
    ];

    protected $casts = [
        'contact_hours' => 'decimal:1',
    ];

    public function purchase()
    {
        return $this->belongsTo(CePurchase::class, 'ce_purchase_id');
    }

    public function ceCourse()
    {
        return $this->belongsTo(CeCourse::class, 'ce_course_id');
    }

    public function enrollment()
    {
        return $this->belongsTo(CeCourseEnrollment::class, 'ce_course_enrollment_id');
    }
}
