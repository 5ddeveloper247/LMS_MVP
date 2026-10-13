-- Programs page featured card fields (run on tenant DB if not using artisan migrate)

SET @db := DATABASE();

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'short_description') = 0,
  'ALTER TABLE `programs` ADD COLUMN `short_description` text NULL AFTER `subtitle`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'featured_eyebrow') = 0,
  'ALTER TABLE `programs` ADD COLUMN `featured_eyebrow` varchar(255) NULL AFTER `short_description`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'featured_headline') = 0,
  'ALTER TABLE `programs` ADD COLUMN `featured_headline` varchar(500) NULL AFTER `featured_eyebrow`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'featured_meta_specialty') = 0,
  'ALTER TABLE `programs` ADD COLUMN `featured_meta_specialty` varchar(255) NULL AFTER `featured_headline`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'featured_meta_format') = 0,
  'ALTER TABLE `programs` ADD COLUMN `featured_meta_format` varchar(255) NULL AFTER `featured_meta_specialty`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'featured_meta_since') = 0,
  'ALTER TABLE `programs` ADD COLUMN `featured_meta_since` varchar(255) NULL AFTER `featured_meta_format`',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;
