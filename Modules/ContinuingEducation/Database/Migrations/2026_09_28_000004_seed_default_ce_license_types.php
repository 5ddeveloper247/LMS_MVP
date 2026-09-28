<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedDefaultCeLicenseTypes extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('ce_license_types')) {
            return;
        }

        if (DB::table('ce_license_types')->exists()) {
            return;
        }

        $now = now();

        DB::table('ce_license_types')->insert([
            [
                'name' => 'Florida RN & LPN',
                'subtitle' => 'License Renewal Packages',
                'description' => 'The Florida Board of Nursing requires RNs and LPNs to complete 26 contact hours every two years. Don\'t waste time buying random individual courses — our Board-approved bundles give you exactly what you need in a single checkout.',
                'component_1' => '6 mandatory courses (11 contact hours)',
                'component_2' => '15 hours of clinical electives to reach 26',
                'component_3' => 'Auto-reported to CE Broker within 48–72 hours',
                'card_style' => 'teal',
                'button_label' => 'View RN & LPN Packages',
                'button_url' => 'route:continuingEducationRnLpn',
                'anchor_id' => 'rn-lpn-packages',
                'seq_no' => 1,
                'status' => 1,
                'publish' => 1,
                'lms_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Florida APRN / NP',
                'subtitle' => 'Prescribing & Renewal Packages',
                'description' => 'Advanced practice requires advanced compliance. Your renewal path depends on whether you hold an active national certification. We have your curriculum ready for either route — including the mandatory controlled substance prescribing update.',
                'component_1' => 'Certified-Exempt path: 5 hours total',
                'component_2' => 'Standard full renewal: 27 hours total',
                'component_3' => 'Autonomous APRNs: +10 additional hours',
                'card_style' => 'terra',
                'button_label' => 'View APRN Packages',
                'button_url' => 'route:continuingEducationAprn',
                'anchor_id' => 'aprn-packages',
                'seq_no' => 2,
                'status' => 1,
                'publish' => 1,
                'lms_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down()
    {
        if (! Schema::hasTable('ce_license_types')) {
            return;
        }

        DB::table('ce_license_types')->whereIn('anchor_id', ['rn-lpn-packages', 'aprn-packages'])->delete();
    }
}
