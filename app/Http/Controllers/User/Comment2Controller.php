<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Comment2Controller extends Controller
{
    //
    public function store(Request $request, Post $post)
{
    $request->validate(['body' => 'required|string']);
    $post->comments()->create([
        'user_id' => auth()->id(),
        'body' => $request->body,
    ]);
    return back();
}

}
