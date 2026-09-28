-- =============================================================================
-- LIVE SQL: Add featured column to ce_license_types (max 2 shown on CE homepage)
-- Safe to re-run.
-- =============================================================================

SET @col_exists := (
    SELECT COUNT(*)
    FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE()
      AND TABLE_NAME = 'ce_license_types'
      AND COLUMN_NAME = 'featured'
);

SET @sql := IF(
    @col_exists = 0,
    'ALTER TABLE `ce_license_types` ADD COLUMN `featured` tinyint(1) NOT NULL DEFAULT 0 AFTER `publish`, ADD KEY `ce_license_types_featured_index` (`featured`)',
    'SELECT ''featured column already exists'' AS message'
);

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

UPDATE `ce_license_types`
SET `featured` = 1
WHERE `anchor_id` IN ('rn-lpn-packages', 'aprn-packages');

SELECT `id`, `name`, `featured`, `publish`, `status`
FROM `ce_license_types`
ORDER BY COALESCE(`seq_no`, 999999), `name`;
