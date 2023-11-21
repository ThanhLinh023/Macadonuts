<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showCart()
    {
        return view('cakes.cart');
    }
    public function orderManagement()
    {
        $query = DB::table('users')
            ->leftJoin('cake_order', 'cake_order.user_id', '=', 'users.user_id')
            ->leftJoin('order_detail', 'cake_order.order_id', '=', 'order_detail.order_id')
            ->where('users.user_role', '=', 2)
            ->groupBy('users.user_id', 'users.name')
            ->select('users.user_id', 'users.name', DB::raw('COUNT(DISTINCT cake_order.order_id) as sld'))
            ->get();
        return view('order.orderManage', [
            'query' => $query
        ]);
    }
    public function customerOrder($uid)
    {
        $order = DB::table('cake_order')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->where('users.user_id', $uid)
            ->select('order_id', 'total_money')
            ->get();
        $orderDetail = DB::table('order_detail')
            ->leftJoin('cake_order', 'cake_order.order_id', '=', 'order_detail.order_id')
            ->leftJoin('cake', 'cake.cake_id', '=', 'order_detail.cake_id')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->select('cake_order.order_id', 'cake_name', 'quantity', 'price', 'total')
            ->where('users.user_id', $uid)
            ->get();
        return view('order.order', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    public function orderDetailForAdmin($uid)
    {
        $order = DB::table('cake_order')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->where('users.user_id', $uid)
            ->select('order_id', 'total_money', 'users.name')
            ->get();
        $orderDetail = DB::table('order_detail')
            ->leftJoin('cake_order', 'cake_order.order_id', '=', 'order_detail.order_id')
            ->leftJoin('cake', 'cake.cake_id', '=', 'order_detail.cake_id')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->select('cake_order.order_id', 'cake_name', 'quantity', 'price', 'total')
            ->where('users.user_id', $uid)
            ->get();
        return view('order.orderDetail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    public function paymentMethod()
    {
        return view('order.payment');
    }
}
