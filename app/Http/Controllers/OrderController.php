<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //Show shopping cart
    public function showCart()
    {
        $cart = session()->get('cart');
        return view('cakes.cart', [
            'cart' => $cart
        ]);
    }
    //Information of all customers' order for admin
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
    //Show customer's order detail
    public function customerOrder()
    {
        $order = DB::table('cake_order')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->where('users.user_id', auth()->user()->user_id)
            ->select('order_id', 'total_money')
            ->get();
        $orderDetail = DB::table('order_detail')
            ->leftJoin('cake_order', 'cake_order.order_id', '=', 'order_detail.order_id')
            ->leftJoin('cake', 'cake.cake_id', '=', 'order_detail.cake_id')
            ->leftJoin('users', 'cake_order.user_id', '=', 'users.user_id')
            ->select('cake_order.order_id', 'cake_name', 'quantity', 'price', 'total', 'image')
            ->where('users.user_id', auth()->user()->user_id)
            ->get();
        return view('order.customerOrders', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    //Show customer's order detail for admin
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
            ->select('cake_order.order_id', 'cake_name', 'quantity', 'price', 'total', 'image')
            ->where('users.user_id', $uid)
            ->get();
        return view('order.orderDetailAdmin', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    //Add cake to cart
    public function addToCart(Request $request)
    {
        $cakeSelected = DB::table('cake')->where('cake_id', $request->input('cake_id'))->get();
        $cart = session()->get('cart');
        if ($cart != null)
        {
            if (in_array($cakeSelected[0]->cake_id, array_values($cart)))
            {
                $cart[$cakeSelected[0]->cake_id]['quantity']++;
            }
        }
        $cart[$cakeSelected[0]->cake_id] = [
            'cake_name' => $cakeSelected[0]->cake_name,
            'image' => $cakeSelected[0]->image,
            'note' => $cakeSelected[0]->note,
            'quantity' => 1
        ];
        if ($cakeSelected[0]->isDiscount == 1)
        {
            $cart[$cakeSelected[0]->cake_id]['price'] = $cakeSelected[0]->discount_price;
        }
        else
        {
            $cart[$cakeSelected[0]->cake_id]['price'] = $cakeSelected[0]->price;
        }
        session()->put('cart', $cart);
        return redirect('/cakes/menu');
    }
    public function deleteFromCart(Request $request)
    {
        $cart = session()->get('cart');
        unset($cart[$request->input('cake_id')]);
        session()->put('cart', $cart);
        return response()->json([
            'html' => view('cakes.cart', ['cart' => $cart])->render()
        ]);
    }
    public function decreaseCake(Request $request)
    {
        $cart = session()->get('cart');
        $cart[$request->input('cake_id')]['quantity']--;
        session()->put('cart', $cart);
        return response()->json([
            'html' => view('cakes.cart', ['cart' => $cart])->render()
        ]);
    }
    public function increaseCake(Request $request)
    {
        $cart = session()->get('cart');
        $cart[$request->input('cake_id')]['quantity']++;
        session()->put('cart', $cart);
        return response()->json([
            'html' => view('cakes.cart', ['cart' => $cart])->render()
        ]);
    }
    public function showRevenue()
    {
        return view('order.revenue');
    }
    public function calculate($month, $year)
    {
        $soldMar = DB::table('order_detail')
                        ->leftJoin('cake_order', 'cake_order.order_id', '=', 'order_detail.order_id')
                        ->leftJoin('cake', 'cake.cake_id', '=', 'order_detail.cake_id')
                        ->select(DB::raw('SUM(quantity) as slmar'))
                        ->where('cake_type', '=', 'mar')
                        ->where(DB::raw('MONTH(order_date)'), $month)
                        ->where(DB::raw('YEAR(order_date)'), $year)
                        ->get();
        $soldDon = DB::table('order_detail')
                        ->leftJoin('cake_order', 'cake_order.order_id', '=', 'order_detail.order_id')
                        ->leftJoin('cake', 'cake.cake_id', '=', 'order_detail.cake_id')
                        ->select(DB::raw('SUM(quantity) as sldon'))
                        ->where('cake_type', '=', 'don')
                        ->where(DB::raw('MONTH(order_date)'), $month)
                        ->where(DB::raw('YEAR(order_date)'), $year)
                        ->get();
        $totalMoney = DB::table('cake_order')
                        ->select(DB::raw('SUM(total_money) as total'))
                        ->where(DB::raw('MONTH(order_date)'), $month)
                        ->where(DB::raw('YEAR(order_date)'), $year)
                        ->get();
        return [$soldMar[0]->slmar, $soldDon[0]->sldon, $totalMoney[0]->total];
    }
    public function getRevenue(Request $request)
    {
        $number = $this->calculate($request->month, $request->year);
        return view('order.revenue', [
            'mar' => $number[0],
            'don' => $number[1],
            'total' => $number[2]
        ]);
    }
}
