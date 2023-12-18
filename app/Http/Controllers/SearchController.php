<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchText = request('search');

        // Thực hiện tìm kiếm trong cơ sở dữ liệu
        $cake = DB::table('cake')
            ->where('cake_name', 'like', '%' . $searchText . '%')
            ->get();

        return response()->json($cake);
    }
}
