-- Programs page listing content fields (what it's for, etc.)

SET @db := DATABASE();

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'what_its_for') = 0,
  'ALTER TABLE `programs` ADD COLUMN `what_its_for` longtext NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'what_makes_different') = 0,
  'ALTER TABLE `programs` ADD COLUMN `what_makes_different` longtext NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'what_you_will_learn') = 0,
  'ALTER TABLE `programs` ADD COLUMN `what_you_will_learn` longtext NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'signature_features') = 0,
  'ALTER TABLE `programs` ADD COLUMN `signature_features` longtext NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(
  (SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = @db AND TABLE_NAME = 'programs' AND COLUMN_NAME = 'programs_page_eyebrow') = 0,
  'ALTER TABLE `programs` ADD COLUMN `programs_page_eyebrow` varchar(255) NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;
