<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Major;
use App\Models\Student;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $guarded =[];

    public function image()
{
    return $this->morphOne(Image::class, 'imageable');
}



public function major()
{
    return $this->belongsTo(Major::class);
}




    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

   

    public function lectures()
    {
        return $this->hasMany(Lecture::class); // إذا فيه محاضرات للمساق
    }



    public function getImagePathAttribute()
    {
        return $this->image ? $this->image->path : null;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image->path) : null;
    }

}
