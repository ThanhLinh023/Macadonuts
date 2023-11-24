@extends('layouts.app')
@section('title', 'Menu')
@section('content')
    <style>
        body {
            background: linear-gradient(180deg, #fff, rgb(247, 247, 245));
        }
        form {
            display: hidden;
        }
        .navbar {
            padding-left: 100px;
            padding-right: 100px;
            background-color: #FCF8F0;
        }

        .sale-off-card {
            box-shadow: 5px 10px 18px rgba(0, 0, 0, 0.1);
            transition: transform linear 0.1s;
            will-change: transform;
        }

        .sale-off-card:hover {
            transform: translateY(-2px);
            box-shadow: 5px 10px 28px rgba(0, 0, 0, 0.05);
        }

        .title {
            position: fixed;
            top: 95px;
            left: 0;
            width: 100%;
            background-color: rgb(49, 47, 47);
            z-index: 1;
        }

        .title-menu {
            cursor: pointer;
            margin: 20px;
        }

        h5 a {
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }

        h5 a:hover,
        h5 a.active {
            text-decoration: none;
            color: #FFC107;
        }

        #khuyenMai {
            margin-top: 200px;
        }

        .bi-pencil-square {
            position: absolute;
            right: 30px;
            bottom: 40px;
        }

        .trash_btn-children {
            border: none;
            background: none;
            position: absolute;
            right: 25px;
            bottom: 16px;
        }

        .bi-plus-circle {
            margin-bottom: 4px;
        }

        .name-cake {
            margin-top: 4px; 
            line-height: 1.4rem;
            height: 44px;
            overflow: hidden;
            display: block;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>

    <!-- Thanh lựa chọn -->
    <header>
        <div class="title option-bar text-warning pb-0">
            <div class="container tex-md-left">
                <div class="row tex-center text-md-left">
    
                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
                        <h5 class="title-menu text-uppercase fw-bold text-center">
                            <a href="#khuyen-mai" class="">
                                Khuyến mãi
                            </a>
                        </h5>
                    </div>
    
                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
                        <h5 class="title-menu text-uppercase fw-bold text-center">
                            <a href="#macaron">
                                Macaron
                            </a>
                        </h5>
                    </div>
    
                    <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
                        <h5 class="title-menu text-uppercase fw-bold text-center">
                            <a href="#donut">
                                Donut
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- KHUYẾN MÃI -->
    <section id="khuyen-mai">
        <div id="khuyenMai" class="container">
            <div class="row mb-3">
                <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                    KHUYẾN MÃI
                    @if (auth()->user() && auth()->user()->user_role == 1)
                        <a href="/cakes/addNew/discount">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor" class="bi bi-plus-circle"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>
                    @endif
                </p>
            </div>

            <div class="row mb-3">
                @foreach ($discount as $dis)
                    <div class="col-md-2 col-lg-3 col-xl-3 mx-auto mt-3">
                        <div class="card sale-off-card w-75 border-0" style="height: 340px;">
                            <div class="card-body">
                                <img src="{{ URL::to('./image/' . $dis->image) }}" alt="" class="img-fluid"
                                    style="height: 200px; width: 300px; object-fit: cover;">
                                <div class="row d-flex justify-content-center">
                                    <p class="col-7 name-cake">{{ $dis->cake_name }}</p>
                                    <div class="col-5 mt-1" style="line-height: 22px;">
                                        <span class="fs-5 fw-semibold text-danger">{{ $dis->discount_price }}</span>
                                        <span
                                            class="fs-6 fw-semibold text-decoration-line-through">{{ $dis->price }}</span>
                                    </div>
                                </div>
                                @auth
                                    <form method="POST" action="/cart/add/{{ $dis->cake_id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6">Thêm</button>
                                    </form>
                                @endauth
                                @if (auth()->user() && auth()->user()->user_role == 1)
                                    <a href="/cakes/{{ $dis->cake_name }}/modify">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <div class="trash_btn">
                                        <form method="POST" action="/cakes/delete/{{ $dis->cake_name }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="trash_btn-children">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section>

    <!-- MACARON -->
    <section id="macaron">
        <div class="container mt-5">
            <div class="row mb-3">
                <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                    MACARON
                    @if (auth()->user() && auth()->user()->user_role == 1)
                        <a href="/cakes/addNew/macaron">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor" class="bi bi-plus-circle"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>
                    @endif
                </p>

            </div>

            <div class="row mb-3">
                @foreach ($macarons as $mar)
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <div class="card sale-off-card w-75 border-0" style="height: 340px;">
                            <div class="card-body">
                                <img src="{{ URL::to('./image/' . $mar->image) }}" alt="" class="img-fluid"
                                    style="height: 200px; width: 300px; object-fit: cover;">
                                <div class="row d-flex justify-content-center">
                                    <p class="col-7 name-cake">{{ $mar->cake_name }}</p>
                                    <span class="col-5 fs-5 fw-semibold text-danger">{{ $mar->price }}</span>
                                </div>
                                @auth
                                    <form method="POST" action="/cart/add/{{ $mar->cake_id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6">Thêm</button>
                                    </form>
                                @endauth
                                @if (auth()->user() && auth()->user()->user_role == 1)
                                    <a href="/cakes/{{ $mar->cake_name }}/modify">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="/cakes/delete/{{ $mar->cake_name }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="trash_btn-children">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- DONUT -->
    <section id="donut">
        <div class="container mt-5 mb-5">
            <div class="row mb-3">
                <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                    DONUT
                    @if (auth()->user() && auth()->user()->user_role == 1)
                        <a href="/cakes/addNew/donut">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor" class="bi bi-plus-circle"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>
                    @endif
                </p>
            </div>

            <div class="row mb-3">
                @foreach ($donuts as $don)
                    <div class="col-md-2 col-lg-3 col-xl-3 mx-auto mt-3">
                        <div class="card sale-off-card w-75 border-0" style="height: 340px;">
                            <div class="card-body">
                                <img src="{{ URL::to('./image/' . $don->image) }}" alt="" class="img-fluid"
                                    style="height: 200px; width: 300px; object-fit: cover;">
                                <div class="row d-flex justify-content-center">
                                    <p class="col-7 name-cake">{{ $don->cake_name }}</p>
                                    <span class="col-5 fs-5 fw-semibold text-danger">{{ $don->price }}</span>
                                </div>
                                @auth
                                    <form method="POST" action="/cart/add/{{ $don->cake_id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6">Thêm</button>
                                    </form>
                                @endauth
                                @if (auth()->user() && auth()->user()->user_role == 1)
                                    <a href="/cakes/{{ $don->cake_name }}/modify">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="/cakes/delete/{{ $don->cake_name }}">
                                        <button type="submit" class="trash_btn-children">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    

    <script src="script.js">
        let sections = document.querySelectorAll(section)
        let navLinks = document.querySelectorAll(header div div div div h5 a)

        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop + 100;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if(top >= offset && top < offset + height)
                {
                    navLinks.forEach(links => {
                        links.classList.remove('active');
                        document.querySelector('header div div div div h5 a [href*=' + id + ']').classList.add('active');
                    })
                }
            });
        }
    </script>
@endsection
