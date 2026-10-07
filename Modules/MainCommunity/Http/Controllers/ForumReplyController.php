<?php

namespace Modules\MainCommunity\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\MainCommunity\Entities\CommunityForumTopics;
use Modules\MainCommunity\Http\Requests\StoreForumReplyRequest;
use Modules\MainCommunity\Services\ForumEngagementService;

class ForumReplyController extends Controller
{
    public function __construct(
        protected ForumEngagementService $engagement
    ) {}

    public function store(StoreForumReplyRequest $request, CommunityForumTopics $topic)
    {
        $this->engagement->storeReply(
            $topic,
            $request->user(),
            $request->input('body'),
            $request->input('parent_id') ? (int) $request->input('parent_id') : null
        );

        Toastr::success('Your reply has been posted.', 'Success');

        return redirect()->route('main-community.topic', $topic->id);
    }
}
