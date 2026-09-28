-- =============================================================================
-- LIVE SQL: Add Continuing Education to public header menu
-- Date: 2026-09-28
-- URL: /continuing-education
-- Safe to re-run: skips if link already exists.
-- =============================================================================

-- Shift existing items at position 4+ down by one slot.
UPDATE `header_menus`
SET `position` = `position` + 1
WHERE `link` != '/continuing-education'
  AND `position` >= 4;

INSERT INTO `header_menus` (
    `type`,
    `element_id`,
    `title`,
    `link`,
    `parent_id`,
    `position`,
    `show`,
    `is_newtab`,
    `mega_menu`,
    `mega_menu_column`,
    `permissions`,
    `lms_id`,
    `created_at`,
    `updated_at`
)
SELECT
    'Custom Link',
    NULL,
    '{"en":"Continuing Education","ar":"Continuing Education","bn":"Continuing Education","es":"Continuing Education"}',
    '/continuing-education',
    NULL,
    4,
    0,
    0,
    0,
    2,
    '["1","2","9","3","notauth","10"]',
    1,
    NOW(),
    NOW()
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `header_menus` WHERE `link` = '/continuing-education'
);

-- Verify
SELECT `id`, `title`, `link`, `position`, `permissions`
FROM `header_menus`
ORDER BY `position`, `id`;
