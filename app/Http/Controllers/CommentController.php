<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
     public function store(Request $request, $postId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $postId,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Your comment has been added!');
    }
}
