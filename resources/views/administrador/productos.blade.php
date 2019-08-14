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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 100px; width: 100px" alt=""></td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->precio }}</td>
                                            <td>
                                            <a href="{{ route('editarProducto', $item->id) }}" method="GET" target="_parent" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <a id="delete-form-{{ $item->id }}" href="{{route('eliminarProducto',$item->id)}}" class="btn btn-danger btn-sm" target="_parent" 
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