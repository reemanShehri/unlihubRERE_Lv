<?php

namespace App\Models;

use App\Models\Course;
use App\Models\CourseMessage;
use Illuminate\Database\Eloquent\Model;

class CourseChat extends Model
{

     protected $guarded = [];
    //

    // app/Models/CourseChat.php
public function course() {
    return $this->belongsTo(Course::class);
}

public function messages() {
    return $this->hasMany(CourseMessage::class);
}

}
