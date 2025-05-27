<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Major;
use App\Models\Course;
use App\Models\College;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded =[];
    protected $table = 'students';


    public function image()
{
    return $this->morphOne(Image::class, 'imageable');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id'); // تحديد المفتاح الأجنبي صراحة
}

public function university()
{
    return $this->belongsTo(University::class);
}

public function major()
{
    return $this->belongsTo(Major::class);
}

public function courses()
{
    return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
}


public function college()
{
    return $this->belongsTo(College::class);
}


}
