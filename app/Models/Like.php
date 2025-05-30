<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

     protected $guarded = [];
     protected $fillable = ['user_id', 'post_id'];

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function post()
     {
         return $this->belongsTo(Post::class);
     }
    //
}
