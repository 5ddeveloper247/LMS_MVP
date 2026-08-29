<?php

namespace SpondonIt\Service;

use Illuminate\Support\ServiceProvider;

class SpondonItServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadViewsFrom(resource_path('views/vendors/service'), 'service');
        $this->loadTranslationsFrom(resource_path('lang'), 'service');
    }
}
