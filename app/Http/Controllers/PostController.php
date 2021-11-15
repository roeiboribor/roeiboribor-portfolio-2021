<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('blogs.index');
    }

    public function show(Request $request, $slug)
    {
        return view('blogs.show');
    }
}
