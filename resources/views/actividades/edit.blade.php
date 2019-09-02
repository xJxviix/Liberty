@extends('layouts.app')

@section('title','Edit')

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
                            <h4 class="title">Editar Actividad </h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('actualizarActividad', ['activity'=> $activity]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre Actividad</label>
                                            <input type="text" class="form-control" value="{{ $activity->nombre }}" name="nombre">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            <textarea class="form-control" name="descripcion">{{ $activity->descripcion }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha</label>
                                            <input type="date" class="form-control" value="{{ $activity->fecha }}" name="fecha">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora Inicio</label>
                                            <input type="time" class="form-control" value="{{ $activity->hora_inicio }}"  name="hora_inicio">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora Fin</label>
                                            <input type="time" class="form-control" value="{{ $activity->hora_fin }}"  name="hora_fin">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Imagen</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>

                                <a href="{{ route('listarActividadesAdmin') }}" class="btn btn-danger">Back</a>
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
