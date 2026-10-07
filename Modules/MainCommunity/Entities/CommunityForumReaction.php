<?php

namespace Modules\MainCommunity\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommunityForumReaction extends Model
{
    protected $table = 'forum_reactions';

    protected $fillable = [
        'user_id',
        'likeable_type',
        'likeable_id',
        'reaction',
        'lms_id',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
