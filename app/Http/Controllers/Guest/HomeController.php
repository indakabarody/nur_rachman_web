<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentPosts = Post::where('show_post', 1)->latest()->limit(3)->get();
        return view('pages.home.index', compact('recentPosts'));
    }
}
