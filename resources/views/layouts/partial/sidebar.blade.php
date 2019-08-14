<div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="/"" class="simple-text">
            Liberty Benireggae
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <ul class="nav">

            <li class="{{ Request::is('layouts/app*') ? 'active': '' }}">
                <a href="{{ route('administrar') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            
            <li class="{{ Request::is('layouts/app*') ? 'active': '' }}">
                <a href="{{ route('mostrarUsuario') }}">
                    <i class="material-icons">person</i>
                    <p>Usuarios</p>
                </a>
            </li>

            <li class="{{ Request::is('layouts/app*') ? 'active': '' }}">
                <a href="{{ route('mostrarCategoria') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Categorias</p>
                </a>
            </li>

            <li class="{{ Request::is('layouts/app*') ? 'active': '' }}">
                <a href="/administrador/productos">
                    <i class="material-icons">dashboard</i>
                    <p>Productos</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="#">
                <i class="material-icons">content_paste</i>
                <p>Actividades</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="/administrador/reservas">
                <i class="material-icons">content_paste</i>
                <p>Reservas</p>
                </a>
            </li>

        </ul>
    </div>

    

</div>

