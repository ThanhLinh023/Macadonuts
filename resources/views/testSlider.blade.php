<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Trang chủ Macadonut</title>
</head>

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

<body>

    <!-- SLIDER -->
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./storage/image/macaron.jpg') }}" class="d-block w-100 c-image" alt="Macaron">
                <div class="carousel-caption d-none d-md-block top-50">
                    <h3 class="text-uppercase">Bon appétit</h5>
                    <p class="fs-5 fst-italic">Welcome to your neighborhood bakery</p>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./storage/image/donut(2).jpg') }}" class="d-block w-100 c-image" alt="donutamerica">
                <div class="carousel-caption d-none d-md-block top-50">
                    <h3 class="text-uppercase">Bon appétit</h5>
                    <p class="fs-5 fst-italic">Welcome to your neighborhood bakery</p>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="5000">
                <img src="{{ URL::to('./storage/image/donut(1).jpg') }}" class="d-block w-100 c-image" alt="donutfrench">
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

</body>

</html>