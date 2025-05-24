<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Post2Controller extends Controller
{
    //

    public function index()
{
    $posts = Post::with(['user', 'comments.user'])->latest()->paginate(10);
    $user = auth()->user();
    $registered_courses = $user->student->courses; // أو حسب العلاقة الموجودة عندك

    return view('chatboard.index',
    compact('posts','registered_courses'));
}

public function store(Request $request)
{
    $request->validate(['content' => 'required|string']);
    // Post::create([
    //     'user_id' => auth()->id(),
    //     'content' => $request->content,

    //     'image_path' => 'nullable|image|max:2048',    // صورة بحجم أقصى 2 ميجا
    //     'file_path' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,txt|max:5120', // ملف بحجم أقصى 5 ميجا
    //     'link' => 'nullable|url',
    // ]);



    $post = new Post();
    $post->content = $request->content;
    $post->user_id = auth()->id();

    // حفظ الصورة إذا تم رفعها
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts/images', 'public');
        $post->image_path = $imagePath;
    }

    // حفظ الملف إذا تم رفعه
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('posts/files', 'public');
        $post->file_path = $filePath;
    }

    // حفظ الرابط
    $post->link = $request->input('link');


    $post->save();

    return redirect()->back()->with('success', 'Post created successfully!');
}



public function myPosts()
{
    $posts = auth()->user()->posts()->latest()->get();

    return view('chatboard.my-posts', compact('posts'));
}


public function destroy(Post $post)
{
    if ($post->user_id !== auth()->id()) {
        abort(403);
    }

    $post->delete();
    return redirect()->route('posts.mine')->with('success', 'تم حذف المنشور.');
}


   // Show form to edit a specific post
   public function edit($id)
   {
       $post = Post::findOrFail($id);

       // Optional: authorize that the user owns the post
       if ($post->user_id !== auth()->id()) {
           abort(403); // Forbidden
       }

       return view('chatboard.edit', compact('post'));
   }

   // Update the post
   public function update(Request $request, $id)
   {
       $request->validate([
           'content' => 'required|string|max:1000',
       ]);

       $post = Post::findOrFail($id);

       // Optional: authorize that the user owns the post
       if ($post->user_id !== auth()->id()) {
           abort(403);
       }

       $post->content = $request->content;
       $post->save();

       return redirect()->route('posts.mine')->with('success', 'Post updated successfully.');
   }



}
