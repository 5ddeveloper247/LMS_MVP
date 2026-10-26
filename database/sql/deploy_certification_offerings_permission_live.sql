-- Prefer deploy_certification_module_sidebar_live.sql (parent menu + offerings).
-- This file only ensures the offerings route exists if run alone.

INSERT INTO `permissions` (
    `name`, `route`, `parent_route`, `type`, `backend`, `menu_status`, `ecommerce`, `status`, `position`, `section_id`, `lms_id`, `created_at`, `updated_at`
)
SELECT
    'Certification Offerings',
    'certificationOfferings.index',
    'life-support-certification',
    2,
    1,
    1,
    0,
    1,
    25,
    1,
    1,
    NOW(),
    NOW()
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'certificationOfferings.index'
);
