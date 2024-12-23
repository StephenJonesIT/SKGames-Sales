<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([ 'email' => 'required|email', 'password' => 'required|string|min:8', ]); // Thông tin đăng nhập 
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }

        return back()->withErrors([
                'email'=> 'Thông tin đăng nhập không chính xác.'
        ]);
    }

   
}
