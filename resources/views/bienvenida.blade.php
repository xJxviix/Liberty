@extends('master2')
@section('title','Liberty')
@section('content')

<!-- banner-bottom-wthree -->
<section class="banner-bottom-wthree py-5" id="about">
    <div class="container py-md-3">
        <div class="row banner-grids">
            <div class="col-md-6 content-left-bottom text-left pr-lg-5">
                <h4>
                CABRITO
                </h4>
                <p class="mt-2 text-left">
                <strong class="text-capitalize"> 
                Feliz día!!! 🤗Os espera este “cabrito mieloso” con ganas de veros!! #benidorm #burguer #foodporn</strong>
                </p>
                <p><strong>Ingredientes:</strong> Black Angus (200g), queso de cabra, rúcula, cebolla frita, miel, pimienta y patatas fritas</p>

            </div>
            <div class="col-md-6 content-right-bottom text-left">
                <img src="{{asset('/image/cabrito.jpg') }}" alt="news image" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- //banner-bottom-wthree -->
<!--/ about -->


<!-- //banner-bottom-wthree -->
<!--/ about -->
<section class="services py-5" id="services">
    <div class="container py-md-5">
        <div class="header pb-lg-3 pb-3 text-center">
            <h3 class="tittle two mb-lg-3 mb-3">Ven a probar nuestras hamburguesas</h3>
        </div>

            <div class="row ab-info mt-lg-4">

            @foreach($products as $product)
                <div class="col-lg-3 ab-content">
                    <div class="ab-content-inner">
                        <img src="{{ asset('uploads/item/'.$product->image) }}" alt="news image" class="img-fluid">
                        <div class="ab-info-con">
                            <h4>{{ $product->nombre }}</h4>
                            <p>{{ $product->precio }} €</p>
                        </div>
                    </div>
                </div>
            @endforeach
           
            </div>

    </div>
</section>



<section class="contact py-5" id="contact">
    <div class="container pb-md-5">
        <ul class="list-unstyled row text-left mb-lg-5 mb-3">
            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Dirección</h6>
                        <p>Av de Murcia, 11, 
                            <br>03503 Benidorm, Alicante. </p>
                    </div>
                </div>
            </li>

            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-envelope-open-o"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Email</h6>
                        <a href="mailto:info@example.com">liberty.benireggae@gmail.com</a>
                    </div>
                </div>
            </li>
            <li class="col-lg-4 adress-info">
                <div class="row">
                    <div class="col-md-3 text-lg-center adress-icon">
                        <span class="fa fa-mobile"></span>
                    </div>
                    <div class="col-md-9 text-left">
                        <h6>Teléfono</h6>
                        <p>+34 659 31 69 61</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</section>

@endsection