<?php

namespace Modules\CeProfessional\Entities;

use Illuminate\Database\Eloquent\Model;

class CeProfessional extends Model
{
    protected $table = 'ce_professionals';

    protected $fillable = [
        'user_id',
        'fl_license_number',
        'license_type',
        'aprn_nationally_certified',
        'aprn_autonomous',
        'consent_license_accurate',
        'consent_ce_broker_reporting',
        'consent_marketing_email',
        'renewal_date',
        'ce_broker_last_synced_at',
    ];

    protected $casts = [
        'aprn_nationally_certified' => 'boolean',
        'aprn_autonomous' => 'boolean',
        'consent_license_accurate' => 'boolean',
        'consent_ce_broker_reporting' => 'boolean',
        'consent_marketing_email' => 'boolean',
        'renewal_date' => 'date',
        'ce_broker_last_synced_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
