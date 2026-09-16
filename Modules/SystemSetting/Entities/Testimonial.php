<?php

namespace Modules\SystemSetting\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use Tenantable;

    protected $fillable = [
        'email',
        'passing_year',
        'program_type',
        'source',
        'featured',
        'star',
        'status',
        'image',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'star' => 'integer',
        'status' => 'integer',
    ];

    use HasTranslations;

    public $translatable = ['body', 'author', 'profession'];

    public const SOURCE_ADMIN = 'admin';
    public const SOURCE_OUTSIDE = 'outside';

    public const PROGRAM_TYPES = [
        'fl_bon' => 'FL BON Remediation',
        'nclex' => 'NCLEX Coaching',
        'nursing_school' => 'Nursing School',
        'tutoring' => 'Tutoring',
    ];

    /**
     * Only one testimonial may be featured at a time.
     */
    public static function anotherFeaturedExists(?int $excludeId = null): bool
    {
        $query = static::where('featured', true);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    public function isOutside(): bool
    {
        return $this->source === self::SOURCE_OUTSIDE;
    }

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('TestimonialList_');
                clearAllLangCache('SuccessStoriesList_');
            }
        });
        self::updated(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('TestimonialList_');
                clearAllLangCache('SuccessStoriesList_');
            }
        });
        self::deleted(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('TestimonialList_');
                clearAllLangCache('SuccessStoriesList_');
            }
        });
    }

}
