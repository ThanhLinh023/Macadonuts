@extends('layouts.app')
@section('title', "Thêm mã khuyến mãi")
@section('content')

    <style>
        .container-modify {
            justify-content: center;
            width: 500px;
        }

        .button-signup {
        }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    
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
        
    
@endsection
