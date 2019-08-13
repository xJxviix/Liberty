@extends('layouts.app')

@section('title', 'Administración de Reservas')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
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
                                <th>ID</th>
                                <th>Nombre Reserva</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Time and Date</th>
                                <th>Nº Personas</th>
                                <th>Message</th>
                                <th>Estado</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($reservation as $key=>$res)
                                        <tr>
                                            <td>{{ $res->id }}</td>
                                            <td>{{ $res->name }}</td>
                                            <td>{{ $res->phone }}</td>
                                            <td>{{ $res->email }}</td>
                                            <td>{{ $res->date_and_time }}</td>
                                            <th>{{ $res->num }}</th>
                                            <th>{{ $res->message }}</th>
                                            <th>
                                                @switch(true)
                                                  @case($res->status == false)
                                                    <center><span class="label label-danger">Por confirmar</span></center>
                                                    @break
                                                  
                                                  @case($res->status == true)
                                                    <center><span class="label label-info">Confirmada</span></center>
                                                    @break
                                                    
                                                @endswitch
                                            </th>

                                            <td>
                                                @if($res->status == false)
                                                    <form id="status-form-{{ $res->id }}" action="{{route('confirmarReserva',$res->id)}}" style="display: none;" method="POST">
                                                        @csrf
                                                    </form>
                                                    <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                                            event.preventDefault();
                                                            document.getElementById('status-form-{{ $res->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }"><i class="material-icons">done</i></button>
                                                @endif
                                                <a id="delete-form-{{ $res->id }}" href="{{route('eliminarReserva',$res->id)}}" class="btn btn-danger btn-sm" target="_parent" 
                                                onclick="return confirm('¿Estas seguro que quieres eliminar la categoria?')"><i class="material-icons">delete</i></a>
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
