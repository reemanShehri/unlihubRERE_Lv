<?php

namespace App\Models;

use App\Models\Major;
use App\Models\College;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    protected $guarded =[];
    protected $fillable = [
        'name', 'country', 'official_website', 'student_portal',
        'moodle_link', 'facebook_page', 'telegram_group',
    ];
    

    public function students()
{
    return $this->hasMany(Student::class);
}

public function colleges()
{
    return $this->hasMany(College::class);
}


public function majors()
{
    return $this->hasMany(Major::class);
}

public function getLinks()
{
    return array_filter([
        [
            'title' => 'الموقع الرسمي',
            'url' => $this->official_website,
            'icon' => '<i class="fas fa-globe"></i>',
        ],
        [
            'title' => 'مودل الجامعة',
            'url' => $this->moodle_link,
            'icon' => '<i class="fas fa-chalkboard-teacher"></i>',
        ],
        [
            'title' => 'البوابة الأكاديمية',
            'url' => $this->student_portal,
            'icon' => '<i class="fas fa-university"></i>',
        ],
        [
            'title' => 'صفحة فيسبوك',
            'url' => $this->facebook_page,
            'icon' => '<i class="fab fa-facebook"></i>',
        ],
        [
            'title' => 'مجموعة تلغرام',
            'url' => $this->telegram_group,
            'icon' => '<i class="fab fa-telegram"></i>',
        ],
    ], function ($link) {
        return !empty($link['url']);
    });
}



}
