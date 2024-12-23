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

    public function socialAuthentication($provider){
        try {
            if($provider){
                
            
                $socialUser = Socialite::driver($provider)->user();
        
        
                $user = User::where('auth_provider_id',$socialUser->id)->first();
            
                if($user != null){

                    Auth::login($user);

                }else{
                    $userData = User::create([
                        'name'=>$socialUser->name,
                        'email' => $socialUser->email,
                        'password'=> Hash::make("password@123"),
                        'auth_provider_id' => $socialUser->id,
                        'auth_provider'=>$provider,
                    ]);
    
                    if($userData){
                        
                        Auth::login($userData);
                        
                    }
                }
                return redirect()->route('home');
            }
            abort(404); 
        } catch (Exception $e) {
            dd($e);
            return redirect('/')->with('error', 'Đăng nhập thất bại!');
        }
    }
}
