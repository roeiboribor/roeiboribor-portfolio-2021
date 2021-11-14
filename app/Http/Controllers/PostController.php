<?php

namespace App\Http\Controllers;

use Canvas\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // NOTE: copy vendor/austintoddj/canvas/src/Models/Post.php to project Models folder
        $posts = Post::get();
        return view('blogs.index', ['posts' => $posts]);
    }

    public function show(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('blogs.show', ['post' => $post]);
    }
}
