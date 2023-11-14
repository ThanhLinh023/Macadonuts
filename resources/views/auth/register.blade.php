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

        .create-account {
            justify-content: flex-start;
        }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="create-account" style="text-align: center;">
            <h2 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px;"><b>TẠO TÀI KHOẢN</b></h2>
            <form method="POST" action="/register">
                @csrf
                <div class="mb-2 d-flex justify-content-center">
                    <label for="username"></label>
                    <input type="text" class="form-control" placeholder="Tạo username" name="username"
                    style="outline: none; min-width: 150px; width: 550px;" value="{{ old('username') }}">
                </div> <br>
                @error('username')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="name"></label>
                    <input type="text" class="form-control" placeholder="Tên của bạn" name="name"
                    style="width: 550px;" value="{{ old('name') }}">
                </div>
                @error('name')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="email"></label>
                    <input type="email" class="form-control" placeholder="Nhập email" name="email"
                    style="outline: none; min-width: 150px; width: 550px;" value="{{ old('email') }}">
                </div>
                @error('email')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="phone"></label>
                    <input type="tel" class="form-control" placeholder="Số điện thoại" name="phone"
                    style="outline: none; min-width: 150px; width: 550px;" value="{{ old('phone') }}">
                </div>
                @error('phone')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="password"></label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                    style="width: 550px;" value="{{ old('password') }}">
                </div>
                @error('password')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="password_confirmation"></label>
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation"
                    style="width: 550px;" value="{{ old('password_confirmation') }}">
                </div>
                @error('password_confirmation')
                    <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="policy d-flex justify-content-center" style="margin-left: 50px; margin-right: 50px;">
                    <p style="font-family: Arial, Helvetica, sans-serif; width: 450px; padding: auto 30px">
                        Bằng việc đăng kí, bạn đã đồng ý
                        các <a href="#">Chính sách hoạt động</a> và <a href="#">Chính sách bảo mật</a> của Macadonuts
                    </p>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="button-signup" style="width: 550px;">
                        <button type="submit" class="btn btn-danger btn-lg"
                            style=" width: 300px; border-radius: 30px;">Đăng ký</button>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="note-login d-flex justify-content-center" style="width: 550px;">
                        <p>
                            Bạn đã có tài khoản?<b> <a href="/login" style="text-decoration: none; color: rgb(57, 57, 57);">Đăng nhập</a> </b>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection