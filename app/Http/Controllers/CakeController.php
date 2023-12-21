<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
    public function showAddCakeForm($type)
    {
        $notDiscount = DB::table('cake')->where('isDiscount', 0)->get();
        return view('cakes.addCake', [
            'type' => $type,
            'notDis' => $notDiscount
        ]);
    }
    //Modify cake's information (For admin only)
    public function modifyForm(Cake $name)
    {
        return view('cakes.cakeModify', [
            'cake' => $name->getAttributes(),
            'title' => $name->getAttributes()['cake_name']
        ]);
    }
    //Store new cake
    public function addNew(Request $request, $type)
    {
        if ($type != "discount")
        {
            $cake = [];
            $this->validate($request, [
                'cake_name' => ['required', Rule::unique('cake', 'cake_name')],
                'price' => 'required',
                'note' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif' 
            ]);
            $imageName = "";
            if ($request->hasFile('image'))
            {
                $imageName = str_replace(' ', '_', strtolower($request->cake_name)) . "." . $request->image->extension();
                $request->image->move(public_path('image'), $imageName);
            }
            $cakeId = $type == "macaron" ? "mar_" . substr($imageName, 0, 3) : "don_" . substr($imageName, 0, 3);
            $cake = [
                'cake_id' => $cakeId,
                'cake_name' => $request->cake_name,
                'price' => $request->price,
                'note' => $request->note,
                'image' => $imageName,
                'cake_type' => $type == "macaron" ? "mar" : "don"
            ];
            DB::table('cake')->insert($cake);
        }
        else
        {
            $this->validate($request, ['discount_price' => 'required']);
            $selectedCake = $request->input('cake_list');
            if ($selectedCake != "Chọn một loại bánh")
            {
                DB::table('cake')->where('cake_id', $selectedCake)
                    ->update([
                        'isDiscount' => 1,
                        'discount_price' => $request->discount_price
                    ]);
            }
            else
            {
                return back();
            }
        }
        return redirect('/cakes/menu');
    }
    public function modify(Request $request, $name)
    {
        $this->validate($request, [
            'cake_name' => 'required',
            'price' => 'required',
            'note' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif' 
        ]);
        if ($request->hasFile('image'))
        {
            $image = DB::table('cake')->where('cake_name', $name)
                    ->select('image')->get();
            File::delete(public_path('image/' . $image[0]->image));
            $imageName = str_replace(' ', '_', strtolower($request->cake_name)) . "." . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
        }
        DB::table('cake')->where('cake_name', $name)
            ->update([
                'cake_name' => $request->cake_name,
                'price' => $request->price,
                'note' => $request->note
            ]);
        return redirect('/cakes/menu');
    }
    public function deleteCake(Request $request)
    {
        $image = DB::table('cake')->where('cake_id', $request->input('cake_id'))
                    ->get();
        if ($image[0]->isDiscount == 1)
        {
            DB::table('cake')->where('cake_id', $request->input('cake_id'))->update(['isDiscount' => 0, 'discount_price' => 0]);
        }
        else
        {
            File::delete(public_path('image/' . $image[0]->image));
            DB::table('order_detail')->where('cake_id', $image[0]->cake_id)->delete();
            DB::table('cake')->where('cake_id', $request->input('cake_id'))->delete();
        }
        return response()->json([
            'html' => view('cakes.menu', [
                'discount' => DB::table('cake')->where('isDiscount', 1)->get(),
                'macarons' => DB::table('cake')->where('cake_type', 'mar')->Where('isDiscount', 0)->get(),
                'donuts' => DB::table('cake')->where('cake_type', 'don')->Where('isDiscount', 0)->get()
            ])->render()
        ]);
    }
}
