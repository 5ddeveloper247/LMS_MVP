-- =============================================================================
-- LIVE SQL: CE Purchases admin sidebar permission (id 9925)
-- Safe to re-run: skips if route already exists.
-- =============================================================================

INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`,
    `type`, `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`,
    `icon`, `menu_status`, `old_name`, `old_type`, `old_parent_route`, `position`,
    `module`, `theme`, `not_module`, `not_theme`, `section_id`
)
SELECT
    9925, 9920, 9920,
    '{"en":"Purchases","es":""}',
    'continuing-education.purchases.index', 1, 1, 1,
    2, NOW(), NOW(), 1, 1, 'continuing-education', 0,
    'fas fa-receipt', '1', 'Purchases', 2, 'continuing-education', 5,
    NULL, NULL, NULL, NULL, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'continuing-education.purchases.index'
);

-- Optional: assign to Super Admin (role_id = 1) if your panel uses role_permission.
-- INSERT INTO `role_permission` (`role_id`, `permission_id`, `lms_id`)
-- SELECT 1, 9925, 1 FROM DUAL
-- WHERE NOT EXISTS (
--     SELECT 1 FROM `role_permission` WHERE `role_id` = 1 AND `permission_id` = 9925
-- );

SELECT `id`, `name`, `route`, `type`, `parent_route`, `position`
FROM `permissions`
WHERE `route` = 'continuing-education.purchases.index';
