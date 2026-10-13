SET @db = DATABASE();

SET @sql = IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'is_fl_bon_remediation') = 0,
  'ALTER TABLE `programs` ADD COLUMN `is_fl_bon_remediation` TINYINT UNSIGNED NOT NULL DEFAULT 0 AFTER `featured`',
  'SELECT ''Column is_fl_bon_remediation already exists'' AS msg'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

UPDATE `programs` SET `is_fl_bon_remediation` = 1 WHERE `featured` = 1 AND (`is_fl_bon_remediation` IS NULL OR `is_fl_bon_remediation` = 0);
