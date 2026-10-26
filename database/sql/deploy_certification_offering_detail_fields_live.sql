-- Learning objectives + who this course is for (matches courses.outcomes / courses.requirements)
-- Run once on live; skip if columns already exist.

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'outcomes');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `outcomes` LONGTEXT NULL COMMENT ''Learning objectives (HTML)'' AFTER `short_description`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'requirements');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `requirements` LONGTEXT NULL COMMENT ''Who this course is for (HTML)'' AFTER `outcomes`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_26_130000_add_certification_offering_detail_fields', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_26_130000_add_certification_offering_detail_fields');
