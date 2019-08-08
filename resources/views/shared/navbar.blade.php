<div class="container-fluid px-lg-5">
<!-- nav -->
    <nav class="py-4 d-lg-flex">
    <div id="logo">
        <h1> <a href="/"><span class="fa fa-align-center" aria-hidden="true"> Liberty</span></a></h1>
    </div>
    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
    <ul class="menu mt-2 ml-auto">

        <li class="active"><a href="/">Home</a></li>
        <li><a href="actividades" class="scroll">Actividades</a></li>

        @if( auth()->user() != null)
            <li class="nav-item">
                <a class="nav-link" href="/reserva_instalacion">Reservar Instalación</a>
            </li>
            <li><a href="#about" class="scroll">Ofertas</a></li>
        @endif

        <li>
            <!-- First Tier Drop Down -->
            <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
            <a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
            <input type="checkbox" id="drop-2" />
            <ul class="inner-ul">
                <li><a class="scroll" href="#gallery">Gallery</a></li>
                <li><a href="#menu" class="scroll">Menu</a></li>
            </ul>
        </li>
        <li><a href="#testimonials" class="scroll">Contactanos</a></li>
    </ul>

    </ul>
    
        <!-- Right Side Of Navbar -->
        <ul class="menu mt-2 ml-auto">
        
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
        @auth
        @if(Auth::user()->tipo == 'administrador')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('administrar')}}">Administrar <span class="sr-only">(current)</span></a>
                </li>
        @endif

    @endauth
        
            <li class="inner-ul">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

            <ul class="dropdown"role="menu">
                <li><a href="/perfilUsuario/{{ Auth::user()->id }}">Perfil Usuario</a></li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            </li>
        @endif
        </ul>
    </nav>

    
<!-- //nav -->
</div>