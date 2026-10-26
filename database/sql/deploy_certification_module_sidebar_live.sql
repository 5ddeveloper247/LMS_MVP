-- Life Support Certificates sidebar (NOT Modules/Certificate PDF templates)
-- Safe to re-run. Assigns Super Admin (1) + Admin (14) by default.

INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    9930, 9930, NULL,
    '{"en":"Life Support Certificates","es":""}',
    'life-support-certification',
    1, 1, 1, 1, NOW(), NOW(), 1, 1, NULL, 0, 'fas fa-heartbeat', '1',
    'Life Support Certificates', 1, NULL, 47, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'life-support-certification'
);

UPDATE `permissions`
SET
    `parent_route` = 'life-support-certification',
    `old_parent_route` = 'life-support-certification',
    `parent_id` = 9930,
    `module_id` = 9930,
    `name` = '{"en":"Certificate","es":""}',
    `old_name` = 'Certificate',
    `type` = 2,
    `position` = 1,
    `module` = NULL,
    `updated_at` = NOW()
WHERE `route` = 'certificationOfferings.index';

INSERT INTO `permissions` (
    `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    9930, 9930,
    '{"en":"Certificate","es":""}',
    'certificationOfferings.index',
    1, 1, 1, 2, NOW(), NOW(), 1, 1, 'life-support-certification', 0, 'fas fa-th', '1',
    'Certificate', 2, 'life-support-certification', 1, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'certificationOfferings.index'
);

UPDATE `permissions`
SET `name` = '{"en":"Life Support Certificates","es":""}',
    `old_name` = 'Life Support Certificates',
    `module` = NULL,
    `updated_at` = NOW()
WHERE `route` = 'life-support-certification';

-- Admin role (14) + Super Admin (1): parent + submenu
INSERT INTO `role_permission` (`permission_id`, `role_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `lms_id`)
SELECT p.id, r.role_id, 1, 1, 1, NOW(), NOW(), 1
FROM `permissions` p
CROSS JOIN (SELECT 1 AS role_id UNION ALL SELECT 14) r
WHERE p.route IN ('life-support-certification', 'certificationOfferings.index')
  AND NOT EXISTS (
      SELECT 1 FROM `role_permission` rp
      WHERE rp.permission_id = p.id AND rp.role_id = r.role_id
  );
