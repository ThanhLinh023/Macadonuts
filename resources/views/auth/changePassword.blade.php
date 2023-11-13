@extends('layouts.app')
@section('title', 'Account')
@section('content')
    <style>
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

        p {
            color: #595C5F;
        }

        .back-to-account {
            border: 1px solid #ccc;
            margin: 20px 0 0 120px;
        }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    {{-- <a href="/account" class="back-to-account btn btn-light">Quay lại tài khoản</a> --}}
    <div class="row d-flex justify-content-center">
        
        <h2 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px; text-align: center;"><b>ĐỔI MẬT KHẨU</b></h2>
        <form method="POST" action="/change_password" style="margin-left: 10px;">
            @csrf
            <div class="mb-4 mt-0 d-flex justify-content-center">
                <label for="old_password"></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu cũ" name="old_password"
                    style="outline: none; min-width: 150px; width: 550px;">
            </div>
            @error('old_password')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-4 d-flex justify-content-center">
                <label for="new_password"></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="new_password"
                    style="width: 550px;">
            </div>
            @error('new_password')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <div class="mb-4 d-flex justify-content-center">
                <label for="new_password_confirmation"></label>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới"
                    name="new_password_confirmation" style="outline: none; min-width: 150px; width: 550px;">
            </div>
            @error('new_password_confirmation')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <div class="d-flex justify-content-center">
                <div class="button-signup d-flex justify-content-center" style="width: 550px; margin-bottom: 50px;">
                    <button type="submit" class="btn btn-danger btn-lg d-flex justify-content-center"
                        style=" width: 300px; border-radius: 30px;">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
@endsection
