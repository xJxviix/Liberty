@extends('master')

@section('title','Registrarse Actividad')

@section('content')


    {{-- Linea de separación --}}
    <hr style="color: #0056b2;" />

    @if (Auth::user()->tipo=='registrado')

    <div class="col-md-8 mx-auto">
        <div class="card rounded float-right" style="width: 100%;">
                <div class="list-group-item active"><i class="fa fa-hand-lizard-o" aria-hidden="true"></i>Inscribirse en la actividad</div>

                <div class="panel-body" style="margin-top: 2%;">

                <form class="form-horizontal" method="POST" action="{{ route('reserva_actividad',['id'=> $activity->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                <label for="nombre" class="col-md-4 control-label"> <b>Nombre de la actividad:</b> {{$activity->nombre}}</label>

                </div>
                <div class="form-group">
                        <label for="nombre" class="col-md-4 control-label"> <b>Descripción:</b> {{$activity->descripcion}}</label>

                </div>
                <div class="form-group">
                        <label for="nombre" class="col-md-4 control-label"> <b>Fecha:</b> {{$activity->fecha}}</label>

                </div>
                <div class="form-group">
                        <label for="nombre" class="col-md-4 control-label"> <b>Hora:</b> desde: {{$activity->hora_inicio}} hasta: {{$activity->hora_fin}}</label>

                </div>
                <div class="form-group">
                        <label for="nombre" class="col-md-4 control-label"><b>Tarifa visitante:</b> 25$</label>
                </div>
                <div class="form-group}">
                        <label for="nombre" class="col-md-4 control-label"><b>Tarifa Socio:</b> 20$</label>
                </div>

                @if (!session('success'))
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"><b>Email</b> <i class="fa fa-user-circle"></i> :</label>

                        <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Introduce email del cliente">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                </div>
                <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Inscribirse en la actividad
                            </button>
                        </div>
                </div>
                @else
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif
            </div>
        </div>
    </div>
    @else
    <div class="col-md-8 mx-auto">
            <div class="card rounded float-right" style="width: 100%;">
                    <div class="list-group-item active"><i class="fa fa-hand-lizard-o" aria-hidden="true"></i>Inscribirse en la actividad</div>

                    <div class="panel-body" style="margin-top: 2%;">

                    <form class="form-horizontal" method="POST" action="{{ route('reservar_actividad',['id'=> $activity->id, 'email'=> Auth::user()->email]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nombreReserva') ? ' has-error' : '' }}">
                    <label for="nombre" class="col-md-4 control-label"> <b>Nombre de la actividad:</b> {{$activity->nombre}}</label>

                    </div>
                    <div class="form-group{{ $errors->has('nombreReserva') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"> <b>Descripción:</b> {{$activity->descripcion}}</label>

                    </div>
                    <div class="form-group{{ $errors->has('nombreReserva') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"> <b>Fecha:</b> {{$activity->fecha}}</label>

                    </div>
                    <div class="form-group{{ $errors->has('nombreReserva') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"> <b>Hora:</b> desde: {{$activity->hora_inicio}} hasta: {{$activity->hora_fin}}</label>

                    </div>
                    <div class="form-group{{ $errors->has('nombreReserva') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label"><b>Tarifa:</b> 20$</label>

                    </div>
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                        @else
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Inscribirse en la actividad
                            </button>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    @endif



@endsection
