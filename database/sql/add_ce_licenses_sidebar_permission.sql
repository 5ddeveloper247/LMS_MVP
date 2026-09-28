-- =============================================================================
-- LIVE SQL: CE Licenses admin sidebar permission
-- Safe to re-run: skips if route already exists.
-- =============================================================================

INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`,
    `type`, `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`,
    `icon`, `menu_status`, `old_name`, `old_type`, `old_parent_route`, `position`,
    `module`, `theme`, `not_module`, `not_theme`, `section_id`
)
SELECT
    9923, 9920, 9920,
    '{"en":"Licenses","es":""}',
    'continuing-education.licenses.index', 1, 1, 1,
    2, NOW(), NOW(), 1, 1, 'continuing-education', 0,
    'fas fa-id-card', '1', 'Licenses', 2, 'continuing-education', 3,
    NULL, NULL, NULL, NULL, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'continuing-education.licenses.index'
);

SELECT `id`, `name`, `route`, `type`, `parent_route`, `position`
FROM `permissions`
WHERE `route` = 'continuing-education.licenses.index';
