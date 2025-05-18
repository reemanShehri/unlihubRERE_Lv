<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files = File::with('user', 'course')->get();
        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $courses = Course::all();


        return view('admin.files.create', compact('users', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */


    //  public function store(Request $request)
    //  {
    //      $validated = $request->validate([
    //          'name' => 'required|string|max:255',
    //          'file' => 'required|file|max:10240', // مثلا 10 ميجابايت كحد أقصى
    //          'user_id' => 'required|exists:users,id',
    //          'course_id' => 'required|exists:courses,id',
    //      ]);

    //      // رفع الملف على القرص public/uploads
    //      if ($request->hasFile('file')) {
    //          // خزن الملف واحصل على المسار داخل التخزين public
    //          $path = $request->file('file')->store('uploads', 'public');
    //          $file->path = str_replace('public/', '', $path); // يزيل 'public/' إذا كان موجودًا

    //      } else {
    //          return back()->withErrors(['file' => 'File is required']);
    //      }

    //      // إنشاء السجل مع المسار الصحيح
    //      $file = new File();
    //      $file->name = $validated['name'];
    //      $file->path = $path;  // مسار الملف المحفوظ
    //      $file->user_id = $validated['user_id'];
    //      $file->course_id = $validated['course_id'];
    //      $file->save();


    //      return redirect()->route('admin.files.index')->with('success', 'File uploaded successfully.');
    //  }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'file_url' => 'required|url',
        'user_id' => 'required|exists:users,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    // نخزن الرابط بدل مسار الملف
    $file = new File();
    $file->name = $validated['name'];
    $file->path = $validated['file_url']; // path هنا راح يخزن الرابط
    $file->user_id = $validated['user_id'];
    $file->course_id = $validated['course_id'];
    $file->save();

    return redirect()->route('admin.files.index')->with('success', 'File link saved successfully.');
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
    public function edit($id)
{
    $file = File::findOrFail($id);
    $users = User::all();
    $courses = Course::all();

    return view('admin.files.edit', compact('file', 'users', 'courses'));
}

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $file = File::findOrFail($id);

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'user_id' => 'required|exists:users,id',
    //         'course_id' => 'required|exists:courses,id',
    //         'file' => 'nullable|file|max:10240',  // 10MB max مثلاً
    //     ]);

    //     $file->name = $validated['name'];
    //     $file->user_id = $validated['user_id'];
    //     $file->course_id = $validated['course_id'];

    //     if ($request->hasFile('file')) {
    //         // حذف الملف القديم من التخزين
    //         if ($file->path && \Storage::disk('public')->exists($file->path)) {
    //             \Storage::disk('public')->delete($file->path);
    //         }
    //         // حفظ الملف الجديد
    //         $file->path = $request->file('file')->store('uploads', 'public');
    //     }

    //     $file->save();

    //     return redirect()->route('admin.files.index')->with('success', 'File updated successfully');
    // }


    public function update(Request $request, File $file)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'file_url' => 'required|url',
        'user_id' => 'required|exists:users,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    $file->name = $validated['name'];
    $file->path = $validated['file_url']; // نحدث الرابط هنا
    $file->user_id = $validated['user_id'];
    $file->course_id = $validated['course_id'];
    $file->save();

    return redirect()->route('admin.files.index')->with('success', 'File link updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->path);
        $file->delete();
        return redirect()->route('admin.files.index')->with('success', 'File deleted.');
    }
}
