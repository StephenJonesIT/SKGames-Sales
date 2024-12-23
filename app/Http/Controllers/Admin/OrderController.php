<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*','users.name as user_name','users.email as user_email','products.name as product_name')
            ->orderBy('created_at','DESC')
            ->paginate(5);
        return view('admin.orders.index',['orders'=>$orders]);
    }

    public function edit($id){
        $order = Order::findOrFail($id);
        return view('admin.orders.edit',['order'=>$order]);
    }
    public function update($id, Request $request){
        $request->validate([
            'status'=>'required|string|in:Hoàn Thành, Hủy',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật thành công.');
    }
}
