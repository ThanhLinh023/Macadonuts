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

        .navbar-example2 {
            position: fixed;
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
            margin-top: 50px;
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

        #navbar-example2 {
            position: fixed;
            z-index: 1;
        }

        .category-images {
            height: 250px;
            object-fit: cover;
        }

        .searchResults {
            display: inline-block;
        }

        .cake-info {
            color: darkgray;
            margin-top: 4px;
            line-height: 1.4rem;
            height: 66px;
            overflow: hidden;
            display: block;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>

    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    {{-- ///////////////////////////////////////////////////////////// --}}

    {{-- OPTION BAR --}}
    <div class="container mt-5">
        <nav>
            <div class="nav nav-pills" id="nav-tab" role="tablist">
                <li class="nav-item mb-2"  style="margin-left: 10px;">
                    <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all"
                        type="button" role="tab" aria-controls="nav-all" aria-selected="true">Tất cả</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab" data-bs-target="#nav-sale"
                        type="button" role="tab" aria-controls="nav-sale" aria-selected="false">Khuyến mãi</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="nav-maca-tab" data-bs-toggle="tab" data-bs-target="#nav-maca"
                        type="button" role="tab" aria-controls="nav-maca" aria-selected="false">Macaron</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="nav-donut-tab" data-bs-toggle="tab" data-bs-target="#nav-donut"
                        type="button" role="tab" aria-controls="nav-donut" aria-selected="false">Donut</button>
                </li>
                <li class="nav-item">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input type="text" class="form-control me-2" id="searchInput" placeholder="Tìm kiếm">
                            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </li>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div id="searchResults">

            </div>
    
            <script>
                $(document).ready(function() {
                    $('#searchButton').on('click', function() {
                        var searchText = $('#searchInput').val();
    
                        $.ajax({
                            url: '{{ route('search') }}',
                            method: 'GET',
                            data: {
                                search: searchText
                            },
                            success: function(data) {
                                displaySearchResults(data);
                            },
                            error: function(error) {
                                console.error('Lỗi khi thực hiện tìm kiếm:', error);
                            }
                        });
                    });
                });
    
                function displayCake(cake) {
                    var html =
                    `
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4" style="margin-right: 8px;">
                        <div class="card sale-off-card border-0" style="min-height: 340px;">
                            <div class="card-body">
                                <img src="/image/${cake.image}" alt="" class="img-fluid card-img-top category-images">
                                <div class="row d-flex justify-content-center mt-2">
                                    <p class="col-7 name-cake fs-5 fw-semibold">${cake.cake_name}</p>
                                    <div class="col-5" style="line-height: 22px;">
                                        ${cake.discount_price
                                            ? `<span class="fs-4 fw-semibold text-danger d-flex justify-content-end">${cake.discount_price}</span>
                                            <span class="fs-5 fw-semibold text-decoration-line-through d-flex justify-content-end">${cake.price}</span>`
                                            : `<span class="fs-4 fw-semibold text-danger d-flex justify-content-end">${cake.price}</span>`}
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">${cake.note}</p>
                                    </div>
                                </div>
                                <form id="add-to-cart-form-${cake.cake_id}" method="POST" action="/cart/add/${cake.cake_id}">
                                    <input type="hidden" name="_token" value="${cake.csrf_token}">
                                    <button ${cake.user_role === 1 ? 'disabled' : ''} type="submit" class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6" id="add-to-cart-btn" data-cake_id="${cake.cake_id}"> Thêm </button>
                                </form>
                            </div>  
                        </div>
                    </div>
                    `;
                    return html;
                }
                $(document).ready(function() {
                    $('#searchResults').on('click', '#add-to-cart-btn', function() {
                        event.preventDefault();
                        var cake_id = $(this).data('cake_id');
                        $.ajax({
                            url: '/cart/add/' + cake_id,
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'cake_id': cake_id
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    });
                });
    
                function displaySearchResults(results) {
                    var resultsContainer = $('#searchResults');
                    resultsContainer.empty();
                    if (results.length > 0) {
                        resultsContainer.append('<h3 class="mt-3">Kết quả tìm kiếm:</h3><br>');
                        results.forEach(function(cake) {
                            var html = displayCake(cake);
                            var productElement = $(html).addClass('searchResults');
                            resultsContainer.append(productElement);
                        });
                    } else {
                        resultsContainer.append('<h3><i>Không có sản phẩm nào được tìm thấy.<i></h3>');
                    }
                }
            </script>
        </div>
        

    </div>

    <div class="tab-content" id="nav-tabContent">
        {{-- ALL --}}
        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
            <!-- KHUYẾN MÃI -->
            <div id="khuyenMai" class="container">
                <div class="row mb-3">
                    <p id="scrollspyHeading1" class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        KHUYẾN MÃI
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/discount">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card  border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $dis->image) }}" alt=""
                                        class="card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold" style="">{{ $dis->cake_name }}
                                        </p>
                                        <div class="col-5" style="line-height: 22px;">
                                            <span
                                                class="fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $dis->discount_price }}₫</span>
                                            <span
                                                class="fs-5 fw-semibold text-decoration-line-through d-flex justify-content-end">{{ $dis->price }}₫</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">{{ $dis->note }}</p>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $dis->cake_id }}" class="cake_{{ $dis->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $dis->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{ $dis->cake_id }}" class="cake_{{ $dis->cake_id }}">
                                                <button type="button" class="trash_btn-children deleteCake" data-id="{{ $dis->cake_id }}">
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


            <!-- MACARON -->
            <div class="container mt-5">
                <div class="row mb-3">
                    <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        MACARON
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/macaron">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $mar->image) }}" alt=""
                                        class="img-fluid card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold">{{ $mar->cake_name }}</p>
                                        <span
                                            class="col-5 fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $mar->price }}₫</span>
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">{{ $mar->note }}</p>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $mar->cake_id }}"
                                                class="cake_{{ $mar->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $mar->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $mar->cake_id }}" class="cake_{{ $mar->cake_id }}">
                                            <button type="button" class="trash_btn-children deleteCake" data-id="{{ $mar->cake_id }}">
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

            {{-- DONUT --}}
            <div class="container mt-5 mb-5">
                <div class="row mb-3">
                    <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        DONUT
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/donut">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $don->image) }}" alt=""
                                        class="img-fluid card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold">{{ $don->cake_name }}</p>
                                        <span
                                            class="col-5 fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $don->price }}₫</span>
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">{{ $don->note }}</p>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $don->cake_id }}"
                                                class="cake_{{ $don->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $don->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $don->cake_id }}" class="cake_{{ $don->cake_id }}">
                                            <button type="button" class="trash_btn-children deleteCake" data-id="{{ $don->cake_id }}">
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
        </div>

        <!-- KHUYẾN MÃI -->
        <div class="tab-pane fade" id="nav-sale" role="tabpanel" aria-labelledby="nav-sale-tab" tabindex="0">
            <div id="khuyenMai" class="container">
                <div class="row mb-3">
                    <p id="scrollspyHeading1" class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        KHUYẾN MÃI
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/discount">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card  border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $dis->image) }}" alt=""
                                        class="card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold" style="">{{ $dis->cake_name }}
                                        </p>
                                        <div class="col-5" style="line-height: 22px;">
                                            <span
                                                class="fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $dis->discount_price }}₫</span>
                                            <span
                                                class="fs-5 fw-semibold text-decoration-line-through d-flex justify-content-end">{{ $dis->price }}₫</span>
                                        </div>
                                        <div class="row">
                                            <p class="cake-info">{{ $dis->note }}</p>
                                        </div>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $dis->cake_id }}"
                                                class="cake_{{ $dis->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $dis->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{ $dis->cake_id }}" class="cake_{{ $dis->cake_id }}">
                                                <button type="button" class="trash_btn-children deleteCake" data-id="{{ $dis->cake_id }}">
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
        </div>

        <!-- MACARON -->
        <div class="tab-pane fade" id="nav-maca" role="tabpanel" aria-labelledby="nav-maca-tab" tabindex="0">
            <div class="container mt-5">
                <div class="row mb-3">
                    <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        MACARON
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/macaron">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $mar->image) }}" alt=""
                                        class="img-fluid card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold">{{ $mar->cake_name }}</p>
                                        <span
                                            class="col-5 fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $mar->price }}₫</span>
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">{{ $mar->note }}</p>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $mar->cake_id }}"
                                                class="cake_{{ $mar->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $mar->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $mar->cake_id }}" class="cake_{{ $mar->cake_id }}">
                                            <button type="button" class="trash_btn-children deleteCake" data-id="{{ $mar->cake_id }}">
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
        </div>

        <!-- DONUT -->
        <div class="tab-pane fade" id="nav-donut" role="tabpanel" aria-labelledby="nav-donut-tab" tabindex="0">
            <div class="container mt-5 mb-5">
                <div class="row mb-3">
                    <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder text-black">
                        DONUT
                        @if (auth()->user() && auth()->user()->user_role == 1)
                            <a href="/cakes/addNew/donut">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 mb-4">
                            <div class="card sale-off-card border-0" style="min-height: 340px;">
                                <div class="card-body">
                                    <img src="{{ URL::to('./image/' . $don->image) }}" alt=""
                                        class="img-fluid card-img-top category-images" style="">
                                    <div class="row d-flex justify-content-center mt-2">
                                        <p class="col-7 name-cake fs-5 fw-semibold">{{ $don->cake_name }}</p>
                                        <span
                                            class="col-5 fs-4 fw-semibold text-danger d-flex justify-content-end">{{ $don->price }}₫</span>
                                    </div>
                                    <div class="row">
                                        <p class="cake-info">{{ $don->note }}</p>
                                    </div>
                                    @auth
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $don->cake_id }}"
                                                class="cake_{{ $don->cake_id }}">
                                            <button {{ auth()->user()->user_role == 1 ? 'disabled' : '' }} type="button"
                                                data-id="{{ $don->cake_id }}"
                                                class="btn btn-danger d-grid gap-2 col-6 mx-auto fs-6 addToCart">Thêm</button>
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
                                        <form>
                                            @csrf
                                            <input type="hidden" value="{{ $don->cake_id }}" class="cake_{{ $don->cake_id }}">
                                            <button type="submit" class="trash_btn-children deleteCake" data-id="{{ $don->cake_id }}">
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
        </div>
    </div>

    </div>
    
    @if (auth()->user() && auth()->user()->user_role == 2)
    <div class="bitrix24 mb-3">
    <script data-b24-form="inline/5/93v71z" data-skip-moving="true">
        (function(w, d, u) {
            var s = d.createElement('script');
            s.async = true;
            s.src = u + '?' + (Date.now() / 180000 | 0);
            var h = d.getElementsByTagName('script')[0];
            h.parentNode.insertBefore(s, h);
        })(window, document, 'https://cdn.bitrix24.vn/b27964713/crm/form/loader_5.js');
    </script>
    </div>
    @endif
@endsection
