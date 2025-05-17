<?php

namespace App\Models;

use App\Models\Major;
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


}
