<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $guarded =[];
    protected $fillable = ['name', 'path', 'user_id', 'course_id'];



    public function lecture()
{
    return $this->belongsTo(Lecture::class);
}

 // العلاقة مع المستخدم (User)
 public function user()
 {
     return $this->belongsTo(User::class);
 }

 // العلاقة مع الكورس (Course)
 public function course()
 {
     return $this->belongsTo(Course::class);
 }


}
