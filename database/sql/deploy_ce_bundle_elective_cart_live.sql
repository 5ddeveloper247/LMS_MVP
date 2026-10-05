-- LIVE: store selected CE bundle electives on cart lines
-- Safe to re-run.

SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'carts'
    AND COLUMN_NAME = 'ce_elective_course_ids'
);

SET @sql := IF(
  @col_exists = 0,
  'ALTER TABLE `carts` ADD COLUMN `ce_elective_course_ids` TEXT NULL AFTER `ce_bundle_id`',
  'SELECT ''ce_elective_course_ids already exists'' AS info'
);

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
