-- forum_reactions.likeable_type was VARCHAR(50); full PHP class names were truncated.
-- Use short morph keys (see MainCommunityServiceProvider morph map).

UPDATE forum_reactions
SET likeable_type = 'forum_topic'
WHERE likeable_type LIKE '%CommunityForumTopic%';

UPDATE forum_reactions
SET likeable_type = 'forum_reply'
WHERE likeable_type LIKE '%CommunityForumRepli%';

-- Optional: widen column for safety
-- ALTER TABLE forum_reactions MODIFY likeable_type VARCHAR(191) NOT NULL;
