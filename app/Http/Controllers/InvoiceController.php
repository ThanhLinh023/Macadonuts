<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoiceController extends Controller
    {
        public function generateInvoice($orderId)
        {
       
                // Truy vấn dữ liệu từ các bảng
                $data = DB::table('cake_order')
                    ->join('users', 'cake_order.user_id', '=', 'users.user_id')
                    ->join('order_detail', 'cake_order.order_id', '=', 'order_detail.order_id')
                    ->join('cake', 'order_detail.cake_id', '=', 'cake.cake_id')
                    ->select(
                        'users.name as customer_name',
                        'users.phone as customer_phone',
                        'cake_order.order_id',
                        'cake.cake_name',
                        'cake.discount_price', 
                        'order_detail.quantity',
                        'cake.price',
                        'order_detail.total',
                        'cake_order.order_date',
                        'cake_order.total_money'
                    )
                    ->where('cake_order.order_id', $orderId)
                    ->get();
        
              
                if ($data->isEmpty()) {
                    abort(404, 'Order not found');
                }
        
                
                $invoiceData = $data->first();
                $orderItems = $data->groupBy('cake_name'); 
                $invoiceData->order_date = Carbon::parse($invoiceData->order_date)->format('Y-m-d');
        
              
                $pdf = PDF::loadView('invoice/invoice', compact('invoiceData', 'orderItems'));
        
              
                return $pdf->download('invoice.pdf');
    
        }
}
