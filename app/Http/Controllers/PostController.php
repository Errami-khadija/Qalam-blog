<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{


    public function __construct()
{
    // All actions except index/show require login
    $this->middleware('auth')->except(['index', 'show']);

    // Only admin can create/edit/delete
    $this->middleware('is_admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
}

    public function index()
    {
       

     $posts = Post::with('category')->get(); // eager load category
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'status' => 'required|in:draft,published',
        'category_id' => 'required|exists:categories,id',
    ]);


    Post::create($validated);

    return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $post = Post::with('category')->findOrFail($id);
    return view('posts/post', compact('post'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
