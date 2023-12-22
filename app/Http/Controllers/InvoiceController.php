<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;


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
                        'cake.discount_price', // Thêm cột discount_price vào select
                        'order_detail.quantity',
                        'cake.price',
                        'order_detail.total',
                        'cake_order.order_date',
                        'cake_order.total_money'
                    )
                    ->where('cake_order.order_id', $orderId)
                    ->get();
        
                // Kiểm tra xem order có tồn tại không
                if ($data->isEmpty()) {
                    abort(404, 'Order not found');
                }
        
                // Lấy dữ liệu từ kết quả truy vấn
                $invoiceData = $data->first();
                $orderItems = $data->groupBy('cake_name'); // Group các sản phẩm theo tên để hiển thị tất cả
        
                // Tạo PDF từ blade template và dữ liệu
                $pdf = PDF::loadView('invoice/invoice', compact('invoiceData', 'orderItems'));
        
                // Tùy chọn để tải file PDF hoặc hiển thị trực tiếp trong trình duyệt
                return $pdf->download('invoice.pdf');
    
        }
}
