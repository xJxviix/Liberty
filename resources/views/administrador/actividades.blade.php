@extends('layouts.admin')
@section('title', 'Administracion de Actividades')
@section('content')


<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Admin Actividades</strong></h3>
      <br/>
        @if (session('activitySucces'))
            <div class="alert alert-success" role="alert">
                {{session('activitySucces')}}
            </div>
        @endif
        @if (session('activityError'))
            <div class="alert alert-error" role="alert">
                {{session('activityError')}}
            </div>
        @endif
      <table class="table table-bordered">
      <thread>
          <th>ID</th>
          <th>Nombre Actividad</th>
          <th>Descripción</th>
          <th>Fecha</th>
          <th>Hora desde</th>
          <th>Hora hasta</th>
          <th>Acción</th>
      </thread>
      <tbody>
            <form method="POST" action="{{ route('crearActividad') }}">
            @csrf
                <tr>
                    <td></td>
                    <td>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" required autofocus>

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="hora_inicio" type="time" class="form-control{{ $errors->has('hora_inicio') ? ' is-invalid' : '' }}" name="hora_inicio" required autofocus>

                                @if ($errors->has('hora_inicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora_inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="hora_fin" type="time" class="form-control{{ $errors->has('hora_fin') ? ' is-invalid' : '' }}" name="hora_fin" required autofocus>

                                @if ($errors->has('hora_fin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora_fin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <button  type="submit" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-save" area-hiden="true"></span></button>
                    </td>
                </tr>
            </form>

            @foreach($activities as $act)
              <tr>
                  <td>{{ $act->id }}</td>
                  <td>{{ $act->nombre }}</td>
                  <td>{{ $act->descripcion}}</td>
                  <td>{{ $act->fecha}}</td>
                  <td>{{ $act->hora_inicio}}</td>
                  <td>{{ $act->hora_fin}}</td>
                  <td>
                      <a href="{{route('editarActividad',['id' => $act->id])}}" target="_parent" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                      <a href="{{route('eliminarActividad',['id' => $act->id])}}" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  {!! $activities->render() !!}
</div>
</div>

@endsection
