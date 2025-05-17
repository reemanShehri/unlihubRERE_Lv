<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //
    protected $guarded = [];

    public function course()
{
    return $this->belongsTo(Course::class);
}

}
