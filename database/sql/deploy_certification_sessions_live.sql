-- Certification training sessions (per offering). Run on tenant DB after offerings/options exist.

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
WHERE NOT EXISTS (
    SELECT 1 FROM `migrations`
    WHERE `migration` = '2026_10_26_140000_create_certification_offering_sessions_table'
);
