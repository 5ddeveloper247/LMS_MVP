<?php

namespace Modules\ContinuingEducation\Entities;

use Illuminate\Database\Eloquent\Model;

class CeBundle extends Model
{
    protected $table = 'ce_bundles';

    protected $fillable = [
        'name',
        'subtitle',
        'slug',
        'component_1',
        'component_2',
        'component_3',
        'component_4',
        'component_5',
        'component_6',
        'total_hours',
        'elective_hours_allowed',
        'price',
        'compare_at_price',
        'license_type',
        'card_style',
        'is_best_seller',
        'seq_no',
        'status',
        'publish',
        'featured',
        'lms_id',
    ];

    protected $casts = [
        'total_hours' => 'decimal:1',
        'elective_hours_allowed' => 'decimal:1',
        'price' => 'decimal:2',
        'compare_at_price' => 'decimal:2',
        'is_best_seller' => 'boolean',
        'status' => 'boolean',
        'publish' => 'boolean',
        'featured' => 'boolean',
    ];

    public function courses()
    {
        return $this->belongsToMany(CeCourse::class, 'ce_bundle_courses', 'ce_bundle_id', 'ce_course_id')
            ->withPivot('course_role', 'sort_order')
            ->withTimestamps()
            ->orderBy('ce_bundle_courses.sort_order');
    }

    public function mandatoryCourses()
    {
        return $this->courses()->wherePivot('course_role', 'mandatory');
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

    public function getLicenseTypeLabelAttribute(): string
    {
        return config('continuingeducation.bundle_license_types.' . $this->license_type, $this->license_type);
    }

    public function getCardStyleLabelAttribute(): string
    {
        return config('continuingeducation.bundle_card_styles.' . $this->card_style, $this->card_style);
    }

    public function getComponentsAttribute(): array
    {
        return array_values(array_filter([
            $this->component_1,
            $this->component_2,
            $this->component_3,
            $this->component_4,
            $this->component_5,
            $this->component_6,
        ]));
    }

    public function getCardCssClassAttribute(): string
    {
        return $this->card_style === 'primary' ? 'primary' : 'secondary';
    }

    public function getButtonCssClassAttribute(): string
    {
        return $this->card_style === 'primary' ? 'white' : 'terra';
    }

    public function getPathFeaturedClassAttribute(): string
    {
        return ($this->is_best_seller || $this->card_style === 'primary') ? 'featured' : '';
    }

    public function getFormattedPriceAttribute(): string
    {
        if ((float) $this->price <= 0) {
            return 'Contact Us';
        }

        return '$' . number_format((float) $this->price, 2);
    }

    public function getLicensePreviewDetailAttribute(): string
    {
        if ($this->subtitle) {
            return $this->subtitle;
        }

        if ((float) $this->elective_hours_allowed > 0) {
            return 'All mandatory + electives';
        }

        $hours = rtrim(rtrim(number_format((float) $this->total_hours, 1, '.', ''), '0'), '.');
        $count = (int) ($this->mandatory_courses_count ?? $this->mandatoryCourses()->count());

        if ($count > 0) {
            return $count . ' courses · ' . $hours . ' hours';
        }

        return $hours . ' contact hours';
    }

    public function getFormattedComparePriceAttribute(): ?string
    {
        if (! $this->compare_at_price || (float) $this->compare_at_price <= (float) $this->price) {
            return null;
        }

        return '$' . number_format((float) $this->compare_at_price, 0) . '+';
    }

    public function getPriceNoteAttribute(): string
    {
        $hours = rtrim(rtrim(number_format((float) $this->total_hours, 1, '.', ''), '0'), '.');

        if ((float) $this->elective_hours_allowed > 0) {
            return 'All mandatory + electives &middot; ' . $hours . ' contact hours';
        }

        $count = $this->relationLoaded('mandatoryCourses')
            ? $this->mandatoryCourses->count()
            : $this->mandatoryCourses()->count();

        return $count . ' mandatory courses &middot; ' . $hours . ' contact hours';
    }

    public function getSavingsTextAttribute(): ?string
    {
        if (! $this->compare_at_price || (float) $this->compare_at_price <= (float) $this->price) {
            return null;
        }

        $save = (float) $this->compare_at_price - (float) $this->price;

        return 'Save over $' . number_format($save, 0) . ' vs. buying individually';
    }

    public function getBuyUrlAttribute(): string
    {
        if ((float) $this->price <= 0) {
            return route('contact');
        }

        return route('ce.cart.buyNowBundle', ['id' => $this->id]);
    }

    public function getBuyButtonLabelAttribute(): string
    {
        if ((float) $this->price <= 0) {
            return 'Schedule a Consult &rarr;';
        }

        return 'Buy ' . $this->name . ' &rarr;';
    }

    public function getPathButtonClassAttribute(): string
    {
        return (float) $this->price <= 0 ? 'outline' : 'terra';
    }
}
