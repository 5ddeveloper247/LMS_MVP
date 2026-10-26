<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Phase 1 catalog: groups, display fields on offerings, pricing options.
 * Live deploy: database/sql/deploy_certification_catalog_phase1_live.sql
 */
class AddCertificationCatalogPhase1 extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('certification_groups')) {
            Schema::create('certification_groups', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->unsignedTinyInteger('status')->default(1)->comment('0=inactive, 1=active');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();

                $table->index(['status', 'sort_order']);
            });
        }

        if (Schema::hasTable('certification_offerings')) {
            Schema::table('certification_offerings', function (Blueprint $table) {
                if (! Schema::hasColumn('certification_offerings', 'certification_group_id')) {
                    $table->unsignedBigInteger('certification_group_id')->nullable()->after('slug');
                    $table->index('certification_group_id', 'cert_offerings_group_idx');
                }
                if (! Schema::hasColumn('certification_offerings', 'mark')) {
                    $table->string('mark', 100)->nullable()->after('certification_group_id')
                        ->comment('Badge label e.g. ACLS, BLS');
                }
                if (! Schema::hasColumn('certification_offerings', 'short_description')) {
                    $table->text('short_description')->nullable()->after('mark');
                }
                if (! Schema::hasColumn('certification_offerings', 'format_label')) {
                    $table->string('format_label', 255)->nullable()->after('short_description')
                        ->comment('Card line e.g. In-person + skills check');
                }
                if (! Schema::hasColumn('certification_offerings', 'ce_hours')) {
                    $table->decimal('ce_hours', 5, 2)->nullable()->after('format_label');
                }
                if (! Schema::hasColumn('certification_offerings', 'ce_note')) {
                    $table->string('ce_note', 255)->nullable()->after('ce_hours');
                }
            });

            if (Schema::hasColumn('certification_offerings', 'certification_group_id')) {
                try {
                    Schema::table('certification_offerings', function (Blueprint $table) {
                        $table->foreign('certification_group_id', 'cert_offerings_group_fk')
                            ->references('id')
                            ->on('certification_groups')
                            ->onDelete('set null');
                    });
                } catch (\Throwable $e) {
                    // FK may already exist on re-deploy
                }
            }
        }

        if (! Schema::hasTable('certification_offering_options')) {
            Schema::create('certification_offering_options', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('certification_offering_id');
                $table->string('title', 100);
                $table->string('subtitle', 255)->nullable();
                $table->decimal('price', 10, 2)->default(0);
                $table->string('product_code', 100)->nullable();
                $table->unsignedTinyInteger('sort_order')->default(0);
                $table->timestamps();

                $table->foreign('certification_offering_id', 'cert_offering_options_offering_fk')
                    ->references('id')
                    ->on('certification_offerings')
                    ->onDelete('cascade');

                $table->index(['certification_offering_id', 'sort_order'], 'cert_offering_options_sort_idx');
            });
        }

        if (Schema::hasTable('certification_groups') && DB::table('certification_groups')->count() === 0) {
            $now = now();
            DB::table('certification_groups')->insert([
                [
                    'name' => 'Life Support Certifications',
                    'slug' => 'life-support',
                    'status' => 1,
                    'sort_order' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Clinical Skills & Quality',
                    'slug' => 'clinical-quality',
                    'status' => 1,
                    'sort_order' => 2,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'name' => 'Skills & Specialty',
                    'slug' => 'skills-specialty',
                    'status' => 1,
                    'sort_order' => 3,
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('certification_offering_options');

        if (Schema::hasTable('certification_offerings')) {
            Schema::table('certification_offerings', function (Blueprint $table) {
                if (Schema::hasColumn('certification_offerings', 'certification_group_id')) {
                    $table->dropForeign('cert_offerings_group_fk');
                    $table->dropColumn([
                        'certification_group_id',
                        'mark',
                        'short_description',
                        'format_label',
                        'ce_hours',
                        'ce_note',
                    ]);
                }
            });
        }

        Schema::dropIfExists('certification_groups');
    }
}
