@extends('layouts.app')
@section('title', 'Add new discount')
@section('content')
    
<style>
    .container_add-cake {
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


<div class="container container_add-cake">
    <div class="row d-flex">
        @if ($type == "discount")
            <h1 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px; text-align:center;"><b>Thêm bánh khuyến mãi</b></h1>
            <form method="POST" action="/cakes/add/{{ $type }}">
                @csrf    
                <div class="mb-4">
                    <label style="font-size: 25px" for="cake_list" class="form-label">Danh sách bánh (tên và giá hiện tại)</label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cake_list">
                        <option selected>Chọn một loại bánh</option>
                        @foreach ($notDis as $nd)
                            <option value="{{ $nd->cake_id }}">{{ $nd->cake_name }} - {{ $nd->price }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label style="font-size: 25px" for="discount_price" class="form-label">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="discount_price"
                    style="width: 479px;" placeholder="Nhập giá khuyến mãi">
                </div>
                @error('discount_price')
                    <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="mb-3 d-flex justify-content-center">
                    <div class="button-signup d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger btn-lg"
                            style="padding: 8px 80px; border-radius: 30px;">Thêm</button>
                    </div>
                </div>
            </form>
        @else
            <div>
                <h1 style="font-family: Osward, sans-serif;margin-top: 50px; margin-left: 10px; text-align:center;"><b>Thêm bánh {{ $type }} mới</b></h1>
                <form method="POST" action="/cakes/add/{{ $type }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="cake_name" class="form-label">Tên bánh</label>
                        <input type="text" class="form-control" name="cake_name"
                        style="outline: none; min-width: 150px; width: 550px;" placeholder="Nhập tên loại bánh">
                    </div> <br>
                    @error('cake_name')
                        <p style="color: red;">{{$message}}</p>
                    @enderror

                    <div class="mb-4">
                        <label for="price" class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price"
                        style="width: 550px;" placeholder="Nhập giá">
                    </div>
                    @error('price')
                        <p style="color: red;">{{$message}}</p>
                    @enderror

                    <div class="mb-4">
                        <label for="note" class="form-label">Note</label>
                        <input type="text" class="form-control" name="note"
                        style="outline: none; min-width: 150px; width: 550px;" placeholder="Một vài note...">
                    </div>
                    @error('note')
                        <p style="color: red;">{{$message}}</p>
                    @enderror

                    <div class="mb-4">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" class="border border-gray-200 rounded w-full form-control" name="image"
                        style="outline: none; min-width: 150px; width: 550px;">
                    </div>
                    @error('image')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="button-signup d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger btn-lg"
                                style="padding: 8px 80px; border-radius: 30px;">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
    

@endsection