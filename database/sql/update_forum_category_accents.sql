-- forum_categories.accent_color must be CSS class tokens: NULL/'' (default green), 'accent' (terracotta), 'dark' (dark teal)
-- Not hex colors — see Community_forum/index.blade.php .cat-card rules

UPDATE forum_categories SET accent_color = NULL WHERE slug IN ('nclex-prep', 'nursing-school', 'general-discussion');
UPDATE forum_categories SET accent_color = 'accent' WHERE slug IN ('fl-bon-remediation', 'comeback-corner');
UPDATE forum_categories SET accent_color = 'dark' WHERE slug = 'resource-sharing';
