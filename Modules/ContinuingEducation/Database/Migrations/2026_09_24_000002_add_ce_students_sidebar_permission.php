<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Admin sidebar: Continuing Education → CE Students
 * Live: database/sql/add_ce_students_sidebar_permission.sql
 */
class AddCeStudentsSidebarPermission extends Migration
{
    protected $parentId = 9920;

    protected $studentsMenuId = 9922;

    public function up()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        if (DB::table('permissions')->where('route', 'continuing-education.students.index')->exists()) {
            return;
        }

        $now = now();

        DB::table('permissions')->insert([
            'id' => $this->studentsMenuId,
            'module_id' => $this->parentId,
            'parent_id' => $this->parentId,
            'name' => json_encode(['en' => 'CE Students', 'es' => '']),
            'route' => 'continuing-education.students.index',
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
            'icon' => 'fas fa-users',
            'menu_status' => '1',
            'old_name' => 'CE Students',
            'old_type' => 2,
            'old_parent_route' => 'continuing-education',
            'position' => 2,
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

        DB::table('permissions')->where('route', 'continuing-education.students.index')->delete();

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
