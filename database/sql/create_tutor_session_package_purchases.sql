-- LIVE SQL: tutor session package purchases + optional link on tutor_hirings
-- Run on beta/live if artisan migrate is not used.

CREATE TABLE IF NOT EXISTS `tutor_session_package_purchases` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `package_id` BIGINT UNSIGNED NOT NULL,
  `package_name` VARCHAR(150) NULL,
  `sessions_allowed` INT UNSIGNED NOT NULL,
  `sessions_used` INT UNSIGNED NOT NULL DEFAULT 0,
  `price` DECIMAL(10,2) NOT NULL,
  `tracking_id` VARCHAR(191) NULL,
  `payment_method` VARCHAR(50) NOT NULL DEFAULT 'authorizeNet',
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `selected_sessions` JSON NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tspp_user_status` (`user_id`, `status`),
  KEY `tspp_package_id` (`package_id`),
  KEY `tspp_tracking_id` (`tracking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: link hirings to a package purchase (safe if column already exists)
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'tutor_hirings'
    AND COLUMN_NAME = 'package_purchase_id'
);
SET @sql := IF(
  @col_exists = 0 AND EXISTS(
    SELECT 1 FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tutor_hirings'
  ),
  'ALTER TABLE `tutor_hirings` ADD COLUMN `package_purchase_id` BIGINT UNSIGNED NULL AFTER `tracking_id`, ADD INDEX `tutor_hirings_package_purchase_id_index` (`package_purchase_id`)',
  'SELECT 1'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SHOW COLUMNS FROM `tutor_session_package_purchases`;
