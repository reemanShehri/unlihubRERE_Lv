<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Major;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $guarded =[];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
         'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function student()
{
    return $this->hasOne(Student::class ,'user_id');
}

public function posts()
{
    return $this->hasMany(Post::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}



// public function courses()
// {
//     return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')
//                 ->withTimestamps();
// }


public function courses()
{
    // يجب أن تكون هذه العلاقة عبر Student وليس مباشرة
    return $this->hasOneThrough(
        Course::class,
        Student::class,
        'user_id', // Foreign key on students table
        'id', // Foreign key on courses table
        'id', // Local key on users table
        'id' // Local key on students table
    );
}

public function likes()
{
    return $this->hasMany(Like::class);
}



    // ... كود الموديل الحالي

    public function getFormattedPhoneForWhatsApp()
    {
        $phone = $this->phone ?? '';

        if (empty($phone)) {
            return null;
        }

        // إزالة أي شيء غير رقم
        $phone = preg_replace('/\D+/', '', $phone);

        // إزالة أول صفر إذا موجود
        if (substr($phone, 0, 1) === '0') {
            $phone = substr($phone, 1);
        }

        // إذا يبدأ بـ 970 أو 972 يرجع الرقم كما هو
        if (substr($phone, 0, 3) === '970' || substr($phone, 0, 3) === '972') {
            return $phone;
        }

        // إذا لا يبدأ بالكود يرجع مع 972 بشكل افتراضي
        return '972' . $phone;
    }





    public function major()
{
    return $this->belongsTo(Major::class);
}


public function getProfilePhotoUrlAttribute()
{
    if ($this->profile_photo_path) {
        return asset('images/profile_photos/' . $this->profile_photo_path);
    }

    return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
}


}
