<?php

namespace Modules\SystemSetting\Entities;

use Illuminate\Database\Eloquent\Model;

class TutorSessionPackage extends Model
{
    protected $table = 'tutor_session_packages';

    protected $guarded = [];

    protected $casts = [
        'price' => 'float',
        'sessions_count' => 'integer',
        'is_featured' => 'boolean',
        'popular' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function maxFeatured(): int
    {
        return 3;
    }
}
