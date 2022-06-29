<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    Route::prefix('/edit-profile')->name('edit-profile.')->group(function () {
        Route::get('/', [AdminEditProfileController::class, 'index'])->name('index');
        Route::put('/', [AdminEditProfileController::class, 'update'])->name('update');
    });

    Route::prefix('/change-password')->name('change-password.')->group(function () {
        Route::get('/', [AdminChangePasswordController::class, 'index'])->name('index');
        Route::put('/', [AdminChangePasswordController::class, 'update'])->name('update');
    });

});
