<?php

namespace Modules\CourseSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\CourseSetting\Entities\Course;


class CoursePlan extends Model
{
    protected $table = 'payment_plans';
    protected $guarded = [];
    protected $dates = ['sdate', 'edate', 'cdate'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'parent_id', 'id');
    }
    public function enrolls(): HasMany
    {
        return $this->hasMany(CourseEnrolled::class, 'plan_id', 'id');
    }
}
