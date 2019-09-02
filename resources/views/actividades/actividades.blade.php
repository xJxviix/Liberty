@extends('master')
@section('title','Actividades')
@section('content')
<section id="reserve" class="reserve">

    <div class="header py-lg-5 pb-3 text-center">
        <h3 class="tittle mb-lg-5 mb-3"> Actividades </h3>
    </div>

            @for ($i = 0; $i < sizeof($activities); $i+=2)
                <div class="container">
                    @if($i < sizeof($activities))
                        <div class="col-sm-6">
                            <div class="card rounded float-right" style="width: 30rem;" >
                                    <img src="{{ asset('uploads/activities/'.$activities[$i]->image) }}" 
                                    class="card-img-top" style="width: 100%; height: 30rem" alt="actividades liberty">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{$activities[$i]->nombre}}</b></h5>
                                        <p class="card-text"><b>Descripción: </b>{{$activities[$i]->descripcion}}</p>
                                        <p class="card-text"><b>Fecha:</b> {{$activities[$i]->fecha}}</p>
                                        <p class="card-text"><b>Horario Inicio:</b> {{$activities[$i]->hora_inicio}}</p>
                                        <p class="card-text"><b>Horario Final:</b> {{$activities[$i]->hora_fin}}</p>
                                        <a method="POST" href="" class="btn btn-primary">Inscribirse Actividad</a>
                                        {{-- {{ route('inscribir_actividad',['id'=> $activities[$i]->id])}} --}}
                                    </div>
                            </div>
                        </div>
                    @endif
                <div>

                <div class="container">
                    @if($i+1 < sizeof($activities))
             
                        <div class="col-sm-6">
                            <div class="card rounded float-left" style="width: 30rem;">
                                    <img src="{{ asset('uploads/activities/'.$activities[$i+1]->image) }}" 
                                    class="card-img-top" style="width: 100%; height: 30rem" alt="actividades liberty">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{$activities[$i+1]->nombre}}</b></h5>
                                        <p class="card-text"><b>Descripción: </b>{{$activities[$i+1]->descripcion}}</p>
                                        <p class="card-text"><b>Fecha:</b> {{$activities[$i+1]->fecha}}</p>
                                        <p class="card-text"><b>Horario Inicio:</b> {{$activities[$i+1]->hora_inicio}}</p>
                                        <p class="card-text"><b>Horario Final:</b> {{$activities[$i+1]->hora_fin}}</p>
                                        <a href="" class="btn btn-primary">Inscribirse Actividad</a>
                                    </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- Linea de separación --}}
                <hr style="color: #0056b2;" />
            @endfor
   
</section>
@endsection
