<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

     protected $guarded = [];
     protected $fillable = ['body', 'user_id', 'comment_id', 'parent_id'];
    //


    public function user()
{
    return $this->belongsTo(User::class);
}

public function comment()
{
    return $this->belongsTo(Comment::class);
}

public function replies()
{
    return $this->hasMany(Reply::class, 'parent_id');
}
public function parent()
{
    return $this->belongsTo(Reply::class, 'parent_id');
}
}
