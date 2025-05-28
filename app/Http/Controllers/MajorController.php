<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\College;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $majors = Major::with('college')->latest()->paginate(10);
    //     return view('admin.majors.index', compact('majors'));
    // }

  

public function index(Request $request)
{
    $query = Major::with('college');

    // فلترة حسب اسم التخصص
    if ($request->filled('major_name')) {
        $query->where('name', 'like', '%' . $request->major_name . '%');
    }

    // فلترة حسب اسم الكلية (علاقة college)
    if ($request->filled('college_name')) {
        $query->whereHas('college', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->college_name . '%');
        });
    }

   
    $majors = $query->paginate(10)->withQueryString();

    return view('admin.majors.index', compact('majors'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $colleges = College::all();
        return view('admin.majors.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:majors,name',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Major::create([
            'name' => $request->name,
            'college_id' => $request->college_id,
        ]);

        return redirect()->route('admin.majors.index')->with('success', 'Major created successfully');
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
        $colleges = College::all();
        $major = Major::with('college')->findOrFail($id);
        return view('admin.majors.edit', compact('major', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $major = Major::findOrFail($id); 
        $request->validate([
            'name' => 'required|string|max:255|unique:majors,name,' . $major->id,
            'college_id' => 'required|exists:colleges,id',
        ]);

        $major->update([
            'name' => $request->name,
            'college_id' => $request->college_id,
        ]);

        return redirect()->route('admin.majors.index')->with('success', 'Major updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Major deleted successfully');
    }
}
