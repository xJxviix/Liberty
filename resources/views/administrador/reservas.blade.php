@extends('layouts.admin')
@section('title', 'Administración de Reservas')
@section('content')


<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Admin Reservas</strong></h3>
      {{-- Linea de separación --}}
      <hr style="color: #0056b2;" />
      {{-- @include('admin/errors')
      @include('flash::message') --}}
    
      <form method="POST" action="{{ route('añadirReservas') }}" enctype="multipart/form-data">
        @csrf
            <td>
                <button  type="submit" class="btn btn-success">Añadir Reserva</button>
            </td>
      </form>
      <br>

      <table class="table table-bordered">
 
      <thread>
          <th>ID</th>
          <th>Nombre Reserva</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th>Fecha y Hora</th>
          <th>Num Personas</th>
          <th>Mensaje</th>
          <th>Estado</th>
          <th>Acción</th>
      </thread>
      <tbody>

      @foreach($reservation as $res)
              <tr>
                  <td>{{ $res->id }}</td>
                  <td>{{ $res->name }}</td>
                  <td>{{ $res->phone }}</td>
                  <td>{{ $res->email }}</td>
                  <td>{{ $res->date_and_time }}</td>
                  <td>{{ $res->num }}</td>
                  <td>{{ $res->message }}</td>
                  <td>
                  @switch(true)
                    @case($res->status == false)
                      <center><span class="label label-danger">No Confirmada</span></center>
                      @break
                    
                    @case($res->status == true)
                      <center><span class="label label-info">Confirmada</span></center>
                      @break
                      
                  @endswitch
                  </td>
                  <td>
                    <a href=""  method="GET" target="_parent" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                    <a href="{{route('eliminarReserva',$res->id)}}" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                  </td>
              </tr>
      @endforeach
      
      </tbody>
  </table>
  {!! $reservation->render() !!}
</div>
</div>

@endsection
