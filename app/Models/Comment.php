<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded =[];
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
{
    return $this->hasMany(CommentLike::class);
}




    // 📝 علاقة مع Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class)->whereNull('parent_id'); // لاستبعاد الردود الفرعية
    }

public function parent()
{
    return $this->belongsTo(Comment::class, 'parent_id');
}


public function CommentReplies()
{
    return $this->hasMany(Reply::class);
}

}
