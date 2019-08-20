@extends('master2')

@section('title','Productos')

@section('content')

<script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>


<section>
           
    <div class="container-fluid py-lg-5">
    <center><h3 class="tittle mb-lg-3 mb-3">NUESTRA CARTA</h3></center>


        <div class="middile-inner-con">
            <div class="tab-main mx-auto text-center">

                @foreach($categories as $category)
                    <input id="#{{ $category->slug }}" type="radio" name="#{{ $category->slug }}">
                    <label class="filter" data-filter="#{{ $category->slug }}" for="tab1"><span class="fa fa-align-center" aria-hidden="true">
                        </span>{{ $category->name }} <span class="badge">{{ $category->products->count() }}</span></label>
                @endforeach

                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">

                                @foreach($product as $product)
                                    <li class="item" id="{{ $product->category->slug }}">
                                        <a href="#">
                                            <img src="{{ asset('uploads/item/'.$product->image) }}" class="img-responsive" alt="Item" style="height: 300px; width: 400px;" >
                                            <div class="menu-desc text-center">
                                                <p><h3>{{ $product->nombre }}</h3></p>
                                                <span>
                                                    {{ $product->descripcion }}
                                                </span>
                                            </div>
                                        </a>
                                        <h2>{{ $product->precio }} €</h2>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection