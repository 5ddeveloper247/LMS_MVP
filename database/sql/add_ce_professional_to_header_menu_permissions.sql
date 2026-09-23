-- =============================================================================
-- LIVE SQL: Add CE Professional role (10) to public header menu permissions
-- Date: 2026-09-23
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: skips rows that already include "10".
--
-- Adds role "10" to header_menus.permissions where the menu is public
-- (permissions include notauth or student role 3).
-- =============================================================================

UPDATE `header_menus`
SET `permissions` = JSON_ARRAY_APPEND(`permissions`, '$', '10')
WHERE `permissions` IS NOT NULL
  AND JSON_VALID(`permissions`)
  AND (
    JSON_CONTAINS(`permissions`, '"notauth"')
    OR JSON_CONTAINS(`permissions`, '"3"')
    OR JSON_CONTAINS(`permissions`, '3')
  )
  AND NOT JSON_CONTAINS(`permissions`, '"10"');

-- Verify
SELECT `id`, `link`, `permissions`
FROM `header_menus`
WHERE `permissions` IS NOT NULL
ORDER BY `id`;
