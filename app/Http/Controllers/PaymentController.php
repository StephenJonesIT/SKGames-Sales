<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // Execute post
        $result = curl_exec($ch);
        // Close connection
        curl_close($ch);
        return $result;
    }
    public function momo_repayment(Request $request){
        $order = Order::findOrFail($request->id);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $order->total_price;
        $orderId = $order->id; // Generate a unique order ID
        $redirectUrl = route('momo.callback');
        $ipnUrl = route('momo.ipn');
        $extraData = $request->input('extraData', '');

        // Create HMAC SHA256 signature
        $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=" . time() . "&requestType=payWithATM";
        $signature = hash_hmac('sha256', $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => 'Test',
            'storeId' => 'MomoTestStore',
            'requestId' => time(),
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => 'payWithATM',
            'signature' => $signature
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        if (isset($jsonResult['payUrl'])) {
            // Redirect to MoMo payment URL
            return redirect()->away($jsonResult['payUrl']);
        }
    }

    public function momo_payment(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $user = Auth::user();
        $order = new Order();
        $order->product_id = $product->id;
        $order->user_id = $user->id;
        $order->total_price = $product->price;
        $order->save();

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $product->price;
        $orderId = uniqid(); // Generate a unique order ID
        $redirectUrl = route('momo.callback');
        $ipnUrl = route('momo.ipn');
        $extraData = $request->input('extraData', '');

        // Create HMAC SHA256 signature
        $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=" . time() . "&requestType=payWithATM";
        $signature = hash_hmac('sha256', $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => 'Test',
            'storeId' => 'MomoTestStore',
            'requestId' => time(),
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => 'payWithATM',
            'signature' => $signature
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        if (isset($jsonResult['payUrl'])) {
            // Redirect to MoMo payment URL
            return redirect()->away($jsonResult['payUrl']);
        } else {
            // Handle error case
            return redirect()->route('product.detail', $product->id)
                ->with('error', 'Failed to create MoMo payment. Please try again.');
        }
    }

    public function momoCallback(Request $request)
    {
        $orderId = $request->input('OrderId');
        $resultCode = $request->input('ResultCode'); 
        // Cập nhật trạng thái đơn hàng dựa trên ResultCode 
        if ($resultCode == 1006) { 
            DB::table('orders') ->where('id', $orderId) ->update(['status' => 'Hủy']); 
        } elseif ($resultCode == 0) { 
            // Giao dịch thành công 
            DB::table('orders') ->where('id', $orderId) ->update(['status' => 'Hoàn Thành']); 
        } else { 
            // Xử lý các trường hợp khác nếu cần 
            DB::table('orders') ->where('id', $orderId) ->update(['status' => 'Lỗi thanh toán']); 
        } 
        return redirect()->route('home.orderhistory');
    }


    public function momoIpn(Request $request)
    {
        // Handle MoMo IPN here
        return response()->json(['message' => 'IPN received']);
    }
}
