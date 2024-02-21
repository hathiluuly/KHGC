<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $post = Post::where('status', 1)->get();
        return view('User.posts', ['posts' => $post]);
    }
    

    public function showBySlug($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('User.show-detail', ['post' => $post]);
    }
}
