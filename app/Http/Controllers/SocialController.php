<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function authProviderRedirect($provider){
        if($provider){
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function googleAuthentication(){
        try {
            $googleUser = Socialite::driver('google')->user();
        
        
            $user = User::where('google_id',$googleUser->id)->first();
        
            if($user != null){
                Auth::login($user);
                return redirect()->route('home');
            }else{
                $userData = User::create([
                    'name'=>$googleUser->name,
                    'email' => $googleUser->email,
                    'password'=> Hash::make("password@123"),
                    'google_id' => $googleUser->id,
                ]);

                if($userData){
                    Auth::login($userData);
                    return redirect()->route('home');
                }
            }
          
        } catch (Exception $e) {
            dd($e);
            return redirect('/')->with('error', 'Đăng nhập thất bại!');
        }
    }
}
