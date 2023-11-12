@extends('layouts.app')
@section('title', 'Account')
@section('content')
    <style>
        .login {
            display: flex;
        }

        .img {
            width: 650px;
            height: 500px;
        }

        form {
            display: block;
            flex: auto;
            margin-top: 20px;
        }

        .form-control {
            border: none;
            outline: none;
            border-bottom: 1px solid #ccc;
            border-bottom-style: solid;
            border-radius: none;
        }

        .list-option {
            background-color: #202124;
            width: 350px;
            min-height: auto;
            position: relative;
            margin-bottom: 100px;
            left: 200px;
            top: 50px;
            border-radius: 5px;
        }

        .btn-logout {
            background-color: #202124;
            border: none;
            text-decoration: underline
        }

        .list-manage {
            color: #ccc;
        }

        .list-manage:hover {
            color: white;
        }

        .label-account {
            font-size: small;
            color: #3a3a3a;
        }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    <div class="row gx-0">
        <div class="col-lg-5">
            <div class="list-option text-white pt-5 pb-4">
                <div class="mx-5 mt-3">
                    <h3 class="text-uppercase mb-0 font-weight-bold">
                        Xin chào, <br>
                        <p class="m-lg-0">{{ auth()->user()->name }}</p>
                    </h3>
                    <form class="mb-5" action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout text-white">Đăng xuất</button>
                    </form>
                    <p>
                        <a href="/change_password" class="list-manage" style="text-decoration: none;">Đặt lại mật khẩu</a>
                    </p>
                    <p>
                        <a href="#" class="list-manage" style="text-decoration: none;">Xoá tài khoản</a>
                    </p>
                    <p>
                        <a href="#" class="list-manage" style="text-decoration: none;">Đơn hàng đã đặt</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="max-width: 550px;">
            <h2 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px;"><b>CHI TIẾT TÀI KHOẢN</b>
            </h2>
            <form action="/action_page.php" style="margin-left: 10px;">
                <div class="mb-3 mt-0">
                    <label for="" class="label-account">Họ của bạn*</label>
                    <p contenteditable="true" class="form-control">Minh</p>
                </div>
                <div class="mb-3 mt-0">
                    <label for="" class="label-account">Tên của bạn*</label>
                    <p contenteditable="true" class="form-control">Phúc</p>
                </div>
                <div class="mb-3 mt-0">
                    <label for="" class="label-account">Số điện thoại*</label>
                    <p contenteditable="true" class="form-control">0973144627</p>
                </div>
                <div class="mb-3 mt-0">
                    <label for="" class="label-account">Địa chỉ email của bạn của bạn*</label>
                    <p contenteditable="true" class="form-control">nguyenminhphuc010603@gmail.com</p>
                </div>
                <button type="submit" class="btn bg-danger text-white" style=" width: 550px; border-radius: 30px;">Cập nhật tài khoản</button>
                <!-- <div class="mb-3 mt-0">
                    <label for="">Giới tính*</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Chọn giới tính*</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                </div> -->
            </form>
        </div>
    </div>
@endsection