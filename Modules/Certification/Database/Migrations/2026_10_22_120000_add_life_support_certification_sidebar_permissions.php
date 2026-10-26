<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Admin sidebar: Life Support Certifications → Offerings
 * (Separate from Modules/Certificate course completion templates.)
 *
 * Live: database/sql/deploy_certification_module_sidebar_live.sql
 */
class AddLifeSupportCertificationSidebarPermissions extends Migration
{
    protected int $parentId = 9930;

    public function up()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        $now = now();
        $parentRoute = 'life-support-certification';

        if (! DB::table('permissions')->where('route', $parentRoute)->exists()) {
            DB::table('permissions')->insert([
                'id' => $this->parentId,
                'module_id' => $this->parentId,
                'parent_id' => null,
                'name' => json_encode(['en' => 'Life Support Certificates', 'es' => '']),
                'route' => $parentRoute,
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
                'icon' => 'fas fa-heartbeat',
                'menu_status' => '1',
                'old_name' => 'Life Support Certificates',
                'old_type' => 1,
                'old_parent_route' => null,
                'position' => 47,
                'module' => null,
                'theme' => null,
                'not_module' => null,
                'not_theme' => null,
                'section_id' => '1',
            ]);
        }

        DB::table('permissions')
            ->where('route', 'certificationOfferings.index')
            ->update([
                'parent_route' => $parentRoute,
                'old_parent_route' => $parentRoute,
                'name' => json_encode(['en' => 'Certificate', 'es' => '']),
                'old_name' => 'Certificate',
                'parent_id' => $this->parentId,
                'module_id' => $this->parentId,
                'type' => 2,
                'position' => 1,
                'updated_at' => $now,
            ]);

        if (! DB::table('permissions')->where('route', 'certificationOfferings.index')->exists()) {
            DB::table('permissions')->insert([
                'module_id' => $this->parentId,
                'parent_id' => $this->parentId,
                'name' => json_encode(['en' => 'Certificate', 'es' => '']),
                'route' => 'certificationOfferings.index',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'type' => 2,
                'created_at' => $now,
                'updated_at' => $now,
                'lms_id' => 1,
                'backend' => 1,
                'parent_route' => $parentRoute,
                'ecommerce' => 0,
                'icon' => 'fas fa-th',
                'menu_status' => '1',
                'old_name' => 'Certificate',
                'old_type' => 2,
                'old_parent_route' => $parentRoute,
                'position' => 1,
                'module' => null,
                'theme' => null,
                'not_module' => null,
                'not_theme' => null,
                'section_id' => '1',
            ]);
        }

        $this->clearPermissionCache();
    }

    public function down()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        DB::table('permissions')
            ->where('route', 'certificationOfferings.index')
            ->update([
                'parent_route' => 'frontend.home',
                'old_parent_route' => 'frontend.home',
            ]);

        DB::table('permissions')->where('route', 'life-support-certification')->delete();

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
