<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Modules\RolePermission\Entities\Permission;

/**
 * Sidebar submenu under Instructors → Session Packages.
 * Live: also run database/sql/add_tutor_session_packages_permission.sql
 */
class AddTutorSessionPackagesPermission extends Migration
{
    public function up()
    {
        Permission::updateOrCreate(
            ['route' => 'tutorSessionPackages.index'],
            [
                'name' => 'Session Packages',
                'route' => 'tutorSessionPackages.index',
                'parent_route' => 'instructors',
                'type' => 2,
                'backend' => 1,
                'menu_status' => 1,
                'ecommerce' => 0,
                'status' => 1,
                'position' => 20,
                'section_id' => 1,
                'lms_id' => 1,
            ]
        );

        if (function_exists('SaasDomain')) {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
        }
    }

    public function down()
    {
        Permission::where('route', 'tutorSessionPackages.index')->delete();

        if (function_exists('SaasDomain')) {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
        }
    }
}
