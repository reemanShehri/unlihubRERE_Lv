<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\University;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $colleges = College::all();
        return view('admin.colleges.index', compact('colleges'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $universities = University::all();
        return view('admin.colleges.create',compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:colleges,name',
            'university_id' => 'required|exists:universities,id',
        ]);

        College::create([
            'name' => $request->name,
            'university_id' => $request->university_id,
        ]);

        return redirect()->route('admin.colleges.index')->with('success', 'College added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $college = College::findOrFail($id);
        $universities = University::all();
        return view('admin.colleges.edit', compact('college', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $college = College::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:colleges,name,' . $college->id,
        ]);

        $college->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.colleges.index')->with('success', 'College updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $college->delete();
        return redirect()->route('admin.colleges.index')->with('success', 'College deleted successfully.');
    }
}
