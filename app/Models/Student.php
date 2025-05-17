<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Major;
use App\Models\Course;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded =[];


    public function image()
{
    return $this->morphOne(Image::class, 'imageable');
}

public function user()
{
    return $this->belongsTo(User::class);
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
    return $this->belongsToMany(Course::class);
}


}
