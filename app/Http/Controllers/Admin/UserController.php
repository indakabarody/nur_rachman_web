<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '!=', 'Super Admin')->orderBy('name', 'DESC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
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
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('toast_success', 'Berhasil menambahkan user.');
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
        $user = User::where('id', $id)->where('role', '!=', 'Super Admin')->firstOrFail();
        return view('admin.pages.users.edit', compact('user'));
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
        $user = User::where('id', $id)->where('role', '!=', 'Super Admin')->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
            'role' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:3000',
            'image_remove' => 'nullable',
            'is_activated' => 'nullable|numeric',
            'password' => ['nullable', Rules\Password::defaults()],
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

        if ($request->password != NULL) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_activated' => $request->is_activated ?? 0,
            'password' => $password
        ]);

        return redirect()->route('admin.users.index')->with('toast_success', 'Berhasil menyimpan user.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->where('role', '!=', 'Super Admin')->firstOrFail();

        if ($user->image != NULL) {
            File::delete(public_path('storage/user-images/' . $user->image));
        }

        $user->delete();

        return back()->with('toast_success', 'Berhasil menghapus user.');
    }
}
