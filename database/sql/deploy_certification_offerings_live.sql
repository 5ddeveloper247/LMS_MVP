-- Certification offerings (admin) + delivery parts (online / in-person blocks)
-- Run once on live. Skip any statement if the table already exists.

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
