<?php

return [
    'name' => 'MainCommunity',

    // When false (default), DB tables are used exclusively; demo data only if tables are missing.
    'demo_fallback' => env('MAIN_COMMUNITY_DEMO_FALLBACK', false),

    'recent_discussions_limit' => 10,

    /** LinkedIn-style reaction keys stored in forum_reactions.reaction */
    'reactions' => [
        'like' => ['label' => 'Like', 'emoji' => '👍', 'action_label' => 'Like'],
        'love' => ['label' => 'Love', 'emoji' => '❤️', 'action_label' => 'Love'],
        'celebrate' => ['label' => 'Celebrate', 'emoji' => '🎉', 'action_label' => 'Celebrate'],
        'support' => ['label' => 'Support', 'emoji' => '🙌', 'action_label' => 'Support'],
        'funny' => ['label' => 'Funny', 'emoji' => '😂', 'action_label' => 'Funny'],
    ],
];
