<?php

namespace Modules\MainCommunity\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Modules\MainCommunity\Contracts\ForumServiceInterface;
use Modules\MainCommunity\Http\Controllers\Concerns\RendersForumViews;
use Modules\MainCommunity\Http\Requests\StoreForumTopicRequest;
use Modules\MainCommunity\Services\ForumTopicService;

class ForumTopicController extends Controller
{
    use RendersForumViews;

    public function __construct(
        protected ForumServiceInterface $forum,
        protected ForumTopicService $topicService
    ) {}

    public function create(Request $request)
    {
        $categories = $this->forum->categories();
        $categorySlug = $request->query('category');

        $lockedCategory = null;
        if ($categorySlug) {
            $lockedCategory = $this->forum->category($categorySlug);
            if (! $lockedCategory) {
                abort(404);
            }
        }

        return $this->renderForum('create_topic', compact('categories', 'lockedCategory'));
    }

    public function store(StoreForumTopicRequest $request)
    {
        $topic = $this->topicService->create($request->validated(), $request->user());

        Toastr::success('Your topic has been posted.', 'Success');

        return redirect()->route('main-community.category', $topic->category->slug);
    }
}
