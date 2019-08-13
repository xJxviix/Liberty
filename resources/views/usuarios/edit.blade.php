@extends('layouts.app')

@section('title','Editar Usuario')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Editar Usuario</h4>
                        </div>
                        <div class="card-content">
                            <form method="post" action="{{ route('actualizarUsuario', $user->id) }}">
                                @csrf
                                @method('post')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Apellidos</label>
                                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo Usuario</label>
                                            <input type="text" class="form-control" name="tipo">
                                            
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
                                    </div>
                                </div>

                                {{-- Tipo Usuario --}}
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Usuario') }}</label>

                            
                        </div>



                                <a href="{{ route('mostrarUsuario') }}" class="btn btn-danger">Atrás</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush