<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMedias = SocialMedia::all();
        return view('admin.pages.social-medias.index', compact('socialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.social-medias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:512',
        ]);

        SocialMedia::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.social-medias.index')->with('toast_success', 'Berhasil menambahkan data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('admin.pages.social-medias.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:512',
            'show_social_media' => 'nullable|numeric',
        ]);

        $socialMedia->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'url' => $request->url,
            'show_social_media' => $request->show_social_media ?? 0,
        ]);

        return redirect()->route('admin.social-medias.index')->with('toast_success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        $socialMedia->delete();

        return back()->with('toast_success', 'Berhasil menghapus data.');
    }
}
