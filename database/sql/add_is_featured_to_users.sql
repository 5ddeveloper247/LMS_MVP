-- Featured instructors for Our Team page (max 3 enforced in app).
-- Safe to re-run: skips if column already exists (MySQL 8+ / MariaDB with IF NOT EXISTS).

ALTER TABLE `users`
    ADD COLUMN IF NOT EXISTS `is_featured` TINYINT(1) NOT NULL DEFAULT 0 AFTER `total_hours`;
