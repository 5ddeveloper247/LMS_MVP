-- =============================================================================
-- Life Support Certifications — FULL live deploy (no php artisan migrate)
-- Commit: certification module (hub, admin catalog, checkout)
-- Safe to re-run: uses IF NOT EXISTS / information_schema checks where possible.
-- Run on the tenant LMS database (USE your_db;).
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1) Base tables: offerings + delivery parts
-- -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `certification_offerings` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(255) NOT NULL,
    `content` LONGTEXT NOT NULL,
    `delivery_mode` ENUM('in_person', 'online', 'hybrid') NOT NULL DEFAULT 'in_person',
    `duration_summary` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Optional overall label for admin/list',
    `status` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
    `sort_order` INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    `deleted_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `certification_offerings_slug_unique` (`slug`),
    KEY `certification_offerings_status_sort_idx` (`status`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `certification_offering_delivery_parts` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `certification_offering_id` BIGINT UNSIGNED NOT NULL,
    `part_type` ENUM('online', 'in_person') NOT NULL,
    `duration` VARCHAR(100) NOT NULL,
    `session_label` VARCHAR(255) NULL DEFAULT NULL,
    `notes` TEXT NULL DEFAULT NULL,
    `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `cert_delivery_parts_offering_sort_idx` (`certification_offering_id`, `sort_order`),
    CONSTRAINT `cert_delivery_parts_offering_fk`
        FOREIGN KEY (`certification_offering_id`)
        REFERENCES `certification_offerings` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 2) Catalog: groups + offering columns + pricing options
