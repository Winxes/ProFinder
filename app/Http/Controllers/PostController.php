<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     /**
     * Display a listing of posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->get(); // Get all posts, ordered by the most recent
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'photo_path' => 'nullable|string|max:2048',
            'tags' => 'nullable|string',
        ]);

        // Create a new post with validated data
        Post::create([
            'user_id' => Auth::id(), // Set the ID of the authenticated user
            'title' => $request->title,
            'content' => $request->content,
            'photo_path' => $request->photo_path,
            'tags' => $request->tags,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display a specific post.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing an existing post.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update an existing post in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'photo_path' => 'nullable|string|max:2048',
            'tags' => 'nullable|string',
        ]);

        // Update the post with validated data
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'photo_path' => $request->photo_path,
            'tags' => $request->tags,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove a post from the database.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
