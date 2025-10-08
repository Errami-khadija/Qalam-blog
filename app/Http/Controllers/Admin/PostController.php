<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function dashboard()
    {
        $posts = Post::with('category')->latest()->get();
        $categories = Category::all();
        return view('admin/dashboard', compact('posts', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        $validated['user_id'] = Auth::id() ?? 1; // fallback if no auth

        Post::create($validated);

        return redirect()->route('dashboard.home')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin/dashboard', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('dashboard.home')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard.home')->with('success', 'Post deleted successfully.');
    }
}
