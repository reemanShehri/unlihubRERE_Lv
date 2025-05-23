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
            // return redirect()->route('admin.dashboard');

        }

        $colleges = College::all(); // Fetch colleges from the College model
        return view('student-details.create', compact('universities', 'majors', 'colleges'));
    }



    // public function store(Request $request)
    // {
    //     $user = Auth::user();

    //     // إذا كان المستخدم **ليس** أدمن، نتحقق من الحقول
    //     if ($user->role !== 'admin') {
    //         $request->validate([
    //             'university_id' => 'required|exists:universities,id',
    //             'major_id' => 'required|exists:majors,id',
    //             'college_id' => 'required|exists:colleges,id',
    //         ]);
    //     } else {
    //         // إذا كان أدمن، نتحقق فقط إن كانت الحقول موجودة فهي صحيحة
    //         $request->validate([
    //             'university_id' => 'nullable|exists:universities,id',
    //             'major_id' => 'nullable|exists:majors,id',
    //             'college_id' => 'nullable|exists:colleges,id',
    //         ]);
    //     }

    //     Student::create([
    //         'user_id' => $user->id,
    //         'university_id' => $request->university_id,
    //         'major_id' => $request->major_id,
    //         'college_id' => $request->college_id,
    //     ]);

    //     return redirect()->route('dashboard');
    // }


    public function store(Request $request)
{
    $user = Auth::user();

    // التحقق من الصلاحيات وحقول البيانات
    if ($user->role !== 'admin') {
        $request->validate([
            'university_id' => 'required|exists:universities,id',
            'major_id' => 'required|exists:majors,id',
            'college_id' => 'required|exists:colleges,id',
        ]);
    } else {
        $request->validate([
            'university_id' => 'nullable|exists:universities,id',
            'major_id' => 'nullable|exists:majors,id',
            'college_id' => 'nullable|exists:colleges,id',
        ]);
    }

    // إنشاء سجل الطالب (فقط إذا لم يكن أدمن أو إذا كانت الحقول موجودة)
    if ($user->role !== 'admin' || ($request->university_id && $request->major_id && $request->college_id)) {
        Student::create([
            'user_id' => $user->id,
            'university_id' => $request->university_id,
            'major_id' => $request->major_id,
            'college_id' => $request->college_id,
        ]);
    }

    // إعادة التوجيه حسب الصلاحية
    return $user->role === 'admin'
        ? redirect()->route('admin.dashboard')  // للأدمن
        : redirect()->route('dashboard');       // للطلاب
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
