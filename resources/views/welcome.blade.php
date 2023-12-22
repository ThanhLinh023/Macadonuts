@extends('layouts.app')
@section('content')
    <style>
        body {
            background: linear-gradient(180deg, #FFFBF5, #F7EFE5, #e8e5cb, #f3d4bb, #fcc0c0);
            /* background: linear-gradient(180deg, #fff, rgb(247, 247, 245)); */
        }

        a {
            text-decoration: none;
        }

        .navbar {
            padding-left: 100px;
            padding-right: 100px;
            background-color: #FCF8F0;
        }

        .c-item {
            height: 700px;
        }

        .c-image {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .category-card,
        .comment-card,
        .news-card {
            box-shadow: 5px 10px 18px rgba(0, 0, 0, 0.1);
            transition: transform linear 0.1s;
            will-change: transform;
        }

        .category-card:hover,
        .comment-card:hover,
        .news-card:hover {
            transform: translateY(-2px);
            box-shadow: 5px 10px 28px rgba(0, 0, 0, 0.05);
        }

        .category-images {
            height: 300px;
            object-fit: cover;
        }

        .comment-card {
            box-shadow: 5px 10px 18px rgba(0, 0, 0, 0.1);
        }

        .comment-text,
        .news-text {
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

    {{-- SLIDER CAROUSEL --}}
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

    <!-- Danh mục -->
    <div class="container mt-5">
        <div class="row mb-3">
            <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder">danh mục món ăn</p>
            <hr class="hr" style="border: 1px solid #767676;">
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <a href="/cakes/menu">
                <div class="col category">
                    <div class="card category-card border-0">
                        <img src="{{ URL::to('./image/minhphucpic/newdish2.avif') }}" class="card-img-top category-images"
                            alt="Danh mục 1">
                        <div class="card-body d-flex p-2">
                            <h5 class="card-title fw-bolder text-uppercase">KHUYẾN MÃI</h5>
                            <i class="bi bi-caret-right-fill"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/cakes/menu">
                <div class="col category">
                    <div class="card category-card border-0">
                        <img src="{{ URL::to('./image/minhphucpic/category-bakery.avif') }}"
                            class="card-img-top category-images" alt="...">
                        <div class="card-body d-flex p-2">
                            <h5 class="card-title fw-bolder text-uppercase">DONUT</h5>
                            <i class="bi bi-caret-right-fill"></i>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/cakes/menu">
                <div class="col category">
                    <div class="card category-card border-0">
                        <img src="{{ URL::to('./image/minhphucpic/macaron-category.avif') }}"
                            class="card-img-top category-images" alt="...">
                        <div class="card-body d-flex p-2">
                            <h5 class="card-title fw-bolder text-uppercase">MACARON</h5>
                            <i class="bi bi-caret-right-fill"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- COMMENTS -->
    <div class="container mt-5" style="padding-top: 60px;">
        <div class="row mb-3">
            <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder">khách hàng nói gì về chúng tôi?</p>
            <hr class="hr" style="border: 1px solid #767676;">
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0 justify-content-between" style="margin-left: 100px;">
            <div class="col comment mb-3">
                <div class="card comment-card w-75 border-0" style="">
                    <div class="card-body">
                        <img src="{{ URL::to('./image/minhphucpic/vikhang.avif') }}" alt="" class="img-fluid">
                        <p class="comment-text">Macadonuts đã đem đến cho tôi một trải nghiệm có một không hai với
                            sự nhiệt tình và chu đáo.</p>
                        <h5 class="card-title fw-bolder text-uppercase text-end fs-6">Vĩ Khang</h5>
                    </div>
                </div>
            </div>
            <div class="col comment mb-3">
                <div class="card comment-card w-75 border-0 bg-dark-subtle" style="">
                    <div class="card-body">
                        <img src="{{ URL::to('./image/minhphucpic/bichchi.avif') }}" alt="" class="img-fluid">
                        <p class="comment-text">Món ăn ở đây thật tuyệt vời, tuy có 2 loại bánh nhưng sự tinh tế
                            và cầu kì là tuyệt đối tốt.</p>
                        <h5 class="card-title fw-bolder text-uppercase text-end fs-6">Bích Chi</h5>
                    </div>
                </div>
            </div>
            <div class="col comment mb-3">
                <div class="card comment-card w-75 border-0" style="">
                    <div class="card-body">
                        <img src="{{ URL::to('./image/minhphucpic/thanhlinh.avif') }}" alt="" class="img-fluid"
                            style="height: 175px; width: 300px; object-fit: cover;">
                        <p class="comment-text">Tôi sẽ ghé lại Macadonuts vào một ngày không xa, chắc chắn là như
                            vậy.</p>
                        <h5 class="card-title fw-bolder text-uppercase text-end fs-6">Thanh Linh</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- NEWS -->
    <div class="container mt-5 mb-5 news-main" style="padding-top: 60px;">
        <div class="row mb-3">
            <p class="h3 text-sm-start text-md-start text-uppercase fw-bolder">TIN TỨC</p>
            <hr class="hr" style="border: 1px solid #767676;">
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 justify-content-between">
            <div class="col mb-3 news">
                <div class="card news-card border-0">
                    <img src="{{ URL::to('./image/minhphucpic/newdish.avif') }}" class="card-img-top category-images"
                        alt="Danh mục 1">
                    <div class="card-body p-2">
                        <h5 class="card-title text-capitalize">TIN TỨC</h5>
                        <p class="news-text mb-1">Mọi loại bánh của chúng tôi sẽ từ donut đến macaron sẽ được phục vụ trong
                            thu hè này</p>
                        <a href="#" class="text-black-50 text-decoration-none">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col mb-3 news">
                <div class="card news-card border-0" style="background-color: rgb(222, 229, 241);">
                    <img src="{{ URL::to('./image/minhphucpic/category-bakery.avif') }}"
                        class="card-img-top category-images" alt="...">
                    <div class="card-body p-2">
                        <h5 class="card-title text-capitalize">TIN TỨC</h5>
                        <p class="news-text mb-1">Donut mới của chúng tôi chuẩn bị ra mắt và mùa đông năm nay</p>
                        <a href="#" class="text-black-50 text-decoration-none">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col mb-3 news">
                <div class="card news-card border-0">
                    <img src="{{ URL::to('./image/minhphucpic/macaron-category.avif') }}"
                        class="card-img-top category-images" alt="...">
                    <div class="card-body p-2">
                        <h5 class="card-title text-capitalize">TIN TỨC</h5>
                        <p class="news-text mb-1">Thông tin khuyến mãi từ MACADONUTS trong quý cuối năm</p>
                        <a href="#" class="text-black-50 text-decoration-none">Xem thêm</a>
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
