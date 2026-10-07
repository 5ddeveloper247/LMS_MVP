<?php

namespace Modules\MainCommunity\Entities;

use Illuminate\Database\Eloquent\Model;

class CommunityForumCategories extends Model
{
    protected $table = 'forum_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'accent_color',
        'sort_order',
        'is_active',
        'topics_count',
        'replies_count',
    ];

    protected $casts = [
        'is_active'     => 'boolean',
        'sort_order'    => 'integer',
        'topics_count'  => 'integer',
        'replies_count' => 'integer',
    ];

    /* ---------- Scopes ---------- */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /* ---------- Accessors ---------- */

    // 1800 => "1.8K", 342 => "342"
    public function getRepliesCountShortAttribute()
    {
        return self::shortNumber($this->replies_count);
    }

    public function getTopicsCountShortAttribute()
    {
        return self::shortNumber($this->topics_count);
    }

    protected static function shortNumber($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        }
        if ($number >= 1000) {
            return rtrim(rtrim(number_format($number / 1000, 1), '0'), '.') . 'K';
        }
        return (string) $number;
    }

    /* ---------- Relations ---------- */

    // Topics wala model jab banega tab ye kaam karega
    public function topics()
    {
        return $this->hasMany(CommunityForumTopics::class, 'category_id');
    }

    /* ---------- Routing ---------- */

    // /community/nclex-prep jaisi URLs ke liye (route model binding by slug)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}