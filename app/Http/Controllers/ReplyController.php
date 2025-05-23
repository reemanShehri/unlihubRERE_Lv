<?php

namespace App\Http\Controllers;
use App\Models\Reply;


use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //

    public function store(Request $request, Comment $comment)
    {
        $request->validate(['body' => 'required|string']);

        Reply::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'comment_id' => $comment->id,
            'parent_id' => $request->parent_id // إذا كنت ترسل parent_id من الفورم
        ]);

        return back()->with('success', 'تم إضافة الرد!');
    }
}
