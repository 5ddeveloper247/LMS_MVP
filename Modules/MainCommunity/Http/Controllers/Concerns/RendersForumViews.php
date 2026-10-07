<?php

namespace Modules\MainCommunity\Http\Controllers\Concerns;

trait RendersForumViews
{
    protected function renderForum(string $view, array $data = [])
    {
        $layout = $this->forumLayout();

        return view("maincommunity::Community_forum.{$view}", array_merge($data, [
            'forumLayout' => $layout,
            'useAdminShell' => $layout === 'backend.master',
            'isCePortalShell' => $layout === 'ceprofessional::layouts.dashboard',
        ]));
    }

    protected function forumLayout(): string
    {
        $user = auth()->user();

        if (function_exists('userIsCeProfessional') && userIsCeProfessional($user)) {
            return 'ceprofessional::layouts.dashboard';
        }

        if ((int) $user->role_id === 3) {
            return theme('layouts.dashboard_master');
        }

        return 'backend.master';
    }
}
