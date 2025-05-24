<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewMessageNotification;
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
    return $this->hasOne(Student::class);
}

public function posts()
{
    return $this->hasMany(Post::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function notifications()
{
    return $this->morphMany(NewMessageNotification::class, 'notifiable');
}


public function courses()
{
    return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')
                ->withTimestamps();
}


public function likes()
{
    return $this->hasMany(Like::class);
}




}
