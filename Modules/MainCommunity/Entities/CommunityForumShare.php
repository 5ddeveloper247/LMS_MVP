<?php

namespace Modules\MainCommunity\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommunityForumShare extends Model
{
    public $timestamps = false;

    const UPDATED_AT = null;

    protected $table = 'forum_shares';

    protected $fillable = [
        'topic_id',
        'user_id',
        'channel',
        'lms_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
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
