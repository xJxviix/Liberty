@extends('master2')
@section('title','Actividades')
@section('content')
<br>
<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">

          <b>Actividades</b>

        </div>

        <div class="panel-body" >

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}

        </div>

    </div>

</div>



@endsection
