-- =============================================================================
-- LIVE SQL: Add popular flag to tutor_session_packages (Most Popular badge)
-- Date: 2026-09-10
-- Safe to re-run: skips if column already exists.
-- =============================================================================

SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'tutor_session_packages'
    AND COLUMN_NAME = 'popular'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `tutor_session_packages` ADD COLUMN `popular` TINYINT(1) NOT NULL DEFAULT 0 AFTER `is_featured`',
  'SELECT ''popular already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SHOW COLUMNS FROM `tutor_session_packages` LIKE 'popular';
