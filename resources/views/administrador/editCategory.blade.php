@extends('master')
@section('title', 'Administracion de Categorias')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="list-group-item active"><span class="glyphicon glyphicon-edit">
                <span class="glyphicon glyphicon-edit"></span> Actualizar Categoria: <b>{{ $categories->name }}</b>
                </span></div>

                <div class="card-body">


                <div class="panel-body" style="margin-top: 2%">

                    <form method="POST" action="{{ route('actualizarCategoria', ['id'=> $categories->id]) }}">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                        {{-- Linea de separación --}}
                        <hr style="color: #0056b2;" />
    
                        {{-- Nombre --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $categories->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Categoria') }}
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