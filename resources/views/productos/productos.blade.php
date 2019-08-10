@extends('master')

@section('title','Productos')

@section('content')

    <!--// about -->
    <!--/mid-sec-->
    <section class="mid-sec py-5" id="menu">
        <div class="container-fluid py-lg-5">
            <div class="header pb-lg-3 pb-3 text-center">
                <h3 class="tittle mb-lg-3 mb-3">Bigger & Bolder</h3>
            </div>
            <div class="middile-inner-con">
                <div class="tab-main mx-auto text-center">

                    <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1"><span class="fa fa-align-center" aria-hidden="true"></span> Burgers</label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2"><span class="fa fa-bolt" aria-hidden="true"></span> Fries</label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3"><span class="fa fa-bitbucket" aria-hidden="true"></span> Drinks</label>

                    <section id="content1">
                        <div class="ab-info row">
                            <div class="col-md-3 ab-content">
                                <div class="tab-wrap">
                                    <img src="images/5.jpg" alt="news image" class="img-fluid">
                                    <div class="ab-info-con">
                                        <h4>Bacon Burger</h4>
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