@extends('master')
@section('title','Administrador')
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 2%;margin-left:2%">
        <li class="nav-item">
            <a class="nav-link active" id="usuario-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="instalaciones-tab" data-toggle="tab" href="#instalaciones" role="tab" aria-controls="profile" aria-selected="false">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="instalaciones-tab" data-toggle="tab" href="#Ofertas" role="tab" aria-controls="profile" aria-selected="false">Ofertas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="actividades-tab" data-toggle="tab" href="#actividades" role="tab" aria-controls="contact" aria-selected="false">Actividades</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" id="reservas-tab" data-toggle="tab" href="#reservas" role="tab" aria-controls="contact" aria-selected="false">Reservas</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent" style="margin-top: 1%;margin-left:2%">
        <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuario-tab">
            <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/usuarios" scrolling="no" frameBorder="0">
            </iframe>
        </div>
        <div class="tab-pane fade show" id="instalaciones" role="tabpanel" aria-labelledby="instalaciones-tab">
            <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/instalaciones" scrolling="no" frameBorder="0">
            </iframe>
        </div>
        <div class="tab-pane fade show" id="actividades" role="tabpanel" aria-labelledby="actividades-tab">
        <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="" scrolling="no" frameBorder="0">
            </iframe>
        </div>
        <div class="tab-pane fade show" id="reservas" role="tabpanel" aria-labelledby="reservas-tab">
            <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/reservas" scrolling="no" frameBorder="0">
            </iframe>
        </div>

    </div>
@endsection
