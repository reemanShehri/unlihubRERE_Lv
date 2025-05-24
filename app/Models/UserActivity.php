<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{

     protected $guarded = [];

     public $timestamps = false;

     protected $fillable = [
         'user_id',
         'action',
         'created_at',
     ];

     public function user()
     {
         return $this->belongsTo(User::class);
     }
    //
}
