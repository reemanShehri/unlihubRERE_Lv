<?php

namespace App\Http\Controllers\Admin;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $universities = University::all();
        return view('admin.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:universities,name',
            'country' => 'required|string|max:255',
        ]);

        University::create([
            'name' => $request->name,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.universities.index')
                         ->with('success', 'University created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $university = University::findOrFail($id);
        return view('admin.universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $university = University::findOrFail($id);
    return view('admin.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $university = University::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:universities,name,' . $university->id,
            'country' => 'required|string|max:255',
        ]);

        $university->update([
            'name' => $request->name,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.universities.index')
                         ->with('success', 'University updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $university = University::findOrFail($id);
        $university->delete();

        return redirect()->route('admin.universities.index')
                         ->with('success', 'University deleted successfully!');
    }


}
