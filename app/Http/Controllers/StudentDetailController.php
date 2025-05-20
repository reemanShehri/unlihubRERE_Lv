<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\College;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use Illuminate\Support\Facades\Auth;

class StudentDetailController extends Controller
{
    public function create()
    {
        // هنا تجيب بيانات الجامعات والتخصصات لإظهارها في الفورم
        $universities = University::all();
        $majors = Major::all();
        if (Auth::user()->role === 'admin') {
            abort(403, 'Unauthorized action.'); // أو رجّعي redirect مثلاً
        }

        $colleges = College::all(); // Fetch colleges from the College model
        return view('student-details.create', compact('universities', 'majors', 'colleges'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'university_id' => 'required|exists:universities,id',
            'major_id' => 'required|exists:majors,id',
            'college_id' => 'required|exists:colleges,id', // Validate college_id
        ]);

        Student::create([
            'user_id' => Auth::id(),
            'university_id' => $request->university_id,
            'major_id' => $request->major_id,
            'college_id' => $request->college_id, // Store college_id
        ]);

        return redirect()->route('dashboard'); // او اي صفحة بعد الاضافة
    }



    public function edit()
{
    $student = Auth::user()->student;
    $universities = University::all();
    $colleges = College::all();
    $majors = Major::all();

    return view('student-details.edit', compact('student', 'universities', 'colleges', 'majors'));
}

public function update(Request $request)
{
    $request->validate([
        'university_id' => 'required|exists:universities,id',
        'college_id' => 'required|exists:colleges,id',
        'major_id' => 'required|exists:majors,id',
    ]);

    Auth::user()->student->update($request->only(['university_id', 'college_id', 'major_id']));

    return redirect()->route('profile.edit')->with('status', 'academic-info-updated');
}
}
