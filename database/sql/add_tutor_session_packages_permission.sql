-- =============================================================================
-- LIVE SQL: Sidebar permission — Session Packages under Instructors
-- Date: 2026-09-10
-- Safe to re-run: skips insert if route already exists.
-- =============================================================================

INSERT INTO `permissions` (
  `name`,
  `route`,
  `parent_route`,
  `type`,
  `backend`,
  `menu_status`,
  `ecommerce`,
  `status`,
  `position`,
  `section_id`,
  `lms_id`,
  `created_at`,
  `updated_at`
)
SELECT
  '{"en":"Session Packages"}',
  'tutorSessionPackages.index',
  'instructors',
  2,
  1,
  1,
  0,
  1,
  20,
  1,
  1,
  NOW(),
  NOW()
FROM DUAL
WHERE NOT EXISTS (
  SELECT 1 FROM `permissions` WHERE `route` = 'tutorSessionPackages.index'
);

-- Verify
SELECT id, name, route, parent_route, type, menu_status, position
FROM `permissions`
WHERE `route` = 'tutorSessionPackages.index';
