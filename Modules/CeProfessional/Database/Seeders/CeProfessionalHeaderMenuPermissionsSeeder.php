<?php

namespace Modules\CeProfessional\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\FrontendManage\Entities\HeaderMenu;

class CeProfessionalHeaderMenuPermissionsSeeder extends Seeder
{
    /**
     * Add CE Professional role to public header menu permissions.
     */
    public function run()
    {
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
}
