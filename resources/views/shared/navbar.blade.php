<div class="container-fluid px-lg-5">
<!-- nav -->
    <nav class="py-2 d-lg-flex">
        <ul id="logo">
            <h1> <a href="/"><span class="fa fa-align-center" aria-hidden="true"></span> Liberty </a></h1>
        </ul>

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
    
        <ul class="menu mt-2 ml-auto">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/productos" class="scroll">Productos</a></li>
            <li><a href="/actividades" class="scroll">Actividades</a></li>
            <li class="nav-item"><a class="nav-link" href="/reserva">Reservar Mesa</a></li>

            @if( auth()->user() != null)
                <li><a href="#about" class="scroll">Ofertas</a></li>
            @endif
            
            <li><a href="#testimonials" class="scroll">Contactanos</a></li>
        </ul>

                
        <!-- Right Side Of Navbar -->
        <ul class="menu mt-2 ml-auto">
            
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else

                <li class="inner-ul">
                    <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul  data-toggle="dropdown" role="menu">
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

                @auth
                    @if(Auth::user()->tipo == 'administrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('administrar')}}">Administrar <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>

    </nav>
<!-- //nav -->

</div>