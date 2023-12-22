<!-- resources/views/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            color: #555;
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
        .footer {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Macadonuts</h1>
            <h2>Macaron & Donuts</h2>
            <h3>INVOICE</h3>
        </div>
        <div class="invoice-details">
            <div class="customer-details">
                <p><strong>Customer:</strong> {{ $invoiceData->customer_name }}</p>
                <p><strong>Phone:</strong> {{ $invoiceData->customer_phone }}</p>
                <p><strong>Order ID:</strong> {{ $invoiceData->order_id }}</p>
                <p><strong>Order Date:</strong> {{ $invoiceData->order_date }}</p>
            </div>
            <div class="order-items">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <!-- <th>Discount Price</th> -->
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $itemName => $items)
                            <tr>
                                <td>{{ $itemName }}</td>
                                <td>{{ $items->sum('quantity') }}</td>
                                <td>{{ $items->first()->price }} vnd</td>
                                <!-- <td>{{ $items->first()->discount_price }}</td> -->
                                <td>{{ $items->first()->total }} vnd </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="total">
            <p><strong>Total Amount:</strong> {{ $invoiceData->total_money }} vnd</p>
           
        </div>
        <div class="footer">
            <p>Thank you for choosing our products. Enjoy your meal</p>
        </div>
    </div>
</body>
</html>
