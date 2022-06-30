<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.pages.website-setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'website_title' => 'required|string|max:255',
            'copyright_text' => 'required|string|max:255',
        ]);

        if ($setting == NULL) {
            Setting::create([
                'website_title' => $request->website_title,
                'copyright_text' => $request->copyright_text,
            ]);
        } else {
            $setting->update([
                'website_title' => $request->website_title,
                'copyright_text' => $request->copyright_text,
            ]);
        }

        return back()->with('toast_success', 'Berhasil menyimpan pengaturan website.');
    }
}
