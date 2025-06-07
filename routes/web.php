<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/product/detail/{id}', 'productDetail');
    Route::get('/product/add-cart/{id}', 'addCart')->middleware('auth');
    Route::get('/mycart', 'viewCart')->middleware('auth');
    Route::get('/product/delete/{id}', 'deleteCart')->middleware('auth');
    Route::post('/confirm-order', 'confirmOrder')->middleware('auth');
    Route::get('/myorders', 'viewOrders')->middleware('auth');
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
    Route::get('/admin/view-products', 'viewProducts');
    Route::get('/admin/delete-product/{id}', 'deleteProduct');
    Route::get('/admin/update-product/{id}', 'updateProduct');
    Route::post('/admin/update-product/{id}', 'postUpdateProduct');
    Route::get('/admin/product-search', 'searchProduct');
    Route::get('/admin/orders', 'viewOrders');
    Route::get('/on-the-way/{id}', 'ontheway');
    Route::get('/delivered/{id}', 'delivered');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
