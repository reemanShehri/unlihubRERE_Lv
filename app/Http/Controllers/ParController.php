<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ParController extends Controller
{
    //

    public function index()
{
    // كل الكورسات
    $courses = Course::withCount('students')->get();
    return view('users.courses.index', compact('courses'));
}

public function show($id)
{
    // جلب الكورس المحدد مع الطلاب المسجلين فيه
    $course = Course::with('students')->findOrFail($id);
    return view('users.courses.show', compact('course'));
}

}
