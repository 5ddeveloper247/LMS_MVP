<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LoginPage extends Model
{
    use Tenantable;
    use HasTranslations;

    public $translatable = ['title', 'slogans1', 'slogans2', 'slogans3','slogans4','slogans5', 'reg_title', 'reg_slogans1', 'reg_slogans2', 'reg_slogans3','reg_slogans4','reg_slogans5', 'forget_title', 'forget_slogans1', 'forget_slogans2', 'forget_slogans3','forget_slogans4','forget_slogans5'];
    protected $fillable = [];

    public static function boot()
    {

        parent::boot();

        self::created(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('login_page_');
            }
        });
        self::updated(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('login_page_');
            }
        });
        self::deleted(function ($model) {
            if (function_exists('clearAllLangCache')) {
                clearAllLangCache('login_page_');
            }
        });

    }

    // public static function getData()
    // {
    //     return Cache::rememberForever('login_pages_' . app()->getLocale() . SaasDomain(), function () {
    //         return LoginPage::firstOrCreate();
    //     });
    // }

    public static function getData()
    {
        return LoginPage::firstOrCreate();
    }
}
