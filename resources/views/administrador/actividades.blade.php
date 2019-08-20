@extends('layouts.app')

@section('title','Productos')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('AñadirActividad') }}" class="btn btn-primary">Añadir Actividad</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Actividades</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th><strong>ID</strong></th>
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
                                            <td>{{ $act->id }}</td>
                                            <td>{{ $act->nombre }}</td>
                                            
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/activities/'.$act->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $act->descripcion}}</td>
                                            <td>{{ $act->fecha}}</td>
                                            <td>{{ $act->hora_inicio}}</td>
                                            <td>{{ $act->hora_fin}}</td>
                                            <td>
                                            <a href="{{route('editarActividad',['id' => $act->id])}}" method="GET" target="_parent" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

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

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