-- -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `certification_groups` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(255) NOT NULL,
    `status` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
    `sort_order` INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `certification_groups_slug_unique` (`slug`),
    KEY `certification_groups_status_sort_idx` (`status`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'certification_group_id');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `certification_group_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `slug`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'mark');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `mark` VARCHAR(100) NULL DEFAULT NULL COMMENT ''Legacy badge; migrated to category'' AFTER `certification_group_id`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'short_description');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `short_description` TEXT NULL DEFAULT NULL AFTER `mark`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'format_label');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `format_label` VARCHAR(255) NULL DEFAULT NULL COMMENT ''Card line e.g. In-person + skills check'' AFTER `short_description`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'ce_hours');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `ce_hours` DECIMAL(5,2) NULL DEFAULT NULL AFTER `format_label`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'ce_note');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `ce_note` VARCHAR(255) NULL DEFAULT NULL AFTER `ce_hours`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @idx := (SELECT COUNT(*) FROM information_schema.STATISTICS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND INDEX_NAME = 'cert_offerings_group_idx');
SET @sql := IF(@idx = 0,
    'ALTER TABLE `certification_offerings` ADD KEY `cert_offerings_group_idx` (`certification_group_id`)',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @fk := (SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND CONSTRAINT_NAME = 'cert_offerings_group_fk');
SET @sql := IF(@fk = 0,
    'ALTER TABLE `certification_offerings` ADD CONSTRAINT `cert_offerings_group_fk` FOREIGN KEY (`certification_group_id`) REFERENCES `certification_groups` (`id`) ON DELETE SET NULL',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

CREATE TABLE IF NOT EXISTS `certification_offering_options` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `certification_offering_id` BIGINT UNSIGNED NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `subtitle` VARCHAR(255) NULL DEFAULT NULL,
    `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `product_code` VARCHAR(100) NULL DEFAULT NULL,
    `sort_order` TINYINT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `cert_offering_options_sort_idx` (`certification_offering_id`, `sort_order`),
    CONSTRAINT `cert_offering_options_offering_fk`
        FOREIGN KEY (`certification_offering_id`)
        REFERENCES `certification_offerings` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `certification_groups` (`name`, `slug`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
('Life Support Certifications', 'life-support', 1, 1, NOW(), NOW()),
('Clinical Skills & Quality', 'clinical-quality', 1, 2, NOW(), NOW()),
('Skills & Specialty', 'skills-specialty', 1, 3, NOW(), NOW());

-- -----------------------------------------------------------------------------
-- 3) Categories (hub pills) + category_id on offerings; drop legacy mark
-- -----------------------------------------------------------------------------

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

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'certification_category_id');
SET @sql := IF(@col = 0,
    'ALTER TABLE `certification_offerings` ADD COLUMN `certification_category_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `certification_group_id`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @idx := (SELECT COUNT(*) FROM information_schema.STATISTICS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND INDEX_NAME = 'cert_offerings_category_idx');
SET @sql := IF(@idx = 0,
    'ALTER TABLE `certification_offerings` ADD KEY `cert_offerings_category_idx` (`certification_category_id`)',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @fk := (SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND CONSTRAINT_NAME = 'cert_offerings_category_fk');
SET @sql := IF(@fk = 0,
    'ALTER TABLE `certification_offerings` ADD CONSTRAINT `cert_offerings_category_fk` FOREIGN KEY (`certification_category_id`) REFERENCES `certification_categories` (`id`) ON DELETE SET NULL',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- Map legacy mark → category (only if mark column still exists)
SET @has_mark := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'certification_offerings' AND COLUMN_NAME = 'mark');

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''acls'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''acls'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''bls'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''bls'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''pals'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''pals'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''cpr-first-aid'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''cpr & first aid'', ''cpr and first aid'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''iv-therapy'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''iv therapy'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''hedis'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''hedis'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'UPDATE `certification_offerings` o INNER JOIN `certification_categories` c ON c.slug = ''skills-check'' SET o.`certification_category_id` = c.id WHERE o.`certification_category_id` IS NULL AND LOWER(TRIM(o.`mark`)) IN (''skills check'')',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_mark > 0,
    'ALTER TABLE `certification_offerings` DROP COLUMN `mark`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- If short_description was added AFTER mark and mark was dropped, column order is fine; no action needed.

-- -----------------------------------------------------------------------------
-- 4) Checkout: carts columns + certification_enrollments
-- -----------------------------------------------------------------------------

SET @has_carts := (SELECT COUNT(*) FROM information_schema.tables
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts');

SET @has_ce_col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts' AND COLUMN_NAME = 'ce_elective_course_ids');

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts' AND COLUMN_NAME = 'certification_offering_id');
SET @sql := IF(@has_carts > 0 AND @col = 0 AND @has_ce_col > 0,
    'ALTER TABLE `carts` ADD COLUMN `certification_offering_id` BIGINT UNSIGNED NULL AFTER `ce_elective_course_ids`, ADD INDEX `carts_cert_offering_idx` (`certification_offering_id`)',
    IF(@has_carts > 0 AND @col = 0,
        'ALTER TABLE `carts` ADD COLUMN `certification_offering_id` BIGINT UNSIGNED NULL, ADD INDEX `carts_cert_offering_idx` (`certification_offering_id`)',
        'SELECT 1'));
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts' AND COLUMN_NAME = 'certification_offering_option_id');
SET @sql := IF(@has_carts > 0 AND @col = 0,
    'ALTER TABLE `carts` ADD COLUMN `certification_offering_option_id` BIGINT UNSIGNED NULL AFTER `certification_offering_id`, ADD INDEX `carts_cert_option_idx` (`certification_offering_option_id`)',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @col := (SELECT COUNT(*) FROM information_schema.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts' AND COLUMN_NAME = 'certification_enrollment_data');
SET @sql := IF(@has_carts > 0 AND @col = 0,
    'ALTER TABLE `carts` ADD COLUMN `certification_enrollment_data` JSON NULL AFTER `certification_offering_option_id`',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

CREATE TABLE IF NOT EXISTS `certification_enrollments` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `tracking` VARCHAR(64) NOT NULL,
    `checkout_id` BIGINT UNSIGNED NULL,
    `user_id` BIGINT UNSIGNED NOT NULL,
    `certification_offering_id` BIGINT UNSIGNED NOT NULL,
    `certification_offering_option_id` BIGINT UNSIGNED NOT NULL,
    `option_title` VARCHAR(150) NOT NULL,
    `unit_price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `discount_amount` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `total_paid` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `payment_status` VARCHAR(32) NOT NULL DEFAULT 'pending',
    `payment_method` VARCHAR(64) NULL,
    `gateway_transaction_id` VARCHAR(191) NULL,
    `enrollment_data` JSON NULL,
    `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=pending, 1=confirmed',
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    PRIMARY KEY (`id`),
    KEY `cert_enroll_tracking_idx` (`tracking`),
    KEY `cert_enroll_checkout_idx` (`checkout_id`),
    KEY `cert_enroll_user_idx` (`user_id`),
    KEY `cert_enroll_offering_idx` (`certification_offering_id`),
    KEY `cert_enroll_option_idx` (`certification_offering_option_id`),
    CONSTRAINT `cert_enroll_offering_fk` FOREIGN KEY (`certification_offering_id`) REFERENCES `certification_offerings` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `cert_enroll_option_fk` FOREIGN KEY (`certification_offering_option_id`) REFERENCES `certification_offering_options` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 5) Admin sidebar permissions (Life Support Certificates)
-- Change parent id 9930 if that id is already used on live.
-- -----------------------------------------------------------------------------

INSERT INTO `permissions` (
    `id`, `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    9930, 9930, NULL,
    '{"en":"Life Support Certificates","es":""}',
    'life-support-certification',
    1, 1, 1, 1, NOW(), NOW(), 1, 1, NULL, 0, 'fas fa-heartbeat', '1',
    'Life Support Certificates', 1, NULL, 47, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'life-support-certification'
);

UPDATE `permissions`
SET
    `parent_route` = 'life-support-certification',
    `old_parent_route` = 'life-support-certification',
    `parent_id` = 9930,
    `module_id` = 9930,
    `name` = '{"en":"Certificate","es":""}',
    `old_name` = 'Certificate',
    `type` = 2,
    `position` = 1,
    `module` = NULL,
    `updated_at` = NOW()
WHERE `route` = 'certificationOfferings.index';

INSERT INTO `permissions` (
    `module_id`, `parent_id`, `name`, `route`, `status`, `created_by`, `updated_by`, `type`,
    `created_at`, `updated_at`, `lms_id`, `backend`, `parent_route`, `ecommerce`, `icon`, `menu_status`,
    `old_name`, `old_type`, `old_parent_route`, `position`, `section_id`
)
SELECT
    9930, 9930,
    '{"en":"Certificate","es":""}',
    'certificationOfferings.index',
    1, 1, 1, 2, NOW(), NOW(), 1, 1, 'life-support-certification', 0, 'fas fa-th', '1',
    'Certificate', 2, 'life-support-certification', 1, '1'
FROM DUAL
WHERE NOT EXISTS (
    SELECT 1 FROM `permissions` WHERE `route` = 'certificationOfferings.index'
);

UPDATE `permissions`
SET `name` = '{"en":"Life Support Certificates","es":""}',
    `old_name` = 'Life Support Certificates',
    `module` = NULL,
    `updated_at` = NOW()
WHERE `route` = 'life-support-certification';

INSERT INTO `role_permission` (`permission_id`, `role_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `lms_id`)
SELECT p.id, r.role_id, 1, 1, 1, NOW(), NOW(), 1
FROM `permissions` p
CROSS JOIN (SELECT 1 AS role_id UNION ALL SELECT 14) r
WHERE p.route IN ('life-support-certification', 'certificationOfferings.index')
  AND NOT EXISTS (
      SELECT 1 FROM `role_permission` rp
      WHERE rp.permission_id = p.id AND rp.role_id = r.role_id
  );

-- -----------------------------------------------------------------------------
-- 6) Optional: record migrations so future artisan migrate skips these
-- Replace 999 with your next batch number.
-- -----------------------------------------------------------------------------

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_22_100000_create_certification_offerings_tables', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_22_100000_create_certification_offerings_tables');

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_22_110000_add_certification_offerings_permission', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_22_110000_add_certification_offerings_permission');

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_26_100000_add_certification_catalog_phase1', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_26_100000_add_certification_catalog_phase1');

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_26_110000_add_certification_categories', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_26_110000_add_certification_categories');

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_26_120000_certification_checkout', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_26_120000_certification_checkout');

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_22_120000_add_life_support_certification_sidebar_permissions', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_22_120000_add_life_support_certification_sidebar_permissions');

