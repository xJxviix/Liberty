@extends('layouts.admin')
@section('title', 'Administración de Categorias')
@section('content')


<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Admin Categorias</strong></h3>
      {{-- Linea de separación --}}
      <hr style="color: #0056b2;" />
      {{-- @include('admin/errors')
      @include('flash::message') --}}
      <table class="table table-bordered">
 
      <thread>
          <th>ID</th>
          <th>Nombre Categoria</th>
          <th>Acción</th>
      </thread>
      <tbody>
      <form method="POST" action="{{ route('crearCategoria') }}" enctype="multipart/form-data">
                    @csrf
                        <tr>
                            <td></td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>
                                <button  type="submit" class="btn btn-success">Añadir <span class="glyphicon glyphicon glyphicon-save" area-hiden="true"></span></button>
                            </td>
                        </tr>
                    </form>
          @foreach($categories as $cat)
              <tr>
                  <td>{{ $cat->id }}</td>
                  <td>{{ $cat->name }}</td>
                  <td>
                    <a href="{{route('editarCategoria',['id' =>$cat->id])}}"  method="GET" target="_parent" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                    <a href="{{route('eliminarCategoria',$cat->id)}}" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  {!! $categories->render() !!}
</div>
</div>

@endsection
