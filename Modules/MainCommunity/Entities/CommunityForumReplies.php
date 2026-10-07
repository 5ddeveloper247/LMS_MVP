<?php

namespace Modules\MainCommunity\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityForumReplies extends Model
{
    use SoftDeletes;

    protected $table = 'forum_replies';

    protected $fillable = [
        'topic_id',
        'user_id',
        'parent_id',
        'body',
        'likes_count',
        'lms_id',
    ];

    protected $casts = [
        'likes_count' => 'integer',
    ];

    public function topic()
    {
        return $this->belongsTo(CommunityForumTopics::class, 'topic_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reactions()
    {
        return $this->morphMany(CommunityForumReaction::class, 'likeable');
    }
}
