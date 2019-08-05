@extends('master')
@section('title', 'Administracion de Actividad')
@section('content')

<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

<div class="container" style="margin-top: 2%">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default card rounded">
                <div class="list-group-item active">
                <span class="glyphicon glyphicon-edit"></span> Admin - Actualizar datos de una actividad {{ $activity->nombre }}</span>
            </div>

                <div class="panel-body" style="margin-top: 2%">
                    @if (session('successUpdate'))
                        <div class="alert alert-success" role="alert">
                            {{session('successUpdate')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('actualizarActividad', ['activity'=> $activity]) }}">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $activity->nombre }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Descripción --}}
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $activity->descripcion }}" required autofocus>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Fecha --}}
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ $activity->fecha }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Hora inicio --}}
                        <div class="form-group row">
                            <label for="hora_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Hora inicio') }}</label>

                            <div class="col-md-6">
                                <input id="hora_inicio" type="time" class="form-control{{ $errors->has('hora_inicio') ? ' is-invalid' : '' }}" name="hora_inicio" value="{{ $activity->hora_inicio }}" required autofocus>

                                @if ($errors->has('hora_inicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora_inicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Hora fin --}}
                        <div class="form-group row">
                            <label for="hora_fin" class="col-md-4 col-form-label text-md-right">{{ __('Hora fin') }}</label>

                            <div class="col-md-6">
                                <input id="hora_fin" type="time" class="form-control{{ $errors->has('hora_fin') ? ' is-invalid' : '' }}" name="hora_fin" value="{{ $activity->hora_fin }}" required>

                                @if ($errors->has('hora_fin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora_fin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar la información de la actividad') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
