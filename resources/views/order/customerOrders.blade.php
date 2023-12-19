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
                    @foreach ($order as $o)
                        <table class="table table-hover" style="text-align: center; align-items:center; width: 75%;">
                            <thead>
                                <tr class="table" style="text-align: center">
                                    <th scope="col" style="vertical-align: middle">#</th>
                                    <th scope="col" style="vertical-align: middle">Sản phẩm</th>
                                    <th scope="col" style="vertical-align: middle">Số lượng</th>
                                    <th scope="col" style="vertical-align: middle">Giá bán</th>
                                    <th scope="col" style="vertical-align: middle;">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
                                    </svg>
                                    <span class="fw-semibold" style="padding-right: 20px; padding-left: 6px;">Mã hoá đơn:</span>
                                    <span class="">{{ $o->order_id }}</span>
                                <br>
                                <tr class="bordered">
                                    @foreach ($orderDetail as $od)
                                        @if ($od->order_id == $o->order_id)
                                            <tr>
                                                <td style="width: 20%;">
                                                    <img src="{{ URL::to('./image/' . $od->image) }}" alt="" class="img-fluid rounded"
                                                         style="width: 50px; object-fit: cover;">
                                                </td>
                                                <td style="vertical-align: middle">
                                                    {{ $od->cake_name }}
                                                </td>
                                                <td style="vertical-align: middle">
                                                    {{ $od->quantity }}
                                                </td>
                                                <td style="vertical-align: middle">
                                                    {{ $od->price }}₫
                                                </td>
                                                <td style="vertical-align: middle">
                                                    {{ $od->total }}₫
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tr>
                                    <div class="status mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                        </svg>
                                        <span class="fw-semibold" style="padding-right: 20px; padding-left: 6px;">Tình trạng:</span>
                                        <span>Đã thanh toán</span> <br>
                                    </div>
                            </tbody>
                        </table>
                        <div class="summary mb-3" style="width: 75%;">
                            <span class="fw-semibold" style="padding-right: 20px; display: flex; float: right;">
                                $ Tổng thanh toán:
                                <span style="margin-left: 7px">{{ $o->total_money }}₫</span>
                                <br> <br>
                            </span>
                        </div>
                        <hr class="mb-5" width="75%" style="">
                    @endforeach
                @else
                    <h3 style="margin: 20px 0 20px 5px" class="text-capitalize">No Orders Found</h3>
                @endunless
            </div>
        </div>
    </div>
@endsection