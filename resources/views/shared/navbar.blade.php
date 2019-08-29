
<div class="container-fluid px-lg-5">
<!-- nav -->
    <nav class="py-2 d-lg-flex">
        <ul id="logo">
        
        <!-- <a href="/"><img src="https://scontent.fbcn3-1.fna.fbcdn.net/v/t31.0-8/18953396_1423501684374757_6742780887359647251_o.jpg?_nc_cat=100&_nc_oc=AQkfSH6IWoUx9QJma4hJK9fmiY-0xvauwjlcAeVNr9KRkTxqtKfzmGibByij3nFRYv4&_nc_ht=scontent.fbcn3-1.fna&oh=2c064c11f4368fb2a1d8074fccc2b82d&oe=5DDB80CE" width="50" height="50" title="Liberty" alt="Hamburgueseria Creperia"></a>
        -->
            <h1> <a href="/"><span class="fa fa-align-center" aria-hidden="true"></span> Liberty </a></h1>
        </ul>

        <label for="drop" class="toggle">Menu</label>
        <input type="checkbox" id="drop" />
    
        <ul class="menu mt-2 ml-auto">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="{{ route('productoss') }}"" class="scroll">Productos</a></li>
            <li><a href="/actividades" class="scroll">Actividades</a></li>
            <li class="nav-item"><a class="nav-link" href="/reserva">Reservar Mesa</a></li>
            <li><a href="/contactanos" class="scroll">Contactanos</a></li>

   
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
                <li><a href="/perfilUsuario/{{ Auth::user()->id }}" class="scroll"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} </a></li>
                
                <li>
                    <a href="/user_profile_reservations/{{ Auth::user()->id }}" class="scroll"><span class="glyphicon glyphicon-tags"></span>
                
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


               
                
                @endif
        
        </ul>

                
        

    </nav>
<!-- //nav -->

</div>