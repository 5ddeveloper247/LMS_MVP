<?php

namespace Modules\CourseSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\LessonComplete;
use Modules\CourseSetting\Entities\Lesson;
use Modules\CourseSetting\Entities\Chapter;
use Modules\CourseSetting\Entities\Course;

class CourseSale extends Model
{

    use HasFactory;

    protected $table = 'course_checks';

    public function chapter()
    {

        return $this->belongsTo(Chapter::class,'content_id');
    }

    public function lesson()
    {

        return $this->belongsTo(Lesson::class, 'content_id');
    }
    public function course()
    {

        return $this->belongsTo(Course::class, 'course_id');
    }
}
