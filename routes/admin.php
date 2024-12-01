<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\LoginControler;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware("admin_guest")->prefix('/admin/')->name('admin.')->group(function(){
    Route::get('login',[LoginControler::class, 'showLoginPage'])->name('login.page');
    Route::post('login',[LoginControler::class, 'login'])->name('login');
});


Route::middleware("admin_auth:admin")->prefix('/admin/')->name('admin.')->group(function(){
    Route::get('dashboard',[DashBoardController::class, 'index'])->name('dashbroad');
    Route::get('logout',[DashBoardController::class, 'logout'])->name('logout');

    Route::get('/products',[ProductController::class, 'index'])->name('products');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/products',[ProductController::class,'store'])->name('products.store');
    Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});

