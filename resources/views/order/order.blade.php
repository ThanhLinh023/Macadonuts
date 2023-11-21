@extends('layouts.app')
@section('title', 'Đơn hàng')
@section('content')

    <style>
        body {
            background: linear-gradient(180deg, #fff, rgb(247, 247, 245));
        }

        .navbar {
            padding-left: 100px;
            padding-right: 100px;
            background-color: #FCF8F0;
        }

        .cart-waiting,
        .cart_info-detail {
            box-shadow: 5px 10px 18px rgba(0, 0, 0, 0.1);
            transition: transform linear 0.1s;
            will-change: transform;
        }

        .cart-waiting:hover {
            transform: translateY(-2px);
            box-shadow: 5px 10px 28px rgba(0, 0, 0, 0.05);
        }
    </style>
    
    <section class="bg-dark text-warning pt-5 pb-0 mt-5">
    </section>

    <div class="container mt-5">
        <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">Đơn hàng của tôi</p>
        <div class="row mb-3 mt-3">
            <div class="col">
                @unless ($order->isEmpty())
                    <table class="table table-hover" style="width: 100%; text-align: center;">
                        <thead>
                            <tr class="table-warning" style="text-align: center">
                                <th scope="col" style="width: 10%; vertical-align: middle">Mã hoá đơn</th>
                                <th scope="col" style="text-align: left; vertical-align: middle">Sản phẩm</th>
                                <th scope="col" style="width: 10%; vertical-align: middle">Số lượng</th>
                                <th scope="col" style="width: 20%; vertical-align: middle">Giá bán</th>
                                <th scope="col" style="vertical-align: middle;">Thành tiền</th>
                                <th scope="col" style="vertical-align: middle;">Tổng thanh toán</th>
                                <th scope="col" style="vertical-align: middle;">Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($order as $o)
                                    <tr class="bordered">
                                        <th scope="row" style="vertical-align: middle;">{{ $o->order_id }}</th>
                                        @foreach ($orderDetail as $od)
                                            @if ($od->order_id == $o->order_id)
                                                <td>
                                                    <p>{{ $od->cake_name }}</p>
                                                </td>
                                                <td>
                                                    {{ $od->quantity }}
                                                </td>
                                                <td>
                                                    <p>{{ $od->price }}</p>
                                                </td>
                                                <td>
                                                    {{ $od->total }}
                                                </td>
                                            @endif
                                        @endforeach
                                        <td class="total" style="vertical-align: middle">
                                            {{ $o->total_money }}
                                        </td>
                                        <td class="status" style="vertical-align: middle">
                                            Đang duyệt
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 style="margin: 20px 0 20px 5px" class="text-capitalize">No Users Found</h3>
                @endunless
            </div>
        </div>
    </div>
@endsection
