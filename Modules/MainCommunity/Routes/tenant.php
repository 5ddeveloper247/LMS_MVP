<?php

use Illuminate\Support\Facades\Route;
use Modules\MainCommunity\Http\Controllers\ForumEngagementController;
use Modules\MainCommunity\Http\Controllers\ForumReplyController;
use Modules\MainCommunity\Http\Controllers\ForumTopicController;
use Modules\MainCommunity\Http\Controllers\MainCommunityController;

Route::middleware(['auth', 'communityMember'])->group(function () {
    Route::prefix('community')->group(function () {
        Route::get('/', [MainCommunityController::class, 'index'])->name('main-community.index');
        Route::get('/category/{slug}', [MainCommunityController::class, 'category'])->name('main-community.category');
        Route::get('/topic/{id}', [MainCommunityController::class, 'topic'])->name('main-community.topic');

        Route::get('/topics/create', [ForumTopicController::class, 'create'])->name('main-community.topics.create');
        Route::post('/topics', [ForumTopicController::class, 'store'])->name('main-community.topics.store');

        Route::post('/topic/{topic}/replies', [ForumReplyController::class, 'store'])->name('main-community.topics.replies.store');
        Route::post('/topic/{topic}/like', [ForumEngagementController::class, 'toggleTopicLike'])->name('main-community.topics.like');
        Route::post('/topic/{topic}/react', [ForumEngagementController::class, 'reactTopic'])->name('main-community.topics.react');
        Route::get('/topic/{topic}/reactions', [ForumEngagementController::class, 'listTopicReactions'])->name('main-community.topics.reactions');
        Route::post('/topic/{topic}/share', [ForumEngagementController::class, 'share'])->name('main-community.topics.share');
        Route::post('/reply/{reply}/like', [ForumEngagementController::class, 'toggleReplyLike'])->name('main-community.replies.like');
        Route::post('/reply/{reply}/react', [ForumEngagementController::class, 'reactReply'])->name('main-community.replies.react');
        Route::get('/reply/{reply}/reactions', [ForumEngagementController::class, 'listReplyReactions'])->name('main-community.replies.reactions');
    });

    Route::get('admin/main-community', function () {
        return redirect()->route('main-community.index');
    });

    Route::get('admin/main-community/category/{slug}', function ($slug) {
        return redirect()->route('main-community.category', $slug);
    });

    Route::get('admin/main-community/topic/{id}', function ($id) {
        return redirect()->route('main-community.topic', $id);
    });
});
