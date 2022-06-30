<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\ChangePasswordController as AdminChangePasswordController;
use App\Http\Controllers\Admin\ContactSettingController as AdminContactSettingController;
use App\Http\Controllers\Admin\EditProfileController as AdminEditProfileController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SmtpSettingController as AdminSmtpSettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WebsiteSettingController as AdminWebsiteSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'active', 'applywebsettings'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::prefix('/edit-profile')->name('edit-profile.')->group(function () {
        Route::get('/', [AdminEditProfileController::class, 'index'])->name('index');
        Route::put('/', [AdminEditProfileController::class, 'update'])->name('update');
    });

    Route::prefix('/change-password')->name('change-password.')->group(function () {
        Route::get('/', [AdminChangePasswordController::class, 'index'])->name('index');
        Route::put('/', [AdminChangePasswordController::class, 'update'])->name('update');
    });

    Route::resource('users', AdminUserController::class)->middleware('superadmin');

    Route::resource('pages', AdminPageController::class);

    Route::resource('posts', AdminPostController::class);

    Route::resource('educations', AdminEducationController::class);

    Route::resource('abouts', AdminAboutController::class);

    Route::prefix('/website-setting')->name('website-setting.')->group(function () {
        Route::get('/', [AdminWebsiteSettingController::class, 'index'])->name('index');
        Route::put('/', [AdminWebsiteSettingController::class, 'update'])->name('update');
    });

    Route::prefix('/smtp-setting')->name('smtp-setting.')->group(function () {
        Route::get('/', [AdminSmtpSettingController::class, 'index'])->name('index');
        Route::put('/', [AdminSmtpSettingController::class, 'update'])->name('update');
    });

    Route::prefix('/contact-setting')->name('contact-setting.')->group(function () {
        Route::get('/', [AdminContactSettingController::class, 'index'])->name('index');
        Route::put('/', [AdminContactSettingController::class, 'update'])->name('update');
    });
});
