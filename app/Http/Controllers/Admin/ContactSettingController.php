<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.pages.contact-setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($setting == NULL) {
            Setting::create([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        } else {
            $setting->update([
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        }

        return back()->with('toast_success', 'Berhasil menyimpan pengaturan kontak.');
    }
}
