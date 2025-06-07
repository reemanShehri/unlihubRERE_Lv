<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewPostNotification;

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


    $post = new Post();
    $post->content = $request->content;
    $post->user_id = auth()->id();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('images/posts/images');
        $image->move($destinationPath, $imageName);
        $post->image_path = 'posts/images/' . $imageName;  // بدون 'images/' لأنه مضاف في Blade
    }


    // حفظ الملف إذا تم رفعه
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('posts/files', 'public');
        $post->file_path = $filePath;
    }

    // حفظ الرابط
    $post->link = $request->input('link');


    $post->save();
 auth()->user()->notify(new NewPostNotification($post));

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
