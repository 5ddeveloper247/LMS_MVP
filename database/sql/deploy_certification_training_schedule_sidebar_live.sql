-- Life Support Certificates → Training Schedule (sidebar after Certificate)
-- Safe to re-run. Grants Super Admin (1) + Admin (14).
-- Requires parent permission route: life-support-certification

INSERT INTO `permissions` (
    `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    p.id,
    p.id,
    '{"en":"Training Schedule","es":""}',
    'certificationTrainingSchedules.index',
    1, 1, 1, 2, NOW(), NOW(), 1, 1, 'life-support-certification', 0, 'fas fa-calendar-alt', '1',
    'Training Schedule', 2, 'life-support-certification', 2, '1'
FROM `permissions` p
WHERE p.`route` = 'life-support-certification'
  AND NOT EXISTS (
      SELECT 1 FROM `permissions` WHERE `route` = 'certificationTrainingSchedules.index'
  )
LIMIT 1;

UPDATE `permissions`
SET
    `parent_route` = 'life-support-certification',
    `old_parent_route` = 'life-support-certification',
    `parent_id` = (SELECT id FROM (SELECT id FROM `permissions` WHERE `route` = 'life-support-certification' LIMIT 1) AS t),
    `module_id` = (SELECT id FROM (SELECT id FROM `permissions` WHERE `route` = 'life-support-certification' LIMIT 1) AS t),
    `name` = '{"en":"Training Schedule","es":""}',
    `old_name` = 'Training Schedule',
    `type` = 2,
    `position` = 2,
    `icon` = 'fas fa-calendar-alt',
    `menu_status` = '1',
    `updated_at` = NOW()
WHERE `route` = 'certificationTrainingSchedules.index';

UPDATE `permissions`
SET `position` = 1, `updated_at` = NOW()
WHERE `route` = 'certificationOfferings.index';

INSERT INTO `role_permission` (`permission_id`, `role_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `lms_id`)
SELECT p.id, r.role_id, 1, 1, 1, NOW(), NOW(), 1
FROM `permissions` p
CROSS JOIN (SELECT 1 AS role_id UNION ALL SELECT 14) r
WHERE p.`route` = 'certificationTrainingSchedules.index'
  AND NOT EXISTS (
      SELECT 1 FROM `role_permission` rp
      WHERE rp.`permission_id` = p.id AND rp.`role_id` = r.role_id
  );
