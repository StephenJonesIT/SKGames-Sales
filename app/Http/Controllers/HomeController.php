<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where('status', '!=', 'Deleted')
                   ->orderBy('name')
                   ->take(12)
                   ->paginate(6);

        return view('index',[
            'products'=>$products
        ]);
    }

    public function home(){
        $products = Product::where('status', '!=', 'Deleted')
                    ->inRandomOrder()
                    ->take(12)
                    ->paginate(6);

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
        $products = Product::where('status', '!=', 'Deleted')
                ->inRandomOrder()
                ->take(6)
                ->get();
                
        return view('detail-products',[
            'product'=>$product,
            'products'=>$products
        ]);
    }

    public function products(){
        $products = Product::where('status','!=','Deleted')
        ->where('price', '>', 2000000)
        ->inRandomOrder()
        ->take(6)
        ->get();

        $minPrices = Product::where('status','!=','Deleted')
        ->where('price','<',2000000)
        ->inRandomOrder()
        ->take(6)
        ->paginate(3);

        return view('products-list',['products'=>$products,'filterApplied' => false, 'minprices'=>$minPrices]);
    }

    public function orderHistory(){
        $orders = DB::table('orders')
                ->join('products','orders.product_id','=','products.id')
                ->join('users','orders.user_id','=','users.id')
                ->select('orders.*','users.name as user_name','products.name as product_name')
                ->where('orders.user_id',Auth::id())
                ->orderBy('created_at','DESC')
                ->take(10)
                ->paginate(5);
                
        $products = Product::where('status','!=','Deleted')
                ->inRandomOrder()
                ->take(6)
                ->get();
        return view('order-history',[
            'orders'=>$orders,
            'products'=>$products,
        ]);
    }
}
