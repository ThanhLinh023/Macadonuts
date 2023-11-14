@extends('layouts.app')
@section('title', $title)
@section('content')
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    <div class="row d-flex justify-content-center">
        <div style="text-align: center;">
            <h1 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px;"><b>Sửa thông tin</b></h1>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2 d-flex justify-content-center">
                    <label for="cake_name">Tên bánh</label>
                    <input type="text" class="form-control" name="cake_name"
                    style="outline: none; min-width: 150px; width: 550px;" value="{{ $cake['cake_name'] }}">
                </div> <br>
                @error('cake_name')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" name="price"
                    style="width: 550px;" value="{{ $cake['price'] }}">
                </div>
                @error('price')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" name="note"
                    style="outline: none; min-width: 150px; width: 550px;" value="{{ $cake['note'] }}">
                </div>
                @error('note')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="image">Hình ảnh</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"
                    style="outline: none; min-width: 150px; width: 550px;">
                    <img class="w-48 mr-6 mb-6" src="{{ URL::to('./image/' . $cake['image']) }}" alt="">
                </div>
                @error('image')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="mb-4 d-flex justify-content-center">
                    <label for="cake_type">Loại bánh</label>
                    <input type="text" class="form-control" name="cake_type"
                    style="width: 550px;" value="{{ $cake['cake_type'] == 'mar' ? "Macaron" : "Donuts" }}">
                </div>
                @error('cake_type')
                    <p style="color: red;">{{$message}}</p>
                @enderror

                {{-- <div class="mb-4 d-flex justify-content-center">
                    <label for="password_confirmation"></label>
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation"
                    style="width: 550px;" value="{{ old('password_confirmation') }}">
                </div>
                @error('password_confirmation')
                    <p style="color: red;">{{$message}}</p>
                @enderror --}}
                <div class="mb-3 d-flex justify-content-center">
                    <div class="button-signup" style="width: 550px;">
                        <button type="submit" class="btn btn-danger btn-lg"
                            style=" width: 300px; border-radius: 30px;">Lưu thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection
