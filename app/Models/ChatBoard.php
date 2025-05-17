<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class ChatBoard extends Model
{
    //
    protected $guarded =[];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
