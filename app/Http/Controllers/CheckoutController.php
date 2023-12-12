<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function Payment()
    {
        //Save order to database
        $cart = session()->get('cart');
        $oid = mt_rand(1000, 9999);
        $cake_order = [
            'order_id' => $oid,
            'user_id' => auth()->user()->user_id,
            'order_date' => today()
        ];
        DB::table('cake_order')->insert($cake_order);
        $total = 0;
        foreach ($cart as $cakeID => $value)
        {
            $total += ($value['quantity'] * $value['price']);
            $od = [
                'order_id' => $oid,
                'cake_id' => $cakeID,
                'quantity' => $value['quantity'],
                'total' => $value['quantity'] * $value['price']
            ];
            DB::table('order_detail')->insert($od);
        }
        session()->put('cart', []);
        //Direct to payment gate of VN Pay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/myorder";
        $vnp_TmnCode = "ZJVFWO4O";//Mã website tại VNPAY 
        $vnp_HashSecret = "GHYAYARTBYKHOAKRMQYUKINZHOVSCEWJ"; //Chuỗi bí mật

        $vnp_TxnRef = $oid; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng có mã ' . $oid;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) 
        {
            header('Location: ' . $vnp_Url);
            die();
        } else 
        {
            echo json_encode($returnData);
        }
    }
}