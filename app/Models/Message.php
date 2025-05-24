<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

     protected $guarded = [];
    //
    use HasFactory;

    protected $fillable = ['user_id', 'email', 'message'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
