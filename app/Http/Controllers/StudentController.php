<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Major;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    $users = User::all();
    $universities = University::all();
    $majors = Major::all();

    return view('admin.students.create', compact('users', 'universities', 'majors'));
}

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'university_id' => 'required|exists:universities,id',
        'major_id' => 'required|exists:majors,id',
    ]);

    Student::create($validated);

    return redirect()->route('admin.students.index')->with('success', 'Student created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::with(['university', 'major'])->findOrFail($id);
        $universities = University::all();
        $majors = Major::where('college_id', $student->major->college_id ?? null)->get();

        return view('admin.students.edit', compact('student', 'universities', 'majors'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'university_id' => 'required|exists:universities,id',
            'major_id' => 'required|exists:majors,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'university_id' => $request->university_id,
            'major_id' => $request->major_id,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')
                         ->with('success', 'Student deleted successfully!');
    }


}
