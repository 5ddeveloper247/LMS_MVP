-- =============================================================================
-- LIVE SQL: CE Bundles admin sidebar permission (id 9924)
-- Safe to re-run: skips if route already exists.
-- =============================================================================

INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`,
    `type`, `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`,
    `icon`, `menu_status`, `old_name`, `old_type`, `old_parent_route`, `position`,
    `module`, `theme`, `not_module`, `not_theme`, `section_id`
)
SELECT
    9924, 9920, 9920,
    '{"en":"Bundles","es":""}',
    'continuing-education.bundles.index', 1, 1, 1,
    2, NOW(), NOW(), 1, 1, 'continuing-education', 0,
    'fas fa-box-open', '1', 'Bundles', 2, 'continuing-education', 4,
    NULL, NULL, NULL, NULL, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'continuing-education.bundles.index'
);

SELECT `id`, `name`, `route`, `type`, `parent_route`, `position`
FROM `permissions`
WHERE `route` = 'continuing-education.bundles.index';
