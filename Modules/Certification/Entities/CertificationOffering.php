<?php

namespace Modules\Certification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationOffering extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'certification_group_id',
        'certification_category_id',
        'short_description',
        'outcomes',
        'requirements',
        'format_label',
        'ce_hours',
        'ce_note',
        'content',
        'delivery_mode',
        'duration_summary',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'integer',
        'sort_order' => 'integer',
        'ce_hours' => 'decimal:2',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(CertificationGroup::class, 'certification_group_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CertificationCategory::class, 'certification_category_id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(CertificationOfferingOption::class, 'certification_offering_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function deliveryParts(): HasMany
    {
        return $this->hasMany(CertificationOfferingDeliveryPart::class, 'certification_offering_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(CertificationOfferingSession::class, 'certification_offering_id')
            ->orderBy('starts_at')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function onlinePart()
    {
        return $this->deliveryParts()->where('part_type', 'online')->first();
    }

    public function inPersonPart()
    {
        return $this->deliveryParts()->where('part_type', 'in_person')->first();
    }

    public function getDeliveryModeLabelAttribute(): string
    {
        $labels = [
            'in_person' => 'In person',
            'online' => 'Online',
            'hybrid' => 'Hybrid',
        ];

        return $labels[$this->delivery_mode] ?? (string) $this->delivery_mode;
    }

    public function deliveryPartsSummary(): string
    {
        return $this->deliveryParts
            ->map(function ($part) {
                $type = $part->part_type === 'online' ? 'Online' : 'In person';
                $line = $type . ': ' . $part->duration;
                if (! empty($part->session_label)) {
                    $line .= ' — ' . $part->session_label;
                }

                return $line;
            })
            ->implode(' | ');
    }

    public function minOptionPrice(): ?string
    {
        if ($this->relationLoaded('options')) {
            $min = $this->options->min('price');
        } else {
            $min = $this->options()->min('price');
        }

        return $min !== null ? number_format((float) $min, 2, '.', '') : null;
    }

    public function optionsPriceSummary(): string
    {
        $options = $this->relationLoaded('options')
            ? $this->options
            : $this->options()->get();

        if ($options->isEmpty()) {
            return '—';
        }

        return $options
            ->map(function ($option) {
                return $option->title . ': $' . number_format((float) $option->price, 2);
            })
            ->implode(' · ');
    }
}
