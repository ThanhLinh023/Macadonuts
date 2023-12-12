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

        /* form {
                display: block;
                flex: auto;
                margin-top: 20px;
            } */

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
            /* position: relative; */
            margin-bottom: 100px;
            /* left: 200px;
                top: 50px; */
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
            transition: .3s;
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
    <div class="container">
        <div class="row g-5 mt-3">
            <div class="d-flex justify-content-center col-lg-5 mt-3">
                <div class="list-option text-white">
                    <div class="mx-5 py-5 mt-5">
                        <h3 class="text-uppercase mb-0 font-weight-bold">
                            Xin chào, <br>
                            <p class="m-lg-0">{{ auth()->user()->name }}</p>
                        </h3>
                        <div style="">
                            <form class="mb-5" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn-logout text-white">Đăng xuất</button>
                            </form>
                        </div>
                        <p>
                            <a href="/change_password" class="list-manage" style="text-decoration: none;">Đặt lại mật
                                khẩu</a>
                        </p>
                        @if (auth()->user()->user_role == 2)
                            <p>
                                <a class="list-manage" style="text-decoration: none; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Xoá tài khoản</a>
                            </p>
                            <p>
                                <a href="/myorder" class="list-manage"
                                    style="text-decoration: none;">Đơn hàng đã đặt</a>
                            </p>
                        @endif
                        @if (auth()->user()->user_role == 1)
                            <p>
                                <a href="/customermanage" class="list-manage" style="text-decoration: none;">Quản lý khách
                                    hàng</a>
                            </p>
                            <p>
                                <a href="/ordermanage" class="list-manage" style="text-decoration: none;">Quản lý đơn
                                    hàng</a>
                            </p>
                            <p>
                                <a href="/revenue" class="list-manage" style="text-decoration: none;">Thống kê doanh thu</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center col-lg-7 mt-3 mb-5" style="max-width: 700px;">
                <form method="POST" action="/update_information" style="width: 100%;">
                    <h2 class="" style="font-family: Osward, sans-serif; margin-left: 10px;"><b>CHI TIẾT TÀI KHOẢN</b>
                    </h2>
                    @csrf
                    <div class="mb-3 mt-0">
                        <label for="name" class="label-account">Tên của bạn</label>
                        <input type="text" contenteditable="true" class="form-control" name="name"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mb-3 mt-0">
                        <label for="phone" class="label-account">Số điện thoại</label>
                        <input type="tel" contenteditable="true" class="form-control" name="phone"
                            value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="mb-3 mt-0">
                        <label for="email" class="label-account">Địa chỉ email</label>
                        <input type="email" contenteditable="true" class="form-control" name="email"
                            value="{{ auth()->user()->email }}">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn bg-danger btn-lg btn-block text-white" style="border-radius: 30px;">
                            Cập nhật tài khoản
                        </button> 
                    </div>
                </form>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xoá?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <form method="POST" action="/delete/{{ auth()->user()->user_id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xoá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
