<?php

namespace Modules\CeProfessional\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class CeProfessionalServiceProvider extends ServiceProvider
{
    protected $moduleName = 'CeProfessional';

    protected $moduleNameLower = 'ceprofessional';

    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerViewComposers();

        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    protected function registerViewComposers()
    {
        view()->composer('ceprofessional::partials._topbar-user', function ($view) {
            if (! auth()->check()) {
                return;
            }

            if ((int) auth()->user()->role_id !== (int) config('ceprofessional.role_id', 10)) {
                return;
            }

            if ($view->offsetExists('license_short')) {
                return;
            }

            $profile = app(\Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface::class)
                ->findByUserId(auth()->id());

            $view->with('license_short', $profile ? strtoupper($profile->license_type) : null);
        });
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(
            \Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface::class,
            \Modules\CeProfessional\Repositories\CeProfessionalRepository::class
        );
    }

    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }
}
