<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //

    public function toggle($postId)
{
    $user = Auth::user();
    $like = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

    if ($like) {
        $like->delete(); // إلغاء اللايك
    } else {
        Like::create([
            'user_id' => $user->id,
            'post_id' => $postId,
        ]);
    }

    return back();
}
}
