<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Lecture2Controller extends Controller
{
    //

    public function index($courseId)
{
    // Retrieve the course with its lectures
    $course = Course::with('lectures')->findOrFail($courseId);
    $lectures = $course->lectures;
    // Optional: check if the authenticated user is registered for this course
    if (!auth()->user()->courses->contains($course)) {
        abort(403, 'You are not registered for this course.');
    }

    // Return a view or JSON response with the lectures
    return view('user.lectures.index', [
        'course' => $course,
        'lectures' => $course->lectures
    ]);
}

}
