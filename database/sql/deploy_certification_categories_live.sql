-- Certification categories (enroll hub pills: ACLS, BLS, …)
-- Run after certification_offerings exists. Skip statements that already applied.

CREATE TABLE IF NOT EXISTS `certification_categories` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(255) NOT NULL,
    `status` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
    `sort_order` INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `certification_categories_slug_unique` (`slug`),
    KEY `certification_categories_status_sort_idx` (`status`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `certification_categories` (`name`, `slug`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
('ACLS', 'acls', 1, 1, NOW(), NOW()),
('BLS', 'bls', 1, 2, NOW(), NOW()),
('PALS', 'pals', 1, 3, NOW(), NOW()),
('CPR & First Aid', 'cpr-first-aid', 1, 4, NOW(), NOW()),
('IV Therapy', 'iv-therapy', 1, 5, NOW(), NOW()),
('HEDIS', 'hedis', 1, 6, NOW(), NOW()),
('Skills Check', 'skills-check', 1, 7, NOW(), NOW());

ALTER TABLE `certification_offerings`
    ADD COLUMN `certification_category_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `certification_group_id`;

ALTER TABLE `certification_offerings`
    ADD KEY `cert_offerings_category_idx` (`certification_category_id`);

SET @fk_cat_exists := (
    SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE()
      AND TABLE_NAME = 'certification_offerings'
      AND CONSTRAINT_NAME = 'cert_offerings_category_fk'
);
SET @sql_cat := IF(@fk_cat_exists = 0,
    'ALTER TABLE `certification_offerings` ADD CONSTRAINT `cert_offerings_category_fk` FOREIGN KEY (`certification_category_id`) REFERENCES `certification_categories` (`id`) ON DELETE SET NULL',
    'SELECT 1');
PREPARE stmt_cat FROM @sql_cat;
EXECUTE stmt_cat;
DEALLOCATE PREPARE stmt_cat;

-- Optional: map legacy mark column then drop (skip if mark never existed)
UPDATE `certification_offerings` o
INNER JOIN `certification_categories` c ON c.slug = 'bls'
SET o.`certification_category_id` = c.id
WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) = 'bls';

UPDATE `certification_offerings` o
INNER JOIN `certification_categories` c ON c.slug = 'acls'
SET o.`certification_category_id` = c.id
WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) = 'acls';

ALTER TABLE `certification_offerings` DROP COLUMN `mark`;
