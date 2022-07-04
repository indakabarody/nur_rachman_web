<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::where('show_information', 1)->get();
    }

    public function show($slug)
    {
        $information = Information::where(['slug' => $slug, 'show_information' => 1])->firstOrFail();
        return view('pages.informations.show', compact('information'));
    }
}
