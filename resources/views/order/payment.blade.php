@extends('layouts.app')
@section('title', 'Thanh toán')
@section('content')

    <style>
        .order {
            background-color: #F8F7F5;
        }

        .payment-layout {
            width: 700px;
        }
    </style>

    <section class="bg-dark text-warning pt-5 pb-0 mt-5">
    </section>

    <div class="container payment-layout mt-5">
        {{-- ĐỊA CHỈ --}}
        <form method="POST" action="/getLocation">
            @csrf
            <div class="row order mt-3 mb-3 p-3">
                <h3 class="text-sm-start text-md-start text-uppercase fw-bolder text-black">GIAO TỚI:</h3>
                <div class="mb-3">
                    <label for="home-number" class="label-account">Địa chỉ</label>
                    <input type="text" class="form-control mb-3" placeholder="Số 10, Phường 3,...." name="address"
                        style="background-color: #FFF; border: 0; border-bottom: 1px solid #ccc;">
                    @error('address')
                        <p style="color: red;">Vui lòng nhập địa chỉ</p>
                    @enderror
                    <label for="home-number" class="label-account">Quận</label>
                    <select class="form-select form-select-lg mb-3" name="district">
                        <option selected>Chọn quận</option>
                        <option value="1">Quận 1</option>
                        <option value="3">Quận 3</option>
                        <option value="4">Quận 4</option>
                        <option value="5">Quận 5</option>
                        <option value="6">Quận 6</option>
                        <option value="7">Quận 7</option>
                        <option value="8">Quận 8</option>
                        <option value="9">Quận 9</option>
                        <option value="10">Quận 10</option>
                        <option value="11">Quận 11</option>
                        <option value="12">Quận 12</option>
                        <option value="ThuDuc">Thành phố Thủ Đức</option>
                        <option value="BinhThanh">Quận Bình Thạnh</option>
                        <option value="BinhTan">Quận Bình Tân</option>
                        <option value="GoVap">Quận Gò Vấp</option>
                        <option value="PhuNhuan">Quận Phú Nhuận</option>
                        <option value="TanBinh">Quận Tân Bình</option>
                        <option value="TanPhu">Quận Tân Phú</option>
                        <option value="NhaBe">Huyện Nhà Bè</option>
                        <option value="CuChi">Huyện Củ Chi</option>
                        <option value="CanGio">Huyện Cần Giờ</option>
                        <option value="BinhChanh">Huyện Bình Chánh</option>
                        <option value="HocMon">Huyện Hóc Môn</option>
                    </select>
                    @error('discount_price')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            </div>

            {{-- THÊM THÔNG TIN CHI TIẾT --}}
            <div class="row mt-3 mb-3 p-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success w-50" style="height: 50px;">
                    Đi tới thanh toán
                </button>
            </div>
        </form>
    </div>
@endsection