-- -----------------------------------------------------------------------------
-- Training sessions (per certification offering)
-- -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `certification_offering_sessions` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `certification_offering_id` BIGINT UNSIGNED NOT NULL,
    `certification_offering_option_id` BIGINT UNSIGNED NULL DEFAULT NULL,
    `starts_at` DATETIME NOT NULL,
    `ends_at` DATETIME NULL DEFAULT NULL,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NULL DEFAULT NULL,
    `location` VARCHAR(255) NULL DEFAULT NULL,
    `capacity` INT UNSIGNED NULL DEFAULT NULL,
    `status` TINYINT UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
    `sort_order` INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `cert_sessions_offering_book_idx` (`certification_offering_id`, `status`, `starts_at`),
    KEY `cert_sessions_option_idx` (`certification_offering_option_id`),
    CONSTRAINT `cert_sessions_offering_fk`
        FOREIGN KEY (`certification_offering_id`)
        REFERENCES `certification_offerings` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `cert_sessions_option_fk`
        FOREIGN KEY (`certification_offering_option_id`)
        REFERENCES `certification_offering_options` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`)
SELECT '2026_10_26_140000_create_certification_offering_sessions_table', 999 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `migrations` WHERE `migration` = '2026_10_26_140000_create_certification_offering_sessions_table');

-- Done. Clear app cache / permission cache on server after running this script.
