@extends('layouts.app')

@section('title','Admin Categorias')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('AñadirUsuario') }}" class="btn btn-primary">Agregar Usuario</a>
                        @include('layouts.partial.msg')
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Usuarios</h4>
                            </div>
                            <div class="card-content table-responsive">
                                <table id="table" class="table" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                      <th><strong>ID</strong></th>
                                      <th><strong>Nombre</strong></th>
                                      <th><strong>Apellidos</strong></th>
                                      <th><strong>Tipo</strong></th>
                                      <th><strong>Email</strong></th>
                                      <th><strong>Acción</strong></th>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->lastname}}</td>
                                            <td>
                                                @switch(true)
                                                @case($user->tipo == "administrador")
                                                    <span class="label label-danger">{{$user->tipo}}</span>
                                                    @break
                                                  
                                                @case($user->tipo == "registrado")
                                                    <span class="label label-info">{{$user->tipo}}</span>
                                                    @break
                                                
                                                @case($user->tipo == "empleado")
                                                    <span class="label label-warning">{{$user->tipo}}</span>
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>{{ $user->email }} </td>

                                            <td>
                                                <a href="{{ route('editarUsuario', $user->id) }}" method="GET" target="_parent" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <a id="delete-form-{{ $user->id }}" href="{{route('eliminarUsuario',$user->id)}}" class="btn btn-danger btn-sm" target="_parent" 
                                                  onclick="return confirm('¿Estas seguro que quieres eliminar el usuario?')"><i class="material-icons">delete</i></a>
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

