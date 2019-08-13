@extends('master')
@section('title','Administrador')
@section('content')
<div class="container">
<div class="mid-sec py-5" >
  <ul class="nav nav-tabs">
    <li class="active settingshead"><a href="#first" data-toggle="tab">Usuarios</a></li>
    <li class="settingshead"><a href="#second" data-toggle="tab">Productos</a></li>
    <li class="settingshead"><a href="#third" data-toggle="tab">Actividades</a></li>
    <li class="settingshead"><a href="#fourth" data-toggle="tab">Reservas</a></li>
    <li class="settingshead"><a href="#five" data-toggle="tab">Categorias</a></li>
  </ul>
</div>
{{-- Linea de separación --}}
    <hr style="color: #0056b2;" />

<div class="tab-content">
  <div class="tab-pane active" id="first">
      <div class="namedesig">
      <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/usuarios" scrolling="no" frameBorder="0">
      </iframe>
    </div>
  </div>

  <div class="tab-pane" id="second">
    <div class="namedesig">
      <h4>Dr. Martin</h4>
      <p>PhD in Applied Chemistry</p>
    </div>
  </div>

  <div class="tab-pane" id="third">
    <div class="namedesig">
      <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="{{route('listarActividadesAdmin')}}" scrolling="no" frameBorder="0">
      </iframe>
    </div>
  </div>

  <div class="tab-pane" id="fourth">
    <div class="namedesig">
      <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/reservas" scrolling="no" frameBorder="0">
      </iframe>
    </div>
  </div>

  <div class="tab-pane" id="five">
    <div class="namedesig">
    <iframe style="height: -webkit-fill-available; width: -webkit-fill-available; margin-right: 2%" src="/administrador/categorias" scrolling="no" frameBorder="0">
            </iframe>
    </div>
  </div>
</div>


</div>
@endsection