<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

Route::middleware('login_guest')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('index');
    Route::get("/login",[LoginController::class,'showLoginPage'])->name('login.page');
    Route::post("/login",[LoginController::class,'login'])->name('login.post');
    Route::get('/register',[RegisterController::class,'showRegisterPage'])->name('register');
    Route::post('/register',[RegisterController::class,'register'])->name('register.post');
});

Route::controller(SocialController::class)->name('auth.')->group(function(){
    Route::get('/auth/redirection/{provider}','authProviderRedirect')->name('redirection');
    Route::get('/auth/{provider}/callback','googleAuthentication')->name('callback');
});



Route::middleware("login")->group(function(){
    Route::get('/home',[HomeController::class,'home'])->name('home');
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
    Route::post('/momo_payment',[PaymentController::class,'momo_payment'])->name('momo');
});
Route::get('/products/{product}/detail',[HomeController::class,'detailProduct'])->name('product.detail');

require __DIR__.'/admin.php';