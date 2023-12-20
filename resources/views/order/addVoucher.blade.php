@extends('layouts.app')
@section('title', "Mã khuyến mãi")
@section('content')

    <style>
        .container-modify {
            justify-content: center;
            width: 500px;
        }

        .button-signup {
        }
        
    .khuyen-mai-hb {
        margin-bottom:2px;
        margin-top:2px;
        background:white;
        padding:10px;
        border-radius:5px;
        border:1px solid #ef0b0b;
        font-size:15px;
        width:100%;
    }
    .khuyen-mai-hb .tieu-de {
        background:#e31616;
        padding:2px 20px;
        margin-top:-24px;
        font-size:15px;
        font-weight:500;
        color:#ffffff;
        display:block;
        max-width:207px;
        border-radius:99px;
    }
    .khuyen-mai-hb ul {
    margin-bottom:4px;
    list-style-image:url(tick.png);	
    }
    .khuyen-mai-hb {
        margin-bottom:2px;
        margin-top:2px;
        background:white;
        padding:10px;
        border-radius:5px;
        border:1px solid #ef0b0b;
        font-size:15px;
        width:100%;
    }
    .khuyen-mai-hb .tieu-de {
        background:#e31616;
        padding:2px 20px;
        margin-top:-24px;
        font-size:15px;
        font-weight:500;
        color:#ffffff;
        display:block;
        max-width:207px;
        border-radius:99px;
    }
    
    .khuyen-mai-hb ul {
        margin-bottom:4px;
        list-style-image:url(tick.png);	
    }
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    <div class="container">
        @if (auth()->user() && auth()->user()->user_role == 1)
            <div class="container container-modify">
                <div class="row d-flex">
                    <div style="">
                        <h1 style="font-family: Osward, sans-serif; margin-top: 50px; margin-left: 10px; text-align:center;"><b>Thêm mã khuyến mãi</b></h1>
                        <br>
                        <form method="POST" action="/voucher/store">
                            @csrf
                            <div class="mb-4">
                                <label for="voucher" class="form-label">Mã giảm giá</label>
                                <input type="text" class="form-control" name="voucher"
                                style="outline: none; min-width: 150px; width: 550px;" value="{{ old('voucher') }}" placeholder="MAGIAMGIA001">
                            </div>
                            @error('voucher')
                            <p style="color: red; margin-top: 10px;">Vui lòng nhập đầy đủ</p>
                            @enderror
                            <div class="mb-4">
                                <label for="percent" class="form-label">Phần trăm giảm</label>
                                <input type="text" class="form-control" name="percent"
                                style="width: 550px;" value="{{ old('percent') }}" placeholder="10%, 20%,...">
                            </div>
                            @error('percent')
                            <p style="color: red; margin-top: 10px;">Vui lòng nhập đầy đủ</p>
                            @enderror
                            <div class="mb-4">
                                <label for="min_bill" class="form-label">Hoá đơn tối thiểu</label>
                                <input type="text" class="form-control" name="min_bill"
                                style="outline: none; min-width: 150px; width: 550px;" value="{{ old('min_bill') }}" placeholder="39000, 59000,...">
                            </div>
                            @error('min_bill')
                            <p style="color: red; margin-top: 10px;">Vui lòng nhập đầy đủ</p>
                            @enderror
                            <div class="mb-3 d-flex justify-content-center">
                                <div class="button-signup d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger btn-lg"
                                        style="padding: 8px 80px; border-radius: 30px;">Lưu thay đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($vouchers))
            @foreach ($vouchers as $v)
            <div class="row mb-3">
                <div class="container container-modify">
                    <div>
                        <div class="card sale-off-card  border-0">
                            <div class="card-body">
                                <div class="khuyen-mai-hb"> 
                                    <span class="tieu-de"><i class="icon-gift"></i> Mã khuyến mãi</span> 
                                    <ul>
                                        <li><b>{{ strtoupper($v->getAttributes()['voucher_code']) }}</b></li>
                                        <li>Giảm {{ $v->getAttributes()['discount_percentage'] * 100 }}%. Đơn tối thiểu {{ number_format($v->getAttributes()['min_order'], 0, ',', '.') }}đ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h1 style="font-family: Osward, sans-serif; margin-top: 50px; margin-left: 10px; text-align:center;"><b>Hiện tại không có mã giảm giá</b></h1>
        @endif
    </div>
@endsection
