<?php

namespace Modules\MainCommunity\Services;

class ForumDemoData
{
    public static function categories(): array
    {
        return [
            'nclex-prep' => [
                'slug' => 'nclex-prep',
                'name' => 'NCLEX Prep',
                'description' => 'Study strategy, content questions, test-day prep, and wins.',
                'accent' => '',
                'topics_count' => 342,
                'replies_count' => '1.8K',
            ],
            'fl-bon-remediation' => [
                'slug' => 'fl-bon-remediation',
                'name' => 'FL BON Remediation',
                'description' => 'Process questions, coursework discussion, documentation help.',
                'accent' => 'accent',
                'topics_count' => 89,
                'replies_count' => '412',
            ],
            'nursing-school' => [
                'slug' => 'nursing-school',
                'name' => 'Nursing School',
                'description' => 'Subject-specific study help, exam prep, academic strategy.',
                'accent' => '',
                'topics_count' => 156,
                'replies_count' => '623',
            ],
            'comeback-corner' => [
                'slug' => 'comeback-corner',
                'name' => 'Comeback Corner',
                'description' => 'For repeat test-takers and re-entry students. Share your story.',
                'accent' => 'accent',
                'topics_count' => 78,
                'replies_count' => '891',
            ],
            'resource-sharing' => [
                'slug' => 'resource-sharing',
                'name' => 'Resource Sharing',
                'description' => 'Study guides, mnemonics, question breakdowns, and tools.',
                'accent' => 'dark',
                'topics_count' => 203,
                'replies_count' => '567',
            ],
            'general-discussion' => [
                'slug' => 'general-discussion',
                'name' => 'General Discussion',
                'description' => 'Introductions, off-topic, events, and community updates.',
                'accent' => '',
                'topics_count' => 124,
                'replies_count' => '389',
            ],
        ];
    }

    public static function category(string $slug): ?array
    {
        $categories = self::categories();

        return $categories[$slug] ?? null;
    }

