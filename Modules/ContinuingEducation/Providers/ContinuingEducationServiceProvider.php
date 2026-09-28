<?php

namespace Modules\ContinuingEducation\Providers;

use Illuminate\Support\ServiceProvider;

class ContinuingEducationServiceProvider extends ServiceProvider
{
    protected $moduleName = 'ContinuingEducation';

    protected $moduleNameLower = 'continuingeducation';

    public function boot()
    {
        $this->registerConfig();
        $this->registerViews();
        $this->loadHelpers();

        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    protected function loadHelpers()
    {
        $helperPath = module_path($this->moduleName, 'helpers/helper.php');
        if (is_file($helperPath)) {
            require_once $helperPath;
        }
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(\Modules\ContinuingEducation\Services\CeCourseService::class);
        $this->app->singleton(\Modules\ContinuingEducation\Services\CeCourseFormDataService::class);
        $this->app->singleton(\Modules\ContinuingEducation\Services\CeCatalogService::class);
    }

    protected function registerConfig()
    {
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
