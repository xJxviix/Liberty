<!DOCTYPE html>
<html lang="es">

<head>
    
    <!-- Meta tag Keywords -->
    <!-- Meta tag Keywords -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="Liberty" />
    

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <title>
        @yield('title')
    </title>

    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pricing.css') }}">

    
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

    <title>
        @yield('title')
    </title>

    <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>

</head>

<body data-spy="scroll" data-target="#template-navbar">
    <!-- main-content -->
    <div class="Menu">
        @include('shared.navbar')
    </div>


    <!-- Main-content -->
    <section>
        <br>
        @yield('content')
        <br>
    </section>

    <!-- Footer-content -->
    <section>
        @include('shared.footer')
    </section>

    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.mixitup.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jQuery.scrollSpeed.js') }}"></script>
 
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
        @endforeach
    @endif

    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: "dd MM yyyy - HH:11 P",
                showMeridian: true,
                autoclose: true,
                todayBtn: true
            });
        })
    </script>
    {!! Toastr::message() !!}

</body>

</html>