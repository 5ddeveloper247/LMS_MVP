<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AddSavingsBundlesSidebarPermission extends Migration
{
    /**
     * Add Shop → Savings & Bundles menu (same level as Products / Orders).
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permissions')) {
            return;
        }

        $exists = DB::table('permissions')->where('route', 'bundle.index')->exists();
        if ($exists) {
            return;
        }

        // Keep Orders after Bundles in the Shop submenu
        DB::table('permissions')
            ->where('route', 'shop.orders')
            ->where('parent_route', 'shop')
            ->update(['position' => 24]);

        DB::table('permissions')->insert([
            'module_id' => null,
            'parent_id' => null,
            'name' => json_encode(['en' => 'Savings & Bundles', 'es' => '']),
            'route' => 'bundle.index',
            'status' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'type' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            'lms_id' => 1,
            'backend' => 1,
            'parent_route' => 'shop',
            'ecommerce' => 0,
            'icon' => 'fas fa-th',
            'menu_status' => '1',
            'old_name' => 'Savings & Bundles',
            'old_type' => 2,
            'old_parent_route' => 'shop',
            'position' => 23,
            'module' => null,
            'theme' => null,
            'not_module' => null,
            'not_theme' => null,
            'section_id' => '1',
        ]);

        try {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
        } catch (\Throwable $e) {
            // ignore cache clear failures on migrate
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->where('route', 'bundle.index')->delete();

        DB::table('permissions')
            ->where('route', 'shop.orders')
            ->where('parent_route', 'shop')
            ->update(['position' => 23]);
    }
}
