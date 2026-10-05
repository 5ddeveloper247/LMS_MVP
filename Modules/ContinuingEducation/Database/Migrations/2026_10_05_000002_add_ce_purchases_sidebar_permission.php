<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCePurchasesSidebarPermission extends Migration
{
    protected int $parentId = 9920;

    protected int $purchasesMenuId = 9925;

    public function up()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        if (DB::table('permissions')->where('route', 'continuing-education.purchases.index')->exists()) {
            return;
        }

        $now = now();

        DB::table('permissions')->insert([
            'id' => $this->purchasesMenuId,
            'module_id' => $this->parentId,
            'parent_id' => $this->parentId,
            'name' => json_encode(['en' => 'Purchases', 'es' => '']),
            'route' => 'continuing-education.purchases.index',
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
            'icon' => 'fas fa-receipt',
            'menu_status' => '1',
            'old_name' => 'Purchases',
            'old_type' => 2,
            'old_parent_route' => 'continuing-education',
            'position' => 5,
            'module' => null,
            'theme' => null,
            'not_module' => null,
            'not_theme' => null,
            'section_id' => '1',
        ]);

        if (function_exists('SaasDomain')) {
            Cache::forget('PermissionList_' . SaasDomain());
        }
    }

    public function down()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        DB::table('permissions')->where('route', 'continuing-education.purchases.index')->delete();

        if (function_exists('SaasDomain')) {
            Cache::forget('PermissionList_' . SaasDomain());
        }
    }
}
