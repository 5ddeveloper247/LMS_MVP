<?php

namespace Modules\CourseSetting\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Modules\StudentSetting\Entities\Program;

class CourseComparison extends Model
{
    use Tenantable;
    
    protected $fillable = ['course_id', 'program_id'];
    protected $table = 'course_comparisons';

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}

