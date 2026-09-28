<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Modules\FrontendManage\Entities\HeaderMenu;

/**
 * Public header menu: Continuing Education → /continuing-education
 * Live deploy: also run database/sql/add_continuing_education_header_menu.sql
 */
class AddContinuingEducationHeaderMenu extends Migration
{
    public function up()
    {
        if (! class_exists(HeaderMenu::class)) {
            return;
        }

        $link = '/continuing-education';

        if (HeaderMenu::withoutGlobalScopes()->where('link', $link)->exists()) {
            return;
        }

        HeaderMenu::withoutGlobalScopes()
            ->where('position', '>=', 4)
            ->increment('position');

        HeaderMenu::withoutGlobalScopes()->create([
            'type' => 'Custom Link',
            'element_id' => null,
            'title' => [
                'en' => 'Continuing Education',
                'ar' => 'Continuing Education',
                'bn' => 'Continuing Education',
                'es' => 'Continuing Education',
            ],
            'link' => $link,
            'parent_id' => null,
            'position' => 4,
            'show' => 0,
            'is_newtab' => 0,
            'mega_menu' => 0,
            'mega_menu_column' => 2,
            'permissions' => json_encode(['1', '2', '9', '3', 'notauth', '10']),
            'lms_id' => 1,
        ]);

        if (function_exists('clearAllLangCache')) {
            clearAllLangCache('menus_');
        }
    }

    public function down()
    {
        if (! class_exists(HeaderMenu::class)) {
            return;
        }

        $link = '/continuing-education';
        $menu = HeaderMenu::withoutGlobalScopes()->where('link', $link)->first();

        if (! $menu) {
            return;
        }

        $position = (int) $menu->position;
        $menu->delete();

        HeaderMenu::withoutGlobalScopes()
            ->where('position', '>', $position)
            ->decrement('position');

        if (function_exists('clearAllLangCache')) {
            clearAllLangCache('menus_');
        }
    }
}
