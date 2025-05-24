<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Course;
use App\Models\Student;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $fillable = ['name', 'university_id'];

    protected $guarded =[];

    public function university()
{
    return $this->belongsTo(University::class);
}

public function majors()
{
    return $this->hasMany(Major::class);
}


public function students()
{
    return $this->hasMany(Student::class);
}
public function courses()
{
    return $this->hasManyThrough(
        Course::class,
        Major::class,
        'college_id', // Foreign key on the majors table
        'major_id',   // Foreign key on the courses table
        'id',         // Local key on the colleges table
        'id'          // Local key on the majors table
    );
}



}
