-- =============================================================================
-- LIVE SQL: CE Professional — role + ce_professionals profile table
-- Date: 2026-09-23
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: role insert skipped if exists; table uses IF NOT EXISTS.
--
-- Before running: confirm role id 10 is free:
--   SELECT id, name FROM roles ORDER BY id;
-- If 10 is taken, change the INSERT id below and use that role_id in app code.
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1) CE Professional role (role_id = 10)
-- -----------------------------------------------------------------------------
INSERT INTO `roles` (`id`, `name`, `type`, `details`, `created_at`, `updated_at`)
SELECT 10, 'CE Professional', 'System', 'Florida CE portal users', NOW(), NOW()
FROM DUAL
WHERE NOT EXISTS (
  SELECT 1 FROM `roles` WHERE `id` = 10 OR `name` = 'CE Professional'
);

-- -----------------------------------------------------------------------------
-- 2) CE profile table (one row per CE user)
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_professionals` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `fl_license_number` VARCHAR(20) NOT NULL,
  `license_type` ENUM('rn', 'lpn', 'aprn') NOT NULL,
  `aprn_nationally_certified` TINYINT(1) NULL DEFAULT NULL,
  `aprn_autonomous` TINYINT(1) NULL DEFAULT NULL,
  `consent_license_accurate` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_ce_broker_reporting` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_marketing_email` TINYINT(1) NOT NULL DEFAULT 0,
  `renewal_date` DATE NULL DEFAULT NULL,
  `ce_broker_last_synced_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ce_professionals_user_id_unique` (`user_id`),
  KEY `ce_professionals_fl_license_number_index` (`fl_license_number`),
  KEY `ce_professionals_license_type_index` (`license_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Verify
SELECT id, name, type FROM `roles` WHERE `name` = 'CE Professional';
SHOW COLUMNS FROM `ce_professionals`;
