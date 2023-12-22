<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VouchersModel;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function applyVoucher(Request $request)
    {
        $vouchers = VouchersModel::all();
        $check = false;
        $minOrder = 0;
        $percent = 0;
        foreach ($vouchers as $voucher)
        {
            if (strtolower($voucher->getAttributes()['voucher_code']) == strtolower($request->voucher_code))
            {
                $check = true;
                $percent = $voucher->getAttributes()['discount_percentage'];
                $minOrder = $voucher->getAttributes()['min_order'];
            }
        }
        if ($check)
        {
            session()->put('percentage', $percent);
            return redirect('/cart')->with('percent', $percent)->with('minOrder', $minOrder)->with('check', $check);
        }
        else
        {
            return redirect('/cart')->withErrors(['invalid' => 'Mã giảm giá không hợp lệ']);
        }
    }
    public function addVoucherForm()
    {
        return view('order.addVoucher', [
            'vouchers' => VouchersModel::all()
        ]);
    }
    public function storeVoucher(Request $request)
    {
        $this->validate($request, [
            'voucher' => 'required',
            'percent' => 'required',
            'min_bill' => 'required'
        ]);;
        DB::table('vouchers')->insert([
            'voucher_code' => $request->voucher,
            'discount_percentage' => (rtrim($request->percent, '%')) / 100,
            'min_order' => $request->min_bill
        ]);
        return redirect('/voucher');
    }
}
