@extends('layouts.app')

@section('title','Editar Categoria')

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
                            <h4 class="title">Editar Categoria</h4>
                        </div>
                        <div class="card-content">
                            <form method="post" action="{{ route('actualizarCategoria', $categories->id) }}">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" class="form-control" name="name" value="{{ $categories->name }}">
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('mostrarCategoria') }}" class="btn btn-danger">Atrás</a>
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