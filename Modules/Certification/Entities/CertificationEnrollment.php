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

    public function registrantName(): string
    {
        $data = is_array($this->enrollment_data) ? $this->enrollment_data : [];
        $first = trim((string) ($data['first_name'] ?? ''));
        $last = trim((string) ($data['last_name'] ?? ''));

        if ($first !== '' || $last !== '') {
            return trim($first.' '.$last);
        }

        return (string) ($this->user->name ?? '');
    }

    public function registrantEmail(): string
    {
        $data = is_array($this->enrollment_data) ? $this->enrollment_data : [];

        return (string) ($data['email'] ?? $this->user->email ?? '');
    }

    public function classDateLabel(): string
    {
        $data = is_array($this->enrollment_data) ? $this->enrollment_data : [];
        $label = trim((string) ($data['session_label'] ?? ''));
        $sub = trim((string) ($data['session_sub'] ?? ''));

        if ($label === 'Contact me with more dates') {
            return $label;
        }
        if ($label !== '' && $sub !== '') {
            return $label.' · '.$sub;
        }

        return $label !== '' ? $label : '—';
    }
}
