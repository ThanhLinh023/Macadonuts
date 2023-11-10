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
                        <button type="submit" class="text-red">Đăng xuất</button>
                    </form>
                    <p>
                        <a href="/change_password" class="list-manage" style="text-decoration: none;">Đặt lại mật khẩu</a>
                    </p>
                    <p>
                        <a href="#" class="list-manage" style="text-decoration: none;">Đơn hàng đã đặt</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection