-- =============================================================================
-- LIVE DEPLOY: FAQ categories + home_page_faqs.faq_category_id
-- After code deploy: php artisan view:clear && php artisan cache:clear
-- =============================================================================

CREATE TABLE IF NOT EXISTS `faq_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `eyebrow` varchar(255) DEFAULT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT 1,
  `order` int NOT NULL DEFAULT 9999999,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_categories_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'home_page_faqs' AND COLUMN_NAME = 'faq_category_id'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE `home_page_faqs` ADD COLUMN `faq_category_id` bigint unsigned NULL AFTER `id`, ADD CONSTRAINT `home_page_faqs_faq_category_id_foreign` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`) ON DELETE SET NULL',
  'SELECT 1'
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Optional starter categories (matches legacy static FAQ page). Safe to re-run: skips if slug exists.
INSERT INTO `faq_categories` (`name`, `slug`, `eyebrow`, `section_title`, `status`, `order`, `created_at`, `updated_at`)
SELECT * FROM (
  SELECT 'Programs' AS name, 'programs' AS slug, 'Programs' AS eyebrow, 'About Our Programs' AS section_title, 1 AS status, 6 AS `order`, NOW(), NOW()
  UNION SELECT 'NCLEX Prep', 'nclex', 'NCLEX Prep', 'NCLEX Questions', 1, 5, NOW(), NOW()
  UNION SELECT 'Remediation', 'remediation', 'FL BON Remediation', 'Remediation Questions', 1, 4, NOW(), NOW()
  UNION SELECT 'Pricing & Enrollment', 'pricing', 'Pricing & Enrollment', 'Cost & Enrollment', 1, 3, NOW(), NOW()
  UNION SELECT 'Tutoring', 'tutoring', 'Tutoring', 'Tutoring Questions', 1, 2, NOW(), NOW()
  UNION SELECT 'General', 'general', 'General', 'General Questions', 1, 1, NOW(), NOW()
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM `faq_categories` c WHERE c.slug = seed.slug LIMIT 1);
