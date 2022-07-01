<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::where('show_education', 1)->get();
    }

    public function show($slug)
    {
        $education = Education::where(['slug' => $slug, 'show_education' => 1])->firstOrFail();
        return view('pages.educations.show', compact('education'));
    }
}
