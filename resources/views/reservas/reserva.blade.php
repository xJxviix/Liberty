@extends('master')

@section('title','Productos')

@section('content')


<section id="reserve" class="reserve">
    <p><center><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcQwgs4bcA0X2jJDpt56tj52UdUFGcgtZSrR9hyCZINvGcop2_"></center></p>

    @auth
        @if(Auth::user()->tipo == 'administrador' or 'registrado')
        <section class="reservation">
        <img class="img-responsive section-icon hidden-sm hidden-xs">
        <div class="wrapper">
            <div class="container-fluid">
                <div class=" section-content">
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <form class="contact-form" method="POST" action="{{ route('addReserva')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12 con-gd">
                                                
                                                <div class="form-group">
                                                    <label>Nombre *</label>
                                                    <input type="text" class="form-control reserve-form empty iconified" id="name" value="{{ auth()->user()->name . ' ' .auth()->user()->lastname }}" name="name">
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="col-lg-12 con-gd">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input type="email" class="form-control reserve-form empty iconified" id="email" value="{{ auth()->user()->email}} " name="email">
                                                </div>
                                            </div>
                                        </div> 

                                    </div>
   
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12 con-gd">
                                                <div class="form-group">
                                                    <label>Teléfono *</label>
                                                    <input type="tel" class="form-control reserve-form empty iconified" id="phone" value="{{ old('phone') }}" name="phone">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 con-gd">
                                                <div class="form-group">
                                                    <label>Fecha_Hora*</label>
                                                    <input type="text" class="form-control reserve-form empty iconified" id="datetimepicker1" value="{{ old('dateandtime') }}" name="dateandtime" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="num" class="form-control reserve-form empty iconified" name="num" id="num"  value="{{ old('num') }}"  placeholder="  &#xf007;  Núm. Personas. min: 4 - max:15">
                                            @if ($errors->has('num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3"  value="{{ old('message') }}" placeholder="  &#xf086;  Comentarios"></textarea>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                            <span><i class="fa fa-check-circle-o"></i></span>
                                            Realizar Reserva
                                        </button>
                                    </div>

                                    <div class="container my-5">
                                    <h1></h1>
                                    
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-md-2 hidden-sm hidden-xs"></div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="opening-time">
                                <h3 class="opening-time-title">Horarios</h3>
                                <p>Lunes - Miércoles - Jueves 17.00 pm - 02.00 pm</p>
                                <p>Viernes - Sábado - Domingo 12.30 pm - 02.00 pm</p>

                                <div class="launch">
                                    <h4>Comidas</h4>
                                    <p>Viernes - Sábados - Domingos: 13.00 pm - 16.00 pm</p>
                                </div>

                                <div class="dinner">
                                    <h4>Cenas</h4>
                                    <p>Lunes - Miércoles - Jueves 20.00 pm - 23.00 pm</p>
                                    <p>Viernes - Sábados - Domingos: 20.00 pm - 23.00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </section>
    @endif
    @endauth

    @guest
    <section class="reservation">

    <img class="img-responsive section-icon hidden-sm hidden-xs" src="">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="POST" action="{{ route('crearReserva') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name" id="name"
                                               placeholder="  &#xf007;  Nombre">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control reserve-form empty iconified" id="email"  placeholder="  &#xf1d8;  Email">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone"  placeholder="  &#xf095;  Teléfono">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" placeholder="&#xf017;  Time">
                                    </div>
                                </div>


                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input type="num" class="form-control reserve-form empty iconified" name="num" id="num"  placeholder="  &#xf007;  Núm. Personas. min: 4 - max:15">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3"  placeholder="  &#xf086;  Comentarios"></textarea>
                                </div>



                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Realizar Reserva
                                    </button>
                                </div>

                                <div class="container my-5">
                                <h1></h1>
                                
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Horarios</h3>
                            <p>Lunes - Miércoles - Jueves 17.00 pm - 02.00 pm</p>
                            <p>Viernes - Sábado - Domingo 12.30 pm - 02.00 pm</p>

                            <div class="launch">
                                <h4>Comidas</h4>
                                <p>Viernes - Sábados - Domingos: 13.00 pm - 16.00 pm</p>
                            </div>

                            <div class="dinner">
                                <h4>Cenas</h4>
                                <p>Lunes - Miércoles - Jueves 20.00 pm - 23.00 pm</p>
                                <p>Viernes - Sábados - Domingos: 20.00 pm - 23.00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endguest
 
</section>

@endsection