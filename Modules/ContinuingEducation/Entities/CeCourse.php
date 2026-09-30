<?php

namespace Modules\ContinuingEducation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Category;
use Modules\CourseSetting\Entities\Course;

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
}
