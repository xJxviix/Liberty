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
                    <a href="{{ route('AñadirProducto') }}" class="btn btn-primary">Añadir Producto</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Productos</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th><strong>ID</strong></th>
                                <th><strong>Nombre</strong></strong></th>
                                <th><strong>Imagen</strong></th>
                                <th><strong>Categoria</strong></th>
                                <th><strong>Descripción</strong></th>
                                <th><strong>Precio</strong></th>
                                <th><strong>Acción</strong></th>
                                </thead>
                                <tbody>
                                    @foreach($products as $pro)
                                        <tr>
                                            <td>{{ $pro->id }}</td>
                                            <td><strong>{{ $pro->nombre }}</strong></td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$pro->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $pro->category->name }}</td>
                                            <td>{{ $pro->descripcion }}</td>
                                            <td><strong>{{ $pro->precio }} €</strong></td>
                                            <td>
                                            <a href="{{ route('editarProducto', $pro->id) }}" method="GET" target="_parent" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <a id="delete-form-{{ $pro->id }}" href="{{route('eliminarProducto',$pro->id)}}" class="btn btn-danger btn-sm" target="_parent" 
                                                onclick="return confirm('¿Estas seguro que quieres eliminar el producto?')"><i class="material-icons">delete</i></a>
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