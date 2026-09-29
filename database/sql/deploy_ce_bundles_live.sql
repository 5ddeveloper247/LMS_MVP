-- =============================================================================
-- LIVE DEPLOY: CE Bundles admin module (run on production DB — no artisan migrate)
-- Prerequisites: ce_courses table + CE sidebar permission 9920
-- After: php artisan view:clear && php artisan cache:clear
-- =============================================================================

-- STEP 1: Tables (see create_ce_bundles_tables.sql for full DDL)
-- Run: database/sql/create_ce_bundles_tables.sql

-- STEP 2: Sidebar permission (see add_ce_bundles_sidebar_permission.sql)
-- Run: database/sql/add_ce_bundles_sidebar_permission.sql
