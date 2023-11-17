@extends('layouts.app')
@section('title', 'Giỏ hàng')
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
        <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">Giỏ hàng của tôi</p>
        <div class="row mb-3 mt-3">
            <!-- CART -->
            <div class="col">
                {{-- <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black mt-4">Giỏ hàng của tôi</p> --}}
                <!-- Cart -->
                <table class="table table-hover" style="width: 100%; text-align: center;">
                    <thead>
                        <tr class="table-warning" style="text-align: center">
                            <th scope="col" style="width: 10%; vertical-align: middle">Mã hoá đơn</th>
                            <th scope="col" style="text-align: left; vertical-align: middle">Sản phẩm</th>
                            <th scope="col" style="width: 10%; vertical-align: middle">Số lượng</th>
                            <th scope="col" style="width: 20%; vertical-align: middle">Giá tiền</th>
                            <th scope="col" style="vertical-align: middle;">Phí ship</th>
                            <th scope="col" style="vertical-align: middle;">Tổng tiền</th>
                            <th scope="col" style="vertical-align: middle;">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bordered">
                            <th scope="row" style="vertical-align: middle;">0001</th>
                            <td style="text-align: left">
                                <p>Donut thượng hạng</p>
                                <p>Donut hoàng gia</p>
                                <p>Donut hoàng kim</p>
                            </td>
                            <td class="text-center">
                                <p>1</p>
                                <p>2</p>
                                <p>3</p>
                            </td>
                            <td>
                                <p>40.000</p>
                                <p>50.000</p>
                                <p>60.000</p>
                            </td>
                            <td class="shipping fee" style="vertical-align: middle">
                                15.000
                            </td>
                            <td class="total" style="vertical-align: middle">
                                165.000
                            </td>
                            <td class="status" style="vertical-align: middle">
                                Đang duyệt
                            </td>
                        </tr>
                        <tr class="bordered">
                            <th scope="row" style="vertical-align: middle;">0002</th>
                            <td style="text-align: left">
                                <p>Macaron thượng hạng</p>
                                <p>Macaron hoàng gia</p>
                                <p>Macaron hoàng kim</p>
                            </td>
                            <td class="text-center">
                                <p>1</p>
                                <p>2</p>
                                <p>3</p>
                            </td>
                            <td>
                                <p>40.000</p>
                                <p>50.000</p>
                                <p>60.000</p>
                            </td>
                            <td class="shipping fee" style="vertical-align: middle">
                                15.000
                            </td>
                            <td class="total" style="vertical-align: middle">
                                165.000
                            </td>
                            <td class="status" style="vertical-align: middle">
                                Đang duyệt
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    </div>

    </div>
@endsection
