<?php

namespace App\Models;

use App\Models\Course;
use App\Models\College;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['name', 'college_id'];

    public function college()
{
    return $this->belongsTo(College::class);
}

public function courses()
{
    return $this->hasMany(Course::class);
}

public function students()
{
    return $this->hasMany(Student::class);
}



}
