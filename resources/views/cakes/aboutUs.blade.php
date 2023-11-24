@extends('layouts.app')
@section('title', 'Về chúng tôi')
@section('content')
<style>
    body {
        background: linear-gradient(180deg, #fff, rgb(247, 247, 245));
    }
</style>

<body>
    <div class="container">
        <img src="anhmanhinh.jpg" alt="" style="text-align: center; width: 100%; height: auto; ">
    </div>
    <div class="container" style="text-align: center; width: 700px; margin-top: 100px;">
        <p style="font-size: 20px;font-family: 'Fredericka the Great',cursive;">Where smiles are served daily</p>
        <p style="font-size: 18px;font-family: 'Fraunces';">Enjoy delicious pastries, warm breads, stunning cakes and expertly brewed drinks while feeling right at home.</p>
    </div>
    <div class="container row" style="margin-top: 150px;" >
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <p style="font-size: 15px;font-family: 'Fredericka the Great',cursive;">Our mission</p>
            <p style="font-size: 18px;font-family: 'Fraunces';">To bring expertly crafted baked and brewed goods to our guests through a warm and welcoming bakery café experience that delivers joy to everyone.</p>
        </div>
        <div class="col"></div>
      </div>
    <!-- <div class="container mt-5 col-sm-3 ">
        <p style="font-family: 'Fredericka the Great',cursive; font-size: 15px;">Our mission</p>
        <p style="font-family: 'Fraunces'; font-size: 18px;">To bring expertly crafted baked and brewed goods to our guests through a warm and welcoming bakery café experience that delivers joy to everyone.</p>
    </div> -->
</body>
    
@endsection