<?php

namespace Modules\MainCommunity\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\MainCommunity\Entities\CommunityForumReplies;
use Modules\MainCommunity\Entities\CommunityForumTopics;
use Modules\MainCommunity\Contracts\ForumCategoryRepositoryInterface;
use Modules\MainCommunity\Contracts\ForumServiceInterface;
use Modules\MainCommunity\Contracts\ForumTopicRepositoryInterface;
use Modules\MainCommunity\Repositories\ForumCategoryRepository;
use Modules\MainCommunity\Repositories\ForumTopicRepository;
use Modules\MainCommunity\Services\ForumService;

class MainCommunityServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'MainCommunity';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'maincommunity';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'forum_topic' => CommunityForumTopics::class,
            'forum_reply' => CommunityForumReplies::class,
        ]);

        $this->loadHelpers();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        $this->normalizeForumReactionMorphTypesOnce();
    }

    /**
     * forum_reactions.likeable_type was too short — full class names were truncated,
     * so lookups missed rows and inserts hit duplicate-key errors.
     */
    protected function normalizeForumReactionMorphTypesOnce(): void
    {
        if (! Schema::hasTable('forum_reactions')) {
            return;
        }

        $cacheKey = 'main_community_forum_reactions_morph_v1';
        if (Cache::get($cacheKey)) {
            return;
        }

        try {
            DB::table('forum_reactions')
                ->where('likeable_type', 'like', '%CommunityForumTopic%')
                ->update(['likeable_type' => 'forum_topic']);

            DB::table('forum_reactions')
                ->where('likeable_type', 'like', '%CommunityForumRepli%')
                ->update(['likeable_type' => 'forum_reply']);

            $duplicateGroups = DB::table('forum_reactions')
                ->select('user_id', 'likeable_type', 'likeable_id', DB::raw('COUNT(*) as aggregate'))
                ->groupBy('user_id', 'likeable_type', 'likeable_id')
                ->having('aggregate', '>', 1)
                ->get();

            foreach ($duplicateGroups as $group) {
                $ids = DB::table('forum_reactions')
                    ->where('user_id', $group->user_id)
                    ->where('likeable_type', $group->likeable_type)
                    ->where('likeable_id', $group->likeable_id)
                    ->orderByDesc('id')
                    ->pluck('id');

                $keepId = $ids->first();
                $deleteIds = $ids->slice(1)->all();
                if ($deleteIds !== []) {
                    DB::table('forum_reactions')->whereIn('id', $deleteIds)->delete();
                }

                if ($keepId) {
                    DB::table('forum_reactions')->where('id', $keepId)->update([
                        'likeable_type' => $group->likeable_type,
                    ]);
                }
            }

            $this->syncForumReactionLikeCounts();

            Cache::forever($cacheKey, true);
        } catch (\Throwable) {
            // Avoid breaking boot if DB is unavailable in CI, etc.
        }
    }

    protected function syncForumReactionLikeCounts(): void
    {
        if (! Schema::hasTable('forum_topics')) {
            return;
        }

        $topicCounts = DB::table('forum_reactions')
            ->select('likeable_id', DB::raw('COUNT(*) as aggregate'))
            ->where('likeable_type', 'forum_topic')
            ->groupBy('likeable_id')
            ->pluck('aggregate', 'likeable_id');

        foreach ($topicCounts as $topicId => $count) {
            DB::table('forum_topics')->where('id', $topicId)->update(['likes_count' => (int) $count]);
        }

        if (! Schema::hasTable('forum_replies')) {
            return;
        }

        $replyCounts = DB::table('forum_reactions')
            ->select('likeable_id', DB::raw('COUNT(*) as aggregate'))
            ->where('likeable_type', 'forum_reply')
            ->groupBy('likeable_id')
            ->pluck('aggregate', 'likeable_id');

        foreach ($replyCounts as $replyId => $count) {
            DB::table('forum_replies')->where('id', $replyId)->update(['likes_count' => (int) $count]);
        }
    }

    protected function loadHelpers(): void
    {
        $helperPath = module_path($this->moduleName, 'helpers/helper.php');
        if (is_file($helperPath)) {
            require_once $helperPath;
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(ForumCategoryRepositoryInterface::class, ForumCategoryRepository::class);
        $this->app->bind(ForumTopicRepositoryInterface::class, ForumTopicRepository::class);
        $this->app->bind(ForumServiceInterface::class, ForumService::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
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