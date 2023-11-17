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
        <p class="row d-flex justify-content-center h3 text-sm-start text-md-start text-uppercase fw-bolder text-black ">
            Thông tin đặt hàng</p>

        {{-- GIAO HÀNG --}}
        <div class="row order mt-3 mb-3 p-3">
            <h3 class="text-sm-start text-md-start text-uppercase fw-bolder text-black">THỜI GIAN GIAO HÀNG:</h3>
            <P class="text-sm-start text-md-start text-capitalize text-grey" style="font-size: 20px;">Giao ngay</P>
        </div>

        {{-- ĐỊA CHỈ --}}
        <div class="row order mt-3 mb-3 p-3">
            <h3 class="text-sm-start text-md-start text-uppercase fw-bolder text-black">GIAO TỚI:</h3>
            <div class="mb-3">
                <label for="home-number" class="label-account">Số nhà*</label>
                <input type="text" class="form-control mb-3" placeholder="11" name="home-number"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Tên đường*</label>
                <input type="text" class="form-control mb-3" name="street"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Phường/xã*</label>
                <input type="text" class="form-control mb-3" name="ward"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Quận*</label>
                <input type="text" class="form-control mb-3" name="district"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Thành phố*</label>
                <input type="text" class="form-control mb-3" name="city"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">
            </div>
        </div>

        {{-- THÊM THÔNG TIN CHI TIẾT --}}
        <div class="row order mt-3 mb-3 p-3">
            <h3 class="text-sm-start text-md-start text-uppercase fw-bolder text-black">THÊM THÔNG TIN CHI TIẾT</h3>
            <div class="mb-3">
                <label for="home-number" class="label-account">Tên của bạn*</label>
                <input type="text" class="form-control mb-3" contenteditable="true" name="name" value="Minh Phúc"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Số điện thoại*</label>
                <input type="text" class="form-control mb-3" contenteditable="true" name="phone-number"
                    value="0973144627" style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">

                <label for="home-number" class="label-account">Địa chỉ email*</label>
                <input type="text" class="form-control mb-3" contenteditable="true" name="email"
                    value="nguyenminhphuc010603@gmail.com"
                    style="background-color: #F8F7F5; border: 0; border-bottom: 1px solid #ccc;">
            </div>
        </div>

        {{-- PHƯƠNG THỨC THANH TOÁN --}}
        <div class="row order mt-3 mb-3 p-3">
            <h3 class="text-sm-start text-md-start text-uppercase fw-bolder text-black">PHƯƠNG THỨC THANH TOÁN:</h3>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Thanh toán bằng tiền mặt
                    </button>
                </li>
                <br>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Thanh toán bằng ATM/VISA/MASTER và Momo
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    Nhận tiền trực tiếp từ khách hàng
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Chọn phương thức</option>
                        <option value="ATM/VISA/MASTERCARD">ATM/VISA/MASTERCARD</option>
                        <option value="MOMO">MOMO</option>
                      </select>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-3 p-3 d-flex justify-content-center">
            <button class="btn btn-success w-50" style="height: 50px;">
                Đặt hàng
            </button>
        </div>
    </div>
@endsection
