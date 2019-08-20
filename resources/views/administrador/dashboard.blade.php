@extends('layouts.app')

@section('title','Administrador')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">category</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Categorias</p>
                            <h3 class="title">{{ $categoryCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">category</i>
                                <label href="#pablo">Total Categorías</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">fastfood</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Productos</p>
                            <h3 class="title">{{ $itemCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">fastfood</i>
                                <label href="#pablo">Total Productos</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">local_activity</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Actividades</p>
                            <h3 class="title">{{ $activitiesCount }}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">local_activity</i>
                                <label href="#pablo">Total Actividades</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Reservas</p>
                            <h3 class="title">{{ $reservations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Reservas No Confirmadas
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Reservations</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">

                                    <th><strong>ID</strong></th>
                                    <th><strong>Nombre Reserva</strong></th>
                                    <th><strong>Teléfono</strong></th>
                                    <th><strong>Time and Date</strong></th>
                                    <th><strong>Nº Personas</strong></th>
                                    <th><strong>Estado</strong></th>
                                    <th><strong>Acción</strong></th>
                                </thead>

                                <tbody>
                                @foreach($reservations as $res)
                                    <tr>
                                        <td>{{ $res->id }}</td>
                                        <td>{{ $res->name }}</td>
                                        <td>{{ $res->phone }}</td>
                                        <td>{{ $res->date_and_time }}</td>
                                        <td>{{ $res->num }}</td>
                                        <th>
                                            @if($res->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>
                                            @if($res->status == false)
                                                <form id="status-form-{{ $res->id }}" action="{{route('confirmarReserva',$res->id)}}" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm()){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-{{ $res->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">done</i></button>
                                            @endif
                                            <form id="delete-form-{{ $res->id }}" action="{{ route('eliminarReserva',$res->id) }}" style="display: none;" method="get">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $res->id }}').submit();
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