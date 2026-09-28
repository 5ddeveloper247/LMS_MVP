-- =============================================================================
-- LIVE SQL: CE license types table + default RN/LPN & APRN cards
-- Safe to re-run table creation only if table missing.
-- =============================================================================

CREATE TABLE IF NOT EXISTS `ce_license_types` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `subtitle` varchar(255) DEFAULT NULL,
    `description` text DEFAULT NULL,
    `component_1` varchar(500) NOT NULL,
    `component_2` varchar(500) NOT NULL,
    `component_3` varchar(500) NOT NULL,
    `card_style` enum('teal','terra') NOT NULL DEFAULT 'teal',
    `button_label` varchar(255) DEFAULT NULL,
    `button_url` varchar(500) DEFAULT NULL,
    `anchor_id` varchar(100) DEFAULT NULL,
    `seq_no` int DEFAULT NULL,
    `status` tinyint(1) NOT NULL DEFAULT 1,
    `publish` tinyint(1) NOT NULL DEFAULT 1,
    `featured` tinyint(1) NOT NULL DEFAULT 0,
    `lms_id` int unsigned NOT NULL DEFAULT 1,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `ce_license_types_status_index` (`status`),
    KEY `ce_license_types_publish_index` (`publish`),
    KEY `ce_license_types_seq_no_index` (`seq_no`),
    KEY `ce_license_types_lms_id_index` (`lms_id`),
    KEY `ce_license_types_featured_index` (`featured`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ce_license_types` (
    `name`, `subtitle`, `description`, `component_1`, `component_2`, `component_3`,
    `card_style`, `button_label`, `button_url`, `anchor_id`, `seq_no`, `status`, `publish`, `featured`, `lms_id`, `created_at`, `updated_at`
)
SELECT * FROM (
    SELECT
        'Florida RN & LPN',
        'License Renewal Packages',
        'The Florida Board of Nursing requires RNs and LPNs to complete 26 contact hours every two years.',
        '6 mandatory courses (11 contact hours)',
        '15 hours of clinical electives to reach 26',
        'Auto-reported to CE Broker within 48–72 hours',
        'teal',
        'View RN & LPN Packages',
        'route:continuingEducationRnLpn',
        'rn-lpn-packages',
        1, 1, 1, 1, 1, NOW(), NOW()
    UNION ALL
    SELECT
        'Florida APRN / NP',
        'Prescribing & Renewal Packages',
        'Advanced practice requires advanced compliance. Your renewal path depends on whether you hold an active national certification.',
        'Certified-Exempt path: 5 hours total',
        'Standard full renewal: 27 hours total',
        'Autonomous APRNs: +10 additional hours',
        'terra',
        'View APRN Packages',
        'route:continuingEducationAprn',
        'aprn-packages',
        2, 1, 1, 1, 1, NOW(), NOW()
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM `ce_license_types` LIMIT 1);
