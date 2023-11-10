@extends('layouts.app')
@section('content')
    <style>
        .navbar {
            padding-left: 100px;
            padding-right: 100px;
                background-color: #FCF8F0;
        }
        .c-item {
            height: 580px;
        }
        .c-image {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }
    </style>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./image/macaron.jpg') }}" class="d-block w-100 c-image" alt="Macaron">
                <div class="carousel-caption d-none d-md-block top-50">
                    <h3 class="text-uppercase">Bon appétit</h5>
                    <p class="fs-5 fst-italic">Welcome to your neighborhood bakery</p>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./image/donut(2).jpg') }}" class="d-block w-100 c-image" alt="donutamerica">
                <div class="carousel-caption d-none d-md-block top-50">
                    <h3 class="text-uppercase">Bon appétit</h5>
                    <p class="fs-5 fst-italic">Welcome to your neighborhood bakery</p>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./image/donut(1).jpg') }}" class="d-block w-100 c-image" alt="donutfrench">
                <div class="carousel-caption d-none d-md-block top-50">
                    <h3 class="text-uppercase">Bon appétit</h5>
                    <p class="fs-5 fst-italic">Welcome to your neighborhood bakery</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection