<?php

namespace App\Models;

use App\Models\Lecture;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $guarded =[];

    public function lecture()
{
    return $this->belongsTo(Lecture::class);
}

}
