@extends('master')
@section('title','Perfil Usuario')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Total Reservas: {{ $reservations->count() }} </h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                            <th><strong>Nombre Reserva</strong></th>
                            <th><strong>Teléfono</strong></th>
                            <th><strong>Email</strong></th>
                            <th><strong>Time and Date</strong></th>
                            <th><strong>Nº Personas</strong></th>
                            <th><strong>Mensaje</strong></th>
                            <th><strong>Estado</strong></th>
                            <th><strong>Action</strong></th>
                            </thead>
                            <tbody>
                                @foreach($reservations as $res)
                                    <tr>
                                        <td>{{ $res->name }}</td>
                                        <td>{{ $res->phone }}</td>
                                        <td>{{ $res->email }}</td>
                                        <td>{{ $res->date_and_time }}</td>
                                        <th>{{ $res->num }}</th>
                                        <th>{{ $res->message }}</th>
                                        <th>
                                            @switch(true)
                                                @case($res->status == false)
                                                <center><span class="label label-danger">Por confirmar</span></center>
                                                @break
                                                
                                                @case($res->status == true)
                                                <center><span class="label label-info">Confirmada</span></center>
                                                @break
                                                
                                            @endswitch
                                        </th>

                                        <td>

                                            <a id="delete-form-{{ $res->id }}" href="{{route('eliminarReserva',$res->id)}}" class="btn btn-danger btn-sm" target="_parent" 
                                            onclick="return confirm('¿Estas seguro que quieres eliminar la reserva?')">Eliminar</a>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Actividades Inscritas: {{ $activities->count() }} </h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="table" class="table"  cellspacing="0" width="100%">
                            <thead class="text-primary">
                                <th><strong>Titulo</strong></strong></th>
                                <th><strong>Imagen</strong></th>
                                <th><strong>Descripción</strong></th>
                                <th><strong>Fecha</strong></th>
                                <th><strong>Hora Inicial</strong></th>
                                <th><strong>Hora Final</strong></th>
                                <th><strong>Acción</strong></th>
                            </thead>
                            <tbody>
                                @foreach($activities as $act)
                                    <tr>
                                        <td>{{ $act->nombre }}</td>
                                        <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/activities/'.$act->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                        <td>{{ $act->descripcion}}</td>
                                        <td>{{ $act->fecha}}</td>
                                        <td>{{ $act->hora_inicio}}</td>
                                        <td>{{ $act->hora_fin}}</td>
                                        <td>
                                            <a id="delete-form-{{ $act->id }}" href="{{route('eliminarActividad',['id' => $act->id])}}" class="btn btn-danger btn-sm" target="_parent" 
                                            onclick="return confirm('¿Estas seguro que quieres eliminar la Actividad?')"><i class="material-icons">delete</i></a>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
