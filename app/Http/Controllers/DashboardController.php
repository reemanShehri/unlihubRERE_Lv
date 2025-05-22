<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $course = $user->courses;
        $lectures = $user->lectures;

        if (!$user->student) {
            return redirect()->route('student-details.create');
        }

        $courses_count = Course::count();
        $lectures_count = Lecture::count();

        // جلب المساقات اللي مسجل فيها المستخدم الحالي
        $registered_courses = $user->student->courses()->get();

        // باقي البيانات
        $collegeLabels = ['Engineering', 'Science', 'Medicine'];
        $collegeCounts = [4, 2, 3];

        $activityDays = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
        $activityCounts = [1, 2, 3, 4, 2, 0, 1];

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
