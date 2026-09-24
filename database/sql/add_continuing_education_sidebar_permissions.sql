-- =============================================================================
-- LIVE SQL: Continuing Education admin sidebar permissions
-- Date: 2026-09-24
-- Safe to re-run: skips if routes already exist.
--
-- Adds:
--   Continuing Education (parent menu)
--   └── CE Courses
-- =============================================================================

-- Parent menu (type 1)
INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`,
    `type`, `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`,
    `icon`, `menu_status`, `old_name`, `old_type`, `old_parent_route`, `position`,
    `module`, `theme`, `not_module`, `not_theme`, `section_id`
)
SELECT
    9920, 9920, NULL,
    '{"en":"Continuing Education","es":""}',
    'continuing-education', 1, 1, 1,
    1, NOW(), NOW(), 1, 1, NULL, 0,
    'fas fa-user-nurse', '1', 'Continuing Education', 1, NULL, 46,
    NULL, NULL, NULL, NULL, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'continuing-education'
);

-- Submenu: CE Courses (type 2)
INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`,
    `type`, `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`,
    `icon`, `menu_status`, `old_name`, `old_type`, `old_parent_route`, `position`,
    `module`, `theme`, `not_module`, `not_theme`, `section_id`
)
SELECT
    9921, 9920, 9920,
    '{"en":"CE Courses","es":""}',
    'continuing-education.courses.index', 1, 1, 1,
    2, NOW(), NOW(), 1, 1, 'continuing-education', 0,
    'fas fa-th', '1', 'CE Courses', 2, 'continuing-education', 1,
    NULL, NULL, NULL, NULL, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'continuing-education.courses.index'
);

-- Fix existing rows if migration ran with module name set (hides menu from sidebar)
UPDATE `permissions`
SET `module` = NULL
WHERE `route` IN ('continuing-education', 'continuing-education.courses.index')
  AND `module` = 'ContinuingEducation';

-- Verify
SELECT `id`, `name`, `route`, `type`, `parent_route`, `module`, `position`
FROM `permissions`
WHERE `route` IN ('continuing-education', 'continuing-education.courses.index');
