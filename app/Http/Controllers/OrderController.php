<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VouchersModel;
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
            ->select('cake_order.order_id', 'cake_name', 'quantity', 'price', 'total')
            ->where('users.user_id', $uid)
            ->get();
        return view('order.orderDetailAdmin', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    //Show payment page
    public function paymentMethod()
    {
        return view('order.payment');
    }
    //Add cake to cart
    public function addToCart($cake_id)
    {
        $cakeSelected = DB::table('cake')->where('cake_id', $cake_id)->get();
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
        return redirect('/cart');
    }
    public function deleteFromCart($cake_id)
    {
        $cart = session()->get('cart');
        unset($cart[$cake_id]);
        session()->put('cart', $cart);
        return redirect('/cart');
    }
    public function decreaseCake($cake_id)
    {
        $cart = session()->get('cart');
        $cart[$cake_id]['quantity']--;
        session()->put('cart', $cart);
        return redirect('/cart');
    }
    public function increaseCake($cake_id)
    {
        $cart = session()->get('cart');
        $cart[$cake_id]['quantity']++;
        session()->put('cart', $cart);
        return redirect('/cart');
    }
    public function applyVoucher(Request $request)
    {
        $vouchers = VouchersModel::all();
        $check = false;
        $minOrder = 0;
        $percent = 0;
        foreach ($vouchers as $voucher)
        {
            if ($voucher->getAttributes()['voucher_code'] == strtolower($request->voucher_code))
            {
                $check = true;
                $percent = $voucher->getAttributes()['discount_percentage'];
                $minOrder = $voucher->getAttributes()['min_order'];
            }
        }
        if ($check)
        {
            return redirect('/cart')->with('percent', $percent)->with('minOrder', $minOrder)->with('check', $check);
        }
        else
        {
            return redirect('/cart')->withErrors(['invalid' => 'Mã giảm giá không hợp lệ']);
        }
    }
    public function placeOrder()
    {
        $cart = session()->get('cart');
        $oid = mt_rand(1000, 9999);
        $cake_order = [
            'order_id' => $oid,
            'user_id' => auth()->user()->user_id,
            'order_date' => today()
        ];
        DB::table('cake_order')->insert($cake_order);
        foreach ($cart as $cakeID => $value)
        {
            $od = [
                'order_id' => $oid,
                'cake_id' => $cakeID,
                'quantity' => $value['quantity'],
                'total' => $value['quantity'] * $value['price']
            ];
            DB::table('order_detail')->insert($od);
        }
        session()->put('cart', []);
        return redirect('/myorder/' . auth()->user()->user_id);
    }
}
