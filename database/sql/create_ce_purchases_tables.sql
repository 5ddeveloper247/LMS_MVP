-- =============================================================================
-- LIVE SQL: CE purchases + bundle line items + enrollment/cart links
-- Date: 2026-09-30
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: IF NOT EXISTS / information_schema checks.
-- Prerequisites: ce_courses, ce_bundles, ce_course_enrollments, carts
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1) CE purchases (admin listing: individual course or bundle)
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_purchases` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tracking` VARCHAR(50) NOT NULL COMMENT 'Links to checkouts.tracking',
  `checkout_id` INT UNSIGNED NULL COMMENT '→ checkouts.id',
  `user_id` BIGINT UNSIGNED NOT NULL COMMENT 'Buyer (CE Professional)',
  `item_type` ENUM('course','bundle') NOT NULL,
  `ce_course_id` BIGINT UNSIGNED NULL COMMENT 'When item_type = course',
  `ce_bundle_id` BIGINT UNSIGNED NULL COMMENT 'When item_type = bundle',
  `item_name` VARCHAR(255) NOT NULL COMMENT 'Snapshot at purchase time',
  `license_type` ENUM('rn_lpn','aprn') NULL COMMENT 'Bundle snapshot',
  `contact_hours` DECIMAL(4,1) NULL COMMENT 'Course line hours',
  `total_hours` DECIMAL(4,1) NULL COMMENT 'Bundle snapshot',
  `elective_hours_allowed` DECIMAL(4,1) NULL COMMENT 'Bundle snapshot',
  `unit_price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `total_paid` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `coupon_code` VARCHAR(50) NULL,
  `payment_status` ENUM('pending','paid','failed','refunded','cancelled') NOT NULL DEFAULT 'pending',
  `payment_method` VARCHAR(50) NULL,
  `gateway_transaction_id` VARCHAR(100) NULL,
  `lms_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `purchased_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ce_purchases_tracking_index` (`tracking`),
  KEY `ce_purchases_checkout_id_index` (`checkout_id`),
  KEY `ce_purchases_user_id_index` (`user_id`),
  KEY `ce_purchases_item_type_index` (`item_type`),
  KEY `ce_purchases_payment_status_index` (`payment_status`),
  KEY `ce_purchases_ce_course_id_index` (`ce_course_id`),
  KEY `ce_purchases_ce_bundle_id_index` (`ce_bundle_id`),
  KEY `ce_purchases_lms_id_index` (`lms_id`),
  KEY `ce_purchases_purchased_at_index` (`purchased_at`),
  CONSTRAINT `ce_purchases_ce_course_id_foreign`
    FOREIGN KEY (`ce_course_id`) REFERENCES `ce_courses` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `ce_purchases_ce_bundle_id_foreign`
    FOREIGN KEY (`ce_bundle_id`) REFERENCES `ce_bundles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 2) CE purchase items (courses inside a bundle purchase)
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_purchase_items` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ce_purchase_id` BIGINT UNSIGNED NOT NULL,
  `ce_course_id` BIGINT UNSIGNED NOT NULL,
  `course_title` VARCHAR(255) NOT NULL,
  `contact_hours` DECIMAL(4,1) NOT NULL DEFAULT 0.0,
  `course_role` ENUM('mandatory','elective') NOT NULL DEFAULT 'mandatory',
  `sort_order` INT NOT NULL DEFAULT 0,
  `ce_course_enrollment_id` BIGINT UNSIGNED NULL COMMENT 'Set after fulfillment',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ce_purchase_items_purchase_id_index` (`ce_purchase_id`),
  KEY `ce_purchase_items_course_id_index` (`ce_course_id`),
  KEY `ce_purchase_items_enrollment_id_index` (`ce_course_enrollment_id`),
  CONSTRAINT `ce_purchase_items_purchase_fk`
    FOREIGN KEY (`ce_purchase_id`) REFERENCES `ce_purchases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ce_purchase_items_course_fk`
    FOREIGN KEY (`ce_course_id`) REFERENCES `ce_courses` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 3) Extend ce_course_enrollments (link to purchase)
-- -----------------------------------------------------------------------------
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'ce_course_enrollments'
    AND COLUMN_NAME = 'ce_purchase_id'
);
SET @sql := IF(
  @col_exists = 0,
  'ALTER TABLE `ce_course_enrollments`
    ADD COLUMN `ce_purchase_id` BIGINT UNSIGNED NULL AFTER `ce_course_id`,
    ADD COLUMN `ce_purchase_item_id` BIGINT UNSIGNED NULL AFTER `ce_purchase_id`,
    ADD COLUMN `source` ENUM(''direct'',''bundle'') NOT NULL DEFAULT ''direct'' AFTER `ce_purchase_item_id`,
    ADD KEY `ce_course_enrollments_purchase_id_index` (`ce_purchase_id`),
    ADD KEY `ce_course_enrollments_purchase_item_id_index` (`ce_purchase_item_id`)',
  'SELECT ''ce_course_enrollments purchase columns already exist'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- -----------------------------------------------------------------------------
-- 4) Extend carts (CE checkout lines)
-- -----------------------------------------------------------------------------
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'carts'
    AND COLUMN_NAME = 'ce_course_id'
);
SET @sql := IF(
  @col_exists = 0 AND EXISTS(
    SELECT 1 FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts'
  ),
  'ALTER TABLE `carts`
    ADD COLUMN `ce_course_id` BIGINT UNSIGNED NULL AFTER `shop_bundle_id`,
    ADD COLUMN `ce_bundle_id` BIGINT UNSIGNED NULL AFTER `ce_course_id`,
    ADD KEY `carts_ce_course_id_index` (`ce_course_id`),
    ADD KEY `carts_ce_bundle_id_index` (`ce_bundle_id`)',
  'SELECT ''carts CE columns already exist or carts table missing'' AS message'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Fallback if shop_bundle_id column does not exist on carts
SET @shop_bundle_col := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'carts'
    AND COLUMN_NAME = 'shop_bundle_id'
);
SET @ce_course_col := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'carts'
    AND COLUMN_NAME = 'ce_course_id'
);
SET @sql := IF(
  @shop_bundle_col = 0 AND @ce_course_col = 0 AND EXISTS(
    SELECT 1 FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'carts'
  ),
  'ALTER TABLE `carts`
    ADD COLUMN `ce_course_id` BIGINT UNSIGNED NULL,
    ADD COLUMN `ce_bundle_id` BIGINT UNSIGNED NULL,
    ADD KEY `carts_ce_course_id_index` (`ce_course_id`),
    ADD KEY `carts_ce_bundle_id_index` (`ce_bundle_id`)',
  'SELECT 1'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verify
SHOW TABLES LIKE 'ce_purchase%';
SHOW COLUMNS FROM `ce_purchases`;
SHOW COLUMNS FROM `ce_purchase_items`;
SHOW COLUMNS FROM `ce_course_enrollments` LIKE 'ce_purchase%';
SHOW COLUMNS FROM `ce_course_enrollments` LIKE 'source';
SHOW COLUMNS FROM `carts` LIKE 'ce_%';
