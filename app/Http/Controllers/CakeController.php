<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function show(Cake $name)
    {
        return view('cakes.cake', [
            'cake' => $name->getAttributes(),
            'title' => $name->getAttributes()['cake_name']
        ]);
    }
    public function add()
    {
        return view('cakes.addCake');
    }
    public function edit(Cake $name)
    {
        return view('cakes.editCake', [
            'cake' => $name->getAttributes(),
            'title' => $name->getAttributes()['cake_name']
        ]);
    }
    public function index()
    {
        return view('cakes.menu', [
            'cakes' => DB::table('cake')->get()
        ]);
    }
}
