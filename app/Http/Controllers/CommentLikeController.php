<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentLike;

class CommentLikeController extends Controller
{


public function like(Comment $comment)
{
    $user = auth()->user();

    // Check if already liked
    $alreadyLiked = CommentLike::where('comment_id', $comment->id)
        ->where('user_id', $user->id)
        ->exists();

    if (!$alreadyLiked) {
        CommentLike::create([
            'comment_id' => $comment->id,
            'user_id' => $user->id,
        ]);
    }

    return redirect()->back();
}



public function toggleLike(Comment $comment)
{
    $userId = auth()->id();

    $like = CommentLike::where('comment_id', $comment->id)
        ->where('user_id', $userId)
        ->first();

    if ($like) {
        // حذف اللايك
        $like->delete();
    } else {
        // إضافة لايك
        CommentLike::create([
            'comment_id' => $comment->id,
            'user_id' => $userId,
        ]);
    }

    // return redirect()->back();

    return response()->json([
        'likes_count' => $comment->likes()->count()
    ]);
}

}




