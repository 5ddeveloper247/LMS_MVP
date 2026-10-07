<?php

if (! function_exists('mainCommunityLmsId')) {
    /**
     * Tenant id for forum rows — required NOT NULL on forum_* tables.
     */
    function mainCommunityLmsId($user = null, $model = null): int
    {
        try {
            if (app()->bound('institute') && app('institute')) {
                return (int) app('institute')->id;
            }
        } catch (\Throwable) {
            // ignore
        }

        $user = $user ?? auth()->user();
        if ($user && ! empty($user->lms_id)) {
            return (int) $user->lms_id;
        }

        if ($model && ! empty($model->lms_id)) {
            return (int) $model->lms_id;
        }

        return 1;
    }
}

if (! function_exists('mainCommunityTopicSort')) {
    function mainCommunityTopicSort(?string $sort, string $default = 'latest'): string
    {
        return in_array($sort, ['latest', 'popular', 'unanswered'], true) ? $sort : $default;
    }
}

if (! function_exists('mainCommunityReactionTypes')) {
    /** @return array<string, array{label: string, emoji: string, action_label: string}> */
    function mainCommunityReactionTypes(): array
    {
        return config('maincommunity.reactions', []);
    }
}

if (! function_exists('mainCommunityValidReaction')) {
    function mainCommunityValidReaction(?string $reaction, string $default = 'like'): string
    {
        $types = mainCommunityReactionTypes();

        return is_string($reaction) && array_key_exists($reaction, $types) ? $reaction : $default;
    }
}

if (! function_exists('mainCommunityReactionSummaryText')) {
    /**
     * LinkedIn-style one-line label, e.g. "You and 2 others" or "Paula Martin and 3 others".
     *
     * @param  iterable<int, object{user_id: int, user?: \App\User|null}>  $reactions
     */
    function mainCommunityReactionSummaryText(int $total, iterable $reactions, ?\App\User $viewer = null): string
    {
        if ($total <= 0) {
            return '';
        }

        $viewerId = $viewer ? (int) $viewer->id : null;
        $viewerReacted = false;
        $otherNames = [];

        foreach ($reactions as $reaction) {
            $reactionUserId = (int) ($reaction->user_id ?? 0);
            if ($viewerId && $reactionUserId === $viewerId) {
                $viewerReacted = true;

                continue;
            }

            if (count($otherNames) >= 2) {
                continue;
            }

            $user = $reaction->user ?? null;
            $name = $user ? trim((string) ($user->name ?? '')) : '';
            $otherNames[] = $name !== '' ? $name : 'Member';
        }

        if ($total === 1) {
            return $viewerReacted ? 'You' : ($otherNames[0] ?? '1');
        }

        if ($total === 2) {
            if ($viewerReacted) {
                return isset($otherNames[0]) ? 'You and '.$otherNames[0] : 'You and 1 other';
            }

            if (count($otherNames) >= 2) {
                return $otherNames[0].' and '.$otherNames[1];
            }

            return ($otherNames[0] ?? 'Someone').' and 1 other';
        }

        if ($viewerReacted) {
            return 'You and '.($total - 1).' others';
        }

        return ($otherNames[0] ?? 'Someone').' and '.($total - 1).' others';
    }
}

if (! function_exists('mainCommunityUserRoleLabel')) {
    function mainCommunityUserRoleLabel(?\App\User $user): string
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
}

if (! function_exists('mainCommunityForumUrl')) {
    function mainCommunityForumUrl(): string
    {
        if (function_exists('routeIsExist') && routeIsExist('main-community.index')) {
            return route('main-community.index');
        }

        return url('/community');
    }
}

if (! function_exists('userCanAccessMainCommunityForum')) {
    function userCanAccessMainCommunityForum($user = null): bool
    {
        $user = $user ?? auth()->user();

        if (! $user) {
            return false;
        }

        $roleId = (int) $user->role_id;
        $ceRoleId = (int) config('ceprofessional.role_id', 10);

        return in_array($roleId, [1, 2, 3], true) || $roleId === $ceRoleId;
    }
}

if (! function_exists('mainCommunityLoginPortalForAudience')) {
    /**
     * @param  'student'|'ce'|'instructor'|'nurse'|'mentor'|'teacher'  $audience
     */
    function mainCommunityLoginPortalForAudience(string $audience): string
    {
        return match ($audience) {
            'ce', 'nurse', 'mentor' => 'ce',
            'instructor', 'teacher' => 'instructor',
            default => 'student',
        };
    }
}

if (! function_exists('mainCommunityEntryUrl')) {
    /**
     * Logged-in community roles go to the forum (role-specific dashboard shell).
     * Guests go to login with redirect to /community and the matching portal tab for register.
     *
     * @param  'student'|'ce'|'instructor'|'nurse'|'mentor'|'teacher'  $audience
     */
    function mainCommunityEntryUrl(string $audience = 'student'): string
    {
        if (auth()->check() && userCanAccessMainCommunityForum()) {
            return mainCommunityForumUrl();
        }

        if (! function_exists('routeIsExist') || ! routeIsExist('login')) {
            return url('/login');
        }

        $redirectPath = parse_url(mainCommunityForumUrl(), PHP_URL_PATH) ?: '/community';

        if (function_exists('normalizeInternalRedirectPath')) {
            $redirectPath = normalizeInternalRedirectPath($redirectPath);
        }

        $portal = mainCommunityLoginPortalForAudience($audience);

        return route('login', [
            'redirect' => $redirectPath,
            'portal' => $portal,
        ]);
    }
}
