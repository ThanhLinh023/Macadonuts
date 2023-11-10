@extends('layouts.app')
@section('title', 'Menu')
@section('content')
    <style>
        .thumbnail{
            width: 200px;
        }
        .monmoi:hover{
            cursor: pointer;
        }
        .khuyenmai:hover{
            cursor: pointer;
        }
        .macaron:hover{
            cursor: pointer;
        }
        .donut:hover{
            cursor: pointer;
        }
        div {
            font-family: Osward, sans-serif;
        }
        img {
            padding-top: 10px;
        }
        .img_container img {
            object-fit: contain;
        }
    </style>
    <hr>
    <div class="text-center">
        <table style="justify-content: center;">
            <tr>
                <td style="text-align: center; width: 400px; color: #151212;" class="monmoi"><b><a style="text-decoration: none;color: #958F8F;" href="#new">MÓN MỚI</a></b></td>
                <td style="width: 400px; color: #151212;" class="khuyenmai"><b><a style="text-decoration: none;color: #958F8F;" href="#coupon">KHUYẾN MÃI</a></b></td>
                <td style="width: 400px; color: #151212;" class="macaron"><b><a style="text-decoration: none;color: #958F8F;" href="">MACARON</a></b></td>
                <td style="width: 360px; color: #151212;" class="donut"><b><a style="text-decoration: none;color: #958F8F;" href="">DONUT</a></b></td>
            </tr>
        </table>
    </div>
    <hr>
    <h6 id="new" style="margin-left: 50px; color:#4A4848;"><b>MÓN MỚI</b></h6>
    <div style="display: flex; flex-flow: row wrap; gap: 1px; margin: 0 auto">
        @foreach ($cakes as $cake)
        <div class="row" style="margin: 10px 0 0 50px; width: 300px">
            <div class="col-sm-3 text-bg-light" style="width: 300px;height: 330px;margin-right: 90px; border: 2px solid rgb(242, 234, 234);">
                <div class="img_container">
                    <img src="{{ URL::to('./image/' . $cake->image) }}" alt="{{ $cake->cake_name }}" class="thumbnail">
                </div>
                <div>
                    <div style="display: flex;" >
                        <p style="width: 145px;">{{ $cake->cake_name }}</p>
                        <p style="color: red;">{{ $cake->price }}</p>
                    </div>
                    <button type="button" class="btn btn-danger" style="border-radius: 10px; margin-left: 70px;">Thêm</button>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    <h6 id="coupon" style="margin-left: 50px; color:#4A4848;"><b>KHUYẾN MÃI</b></h6>
@endsection