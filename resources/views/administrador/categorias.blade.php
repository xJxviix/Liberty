


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
                    <a href="{{ route('AñadirCategoria') }}" class="btn btn-primary">Agregar Categoria</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Categorias</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table" cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$cat)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>
                                                <a href="{{ route('editarCategoria', $cat->id) }}" method="GET" target="_parent" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <a id="delete-form-{{ $cat->id }}" action="{{route('eliminarCategoria',$cat->id)}}" 
                                                    @csrf
                                                    @method('DELETE')
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                event.preventDefault();
                                                    document.getElementById('delete-form-{{ $cat->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
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
