<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\ChatBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with(['user', 'chatBoard'])->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        $chatBoards = ChatBoard::all();
        return view('admin.posts.create', compact('users', 'chatBoards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'chat_board_id' => 'nullable|exists:chat_boards,id',
            'content' => 'required|string',
        ]);

        Post::create($request->only('user_id', 'chat_board_id', 'content'));

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
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
        $post = Post::findOrFail($id);
        $users = User::all();
        $chatBoards = ChatBoard::all();
        return view('admin.posts.edit', compact('post', 'users', 'chatBoards'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Post $post)
     {
         $request->validate([
             'user_id' => 'required|exists:users,id',
             'chat_board_id' => 'nullable|exists:chat_boards,id',
             'content' => 'required|string',
         ]);

         $post->update($request->only('user_id', 'chat_board_id', 'content'));

         return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
