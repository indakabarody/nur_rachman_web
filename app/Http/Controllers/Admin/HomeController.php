<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Education;
use App\Models\Page;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $pageCount = Page::count();
        $postCount = Post::count();
        $educationCount = Education::count();
        $aboutCount = About::count();

        return view('admin.pages.home.index', compact('pageCount', 'postCount', 'educationCount', 'aboutCount'));
    }
}
