<?php

namespace SpondonIt\LmsService;

use Illuminate\Support\ServiceProvider;

class SpondonItLmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Skip the commercial installer/license gate on localhost.
        $installed = storage_path('app/installed');
        if (!file_exists($installed)) {
            @file_put_contents($installed, now()->toDateTimeString());
        }
    }
}
