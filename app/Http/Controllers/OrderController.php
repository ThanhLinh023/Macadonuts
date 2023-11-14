<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCart()
    {
        return view('cakes.cart');
    }
}
