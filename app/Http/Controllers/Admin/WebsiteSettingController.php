<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
            'logo' => 'nullable|file|mimes:png,jpg,jpeg,gif|max:4096',
            'hero_image' => 'nullable|file|mimes:png,jpg,jpeg,gif|max:10240',
            'hero_text' => 'nullable|string|max:255',
            'accent_color' => 'required|string|max:10',
            'copyright_text' => 'required|string|max:255',
        ]);

        if ($request->logo != NULL) {
            $path = storage_path('app/public/logos/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $logoFile = $request->file('logo');
            $logoFileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $logoFile->getClientOriginalExtension();
            $img = Image::make($logoFile)->save($path . '/' . $logoFileName);
            $img->save($path . '/' . $logoFileName);
        }

        if ($request->logo_remove != NULL) {
            if ($setting->logo != NULL) {
                File::delete(storage_path('app/public/logos/' . $setting->logo));
            }

            $setting->update([
                'logo' => NULL,
            ]);
        }

        if ($request->hero_image != NULL) {
            $path = storage_path('app/public/hero-images/');

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $heroImageFile = $request->file('hero_image');
            $heroImageFileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $heroImageFile->getClientOriginalExtension();
            $img = Image::make($heroImageFile)->save($path . '/' . $heroImageFileName);
            $img->save($path . '/' . $heroImageFileName);
        }

        if ($request->hero_image_remove != NULL) {
            if ($setting->hero_image != NULL) {
                File::delete(storage_path('app/public/hero-images/' . $setting->hero_image));
            }

            $setting->update([
                'hero_image' => NULL,
            ]);
        }

        if ($setting == NULL) {
            Setting::create([
                'website_title' => $request->website_title,
                'logo' => $logoFileName ?? NULL,
                'hero_image' => $heroImageFileName ?? NULL,
                'hero_text' => $request->hero_text,
                'accent_color' => $request->accent_color,
                'copyright_text' => $request->copyright_text,
            ]);
        } else {
            $setting->update([
                'website_title' => $request->website_title,
                'logo' => $logoFileName ?? $setting->logo,
                'hero_image' => $heroImageFileName ?? $setting->hero_image,
                'hero_text' => $request->hero_text,
                'accent_color' => $request->accent_color,
                'copyright_text' => $request->copyright_text,
            ]);
        }

        return back()->with('toast_success', 'Berhasil menyimpan pengaturan website.');
    }
}
