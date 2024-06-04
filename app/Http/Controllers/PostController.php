<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::latest()->get();

        // Pass the posts to the 'posts' view
        return view('posts', [
            'title' => 'All Posts',
            'active' => 'posts',
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Fetch the post by its slug
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'title' => $post->title,
            'post' => $post,
            'active' => 'posts'
        ]);
    }
}
