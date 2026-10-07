<?php

namespace Modules\MainCommunity\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommunityForumTopicView extends Model
{
    public $timestamps = false;

    protected $table = 'forum_topic_views';

    protected $fillable = [
        'topic_id',
        'user_id',
        'view_date',
        'viewed_at',
        'lms_id',
    ];

    protected $casts = [
        'view_date' => 'date',
        'viewed_at' => 'datetime',
    ];

    public function topic()
    {
        return $this->belongsTo(CommunityForumTopics::class, 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
