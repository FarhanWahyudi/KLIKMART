<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
});

Route::controller(AdminController::class)->middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'index');
    Route::get('/admin/view-category', 'viewCategory');
    Route::post('/admin/add-category', 'addCategory');
    Route::get('/delete-category/{id}', 'deleteCategory');
    Route::get('/update-category/{id}', 'updateCategory');
    Route::post('/update-category/{id}', 'postUpdateCategory');
    Route::get('/admin/add-product', 'addProduct');
    Route::post('/admin/add-product', 'postAddProduct');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
