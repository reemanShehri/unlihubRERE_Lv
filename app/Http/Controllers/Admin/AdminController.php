<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use App\Models\Course;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\College;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
    $name = auth()->user()->name;
    $universitiesCount = University::count();
    $studentsCount = Student::count();
    $coursesCount = Course::count();
    $majorsCount = Major::count();
    $collegesCount = College::count();

    return view('admin.dashboard', compact('name', 'universitiesCount', 'studentsCount', 'coursesCount', 'majorsCount', 'collegesCount'));
}
}