    public static function topicsForCategory(string $slug): array
    {
        $all = [
            'nclex-prep' => [
                [
                    'id' => 1,
                    'title' => 'NCLEX Question Breakdown: Prioritization with Unstable Patients',
                    'excerpt' => 'Walk through how to approach prioritization items when multiple patients look critical.',
                    'author' => 'Paula Martin',
                    'role_label' => 'Instructor Post',
                    'avatar' => 'PM',
                    'avatar_class' => 'a3',
                    'replies' => 18,
                    'views' => 240,
                    'time' => '2h ago',
                ],
                [
                    'id' => 2,
                    'title' => 'How do you approach delegation questions?',
                    'excerpt' => 'Looking for a systematic way to handle RN/LPN/UAP delegation scenarios on practice exams.',
                    'author' => 'K. Lewis',
                    'role_label' => 'NCLEX Coaching Cohort',
                    'avatar' => 'KL',
                    'avatar_class' => 'a1',
                    'replies' => 12,
                    'views' => 186,
                    'time' => '3h ago',
                ],
                [
                    'id' => 3,
                    'title' => 'This Week\'s Question Breakdown: SATA on Infection Control',
                    'excerpt' => 'Select-all-that-apply practice with infection control and isolation precautions.',
                    'author' => 'Paula Martin',
                    'role_label' => 'Instructor Post',
                    'avatar' => 'PM',
                    'avatar_class' => 'a3',
                    'replies' => 31,
                    'views' => 412,
                    'time' => '2d ago',
                ],
                [
                    'id' => 4,
                    'title' => 'Pharmacology mnemonics that actually stick for NCLEX',
                    'excerpt' => 'Share the mnemonic systems that helped you retain high-yield drug classes.',
                    'author' => 'T. Jackson',
                    'role_label' => 'Nursing School Program',
                    'avatar' => 'TJ',
                    'avatar_class' => 'a2',
                    'replies' => 9,
                    'views' => 155,
                    'time' => '3d ago',
                ],
            ],
            'fl-bon-remediation' => [
                [
                    'id' => 5,
                    'title' => 'FL BON remediation — what to expect at the hearing',
                    'excerpt' => 'What documents to bring, how to prepare, and what the board usually asks.',
                    'author' => 'D. Nguyen',
                    'role_label' => 'Remediation Program',
                    'avatar' => 'DN',
                    'avatar_class' => 'a1',
                    'replies' => 15,
                    'views' => 298,
                    'time' => '1d ago',
                ],
                [
                    'id' => 6,
                    'title' => 'Coursework hours documentation tips',
                    'excerpt' => 'How others are organizing CE and remediation hours before submission.',
                    'author' => 'A. Smith',
                    'role_label' => 'Remediation Program',
                    'avatar' => 'AS',
                    'avatar_class' => 'a5',
                    'replies' => 7,
                    'views' => 120,
                    'time' => '4d ago',
                ],
            ],
            'nursing-school' => [
                [
                    'id' => 7,
                    'title' => 'Study group forming — Med-Surg final prep (May 15-20)',
                    'excerpt' => 'Looking for accountability partners for Med-Surg finals next week.',
                    'author' => 'A. Smith',
                    'role_label' => 'Nursing School Program',
                    'avatar' => 'AS',
                    'avatar_class' => 'a5',
                    'replies' => 6,
                    'views' => 88,
                    'time' => '1d ago',
                ],
                [
                    'id' => 8,
                    'title' => 'Pathophysiology review strategies that worked for me',
                    'excerpt' => 'How I mapped concepts instead of memorizing every pathway.',
                    'author' => 'K. Lewis',
                    'role_label' => 'Nursing School Program',
                    'avatar' => 'KL',
                    'avatar_class' => 'a1',
                    'replies' => 11,
                    'views' => 174,
                    'time' => '5d ago',
                ],
            ],
            'comeback-corner' => [
                [
                    'id' => 9,
                    'title' => 'Just passed on attempt #3! Here\'s what I changed.',
                    'excerpt' => 'What shifted between attempt 2 and 3 — study plan, mindset, and practice style.',
                    'author' => 'M. Rodriguez',
                    'role_label' => 'Alumni',
                    'avatar' => 'MR',
                    'avatar_class' => 'a4',
                    'replies' => 24,
                    'views' => 520,
                    'time' => '5h ago',
                ],
                [
                    'id' => 10,
                    'title' => 'Returning after a long break — where should I start?',
                    'excerpt' => 'Been out of school for a while and need a realistic restart plan.',
                    'author' => 'T. Jackson',
                    'role_label' => 'Comeback Student',
                    'avatar' => 'TJ',
                    'avatar_class' => 'a2',
                    'replies' => 14,
                    'views' => 210,
                    'time' => '2d ago',
                ],
            ],
            'resource-sharing' => [
                [
                    'id' => 11,
                    'title' => 'Pharmacology mnemonics that actually work — my collection',
                    'excerpt' => 'A shared list of mnemonics for cardiac, psych, and antibiotics.',
                    'author' => 'T. Jackson',
                    'role_label' => 'Nursing School Program',
                    'avatar' => 'TJ',
                    'avatar_class' => 'a2',
                    'replies' => 8,
                    'views' => 260,
                    'time' => '8h ago',
                ],
                [
                    'id' => 12,
                    'title' => 'Free question banks worth your time',
                    'excerpt' => 'Which free resources are actually close to exam style?',
                    'author' => 'Paula Martin',
                    'role_label' => 'Instructor Post',
                    'avatar' => 'PM',
                    'avatar_class' => 'a3',
                    'replies' => 19,
                    'views' => 333,
                    'time' => '3d ago',
                ],
            ],
            'general-discussion' => [
                [
                    'id' => 13,
                    'title' => 'Introduce yourself — new members thread',
                    'excerpt' => 'Say hi, share your program, and what you\'re working toward this month.',
                    'author' => 'Paula Martin',
                    'role_label' => 'Instructor Post',
                    'avatar' => 'PM',
                    'avatar_class' => 'a3',
                    'replies' => 42,
                    'views' => 610,
                    'time' => '1w ago',
                ],
                [
                    'id' => 14,
                    'title' => 'Community meetup ideas for this quarter',
                    'excerpt' => 'Virtual study nights, mentor hours, or Q&A — what would you join?',
                    'author' => 'K. Lewis',
                    'role_label' => 'NCLEX Coaching Cohort',
                    'avatar' => 'KL',
                    'avatar_class' => 'a1',
                    'replies' => 5,
                    'views' => 97,
                    'time' => '4d ago',
                ],
            ],
        ];

        return $all[$slug] ?? [];
    }

    public static function findTopic(int $id): ?array
    {
        foreach (self::categories() as $slug => $category) {
            foreach (self::topicsForCategory($slug) as $topic) {
                if ((int) $topic['id'] === $id) {
                    $topic['category_slug'] = $slug;
                    $topic['category_name'] = $category['name'];

                    return $topic;
                }
            }
        }

        return null;
    }

    public static function thread(int $id): ?array
    {
        $topic = self::findTopic($id);
        if (! $topic) {
            return null;
        }

        $posts = self::postsForTopic($id, $topic);

        return [
            'topic' => $topic,
            'posts' => $posts,
            'replies_count' => max(0, count($posts) - 1),
        ];
    }

