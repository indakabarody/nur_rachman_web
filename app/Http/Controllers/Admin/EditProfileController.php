<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.edit-profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
        ]);

        if ($request->image != NULL) {
            $path = public_path('storage/user-images/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file)->save($path . '/' . $fileName);

            $img->fit(600);
            $img->save($path . '/' . $fileName);

            $user->update([
                'image' => $fileName
            ]);
        }

        if ($request->image_remove != NULL) {
            if ($user->image != NULL) {
                File::delete(public_path('storage/user-images/' . $user->image));
            }

            $user->update([
                'image' => NULL,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('toast_success', 'Berhasil menyimpan profil admin.');
    }
}
