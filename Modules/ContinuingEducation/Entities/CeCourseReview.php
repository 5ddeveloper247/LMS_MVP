<?php

namespace Modules\ContinuingEducation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CeCourseReview extends Model
{
    protected $table = 'ce_course_reviews';

    protected $fillable = [
        'ce_course_id',
        'user_id',
        'instructor_id',
        'star',
        'comment',
        'status',
    ];

    protected $casts = [
        'star' => 'decimal:1',
        'status' => 'boolean',
    ];

    public function ceCourse()
    {
        return $this->belongsTo(CeCourse::class, 'ce_course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'role_id', 'name', 'image')->withDefault();
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id')->select('id', 'name', 'image')->withDefault();
    }
}
