@extends('layouts.app')
@section('title', 'Giỏ hàng của bạn - Macadonuts')
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
        .button {
            background-color: rgb(30, 96, 30);
            height: 50px;
            width: 200px;
            text-decoration: none;
            color: #fff;
        }
    </style>

    <!-- Thanh lựa chọn -->
    <section class="bg-dark text-warning pt-5 pb-0 mt-5">
    </section>
    @php
        $total_money = 0;
    @endphp
    <!-- GIỎ HÀNG CỦA TÔI -->
    @if (!isset($cart) || $cart == null)
        <div class="col-lg-8">
            <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">Giỏ hàng của bạn đang trống</p>
            <a class="button" href="/cakes/menu">Tiếp tục mua hàng</a>
        </div>
    @else
        <div class="container mt-5">
            <div class="row mb-3">
                <!-- CARD -->
                <div class="col-lg-8">
                    <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">Giỏ hàng của tôi</p>
                    <a href="/cakes/menu" class="button">Tiếp tục mua hàng</a>
                    <!-- Card -->
                    @foreach ($cart as $cakeID => $value)
                        <div class="card cart-waiting w-100 border-0 mb-4" style="height: 180px;">
                            <div class="card-body">
                                <div class="row g-4">
                                    <!-- Hình nền -->
                                    <div class="col-md-4">
                                        <img src="{{ URL::to('./image/' . $value['image']) }}" alt=""
                                            class="img-fluid" style="height: 150px; width: 300px; object-fit: cover;">
                                    </div>
                                    <!-- Info -->
                                    <div class="col-md-4">
                                        <div class="row d-flex">
                                            <p class="text-capitalize fw-bold fs-5">{{ $value['cake_name'] }}</p>
                                            <p style="width: 250px; color: darkgray;">{{ $value['note'] }}</p>
                                        </div>
                                    </div>
                                    <!-- Chỉnh sửa -->
                                    <div class="col-md-4 d-flex align-items-center">
                                        <div class="d-flex flex-row bd-highlight mb-3 fs-4 fw-semibold justify-content-between link-danger"
                                                style="width: 100%;">
                                            <form method="POST" action="/cart/decrease/{{ $cakeID }}">
                                                @csrf
                                                @method('PATCH')
                                                <button {{ $value['quantity'] == 1 ? 'disabled' : '' }} type="submit" style="border: none; background-color:#fff">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                                                            class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <span id="quantity">{{ $value['quantity'] }}</span>
                                            <form method="POST" action="/cart/increase/{{ $cakeID }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" style="border: none; background-color:#fff">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                                                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <span class="fs-5">{{ $value['price'] }}</span>
                                            <form method="POST" action="/cart/delete/{{ $cakeID }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background-color: #fff">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $total_money += $value['price'] * $value['quantity'];
                            $toMoney = number_format($total_money, 0, ',', '.');
                        @endphp
                    @endforeach
                </div>

                <!-- Thông tin chi tiết -->
                <div class="col-lg-4">
                    <br> <br>
                    <div class="card cart_info-detail w-75 border-0" style="height: 340px;">
                        <div class="card-body">
                            <h6 class="text-uppercase fw-bold">{{ count($cart) }} món</h3>
                                <h6 class="fw-bold mt-3">Bạn có mã giảm giá?</h6>
                                <p class="mt-0">Mã giảm giá</p>
                                <div class="row d-flex">
                                    <form method="POST" action="/cart/voucher">
                                        @csrf
                                        <div class="col-7 w-75">
                                            <input name="voucher_code" type="text" class="form-control" value="{{ old('voucher_code') }}">
                                        </div>
                                        <button type="submit" class="col-5 btn btn-dark w-25" style="font-size: small;">Áp dụng</button>
                                    </form>
                                    @if($errors->has('invalid'))
                                        <p style="color: red; margin-top: 10px;">{{ $errors->first('invalid') }}</p>
                                    @endif
                                </div>

                                <div class="cost mt-4">
                                    <div class="d-flex flex-row justify-content-between">
                                        <span class="fw-semibold">Tổng đơn hàng</span>
                                        <span class="fw-bold">{{ $toMoney }}</span>
                                    </div>
                                    @if ($total_money >= session()->get('minOrder') && session()->get('check') == true)
                                        @php
                                            $tmp = $total_money;
                                            $total_money = $total_money * (1 - session()->get('percent'));
                                        @endphp
                                        <div class="d-flex flex-row justify-content-between">
                                            <span class="fw-semibold">Giảm giá voucher</span>
                                            <span class="fw-bold">{{ number_format(($tmp * session()->get('percent')), 0, ',', '.') }}</span>
                                        </div>
                                        <div class="d-flex flex-row justify-content-between">
                                            <span class="fw-semibold">Tổng thanh toán</span>
                                            <span class="fw-bold">{{ number_format($total_money, 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex flex-row justify-content-between">
                                            <span class="fw-semibold">Tổng thanh toán</span>
                                            <span class="fw-bold">{{ $toMoney }}</span>
                                        </div>
                                    @endif
                                    <form method="POST" action="/cart/order">
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-grid mx-auto mt-3 w-50">Đặt hàng</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        
    </script>
@endsection
