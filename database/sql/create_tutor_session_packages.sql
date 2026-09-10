-- =============================================================================
-- LIVE SQL: Tutor session pricing packages (Tutoring page)
-- Date: 2026-09-10
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: creates table only if it does not exist.
-- =============================================================================

CREATE TABLE IF NOT EXISTS `tutor_session_packages` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` VARCHAR(100) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `description` TEXT NULL,
  `price_note` VARCHAR(255) NULL,
  `line_1` VARCHAR(255) NULL,
  `line_2` VARCHAR(255) NULL,
  `line_3` VARCHAR(255) NULL,
  `line_4` VARCHAR(255) NULL,
  `line_5` VARCHAR(255) NULL,
  `sessions_count` INT UNSIGNED NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `popular` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT NOT NULL DEFAULT 0,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Verify
SHOW COLUMNS FROM `tutor_session_packages`;
