@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <style>
        .login {
            display: flex;
        }
        form {
            flex: auto;
            margin-top: 20px;
            margin-left: 10px;
        }

        .form-control {
            border: none;
            outline: none;
            border-bottom: 1px solid #ccc;
            border-bottom-style: solid;
            border-radius: none;
        }

        p {
            color: #595C5F;
        }
    </style>
    <div class="row">
        <div class="text-center" style="text-align: center;">
            <h2 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px;"><b>TẠO TÀI KHOẢN</b></h2>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-3 mt-0">
                    <label for="username"></label>
                    <input type="text" class="form-control" placeholder="Tạo username" name="username"
                    style="outline: none; min-width: 150px; width: 550px;">
                </div>
                @error('username')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="name"></label>
                    <input type="text" class="form-control" placeholder="Tên của bạn" name="name"
                    style="width: 550px;">
                </div>
                @error('name')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="email"></label>
                    <input type="email" class="form-control" placeholder="Nhập email" name="email"
                    style="outline: none; min-width: 150px; width: 550px;">
                </div>
                @error('email')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="phone"></label>
                    <input type="tel" class="form-control" placeholder="Số điện thoại" name="phone"
                    style="outline: none; min-width: 150px; width: 550px;">
                </div>
                @error('phone')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="password"></label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                    style="width: 550px;">
                </div>
                @error('password')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="password_confirmation"></label>
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation"
                    style="width: 550px;">
                </div>
                @error('password_confirmation')
                    <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="policy" style="margin-left: 50px; margin-right: 50px;">
                    <p style="font-family: Arial, Helvetica, sans-serif; width: 450px; padding: auto 30px">
                        Bằng việc đăng kí, bạn đã đồng ý
                        các <a href="#">Chính sách hoạt động</a> và <a href="#">Chính sách bảo mật</a> của Macadonuts
                    </p>
                </div>
                <div class="button-signup d-flex justify-content-center" style="width: 550px;">
                    <button type="submit" class="btn btn-danger btn-lg d-flex justify-content-center"
                        style=" width: 300px; border-radius: 30px;">Đăng ký</button>
                </div>
                <div class="note-login d-flex justify-content-center" style="width: 550px;">
                    <p>
                        Bạn đã có tài khoản?<b> <a href="/login" style="text-decoration: none; color: rgb(57, 57, 57);">Đăng nhập</a> </b>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection