<?php



namespace Modules\MainCommunity\Services;



use App\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;

use Modules\MainCommunity\Contracts\ForumCategoryRepositoryInterface;

use Modules\MainCommunity\Entities\CommunityForumReaction;

use Modules\MainCommunity\Entities\CommunityForumReplies;

use Modules\MainCommunity\Entities\CommunityForumShare;

use Modules\MainCommunity\Entities\CommunityForumTopics;

use Modules\MainCommunity\Entities\CommunityForumTopicView;



class ForumEngagementService

{

    public function __construct(

        protected ForumCategoryRepositoryInterface $categoryRepository

    ) {}



    public function recordTopicView(CommunityForumTopics $topic, User $user): void

    {

        $today = now()->toDateString();



        $exists = CommunityForumTopicView::query()

            ->where('topic_id', $topic->id)

            ->where('user_id', $user->id)

            ->whereDate('view_date', $today)

            ->exists();



        if ($exists) {

            return;

        }



        CommunityForumTopicView::create([

            'topic_id' => $topic->id,

            'user_id' => $user->id,

            'view_date' => $today,

            'viewed_at' => now(),

            'lms_id' => mainCommunityLmsId($user, $topic),

        ]);



        $topic->increment('views_count');

    }



    public function toggleTopicLike(CommunityForumTopics $topic, User $user): array

    {

        return $this->setReaction($topic, $user, 'like');

    }



    public function toggleReplyLike(CommunityForumReplies $reply, User $user): array

    {

        return $this->setReaction($reply, $user, 'like');

    }



    public function reactToTopic(CommunityForumTopics $topic, User $user, string $reaction): array

    {

        return $this->setReaction($topic, $user, $reaction);

    }



    public function reactToReply(CommunityForumReplies $reply, User $user, string $reaction): array

    {

        return $this->setReaction($reply, $user, $reaction);

    }



    public function recordShare(CommunityForumTopics $topic, User $user, string $channel = 'link'): int

    {

        CommunityForumShare::create([

            'topic_id' => $topic->id,

            'user_id' => $user->id,

            'channel' => $channel,

            'created_at' => now(),

            'lms_id' => mainCommunityLmsId($user, $topic),

        ]);



        $topic->increment('shares_count');



        return (int) $topic->fresh()->shares_count;

    }



    public function storeReply(CommunityForumTopics $topic, User $user, string $body, ?int $parentId = null): CommunityForumReplies

    {

        if ($topic->is_locked) {

            abort(403, 'This topic is locked.');

        }



        return DB::transaction(function () use ($topic, $user, $body, $parentId) {

            $reply = CommunityForumReplies::create([

                'topic_id' => $topic->id,

                'user_id' => $user->id,

                'parent_id' => $parentId,

                'body' => $body,

                'likes_count' => 0,

                'lms_id' => mainCommunityLmsId($user, $topic),

            ]);



            $topic->increment('replies_count');

            $topic->update([

                'last_reply_at' => now(),

                'last_reply_user_id' => $user->id,

            ]);



            if ($topic->category_id) {

                $this->categoryRepository->incrementRepliesCount((int) $topic->category_id);

            }



            return $reply;

        });

    }



    /** @deprecated Use userReactionForModel */

    public function userLikesModel(?User $user, Model $model): bool

    {

        return $this->userReactionForModel($user, $model) === 'like';

    }



    public function userReactionForModel(?User $user, Model $model): ?string

    {

        if (! $user) {

            return null;

        }



        $reaction = CommunityForumReaction::query()

            ->where('user_id', $user->id)

            ->where('likeable_type', $model->getMorphClass())

            ->where('likeable_id', $model->getKey())

            ->value('reaction');



        return is_string($reaction) && array_key_exists($reaction, mainCommunityReactionTypes())

            ? $reaction

            : null;

    }



    /**

     * @param  Collection<int, Model>|array<int, Model>  $models

     * @return array{summaries: array<string, list<array{type: string, label: string, emoji: string, count: int}>>, user: array<string, string|null>}

     */

    public function reactionDataForModels(Collection|array $models, ?User $viewer = null): array

    {

        $models = $models instanceof Collection ? $models : collect($models);

        $models = $models->filter(fn ($m) => $m instanceof Model && $m->getKey() !== null);



        if ($models->isEmpty()) {

            return ['summaries' => [], 'user' => [], 'summary_labels' => []];

        }



        $grouped = CommunityForumReaction::query()

            ->selectRaw('likeable_type, likeable_id, reaction, COUNT(*) as aggregate')

            ->where(function ($query) use ($models) {

                foreach ($models as $model) {

                    $query->orWhere(function ($inner) use ($model) {

                        $inner->where('likeable_type', $model->getMorphClass())

                            ->where('likeable_id', $model->getKey());

                    });

                }

            })

            ->groupBy('likeable_type', 'likeable_id', 'reaction')

            ->get();



        $summaries = [];

        $types = mainCommunityReactionTypes();



        foreach ($grouped as $row) {

            $key = $this->modelReactionKey($row->likeable_type, (int) $row->likeable_id);

            $reactionType = (string) $row->reaction;

            if (! array_key_exists($reactionType, $types)) {

                continue;

            }

            $summaries[$key] ??= [];

            $summaries[$key][] = [

                'type' => $reactionType,

                'label' => $types[$reactionType]['label'],

                'emoji' => $types[$reactionType]['emoji'],

                'count' => (int) $row->aggregate,

            ];

        }



        foreach ($summaries as $key => $items) {

            usort($items, fn ($a, $b) => $b['count'] <=> $a['count']);

            $summaries[$key] = $items;

        }



        $user = [];

        if ($viewer) {

            $userRows = CommunityForumReaction::query()

                ->where('user_id', $viewer->id)

                ->where(function ($query) use ($models) {

                    foreach ($models as $model) {

                        $query->orWhere(function ($inner) use ($model) {

                            $inner->where('likeable_type', $model->getMorphClass())

                                ->where('likeable_id', $model->getKey());

                        });

                    }

                })

                ->get(['likeable_type', 'likeable_id', 'reaction']);



            foreach ($userRows as $row) {

                $key = $this->modelReactionKey($row->likeable_type, (int) $row->likeable_id);

                $reactionType = (string) $row->reaction;

                $user[$key] = array_key_exists($reactionType, $types) ? $reactionType : null;

            }

        }



        $summaryLabels = [];
        $reactionRows = CommunityForumReaction::query()
            ->with('user')
            ->where(function ($query) use ($models) {
                foreach ($models as $model) {
                    $query->orWhere(function ($inner) use ($model) {
                        $inner->where('likeable_type', $model->getMorphClass())
                            ->where('likeable_id', $model->getKey());
                    });
                }
            })
            ->orderByDesc('id')
            ->get()
            ->groupBy(fn ($row) => $this->modelReactionKey($row->likeable_type, (int) $row->likeable_id));

        foreach ($reactionRows as $key => $collection) {
            $model = $models->first(function ($candidate) use ($key) {
                return $this->modelReactionKey($candidate->getMorphClass(), (int) $candidate->getKey()) === $key;
            });
            $total = $model ? (int) $model->likes_count : $collection->count();
            $summaryLabels[$key] = mainCommunityReactionSummaryText($total, $collection, $viewer);
        }

        return ['summaries' => $summaries, 'user' => $user, 'summary_labels' => $summaryLabels];

    }



    /** @return list<array{type: string, label: string, emoji: string, count: int}> */

    public function reactionSummaryForModel(Model $model): array

    {

        $key = $this->modelReactionKey($model->getMorphClass(), (int) $model->getKey());

        $data = $this->reactionDataForModels(collect([$model]));



        return $data['summaries'][$key] ?? [];

    }



    public function setReaction(Model $model, User $user, string $reaction): array

    {

        $reaction = mainCommunityValidReaction($reaction);

        $countColumn = $model instanceof CommunityForumReplies ? 'likes_count' : 'likes_count';



        $existing = CommunityForumReaction::query()

            ->where('user_id', $user->id)

            ->where('likeable_type', $model->getMorphClass())

            ->where('likeable_id', $model->getKey())

            ->first();



        if ($existing) {

            if ((string) $existing->reaction === $reaction) {

                $existing->delete();

                if ((int) $model->{$countColumn} > 0) {

                    $model->decrement($countColumn);

                }

            } else {

                $existing->update(['reaction' => $reaction]);

            }

        } else {

            CommunityForumReaction::create([

                'user_id' => $user->id,

                'likeable_type' => $model->getMorphClass(),

                'likeable_id' => $model->getKey(),

                'reaction' => $reaction,

                'lms_id' => mainCommunityLmsId($user, $model),

            ]);

            $model->increment($countColumn);

        }



        $model->refresh();



        return $this->reactionPayload($model, $user);

    }



    /** @return array{user_reaction: ?string, total: int, summary: list<array{type: string, label: string, emoji: string, count: int}>, action_label: string} */

    public function reactionPayload(Model $model, ?User $user): array

    {

        $summary = $this->reactionSummaryForModel($model);

        $userReaction = $user ? $this->userReactionForModel($user, $model) : null;

        $types = mainCommunityReactionTypes();

        $actionLabel = $userReaction

            ? ($types[$userReaction]['action_label'] ?? 'Like')

            : 'Like';



        $data = $this->reactionDataForModels(collect([$model]), $user);
        $key = $this->modelReactionKey($model->getMorphClass(), (int) $model->getKey());

        return [

            'user_reaction' => $userReaction,

            'total' => (int) ($model->likes_count ?? 0),

            'summary' => $summary,

            'summary_label' => $data['summary_labels'][$key] ?? '',

            'action_label' => $actionLabel,

        ];

    }

    /**
     * @return array{total: int, tabs: list<array{type: string, label: string, emoji: string, count: int}>, people: list<array<string, mixed>>}
     */
    public function listReactionsForModel(Model $model, ?User $viewer, ?string $filter = 'all'): array
    {
        $types = mainCommunityReactionTypes();
        $filter = $filter ?: 'all';

        $baseQuery = CommunityForumReaction::query()
            ->where('likeable_type', $model->getMorphClass())
            ->where('likeable_id', $model->getKey());

        $total = (int) (clone $baseQuery)->count();

        $countsByType = (clone $baseQuery)
            ->selectRaw('reaction, COUNT(*) as aggregate')
            ->groupBy('reaction')
            ->pluck('aggregate', 'reaction');

        $tabs = [[
            'type' => 'all',
            'label' => 'All',
            'emoji' => '',
            'count' => $total,
        ]];

        foreach ($types as $type => $meta) {
            $count = (int) ($countsByType[$type] ?? 0);
            if ($count > 0) {
                $tabs[] = [
                    'type' => $type,
                    'label' => $meta['label'],
                    'emoji' => $meta['emoji'],
                    'count' => $count,
                ];
            }
        }

        $listQuery = CommunityForumReaction::query()
            ->with('user')
            ->where('likeable_type', $model->getMorphClass())
            ->where('likeable_id', $model->getKey())
            ->orderByDesc('id');

        if ($filter !== 'all' && array_key_exists($filter, $types)) {
            $listQuery->where('reaction', $filter);
        }

        $people = $listQuery->get()->map(function (CommunityForumReaction $row) use ($viewer, $types) {
            $user = $row->user;
            $name = $user ? trim((string) ($user->name ?? '')) : '';
            $name = $name !== '' ? $name : 'Community Member';
            $reactionType = (string) $row->reaction;
            $meta = $types[$reactionType] ?? $types['like'];

            return [
                'user_id' => (int) $row->user_id,
                'name' => $name,
                'role' => mainCommunityUserRoleLabel($user),
                'avatar' => $this->avatarInitials($name),
                'reaction' => $reactionType,
                'emoji' => $meta['emoji'],
                'label' => $meta['label'],
                'is_you' => $viewer && (int) $viewer->id === (int) $row->user_id,
            ];
        })->values()->all();

        return [
            'total' => $total,
            'tabs' => $tabs,
            'people' => $people,
        ];
    }

    protected function avatarInitials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1).substr($parts[1], 0, 1));
        }

        return strtoupper(substr($name, 0, 2));
    }



    protected function modelReactionKey(string $likeableType, int $likeableId): string

    {

        return $likeableType.':'.$likeableId;

    }

}


