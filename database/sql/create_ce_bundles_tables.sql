-- =============================================================================
-- LIVE SQL: CE bundles + bundle-course pivot tables
-- Safe to re-run (IF NOT EXISTS).
-- Run order: ce_bundles first, then ce_bundle_courses.
-- =============================================================================

CREATE TABLE IF NOT EXISTS `ce_bundles` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `subtitle` varchar(255) DEFAULT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `component_1` varchar(500) NOT NULL,
    `component_2` varchar(500) NOT NULL,
    `component_3` varchar(500) NOT NULL,
    `component_4` varchar(500) NOT NULL,
    `component_5` varchar(500) NOT NULL,
    `component_6` varchar(500) NOT NULL,
    `total_hours` decimal(4,1) NOT NULL DEFAULT 0.0,
    `elective_hours_allowed` decimal(4,1) NOT NULL DEFAULT 0.0,
    `price` decimal(10,2) NOT NULL DEFAULT 0.00,
    `compare_at_price` decimal(10,2) DEFAULT NULL,
    `license_type` enum('rn_lpn','aprn') NOT NULL DEFAULT 'rn_lpn',
    `card_style` enum('primary','secondary') NOT NULL DEFAULT 'primary',
    `is_best_seller` tinyint(1) NOT NULL DEFAULT 0,
    `seq_no` int DEFAULT NULL,
    `status` tinyint(1) NOT NULL DEFAULT 1,
    `publish` tinyint(1) NOT NULL DEFAULT 1,
    `featured` tinyint(1) NOT NULL DEFAULT 0,
    `lms_id` int unsigned NOT NULL DEFAULT 1,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ce_bundles_slug_unique` (`slug`),
    KEY `ce_bundles_license_type_index` (`license_type`),
    KEY `ce_bundles_card_style_index` (`card_style`),
    KEY `ce_bundles_is_best_seller_index` (`is_best_seller`),
    KEY `ce_bundles_status_index` (`status`),
    KEY `ce_bundles_publish_index` (`publish`),
    KEY `ce_bundles_featured_index` (`featured`),
    KEY `ce_bundles_seq_no_index` (`seq_no`),
    KEY `ce_bundles_lms_id_index` (`lms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `ce_bundle_courses` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `ce_bundle_id` bigint unsigned NOT NULL,
    `ce_course_id` bigint unsigned NOT NULL,
    `course_role` enum('mandatory','elective') NOT NULL DEFAULT 'mandatory',
    `sort_order` int NOT NULL DEFAULT 0,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ce_bundle_courses_bundle_course_unique` (`ce_bundle_id`, `ce_course_id`),
    KEY `ce_bundle_courses_ce_bundle_id_index` (`ce_bundle_id`),
    KEY `ce_bundle_courses_ce_course_id_index` (`ce_course_id`),
    KEY `ce_bundle_courses_course_role_index` (`course_role`),
    CONSTRAINT `ce_bundle_courses_ce_bundle_id_foreign`
        FOREIGN KEY (`ce_bundle_id`) REFERENCES `ce_bundles` (`id`) ON DELETE CASCADE,
    CONSTRAINT `ce_bundle_courses_ce_course_id_foreign`
        FOREIGN KEY (`ce_course_id`) REFERENCES `ce_courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
