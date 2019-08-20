@extends('layouts.app')
@section('title','Crear Actividad')
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
                            <h4 class="title">Añadir Actividad</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('crearActividad') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Titulo</label>
                                            <input type="text" class="form-control" name="nombre">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha</label>
                                            <input type="date" class="form-control" name="fecha">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora Inicio</label>
                                            <input type="time" class="form-control" name="hora_inicio">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora Fin</label>
                                            <input type="time" class="form-control" name="hora_fin">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                            <label class="control-label">Imagen</label>
                                            <input type="file" name="image">
                                    </div>
                                </div>

                                <a href="{{ route('mostrarProducto') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
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