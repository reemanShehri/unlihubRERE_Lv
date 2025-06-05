<?php

namespace App\Models;

use App\Models\User;
use App\Models\CourseChat;
use App\Models\CourseMessage;
use Illuminate\Database\Eloquent\Model;

class CourseMessage extends Model
{

     protected $guarded = [];
    //

    // app/Models/CourseMessage.php
public function chat() {
    return $this->belongsTo(CourseChat::class, 'course_chat_id');
}

public function user() {
    return $this->belongsTo(User::class);
}


// app/Models/CourseMessage.php

public function replyTo()
{
    return $this->belongsTo(CourseMessage::class, 'reply_to_message_id');
}

// Optional: لتعقب الردود على هذه الرسالة
public function replies()
{
    return $this->hasMany(CourseMessage::class, 'reply_to_message_id');
}


}
