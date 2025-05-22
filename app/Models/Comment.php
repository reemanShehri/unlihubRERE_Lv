<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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

    // 📝 علاقة مع Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function replies()
{
    return $this->hasMany(Comment::class, 'parent_id');
}

public function parent()
{
    return $this->belongsTo(Comment::class, 'parent_id');
}

}
