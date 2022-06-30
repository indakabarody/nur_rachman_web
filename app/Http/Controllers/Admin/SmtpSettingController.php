<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SmtpSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.pages.smtp-setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'smtp_host' => 'required|string|max:100',
            'smtp_username' => 'required|string|max:100',
            'smtp_password' => 'required|string|max:100',
            'smtp_secure' => 'required|string|max:100',
            'smtp_port' => 'required|numeric',
        ]);

        if ($setting == NULL) {
            Setting::create([
                'smtp_host' => $request->smtp_host,
                'smtp_username' => $request->smtp_username,
                'smtp_password' => $request->smtp_password,
                'smtp_secure' => $request->smtp_secure,
                'smtp_port' => $request->smtp_port,
            ]);
        } else {
            $setting->update([
                'smtp_host' => $request->smtp_host,
                'smtp_username' => $request->smtp_username,
                'smtp_password' => $request->smtp_password,
                'smtp_secure' => $request->smtp_secure,
                'smtp_port' => $request->smtp_port,
            ]);
        }

        return back()->with('toast_success', 'Berhasil menyimpan pengaturan SMTP.');
    }
}
