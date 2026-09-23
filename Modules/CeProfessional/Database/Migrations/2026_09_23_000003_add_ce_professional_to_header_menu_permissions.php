<?php

use Illuminate\Database\Migrations\Migration;
use Modules\FrontendManage\Entities\HeaderMenu;

/**
 * Add CE Professional role (10) to public header menu permissions.
 * Live deploy: also run database/sql/add_ce_professional_to_header_menu_permissions.sql
 */
class AddCeProfessionalToHeaderMenuPermissions extends Migration
{
    public function up()
    {
        if (!class_exists(HeaderMenu::class)) {
            return;
        }

        $ceRoleId = (string) config('ceprofessional.role_id', 10);

        HeaderMenu::whereNotNull('permissions')->each(function (HeaderMenu $menu) use ($ceRoleId) {
            $permissions = json_decode($menu->permissions, true);
            if (! is_array($permissions)) {
                return;
            }

            $allowed = array_values($permissions);
            $isPublicMenu = in_array('notauth', $allowed, true)
                || in_array('3', $allowed, true)
                || in_array(3, $allowed, true);

            if (! $isPublicMenu) {
                return;
            }

            if (in_array($ceRoleId, $allowed, true) || in_array((int) $ceRoleId, $allowed, true)) {
                return;
            }

            $permissions[] = $ceRoleId;
            $menu->permissions = json_encode(array_values($permissions));
            $menu->save();
        });
    }

    public function down()
    {
        if (! class_exists(HeaderMenu::class)) {
            return;
        }

        $ceRoleId = (string) config('ceprofessional.role_id', 10);

        HeaderMenu::whereNotNull('permissions')->each(function (HeaderMenu $menu) use ($ceRoleId) {
            $permissions = json_decode($menu->permissions, true);
            if (! is_array($permissions)) {
                return;
            }

            $filtered = array_values(array_filter($permissions, function ($value) use ($ceRoleId) {
                return (string) $value !== $ceRoleId && (int) $value !== (int) $ceRoleId;
            }));

            if ($filtered !== array_values($permissions)) {
                $menu->permissions = json_encode($filtered);
                $menu->save();
            }
        });
    }
}
