-- Certification checkout (carts + certification_enrollments). Run on tenant DB after catalog migrations.

SET @has_carts := (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'carts');

SET @sql := IF(@has_carts > 0 AND (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'carts' AND column_name = 'certification_offering_id') = 0,
    'ALTER TABLE `carts` ADD COLUMN `certification_offering_id` BIGINT UNSIGNED NULL AFTER `ce_elective_course_ids`, ADD INDEX `carts_cert_offering_idx` (`certification_offering_id`)',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_carts > 0 AND (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'carts' AND column_name = 'certification_offering_option_id') = 0,
    'ALTER TABLE `carts` ADD COLUMN `certification_offering_option_id` BIGINT UNSIGNED NULL AFTER `certification_offering_id`, ADD INDEX `carts_cert_option_idx` (`certification_offering_option_id`)',
    'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := IF(@has_carts > 0 AND (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'carts' AND column_name = 'certification_enrollment_data') = 0,
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
