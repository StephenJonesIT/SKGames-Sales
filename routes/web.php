<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get("login",function(){
    return view('auth.login');
});

require __DIR__.'/admin.php';