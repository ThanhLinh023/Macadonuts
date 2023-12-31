<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ URL::to('./image/minhphucpic/logo2-rm-bg.png') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>@yield('title', 'Macadonuts')</title>
    <style>
        .navbar {
            padding-left: 100px;
            padding-right: 100px;
            background-color: #FCF8F0;
        }

        .navbar-nav,
        .nav-item {
            position: relative;
        }

        /* BACK TO TOP */
        html {
            scroll-behavior: smooth;
        }

        .to-top {
            background: white;
            position: fixed;
            bottom: 16px;
            right: 32px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #1f1f1f;
            text-decoration: none;
            opacity: 0;
            pointer-events: none;
            transition: all .4s;
        }

        .to-top.active {
            bottom: 32px;
            pointer-events: auto;
            opacity: 1;
        }

        .nav-item__cart:hover .list-group {
            display: block;
        }

        .list-group {
            z-index: 1;
            display: none;
            animation: fadeIn ease-in 0.3s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            position: absolute;
            width: 160px;
            font-size: 0.9rem;
        }

        .list-group::before {
            position: absolute;
            left: 0;
            top: -16px;
            width: 100%;
            height: 20px;
            content: "";
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid me-lg-5">
            <a class="navbar-brand" href="/">
                <img class="mb-lg-0" src="{{ URL::to('./image/minhphucpic/logo2-rm-bg.png') }}" alt="" width="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/cakes/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/voucher">Mã khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link about-us" href="/aboutus">Về chúng tôi</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/account" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </a>
                    </li>
                    @if (auth()->user() && auth()->user()->user_role == 2)
                        <li class="nav-item nav-item__cart">
                            <span href="" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="currentColor"
                                    class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </span>
                            <div class="list-group">
                                <a href="/cart" class="list-group-item list-group-item-action">Giỏ hàng của bạn</a>
                                <a href="/myorder"
                                    class="list-group-item list-group-item-action">Đơn hàng của bạn</a>
                            </div>
                        </li>
                    @endunless
            </ul>
        </div>
    </div>
</nav>
{{-- CONTENT --}}
@yield('content')

<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container tex-md-left">
        <div class="row tex-center text-md-left">

            <div class="col-md-2 col-lg-2 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Danh mục món ăn</h5>
                <p>
                    <a href="/cakes/menu" class="text-white" style="text-decoration: none;">Khuyến mãi</a>
                </p>
                <p>
                    <a href="/cakes/menu" class="text-white" style="text-decoration: none;">Macaron</a>
                </p>
                <p>
                    <a href="/cakes/menu" class="text-white" style="text-decoration: none;">Donut</a>
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Về chúng tôi</h5>
                <p>
                    <a href="/aboutus" class="text-white" style="text-decoration: none;">Câu chuyện</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">Tin tức</a>
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Chính sách</h5>
                <p>
                    <a href="/actipolicy" class="text-white" style="text-decoration: none;">Chính sách hoạt
                        động</a>
                </p>
                <p>
                    <a href="/securitypolicy" class="text-white" style="text-decoration: none;">Chính sách bảo
                        mật</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16" style="margin-right: 10px; margin-bottom: 3px;">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                    </svg>Khu phố 6, phường Linh Trung
                </p>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16"
                        style="margin-right: 10px; margin-bottom: 3px;">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>macadonuts@gmail.com
                </p>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16"
                        style="margin-right: 10px; margin-bottom: 3px;">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>0123456789
                </p>
            </div>
        </div>

        <hr class="mb-4">

        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p>Copyright © 2023 Macadonuts Vietnam</p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/DanhGiaThongTinCongNghe.MoiMe.Telectek" target="blank" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/real.zk09/" target="blank" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCveUjdbEaSRESAMqv-bHD8w" target="blank" class="btn-floating btn-sm text-white" style="font-size: 23px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</footer>

{{-- BACK TO TOP --}}
<a href="#" class="to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-up-fill" viewBox="0 0 16 16">
        <path
            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
    </svg>
</a>
</body>

<script>
    const toTop = document.querySelector(".to-top");

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 100) {
            toTop.classList.add("active");
        } else {
            toTop.classList.remove("active");
        }
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.addToCart').click(function () {
            var cake_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/cart/add') }}',
                method: 'POST',
                data: {
                    _token: _token,
                    cake_id: cake_id
                },
                success: function(data) {
                    swal("Đã thêm bánh vào giỏ", "","success");
                }
            });
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.increaseQuantity').click(function () {
            var cake_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/cart/increase') }}',
                method: 'PATCH',
                data: {
                    _token: _token,
                    cake_id: cake_id
                },
                success: function (response) {
                    $("body").html(response.html);
                }
            });
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.decreaseQuantity').click(function () {
            var cake_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/cart/decrease') }}',
                method: 'PATCH',
                data: {
                    _token: _token,
                    cake_id: cake_id
                },
                success: function (response) {
                    $("body").html(response.html);
                }
            });
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.deleteFromCart').click(function () {
            var cake_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/cart/deleteCakeCart') }}',
                method: 'DELETE',
                data: {
                    _token: _token,
                    cake_id: cake_id
                },
                success: function (response) {
                    $("body").html(response.html);
                }
            });
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.deleteCake').click(function () {
            var cake_id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/cakes/deleteCake') }}',
                method: 'DELETE',
                data: {
                    _token: _token,
                    cake_id: cake_id
                },
                success: function (response) {
                    swal("Đã xóa bánh", "","success");
                    $("body").html(response.html);
                }
            });
        })
    })
</script>

<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Macadonuts_chatbot"
  agent-id="d88b5afc-92f3-4790-853f-18cdaa3e867c"
  language-code="en"
></df-messenger>

</html>
