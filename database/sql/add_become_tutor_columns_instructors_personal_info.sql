-- =============================================================================
-- LIVE SQL: Become a Tutor — new columns on instructors_personal_info
-- Date: 2026-09-09
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: skips columns that already exist.
-- =============================================================================

-- nursing_credential
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'instructors_personal_info'
    AND COLUMN_NAME = 'nursing_credential'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `instructors_personal_info` ADD COLUMN `nursing_credential` VARCHAR(100) NULL AFTER `address`',
  'SELECT ''nursing_credential already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- years_experience
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'instructors_personal_info'
    AND COLUMN_NAME = 'years_experience'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `instructors_personal_info` ADD COLUMN `years_experience` VARCHAR(50) NULL AFTER `nursing_credential`',
  'SELECT ''years_experience already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- specialties (JSON / comma-separated checkbox values)
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'instructors_personal_info'
    AND COLUMN_NAME = 'specialties'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `instructors_personal_info` ADD COLUMN `specialties` TEXT NULL AFTER `years_experience`',
  'SELECT ''specialties already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- taught_before
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'instructors_personal_info'
    AND COLUMN_NAME = 'taught_before'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `instructors_personal_info` ADD COLUMN `taught_before` VARCHAR(150) NULL AFTER `specialties`',
  'SELECT ''taught_before already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- availability (JSON / comma-separated checkbox values)
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'instructors_personal_info'
    AND COLUMN_NAME = 'availability'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `instructors_personal_info` ADD COLUMN `availability` TEXT NULL AFTER `taught_before`',
  'SELECT ''availability already exists'' AS info'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- Verify
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE
FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA = DATABASE()
  AND TABLE_NAME = 'instructors_personal_info'
  AND COLUMN_NAME IN (
    'nursing_credential',
    'years_experience',
    'specialties',
    'taught_before',
    'availability'
  )
ORDER BY ORDINAL_POSITION;
