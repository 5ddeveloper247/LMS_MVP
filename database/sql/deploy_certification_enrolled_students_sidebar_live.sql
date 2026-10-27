-- Life Support Certificates → Enrolled Students (sidebar after Training Schedule)
-- Safe to re-run. Grants Super Admin (1) + Admin (14).

INSERT INTO `permissions` (
    `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    p.id,
    p.id,
    '{"en":"Enrolled Students","es":""}',
    'certificationEnrollments.index',
    1, 1, 1, 2, NOW(), NOW(), 1, 1, 'life-support-certification', 0, 'fas fa-user-graduate', '1',
    'Enrolled Students', 2, 'life-support-certification', 3, '1'
FROM `permissions` p
WHERE p.`route` = 'life-support-certification'
  AND NOT EXISTS (
      SELECT 1 FROM `permissions` WHERE `route` = 'certificationEnrollments.index'
  )
LIMIT 1;

UPDATE `permissions`
SET
    `parent_route` = 'life-support-certification',
    `old_parent_route` = 'life-support-certification',
    `parent_id` = (SELECT id FROM (SELECT id FROM `permissions` WHERE `route` = 'life-support-certification' LIMIT 1) AS t),
    `module_id` = (SELECT id FROM (SELECT id FROM `permissions` WHERE `route` = 'life-support-certification' LIMIT 1) AS t),
    `name` = '{"en":"Enrolled Students","es":""}',
    `old_name` = 'Enrolled Students',
    `type` = 2,
    `position` = 3,
    `icon` = 'fas fa-user-graduate',
    `menu_status` = '1',
    `updated_at` = NOW()
WHERE `route` = 'certificationEnrollments.index';

INSERT INTO `role_permission` (`permission_id`, `role_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `lms_id`)
SELECT p.id, r.role_id, 1, 1, 1, NOW(), NOW(), 1
FROM `permissions` p
CROSS JOIN (SELECT 1 AS role_id UNION ALL SELECT 14) r
WHERE p.`route` = 'certificationEnrollments.index'
  AND NOT EXISTS (
      SELECT 1 FROM `role_permission` rp
      WHERE rp.`permission_id` = p.id AND rp.`role_id` = r.role_id
  );
