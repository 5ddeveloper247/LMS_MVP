<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Enroll/hub pill categories (ACLS, BLS, …) — not catalog groups (Life Support section).
 * Live deploy: database/sql/deploy_certification_categories_live.sql
 */
class AddCertificationCategories extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('certification_categories')) {
            Schema::create('certification_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->unsignedTinyInteger('status')->default(1)->comment('0=inactive, 1=active');
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();

                $table->index(['status', 'sort_order']);
            });
        }

        $this->seedCategories();

        if (Schema::hasTable('certification_offerings')
            && ! Schema::hasColumn('certification_offerings', 'certification_category_id')) {
            Schema::table('certification_offerings', function (Blueprint $table) {
                $table->unsignedBigInteger('certification_category_id')->nullable()->after('certification_group_id');
                $table->index('certification_category_id', 'cert_offerings_category_idx');
            });

            try {
                Schema::table('certification_offerings', function (Blueprint $table) {
                    $table->foreign('certification_category_id', 'cert_offerings_category_fk')
                        ->references('id')
                        ->on('certification_categories')
                        ->onDelete('set null');
                });
            } catch (\Throwable $e) {
                // FK may already exist
            }
        }

        if (Schema::hasColumn('certification_offerings', 'mark')
            && Schema::hasColumn('certification_offerings', 'certification_category_id')) {
            $categoriesBySlug = DB::table('certification_categories')->pluck('id', 'slug');
            $markToSlug = [
                'acls' => 'acls',
                'bls' => 'bls',
                'pals' => 'pals',
                'cpr & first aid' => 'cpr-first-aid',
                'cpr and first aid' => 'cpr-first-aid',
                'iv therapy' => 'iv-therapy',
                'hedis' => 'hedis',
                'skills check' => 'skills-check',
            ];

            $offeringsWithMark = DB::table('certification_offerings')
                ->whereNotNull('mark')
                ->whereNull('certification_category_id')
                ->orderBy('id')
                ->get(['id', 'mark']);

            foreach ($offeringsWithMark as $row) {
                $key = strtolower(trim($row->mark));
                $slug = $markToSlug[$key] ?? Str::slug($row->mark);
                $categoryId = $categoriesBySlug[$slug] ?? null;
                if ($categoryId) {
                    DB::table('certification_offerings')
                        ->where('id', $row->id)
                        ->update(['certification_category_id' => $categoryId]);
                }
            }
        }

        if (Schema::hasColumn('certification_offerings', 'mark')) {
            Schema::table('certification_offerings', function (Blueprint $table) {
                $table->dropColumn('mark');
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('certification_offerings')) {
            if (! Schema::hasColumn('certification_offerings', 'mark')) {
                Schema::table('certification_offerings', function (Blueprint $table) {
                    $table->string('mark', 100)->nullable()->after('certification_group_id');
                });
            }

            if (Schema::hasColumn('certification_offerings', 'certification_category_id')) {
                Schema::table('certification_offerings', function (Blueprint $table) {
                    $table->dropForeign('cert_offerings_category_fk');
                    $table->dropColumn('certification_category_id');
                });
            }
        }

        Schema::dropIfExists('certification_categories');
    }

    private function seedCategories(): void
    {
        $rows = [
            ['name' => 'ACLS', 'slug' => 'acls', 'sort_order' => 1],
            ['name' => 'BLS', 'slug' => 'bls', 'sort_order' => 2],
            ['name' => 'PALS', 'slug' => 'pals', 'sort_order' => 3],
            ['name' => 'CPR & First Aid', 'slug' => 'cpr-first-aid', 'sort_order' => 4],
            ['name' => 'IV Therapy', 'slug' => 'iv-therapy', 'sort_order' => 5],
            ['name' => 'HEDIS', 'slug' => 'hedis', 'sort_order' => 6],
            ['name' => 'Skills Check', 'slug' => 'skills-check', 'sort_order' => 7],
        ];

        $now = now();
        foreach ($rows as $row) {
            $exists = DB::table('certification_categories')->where('slug', $row['slug'])->exists();
            if (! $exists) {
                DB::table('certification_categories')->insert(array_merge($row, [
                    'status' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]));
            }
        }
    }
}
