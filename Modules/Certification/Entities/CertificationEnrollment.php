<?php

namespace Modules\Certification\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificationEnrollment extends Model
{
    protected $fillable = [
        'tracking',
        'checkout_id',
        'user_id',
        'certification_offering_id',
        'certification_offering_option_id',
        'option_title',
        'unit_price',
        'discount_amount',
        'total_paid',
        'payment_status',
        'payment_method',
        'gateway_transaction_id',
        'enrollment_data',
        'status',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_paid' => 'decimal:2',
        'enrollment_data' => 'array',
        'status' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function offering(): BelongsTo
    {
        return $this->belongsTo(CertificationOffering::class, 'certification_offering_id');
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(CertificationOfferingOption::class, 'certification_offering_option_id');
    }
}
