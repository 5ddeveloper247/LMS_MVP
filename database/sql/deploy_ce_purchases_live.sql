-- =============================================================================
-- LIVE DEPLOY: CE Purchases tables (run on production DB — no artisan migrate)
-- Prerequisites: ce_courses, ce_bundles, ce_course_enrollments, carts, checkouts
-- After code deploy: php artisan view:clear && php artisan cache:clear
-- =============================================================================

-- Run: database/sql/create_ce_purchases_tables.sql
