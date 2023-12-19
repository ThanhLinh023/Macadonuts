@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <style>
        .login {
            display: flex;
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

    <section class="bg-dark text-warning pt-5 pb-0 mt-3">
    </section>
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 g-5 mb-5 mt-5">
            <div class="col-lg-6">
                <img class="rounded img-fluid shadow-lg" src="{{ URL::to('./image/bg_login_register.jpg') }}" alt=""
                    style="height: 400px;">
            </div>
            <div class="col-lg-6" style="height: 500px;">
                <section>
                    <h2 style="font-family: Osward, sans-serif;"><b>ĐĂNG NHẬP</b></h2>
                    <form class="mb-5" method="POST" action="/login" style="">
                        @csrf
                        <div class="mb-0 mt-0" style="">
                            <label for="username"></label>
                            <input type="text" class="form-control" id="email" placeholder="Username" name="username"
                                style="outline: none;">
                        </div>
                        @error('username')
                            <p style="color: red; margin-top: 10px;">{{ $message }}</p>
                        @enderror
                        @if ($errors->has('loginError'))
                            <p style="color: red; margin-top: 10px;">{{ $errors->first('loginError') }}</p>
                        @endif
                        <div class="mb-3" style="">
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
                            {{-- <p style="">Bạn quên mật khẩu?</p> --}}
                        </div>
                        <button type="submit" class="btn btn-success mt-3" style="width: 520px; border-radius: 30px;">Đăng nhập</button>
                        <p style="margin-left: 250px; margin-top: 20px;">Bạn chưa có tài khoản? <a href="/register"><b>Đăng ký
                                </b></a></p>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
