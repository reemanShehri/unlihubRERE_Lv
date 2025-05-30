<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\ChatBoard;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function chatBoard()
{
    return $this->belongsTo(ChatBoard::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function likes()
{
    return $this->hasMany(Like::class);
}



public function isLikedBy(User $user = null)
{
    if (!$user) return false;
    return $this->likes()->where('user_id', $user->id)->exists();
}

}
