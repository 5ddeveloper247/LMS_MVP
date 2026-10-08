<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use Tenantable;

    protected $fillable = [
        'name',
        'slug',
        'eyebrow',
        'section_title',
        'status',
        'order',
    ];

    public function faqs()
    {
        return $this->hasMany(HomePageFaq::class, 'faq_category_id');
    }
}
