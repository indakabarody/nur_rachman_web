<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('show_post', 1)->latest()->get();
        return view('pages.posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where(['slug' => $slug, 'show_post' => 1])->firstOrFail();
        return view('pages.posts.show', compact('post'));
    }
}
