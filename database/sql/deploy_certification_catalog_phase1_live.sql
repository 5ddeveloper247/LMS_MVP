-- Phase 1: certification groups, catalog columns, pricing options
-- Run once on live after base certification_offerings tables exist.

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

-- Add columns to certification_offerings (skip any line if that column already exists)

ALTER TABLE `certification_offerings`
    ADD COLUMN `certification_group_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `slug`;

ALTER TABLE `certification_offerings`
    ADD COLUMN `short_description` TEXT NULL DEFAULT NULL AFTER `certification_group_id`;

ALTER TABLE `certification_offerings`
    ADD COLUMN `format_label` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Card line e.g. In-person + skills check' AFTER `short_description`;

ALTER TABLE `certification_offerings`
    ADD COLUMN `ce_hours` DECIMAL(5,2) NULL DEFAULT NULL AFTER `format_label`;

ALTER TABLE `certification_offerings`
    ADD COLUMN `ce_note` VARCHAR(255) NULL DEFAULT NULL AFTER `ce_hours`;

ALTER TABLE `certification_offerings`
    ADD KEY `cert_offerings_group_idx` (`certification_group_id`);

-- Foreign key (skip if already exists)
SET @fk_exists := (
    SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE()
      AND TABLE_NAME = 'certification_offerings'
      AND CONSTRAINT_NAME = 'cert_offerings_group_fk'
);
SET @sql := IF(@fk_exists = 0,
    'ALTER TABLE `certification_offerings` ADD CONSTRAINT `cert_offerings_group_fk` FOREIGN KEY (`certification_group_id`) REFERENCES `certification_groups` (`id`) ON DELETE SET NULL',
    'SELECT 1');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

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
