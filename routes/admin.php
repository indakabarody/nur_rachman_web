<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\ChangePasswordController as AdminChangePasswordController;
use App\Http\Controllers\Admin\EditProfileController as AdminEditProfileController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::prefix('/edit-profile')->name('edit-profile.')->group(function () {
        Route::get('/', [AdminEditProfileController::class, 'index'])->name('index');
        Route::put('/', [AdminEditProfileController::class, 'update'])->name('update');
    });

    Route::prefix('/change-password')->name('change-password.')->group(function () {
        Route::get('/', [AdminChangePasswordController::class, 'index'])->name('index');
        Route::put('/', [AdminChangePasswordController::class, 'update'])->name('update');
    });

    Route::resource('pages', AdminPageController::class);

    Route::resource('posts', AdminPostController::class);

    Route::resource('educations', AdminEducationController::class);

    Route::resource('abouts', AdminAboutController::class);
});
