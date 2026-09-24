<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Admin sidebar: Continuing Education → CE Courses
 * Live: database/sql/add_continuing_education_sidebar_permissions.sql
 */
class AddContinuingEducationSidebarPermissions extends Migration
{
    protected $parentId = 9920;

    protected $coursesMenuId = 9921;

    public function up()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        if (DB::table('permissions')->where('route', 'continuing-education')->exists()) {
            return;
        }

        $now = now();

        DB::table('permissions')->insert([
            'id' => $this->parentId,
            'module_id' => $this->parentId,
            'parent_id' => null,
            'name' => json_encode(['en' => 'Continuing Education', 'es' => '']),
            'route' => 'continuing-education',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'type' => 1,
            'created_at' => $now,
            'updated_at' => $now,
            'lms_id' => 1,
            'backend' => 1,
            'parent_route' => null,
            'ecommerce' => 0,
            'icon' => 'fas fa-user-nurse',
            'menu_status' => '1',
            'old_name' => 'Continuing Education',
            'old_type' => 1,
            'old_parent_route' => null,
            'position' => 46,
            'module' => null,
            'theme' => null,
            'not_module' => null,
            'not_theme' => null,
            'section_id' => '1',
        ]);

        DB::table('permissions')->insert([
            'id' => $this->coursesMenuId,
            'module_id' => $this->parentId,
            'parent_id' => $this->parentId,
            'name' => json_encode(['en' => 'CE Courses', 'es' => '']),
            'route' => 'continuing-education.courses.index',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'type' => 2,
            'created_at' => $now,
            'updated_at' => $now,
            'lms_id' => 1,
            'backend' => 1,
            'parent_route' => 'continuing-education',
            'ecommerce' => 0,
            'icon' => 'fas fa-th',
            'menu_status' => '1',
            'old_name' => 'CE Courses',
            'old_type' => 2,
            'old_parent_route' => 'continuing-education',
            'position' => 1,
            'module' => null,
            'theme' => null,
            'not_module' => null,
            'not_theme' => null,
            'section_id' => '1',
        ]);

        $this->clearPermissionCache();
    }

    public function down()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->whereIn('route', [
            'continuing-education',
            'continuing-education.courses.index',
        ])->delete();

        $this->clearPermissionCache();
    }

    protected function clearPermissionCache()
    {
        try {
            if (function_exists('SaasDomain')) {
                Cache::forget('PermissionList_' . SaasDomain());
                Cache::forget('RoleList_' . SaasDomain());
            }
        } catch (\Throwable $e) {
            // ignore
        }
    }
}
