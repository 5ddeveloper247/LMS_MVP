<?php

namespace Modules\ContinuingEducation\Entities;

use Illuminate\Database\Eloquent\Model;

class CeBundleCourse extends Model
{
    protected $table = 'ce_bundle_courses';

    protected $fillable = [
        'ce_bundle_id',
        'ce_course_id',
        'course_role',
        'sort_order',
    ];

    public function bundle()
    {
        return $this->belongsTo(CeBundle::class, 'ce_bundle_id');
    }

    public function course()
    {
        return $this->belongsTo(CeCourse::class, 'ce_course_id');
    }
}
