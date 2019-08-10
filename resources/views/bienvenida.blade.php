@extends('master')
@section('title','Liberty')
@section('content')


    {{-- Linea de separación --}}
    <hr style="color: #0056b2;" />
 <!-- banner-bottom-wthree -->
 <section class="banner-bottom-wthree py-5" id="about">
        <div class="container py-md-3">
            <div class="row banner-grids">
                <div class="col-md-6 content-left-bottom text-left pr-lg-5">
                    <h4>TRIPLE HAMBURGER WITH CHEESE MEAL</h4>
                    <p class="mt-2 text-left">Integer pulvinar leo id viverra feugiat.<strong class="text-capitalize"> Pellentesque libero justo, semper at tempus vel, ultrices in sed ligula. Nulla uter sollicitudin velit.</strong> Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero. Pellentesque maximus Pellentesque libero justo Nulla uter sollicitudin velit. Sed porttitor orci vel ferm semper at vel, ultrices in ligula semper at vel.Curabitur ut turpis massa in condimentum libero.</p>

                </div>
                <div class="col-md-6 content-right-bottom text-left">
                    <img src="images/ab1.png" alt="news image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- //banner-bottom-wthree -->
    <!--/ about -->
    <section class="services py-5" id="services">
        <div class="container py-md-5">
            <div class="header pb-lg-3 pb-3 text-center">
                <h3 class="tittle two mb-lg-3 mb-3">What kind of Foods we serve for you</h3>
            </div>
            <div class="row ab-info mt-lg-4">
                <div class="col-lg-3 ab-content">
                    <div class="ab-content-inner">
                        <img src="images/1.jpg" alt="news image" class="img-fluid">
                        <div class="ab-info-con">
                            <h4>Delicious sandwich</h4>
                            <p>$5.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ab-content">
                    <div class="ab-content-inner">
                        <img src="images/2.jpg" alt="news image" class="img-fluid">
                        <div class="ab-info-con">
                            <h4>Humburger & Chips</h4>
                            <p>$10.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ab-content">
                    <div class="ab-content-inner">
                        <img src="images/3.jpg" alt="news image" class="img-fluid">
                        <div class="ab-info-con">
                            <h4>Two burgers for one</h4>
                            <p>$25.99</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ab-content">
                    <div class="ab-content-inner">
                        <img src="images/4.jpg" alt="news image" class="img-fluid">
                        <div class="ab-info-con">
                            <h4>Veg Muffin</h4>
                            <p>$28.99</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// about -->
    <!--/mid-sec-->
    <section class="mid-sec py-5" id="menu">
        <div class="container-fluid py-lg-5">
            <div class="header pb-lg-3 pb-3 text-center">
                <h3 class="tittle mb-lg-3 mb-3">Productos</h3>
            </div>
            <div class="middile-inner-con">
                <div class="tab-main mx-auto text-center">

                    <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1"><span class="fa fa-align-center" aria-hidden="true"></span> Hamburguesas</label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2"><span class="fa fa-bolt" aria-hidden="true"></span> Crepes</label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3"><span class="fa fa-bitbucket" aria-hidden="true"></span> Bebidas</label>

                    <input id="tab4" type="radio" name="tabs">
                    <label for="tab4"><span class="fa fa-bitbucket" aria-hidden="true"></span> Postres</label>

                    <section id="content1">
                        <div class="ab-info row">
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/5.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Completa</h4>
                                        <p class="price">$5.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/6.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Cheese Butter</h4>
                                        <p class="price">$15.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/7.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Delicious sandwich</h4>
                                        <p class="price">$25.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/6.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Delicious sandwich</h4>
                                        <p class="price">$35.99</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>

                    <section id="content2">

                        <div class="ab-info row">
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/8.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Pene Salmone</h4>
                                        <p class="price">$5.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/9.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Cheese Butter</h4>
                                        <p class="price">$15.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/7.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Bolognese Pasta</h4>
                                        <p class="price">$25.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/10.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Tagliatelle Molto</h4>
                                        <p class="price">$35.99</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <section id="content3">
                        <div class="ab-info row">
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/11.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Cola Bottle</h4>
                                        <p class="price">$5.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/12.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Fresh Lime</h4>
                                        <p class="price">$15.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/11.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Cola Bottle</h4>
                                        <p class="price">$25.99</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/12.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Kiwi Smoothie</h4>
                                        <p class="price">$35.99</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--//mid-sec-->




@endsection