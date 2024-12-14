<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('name')->take(12)->paginate(6);
        return view('index',[
            'products'=>$products
        ]);
    }

    public function home(){
        $products = Product::inRandomOrder()->take(12)->paginate(6);
        return view('home',[
            'products'=>$products
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    public function detailProduct($id){
        $product = Product::findOrFail($id);
        $products = Product::inRandomOrder()->take(6)->get();
        return view('detail-products',[
            'product'=>$product,
            'products'=>$products
        ]);
    }
}
