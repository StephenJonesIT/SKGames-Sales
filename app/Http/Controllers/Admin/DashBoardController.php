<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index(){
        $userCount = User::where('email', 'NOT LIKE', '%admin%')->count();
        $orderCount = Order::count();
        $productCount = Product::count();

        $salesData = Order::select(
        DB::raw('SUM(total_price) as total_sales'),
        DB::raw('MONTH(created_at) as month'))
        ->where('status', '=', 'Hoàn thành')
        ->groupBy('month')
        ->get();

        return view('admin.dashboard',[
            "userCount"=>$userCount,
            "orderCount"=>$orderCount,
            "productCount"=>$productCount,
            "salesData"=>$salesData,
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    
}
