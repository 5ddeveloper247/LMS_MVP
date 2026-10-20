-- Shop: soft vs hard format for Books and Journals (type = 2)
-- Run once on live DB (adjust if column already exists).

ALTER TABLE `shop_products`
    ADD COLUMN `book_format` ENUM('soft', 'hard') NULL DEFAULT NULL AFTER `type`;

UPDATE `shop_products`
SET `book_format` = CASE
    WHEN `book_pdf` IS NOT NULL AND `book_pdf` != '' THEN 'soft'
    ELSE 'hard'
END
WHERE `type` = 2 AND (`book_format` IS NULL OR `book_format` = '');
