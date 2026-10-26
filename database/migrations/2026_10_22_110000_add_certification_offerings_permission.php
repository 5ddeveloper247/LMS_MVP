<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Modules\RolePermission\Entities\Permission;

/**
 * Admin: Life Support Certifications module (see Modules/Certification).
 * Sidebar parent is applied by module migration or deploy_certification_module_sidebar_live.sql
 * Live: database/sql/deploy_certification_offerings_permission_live.sql
 */
class AddCertificationOfferingsPermission extends Migration
{
    public function up()
    {
        Permission::updateOrCreate(
            ['route' => 'certificationOfferings.index'],
            [
                'name' => 'Certification Offerings',
                'route' => 'certificationOfferings.index',
                'parent_route' => 'life-support-certification',
                'type' => 2,
                'backend' => 1,
                'menu_status' => 1,
                'ecommerce' => 0,
                'status' => 1,
                'position' => 25,
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
        Permission::where('route', 'certificationOfferings.index')->delete();

        if (function_exists('SaasDomain')) {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
        }
    }
}
