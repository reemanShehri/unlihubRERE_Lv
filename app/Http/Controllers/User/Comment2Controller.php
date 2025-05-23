<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Comment2Controller extends Controller
{
    //
//     public function store(Request $request, Post $post)
// {
//     $request->validate(['body' => 'required|string']);
//     $post->comments()->create([
//         'user_id' => auth()->id(),
//         'body' => $request->body,
//     ]);
//     return back();
// }

public function storeC(Request $request, Post $post)
{
    $request->validate([
        'body' => 'required|string',
    ]);

    Comment::create([
        'body' => $request->body,
        'user_id' => auth()->id(),
        'post_id' => $post->id,
    ]);

    // dd($request->all());


    return back()->with('success', 'Comment added successfully!');
}


}
