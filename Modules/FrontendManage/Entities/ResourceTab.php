<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResourceTab extends Model
{
    use Tenantable;

    public const CATEGORY_STUDENT = 'student';
    public const CATEGORY_CE = 'ce_professional';

    protected $table = 'resource_tabs';

    protected $fillable = [
        'name',
        'short_description',
        'category',
        'file_path',
        'is_featured',
        'content',
        'slug',
        'pos',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = $post->createSlug($post->name);
            }
        });
    }

    public static function categories(): array
    {
        return [
            self::CATEGORY_STUDENT => 'Student Resources',
            self::CATEGORY_CE => 'CE Professional Resources',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? ucfirst(str_replace('_', ' ', (string) $this->category));
    }

    private function createSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "$slug%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeForCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
