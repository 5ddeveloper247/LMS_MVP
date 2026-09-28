-- =============================================================================
-- LIVE SQL: CE Courses — ce_courses, ce_course_reviews, ce_course_enrollments
-- Date: 2026-09-24
-- Run manually on production (migrations are NOT run on live).
-- Safe to re-run: tables use IF NOT EXISTS.
-- =============================================================================

-- -----------------------------------------------------------------------------
-- 1) CE courses catalog
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_courses` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `about` LONGTEXT NULL COMMENT 'Description / About This Course',
  `outcomes` LONGTEXT NULL COMMENT 'Learning Objectives (HTML/list)',
  `requirements` LONGTEXT NULL COMMENT 'Prerequisites (optional)',
  `course_code` VARCHAR(100) NULL COMMENT 'Course / source code',

  `user_id` BIGINT UNSIGNED NOT NULL COMMENT 'Primary instructor → users.id',
  `assistant_instructors` TEXT NULL COMMENT 'JSON array of user IDs',

  `category_id` INT UNSIGNED NULL COMMENT '→ categories.id (same as prep)',
  `lang_id` INT UNSIGNED NULL DEFAULT 19,

  `image` VARCHAR(255) NULL,
  `thumbnail` VARCHAR(255) NULL,
  `trailer_link` VARCHAR(255) NULL,
  `duration` VARCHAR(100) NULL COMMENT 'Display duration e.g. 2 hours',

  `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `discount_price` DECIMAL(10,2) NULL,
  `tax` DECIMAL(10,2) NULL DEFAULT 0.00,

  `what_learn1` TEXT NULL COMMENT 'Optional extra objective line 1',
  `what_learn2` TEXT NULL COMMENT 'Optional extra objective line 2',

  `level` TINYINT UNSIGNED NULL DEFAULT 4,
  `meta_keywords` VARCHAR(255) NULL,
  `meta_description` TEXT NULL,

  `total_enrolled` INT UNSIGNED NOT NULL DEFAULT 0,
  `review_avg` DECIMAL(3,2) NOT NULL DEFAULT 0.00 COMMENT 'Like courses.reveiw',
  `view_count` INT UNSIGNED NOT NULL DEFAULT 0,

  `status` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `publish` TINYINT(1) NOT NULL DEFAULT 1,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `seq_no` INT NULL DEFAULT NULL,

  `contact_hours` DECIMAL(4,1) NOT NULL DEFAULT 0.0 COMMENT 'FL CE contact hours',
  `course_type` ENUM('mandatory','elective') NOT NULL DEFAULT 'elective',
  `audience` JSON NULL COMMENT '["rn","lpn","aprn"]',
  `compliance_topic` VARCHAR(150) NULL COMMENT 'e.g. Human Trafficking, FL Laws & Rules',
  `ce_broker_course_id` VARCHAR(50) NULL COMMENT 'External CE Broker ID if needed',

  `course_id` INT UNSIGNED NULL COMMENT 'Optional FK → courses.id for chapters/lessons',

  `lms_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `created_by` BIGINT UNSIGNED NULL,
  `updated_by` BIGINT UNSIGNED NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `ce_courses_slug_unique` (`slug`),
  UNIQUE KEY `ce_courses_course_code_unique` (`course_code`),
  KEY `ce_courses_user_id_index` (`user_id`),
  KEY `ce_courses_category_id_index` (`category_id`),
  KEY `ce_courses_course_type_index` (`course_type`),
  KEY `ce_courses_status_index` (`status`),
  KEY `ce_courses_course_id_index` (`course_id`),
  KEY `ce_courses_contact_hours_index` (`contact_hours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 2) CE course reviews
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_course_reviews` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ce_course_id` BIGINT UNSIGNED NOT NULL,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `instructor_id` BIGINT UNSIGNED NULL COMMENT 'Primary instructor at review time',
  `star` DECIMAL(2,1) NOT NULL DEFAULT 5.0,
  `comment` TEXT NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,

  PRIMARY KEY (`id`),
  KEY `ce_course_reviews_ce_course_id_index` (`ce_course_id`),
  KEY `ce_course_reviews_user_id_index` (`user_id`),
  UNIQUE KEY `ce_course_reviews_user_course_unique` (`ce_course_id`, `user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 3) CE course enrollments
-- -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ce_course_enrollments` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL COMMENT 'CE user role 10',
  `ce_course_id` BIGINT UNSIGNED NOT NULL,
  `progress` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `status` ENUM('not_started','in_progress','completed') NOT NULL DEFAULT 'not_started',
  `purchase_price` DECIMAL(10,2) NULL,
  `completed_at` TIMESTAMP NULL DEFAULT NULL,
  `certificate_path` VARCHAR(255) NULL,
  `ce_broker_reported_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `ce_enroll_user_course_unique` (`user_id`, `ce_course_id`),
  KEY `ce_course_enrollments_ce_course_id_index` (`ce_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Verify
SHOW TABLES LIKE 'ce_course%';
SHOW COLUMNS FROM `ce_courses`;
