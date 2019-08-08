@extends('layouts.admin')
@section('title', 'Administración de Productos')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Admin Productos</strong></h3>
      <br/>
    @if (session('successStoreProduct'))
        <div class="alert alert-success" role="alert">
            {{session('successStoreProduct')}}
        </div>
    @endif
    @if (session('errorStoredProduct'))
        <div class="alert alert-error" role="alert">
            {{session('errorStoredProduct')}}
        </div>
    @endif
      <table class="table table-bordered">
      <thread>
          <th>ID</th>
          <th>Nombre Producto</th>
          <th>Precio</th>
          <th>Imagen</th>
          <th>Descripción</th>
          <th>Acción</th>
      </thread>
      <tbody>
            <form method="POST" action="{{ route('crearProducto') }}" enctype="multipart/form-data">
                    @csrf
                        <tr>
                            <td></td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                        @if ($errors->has('nombre'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="precio" type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{ old('precio') }}">

                                            @if ($errors->has('precio'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('precio') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen" value="{{ old('imagen') }}" required autofocus>
                                        @if ($errors->has('imagen'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('imagen') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                        @if ($errors->has('descripcion'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button  type="submit" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-save" area-hiden="true"></span></button>
                            </td>
                        </tr>
                    </form>
          @foreach($products as $p)
              <tr>
                  <td>{{ $p->id }}</td>
                  <td>{{ $p->nombre }}</td>
                  <td>{{ $p->precio}}</td>
                  <td>{{ $p->nombreImagen}}</td>
                  <td>{{ $p->descripcion}} </td>
                  <td>
                      <a href="#" method="GET" target="_parent" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" area-hiden="true"></span></a>
                    <a href="#" target="_parent" onclick="return confirm('Estas seguro ?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" area-hiden="true"></span></a>
                    </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  {!! $products->render() !!}
  </div>
</div>

@endsection
