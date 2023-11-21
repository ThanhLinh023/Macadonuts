@extends('layouts.app')
@section('title', $title)
@section('content')

    <style>
        .container {
            justify-content: center;
            width: 500px;
        }

        .button-signup {
        }
    </style>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    
    <div class="container">
        <div class="row d-flex">
            <div style="">
                <h1 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px; text-align:center;"><b>Sửa thông tin</b></h1>
                <form method="POST" action="/cakes/modify/{{ $cake['cake_name'] }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="cake_name" class="form-label">Tên bánh</label>
                        <input type="text" class="form-control" name="cake_name"
                        style="outline: none; min-width: 150px; width: 550px;" value="{{ $cake['cake_name'] }}">
                    </div> <br>
                    @error('cake_name')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
    
                    <div class="mb-4">
                        <label for="price" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price"
                        style="width: 550px;" value="{{ $cake['price'] }}">
                    </div>
                    @error('price')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
    
                    <div class="mb-4">
                        <label for="note" class="form-label">Note</label>
                        <input type="text" class="form-control" name="note"
                        style="outline: none; min-width: 150px; width: 550px;" value="{{ $cake['note'] }}">
                    </div>
                    @error('note')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
    
                    <div class="mb-4">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" class="border border-gray-200 rounded w-full form-control" name="image"
                        style="outline: none; min-width: 150px; width: 550px;">
                        <img class="mb-6 mt-2" src="{{ URL::to('./image/' . $cake['image']) }}" alt="" style="width: 100px;">
                    </div>
    
                    <div class="mb-4">
                        <label for="cake_type">Loại bánh</label>
                        <input type="text" class="form-control" disabled name="cake_type"
                        style="width: 550px;" value="{{ $cake['cake_type'] == 'mar' ? "Macaron" : "Donuts" }}">
                    </div>
                    @error('cake_type')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="button-signup d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger btn-lg"
                                style="padding: 8px 80px; border-radius: 30px;">Lưu thay đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    
@endsection
