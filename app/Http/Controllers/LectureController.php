<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lectures = Lecture::with('course')->latest()->get();
        return view('admin.lectures.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.lectures.create', compact('courses'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
            'course_id' => 'required|exists:courses,id',
            'lecture_date' => 'required|date',
        ]);

        Lecture::create($request->all());

        return redirect()->route('admin.lectures.index')->with('success', 'Lecture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        return view('admin.lectures.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        $courses = Course::all();
        return view('admin.lectures.edit', compact('lecture', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url',
            'course_id' => 'required|exists:courses,id',
            'lecture_date' => 'required|date',
        ]);

        $lecture->update($request->all());

        return redirect()->route('admin.lectures.index')->with('success', 'Lecture updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('admin.lectures.index')->with('success', 'Lecture deleted.');
    }
}
