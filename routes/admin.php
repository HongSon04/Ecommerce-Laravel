<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

/* Admin Routes */

// ? Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:vendor'])->name('admin.dashboard');
// ? Vì bên routeservideprovider đã thêm prefix 'admin' nên không cần thêm 'admin.' ở đây oke ?
// ? Và cũng không cần thêm middleware ở đây vì đã thêm ở routeserviceprovider rồi oke ?

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// ! Profile Routes
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

// ! Slider Routes
Route::resource('slider', SliderController::class);

// ! Category Routes
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);
