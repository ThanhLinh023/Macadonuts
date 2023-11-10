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
    </style>
<div class="text-center">
    <h2 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px;"><b>ĐỔI MẬT KHẨU</b></h2>
    <form method="POST" action="/change_password" style="margin-left: 10px;">
        @csrf
        <div class="mb-3 mt-0">
            <label for="old_password"></label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu cũ" name="old_password"
            style="outline: none; min-width: 150px; width: 550px;">
        </div>
        @error('old_password')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="new_password"></label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="new_password"
            style="width: 550px;">
        </div>
        @error('new_password')
            <p style="color: red;">{{$message}}</p>
        @enderror

        <div class="mb-3">
            <label for="new_password_confirmation"></label>
            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="new_password_confirmation"
            style="outline: none; min-width: 150px; width: 550px;">
        </div>
        @error('new_password_confirmation')
            <p style="color: red;">{{$message}}</p>
        @enderror
        <div class="button-signup d-flex justify-content-center" style="width: 550px; margin-bottom: 50px;">
            <button type="submit" class="btn btn-danger btn-lg d-flex justify-content-center"
                style=" width: 300px; border-radius: 30px;">Xác nhận</button>
        </div>
    </form>
</div>
@endsection