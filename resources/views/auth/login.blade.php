@extends('layouts.app')
@section('title', 'Login')
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
            position: absolute;
        }

        .form-control {
            border: none;
            outline: none;
            border-bottom: 1px solid #ccc;
            border-bottom-style: solid;
            border-radius: none;
        }
    </style>
    <div class="row">
        <div class="col-lg-6">
            <img class= "img" src="{{ URL::to('./image/bg_login_register.jpg') }}" alt="">
        </div>
        <div class="col-lg-6 ">
            <h2 style="font-family: Osward, sans-serif;margin-top: 100px; margin-left: 10px;"><b>ĐĂNG NHẬP</b></h2>
            <form method="POST" action="/login" style="margin-left: 10px;">
                @csrf
                <div class="mb-0 mt-0" style="width: 550px;">
                    <label for="username"></label>
                    <input type="text" class="form-control" id="email" placeholder="Username" name="username"
                        style="outline: none; min-width: 150px;">
                </div>
                @error('username')
                    <p style="color: red; margin-top: 10px;">{{ $message }}</p>
                @enderror
                @if ($errors->has('loginError'))
                    <p style="color: red; margin-top: 10px;">{{ $errors->first('loginError') }}</p>
                @endif
                <div class="mb-3" style="width: 550px;">
                    <label for="password"></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="password">
                </div>
                @error('password')
                    <p style="color: red; margin-top: 10px;">{{ $message }}</p>
                @enderror
                @if ($errors->has('loginError'))
                    <p style="color: red; margin-top: 10px;">{{ $errors->first('loginError') }}</p>
                @endif
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Nhớ mật khẩu
                        </label>
                    </div>
                    <p style="">Bạn quên mật khẩu?</p>
                </div>
                <button type="submit" class="btn btn-success" style=" width: 550px; border-radius: 30px;">Đăng
                    nhập</button>
                <p style="margin-left: 320px; margin-top: 20px;">Bạn chưa có tài khoản? <a href="/register"><b>Đăng ký
                        </b></a></p>
            </form>
        </div>
    </div>
@endsection
