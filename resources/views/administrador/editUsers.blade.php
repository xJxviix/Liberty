@extends('master')
@section('title', 'Administracion de Usuarios')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="list-group-item active"><span class="glyphicon glyphicon-edit">
                <span class="glyphicon glyphicon-edit"></span> Admin - Actualizar Perfil Usuario de <b>{{ $user->name }}</b>
                </span></div>

                <div class="card-body">


                <div class="panel-body" style="margin-top: 2%">

                    <form method="POST" action="{{ route('actualizarUsuario', ['id'=> $user->id]) }}">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                        <div>
                            <center>
                            
                            <img id="foto" class="img-responsive img-circle" align="middle" width="200" height="200"
                            src="/imgs/{{$user->photo}}">

                            </center>
                        </div>

                        {{-- Linea de separación --}}
                        <hr style="color: #0056b2;" />
    
                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Apellidos --}}
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        {{-- Correo Electronico --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{-- Tipo Usuario --}}
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Usuario') }}</label>

                            <div class="form-check" style="margin-left: 0.5%; margin-top:0.5%">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo1" value="administrador" @if($user->tipo == 'administrador') checked @endif>
                                    <label class="form-check-label" for="tipo1">
                                      Administrador
                                    </label>                                    
                            </div>
                            <div class="form-check" id="tipo" name="tipo" style="margin-left: 0.5%; margin-top:0.5%">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo2" value="registrado" @if($user->tipo == 'registrado') checked @endif>
                                    <label class="form-check-label" for="tipo2">
                                    Registrado
                                    </label>
                            </div>
                            <div class="form-check" id="tipo" name="tipo" style="margin-left: 0.5%; margin-top:0.5%">
                                <input class="form-check-input" type="radio" name="tipo" id="tipo3" value="empleado" @if($user->tipo == 'empleado') checked @endif>
                                    <label class="form-check-label" for="tipo3">
                                    Empleado
                                    </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Usuario') }}
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
