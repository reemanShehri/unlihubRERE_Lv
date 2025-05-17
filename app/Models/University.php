<?php

namespace App\Models;

use App\Models\College;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    protected $guarded =[];

    public function students()
{
    return $this->hasMany(Student::class);
}

public function colleges()
{
    return $this->hasMany(College::class);
}

}
