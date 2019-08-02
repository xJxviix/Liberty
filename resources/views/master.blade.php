<!DOCTYPE html>
<html lang="es">

<head>
    
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Liberty" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{ URL::asset('hamburguer/css/bootstrap.css') }}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ URL::asset('hamburguer/css/style.css') }}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="{{ URL::asset('hamburguer/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

    <title>@yield('title')</title>
    
</head>

<body>
    <!-- main-content -->
    <div class="Menu">
        @include('shared.navbar')
    </div>

    <br>

    <section>
        @yield('content')
    </section>

    <br>
    <!-- //contact -->
    <!-- footer -->
    <footer class="footer-content">
        <div class="layer footer">
            <div class="container-fluid">
                <div class="row footer-top-inner-w3ls">
                    <div class="col-lg-4 col-md-6 footer-top mt-md-0 mt-sm-5">
                        <h2>
                            <a href="/"><span class="fa fa-align-center" aria-hidden="true"></span> Liberty</a>
                        </h2>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                        <div class="footer-w3pvt">
                            <h3 class="mb-3 w3pvt_title">Horario de Apertura</h3>
                            <hr>
                            <ul class="list-info-w3pvt last-w3ls-contact mt-lg-4">
                                <li>
                                    <p>Lunes - Miércoles - Jueves 17.00 pm - 02.00 pm</p>

                                </li>
                                <li class="my-2">
                                    <p>Viernes - Sábado - Domingo 12.30 pm - 02.00 pm</p>

                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-0 mt-5">
                        <div class="footer-w3pvt">
                            <h3 class="mb-3 w3pvt_title">Contáctanos</h3>
                            <hr>
                            <div class="last-w3ls-contact">
                                <p>
                                <span class="fa fa-envelope-open-o">  </span><a href="mailto:jxvi21@gmail.com">liberty.benireggae@gmail.com</a>
                                </p>
                            </div>

                            <div class="last-w3ls-contact my-2">
                               <p><span class="fa fa-phone"></span> +34 659 31 69 61</p>
                            </div>

                        </div>
            
                        </div>
                    </div>

                </div>

                <p class="copy-right-grids text-li text-center my-sm-4 my-4">© 2019 Liberty BeniReggae All Rights Reserved</p>
                
                <div class="w3ls-footer text-center mt-4">
                    <ul class="list-unstyled w3ls-icons">
                        <li>
                            <a href="https://www.facebook.com/libertybenireggae/?rc=p">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/liberty.benireggae/">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tripadvisor.es/Restaurant_Review-g187525-d10397875-Reviews-Liberty_benireggae-Benidorm_Costa_Blanca_Province_of_Alicante_Valencian_Country.html">
                                <span class="fa fa-tripadvisor"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="move-top text-right"><a href="/" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a></div>
            </div>
            <!-- //footer bottom -->
        </div>
    </footer>
    <!-- //footer -->

</body>

</html>