<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\LoginControler;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware("admin_guest")->prefix('/admin/')->name('admin.')->group(function(){
    Route::get('login',[LoginControler::class, 'showLoginPage'])->name('login.page');
    Route::post('login',[LoginControler::class, 'login'])->name('login');
});


Route::middleware("admin_auth:admin")->prefix('/admin/')->name('admin.')->group(function(){
    Route::get('dashboard',[DashBoardController::class, 'index'])->name('dashbroad');
    Route::get('logout',[DashBoardController::class, 'logout'])->name('logout');

    Route::name('products.')->group(function(){
        Route::get('/products',[ProductController::class, 'index'])->name('index');
        Route::get('/products/create',[ProductController::class,'create'])->name('create');
        Route::post('/products',[ProductController::class,'store'])->name('store');
        Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('edit');
        Route::put('/products/{product}',[ProductController::class,'update'])->name('update');
        Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('destroy');
    });
   
    Route::name('users.')->group(function(){
        Route::get(('/users'),[UserController::class,'index'])->name('index');
        Route::get('/users/create',[UserController::class,'create'])->name('create');
        Route::post('/users',[UserController::class,'store'])->name('store');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('edit');
        Route::put('/users/{user}',[UserController::class,'update'])->name('update');
        Route::delete('/users/{user}',[UserController::class,'destroy'])->name('destroy');
    });
});