    protected static function postsForTopic(int $id, array $topic): array
    {
        if ($id === 2) {
            return [
                [
                    'author' => 'K. Lewis',
                    'badge' => 'NCLEX Coaching',
                    'badge_class' => 'student',
                    'avatar' => 'KL',
                    'avatar_class' => 'a1',
                    'time' => '3 hours ago',
                    'likes' => 7,
                    'liked' => true,
                    'is_original' => true,
                    'is_instructor' => false,
                    'body' => [
                        'I keep getting delegation questions wrong on practice exams. I understand the general principle — RNs delegate to LPNs who delegate to UAPs — but when the question gives me four patients and asks who to see first or who to delegate to, I freeze.',
                        'Does anyone have a systematic approach? I\'ve tried the ABCs but it doesn\'t always apply when the question is about delegation specifically rather than prioritization.',
                        'Any tips from people who\'ve already passed would be really helpful.',
                    ],
                ],
                [
                    'author' => 'Paula Martin',
                    'badge' => 'Instructor',
                    'badge_class' => 'instructor',
                    'avatar' => 'PM',
                    'avatar_class' => 'a3',
                    'time' => '2 hours ago',
                    'likes' => 15,
                    'liked' => true,
                    'is_original' => false,
                    'is_instructor' => true,
                    'body' => [
                        'Great question, K. — and this is one of the most commonly missed areas on the NCLEX. Here\'s the framework we teach in the coaching program:',
                        'For delegation questions specifically, I use what I call the <strong>NCLEX Safety Pyramid</strong>. It goes in this order:',
                    ],
                    'list' => [
                        '<strong>Scope first:</strong> Can this person legally perform this task? If not, the answer is never delegate it to them.',
                        '<strong>Stability second:</strong> Is the patient stable or unstable? Unstable patients should never be delegated to a UAP or new grad.',
                        '<strong>Predictability third:</strong> Is the outcome predictable? Routine, expected tasks with predictable outcomes can be delegated down.',
                    ],
                    'body_after' => [
                        'When you get a delegation question, run through Scope → Stability → Predictability in that order. It eliminates at least two wrong answers immediately in most cases.',
                        'We\'ll cover this in more detail in Thursday\'s Decision Lab. Bring your practice questions and we\'ll work through them together.',
                    ],
                ],
                [
                    'author' => 'M. Rodriguez',
                    'badge' => 'Alumni · Passed',
                    'badge_class' => 'alumni',
                    'avatar' => 'MR',
                    'avatar_class' => 'a4',
                    'time' => '1 hour ago',
                    'likes' => 9,
                    'liked' => false,
                    'is_original' => false,
                    'is_instructor' => false,
                    'body' => [
                        'Paula\'s framework is exactly what helped me pass. One more thing I\'d add — on test day, when I saw a delegation question, I\'d literally write "S-S-P" (Scope, Stability, Predictability) on my scratch paper before reading the options. It forced me to think systematically instead of panicking.',
                    ],
                    'quote' => 'The thinking pattern matters more than the content. — NCLEX PASS Method™',
                    'body_after' => [
                        'You\'ve got this, K. The fact that you\'re asking the right questions means you\'re closer than you think.',
                    ],
                ],
                [
                    'author' => 'T. Jackson',
                    'badge' => 'Nursing School',
                    'badge_class' => 'student',
                    'avatar' => 'TJ',
                    'avatar_class' => 'a2',
                    'time' => '45 min ago',
                    'likes' => 3,
                    'liked' => false,
                    'is_original' => false,
                    'is_instructor' => false,
                    'body' => [
                        'This is so helpful. I\'ve been struggling with the same thing. The Scope → Stability → Predictability order makes so much more sense than trying to apply ABCs to delegation. Thanks for breaking it down, Paula!',
                    ],
                ],
            ];
        }

        $badgeClass = str_contains(strtolower($topic['role_label']), 'instructor') ? 'instructor' : 'student';
        if (str_contains(strtolower($topic['role_label']), 'alumni')) {
            $badgeClass = 'alumni';
        }

        return [
            [
                'author' => $topic['author'],
                'badge' => $topic['role_label'],
                'badge_class' => $badgeClass,
                'avatar' => $topic['avatar'],
                'avatar_class' => $topic['avatar_class'],
                'time' => $topic['time'],
                'likes' => 4,
                'liked' => false,
                'is_original' => true,
                'is_instructor' => $badgeClass === 'instructor',
                'body' => [
                    $topic['excerpt'],
                    'Would love to hear what has worked for others in this area — strategies, resources, or mistakes to avoid.',
                ],
            ],
            [
                'author' => 'Paula Martin',
                'badge' => 'Instructor',
                'badge_class' => 'instructor',
                'avatar' => 'PM',
                'avatar_class' => 'a3',
                'time' => '1h ago',
                'likes' => 8,
                'liked' => true,
                'is_original' => false,
                'is_instructor' => true,
                'body' => [
                    'Great topic. Keep the discussion focused on what helps learners move forward — share concrete steps and ask clarifying questions when something is unclear.',
                    'If you have a specific scenario, post it here and the community can walk through it together.',
                ],
            ],
            [
                'author' => 'K. Lewis',
                'badge' => 'NCLEX Coaching',
                'badge_class' => 'student',
                'avatar' => 'KL',
                'avatar_class' => 'a1',
                'time' => '40 min ago',
                'likes' => 2,
                'liked' => false,
                'is_original' => false,
                'is_instructor' => false,
                'body' => [
                    'Thanks for starting this. I ran into something similar last week — following along and will share what helped once I try a couple of the suggestions here.',
                ],
            ],
        ];
    }
}
