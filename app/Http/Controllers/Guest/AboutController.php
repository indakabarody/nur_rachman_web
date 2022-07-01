<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::where('show_about', 1)->get();
    }

    public function show($slug)
    {
        $about = About::where(['slug' => $slug, 'show_about' => 1])->firstOrFail();
        return view('pages.abouts.show', compact('about'));
    }
}
