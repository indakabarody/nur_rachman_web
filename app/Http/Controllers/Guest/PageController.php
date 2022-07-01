<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::where('show_page', 1)->get();
    }

    public function show($slug)
    {
        $page = Page::where(['slug' => $slug, 'show_page' => 1])->firstOrFail();
        return view('pages.pages.show', compact('page'));
    }
}
