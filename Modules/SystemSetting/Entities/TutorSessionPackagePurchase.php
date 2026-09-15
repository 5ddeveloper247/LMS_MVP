<?php

namespace Modules\SystemSetting\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TutorSessionPackagePurchase extends Model
{
    protected $table = 'tutor_session_package_purchases';

    protected $guarded = [];

    protected $casts = [
        'price' => 'float',
        'sessions_allowed' => 'integer',
        'sessions_used' => 'integer',
        'status' => 'boolean',
        'selected_sessions' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(TutorSessionPackage::class, 'package_id');
    }

    public function remainingSessions(): int
    {
        return max(0, (int) $this->sessions_allowed - (int) $this->sessions_used);
    }

    public function hirings()
    {
        return $this->hasMany(TutorHiring::class, 'package_purchase_id');
    }
}
