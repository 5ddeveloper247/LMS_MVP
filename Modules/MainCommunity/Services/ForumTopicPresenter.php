<?php

namespace Modules\MainCommunity\Services;

use App\User;
use Illuminate\Support\Str;
use Modules\MainCommunity\Entities\CommunityForumReplies;
use Modules\MainCommunity\Entities\CommunityForumTopics;

class ForumTopicPresenter
{
    public function __construct(
        protected ForumEngagementService $engagement
    ) {}
    /** @return array<string, mixed> */
    public function toRecentDiscussionRow(CommunityForumTopics $topic): array
    {
        $card = $this->toCategoryCard($topic);
        $category = $topic->category;

        return array_merge($card, [
            'category_name' => $category?->name ?? '',
            'category_accent' => $category?->accent_color ?? '',
        ]);
    }

    /** @return array<string, mixed> */
    public function toCategoryCard(CommunityForumTopics $topic): array
    {
        $author = $topic->author;

        return [
            'id' => (int) $topic->id,
            'title' => $topic->title,
            'excerpt' => Str::limit(trim(strip_tags($topic->body)), 140),
            'author' => $this->authorName($author),
            'role_label' => $this->roleLabel($author),
            'avatar' => $this->avatarInitials($author),
            'avatar_class' => $this->avatarClass($author),
            'replies' => (int) $topic->replies_count,
            'views' => (int) $topic->views_count,
            'time' => optional($topic->created_at)->diffForHumans() ?? '',
        ];
    }

    /** @return array{topic: array, posts: array, replies_count: int, is_database: bool, shares_count: int, views_count: int} */
    public function toThread(CommunityForumTopics $topic, ?User $viewer = null): array
    {
        $author = $topic->author;
        $category = $topic->category;

        $topicMeta = [
            'id' => (int) $topic->id,
            'title' => $topic->title,
            'author' => $this->authorName($author),
            'role_label' => $this->roleLabel($author),
            'category_slug' => $category?->slug ?? '',
            'category_name' => $category?->name ?? '',
            'time' => optional($topic->created_at)->diffForHumans() ?? '',
            'views_count' => (int) $topic->views_count,
        ];

        $reactionModels = collect([$topic])->merge($topic->replies);
        $reactionData = $this->engagement->reactionDataForModels($reactionModels, $viewer);

        $posts = [
            $this->postFromTopic($topic, $viewer, $reactionData),
        ];

        foreach ($topic->replies as $reply) {
            $posts[] = $this->postFromReply($reply, $viewer, $reactionData);
        }

        return [
            'topic' => $topicMeta,
            'posts' => $posts,
            'replies_count' => (int) $topic->replies_count,
            'shares_count' => (int) $topic->shares_count,
            'views_count' => (int) $topic->views_count,
            'is_database' => true,
            'is_locked' => (bool) $topic->is_locked,
        ];
    }

    /** @return array<string, mixed> */
    /**
     * @param  array{summaries: array<string, list<array{type: string, label: string, emoji: string, count: int}>>, user: array<string, string|null>}  $reactionData
     * @return array<string, mixed>
     */
    protected function postFromTopic(CommunityForumTopics $topic, ?User $viewer, array $reactionData): array
    {
        $author = $topic->author;

        return array_merge(
            $this->postReactionFields($topic, $reactionData),
            [
                'author' => $this->authorName($author),
                'badge' => $this->roleLabel($author),
                'badge_class' => $this->badgeClass($author),
                'avatar' => $this->avatarInitials($author),
                'avatar_class' => $this->avatarClass($author),
                'time' => optional($topic->created_at)->diffForHumans() ?? '',
                'is_original' => true,
                'is_instructor' => $this->isInstructor($author),
                'body' => $this->bodyParagraphs($topic->body),
                'react_kind' => 'topic',
                'react_id' => (int) $topic->id,
                'react_url' => route('main-community.topics.react', $topic->id),
                'reactions_list_url' => route('main-community.topics.reactions', $topic->id),
            ]
        );
    }

    /**
     * @param  array{summaries: array<string, list<array{type: string, label: string, emoji: string, count: int}>>, user: array<string, string|null>}  $reactionData
     * @return array<string, mixed>
     */
    protected function postFromReply(CommunityForumReplies $reply, ?User $viewer, array $reactionData): array
    {
        $author = $reply->author;

        return array_merge(
            $this->postReactionFields($reply, $reactionData),
            [
                'author' => $this->authorName($author),
                'badge' => $this->roleLabel($author),
                'badge_class' => $this->badgeClass($author),
                'avatar' => $this->avatarInitials($author),
                'avatar_class' => $this->avatarClass($author),
                'time' => optional($reply->created_at)->diffForHumans() ?? '',
                'is_original' => false,
                'is_instructor' => $this->isInstructor($author),
                'body' => $this->bodyParagraphs($reply->body),
                'react_kind' => 'reply',
                'react_id' => (int) $reply->id,
                'react_url' => route('main-community.replies.react', $reply->id),
                'reactions_list_url' => route('main-community.replies.reactions', $reply->id),
            ]
        );
    }

    /**
     * @param  array{summaries: array<string, list<array{type: string, label: string, emoji: string, count: int}>>, user: array<string, string|null>}  $reactionData
     * @return array<string, mixed>
     */
    protected function postReactionFields($model, array $reactionData): array
    {
        $key = $model->getMorphClass().':'.$model->getKey();
        $summary = $reactionData['summaries'][$key] ?? [];
        $userReaction = $reactionData['user'][$key] ?? null;
        $types = mainCommunityReactionTypes();
        $actionLabel = $userReaction
            ? ($types[$userReaction]['action_label'] ?? 'Like')
            : 'Like';

        return [
            'reactions_total' => (int) $model->likes_count,
            'reaction_summary' => $summary,
            'reaction_summary_label' => $reactionData['summary_labels'][$key] ?? '',
            'user_reaction' => $userReaction,
            'reaction_action_label' => $actionLabel,
            'liked' => $userReaction !== null,
            'likes' => (int) $model->likes_count,
        ];
    }

    protected function authorName(?User $user): string
    {
        if (! $user) {
            return 'Community Member';
        }

        $name = trim((string) ($user->name ?? ''));

        return $name !== '' ? $name : 'Community Member';
    }

    protected function roleLabel(?User $user): string
    {
        if (! $user) {
            return 'Community Member';
        }

        $roleId = (int) $user->role_id;
        $ceRoleId = (int) config('ceprofessional.role_id', 10);

        return match (true) {
            $roleId === 1 => 'Admin',
            $roleId === 2 => 'Instructor',
            $roleId === 3 => 'Student',
            $roleId === $ceRoleId => 'CE Professional',
            default => 'Community Member',
        };
    }

    protected function badgeClass(?User $user): string
    {
        if (! $user) {
            return 'student';
        }

        $roleId = (int) $user->role_id;

        return match ($roleId) {
            2 => 'instructor',
            1 => 'instructor',
            default => 'student',
        };
    }

    protected function isInstructor(?User $user): bool
    {
        return $user && (int) $user->role_id === 2;
    }

    protected function avatarInitials(?User $user): string
    {
        $name = $this->authorName($user);
        $parts = preg_split('/\s+/', $name) ?: [];

        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        }

        return strtoupper(substr($name, 0, 2));
    }

    protected function avatarClass(?User $user): string
    {
        $pool = ['a1', 'a2', 'a3', 'a4', 'a5'];
        $index = $user ? abs((int) $user->id) % count($pool) : 0;

        return $pool[$index];
    }

    /** @return array<int, string> */
    protected function bodyParagraphs(string $body): array
    {
        $body = trim($body);
        if ($body === '') {
            return [];
        }

        $chunks = preg_split("/\r\n|\r|\n/", $body) ?: [];
        $paragraphs = array_values(array_filter(array_map('trim', $chunks)));

        return $paragraphs !== [] ? $paragraphs : [$body];
    }
}
