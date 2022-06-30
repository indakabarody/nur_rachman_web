<?php

use App\Http\Controllers\Guest\AboutController as GuestAboutController;
use App\Http\Controllers\Guest\EducationController as GuestEducationController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
use Illuminate\Support\Facades\Route;

Route::middleware('applywebsettings')->group(function () {
    Route::get('/', [GuestHomeController::class, 'index'])->name('home');

    Route::prefix('/pages')->name('pages.')->group(function () {
        Route::get('/', [GuestPageController::class, 'index'])->name('index');
        Route::get('/{slug}', [GuestPageController::class, 'show'])->name('show');
    });

    Route::prefix('/abouts')->name('abouts.')->group(function () {
        Route::get('/', [GuestAboutController::class, 'index'])->name('index');
        Route::get('/{slug}', [GuestAboutController::class, 'show'])->name('show');
    });

    Route::prefix('/educations')->name('educations.')->group(function () {
        Route::get('/', [GuestEducationController::class, 'index'])->name('index');
        Route::get('/{slug}', [GuestEducationController::class, 'show'])->name('show');
    });

    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/', [GuestPostController::class, 'index'])->name('index');
        Route::get('/{slug}', [GuestPostController::class, 'show'])->name('show');
    });
});
