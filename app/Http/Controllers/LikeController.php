<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
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


public function toggleLike(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id'
    ]);

    $post = Post::findOrFail($request->post_id);
    $user = Auth::user();

    $like = Like::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->first();

    if ($like) {
        $like->delete();
        $isLiked = false;
    } else {
        Like::create([
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);
        $isLiked = true;
    }

    $likesCount = $post->likes()->count();
    $likedUsers = $post->likes()->with('user')->latest()->take(5)->get();

    return response()->json([
        'success' => true,
        'isLiked' => $isLiked,
        'likesCount' => $likesCount,
        'likedUsers' => $likedUsers->map(function ($like) {
            return [
                'id' => $like->user->id,
                'name' => $like->user->name
            ];
        })
    ]);
}

// public function toggle($postId)
// {
//     $user = Auth::user();
//     $post = Post::findOrFail($postId);

//     $like = Like::where('user_id', $user->id)
//                ->where('post_id', $postId)
//                ->first();

//     if ($like) {
//         $like->delete();
//         $liked = false;
//     } else {
//         Like::create([
//             'user_id' => $user->id,
//             'post_id' => $postId,
//         ]);
//         $liked = true;
//     }

//     return response()->json([
//         'liked' => $liked,
//         'likes_count' => $post->likes()->count()
//     ]);
// }



public function likers($postId)
{
    $post = Post::findOrFail($postId);
    $likers = $post->likes()
                   ->with(['user' => function($query) {
                       $query->select('id', 'name');
                   }])
                   ->get()
                   ->pluck('user');

    return response()->json([
        'likers' => $likers
    ]);
}





}
