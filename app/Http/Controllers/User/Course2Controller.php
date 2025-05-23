<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class Course2Controller extends Controller
{
    //

    public function index()
    {
        $user = auth()->user();
        // $course = Course::findOrFail($courseId);

        // المساقات المسجلة
        $registeredCourses = $user->student->courses;

        // المساقات المقترحة حسب التخصص
        $majorId = $user->student->major_id;
        $suggestedCourses = Course::where('major_id', $majorId)->get();

        return view('user.courses.index', compact('registeredCourses', 'suggestedCourses'));
    }

//     public function register(Request $request)
// {
//     $courseId = $request->input('course_id');
//     $user = auth()->user();

//     // فرضاً عندك علاقة many-to-many بين users و courses
//     // $user->courses()->attach($courseId);

//     $user->courses()->syncWithoutDetaching([$courseId]);


//     return redirect()->back()->with('success', 'Course registered successfully!');
// }


public function register(Request $request)
{
    $user = Auth::user();
    $courseId = $request->input('course_id');

    // تأكد من عدم تسجيل الطالب لنفس الكورس مرتين
    if (!$user->student->courses->contains($courseId)) {
        $user->student->courses()->attach($courseId);
    }

    return redirect()->back()->with('success', 'Course registered successfully!');
}


public function unregister(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
    ]);

    $user = Auth::user();
    // $user->courses()->detach($request->course_id);
    $user->student->courses()->detach($request->course_id);


    return redirect()->back()->with('success', 'Course unregistered successfully.');
}





}
