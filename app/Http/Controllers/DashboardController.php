<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\College;
use App\Models\Lecture;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        $course = null;

        if ($user->student) {
        $course = $user->student->courses;
    }
    $lectures = $user->lectures ?? collect();

        if (!$user->student) {
            return redirect()->route('student-details.create');
        }

        $courses_count = Course::count();
        $lectures_count = Lecture::count();

        // جلب المساقات اللي مسجل فيها المستخدم الحالي
        $registered_courses = $user->student->courses()->get();

        // باقي البيانات
        $colleges = College::withCount('courses')->get();
        $collegeLabels = $colleges->pluck('name');
        $collegeCounts = $colleges->pluck('courses_count');

          // Weekly User Activity (assuming there's a 'user_activities' table with a 'created_at' timestamp)
    $activity = UserActivity::select(
        DB::raw("DAYNAME(created_at) as day"),
        DB::raw("COUNT(*) as count")
    )
    ->groupBy('day')
    ->orderByRaw("FIELD(day, 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')")
    ->get();

    $activityDays = $activity->pluck('day');
    $activityCounts = $activity->pluck('count');
        return view('dashboard', [
            'courses_count' => $courses_count,
            'lectures_count' => $lectures_count,
            'registered_courses' => $registered_courses,  // مررها للعرض
            'collegeLabels' => $collegeLabels,
            'collegeCounts' => $collegeCounts,
            'activityDays' => $activityDays,
            'activityCounts' => $activityCounts,
            'course' => $course,
            'lectures' => $lectures,
        ]);
    }

}
