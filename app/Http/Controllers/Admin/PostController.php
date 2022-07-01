<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
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
            'title' => 'required|string|max:255|unique:posts',
            'thumbnail' => 'nullable|file|mimes:png,jpg,jpeg,gif|max:4096',
            'content' => 'required|string|max:4294967295',
            'type' => 'required|string',
        ]);

        if ($request->thumbnail != NULL) {
            $path = storage_path('app/public/post-thumbnails/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $thumbnailFile = $request->file('thumbnail');
            $thumbnailFileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $thumbnailFile->getClientOriginalExtension();
            $img = Image::make($thumbnailFile)->save($path . '/' . $thumbnailFileName);
            $img->save($path . '/' . $thumbnailFileName);
        }

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'thumbnail' => $thumbnailFileName ?? NULL,
            'slug' => Str::slug($request->title),
            'type' => $request->type,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.posts.index')->with('toast_success', 'Berhasil menambahkan data.');
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
        $post = Post::findOrFail($id);
        return view('admin.pages.posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id . ',id',
            'thumbnail' => 'nullable|file|mimes:png,jpg,jpeg,gif|max:4096',
            'thumbnail_remove' => 'nullable|numeric',
            'content' => 'required|string|max:65535',
            'type' => 'required|string',
            'show_post' => 'nullable|numeric',
        ]);

        if ($request->thumbnail != NULL) {
            $path = storage_path('app/public/post-thumbnails/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $thumbnailFile = $request->file('thumbnail');
            $thumbnailFileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $thumbnailFile->getClientOriginalExtension();
            $img = Image::make($thumbnailFile)->save($path . '/' . $thumbnailFileName);
            $img->save($path . '/' . $thumbnailFileName);
        }

        if ($request->thumbnail_remove != NULL) {
            if ($post->thumbnail != NULL) {
                File::delete(storage_path('app/public/post-thumbnails/' . $post->thumbnail));
            }

            $post->update([
                'thumbnail' => NULL,
            ]);
        }

        $post->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'logo' => $logoFileName ?? $post->logo,
            'content' => $request->content,
            'type' => $request->type,
            'show_post' => $request->show_post ?? 0,
        ]);

        return redirect()->route('admin.posts.index')->with('toast_success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return back()->with('toast_success', 'Berhasil menghapus data.');
    }
}
