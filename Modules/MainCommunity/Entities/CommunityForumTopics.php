<?php

namespace Modules\MainCommunity\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityForumTopics extends Model
{
    use SoftDeletes;

    protected $table = 'forum_topics';

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'body',
        'is_pinned',
        'is_locked',
        'views_count',
        'replies_count',
        'likes_count',
        'shares_count',
        'last_reply_at',
        'last_reply_user_id',
        'lms_id',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'is_locked' => 'boolean',
        'views_count' => 'integer',
        'replies_count' => 'integer',
        'likes_count' => 'integer',
        'shares_count' => 'integer',
        'last_reply_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(CommunityForumCategories::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(CommunityForumReplies::class, 'topic_id');
    }

    public function reactions()
    {
        return $this->morphMany(CommunityForumReaction::class, 'likeable');
    }

    public function shares()
    {
        return $this->hasMany(CommunityForumShare::class, 'topic_id');
    }

    public function viewsLog()
    {
        return $this->hasMany(CommunityForumTopicView::class, 'topic_id');
    }
}
