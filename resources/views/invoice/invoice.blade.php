<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .customer-details,
        .order-details {
            width: 48%;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .order-items th,
        .order-items td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Invoice</h1>
        </div>
        <div class="invoice-details">
            <div class="customer-details">
                <p><strong>Customer:</strong> {{ $invoiceData->customer_name }}</p>
                <p><strong>Phone number:</strong> {{ $invoiceData->customer_phone }}</p>
            </div>
            <div class="order-details">
                <p><strong>Order ID:</strong> {{ $invoiceData->order_id }}</p>
                <p><strong>Order date:</strong> {{ $invoiceData->order_date }}</p>
            </div>
        </div>
        <div class="order-items">
            {{-- <h2>Order Items</h2> --}}
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $itemName => $items)
                        <tr>
                            <td>{{ $itemName }}</td>
                            <td>{{ $items->sum('quantity') }}</td>
                            <td>{{ $items->first()->price }}</td>
                            <td>{{ $items->first()->discount_price }}</td>
                            <td>{{ $items->first()->total }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="total">
            <p><strong>Total money:</strong> ${{ $invoiceData->total_money }}</p>
        </div>
    </div>
</body>
</html>