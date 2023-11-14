<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeController extends Controller
{
    //Show welcome page
    public function home()
    {
        return view('welcome');
    }
    //Show full cake's menu
    public function index()
    {
        return view('cakes.menu', [
            'discount' => DB::table('cake')->where('isDiscount', 1)->get(),
            'macarons' => DB::table('cake')->where('cake_type', 'mar')->Where('isDiscount', 0)->get(),
            'donuts' => DB::table('cake')->where('cake_type', 'don')->Where('isDiscount', 0)->get()
        ]);
    }
    //Add new cake (For admin only)
    public function add()
    {
        return view('cakes.addCake');
    }
    //Modify cake's information (For admin only)
    public function modify(Cake $name)
    {
        return view('cakes.cakeModify', [
            'cake' => $name->getAttributes(),
            'title' => $name->getAttributes()['cake_name']
        ]);
    }
}
